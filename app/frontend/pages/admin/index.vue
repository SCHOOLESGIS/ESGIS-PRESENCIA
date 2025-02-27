<template>
    <div>
        <div if="data" class="text-xl">Welcome <span class="font-bold text-(--primary)">{{ data.user.name + ' ' + data.user.surname }}</span> !</div>
    </div>
</template>

<script setup>
    definePageMeta(
        {
            layout: 'dashboard',
            middleware: ['auth', 'admin']
        }
    )
    const data = useCookie('auth')
</script>


<style>
    
</style>