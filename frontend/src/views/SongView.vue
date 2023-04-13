<template>
    <div class="about">
    <!-- <pre>{{ $route }}</pre> -->
    <h1><router-link :to="'../albums/'+albumInfo.album_url">{{ albumInfo.album_name }}</router-link></h1>
    <img width="250" :src="albumInfo.album_cover" alt="">
      <h2>{{ songInfo.song_name }}</h2>
      <p>{{ songInfo.length }}</p>
      <h3>Lyrics</h3>
      <div v-for="(lyrics, index) in songInfo.lyrics" :key="index">
        <p class="song">{{ lyrics }}</p>
      </div>
    </div>
</template>
<script>
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
        }
      },
      mounted(){
        this.getSong(this.song)
      }
    }
</script>
<style scoped>
  .song{
    white-space:pre
  }
</style>
