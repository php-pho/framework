import Vue from 'vue'
import Router from 'vue-router'
// import Home from './views/Home.vue'

Vue.use(Router)

export default new Router({
  mode: 'history',
  base: process.env.BASE_URL,
  routes: [
    {
      path: '/',
      name: 'dashboard',
      component: () => import('../views/Dashboard'),
    },
    {
      path: '/setting',
      name: 'setting',
      component: () => import('../views/Setting'),
    },
    {
      path: '/profile',
      name: 'profile',
      component: () => import('../views/Profile'),
    },
  ]
})
