<template>
    <div class="w-full min-h-[80vh] flex flex-col gap-[20px]">
        <div class="w-full h-[20px] flex justify-between">
            <ul class="flex gap-[20px] sub-link">
                <li><NuxtLink to="/admin/emargements" class="active-sub-link">vue d'ensemble</NuxtLink></li>
                <li><NuxtLink to="/admin/emargements/emargements-liste/">Liste des emargements</NuxtLink></li>
                <li><NuxtLink to="/admin/emargements/cours-liste/">Liste des cours</NuxtLink></li>
                <li><NuxtLink to="/admin/emargements/absences-liste/">Liste des absences</NuxtLink></li>
            </ul>

        </div>

        <div class="w-full flex flex-col gap-[20px]">
            <AbsenceDataTableComponent/>
        </div>
    </div>
</template>

<script setup>
    import AbsenceDataTableComponent from '~/components/AbsenceDataTableComponent.vue';

    definePageMeta(
        {
            layout: 'dashboard'
        }
    )   
    
    const route = useRouter().currentRoute.value.fullPath
</script>


<style scoped>
    
</style>