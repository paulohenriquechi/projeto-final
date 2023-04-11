<template>
    <div class="about">
        <!-- <pre>{{ $route }}</pre> -->
      <h2>{{albumInfo.album_name}}</h2>
      <img width="250" :src="albumInfo.album_cover" alt="">
      <p>{{ albumInfo.album_type }}</p>
      <p>{{ albumInfo.release_date }}</p>
      <h3>Tracklist</h3>
        <ol>
            <li v-for="song in songs" :key="song.song_url"><router-link :to="'../songs/'+song.song_url">{{ song.song_name }}</router-link> - {{ song.length }}</li>
        </ol>
    </div>
</template>
<script>
    export default{
      data(){
        return{
          album: this.$route.params.album,
          albumInfo: "",
          songs: ""
        }
      },
      methods: {
        async getSongs(album){
          const req = await fetch(`http://127.0.0.1:8000/api/album/${album}`)
          const res = await req.json()
          this.songs = res
        //   console.log(this.songs)
        },
        async getAlbum(album){
          const req = await fetch(`http://127.0.0.1:8000/api/albums/${album}`)
          const res = await req.json()
          this.albumInfo = res
        //   console.log(this.albumInfo)
        }
      },
      mounted(){
        this.getSongs(this.album)
        this.getAlbum(this.album)
      }
    }
  </script>