require('./bootstrap');

window.Vue= require('vue');
window.swal = require('sweetalert');

Vue.component('products', require('./components/ProductComponent.vue'));

const app= new Vue({
    el = '#app'
})
