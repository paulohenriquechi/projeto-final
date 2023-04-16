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
          <iframe src="https://open.spotify.com/embed/track/6gZVQvQZOFpzIy3HblJ20F?utm_source=generator" width="100%" height="352" frameBorder="0" allowfullscreen="" allow="autoplay; clipboard-write; encrypted-media; fullscreen; picture-in-picture" loading="lazy"></iframe>
          <h1 class="title">Lyrics</h1>
          <div id="lyrics">
            <p class="lyric" v-for="(lyrics, index) in songInfo.lyrics" :key="index">
              {{ lyrics }}
            </p>
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
  }
  .lyric{
    white-space:pre;
    padding: 10px 0;
    text-align: center;
  }
</style>
