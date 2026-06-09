<template>
  <div class="p-6 md:p-8 xl:p-10 max-w-[1600px] mx-auto animate-in fade-in duration-500">
    
    <!-- Header -->
    <div class="admin-dashboard-hero mb-8">
      <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4 relative z-10">
        <div>
          <h1 class="text-3xl md:text-4xl font-extrabold text-slate-900 tracking-tight leading-tight">Platform Overview</h1>
          <p class="text-[15px] text-slate-600 font-medium mt-2 max-w-xl leading-relaxed">Pusat Kendali FokusIn: Pantau sistem, moderasi, dan metrik akademik secara real-time.</p>
        </div>
        <div class="flex items-center gap-3">
          <button @click="exportReport" class="btn-export px-5 py-2.5 text-sm">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"/><polyline points="7 10 12 15 17 10"/><line x1="12" x2="12" y1="15" y2="3"/></svg>
            Export Report
          </button>
        </div>
      </div>
    </div>

    <!-- 1. HERO OVERVIEW (Stat Cards) -->
    <template v-if="loading">
      <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4 mb-8">
        <div v-for="n in 4" :key="n" class="admin-card p-6 flex flex-col justify-between opacity-70 animate-pulse h-[138px]">
          <div class="flex items-center justify-between mb-4">
            <div class="w-10 h-10 rounded-xl bg-slate-200"></div>
            <div class="w-12 h-4 bg-slate-200 rounded"></div>
          </div>
          <div>
            <div class="h-8 bg-slate-200 rounded w-1/2 mb-2"></div>
            <div class="h-4 bg-slate-200 rounded w-3/4"></div>
          </div>
        </div>
      </div>
    </template>
    
    <template v-else-if="error">
      <div class="mb-8 p-6 flex flex-col items-center justify-center bg-rose-50/50 border border-rose-100 rounded-3xl animate-in fade-in duration-300">
        <div class="w-12 h-12 rounded-full bg-rose-100 text-rose-600 flex items-center justify-center mb-3">
          <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
            <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" />
          </svg>
        </div>
        <h3 class="text-base font-bold text-rose-950 mb-1">Gagal Memuat Statistik</h3>
        <p class="text-xs text-rose-800 text-center max-w-md mb-4">{{ error }}</p>
        <button @click="fetchStats" class="px-4 py-2 bg-[#334EAC] hover:bg-[#081F5C] text-white rounded-xl font-bold text-xs shadow-sm transition-all active:scale-95">
          Coba Lagi
        </button>
      </div>
    </template>

    <template v-else>
      <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4 mb-8">
        <div v-for="(stat, index) in overviewStats" :key="stat.title" class="admin-card p-6" :class="[index === 0 ? 'stat-users' : index === 1 ? 'stat-tutors' : index === 2 ? 'stat-ai-validation' : 'stat-mentoring']">
          <div class="flex items-start justify-between mb-4">
            <div class="w-10 h-10 rounded-xl bg-slate-50 flex items-center justify-center text-slate-600 shrink-0" v-html="stat.icon"></div>
            <span v-if="stat.trendUp" class="change-up flex items-center gap-1">
              <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"><polyline points="22 7 13.5 15.5 8.5 10.5 2 17"/><polyline points="16 7 22 7 22 13"/></svg>
              {{ stat.trend }}
            </span>
            <span v-else class="text-rose-600 bg-rose-50 text-xs font-bold px-2 py-1 rounded-md flex items-center gap-1">
              <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"><polyline points="22 17 13.5 8.5 8.5 13.5 2 7"/><polyline points="16 17 22 17 22 11"/></svg>
              {{ stat.trend }}
            </span>
          </div>
          <h3 class="text-[28px] font-bold text-slate-900 tracking-tight mb-1">{{ stat.value }}</h3>
          <p class="text-sm font-semibold text-slate-500">{{ stat.title }}</p>
        </div>
      </div>
    </template>

    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6 mb-8">
      <!-- 2. PLATFORM HEALTH -->
      <div class="platform-health-card p-6 lg:col-span-2">
        <div class="flex items-center justify-between mb-6">
          <h2 class="text-lg font-bold text-slate-900 tracking-tight">Platform Health</h2>
          <span class="badge-all-ok">All Systems Operational</span>
        </div>
        <div class="grid grid-cols-1 sm:grid-cols-2 gap-x-6">
          <div v-for="(health, idx) in healthMetrics" :key="health.name" class="health-item">
            <div class="flex items-center gap-3">
              <div class="health-icon" :class="idx % 2 === 0 ? 'ai' : 'mentoring'">
                <div v-html="health.icon"></div>
              </div>
              <div>
                <p class="text-sm font-bold text-slate-900 tracking-tight">{{ health.name }}</p>
                <p class="text-xs text-slate-500 font-medium">{{ health.desc }}</p>
              </div>
            </div>
            <div class="text-right">
              <span v-if="health.status === 'Optimal'" class="badge-optimal">{{ health.status }}</span>
              <span v-else class="text-sm font-bold text-amber-600">{{ health.status }}</span>
            </div>
          </div>
        </div>
      </div>

      <!-- 3. LIVE ACTIVITY -->
      <div class="system-logs-panel p-6">
        <h2 class="text-lg font-bold text-slate-900 mb-6 tracking-tight">System Logs</h2>
        <div class="space-y-0">
          <div v-for="(act, idx) in liveActivity" :key="act.id" class="log-item">
            <div :class="idx % 2 === 0 ? 'log-dot-green' : 'log-dot-blue'"></div>
            <div class="flex-1">
              <p class="text-sm font-semibold text-slate-900 tracking-tight">{{ act.title }}</p>
            </div>
            <p class="log-time">{{ act.time }}</p>
          </div>
        </div>
      </div>
    </div>

    <!-- 4. MODERATION QUEUE -->
    <div class="bg-white rounded-2xl border border-slate-200 shadow-sm p-6 mb-8">
      <div class="flex items-center justify-between mb-6">
        <h2 class="text-lg font-bold text-slate-900 tracking-tight">Recent Moderation Queue</h2>
        <RouterLink to="/admin/moderation" class="text-sm font-semibold text-[#081F5C] hover:text-[#081F5C]">Lihat Semua Antrean</RouterLink>
      </div>
      <div class="grid grid-cols-1 lg:grid-cols-3 gap-4">
        <div v-for="mod in moderationQueue" :key="mod.id" class="admin-card p-5 stat-card-warning">
          <div class="flex items-center gap-2 mb-3">
            <span class="text-xs font-bold px-2 py-1 rounded-md" :class="mod.type === 'Report' ? 'bg-rose-50 text-rose-700' : 'bg-amber-50 text-amber-700'">{{ mod.type }}</span>
            <span class="text-xs text-slate-500 font-medium">{{ mod.time }}</span>
          </div>
          <p class="text-base font-bold text-slate-900 mb-2 tracking-tight">{{ mod.title }}</p>
          <p class="text-sm text-slate-600 mb-4 line-clamp-2">{{ mod.desc }}</p>
          <RouterLink :to="`/admin/moderation/${mod.id}`" class="inline-block px-4 py-2 bg-slate-50 hover:bg-slate-100 border border-slate-200 text-slate-700 text-sm font-semibold rounded-lg transition-colors">
            Review Case
          </RouterLink>
        </div>
      </div>
    </div>

  </div>
</template>

<script setup>
import { ref, computed, onMounted } from 'vue'
import { RouterLink } from 'vue-router'
import { statsService } from '@/services/stats.service'

const exportReport = () => {
  alert('Report sedang di-generate dan akan segera diunduh.')
}

const loading = ref(false)
const error = ref(null)
const statsData = ref({
  total_users: 0,
  total_posts: 0,
  total_exam_uploads: 0
})

const fetchStats = async () => {
  loading.value = true
  error.value = null
  try {
    const data = await statsService.getGlobalStats()
    statsData.value = data
  } catch (err) {
    error.value = err
  } finally {
    loading.value = false
  }
}

onMounted(() => {
  fetchStats()
})

const overviewStats = computed(() => [
  { 
    title: 'Total Registered Users', 
    value: statsData.value.total_users?.toLocaleString() || '0', 
    trend: '12%', 
    trendUp: true, 
    icon: '<svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M16 21v-2a4 4 0 0 0-4-4H6a4 4 0 0 0-4 4v2"/><circle cx="9" cy="7" r="4"/><path d="M22 21v-2a4 4 0 0 0-3-3.87"/><path d="M16 3.13a4 4 0 0 1 0 7.75"/></svg>' 
  },
  { 
    title: 'Total Forum Discussions', 
    value: statsData.value.total_posts?.toLocaleString() || '0', 
    trend: '4%', 
    trendUp: true, 
    icon: '<svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z"/></svg>' 
  },
  { 
    title: 'Total Exam Archives', 
    value: statsData.value.total_exam_uploads?.toLocaleString() || '0', 
    trend: '24%', 
    trendUp: true, 
    icon: '<svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M14.5 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V7.5L14.5 2z"/><polyline points="14 2 14 8 20 8"/></svg>' 
  },
  { 
    title: 'Ongoing Mentoring', 
    value: '1,204', 
    trend: '8%', 
    trendUp: true, 
    icon: '<svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect width="18" height="18" x="3" y="4" rx="2" ry="2"/><line x1="16" x2="16" y1="2" y2="6"/><line x1="8" x2="8" y1="2" y2="6"/><line x1="3" x2="21" y1="10" y2="10"/></svg>' 
  }
])

const healthMetrics = [
  { name: 'AI Analyzer Status', desc: 'Latency: 124ms', status: 'Optimal', colorClass: 'bg-[#D0E3FF] text-[#081F5C]', icon: '<svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="m12 3-1.912 5.813a2 2 0 0 1-1.275 1.275L3 12l5.813 1.912a2 2 0 0 1 1.275 1.275L12 21l1.912-5.813a2 2 0 0 1 1.275-1.275L21 12l-5.813-1.912a2 2 0 0 1-1.275-1.275L12 3Z"/></svg>' },
  { name: 'Mentoring Stability', desc: 'Uptime: 99.9%', status: 'Optimal', colorClass: 'bg-emerald-100 text-emerald-700', icon: '<svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect width="18" height="18" x="3" y="4" rx="2" ry="2"/><line x1="16" x2="16" y1="2" y2="6"/><line x1="8" x2="8" y1="2" y2="6"/><line x1="3" x2="21" y1="10" y2="10"/></svg>' },
  { name: 'Quiz Engagement', desc: 'Completion: 84%', status: 'Optimal', colorClass: 'bg-sky-100 text-sky-700', icon: '<svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"/><path d="M9.09 9a3 3 0 0 1 5.83 1c0 2-3 3-3 3"/><line x1="12" x2="12.01" y1="17" y2="17"/></svg>' },
  { name: 'Forum Integrity', desc: 'Flagged: 0.2%', status: 'Warning', colorClass: 'bg-amber-100 text-amber-700', icon: '<svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="m21.73 18-8-14a2 2 0 0 0-3.48 0l-8 14A2 2 0 0 0 4 21h16a2 2 0 0 0 1.73-3Z"/><line x1="12" x2="12" y1="9" y2="13"/><line x1="12" x2="12.01" y1="17" y2="17"/></svg>' },
]

const moderationQueue = [
  { id: 701, type: 'Report', time: '10m ago', title: 'Indikasi Spam di Forum Kalkulus', desc: 'Pengguna terdeteksi melakukan penyebaran link promosi bot secara masif di forum akademik.' },
  { id: 702, type: 'Flagged', time: '45m ago', title: 'Materi Biologi Terduga Plagiat', desc: 'AI Analyzer mencatat kemiripan struktural sebesar 85% dengan jurnal literatur eksternal tanpa sitasi.' },
  { id: 703, type: 'Report', time: '1h ago', title: 'Pelanggaran Code of Conduct', desc: 'Tiga laporan beruntun atas komentar ofensif pada thread Diskusi Fisika Dasar.' }
]

const liveActivity = [
  { id: 1, title: 'Budi S. registrasi sebagai Pelajar', time: 'Baru saja', colorClass: 'bg-emerald-500', icon: '<circle cx="12" cy="12" r="10"/>' },
  { id: 2, title: 'Tutor Sarah memverifikasi 3 jawaban', time: '5m ago', colorClass: 'bg-[#334EAC]', icon: '<circle cx="12" cy="12" r="10"/>' },
  { id: 3, title: 'Sistem memblokir 1 spam bot', time: '12m ago', colorClass: 'bg-rose-500', icon: '<circle cx="12" cy="12" r="10"/>' },
  { id: 4, title: 'Mentoring #402 dijadwalkan ulang', time: '28m ago', colorClass: 'bg-sky-500', icon: '<circle cx="12" cy="12" r="10"/>' },
]
</script>
