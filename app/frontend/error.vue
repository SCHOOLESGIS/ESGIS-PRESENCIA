<template>
    <div class="w-full h-[100vh] flex flex-col items-center justify-center">
        <img src="/icons/404.png" alt="">
        <NuxtLink to="/admin" class="p-button rounded-[4px] w-[150px] text-start flex items-center gap-3 px-[20px] py-[10px] cursor-pointer">
            <Icon icon="" :ssr="true" class="text-(--dark-text-color-2)"/>
            <span class="font-normal text-(--white)">go to home</span>
        </NuxtLink>
    </div>
</template>

<script setup>
    
</script>


<style scoped>
    .p-button {
        color: var(--white) !important;
        background: var(--primary) !important;
        border: 1px solid var(--primary) !important;
        padding: 10px 20px !important;
        border-radius: 4px !important;
        transition: all .2s .1s ease-in-out;
    }

    .p-button:hover {
        box-shadow: 0 0 10px 1px var(--primary);
    }
</style>