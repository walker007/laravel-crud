import Vue from 'vue/dist/vue.js';
import money from 'v-money'
import VueTheMask from 'vue-the-mask'

Vue.use(VueTheMask)
Vue.use(money);

var app = new Vue({
    el: '#app',
});

window.confimDelete = function(formId, msg) {
    const form = document.getElementById(formId);

    let confirmacao = confirm(msg);

    if (confirmacao) {
        form.submit();
    }
};