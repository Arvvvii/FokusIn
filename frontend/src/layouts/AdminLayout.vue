<template>
  <div class="flex h-screen w-full bg-[#F7F2EB] font-sans overflow-hidden relative text-slate-900 selection:bg-[#BAD6EB]/40">
    <!-- Global Atmospheric Background System -->
    <div class="absolute inset-0 z-0 pointer-events-none overflow-hidden">
      <!-- Ultra Subtle Grid Texture -->
      <div class="absolute inset-0 bg-[url('data:image/svg+xml;base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHdpZHRoPSI2MCIgaGVpZ2h0PSI2MCI+CjxwYXRoIGQ9Ik0wIDBoNjB2NjBIMHoiIGZpbGw9Im5vbmUiLz4KPHBhdGggZD0iTTAgNjBoNjBWMHoiIGZpbGw9Im5vbmUiIHN0cm9rZT0iIzA4MUY1QyIgc3Ryb2tlLW9wYWNpdHk9IjAuMDMiIHN0cm9rZS13aWR0aD0iMSIvPgo8L3N2Zz4=')] opacity-50 [mask-image:linear-gradient(to_bottom,white,transparent_80%)]"></div>
      
      <!-- Environmental Lighting -->
      <div class="absolute -top-[20%] -left-[10%] w-[70vw] h-[70vw] max-w-[1000px] max-h-[1000px] bg-gradient-to-br from-[#D0E3FF]/60 via-[#BAD6EB]/10 to-transparent rounded-full blur-[120px] opacity-80 mix-blend-multiply"></div>
      <div class="absolute top-[30%] -right-[15%] w-[60vw] h-[60vw] max-w-[900px] max-h-[900px] bg-gradient-to-bl from-[#7096D1]/20 via-[#334EAC]/5 to-transparent rounded-full blur-[150px] opacity-70"></div>
      <div class="absolute top-1/4 left-1/4 w-[50vw] h-[50vw] bg-gradient-to-tr from-transparent via-white/50 to-transparent rounded-full blur-[100px]"></div>
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
