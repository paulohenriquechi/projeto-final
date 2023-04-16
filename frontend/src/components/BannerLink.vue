<template>
    <section class="banner-container">
        <div class="center">
            <router-link class="link" :to="'/'+pageUrl">{{ pageName }}</router-link>
        </div>
    </section>
</template>
<script>
    export default{
        name: "BannerLink",
        props: {
            pageUrl: String,
            pageName: String,
        }
    }
</script>
<style scoped>
    .banner-container{
        position: relative;
        text-align: center;
        color: white;
        width: 100%;
        height: 100vh;
        background-repeat: no-repeat;
        background-size: cover;
        background-position: center;
        border-bottom: 1px solid #353535;
    }
    .center{
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        width: 100%;
        height: 20%;
        padding: 10px;
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        background-color: transparent;
    }
    .link{
        background-color: transparent;
        border: 1px solid white;
        padding: 20px 40px;
        font-size: 3em;
    }
    /* .text{
        padding: 20px 40px;
        background-color: transparent;
    } */
</style>