<template>
    <main id="main">
      <h1 class="title">{{ albumInfo.album_name }}</h1>
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
    </main>
</template>
<script>
    import Track from '../components/Track.vue'
    export default{
      data(){
        return{
          album: this.$route.params.album,
          albumInfo: "",
          songs: []
        }
      },
      components: {
        Track
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
</style>
