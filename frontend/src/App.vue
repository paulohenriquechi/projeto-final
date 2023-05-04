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
  font-weight: 400;
}
.title{
  text-align: center;
  padding: 10px 0;
  margin: 10px; 
}


input:-webkit-autofill,
input:-webkit-autofill:hover,
input:-webkit-autofill:focus,
textarea:-webkit-autofill,
textarea:-webkit-autofill:hover,
textarea:-webkit-autofill:focus,
select:-webkit-autofill,
select:-webkit-autofill:hover,
select:-webkit-autofill:focus {
  -webkit-text-fill-color: #fff;
  -webkit-box-shadow: 0 0 0px 1000px #000 inset;
  transition: background-color 5000s ease-in-out 0s;
}

select, textarea{
  padding: 10px;
}
textarea:focus, select:focus{
  outline: none;
}

</style>
