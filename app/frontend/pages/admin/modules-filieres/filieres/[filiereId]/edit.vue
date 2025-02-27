<template>
    <div class="w-full min-h-[80vh] flex flex-col items-center justify-center gap-[20px]">
        <div class="w-[100%]">
            <NuxtLink to="/admin/modules-filieres/filieres" class="shadow-lg w-[100px] px-[20px] py-[5px] bg-(--primary) text-(--white) flex items-center justify-center gap-3 rounded-[4px]">
                <i class="pi pi-chevron-circle-left"></i> 
                retour               
            </NuxtLink>
        </div>
        <div class="bg-(--white) w-[100%] h-[80vh] flex rounded-[10px] shadow-lg">
            <div class="w-[100%] flex p-[10px] sm:py-[10px] sm:px-[10px] gap-[20px]">
                <div class="w-[100%] sm:w-[100%] lg:w-[50%]">
                    <div class="logo w-[100%] h-[35px]">
                        <div class="text-(--primary) text-[1.25rem] font-semibold">Mettre à jour une filiere</div>
                    </div>
                    <div class="w-[100%] min-h-[calc(100%-35px)] flex items-center justify-center p-[0px] sm:p-[10px]">
                        <div class="w-[100%] sm:w-[100%] lg:w-[400px] min-h-[200px] sm:w-[100%] flex justify-center items-start">
                            <form class="flex flex-col gap-[20px] w-full" action.preventDefault="">
                                <div class="text-(--text-grey) font-semibold text-center text-[.75rem] sm:text-[1rem] pt-3">
                                    Entrer les informations requis ci dessous
                                </div>
                                <div class="flex flex-col gap-[10px] w-full">
                                    <div class="flex flex-col justify-start gap-[10px]">
                                        <div class="text-(--black-mate) font-semibold">
                                            Libellé de la filiere
                                        </div>
                                        <div >
                                            <InputText v-model="filiere.filiere_name" class="w-full rounded-[4px]" name="username" type="text" placeholder="Entrer le nom de la filiere" />
                                        </div>
                                    </div>

                                    <div class="flex flex-col justify-start gap-[10px]">
                                        <div class="text-(--black-mate) font-semibold">
                                            Niveau de la filière
                                        </div>
                                        <div >
                                            <Select  v-model="filiere.filiere_level" :options="allLevel" optionLabel="name" placeholder="Selectionnez le niveau de la filière" fluid />
                                        </div>
                                    </div>

                                    <div class="w-full">
                                        <Button @click="validateModuleUpdate()" label="Mettre à jour une filière" class="bg-black w-full"/>
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
    import { useFiliere } from '@/composables/useFiliere';
    const { getFiliere, updateFiliere } = useFiliere()
    const data = useState("filiereData")
    const allLevel = [
        {code: 'Licence', name: 'Licence'},
        {code: 'Master', name: 'Master'},
        {code: 'Doctorat', name: 'Doctorat'}
    ]
    const filiere = reactive({
        filiere_id: "",
        filiere_name: "",
        filiere_level: {
            code: "",
            name: ""
        }
    })

    function validateModuleUpdate() {
        updateFiliere(filiere, filiereId)
    }

    definePageMeta(
        {
            layout: 'dashboard',
            middleware: ['auth', 'admin']
        }
    ) 
    
    const filiereId = useRoute().params.filiereId

    onMounted(async () => {
        await getFiliere(filiereId)
        filiere.filiere_id = data.value[0].filiere_id,
        filiere.filiere_name = data.value[0].filiere_name,
        filiere.filiere_level.code = data.value[0].filiere_level
        filiere.filiere_level.name = data.value[0].filiere_level
    })
</script>


<style scoped>
    .p-button {
        color: var(--white) !important;
        background: var(--primary) !important;
        border: 1px solid var(--primary) !important;
        padding: 10px 20px !important;
        border-radius: 4px !important;
    }
</style>