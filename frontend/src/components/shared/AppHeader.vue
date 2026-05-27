<template>
  <header class="topbar h-[72px] flex items-center justify-between px-5 lg:px-8 shrink-0 transition-all">
    
    <!-- Left Section: Search & Breadcrumb -->
    <div class="flex items-center gap-4 flex-1">
      
      <!-- Mobile Search Icon (Instead of Hamburger, since Sidebar has FAB) -->
      <button class="md:hidden p-2 -ml-2 text-slate-400 hover:text-[#081F5C] hover:bg-slate-100 rounded-lg transition-colors focus:outline-none">
        <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><circle cx="11" cy="11" r="8"/><path d="m21 21-4.3-4.3"/></svg>
      </button>

      <!-- Academic Breadcrumb -->
      <div class="academic-breadcrumb hidden xl:flex rounded-full border border-slate-200/50 shrink-0">
        <span class="breadcrumb-faculty">Teknik Vokasi</span>
        <span class="breadcrumb-sep">›</span>
        <span class="breadcrumb-semester">Semester 4</span>
        <span class="breadcrumb-sep">›</span>
        <span class="breadcrumb-current">{{ $route.name || 'Dashboard' }}</span>
      </div>

      <!-- Search Bar (Desktop) -->
      <div class="hidden md:flex relative w-full max-w-md group">
        <div class="absolute inset-y-0 left-0 pl-3.5 flex items-center pointer-events-none text-slate-400 group-focus-within:text-[#334EAC] transition-colors">
          <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><circle cx="11" cy="11" r="8"/><path d="m21 21-4.3-4.3"/></svg>
        </div>
        <input 
          type="text" 
          class="topbar-search w-full pl-10 pr-16 py-2.5 text-[14px] text-slate-800 placeholder-slate-400 focus:outline-none transition-all" 
          placeholder="Cari diskusi, materi, atau mentor..."
        >
        <div class="absolute inset-y-0 right-0 pr-3 flex items-center pointer-events-none">
          <span class="text-[10px] font-bold text-slate-400 border border-slate-200/80 rounded-[4px] px-1.5 py-0.5 bg-white shadow-sm tracking-widest leading-none">⌘K</span>
        </div>
      </div>
    </div>

    <!-- Right Section: Actions & Profile -->
    <div class="flex items-center gap-3 sm:gap-4 ml-4">
      
      <!-- AI Assistant Button -->
      <RouterLink to="/pelajar/ai-analyzer" class="hidden sm:flex items-center gap-2 px-4 py-2.5 btn-tanya-ai text-white rounded-xl font-bold text-sm active:scale-95">
        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="m12 3-1.912 5.813a2 2 0 0 1-1.275 1.275L3 12l5.813 1.912a2 2 0 0 1 1.275 1.275L12 21l1.912-5.813a2 2 0 0 1 1.275-1.275L21 12l-5.813-1.912a2 2 0 0 1-1.275-1.275L12 3Z"/><path d="M5 3v4"/><path d="M19 17v4"/><path d="M3 5h4"/><path d="M17 19h4"/></svg>
        Tanya AI
      </RouterLink>

      <!-- Notification -->
      <div class="relative">
        <button @click="showNotif = !showNotif" class="relative p-2.5 text-slate-400 hover:text-[#081F5C] hover:bg-[#EDF1F6] rounded-xl transition-colors focus:outline-none">
          <span class="absolute top-[9px] right-[10px] w-2 h-2 bg-rose-500 rounded-full ring-2 ring-white z-10"></span>
          <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M6 8a6 6 0 0 1 12 0c0 7 3 9 3 9H3s3-2 3-9"/><path d="M10.3 21a1.94 1.94 0 0 0 3.4 0"/></svg>
        </button>
        <!-- Notif Popover -->
        <div v-if="showNotif" class="absolute right-0 mt-2 w-80 bg-white rounded-2xl shadow-xl border border-slate-100 overflow-hidden z-50 animate-in slide-in-from-top-2">
          <div class="px-4 py-3 border-b border-slate-100 flex justify-between items-center bg-slate-50/50">
            <span class="font-bold text-[#081F5C] text-sm">Notifikasi</span>
            <span class="text-xs font-bold text-[#334EAC] bg-[#334EAC]/10 px-2 py-0.5 rounded-md">2 Baru</span>
          </div>
          <div class="p-2">
            <div class="p-3 hover:bg-slate-50 rounded-xl cursor-pointer transition-colors flex gap-3">
              <div class="w-8 h-8 rounded-full bg-emerald-100 text-emerald-600 flex items-center justify-center shrink-0">
                <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><polyline points="20 6 9 17 4 12"/></svg>
              </div>
              <div>
                <p class="text-sm font-bold text-[#081F5C] mb-0.5">Analisis AI Selesai</p>
                <p class="text-xs text-slate-500">Hasil analisis "Fisika Dasar 1" sudah siap dilihat.</p>
                <p class="text-[10px] font-bold text-slate-400 mt-1">Baru saja</p>
              </div>
            </div>
            <div class="p-3 hover:bg-slate-50 rounded-xl cursor-pointer transition-colors flex gap-3">
              <div class="w-8 h-8 rounded-full bg-amber-100 text-amber-600 flex items-center justify-center shrink-0">
                <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"/><polyline points="12 6 12 12 16 14"/></svg>
              </div>
              <div>
                <p class="text-sm font-bold text-[#081F5C] mb-0.5">Pengingat Mentoring</p>
                <p class="text-xs text-slate-500">Sesi dengan Dr. Sarah dimulai dalam 1 jam.</p>
                <p class="text-[10px] font-bold text-slate-400 mt-1">1 jam yang lalu</p>
              </div>
            </div>
          </div>
          <RouterLink to="/pelajar/notifications" @click="showNotif = false" class="block text-center py-2 text-xs font-bold text-[#334EAC] hover:bg-slate-50 border-t border-slate-100 transition-colors">Lihat Semua</RouterLink>
        </div>
      </div>
      
      <!-- Divider -->
      <div class="h-6 w-px bg-slate-200 hidden sm:block"></div>

      <!-- User Profile Dropdown Toggle -->
      <div class="relative">
        <button @click="showProfile = !showProfile" class="flex items-center gap-3 p-1 pr-2 hover:bg-[#EDF1F6] rounded-xl transition-colors focus:outline-none border border-transparent hover:border-slate-200/50">
          <div class="w-9 h-9 rounded-full bg-[#EDF1F6] border-2 border-white shadow-sm shrink-0 flex items-center justify-center overflow-hidden">
            <span class="text-[#081F5C] font-bold text-sm">JD</span>
          </div>
          <div class="hidden lg:flex items-center gap-2">
            <span class="text-sm font-bold text-slate-700">John Doe</span>
            <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round" class="text-slate-400"><path d="m6 9 6 6 6-6"/></svg>
          </div>
        </button>
        <!-- Profile Dropdown -->
        <div v-if="showProfile" class="absolute right-0 mt-2 w-56 bg-white rounded-2xl shadow-xl border border-slate-100 overflow-hidden z-50 animate-in slide-in-from-top-2">
          <div class="p-2 border-b border-slate-100">
            <p class="px-3 py-1 text-xs font-bold text-slate-400 uppercase tracking-widest">Akun Saya</p>
            <RouterLink to="/pelajar/profile" @click="showProfile = false" class="flex items-center gap-3 px-3 py-2 text-sm font-bold text-[#081F5C] hover:bg-slate-50 rounded-xl transition-colors">
              <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" class="text-slate-400"><path d="M19 21v-2a4 4 0 0 0-4-4H9a4 4 0 0 0-4 4v2"/><circle cx="12" cy="7" r="4"/></svg>
              Profil Akademik
            </RouterLink>
            <RouterLink to="/pelajar/profile/edit" @click="showProfile = false" class="flex items-center gap-3 px-3 py-2 text-sm font-bold text-[#081F5C] hover:bg-slate-50 rounded-xl transition-colors">
              <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" class="text-slate-400"><path d="M12.22 2h-.44a2 2 0 0 0-2 2v.18a2 2 0 0 1-1 1.73l-.43.25a2 2 0 0 1-2 0l-.15-.08a2 2 0 0 0-2.73.73l-.22.38a2 2 0 0 0 .73 2.73l.15.1a2 2 0 0 1 1 1.72v.51a2 2 0 0 1-1 1.74l-.15.09a2 2 0 0 0-.73 2.73l.22.38a2 2 0 0 0 2.73.73l.15-.08a2 2 0 0 1 2 0l.43.25a2 2 0 0 1 1 1.73V20a2 2 0 0 0 2 2h.44a2 2 0 0 0 2-2v-.18a2 2 0 0 1 1-1.73l.43-.25a2 2 0 0 1 2 0l.15.08a2 2 0 0 0 2.73-.73l.22-.39a2 2 0 0 0-.73-2.73l-.15-.08a2 2 0 0 1-1-1.74v-.5a2 2 0 0 1 1-1.74l.15-.09a2 2 0 0 0 .73-2.73l-.22-.38a2 2 0 0 0-2.73-.73l-.15.08a2 2 0 0 1-2 0l-.43-.25a2 2 0 0 1-1-1.73V4a2 2 0 0 0-2-2z"/><circle cx="12" cy="12" r="3"/></svg>
              Pengaturan
            </RouterLink>
          </div>
          <div class="p-2">
            <RouterLink to="/pelajar/help" @click="showProfile = false" class="w-full flex items-center gap-3 px-3 py-2 text-sm font-bold text-[#081F5C] hover:bg-slate-50 rounded-xl transition-colors text-left">
              <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" class="text-slate-400"><circle cx="12" cy="12" r="10"/><path d="M9.09 9a3 3 0 0 1 5.83 1c0 2-3 3-3 3"/><path d="M12 17h.01"/></svg>
              Bantuan & Dukungan
            </RouterLink>
            <button @click="handleLogout" class="w-full flex items-center gap-3 px-3 py-2 text-sm font-bold text-rose-600 hover:bg-rose-50 rounded-xl transition-colors text-left">
              <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" class="text-rose-400"><path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"/><polyline points="16 17 21 12 16 7"/><line x1="21" x2="9" y1="12" y2="12"/></svg>
              Keluar
            </button>
          </div>
        </div>
      </div>
      
    </div>

    <!-- Simple Coming Soon Modal/Toast -->
    <div v-if="showComingSoon" class="fixed bottom-6 right-6 bg-[#081F5C] text-white px-6 py-4 rounded-2xl shadow-2xl flex items-center gap-4 z-50 animate-in slide-in-from-bottom-5">
      <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="text-[#BAD6EB]"><path d="M12 2v20"/><path d="M17 5H9.5a3.5 3.5 0 0 0 0 7h5a3.5 3.5 0 0 1 0 7H6"/></svg>
      <div>
        <p class="font-bold text-sm">Fitur Segera Hadir</p>
        <p class="text-xs text-[#BAD6EB]">Pusat bantuan sedang dalam pengembangan.</p>
      </div>
      <button @click="showComingSoon = false" class="ml-2 text-white/50 hover:text-white transition-colors">
        <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M18 6 6 18"/><path d="m6 6 12 12"/></svg>
      </button>
    </div>
  </header>
</template>

<script setup>
import { ref } from 'vue'
import { RouterLink, useRouter } from 'vue-router'
import { useAuthStore } from '@/stores/auth'

const router = useRouter()
const authStore = useAuthStore()

const handleLogout = async () => {
  await authStore.logout()
  router.push('/auth/login')
}

const showNotif = ref(false)
const showProfile = ref(false)
const showComingSoon = ref(false)
</script>
