<template>
    <main id="main">
        <div id="main-container">
            <div id="left">
                <img src="https://media.tenor.com/xF2W3Yo4w-0AAAAM/aic-alice-in-chains.gif" alt="">
            </div>
            <div id="right">
                <h1>Login</h1>
                <form action="">
                    <input type="text" placeholder="email" id="email" v-model="dataForm.email">
                    <p v-if="errors.email">{{ errors.email[0] }}</p>
                    <input type="text" placeholder="password" id="password" v-model="dataForm.password">
                    <p v-if="errors.password">{{ errors.password[0]}}</p>
                    <p v-if="errors.generalError">{{ errors.generalError}}</p>
                    <button type="button" @click="login()">Login</button>
                </form>
            </div>
        </div>
    </main>
</template>
<script>
    import axios from "axios"
    export default {
        name: "Login",
        data(){ 
            return{
                dataForm: {},
                errors: {}
            }
        },
        methods: {
            login(){
                axios.post(`${process.env.VUE_APP_URL}login`, this.dataForm).then((res)=>{
                    console.log("Caso passe nas validações")
                    console.log(res.data)
                }).catch((error)=>{
                    // console.log("Erros: ")
                    console.log(error)
                    this.errors = JSON.parse(error.response.request.response).errors
                    console.log(this.errors)
                })
            }
        }
    }
</script>
<style scoped>
        #main{
            display: flex;
            margin: 5% 0;
        }
        #main-container{
            margin: 10px auto;
            width: 70%;
            /* border: 1px solid #fff; */
            display: flex;
            padding: 10px;
        }
        #left{
            width: 50%;
            /* border: 1px solid #fff; */
        }
        #left>img{
            width: 100%;
            height: 100%;
        }
        #right{
            width: 50%;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            border: 1px solid white;
        }
        form{
            display: flex;
            flex-direction: column;
            width: 100%;
        }
        input, button{
            margin: 10px;
            padding: 10px;
            border-style: none;
            border: 1px solid #fff;
            /* width: 100%; */
        }
</style>