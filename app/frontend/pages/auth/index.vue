<template lang="">
    <div class="w-[100%] sm:w-[100%] lg:w-[500px] min-h-[200px] sm:w-[100%] flex justify-center items-start">
        <form class="flex flex-col gap-[30px]" action.preventDefault="">
            <div class="text-[1.75rem] sm:text-[2.5rem] font-semibold text-(--primary) text-center">Formulaire de connexion</div>
            <div class="text-(--text-grey) font-semibold text-center text-[.75rem] sm:text-[1rem]">
                Entrer les informations requis ci dessous pour vous connecter
            </div>
            <div class="flex flex-col gap-[20px] w-full">
                <div class="flex flex-col justify-start gap-[10px]">
                    <div class="text-(--black-mate) font-semibold">
                        Email
                    </div>
                    <div >
                        <InputText v-model="email" class="w-full rounded-[4px]" name="username" type="text" placeholder="Entrer votre email" />
                    </div>
                </div>

                <div class="flex flex-col justify-start gap-[10px]">
                    <div class="text-(--black-mate) font-semibold">
                        Mot de passe
                    </div>
                    <div >
                        <InputText v-model="password" class="w-full rounded-[4px]" name="username" type="text" placeholder="Entrer votre mot de passe" />
                    </div>
                </div>

                <div class="w-full text-end">
                    <NuxtLink to="/auth/reset-password" class="text-(--primary) font-semibold">Mot de passe oublié ?</NuxtLink>
                </div>

                <div class="w-full">
                    <Button label="Se connecter" @click="loginUser" class="bg-black w-full"/>
                </div>
            </div>
        </form>
        <Toast />
        <ConfirmDialog></ConfirmDialog>
    </div>
</template>
<script setup>
    import { useUser } from '@/composables/useUser';
    import { useToast } from "primevue/usetoast";
    const toast = useToast();

    const errors = useState("errors")
    const {login} = useUser()
    definePageMeta({
        layout: "auth",
        middleware: 'connected'
    })

    const email = ref("")
    const password = ref("")

    function loginUser () {
        login(email.value, password.value)
        if(errors.value.length === 1) {
            toast.add({ severity: 'error', summary: 'Rejeté', detail: errors, life: 3000 });
        }
    }

    
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