import Vue from 'vue'
import axios from 'axios'

const state = Vue.observable({
  user: null,
  loading: false,
  lang: null,
  alert: {
    showAlert: false,
    type: 'info',
    removeIcon: false,
    disableAnimation: false,
    dismissible: true,
    timer: 10,
    message: ''
  },
  loader: {
    color: 'black',
    size: '24px'
  }
});

export const getters = {
    loading: () => state.loading,
    loaderColor: () => state.loaderColor,
    alert: () => state.alert,
    lang: () => state.lang,
    _: () => _,
    loader: () => state.loader,
    user: () => state.user
}

export const mutations = {
    setUser: (data) => state.user = data,
    setLoading: (val) => state.loading = val,
    setLang: (lang) => state.lang = lang,
    setAlert: (data) => {
      if(_.get(data, 'showAlert')) state.alert.showAlert = data.showAlert
      if(_.get(data, 'type')) state.alert.type = data.type
      if(_.get(data, 'removeIcon')) state.alert.removeIcon = data.removeIcon
      if(_.get(data, 'disableAnimation')) state.alert.disableAnimation = data.disableAnimation
      if(_.get(data, 'dismissible')) state.alert.dismissible = data.dismissible
      if(_.get(data, 'timer')) state.alert.timer = data.timer
      if(_.get(data, 'message')) state.alert.message = data.message
    },
    closeAlert : () => {
        mutations.resetAlert()
    },
    resetAlert: () => {
      state.alert = {
        showAlert: false,
        type: 'info',
        removeIcon: false,
        disableAnimation: false,
        dismissible: true,
        timer: 10,
        message: ''
      }
    }
}

export const actions = {
  //
}
