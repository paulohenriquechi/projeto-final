<template>
    <main id="main">
        <div id="main-container">
                <form action="" id="form-container">
                    <h1 class="title">Login</h1>
                    <div class="input-container">
                        <label for="">Email</label>
                        <input type="email" placeholder="email" id="email" v-model="dataForm.email">
                        <p class="error" v-if="errors.email">{{ errors.email[0] }}</p>
                    </div>
                    <div class="input-container">
                        <label for="">Password</label>
                        <input type="password" placeholder="password" id="password" v-model="dataForm.password">
                    <p class="error" v-if="errors.password">{{ errors.password[0]}}</p>
                    <p class="error" v-if="errors.generalError">{{ errors.generalError}}</p>
                    </div>
                    
                    <div class="input-container">
                        <button id="button" type="button" @click="login()">Login</button>
                    </div>
                    <div class="message-container">
                        <p class="message">Don't have an account yet? 
                            <router-link class="link" to="/register">Register here</router-link>
                        </p>
                    </div>
                </form>
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
                errors: {},
                config: {
                    headers:{
                        "Content-type": "application/json",
                        "Authorization": `Bearer ${localStorage.getItem('token')}`
                    }
                }
            }
        },
        methods: {
            login(){
                axios.post(`${process.env.VUE_APP_URL}login`, this.dataForm).then((res)=>{
                    localStorage.setItem('token', res.data.token)
                    window.location.href = '/'

                }).catch((error)=>{
                    this.errors = JSON.parse(error.response.request.response).errors
                })
            }
        }
    }
</script>
<style scoped>
        #main-container{
            background-image: url("http://localhost:8000/storage/banners/login.jpg");
            background-size: cover;
            height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        #form-container{
            width: 50%;
            height: 65%;
            background-color: rgba(0, 0, 0, 0.8);
            border: 1px solid #383837;
            padding: 20px;
            margin: 20px;
            display: flex;
            flex-direction: column;
            justify-content: space-evenly;
        }
        .input-container{
            background-color: transparent;
            width: 75%;
            margin: 10px auto;
        }
        .input-container>input, .input-container>button{
            width: 100%;
            margin: 5px 0;
            padding: 10px;
            border-style: none;
            transition: all .2s linear;
            border: 1px solid #fff;
            
        }
        .input-container>input:focus{
            background-color: #3333339a;
            outline: hidden;
            outline-style: none;
            outline-width: 0;
        }
        .input-container>input:active{
            border: 1px solid white;
            outline: hidden;
            outline-style: none;
            outline-width: 0;
        }

        #button{
            cursor: pointer;
        }
        button:hover{
            transition: all .2s linear;
            background-color: #3333339a;
        }
        .error{
            color: darkred;
            background-color: transparent;
            text-decoration: underline;
            text-align: end;
        }
        label{
            background: transparent;
        }
        .title{
            background-color: transparent;
            margin: 0;
            font-weight: 300;
        }
        .message-container{
            text-align: center;
            margin: 20px;
            padding: 20px;
        }
        .message, .link, .message-container{
            background-color: transparent;
        }

        .link{
            text-decoration: underline;
            color: #999999;
            transition: all .5s ease-in-out;
        }
        .link:hover{
            color: #fff;
        }

        @media (min-width: 320px) and (max-width: 480px){
            
            #form-container{
                width: auto;
                height: auto;
            }

            .input-container{
                width: 90%;
            }
            .error{
                font-size: .8em;
            }
        }
</style>