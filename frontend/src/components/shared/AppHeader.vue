<template>
  <header class="topbar h-[72px] flex items-center justify-between px-4 sm:px-5 lg:px-8 shrink-0 transition-all">
    
    <!-- Left Section: Search & Breadcrumb -->
    <div class="flex items-center gap-2 sm:gap-4 flex-1 min-w-0">
      
      <!-- Mobile Search Icon (Instead of Hamburger, since Sidebar has FAB) -->
      <button @click="isMobileSearchOpen = !isMobileSearchOpen" class="md:hidden p-2 -ml-2 text-slate-400 hover:text-[#081F5C] hover:bg-slate-100 rounded-lg transition-colors focus:outline-none shrink-0" aria-label="Cari">
        <svg v-if="!isMobileSearchOpen" xmlns="http://www.w3.org/2000/svg" width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><circle cx="11" cy="11" r="8"/><path d="m21 21-4.3-4.3"/></svg>
        <svg v-else xmlns="http://www.w3.org/2000/svg" width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><line x1="18" y1="6" x2="6" y2="18"/><line x1="6" y1="6" x2="18" y2="18"/></svg>
      </button>

      <!-- Mobile Search Bar (Only shown on mobile when activated) -->
      <div v-if="isMobileSearchOpen" class="flex md:hidden relative w-full min-w-0 group animate-in fade-in duration-200">
        <input 
          type="text" 
          class="topbar-search w-full pl-4 pr-10 py-1.5 text-[13px] text-slate-800 placeholder-slate-400 focus:outline-none transition-all" 
          placeholder="Cari diskusi, materi, mentor..."
        >
      </div>

      <!-- Academic Breadcrumb -->
      <div v-if="!isMobileSearchOpen" class="academic-breadcrumb hidden xl:flex rounded-full border border-slate-200/50 shrink-0">
        <span class="breadcrumb-faculty">Teknik Vokasi</span>
        <span class="breadcrumb-sep">›</span>
        <span class="breadcrumb-semester">Semester 4</span>
        <span class="breadcrumb-sep">›</span>
        <span class="breadcrumb-current">{{ $route.name || 'Dashboard' }}</span>
      </div>

      <!-- Search Bar (Desktop - responsive max-w to avoid overlap on md/lg screens) -->
      <div class="hidden md:flex relative w-full max-w-[200px] lg:max-w-md group shrink-0">
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

    <!-- Right Section: Actions & Profile (Hides on mobile when search is open to prevent overlap) -->
    <div :class="[isMobileSearchOpen ? 'hidden md:flex' : 'flex', 'items-center gap-2 sm:gap-4 ml-2 sm:ml-4 shrink-0']">
      
      <!-- AI Assistant Button -->
      <RouterLink to="/pelajar/ai-analyzer" class="flex items-center justify-center gap-1.5 px-2.5 py-2 sm:px-4 sm:py-2.5 btn-tanya-ai text-white rounded-xl font-bold text-xs sm:text-sm active:scale-95 shrink-0">
        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="m12 3-1.912 5.813a2 2 0 0 1-1.275 1.275L3 12l5.813 1.912a2 2 0 0 1 1.275 1.275L12 21l1.912-5.813a2 2 0 0 1 1.275-1.275L21 12l-5.813-1.912a2 2 0 0 1-1.275-1.275L12 3Z"/><path d="M5 3v4"/><path d="M19 17v4"/><path d="M3 5h4"/><path d="M17 19h4"/></svg>
        <span class="hidden sm:inline">Tanya AI</span>
      </RouterLink>

      <!-- Notification -->
      <div class="relative">
        <button @click="showNotif = !showNotif" class="relative p-2.5 text-slate-400 hover:text-[#081F5C] hover:bg-[#EDF1F6] rounded-xl transition-colors focus:outline-none">
          <span v-if="unreadCount > 0" class="absolute top-[9px] right-[10px] w-2 h-2 bg-rose-500 rounded-full ring-2 ring-white z-10"></span>
          <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M6 8a6 6 0 0 1 12 0c0 7 3 9 3 9H3s3-2 3-9"/><path d="M10.3 21a1.94 1.94 0 0 0 3.4 0"/></svg>
        </button>
        <!-- Notif Popover -->
        <div v-if="showNotif" class="absolute right-0 mt-2 w-80 bg-white rounded-2xl shadow-xl border border-slate-100 overflow-hidden z-50 animate-in slide-in-from-top-2">
          <div class="px-4 py-3 border-b border-slate-100 flex justify-between items-center bg-slate-50/50">
            <span class="font-bold text-[#081F5C] text-sm">Notifikasi</span>
            <span class="text-xs font-bold text-[#334EAC] bg-[#334EAC]/10 px-2 py-0.5 rounded-md">{{ unreadCount }} Baru</span>
          </div>
          <div class="p-2">
            <div v-if="mappedPreview.length === 0" class="p-6 text-center text-xs text-slate-400 font-medium">
              Belum ada notifikasi baru
            </div>
            <div v-else v-for="notif in mappedPreview" :key="notif.id" @click="handleNotifClick(notif)" class="p-3 hover:bg-slate-50 rounded-xl cursor-pointer transition-colors flex gap-3">
              <div :class="['w-8 h-8 rounded-full flex items-center justify-center shrink-0 text-xs', getIconClass(notif.type)]">
                <svg v-if="notif.type === 'mentoring'" xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><rect width="18" height="18" x="3" y="4" rx="2" ry="2"/><line x1="16" x2="16" y1="2" y2="6"/><line x1="8" x2="8" y1="2" y2="6"/><line x1="3" x2="21" y1="10" y2="10"/></svg>
                <svg v-else-if="notif.type === 'forum'" xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z"/></svg>
                <svg v-else-if="notif.type === 'ai'" xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="m12 3-1.912 5.813a2 2 0 0 1-1.275 1.275L3 12l5.813 1.912a2 2 0 0 1 1.275 1.275L12 21l1.912-5.813a2 2 0 0 1 1.275-1.275L21 12l-5.813-1.912a2 2 0 0 1-1.275-1.275L12 3Z"/></svg>
                <svg v-else xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"/><path d="M12 16v-4"/><path d="M12 8h.01"/></svg>
              </div>
              <div class="min-w-0 flex-1">
                <p :class="['text-xs mb-0.5 truncate', notif.isRead ? 'text-slate-600 font-bold' : 'text-[#081F5C] font-extrabold']">{{ notif.title }}</p>
                <p class="text-[11px] text-slate-500 line-clamp-2 leading-tight">{{ notif.message }}</p>
                <p class="text-[9px] font-bold text-slate-400 mt-1 flex items-center gap-1.5">
                  <span v-if="!notif.isRead" class="w-1.5 h-1.5 bg-[#334EAC] rounded-full"></span>
                  {{ notif.time }}
                </p>
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
        <button @click="showProfile = !showProfile" class="flex items-center gap-1.5 sm:gap-3 p-1 pr-1 sm:pr-2 hover:bg-[#EDF1F6] rounded-xl transition-colors focus:outline-none border border-transparent hover:border-slate-200/50">
          <div class="w-9 h-9 rounded-full bg-[#EDF1F6] border-2 border-white shadow-sm shrink-0 flex items-center justify-center overflow-hidden">
            <span class="text-[#081F5C] font-bold text-sm">{{ (authStore.user?.name || 'P').charAt(0).toUpperCase() }}</span>
          </div>
          <div class="hidden lg:flex items-center gap-2">
            <span class="text-sm font-bold text-slate-700">{{ authStore.user?.name || 'Pelajar' }}</span>
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
import { ref, computed, onMounted } from 'vue'
import { RouterLink, useRouter } from 'vue-router'
import { useAuthStore } from '@/stores/auth'
import { 
  notificationsService, 
  unreadCount, 
  notificationsPreview,
  parseNotificationType,
  formatRelativeTime
} from '@/services/notifications.service'

const router = useRouter()
const authStore = useAuthStore()

const handleLogout = async () => {
  await authStore.logout()
  router.push('/auth/login')
}

const showNotif = ref(false)
const showProfile = ref(false)
const showComingSoon = ref(false)
const isMobileSearchOpen = ref(false)

const mappedPreview = computed(() => {
  return notificationsPreview.value.map(n => {
    const type = n.data?.type || parseNotificationType(n.type)
    return {
      id: n.id,
      type: type,
      title: n.data?.title || 'Notifikasi Baru',
      message: n.data?.message || n.data?.content || '',
      time: formatRelativeTime(n.created_at),
      isRead: n.read_at !== null,
      link: n.data?.action_url || n.data?.link || '#'
    }
  })
})

const getIconClass = (type) => {
  switch (type) {
    case 'mentoring': return 'bg-[#EEF3FF] text-[#334EAC]'
    case 'forum': return 'bg-emerald-50 text-emerald-600'
    case 'ai': return 'bg-purple-50 text-purple-600'
    default: return 'bg-slate-50 text-slate-600'
  }
}

const handleNotifClick = async (notif) => {
  showNotif.value = false
  if (!notif.isRead) {
    try {
      await notificationsService.markAsRead(notif.id)
    } catch (err) {
      console.error('Failed to mark notification as read:', err)
    }
  }
  if (notif.link && notif.link !== '#') {
    router.push(notif.link)
  }
}

onMounted(() => {
  notificationsService.getNotifications(1).catch(err => {
    console.error('Failed to fetch notifications in header:', err)
  })
})
</script>
