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
                        <div class="text-(--primary) text-[1.25rem] font-semibold">Créer un module</div>
                    </div>
                    <div class="w-[100%] min-h-[calc(100%-35px)] flex items-center justify-center p-[0px] sm:p-[10px]">
                        <div class="w-[100%] sm:w-[100%] lg:w-[500px] min-h-[200px] sm:w-[100%] flex justify-center items-start">
                            <form class="flex flex-col gap-[20px]" action.preventDefault="">
                                <div class="text-(--text-grey) font-semibold text-center text-[.75rem] sm:text-[1rem] pt-3">
                                    Entrer les informations requis ci dessous pour créer un module
                                </div>
                                <div class="flex flex-col gap-[10px] w-full">
                                    <div class="flex flex-col justify-start gap-[10px]">
                                        <div class="text-(--black-mate) font-semibold">
                                            Libellé du module
                                        </div>
                                        <div >
                                            <InputText class="w-full rounded-[4px]" name="username" type="text" placeholder="Entrer le nom de la filiere" />
                                        </div>
                                    </div>

                                    <div class="flex justify-between gap-[20px]">
                                        <div class="flex flex-col justify-start gap-[10px] w-[50%]">
                                            <div class="text-(--black-mate) font-semibold">
                                                Code du module
                                            </div>
                                            <div >
                                                <InputText class="w-full rounded-[4px]" name="username" type="text" placeholder="Saisissez le code du module" />
                                            </div>
                                        </div>
                                        <div class="flex flex-col justify-start gap-[10px] w-[50%]">
                                            <div class="text-(--black-mate) font-semibold">
                                                Prénom
                                            </div>
                                            <div >
                                                <InputNumber class="w-full rounded-[4px]" v-model="value4" inputId="minmax" :min="0" :max="100" fluid showButtons/>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="flex flex-col justify-start gap-[10px]">
                                        <div class="text-(--black-mate) font-semibold">
                                            Filière(s)
                                        </div>
                                        <div >
                                            <Select name="city" :options="cities" optionLabel="name" placeholder="Selectionnez un ou des filières" fluid />
                                        </div>
                                    </div>

                                    <div class="flex flex-col justify-start gap-[10px]">
                                        <div class="text-(--black-mate) font-semibold">
                                            Desription (facultatif)
                                        </div>
                                        <div>
                                            <Textarea class="w-full" v-model="value3" size="large" placeholder="Ecrire..." rows="2" />
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
            layout: 'dashboard'
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

</style>