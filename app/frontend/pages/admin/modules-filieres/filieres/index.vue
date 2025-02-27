<template>
    <div class="w-full min-h-[80vh] flex flex-col gap-[20px]">
        <div class="w-full flex justify-between">
            <ul class="flex gap-[20px] sub-link">
                <li><NuxtLink to="/admin/modules-filieres" class="active-sub-link">Vue d'ensemble</NuxtLink></li>
                <li><NuxtLink to="/admin/modules-filieres/modules/">Liste des modules</NuxtLink></li>
                <li><NuxtLink to="/admin/modules-filieres/filieres/">Liste des filières</NuxtLink></li>
            </ul>

            <div class="flex gap-[10px]">
                <NuxtLink to="/admin/modules-filieres/filieres/create-filiere"  class="flex gap-2 p-1 bg-(--white) rounded-[4px] shadow-md">
                    <div class="flex items-center justify-center w-[25px] h-[25px] rounded-[2px] bg-(--primary) text-(--white)">
                        <i class="pi pi-plus"></i>
                    </div>
                    Ajouter
                </NuxtLink>
            </div>
        </div>

        <div class="w-full flex flex-col gap-[20px]">
            <FiliereDataTableComponent :data="data" :columns="columns"/>
        </div>
    </div>
</template>

<script setup>
    import ModuleDataTableComponent from '~/components/ModuleDataTableComponent.vue';
    definePageMeta(
        {
            layout: 'dashboard',
            middleware: ['auth', 'admin']
        }
    ) 
    
    const route = useRouter().currentRoute.value.fullPath

</script>


<style scoped>

</style>