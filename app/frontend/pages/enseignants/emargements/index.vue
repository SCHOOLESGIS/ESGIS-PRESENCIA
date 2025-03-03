<template>
    <div class="flex flex-col gap-4">
        <div class="bg-white p-[10px_20px] w-full min-h-[10vh] rounded-[4px] shadow-lg flex flex-wrap md:justify-between gap-3">
            <div class="md:w-[33%] w-[100%] min-h-[10vh] flex flex-col items-start justify-start">
                <div class="md:text-[2rem] text-[1.5rem] text-(--primary)">Section des emargements</div>
                <div class="text-(--dark-text-color-1)">Suivi de vos emargements effectués.</div>
            </div>
            <div v-if="links && links.length" class="md:w-[33%] w-[100%] min-h-[10vh] border border-[3px] border-(--primary) rounded-[4px] font-bold text-[2rem] flex items-center justify-end p-1">
                <div class="w-full h-full hover:bg-(--primary) rounded-[4px] hover:text-white text-(--primary) p-1 flex items-center justify-center">
                    {{ links[0] }}
                </div>
            </div>
        </div>
        <div class="w-full flex justify-start gap-4">
            <div class="flex gap-[10px]">
                <NuxtLink to="/enseignants/emargements/create" class="flex gap-2 p-1 bg-(--white) rounded-[4px] shadow-md">
                    <div class="flex items-center justify-center w-[25px] h-[25px] rounded-[2px] bg-(--primary) text-(--white)">
                        <i class="pi pi-plus"></i>
                    </div>
                    Ajouter un émargement
                </NuxtLink>
            </div>
        </div>
        <EnseignantEmargementDataTableComponent/>
    </div>
</template>

<script setup>
    import { useUser } from '@/composables/useUser';
    import EnseignantEmargementDataTableComponent from '~/components/EnseignantEmargementDataTableComponent.vue';
    const {logout} = useUser()
    const links = useState("enseignantEmargementLinks")
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