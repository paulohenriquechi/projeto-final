<template>
  <main id="main">
    <BannerText
    style="background-image: url('http://localhost:8000/storage/banners/biography.jpg');"
      text="Biography"
    />
    <div id="main-container">
      <section class="section-container">
        <h1 class="section-title">About the Band</h1>
          <p class="section-paragraph" v-for="(paragraph, index) in information.biography" :key="index">
            {{ paragraph }}
          </p>
      </section>
      <section class="section-container">
        <h1 class="section-title">
          Information
        </h1>
        <div class="info-container">
          <img src="https://aliceinchains.com/app/uploads/2018/06/default-shar.jpg" alt="">
          <div class="info">
            <div class="info-content">
              <h2 class="content-title">Origin: </h2>
              <div>
                <p>{{ information.city }}, {{ information.state }}</p>
                <p>{{ information.country }}</p>
              </div>
            </div>
            <div class="info-content">
              <h2 class="content-title">Genres: </h2>
              <ul>
                <li v-for="genres in information.genres" :key="genres">
                  {{ genres }}
                </li>
              </ul>
            </div>
            <div class="info-content">
              <h2 class="content-title">Years Active:</h2>
              <ul>
                <li v-for="years in information.activeYears" :key="years">{{ years }}</li>
              </ul>
            </div>
            <div class="info-content">
              <h2 class="content-title">Labels:</h2>
              <ul>
                <li v-for="label in information.labels" :key="label">
                {{ label }}
                </li>
              </ul>
            </div>
            <div class="info-content">
              <h2 class="content-title">Members: </h2>
              <ul>
                <li>Jerry Cantrell, Lead Guitar, 1987 – present</li>
                <li>Sean Kinney, Drums, 1987 – present</li>
                <li>Mike Inez, Bass, 1993 – present</li>
                <li>William DuVall, Lead Vocals, 2006 – present</li>
              </ul>
            </div>
            <div class="info-content">
              <h2 class="content-title">Past Members: </h2>
              <ul>
                <li>Layne Staley, Lead Vocals, 1987 – 2002</li>
                <li>Mike Starr, Bass, 1987 – 1993</li>
              </ul>
            </div>
          </div>
        </div>

      </section>
    </div>
  </main>
</template>
<script>
  import BannerText from '../components/BannerText.vue';
  import bandInfo from '../assets/information.json'
  export default{
    data(){
      return{
        information: bandInfo
      }
    },
    components: {
      BannerText
    }
  }
</script>

<style scoped>
  #main-container{
    width: 85vw;
    margin: 0 auto;
    padding: 0 20px;
  }
  .section-container{
    margin: 10px 0;
    border-bottom: 1px solid #353535;
  }
  .section-title{
    /* text-decoration: underline; */
    border-bottom: 1px solid #353535;
    text-align: center;
    margin: 10px 0;
  }
  .section-paragraph{
    margin: 15px 0;
    text-align: left;
  }

  .info-container>img{
    width: 100%;
    border: 1px solid #353535;
  }


  .info-content{
    margin: 10px 0;
    padding: 10px 0;
    border-top: 1px solid #353535;
    display: flex;
    justify-content: space-between;
  }
  .content-title{
    text-decoration: underline;
    text-decoration-color: #353535;
  }

  .info-content>h3{
    padding: 5px;
    margin: 5px;
  }
  .info-content>ul>li, .info-content>p, p{
    padding: 5px;
    text-align: right;
  }

  @media (min-width: 320px) and (max-width: 480px){
    #main-container{
      width: 100%;
    }
    .info-container{
      flex-direction: column;
    }
    .info-container>img{
      width: 100%;
    }
  }
</style>
