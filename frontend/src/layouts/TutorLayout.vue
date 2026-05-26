<template>
  <div class="flex h-[111.12vh] w-[111.12vw] overflow-hidden bg-[#F7F2EB] relative text-slate-900 selection:bg-[#BAD6EB]/40" style="zoom: 90%; transform-origin: top left;">
    <!-- Global Atmospheric Background System -->
    <div class="absolute inset-0 z-0 pointer-events-none overflow-hidden">
      <!-- Ultra Subtle Grid Texture -->
      <div class="absolute inset-0 bg-[url('data:image/svg+xml;base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHdpZHRoPSI2MCIgaGVpZ2h0PSI2MCI+CjxwYXRoIGQ9Ik0wIDBoNjB2NjBIMHoiIGZpbGw9Im5vbmUiLz4KPHBhdGggZD0iTTAgNjBoNjBWMHoiIGZpbGw9Im5vbmUiIHN0cm9rZT0iIzA4MUY1QyIgc3Ryb2tlLW9wYWNpdHk9IjAuMDMiIHN0cm9rZS13aWR0aD0iMSIvPgo8L3N2Zz4=')] opacity-50 [mask-image:linear-gradient(to_bottom,white,transparent_80%)]"></div>
      
      <!-- Environmental Lighting -->
      <div class="absolute -top-[20%] -left-[10%] w-[70vw] h-[70vw] max-w-[1000px] max-h-[1000px] bg-gradient-to-br from-[#D0E3FF]/60 via-[#BAD6EB]/10 to-transparent rounded-full blur-[120px] opacity-80 mix-blend-multiply"></div>
      <div class="absolute top-[30%] -right-[15%] w-[60vw] h-[60vw] max-w-[900px] max-h-[900px] bg-gradient-to-bl from-[#7096D1]/20 via-[#334EAC]/5 to-transparent rounded-full blur-[150px] opacity-70"></div>
      <div class="absolute top-1/4 left-1/4 w-[50vw] h-[50vw] bg-gradient-to-tr from-transparent via-white/50 to-transparent rounded-full blur-[100px]"></div>
    </div>

    <!-- Tutor Sidebar -->
    <TutorSidebar class="shrink-0" />

    <!-- Main Content -->
    <div class="flex min-w-0 flex-1 flex-col overflow-hidden">

      <!-- Tutor Header -->
      <TutorHeader />

      <!-- Page Content -->
      <main class="flex-1 overflow-y-auto overflow-x-hidden bg-transparent relative z-10">
        <div class="mx-auto w-full max-w-7xl px-4 py-6 sm:px-6 lg:px-8">
          <RouterView />
        </div>
      </main>

    </div>
  </div>
</template>

<script setup>
import { RouterView } from 'vue-router'
import TutorSidebar from '@/components/shared/TutorSidebar.vue'
import TutorHeader from '@/components/shared/TutorHeader.vue'
</script>
