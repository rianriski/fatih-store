require("./bootstrap");

window.Vue = require("vue");
import VueRouter from "vue-router";
import VueCurrencyFilter from 'vue-currency-filter'

Vue.use(VueRouter);
Vue.use(VueCurrencyFilter,
    {
      symbol : 'Rp.',
      thousandsSeparator: '.',
      fractionCount: 0,
      fractionSeparator: ',',
      symbolPosition: 'front',
      symbolSpacing: true
    });

import routes from "./routes";
import "./icons";
import "./component";

const app = new Vue({
    el: "#app",
    router: new VueRouter(routes)
});
