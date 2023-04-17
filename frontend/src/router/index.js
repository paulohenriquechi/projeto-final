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
    path: '/albums/:album',
    name: 'album',
    component: () => import(/* webpackChunkName: "about" */ '../views/AlbumView.vue')
  },
  {
    path: '/songs',
    name: 'songs',
    component: () => import(/* webpackChunkName: "about" */ '../views/SongsView.vue')
  },
  {
    path: '/songs/:song',
    name: 'song',
    component: () => import(/* webpackChunkName: "about" */ '../views/SongView.vue')
  },
  {
    path: '/register',
    name: 'register',
    component: () => import(/* webpackChunkName: "about" */ '../views/RegisterView.vue')
  },
  {
    path: '/login',
    name: 'login',
    component: () => import(/* webpackChunkName: "about" */ '../views/LoginView.vue')
  },
  {
    path: '/profile',
    name: 'profile',
    component: () => import(/* webpackChunkName: "about" */ '../views/ProfileView.vue')
  }
  
]

const router = createRouter({
  history: createWebHistory(process.env.BASE_URL),
  routes
})

export default router
