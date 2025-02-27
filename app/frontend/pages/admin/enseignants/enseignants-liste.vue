<template>
    <div class="w-full min-h-[80vh] flex flex-col gap-[20px]">
        <div class="w-full h-[20px] flex justify-between">
            <ul class="flex gap-[20px] sub-link">
                <li><NuxtLink to="/admin/enseignants" class="active-sub-link">Statistiques</NuxtLink></li>
                <li><NuxtLink to="/admin/enseignants/enseignants-liste/">Liste des enseignants</NuxtLink></li>
            </ul>

            <div class="">
                <NuxtLink to="/admin/enseignants/create-enseignant" class="flex gap-2 p-1 bg-(--white) rounded-[4px] shadow-md">
                    <div class="flex items-center justify-center w-[25px] h-[25px] rounded-[2px] bg-(--primary) text-(--white)">
                        <i class="pi pi-plus"></i>
                    </div>
                    Ajouter
                </NuxtLink>
            </div>
        </div>

        <div class="w-full flex flex-col gap-[20px]">
            <EnseignantDataTableComponent/>
        </div>
    </div>
</template>

<script setup>
    import EnseignantDataTableComponent from '~/components/EnseignantDataTableComponent.vue';
    import { useTeacher } from '@/composables/useTeacher';
    const {getAllTeachers} = useTeacher()

    definePageMeta(
        {
            layout: 'dashboard',
            middleware: 'auth'
        }
    )   

    onMounted(() => {
        getAllTeachers()
    })

</script>


<style scoped>

</style>