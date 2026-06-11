<template>
  <div class="space-y-8 w-full pb-12">
      
      <!-- Back Navigation -->
      <div class="mb-6 flex items-center gap-2">
        <RouterLink
          to="/tutor/dashboard"
          class="text-sm font-bold text-slate-400 hover:text-[#334EAC] transition-colors flex items-center gap-1 w-fit bg-white/50 px-3 py-1.5 rounded-lg border border-slate-200/50"
        >
          ← Kembali ke Dashboard
        </RouterLink>
      </div>

      <!-- 1. EDITORIAL WORKSPACE HEADER SECTION -->
      <div class="bg-white border border-slate-200 shadow-sm rounded-2xl p-7 md:p-8 flex flex-col md:flex-row md:items-center justify-between gap-6 relative mb-6">
        <div class="absolute right-0 top-0 w-1/3 h-full bg-gradient-to-l from-[#EDF1F6]/50 to-transparent pointer-events-none"></div>
        
        <div class="relative z-10 flex items-center gap-4">
          <span class="w-12 h-12 rounded-2xl bg-[#334EAC]/10 text-[#334EAC] flex items-center justify-center shrink-0">
            <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M6 8a6 6 0 0 1 12 0c0 7 3 9 3 9H3s3-2 3-9"/><path d="M10.3 21a1.94 1.94 0 0 0 3.4 0"/></svg>
          </span>
          <div>
            <h1 class="text-2xl font-extrabold text-[#081F5C] tracking-tight leading-tight">Notifikasi Pendidik</h1>
            <p class="text-[13px] text-slate-500 font-medium mt-2 max-w-xl leading-relaxed">Pantau aktivitas mahasiswa, permohonan bimbingan baru, serta notifikasi sistem ekstraksi AI.</p>
          </div>
        </div>
        <button @click="markAllRead" class="relative z-10 px-3.5 py-2 bg-white hover:bg-slate-50 text-slate-600 border border-slate-200 rounded-xl font-bold text-xs transition-colors shadow-sm active:scale-[0.98] shrink-0">
          Tandai Semua Dibaca
        </button>
      </div>

      <!-- Filters -->
      <div class="flex items-center gap-2 border-b border-slate-200 pb-3">
        <button 
          v-for="filter in filters" 
          :key="filter.id" 
          @click="activeFilter = filter.id"
          class="px-3 py-1.5 rounded-lg text-xs font-bold transition-colors"
          :class="activeFilter === filter.id ? 'bg-[#334EAC] text-white shadow-sm' : 'text-slate-500 hover:bg-slate-100 hover:text-slate-800'"
        >
          {{ filter.name }}
        </button>
      </div>

      <!-- Notifications List -->
      <div class="space-y-3">
        <!-- Loading State -->
        <div v-if="loading" class="space-y-3">
          <div v-for="i in 3" :key="i" class="bg-white rounded-2xl p-4 border border-slate-100 animate-pulse flex gap-4">
            <div class="w-9 h-9 rounded-xl bg-slate-100 shrink-0"></div>
            <div class="flex-1 space-y-2 py-1">
              <div class="h-3 bg-slate-200 rounded w-1/4"></div>
              <div class="h-3 bg-slate-200 rounded w-3/4"></div>
            </div>
          </div>
        </div>

        <!-- Error State -->
        <div v-else-if="error" class="bg-white rounded-2xl border border-slate-200 p-8 text-center shadow-sm">
          <div class="w-12 h-12 rounded-full bg-rose-50 border border-rose-100 flex items-center justify-center mx-auto mb-4 text-rose-500 shadow-sm">
            <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"/><line x1="12" y1="8" x2="12" y2="12"/><line x1="12" y1="16" x2="12.01" y2="16"/></svg>
          </div>
          <h3 class="text-sm font-bold text-slate-900 mb-1">Gagal Memuat Notifikasi</h3>
          <p class="text-xs text-slate-500 font-medium max-w-sm mx-auto mb-4">{{ error }}</p>
          <button @click="loadNotifications" class="px-4 py-2 bg-[#334EAC] hover:bg-[#273B8C] text-white rounded-lg text-xs font-bold transition-all shadow-sm">
            Coba Lagi
          </button>
        </div>

        <!-- Real Data -->
        <template v-else>
          <div 
            v-for="notif in filteredNotifications" 
            :key="notif.id" 
            class="bg-white rounded-2xl p-4 shadow-sm border border-slate-200 flex gap-4 transition-colors hover:border-[#334EAC]/30 relative"
            :class="{'border-l-4 border-l-[#334EAC]': !notif.read}"
          >
            <!-- Icon container based on category -->
            <div class="w-9 h-9 rounded-xl flex items-center justify-center shrink-0 border"
              :class="{
                'bg-[#F7F2EB] border-[#D0E3FF] text-[#081F5C]': notif.type === 'ai',
                'bg-emerald-50 border-emerald-100 text-emerald-600': notif.type === 'mentoring',
                'bg-amber-50 border-amber-100 text-amber-600': notif.type === 'forum',
                'bg-slate-50 border-slate-100 text-slate-600': notif.type === 'system'
              }"
            >
              <svg v-if="notif.type === 'ai'" xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="m12 3-1.912 5.813a2 2 0 0 1-1.275 1.275L3 12l5.813 1.912a2 2 0 0 1 1.275 1.275L12 21l1.912-5.813a2 2 0 0 1 1.275-1.275L21 12l-5.813-1.912a2 2 0 0 1-1.275-1.275L12 3Z"/></svg>
              <svg v-else-if="notif.type === 'mentoring'" xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><rect width="18" height="18" x="3" y="4" rx="2" ry="2"/><line x1="16" x2="16" y1="2" y2="6"/><line x1="8" x2="8" y1="2" y2="6"/><line x1="3" x2="21" y1="10" y2="10"/></svg>
              <svg v-else-if="notif.type === 'forum'" xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z"/></svg>
              <svg v-else xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"/><path d="M12 16v-4"/><path d="M12 8h.01"/></svg>
            </div>

            <!-- Content -->
            <div class="min-w-0 flex-1">
              <div class="flex items-center justify-between gap-4 mb-1">
                <span class="text-[10px] font-bold text-slate-400 uppercase tracking-wider">{{ notif.categoryName }}</span>
                <span class="text-[11px] text-slate-400 font-semibold">{{ notif.time }}</span>
              </div>
              <h4 class="text-sm font-bold text-[#081F5C] mb-1">{{ notif.title }}</h4>
              <p class="text-xs text-slate-500 leading-relaxed font-medium mb-3">{{ notif.message }}</p>
              
              <div class="flex items-center gap-2">
                <button 
                  @click="handleNotificationAction(notif)" 
                  class="px-3 py-1.5 bg-slate-50 hover:bg-[#334EAC] text-[#334EAC] hover:text-white border border-slate-200 hover:border-[#334EAC] rounded-lg font-bold text-[11px] transition-colors shadow-sm"
                >
                  {{ notif.actionText }}
                </button>
                <button v-if="!notif.read" @click="toggleRead(notif.id)" class="text-[11px] font-semibold text-slate-400 hover:text-slate-600 px-2 py-1.5">
                  Tandai dibaca
                </button>
              </div>
            </div>
          </div>

          <!-- Empty State -->
          <div v-if="filteredNotifications.length === 0" class="bg-white rounded-2xl border border-slate-200 p-12 text-center shadow-sm">
            <div class="w-12 h-12 rounded-full bg-slate-50 border border-slate-100 flex items-center justify-center mx-auto mb-4 text-slate-400 shadow-sm">
              <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M6 8a6 6 0 0 1 12 0c0 7 3 9 3 9H3s3-2 3-9"/><path d="M10.3 21a1.94 1.94 0 0 0 3.4 0"/></svg>
            </div>
            <h3 class="text-sm font-bold text-slate-900 mb-1">Tidak Ada Notifikasi</h3>
            <p class="text-xs text-slate-500 font-medium max-w-sm mx-auto">Semua pemberitahuan pada filter ini telah ditinjau atau tidak ada aktivitas baru saat ini.</p>
          </div>
        </template>
      </div>

  </div>
</template>

<script setup>
import { ref, computed, onMounted } from 'vue'
import { useRouter } from 'vue-router'
import { 
  notificationsService, 
  parseNotificationType, 
  getCategoryName,
  formatRelativeTime 
} from '@/services/notifications.service'

const router = useRouter()
const activeFilter = ref('all')
const loading = ref(false)
const error = ref(null)
const notifications = ref([])

const filters = [
  { id: 'all', name: 'Semua' },
  { id: 'unread', name: 'Belum Dibaca' },
  { id: 'mentoring', name: 'Mentoring' },
  { id: 'ai', name: 'AI & Validasi' },
  { id: 'forum', name: 'Forum Akademik' }
]

const loadNotifications = async () => {
  loading.value = true
  error.value = null
  try {
    const response = await notificationsService.getNotifications(1)
    const rawList = response.data || []
    
    // Sort array: newest first
    const sorted = [...rawList].sort(
      (a, b) => new Date(b.created_at) - new Date(a.created_at)
    )

    notifications.value = sorted.map(n => {
      const type = n.data?.type || parseNotificationType(n.type)
      return {
        id: n.id,
        type: type,
        categoryName: n.data?.category_name || n.data?.categoryName || getCategoryName(type),
        title: n.data?.title || 'Notifikasi Baru',
        message: n.data?.message || n.data?.content || '',
        time: formatRelativeTime(n.created_at),
        read: n.read_at !== null,
        actionText: n.data?.action_text || n.data?.actionText || 'Review Sekarang',
        actionUrl: n.data?.action_url || n.data?.actionUrl || n.data?.link || '#'
      }
    })
  } catch (err) {
    error.value = err
  } finally {
    loading.value = false
  }
}

const filteredNotifications = computed(() => {
  return notifications.value.filter(n => {
    if (activeFilter.value === 'unread') return !n.read
    if (activeFilter.value === 'all') return true
    return n.type === activeFilter.value
  })
})

const toggleRead = async (id) => {
  const notif = notifications.value.find(n => n.id === id)
  if (notif && !notif.read) {
    try {
      await notificationsService.markAsRead(id)
      notif.read = true
    } catch (err) {
      console.error('Failed to mark notification as read:', err)
    }
  }
}

const handleNotificationAction = async (notif) => {
  if (!notif.read) {
    try {
      await notificationsService.markAsRead(notif.id)
      notif.read = true
    } catch (err) {
      console.error('Failed to mark notification as read:', err)
    }
  }
  
  if (notif.actionUrl && notif.actionUrl !== '#') {
    router.push(notif.actionUrl)
  }
}

const markAllRead = async () => {
  try {
    await notificationsService.markAllAsRead()
    notifications.value.forEach(n => n.read = true)
  } catch (err) {
    console.error('Failed to mark all as read:', err)
  }
}

onMounted(() => {
  loadNotifications()
})
</script>
