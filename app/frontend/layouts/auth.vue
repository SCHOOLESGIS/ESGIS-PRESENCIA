<template>
    <div class="w-[100%] flex p-[10px] sm:py-[10px] sm:px-[20px] gap-[20px] h-[100vh]">
        <div class="w-[100%] h-[calc(100vh-20px)] sm:w-[100%] lg:w-[50%]">
            <div class="logo w-[100%] h-[35px]">
                <img src="../assets/images/logo/logo.svg" alt="">
            </div>
            <div class="w-[100%] h-[calc(100%-35px)] flex items-center justify-center p-[0px] sm:p-[10px] border">
                <slot/>
            </div>
        </div>
        <div class="w-[50%] hidden sm:hidden lg:block h-[calc(100vh-20px)]">   
            <div class="form-bg w-[100%] h-[100%] flex items-end justify-end rounded-[10px] bg-[url()] bg-cover bg-left">
                <img src="../assets/images/icons/form_logo.svg" class="shadow" alt="">
            </div>
        </div>
    </div>
</template>
<script setup>
    
</script>
<style scoped>
    .form-bg {
        background-image: url('../assets/images/patterns/Mash13.png');
    }
</style>