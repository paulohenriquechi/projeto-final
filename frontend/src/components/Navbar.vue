<template>
      <nav id="navbar">
        <div id="navbar-links" v-if="isAuth">
            <router-link class="link" to="/">Home</router-link>
            <router-link class="link" to="/about">About</router-link>
            <router-link class="link" to="/albums">Albums</router-link>
            <router-link class="link" to="/songs">Songs</router-link>
            <router-link class="link" to="/profile">Profile</router-link>
        </div>
        <div id="navbar-links" v-else>
            <router-link class="link" to="/">Home</router-link>
            <router-link class="link" to="/about">About</router-link>
            <router-link class="link" to="/albums">Albums</router-link>
            <router-link class="link" to="/songs">Songs</router-link>
            <router-link class="link" to="/register">Register</router-link>
            <router-link class="link" to="/login">Login</router-link>
        </div>
  </nav>
</template>
<script>
  import axios from 'axios';
    export default{
        name: "Navbar",
        data(){
            return{
                isAuth: false,
                config: {
                    headers: {
                        "Content-type": "application/json",
                        "Authorization": `Bearer ${localStorage.getItem('token')}`
                    }
                }
            }
        },
        methods: {
            authUser(){
                axios.get(`${process.env.VUE_APP_URL}auth`, this.config).then((res)=>{
                    if(res.status === 200){
                        this.isAuth = true
                    }
                }).catch((error)=>{
                    console.clear()
                })
            }
        },
        created(){
            this.authUser()
        }
    }
</script>
<style scoped>
    #navbar{
        padding: 20px 0px;
        margin: 0px 0px;
        border-top: 1px solid #353535;
    }
    #navbar-links{
        margin: 0 auto;
        display: flex;
        width: 25%;
        align-items: center;
        justify-content: space-around;
    }
    .link{
        margin: 0 10px;
        padding: 0 10px;
        color: #999999;
        transition: all .5s ease-in-out
    }
    .link:hover{
        color: #fff;
        text-decoration: underline;
        cursor: pointer;
    }

    /* teste */
    @media (min-width: 320px) and (max-width: 480px){
        #navbar{
            display: none;
            width: 100%;
            padding: 10px;
        }
        #navbar-links{
            display: flex;
            flex-direction: column;
        }
        .link{
            width: 100%;
        }

        #navbar.active{
            display: flex;
        }
    }
</style>