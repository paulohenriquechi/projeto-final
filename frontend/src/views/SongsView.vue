<template>
    <div class="about">
      <h2>Songs</h2>
      <div v-for="song in songs" :key="song.song_url">
        <p>#{{ song.song_number }} - <router-link :to="song.song_url">{{ song.song_name }}</router-link> - {{ song.length }}</p>
      </div>
      <hr>
    </div>
  </template>
<script>
    export default{
      data(){
        return{
          songs: ""
        }
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
  