<template lang="">
    <div class="w-[100%] sm:w-[100%] lg:w-[525px] min-h-[200px] sm:w-[100%] flex justify-center items-start">
        <form class="flex flex-col gap-[30px]" action.preventDefault="">
            <div class="text-[2.5rem] font-semibold text-(--primary) text-center">Créer un compte enseignant</div>
            <div class="text-(--text-grey) font-semibold text-center text-[.8rem] lg:text-[1rem]">
                Entrer les champs requis ci dessous pour créer un compte enseignant
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
                        Spécialité
                    </div>
                    <div >
                        <InputText class="w-full rounded-[4px]" name="username" type="text" placeholder="Entrer la spécialité" />
                    </div>
                </div>

                <div class="w-full">
                    <Button label="Créer un compte enseignant" class="bg-black w-full"/>
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