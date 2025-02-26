
<template>
    <div class="w-full flex flex-col gap-[10px]">
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

                            <NuxtLink class="cursor-pointer" @click="requireConfirmation()">
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
            <Paginator :rows="10" :totalRecords="120"></Paginator>
        </div>

        <Dialog v-model:visible="visible" modal :style="{ width: '25rem'}">
            <template #header>
                <div class="inline-flex items-center justify-center gap-2 text-(--primary) text-[1.2rem]">
                    Attributions des modules
                </div>
            </template>
            <div class="w-full pt-[10px]">
                <span class="text-surface-500 dark:text-surface-400 block mb-8">Selectionnez le ou les module(s)</span>
                <MultiSelect v-model="selectedCities" :options="groupedCities" optionLabel="label" filter optionGroupLabel="label" optionGroupChildren="items" display="chip" placeholder="Selectionner le ou les module(s)" class="w-full">
                    <template #optiongroup="slotProps">
                        <div class="flex items-center">
                            <img :alt="slotProps.option.label" src="https://primefaces.org/cdn/primevue/images/flag/flag_placeholder.png" :class="`flag flag-${slotProps.option.code.toLowerCase()} mr-2`" style="width: 18px" />
                            <div>{{ slotProps.option.label }}</div>
                        </div>
                    </template>
                </MultiSelect>
            </div>
            <div class="flex justify-end gap-2 mt-5">
                <Button type="button" label="Annuler" severity="secondary" @click="visible = false" class="bg-(--white)"></Button>
                <Button type="button" label="Attribuer" @click="visible = false"></Button>
            </div>
        </Dialog>

        <ConfirmDialog group="headless">
            <template #container="{ message, acceptCallback, rejectCallback }">
                <div class="flex flex-col items-center p-8 bg-surface-0 dark:bg-surface-900 rounded">
                    <div class="rounded-full bg-primary text-primary-contrast inline-flex justify-center items-center h-24 w-24 -mt-20">
                        <i class="pi pi-question text-5xl"></i>
                    </div>
                    <span class="font-bold text-2xl block mb-2 mt-6">{{ message.header }}</span>
                    <p class="mb-0">{{ message.message }}</p>
                    <div class="flex items-center gap-2 mt-6">
                        <Button label="Save" @click="acceptCallback" class="w-32"></Button>
                        <Button label="Cancel" outlined @click="rejectCallback" class="w-32"></Button>
                    </div>
                </div>
            </template>
        </ConfirmDialog>
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
    const { getAllModules } = useModule()
    const data = useState("modulesData")

    const confirm = useConfirm();
    const toast = useToast();

    const requireConfirmation = () => {
        confirm.require({
            group: 'headless',
            header: 'Are you sure?',
            message: 'Please confirm to proceed.',
            accept: () => {
                toast.add({ severity: 'info', summary: 'Confirmed', detail: 'You have accepted', life: 3000 });
            },
            reject: () => {
                toast.add({ severity: 'error', summary: 'Rejected', detail: 'You have rejected', life: 3000 });
            }
        });
    };
    
    const props = defineProps(
        {
            columns: Array,
            data: Array
        }
    )

    const products = ref();
    const visible = ref(false)



</script>
