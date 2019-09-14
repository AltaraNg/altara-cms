<template>
    <div>
        <spinner v-if="products.length === 0"/>
        <div v-if="products.length > 0" class="container-fluid">
            <div class="row">
                <sidebar></sidebar>
                <div class="col-md-9">
                    <div class="row">
                        <div class="col-lg-4 col-sm-6 mb-4 pb-3" v-for="product in products">
                            <product-card :product="product" @view-details="showMore"/>
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
                                                <img class="img-fluid rounded" v-if="productOnModal.product.image"
                                                     :src="`/images/catalog/${productOnModal.product.image}`">
                                            </div>
                                            <div class="col-md-6 content-left">
                                                <span class="badge badge-success">{{productOnModal.product.brand}}</span>
                                                <h5 class="font-weight-bold card-text mt-2 mb-3 capitalize">
                                                    {{productOnModal.product.name}}
                                                </h5>
                                                <div class="mt-3 mb-4">
                                                    <table class="table table-borderless price-overview">
                                                        <thead>
                                                        <th class="pl-0">Plan</th>
                                                        <th class="text-center">1st Payment</th>
                                                        <th class="text-right pr-0">Repayment</th>
                                                        </thead>
                                                        <tbody>
                                                        <tr>
                                                            <td class="pl-0">20%</td>
                                                            <td class="text-center">
                                                                {{productOnModal.twentyPercentFirstPayment}}
                                                            </td>
                                                            <td class="text-right pr-0">
                                                                {{productOnModal.twentyPercentRepayment}}
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td class="pl-0">40%</td>
                                                            <td class="text-center">
                                                                {{productOnModal.fortyPercentFirstPayment}}
                                                            </td>
                                                            <td class="text-right pr-0">
                                                                {{productOnModal.fortyPercentRepayment}}
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
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    import Spinner from "../../components/Spinner.vue";
    //import Auth from "../../store/auth";
    import {get} from "../../helpers/api";
    // import {get, del} from "../../helpers/api";
    import Sidebar from "../../components/Sidebar.vue";
    import ProductCard from "../../components/ProductCard";

    import {Product} from '../../helpers/Product';

    export default {
        components: {Sidebar, Spinner, ProductCard},
        data() {
            return {
                //authState: Auth.state,
                //isRemoving: false,
                products: [],

                productOnModal: null,

                /*viewMore: {
                    brand_id: null,
                    category_id: null,
                    created_at: null,
                    features: null,
                    id: null,
                    image: null,
                    name: null,
                    fourty_price: null,
                    twenty_price: null,
                    updated_at: null,
                    user_id: null,
                    brand: null
                }*/
            };
        },
        created() {
            get("/api/products").then(({data}) => {
                let productObjectsArray,
                    {brands, products} = data;
                productObjectsArray = products.map(product => {
                    brands.forEach(brand => {
                        if (product.brand_id === brand.id)
                            product.brand = brand.brand;
                    });
                    return (new Product(product));
                });
                this.products = productObjectsArray;
            });
        },
        methods: {


            showMore(product) {
                this.productOnModal = null;
                this.productOnModal = product;
                $("#display-product-modal").modal("show");

                /*this.viewMore.brand_id = productData.brand_id;
                this.viewMore.category_id = productData.category_id;
                this.viewMore.created_at = productData.created_at;
                this.viewMore.features = productData.features;
                this.viewMore.id = productData.id;
                this.viewMore.image = productData.image;
                this.viewMore.name = productData.name;
                this.viewMore.fourty_price = productData.fourty_price;
                this.viewMore.twenty_price = productData.twenty_price;
                this.viewMore.updated_at = productData.updated_at;
                this.viewMore.user_id = productData.user_id;
                this.viewMore.brand = productData.brand;*/
            },
            /* remove() {
                 this.isRemoving = false;
                 del(`/api/products/${this.$route.params.id}`).then(res => {
                     if (res.data.deleted) {
                         Flash.setSuccess("You have successfully deleted Product!");
                         this.$router.push("/");
                     }
                 });
             }*/
        }
    };
</script>
<style>

</style>
