<template>
    <div>
        filieres
    </div>
</template>

<script setup>
    import { useUser } from '@/composables/useUser';
    const {logout} = useUser()
    definePageMeta(
        {
            layout: 'enseignant-dashboard',
            middleware: ['enseignant']
        }
    )
    const data = useCookie('auth')
</script>

<style scoped>
    
</style>