<template>
    <div class="w-full min-h-[80vh] flex flex-col items-center justify-center gap-[20px]">
        <div class="md:w-[75%] w-[100%]">
            <NuxtLink to="/admin/enseignants/enseignants-liste" class="w-[100px] px-[20px] py-[5px] bg-(--primary) text-(--white) flex items-center justify-center gap-3 rounded-[4px]">
                <i class="pi pi-chevron-circle-left"></i> 
                retour               
            </NuxtLink>
        </div>
        <div class="h-[25] md:w-[75%] w-[100%] h-[70vh] flex rounded-[10px]">
            <div class="w-[30%] h-full bg-[url(/patterns/Mash_19.png)] bg-cover flex flex-col items-start justify-between px-[10px]">
                <div class="text-[1.2rem] font-semibold text-(--white)">Informations d'un enseignant</div>
                <div>
                    <img src="/icons/form_logo.svg" alt="">
                </div>
            </div>
            <div class="w-[70%] bg-(--white) p-[10px] flex flex-col gap-[20px]">
                <div class="flex justify-between">
                    <div>Informations personnelles</div>
                    <div class="flex gap-[10px]">
                        <NuxtLink to="">
                            <div class="white-hover h-[25px] w-[25px] rounded-[2px] border border-(--primary) text-(--primary) flex items-center justify-center">
                                <i class="pi pi-pencil"></i>
                            </div>
                        </NuxtLink>

                        <NuxtLink to="/module" class="cursor-pointer" @click="visible = true">
                            <div class="h-[25px] w-[25px] rounded-[2px] border border-(--primary) text-(--white) bg-(--primary) flex items-center justify-center">
                                <i class="pi pi-file-plus"></i>
                            </div>
                        </NuxtLink>
                    </div>
                </div>

                <div class="mt-[20px] px-[40px]">
                    <table class="w-full border-spacing-y-[2rem]" border="0">
                        <tbody v-if="teacher && teacher.length">
                            <tr class="py-">
                                <td>Nom : {{ teacher[0].name }}</td>
                                <td>Prénom : {{ teacher[0].surname }}</td>
                            </tr>
                            <tr>
                                <td>Email : {{ teacher[0].email }}</td>
                                <td>Crée le : {{ teacher[0].created_at }}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>


                <div class="flex justify-start">
                    <div>Modules</div>
                </div>

                <div class="mt-[20px] px-[40px] overflow-y-scroll">
                    <div v-if="teacher && teacher.length" class="w-full flex flex-col gap-2">
                        <div v-for="module in teacher[0].modules" v-key="module.module_id" class="p-[20px] bg-(--stroke) rounded-[4px]shadow-xs flex items-center justify-between">
                            <div>{{ module.module_id }}</div>
                            <div>{{ module.module_code }}</div>
                            <div>{{ module.module_name }}</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script setup>
    import DataTableComponent from '~/components/EnseignantDataTableComponent.vue';
    import { useTeacher } from '@/composables/useTeacher';
    const {getTeacher} = useTeacher()
    const teacher = useState("enseignantData")

    definePageMeta(
        {
            layout: 'dashboard',
            middleware: 'auth'
        }
    )   
    
    const enseignantId = useRoute().params.enseignantId
    console.log(enseignantId);

    onMounted(async () => {
        await getTeacher(enseignantId)
    })
</script>


<style scoped>

</style>