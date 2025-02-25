<template>
    <div class="w-full min-h-[80vh] flex flex-col gap-[20px]">
        <div class="w-full h-[20px] flex justify-between">
            <ul class="flex gap-[20px] sub-link">
                <li><NuxtLink to="/admin/modules-filieres" class="active-sub-link">Vue d'ensemble</NuxtLink></li>
                <li><NuxtLink to="/admin/modules-filieres/modules/">Liste des modules</NuxtLink></li>
                <li><NuxtLink to="/admin/modules-filieres/filieres/">Liste des filières</NuxtLink></li>
            </ul>

            <div class="px-[20px] flex gap-[10px]">
                <NuxtLink to="/admin/modules-filieres/modules/create-module/" class="flex gap-2">
                    <div class="flex items-center justify-center w-[25px] h-[25px] rounded-[2px] bg-(--primary) text-(--white)">
                        <i class="pi pi-plus"></i>
                    </div>
                    Ajouter
                </NuxtLink>
            </div>
        </div>

        <div class="w-full flex flex-col gap-[20px]">
            <ModuleDataTableComponent/>
        </div>
    </div>
</template>

<script setup>
    import ModuleDataTableComponent from '~/components/ModuleDataTableComponent.vue';
    import { useModule } from '@/composables/useModule';
    const { getAllModules } = useModule()

    definePageMeta(
        {
            layout: 'dashboard',
            middleware: ['auth', 'admin']
        }
    )
    
    onMounted(() => {
        getAllModules()
    })

</script>


<style scoped>

</style>