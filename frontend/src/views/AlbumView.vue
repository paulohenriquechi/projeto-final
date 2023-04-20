<template>
    <main id="main">
      <BannerText
        :style="{'background-image': `url('${albumInfo.album_cover}')`}"
        :text="albumInfo.album_name"
      />
      <div id="album-description">
        <p class="description-paragraphs" 
          v-for="(description, index) in albumInfo.description"
          :key="index">
          {{ description }}
        </p>
      </div>
      <div class="album-container">
        <div id="left">
          <img class="album-cover" :src="albumInfo.album_cover" :alt="albumInfo.album_name">
        </div>
        <div id="right">
          <p id="release-year">{{ albumInfo.release_year }}</p>
          <h3 id="album-type">{{albumInfo.album_type}}</h3>
          <h2 id="tracklist-title">Tracklist</h2>
          <ul id="tracklist">
            <Track v-for="song in songs" 
            :key="song.id"
            :trackNumber="song.song_number"
            :trackName="song.song_name"
            :trackLength="song.length"
            :trackUrl="song.song_url"
            />
          </ul>
        </div>
      </div>
      <div class="spotify-container">
        <h2 class="title">Stream</h2>
        <iframe :src="`https://open.spotify.com/embed/album/${albumInfo.spotify_url}?utm_source=generator&theme=0`" width="100%" height="352" frameBorder="0" allowfullscreen="" allow="autoplay; clipboard-write; encrypted-media; fullscreen; picture-in-picture" loading="lazy"></iframe>
      </div>
      <div id="reviews">
        <h1 class="title">Reviews</h1>
        <div id="create-review">
          <form action="" id="create-review-container">
            <div class="input-container">
              <label for="rating">Rate </label>
              <select name="rating" id="rating" v-model="dataForm.rating" class="select-container">
                <option value="" disabled selected>Rate the Album</option>
                <option value="10">10</option>
                <option value="9">9</option>
                <option value="8">8</option>
                <option value="7">7</option>
                <option value="6">6</option>
                <option value="5">5</option>
                <option value="4">4</option>
                <option value="3">3</option>
                <option value="2">2</option>
                <option value="1">1</option>
                <option value="0">0</option>
              </select>
              <p v-if="errors.rating">{{ errors.rating[0] }}</p>
            </div>
            <div class="input-container">
              <label for="review-content">Review </label>
              <textarea name="review-content" id="review-content" cols="30" rows="10" v-model="dataForm.review">
              </textarea>
              <p v-if="errors.review">{{ errors.review[0] }}</p>
            </div>
            <div class="input-container">
              <button @click="setReview($event)">Send Review</button>
            </div>
          </form>
        </div>
        <div>
          <div>
            <router-link to="/login">Login</router-link>
            to review this album
          </div>
        </div>

        <div class="review-container" v-for="review in reviews" :key="review.id">
          <img src="https://pbs.twimg.com/media/Fti7MBYWYAA2cmn?format=jpg&name=small" alt="">
          <div class="review">
            <div class="review-user">
              <h3>{{ review.username}}</h3>
              <span>{{ new Date(review.updated_at).toLocaleString('nl-NL').replaceAll('-', '/') }}</span>
            </div>
              <p>{{ review.review }}</p>
          </div>
        </div>

      </div>

    </main>
</template>
<script>
    import Track from '../components/Track.vue'
    import BannerText from '../components/BannerText.vue'
    import axios from 'axios'
    export default{
      data(){
        return{
          token: {},
          dataForm: {},
          album: this.$route.params.album,
          albumInfo: "",
          songs: [],
          reviews: [],
          errors: {}
          
        }
      },
      components: {
        Track,
        BannerText
      },
      methods: {
        async getAlbum(album){
          const req = await fetch(`http://127.0.0.1:8000/api/albums/${album}`)
          const res = await req.json()
          this.albumInfo = res
          this.dataForm.album = this.albumInfo.album_name
          this.songs = this.albumInfo.songs
          this.reviews = this.albumInfo.reviews
          console.log(this.albumInfo)
        },
        getUserId(){
          this.token.token = localStorage.getItem('token')
          axios.post(`${process.env.VUE_APP_URL}user`, this.token).then((res)=>{
            this.dataForm.user_id = res.data
          }).catch((error)=>{
            console.log(error)
          })
        },
        setReview(e){
          e.preventDefault()
          axios.post(`${process.env.VUE_APP_URL}setReview`, this.dataForm).then((res)=>{
            location.reload()
          }).catch((error)=>{
            this.errors = error.response.data.errors
          })
        }
      },
      created(){
        this.getAlbum(this.album)
        this.getUserId()
      }
    }
</script>
<style scoped>
  .album-container{
    display: flex;
    padding: 10px;
    width: fit-content;
    margin: 0 auto;
    border-top: 1px solid #353535;
  }
  #right, #left{
    width: 500px;
    margin: 0 10px;
    padding: 0 10px;
  }
  .album-cover{
    width: inherit;
    border: 1px solid #353535;
  }
  #release-year, #album-type{
    margin-bottom: 5px;
  }
  #album-type{
    border-bottom: 1px solid #353535;
  }
  #tracklist, #tracklist-title{
    margin: 10px 0;
  }
  /* TesteEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEE */
  #album-description{
    width: 1000px;
    margin: 0 auto;
    padding: 30px 0px 20px;
  }
  .description-paragraphs{
    padding: 10px 0;
    font-size: 1.5em;
  }
  .spotify-container{
    border-top: 1px solid #353535;
    margin: 0 auto;
    width: 1000px;
  }
  .review-container{
    border: 1px solid #353535;
    margin: 0 auto;
    padding: 20px;
    display: flex;
  }
  .review-container>img{
    width: 20%;
    border-radius: 50%;
    height: 20%;
  }
  .review-container>.review{
    width: 80%;
  }
  .review, .review-container>img{
    padding: 10px;
    margin: 0 10px;
  }
  .review-user{
    display: flex;
    justify-content: space-between;
    padding: 10px 0;
  }
  .review>p{
    padding: 10px 0;
    
  }
  #reviews{
    width: 1000px;
    margin: 10px auto;
    border-top: 1px solid #353535;
  }

  /* TESTE */
  #create-review{
    width: 1000px;
    border: 1px solid white;
    margin: 10px 0;
  }

  #create-review-container{
    
  }
  .select-container{

  }
  .select-container>option{

  }
  #review-content{
    resize: none;
  }
  .input-container{
    width: 50%;
    padding: 10px;
    margin: 10px;
    display: flex;
    flex-direction: column;
  }



</style>
