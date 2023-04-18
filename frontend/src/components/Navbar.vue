<template>
      <nav id="navbar">
        <div id="navbar-links" v-show="!userToken">
            <router-link class="link" to="/">Home</router-link>
            <router-link class="link" to="/about">About</router-link>
            <router-link class="link" to="/albums">Albums</router-link>
            <router-link class="link" to="/songs">Songs</router-link>
            <router-link class="link" to="/register">Register</router-link>
            <router-link class="link" to="/login">Login</router-link>
        </div>
        <div id="navbar-links" v-show="userToken">
            <router-link class="link" to="/">Home</router-link>
            <router-link class="link" to="/about">About</router-link>
            <router-link class="link" to="/albums">Albums</router-link>
            <router-link class="link" to="/songs">Songs</router-link>
            <router-link class="link" to="/profile">Profile</router-link>            
        </div>
  </nav>
</template>
<script>
    export default{
        name: "Navbar",
        data(){
            return{
                userToken: null
            }
        },
        methods: {
            isAuth(){
                this.userToken = localStorage.getItem('token')
            }
        },
        created(){
            this.isAuth()
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
</style>