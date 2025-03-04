<template>
    <div>
        <div class="w-[100%] mb-[20px]">
            <NuxtLink to="/enseignants/" class="shadow-lg w-[100px] px-[20px] py-[5px] bg-(--primary) text-(--white) flex items-center justify-center gap-3 rounded-[4px]">
                <i class="pi pi-chevron-circle-left"></i> 
                retour               
            </NuxtLink>
        </div>
        <EnseignantFiliereDataTableComponent/>
    </div>
</template>

<script setup>
    import { useUser } from '@/composables/useUser';
import EnseignantFiliereDataTableComponent from '~/components/EnseignantFiliereDataTableComponent.vue';
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