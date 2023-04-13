<template>
    <main id="main">
      <BannerText
        :style="{'background-image': `url('${albumInfo.album_cover}')`}"
        :text="albumInfo.album_name"
      />
      <!-- <h1 class="title">{{ albumInfo.album_name }}</h1> -->
      <div id="album-description">
        <p class="description-paragraphs">
          Facelift is the debut studio album by the American rock band Alice in Chains, released by Columbia Records on August 21, 1990. The tracks "We Die Young", "Man in the Box", "Sea of Sorrow" and "Bleed the Freak" were released as singles. "Man in the Box" was nominated for a Grammy Award for Best Hard Rock Performance with Vocal in 1992. 
        </p>
        <p class="description-paragraphs">
          Facelift became the first album from the grunge movement to be certified gold on September 11, 1991. The album peaked at No. 42 on the Billboard 200 chart, and has been certified triple-platinum by the RIAA for shipments of three million copies in the United States.
        </p>
      </div>
      <div class="album-container">
        <div id="left">
          <img class="album-cover" :src="albumInfo.album_cover" :alt="albumInfo.album_name">
        </div>
        <div id="right">
          <p id="release-year">{{ albumInfo.release_year }}</p>
          <h3 id="album-type">{{albumInfo.album_type}}</h3>
          <h2 id="tracklist-title">Tracklist</h2>
          <ul id="tracklist">
            <Track v-for="song in songs" 
            :key="song.id"
            :trackNumber="song.song_number"
            :trackName="song.song_name"
            :trackLength="song.length"
            :trackUrl="song.song_url"
            />
          </ul>
        </div>
        <!-- <img width="250" :src="albumInfo.album_cover" alt="">
        <p>{{ albumInfo.album_type }}</p>
        <p>{{ albumInfo.release_date }}</p>
        <h3>Tracklist</h3>
          <ol>
              <li v-for="song in songs" :key="song.song_url"><router-link :to="'../songs/'+song.song_url">{{ song.song_name }}</router-link> - {{ song.length }} </li>
          </ol> -->
      </div>
      <div class="spotify-container">
        <h2 class="title">Stream</h2>
        <iframe src="https://open.spotify.com/embed/album/5LbHbwejgZXRZAgzVAjkhj?utm_source=generator&theme=0" width="100%" height="352" frameBorder="0" allowfullscreen="" allow="autoplay; clipboard-write; encrypted-media; fullscreen; picture-in-picture" loading="lazy"></iframe>
      </div>
      <div id="reviews">
        <h1 class="title">Reviews</h1>
        <div class="review-container">
          <img src="https://pbs.twimg.com/profile_images/1644096123068465159/06espOL8_400x400.jpg" alt="">
          <div class="review">
            <div class="review-user">
              <h3>
                zak kesterson
              </h3>
              <span>
                5/9/21 - 2:38PM
              </span>
            </div>
              <p>
                my band treeslug is looking for members in the puget sound area!! (ages 16-19) if you are a drummer and/or a vocalist and you like bands like tool, soundgarden, alice in chains, sleep, etc... hit us up
                more info on us: https://www.bandmix.com/treeslug/
                my band treeslug is looking for members in the puget sound area!! (ages 16-19) if you are a drummer and/or a vocalist and you like bands like tool, soundgarden, alice in chains, sleep, etc... hit us up
                more info on us: https://www.bandmix.com/treeslug/
                my band treeslug is looking for members in the puget sound area!! (ages 16-19) if you are a drummer and/or a vocalist and you like bands like tool, soundgarden, alice in chains, sleep, etc... hit us up
                more info on us: https://www.bandmix.com/treeslug/
                my band treeslug is looking for members in the puget sound area!! (ages 16-19) if you are a drummer and/or a vocalist and you like bands like tool, soundgarden, alice in chains, sleep, etc... hit us up
                more info on us: https://www.bandmix.com/treeslug/
                
              </p>
          </div>
        </div>
      </div>
    </main>
</template>
<script>
    import Track from '../components/Track.vue'
    import BannerText from '../components/BannerText.vue'
    export default{
      data(){
        return{
          album: this.$route.params.album,
          albumInfo: "",
          songs: []
        }
      },
      components: {
        Track,
        BannerText
      },
      methods: {
        async getAlbum(album){
          const req = await fetch(`http://127.0.0.1:8000/api/albums/${album}`)
          const res = await req.json()
          this.albumInfo = res
          this.songs = this.albumInfo.songs
        }
      },
      mounted(){
        this.getAlbum(this.album)
      }
    }
</script>
<style scoped>
  .album-container{
    display: flex;
    padding: 10px;
    width: fit-content;
    margin: 0 auto;
    border-top: 1px solid #353535;
  }
  #right, #left{
    width: 500px;
    margin: 0 10px;
    padding: 0 10px;
  }
  .album-cover{
    width: inherit;
    border: 1px solid #353535;
  }
  #release-year, #album-type{
    margin-bottom: 5px;
  }
  #album-type{
    border-bottom: 1px solid #353535;
  }
  #tracklist, #tracklist-title{
    margin: 10px 0;
  }
  /* TesteEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEE */
  #album-description{
    width: 1000px;
    margin: 0 auto;
    padding: 30px 0px 20px;
  }
  .description-paragraphs{
    padding: 10px 0;
    font-size: 1.5em;
  }
  .spotify-container{
    border-top: 1px solid #353535;
    margin: 0 auto;
    width: 1000px;
  }
  .review-container{
    border: 1px solid #353535;
    margin: 0 auto;
    padding: 20px;
    display: flex;
  }
  .review-container>img{
    width: 20%;
    border-radius: 50%;
    height: 20%;
  }
  .review-container>.review{
    width: 80%;
  }
  .review, .review-container>img{
    padding: 10px;
    margin: 0 10px;
  }
  .review-user{
    display: flex;
    justify-content: space-between;
    padding: 10px 0;
  }
  .review>p{
    padding: 10px 0;
  }
  #reviews{
    width: 1000px;
    margin: 10px auto;
    border-top: 1px solid #353535;
  }
</style>
