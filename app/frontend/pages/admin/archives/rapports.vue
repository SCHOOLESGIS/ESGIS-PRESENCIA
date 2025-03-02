<template>
    <div class="w-full min-h-[80vh] flex flex-col gap-[20px]">
        <div class="w-full h-[20px] flex justify-between">
            <ul class="flex gap-[20px] sub-link">
                <li><NuxtLink to="/admin/archives" class="active-sub-link">Utilisateurs</NuxtLink></li>
                <li><NuxtLink to="/admin/archives/enseignants" class="active-sub-link">Enseignants</NuxtLink></li>
                <li><NuxtLink to="/admin/archives/emargements" class="active-sub-link">Emargements</NuxtLink></li>
                <li><NuxtLink to="/admin/archives/rapports" class="active-sub-link">Rapports</NuxtLink></li>
                <li><NuxtLink to="/admin/archives/modules" class="active-sub-link">Modules</NuxtLink></li>
                <li><NuxtLink to="/admin/archives/filieres" class="active-sub-link">Filieres</NuxtLink></li>
            </ul>

        </div>

        <div class="w-full flex flex-col gap-[20px]">
            <ArchivedRapportDataTableComponent/>
        </div>
    </div>
</template>

<script setup>
    import ArchivedRapportDataTableComponent from '~/components/ArchivedRapportDataTableComponent.vue';
    definePageMeta(
        {
            layout: 'dashboard',
            middleware: ['auth', 'admin']
        }
    ) 
</script>


<style scoped>
    
</style>