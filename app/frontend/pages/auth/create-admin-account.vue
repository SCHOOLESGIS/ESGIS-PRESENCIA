<template lang="">
    <div class="w-[100%] sm:w-[100%] lg:w-[500px] min-h-[200px] sm:w-[100%] flex justify-center items-start">
        <form class="flex flex-col gap-[30px]" action.preventDefault="">
            <div class="text-nowrap text-[1.75rem] sm:text-[2.25rem] font-semibold text-(--primary) text-center">Créer un compte administrateur</div>
            <div class="text-(--text-grey) font-semibold text-center text-[.Z5rem] sm:text-[.9rem]">
                Entrer les informations requis ci dessous pour créer un compte administrateur
            </div>
            <div class="flex flex-col gap-[20px]">
                <div class="flex justify-between gap-[20px]">
                    <div class="flex flex-col justify-start gap-[10px] w-[50%]">
                        <div class="text-(--black-mate) font-semibold">
                            Nom
                        </div>
                        <div >
                            <InputText class="w-full rounded-[4px]" name="username" type="text" placeholder="Nom" />
                        </div>
                    </div>
                    <div class="flex flex-col justify-start gap-[10px] w-[50%]">
                        <div class="text-(--black-mate) font-semibold">
                            Prénom
                        </div>
                        <div >
                            <InputText class="w-full rounded-[4px]" name="username" type="text" placeholder="Prénom" />
                        </div>
                    </div>

                </div>

                <div class="flex flex-col justify-start gap-[10px]">
                    <div class="text-(--black-mate) font-semibold">
                        Email
                    </div>
                    <div >
                        <InputText class="w-full rounded-[4px]" name="username" type="text" placeholder="Entrer votre email" />
                    </div>
                </div>

                <div class="flex flex-col justify-start gap-[10px]">
                    <div class="text-(--black-mate) font-semibold">
                        Mot de passe
                    </div>
                    <div >
                        <InputText class="w-full rounded-[4px]" name="username" type="text" placeholder="Entrer le mot de passe" />
                    </div>
                </div>

                <div class="w-full">
                    <Button label="Créer un compte administrateur" class="bg-black w-full"/>
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
    .p-button {
        color: var(--white) !important;
        background: var(--primary) !important;
        border: 1px solid var(--primary) !important;
        padding: 10px 20px !important;
        border-radius: 4px !important;
    }
</style>