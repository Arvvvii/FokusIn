<template>
  <div class="flex h-screen w-full overflow-hidden bg-[#F7F2EB] relative text-slate-900 selection:bg-[#BAD6EB]/40">
    <!-- Global Atmospheric Background System -->
    <div class="fokus-bg-canvas" aria-hidden="true">
      <div class="fokus-blob fokus-blob-1"></div>
      <div class="fokus-blob fokus-blob-2"></div>
      <div class="fokus-blob fokus-blob-3"></div>
      <div class="fokus-dot-grid"></div>
    </div>

    <!-- Tutor Sidebar -->
    <TutorSidebar class="shrink-0" />

    <!-- Main Content -->
    <div class="flex min-w-0 flex-1 flex-col overflow-hidden tutor-layout-main">

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
