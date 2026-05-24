<template>
  <!-- Mobile Overlay -->
  <div 
    v-if="isMobileOpen" 
    class="fixed inset-0 bg-[#081F5C]/40 backdrop-blur-sm z-40 md:hidden transition-opacity"
    @click="isMobileOpen = false"
  ></div>

  <!-- Sidebar -->
  <aside 
    class="fixed md:relative inset-y-0 left-0 z-50 bg-[#081F5C] text-slate-300 flex flex-col transition-all duration-300 shadow-[4px_0_24px_rgba(8,31,92,0.08)]"
    :class="[
      isCollapsed ? 'w-20' : 'w-64',
      isMobileOpen ? 'translate-x-0' : '-translate-x-full md:translate-x-0'
    ]"
  >
    <!-- Header / Branding -->
    <div class="h-16 flex items-center justify-between px-5 py-4 shrink-0 border-b border-white/5">
      <div class="flex items-center gap-3 overflow-hidden whitespace-nowrap">
        <div class="w-9 h-9 bg-white/10 backdrop-blur-md rounded-xl flex items-center justify-center shrink-0 border border-white/10">
          <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="white" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M13 10V3L4 14h7v7l9-11h-7z"/></svg>
        </div>
        <div v-if="!isCollapsed" class="flex flex-col transition-opacity duration-300" :class="isCollapsed ? 'opacity-0 hidden' : 'opacity-100'">
          <span class="text-lg font-bold text-white tracking-tight leading-none">FokusIn</span>
          <span class="text-[9px] text-[#BAD6EB] font-bold uppercase tracking-widest mt-0.5">AI Learning</span>
        </div>
      </div>
      
      <!-- Desktop Collapse Toggle -->
      <button 
        @click="isCollapsed = !isCollapsed" 
        class="hidden md:flex w-7 h-7 rounded-lg hover:bg-white/10 items-center justify-center text-[#BAD6EB] hover:text-white transition-colors"
        title="Toggle Sidebar"
      >
        <svg v-if="!isCollapsed" xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="m15 18-6-6 6-6"/></svg>
        <svg v-else xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="m9 18 6-6-6-6"/></svg>
      </button>

      <!-- Mobile Close Button -->
      <button 
        @click="isMobileOpen = false" 
        class="md:hidden w-7 h-7 rounded-lg hover:bg-white/10 flex items-center justify-center text-[#BAD6EB] hover:text-white transition-colors"
      >
        <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M18 6 6 18"/><path d="m6 6 12 12"/></svg>
      </button>
    </div>
    
    <!-- Navigation -->
    <nav class="flex-1 overflow-y-auto py-6 px-3 custom-scrollbar">
      <ul class="space-y-1.5">
        <li v-for="item in menuItems" :key="item.name" class="relative group">
          <RouterLink 
            :to="item.path" 
            class="flex items-center rounded-xl transition-all duration-200 group-hover:bg-[#7096D1]/10"
            :class="[
              isCollapsed ? 'justify-center p-3' : 'px-3.5 py-2.5',
              isActive(item.path) 
                ? 'bg-[#334EAC] text-white shadow-sm' 
                : 'text-[#BAD6EB] hover:text-white'
            ]"
            @click="isMobileOpen = false"
          >
            <svg 
              xmlns="http://www.w3.org/2000/svg" 
              width="20" 
              height="20" 
              viewBox="0 0 24 24" 
              fill="none" 
              stroke="currentColor" 
              stroke-width="2" 
              stroke-linecap="round" 
              stroke-linejoin="round" 
              class="shrink-0 transition-transform duration-300"
              :class="[
                !isCollapsed && 'mr-3',
                isActive(item.path) ? 'scale-105' : 'group-hover:scale-110'
              ]"
              v-html="item.iconPath"
            ></svg>
            <span v-if="!isCollapsed" class="font-medium text-[14px] whitespace-nowrap">{{ item.name }}</span>
          </RouterLink>
          
          <!-- Tooltip for collapsed state -->
          <div v-if="isCollapsed" class="absolute left-full top-1/2 -translate-y-1/2 ml-3 px-3 py-1.5 bg-[#081F5C] border border-white/10 text-white text-xs font-semibold rounded-lg opacity-0 group-hover:opacity-100 pointer-events-none transition-opacity whitespace-nowrap z-50 shadow-xl">
            {{ item.name }}
          </div>
        </li>
      </ul>
    </nav>
    
    <!-- Bottom Profile Section -->
    <div class="p-4 mt-auto border-t border-white/5 bg-[#081F5C]">
      <div 
        class="bg-white/5 rounded-2xl border border-white/10 overflow-hidden transition-all duration-300 hover:bg-white/10"
        :class="isCollapsed ? 'p-2 flex justify-center' : 'p-3'"
      >
        <div class="flex items-center gap-3">
          <!-- Avatar -->
          <div class="w-10 h-10 rounded-full bg-[#EDF1F6] border-2 border-[#7096D1] shrink-0 flex items-center justify-center overflow-hidden">
            <span class="text-[#081F5C] font-bold text-sm">JD</span>
          </div>
          <!-- Info -->
          <div v-if="!isCollapsed" class="flex-1 min-w-0">
            <p class="text-sm font-bold text-white truncate">{{ user?.name || 'Pelajar' }}</p>
            <p class="text-xs text-[#BAD6EB] font-medium truncate capitalize">{{ userRole }}</p>
          </div>
        </div>
        
        <!-- Action Buttons inside profile box (if expanded) -->
        <div v-if="!isCollapsed" class="mt-3 pt-3 border-t border-white/10 flex items-center justify-between">
          <div class="flex items-center gap-1 text-[10px] font-bold uppercase tracking-wider text-[#7096D1] bg-[#7096D1]/10 px-2 py-1 rounded-md">
            <svg xmlns="http://www.w3.org/2000/svg" width="10" height="10" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z"/></svg>
            Pro
          </div>
          <button @click="handleLogout" class="text-[#BAD6EB] hover:text-white hover:bg-white/10 p-1.5 rounded-lg transition-colors" title="Keluar">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"/><polyline points="16 17 21 12 16 7"/><line x1="21" x2="9" y1="12" y2="12"/></svg>
          </button>
        </div>
      </div>
      
      <!-- Logout button when collapsed -->
      <button @click="handleLogout" v-if="isCollapsed" class="mt-3 w-full flex items-center justify-center p-3 rounded-xl text-[#BAD6EB] hover:bg-white/10 hover:text-white transition-colors" title="Keluar">
        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"/><polyline points="16 17 21 12 16 7"/><line x1="21" x2="9" y1="12" y2="12"/></svg>
      </button>
    </div>
  </aside>

  <!-- Mobile Floating Menu Toggle -->
  <button 
    v-if="!isMobileOpen"
    @click="isMobileOpen = true"
    class="md:hidden fixed bottom-6 right-6 z-40 w-14 h-14 bg-[#334EAC] text-white rounded-full shadow-[0_8px_30px_rgba(51,78,172,0.4)] flex items-center justify-center hover:bg-[#7096D1] transition-transform active:scale-95 focus:outline-none border border-white/10"
  >
    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><line x1="4" x2="20" y1="12" y2="12"/><line x1="4" x2="20" y1="6" y2="6"/><line x1="4" x2="20" y1="18" y2="18"/></svg>
  </button>
</template>

<script setup>
import { ref, computed } from 'vue'
import { useRoute, useRouter } from 'vue-router'
import { useAuthStore } from '@/stores/auth'

const route = useRoute()
const router = useRouter()
const authStore = useAuthStore()

const isCollapsed = ref(false)
const isMobileOpen = ref(false)

const userRole = computed(() => authStore.role || 'pelajar')
const user = computed(() => authStore.user)

const handleLogout = async () => {
  await authStore.logout()
  router.push('/auth/login')
}

const menuItems = computed(() => [
  { name: 'Dashboard', path: `/${userRole.value}/dashboard`, iconPath: '<rect width="7" height="9" x="3" y="3" rx="1"/><rect width="7" height="5" x="14" y="3" rx="1"/><rect width="7" height="9" x="14" y="12" rx="1"/><rect width="7" height="5" x="3" y="16" rx="1"/>' },
  { name: 'Forum', path: `/${userRole.value}/forum`, iconPath: '<path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z"/>' },
  { name: 'Analisis AI', path: `/${userRole.value}/ai-analyzer`, iconPath: '<path d="m12 3-1.912 5.813a2 2 0 0 1-1.275 1.275L3 12l5.813 1.912a2 2 0 0 1 1.275 1.275L12 21l1.912-5.813a2 2 0 0 1 1.275-1.275L21 12l-5.813-1.912a2 2 0 0 1-1.275-1.275L12 3Z"/><path d="M5 3v4"/><path d="M19 17v4"/><path d="M3 5h4"/><path d="M17 19h4"/>' },
  { name: 'Materi', path: `/${userRole.value}/materials`, iconPath: '<path d="M2 3h6a4 4 0 0 1 4 4v14a3 3 0 0 0-3-3H2z"/><path d="M22 3h-6a4 4 0 0 0-4 4v14a3 3 0 0 1 3-3h7z"/>' },
  { name: 'Mentoring', path: `/${userRole.value}/mentoring`, iconPath: '<path d="M16 21v-2a4 4 0 0 0-4-4H6a4 4 0 0 0-4 4v2"/><circle cx="9" cy="7" r="4"/><path d="M22 21v-2a4 4 0 0 0-3-3.87"/><path d="M16 3.13a4 4 0 0 1 0 7.75"/>' },
  { name: 'Kuis', path: `/${userRole.value}/quiz`, iconPath: '<polyline points="9 11 12 14 22 4"/><path d="M21 12v7a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h11"/>' },
  { name: 'Profil', path: `/${userRole.value}/profile`, iconPath: '<path d="M19 21v-2a4 4 0 0 0-4-4H9a4 4 0 0 0-4 4v2"/><circle cx="12" cy="7" r="4"/>' }
])

// Determine if the current route matches the navigation item
const isActive = (path) => {
  if (!route) return false
  return route.path === path || route.path.startsWith(path + '/')
}
</script>

<style scoped>
/* Sleek custom scrollbar */
.custom-scrollbar::-webkit-scrollbar {
  width: 3px;
}
.custom-scrollbar::-webkit-scrollbar-track {
  background: transparent;
}
.custom-scrollbar::-webkit-scrollbar-thumb {
  background: rgba(186, 214, 235, 0.1);
  border-radius: 10px;
}
.custom-scrollbar:hover::-webkit-scrollbar-thumb {
  background: rgba(186, 214, 235, 0.3);
}
</style>
