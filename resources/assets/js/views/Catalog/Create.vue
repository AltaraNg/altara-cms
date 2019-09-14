<template>
    <!-- Page Content -->
    <div class="container-fluid">
        <div class="row">
            <sidebar></sidebar>
            <div class="col-md-9">
                <div class="card horizontal-form">
                    <div class="card-header ">
                        <h4 class="card-title">Product Description and Information</h4>
                    </div>
                    <div class="card-body ">
                        <form class="form-horizontal" v-on:submit.prevent>
                            <div class="row">
                                <div class="col-md-8">
                                    <div class="form-group">
                                        <div class="row">
                                            <label class="col-md-3 control-label">Product Name</label>
                                            <div class="col-md-9">
                                                <input type="text" v-model="product.name" class="form-control">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="row">
                                            <label class="col-md-3 control-label">Product Brand</label>
                                            <select class="col-md-9 form-control" v-model="product.brand_id" name=""
                                                    id="">
                                                <option v-for="brand in brands" v-bind:value="brand.id">
                                                    {{brand.brand}}
                                                </option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="row">
                                            <label class="col-md-3 control-label">Degree of Demand</label>
                                            <select class="col-md-9 form-control" v-model="product.popularity" name=""
                                                    id="">
                                                <option v-bind:value="1"> Low demand</option>
                                                <option v-bind:value="2"> Average demand</option>
                                                <option v-bind:value="3"> High demand</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="row">
                                            <label class="col-md-3 control-label">Product Category</label>
                                            <select class="col-md-9 form-control" v-model="product.category_id" name=""
                                                    id="">
                                                <option v-for="category in categories" v-bind:value="category.id">
                                                    {{category.category}}
                                                </option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="row">
                                            <label class="col-md-3 control-label">40% Price</label>
                                            <div class="col-md-9">
                                                <vue-numeric v-model="product.fourty_price" currency="₦"
                                                             class="form-control" separator=","></vue-numeric>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="row">
                                            <label class="col-md-3 control-label">20% Price</label>
                                            <div class="col-md-9">
                                                <vue-numeric v-model="product.twenty_price" class="form-control"
                                                             currency="₦" separator=","></vue-numeric>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="row">
                                            <label class="col-md-3 control-label">Features/Description</label>
                                            <div class="col-md-9">
                                                <textarea name="" id="" class="form-control" v-model="product.features"
                                                          cols="30" rows="10"></textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Upload Image</label>
                                        <div class="input-group">
                                                    <span class="input-group-btn">
                                                       <image-upload v-model="product.image"></image-upload>
				                            	<small class="error-control"
                                                       v-if="error.image">{{error.image[0]}}</small>
                                                    </span>
                                            <input type="text" class="form-control" readonly>
                                        </div>
                                        <!-- <img :src="`/images/${product.image}`" id='img-upload' v-if="product.image">
                                       <img :src="`/images/catalog/century-washing-m-1-medium.png`" width="350" height="200" v-else> -->
                                    </div>
                                </div>
                            </div>

                        </form>
                    </div>
                    <div class="card-footer ">
                        <div class="col-md-12 text-center">
                            <button type="submit" @click="save" :disabled="isProcessing" class="btn btn-fill btn-info">
                                Create Product
                            </button>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</template>

<script>
    import Vue from 'vue'
    import Auth from '../../store/auth'
    import Flash from '../../helpers/flash'
    import {get, post} from '../../helpers/api'
    import {toMulipartedForm} from '../../helpers/form'
    import Sidebar from '../../components/Sidebar.vue'
    import ImageUpload from '../../components/ImageUpload.vue'
    import VueNumeric from 'vue-numeric'

    export default {
        components: {
            Sidebar,
            ImageUpload,
            VueNumeric
        },
        data() {
            return {
                authState: Auth.state,
                product: {},
                error: {},
                isProcessing: false,
                initializeURL: `/api/products/create`,
                storeURL: `/api/products`,
                action: 'Create',
                categories: '',
                brands: ''
            }
        },
        created() {
            get('/api/category')
                .then((res) => {
                    this.brands = res.data.brands;
                    this.categories = res.data.categories;
                    console.log(this.brands)
                    console.log(this.categories)
                })
            if (this.$route.meta.mode === 'edit') {
                this.initializeURL = `/api/products/${this.$route.params.id}/edit`
                this.storeURL = `/api/products/${this.$route.params.id}?_method=PUT`
                this.action = 'Update'
            }
            get(this.initializeURL)
                .then((res) => {
                    console.log(this.$data)
                    Vue.set(this.$data, 'product', res.data.form)
                })
        },
        mounted() {
            $(this.$refs.vuemodal).on("hidden.bs.modal")
        },
        methods: {
            save() {
                this.product.user_id = this.authState.user_id;
                console.log(this.product);
                const form = toMulipartedForm(this.product, this.$route.meta.mode)
                console.log(form)
                post(this.storeURL, form)
                    .then((res) => {
                        if (res.data.saved) {
                            Flash.setSuccess(res.data.message)
                            this.$router.push(`/catalog`)
                        }
                        this.isProcessing = false
                    })
                    .catch((err) => {
                        if (err.response.status === 422) {
                            this.error = err.response.data
                        }
                        this.isProcessing = false
                    })
            },
        }
    }
</script>
<style>
    .btn-file {
        position: relative;
        overflow: hidden;
    }

    .btn-file input[type=file] {
        position: absolute;
        top: 0;
        right: 0;
        min-width: 100%;
        min-height: 100%;
        font-size: 100px;
        text-align: right;
        filter: alpha(opacity=0);
        opacity: 0;
        outline: none;
        background: white;
        cursor: inherit;
        display: block;
    }

    #img-upload {
        width: 100%;
    }
</style>
