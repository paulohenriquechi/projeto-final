<template>
    <div class="review-container">
        <div class="left-container">
            <img class="image" :src="image" :alt="album">
            <div id="actions-container" v-if="showActions">
                <button class="button" :value="reviewId" @click="$emit('edit', $event.target.value)">Edit Review</button>
                <button class="button" :value="reviewId" @click="$emit('remove', $event.target.value)">Remove Review</button>
            </div>
        </div>
        <div class="review">
            <div class="review-user">
                <h3 class="review-title link" v-if="albumUrl">
                    <router-link :to="'/albums/'+albumUrl">{{ title }}</router-link>   
                </h3>
                <h3 class="review-title" v-else>
                    {{ title }}
                </h3>
                <p class="review-rating" v-if="showRating">Rating - {{ rating }}/10</p>
                <span class="review-date">
                    {{ new Date(date).toLocaleString('nl-NL').replaceAll('-', '/') }}
                </span>
            </div>
            <div class="review-content-container">
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
        albumUrl: String,
        title: String,
        date: String,
        content: String,
        showRating: Boolean,
        showActions: Boolean,
        rating: Number,
        reviewId: Number
    },
    emits: ['edit', 'remove']
}

</script>
<style scoped>
    .review-container{
    border: 1px solid #353535;
    margin: 20px auto;
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
    border-bottom: 1px solid #353535;
  }
  .review-content{
    padding: 10px 0;
  }
  .link:hover{
    text-decoration: underline;
    color: #FFF;
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
    @media (min-width: 320px) and (max-width: 480px){
        .review-container{
            flex-direction: column;
            padding: 10px;
            margin: 0;
            margin-bottom: 10px;
        }
        .review{
            width: 100%;
            padding: 0;
            margin: 0;
        }
        .review-user{
            width: 100%;
            flex-direction: column;
        }

        .left-container{
            width: 100%;
            margin: 0 auto;
            text-align: center;
            border-bottom: 1px solid #353535;
        }
        .image{
            margin: 0 auto;
            padding: 0;
            aspect-ratio: 1/1;
        }
        .review-content{
            word-wrap: break-word;
        }
        .review-user, .review-title, .review-date, .review-rating,  .review-content{
            padding: 5px 0;
        }
        .review-content{
            border-top: 1px solid #353535;

        }
    }
</style>