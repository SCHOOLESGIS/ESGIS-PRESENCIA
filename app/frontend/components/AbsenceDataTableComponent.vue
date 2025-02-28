
<template>
    <div class="w-full flex flex-col gap-[10px]">
        <template v-if="data && data.length">
            <div class="card shadow-sm rounded-[10px] bg-(--white)">
                <DataTable :value="data" tableStyle="min-width: 50rem rounded-[10px]">
                    <Column :field="'absence_id'" :header="'M'"></Column>
                    <Column :field="'cour'" :header="'Identifiant des cours'"></Column>
                    <Column :field="'absenceDate'" :header="'Heure de début'"></Column>
                    <Column :field="'status'" :header="'Statuts'"></Column>
                    <Column :field="'createdAt'" :header="'Date de création'"></Column>
                    <Column :field="'action'" :header="'Actions'">
                        <template #body="slotProps">
                            <div class="flex gap-[5px]">
                                <NuxtLink :to="`/admin/absences/${slotProps.data.absence_id}`">
                                    <div class="white-hover h-[25px] w-[25px] rounded-[2px] border border-(--primary) text-(--primary) flex items-center justify-center">
                                        <i class="pi pi-eye"></i>
                                    </div>
                                </NuxtLink>

                                <NuxtLink :to="`/admin/absences/${slotProps.data.absence_id}/edit`">
                                    <div class="white-hover h-[25px] w-[25px] rounded-[2px] border border-(--yellow) text-(--yellow) flex items-center justify-center">
                                        <i class="pi pi-pencil"></i>
                                    </div>
                                </NuxtLink>

                                <NuxtLink to="" class="cursor-pointer" @click="confirmDelete(slotProps.data.absence_id)">
                                    <div class="white-hover h-[25px] w-[25px] rounded-[2px] border border-(--red) text-(--red) flex items-center justify-center">
                                        <i class="pi pi-trash"></i>
                                    </div>
                                </NuxtLink>
                            </div>
                        </template>
                    </Column>
                </DataTable>
            </div>
            <div class="card">
                <Paginator v-model:first="first" :rows="links[1]" :totalRecords="links[0]"></Paginator>
            </div>
        </template>
        <template v-else>
            <SkeletonLoaderComponent/>
        </template>
        <Toast />
        <ConfirmDialog></ConfirmDialog>
 
    </div>
</template>

<script setup>
    import { ref, onMounted, watch } from 'vue';
    // import { ProductService } from '@/service/ProductService';
    import DataTable from 'primevue/datatable';
    import Column from 'primevue/column'; 
    import { useAbsence } from '@/composables/useAbsence';
    import { useConfirm } from "primevue/useconfirm";
    import { useToast } from "primevue/usetoast";
    import SkeletonLoaderComponent from './SkeletonLoaderComponent.vue';

    const confirm = useConfirm();
    const toast = useToast();
    const {getAllAbsences, deleteAbsence} = useAbsence()
    const data = useState("absencesData")
    const links = useState("absenceLinks")

    const first = ref(0);
    const number_per_page = 10
    

    watch(first, function() {
        const page = ((first.value)/(number_per_page)) + 1
        getAllAbsences(page)
    })



    onMounted(() => {
        getAllAbsences(0)
    });

    const confirmDelete = (absenceId) => {
        confirm.require({
            message: 'Êtes-vous sur de supprimer l\'absence ?',
            header: 'Suppression d\'une absence',
            icon: 'pi pi-question-circle',
            rejectLabel: 'Cancel',
            rejectProps: {
                label: 'Cancel',
                severity: 'secondary',
                outlined: true
            },
            acceptProps: {
                label: 'Delete',
                severity: 'danger'
            },
            accept: async () => {
                await deleteAbsence(absenceId)
                toast.add({ severity: 'info', summary: 'Confirmé', detail: 'Absence supprimé', life: 3000 });
            },
            reject: () => {
                toast.add({ severity: 'error', summary: 'Rejeté', detail: 'Action rejetée', life: 3000 });
            }
        });
    };


</script>
