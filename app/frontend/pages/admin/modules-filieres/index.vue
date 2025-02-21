<template>
    <div class="w-full min-h-[80vh] flex flex-col gap-[20px]">
        <div class="w-full h-[20px] flex justify-between">
            <ul class="flex gap-[20px] sub-link">
                <li><NuxtLink to="/admin/modules-filieres" class="active-sub-link">Vue d'ensemble</NuxtLink></li>
                <li><NuxtLink to="/admin/modules-filieres/modules/">Liste des modules</NuxtLink></li>
                <li><NuxtLink to="/admin/modules-filieres/filieres/">Liste des filières</NuxtLink></li>
            </ul>

            <div class="px-[20px] bg-(--white)">
                Nuxt
            </div>
        </div>

        <div class="w-full flex flex-col gap-[20px]">
            <div class="sm:flex gap-[20px] w-full h-[50vh]">
                <div class="w-[50%] h-full bg-(--white) rounded-[8px] shadow-md p-[10px]">
                    <div class="">Evolution des heures des modules cumulées</div>
                    <div class="h-[calc(100%-20px)]">
                        <BarChartComponent/>
                    </div>
                </div>
                <div class="w-[50%] h-full bg-(--white) rounded-[8px] shadow-md p-[10px]">
                    <div class="">Evolution des heures des filière</div>
                    <div class="h-[calc(100%-20px)]">
                        <BarSolidChartComponent/>
                    </div>
                </div>
            </div>

            <div class="flex gap-[20px] w-full h-[50vh]">
                <div class="w-[50%] h-full bg-(--white) rounded-[8px] shadow-md p-[10px]">
                    <div class="">Top modules</div>
                    <div class="h-[calc(100%-20px)]">
                        <BarHorizontalComponent/>
                    </div>
                </div>
                <div class="w-[50%] h-full bg-(--white) rounded-[8px] shadow-md p-[10px]">
                    <div class="">Top filière</div>
                    <div class="h-[calc(100%-20px)]">
                        <BarHorizontalFiliereChartComponent/>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script setup>
    import BarChartComponent from '~/components/BarChartComponent.vue'; 
    import BarSolidChartComponent from '~/components/BarSolidChartComponent.vue';   
    import BarHorizontalComponent from '~/components/BarHorizontalComponent.vue';
    import BarHorizontalFiliereChartComponent from '~/components/BarHorizontalFiliereChartComponent.vue';
    definePageMeta(
        {
            layout: 'dashboard'
        }
    )   
    
    const route = useRouter().currentRoute.value.fullPath
</script>


<style scoped>

</style>