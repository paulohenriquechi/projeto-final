<template>
    <footer id="footer">
        <p class="text">
            © 2023 ALICE IN CHAINS. ALL RIGHTS RESERVED. PRIVACY POLICY.
            DESIGN & DEVELOPMENT BY PAULO HENRIQUE CHI
        </p>
    </footer>
</template>
<script>
    export default{
        name: "Footer"
    }
</script>
<style>
    #footer{
        height: 100px;
        display: flex;
        align-items: center;
        justify-content: center;
        padding: 20px;
        border-top: 1px solid #353535;
    }
    .text{
        text-align: center;
    }
</style>