<template>
    <div class="w-full min-h-[80vh] flex flex-col gap-[20px]">
        <div class="w-full h-[20px] flex justify-between">
            <ul class="flex gap-[20px] sub-link">
                <li><NuxtLink to="/admin/archives" class="active-sub-link">Utilisateurs</NuxtLink></li>
                <li><NuxtLink to="/admin/archives/enseignants-liste" class="active-sub-link">Enseignants</NuxtLink></li>
                <li><NuxtLink to="/admin/archives/cours-liste" class="active-sub-link">Cours</NuxtLink></li>
                <li><NuxtLink to="/admin/archives/absences-liste" class="active-sub-link">Absences</NuxtLink></li>
                <li><NuxtLink to="/admin/archives/emargmenents-liste" class="active-sub-link">Amargements</NuxtLink></li>
                <li><NuxtLink to="/admin/archives/rapports-liste" class="active-sub-link">Rapports</NuxtLink></li>
                <li><NuxtLink to="/admin/archives/modules-liste" class="active-sub-link">Modules</NuxtLink></li>
                <li><NuxtLink to="/admin/archives/filieres-liste" class="active-sub-link">Filieres</NuxtLink></li>
            </ul>

        </div>

        <div class="w-full flex flex-col gap-[20px]">

        </div>
    </div>
</template>

<script setup>
    definePageMeta(
        {
            layout: 'dashboard'
        }
    )   
    
    const route = useRouter().currentRoute.value.fullPath
</script>


<style scoped>
    
</style>