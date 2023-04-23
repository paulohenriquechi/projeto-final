<template>
    <main id="main">
        <div id="main-container">
            <form action="" id="form-container">
                    <h1 class="title">Register</h1>
                    <div class="input-container">
                        <label for="username">Username</label>
                        <input type="text" placeholder="username" id="username" v-model="dataForm.username">
                        <p class="error" v-if="errors.username">{{errors.username[0]}}</p>
                    </div>
                    <div class="input-container">
                        <label for="email">Email</label>
                        <input type="email" placeholder="email" id="email" v-model="dataForm.email">
                        <p class="error" v-if="errors.email">{{errors.email[0]}}</p>
                    </div>
                    <div class="input-container">
                        <label for="password">Password</label>
                        <input type="password" placeholder="password" id="password" v-model="dataForm.password">
                        <p class="error" v-if="errors.password">{{errors.password[0]}}</p>
                    </div>
                    <div class="input-container">
                        <label for="password_confirmation">Password Confirm</label>
                        <input type="password" placeholder="password confirmation" id="password_confirmation" v-model="dataForm.password_confirmation">
                        <p class="error" v-if="errors.password_confirmation">{{errors.password_confirmation[0]}}</p>
                    </div>
                    <div class="input-container">
                        <button id="button" type="button" @click="register()">Register</button>
                    </div>
                    <div class="message-container">
                        <p class="message">Have already an account?  
                            <router-link class="link" to="/login">Login here</router-link>
                        </p>
                    </div>
                </form>
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
                    this.$router.push({name: 'login'})
                }).catch((error)=>{
                    this.errors = JSON.parse(error.response.request.response).errors
                })
            }
        }
    }
</script>
<style scoped>
        #main-container{
            background-image: url("https://wallpaper-mania.com/wp-content/uploads/2018/09/High_resolution_wallpaper_background_ID_77701280174.jpg");
            background-size: cover;
            height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        #form-container{
            width: 50%;
            height: 85%;
            background-color: rgba(0, 0, 0, 0.8);
            border: 1px solid #383837;
            padding: 20px;
            margin: 20px;
            display: flex;
            flex-direction: column;
            justify-content: space-around;
        }
        .input-container{
            background-color: transparent;
            width: 75%;
            margin: 0 auto;
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
            /* 
            border-style: none;
            border: 1px solid #fff;
            border-radius: 0px; */
            /* border: 1px solid white; */
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
        #button:hover{
            transition: all .2s linear;
            background-color: #3333339a;
        }
        .error{
            color: darkred;
            /* margin-top: 5px; */
            background-color: transparent;
            text-decoration: underline;
            text-align: end;
        }
        label{
            background: transparent;
            /* padding: 0 10px; */
        }
        .title{
            background-color: transparent;
            margin: 0;
            font-weight: 300;
        }
        .message-container{
            text-align: center;
            margin: 10px;
            padding: 10px;
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




        /* #main{
            display: flex;
            margin: 5% 0;
            background-image: url("https://wallpaper-mania.com/wp-content/uploads/2018/09/High_resolution_wallpaper_background_ID_77701280174.jpg");
            background-size: cover;
            
            
        }
        #main-container{
            margin: 10px auto;
            width: 50%;
            border: 1px solid #fff;
            display: flex;
            padding: 10px;
            display: flex;
            flex-direction: column;
            background-color: transparent;
        } */
        /* #left{
            width: 50%;
            border: 1px solid #fff;
        } */
        /* #left>img{
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
        } */
        /* form{
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
        /* } */ 

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