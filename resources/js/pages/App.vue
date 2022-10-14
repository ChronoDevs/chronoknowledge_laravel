<template>
  <div>
    <!-- <top-nav></top-nav>
    <main class="p-10">
      <router-view></router-view>
    </main>
    <footer></footer> -->
    <router-link :to="{ name: 'login' }">Login</router-link>
    <router-link :to="{ name: 'register' }">Register</router-link>
    <router-view></router-view>

    <ui-alert
        :showAlert="alert.showAlert"
        :type="alert.type"
        :removeIcon="alert.removeIcon"
        :disableAnimation="alert.disableAnimation"
        :dismissible="alert.dismissible"
        :timer="alert.timer">
        {{ alert.message }}
    </ui-alert>
  </div>
</template>

<script>
import Vue from "vue";
import { getters, mutations, actions } from "../store";

Vue.component("UiButton", require("../components/UiButton.vue").default);
Vue.component("UiAlert", require("../components/UiAlert.vue").default);
Vue.component("ErrorInput", require("../components/ErrorInput.vue").default);
Vue.component("ClipLoader", require("vue-spinner/src/ClipLoader.vue").default);

export default {
  data() {
    return {
      //
    };
  },
  beforeMount() {
    this.initApp()
  },
  computed: {
    ...getters
  },
  methods: {
    ...mutations,
    ...actions,
    initApp() {
      mutations.setLoading(true)
      let user = localStorage['chronoknowledge.user']? JSON.parse(localStorage['chronoknowledge.user']) : null

      if(user) {
        mutations.setUser(user)
      }
    }
  }
};
</script>
