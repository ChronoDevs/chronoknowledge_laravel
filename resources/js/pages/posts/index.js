import Post from './Post.vue'

const post = [
  {
    path: '/post/:id',
    name: 'post',
    component: Post,
    props: true,
    meta: {
      requiresAuth: true,
    }
  }
];
export default post
