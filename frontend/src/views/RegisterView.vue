<template>
    <main id="main">
    <!-- <pre>{{ $route }}</pre> -->
        <div id="main-container">
            <div id="left">
                <img src="https://media.tenor.com/xF2W3Yo4w-0AAAAM/aic-alice-in-chains.gif" alt="">
            </div>
            <div id="right">
                <h1>Register</h1>
                <form action="">
                    <input type="text" placeholder="username" id="username" v-model="dataForm.username">
                    <p v-if="errors.username">{{errors.username[0]}}</p>
                    <input type="text" placeholder="email" id="email" v-model="dataForm.email">
                    <p v-if="errors.email">{{errors.email[0]}}</p>
                    <input type="text" placeholder="password" id="password" v-model="dataForm.password">
                    <p v-if="errors.password">{{errors.password[0]}}</p>
                    <input type="text" placeholder="password confirmation" id="password_confirmation" v-model="dataForm.password_confirmation">
                    <p v-if="errors.password_confirmation">{{errors.password_confirmation[0]}}</p>
                    <button type="button" @click="register()">Register</button>
                </form>
            </div>
        </div>
        <!-- <h1 class="title transparent">Register</h1>
        <div id="form-container">
            <form action="" id="form">
                <input type="text" name="" id="" placeholder="Full Name"> -->
                <!-- <div class="input-container">
                    <div class="error">Erro</div>                    
                </div> -->
                <!-- <input type="email" name="" id="" placeholder="Email"> -->
                <!-- <div class="input-container">
                    <div class="error">Erro</div>
                </div> -->
                <!-- <input type="password" name="" id="" placeholder="Password"> -->
                <!-- <div class="input-container">
                </div> -->
                <!-- <input type="password" name="" id="" placeholder="Confirm Password"> -->
                <!-- <div class="input-container">
                </div> -->
                <!-- <button>Register</button> -->
                <!-- <div class="input-container">
                </div> -->
            <!-- </form> -->
        <!-- </div> -->
        
    </main>
</template>
<script>
    import axios from "axios"
    export default {
        name: "Register",
        data(){ 
            return{
                dataForm: {},
                errors: {}
            }
        },
        methods: {
            register(){
                axios.post(`${process.env.VUE_APP_URL}register`, this.dataForm).then((res)=>{
                    console.log("Caso passe nas validações")
                    console.log(res.data)
                }).catch((error)=>{
                    console.log("Erros: ")
                    console.log(error)
                    //retornando erros
                    this.errors = JSON.parse(error.response.request.response).errors
                    // buscando erros individuais para futuramente colocar como mensagem de erro
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

    /* #main{
        width: 100vw;
        background-image: url("https://www.revolvermag.com/sites/default/files/media/images/article/aliceinchains_main_pamelalittky.143-web.jpg");
        background-repeat: no-repeat;
        background-size: cover;
    }
    #form-container{
        width: 50vw;
        margin: 0 auto;
        padding: 10px;
        display: flex;
        align-items: center;
        justify-content: center;
        border: 1px solid #fff;
    }
    #form{
        display: flex;
        flex-direction: column;
        width: 100vw;
    }
    input, button{
        margin: 10px 20px;
        padding: 10px 20px;
        padding: 0 10px;
        margin: 10px;
        height: 3em;
        border-style: none;
        border-bottom: 1px solid #fff;
        border-bottom: 1px solid #fff;
    }
    .transparent{
        background-color: transparent;
    } */

</style>