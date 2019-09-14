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
        <div class="card shadow-sm">
            <div class="card-body p-0">
                <div class="tab-content" id="myTabContent">
                    <div class="tab-pane fade active show" id="appliance" role="tabpanel">
                        <div v-for="category in categories" class="category-item py-4 px-4">
                            <router-link :to="`/product/category/${category.id}`">
                                <i class="fa fa-list mr-2"></i>
                                <span class="hidden-sm-down">{{category.category}}</span>
                            </router-link>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="lifestyle" role="tabpanel">
                        <div class="category-item py-4 px-4">
                            <a href="#">
                                <i class="fa fa-list mr-2"></i>
                                <span class="hidden-sm-down">Dinning table</span>
                            </a>
                        </div>
                        <div class="category-item py-4 px-4">
                            <a href="#">
                                <i class="fa fa-list mr-2"></i>
                                <span class="hidden-sm-down">Double Sofa</span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    import {get} from '../helpers/api'

    export default {
        data() {
            return {
                categories: []
            }
        },
        created() {
            get('/api/category')
                .then((res) => {
                    localStorage.setItem("categories", JSON.stringify(res.data.categories));
                    this.categories = res.data.categories
                })
        }
    }
</script>
