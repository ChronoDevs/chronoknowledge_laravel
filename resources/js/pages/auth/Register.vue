<template>
  <div id="$v.registerComponent" class="h-screen flex content-center justify-center">
    <form class="h-auto w-[600px] m-auto bg-white shadow-gray-900 shadow-xl">
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
              <error-input></error-input>
            </div>
          </div>
          <div class="grid sm:grid-cols-2 gap-5">
            <div>
              <input v-model="$v.register.email.$model" class="h-12 w-full rounded-lg border-t-btn" type="email" placeholder="E-mail" /></input>
              <!-- <error-input></error-input> -->
            </div>
            <div>
              <input v-model="$v.register.username.$model" class="h-12 w-full rounded-lg border-t-btn" type="text" placeholder="Username" /></input>
              <!-- <error-input></error-input> -->
            </div>
          </div>
          <div class="grid sm:grid-cols-2 gap-5">
            <div>
              <input v-model="$v.register.password.$model" class="h-12 w-full rounded-lg border-t-btn" type="password" placeholder="Password" /></input>
              <!-- <error-input></error-input> -->
            </div>
            <div>
              <input v-model="$v.register.password_confirmation.$model" class="h-12 w-full rounded-lg border-t-btn" type="password" placeholder="Confirm Password" /></input>
              <!-- <error-input></error-input> -->
            </div>
          </div>
          <div>
            <input v-model="$v.register.address.$model" class="h-12 w-full rounded-lg border-t-btn" type="text" placeholder="Address" /></input>
              <!-- <error-input></error-input> -->
          </div>
          <div class="grid sm:grid-cols-2 gap-5">
            <div>
              <input v-model="$v.register.zip_code.$model" class="h-12 w-full" type="text" pattern="[0-9]{5}" placeholder="Zip Code" />
              <!-- <error-input></error-input> -->
            </div>
            <div>
              <input v-model="$v.register.tel.$model" class="h-12 w-full rounded-lg border-t-btn" type="tel" placeholder="Telephone" /></input>
              <!-- <error-input></error-input> -->
            </div>
          </div>
        </div>

        <div class="r-field-opt grid gap-y-5">
          <div>
            <input v-model="$v.register.nick_name.$model" class="h-12 w-full rounded-lg border-t-btn" type="text" placeholder="Nickname" /></input>
              <!-- <error-input></error-input> -->
          </div>
          <div class="grid sm:grid-cols-2 gap-5">
            <div>
              <input v-model="$v.register.birth_date.$model" class="h-12 w-full rounded-lg border-t-btn" type="date" /></input>
              <!-- <error-input></error-input> -->
            </div>
            <div>
              <select v-model="$v.register.gender.$model" class="h-12 w-full rounded-lg border-t-btn" placeholder="Gender">
                <option value="0" selected>{{ lang.get('words.Male') }}</option>
                <option value="1">{{ lang.get('words.Female') }}</option>
              </select>
              <error-input></error-input>
            </div>
          </div>
        </div>
        <button @click.prevent="submit" class="h-12 rounded-lg bg-t-create font-bold" type="submit">{{ lang.get('words.SignUp') }}</button>
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
        gender: ''
      },
      errors: null
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
        required, sameAsPassword: sameAs('register.password'),
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
          console.log(this.birth_date)
          return moment(this.birth_date).isValid()
        }
      },
      gender: {
        required
      }
    }
  },
  // created() {
  //   // Custom Validations
  //   const isDate = helpers.withParams({minDate: currentDate.format('DD.MM.YYYY')}, value => moment(value, 'DD.MM.YYYY', true).isSameOrAfter(currentDate))
  // },
  mounted () {
    //
    console.log(this.$v);
  },
  computed: {
    ...getters
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