<template>
    <header id="header">
        <img id="bannerImage" :src="bannerImage" :alt="altText" @click="this.$router.push({name: 'home'})">
        <a href="#" class="toogle-button" @click="openClose">
            <span class="bar"></span>
            <span class="bar"></span>
            <span class="bar"></span>
        </a>
        <!-- <nav id="navbar">
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
    </nav> -->
        <Navbar/>
    </header>
</template>
<script>
    import Navbar from './Navbar.vue';
    export default{
        name: "Header",
        data(){
            return{
                bannerImage: "https://aliceinchains.com/app/uploads/2018/06/alice-in-chains.png",
                altText: "Alice in Chains"
            }
        },
        methods: {
            openClose(){
                const navbar = document.getElementById('navbar')
                navbar.classList.toggle('active')
            }
        },
        components: {
            Navbar
        },
        updated(){
            this.openClose()
        }
    }
</script>
<style scoped>
    #header{
        border-bottom: 1px solid #353535;
    }
    #bannerImage{
        margin: 0 auto;
        padding: 20px;
        display: flex;
        width: 75%;
    }

    .toogle-button{
        position: absolute;
        top: .75rem;
        right: 1rem;
        display: none;
        flex-direction: column;
        justify-content: space-between;
        width: 30px;
        height: 21px;
    }

    .toogle-button .bar{
        height: 3px;
        width: 100%;
        background-color: white;
    }

    /* navbar test */
    /* #navbar{
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
    } */
    /* teste */

    @media (min-width: 320px) and (max-width: 480px){
        #header{
            display: flex;
            flex-direction: column;
            align-items: center;
        }
        #bannerImage{
            width: 50%;
        }
        .toogle-button{
            display: flex;
        }
        /* #navbar{
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
        } */
    }
</style>