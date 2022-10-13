<template>
  <div id="errorInputComponent" class="error-input">
    <!-- First Name -->
    <div v-if="first_name && _.get($parent.errors, 'name')">
        <span v-show="name" v-for="(message, key, index) in $parent.errors.name" :key="key" :class="[
            'error-text',
            { 'block': $parent.errors.first_name.length > 1 }
        ]">{{ message }}</span>
    </div>
    <div v-else>
        <span v-show="!$parent.$v.register.first_name.required && $parent.$v.register.first_name.$anyDirty && first_name" class="error-text">The name field is required.</span>
        <span v-show="!$parent.$v.register.first_name.minLength && $parent.$v.register.first_name.$anyDirty && first_name" class="error-text">The name must be at least 2.</span>
        <span v-show="!$parent.$v.register.first_name.maxLength && $parent.$v.register.first_name.$anyDirty && first_name" class="error-text">The name may not be greater than 60.</span>
    </div>

    <!-- Middle Name -->
    <div v-if="middle_name && _.get($parent.errors, 'name')">
        <span v-show="name" v-for="(message, key, index) in $parent.errors.name" :key="key" :class="[
            'error-text',
            { 'block': $parent.errors.middle_name.length > 1 }
        ]">{{ message }}</span>
    </div>
    <div v-else>
        <span v-show="!$parent.$v.register.middle_name.minLength && $parent.$v.register.middle_name.$anyDirty && middle_name" class="error-text">The name must be at least 2.</span>
        <span v-show="!$parent.$v.register.middle_name.maxLength && $parent.$v.register.middle_name.$anyDirty && middle_name" class="error-text">The name may not be greater than 60.</span>
    </div>

    <!-- Last Name -->
    <div v-if="last_name && _.get($parent.errors, 'name')">
        <span v-show="name" v-for="(message, key, index) in $parent.errors.name" :key="key" :class="[
            'error-text',
            { 'block': $parent.errors.last_name.length > 1 }
        ]">{{ message }}</span>
    </div>
    <div v-else>
        <span v-show="!$parent.$v.register.last_name.required && $parent.$v.register.last_name.$anyDirty && last_name" class="error-text">The name field is required.</span>
        <span v-show="!$parent.$v.register.last_name.minLength && $parent.$v.register.last_name.$anyDirty && last_name" class="error-text">The name must be at least 2.</span>
        <span v-show="!$parent.$v.register.last_name.maxLength && $parent.$v.register.last_name.$anyDirty && last_name" class="error-text">The name may not be greater than 60.</span>
    </div>

    <!-- Email -->
    <div v-if="_.get($parent.errors, 'email')">
        <span v-show="email" v-for="(message, key, index) in $parent.errors.email" :key="key" :class="[
            'error-text',
            { 'block': $parent.errors.email.length > 1 }
        ]">{{ message }}</span>
    </div>
    <div v-else>
        <span v-show="!$parent.$v.register.email.required && $parent.$v.register.email.$anyDirty && email" class="error-text">The email field is required.</span>
        <span v-show="!$parent.$v.register.email.email && $parent.$v.register.email.$anyDirty && email" class="error-text">The email must be a valid email address.</span>
        <span v-show="!$parent.$v.register.email.minLength && $parent.$v.register.email.$anyDirty && email" class="error-text">The email must be at least 4.</span>
        <span v-show="!$parent.$v.register.email.maxLength && $parent.$v.register.email.$anyDirty && email" class="error-text">The email may not be greater than 50.</span>
    </div>

    <!-- Username -->
    <div v-if="_.get($parent.errors, 'username')">
        <span v-show="username" v-for="(message, key, index) in $parent.errors.username" :key="key" :class="[
            'error-text',
            { 'block': $parent.errors.username.length > 1 }
        ]">{{ message }}</span>
    </div>
    <div v-else>
        <span v-show="!$parent.$v.register.username.required && $parent.$v.register.username.$anyDirty && username" class="error-text">The username field is required.</span>
        <span v-show="!$parent.$v.register.username.minLength && $parent.$v.register.username.$anyDirty && username" class="error-text">The username must be at least 4.</span>
        <span v-show="!$parent.$v.register.username.maxLength && $parent.$v.register.username.$anyDirty && username" class="error-text">The user may not be greater than 50.</span>
    </div>

    <!-- Password -->
    <div v-if="_.get($parent.errors, 'password')">
        <span v-show="password" v-for="(message, key, index) in $parent.errors.password" :key="key" class="error-text" :class="[
            'error-text',
            { 'block': $parent.errors.password.length > 1 }
        ]">{{ message }}</span>
    </div>
    <div v-else>
        <span v-show="!$parent.$v.register.password.required && $parent.$v.register.password.$anyDirty && password" class="error-text">The password field is required.</span>
        <span v-show="!$parent.$v.register.password.minLength && $parent.$v.register.password.$anyDirty && password" class="error-text">The password must be at least 4.</span>
        <span v-show="!$parent.$v.register.password.maxLength && $parent.$v.register.password.$anyDirty && password" class="error-text">The password may not be greater than 60.</span>
    </div>

    <!-- Password Confirmation -->
    <div v-if="_.get($parent.errors, 'password_confirmation')">
        <span v-show="password_confirmation" v-for="(message, key, index) in $parent.errors.password_confirmation" :key="key" class="error-text" :class="[
            'error-text',
            { 'block': $parent.errors.password_confirmation.length > 1 }
        ]">{{ message }}</span>
    </div>
    <div v-else>
        <span v-show="!$parent.$v.register.password_confirmation.required && $parent.$v.register.password_confirmation.$anyDirty && password_confirmation" class="error-text">The password_confirmation field is required.</span>
        <span v-show="$parent.$v.register.password_confirmation.$model !== $parent.$v.register.password.$model && $parent.$v.register.password_confirmation.$anyDirty && password_confirmation" class="error-text">The password_confirmation does not match.</span>
    </div>

    <!-- Address -->
    <div v-if="_.get($parent.errors, 'address')">
        <span v-show="address" v-for="(message, key, index) in $parent.errors.address" :key="key" class="error-text" :class="[
            'error-text',
            { 'block': $parent.errors.address.length > 1 }
        ]">{{ message }}</span>
    </div>
    <div v-else>
        <span v-show="!$parent.$v.register.address.minLength && $parent.$v.register.address.$anyDirty && address" class="error-text">The address must be at least 4.</span>
        <span v-show="!$parent.$v.register.address.maxLength && $parent.$v.register.address.$anyDirty && address" class="error-text">The address may not be greater than 100.</span>
    </div>

    <!-- Zip Code -->
    <div v-if="_.get($parent.errors, 'zip_code')">
        <span v-show="zip_code" v-for="(message, key, index) in $parent.errors.zip_code" :key="key" class="error-text" :class="[
            'error-text',
            { 'block': $parent.errors.zip_code.length > 1 }
        ]">{{ message }}</span>
    </div>
    <div v-else>
        <span v-show="!$parent.$v.register.zip_code.required && $parent.$v.register.zip_code.$anyDirty && zip_code" class="error-text">The zip_code field is required.</span>
        <span v-show="!$parent.$v.register.zip_code.maxLength && $parent.$v.register.zip_code.$anyDirty && zip_code" class="error-text">The zip_code may not be greater than 8.</span>
    </div>

    <!-- Telephone -->
    <div v-if="_.get($parent.errors, 'tel')">
        <span v-show="tel" v-for="(message, key, index) in $parent.errors.tel" :key="key" class="error-text" :class="[
            'error-text',
            { 'block': $parent.errors.tel.length > 1 }
        ]">{{ message }}</span>
    </div>
    <div v-else>
        <span v-show="!$parent.$v.register.tel.minLength && $parent.$v.register.tel.$anyDirty && tel" class="error-text">The telephone is not valid.</span>
        <span v-show="!$parent.$v.register.tel.maxLength && $parent.$v.register.tel.$anyDirty && tel" class="error-text">The telephone may not be greater than 11.</span>
    </div>

    <!-- Nickname -->
    <div v-if="_.get($parent.errors, 'nick_name')">
        <span v-show="nick_name" v-for="(message, key, index) in $parent.errors.nick_name" :key="key" class="error-text" :class="[
            'error-text',
            { 'block': $parent.errors.nick_name.length > 1 }
        ]">{{ message }}</span>
    </div>
    <div v-else>
        <span v-show="!$parent.$v.register.nick_name.minLength && $parent.$v.register.nick_name.$anyDirty && nick_name" class="error-text">The nickname must be at least 4.</span>
        <span v-show="!$parent.$v.register.nick_name.maxLength && $parent.$v.register.nick_name.$anyDirty && nick_name" class="error-text">The nickname may not be greater than 20.</span>
    </div>

    <!-- Birth Date -->
    <div v-if="_.get($parent.errors, 'birth_date')">
        <span v-show="birth_date" v-for="(message, key, index) in $parent.errors.birth_date" :key="key" class="error-text" :class="[
            'error-text',
            { 'block': $parent.errors.birth_date.length > 1 }
        ]">{{ message }}</span>
    </div>
    <div v-else>
        <span v-show="!$parent.$v.register.birth_date.required && $parent.$v.register.birth_date.$anyDirty && birth_date" class="error-text">The birth date field is required.</span>
        <span v-show="!$parent.$v.register.birth_date.isDate && $parent.$v.register.birth_date.$anyDirty && birth_date" class="error-text">The birth date is not a valid date.</span>
    </div>

    <!-- Gender -->
    <div v-if="_.get($parent.errors, 'gender')">
        <span v-show="gender" v-for="(message, key, index) in $parent.errors.gender" :key="key" class="error-text" :class="[
            'error-text',
            { 'block': $parent.errors.gender.length > 1 }
        ]">{{ message }}</span>
    </div>
    <div v-else>
        <span v-show="!$parent.$v.register.gender.required && $parent.$v.register.gender.$anyDirty && gender" class="error-text">The password field is required.</span>
    </div>

     <!-- Terms And Privacy -->
     <div v-if="_.get($parent.errors, 'termsAndPrivacy')">
        {{ 'i am '}}
        <span v-show="termsAndPrivacy" v-for="(message, key, index) in $parent.errors.termsAndPrivacy" :key="key" class="error-text" :class="[
            'error-text',
            { 'block': typeof $parent.errors.termsAndPrivacy == 'boolean' }
        ]">{{ message }}</span>
    </div>
    <div v-else>
        <span v-show="!$parent.$v.register.termsAndPrivacy.checked && $parent.$v.register.termsAndPrivacy.$anyDirty && termsAndPrivacy" class="error-text">The Terms and Conditions must be accepted.</span>
    </div>
  </div>
</template>

<script>
import { getters, mutations, actions } from '../store'

export default {
    name: 'error-input',
    props: {
        first_name: {
            type: Boolean,
            default: false
        },
        middle_name: {
            type: Boolean,
            default: false
        },
        last_name: {
            type: Boolean,
            default: false
        },
        email: {
            type: Boolean,
            default: false
        },
        username: {
            type: Boolean,
            default: false
        },
        password: {
            type: Boolean,
            default: false
        },
        password_confirmation: {
            type: Boolean,
            default: false
        },
        address: {
            type: Boolean,
            default: false
        },
        zip_code: {
            type: Boolean,
            default: false
        },
        tel: {
            type: Boolean,
            default: false
        },
        nick_name: {
            type: Boolean,
            default: false
        },
        birth_date: {
            type: Boolean,
            default: false
        },
        gender: {
            type: Boolean,
            default: false
        },
        termsAndPrivacy: {
            type: Boolean,
            default: false
        }
    },
    data() {
        return {
        }
    },
    computed: {
        ...getters,
        // register() {
        //     console.log(this.$props);
        //     return {
        //         name: this.name,
        //         email: this.email,
        //         password: this.password,
        //         password_confirmation: this.password_confirmation,
        //         address: this.address,
        //         zip_code: this.zip_code,
        //         tel: this.tel,
        //         nick_name: this.nick_name,
        //         birth_date: this.birth_date,
        //         gender: this.gender
        //     }
        // }
    }
}
</script>

<style scoped lang="scss">
@import '../../sass/imports';
.error-text {
    color: red
}

</style>