<template>
    <figure class="album-container">
        <a class="album-image-link" :href="href">
            <img class="album-image blur" :src="imgSrc" :alt="imgAlt">
            <p class="content fade">{{imgAlt}}</p>
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
    /* teste abaixo */
    .album-image-link{
        position: relative;
        overflow: hidden;
    }
    .album-image{
        border: 2px solid #353535;
        display: block;
        aspect-ratio: 1/1;
        object-fit: cover;
        object-position: center;
    }
    .album-image:hover{

        cursor: pointer;
    }
    .content{
        position: absolute;
        inset: 0;
        font-size: 2rem;
        padding: 1rem;
        background: rgba(0, 0, 0, .6);
        display: flex;
        justify-content: center;
        align-items: center;
        text-align: center;
    }
    .album-image, .content{
        transition: 200ms ease-in-out;
    }

    .album-image-link:hover > .album-image.blur{
        border: 2px solid #fff;
    }
    .album-image-link >.content.fade{
        opacity: 0;
    }
    .album-image-link:hover >.content.fade{
        opacity: 1;
    }
    /* testeacima */
    .album-name{
        text-align: center;
        margin: 5px 0;
        padding: 5px 0;
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