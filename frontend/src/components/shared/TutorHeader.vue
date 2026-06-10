<template>
  <header class="tutor-topbar">
    
    <!-- Left Section: Search & Quick Actions -->
    <div class="flex items-center gap-4 flex-1">

      <!-- Search Bar (Desktop) -->
      <div class="hidden md:flex relative w-full max-w-[280px] group">
        <div class="absolute inset-y-0 left-0 pl-3.5 flex items-center pointer-events-none text-slate-400 group-focus-within:text-[#334EAC] transition-colors">
          <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><circle cx="11" cy="11" r="8"/><path d="m21 21-4.3-4.3"/></svg>
        </div>
        <input 
          type="text" 
          class="w-full pl-10 pr-16 py-2.5 bg-[#EDF1F6]/50 border border-transparent rounded-xl text-[14px] text-slate-800 placeholder-slate-400 focus:outline-none focus:bg-white focus:border-[#7096D1]/30 focus:ring-4 focus:ring-[#7096D1]/10 transition-all shadow-[inset_0_1px_2px_rgba(0,0,0,0.02)]" 
          placeholder="Cari sesi mentoring atau diskusi..."
        >
        <div class="absolute inset-y-0 right-0 pr-3 flex items-center pointer-events-none">
          <span class="text-[10px] font-bold text-slate-400 border border-slate-200/80 rounded-[4px] px-1.5 py-0.5 bg-white shadow-sm tracking-widest leading-none">⌘K</span>
        </div>
      </div>
    </div>

    <!-- Right Section: Actions & Profile -->
    <div class="flex items-center gap-2 sm:gap-3 ml-2 lg:ml-4">
      
      <!-- Jadwal Hari Ini (Dinamic) -->
      <RouterLink v-if="activeJadwalCount > 0" to="/tutor/mentoring" class="flex items-center gap-2 bg-emerald-500/10 hover:bg-emerald-500/20 text-emerald-700 border border-emerald-500/20 px-3 py-1.5 rounded-full text-xs font-bold transition-colors hidden xl:flex">
        <span class="w-1.5 h-1.5 rounded-full bg-emerald-500 animate-pulse"></span>
        {{ activeJadwalCount }} Jadwal
      </RouterLink>

      <!-- Verify Queue (Dinamic) -->
      <RouterLink v-if="verifyQueueCount > 0" to="/tutor/verify-answer" class="flex items-center gap-1.5 bg-amber-500/10 hover:bg-amber-500/20 text-amber-700 border border-amber-500/20 px-3 py-1.5 rounded-full text-xs font-bold transition-colors hidden lg:flex">
        <span class="w-3.5 h-3.5 bg-amber-500 text-white rounded-full flex items-center justify-center text-[9px]">{{ verifyQueueCount }}</span>
        Verify Queue
      </RouterLink>

      <!-- Upload Arsip (Icon Only) -->
      <RouterLink to="/tutor/upload-exam" class="p-2 text-slate-400 hover:text-[#334EAC] hover:bg-slate-100 rounded-xl transition-colors hidden sm:flex" title="Upload Arsip">
        <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"/><polyline points="17 8 12 3 7 8"/><line x1="12" x2="12" y1="3" y2="15"/></svg>
      </RouterLink>

      <!-- AI Assistant Button -->
      <RouterLink to="/tutor/ai-validation" class="flex items-center gap-2 bg-gradient-to-r from-[#081F5C] to-[#334EAC] text-white px-3 py-1.5 rounded-xl text-xs font-bold shadow-sm hover:shadow-md transition-all hidden sm:flex">
        <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="m12 3-1.912 5.813a2 2 0 0 1-1.275 1.275L3 12l5.813 1.912a2 2 0 0 1 1.275 1.275L12 21l1.912-5.813a2 2 0 0 1 1.275-1.275L21 12l-5.813-1.912a2 2 0 0 1-1.275-1.275L12 3Z"/></svg>
        AI Mentor
      </RouterLink>

      <!-- Notification -->
      <div class="relative">
        <button @click="showNotif = !showNotif" class="relative p-2.5 text-slate-400 hover:text-[#081F5C] hover:bg-[#EDF1F6] rounded-xl transition-colors focus:outline-none">
          <span v-if="unreadCount > 0" class="absolute top-[9px] right-[10px] w-2 h-2 bg-rose-500 rounded-full ring-2 ring-white z-10"></span>
          <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M6 8a6 6 0 0 1 12 0c0 7 3 9 3 9H3s3-2 3-9"/><path d="M10.3 21a1.94 1.94 0 0 0 3.4 0"/></svg>
        </button>
        <!-- Notif Popover -->
        <div v-if="showNotif" class="notif-dropdown absolute right-0 mt-2 w-80 z-50 animate-in slide-in-from-top-2">
          <div class="px-4 py-3 flex justify-between items-center">
            <span class="notif-header">Notifikasi Mentor</span>
            <span class="notif-badge-count">{{ unreadCount }} Baru</span>
          </div>
          <div class="p-2">
            <div v-if="mappedPreview.length === 0" class="p-6 text-center text-xs text-slate-400 font-medium bg-white rounded-xl">
              Belum ada notifikasi baru
            </div>
            <div v-else v-for="notif in mappedPreview" :key="notif.id" @click="handleNotifClick(notif)" class="notif-item cursor-pointer">
              <div :class="['flex items-center justify-center shrink-0 w-8 h-8 rounded-full', getIconClass(notif.type)]">
                <svg v-if="notif.type === 'mentoring'" xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"/><polyline points="12 6 12 12 16 14"/></svg>
                <svg v-else-if="notif.type === 'ai'" xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="m12 3-1.912 5.813a2 2 0 0 1-1.275 1.275L3 12l5.813 1.912a2 2 0 0 1 1.275 1.275L12 21l1.912-5.813a2 2 0 0 1 1.275-1.275L21 12l-5.813-1.912a2 2 0 0 1-1.275-1.275L12 3Z"/></svg>
                <svg v-else-if="notif.type === 'forum'" xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z"/></svg>
                <svg v-else xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"/><path d="M12 16v-4"/><path d="M12 8h.01"/></svg>
              </div>
              <div class="min-w-0 flex-1">
                <p class="notif-title truncate">{{ notif.title }}</p>
                <p class="notif-desc line-clamp-2">{{ notif.message }}</p>
                <p class="notif-time flex items-center gap-1">
                  <span v-if="!notif.isRead" class="w-1.5 h-1.5 bg-[#334EAC] rounded-full inline-block"></span>
                  {{ notif.time }}
                </p>
              </div>
            </div>
          </div>
          <RouterLink to="/tutor/notifications" @click="showNotif = false" class="block text-center py-2 text-xs font-bold text-[#334EAC] hover:bg-slate-50 border-t border-slate-100 transition-colors">Kelola Notifikasi</RouterLink>
        </div>
      </div>
      
      <!-- Divider -->
      <div class="h-6 w-px bg-slate-200 hidden sm:block"></div>

      <!-- User Profile Dropdown Toggle -->
      <div class="relative">
        <button @click="showProfile = !showProfile" class="flex items-center gap-3 p-1 pr-2 hover:bg-[#EDF1F6] rounded-xl transition-colors focus:outline-none border border-transparent hover:border-slate-200/50">
          <div class="tutor-avatar-topbar shrink-0">{{ (authStore.user?.name || 'T').charAt(0).toUpperCase() }}</div>
          <div class="hidden lg:flex flex-col items-start mr-1">
            <span class="text-sm font-bold text-[#081F5C] leading-none mb-1">{{ authStore.user?.name || 'Tutor' }}</span>
            <span class="text-[10px] font-bold text-[#334EAC] uppercase tracking-wider leading-none">Mentor Level 8</span>
          </div>
          <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round" class="text-slate-400 hidden lg:block"><path d="m6 9 6 6 6-6"/></svg>
        </button>
        <!-- Profile Dropdown -->
        <div v-if="showProfile" class="account-dropdown absolute right-0 mt-2 w-56 z-50 animate-in slide-in-from-top-2">
          <div class="p-2">
            <p class="account-section-label">Akun Mentor</p>
            <RouterLink to="/tutor/profile" @click="showProfile = false" class="account-menu-item">
              <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M19 21v-2a4 4 0 0 0-4-4H9a4 4 0 0 0-4 4v2"/><circle cx="12" cy="7" r="4"/></svg>
              Profil & Reputasi
            </RouterLink>
          </div>
          <div class="p-2">
             <div class="px-3 py-2 text-sm flex items-center justify-between">
               <span class="status-toggle-label">Status Ketersediaan</span>
               <div class="w-8 h-4 bg-emerald-100 rounded-full p-0.5 shadow-inner flex items-center cursor-pointer">
                 <div class="w-3 h-3 bg-emerald-500 rounded-full shadow-sm ml-auto"></div>
               </div>
             </div>
          </div>
          <div class="p-2">
            <button @click="handleLogout" class="account-menu-item danger w-full text-left">
              <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"/><polyline points="16 17 21 12 16 7"/><line x1="21" x2="9" y1="12" y2="12"/></svg>
              Keluar
            </button>
          </div>
        </div>
      </div>
      
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

// MOCK DATA FOR DYNAMIC PILLS
const activeJadwalCount = ref(2)
const verifyQueueCount = ref(12)

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
    case 'mentoring': return 'bg-emerald-500/10 text-emerald-700'
    case 'ai': return 'bg-purple-500/10 text-purple-700'
    case 'forum': return 'bg-amber-500/10 text-amber-700'
    default: return 'bg-slate-500/10 text-slate-700'
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
    console.error('Failed to fetch notifications in tutor header:', err)
  })
})
</script>
