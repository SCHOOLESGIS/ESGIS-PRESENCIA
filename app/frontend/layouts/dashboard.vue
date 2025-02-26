<template lang="">
    <div class="w-[100%] min-h-[100vh] flex bg-[var(--stroke)]">
        <div class="sticky top-0 shadow-[2px_0_10px_1px_rgba(0,0,0,0.2)] w-[250px] h-[100vh] bg-[var(--white)] lg:block hidden flex flex-col gap-[30px]">
            <div class="h-[70px] flex items-center justify-center border border-(--stroke)">
                <img src="../assets/images/logo/logo.svg" alt="">
            </div>
            <div class="w-[100%] h-[calc(100vh-120px)] pt-[25px] p-[10px]">
                <ul class="flex flex-col gap-[15px]">
                    <li v-for="navigation in navigations" :key="navigation.icon">
                        <NuxtLink :to="`${navigation.link}`" class="rounded-[4px] w-[100%] text-start flex items-center gap-3 px-[20px] py-[10px] cursor-pointer" :class="{'active' : route.includes(navigation.link)}">
                            <Icon :icon="`${navigation.icon}`" :ssr="true" class="text-(--dark-text-color-2)"/>
                            <span class="font-normal text-(--dark-text-color-2)">{{navigation.libel}}</span>
                        </NuxtLink>
                    </li>
                </ul>
            </div>
            <div class="w-full px-[10px]">
                <div class="rounded-[4px] w-[100%] text-start flex items-center gap-3 px-[20px] py-[5px] bg-(--stroke) border border-[var(--dark-text-color-1)] shadow-md cursor-pointer" @click="logoutUser">
                    <Icon icon="uiw:logout" class="text-slate-600" />
                    <span class="font-medium text-slate-600">Se déconnecter</span>
                </div>
            </div>
        </div>

        <div class="w-[100%] lg:w-[calc(100%-200px)] min-h-[100vh] ">
            <div class="z-[10] sticky top-0 shadow-[4px_2px_10px_1px_rgba(0,0,0,0.2)] h-[70px]  bg-[var(--white)] flex items-center lg:justify-end justify-between px-[20px]">
                <div class="text-[var(--primary)] lg:hidden block flex gap-[2px]">
                    <img src="/icons/form_logo.svg" class="cursor-pointer shadow sm:w-normal w-[40px]" alt="">
                    <div class="text-[30px] flex items-center cursor-pointer">
                        <i class="pi pi-align-justify" style="font-size: 2rem; color: var(--primary)"></i>
                    </div>
                </div>
                <div class="flex gap-[20px]">
                    <div class="flex gap-[15px]">
                        <div class="flex flex-col  items-end text-(--black)">
                            <span>{{name}}</span>
                            <span class="role">{{role}}</span>
                        </div>
                        <Avatar image="/patterns/Mash_19.png" class="mr-2 shadow-lg" size="large" shape="circle" />
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
    import navigations from '@/data/navigations';
    import { useUser } from '@/composables/useUser';
    import { Icon } from "@iconify/vue";
    const { logout } = useUser()
    
    definePageMeta(
        {
            middleware: 'auth'
        }
    )
    const route = useRouter().currentRoute.value.fullPath
    const cookie = useCookie('auth')
    const name = ref("")
    const role = ref("")
    if (cookie.value) {
        name.value = cookie.value.user.name + " " + cookie.value.user.surname
        role.value = cookie.value.user.role
    }
    const iconSrc = "";

    const logoutUser = () => {
        logout()
    }
</script>

<style scoped>
    .role {
        color: var(--dark-text-color-2);
    }
</style>