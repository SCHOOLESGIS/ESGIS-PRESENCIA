export default defineNuxtRouteMiddleware((to, from) => {
    const auth = useCookie('auth')

    console.log("Middleware Auth - Vérification", auth.value, to.path)

    if (!auth.value) {
        if (to.path !== '/auth') {
            return navigateTo('/auth')
        }
    } else {
        if (auth.value.user?.role === "admin" && to.path !== '/admin') {
            return navigateTo('/admin/')
        } else if (auth.value.user?.role !== "admin" && to.path !== '/enseignants') {
            return navigateTo('/enseignants')
        }
    }
})
