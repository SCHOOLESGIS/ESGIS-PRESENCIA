
<template>
    <div class="w-full flex flex-col gap-[10px]">
        <template v-if="data && data.length">
            <div class="card shadow-sm rounded-[10px] bg-(--white)">
                <DataTable :value="data" tableStyle="min-width: 50rem rounded-[10px]">
                    <Column :field="'rapport_id'" :header="'Id'"></Column>
                    <Column :field="'emargement_debut'" :header="'Nbre d\'émargement en début de séance'"></Column>
                    <Column :field="'emargement_fin'" :header="'Nbre d\'émargement en fin de séance'"></Column>
                    <Column :field="'emargement_confirm'" :header="'Nbre d\'émargement confirmé'"></Column>
                    <Column :field="'emargement_not_confirm'" :header="'Nbre d\'émargement non confirmé'"></Column>
                    <Column :field="'createdAt'" :header="'Date de création'"></Column>
                    <Column :field="'action'" :header="'Actions'">
                        <template #body="slotProps">
                            <div class="flex gap-[5px]">
                                <NuxtLink to="" class="cursor-pointer" @click="confirmDelete(slotProps.data.rapport_id)">
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
    import { useRapport } from '@/composables/useRapport';
    import { useConfirm } from "primevue/useconfirm";
    import { useToast } from "primevue/usetoast";
    import SkeletonLoaderComponent from './SkeletonLoaderComponent.vue';

    const confirm = useConfirm();
    const toast = useToast();
    const {getAllRapportsByID, deleteRapport} = useRapport()
    const data = useState("rapportsByID")
    const links = useState("rapportsByIDLinks")
    const cookie = useCookie('auth')
    const enseignantId = cookie.value.user.enseignant.enseignant_id

    const first = ref(0);
    const number_per_page = 10
    

    watch(first, function() {
        const page = ((first.value)/(number_per_page)) + 1
        getAllRapportsByID(page, enseignantId)
    })



    onMounted(() => {
        getAllRapportsByID(0, enseignantId)
    });

    const confirmDelete = (rapportId) => {
        confirm.require({
            message: 'Êtes-vous sur de supprimer le rapport ?',
            header: 'Suppression d\'un rapport',
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
                await deleteRapport(rapportId)
                toast.add({ severity: 'info', summary: 'Confirmé', detail: 'Rapport supprimé', life: 3000 });
            },
            reject: () => {
                toast.add({ severity: 'error', summary: 'Rejeté', detail: 'Action rejetée', life: 3000 });
            }
        });
    };


</script>
