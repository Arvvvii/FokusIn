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
      isCollapsed ? 'w-20' : 'w-64',
      isMobileOpen ? 'translate-x-0' : '-translate-x-full md:translate-x-0'
    ]"
  >
    <!-- Header / Branding -->
    <div class="h-16 flex items-center justify-between px-5 py-4 shrink-0 border-b border-white/10 bg-[#081F5C]">
      <div class="flex items-center gap-3 overflow-hidden whitespace-nowrap">
        <div class="w-9 h-9 bg-gradient-to-br from-[#334EAC] to-[#081F5C] rounded-xl flex items-center justify-center shrink-0 border border-white/20 shadow-inner">
          <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="white" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z"/></svg>
        </div>
        <div v-if="!isCollapsed" class="flex flex-col transition-opacity duration-300" :class="isCollapsed ? 'opacity-0 hidden' : 'opacity-100'">
          <span class="text-lg font-bold text-white tracking-tight leading-none">FokusIn</span>
          <span class="text-[9px] text-[#BAD6EB] font-bold uppercase tracking-widest mt-0.5">Educator</span>
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
    <nav class="flex-1 overflow-y-auto py-6 px-3 custom-scrollbar space-y-6">
      <div v-for="(group, index) in menuGroups" :key="index">
        <div v-if="!isCollapsed" class="px-3 mb-2">
           <p class="text-[10px] font-bold text-slate-400 uppercase tracking-widest">{{ group.title }}</p>
        </div>
        <ul class="space-y-1.5">
          <li v-for="item in group.items" :key="item.name" class="relative group">
            <RouterLink 
              :to="item.path" 
              class="flex items-center rounded-xl transition-all duration-200"
              :class="[
                isCollapsed ? 'justify-center p-3' : 'px-3.5 py-2.5',
                isActive(item.path) 
                  ? (item.isHighlighted ? 'bg-gradient-to-r from-indigo-500 to-indigo-600 text-white shadow-md border border-indigo-400/30' : 'bg-gradient-to-r from-[#334EAC] to-[#334EAC]/80 text-white shadow-sm border border-[#7096D1]/20') 
                  : (item.isHighlighted ? 'text-indigo-300 hover:bg-indigo-500/10 hover:text-indigo-200 border border-transparent hover:border-indigo-500/20' : 'text-[#BAD6EB] group-hover:bg-[#7096D1]/10 hover:text-white border border-transparent')
              ]"
              @click="isMobileOpen = false"
            >
              <svg 
                xmlns="http://www.w3.org/2000/svg" 
                width="18" 
                height="18" 
                viewBox="0 0 24 24" 
                fill="none" 
                stroke="currentColor" 
                stroke-width="2.2" 
                stroke-linecap="round" 
                stroke-linejoin="round" 
                class="shrink-0 transition-transform duration-300"
                :class="[
                  !isCollapsed && 'mr-3',
                  isActive(item.path) ? 'scale-105 text-white' : (item.isHighlighted ? 'group-hover:scale-110 text-indigo-400' : 'group-hover:scale-110 text-[#7096D1]')
                ]"
                v-html="item.iconPath"
              ></svg>
              <span v-if="!isCollapsed" class="font-bold text-[13px] whitespace-nowrap">{{ item.name }}</span>
              
              <!-- Notification Badge if needed -->
              <span v-if="!isCollapsed && item.badge" class="ml-auto bg-rose-500 text-white text-[10px] font-extrabold px-1.5 py-0.5 rounded-md leading-none shadow-sm">
                {{ item.badge }}
              </span>
            </RouterLink>
            
            <!-- Tooltip for collapsed state -->
            <div v-if="isCollapsed" class="absolute left-full top-1/2 -translate-y-1/2 ml-3 px-3 py-1.5 bg-[#081F5C] border border-white/10 text-white text-xs font-semibold rounded-lg opacity-0 group-hover:opacity-100 pointer-events-none transition-opacity whitespace-nowrap z-50 shadow-xl flex items-center gap-2">
              {{ item.name }}
              <span v-if="item.badge" class="bg-rose-500 text-white text-[10px] px-1.5 rounded-md">{{ item.badge }}</span>
            </div>
          </li>
        </ul>
      </div>
    </nav>
    
    <!-- Bottom Profile Section -->
    <div class="p-4 mt-auto border-t border-white/10 bg-[#081F5C] shrink-0">
      <div 
        class="bg-[#334EAC]/20 rounded-2xl border border-[#7096D1]/20 overflow-hidden transition-all duration-300 hover:bg-[#334EAC]/30"
        :class="isCollapsed ? 'p-2 flex justify-center' : 'p-3'"
      >
        <div class="flex items-center gap-3">
          <!-- Avatar -->
          <div class="w-10 h-10 rounded-xl bg-gradient-to-br from-[#7096D1] to-[#334EAC] border-2 border-white/10 shrink-0 flex items-center justify-center overflow-hidden shadow-sm">
            <span class="text-white font-bold text-sm">SR</span>
          </div>
          <!-- Info -->
          <div v-if="!isCollapsed" class="flex-1 min-w-0">
            <p class="text-sm font-extrabold text-white truncate leading-tight">{{ user?.name || 'Dr. Sarah R.' }}</p>
            <p class="text-[11px] text-[#BAD6EB] font-bold truncate tracking-wide flex items-center gap-1 mt-0.5">
              <span class="w-1.5 h-1.5 rounded-full bg-emerald-400"></span>
              Tutor Aktif
            </p>
          </div>
        </div>
        
        <!-- Action Buttons inside profile box (if expanded) -->
        <div v-if="!isCollapsed" class="mt-3 pt-3 border-t border-white/10 flex items-center justify-between">
          <RouterLink to="/tutor/settings" class="flex items-center gap-1.5 text-[11px] font-bold text-[#BAD6EB] hover:text-white transition-colors">
            <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M12.22 2h-.44a2 2 0 0 0-2 2v.18a2 2 0 0 1-1 1.73l-.43.25a2 2 0 0 1-2 0l-.15-.08a2 2 0 0 0-2.73.73l-.22.38a2 2 0 0 0 .73 2.73l.15.1a2 2 0 0 1 1 1.72v.51a2 2 0 0 1-1 1.74l-.15.09a2 2 0 0 0-.73 2.73l.22.38a2 2 0 0 0 2.73.73l.15-.08a2 2 0 0 1 2 0l.43.25a2 2 0 0 1 1 1.73V20a2 2 0 0 0 2 2h.44a2 2 0 0 0 2-2v-.18a2 2 0 0 1 1-1.73l.43-.25a2 2 0 0 1 2 0l.15.08a2 2 0 0 0 2.73-.73l.22-.39a2 2 0 0 0-.73-2.73l-.15-.08a2 2 0 0 1-1-1.74v-.5a2 2 0 0 1 1-1.74l.15-.09a2 2 0 0 0 .73-2.73l-.22-.38a2 2 0 0 0-2.73-.73l-.15.08a2 2 0 0 1-2 0l-.43-.25a2 2 0 0 1-1-1.73V4a2 2 0 0 0-2-2z"/><circle cx="12" cy="12" r="3"/></svg>
            Pengaturan
          </RouterLink>
          <button @click="handleLogout" class="text-rose-400 hover:text-rose-300 p-1 rounded-lg transition-colors" title="Keluar">
            <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"/><polyline points="16 17 21 12 16 7"/><line x1="21" x2="9" y1="12" y2="12"/></svg>
          </button>
        </div>
      </div>
      
      <!-- Logout button when collapsed -->
      <button @click="handleLogout" v-if="isCollapsed" class="mt-3 w-full flex items-center justify-center p-3 rounded-xl text-rose-400 hover:bg-white/5 hover:text-rose-300 transition-colors border border-transparent hover:border-rose-500/20" title="Keluar">
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

const user = computed(() => authStore.user)

const handleLogout = async () => {
  await authStore.logout()
  router.push('/auth/login')
}



const menuGroups = [
  {
    title: 'Mentor Workspace',
    items: [
      { name: 'Dashboard', path: `/tutor/dashboard`, iconPath: '<rect width="7" height="9" x="3" y="3" rx="1"/><rect width="7" height="5" x="14" y="3" rx="1"/><rect width="7" height="9" x="14" y="12" rx="1"/><rect width="7" height="5" x="3" y="16" rx="1"/>' },
      { name: 'Verifikasi Jawaban', path: `/tutor/verify-answer`, badge: '12', iconPath: '<path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"/><polyline points="22 4 12 14.01 9 11.01"/>' },
      { name: 'Kelola Mentoring', path: `/tutor/mentoring`, iconPath: '<path d="M16 21v-2a4 4 0 0 0-4-4H6a4 4 0 0 0-4 4v2"/><circle cx="9" cy="7" r="4"/><path d="M22 21v-2a4 4 0 0 0-3-3.87"/><path d="M16 3.13a4 4 0 0 1 0 7.75"/>' }
    ]
  },
  {
    title: 'Academic Contribution',
    items: [
      { name: 'Forum Akademik', path: `/tutor/forum`, iconPath: '<path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z"/>' },
      { name: 'Review Materi', path: `/tutor/materials`, iconPath: '<path d="M2 3h6a4 4 0 0 1 4 4v14a3 3 0 0 0-3-3H2z"/><path d="M22 3h-6a4 4 0 0 0-4 4v14a3 3 0 0 1 3-3h7z"/>' },
      { name: 'Upload Arsip Soal', path: `/tutor/upload-exam`, isHighlighted: true, iconPath: '<path d="M14 2v4a2 2 0 0 0 2 2h4"/><path d="M10.4 12.6a2 2 0 1 1 3 3L8 21l-4 1 1-4Z"/><path d="M20 18.5a2 2 0 1 0-4-4"/>' },
      { name: 'AI Validation', path: `/tutor/ai-validation`, isHighlighted: true, iconPath: '<path d="m12 3-1.912 5.813a2 2 0 0 1-1.275 1.275L3 12l5.813 1.912a2 2 0 0 1 1.275 1.275L12 21l1.912-5.813a2 2 0 0 1 1.275-1.275L21 12l-5.813-1.912a2 2 0 0 1-1.275-1.275L12 3Z"/>' }
    ]
  },
  {
    title: 'Personal',
    items: [
      { name: 'Profil Tutor', path: `/tutor/profile`, iconPath: '<path d="M19 21v-2a4 4 0 0 0-4-4H9a4 4 0 0 0-4 4v2"/><circle cx="12" cy="7" r="4"/>' }
    ]
  }
]

const isActive = (path) => {
  if (!route) return false
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
  background: rgba(186, 214, 235, 0.15);
  border-radius: 10px;
}
.custom-scrollbar:hover::-webkit-scrollbar-thumb {
  background: rgba(186, 214, 235, 0.3);
}
</style>
