<template>
  <div id="$v.registerComponent" class="h-screen flex content-center justify-center">
    <form class="h-auto w-[600px] m-auto bg-white shadow-gray-900 shadow-xl relative">
      <div v-show="loading" class="absolute w-full h-full bg-form-overlay"></div>
      <div class="r-link grid grid-cols-2 m-10 font-bold border-t-btn">
        <button type="button" class="h-12 text-black">{{ lang.get('SignIn') }}</button>
        <button type="button" class="h-12 bg-t-btn text-white">{{ lang.get('SignUp') }}</button>
      </div>

      <div class="r-social r-social flex justify-center text-white text-center gap-x-10 mx-10 sm:mx-16">
        <button class="h-12 w-full rounded-lg bg-c-fb"><i class="fa-brands fa-facebook-f"></i></button>
        <button class="h-12 w-full rounded-lg bg-c-google text-white"><i class="fa-brands fa-google"></i></button>
      </div>
      <div class="r-field flex flex-col gap-10 m-10">
        <div class="r-field-required grid gap-y-5">
          <div>
            <input v-model.trim="$v.register.name.$model" class="h-12 w-full rounded-lg border-t-btn" type="text" placeholder="Name" /></input>
            <div class="errors">
              <error-input :name="true"></error-input>
            </div>
          </div>
          <div class="grid sm:grid-cols-2 gap-5">
            <div>
              <input v-model="$v.register.email.$model" class="h-12 w-full rounded-lg border-t-btn" type="email" placeholder="E-mail" /></input>
              <error-input :email="true"></error-input>
            </div>
            <div>
              <input v-model="$v.register.username.$model" class="h-12 w-full rounded-lg border-t-btn" type="text" placeholder="Username" /></input>
              <error-input :username="true"></error-input>
            </div>
          </div>
          <div class="grid sm:grid-cols-2 gap-5">
            <div>
              <input v-model="$v.register.password.$model" class="h-12 w-full rounded-lg border-t-btn" type="password" placeholder="Password" /></input>
              <error-input :password="true"></error-input>
            </div>
            <div>
              <input v-model="$v.register.password_confirmation.$model" class="h-12 w-full rounded-lg border-t-btn" type="password" placeholder="Confirm Password" /></input>
              <error-input :password_confirmation="true"></error-input>
            </div>
          </div>
          <div>
            <input v-model="$v.register.address.$model" class="h-12 w-full rounded-lg border-t-btn" type="text" placeholder="Address" /></input>
              <error-input :address="true"></error-input>
          </div>
          <div class="grid sm:grid-cols-2 gap-5">
            <div>
              <input v-model="$v.register.zip_code.$model" class="h-12 w-full" type="text" pattern="[0-9]{5}" placeholder="Zip Code" />
              <error-input :zip_code="true"></error-input>
            </div>
            <div>
              <input v-model="$v.register.tel.$model" class="h-12 w-full rounded-lg border-t-btn" type="tel" placeholder="Telephone" /></input>
              <error-input :tel="true"></error-input>
            </div>
          </div>
        </div>

        <div class="r-field-opt grid gap-y-5">
          <div>
            <input v-model="$v.register.nick_name.$model" class="h-12 w-full rounded-lg border-t-btn" type="text" placeholder="Nickname" /></input>
              <error-input :nick_name="true"></error-input>
          </div>
          <div class="grid sm:grid-cols-2 gap-5">
            <div>
              <input v-model="$v.register.birth_date.$model" class="h-12 w-full rounded-lg border-t-btn" type="date" /></input>
              <error-input :birth_date="true"></error-input>
            </div>
            <div>
              <select v-model="$v.register.gender.$model" class="h-12 w-full rounded-lg border-t-btn">
                <option value="0" :selected="$v.register.gender.$model == '0'">{{ lang.get('words.Male') }}</option>
                <option value="1" :selected="$v.register.gender.$model == '1'">{{ lang.get('words.Female') }}</option>
              </select>
              <error-input :gender="true"></error-input>
            </div>
          </div>
        </div>
        <ui-button @click.prevent="submit" :type="'create'" :size="'full'" :withLoading="loading">{{ lang.get('words.SignUp') }}</ui-button>
      </div>
    </form>
  </div>
</template>
<script>
import Vue from "vue";
import { getters, mutations, actions } from "../../store";
import { required, minLength, sameAs, email, helpers } from 'vuelidate/lib/validators'

export default {
  data() {
    return {
      register: {
        name: '',
        email: '',
        username: '',
        password: '',
        password_confirmation: '',
        address: '',
        zip_code: '',
        tel: '',
        nick_name: '',
        birth_date: '',
        gender: 0
      },
      errors: {}
    };
  },
  validations: {
    register: {
      name: {
        required, minLength: minLength(4), maxLength: 50
      },
      email: {
        required, email, minLength: minLength(4), maxLength: 50
      },
      username: {
        required, minLength: minLength(4), maxLength: 50
      },
      password: {
        required, minLength: minLength(4), maxLength: 60,
      },
      password_confirmation: {
        required
      },
      address: {
        minLength: minLength(4), maxLength: 100
      },
      zip_code: {
        required, maxLength: 8
      },
      tel: {
        minLength: minLength(11), maxLength: 11
      },
      nick_name: {
        minLength: minLength(4), maxLength: 20
      },
      birth_date: {
        required,
        isDate: function() {
          return moment(this.birth_date).isValid()
        }
      },
      gender: {
        required
      }
    }
  },
  mounted () {
    //
  },
  computed: {
    ...getters,
    inputName: function() { return this.$v.register.name.$error },
    inputEmail: function() { return this.$v.register.email.$error },
    inputUsername: function() { return this.$v.register.username.$error },
    inputPassword: function() { return this.$v.register.password.$error },
    inputPasswordC: function() { return this.$v.register.password_confirmation.$error },
    inputAddress: function() { return this.$v.register.address.$error },
    inputZipCode: function() { return this.$v.register.zip_code.$error },
    inputTel: function() { return this.$v.register.tel.$error },
    inputNickname: function() { return this.$v.register.nick_name.$error },
    inputBirthdate: function() { return this.$v.register.birth_date.$error },
    inputGender: function() { return this.$v.register.gender.$error }
  },
  methods: {
    ...mutations,
    ...actions,
    submit() {
      mutations.setLoading(true);
      this.errors = null;

      this.$http.post('api/register', this.register)
      .then( (response) => {
          if(_.has(response, 'data.errors')) {
            this.errors = response.data.errors;
          } else {
            // SUCCESS
            let alertData = {
              showAlert: true,
              type: 'success',
              message: 'Account is now registered.'
            };
            mutations.setAlert(alertData)
          }
       })
      .finally(() => {
        //
      })
    }
  },
  watch: {
      inputName: {
          handler(value) {
            this.errors.name = null
          }
      },
      inputEmail: {
          handler(value) {
            this.errors.email = null
          }
      },
      inputUsername: {
          handler(value) {
            this.errors.username = null
          }
      },
      inputPassword: {
          handler(value) {
            this.errors.password = null
          }
      },
      inputPasswordC: {
          handler(value) {
            this.errors.password_confirmation = null
          }
      },
      inputAddress: {
          handler(value) {
            this.errors.address = null
          }
      },
      inputZipCode: {
          handler(value) {
            this.errors.zip_code = null
          }
      },
      inputTel: {
          handler(value) {
            this.errors.tel = null
          }
      },
      inputBirthdate: {
          handler(value) {
            this.errors.birth_date = null
          }
      },
      inputGender: {
          handler(value) {
            this.errors.gender = null
          }
      },
      immediate: true,
      deep: true
  }
};
</script>
<style scoped lang="scss">
@import '../../../sass/imports';
  .border-t-btn {
    border: thin solid $brand-button-color;
  }
</style>