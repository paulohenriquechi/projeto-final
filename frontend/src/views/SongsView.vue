<template>
    <main id="main">
      <h1 class="title">Songs</h1>
      <div>
        <input type="text" name="" id="">
      </div>
      <div v-for="song in songs" :key="song.song_url">
        <p><router-link :to="'songs/'+song.song_url">{{ song.song_name }}</router-link> - 
           <!-- <router-link :to="'albums/'+song.album">{{ song.album }}</router-link> -->
           {{ song.album }}
          - {{ song.length }}</p>
      </div>

    </main>
  </template>
<script>
    export default{
      data(){
        return{
          songs: "",
          search: ""
        }
      },
      methods: {
        async getSongs(){
          const req = await fetch("http://127.0.0.1:8000/api/songs")
          const res = await req.json()
          this.songs = res
          // console.log(this.songs)
        }
      },
      mounted(){
        this.getSongs()
      }
    }
</script>
  