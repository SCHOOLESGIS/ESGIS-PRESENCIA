<template>
    <div class="flex flex-col gap-[10px]">
        <div if="data" class="text-xl">Welcome <span class="font-bold text-(--primary)">{{ data.user.name + ' ' + data.user.surname }}</span> !</div>
        <div class="w-full min-h-[calc(100vh-140px)] flex items-start justify-start  gap-[10px] flex-wrap">
            <div class="card-home bg-white rounded-[8px] shadow-md w-[250px] md:w-[25%] min-h-[calc((100vh-120px)/2)] grow p-2">
                <div class="card-home-head h-[75px] w-full bg-(--stroke) rounded-[4px] flex items-center justify-center text-[1.2rem]">Emargements</div>
                <div class="h-[calc(((100vh-120px)/2)-120px)] w-full rounded-[4px] flex items-center justify-center text-[2rem] font-bold">190</div>
                <div class="card-home-link h-[calc(30px)] w-full rounded-[4px] flex items-center justify-end text-[2rem] font-bold">
                    <NuxtLink to="/enseignant/emargement">
                        <i class="pi pi-chevron-right"></i>
                    </NuxtLink>
                </div>
            </div>
            <div class="card-home bg-white rounded-[8px] shadow-md w-[250px] md:w-[25%] min-h-[calc((100vh-120px)/2)] grow p-2">
                <div class="card-home-head h-[75px] w-full bg-(--stroke) rounded-[4px] flex items-center justify-center text-[1.2rem]">Cours</div>
                <div class="h-[calc(((100vh-120px)/2)-120px)] w-full rounded-[4px] flex items-center justify-center text-[2rem] font-bold">20</div>
                <div class="card-home-link h-[calc(30px)] w-full rounded-[4px] flex items-center justify-end text-[2rem] font-bold">
                    <NuxtLink to="/enseignant/emargement">
                        <i class="pi pi-chevron-right"></i>
                    </NuxtLink>
                </div>
            </div>
            <div class="card-home bg-white rounded-[8px] shadow-md w-[250px] md:w-[25%] min-h-[calc((100vh-120px)/2)] grow p-2">
                <div class="card-home-head h-[75px] w-full bg-(--stroke) rounded-[4px] flex items-center justify-center text-[1.2rem]">Filieres</div>
                <div class="h-[calc(((100vh-120px)/2)-120px)] w-full rounded-[4px] flex items-center justify-center text-[2rem] font-bold">10</div>
                <div class="card-home-link h-[calc(30px)] w-full rounded-[4px] flex items-center justify-end text-[2rem] font-bold">
                    <NuxtLink to="/enseignant/emargement">
                        <i class="pi pi-chevron-right"></i>
                    </NuxtLink>
                </div>
            </div>
            <div class="card-home bg-white rounded-[8px] shadow-md w-[250px] md:w-[25%] min-h-[calc((100vh-120px)/2)] grow p-2">
                <div class="card-home-head h-[75px] w-full bg-(--stroke) rounded-[4px] flex items-center justify-center text-[1.2rem]">Rapports</div>
                <div class="h-[calc(((100vh-120px)/2)-120px)] w-full rounded-[4px] flex items-center justify-center text-[2rem] font-bold">190</div>
                <div class="card-home-link h-[calc(30px)] w-full rounded-[4px] flex items-center justify-end text-[2rem] font-bold">
                    <NuxtLink to="/enseignant/emargement">
                        <i class="pi pi-chevron-right"></i>
                    </NuxtLink>
                </div>
            </div>
            <div class="card-home bg-white rounded-[8px] shadow-md w-[250px] md:w-[25%] min-h-[calc((100vh-120px)/2)] grow p-2">
                <div class="card-home-head h-[75px] w-full bg-(--stroke) rounded-[4px] flex items-center justify-center text-[1.2rem]">Justifications</div>
                <div class="h-[calc(((100vh-120px)/2)-120px)] w-full rounded-[4px] flex items-center justify-center text-[2rem] font-bold">190</div>
                <div class="card-home-link h-[calc(30px)] w-full rounded-[4px] flex items-center justify-end text-[2rem] font-bold">
                    <NuxtLink to="/enseignant/emargement">
                        <i class="pi pi-chevron-right"></i>
                    </NuxtLink>
                </div>
            </div>
            <div class="card-home bg-white rounded-[8px] shadow-md w-[250px] md:w-[25%] min-h-[calc((100vh-120px)/2)] grow p-2">
                <div class="card-home-head h-[75px] w-full bg-(--stroke) rounded-[4px] flex items-center justify-center text-[1.2rem]">Modules</div>
                <div class="h-[calc(((100vh-120px)/2)-120px)] w-full rounded-[4px] flex items-center justify-center text-[2rem] font-bold">190</div>
                <div class="card-home-link h-[calc(30px)] w-full rounded-[4px] flex items-center justify-end text-[2rem] font-bold">
                    <NuxtLink to="/enseignant/emargement">
                        <i class="pi pi-chevron-right"></i>
                    </NuxtLink>
                </div>
            </div>
        </div>
    </div>
</template>

<script setup>
    import { useUser } from '@/composables/useUser';
    const {logout} = useUser()
    definePageMeta(
        {
            layout: 'enseignant-dashboard',
            middleware: ['enseignant']
        }
    )
    const data = useCookie('auth')
</script>


<style scoped>
    .card-home-head {
        transition: all .1s .1s ease-in-out
    }

    .card-home:hover {
        outline: 2px solid var(--primary);
    }

    .card-home:hover .card-home-head{
        background-color: var(--primary);
        color: var(--white);
        transform: translateY(2.5px);
    }

    .card-home:hover .card-home-link a {
        display: flex;
    }
    
    .card-home-link a{
        display: none;
        width: 35px;
        height: 35px;
        background-color: var(--stroke);
        align-items: center;
        justify-content: center;
        border-radius: 50%;
    }

    .card-home-link a:hover{
        /* display: none; */
        background-color: var(--primary);
        color: var(--white);
    }
</style>