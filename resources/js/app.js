import Vue from "vue";
 import VueRouter from "vue-router";
import router from "./vueJs/router";
import VuEx from "vuex";
import StoreData from "./vueJs/store";
import Vuetify from 'vuetify';
import 'vuetify/dist/vuetify.min.css';
import 'vuetify/dist/vuetify.min.css'
import 'vuetify/dist/vuetify';

window.Vue = require('vue').default;
Vue.component('app', require('./components/particles/app.vue').default);
Vue.use(VuEx);
Vue.use(Vuetify)

require("./bootstrap");
window.Vue = require("vue").default;

Vue.use(VueRouter);
const app = new Vue({

    store: new VuEx.Store(StoreData),
    el: "#app",
    router: router,
    vuetify:new Vuetify(),

});
