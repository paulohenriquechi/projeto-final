<template>
    <figure class="album-container">
        <a class="album-image-link" :href="href">
            <img class="album-image" :src="imgSrc" :alt="imgAlt">
        </a>
        <figcaption class="album-name">
            <a class="album-link" :href="href">
                {{ album }}
            </a>
        </figcaption>
    </figure>
</template>
<script>
    export default{
        name: "AlbumCard",
        props: {
            href: String,
            imgSrc: String,
            imgAlt: String,
            album: String
        }
    }
</script>
<style>
    .album-container{
        width: 300px;
    }
    .album-image-link, .album-image{
        width: inherit;
    }
    .album-image-link, .album-image, .album-name, .album-link{
        transition: all .5s ease-in-out
    }
    .album-image{
        border: 2px solid #353535;
    }
    .album-image:hover{
        border: 2px solid white;
        cursor: pointer;
    }
    .album-name{
        text-align: center;
    }
    .album-name:hover{
        text-decoration: underline;
        color: #353535;
    }
    .album-link{
        font-size: 1.125em;
        color: #999999;
    }
    .album-link:hover{
        color: #fff;
    }
</style>