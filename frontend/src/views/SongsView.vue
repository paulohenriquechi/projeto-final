<template>
    <main id="main">
      <BannerText
        style="background-image: url('https://media0.giphy.com/media/v1.Y2lkPTc5MGI3NjExZjJkM2Y3NTc0ZGZiZGM1ZjQ0NDA2OWM1NDJiZTQwNDcyYmRmOWU3NCZjdD1n/FTsKD27AsVbj5BTMBM/giphy.gif');"
        text="Songs"
      />
      <div id="main-container">
        <div class="song-container">
          <ul id="song-list">
          <li class="song header">
              <span class="song-name-header">Song</span>
              <div class="spans">
                <span>Album</span>
                <span>Length</span>
              </div>
          </li>
          <li class="song" v-for="song in songs" :key="song.song_url">
            <router-link class="song-name" :to="'songs/'+song.song_url">{{ song.song_name }}</router-link>
            <div class="spans">
              <span>{{ song.album }}</span>
              <span>{{ song.length }}</span>
            </div>
          </li>
        </ul>
        </div>
      </div>
      <!-- <div v-for="song in songs" :key="song.song_url">
        <p> - 
           <router-link :to="'albums/'+song.album">{{ song.album }}</router-link>
           
          - </p>
      </div> -->

    </main>
  </template>
<script>
    import BannerText from '@/components/BannerText.vue'
    export default{
      data(){
        return{
          songs: "",
          search: ""
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
          console.log(this.songs)
        },
        searchValue(event){
          this.search = event
          console.log(this.search)
        }
      },
      mounted(){
        this.getSongs()
      }
    }
</script>
<style scoped>
  
  #main-container{
    border-top: 1px solid #999999;
  }
  .song-container{
    width: 50%;
    margin: 0 auto;
  }
.song{
    display: flex;
    border-bottom: 1px solid #999999;
    padding: 10px;
    margin: 10px;
    color: #999999;
  }
.song-name, .song-name-header{
  width: 50%;
}
.song-name:hover{
  color: #fff;
  text-decoration: underline;
  transition: all .5s ease-in-out;
}
.song-name, .spans>span{
  color: #999999;
}
.spans{
  display: flex;
  width: 50%;
  justify-content: space-between;
}
.header{
  border: 1px solid white;
}
</style>
  