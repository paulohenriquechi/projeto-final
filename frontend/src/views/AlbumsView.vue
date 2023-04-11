<template>
    <div class="about">
      <h2>Albums</h2>
      <div id="grid">
          <div v-for="album in albums" :key="album.id" class="card">
            <img :src="album.album_cover" alt="album.album_name">
            <p><router-link :to="'albums/'+album.album_url">{{ album.album_name }}</router-link></p>
            <!-- <p>Release Date: {{ album.release_date }}</p>
            <p>{{ album.description }}</p> -->
          </div>
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
        async getAlbums(){
          const req = await fetch("http://127.0.0.1:8000/api/albums")
          const res = await req.json()
          this.albums = res
        }
      },
      mounted(){
        this.getAlbums()
      }
    }
</script>
<style scoped>
    #grid{
        display: grid;
        grid-template-columns: repeat(3, 1fr);
        width: fit-content;
        margin: 0 auto;
        gap: 10px;
    }
    .card{
        width: 300px;
        align-content: center;
        border: 1px solid black;
    }
    .card>img{
        width: inherit;
    }
    .card>p{
        text-align: center;
    }
</style>
  