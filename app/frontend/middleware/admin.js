export default defineNuxtRouteMiddleware((to, from) => {
    const auth = useCookie('auth')

    if (auth.value.user.role !== "admin") {
      return navigateTo('/auth')
    }
  })