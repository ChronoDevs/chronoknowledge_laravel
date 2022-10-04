import Vue from 'vue'
import appConfig from './app.env'
import axios from 'axios'
import { getters, mutations, actions } from '../store'

const instance = axios.create({
    baseURL: appConfig.SERVER_URL
  })

// before a request is made
instance.interceptors.request.use(config => {

  config.headers['Content-Type'] = 'application/json'
  config.headers['Authorization'] = 'Bearer ' + localStorage.getItem('module.jwt')

  mutations.setLoading(true)
  return config
})


instance.interceptors.response.use(response => {

  mutations.setLoading(false)
  return response
})

export default instance
