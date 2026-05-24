<template>
  <!-- Mobile Overlay -->
  <div 
    v-if="isMobileOpen" 
    class="fixed inset-0 bg-[#081F5C]/60 backdrop-blur-sm z-40 md:hidden transition-opacity"
    @click="isMobileOpen = false"
  ></div>

  <!-- Sidebar -->
  <aside 
    class="fixed md:relative inset-y-0 left-0 z-50 bg-[#081F5C] text-slate-300 flex flex-col transition-all duration-300 shadow-[4px_0_24px_rgba(8,31,92,0.1)] border-r border-white/5"
    :class="[
      isCollapsed ? 'w-20' : 'w-[280px]',
      isMobileOpen ? 'translate-x-0' : '-translate-x-full md:translate-x-0'
    ]"
  >
    <!-- Header / Branding -->
    <div class="h-16 flex items-center justify-between px-5 py-4 shrink-0 bg-[#081F5C] relative z-20">
      <div class="flex items-center gap-3 overflow-hidden whitespace-nowrap">
        <div class="w-9 h-9 bg-gradient-to-br from-[#334EAC] to-[#081F5C] rounded-xl flex items-center justify-center shrink-0 border border-white/20 shadow-inner">
          <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="white" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><rect width="18" height="18" x="3" y="3" rx="2" ry="2"/><line x1="3" x2="21" y1="9" y2="9"/><line x1="9" x2="9" y1="21" y2="9"/></svg>
        </div>
        <div v-if="!isCollapsed" class="flex flex-col transition-opacity duration-300" :class="isCollapsed ? 'opacity-0 hidden' : 'opacity-100'">
          <span class="text-lg font-bold text-white tracking-tight leading-none">FokusIn</span>
          <span class="text-[9px] text-[#BAD6EB] font-bold uppercase tracking-widest mt-0.5">Admin Workspace</span>
        </div>
      </div>
      
      <!-- Desktop Collapse Toggle -->
      <button 
        @click="isCollapsed = !isCollapsed" 
        class="hidden md:flex w-7 h-7 rounded-lg hover:bg-white/10 items-center justify-center text-[#BAD6EB] hover:text-white transition-colors"
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
    
    <!-- Separator -->
    <div class="h-px w-full bg-gradient-to-r from-transparent via-white/10 to-transparent"></div>
    
    <!-- Navigation -->
    <nav class="flex-1 overflow-y-auto py-6 px-3 custom-scrollbar space-y-6">
      <div v-for="(group, index) in menuGroups" :key="index">
        <div v-if="!isCollapsed" class="px-3 mb-2 flex items-center gap-2">
           <div class="h-px flex-1 bg-white/5"></div>
           <p class="text-[9px] font-extrabold text-[#7096D1] uppercase tracking-[0.2em] whitespace-nowrap">{{ group.title }}</p>
           <div class="h-px flex-1 bg-white/5"></div>
        </div>
        <ul class="space-y-1">
          <li v-for="item in group.items" :key="item.name" class="relative group">
            <RouterLink 
              :to="item.path" 
              class="flex items-center rounded-xl transition-all duration-300 relative overflow-hidden"
              :class="[
                isCollapsed ? 'justify-center p-3' : 'px-3 py-2.5',
                isActive(item.path) 
                  ? 'bg-[#334EAC]/20 text-white shadow-sm' 
                  : 'text-slate-400 hover:text-white hover:bg-white/5'
              ]"
              @click="isMobileOpen = false"
            >
              <!-- Active Indicator Line -->
              <div v-if="isActive(item.path) && !isCollapsed" class="absolute left-0 top-1/2 -translate-y-1/2 w-1 h-1/2 bg-[#7096D1] rounded-r-full shadow-[0_0_10px_rgba(112,150,209,0.8)]"></div>
              
              <div 
                class="shrink-0 transition-transform duration-300"
                :class="[
                  !isCollapsed && 'mr-3 ml-2',
                  isActive(item.path) ? 'scale-105 text-[#7096D1]' : 'group-hover:scale-110'
                ]"
                v-html="item.iconPath"
              ></div>
              <span v-if="!isCollapsed" class="font-bold text-[13px] whitespace-nowrap">{{ item.name }}</span>
              
              <span v-if="!isCollapsed && item.badge" class="ml-auto bg-rose-500/20 border border-rose-500/30 text-rose-300 text-[10px] font-extrabold px-1.5 py-0.5 rounded-md leading-none">
                {{ item.badge }}
              </span>
            </RouterLink>
            
            <!-- Tooltip -->
            <div v-if="isCollapsed" class="absolute left-full top-1/2 -translate-y-1/2 ml-3 px-3 py-1.5 bg-white text-[#081F5C] text-[11px] font-extrabold rounded-lg opacity-0 group-hover:opacity-100 pointer-events-none transition-opacity whitespace-nowrap z-50 shadow-xl flex items-center gap-2">
              {{ item.name }}
              <span v-if="item.badge" class="bg-rose-100 text-rose-600 px-1.5 rounded-md">{{ item.badge }}</span>
            </div>
          </li>
        </ul>
      </div>
    </nav>
    
    <!-- Bottom Profile Area -->
    <div class="p-4 mt-auto shrink-0 relative z-20 bg-gradient-to-t from-[#081F5C] via-[#081F5C] to-transparent pt-8">
      <div 
        class="bg-white/5 backdrop-blur-md rounded-2xl border border-white/10 overflow-hidden transition-all duration-300 hover:bg-white/10 hover:border-white/20 shadow-lg"
        :class="isCollapsed ? 'p-2 flex justify-center' : 'p-3'"
      >
        <div class="flex items-center gap-3">
          <div class="w-9 h-9 rounded-xl bg-gradient-to-br from-indigo-500 to-purple-600 shrink-0 flex items-center justify-center overflow-hidden shadow-inner">
            <span class="text-white font-extrabold text-[11px]">ADM</span>
          </div>
          <div v-if="!isCollapsed" class="flex-1 min-w-0">
            <p class="text-[13px] font-extrabold text-white truncate leading-tight">System Admin</p>
            <p class="text-[10px] text-slate-400 font-bold truncate flex items-center gap-1 mt-0.5">
              <span class="w-1.5 h-1.5 rounded-full bg-emerald-400 shadow-[0_0_8px_rgba(52,211,153,0.8)]"></span>
              All Systems Go
            </p>
          </div>
          <button v-if="!isCollapsed" @click="handleLogout" class="text-rose-400 hover:text-rose-300 p-1.5 rounded-lg transition-colors ml-auto" title="Keluar">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"/><polyline points="16 17 21 12 16 7"/><line x1="21" x2="9" y1="12" y2="12"/></svg>
          </button>
        </div>
        
        <!-- Logout button when collapsed -->
        <button @click="handleLogout" v-if="isCollapsed" class="mt-3 w-full flex items-center justify-center p-3 rounded-xl text-rose-400 hover:bg-white/5 hover:text-rose-300 transition-colors" title="Keluar">
          <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"/><polyline points="16 17 21 12 16 7"/><line x1="21" x2="9" y1="12" y2="12"/></svg>
        </button>
      </div>
    </div>
  </aside>

  <!-- Mobile Floating Menu Toggle -->
  <button 
    v-if="!isMobileOpen"
    @click="isMobileOpen = true"
    class="md:hidden fixed bottom-6 left-6 z-40 w-12 h-12 bg-[#081F5C] text-white rounded-xl shadow-2xl flex items-center justify-center hover:bg-[#334EAC] transition-transform active:scale-95 border border-white/20"
  >
    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><line x1="4" x2="20" y1="12" y2="12"/><line x1="4" x2="20" y1="6" y2="6"/><line x1="4" x2="20" y1="18" y2="18"/></svg>
  </button>
</template>

<script setup>
import { ref } from 'vue'
import { useRoute, RouterLink, useRouter } from 'vue-router'
import { useAuthStore } from '@/stores/auth'

const route = useRoute()
const router = useRouter()
const authStore = useAuthStore()

const isCollapsed = ref(false)
const isMobileOpen = ref(false)

const handleLogout = async () => {
  await authStore.logout()
  router.push('/auth/login')
}

const menuGroups = [
  {
    title: 'Platform Overview',
    items: [
      { name: 'Dashboard', path: '/admin/dashboard', iconPath: '<svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect width="7" height="9" x="3" y="3" rx="1"/><rect width="7" height="5" x="14" y="3" rx="1"/><rect width="7" height="9" x="14" y="12" rx="1"/><rect width="7" height="5" x="3" y="16" rx="1"/></svg>' },
      { name: 'Monitoring AI', path: '/admin/ai-monitoring', iconPath: '<svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="m12 3-1.912 5.813a2 2 0 0 1-1.275 1.275L3 12l5.813 1.912a2 2 0 0 1 1.275 1.275L12 21l1.912-5.813a2 2 0 0 1 1.275-1.275L21 12l-5.813-1.912a2 2 0 0 1-1.275-1.275L12 3Z"/></svg>' }
    ]
  },
  {
    title: 'User Management',
    items: [
      { name: 'Kelola Pelajar', path: '/admin/users', iconPath: '<svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M16 21v-2a4 4 0 0 0-4-4H6a4 4 0 0 0-4 4v2"/><circle cx="9" cy="7" r="4"/><path d="M22 21v-2a4 4 0 0 0-3-3.87"/><path d="M16 3.13a4 4 0 0 1 0 7.75"/></svg>' },
      { name: 'Kelola Tutor', path: '/admin/tutors', iconPath: '<svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M2 21a8 8 0 0 1 13.292-6"/><circle cx="10" cy="8" r="5"/><path d="m16 19 2 2 4-4"/></svg>' }
    ]
  },
  {
    title: 'Community Moderation',
    items: [
      { name: 'Laporan Forum', path: '/admin/reports', badge: '12', iconPath: '<svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="m21.73 18-8-14a2 2 0 0 0-3.48 0l-8 14A2 2 0 0 0 4 21h16a2 2 0 0 0 1.73-3Z"/><line x1="12" x2="12" y1="9" y2="13"/><line x1="12" x2="12.01" y1="17" y2="17"/></svg>' },
      { name: 'Moderasi Diskusi', path: '/admin/moderation', iconPath: '<svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="m3 21 1.9-5.7a8.5 8.5 0 1 1 3.8 3.8z"/></svg>' }
    ]
  },
  {
    title: 'Academic System',
    items: [
      { name: 'Arsip Materi', path: '/admin/materials', iconPath: '<svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M4 19.5v-15A2.5 2.5 0 0 1 6.5 2H20v20H6.5a2.5 2.5 0 0 1 0-5H20"/></svg>' },
      { name: 'Monitoring Mentoring', path: '/admin/mentoring', iconPath: '<svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect width="18" height="18" x="3" y="4" rx="2" ry="2"/><line x1="16" x2="16" y1="2" y2="6"/><line x1="8" x2="8" y1="2" y2="6"/><line x1="3" x2="21" y1="10" y2="10"/></svg>' },
      { name: 'Monitoring Quiz', path: '/admin/quiz-monitoring', iconPath: '<svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"/><path d="M9.09 9a3 3 0 0 1 5.83 1c0 2-3 3-3 3"/><line x1="12" x2="12.01" y1="17" y2="17"/></svg>' }
    ]
  },
  {
    title: 'Personal',
    items: [
      { name: 'Pengaturan Sistem', path: '/admin/settings', iconPath: '<svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M12.22 2h-.44a2 2 0 0 0-2 2v.18a2 2 0 0 1-1 1.73l-.43.25a2 2 0 0 1-2 0l-.15-.08a2 2 0 0 0-2.73.73l-.22.38a2 2 0 0 0 .73 2.73l.15.1a2 2 0 0 1 1 1.72v.51a2 2 0 0 1-1 1.74l-.15.09a2 2 0 0 0-.73 2.73l.22.38a2 2 0 0 0 2.73.73l.15-.08a2 2 0 0 1 2 0l.43.25a2 2 0 0 1 1 1.73V20a2 2 0 0 0 2 2h.44a2 2 0 0 0 2-2v-.18a2 2 0 0 1 1-1.73l.43-.25a2 2 0 0 1 2 0l.15.08a2 2 0 0 0 2.73-.73l.22-.39a2 2 0 0 0-.73-2.73l-.15-.08a2 2 0 0 1-1-1.74v-.5a2 2 0 0 1 1-1.74l.15-.09a2 2 0 0 0 .73-2.73l-.22-.38a2 2 0 0 0-2.73-.73l-.15.08a2 2 0 0 1-2 0l-.43-.25a2 2 0 0 1-1-1.73V4a2 2 0 0 0-2-2z"/><circle cx="12" cy="12" r="3"/></svg>' }
    ]
  }
]

const isActive = (path) => {
  if (!route) return false
  if (path === '/auth/login') return false
  return route.path === path || route.path.startsWith(path + '/')
}
</script>

<style scoped>
.custom-scrollbar::-webkit-scrollbar {
  width: 4px;
}
.custom-scrollbar::-webkit-scrollbar-track {
  background: transparent;
}
.custom-scrollbar::-webkit-scrollbar-thumb {
  background: rgba(255, 255, 255, 0.1);
  border-radius: 10px;
}
.custom-scrollbar:hover::-webkit-scrollbar-thumb {
  background: rgba(255, 255, 255, 0.2);
}
</style>
