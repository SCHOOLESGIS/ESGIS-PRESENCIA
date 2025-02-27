<template>
    <div class="w-full min-h-[80vh] flex flex-col gap-[20px]">
        <div class="w-full h-[20px] flex justify-between">
            <ul class="flex gap-[20px] sub-link">
                <li><NuxtLink to="/admin/users" class="active-sub-link">Listes des utilisateurs</NuxtLink></li>
            </ul>

        </div>

        <div class="w-full flex flex-col gap-[20px]">
            <UserDataTableComponent />
        </div>
    </div>
</template>

<script setup>
    import UserDataTableComponent from '~/components/UserDataTableComponent.vue';
    definePageMeta(
        {
            layout: 'dashboard'
        }
    )   
    
</script>


<style scoped>
    
</style>