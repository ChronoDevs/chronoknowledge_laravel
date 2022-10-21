
<template>
  <div>
    <div class="loading"></div>
    <img class="h-12 loaderCenter" style="z-index: 9999" src="../../assets/chronostep.png" />
  </div>
</template>

<script>
  import Vue from "vue";
  import { getters, mutations, actions } from "../store";

  export default {
    data() {
      return {
        //
      };
    },
    beforeMount() {
    },
    computed: {
      ...getters
    },
    methods: {
      ...mutations,
      ...actions
    }
  };
</script>

<style scoped lang="scss">
@import '../../sass/imports';
.loading {
  position: absolute;
  top: 0; right: 0; bottom: 0; left: 0;
  width: 100%;
  height: 100%;
  background-color: rgb(24, 25, 26, 0.5);
  z-index: $z-index-level-6;
}

</style>