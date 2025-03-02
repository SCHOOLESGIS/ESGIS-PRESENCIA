<template>
    <div>
        <div class="py-[5px] text-(--dark-text-color-2)">Emargements</div>
        <div class="flex gap-2 flex-wrap">
            <div class="h-[100px] w-[200px] grow bg-(--white) shadow-md rounded-[4px]">

            </div>
            <div class="h-[100px] w-[200px] grow bg-(--white) shadow-md rounded-[4px]"></div>
            <div class="h-[100px] w-[200px] grow bg-(--white) shadow-md rounded-[4px]"></div>
            <div class="h-[100px] w-[200px] grow bg-(--white) shadow-md rounded-[4px]"></div>
            <div class="h-[100px] w-[200px] grow bg-(--white) shadow-md rounded-[4px]"></div>
            <div class="h-[100px] w-[200px] grow bg-(--white) shadow-md rounded-[4px]"></div>
            <div class="h-[100px] w-[200px] grow bg-(--white) shadow-md rounded-[4px]"></div>
            <div class="h-[100px] w-[200px] grow bg-(--white) shadow-md rounded-[4px]"></div>
            <div class="h-[100px] w-[200px] grow bg-(--white) shadow-md rounded-[4px]"></div>
            <div class="h-[100px] w-[200px] grow bg-(--white) shadow-md rounded-[4px]"></div>
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
    
</style>