<template>
    <div class="bg-white bg-[url(/vertical.svg)] bg-cover bg-no-repeat hero-bg">
      <header class="absolute inset-x-0 top-0 z-50">
        <nav class="flex items-center justify-between p-6 lg:px-8" aria-label="Global">
          <div class="flex lg:flex-1">
            <a href="#" class="-m-1.5 p-1.5">
              <span class="sr-only">Your Company</span>
              <img class="h-8 w-auto" src="/logo.svg" alt="" />
            </a>
          </div>
          <div class="flex lg:hidden">
            <button type="button" class="-m-2.5 inline-flex items-center justify-center rounded-md p-2.5 text-gray-700" @click="mobileMenuOpen = true">
              <span class="sr-only">Open main menu</span>
              <Bars3Icon class="size-6" aria-hidden="true" />
            </button>
          </div>
          <div class="hidden lg:flex lg:flex-1 lg:justify-end">
            <a href="/auth" class="text-sm/6 font-semibold text-gray-900 bg-(--white) px-[20px] py-[10px] text-black border border-[2px] border-white hover:border-(--primary) rounded-full shadow-[0_5px_10px_1px_rgba(0,0,0,0.1)]">Se connecter <span aria-hidden="true">&rarr;</span></a>
          </div>
        </nav>
      </header>
  
      <div class="relative isolate pt-14 flex flex-col items-center justify-start min-h-[100vh]">
       <div class="h-[400px] md:mt-[10rem] flex flex-col gap-[10px] items-center justify-start">
        <div class="bg-(--white) w-[25rem] border border-(--dark-text-color-1) text-center text-(--dark-text-color-2) px-10 py-1 rounded-full">Gérer éfficacement vos emargements </div>
        <div class="md:text-[4rem] text-[2rem]">
          <span class="poppins-medium">Modernisez <span class="text-(--primary)">l’émargement</span>.</span>
        </div>
        <div class="md:w-[60%] w-[100%] text-center">
          <span class="underlined">ESGIS Presencia</span> révolutionne la gestion de l’émargement avec une solution numérique rapide, fiable et intuitive. Simplifiez le suivi des présences et optimisez l’organisation en quelques clics.
        </div>
        <div class="w-full flex justify-center gap-4 mt-[20px]">
          <NuxtLink to="/auth" class="px-[40px] py-[15px] rounded-full shadow-lg bg-(--primary) text-white">Se connecter</NuxtLink>
          <NuxtLink to="/auth" class="px-[40px] py-[15px] rounded-full border border-[2px] border-white hover:border-(--primary) shadow-[0_5px_10px_1px_rgba(0,0,0,0.1)] bg-(--white) text-(--primary)">Article à lire</NuxtLink>
        </div>
       </div>

       <div class="w-[75%] p-4 shadow-[0_0_10px_1px_rgba(0,0,0,0.1)] bg-white rounded-[8px]">
        <img src="/image.png" alt="" class="w-full">
       </div>

       <div class="footer px-6 w-full h-[50px] mt-[30px] bg-(--white) flex items-center justify-between">
        <div>&copy;Copyright</div>
        <div class="">@ESGIS_Presencia <strong class="text-(--primary)">{{ date.getFullYear() }}</strong></div>
       </div>
      </div>
    </div>
  </template>
  
  <script setup>
  import { ref } from 'vue'

  const date = new Date();

  const navigation = [
    { name: 'Product', href: '#' },
    { name: 'Features', href: '#' },
    { name: 'Marketplace', href: '#' },
    { name: 'Company', href: '#' },
  ]
  
  const mobileMenuOpen = ref(false)
  </script>

  <style scoped>

  </style>