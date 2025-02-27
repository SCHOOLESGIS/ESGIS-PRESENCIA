<template>
    <div class="w-full min-h-[80vh] flex flex-col items-center justify-center gap-[20px]">
        <div class="md:w-[75%] w-[100%]">
            <NuxtLink to="/admin/modules-filieres/filieres" class="w-[100px] px-[20px] py-[5px] bg-(--primary) text-(--white) flex items-center justify-center gap-3 rounded-[4px]">
                <i class="pi pi-chevron-circle-left"></i> 
                retour               
            </NuxtLink>
        </div>
        <div class="h-[25] md:w-[75%] w-[100%] h-[70vh] flex rounded-[10px]">
            <div class="w-[30%] h-full bg-[url(/patterns/Mash_19.png)] bg-cover flex flex-col items-start justify-between px-[10px]">
                <div class="text-[1.2rem] font-semibold text-(--white)">Informations d'une filiere</div>
                <div>
                    <img src="/icons/form_logo.svg" alt="">
                </div>
            </div>
            <div v-if="filiere && filiere.length" class="w-[70%] bg-(--white) p-[10px] flex flex-col gap-[20px]">
                <div class="flex justify-between">
                    <div>Informations</div>
                    <div class="flex gap-[10px]">
                        <NuxtLink to="">
                            <div class="white-hover h-[25px] w-[25px] rounded-[2px] border border-(--primary) text-(--primary) flex items-center justify-center">
                                <i class="pi pi-pencil"></i>
                            </div>
                        </NuxtLink>

                        <NuxtLink to="" class="cursor-pointer" @click="visible = true">
                            <div class="h-[25px] w-[25px] rounded-[2px] border border-(--primary) text-(--white) bg-(--primary) flex items-center justify-center">
                                <i class="pi pi-file-plus"></i>
                            </div>
                        </NuxtLink>
                    </div>
                </div>

                <div class="mt-[20px] px-[40px]">
                    <table class="w-full border-spacing-y-[2rem]" border="0">
                        <tbody>
                            <tr class="py-">
                                <td><strong>Libellé de la filière :</strong> {{ filiere[0].filiere_name }}</td>
                                <td><strong>Niveau de la filière :</strong> {{ filiere[0].filiere_level }}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>


                <div class="flex justify-start">
                    <div>Modules</div>
                </div>

                <div class="mt-[20px] px-[40px] overflow-y-scroll">
                    <div class="w-full flex flex-col gap-2">
                        <div v-for="module in filiere[0].modules" class="p-[20px] bg-(--stroke) rounded-[4px] shadow-md flex items-center justify-between">
                            <div class="w-[50%]">{{ module.module_name }}</div>
                            <div  class="w-[20%]">{{ module.module_code }}</div>
                            <div>{{ module.module_hours }}</div>
                            <div>
                                <NuxtLink :to="`/admin/modules-filieres/modules/${module.module_id}`">
                                    <div class="white-hover h-[25px] w-[25px] rounded-[2px] border border-(--primary) text-(--primary) flex items-center justify-center">
                                        <i class="pi pi-eye"></i>
                                    </div>
                                </NuxtLink>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script setup>
    import { useFiliere } from '@/composables/useFiliere';
    const { getFiliere } = useFiliere();
    const filiere = useState("filiereData")

    definePageMeta(
        {
            layout: 'dashboard',
            middleware: ['auth', 'admin']
        }
    )
    
    const filiereId = useRoute().params.filiereId

    onMounted(async () => {
        await getFiliere(filiereId)
    })
</script>


<style scoped>

</style>