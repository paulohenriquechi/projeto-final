<template>
    <main id="main">
        <div id="main-container">
            <form action="" id="form-container">
                <h2 class="title">Account Settings</h2>
                <div class="input-container">
                    <label for="">Username</label>
                    <input type="text" v-model="formData.username">
                </div>
                <div class="input-container">
                    <label for="">Email</label>
                    <input type="email" v-model="formData.email">
                </div>
                <div class="input-container">
                    <div v-if="!pictureInput">
                        <button class="button" @click.prevent="showPicture">Add Profile Picture</button>
                    </div>
                    <div v-else>
                        <label for="">Upload Profile Picture</label>
                        <input type="file" name="" id="" @change="pictureFile">
                        <button class="button" @click.prevent="showPicture">Cancel</button>
                    </div>
                </div>
                <div class="input-container">
                    <p>Insert your password to save the changes</p>
                    <label for="">Password</label>
                    <input type="password" name="" id="">
                </div>
                <div class="input-container">
                        <button id="button" type="button" @click.prevent="update">Update</button>
                    </div>
            </form>
        </div>
    </main>
</template>
<script>
    import axios from 'axios'
    export default{
        name: "EditProfileView",
        data(){
            return{
                pictureInput: false,
                formData: {},
                profilePicture: null,
            }
        },
        methods: {
            getUserInfo(){
                axios.post(`${process.env.VUE_APP_URL}auth`, null, {
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
                    console.log(error)
                })
            },
            showPicture(){
                this.pictureInput = !this.pictureInput
            },
            pictureFile(event){
                this.profilePicture = event.target.files[0]
                console.log(this.profilePicture)
            },
            update(){
                let form = new FormData()
                form.append('image', this.profilePicture)
                axios.post(`${process.env.VUE_APP_URL}editProfile`, form, {
                    headers: {
                        "Content-type": "multipart/form-data",
                        "Authorization": `Bearer ${localStorage.getItem('token')}`
                    }
                }).then((res)=>{
                    console.log(res)
                }).catch((error)=>{
                    console.log(error)
                })
                
            }
        },
        mounted(){
            this.getUserInfo()
        }
    }
</script>
<style scoped>
    #main{
        height: 100vh;
    }

    #main-container{
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
        width: 75%;
        padding: 10px;
        margin: 10px auto;
        display: flex;
        flex-direction: column;
    }

    .input-container>input, .input-container>button{
            width: 100%;
            margin: 5px 0;
            padding: 10px;
            border-style: none;
            transition: all .2s linear;
            border: 1px solid #fff;
            
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
    .button:hover{
        background-color: #3333339a;
        
    }
</style>