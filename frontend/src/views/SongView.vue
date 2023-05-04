<template>
  <main id="main">
    <BannerText
        :style="{'background-image': `url('${albumInfo.album_cover}')`}"
        :text="songInfo.song_name"
      />
      <div class="main-container">
        <div id="lyrics-container">
          <!-- <div id="song-container">
            <img id="song-image" :src="albumInfo.album_cover" alt="">

            <div id="album-info">
              <h1>{{ songInfo.song_name }}</h1>
              <p id="release_year">{{ albumInfo.release_year }}</p>
              <p>Track #{{ songInfo.song_number }} on {{ songInfo.album }}</p>
              <p>{{ songInfo.length }}</p>
              
            </div>
            
          </div> -->
          <h1 class="title">Stream</h1>
          <iframe :src="`https://open.spotify.com/embed/track/${songInfo.spotify_url}?utm_source=generator`" width="100%" height="352" frameBorder="0" allowfullscreen="" allow="autoplay; clipboard-write; encrypted-media; fullscreen; picture-in-picture" loading="lazy"></iframe>
          <h2 class="title">Lyrics</h2>
          <div id="lyrics">
            <p class="lyric" v-for="(lyrics, index) in songInfo.lyrics" :key="index">
              {{ lyrics }}
            </p>
          </div>
          <div class="links-container">
            <h2 class=" title">Explore</h2>
            <div class="links">
              <router-link to="/songs">Songs</router-link>
              <router-link :to="'/albums/'+albumInfo.album_url">{{ albumInfo.album_name }}</router-link>              
            </div>
          </div>
        </div>
      </div>
  </main>

    <!-- <div class="about">
    <pre>{{ $route }}</pre>
    <h1><router-link :to="'../albums/'+albumInfo.album_url">{{ albumInfo.album_name }}</router-link></h1>
    <img width="250" :src="albumInfo.album_cover" alt="">
      <h2>{{ songInfo.song_name }}</h2>
      <p>{{ songInfo.length }}</p>
      <h3>Lyrics</h3>
      <div v-for="(lyrics, index) in songInfo.lyrics" :key="index">
        <p class="song">{{ lyrics }}</p>
      </div>
    </div> -->
</template>
<script>
    import BannerText from '../components/BannerText.vue'
    export default{
      data(){
        return{
          song: this.$route.params.song,
          songInfo: "",
          albumInfo: {}
        }
      },
      methods: {
        async getSong(song){
          const req = await fetch(`http://127.0.0.1:8000/api/songs/${song}`)
          const res = await req.json()
          this.songInfo = res
          this.albumInfo = this.songInfo.albumInfo[0]
          console.log(this.albumInfo)
          console.log(this.songInfo)
        }
      },
      mounted(){
        this.getSong(this.song)
      },
      components: {
        BannerText
      }
    }
</script>
<style scoped>

  .title{
    border-bottom: 1px solid #353535;
  }

  #lyrics-container{
    width: 50%;
    margin: 0 auto;
    padding: 20px;
  }

  #song-image{
    width: 50%;
  }
  #song-container{
    display: flex;
    justify-content: space-evenly;
    
  }
  #lyrics{
    padding: 10px;
    margin: 10px;
    border-bottom: 1px solid #353535;
  }
  .lyric{
    white-space:pre;
    padding: 10px 0;
    text-align: center;
  }

  .links{
    display: flex;
    justify-content: space-between;
    padding: 10px;
    margin: 10px;
  }

  .links>a{
    transition: all .5s ease-in-out;
    color: #999999;
  }
  .links>a:hover{
    text-decoration: underline;
    color: #FFF;
  }

  @media (min-width: 320px) and (max-width: 480px){
    #lyrics-container{
      width: 100%;
    }
    .lyric{
      word-break: break-word;
      white-space: pre-wrap;
    }
  }
</style>
