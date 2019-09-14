<template>
    <div class="col-md-3">


        <!-- Tabs with icons -->
        <div class="mb-3">
            <small class="text-uppercase font-weight-bold">Product Category</small>
        </div>
        <div class="nav-wrapper">
            <ul class="nav nav-pills nav-fill flex-column flex-md-row" id="tabs-icons-text" role="tablist">
                <li class="nav-item">
                    <a class="nav-link mb-sm-3 mb-md-0 active" id="tabs-icons-text-1-tab" data-toggle="tab"
                       href="#tabs-icons-text-1" role="tab" aria-controls="tabs-icons-text-1" aria-selected="true"><i
                            class="ni ni-cloud-upload-96 mr-2"></i>Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link mb-sm-3 mb-md-0" id="tabs-icons-text-2-tab" data-toggle="tab"
                       href="#tabs-icons-text-2" role="tab" aria-controls="tabs-icons-text-2" aria-selected="false"><i
                            class="ni ni-bell-55 mr-2"></i>Profile</a>
                </li>
            </ul>
        </div>
        <div class="card shadow">
            <div class="card-body">
                <div class="tab-content" id="myTabContent">
                    <div class="tab-pane fade active show" id="tabs-icons-text-1" role="tabpanel"
                         aria-labelledby="tabs-icons-text-1-tab">
                        <div v-for="category in categories">
                            <router-link class="list-group-item" :to="`/product/category/${category.id}`">
                                <i class="fa fa-list"></i> &nbsp;
                                <span class="hidden-sm-down">{{category.category}}</span>
                            </router-link>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="tabs-icons-text-2" role="tabpanel"
                         aria-labelledby="tabs-icons-text-2-tab">
                        <p class="description">Cosby sweater eu banh mi, qui irure terry richardson ex squid. Aliquip
                            placeat salvia cillum iphone. Seitan aliquip quis cardigan american apparel, butcher
                            voluptate nisi qui.</p>
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
                    console.log(localStorage.getItem('categories'));
                })
        }
    }
</script>
