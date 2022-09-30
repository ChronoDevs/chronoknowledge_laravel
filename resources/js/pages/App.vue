<template>
  <div>
    <!-- <top-nav></top-nav>
    <main class="p-10">
      <router-view></router-view>
    </main>
    <footer></footer> -->

    <!-- To do: create a custom Ui Button -->
    <!-- <UiButton
      :loading="uiButton.loading"
      :type="uiButton.type"
      :size="uiButton.size"
      :withIcon="uiButton.withIcon"
      :iconPosition="uiButton.iconPosition"
      :disabled="uiButton.disabled">{{ uiButton.text }}</UiButton> -->

    <!-- To do: create a custom Ui Alert -->
    <UiAlert
      @dismiss="closeAlert"
      v-show="uiAlert.showAlert"
      :type="uiAlert.type"
      :removeIcon="uiAlert.isRemoveIcon"
      :disableAnimation="uiAlert.isDisableAnimation"
      :dismissible="true"
      :timer="10"
    >
      {{ uiAlert.text }}
    </UiAlert>
  </div>
</template>

<script>
import Vue from "vue";
// import TopNav from  '../components/core/TopNav.vue'
import { getters, mutations, actions } from "../store";

Vue.component("UiButton", require("../components/UiButton.vue").default);
Vue.component("UiAlert", require("../components/UiAlert.vue").default);
Vue.component("ClipLoader", require("vue-spinner/src/ClipLoader.vue").default);

export default {
  // components: { TopNav },
  data() {
    return {
      uiAlert: {
        type: "success",
        isRemoveIcon: false,
        isDisableAnimation: false,
        showAlert: true,
        text: "This is a random alert text. Thank you very much.",
        timer: 10
      },
      uiButton: {
        type: "create",
        text: "Create Room",
        size: "normal",
        withIcon: true,
        iconPosition: "left",
        disabled: false,
        loading: false,
      },
    };
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
  },
};
</script>
