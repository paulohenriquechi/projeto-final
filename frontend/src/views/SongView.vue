<template>
    <div class="about">
    <pre>{{ $route }}</pre>
      <h2>{{ songInfo.song_name }}</h2>
      <p>{{ songInfo.length }}</p>
      <div>
      </div>
    </div>
</template>
<script>
    export default{
      data(){
        return{
          song: this.$route.params.song,
          songInfo: ""
        }
      },
      methods: {
        async getSong(song){
          const req = await fetch(`http://127.0.0.1:8000/api/songs/${song}`)
          const res = await req.json()
          this.songInfo = res
          console.log(this.songInfo)
        }
      },
      mounted(){
        this.getSong(this.song)
      }
    }
</script>