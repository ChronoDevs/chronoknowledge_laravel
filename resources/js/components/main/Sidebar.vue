<template>
  <div id="sidebarComponent" class="sidebarComponent">
    <div v-show="isLoggedIn" class="sidebar-loggedin">
      <div class="listing">
        <aside class="" aria-label="Sidebar">
            <div class="overflow-y-auto rounded">
                <ul class="space-y-2">
                    <li>
                        <router-link :to="{ name: 'home' }" class="flex items-center p-2 text-base font-normal rounded-lg text-white hover:bg-bt-secondary">
                        <i class="fa fa-home" aria-hidden="true"></i>
                        <span class="ml-3">Home</span>
                        </router-link>
                    </li>
                    <li>
                        <router-link :to="{ name: 'listings' }" class="flex items-center p-2 text-base font-normal rounded-lg text-white hover:bg-bt-secondary">
                        <i class="fa-solid fa-list"></i>
                        <span class="flex-1 ml-3 whitespace-nowrap">Listings</span>
                        <!-- <span class="inline-flex justify-center items-center px-2 ml-3 text-sm font-medium text-gray-800 bg-gray-200 rounded-full dark:bg-gray-700 dark:text-gray-300">Pro</span> -->
                        </router-link>
                    </li>
                    <li>
                        <router-link :to="{ name: 'favorites' }" class="flex items-center p-2 text-base font-normal rounded-lg text-white hover:bg-bt-secondary">
                        <i class="fa-solid fa-star"></i>
                        <span class="flex-1 ml-3 whitespace-nowrap">Favorites</span>
                        <!-- <span class="inline-flex justify-center items-center p-3 ml-3 w-3 h-3 text-sm font-medium text-blue-600 bg-blue-200 rounded-full dark:bg-blue-900 dark:text-blue-200">3</span> -->
                        </router-link>
                    </li>
                    <li>
                        <router-link :to="{ name: 'team' }" class="flex items-center p-2 text-base font-normal rounded-lg text-white hover:bg-bt-secondary">
                        <i class="fa-solid fa-people-group"></i>
                        <span class="flex-1 ml-3 whitespace-nowrap">Team</span>
                        </router-link>
                    </li>
                    <li>
                        <router-link :to="{ name: 'faqs' }" class="flex items-center p-2 text-base font-normal rounded-lg text-white hover:bg-bt-secondary">
                        <i class="fa-solid fa-circle-question"></i>
                        <span class="flex-1 ml-3 whitespace-nowrap">FAQs</span>
                        </router-link>
                    </li>
                    <li>
                        <router-link :to="{ name: 'about' }" class="flex items-center p-2 text-base font-normal rounded-lg text-white hover:bg-bt-secondary">
                        <i class="fa-solid fa-circle-info"></i>
                        <span class="flex-1 ml-3 whitespace-nowrap">About</span>
                        </router-link>
                    </li>
                    <li>
                        <router-link :to="{ name: 'guides' }" class="flex items-center p-2 text-base font-normal rounded-lg text-white hover:bg-bt-secondary">
                        <i class="fa-regular fa-note-sticky"></i>
                        <span class="flex-1 ml-3 whitespace-nowrap">Guides</span>
                        </router-link>
                    </li>
                    <li>
                        <router-link :to="{ name: 'code-of-conduct' }" class="flex items-center p-2 text-base font-normal rounded-lg text-white hover:bg-bt-secondary">
                        <i class="fa-solid fa-thumbs-up"></i>
                        <span class="flex-1 ml-3 whitespace-nowrap">Code of Conduct</span>
                        </router-link>
                    </li>
                    <li>
                        <router-link :to="{ name: 'privacy-policy' }" class="flex items-center p-2 text-base font-normal rounded-lg text-white hover:bg-bt-secondary">
                        <i class="fa-solid fa-shield-halved"></i>
                        <span class="flex-1 ml-3 whitespace-nowrap">Privacy Policy</span>
                        </router-link>
                    </li>
                    <li>
                        <router-link :to="{ name: 'terms' }" class="flex items-center p-2 text-base font-normal rounded-lg text-white hover:bg-bt-secondary">
                        <i class="fa-solid fa-handshake-simple"></i>
                        <span class="flex-1 ml-3 whitespace-nowrap">Terms of Use</span>
                        </router-link>
                    </li>
                    <li>
                        <a @click="signOut()" href="#" class="flex items-center p-2 text-base font-normal rounded-lg text-b-danger hover:bg-bt-secondary">
                        <i class="fa-solid fa-right-from-bracket"></i>
                        <span class="flex-1 ml-3 whitespace-nowrap">Logout</span>
                        </a>
                    </li>
                </ul>
            </div>
        </aside>
      </div>
    </div>
  </div>
</template>
<script>
import { getters, mutations } from "../../store";

export default {
  name: 'sidebar',
  props: ['data'],
  data() {
    return {
    }
  },
  methods: {
    ...mutations,
    signOut() {
      localStorage['chronoknowledge.jwt'] = null
      localStorage['chronoknowledge.user'] = null
      mutations.setUser(null)
      mutations.setIsLoggedIn(false)
    }
  },
  computed: {
    ...getters
  }
}
</script>

<style scoped lang="scss">
@import '../../../sass/imports';

.sidebarComponent {
  width: 300px;
  margin: $base-comp-gap-y 0rem 0rem $base-comp-gap-x;
  position: fixed;
}
</style>