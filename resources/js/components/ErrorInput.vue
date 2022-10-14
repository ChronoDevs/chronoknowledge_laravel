<template>
  <div id="errorInputComponent" class="error-input">
    <!-- First Name -->
    <div v-if="first_name && _.get($parent.errors, 'name', false)">
        <span v-show="name" v-for="(message, key, index) in $parent.errors.name" :key="key" :class="[
            'error-text',
            { 'block': _.get($parent.errors, 'first_name', false) }
        ]">{{ message }}</span>
    </div>
    <div v-else>
        <span v-show="first_name && !$parent.$v[`form`].first_name.required && $parent.$v[`form`].first_name.$anyDirty" class="error-text">The name field is required.</span>
        <span v-show="first_name && !$parent.$v[`form`].first_name.minLength && $parent.$v[`form`].first_name.$anyDirty" class="error-text">The name must be at least 2.</span>
        <span v-show="first_name && !$parent.$v[`form`].first_name.maxLength && $parent.$v[`form`].first_name.$anyDirty" class="error-text">The name may not be greater than 60.</span>
    </div>

    <!-- Middle Name -->
    <div v-if="middle_name && _.get($parent.errors, 'name', false)">
        <span v-show="name" v-for="(message, key, index) in $parent.errors.name" :key="key" :class="[
            'error-text',
            { 'block': _.get($parent.errors, 'middle_name', false) }
        ]">{{ message }}</span>
    </div>
    <div v-else>
        <span v-show="middle_name && !$parent.$v[`form`].middle_name.minLength && $parent.$v[`form`].middle_name.$anyDirty" class="error-text">The name must be at least 2.</span>
        <span v-show="middle_name && !$parent.$v[`form`].middle_name.maxLength && $parent.$v[`form`].middle_name.$anyDirty" class="error-text">The name may not be greater than 60.</span>
    </div>

    <!-- Last Name -->
    <div v-if="last_name && _.get($parent.errors, 'name', false)">
        <span v-show="name" v-for="(message, key, index) in $parent.errors.name" :key="key" :class="[
            'error-text',
            { 'block': _.get($parent.errors, 'last_name', false) }
        ]">{{ message }}</span>
    </div>
    <div v-else>
        <span v-show="last_name && !$parent.$v[`form`].last_name.required && $parent.$v[`form`].last_name.$anyDirty" class="error-text">The name field is required.</span>
        <span v-show="last_name && !$parent.$v[`form`].last_name.minLength && $parent.$v[`form`].last_name.$anyDirty" class="error-text">The name must be at least 2.</span>
        <span v-show="last_name && !$parent.$v[`form`].last_name.maxLength && $parent.$v[`form`].last_name.$anyDirty" class="error-text">The name may not be greater than 60.</span>
    </div>

    <!-- Email -->
    <div v-if="_.get($parent.errors, 'email', false)">
        <span v-show="email" v-for="(message, key, index) in $parent.errors.email" :key="key" :class="[
            'error-text',
            { 'block': _.get($parent.errors, 'email', false) }
        ]">{{ message }}</span>
    </div>
    <div v-else>
        <span v-show="email && !$parent.$v[`form`].email.required && $parent.$v[`form`].email.$anyDirty" class="error-text">The email field is required.</span>
        <span v-show="email && !$parent.$v[`form`].email.email && $parent.$v[`form`].email.$anyDirty" class="error-text">The email must be a valid email address.</span>
        <span v-show="email && !$parent.$v[`form`].email.minLength && $parent.$v[`form`].email.$anyDirty" class="error-text">The email must be at least 4.</span>
        <span v-show="email && !$parent.$v[`form`].email.maxLength && $parent.$v[`form`].email.$anyDirty" class="error-text">The email may not be greater than 50.</span>
    </div>

    <!-- Username -->
    <div v-if="_.get($parent.errors, 'username', false)">
        <span v-show="username" v-for="(message, key, index) in $parent.errors.username" :key="key" :class="[
            'error-text',
            { 'block': _.get($parent.errors, 'username', false) }
        ]">{{ message }}</span>
    </div>
    <div v-else>
        <span v-show="username && !$parent.$v[`form`].username.required && $parent.$v[`form`].username.$anyDirty" class="error-text">The username field is required.</span>
        <span v-show="username && !$parent.$v[`form`].username.minLength && $parent.$v[`form`].username.$anyDirty" class="error-text">The username must be at least 4.</span>
        <span v-show="username && !$parent.$v[`form`].username.maxLength && $parent.$v[`form`].username.$anyDirty" class="error-text">The user may not be greater than 50.</span>
    </div>

    <!-- Password -->
    <div v-if="_.get($parent.errors, 'password', false)">
        <span v-show="password" v-for="(message, key, index) in $parent.errors.password" :key="key" class="error-text" :class="[
            'error-text',
            { 'block': _.get($parent.errors, 'password', false) }
        ]">{{ message }}</span>
    </div>
    <div v-else>
        <span v-show="password && !$parent.$v[`form`].password.required && $parent.$v[`form`].password.$anyDirty" class="error-text">The password field is required.</span>
        <span v-show="password && !$parent.$v[`form`].password.minLength && $parent.$v[`form`].password.$anyDirty" class="error-text">The password must be at least 4.</span>
        <span v-show="password && !$parent.$v[`form`].password.maxLength && $parent.$v[`form`].password.$anyDirty" class="error-text">The password may not be greater than 60.</span>
    </div>

    <!-- Password Confirmation -->
    <div v-if="_.get($parent.errors, 'password_confirmation', false)">
        <span v-show="password_confirmation" v-for="(message, key, index) in $parent.errors.password_confirmation" :key="key" class="error-text" :class="[
            'error-text',
            { 'block': _.get($parent.errors, 'password_confirmation', false) }
        ]">{{ message }}</span>
    </div>
    <div v-else>
        <span v-show="password_confirmation && !$parent.$v[`form`].password_confirmation.required && $parent.$v[`form`].password_confirmation.$anyDirty" class="error-text">The password_confirmation field is required.</span>
        <span v-show="password_confirmation && $parent.$v[`form`].password_confirmation.$model !== $parent.$v[`form`].password.$model && $parent.$v[`form`].password_confirmation.$anyDirty" class="error-text">The password_confirmation does not match.</span>
    </div>

    <!-- Address -->
    <div v-if="_.get($parent.errors, 'address', false)">
        <span v-show="address" v-for="(message, key, index) in $parent.errors.address" :key="key" class="error-text" :class="[
            'error-text',
            { 'block': _.get($parent.errors, 'address', false) }
        ]">{{ message }}</span>
    </div>
    <div v-else>
        <span v-show="address && !$parent.$v[`form`].address.minLength && $parent.$v[`form`].address.$anyDirty" class="error-text">The address must be at least 4.</span>
        <span v-show="address && !$parent.$v[`form`].address.maxLength && $parent.$v[`form`].address.$anyDirty" class="error-text">The address may not be greater than 100.</span>
    </div>

    <!-- Zip Code -->
    <div v-if="_.get($parent.errors, 'zip_code', false)">
        <span v-show="zip_code" v-for="(message, key, index) in $parent.errors.zip_code" :key="key" class="error-text" :class="[
            'error-text',
            { 'block': _.get($parent.errors, 'zip_code', false) }
        ]">{{ message }}</span>
    </div>
    <div v-else>
        <span v-show="zip_code && !$parent.$v[`form`].zip_code.required && $parent.$v[`form`].zip_code.$anyDirty" class="error-text">The zip_code field is required.</span>
        <span v-show="zip_code && !$parent.$v[`form`].zip_code.maxLength && $parent.$v[`form`].zip_code.$anyDirty" class="error-text">The zip_code may not be greater than 8.</span>
    </div>

    <!-- Telephone -->
    <div v-if="_.get($parent.errors, 'tel', false)">
        <span v-show="tel" v-for="(message, key, index) in $parent.errors.tel" :key="key" class="error-text" :class="[
            'error-text',
            { 'block': _.get($parent.errors, 'tel', false) }
        ]">{{ message }}</span>
    </div>
    <div v-else>
        <span v-show="tel && !$parent.$v[`form`].tel.minLength && $parent.$v[`form`].tel.$anyDirty" class="error-text">The telephone is not valid.</span>
        <span v-show="tel && !$parent.$v[`form`].tel.maxLength && $parent.$v[`form`].tel.$anyDirty" class="error-text">The telephone may not be greater than 11.</span>
    </div>

    <!-- Nickname -->
    <div v-if="_.get($parent.errors, 'nick_name', false)">
        <span v-show="nick_name" v-for="(message, key, index) in $parent.errors.nick_name" :key="key" class="error-text" :class="[
            'error-text',
            { 'block': _.get($parent.errors, 'nick_name', false) }
        ]">{{ message }}</span>
    </div>
    <div v-else>
        <span v-show="nick_name && !$parent.$v[`form`].nick_name.minLength && $parent.$v[`form`].nick_name.$anyDirty" class="error-text">The nickname must be at least 4.</span>
        <span v-show="nick_name && !$parent.$v[`form`].nick_name.maxLength && $parent.$v[`form`].nick_name.$anyDirty" class="error-text">The nickname may not be greater than 20.</span>
    </div>

    <!-- Birth Date -->
    <div v-if="_.get($parent.errors, 'birth_date', false)">
        <span v-show="birth_date" v-for="(message, key, index) in $parent.errors.birth_date" :key="key" class="error-text" :class="[
            'error-text',
            { 'block': _.get($parent.errors, 'birth_date', false) }
        ]">{{ message }}</span>
    </div>
    <div v-else>
        <span v-show="birth_date && !$parent.$v[`form`].birth_date.required && $parent.$v[`form`].birth_date.$anyDirty" class="error-text">The birth date field is required.</span>
        <span v-show="birth_date && !$parent.$v[`form`].birth_date.isDate && $parent.$v[`form`].birth_date.$anyDirty" class="error-text">The birth date is not a valid date.</span>
    </div>

    <!-- Gender -->
    <div v-if="_.get($parent.errors, 'gender', false)">
        <span v-show="gender" v-for="(message, key, index) in $parent.errors.gender" :key="key" class="error-text" :class="[
            'error-text',
            { 'block': _.get($parent.errors, 'gender', false) }
        ]">{{ message }}</span>
    </div>
    <div v-else>
        <span v-show="gender && !$parent.$v[`form`].gender.required && $parent.$v[`form`].gender.$anyDirty" class="error-text">The password field is required.</span>
    </div>

     <!-- Terms And Privacy -->
     <div v-if="_.get($parent.errors, 'termsAndPrivacy', false)">
        <span v-show="termsAndPrivacy" v-for="(message, key, index) in $parent.errors.termsAndPrivacy" :key="key" class="error-text" :class="[
            'error-text',
            { 'block': typeof $parent.errors.termsAndPrivacy == 'boolean' }
        ]">{{ message }}</span>
    </div>
    <div v-else>
        <span v-show="termsAndPrivacy && !$parent.$v[`form`].termsAndPrivacy.checked && $parent.$v[`form`].termsAndPrivacy.$anyDirty" class="error-text">The Terms and Conditions must be accepted.</span>
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