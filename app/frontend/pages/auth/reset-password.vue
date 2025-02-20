<template lang="">
    <div class="w-[100%] sm:w-[100%] lg:w-[470px] min-h-[200px] sm:w-[100%] flex justify-center items-start">
        <form class="flex flex-col items-center gap-[40px]" action.preventDefault="">
            <div class="text-nowrap text-[1.75rem] sm:text-[2.25rem] font-semibold text-(--primary) text-center">Réinitialiser le mot de passe</div>
            <div class="text-(--text-grey) font-semibold text-center text-[.Z5rem] sm:text-[.9rem]">
                Entrer les informations requis ci dessous pour rénitialiser le mot de passe
            </div>
            <div class="flex flex-col gap-[30px] w-full">

                <div class="flex flex-col justify-start gap-[10px]">
                    <div class="text-(--black-mate) font-semibold">
                        Entrer le mot de passe
                    </div>
                    <div >
                        <InputText class="w-full rounded-[4px]" name="username" type="text" placeholder="Entrer votre mot de passe" />
                    </div>
                </div>

                <div class="flex flex-col justify-start gap-[10px]">
                    <div class="text-(--black-mate) font-semibold">
                        Confirmer le mot de passe
                    </div>
                    <div >
                        <InputText class="w-full rounded-[4px]" name="username" type="text" placeholder="Entrer votre mot de passe" />
                    </div>
                </div>

                <div class="w-full">
                    <Button label="Réinitialiser le mot de passe" class="bg-black w-full"/>
                </div>
            </div>
        </form>
    </div>
</template>
<script setup>
    definePageMeta({
        layout: "auth"
    })
</script>
<style scoped>
    
</style>