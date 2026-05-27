<template>
  <div class="space-y-8 w-full pb-12">
      
      <!-- Page Header -->
      <div class="mb-6 flex items-center justify-between">
        <div class="flex items-center gap-3">
          <RouterLink to="/tutor/dashboard" class="w-8 h-8 rounded-lg bg-white border border-slate-200 text-slate-500 hover:text-[#334EAC] hover:border-[#7096D1] flex items-center justify-center transition-colors shrink-0 shadow-sm active:scale-95" title="Kembali">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="m15 18-6-6 6-6"/></svg>
          </RouterLink>
          <div>
            <h1 class="text-3xl md:text-4xl font-extrabold text-slate-900 tracking-tight leading-tight">Notifikasi Pendidik</h1>
            <p class="text-[15px] text-slate-600 font-medium mt-2 max-w-xl leading-relaxed">Pantau aktivitas mahasiswa, permohonan bimbingan baru, serta notifikasi sistem ekstraksi AI.</p>
          </div>
        </div>
        <button @click="markAllRead" class="px-3.5 py-2 bg-white hover:bg-slate-50 text-slate-600 border border-slate-200 rounded-xl font-bold text-xs transition-colors shadow-sm active:scale-[0.98]">
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
              'bg-amber-50 border-amber-100 text-amber-600': notif.type === 'forum'
            }"
          >
            <svg v-if="notif.type === 'ai'" xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="m12 3-1.912 5.813a2 2 0 0 1-1.275 1.275L3 12l5.813 1.912a2 2 0 0 1 1.275 1.275L12 21l1.912-5.813a2 2 0 0 1 1.275-1.275L21 12l-5.813-1.912a2 2 0 0 1-1.275-1.275L12 3Z"/></svg>
            <svg v-else-if="notif.type === 'mentoring'" xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><rect width="18" height="18" x="3" y="4" rx="2" ry="2"/><line x1="16" x2="16" y1="2" y2="6"/><line x1="8" x2="8" y1="2" y2="6"/><line x1="3" x2="21" y1="10" y2="10"/></svg>
            <svg v-else-if="notif.type === 'forum'" xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z"/></svg>
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
              <RouterLink :to="notif.actionUrl" class="px-3 py-1.5 bg-slate-50 hover:bg-[#334EAC] text-[#334EAC] hover:text-white border border-slate-200 hover:border-[#334EAC] rounded-lg font-bold text-[11px] transition-colors shadow-sm">
                {{ notif.actionText }}
              </RouterLink>
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
      </div>

  </div>
</template>

<script setup>
import { ref, computed } from 'vue'
import { RouterLink } from 'vue-router'

const activeFilter = ref('all')

const filters = [
  { id: 'all', name: 'Semua' },
  { id: 'unread', name: 'Belum Dibaca' },
  { id: 'mentoring', name: 'Mentoring' },
  { id: 'ai', name: 'AI & Validasi' },
  { id: 'forum', name: 'Forum Akademik' }
]

const notifications = ref([
  {
    id: 1,
    type: 'mentoring',
    categoryName: 'Mentoring 1-on-1',
    title: 'Sesi Mentoring Mendatang',
    message: 'Jadwal mentoring dengan Budi Santoso mengenai topik "Optimasi Query SQL" akan dimulai dalam 30 menit.',
    time: 'Baru saja',
    read: false,
    actionText: 'Buka Kelola Mentoring',
    actionUrl: '/tutor/mentoring'
  },
  {
    id: 2,
    type: 'ai',
    categoryName: 'AI Validation',
    title: 'Berkas Baru Siap Validasi',
    message: 'Sistem FokusIn AI telah berhasil mengekstraksi dokumen "Struktur_Data_UAS_2025.pdf". Mohon lakukan verifikasi hasil.',
    time: '2 jam lalu',
    read: false,
    actionText: 'Review Sekarang',
    actionUrl: '/tutor/ai-validation'
  },
  {
    id: 3,
    type: 'mentoring',
    categoryName: 'Request Mentoring',
    title: 'Permohonan Sesi Baru',
    message: 'Andi Wijaya mengajukan sesi bimbingan baru untuk topik "Mekanika Klasik / Fisika Dasar" pada hari Kamis.',
    time: '3 jam lalu',
    read: false,
    actionText: 'Tinjau Request',
    actionUrl: '/tutor/mentoring'
  },
  {
    id: 4,
    type: 'forum',
    categoryName: 'Forum Diskusi',
    title: 'Jawaban Membutuhkan Verifikasi',
    message: 'Pertanyaan "Kalkulus Lanjut: DI Method Tabular" memiliki 3 jawaban baru dari mahasiswa yang membutuhkan verifikasi keahlian Anda.',
    time: 'Kemarin',
    read: true,
    actionText: 'Verifikasi Jawaban',
    actionUrl: '/tutor/verify-answer'
  }
])

const filteredNotifications = computed(() => {
  return notifications.value.filter(n => {
    if (activeFilter.value === 'unread') return !n.read
    if (activeFilter.value === 'all') return true
    return n.type === activeFilter.value
  })
})

const toggleRead = (id) => {
  const notif = notifications.value.find(n => n.id === id)
  if (notif) notif.read = !notif.read
}

const markAllRead = () => {
  notifications.value.forEach(n => n.read = true)
}
</script>
