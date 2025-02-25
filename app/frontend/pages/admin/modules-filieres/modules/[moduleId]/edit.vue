<template>
    <div class="w-full min-h-[80vh] flex flex-col items-center justify-center gap-[20px]">
        <div class="w-[100%]">
            <NuxtLink to="/admin/modules-filieres/modules" class="w-[100px] px-[20px] py-[5px] bg-(--primary) text-(--white) flex items-center justify-center gap-3 rounded-[4px]">
                <i class="pi pi-chevron-circle-left"></i> 
                retour               
            </NuxtLink>
        </div>
        <div class="bg-(--white) w-[100%] h-[80vh] flex rounded-[10px]">
            <div class="w-[100%] flex p-[10px] sm:py-[10px] sm:px-[10px] gap-[20px]">
                <div class="w-[100%] sm:w-[100%] lg:w-[50%]">
                    <div class="logo w-[100%] h-[35px]">
                        <div class="text-(--primary) text-[1.25rem] font-semibold">Mettre à jour un module</div>
                    </div>
                    <div class="w-[100%] min-h-[calc(100%-35px)] flex items-center justify-center p-[0px] sm:p-[10px]">
                        <div class="w-[100%] sm:w-[100%] lg:w-[500px] min-h-[200px] sm:w-[100%] flex justify-center items-start">
                            <form class="flex flex-col gap-[20px]" action.preventDefault="">
                                <div class="text-(--text-grey) font-semibold text-center text-[.75rem] sm:text-[1rem] pt-3">
                                    Entrer les informations requis ci dessous pour mettre à jour un module
                                </div>
                                <div class="flex flex-col gap-[10px] w-full">
                                    <div class="flex flex-col justify-start gap-[10px]">
                                        <div class="text-(--black-mate) font-semibold">
                                            Libellé du module
                                        </div>
                                        <div >
                                            <InputText v-model="module.module_name" class="w-full rounded-[4px]" name="username" type="text" placeholder="Entrer le nom de la filiere" />
                                        </div>
                                    </div>

                                    <div class="flex justify-between gap-[20px]">
                                        <div class="flex flex-col justify-start gap-[10px] w-[50%]">
                                            <div class="text-(--black-mate) font-semibold">
                                                Code du module
                                            </div>
                                            <div >
                                                <InputText v-model="module.module_code" class="w-full rounded-[4px]" name="username" type="text" placeholder="Saisissez le code du module" />
                                            </div>
                                        </div>
                                        <div class="flex flex-col justify-start gap-[10px] w-[50%]">
                                            <div class="text-(--black-mate) font-semibold">
                                                Durée du module (heures)
                                            </div>
                                            <div >
                                                <InputNumber v-model="module.module_hours" class="w-full rounded-[4px]" inputId="minmax" :min="0" :max="100" fluid showButtons/>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="flex flex-col justify-start gap-[10px]">
                                        <div class="text-(--black-mate) font-semibold">
                                            Filière(s)
                                        </div>
                                        <div >
                                            <Select  v-model="module.filiere.filiere_id" name="city" :options="cities" optionLabel="name" placeholder="Selectionnez un ou des filières" fluid />
                                        </div>
                                    </div>

                                    <div class="flex flex-col justify-start gap-[10px]">
                                        <div class="text-(--black-mate) font-semibold">
                                            Desription (facultatif)
                                        </div>
                                        <div>
                                            <Textarea  v-model="module.description" class="w-full" size="large" placeholder="Ecrire..." rows="2" />
                                        </div>
                                    </div>

                                    <div class="w-full">
                                        <Button label="Mettre à jour un module" class="bg-black w-full"/>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="w-[50%] hidden sm:hidden lg:block">   
                    <div class="w-[100%] h-[100%] flex items-end justify-end rounded-[10px] bg-[url(/patterns/Mash_19.png)] bg-cover bg-left">
                        <img src="/icons/form_logo.svg" class="shadow" alt="">
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script setup>
    import DataTableComponent from '~/components/EnseignantDataTableComponent.vue';
    import { useModule } from '@/composables/useModule';
    const { getModule, updateModule } = useModule()
    const data = useState("moduleData")
    const module = reactive({
        module_id: "",
        module_name: "",
        module_code: "",
        module_hours: "",
        filiere: "",
        description: "",
    })




    definePageMeta(
        {
            layout: 'dashboard',
            middleware: ['auth', 'admin']
        }
    ) 
    
    const moduleId = useRoute().params.moduleId

    onMounted(async () => {
        await getModule(moduleId)
        module.module_id = data.value[0].module_id,
        module.module_name = data.value[0].module_name,
        module.module_code = data.value[0].module_code,
        module.module_hours = data.value[0].module_hours,
        module.filiere = data.value[0].filiere,
        module.description = data.value[0].description
    })
</script>


<style scoped>

</style>