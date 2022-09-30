import Vue from 'vue'
import Router from 'vue-router'

Vue.use(Router)

import LandingPage from '../pages/landing/LandingPage.vue'

const routes = [
  {
    path: '/',
    name: 'landing-page',
    component: LandingPage
  },
];

const router = new Router({
  mode: 'history',
  routes
});

export default router