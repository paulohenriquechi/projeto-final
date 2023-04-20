<template>
    <main id="main">
      <BannerText
        style="background-image: url('https://media0.giphy.com/media/v1.Y2lkPTc5MGI3NjExZjJkM2Y3NTc0ZGZiZGM1ZjQ0NDA2OWM1NDJiZTQwNDcyYmRmOWU3NCZjdD1n/FTsKD27AsVbj5BTMBM/giphy.gif');"
        text="Songs"
      />
      <div id="main-container">
        <div id="song-container">
          <div id="song-list-header"></div>
            <ul class="song-list">
              <li class="song">
                <span class="song-header-image">#</span>
                <span class="song-header-name">Song</span>
                <span class="song-header-album">Album</span>
                <span class="song-header-length">Length</span>
              </li>
              <li class="song" v-for="song in songs" :key="song.song_url">
                <img class="album-image" :src="song.albumInfo[0].album_cover" :alt="song.album">
                <router-link class="song-name" :to="'songs/'+song.song_url">{{ song.song_name }}</router-link>
                <router-link class="album-name" :to="'albums/'+song.albumInfo[0].album_url">{{ song.album }}</router-link>
                <span class="song-length">{{ song.length }}</span>
              </li>
            </ul>
        </div>
      </div>
    </main>
  </template>
<script>
    import BannerText from '@/components/BannerText.vue'
    export default{
      data(){
        return{
          songs: "",
        }
      },
      components: {
        BannerText
      },
      methods: {
        async getSongs(){
          const req = await fetch("http://127.0.0.1:8000/api/songs")
          const res = await req.json()
          this.songs = res
        }
      },
      mounted(){
        this.getSongs()
      }
    }
</script>
<style scoped>
  #song-container{
    width: 75%;
    margin: 0 auto;
  }
  .album-image{
    width: 50px;
    border: 1px solid #353535;
  }
  .song{
    display: flex;
    justify-content: space-between;
    align-items: center;
    border-bottom: 1px solid #353535;
    margin: 10px 0;
    padding: 10px 0;
  }
  .song-length, .song-name, .album-name{
    color: #999;
  }
  .album-image, .song-length{
    width: 10%;
  }
  .song-name, .album-name{
    width: 35%;
    transition: all .5s ease-in-out;
    
  }
  .song-name:hover, .album-name:hover{
    text-decoration: underline;
    color: #fff;
  }
  .song-header-image, .song-header-length{
    width: 10%;
  }
  .song-header-image{
    text-align: center;
  }
  .song-header-name, .song-header-album{
    width: 35%;
  }
</style>
  