import { useRouter } from 'vue-router'

export default defineNuxtRouteMiddleware((to, from) => {
  const router = useRouter()

  const allRoutes = router.getRoutes()

  const routeExists = allRoutes.filter(route => route.path === to.path)
  console.log(allRoutes);
  console.log(routeExists);
  if (routeExists.length === 0) {
    // return navigateTo('/404')
  }
})
