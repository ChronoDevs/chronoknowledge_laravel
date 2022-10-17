import Register from './Register.vue'
import Login from './Login.vue'

const auth = [
  {
    path: '/register',
    name: 'register',
    component: Register
  },
  {
    path: '/login',
    name: 'login',
    component: Login
  }
];

export default auth
