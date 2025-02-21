<template>
    <div class="w-full min-h-[80vh] flex flex-col gap-[20px]">
        <div class="w-full h-[20px] flex justify-between">
            <ul class="flex gap-[20px] sub-link">
                <li><NuxtLink to="/admin/modules-filieres" class="active-sub-link">Vue d'ensemble</NuxtLink></li>
                <li><NuxtLink to="/admin/modules-filieres/modules/">Liste des modules</NuxtLink></li>
                <li><NuxtLink to="/admin/modules-filieres/filieres/">Liste des filières</NuxtLink></li>
            </ul>

            <div class="px-[20px] flex gap-[10px]">
                <NuxtLink to="/admin/modules-filieres/filieres/create-filiere">
                    <div class="flex items-center justify-center w-[25px] h-[25px] rounded-[2px] bg-(--primary) text-(--white)">
                        <i class="pi pi-plus"></i>
                    </div>
                </NuxtLink>

                <div class="rounded-[2px] shadow-md h-[25px] px-[10px] flex items-center justify-center bg-(--white) gap-[20px]">
                    Exportation
                    <i class="pi pi-plus"></i>
                </div>

                <div class="rounded-[2px] shadow-md h-[25px] px-[10px] flex items-center justify-center bg-(--white) gap-[20px]">
                    Filter
                    <i class="pi pi-filter"></i>
                </div>
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
            layout: 'dashboard'
        }
    )   
    
    const route = useRouter().currentRoute.value.fullPath

    const data = [
        {
            id: "1000",
            name: "Bamboo Watch",
            niveau: "teacher1@example.com",
            createdAt: "2024-02-20"
        },
        {
            id: "1000",
            name: "Bamboo Watch",
            niveau: "teacher1@example.com",
            createdAt: "2024-02-20"
        },
        {
            id: "1000",
            name: "Bamboo Watch",
            niveau: "teacher1@example.com",
            createdAt: "2024-02-20"
        },
        {
            id: "1000",
            name: "Bamboo Watch",
            niveau: "teacher1@example.com",
            createdAt: "2024-02-20"
        }
    ];

    const columns = [
        'id',
        'Noms enseignants',
        'Email',
        'Nbre d\'heure affectuées',
        'Nbre d\'heure d\'absences',
        'Date de création',
        'Actions'
    ];
</script>


<style scoped>

</style>