<template lang="">
    <div class="w-[100%] min-h-[100vh] flex bg-[var(--stroke)]">
        <div class="shadow-[2px_0_10px_1px_rgba(0,0,0,0.2)] w-[250px] h-[100vh] p-[10px] bg-[var(--white)] lg:block hidden flex flex-col gap-[30px]">
            <div class="h-[70px] flex items-center justify-center">
                <img src="../assets/images/logo/logo.svg" alt="">
            </div>
            <div class="w-[100%] h-[calc(100vh-90px)] pt-[40px]">
                <ul class="flex flex-col gap-[15px]">
                    <li v-for="navigation in navigations" :key="navigation.icon">
                        <NuxtLink :to="`${navigation.link}`" class="rounded-[8px] w-[100%] text-start flex items-center gap-3 px-[20px] py-[15px] cursor-pointer" :class="{'active' : route.includes(navigation.link)}">
                            <Icon name="uiw:appstore-o" style="color: black" />
                            <span class="font-medium" style="color: var(--dark-text-color-2)">{{navigation.libel}}</span>
                        </NuxtLink>
                    </li>
                </ul>
            </div>
        </div>

        <div class="w-[100%] lg:w-[calc(100%-200px)] min-h-[100vh] ">
            <div class="shadow-[4px_2px_10px_1px_rgba(0,0,0,0.2)] h-[80px]  bg-[var(--white)] flex items-center lg:justify-end justify-between px-[20px]">
                <div class="text-[var(--primary)] lg:hidden block flex gap-[2px]">
                    <img src="/icons/form_logo.svg" class="cursor-pointer shadow sm:w-normal w-[40px]" alt="">
                    <div class="text-[30px] flex items-center cursor-pointer">
                        <i class="pi pi-align-justify" style="font-size: 2rem; color: var(--primary)"></i>
                    </div>
                </div>
                <div class="flex gap-[20px]">
                    <div class="flex items-center gap-[10px]">
                        <div class="flex items-center">
                            <ToggleSwitch v-model="checked">
                                <template #handle="{ checked }">
                                    <i :class="['!text-xs pi', { 'pi-sun': checked, 'pi-moon': !checked }]" />
                                </template>
                            </ToggleSwitch>
                        </div>
                        <NuxtLink to="" class="cursor-pointer">
                            <img src="/icons/bells.svg" alt="" class="border-[1px_solid_var(--stroke)]">
                        </NuxtLink>
                    </div>
                    <div class="flex gap-[10px]">
                        <div class="flex flex-col items-end ">
                            <div>{{name}}</div>
                            <div class="role">{{role}}</div>
                        </div>
                        <Avatar image="data:image/jpeg;base64,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" class="mr-2" size="large" shape="circle" />
                    </div>
                </div>
            </div>

            <div class="w-[100%] min-h-[calc(100vh-80px)] p-5">
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