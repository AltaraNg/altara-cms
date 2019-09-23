<template>
    <div class="card shadow-sm product-card border-0">
        <img class="card-img-top" v-if="product.product.img_url"
             :src="AWS_IMAGE_URL + product.product.img_url">
        <!--:src="`/images/catalog/${product.product.img_url}`">-->
        <div class="card-body details px-4 py-3">
            <h6 class="font-weight-bold mt-0 mb-0 capitalize mx-1">
                {{product.product.name}}
                <small class="badge badge-success float-right">{{product.product.brand.name}}</small>
            </h6>
            <table class="table table-borderless price-overview table-sm mb-0">
                <thead>
                <th>Plan</th>
                <th class="text-center">Down Payment</th>
                <th class="text-right">Repayment</th>
                </thead>
                <tbody>
                <tr class="">
                    <td>
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
                    <td class="text-center align-middle">{{product.priceSummary.downPayment | currency('₦')}}</td>
                    <td class="text-right align-middle">{{product.priceSummary.repaymentPrice | currency('₦')}}</td>
                </tr>
                <tr>
                    <td colspan="3" class="text-center text-light font-weight-lighter my-2">
                        <small>NB: The price above is for {{salesPlan}}% 6 months plan.</small>
                    </td>
                </tr>
                </tbody>
            </table>
            <div class="col-md-12 d-flex justify-content-center">
                <button @click="$emit('view-details', product)" class="btn btn-warning py-2">view details</button>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        props: ['product', 'salesPlans'],
        data() {
            return {
                salesPlan: 40,
                AWS_IMAGE_URL: "https://s3.eu-west-2.amazonaws.com/altara-one/product/"
            }
        },
        watch: {
            'salesPlan': function (newSalesPlan) {
                this.product.calcPriceSummary(newSalesPlan);
            }
        }
    }
</script>

<style scoped>
    .form-control-sm {
        height: calc(2rem + 2px) !important;
        padding: 0.5rem 1.4rem 0.5rem 0.7rem !important;
    }
</style>