<template>
  <Header/>
  <router-view/>
  <Footer/>
</template>

<script>
  import Header from './components/Header.vue'
  import Footer from './components/Footer.vue';
  export default{
    components: {
      Header,
      Footer
    }
  }
</script>

<style>
*{
  font-family: 'Cinzel', serif;
  padding: 0;
  margin: 0;
  text-decoration: none;
  list-style: none;
  background-color: #000;
  color: #fff;
  box-sizing: border-box;
}
.title{
      text-align: center;
      padding: 10px 0;
      margin: 10px; 
    }
</style>
