<template>
    <main id="main">
        
        <div>
            <button @click="logout">Logout</button>
        </div>

    </main>
</template>
<script>
    export default{
        name: "Profile",
        methods: {
            logout(){
                localStorage.removeItem('token')
                localStorage.removeItem('username')
                window.location.href = '/'
            }
        }
    }
</script>
<style scoped>
    
</style>