<template>
  <div class="about">
    <div v-for="album in albums" :key="album.id">
      <h1>{{ album.album_name }} - <span>{{ album.album_type }}</span></h1>
      <img width="250" :src="album.album_cover" alt="album.album_name">
      <p>Release Date: {{ album.release_date }}</p>
      <p>{{ album.description }}</p>
    </div>

  </div>
</template>
<script>
  export default{
    data(){
      return{
        albums: ""
      }
    },
    methods: {
      async teste(){
        const req = await fetch("http://127.0.0.1:8000/api/albums")
        const res = await req.json()
        this.albums = res
        console.log(this.albums)
      }
    },
    mounted(){
      this.teste()
    }
  }
</script>
