<template>
  <div>
    <BannerText
      style="background-image: url('https://cms.kerrang.com/images/2021/03/Alice-In-Chains-1995-press-shot-credit-Rocky-Schenck.jpg');"
    />
    <BannerLink
      pageUrl="about"
      pageName="About"
      style="background-image: url('https://media.tenor.com/tYf6sWNL3DIAAAAd/jerry-alice-in-chains-layne-staley.gif');"
    />
    <BannerLink
      pageUrl="albums"
      pageName="Discography"
      style="background-image: url('https://media.tenor.com/h7FMdflfmJwAAAAC/alice-in-chains-layne-staley.gif');"
    />
    <BannerLink
      pageUrl="songs"
      pageName="Songs"
      style="background-image: url('https://images.alphacoders.com/651/651735.jpg');"
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
