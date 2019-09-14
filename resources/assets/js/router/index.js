import Vue from 'vue'
import VueRouter from 'vue-router'
import Catalog from '../views/Catalog/Index.vue'
import NotFound from '../views/NotFound.vue'
import Vue2Filters from 'vue2-filters'

Vue.use(Vue2Filters);
Vue.use(VueRouter);
const router = new VueRouter({
    mode: 'history',
    routes: [
        {path: '/', component: Catalog, meta: {mode: 'catalog'}},
        {path: '/catalog', component: Catalog, meta: {mode: 'catalog'}},
        {path: '/not-found', component: NotFound},
        {path: '*', component: NotFound},
    ]
});

export default router