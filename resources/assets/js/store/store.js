import Vue from 'vue';
import Vuex from 'vuex';
import 'es6-promise/auto';
import Types from "./types";
import createLogger from 'vuex/dist/logger';

Vue.use(Vuex);
const IN_APP_IMAGE_PATH = '/images/catalog/';
const AWS_IMAGE_PATH = 'https://s3.eu-west-2.amazonaws.com/altara-one/product/';
const IN_DEVELOPMENT = process.env.NODE_ENV !== 'production';

const store = new Vuex.Store({
    plugins: IN_DEVELOPMENT ? [createLogger()] : [],

    strict: IN_DEVELOPMENT,

    state: {
        imagePath: IN_DEVELOPMENT ? IN_APP_IMAGE_PATH : AWS_IMAGE_PATH
    },

    getters: {
        [Types.GET_IMAGE_PATH]: state => state.imagePath
    },

    mutations: {
        [Types.SET_IMAGE_PATH]: (state, newImagePath) => Vue.set(state, 'imagePath', newImagePath)
    },

    actions: {
        [Types.SET_IMAGE_PATH]: ({commit}, newImagePath) => commit(Types.SET_IMAGE_PATH, newImagePath)
    }
});

export default store;
