<template>
    <main id="main">
        <div id="main-container">
            <form action="" id="form-container">
                <h2 class="title">Account Settings</h2>
                <div class="input-container">
                    <label for="">Username</label>
                    <input type="text" v-model="formData.username">
                    <p class="error" v-if="errors.username">{{ errors.username[0] }}</p>
                </div>
                <div class="input-container">
                    <label for="">Email</label>
                    <input type="email" v-model="formData.email">
                    <p class="error" v-if="errors.email">{{ errors.email[0] }}</p>
                </div>
                <div class="input-container">
                    <label for="">Profile Picture</label>
                    <button v-if="!pictureInput" class="button" @click.prevent="showPicture">Upload</button>
                    <div v-else class="input-file">
                        <input type="file" name="" id="" @change="pictureFile">
                        <button class="button" @click.prevent="showPicture">Cancel</button>
                    </div>
                </div>
                <div class="input-container">
                    <p>Insert your password to save the changes</p>
                    <label for="">Password</label>
                    <input type="password" name="" id="" v-model="formData.password">
                    <p class="error" v-if="errors.password">{{ errors.password[0] }}</p>
                </div>
                <div class="input-container">
                        <button class="button" id="button" type="button" @click.prevent="update">Update</button>
                    </div>
            </form>
        </div>
    </main>
</template>
<script>
    import axios, { formToJSON } from 'axios'
    export default{
        name: "EditProfileView",
        data(){
            return{
                pictureInput: false,
                formData: {},
                profilePicture: null,
                errors: {}
            }
        },
        methods: {
            getUserInfo(){
                axios.get(`${process.env.VUE_APP_URL}auth`, {
                    headers: {
                        "Content-type": "application/json",
                        "Authorization": `Bearer ${localStorage.getItem('token')}`
                    }
                }).then((res)=>{
                    if(res.status === 200){
                        this.formData.username = res.data.username
                        this.formData.email = res.data.email
                    }
                }).catch((error)=>{
                    console.clear
                })
            },
            showPicture(){
                this.pictureInput = !this.pictureInput
            },
            pictureFile(event){
                this.profilePicture = event.target.files[0]
            },
            update(){
                let form = new FormData()
                form.append('image', this.profilePicture)
                form.append('username', this.formData.username)
                form.append('email', this.formData.email)
                form.append('password', this.formData.password)
                axios.post(`${process.env.VUE_APP_URL}editProfile`, form, {
                    headers: {
                        "Content-type": "multipart/form-data",
                        "Authorization": `Bearer ${localStorage.getItem('token')}`
                    }
                }).then((res)=>{
                    this.$router.push({name: 'profile'})
                }).catch((error)=>{
                    this.errors = error.response.data.errors
                })
                
            }
        },
        mounted(){
            this.getUserInfo()
        }
    }
</script>
<style scoped>
    #main-container{
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            background-image: url("http://localhost:8000/storage/banners/edit.jpg");
            background-size: cover;
        }
        label, h2, p{
            background: transparent;
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
        width: 75%;
        margin: 10px auto;
        background-color: transparent;
    }

    .input-container>input, .input-container>button, .input-file>input{
            width: 100%;
            margin: 5px 0;
            padding: 10px;
            border-style: none;
            transition: all .2s linear;
            border: 1px solid #fff;
    }

    .input-file{
        background: transparent;
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
    .button:hover, input[type="file"]::file-selector-button:hover{
        background-color: #3333339a;
    }

    input[type="file"]::file-selector-button{
        color: #fff;
        background: transparent;
        cursor: pointer;
        border: none;
        padding: .5em;
        border: 1px solid #fff;
        transition: all .2s linear;
    }

    .error{
        color: darkred;
        background-color: transparent;
        text-decoration: underline;
        text-align: end;
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