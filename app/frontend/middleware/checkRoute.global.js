import { useRouter } from 'vue-router'

export default defineNuxtRouteMiddleware((to, from) => {
  const router = useRouter()

  const allRoutes = router.getRoutes()

  const routeExists = allRoutes.some(route => route.path === to.path)
  console.log(allRoutes);
  console.log(routeExists);
  // if (!routeExists) {
  //   return navigateTo('/404')
  // }
})
