<template>
        <div id="create-review" v-if="showForm">
            <h2 class="title">{{ title }}</h2>
            <!-- v-if="isAuth && !isReviewed" -->
          <form id="create-review-container">
            <div class="input-container">
              <label for="rating">Rate </label>
              <!-- value="rating" -->
              <select name="rating" id="rating" class="select-container" :v-model="dataForm.rating">
                <option value="" disabled selected hidden></option>
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
              <!-- <p v-if="errors.rating">{{ errors.rating[0] }}</p> -->
            </div>
            <div class="input-container">
              <label for="review-content">Review </label>
              <!-- v-model="dataForm.review" -->
              <!-- value="review" -->
              <textarea name="review-content" id="review-content" cols="30" rows="10" :v-model="dataForm.review"></textarea>
              <!-- <p v-if="errors.review">{{ errors.review[0] }}</p> -->
            </div>
            <div class="input-container">
                <!-- @click="setReview($event)" -->
              <button @click.prevent="submitData">Send Review</button>
            </div>
          </form>
        </div>
</template>
<script>
    export default{
        name: "CreateReview",
        props: {
            title: String,
            showForm: Boolean,
            previousRating: Number,
            previousReview: String
        },
        data(){
            return{
                dataForm: {
                    rating: null,
                    review: ''
                }
            }
        },
        methods: {
            submitData(e){
                // this.$emit("passData", this.dataForm)
                this.$emit("passData", this.dataForm)
                // console.log(this.dataForm)
                console.log(this.dataForm)
            }
        },
        updated(){
            this.dataForm.rating = this.rating,
            this.dataForm.review = this.review
        }
    }
</script>
<style scoped>
  #reviews{
    margin: 10px auto;
    border-top: 1px solid #353535;
  }

  /* TESTE */
  #create-review{
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
  button{
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
    button:hover{
        background-color: #3333339a;
    }
</style>