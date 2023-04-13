<template>
    <section class="banner-container">
        <div class="center" :style="'display: '+display+';'">
            <router-link class="link" :to="'/'+pageUrl">{{ pageName }}</router-link>
        </div>
    </section>
</template>
<script>
    export default{
        name: "Banner",
        props: {
            pageUrl: String,
            pageName: String,
            display: String
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
        /* background-image: url(); */
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
    }
</style>