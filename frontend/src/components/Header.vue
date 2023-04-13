<template>
    <header id="header">
        <img id="bannerImage" :src="bannerImage" :alt="altText">
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
        components: {
            Navbar
        },
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
</style>