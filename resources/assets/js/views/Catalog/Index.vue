<template>
    <div class="container-fluid">
        <div class="row">
            <sidebar @get-products-by-category="getProductsByCategory"/>
            <div class="col-md-9">
                <div class="row" v-if="products.length > 0">
                    <div class="col-lg-4 col-sm-6 mb-4 pb-3" v-for="product in products">
                        <product-card
                                :product="product"
                                :sales-plans="salesPlans"
                                @view-details="showMore"
                                :key="product.product.id"/>
                    </div>
                    <div class="modal fade" id="display-product-modal" tabindex="-1" role="dialog"
                         aria-labelledby="modal-default" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h6 class="modal-title" id="modal-title-default">Product Details</h6>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">×</span>
                                    </button>
                                </div>
                                <div class="modal-body" v-if="productOnModal">
                                    <div class="row">
                                        <div class="col-md-5 content-right d-flex justify-content-center align-items-center">
                                            <img class="img-fluid rounded" v-if="productOnModal.product.img_url"
                                                 :src="AWS_IMAGE_URL + productOnModal.product.img_url">
                                        </div>
                                        <div class="col-md-6 content-left">
                                            <span class="badge badge-success">{{productOnModal.product.brand.name}}</span>
                                            <h5 class="font-weight-bold card-text mt-2 mb-3 capitalize">
                                                {{productOnModal.product.name}}
                                            </h5>
                                            <div class="mt-3 mb-4">
                                                <table class="table table-borderless price-overview">
                                                    <thead>
                                                    <th class="pl-0">Plan</th>
                                                    <th class="text-center">Down Payment</th>
                                                    <th class="text-right pr-0">Repayment</th>
                                                    </thead>
                                                    <tbody>
                                                    <tr>
                                                        <td class="pl-0 text-left">
                                                            <div class="form-group mb-0">
                                                                <select class="custom-select form-control form-control-alternative form-control-sm"
                                                                        v-model="salesPlan">
                                                                    <option selected disabled>select plan</option>
                                                                    <option :value="salesPlan.percent"
                                                                            v-for="salesPlan in salesPlans">
                                                                        {{salesPlan.name}}
                                                                    </option>
                                                                </select>
                                                            </div>
                                                        </td>
                                                        <td class="text-center align-middle">
                                                            {{productOnModal.priceSummary.downPayment | currency('₦')}}
                                                        </td>
                                                        <td class="text-right align-middle pr-0">
                                                            {{productOnModal.priceSummary.repaymentPrice |
                                                            currency('₦')}}
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td colspan="3"
                                                            class="text-center text-light font-weight-lighter my-2">
                                                            <small>NB: The price above is for {{salesPlan}}% 6 months
                                                                plan.
                                                            </small>
                                                        </td>
                                                    </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                            <h5 class="font-weight-bold mt-2 mb-3 capitalize">
                                                Product Specification
                                            </h5>
                                            <p>{{productOnModal.product.features}}</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer py-2">
                                    <button type="button" class="btn btn-link ml-auto" data-dismiss="modal">
                                        Close
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <custom-spinner v-else/>
            </div>
        </div>
    </div>
</template>

<script>
    import {get} from "../../helpers/api";
    import {Product} from '../../helpers/Product';
    import {EventBus} from "../../helpers/event-bus";
    import Sidebar from "../../components/Sidebar.vue";
    import ProductCard from "../../components/ProductCard";
    import {PriceCalculator} from '../../helpers/PriceCalculator';

    export default {
        components: {Sidebar, ProductCard},
        data() {
            return {
                products: [],
                salesPlan: 40,
                productOnModal: null,
                salesPlans: PriceCalculator.salePlans(),
                AWS_IMAGE_URL: "https://s3.eu-west-2.amazonaws.com/altara-one/product/"
            };
        },
        created() {
            get("/api/products").then(({data}) => this.updateProductsArray(data));
        },
        methods: {
            getProductsByCategory(id) {
                this.products = [];
                get(`/api/products/${id ? id : ''}`).then(({data}) => this.updateProductsArray(data))
            },

            updateProductsArray({products}) {
                this.products = products.map(product => new Product(product));
            },

            showMore(product) {
                this.salesPlan = 40;
                this.productOnModal = product;
                $("#display-product-modal").modal("show");
            }
        },
        watch: {
            'salesPlan': function (newSalesPlan) {
                this.productOnModal.calcPriceSummary(newSalesPlan);
            },

            'products': newProducts => EventBus.$emit('isProductAvailable', !!(newProducts.length > 0))
        }
    };
</script>
