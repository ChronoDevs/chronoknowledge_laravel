import Vue from 'vue'
import axios from 'axios'

const state = Vue.observable({
  loading: false
});

export const getters = {
    loading: () => {
      return state.loading
    },
}

export const mutations = {
    setLoading: (val) => {
      state.loading = val
    }
}

export const actions = {
  //
}
