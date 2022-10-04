<template>
  <div id="registerComponent" class="h-screen flex content-center justify-center">
    <form class="h-auto w-[600px] m-auto bg-white shadow-gray-900 shadow-xl">
      <div class="r-link grid grid-cols-2 m-10 font-bold border-t-btn">
        <button type="button" class="h-12 text-black">Sign In</button>
        <button type="button" class="h-12 bg-t-btn text-white">Sign Up</button>
      </div>
      <div class="r-social r-social flex justify-center text-white text-center gap-x-10 mx-10 sm:mx-16">
        <button class="h-12 w-full rounded-lg bg-c-fb"><i class="fa-brands fa-facebook-f"></i></button>
        <button class="h-12 w-full rounded-lg bg-c-google text-white"><i class="fa-brands fa-google"></i></button>
      </div>
      <div class="r-field r-field flex flex-col gap-10 m-10">
        <input v-model="register.name" class="h-12 rounded-lg border-t-btn" type="text" placeholder="Name" /></input>
        <input v-model="register.email" class="h-12 rounded-lg border-t-btn" type="email" placeholder="E-mail" /></input>
        <input v-model="register.password" class="h-12 rounded-lg border-t-btn" type="password" placeholder="Password" /></input>
        <input v-model="register.cpassword" class="h-12 rounded-lg border-t-btn" type="password" placeholder="Confirm Password" /></input>
        <button @click.prevent="submit" class="h-12 rounded-lg bg-t-create font-bold" type="submit">Sign In</button>
      </div>
    </form>
  </div>
</template>
<script>
  import Vue from "vue";
// import TopNav from  '../components/core/TopNav.vue'
import { getters, mutations, actions } from "../../store";

export default {
  data() {
    return {
      register: {}
    };
  },
  mounted () {
    //
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
    submit() {
      console.log('submit')
      mutations.setLoading(true)

      this.$http
      .post('api/register', this.register)
      .then(function(response){
        console.log('then')
        console.log(response.data)
        router.push("login")
      })
      .finally(function (){
        console.log('finally');
        mutations.setLoading(false)
      })
    }
  },
};
</script>
<style scoped lang="scss">
@import '../../../sass/imports';
  .border-t-btn {
    border: thin solid $brand-button-color;
  }
</style>