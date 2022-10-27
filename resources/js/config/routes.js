import Vue from 'vue'
import Router from 'vue-router'

Vue.use(Router)

import LandingPage from '../pages/LandingPage.vue'
import Home from '../pages/sidebar-views/Home.vue'
import Listings from '../pages/sidebar-views/Listings.vue'
import Favorites from '../pages/sidebar-views/Favorites.vue'
import Team from '../pages/sidebar-views/Team.vue'
import FAQs from '../pages/sidebar-views/FAQs.vue'
import About from '../pages/sidebar-views/About.vue'
import Guides from '../pages/sidebar-views/Guides.vue'
import CodeOfConduct from '../pages/sidebar-views/CodeOfConduct.vue'
import PrivacyPolicy from '../pages/sidebar-views/PrivacyPolicy.vue'
import TermsOfUse from '../pages/sidebar-views/TermsOfUse.vue'
import authRoutes from '../pages/auth'

const routes = [
  {
    path: '/',
    name: 'landing-page',
    component: LandingPage,
    children: [
      {
        path: '/',
        component: Home,
        name: 'home'
      },
      {
        path: 'listings',
        component: Listings,
        name: 'listings'
      },
      {
        path: 'favorites',
        component: Favorites,
        name: 'favorites'
      },
      {
        path: 'team',
        component: Team,
        name: 'team'
      },
      {
        path: 'faqs',
        component: FAQs,
        name: 'faqs'
      },
      {
        path: 'about',
        component: About,
        name: 'about'
      },
      {
        path: 'guides',
        component: Guides,
        name: 'guides'
      },
      {
        path: 'code-of-conduct',
        component: CodeOfConduct,
        name: 'code-of-conduct'
      },
      {
        path: 'privacy-policy',
        component: PrivacyPolicy,
        name: 'privacy-policy'
      },
      {
        path: 'terms-of-use',
        component: TermsOfUse,
        name: 'terms'
      }
    ]
  },
  ...authRoutes
];

const router = new Router({
  mode: 'history',
  routes
});

export default router