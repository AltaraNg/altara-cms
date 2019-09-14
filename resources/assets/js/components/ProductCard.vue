<template>
    <div class="card shadow-sm product-card border-0">
        <img class="card-img-top" v-if="product.product.image" :src="`/images/catalog/${product.product.image}`">
        <div class="card-body details">
            <h6 class="font-weight-bold mt-2 mb-3 capitalize mx-2 px-2">
                {{product.product.name}}
                <span class="badge badge-success float-right">{{product.product.brand}}</span>
            </h6>
            <div class="my-3">
                <table class="table table-borderless price-overview">
                    <thead>
                    <th>Plan</th>
                    <th class="text-center">1st Payment</th>
                    <th class="text-right">Repayment</th>
                    </thead>
                    <tbody>
                    <tr>
                        <td>20%</td>
                        <td class="text-center">{{product.twentyPercentFirstPayment}}</td>
                        <td class="text-right">{{product.twentyPercentRepayment}}</td>
                    </tr>
                    <tr>
                        <td>40%</td>
                        <td class="text-center">{{ product.fortyPercentFirstPayment}}</td>
                        <td class="text-right">{{product.fortyPercentRepayment}}
                        </td>
                    </tr>
                    </tbody>
                </table>
            </div>
            <div class="row my-2">
                <div class="col-md-12 d-flex justify-content-center">
                    <button @click="$emit('view-details', product)" class="btn btn-warning">view details</button>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        props: ['product']
    }
</script>