import Vue from 'vue'
import VueRouter from 'vue-router'
import Login from '../views/Auth/Login.vue'
import Register from '../views/Auth/Register.vue'
import Catalog from '../views/Catalog/Index.vue'
import Create from '../views/Catalog/Create.vue'
import NotFound from '../views/NotFound.vue'
import Vue2Filters from 'vue2-filters'
 
Vue.use(Vue2Filters);
Vue.use(VueRouter);
const router = new VueRouter({
    mode: 'history',
    routes: [
        { path: '/', component: Catalog, meta: { mode: 'catalog' } },
        /*{ path: '/login', component: Login, meta: { mode: 'login' } },
        { path: '/register', component: Register, meta: { mode: 'register' } },*/
        { path: '/catalog', component: Catalog, meta: { mode: 'catalog' } },
        /*{ path: '/product/create', component: Create, meta: { mode: 'create' } },
        { path: '/product/:id/edit', component: Create, meta: { mode: 'edit' } },*/
        { path: '/not-found', component: NotFound },
        { path: '*', component: NotFound },
    ]
});

export default router