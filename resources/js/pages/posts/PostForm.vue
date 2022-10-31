<template>
  <div id="postFormComponent" class="flex content-center justify-center my-24">
    <form class="h-auto w-[600px] m-auto bg-bt-secondary shadow-gray-900 shadow-xl relative rounded-md border border-white">
      <div v-show="loading" class="absolute w-full h-full bg-form-overlay"></div>
      <div class="m-10">
        <h3 class="text-center font-bold">
          <span>{{ lang.get('words.CreatePost') }}</span>
        </h3>
      </div>
      <div class="r-field flex flex-col gap-10 m-10">
        <div class="r-field-required grid gap-y-5">
          <div>
            <label class="grid gap-y-2">
              <span class="font-bold">{{ lang.get('words.Title') }}</span>
              <input v-model.trim="$v.form.title.$model" class="h-14 w-full rounded-lg bg-b-input border-b-input focus:placeholder:opacity-0" type="text" placeholder="Title"/>
            </label>
            <div class="errors">
              <error-input :name="'title'" :validations="['required', 'max.string', 'min.string']"></error-input>
            </div>
          </div>
          <div>
            <label class="grid gap-y-2">
              <span class="font-bold">{{ lang.get('words.PlaneDescription') }}</span>
              <input v-model.trim="$v.form.plane_description.$model" class="h-14 w-full rounded-lg bg-b-input border-b-input focus:placeholder:opacity-0" type="text" placeholder="Plane Description"/>
            </label>
            <div class="errors">
              <error-input :name="'plane_description'" :validations="['required']"></error-input>
            </div>
          </div>
        </div>
        <ui-button @click.prevent="submit" :type="'create'" :size="'full'" :withLoading="loading" :disabled="
        $v.form.$anyError || !$v.form.$anyDirty || isInvalid" class="text-white">
          <span class="font-bold">{{ lang.get('words.Continue') }}</span>
        </ui-button>
      </div>
    </form>
  </div>
</template>
<script>
import Vue from "vue";
import { getters, mutations, actions } from "../../store";
import { required, minLength, maxLength, sameAs, email, helpers } from 'vuelidate/lib/validators'

export default {
  data() {
    return {
      form: {
        title: '',
        plane_description: ''
      },
      errors: {}
    };
  },
  validations: {
    form: {
      title: {
        required, minLength: minLength(2), maxLength: maxLength(100)
      },
      plane_description: {
        required
      }
    }
  },
  mounted () {
    //
  },
  computed: {
    ...getters,
    inputTitle: function() { return this.$v.form.title.$error },
    inputPlaneDescription: function() { return this.$v.form.plane_description.$error},
    isInvalid: function() {
      return _.values(this.form).some((v) => {
        return v === '' || v === false
      });
    }
  },
  methods: {
    ...mutations,
    ...actions
    // submit() {
    //   mutations.setLoading(true);
    //   this.errors = null;
    //   let formData = this.formData

    //   this.$http.post('api/register', formData)
    //   .then( (response) => {
    //       if(_.has(response, 'data.errors')) {
    //         this.errors = response.data.errors;
    //       } else {
    //         // SUCCESS
    //         let alertData = {
    //           showAlert: true,
    //           type: 'success',
    //           message: 'Account is now formed.'
    //         };
    //         mutations.setAlert(alertData)
    //         this.$router.push('login')
    //       }
    //    })
    //   .finally(() => {
    //     mutations.setLoading(false)
    //     //
    //   })
    // }
  },
  watch: {
      inputTitle: {
          handler(value) {
            this.errors.title = null
          }
      },
      inputPlaneDescription: {
          handler(value) {
            this.errors.plane_description = null
          }
      },
      immediate: true,
      deep: true
  }
};
</script>
<style scoped lang="scss">
@import '../../../sass/imports';
  .border-b-input {
    border: thin solid $brand-bg-input;
  }
</style>