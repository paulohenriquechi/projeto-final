<template>
    <section class="banner-container">
        <div class="center">
            <h2 class="text">{{ text }}</h2>
        </div>
    </section>
</template>
<script>
    export default{
        name: "BannerText",
        props: {
            text: String
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
        height: 100%;
        padding: 10px;
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        background-color: rgba(0, 0, 0, 0.5);
    }
    .text{
        background-color: transparent;
        padding: 20px 40px;
        font-size: 5em;
        font-weight: 300;
        word-spacing: 8px;
    }

    @media (min-width: 320px) and (max-width: 480px){
        .banner-container{
            height: 50vh;
        }
        .text{
            font-size: 2.5em;
        }
    }
</style>