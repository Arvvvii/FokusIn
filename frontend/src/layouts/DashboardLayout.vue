<template>
  <div class="flex h-[111.12vh] w-[111.12vw] overflow-hidden bg-[#F7F2EB] relative text-slate-900 selection:bg-[#BAD6EB]/40" style="zoom: 90%; transform-origin: top left;">
    <!-- Global Background System -->
    <AppBackground />

    <!-- Sidebar -->
    <AppSidebar class="shrink-0" />

    <!-- Main Content -->
    <div class="flex min-w-0 flex-1 flex-col overflow-hidden">

      <!-- Header -->
      <AppHeader />

      <!-- Page Content -->
      <main class="flex-1 overflow-y-auto overflow-x-hidden bg-transparent relative z-10">
        <div class="mx-auto w-full max-w-7xl px-4 py-6 sm:px-6 lg:px-8 transition-all duration-300">
          <RouterView />
        </div>
      </main>

    </div>
  </div>
</template>

<script setup>
import { RouterView } from 'vue-router'
import AppSidebar from '@/components/shared/AppSidebar.vue'
import AppHeader from '@/components/shared/AppHeader.vue'
import AppBackground from '@/components/shared/AppBackground.vue'
</script>

