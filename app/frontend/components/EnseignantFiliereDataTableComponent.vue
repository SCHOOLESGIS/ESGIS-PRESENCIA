
<template>
    <div class="w-full flex flex-col gap-[10px]">
        <template v-if="data && data.length">
            <div class="card shadow-sm rounded-[10px] bg-(--white)">
                <DataTable :value="data" tableStyle="min-width: 50rem rounded-[10px]">
                    <Column :field="'filiere_id'" :header="'M'"></Column>
                    <Column :field="'filiere_name'" :header="'Nom de filière'"></Column>
                    <Column :field="'filiere_level'" :header="'Niveau (LMD)'"></Column>
                    <Column :field="'createdAt'" :header="'Date de création'"></Column>
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
    import { useFiliere } from '@/composables/useFiliere';
    import SkeletonLoaderComponent from './SkeletonLoaderComponent.vue';
    const { getAllFilieresByEnseignant } = useFiliere();
    const data = useState('filieresData')
    const links = useState('filiereLinks')
    const cookie = useCookie("auth")
    
    const props = defineProps(
        {
            columns: Array,
            data: Array
        }
    )
    const confirm = useConfirm();
    const toast = useToast();
    const first = ref(0);
    const visible = ref(false)
    const number_per_page = 10
    const enseignantID = cookie.value.user.enseignant.enseignant_id

    watch(first, function() {
        const page = ((first.value)/(number_per_page)) + 1
        getAllFilieresByEnseignant(page, enseignantID)
    })

    onMounted( () => {
        getAllFilieresByEnseignant(0, enseignantID)
    });

</script>
