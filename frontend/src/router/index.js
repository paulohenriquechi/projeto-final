import { createRouter, createWebHistory } from 'vue-router'
import HomeView from '../views/HomeView.vue'

const routes = [
  {
    path: '/',
    name: 'home',
    component: HomeView
  },
  {
    path: '/about',
    name: 'about',
    component: () => import(/* webpackChunkName: "about" */ '../views/AboutView.vue')
  },
  {
    path: '/albums',
    name: 'albums',
    component: () => import(/* webpackChunkName: "about" */ '../views/AlbumsView.vue')
  },
  {
    path: '/songs',
    name: 'songs',
    component: () => import(/* webpackChunkName: "about" */ '../views/SongsView.vue')
  },
  {
    path: '/dirt',
    name: 'dirt',
    component: () => import(/* webpackChunkName: "about" */ '../views/DirtView.vue')
  }
  
]

const router = createRouter({
  history: createWebHistory(process.env.BASE_URL),
  routes
})

export default router
