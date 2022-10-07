require('./bootstrap')

import Vue from 'vue'
import App from './pages/App'
import lang from './config/lang.js'
import axios from './config/axios.js'
import router from './config/routes.js'
import vuelidate from 'vuelidate'

import { getters, mutations, actions } from "./store";

Vue.use(router)
Vue.use(vuelidate)
Vue.prototype.$http = axios

const app = new Vue({
    el: '#app',
    components: { App },
    router,
    validations:{},
    created: function () {
        mutations.setLoading(true)

        this.$http.get('api/language')
        .then( response => {
            let source = {
                'en.words': response.data.words,
                'en.auth': response.data.auth
            }

            lang.setMessages(source)
            mutations.setLang(lang)
        })
        .finally(() => {
            mutations.setLoading(false)
        })
    },
    computed: {
        ...getters
    },
    methods: {
        ...mutations, ...actions,
    }
})