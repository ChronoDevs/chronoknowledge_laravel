require('./bootstrap')

import Vue from 'vue'
import App from './pages/App'
import axios from './config/axios.js'
import router from './config/routes.js'

console.log(router);
Vue.prototype.$http = axios

const app = new Vue({
    el: '#app',
    components: { App },
    router
})