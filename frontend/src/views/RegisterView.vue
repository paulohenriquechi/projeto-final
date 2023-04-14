<template>
    <main id="main">
        <div id="main-container">
            <div id="left">
                <img src="https://media.tenor.com/xF2W3Yo4w-0AAAAM/aic-alice-in-chains.gif" alt="">
            </div>
            <div id="right">
                <h1>Register</h1>
                <form action="">
                    <input type="text" placeholder="name">
                    <div>erro</div>
                    <input type="text" placeholder="email">
                    <div>erro</div>

                    <input type="text" placeholder="password">
                    <div>erro</div>

                    <input type="text" placeholder="repeat password">
                    <div>erro</div>

                    <button>Register</button>
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