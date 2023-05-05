<template>
    <header id="header">
        <img id="bannerImage" :src="bannerImage" :alt="altText" @click="this.$router.push({name: 'home'})">
        <a href="#" class="toogle-button" @click="openClose">
            <span class="bar"></span>
            <span class="bar"></span>
            <span class="bar"></span>
        </a>
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
    }
</style>