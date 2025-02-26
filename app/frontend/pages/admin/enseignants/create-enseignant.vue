<template>
    <div class="w-full min-h-[80vh] flex flex-col items-center justify-center gap-[10px]">
        <div class="w-[100%]">
            <NuxtLink to="/admin/enseignants/enseignants-liste" class="shadow-lg w-[100px] px-[20px] py-[5px] bg-(--primary) text-(--white) flex items-center justify-center gap-3 rounded-[4px]">
                <i class="pi pi-chevron-circle-left"></i> 
                retour               
            </NuxtLink>
        </div>
        <div class="bg-(--white) w-[100%] min-h-[80vh] flex rounded-[10px] shadow-lg">
            <div class="w-[100%] flex p-[10px] sm:py-[10px] sm:px-[10px] gap-[20px]">
                <div class="w-[100%] sm:w-[100%] lg:w-[50%] min-h-[80vh] pb-2">
                    <div class="logo w-[100%] min-h-[35px]">
                        <div class="text-(--primary) text-[1.25rem] font-semibold">Créer un compte enseignant</div>
                    </div>
                    <div class="w-[100%] min-h-[calc(100%-35px)] flex items-center justify-center p-[0px] sm:p-[10px]">
                        <div class="w-[100%] sm:w-[100%] lg:w-[500px] min-h-[200px] sm:w-[100%] flex justify-center items-start">
                            <form class="flex flex-col gap-[30px]" action.preventDefault="">
                                <div class="text-(--text-grey) font-semibold text-center text-[.8rem] lg:text-[.8rem]">
                                    Entrer les champs requis ci dessous pour créer un compte enseignant
                                </div>
                                <div class="flex flex-col gap-[20px]">
                                    <div class="flex justify-between gap-[20px]">
                                        <div class="flex flex-col justify-start gap-[10px] w-[50%]">
                                            <div class="text-(--black-mate) font-semibold">
                                                Nom
                                            </div>
                                            <div >
                                                <InputText v-model="createEnseignantData.name" class="w-full rounded-[4px]" name="username" type="text" placeholder="Nom" />
                                            </div>
                                        </div>
                                        <div class="flex flex-col justify-start gap-[10px] w-[50%]">
                                            <div class="text-(--black-mate) font-semibold">
                                                Prénom
                                            </div>
                                            <div >
                                                <InputText v-model="createEnseignantData.surname" class="w-full rounded-[4px]" name="username" type="text" placeholder="Prénom" />
                                            </div>
                                        </div>
                                    </div>

                                    <div class="flex flex-col justify-start gap-[10px]">
                                        <div class="text-(--black-mate) font-semibold">
                                            Email
                                        </div>
                                        <div >
                                            <InputText v-model="createEnseignantData.email" class="w-full rounded-[4px]" name="username" type="text" placeholder="Entrer votre email" />
                                        </div>
                                    </div>

                                    <div class="flex flex-col justify-start gap-[10px]">
                                        <div class="text-(--black-mate) font-semibold">
                                            Mot de passe
                                        </div>
                                        <div >
                                            <InputText v-model="createEnseignantData.password" class="w-full rounded-[4px]" name="username" type="text" placeholder="Entrer votre mot de passe" />
                                        </div>
                                    </div>

                                    <div class="flex flex-col justify-start gap-[10px]">
                                        <div class="text-(--black-mate) font-semibold">
                                            Confirmer le mot de passe
                                        </div>
                                        <div >
                                            <InputText v-model="createEnseignantData.password_confirmation" class="w-full rounded-[4px]" name="username" type="text" placeholder="Entrer à nouveau votre mot de passe" />
                                        </div>
                                    </div>

                                    <div class="flex flex-col justify-start gap-[10px]">
                                        <div class="text-(--black-mate) font-semibold">
                                            Spécialité
                                        </div>
                                        <div >
                                            <InputText v-model="createEnseignantData.specialite" class="w-full rounded-[4px]" name="username" type="text" placeholder="Entrer la spécialité" />
                                        </div>
                                    </div>

                                    <div class="w-full">
                                        <Button @click="createEnseignant" label="Créer un compte enseignant" class="bg-primary w-full"/>
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
    import { useTeacher } from '@/composables/useTeacher';
    import z from 'zod'
    const {createTeacher} = useTeacher()

    definePageMeta(
        {
            layout: 'dashboard',
            middleware: ['auth', 'admin']
        }
    ) 

    const createEnseignantData = reactive(
        {
            name: "",
            surname: "",
            email: "",
            password: "",
            password_confirmation: "",
            specialite: ""
        }
    )

    const emailSchema = z.string().email({ message: "Veuillez entrer un email valide." })
    const error = ref("")
    const enseignantId = useRoute().params.enseignantId
    
    function verify () {
        try {
            emailSchema.parse(createEnseignantData.email)
            error.value = ''
        } catch (err) {
            if (err instanceof z.ZodError) {
                error.value = err.errors[0].message
            }
        }
    }

    function createEnseignant () {
        verify()
        createTeacher(createEnseignantData)
    }
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