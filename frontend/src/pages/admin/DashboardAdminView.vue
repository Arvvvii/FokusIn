<template>
  <div class="p-6 md:p-8 xl:p-10 max-w-[1600px] mx-auto animate-in fade-in duration-500">
    
    <!-- Header -->
    <div class="bg-white/60 backdrop-blur-xl rounded-3xl p-7 md:p-8 shadow-[0_10px_40px_rgba(15,23,42,0.06)] border border-slate-200/60 relative overflow-hidden mb-8">
      <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4 relative z-10">
        <div>
          <h1 class="text-3xl md:text-4xl font-extrabold text-slate-900 tracking-tight leading-tight">Platform Overview</h1>
          <p class="text-[15px] text-slate-600 font-medium mt-2 max-w-xl leading-relaxed">Pusat Kendali FokusIn: Pantau sistem, moderasi, dan metrik akademik secara real-time.</p>
        </div>
        <div class="flex items-center gap-3">
          <button @click="exportReport" class="px-5 py-2.5 bg-indigo-600 text-white rounded-xl font-semibold text-sm shadow-sm hover:bg-indigo-700 transition-all flex items-center gap-2">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"/><polyline points="7 10 12 15 17 10"/><line x1="12" x2="12" y1="15" y2="3"/></svg>
            Export Report
          </button>
        </div>
      </div>
    </div>

    <!-- 1. HERO OVERVIEW (Stat Cards) -->
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4 mb-8">
      <div v-for="stat in overviewStats" :key="stat.title" class="bg-white p-6 rounded-2xl border border-slate-200 shadow-sm transition-all hover:shadow-md">
        <div class="flex items-start justify-between mb-4">
          <div class="w-10 h-10 rounded-xl bg-slate-50 flex items-center justify-center text-slate-600 shrink-0" v-html="stat.icon"></div>
          <span :class="stat.trendUp ? 'text-emerald-600 bg-emerald-50' : 'text-rose-600 bg-rose-50'" class="text-xs font-bold px-2 py-1 rounded-md flex items-center gap-1">
            <svg v-if="stat.trendUp" xmlns="http://www.w3.org/2000/svg" width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"><polyline points="22 7 13.5 15.5 8.5 10.5 2 17"/><polyline points="16 7 22 7 22 13"/></svg>
            <svg v-else xmlns="http://www.w3.org/2000/svg" width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"><polyline points="22 17 13.5 8.5 8.5 13.5 2 7"/><polyline points="16 17 22 17 22 11"/></svg>
            {{ stat.trend }}
          </span>
        </div>
        <h3 class="text-[28px] font-bold text-slate-900 tracking-tight mb-1">{{ stat.value }}</h3>
        <p class="text-sm font-semibold text-slate-500">{{ stat.title }}</p>
      </div>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6 mb-8">
      <!-- 2. PLATFORM HEALTH -->
      <div class="bg-white rounded-2xl border border-slate-200 shadow-sm p-6 lg:col-span-2">
        <div class="flex items-center justify-between mb-6">
          <h2 class="text-lg font-bold text-slate-900 tracking-tight">Platform Health</h2>
          <span class="px-2.5 py-1 bg-emerald-50 text-emerald-700 text-xs font-semibold rounded-md border border-emerald-100">All Systems Operational</span>
        </div>
        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
          <div v-for="health in healthMetrics" :key="health.name" class="p-4 rounded-xl border border-slate-100 bg-slate-50/50 flex items-center justify-between">
            <div class="flex items-center gap-3">
              <div class="w-10 h-10 rounded-xl flex items-center justify-center shrink-0" :class="health.colorClass">
                <div v-html="health.icon"></div>
              </div>
              <div>
                <p class="text-sm font-bold text-slate-900 tracking-tight">{{ health.name }}</p>
                <p class="text-xs text-slate-500 font-medium">{{ health.desc }}</p>
              </div>
            </div>
            <div class="text-right">
              <span class="text-sm font-bold" :class="health.status === 'Optimal' ? 'text-emerald-600' : 'text-amber-600'">{{ health.status }}</span>
            </div>
          </div>
        </div>
      </div>

      <!-- 3. LIVE ACTIVITY -->
      <div class="bg-white rounded-2xl border border-slate-200 shadow-sm p-6">
        <h2 class="text-lg font-bold text-slate-900 mb-6 tracking-tight">System Logs</h2>
        <div class="space-y-5 relative before:absolute before:inset-y-0 before:left-[11px] before:w-px before:bg-slate-200">
          <div v-for="act in liveActivity" :key="act.id" class="flex gap-4 relative">
            <div class="w-6 h-6 rounded-full flex items-center justify-center shrink-0 border-2 border-white z-10" :class="act.colorClass">
              <svg xmlns="http://www.w3.org/2000/svg" width="10" height="10" viewBox="0 0 24 24" fill="white" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" v-html="act.icon"></svg>
            </div>
            <div>
              <p class="text-sm font-semibold text-slate-900 tracking-tight">{{ act.title }}</p>
              <p class="text-xs font-medium text-slate-500">{{ act.time }}</p>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- 4. MODERATION QUEUE -->
    <div class="bg-white rounded-2xl border border-slate-200 shadow-sm p-6 mb-8">
      <div class="flex items-center justify-between mb-6">
        <h2 class="text-lg font-bold text-slate-900 tracking-tight">Recent Moderation Queue</h2>
        <RouterLink to="/admin/moderation" class="text-sm font-semibold text-indigo-600 hover:text-indigo-700">Lihat Semua Antrean</RouterLink>
      </div>
      <div class="grid grid-cols-1 lg:grid-cols-3 gap-4">
        <div v-for="mod in moderationQueue" :key="mod.id" class="p-5 rounded-xl border border-slate-200 hover:border-slate-300 bg-white transition-all">
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
import { RouterLink } from 'vue-router'

const exportReport = () => {
  alert('Report sedang di-generate dan akan segera diunduh.')
}

const overviewStats = [
  { title: 'Total Registered Users', value: '14,205', trend: '12%', trendUp: true, icon: '<svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M16 21v-2a4 4 0 0 0-4-4H6a4 4 0 0 0-4 4v2"/><circle cx="9" cy="7" r="4"/><path d="M22 21v-2a4 4 0 0 0-3-3.87"/><path d="M16 3.13a4 4 0 0 1 0 7.75"/></svg>' },
  { title: 'Active Verified Tutors', value: '342', trend: '4%', trendUp: true, icon: '<svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M2 21a8 8 0 0 1 13.292-6"/><circle cx="10" cy="8" r="5"/><path d="m16 19 2 2 4-4"/></svg>' },
  { title: 'AI Validation Requests', value: '8,431', trend: '24%', trendUp: true, icon: '<svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="m12 3-1.912 5.813a2 2 0 0 1-1.275 1.275L3 12l5.813 1.912a2 2 0 0 1 1.275 1.275L12 21l1.912-5.813a2 2 0 0 1 1.275-1.275L21 12l-5.813-1.912a2 2 0 0 1-1.275-1.275L12 3Z"/></svg>' },
  { title: 'Ongoing Mentoring', value: '1,204', trend: '8%', trendUp: true, icon: '<svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect width="18" height="18" x="3" y="4" rx="2" ry="2"/><line x1="16" x2="16" y1="2" y2="6"/><line x1="8" x2="8" y1="2" y2="6"/><line x1="3" x2="21" y1="10" y2="10"/></svg>' }
]

const healthMetrics = [
  { name: 'AI Analyzer Status', desc: 'Latency: 124ms', status: 'Optimal', colorClass: 'bg-indigo-100 text-indigo-700', icon: '<svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="m12 3-1.912 5.813a2 2 0 0 1-1.275 1.275L3 12l5.813 1.912a2 2 0 0 1 1.275 1.275L12 21l1.912-5.813a2 2 0 0 1 1.275-1.275L21 12l-5.813-1.912a2 2 0 0 1-1.275-1.275L12 3Z"/></svg>' },
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
  { id: 2, title: 'Tutor Sarah memverifikasi 3 jawaban', time: '5m ago', colorClass: 'bg-indigo-500', icon: '<circle cx="12" cy="12" r="10"/>' },
  { id: 3, title: 'Sistem memblokir 1 spam bot', time: '12m ago', colorClass: 'bg-rose-500', icon: '<circle cx="12" cy="12" r="10"/>' },
  { id: 4, title: 'Mentoring #402 dijadwalkan ulang', time: '28m ago', colorClass: 'bg-sky-500', icon: '<circle cx="12" cy="12" r="10"/>' },
]
</script>
