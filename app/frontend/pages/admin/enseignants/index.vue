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
            <div class="text-(--white) p-[15px] w-full min-h-[255px] rounded-[10px] flex flex-col gap-[40px] bg-[url(/patterns/Mash_19.png)] bg-cover bg-left shadow-md">
                <div class="text-(--white) text-[1.2rem] h-[30px] font-semibold">Statistiques des heures effectuées</div>
                <div class="flex w-full min-h-[160px] gap-[20px] flex-wrap">
                    <div class="p-[10px] h-[150px] w-[250px] sm:flex-col flex grow rounded-[4px] backdrop-blur-[10px] gap-[10px] border">
                        <div class="text-[1.2rem]">Pourcentages des présences</div>
                        <div class="flex md:justify-between justify-center items-center">
                            <img class="md:block hidden" src="/icons/looperGroup.svg" alt="">
                            <div class="text-[3rem] font-semibold">
                                90%
                            </div>
                        </div>
                    </div>

                    <div class="p-[10px] h-[150px] w-[150px] sm:flex-col flex grow rounded-[4px] backdrop-blur-[10px] gap-[10px] border">
                        <div class="text-[1.2rem]">Nombre d'enseignants</div>
                        <div class="flex justify-end items-end">
                            <div class="text-[3rem] font-semibold">
                                27
                            </div>
                        </div>
                    </div>  

                    <div class="p-[10px] sm:h-[150px] h-[75px] w-[150px] sm:flex-col flex grow rounded-[4px] backdrop-blur-[10px] gap-[10px] border border-white">
                        <div class="text-[1.2rem]">Total (heure)</div>
                        <div class="flex justify-end items-end">
                            <div class="text-[3rem] font-semibold text-center flex sm:flex-col sm:items-center flex text-shadow">
                                <div>143</div>
                            </div>
                        </div>
                    </div>  

                    <div class="p-[10px] sm:h-[150px] h-[75px] w-[150px] sm:flex-col flex grow rounded-[4px] backdrop-blur-[10px] gap-[10px] border">
                        <div class="text-[1.2rem]">Effectuées (heure)</div>
                        <div class="flex justify-end items-end">
                            <div class="text-[3rem] font-semibold text-center flex sm:flex-col sm:items-center flex text-shadow">
                                <div>120</div>
                            </div>
                        </div>
                    </div>  

                    <div class="p-[10px] sm:h-[150px] h-[75px] w-[150px] sm:flex-col flex grow rounded-[4px] backdrop-blur-[10px] gap-[10px] border">
                        <div class="text-[1.2rem]">Absences (heure)</div>
                        <div class="flex justify-end items-end">
                            <div class="text-[3rem] font-semibold text-center flex sm:flex-col sm:items-center flex text-shadow">
                                <div>23</div>
                            </div>
                        </div>
                    </div>                                
                </div>
            </div>

            <div class="flex gap-[20px] min-h-[calc(100vh-255px)] flex-wrap">
                <div class="sm:min-w-[350px] w-[200px] h-[calc(100vh-255px)] grow shadow-md rounded-[10px] bg-(--white)">

                </div>
                <div class="sm:min-w-[350px] w-[200px] h-[calc(100vh-255px)] grow shadow-md rounded-[10px] bg-(--white)">
                    <DoughnutChartComponent/>
                </div>

                <div class="sm:w-[200px] w-full min-h-[calc(100vh-255px)] grow shadow-md rounded-[10px] bg-(--white)">
                    <div class="h-[15%] text-(--black-mate) text-[1.5rem] p-[20px] border-b-[0.5px] border-(--dark-text-color-1)">
                        Top Enseignants
                    </div>
                    <div class="h-[80%]">
                        <div class="w-full py-[20px] px-[20px] flex justify-between items-center  border-b-[0.5px] border-(--dark-text-color-1)">
                            <div class="text-black flex gap-[20px] items-center">
                                <div>Nom professeur</div>
                            </div>
                            <div class="text-black">Heures effectuées</div>
                        </div>

                        <div class="w-full py-[15px] px-[20px] flex justify-between items-center  border-b-[0.5px] border-(--dark-text-color-1)">
                            <div class="text-black flex gap-[20px] items-center">
                                <div class="h-[70px] w-[100px] rounded-[8px] bg-[url(/patterns/mash_19.png)] bg-cover"></div>
                                <div>OBANDJE</div>
                            </div>
                            <div class="text-black">40</div>
                        </div>

                        <div class="w-full py-[15px] px-[20px] flex justify-between items-center  border-b-[0.5px] border-(--dark-text-color-1)">
                            <div class="text-black flex gap-[20px] items-center">
                                <div class="h-[70px] w-[100px] rounded-[8px]  bg-[url(/patterns/mash_19.png)] bg-cover bg-top"></div>
                                <div>OBANDJE</div>
                            </div>
                            <div class="text-black">40</div>
                        </div>

                        <div class="w-full py-[15px] px-[20px] flex justify-between items-center  border-b-[0.5px] border-(--dark-text-color-1)">
                            <div class="text-black flex gap-[20px] items-center">
                                <div class="h-[70px] w-[100px] rounded-[8px]  bg-[url(/patterns/mash_19.png)] bg-cover bg-right"></div>
                                <div>OBANDJE</div>
                            </div>
                            <div class="text-black">40</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script setup>
    import DoughnutChartComponent from '~/components/DoughnutChartComponent.vue';
    
    definePageMeta(
        {
            layout: 'dashboard',
            middleware: 'auth'
        }
    )   
    
    const route = useRouter().currentRoute.value.fullPath
</script>


<style scoped>

</style>