<template>
  <header class="admin-topbar flex items-center justify-between px-4 sm:px-6 lg:px-8">
    
    <!-- LEFT: Search -->
    <div class="flex-1 flex items-center max-w-md">
      <div class="relative w-full group">
        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none text-slate-400 group-focus-within:text-[#334EAC] transition-colors">
          <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><circle cx="11" cy="11" r="8"/><path d="m21 21-4.3-4.3"/></svg>
        </div>
        <input 
          type="text" 
          class="w-full pl-10 pr-4 py-2 bg-slate-50/50 border border-slate-200 rounded-xl text-[13px] font-bold text-slate-700 placeholder-slate-400 focus:outline-none focus:bg-white focus:border-[#7096D1] focus:ring-4 focus:ring-[#7096D1]/10 transition-all" 
          placeholder="Cari user, laporan, atau topik..."
        >
        <div class="absolute inset-y-0 right-0 pr-2 hidden sm:flex items-center pointer-events-none">
          <span class="px-1.5 py-0.5 bg-slate-100 border border-slate-200 rounded text-[9px] font-bold text-slate-400">Ctrl K</span>
        </div>
      </div>
    </div>

    <!-- RIGHT: Actions & Profile -->
    <div class="flex items-center gap-3 sm:gap-4 shrink-0 ml-4">
      
      <!-- Analytics -->
      <RouterLink to="/admin/analytics" class="pill-analytics hidden lg:flex" :class="[ isActive('/admin/analytics') ? 'active' : '' ]">
        <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><line x1="18" x2="18" y1="20" y2="10"/><line x1="12" x2="12" y1="20" y2="4"/><line x1="6" x2="6" y1="20" y2="14"/></svg>
        Analytics
      </RouterLink>

      <!-- Moderation Queue -->
      <RouterLink to="/admin/moderation" class="pill-moderation hidden lg:flex" :class="[ isActive('/admin/moderation') ? 'active' : '' ]">
        <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="m21.73 18-8-14a2 2 0 0 0-3.48 0l-8 14A2 2 0 0 0 4 21h16a2 2 0 0 0 1.73-3Z"/><line x1="12" x2="12" y1="9" y2="13"/><line x1="12" x2="12.01" y1="17" y2="17"/></svg>
        Moderation
      </RouterLink>

      <!-- AI Status -->
      <RouterLink to="/admin/ai-monitoring" class="pill-ai-monitoring hidden md:flex">
        <span class="live-dot"></span>
        AI MONITORING ACTIVE
      </RouterLink>

      <div class="w-px h-6 bg-slate-200 hidden sm:block"></div>

      <!-- Notifications -->
      <RouterLink to="/admin/reports" class="relative p-2 text-slate-400 hover:text-[#081F5C] hover:bg-slate-100 rounded-xl transition-all">
        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round"><path d="M6 8a6 6 0 0 1 12 0c0 7 3 9 3 9H3s3-2 3-9"/><path d="M10.3 21a1.94 1.94 0 0 0 3.4 0"/></svg>
        <!-- Notification indicator -->
        <div class="absolute top-1.5 right-1.5 flex items-center justify-center">
          <span class="absolute w-2.5 h-2.5 bg-rose-500 rounded-full animate-ping opacity-75"></span>
          <span class="relative w-2.5 h-2.5 bg-rose-500 border-2 border-white rounded-full"></span>
        </div>
      </RouterLink>
      
      <!-- Profile Dropdown Toggle -->
      <div class="relative">
        <button @click="showProfile = !showProfile" class="w-8 h-8 rounded-full bg-gradient-to-br from-[#334EAC] to-[#7096D1] text-white flex items-center justify-center font-extrabold text-[10px] shadow-sm ml-1 hover:ring-4 hover:ring-[#334EAC]/20 transition-all cursor-pointer focus:outline-none">
          ADM
        </button>
        <!-- Dropdown Menu -->
        <div v-if="showProfile" class="absolute right-0 mt-2 w-56 bg-white rounded-2xl shadow-xl border border-slate-100 overflow-hidden z-50 animate-in slide-in-from-top-2">
          <div class="p-2 border-b border-slate-100">
            <p class="px-3 py-1 text-xs font-bold text-slate-400 uppercase tracking-widest">Admin Control</p>
            <RouterLink to="/admin/profile" @click="showProfile = false" class="flex items-center gap-3 px-3 py-2 text-sm font-bold text-[#081F5C] hover:bg-slate-50 rounded-xl transition-colors">
              <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" class="text-slate-400"><path d="M19 21v-2a4 4 0 0 0-4-4H9a4 4 0 0 0-4 4v2"/><circle cx="12" cy="7" r="4"/></svg>
              Profil Admin
            </RouterLink>
            <RouterLink to="/admin/settings" @click="showProfile = false" class="flex items-center gap-3 px-3 py-2 text-sm font-bold text-[#081F5C] hover:bg-slate-50 rounded-xl transition-colors">
              <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" class="text-slate-400"><path d="M12.22 2h-.44a2 2 0 0 0-2 2v.18a2 2 0 0 1-1 1.73l-.43.25a2 2 0 0 1-2 0l-.15-.08a2 2 0 0 0-2.73.73l-.22.38a2 2 0 0 0 .73 2.73l.15.1a2 2 0 0 1 1 1.72v.51a2 2 0 0 1-1 1.74l-.15.09a2 2 0 0 0-.73 2.73l.22.38a2 2 0 0 0 2.73.73l.15-.08a2 2 0 0 1 2 0l.43.25a2 2 0 0 1 1 1.73V20a2 2 0 0 0 2 2h.44a2 2 0 0 0 2-2v-.18a2 2 0 0 1 1-1.73l.43-.25a2 2 0 0 1 2 0l.15.08a2 2 0 0 0 2.73-.73l.22-.39a2 2 0 0 0-.73-2.73l-.15-.08a2 2 0 0 1-1-1.74v-.5a2 2 0 0 1 1-1.74l.15-.09a2 2 0 0 0 .73-2.73l-.22-.38a2 2 0 0 0-2.73-.73l-.15.08a2 2 0 0 1-2 0l-.43-.25a2 2 0 0 1-1-1.73V4a2 2 0 0 0-2-2z"/><circle cx="12" cy="12" r="3"/></svg>
              Pengaturan Sistem
            </RouterLink>
          </div>
          <div class="p-2">
            <button @click="handleLogout" class="w-full flex items-center gap-3 px-3 py-2 text-sm font-bold text-rose-600 hover:bg-rose-50 rounded-xl transition-colors text-left">
              <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" class="text-rose-400"><path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"/><polyline points="16 17 21 12 16 7"/><line x1="21" x2="9" y1="12" y2="12"/></svg>
              Keluar
            </button>
          </div>
        </div>
      </div>

    </div>
  </header>
</template>

<script setup>
import { ref } from 'vue'
import { useRoute, RouterLink, useRouter } from 'vue-router'
import { useAuthStore } from '@/stores/auth'

const route = useRoute()
const router = useRouter()
const authStore = useAuthStore()
const showProfile = ref(false)

const isActive = (path) => {
  if (!route) return false
  return route.path === path || route.path.startsWith(path + '/')
}

const handleLogout = async () => {
  await authStore.logout()
  router.push('/auth/login')
}
</script>
