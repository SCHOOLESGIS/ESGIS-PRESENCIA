<template>
    <div>
        <div if="data" class="text-xl">Welcome <span class="font-bold text-(--primary)">{{ data.user.name + ' ' + data.user.surname }}</span> !</div>
        <div class="card bg-white">
                <DataTable :value="products">
                    <Column field="code" header="Code">
                        <template #body>
                            <Skeleton></Skeleton>
                        </template>
                    </Column>
                    <Column field="name" header="Name">
                        <template #body>
                            <Skeleton></Skeleton>
                        </template>
                    </Column>
                    <Column field="category" header="Category">
                        <template #body>
                            <Skeleton></Skeleton>
                        </template>
                    </Column>
                    <Column field="quantity" header="Quantity">
                        <template #body>
                            <Skeleton></Skeleton>
                        </template>
                    </Column>
                </DataTable>
            </div>
    </div>
</template>

<script setup>
    definePageMeta(
        {
            layout: 'dashboard',
            middleware: ['auth', 'admin']
        }
    )
    import { ref } from 'vue';

    const products = ref(new Array(4));
    const data = useCookie('auth')
</script>


<style>
    
</style>