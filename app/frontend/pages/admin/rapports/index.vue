<template>
    <div class="w-full min-h-[80vh] flex flex-col gap-[20px]">
        <div class="w-full h-[20px] flex justify-between">
            <ul class="flex gap-[20px] sub-link">
                <li><NuxtLink to="/admin/rapports" class="active-sub-link">vue d'ensemble</NuxtLink></li>
                <li><NuxtLink to="/admin/rapports/rapports-liste/">Liste des rapports</NuxtLink></li>
            </ul>

        </div>

        <div class="w-full flex flex-col gap-[20px]">

        </div>
    </div>
</template>

<script setup>
    import RapportDataTableComponent from '~/components/RapportDataTableComponent.vue';

    definePageMeta(
        {
            layout: 'dashboard'
        }
    )   
    
</script>


<style scoped>
    
</style>