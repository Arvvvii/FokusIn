<template>
  <div class="space-y-6 animate-in fade-in duration-500 pb-12">
    
    <!-- 1. GLASSMORPHIC HEADER SECTION -->
    <div class="bg-white/60 backdrop-blur-xl rounded-3xl p-7 md:p-8 shadow-[0_10px_40px_rgba(15,23,42,0.06)] border border-slate-200/60 relative overflow-hidden">
      <!-- Decorative background elements -->
      <div class="absolute top-0 right-0 -mr-20 -mt-20 w-64 h-64 rounded-full bg-gradient-to-br from-[#EEF3FF] to-[#E2EAF8] opacity-70 blur-3xl mix-blend-multiply"></div>
      
      <div class="relative z-10 flex flex-col md:flex-row gap-6 justify-between items-start md:items-center">
        <div>
          <div class="inline-flex items-center gap-2 px-3 py-1.5 rounded-full bg-slate-100/80 border border-slate-200/60 mb-4 backdrop-blur-sm">
            <div class="w-1.5 h-1.5 rounded-full bg-blue-600 animate-pulse"></div>
            <span class="text-xs font-bold tracking-wide text-slate-600 uppercase">Notifikasi</span>
          </div>
          <h1 class="text-3xl md:text-4xl font-extrabold text-slate-900 tracking-tight leading-tight">
            Pusat Notifikasi
          </h1>
          <p class="text-[15px] text-slate-600 font-medium mt-2 max-w-xl leading-relaxed">
            Pembaruan akademik, jadwal mentoring, dan interaksi forum terbaru.
          </p>
        </div>
        
        <div class="flex items-center gap-3 shrink-0">
          <button @click="markAllAsRead" class="px-5 py-3 text-[14px] font-bold text-slate-700 bg-white border border-slate-200 hover:border-slate-300 rounded-2xl transition-all shadow-sm active:scale-95 flex items-center gap-2">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M18 6 7 17l-5-5"/><path d="m22 10-7.5 7.5L13 16"/></svg>
            Tandai Semua Dibaca
          </button>
        </div>
      </div>
    </div>

    <!-- 2. NOTIFICATIONS LIST -->
    <div class="bg-white rounded-3xl p-6 md:p-8 shadow-[0_10px_40px_rgba(15,23,42,0.04)] border border-slate-100">
      
      <!-- Loading Skeleton -->
      <div v-if="loading" class="space-y-4">
        <div v-for="i in 3" :key="i" class="p-5 rounded-2xl border border-slate-100 bg-white animate-pulse flex gap-4">
          <div class="w-12 h-12 rounded-xl bg-slate-100 shrink-0"></div>
          <div class="flex-1 space-y-2 py-1">
            <div class="h-4 bg-slate-200 rounded w-1/4"></div>
            <div class="h-4 bg-slate-200 rounded w-3/4"></div>
          </div>
        </div>
      </div>

      <!-- Error State -->
      <div v-else-if="error" class="text-center py-12">
        <div class="w-16 h-16 bg-rose-50 text-rose-500 rounded-full flex items-center justify-center mx-auto mb-4">
          <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"/><line x1="12" y1="8" x2="12" y2="12"/><line x1="12" y1="16" x2="12.01" y2="16"/></svg>
        </div>
        <h3 class="text-lg font-bold text-slate-800 mb-2">Gagal Memuat Notifikasi</h3>
        <p class="text-slate-500 text-sm max-w-sm mx-auto mb-6">{{ error }}</p>
        <button @click="loadNotifications" class="px-5 py-2.5 text-xs font-bold text-white bg-[#334EAC] hover:bg-[#273B8C] rounded-xl transition-all active:scale-95 shadow-md">
          Coba Lagi
        </button>
      </div>
      
      <!-- Empty State -->
      <div v-else-if="notifications.length === 0" class="text-center py-16">
        <div class="w-20 h-20 bg-slate-50 rounded-full flex items-center justify-center mx-auto mb-4 border border-slate-100">
          <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="text-slate-300"><path d="M18 8A6 6 0 0 0 6 8c0 7-3 9-3 9h18s-3-2-3-9"/><path d="M13.73 21a2 2 0 0 1-3.46 0"/></svg>
        </div>
        <h3 class="text-lg font-bold text-slate-800 mb-2">Belum Ada Notifikasi</h3>
        <p class="text-slate-500 text-sm max-w-sm mx-auto">Notifikasi baru tentang aktivitas belajarmu akan muncul di sini.</p>
      </div>

      <!-- Real Data List -->
      <div v-else class="space-y-4">
        <!-- Notification Items -->
        <div v-for="notification in notifications" :key="notification.id" 
             @click="handleNotificationClick(notification)"
             :class="[
               'group relative p-5 rounded-2xl border transition-all duration-300 cursor-pointer',
               notification.isRead 
                 ? 'bg-white border-slate-100 hover:border-slate-200' 
                 : 'bg-blue-50/50 border-[#D5E2F5] hover:border-[#334EAC]/30'
             ]">
          
          <div class="flex gap-4">
            <!-- Icon -->
            <div :class="[
              'w-12 h-12 rounded-xl flex items-center justify-center shrink-0 border shadow-sm',
              getIconStyles(notification.type)
            ]">
              <svg v-if="notification.type === 'mentoring'" xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><rect width="18" height="18" x="3" y="4" rx="2" ry="2"/><line x1="16" x2="16" y1="2" y2="6"/><line x1="8" x2="8" y1="2" y2="6"/><line x1="3" x2="21" y1="10" y2="10"/></svg>
              <svg v-else-if="notification.type === 'forum'" xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z"/></svg>
              <svg v-else-if="notification.type === 'ai'" xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="m12 3-1.912 5.813a2 2 0 0 1-1.275 1.275L3 12l5.813 1.912a2 2 0 0 1 1.275 1.275L12 21l1.912-5.813a2 2 0 0 1 1.275-1.275L21 12l-5.813-1.912a2 2 0 0 1-1.275-1.275L12 3Z"/></svg>
              <svg v-else xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"/><path d="M12 16v-4"/><path d="M12 8h.01"/></svg>
            </div>
            
            <!-- Content -->
            <div class="flex-1">
              <div class="flex items-center justify-between gap-4 mb-1">
                <h4 :class="['text-[15px] tracking-tight', notification.isRead ? 'font-semibold text-slate-800' : 'font-extrabold text-slate-900']">
                  {{ notification.title }}
                </h4>
                <span class="text-[12px] font-semibold text-slate-400 whitespace-nowrap">{{ notification.time }}</span>
              </div>
              <p :class="['text-[14px] leading-relaxed', notification.isRead ? 'text-slate-500 font-medium' : 'text-slate-600 font-semibold']">
                {{ notification.message }}
              </p>
            </div>

            <!-- Action Button -->
            <div class="shrink-0 flex flex-col justify-center opacity-0 group-hover:opacity-100 transition-opacity">
              <span class="p-2.5 bg-slate-100 group-hover:bg-[#334EAC] text-slate-600 group-hover:text-white rounded-xl transition-colors">
                <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M5 12h14"/><path d="m12 5 7 7-7 7"/></svg>
              </span>
            </div>
          </div>

          <!-- Unread Dot -->
          <div v-if="!notification.isRead" class="absolute top-1/2 -translate-y-1/2 left-0 w-1.5 h-8 bg-[#334EAC] rounded-r-full"></div>
        </div>

      </div>
    </div>
  </div>
</template>

<script setup>
import { ref, onMounted } from 'vue'
import { useRouter } from 'vue-router'
import { 
  notificationsService, 
  parseNotificationType, 
  formatRelativeTime 
} from '@/services/notifications.service'

const router = useRouter()
const notifications = ref([])
const loading = ref(false)
const error = ref(null)

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

    notifications.value = sorted.map(n => ({
      id: n.id,
      type: n.data?.type || parseNotificationType(n.type),
      title: n.data?.title || 'Notifikasi Baru',
      message: n.data?.message || n.data?.content || '',
      time: formatRelativeTime(n.created_at),
      isRead: n.read_at !== null,
      link: n.data?.action_url || n.data?.link || '#'
    }))
  } catch (err) {
    error.value = err
  } finally {
    loading.value = false
  }
}

const handleNotificationClick = async (notification) => {
  if (!notification.isRead) {
    try {
      await notificationsService.markAsRead(notification.id)
      notification.isRead = true
    } catch (err) {
      console.error('Failed to mark notification as read:', err)
    }
  }
  
  if (notification.link && notification.link !== '#') {
    router.push(notification.link)
  }
}

const markAllAsRead = async () => {
  try {
    await notificationsService.markAllAsRead()
    notifications.value.forEach(n => n.isRead = true)
  } catch (err) {
    console.error('Failed to mark all as read:', err)
  }
}

const getIconStyles = (type) => {
  switch(type) {
    case 'mentoring': return 'bg-[#EEF3FF] text-[#334EAC] border-[#D5E2F5]'
    case 'forum': return 'bg-emerald-50 text-emerald-600 border-emerald-100'
    case 'ai': return 'bg-purple-50 text-purple-600 border-purple-100'
    default: return 'bg-slate-50 text-slate-600 border-slate-200'
  }
}

onMounted(() => {
  loadNotifications()
})
</script>
