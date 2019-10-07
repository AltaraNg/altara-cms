<template>
    <div class="col-md-3">
        <div class="mb-2">
            <h6 class="text-uppercase font-weight-bold">Product Category</h6>
        </div>
        <div class="nav-wrapper">
            <ul class="nav nav-pills nav-fill flex-column flex-md-row" id="tabs-icons-text" role="tablist">
                <li class="nav-item">
                    <a class="nav-link mb-sm-3 mb-md-0 active" data-toggle="tab" href="#appliance" role="tab"
                       aria-selected="true">
                        Appliance
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link mb-sm-3 mb-md-0" data-toggle="tab" href="#lifestyle" role="tab"
                       aria-selected="false">
                        Lifestyle
                    </a>
                </li>
            </ul>
        </div>
        <div class="card border-0 shadow-sm mb-xlg">
            <div class="card-body p-0">
                <div class="tab-content" id="myTabContent">
                    <div class="tab-pane fade active show" id="appliance" role="tabpanel">
                        <div class="category-item clearfix active-category" data-id="0">
                            <span class="float-left w-100 py-3 px-4" @click="emitGetProductsById(0)">
                                <i class="fa fa-list mr-2"></i>
                                <span class="hidden-sm-down">All Categories</span>
                                <i class="fas fa-angle-double-right float-right" data-type="caret"></i>
                            </span>
                        </div>
                        <div v-for="category in categories"
                             :data-id="category.id"
                             v-if="categories.length > 0"
                             class="category-item clearfix my-1">
                            <span class="float-left w-100 py-3 px-4" @click="emitGetProductsById(category.id)">
                                <i class="fa fa-list mr-2"></i>
                                <span class="hidden-sm-down">{{category.name}}</span>
                                <i class="fas fa-angle-double-right float-right" data-type="caret"></i>
                            </span>
                        </div>
                        <custom-spinner v-else/>
                    </div>
                    <div class="tab-pane fade" id="lifestyle" role="tabpanel">
                        <div class="category-item clearfix">
                            <span class="float-left w-100 py-4 px-4">
                                <i class="fa fa-list mr-2"></i>
                                <span class="hidden-sm-down">All Categories</span>
                            </span>
                        </div>
                        <div class="category-item clearfix">
                            <span class="float-left w-100 py-4 px-4">
                                <i class="fa fa-list mr-2"></i>
                                <span class="hidden-sm-down">Double sofa</span>
                            </span>
                        </div>
                        <div class="category-item clearfix">
                            <span class="float-left w-100 py-4 px-4">
                                <i class="fa fa-list mr-2"></i>
                                <span class="hidden-sm-down">Kitchen</span>
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    import {get} from '../helpers/api';
    import {EventBus} from "../helpers/event-bus";

    export default {
        data() {
            return {
                categories: []
            }
        },
        created() {
            this.getCategories();
            this.updateClassOnProductAvailability();
        },
        methods: {
            emitGetProductsById(id) {
                $('.category-item').removeClass('active-category');
                $(`.category-item[data-id=${id}]`).addClass('active-category');
                this.$emit('get-products-by-category', id)
            },

            getCategories() {
                get('/api/category').then(({data}) => this.setCategories(data));
            },

            setCategories({categories}) {
                localStorage.setItem("categories", JSON.stringify(categories));
                this.categories = categories
            },

            updateClassOnProductAvailability() {
                let sideNav = $('div.card'), className = 'mb-xlg';
                EventBus.$on('isProductAvailable', isProductAvailable =>
                    isProductAvailable ? sideNav.removeClass(className) : sideNav.addClass(className));
            }
        }
    }
</script>

<style scoped>
    .mb-xlg {
        margin-bottom: 20rem;
    }
</style>