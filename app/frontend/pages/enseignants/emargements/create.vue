<template>
    <div class="w-full min-h-[80vh] flex flex-col items-center justify-center gap-[10px]">
        <div class="w-[100%]">
            <NuxtLink to="/enseignants/emargements/" class="shadow-lg w-[100px] px-[20px] py-[5px] bg-(--primary) text-(--white) flex items-center justify-center gap-3 rounded-[4px]">
                <i class="pi pi-chevron-circle-left"></i> 
                retour               
            </NuxtLink>
        </div>
        <div class="bg-(--white) w-[100%] min-h-[80vh] flex rounded-[10px] shadow-lg">
            <div class="w-[100%] flex p-[10px] sm:py-[10px] sm:px-[10px] gap-[20px]">
                <div class="w-[100%] sm:w-[100%] lg:w-[50%] min-h-[80vh] pb-2">
                    <div class="logo w-[100%] min-h-[35px]">
                        <div class="text-(--primary) text-[1.25rem] font-semibold">Emargement dans un module</div>
                    </div>
                    <div class="w-[100%] min-h-[calc(100%-35px)] flex items-center justify-center p-[0px] sm:p-[10px]">
                        <div class="w-[100%] sm:w-[100%] lg:w-[500px] min-h-[200px] sm:w-[100%] flex justify-center items-start">
                            <form class="flex flex-col gap-[30px] w-full" action.preventDefault="">
                                <div class="text-(--text-grey) font-semibold text-center text-[.8rem] lg:text-[.8rem]">
                                    Entrer les champs ci-dessous
                                </div>
                                <div class="flex flex-col gap-[20px]">
                                    <div class="flex flex-col justify-start gap-[10px]">
                                        <div class="text-(--black-mate) font-semibold">
                                            Module
                                        </div>
                                        <div >
                                            <Select v-model="createEmargementData.module_id" :options="modules" optionLabel="name" placeholder="Selectionnez le module" class="w-full" />
                                        </div>
                                    </div>

                                    <div class="w-full">
                                        <Button @click="createEmargementFunction()" label="Emarger le début du cour" class="bg-primary w-full"/>
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
    import { useEmargement } from '@/composables/useEmargement';
    import z from 'zod'
    const {getAllModulesWithoutPagination} = useModule()
    const {createEmargement} = useEmargement()
    const modules = useState("modulesData")
    const cookie = useCookie('auth')

    definePageMeta(
        {
            layout: 'enseignant-dashboard',
            middleware: ['enseignant']
        }
    )

    const createEmargementData = reactive(
        {
            enseignant_id: cookie.value.user.enseignant.enseignant_id,
            module_id: "",
            begin_hour: (new Date()).toTimeString().split(' ')[0],
            end_hour: null,
            status: "COCHE",
        }
    )

    // const emailSchema = z.string().email({ message: "Veuillez entrer un email valide." })
    // const error = ref("")
    // const enseignantId = useRoute().params.enseignantId


    function createEmargementFunction () {
        if (createEmargementData.module_id !== "") {
            // verify()
            createEmargement(createEmargementData)
        }
    }

    onMounted(() => {
        getAllModulesWithoutPagination()
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