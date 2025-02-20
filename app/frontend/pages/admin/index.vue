<template>
    <div class="w-full min-h-[100vh]">
        {{ route }}
    </div>
</template>

<script setup>
    definePageMeta(
        {
            layout: 'dashboard'
        }
    )   
    
    const route = useRouter().currentRoute.value.fullPath
</script>


<style scoped>
    
</style>