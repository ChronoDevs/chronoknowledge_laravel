require('./bootstrap')

import Vue from 'vue'
import App from './pages/App'
import router from './config/routes.js'

const app = new Vue({
    el: '#app',
    components: { App },
    router
})