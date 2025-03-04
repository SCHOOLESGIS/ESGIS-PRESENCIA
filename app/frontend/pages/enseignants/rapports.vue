<template>
    <div class="w-full min-h-[80vh] flex flex-col gap-[20px]">
        <div class="bg-white p-[10px_20px] w-full min-h-[10vh] rounded-[4px] shadow-lg flex flex-wrap md:justify-between gap-3">
            <div class="md:w-[33%] w-[100%] min-h-[10vh] flex flex-col items-start justify-start">
                <div class="md:text-[2rem] text-[1.5rem] text-(--primary)">Section des rapports</div>
                <div class="text-(--dark-text-color-1)">Voici la liste de vos rapports générés.</div>
            </div>
            <div v-if="links && links.length" class="md:w-[33%] w-[100%] min-h-[10vh] border border-[3px] border-(--primary) rounded-[4px] font-bold text-[2rem] flex items-center justify-end p-1">
                <div class="w-full h-full hover:bg-(--primary) rounded-[4px] hover:text-white text-(--primary) p-1 flex items-center justify-center">
                    {{ links[0] }}
                </div>
            </div>
        </div>
        <!-- hhhh{{ cookie }} -->
        <div class="w-full flex justify-start gap-4">
            <div class="flex gap-[10px]">
                <NuxtLink @click="createRapport(enseignantID)" class="flex gap-2 p-1 bg-(--white) rounded-[4px] shadow-md cursor-pointer">
                    <div class="flex items-center justify-center w-[25px] h-[25px] rounded-[2px] bg-(--primary) text-(--white)">
                        <template v-if="data && data.length"><i class="pi pi-chart-line"></i></template>
                        <template v-else><i class="pi pi-spin pi-spinner" style="font-size: 1rem"></i></template>
                    </div>
                    Générer un rapport
                </NuxtLink>
            </div>
        </div>

        <div class="w-full flex flex-col gap-[20px]">
            <RapportByEnseignantDataTableComponent/>
        </div>
    </div>
</template>

<script setup>
    import RapportByEnseignantDataTableComponent from '~/components/RapportByEnseignantDataTableComponent.vue';
    import { useRapport } from '@/composables/useRapport';
    const {getAllRapportsByID, createRapport} = useRapport()
    const cookie = useCookie('auth')
    const enseignantID = cookie.value.user.enseignant.enseignant_id
    const data = useState("rapportsByID")
    definePageMeta(
        {
            layout: 'enseignant-dashboard',
            middleware: ['enseignant']
        }
    ) 
    
</script>


<style scoped>
    
</style>