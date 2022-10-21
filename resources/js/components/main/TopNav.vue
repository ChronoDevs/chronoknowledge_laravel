<template>
  <nav class="bg-bt-secondary border-gray-200 px-6 sm:px-4 md:px-20 py-2.5 rounded dark:bg-gray-900 relative">
    <div class="flex flex-wrap justify-between md:justify-start gap-6 items-center mx-0">
    <router-link :to="{ name: 'landing-page' }" class="flex items-center">
      <img class="h-12" src="../../../assets/chronostep.png" />
      <!-- <span class="self-center text-xl font-semibold whitespace-nowrap dark:text-white">Chronostep</span> -->
    </router-link>
    <div class="flex md:order-1">
      <button type="button" data-collapse-toggle="navbar-search" aria-controls="navbar-search" aria-expanded="false" class="md:hidden text-b-link rounded-lg text-sm p-2.5 mr-1">
        <svg class="w-5 h-5" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z" clip-rule="evenodd"></path></svg>
        <span class="sr-only">Search</span>
      </button>
      <div class="hidden relative md:block">
        <div class="flex absolute inset-y-0 right-2 items-center pl-3 pointer-events-none">
          <svg class="w-5 h-5 text-b-link" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z" clip-rule="evenodd"></path></svg>
          <span class="sr-only">Search icon</span>
        </div>
        <input type="text" id="search-navbar" class="w-[250px] block p-2 pl-5 rounded-lg border border-gray-300 sm:text-sm focus:ring-blue-500 focus:border-blue-500" placeholder="Search...">
      </div>
      <button data-collapse-toggle="navbar-search" type="button" class="inline-flex items-center p-2 text-sm text-gray-500 rounded-lg md:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600" aria-controls="navbar-search" aria-expanded="false">
        <span class="sr-only">Open menu</span>
        <svg class="w-6 h-6" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 15a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z" clip-rule="evenodd"></path></svg>
      </button>
    </div>
      <div class="hidden justify-between items-center w-full md:flex md:w-auto md:order-1" id="navbar-search">
        <div class="relative mt-3 md:hidden">
          <div class="flex absolute inset-y-0 left-0 items-center pl-3 pointer-events-none">
            <svg class="w-5 h-5 text-gray-500" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z" clip-rule="evenodd"></path></svg>
          </div>
          <input type="text" id="search-navbar" class="block p-2 pl-10 w-full bg-gray-50 rounded-lg border border-gray-300 sm:text-sm" placeholder="Search...">
        </div>
        <ul class="flex flex-col mt-4 sm:mt-0 bg-bt-secondary rounded-lg md:flex-row md:space-x-4 md:mt-0:md:text-sm md:font-medium md:border-0 md:bg-bt-secondary static sm:absolute right-4 sm:right-20">
          <li v-show="!isLoggedIn" class="flex sm:items-center justify-center text-center">
            <router-link :to="{ name: 'login' }" class="block w-full text-b-link rounded hover:bg-b-primary sm:hover:bg-transparent p-2" aria-current="page">Login</router-link>
          </li>
          <li v-show="!isLoggedIn" class="flex sm:items-center justify-center text-center">
            <router-link :to="{ name: 'register' }" class="block w-full sm:border-2 sm:border-b-link p-2 text-b-link hover:bg-b-primary sm:hover:bg-transparent rounded-lg">Create Account</router-link>
          </li>
          <li v-show="isLoggedIn" class="flex justify-center sm:justify-start bg-b-link sm:bg-transparent rounded">
            <button id="dropdownNotificationButton" data-dropdown-toggle="dropdownNotification" class="relative w-full bg-b-link sm:bg-transparent items-center text-sm font-medium text-center text-gray-500 hover:text-gray-900 focus:outline-none dark:hover:text-white dark:text-gray-400 rounded" type="button">
              <span class="absolute ml-2 mt-1 bg-b-danger b-danger text-white text-2xs leading-3 rounded-full hover:cursor-pointer">10</span>
              <i class="fa-regular fa-bell text-lg text-b-info"></i>
            </button>

            <!-- Dropdown menu -->
            <div id="dropdownNotification" class="hidden w-[400px] z-20 w-full max-w-sm bg-white rounded divide-y divide-gray-100 shadow dark:bg-gray-800 dark:divide-gray-700" aria-labelledby="dropdownNotificationButton" data-popper-reference-hidden="" data-popper-escaped="" data-popper-placement="bottom" style="position: absolute; inset: 0px auto auto 0px; margin: 0px; transform: translate(0px, 15803px);">
              <div class="block py-2 px-6 font-medium text-center text-gray-700 bg-gray-50 dark:bg-gray-800 dark:text-white">
                  Notifications
              </div>
              <div class="divide-y divide-gray-100 dark:divide-gray-700">
                <a href="#" class="flex py-3 px-6 hover:bg-gray-100 dark:hover:bg-gray-700">
                  <div class="flex-shrink-0">
                    <img class="w-11 h-11 rounded-full" src="/docs/images/people/profile-picture-1.jpg" alt="Jese image">
                    <div class="flex absolute justify-center items-center ml-6 -mt-5 w-5 h-5 bg-blue-600 rounded-full border border-white dark:border-gray-800">
                      <svg class="w-3 h-3 text-white" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M8.707 7.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l2-2a1 1 0 00-1.414-1.414L11 7.586V3a1 1 0 10-2 0v4.586l-.293-.293z"></path><path d="M3 5a2 2 0 012-2h1a1 1 0 010 2H5v7h2l1 2h4l1-2h2V5h-1a1 1 0 110-2h1a2 2 0 012 2v10a2 2 0 01-2 2H5a2 2 0 01-2-2V5z"></path></svg>
                    </div>
                  </div>
                  <div class="pl-3 w-full">
                      <div class="text-gray-500 text-sm mb-1.5 dark:text-gray-400">New message from <span class="font-semibold text-gray-900 dark:text-white">Jese Leos</span>: "Hey, what's up? All set for the presentation?"</div>
                      <div class="text-xs text-blue-600 dark:text-blue-500">a few moments ago</div>
                  </div>
                </a>
                <a href="#" class="flex py-3 px-6 hover:bg-gray-100 dark:hover:bg-gray-700">
                  <div class="flex-shrink-0">
                    <img class="w-11 h-11 rounded-full" src="/docs/images/people/profile-picture-2.jpg" alt="Joseph image">
                    <div class="flex absolute justify-center items-center ml-6 -mt-5 w-5 h-5 bg-gray-900 rounded-full border border-white dark:border-gray-800">
                      <svg class="w-3 h-3 text-white" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M8 9a3 3 0 100-6 3 3 0 000 6zM8 11a6 6 0 016 6H2a6 6 0 016-6zM16 7a1 1 0 10-2 0v1h-1a1 1 0 100 2h1v1a1 1 0 102 0v-1h1a1 1 0 100-2h-1V7z"></path></svg>
                    </div>
                  </div>
                  <div class="pl-3 w-full">
                      <div class="text-gray-500 text-sm mb-1.5 dark:text-gray-400"><span class="font-semibold text-gray-900 dark:text-white">Joseph Mcfall</span> and <span class="font-medium text-gray-900 dark:text-white">5 others</span> started following you.</div>
                      <div class="text-xs text-blue-600 dark:text-blue-500">10 minutes ago</div>
                  </div>
                </a>
                <a href="#" class="flex py-3 px-6 hover:bg-gray-100 dark:hover:bg-gray-700">
                  <div class="flex-shrink-0">
                    <img class="w-11 h-11 rounded-full" src="/docs/images/people/profile-picture-3.jpg" alt="Bonnie image">
                    <div class="flex absolute justify-center items-center ml-6 -mt-5 w-5 h-5 bg-red-600 rounded-full border border-white dark:border-gray-800">
                      <svg class="w-3 h-3 text-white" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M3.172 5.172a4 4 0 015.656 0L10 6.343l1.172-1.171a4 4 0 115.656 5.656L10 17.657l-6.828-6.829a4 4 0 010-5.656z" clip-rule="evenodd"></path></svg>
                    </div>
                  </div>
                  <div class="pl-3 w-full">
                      <div class="text-gray-500 text-sm mb-1.5 dark:text-gray-400"><span class="font-semibold text-gray-900 dark:text-white">Bonnie Green</span> and <span class="font-medium text-gray-900 dark:text-white">141 others</span> love your story. See it and view more stories.</div>
                      <div class="text-xs text-blue-600 dark:text-blue-500">44 minutes ago</div>
                  </div>
                </a>
                <a href="#" class="flex py-3 px-6 hover:bg-gray-100 dark:hover:bg-gray-700">
                  <div class="flex-shrink-0">
                    <img class="w-11 h-11 rounded-full" src="/docs/images/people/profile-picture-4.jpg" alt="Leslie image">
                    <div class="flex absolute justify-center items-center ml-6 -mt-5 w-5 h-5 bg-green-400 rounded-full border border-white dark:border-gray-800">
                      <svg class="w-3 h-3 text-white" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M18 13V5a2 2 0 00-2-2H4a2 2 0 00-2 2v8a2 2 0 002 2h3l3 3 3-3h3a2 2 0 002-2zM5 7a1 1 0 011-1h8a1 1 0 110 2H6a1 1 0 01-1-1zm1 3a1 1 0 100 2h3a1 1 0 100-2H6z" clip-rule="evenodd"></path></svg>
                    </div>
                  </div>
                  <div class="pl-3 w-full">
                      <div class="text-gray-500 text-sm mb-1.5 dark:text-gray-400"><span class="font-semibold text-gray-900 dark:text-white">Leslie Livingston</span> mentioned you in a comment: <span class="font-medium text-blue-500" href="#">@bonnie.green</span> what do you say?</div>
                      <div class="text-xs text-blue-600 dark:text-blue-500">1 hour ago</div>
                  </div>
                </a>
                <a href="#" class="flex py-3 px-6 hover:bg-gray-100 dark:hover:bg-gray-700">
                  <div class="flex-shrink-0">
                    <img class="w-11 h-11 rounded-full" src="/docs/images/people/profile-picture-5.jpg" alt="Robert image">
                    <div class="flex absolute justify-center items-center ml-6 -mt-5 w-5 h-5 bg-purple-500 rounded-full border border-white dark:border-gray-800">
                      <svg class="w-3 h-3 text-white" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M2 6a2 2 0 012-2h6a2 2 0 012 2v8a2 2 0 01-2 2H4a2 2 0 01-2-2V6zM14.553 7.106A1 1 0 0014 8v4a1 1 0 00.553.894l2 1A1 1 0 0018 13V7a1 1 0 00-1.447-.894l-2 1z"></path></svg>
                    </div>
                  </div>
                  <div class="pl-3 w-full">
                      <div class="text-gray-500 text-sm mb-1.5 dark:text-gray-400"><span class="font-semibold text-gray-900 dark:text-white">Robert Brown</span> posted a new video: Glassmorphism - learn how to implement the new design trend.</div>
                      <div class="text-xs text-blue-600 dark:text-blue-500">3 hours ago</div>
                  </div>
                </a>
              </div>
              <a href="#" class="block py-2 text-sm font-medium text-center text-gray-900 bg-gray-50 hover:bg-gray-100 dark:bg-gray-800 dark:hover:bg-gray-700 dark:text-white">
                <div class="inline-flex items-center ">
                  <svg class="mr-2 w-4 h-6 text-gray-500 dark:text-gray-400" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M10 12a2 2 0 100-4 2 2 0 000 4z"></path><path fill-rule="evenodd" d="M.458 10C1.732 5.943 5.522 3 10 3s8.268 2.943 9.542 7c-1.274 4.057-5.064 7-9.542 7S1.732 14.057.458 10zM14 10a4 4 0 11-8 0 4 4 0 018 0z" clip-rule="evenodd"></path></svg>
                    View all
                </div>
              </a>
            </div>
          </li>
          <li v-show="isLoggedIn" class="flex justify-center sm:justify-start">
            <button id="user-menu-button" aria-expanded="false" data-dropdown-toggle="user-dropdown" data-dropdown-placement="bottom" class="flex w-full items-center p-2 text-b-link hover:bg-b-primary sm:hover:bg-transparent rounded md:order-2">
              <img class="w-11 border-2 border-b-info h-11 rounded-full hidden sm:block" src="../../../assets/icons/user-logo.png" alt="Jese image">
              <span class="mx-auto sm:mx-0 sm:ml-4 text-b-info capitalize">{{ _.get(user, 'name') }}</span>
            </button>

            <!-- Dropdown menu -->
            <div class="hidden z-50 my-4 text-base list-none bg-white rounded divide-y divide-gray-100 shadow dark:bg-gray-700 dark:divide-gray-600" id="user-dropdown">
              <div class="py-3 px-6">
                <span class="block text-sm text-gray-900 dark:text-white capitalize">{{ _.get(user, 'name') }}</span>
                <span class="block text-sm font-medium text-gray-500 truncate dark:text-gray-400">{{ _.get(user, 'email') }}</span>
              </div>
              <ul class="py-1" aria-labelledby="user-menu-button">
                <li>
                  <router-link :to="{ name: 'dashboard' }" class="block py-2 px-6 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">Dashboard</router-link>
                </li>
                <li>
                  <span @click="signOut()" class="block py-2 px-6 text-sm text-gray-700 hover:bg-gray hover:cursor-pointer dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white router-link-exact-active router-link-active">Sign Out</span>
                </li>
              </ul>
            </div>
          </li>
        </ul>
      </div>
    </div>
  </nav>
</template>

<script>
import { getters, mutations } from "../../store";
import { required, minLength, sameAs, email, helpers } from "vuelidate/lib/validators";

export default {
  name: 'top-nav',
  props: ['data'],
  data() {
    return {
      notificationStatus: false
    }
  },
  methods: {
    ...mutations,
    signOut() {
      localStorage['chronoknowledge.jwt'] = null
      localStorage['chronoknowledge.user'] = null
      mutations.setUser(null)
      mutations.setIsLoggedIn(false)
      document.getElementById('user-dropdown').classList.add("hidden")
    }
  },
  computed: {
    ...getters
  }
}
</script>

<style scoped lang="scss">
@import '../../../sass/imports';

.top-nav {
  position: absolute;
  top: 0px;
  width: 100%;
  height: 5rem;
  padding: 0.5rem 2rem;
  z-index: $z-index-nav-drawer;
  background-color: $brand-theme-color-secondary;

  .nav-content {
    height: 100%;
    display: flex;
    grid-gap: $base-gap;

    .nav-menu {
      display: flex;
      grid-gap: $base-gap;

      .ck-logo {
        height: 3.5rem;
        margin: auto 0;
      }
      .ck-search {
        display: grid;
        align-items: center;
      }
    }

    .nav-links {
      flex-grow: 1;
      display: flex;
      flex-flow: row-reverse;

      & > div {
        display: flex;
        align-items: center;
        grid-gap: $base-gap;
      }

      .profile {
        display: flex;
        align-items: center;
        grid-gap: $base-gap
      }

      .notif-bell {
        background-color: rgba(244,67,54);
        width: 12px;
        height: 12px;
        border-radius: 50%;
        font-size: 10px;
        line-height: 1.3;
        top: 4px;
        right: -2px;
      }
    }
  }

  .nav-content > div {
    height: 100%
  }
}
</style>