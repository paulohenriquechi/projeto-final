<template>
    <div class="review-container">
        <div>
            <img class="image" :src="image" :alt="album">
            <div id="actions-container" v-if="showActions">
                <button class="button">Edit Review</button>
                <button class="button">Remove Review</button>
            </div>
        </div>
        <div class="review">
            <div class="review-user">
                <h3 class="review-title">
                    {{ title }}
                </h3>
                <span class="review-date">
                    {{ new Date(date).toLocaleString('nl-NL').replaceAll('-', '/') }}
                </span>
            </div>
            <div class="review-content-container">
                <p v-if="showRating">Rating - {{ rating }}/10</p>
                <p class="review-content">
                    {{ content }}
                </p>
            </div>
        </div>
    </div>
</template>
<script>
export default{
    name: "Review",
    props: {
        image: String,
        album: String,
        title: String,
        date: String,
        content: String,
        showRating: Boolean,
        showActions: Boolean,
        rating: Number
    }
}

</script>
<style scoped>
    .review-container{
    border: 1px solid #353535;
    margin: 0 auto;
    padding: 20px;
    display: flex;
  }
  .image{
    width: 200px;
    border-radius: 50%;
    height: 200px;
  }
  .review{
    width: 80%;
  }
  .review, .image{
    padding: 10px;
    margin: 0 10px;
  }
  .review-user{
    display: flex;
    justify-content: space-between;
    padding: 10px 0;
  }
  .review-content{
    padding: 10px 0;
  }

  /* teste */
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
</style>