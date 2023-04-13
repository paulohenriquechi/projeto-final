<template>
    <li class="track">
        <span class="track-number">{{ trackNumber }}</span>
        <router-link class="track-name" :to="'../songs/'+trackUrl">{{ trackName }}</router-link>
        <span class="track-length">{{ trackLength }}</span>
    </li>
</template>
<script>
    export default{
        name: "Track",
        props: {
            trackNumber: Number,
            trackName: String,
            trackLength: String,
            trackUrl: String
        }
    }
</script>
<style>
    .track{
        display: flex;
        justify-content: space-between;
        border-bottom: 1px solid #353535;
        padding: 10px 0;
    }
    .track-number, .track-length{
        padding: 0 5px;
        margin: 0 5px;
        color: #999999;
    }
    .track-name{
        transition: all .5s ease-in-out;
        color: #999999;
        
    }
    .track-name:hover{
        text-decoration: underline;
        color: #FFF;
    }
</style>