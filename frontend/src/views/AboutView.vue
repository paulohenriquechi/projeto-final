<template>
  <div class="about">
    <h2>Albums</h2>
    <div v-for="album in albums" :key="album.id">
      <h1>{{ album.album_name }} - <span>{{ album.album_type }}</span></h1>
      <img width="250" :src="album.album_cover" alt="album.album_name">
      <p>Release Date: {{ album.release_date }}</p>
      <p>{{ album.description }}</p>
      <p>{{ album.songs }}</p>
    </div>
    <h2>Songs</h2>
    <h3>Facelift</h3>
    <p v-for="song in album" :key="song.song_name">{{ song.song_name }} - {{ song.length }}</p>
  </div>
</template>
<script>
  export default{
    data(){
      return{
        albums: "",
        album: ""
      }
    },
    methods: {
      async getAlbums(){
        const req = await fetch("http://127.0.0.1:8000/api/albums")
        const res = await req.json()
        this.albums = res
        console.log(this.albums)
      },
      async getAlbum(album){
        const req = await fetch(`http://127.0.0.1:8000/api/albums/${album}`)
        const res = await req.json()
        this.album = res
        console.log(this.album)
      }
    },
    mounted(){
      this.getAlbums()
      this.getAlbum("facelift")
    }
  }
</script>
