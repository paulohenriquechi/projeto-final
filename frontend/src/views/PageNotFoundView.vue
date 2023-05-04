<template>
        <BannerText
            style="background-image: url('http://localhost:8000/storage/banners/pagenotfound.jpg');"
            text="404 Page"
        />
</template>
<script>
  import BannerText from '@/components/BannerText.vue';
    export default{
        name: "PageNotFound",
        components: {
            BannerText
        }
    }
</script>
<style scoped>
    #banner-container{
        height: 100vh;
    }
    @media (min-width: 320px) and (max-width: 480px){
        #banner-container{
        height: 100vh;
    }   
    }
</style>