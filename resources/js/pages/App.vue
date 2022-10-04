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
  </div>
</template>

<script>
import Vue from "vue";
import { getters, mutations, actions } from "../store";

Vue.component("UiButton", require("../components/UiButton.vue").default);
Vue.component("UiAlert", require("../components/UiAlert.vue").default);
Vue.component("ClipLoader", require("vue-spinner/src/ClipLoader.vue").default);

export default {
  data() {
    return {
    };
  },
  mounted () {
    this.initApp()
  },
  computed: {
    // ...getters
  },
  methods: {
    ...mutations,
    ...actions,
    closeAlert() {
      this.uiAlert.showAlert = false;
    },
    initApp() {
      mutations.setLoading(true)

      this.$http
      .get('api/login')
      .then(function(response){
        localStorage.setItem("module.jwt", response.data.token);
      })
      .finally(function (){
        mutations.setLoading(false)
      })
    }
  },
};
</script>
