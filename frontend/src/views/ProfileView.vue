<template>
    <main id="main">
        <div id="main-container">
            <h2 class="title">My Account</h2>
            <div id="user-info">
                <div id="img-container">
                    <img src="https://a.ltrbxd.com/resized/avatar/upload/2/9/3/8/1/7/4/shard/avtr-0-1000-0-1000-crop.jpg?v=8eee5107c9" alt="">
                </div>
                <div id="info">
                    <div>
                        <h2>{{ user.username }}</h2>
                        <p>{{ user.email }}</p>
                        <p>Reviews: {{ reviews.length }}</p>
                    </div>
                </div>
                <div id="actions-container">
                    <button class="button" @click="edit">Edit</button>
                    <button class="button" @click="logout">Logout</button>
                </div>
            </div>

            <h2 class="title" v-if="showForm">Edit your {{ dataForm.album }} review!</h2>
            <div v-if="showForm" id="review">
                <form action="">
                    <div class="input-container">
                        <label for="rating">Rate </label>
                        <select name="rating" id="rating" class="select-container" v-model="dataForm.rating">
                            <option value="" disabled selected hidden>{{dataForm.rating}}</option>
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
                        <p class="error" v-if="errors.rating">{{ errors.rating[0] }}</p>
                    </div>
                    <div class="input-container">
                        <label for="review-content">Review </label>
                        <textarea name="review-content" id="review-content" cols="30" rows="10" v-model="dataForm.review"></textarea>
                        <p class="error" v-if="errors.review">{{ errors.review[0] }}</p>
                    </div>
                    <div class="input-container">
                        <button class="button" @click.prevent="updateReview">Update Review</button>
                        <button class="button" @click.prevent="cancelUpdate">Cancel</button>
                    </div>
                </form>
            </div>

            <div>
                <h2 class="title">My Reviews</h2>
                <Review v-for="review in reviews" :key="review.id"
                :reviewId="review.id"
                :image="review.album_cover"
                :album="review.album"
                :title="review.album"
                :date="review.updated_at"
                :content="review.review"
                :showRating=true
                :showActions=true
                :rating="review.rating"
                @edit="editReview"
                @remove="removeReview"
                />
            </div>
        </div>
    </main>
</template>
<script>
    import axios from 'axios'
    import Review from '@/components/Review.vue'
    export default{
        name: "Profile",
        data(){
            return{
                isAuth: false,
                showForm: false,
                dataForm: {},
                user: {},
                reviews: {},
                errors: {},
                config: {
                    headers: {
                        "Content-type": "application/json",
                        "Authorization": `Bearer ${localStorage.getItem('token')}`
                    }
                }
            }
        },
        methods: {
            logout(){
                axios.get(`${process.env.VUE_APP_URL}logout`, this.config)
                localStorage.removeItem('token')
                window.location.href = '/'
            },
            getUserInfo(){
                axios.post(`${process.env.VUE_APP_URL}auth`, null, this.config).then((res)=>{
                    if(res.status === 200){
                        this.isAuth = true
                        this.user = res.data
                        this.getUserReviews()
                    }
                }).catch((error)=>{
                    console.log(error)
                })
            },
            getUserReviews(){
                axios.get(`${process.env.VUE_APP_URL}getUserReviews/${this.user.id}`, this.config).then((res)=>{
                    this.reviews = res.data
                }).catch((error)=>{
                    console.log(error)
                })
            },
            editReview(e){
                this.showForm = true
                axios.get(`${process.env.VUE_APP_URL}getReview/${e}`, this.config).then((res)=>{
                    this.dataForm = res.data
                    window.location.href = '#review'
                }).catch((error)=>{
                    console.log(error)
                })
            },
            removeReview(e){
                axios.get(`${process.env.VUE_APP_URL}deleteReview/${e}`, this.config).then((res)=>{
                    this.getUserReviews()
                }).catch((error)=>{
                    console.log(error)
                })
            },
            updateReview(){
                axios.post(`${process.env.VUE_APP_URL}updateReview`, this.dataForm, this.config).then((res)=>{
                    this.showForm = !this.showForm
                    this.dataForm = {}
                    this.errors = {}
                    this.getUserReviews()
                }).catch((error)=>{
                    this.errors = error.response.data.errors
                    console.log(error)
                })
            },
            cancelUpdate(){
                this.showForm = !this.showForm
                this.dataForm = {}
            }

        },
        created(){
            this.getUserInfo()
        },
        components: {
            Review
        }
    }
</script>
<style scoped>
    #main{
        width: 80%;
        min-height: 100vh;
        margin: 0 auto;
    }
    #main-container{
        margin: 0 auto;
    }
    #user-info{
        border: 1px solid #353535;
        display: flex;
        justify-content: space-between;
        align-items: center;
        padding: 20px;
        text-align: center;
    }
    #info{
        /* text-align: left; */
    }
    #info, #img-container, #actions-container{
        padding: 10px ;
        width: 25%;
    }
    
    #img-container>img{
        width: 100%;
        border-radius: 50%;
        border: 1px solid white;
    }
    #actions-container{
        text-align: center;
    }
    
    .button{
        cursor: pointer;
        outline: hidden;
        outline-style: none;
        outline-width: 0;
        width: 100%;
        margin: 5px 0;
        padding: 10px;
        border-style: none;
        transition: all .2s linear;
        border: 1px solid #fff;


    }
    .button:hover{
        background-color: #3333339a;
        
    }

    img{
        width: 150px;
    }

  #review{
    border: 1px solid #353535;
    margin: 10px 0;
  }

  #review-content{
    resize: none;
  }
  .input-container{
    width: 50%;
    padding: 10px;
    margin: 10px auto;
    display: flex;
    flex-direction: column;
  }

  .error{
    color: darkred;
    /* margin-top: 5px; */
    background-color: transparent;
    text-decoration: underline;
    text-align: end;
    }
</style>