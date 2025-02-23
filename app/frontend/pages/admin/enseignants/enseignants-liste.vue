<template>
    <div class="w-full min-h-[80vh] flex flex-col gap-[20px]">
        <div class="w-full h-[20px] flex justify-between">
            <ul class="flex gap-[20px] sub-link">
                <li><NuxtLink to="/admin/enseignants" class="active-sub-link">Statistiques</NuxtLink></li>
                <li><NuxtLink to="/admin/enseignants/enseignants-liste/">Liste des enseignants</NuxtLink></li>
            </ul>

            <div class="px-[20px] bg-(--white)">
                Nuxt
            </div>
        </div>

        <div class="w-full flex flex-col gap-[20px]">
            <DataTableComponent :data="data" :columns="columns" :links="links"/>
        </div>
    </div>
</template>

<script setup>
    import DataTableComponent from '~/components/EnseignantDataTableComponent.vue';

    definePageMeta(
        {
            layout: 'dashboard',
            middleware: 'auth'
        }
    )   
    
    const route = useRouter().currentRoute.value.fullPath
    const cookie = useCookie("auth")

    onMounted(() => {
        teacherList()
    })

</script>


<style scoped>

</style>