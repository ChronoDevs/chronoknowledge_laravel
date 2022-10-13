<template>
  <div id="registerComponent" class="h-screen flex content-center justify-center">
    <form class="h-auto w-[600px] m-auto bg-b-secondary shadow-gray-900 shadow-xl relative rounded-md border border-white">
      <div v-show="loading" class="absolute w-full h-full bg-form-overlay"></div>
      <div class="r-link m-10 font-bold">
        <h3 class="text-center">
          <span class="text-b-info">{{ lang.get('words.Chronostep') }}</span> <span class="text-b-create">{{ lang.get('words.Community') }}</span>
        </h3>
        <p class="text-center">{{ lang.get('words.WelcomeToChronoCommunity') }}</p>
        <div class="grid justify-center grid grid-cols-1 gap-4 my-10">
          <button type="button" class="h-14 w-full text-b-create bg-white border-2 border-b-create rounded-md">
            <i class="fa-brands fa-facebook mr-3 text-lg"></i>{{ lang.get('words.ContinueWithFacebook') }}
          </button>
          <button type="button" class="h-14 w-full text-b-info bg-white border-2 border-b-info rounded-md">
            <i class="fa-brands fa-google mr-3 text-lg"></i>{{ lang.get('words.ContinueWithGoogle') }}
          </button>
        </div>
        <p class="horizontal-line text-center">
          <span class="horizontal-line-text">
            <span class="text-b-mute">{{ lang.get('words.HaveAccount') }}</span> 
            <router-link :to="{ name: 'login' }" class="text-b-info">{{ lang.get('words.LogIn.') }}</router-link>
          </span>
        </p>
      </div>
      <div class="r-field flex flex-col gap-10 m-10">
        <div class="r-field-required grid gap-y-5">
          <div>
            <label class="grid gap-y-2">
              <span class="font-bold">{{ lang.get('words.FirstName') }}</span>
              <input v-model.trim="$v.register.first_name.$model" class="h-14 w-full rounded-lg bg-b-input border-b-input pl-6 focus:placeholder:opacity-0" type="text" placeholder="First Name" /></input>
            </label>
            <div class="errors">
              <error-input :first_name="true"></error-input>
            </div>
          </div>
          <div>
            <label class="grid gap-y-2">
              <span class="font-bold">{{ lang.get('words.MiddleName') }} <span class="text-b-mute">(optional)</span></span>
              <input v-model.trim="$v.register.middle_name.$model" class="h-14 w-full rounded-lg bg-b-input border-b-input pl-6 focus:placeholder:opacity-0" type="text" placeholder="Middle Name" /></input>
            </label>
            <div class="errors">
              <error-input :middle_name="true"></error-input>
            </div>
          </div>
          <div>
            <label class="grid gap-y-2">
              <span class="font-bold">{{ lang.get('words.LastName') }}</span>
              <input v-model.trim="$v.register.last_name.$model" class="h-14 w-full rounded-lg bg-b-input border-b-input pl-6 focus:placeholder:opacity-0" type="text" placeholder="Last Name" /></input>
            </label>
            <div class="errors">
              <error-input :last_name="true"></error-input>
            </div>
          </div>
          <div class="grid sm:grid-cols-2 gap-5">
            <div>
              <label class="grid gap-y-2">
                <span class="font-bold">{{ lang.get('words.Username') }}</span>
                <input v-model="$v.register.username.$model" class="h-14 w-full bg-b-input rounded-lg border-b-input pl-6 focus:placeholder:opacity-0" type="text" placeholder="Username" ></input>
              </label>
              <error-input :username="true"></error-input>
            </div>
            <div>
              <label class="grid gap-y-2">
                <span class="font-bold">{{ lang.get('words.Nickname') }}</span>
                <input v-model="$v.register.nick_name.$model" class="h-14 w-full bg-b-input rounded-lg border-b-input pl-6 focus:placeholder:opacity-0" type="text" placeholder="Nickname" /></input>
              </label>
              <error-input :nick_name="true"></error-input>
            </div>
          </div>
          <div class="grid sm:grid-cols-2 gap-5">
            <div>
              <label class="grid gap-y-2">
                <span class="font-bold">{{ lang.get('words.Gender') }}</span>
                <select v-model="$v.register.gender.$model" class="h-14 w-full bg-b-input rounded-lg border-b-input pl-6 focus:placeholder:opacity-0">
                  <option value="0" :selected="$v.register.gender.$model == '0'">{{ lang.get('words.Male') }}</option>
                  <option value="1" :selected="$v.register.gender.$model == '1'">{{ lang.get('words.Female') }}</option>
                </select>
              </label>
              <error-input :gender="true"></error-input>
            </div>
            <div>
              <label class="grid gap-y-2">
                <span class="font-bold">{{ lang.get('words.DateOfBirth') }}</span>
                <input v-model="$v.register.birth_date.$model" class="h-14 w-full bg-b-input rounded-lg border-b-input pl-6 focus:placeholder:opacity-0" type="date" /></input>
              </label>
              <error-input :birth_date="true"></error-input>
            </div>
          </div>
          <div class="grid sm:grid-cols-2 gap-5">
            <div>
              <label class="grid gap-y-2">
                <span class="font-bold">{{ lang.get('words.Gender') }}</span>
                <input v-model="$v.register.tel.$model" class="h-14 w-full rounded-lg bg-b-input border-b-input pl-6 focus:placeholder:opacity-0" type="tel" placeholder="Telephone" /></input>
              </label>
              <error-input :tel="true"></error-input>
            </div>
            <div>
              <label class="grid gap-y-2">
                <span class="font-bold">{{ lang.get('words.Zipcode') }}</span>
                <input v-model="$v.register.zip_code.$model" class="h-14 w-full rounded-lg bg-b-input pl-6 focus:placeholder:opacity-0" type="text" pattern="[0-9]{5}" placeholder="Zip Code" />
              </label>
              <error-input :zip_code="true"></error-input>
            </div>
          </div>
          <div class="grid sm:grid-cols-1 gap-5">
            <div>
              <label class="grid gap-y-2">
                <span class="font-bold">{{ lang.get('words.Address') }}</span>
                <input v-model="$v.register.address.$model" class="h-14 w-full rounded-lg bg-b-input border-b-input pl-6 focus:placeholder:opacity-0" type="text" placeholder="Address" /></input>
              </label>
              <error-input :address="true"></error-input>
            </div>
            <div>
              <label class="grid gap-y-2">
                <span class="font-bold">{{ lang.get('words.Email') }}</span>
                <input v-model="$v.register.email.$model" class="h-14 w-full rounded-lg bg-b-input border-b-input pl-6 focus:placeholder:opacity-0" type="email" placeholder="E-mail" /></input>
              </label>
              <error-input :email="true"></error-input>
            </div>
            <div>
              <label class="grid gap-y-2">
                <span class="font-bold">{{ lang.get('words.Password') }}</span>
                <input v-model="$v.register.password.$model" class="h-14 w-full rounded-lg bg-b-input border-b-input pl-6 focus:placeholder:opacity-0" type="password" placeholder="Password" /></input>
              </label>
              <error-input :password="true"></error-input>
            </div>
            <div>
              <label class="grid gap-y-2">
                <span class="font-bold">{{ lang.get('words.PasswordConfirmation') }}</span>
                <input v-model="$v.register.password_confirmation.$model" class="h-14 w-full rounded-lg bg-b-input border-b-input pl-6 focus:placeholder:opacity-0" type="password" placeholder="Confirm Password" /></input>
              </label>
              <error-input :password_confirmation="true"></error-input>
            </div>
          </div>
        </div>
        <div class="grid sm:grid-cols-1 gap-5">
          <div>
              <label class="flex flex-flow gap-4 content-center">
                <input type="checkbox" v-model="$v.register.termsAndPrivacy.$model" class="termsAndPrivacy"/></input>
                <span class="text-b-mute">{{ lang.get('words.TermsAndPrivacy') }}</span>
              </label>
              <error-input :termsAndPrivacy="true"></error-input>
            </div>
        </div>
        <ui-button @click.prevent="submit" :type="'create'" :size="'full'" :withLoading="loading" :disabled="
        $v.register.$anyError || !$v.register.$anyDirty || isInvalid" class="text-white">
          <span class="font-bold">{{ lang.get('words.Continue') }}</span>
        </ui-button>
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
        first_name: '',
        middle_name: '',
        last_name: '',
        email: '',
        username: '',
        password: '',
        password_confirmation: '',
        address: '',
        zip_code: '',
        tel: '',
        nick_name: '',
        birth_date: '',
        gender: 0,
        termsAndPrivacy: false
      },
      errors: {}
    };
  },
  validations: {
    register: {
      first_name: {
        required, minLength: minLength(2), maxLength: 16
      },
      middle_name: {
        minLength: minLength(2), maxLength: 16
      },
      last_name: {
        required, minLength: minLength(2), maxLength: 16
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
      },
      termsAndPrivacy: {
        checked(val) {
          return val == true;
        }
      }
    }
  },
  mounted () {
    // 
  },
  computed: {
    ...getters,
    inputFirstName: function() { return this.$v.register.first_name.$error },
    inputMiddleName: function() { return this.$v.register.first_name.$error },
    inputLastName: function() { return this.$v.register.first_name.$error },
    inputEmail: function() { return this.$v.register.email.$error },
    inputUsername: function() { return this.$v.register.username.$error },
    inputPassword: function() { return this.$v.register.password.$error },
    inputPasswordC: function() { return this.$v.register.password_confirmation.$error },
    inputAddress: function() { return this.$v.register.address.$error },
    inputZipCode: function() { return this.$v.register.zip_code.$error },
    inputTel: function() { return this.$v.register.tel.$error },
    inputNickname: function() { return this.$v.register.nick_name.$error },
    inputBirthdate: function() { return this.$v.register.birth_date.$error },
    inputGender: function() { return this.$v.register.gender.$error },
    inputTermsAndPrivacy: function() { return this.$v.register.termsAndPrivacy.$error },

    formData: function() {
      let formData = {}
      let name = ''

      if(this.register.first_name && this.register.middle_name && this.register.last_name) {
        name = this.register.first_name + ' ' + this.register.middle_name + ' ' + this.register.last_name;
      }
      else if(this.register.first_name && this.register.last_name) {
        name = this.register.first_name + ' ' + this.register.last_name;
      }
      this.register.name = name

      return this.register
    },
    isInvalid: function() {
      return _.values(this.register).some((v) => {
        return v === ''
      });
    }
  },
  methods: {
    ...mutations,
    ...actions,
    submit() {
      mutations.setLoading(true);
      this.errors = null;
      let formData = this.formData

      this.$http.post('api/register', formData)
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
      inputTermsAndPrivacy: {
          handler(value) {
            this.errors.termsAndPrivacy = false
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

  .termsAndPrivacy {
    height: 27px;
    transform: scale(1.5);
  }
</style>