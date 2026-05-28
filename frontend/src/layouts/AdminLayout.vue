<template>
  <div class="admin-layout flex h-screen w-full font-sans overflow-hidden relative text-slate-900 selection:bg-[#BAD6EB]/40">
    <!-- Global Atmospheric Background System -->
    <div class="absolute inset-0 z-0 pointer-events-none overflow-hidden">
      <!-- Admin Dot Grid -->
      <div class="absolute inset-0 admin-dot-grid [mask-image:linear-gradient(to_bottom,white,transparent_80%)]"></div>
      
      <!-- Admin Environmental Lighting -->
      <div class="admin-blob admin-blob-1 absolute rounded-full blur-[100px]"></div>
      <div class="admin-blob admin-blob-2 absolute rounded-full blur-[100px]"></div>
      <div class="admin-blob admin-blob-3 absolute rounded-full blur-[100px]"></div>
    </div>
    <!-- Sidebar component -->
    <AdminSidebar />
    
    <!-- Main Content Area -->
    <div class="flex-1 flex flex-col h-full min-w-0 relative">
      <AdminHeader />
      
      <main class="flex-1 overflow-x-hidden overflow-y-auto bg-transparent custom-scrollbar relative z-10">
        <RouterView v-slot="{ Component }">
          <transition name="fade" mode="out-in">
            <component :is="Component" />
          </transition>
        </RouterView>
      </main>
    </div>
  </div>
</template>

<script setup>
import { RouterView } from 'vue-router'
import AdminSidebar from '@/components/admin/AdminSidebar.vue'
import AdminHeader from '@/components/admin/AdminHeader.vue'
</script>

<style scoped>
.fade-enter-active,
.fade-leave-active {
  transition: opacity 0.2s ease, transform 0.2s ease;
}

.fade-enter-from,
.fade-leave-to {
  opacity: 0;
  transform: translateY(4px);
}

.custom-scrollbar::-webkit-scrollbar {
  width: 6px;
  height: 6px;
}
.custom-scrollbar::-webkit-scrollbar-track {
  background: transparent;
}
.custom-scrollbar::-webkit-scrollbar-thumb {
  background: rgba(8, 31, 92, 0.1);
  border-radius: 10px;
}
.custom-scrollbar:hover::-webkit-scrollbar-thumb {
  background: rgba(8, 31, 92, 0.2);
}
</style>
