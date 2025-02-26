<template>
    <div class="w-full min-h-[80vh] flex flex-col items-center justify-center gap-[20px]">
        <div class="w-[100%]">
            <NuxtLink to="/admin/modules-filieres/filieres" class="w-[100px] px-[20px] py-[5px] bg-(--primary) text-(--white) flex items-center justify-center gap-3 rounded-[4px]">
                <i class="pi pi-chevron-circle-left"></i> 
                retour               
            </NuxtLink>
        </div>
        <div class="bg-(--white) w-[100%] h-[75vh] flex rounded-[10px]">
            <div class="w-[100%] flex p-[10px] sm:py-[10px] sm:px-[10px] gap-[20px]">
                <div class="w-[100%] sm:w-[100%] lg:w-[50%]">
                    <div class="logo w-[100%] h-[35px]">
                        <div class="text-(--primary) text-[1.5rem] font-semibold">Créer une filière</div>
                    </div>
                    <div class="w-[100%] h-[calc(100%-35px)] flex items-center justify-center p-[0px] sm:p-[10px]">
                        <div class="w-[100%] sm:w-[100%] lg:w-[500px] min-h-[200px] sm:w-[100%] flex justify-center items-start">
                            <form class="flex flex-col gap-[30px]" action.preventDefault="">
                                <div class="text-(--text-grey) font-semibold text-center text-[.75rem] sm:text-[1rem]">
                                    Entrer les informations requis ci dessous pour créer une filière
                                </div>
                                <div class="flex flex-col gap-[10px] w-full">
                                    <div class="flex flex-col justify-start gap-[10px]">
                                        <div class="text-(--black-mate) font-semibold">
                                            Nom de la filiere
                                        </div>
                                        <div >
                                            <InputText class="w-full rounded-[4px]" name="username" type="text" placeholder="Entrer le nom de la filiere" />
                                        </div>
                                    </div>

                                    <div class="flex flex-col justify-start gap-[10px]">
                                        <div class="text-(--black-mate) font-semibold">
                                            Niveau de la filiere (Licence, Master, Doctorat, BTS)
                                        </div>
                                        <div >
                                            <Select name="city" :options="cities" optionLabel="name" placeholder="Selectionnez le niveau" fluid />
                                        </div>
                                    </div>

                                    <div class="flex flex-col justify-start gap-[10px]">
                                        <div class="text-(--black-mate) font-semibold">
                                            Module(s)
                                        </div>
                                        <div >
                                            <Select name="city" :options="cities" optionLabel="name" placeholder="Selectionnez un ou des modules" fluid />
                                        </div>
                                    </div>

                                    <div class="w-full">
                                        <Button label="Créer un module" class="bg-black w-full"/>
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

    definePageMeta(
        {
            layout: 'dashboard',
            middleware: ['auth', 'admin']
        }
    )  
    
    const route = useRouter().currentRoute.value.fullPath

    const data = [
        {
            id: "1000",
            name: "Bamboo Watch",
            email: "teacher1@example.com",
            hoursAssigned: 20,
            hoursAbsent: 2,
            createdAt: "2024-02-20"
        }
    ];
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