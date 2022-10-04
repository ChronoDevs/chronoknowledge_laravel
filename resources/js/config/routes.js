import Vue from 'vue'
import Router from 'vue-router'

Vue.use(Router)

import LandingPage from '../pages/landing/LandingPage.vue'
import authRoutes from '../pages/auth'


const routes = [
  {
    path: '/',
    name: 'landing-page',
    component: LandingPage
  },
  ...authRoutes
];

const router = new Router({
  mode: 'history',
  routes
});

export default router