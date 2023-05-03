<template>
  <div>
    <BannerText
      style="background-image: url('http://localhost:8000/storage/banners/banner1.jpg');"
    />
    <BannerLink
      pageUrl="about"
      pageName="About"
      style="background-image: url('http://localhost:8000/storage/banners/banner2.gif');"
    />
    <BannerLink
      pageUrl="albums"
      pageName="Discography"
      style="background-image: url('http://localhost:8000/storage/banners/banner3.gif');"
    />
    <BannerLink
      pageUrl="songs"
      pageName="Songs"
      style="background-image: url('http://localhost:8000/storage/banners/banner4.jpg');"
    />
  </div>
</template>

<script>
  import BannerLink from '@/components/BannerLink.vue';
  import BannerText from '@/components/BannerText.vue';
  export default{
    name: "Home",
    components: {
      BannerLink,
      BannerText
    }
  }
</script>
