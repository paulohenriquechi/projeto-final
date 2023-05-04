import { createRouter, createWebHistory } from 'vue-router'
import HomeView from '../views/HomeView.vue'
import axios from 'axios'

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
    component: () => import(/* webpackChunkName: "about" */ '../views/RegisterView.vue'),
    meta: {
      requireAuth: false
    }
  },
  {
    path: '/login',
    name: 'login',
    component: () => import(/* webpackChunkName: "about" */ '../views/LoginView.vue'),
    meta: {
      requireAuth: false
    }
  },
  {
    path: '/profile',
    name: 'profile',
    component: () => import(/* webpackChunkName: "about" */ '../views/ProfileView.vue'),
    meta: {
      requireAuth: true
    }
  },
  {
    path: '/profile/edit',
    name: 'edit',
    component: () => import(/* webpackChunkName: "about" */ '../views/EditProfileView.vue'),
    meta: {
      requireAuth: true
    }
  }
  
]

const router = createRouter({
  history: createWebHistory(process.env.BASE_URL),
  routes
})

// var isAuth = false
// authUser()
// if(to.meta?.requireAuth){
//   if(isAuth){
//     next()
//   }else{
//     next({name: 'login'})
//   }
// }else{
//   next()
// }
router.beforeEach(async(to, from, next)=>{
  // let token = localStorage.getItem('token');
  const isAuth = await authUser()
  // console.log(isAuth)
  if(to.meta?.requireAuth){
    if(isAuth){
      next()
    }else{
      next({name: 'login'})
    }
    // console.log(token)
  }else{
    if(isAuth){
      if(to.name=='register'||to.name=='login'){
        next({name: 'profile'})
      }else{
        next()
      }
    }
    next()
  }
})

async function authUser(){
  try {
    const req = await fetch(`${process.env.VUE_APP_URL}auth`, {
      method: "POST",
      headers: {
        "Content-type": "application/json",
        "Authorization": `Bearer ${localStorage.getItem('token')}`
      },
      body: null
    });
    const res = await req.json();
    // console.log(`resposta do authUser`)
    // console.log(res)
    return true
    
  } catch (error) {
    // console.log("deu erro")
    return false
  }
}


// function authUser(){
//   axios.post(`${process.env.VUE_APP_URL}auth`, null, {
      // headers: {
      //   "Content-type": "application/json",
      //   "Authorization": `Bearer ${localStorage.getItem('token')}`
//       }
//     }).then((res)=>{
//     if(res.status === 200){
//       isAuth = true
//       return true
//     }else{
//       isAuth = false
//       return false
//     }
//   }).catch((error)=>{
//     return false
//   })
// }


export default router
