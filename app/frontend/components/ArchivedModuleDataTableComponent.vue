
<template>
    <div class="w-full flex flex-col gap-[10px]">
        <template v-if="data && data.length">
            <div class="card shadow-sm rounded-[10px] bg-(--white)">
                <DataTable :value="data" tableStyle="min-width: 50rem rounded-[10px]">
                    <Column :field="'module_id'" :header="'M'"></Column>
                    <Column :field="'module_name'" :header="'Libéllé'"></Column>
                    <Column :field="'module_code'" :header="'Code module'"></Column>
                    <Column :field="'createdAt'" :header="'Date de création'"></Column>
                    <Column :field="'action'" :header="'Actions'">
                        <template #body="slotProps">
                            <div class="flex gap-[5px]">
                                <NuxtLink :to="`/admin/modules-filieres/modules/${slotProps.data.module_id}`">
                                    <div class="white-hover h-[25px] w-[25px] rounded-[2px] border border-(--primary) text-(--primary) flex items-center justify-center">
                                        <i class="pi pi-eye"></i>
                                    </div>
                                </NuxtLink>

                                <NuxtLink :to="`/admin/modules-filieres/modules/${slotProps.data.module_id}/edit`">
                                    <div class="white-hover h-[25px] w-[25px] rounded-[2px] border border-(--yellow) text-(--yellow) flex items-center justify-center">
                                        <i class="pi pi-pencil"></i>
                                    </div>
                                </NuxtLink>

                                <NuxtLink class="cursor-pointer" @click="confirmDelete(slotProps.data.module_id)">
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
    import { ref, onMounted } from 'vue';
    // import { ProductService } from '@/service/ProductService';
    import DataTable from 'primevue/datatable';
    import Column from 'primevue/column';
    import { useConfirm } from "primevue/useconfirm";
    import { useToast } from "primevue/usetoast";
    import { useModule } from '@/composables/useModule';
    import SkeletonLoaderComponent from './SkeletonLoaderComponent.vue';
    const { getAllModulesArchived, deleteModule } = useModule()
    const data = useState("modulesDataArchive")
    const links = useState("moduleLinksArchive")
    const confirm = useConfirm();
    const toast = useToast();
    const first = ref(0);
    const number_per_page = 10
    const props = defineProps(
        {
            columns: Array,
            data: Array
        }
    )

    watch(first, function() {
        const page = ((first.value)/(number_per_page)) + 1
        getAllModulesArchived(page)
    })

    const confirmDelete = (moduleId) => {
        confirm.require({
            message: 'Êtes-vous sur de supprimer le module ?',
            header: 'Suppression d\'un module',
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
                await deleteModule(moduleId)
                toast.add({ severity: 'info', summary: 'Confirmé', detail: 'Module supprimé', life: 3000 });
            },
            reject: () => {
                toast.add({ severity: 'error', summary: 'Rejeté', detail: 'Action rejetée', life: 3000 });
            }
        });
    };

</script>
