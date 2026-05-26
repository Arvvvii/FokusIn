<template>
  <div class="flex h-screen overflow-hidden bg-[#F7F2EB] relative text-slate-900 selection:bg-[#BAD6EB]/40">
    <!-- Global Background System -->
    <div class="absolute inset-0 z-0 pointer-events-none overflow-hidden">
      <!-- Ultra Subtle Grid Texture -->
      <div class="absolute inset-0 bg-[url('data:image/svg+xml;base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHdpZHRoPSI2MCIgaGVpZ2h0PSI2MCI+CjxwYXRoIGQ9Ik0wIDBoNjB2NjBIMHoiIGZpbGw9Im5vbmUiLz4KPHBhdGggZD0iTTAgNjBoNjBWMHoiIGZpbGw9Im5vbmUiLz4KPHBhdGggZD0iTTAgNjBoNjBWMHoiIGZpbGw9Im5vbmUiIHN0cm9rZT0iIzA4MUY1QyIgc3Ryb2tlLW9wYWNpdHk9IjAuMDMiIHN0cm9rZS13aWR0aD0iMSIvPgo8L3N2Zz4=')] opacity-25 [mask-image:linear-gradient(to_bottom,white,transparent)]"></div>
    </div>

    <!-- Sidebar -->
    <AppSidebar class="shrink-0" :style="isTutor ? { zoom: '90%' } : {}" />

    <!-- Main Content -->
    <div class="flex min-w-0 flex-1 flex-col overflow-hidden">

      <!-- Header -->
      <AppHeader :style="isTutor ? { zoom: '90%' } : {}" />

      <!-- Page Content -->
      <main class="flex-1 overflow-y-auto overflow-x-hidden bg-transparent relative z-10">
        <div class="mx-auto w-full px-4 py-6 sm:px-6 lg:px-8 transition-all duration-300" :class="isTutor ? 'max-w-[1450px]' : 'max-w-7xl'" :style="isTutor ? { zoom: '90%' } : {}">
          <RouterView />
        </div>
      </main>

    </div>
  </div>
</template>

<script setup>
import { computed } from 'vue'
import { RouterView, useRoute } from 'vue-router'
import AppSidebar from '@/components/shared/AppSidebar.vue'
import AppHeader from '@/components/shared/AppHeader.vue'

const route = useRoute()
const isTutor = computed(() => route.path.startsWith('/tutor'))
</script>

