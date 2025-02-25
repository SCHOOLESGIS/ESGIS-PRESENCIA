<template>
    <div class="w-full min-h-[80vh] flex flex-col items-center justify-center gap-[20px]">
        <div class="md:w-[75%] w-[100%]">
            <NuxtLink to="/admin/modules-filieres/modules" class="w-[100px] px-[20px] py-[5px] bg-(--primary) text-(--white) flex items-center justify-center gap-3 rounded-[4px]">
                <i class="pi pi-chevron-circle-left"></i> 
                retour               
            </NuxtLink>
        </div>
        <div class="h-[25] md:w-[75%] w-[100%] min-h-[70vh] flex rounded-[10px]">
            <div class="w-[30%] min-h-[70hv] bg-[url(/patterns/Mash_19.png)] bg-cover flex flex-col items-start justify-between px-[10px]">
                <div class="text-[1.2rem] font-semibold text-(--white)">Informations d'un module</div>
                <div>
                    <img src="/icons/form_logo.svg" alt="">
                </div>
            </div>
            <div class="w-[70%] bg-(--white) p-[10px] flex flex-col gap-[20px]">
                <div class="flex justify-between">
                    <div>Informations clés</div>
                    <div class="flex gap-[10px]">
                        <NuxtLink  v-if="data && data.length" :to="`/admin/modules-filieres/modules/${data[0].module_id}/edit`">
                            <div class="white-hover h-[25px] w-[25px] rounded-[2px] border border-(--primary) text-(--primary) flex items-center justify-center">
                                <i class="pi pi-pencil"></i>
                            </div>
                        </NuxtLink>
                    </div>
                </div>

                <div class="mt-[20px] px-[40px]">
                    <table class="w-full border-spacing-y-[2rem] border-spacing-[2rem]" border="0" >
                        <tbody v-if="data && data.length">
                            <tr class="py-">
                                <td><strong>Libel</strong> : {{ data[0].module_name }}</td>
                                <td><strong>Code</strong> : {{ data[0].module_code }}</td>
                            </tr>
                            <tr>
                                <td colspan="2"><strong>Description</strong> : {{ data[0].description }}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="flex justify-start">
                    <div>Filière</div>
                </div>
                <div class="mt-[20px] px-[40px]">
                    <table class="w-full border-spacing-y-[2rem]" border="0" cellpadding="2">
                        <tbody  v-if="data && data.length">
                            <tr class="py-">
                                <td><strong>Libellé</strong> : {{ data[0].filiere.filiere_name }}</td>
                                <td><strong>Niveau</strong> : {{ data[0].filiere.filiere_level }}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                <div class="flex justify-start">
                    <div>Cours</div>
                </div>

                <div class="mt-[20px] px-[40px] overflow-y-scroll">
                    <div  v-if="data && data.length" class="w-full flex flex-col gap-2">
                        <div v-for="cour in data[0].cours" v-key="cour.cour_id" class="p-[20px] bg-(--stroke) rounded-[4px] shadow-md flex items-center justify-between">
                            <div>Cour {{ cour.cour_id }}</div>
                            <div>{{ cour.begin_hour }}</div>
                            <div>{{ cour.end_hour }}</div>
                            <div>{{ cour.status }}</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script setup>
    import DataTableComponent from '~/components/EnseignantDataTableComponent.vue';
    import { useModule } from '@/composables/useModule';
    const {getModule} = useModule()
    const data = useState('moduleData')

    definePageMeta(
        {
            layout: 'dashboard',
            middleware: 'auth'
        }
    )   
    
    const moduleId = useRoute().params.moduleId


    onMounted(async () => {
        await getModule(moduleId)
    })
</script>


<style scoped>

</style>