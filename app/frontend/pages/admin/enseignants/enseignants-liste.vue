<template>
    <div class="w-full min-h-[80vh] flex flex-col gap-[20px]">
        <div class="w-full h-[20px] flex justify-between">
            <ul class="flex gap-[20px] sub-link">
                <li><NuxtLink to="/admin/enseignants" class="active-sub-link">Statistiques</NuxtLink></li>
                <li><NuxtLink to="/admin/enseignants/enseignants-liste/">Liste des enseignants</NuxtLink></li>
            </ul>

            <div class="px-[20px] bg-(--white)">
                Nuxt
            </div>
        </div>

        <div class="w-full flex flex-col gap-[20px]">
            <DataTableComponent :data="data" :columns="columns"/>
        </div>
    </div>
</template>

<script setup>
    import DataTableComponent from '~/components/EnseignantDataTableComponent.vue';

    definePageMeta(
        {
            layout: 'dashboard'
        }
    )   
    
    const route = useRouter().currentRoute.value.fullPath

    const data = [
        {
            id: "1000",
            name: "Bamboo Watch",
            email: "teacher1@example.com",
            hoursAssigned: 20,
            hoursAbsent: 2,
            createdAt: "2024-02-20"
        },
        {
            id: "1001",
            name: "Silver Bracelet",
            email: "teacher2@example.com",
            hoursAssigned: 18,
            hoursAbsent: 3,
            createdAt: "2024-02-19"
        },
        {
            id: "1002",
            name: "Leather Wallet",
            email: "teacher3@example.com",
            hoursAssigned: 22,
            hoursAbsent: 1,
            createdAt: "2024-02-18"
        },
        {
            id: "1003",
            name: "Smart Glasses",
            email: "teacher4@example.com",
            hoursAssigned: 25,
            hoursAbsent: 0,
            createdAt: "2024-02-17"
        },
        {
            id: "1004",
            name: "Digital Pen",
            email: "teacher5@example.com",
            hoursAssigned: 19,
            hoursAbsent: 4,
            createdAt: "2024-02-16"
        },
        {
            id: "1005",
            name: "Bluetooth Speaker",
            email: "teacher6@example.com",
            hoursAssigned: 21,
            hoursAbsent: 2,
            createdAt: "2024-02-15"
        },
        {
            id: "1006",
            name: "Wireless Mouse",
            email: "teacher7@example.com",
            hoursAssigned: 17,
            hoursAbsent: 5,
            createdAt: "2024-02-14"
        },
        {
            id: "1007",
            name: "Mechanical Keyboard",
            email: "teacher8@example.com",
            hoursAssigned: 23,
            hoursAbsent: 1,
            createdAt: "2024-02-13"
        },
        {
            id: "1008",
            name: "USB Hub",
            email: "teacher9@example.com",
            hoursAssigned: 20,
            hoursAbsent: 3,
            createdAt: "2024-02-12"
        }
    ];

    const columns = [
        'id',
        'Noms enseignants',
        'Email',
        'Nbre d\'heure affectuées',
        'Nbre d\'heure d\'absences',
        'Date de création',
        'Actions'
    ];
</script>


<style scoped>

</style>