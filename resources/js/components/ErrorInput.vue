<template>
  <div id="errorInputComponent" class="error-input">
    <!-- Name -->
    <span v-show="!$parent.$v.register.name.required && $parent.$v.$anyDirty" class="error-text">The name field is required.</span>
    <span v-show="!$parent.$v.register.name.minLength && $parent.$v.$anyDirty" class="error-text">The name must be at least 4.</span>
    <span v-show="!$parent.$v.register.name.maxLength && $parent.$v.$anyDirty" class="error-text">The name may not be greater than 60.</span>

    <!-- Email -->
    <span v-show="!$parent.$v.register.email.required && $parent.$v.$anyDirty" class="error-text">The email field is required.</span>
    <span v-show="!$parent.$v.register.email.email && $parent.$v.$anyDirty" class="error-text">The email must be a valid email address.</span>
    <span v-show="!$parent.$v.register.email.minLength && $parent.$v.$anyDirty" class="error-text">The email must be at least 4.</span>
    <span v-show="!$parent.$v.register.email.maxLength && $parent.$v.$anyDirty" class="error-text">The email may not be greater than 50.</span>

    <!-- Username -->
    <span v-show="!$parent.$v.register.username.required && $parent.$v.$anyDirty" class="error-text">The username field is required.</span>
    <span v-show="!$parent.$v.register.username.minLength && $parent.$v.$anyDirty" class="error-text">The username must be at least 4.</span>
    <span v-show="!$parent.$v.register.username.maxLength && $parent.$v.$anyDirty" class="error-text">The user may not be greater than 50.</span>

    <!-- Password -->
    <span v-show="!$parent.$v.register.password.required && $parent.$v.$anyDirty" class="error-text">The password field is required.</span>
    <span v-show="!$parent.$v.register.password.minLength && $parent.$v.$anyDirty" class="error-text">The password must be at least 4.</span>
    <span v-show="!$parent.$v.register.password.maxLength && $parent.$v.$anyDirty" class="error-text">The password may not be greater than 60.</span>

    <!-- Password Confirmation -->
    <span v-show="!$parent.$v.register.password_confirmation.required && $parent.$v.$anyDirty" class="error-text">The password_confirmation field is required.</span>
    <span v-show="!$parent.$v.register.password_confirmation.sameAs && $parent.$v.$anyDirty" class="error-text">The password_confirmation does not match.</span>

    <!-- Address -->
    <span v-show="!$parent.$v.register.address.minLength && $parent.$v.$anyDirty" class="error-text">The address must be at least 4.</span>
    <span v-show="!$parent.$v.register.address.maxLength && $parent.$v.$anyDirty" class="error-text">The address may not be greater than 100.</span>

    <!-- Zip Code -->
    <span v-show="!$parent.$v.register.zip_code.required && $parent.$v.$anyDirty" class="error-text">The zip_code field is required.</span>
    <span v-show="!$parent.$v.register.zip_code.maxLength && $parent.$v.$anyDirty" class="error-text">The zip_code may not be greater than 8.</span>

    <!-- Telephone -->
    <span v-show="!$parent.$v.register.tel.minLength && $parent.$v.$anyDirty" class="error-text">The telephone must be at least 4.</span>
    <span v-show="!$parent.$v.register.tel.maxLength && $parent.$v.$anyDirty" class="error-text">The telephone may not be greater than 11.</span>

    <!-- Nickname -->
    <span v-show="!$parent.$v.register.nick_name.minLength && $parent.$v.$anyDirty" class="error-text">The nickname must be at least 4.</span>
    <span v-show="!$parent.$v.register.nick_name.maxLength && $parent.$v.$anyDirty" class="error-text">The nickname may not be greater than 20.</span>

    <!-- Birth Date -->
    <span v-show="!$parent.$v.register.birth_date.required && $parent.$v.$anyDirty" class="error-text">The birth date field is required.</span>
    <span v-show="!$parent.$v.register.birth_date.isDate && $parent.$v.$anyDirty" class="error-text">The birth date is not a valid date.</span>

    <!-- Gender -->
    <span v-show="!$parent.$v.register.gender.required && $parent.$v.$anyDirty" class="error-text">The password field is required.</span>
    <span v-show="!$parent.$v.register.gender.isDate && $parent.$v.$anyDirty" class="error-text">The birth date is not a valid date.</span>
  </div>
</template>

<script>
import { getters, mutations, actions } from '../store'

export default {
   name: 'error-input',
   data() {
       return {
       }
   },
   created() {
    console.log(this.$parent.$v, this.$parent.$v.register);
   },
//    beforeMount() {
//     //
//    },
//    computed: {
//      ...getters,
//    },
//    methods: {
//        ...mutations, ...actions,
//    },
//    watch: {
//        showAlert: {
//            handler(value) {
//                if(value == true) {
//                    this.initTimer()
//                }
//            },
//            immediate: true,
//            deep: true
//        }

//    }
}
</script>

<style scoped lang="scss">
@import '../../sass/imports';


$ui-alert-color             : rgba(black, 0.75) !default;
$ui-alert-font-size         : rem(15px) !default;
$ui-alert-margin-bottom     : rem(16px) !default;

.ui-alert {
   min-height: 70px;
   width: 95%;
   margin: auto;
   display: flex;
   font-family: $font-stack;
   font-size: $ui-alert-font-size;
   line-height: 1.4;
   margin-bottom: $ui-alert-margin-bottom;
   overflow: hidden;
   position: absolute;
   right: 15px;
   left: 15px;
   bottom: 0;
   transition: margin-bottom 0.3s;
   opacity: 0.7;
   &.has-no-transition {
       &,
       .ui-alert__body {
           transition: none;
       }
   }
   &:hover {
       opacity: 1;
   }
   a {
       text-decoration: none;
       &:hover,
       &:focus {
           text-decoration: underline;
       }
   }
}
.ui-alert__icon {
   flex-shrink: 0;
   margin-right: rem(12px);

   img {
     width: 20px;
     height: auto;
   }
}
.ui-alert__body {
   align-items: center;
   color: $ui-alert-color;
   display: flex;
   flex-direction: row;
   margin-bottom: 0;
   margin-top: 0;
   min-height: rem(48px);
   padding: 0.75rem 2rem 0.75rem 1rem;
   border-radius: 5px;
;
   transition: opacity 0.3s, margin-top 0.4s;
   width: 100%;
}
.ui-alert__content {
   flex-grow: 1;
   word-break: break-all;
}
.ui-alert__dismiss-button {
   position: absolute;
   top: 20px;
   right: 20px;
   align-self: flex-start;
   flex-shrink: 0;
   margin-bottom: rem(-4px);
   margin-left: rem(8px);
   margin-right: rem(-8px);
   margin-top: rem(-4px);
}

// ================================================
// Types
// ================================================
.ui-alert--type-info {
   transition: opacity 0.3s;
   .ui-alert__body {
       background-color: rgba($brand-color-info, 1);
   }
   .ui-alert__icon {
       color: $brand-color-info;
   }
   a {
       color: $brand-color-info;
   }
}
.ui-alert--type-success {
   transition: opacity 0.3s;
   .ui-alert__body {
       background-color: rgba($brand-color-success, 1);
   }
   .ui-alert__icon {
       color: $brand-color-success;
   }
   a {
       color: $brand-color-success;
   }
}
.ui-alert--type-warning {
   transition: opacity 0.3s;
   .ui-alert__body {
       background-color: rgba($brand-color-warning, 1);
   }
   .ui-alert__icon {
       color: $brand-color-warning;
   }
   a {
       color: $brand-color-warning;
   }
}
.ui-alert--type-error  {
   transition: opacity 0.3s;
   .ui-alert__body {
       background-color: rgba($brand-color-danger, 1);
   }
   .ui-alert__icon {
       color: $brand-color-danger;
   }
   a {
       color: $brand-color-danger;
   }
}

</style>