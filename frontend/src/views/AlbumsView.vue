<template>
    <main id="main">
      <h1 class="title">Albums</h1>
      <div id="album-grid">
          <div v-for="album in albums" :key="album.id" class="card">
            <AlbumCard 
            :href="'/albums/'+album.album_url" 
            :imgSrc="album.album_cover" 
            :imgAlt="album.album_name" 
            :album="album.album_name"
            />
          </div>
      </div>
    </main>
  </template>
  <script>
    import AlbumCard from '@/components/AlbumCard.vue'
    export default{
      data(){
        return{
          albums: ""
        }
      },
      components: {
        AlbumCard
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
    #album-grid{
      display: grid;
      grid-template-columns: repeat(3, 1fr);
      margin: 0 auto;
      width: fit-content;
      padding: 10px 0px;
      gap: 10px;
    }

    @media (min-width: 320px) and (max-width: 480px){
      #album-grid{
        display: flex;
        flex-direction: column;
      }
  }
</style>