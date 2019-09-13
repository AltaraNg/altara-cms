<template>
    <div class="card shadow-sm h-100 custom-border-radius">
        <img class="card-img-top" v-if="product.product.image" :src="`/images/catalog/${product.product.image}`">
        <div class="card-body">
            <h6 class="font-weight-bold card-text mt-2 mb-3 capitalize mx-2 px-1">
                {{product.product.name}}
                <span class="badge badge-success float-right">{{product.product.brand}}</span>
            </h6>
            <div class="my-2">
                <table class="table table-borderless price-overview">
                    <thead>
                    <th>Plan</th>
                    <th>1st Payment</th>
                    <th>Repayment</th>
                    </thead>
                    <tbody>
                    <tr>
                        <td>20%</td>
                        <td>{{product.twentyPercentFirstPayment}}</td>
                        <td>{{product.twentyPercentRepayment}}</td>
                    </tr>
                    <tr>
                        <td>40%</td>
                        <td>{{ product.fortyPercentFirstPayment}}</td>
                        <td>{{product.fortyPercentRepayment}}
                        </td>
                    </tr>
                    </tbody>
                </table>
            </div>
            <div class="row my-2">
                <div class="col-md-12 d-flex justify-content-center">
                    <button @click="showMore" class="btn btn-warning">view details</button>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        props: ['product'],

        methods: {
            showMore() {
                this.$emit('view-details', this.product);
            }
        }
    }
</script>