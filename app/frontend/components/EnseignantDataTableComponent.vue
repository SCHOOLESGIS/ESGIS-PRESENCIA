
<template>
    <div class="w-full flex flex-col gap-[20px]">
        <div class="card shadow-sm rounded-[10px] bg-(--white)">
            <DataTable :value="products" tableStyle="min-width: 50rem rounded-[10px]">
                <Column :field="'enseignant_id'" :header="'M'"></Column>
                <Column :field="'name'" :header="'Nom enseignants'"></Column>
                <Column :field="'email'" :header="'Email'"></Column>
                <Column :field="'hoursAssigned'" :header="'Nbre d\'heure affectuées'"></Column>
                <Column :field="'hoursAbsent'" :header="'Nbre d\'heure d\'absences'"></Column>
                <Column :field="'createdAt'" :header="'Date de création'"></Column>
                <Column :field="'action'" :header="'Actions'">
                    <template #body="slotProps">
                        <div class="flex gap-[5px]">
                            <NuxtLink :to="`/admin/enseignants/${slotProps.data.id}`">
                                <div class="white-hover h-[25px] w-[25px] rounded-[2px] border border-(--primary) text-(--primary) flex items-center justify-center">
                                    <i class="pi pi-eye"></i>
                                </div>
                            </NuxtLink>

                            <NuxtLink to="">
                                <div class="white-hover h-[25px] w-[25px] rounded-[2px] border border-(--yellow) text-(--yellow) flex items-center justify-center">
                                    <i class="pi pi-pencil"></i>
                                </div>
                            </NuxtLink>

                            <NuxtLink to="">
                                <div class="white-hover h-[25px] w-[25px] rounded-[2px] border border-(--red) text-(--red) flex items-center justify-center">
                                    <i class="pi pi-trash"></i>
                                </div>
                            </NuxtLink>

                            <NuxtLink to="" class="hidden-white cursor-pointer" @click="visible = true">
                                <div class="h-[25px] w-[25px] rounded-[2px] border border-(--white) text-(--primary) flex items-center justify-center">
                                    <i class="pi pi-file-plus"></i>
                                </div>
                            </NuxtLink>

                            <NuxtLink to="" class="hidden-white">
                                <div class="h-[25px] w-[25px] rounded-[2px] border border-(--white) text-(--primary) flex items-center justify-center">
                                    <i class="pi pi-history"></i>
                                </div>
                            </NuxtLink>
                        </div>
                    </template>
                </Column>
            </DataTable>
        </div>
        <div class="card shadow-sm">
            {{ first }}
            <Paginator v-model:first="first" :rows="links[1]" :totalRecords="links[0]"></Paginator>
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
    </div>
</template>

<script setup>
    import { ref, onMounted } from 'vue';
    // import { ProductService } from '@/service/ProductService';
    import DataTable from 'primevue/datatable';
    import Column from 'primevue/column';
    import ColumnGroup from 'primevue/columngroup';   // optional
    import Row from 'primevue/row'; 
    const data = useState("enseignantData")
    const links = useState("enseignantLinks")

    const first = ref(0);
    const number_per_page = 10
    const products = ref();
    const visible = ref(false)

    

    onMounted(() => {
        products.value = data.value
        console.log(links);
    });


</script>
