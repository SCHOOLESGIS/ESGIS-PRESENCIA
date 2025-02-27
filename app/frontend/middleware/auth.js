export default defineNuxtRouteMiddleware((to, from) => {
    const auth = useCookie('auth')
    console.log(auth);
    if (!auth.value) {
      return navigateTo('/auth')
    }
  
    if (auth.value.user.role !== "admin") {
      return navigateTo('/auth')
    } else if (auth.value.user.role !== "admin"){

    }
  })