import Vue from 'vue'
import axios from 'axios'

const state = Vue.observable({
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
  }
});

export const getters = {
    loading: () => state.loading,
    alert: () => state.alert,
    lang: () => state.lang,
    _: () => _,
}

export const mutations = {
    setLoading: (val) => state.loading = val,
    setLang: (lang) => state.lang = lang,
    setAlert: (data) => {
      console.log(data);
      if(_.get(data, 'showAlert')) state.alert.showAlert = data.showAlert
      if(_.get(data, 'type')) state.alert.type = data.type
      if(_.get(data, 'removeIcon')) state.alert.removeIcon = data.removeIcon
      if(_.get(data, 'disableAnimation')) state.alert.disableAnimation = data.disableAnimation
      if(_.get(data, 'dismissible')) state.alert.dismissible = data.dismissible
      if(_.get(data, 'timer')) state.alert.timer = data.timer
      if(_.get(data, 'message')) state.alert.message = data.message
      console.log(state.alert);
    },
    closeAlert : () => {
        console.log('calosealert');
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
