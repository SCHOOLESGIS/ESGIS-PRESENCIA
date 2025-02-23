<template>
    <div>
        Enseignant

        <div class="cursor-pointer" @click="logout">logout</div>
    </div>
</template>

<script setup>
    import { useUser } from '@/composables/useUser';
    const {logout} = useUser()
    definePageMeta(
        {
            middleware: ['enseignant']
        }
    )
</script>


<style>
    
</style>