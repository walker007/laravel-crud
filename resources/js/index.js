import Vue from 'vue/dist/vue.js';
import VueMask from 'v-mask'
import money from 'v-money'

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