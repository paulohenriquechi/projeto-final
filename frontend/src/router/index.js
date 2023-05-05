import { createRouter, createWebHistory } from 'vue-router'
import HomeView from '../views/HomeView.vue'

const routes = [
  {
    path: '/',
    name: 'home',
    component: HomeView,
    meta:{
      title: "Home - Alice in Chains"
    }
  },
  {
    path: '/about',
    name: 'about',
    component: () => import(/* webpackChunkName: "about" */ '../views/AboutView.vue'),
    meta:{
      title: "About - Alice in Chains"
    }
  },
  {
    path: '/albums',
    name: 'albums',
    component: () => import(/* webpackChunkName: "about" */ '../views/AlbumsView.vue'),
    meta:{
      title: "Albums - Alice in Chains"
    }
  },
  {
    path: '/albums/:album',
    name: 'album',
    component: () => import(/* webpackChunkName: "about" */ '../views/AlbumView.vue'),
    meta:{
      title: "Album - Alice in Chains"
    }
  },
  {
    path: '/songs',
    name: 'songs',
    component: () => import(/* webpackChunkName: "about" */ '../views/SongsView.vue'),
    meta:{
      title: "Songs - Alice in Chains"
    }
  },
  {
    path: '/songs/:song',
    name: 'song',
    component: () => import(/* webpackChunkName: "about" */ '../views/SongView.vue'),
    meta:{
      title: "Song - Alice in Chains"
    }
  },
  {
    path: '/register',
    name: 'register',
    component: () => import(/* webpackChunkName: "about" */ '../views/RegisterView.vue'),
    meta: {
      requireAuth: false,
      title: "Register - Alice in Chains"
    }
  },
  {
    path: '/login',
    name: 'login',
    component: () => import(/* webpackChunkName: "about" */ '../views/LoginView.vue'),
    meta: {
      requireAuth: false,
      title: "Login - Alice in Chains"
    }
  },
  {
    path: '/profile',
    name: 'profile',
    component: () => import(/* webpackChunkName: "about" */ '../views/ProfileView.vue'),
    meta: {
      requireAuth: true,
      title: "Profile - Alice in Chains"
    }
  },
  {
    path: '/profile/edit',
    name: 'edit',
    component: () => import(/* webpackChunkName: "about" */ '../views/EditProfileView.vue'),
    meta: {
      requireAuth: true,
      title: "Profile Edit - Alice in Chains"
    }
  },
  {
    path: '/:pathMatch(.*)*',
    name: 'pagenotfound',
    component: () => import(/* webpackChunkName: "about" */ '../views/PageNotFoundView.vue'),
    title: "404 Not Found - Alice in Chains"
  }
  
]

const router = createRouter({
  history: createWebHistory(process.env.BASE_URL),
  routes
})

router.beforeEach(async(to, from, next)=>{
  document.title = to.meta.title
  const isAuth = await authUser()
  if(to.meta?.requireAuth){
    if(isAuth){
      next()
    }else{
      next({name: 'login'})
    }
  }else{
    if(isAuth){
      if(to.name=='register'||to.name=='login'){
        next({name: 'profile'})
      }else{
        next()
      }
    }else{
      next()
    }
  }
})

async function authUser(){
  try {
    const req = await fetch(`${process.env.VUE_APP_URL}auth`, {
      method: "GET",
      headers: {
        "Content-type": "application/json",
        "Authorization": `Bearer ${localStorage.getItem('token')}`
      }
    });
    const res = await req.json();
    return true
  } catch (error) {
    console.clear()
    return false
  }
}

export default router
