<template lang="">
    <div class="w-[100%] min-h-[100vh] flex bg-[var(--stroke)]">
        <div class="sticky top-0 shadow-[2px_0_10px_1px_rgba(0,0,0,0.2)] w-[250px] h-[100vh] p-[10px] bg-[var(--white)] lg:block hidden flex flex-col gap-[30px]">
            <div class="h-[70px] flex items-center justify-center">
                <img src="../assets/images/logo/logo.svg" alt="">
            </div>
            <div class="w-[100%] h-[calc(100vh-90px)] pt-[40px]">
                <ul class="flex flex-col gap-[15px]">
                    <li v-for="navigation in navigations" :key="navigation.icon">
                        <NuxtLink :to="`${navigation.link}`" class="rounded-[4px] w-[100%] text-start flex items-center gap-3 px-[20px] py-[15px] cursor-pointer" :class="{'active' : route.includes(navigation.link)}">
                            <Icon name="uiw:appstore-o" style="color: black" />
                            <span class="font-medium text-(--dark-text-color-2)">{{navigation.libel}}</span>
                        </NuxtLink>
                    </li>
                </ul>
            </div>
        </div>

        <div class="w-[100%] lg:w-[calc(100%-200px)] min-h-[100vh] ">
            <div class="z-[10] sticky top-0 shadow-[4px_2px_10px_1px_rgba(0,0,0,0.2)] h-[80px]  bg-[var(--white)] flex items-center lg:justify-end justify-between px-[20px]">
                <div class="text-[var(--primary)] lg:hidden block flex gap-[2px]">
                    <img src="/icons/form_logo.svg" class="cursor-pointer shadow sm:w-normal w-[40px]" alt="">
                    <div class="text-[30px] flex items-center cursor-pointer">
                        <i class="pi pi-align-justify" style="font-size: 2rem; color: var(--primary)"></i>
                    </div>
                </div>
                <div class="flex gap-[20px]">
                    <div class="flex items-center gap-[10px]">
                        <NuxtLink to="" class="cursor-pointer">
                            <img src="/icons/bells.svg" alt="" class="border-[1px_solid_var(--stroke)]">
                        </NuxtLink>
                    </div>
                    <div class="flex gap-[10px]">
                        <div class="flex flex-col items-end text-(--black)">
                            <div>{{name}}</div>
                            <div class="role">{{role}}</div>
                        </div>
                        <Avatar image="data:image/jpeg;base64,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" class="mr-2" size="large" shape="circle" />
                    </div>
                </div>
            </div>

            <div class="w-[100%] min-h-[calc(100vh-80px)] px-4 py-5">
                <slot></slot>
            </div>
        </div>
    </div>
</template>
<script setup>
    const route = useRouter().currentRoute.value.fullPath
    const name = ref("John DOE")
    const role = ref("Enseignant")

    const iconSrc = "";

    const navigations = [
        {
            icon: "overviews.svg",
            link: '/admin',
            libel: "Vue d'ensemble"
        },
        {
            icon: "Teacher.svg",
            link: '/admin/enseignants',
            libel: "Enseignants"
        },
        {
            icon: "module.svg",
            link: '/admin/modules-filieres',
            libel: "Modules & Filières"
        },
        {
            icon: "pen.svg",
            link: '/admin/emargements',
            libel: "Emargements"
        },
        {
            icon: "report.svg",
            link: '/admin/rapports',
            libel: "Rapports"
        }
    ];
</script>

<style scoped>
    .role {
        color: var(--dark-text-color-2);
    }
</style>