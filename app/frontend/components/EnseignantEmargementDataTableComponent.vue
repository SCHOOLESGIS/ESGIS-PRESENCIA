
<template>
    <div class="w-full flex flex-col gap-[10px]">
        <template v-if="data && data.length">
            <div class="card shadow-sm rounded-[10px] bg-(--white)">
                <DataTable :value="data" tableStyle="min-width: 50rem rounded-[10px]">
                    <Column :field="'emargement_id'" :header="'M'"></Column>
                    <Column :field="'modules'" :header="'Libellé cours'"></Column>
                    <Column :field="'beginHour'" :header="'Heure de début'"></Column>
                    <Column :field="'endHour'" :header="'Heure de fin'"></Column>
                    <Column :field="'status'" :header="'Statuts'"></Column>
                    <Column :field="'createdAt'" :header="'Date de création'"></Column>
                    <Column :field="'action'" :header="'Actions'">
                        <template v-if="data[0].message !== null" #body="slotProps">
                            <div class="flex gap-[5px]">
                                <NuxtLink :to="`/enseignants/emargements/${slotProps.data.emargement_id}`">
                                    <div class="white-hover h-[25px] w-[25px] rounded-[2px] border border-(--primary) text-(--primary) flex items-center justify-center">
                                        <i class="pi pi-eye"></i>
                                    </div>
                                </NuxtLink>

                                <NuxtLink :to="`/enseignants/emargements/${slotProps.data.emargement_id}/edit`">
                                    <div class="white-hover h-[25px] w-[25px] rounded-[2px] border border-(--yellow) text-(--yellow) flex items-center justify-center">
                                        <i class="pi pi-pencil"></i>
                                    </div>
                                </NuxtLink>

                                <NuxtLink v-if="!slotProps.data.endHour" @click="updateEmargementFunc(slotProps.data.emargement_id)">
                                    <div class="cursor-pointer white-hover h-[25px] w-[25px] rounded-[2px] border border-[2px] border-(--green) bg-(--green) text-(--white) flex items-center justify-center">
                                        <i class="pi pi-check"></i>
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
    import { useEmargement } from '@/composables/useEmargement';
    import { useConfirm } from "primevue/useconfirm";
    import { useToast } from "primevue/usetoast";
    import SkeletonLoaderComponent from './SkeletonLoaderComponent.vue';

    const confirm = useConfirm();
    const toast = useToast();
    const {getEnseignantEmargements, deleteEmargement, updateEmargement} = useEmargement()
    const data = useState("enseignantEmargements")
    const links = useState("enseignantEmargementLinks")
    const cookie = useCookie('auth')
    const enseignantId = cookie.value.user?.enseignant?.enseignant_id

    const first = ref(0);
    const number_per_page = 10
    

    watch(first, function() {
        const page = ((first.value)/(number_per_page)) + 1
        getEnseignantEmargements(page, enseignantId)
    })

    function updateEmargementFunc (emargementID) {
        const updateEmargementData = reactive(
            {
                enseignant_id: "",
                module_id: "",
                begin_hour: null,
                end_hour: (new Date()).toTimeString().split(' ')[0],
                status: "",
            }
        )

        confirm.require({
            message: 'Vous allez marquer la fin de la séance !',
            header: 'Fin de séance',
            icon: 'pi pi-question-circle',
            rejectLabel: 'Cancel',
            rejectProps: {
                label: 'Cancel',
                severity: 'secondary',
                outlined: true
            },
            acceptProps: {
                label: 'Marquer la fin',
                severity: 'primary'
            },
            accept: async () => {
                await updateEmargement(updateEmargementData, emargementID)
                toast.add({ severity: 'info', summary: 'Confirmé', detail: 'Séance terminé', life: 3000 });
            },
            reject: () => {
                toast.add({ severity: 'error', summary: 'Rejeté', detail: 'Action rejetée', life: 3000 });
            }
        });

    }



    onMounted(() => {
        getEnseignantEmargements(0, enseignantId)
    });

    const confirmDelete = (emargementId) => {
        confirm.require({
            message: 'Êtes-vous sur de supprimer l\'emargement ?',
            header: 'Suppression d\'un emargement',
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
                await deleteTeacher(emargementId)
                toast.add({ severity: 'info', summary: 'Confirmé', detail: 'Emargement supprimé', life: 3000 });
            },
            reject: () => {
                toast.add({ severity: 'error', summary: 'Rejeté', detail: 'Action rejetée', life: 3000 });
            }
        });
    };


</script>
