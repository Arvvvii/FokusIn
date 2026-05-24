<template>
  <div class="p-6 md:p-8 xl:p-10 max-w-[1600px] mx-auto animate-in fade-in duration-500">
    
    <!-- Header -->
    <div class="mb-10 flex flex-col sm:flex-row sm:items-end justify-between gap-4">
      <div>
        <h1 class="text-3xl font-bold text-slate-900 tracking-tight mb-2">Platform Overview</h1>
        <p class="text-slate-500 font-medium">Pantau kesehatan sistem, moderasi komunitas, dan performa AI secara real-time.</p>
      </div>
      <div class="flex items-center gap-3">
        <button class="px-4 py-2 bg-white text-slate-600 border border-slate-200 rounded-xl font-bold text-sm shadow-sm hover:bg-slate-50 transition-all flex items-center gap-2">
          <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"/><polyline points="7 10 12 15 17 10"/><line x1="12" x2="12" y1="15" y2="3"/></svg>
          Export Report
        </button>
      </div>
    </div>

    <!-- 1. HERO OVERVIEW (Stat Cards) -->
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-5 gap-4 mb-8">
      <div v-for="stat in overviewStats" :key="stat.title" class="bg-white/80 backdrop-blur-xl p-5 rounded-3xl border border-slate-100 shadow-[0_10px_40px_rgba(15,23,42,0.06)] relative overflow-hidden group transition-all duration-300 ease-out hover:-translate-y-1 hover:shadow-xl">
        <div class="absolute top-0 right-0 p-4 opacity-10 group-hover:scale-110 transition-transform duration-500" v-html="stat.icon"></div>
        <p class="text-[11px] font-extrabold text-slate-400 uppercase tracking-widest mb-1">{{ stat.title }}</p>
        <div class="flex items-end gap-2">
          <h3 class="text-3xl font-bold text-slate-900 tracking-tight">{{ stat.value }}</h3>
          <span :class="stat.trendUp ? 'text-emerald-500' : 'text-rose-500'" class="text-xs font-bold mb-1 flex items-center">
            <svg v-if="stat.trendUp" xmlns="http://www.w3.org/2000/svg" width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"><polyline points="22 7 13.5 15.5 8.5 10.5 2 17"/><polyline points="16 7 22 7 22 13"/></svg>
            <svg v-else xmlns="http://www.w3.org/2000/svg" width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"><polyline points="22 17 13.5 8.5 8.5 13.5 2 7"/><polyline points="16 17 22 17 22 11"/></svg>
            <span class="ml-1">{{ stat.trend }}</span>
          </span>
        </div>
      </div>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-3 gap-8 mb-8">
      <!-- 2. PLATFORM HEALTH -->
      <div class="bg-white/80 backdrop-blur-xl rounded-3xl border border-slate-100 shadow-[0_10px_40px_rgba(15,23,42,0.06)] p-6 lg:col-span-2 transition-all duration-300 ease-out hover:shadow-xl group/card">
        <div class="flex items-center justify-between mb-6">
          <h2 class="text-lg font-bold text-slate-900 tracking-tight">Platform Health</h2>
          <span class="px-2.5 py-1 bg-emerald-50 text-emerald-600 text-[10px] font-extrabold rounded-md uppercase tracking-widest border border-emerald-100">All Systems Operational</span>
        </div>
        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
          <div v-for="health in healthMetrics" :key="health.name" class="p-4 rounded-2xl border border-slate-100 bg-slate-50/50 flex items-center justify-between hover:bg-white hover:shadow-sm transition-all duration-300 ease-out">
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
              <span class="text-sm font-extrabold" :class="health.status === 'Optimal' ? 'text-emerald-500' : 'text-amber-500'">{{ health.status }}</span>
            </div>
          </div>
        </div>
      </div>

      <!-- 6. SYSTEM INSIGHT -->
      <div class="bg-gradient-to-br from-[#081F5C] to-[#334EAC] rounded-3xl p-6 shadow-[0_10px_40px_rgba(15,23,42,0.15)] relative overflow-hidden text-white flex flex-col justify-between group transition-all duration-300 ease-out hover:-translate-y-1 hover:shadow-2xl">
        <div class="absolute -right-10 -bottom-10 w-40 h-40 bg-[#7096D1] blur-3xl rounded-full opacity-30 pointer-events-none"></div>
        <div>
          <div class="flex items-center gap-2 mb-4">
            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="#BAD6EB" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="m12 3-1.912 5.813a2 2 0 0 1-1.275 1.275L3 12l5.813 1.912a2 2 0 0 1 1.275 1.275L12 21l1.912-5.813a2 2 0 0 1 1.275-1.275L21 12l-5.813-1.912a2 2 0 0 1-1.275-1.275L12 3Z"/></svg>
            <h2 class="text-xs font-extrabold text-[#BAD6EB] uppercase tracking-widest">System Insight AI</h2>
          </div>
          <p class="text-[15px] font-medium leading-relaxed mb-6">
            "FokusIn AI mendeteksi peningkatan aktivitas diskusi sebesar <strong>24%</strong> minggu ini, didorong oleh kategori <em>Ilmu Komputer</em>. Beban server stabil pada 42%."
          </p>
        </div>
        <button class="w-full py-3 bg-white/10 hover:bg-white/20 border border-white/10 rounded-xl text-white font-bold text-sm transition-all shadow-sm">
          Lihat Analitik Lengkap
        </button>
      </div>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-3 gap-8 mb-8">
      <!-- 3. MODERATION QUEUE -->
      <div class="bg-white/80 backdrop-blur-xl rounded-3xl border border-slate-100 shadow-[0_10px_40px_rgba(15,23,42,0.06)] p-6 lg:col-span-2 transition-all duration-300 ease-out hover:shadow-xl group/card">
        <div class="flex items-center justify-between mb-6">
          <h2 class="text-lg font-bold text-slate-900 tracking-tight">Moderation Queue</h2>
          <RouterLink to="/admin/reports" class="text-[11px] font-bold text-[#334EAC] hover:underline">Lihat Semua Laporan</RouterLink>
        </div>
        <div class="space-y-3">
          <div v-for="mod in moderationQueue" :key="mod.id" class="flex items-start justify-between p-4 rounded-2xl border border-slate-100 hover:border-[#7096D1]/30 transition-all duration-300 ease-out bg-white/50 hover:bg-white hover:shadow-sm">
            <div class="flex gap-4">
              <div class="mt-1">
                <svg v-if="mod.type === 'Report'" xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="#F43F5E" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="m21.73 18-8-14a2 2 0 0 0-3.48 0l-8 14A2 2 0 0 0 4 21h16a2 2 0 0 0 1.73-3Z"/><line x1="12" x2="12" y1="9" y2="13"/><line x1="12" x2="12.01" y1="17" y2="17"/></svg>
                <svg v-else xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="#F59E0B" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"/><line x1="12" x2="12" y1="8" y2="12"/><line x1="12" x2="12.01" y1="16" y2="16"/></svg>
              </div>
              <div>
                <div class="flex items-center gap-2 mb-1">
                  <span class="text-[10px] font-extrabold px-2 py-0.5 rounded-md uppercase tracking-widest" :class="mod.type === 'Report' ? 'bg-rose-50 text-rose-600' : 'bg-amber-50 text-amber-600'">{{ mod.type }}</span>
                  <span class="text-xs text-slate-400 font-medium">{{ mod.time }}</span>
                </div>
                <p class="text-sm font-bold text-slate-900 mb-1 tracking-tight">{{ mod.title }}</p>
                <p class="text-[13px] text-slate-500 line-clamp-1">{{ mod.desc }}</p>
              </div>
            </div>
            <button class="px-3 py-1.5 bg-[#EDF1F6] hover:bg-[#D0E3FF] text-[#334EAC] text-xs font-bold rounded-lg transition-colors shrink-0">Review</button>
          </div>
        </div>
      </div>

      <!-- 5. LIVE ACTIVITY -->
      <div class="bg-white/80 backdrop-blur-xl rounded-3xl border border-slate-100 shadow-[0_10px_40px_rgba(15,23,42,0.06)] p-6 transition-all duration-300 ease-out hover:shadow-xl group/card">
        <h2 class="text-lg font-bold text-slate-900 mb-6 tracking-tight">Live Activity</h2>
        <div class="space-y-6 relative before:absolute before:inset-y-0 before:left-[11px] before:w-px before:bg-slate-100">
          <div v-for="act in liveActivity" :key="act.id" class="flex gap-4 relative">
            <div class="w-6 h-6 rounded-full flex items-center justify-center shrink-0 border-2 border-white z-10" :class="act.colorClass">
              <svg xmlns="http://www.w3.org/2000/svg" width="10" height="10" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round" v-html="act.icon"></svg>
            </div>
            <div>
              <p class="text-[13px] font-bold text-slate-900 leading-snug tracking-tight">{{ act.title }}</p>
              <p class="text-[11px] font-medium text-slate-400">{{ act.time }}</p>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- 4. TOP CONTRIBUTORS -->
    <div class="bg-white/80 backdrop-blur-xl rounded-3xl border border-slate-100 shadow-[0_10px_40px_rgba(15,23,42,0.06)] p-6 mb-8 transition-all duration-300 ease-out hover:shadow-xl group/card">
      <div class="flex items-center justify-between mb-6">
        <h2 class="text-lg font-bold text-slate-900 tracking-tight">Top Contributors</h2>
        <button class="text-[11px] font-bold text-[#334EAC] hover:underline">Lihat Leaderboard</button>
      </div>
      <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
        <div v-for="user in topContributors" :key="user.name" class="flex items-center gap-4 p-4 rounded-2xl border border-slate-100 bg-white/50 hover:bg-white hover:shadow-md transition-all duration-300 ease-out group">
          <div class="w-12 h-12 rounded-full flex items-center justify-center text-white font-extrabold text-sm shrink-0" :class="user.avatarBg">
            {{ user.initials }}
          </div>
          <div class="flex-1 min-w-0">
            <h4 class="text-sm font-bold text-slate-900 truncate tracking-tight">{{ user.name }}</h4>
            <div class="flex items-center gap-2 mt-1">
              <span class="text-[10px] font-extrabold px-2 py-0.5 rounded-md uppercase tracking-widest bg-slate-100 text-slate-600">{{ user.role }}</span>
              <span class="text-xs font-bold text-amber-500 flex items-center gap-1">
                <svg xmlns="http://www.w3.org/2000/svg" width="10" height="10" viewBox="0 0 24 24" fill="currentColor" stroke="none"><polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"/></svg>
                {{ user.rep }}
              </span>
            </div>
          </div>
        </div>
      </div>
    </div>

  </div>
</template>

<script setup>
import { RouterLink } from 'vue-router'

const overviewStats = [
  { title: 'Total Users', value: '14,205', trend: '12%', trendUp: true, icon: '<svg width="40" height="40" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M16 21v-2a4 4 0 0 0-4-4H6a4 4 0 0 0-4 4v2"/><circle cx="9" cy="7" r="4"/><path d="M22 21v-2a4 4 0 0 0-3-3.87"/><path d="M16 3.13a4 4 0 0 1 0 7.75"/></svg>' },
  { title: 'Active Tutors', value: '342', trend: '4%', trendUp: true, icon: '<svg width="40" height="40" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M2 21a8 8 0 0 1 13.292-6"/><circle cx="10" cy="8" r="5"/><path d="m16 19 2 2 4-4"/></svg>' },
  { title: 'AI Requests Today', value: '8,431', trend: '24%', trendUp: true, icon: '<svg width="40" height="40" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="m12 3-1.912 5.813a2 2 0 0 1-1.275 1.275L3 12l5.813 1.912a2 2 0 0 1 1.275 1.275L12 21l1.912-5.813a2 2 0 0 1 1.275-1.275L21 12l-5.813-1.912a2 2 0 0 1-1.275-1.275L12 3Z"/></svg>' },
  { title: 'Active Discussions', value: '1,204', trend: '8%', trendUp: true, icon: '<svg width="40" height="40" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z"/></svg>' },
  { title: 'Pending Reports', value: '12', trend: '2%', trendUp: false, icon: '<svg width="40" height="40" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="m21.73 18-8-14a2 2 0 0 0-3.48 0l-8 14A2 2 0 0 0 4 21h16a2 2 0 0 0 1.73-3Z"/><line x1="12" x2="12" y1="9" y2="13"/><line x1="12" x2="12.01" y1="17" y2="17"/></svg>' },
]

const healthMetrics = [
  { name: 'AI Analyzer Status', desc: 'Latency: 124ms', status: 'Optimal', colorClass: 'bg-indigo-100 text-indigo-600', icon: '<path d="m12 3-1.912 5.813a2 2 0 0 1-1.275 1.275L3 12l5.813 1.912a2 2 0 0 1 1.275 1.275L12 21l1.912-5.813a2 2 0 0 1 1.275-1.275L21 12l-5.813-1.912a2 2 0 0 1-1.275-1.275L12 3Z"/>' },
  { name: 'Mentoring Stability', desc: 'Uptime: 99.9%', status: 'Optimal', colorClass: 'bg-emerald-100 text-emerald-600', icon: '<rect width="18" height="18" x="3" y="4" rx="2" ry="2"/><line x1="16" x2="16" y1="2" y2="6"/><line x1="8" x2="8" y1="2" y2="6"/><line x1="3" x2="21" y1="10" y2="10"/>' },
  { name: 'Quiz Engagement', desc: 'Completion: 84%', status: 'Optimal', colorClass: 'bg-sky-100 text-sky-600', icon: '<circle cx="12" cy="12" r="10"/><path d="M9.09 9a3 3 0 0 1 5.83 1c0 2-3 3-3 3"/><line x1="12" x2="12.01" y1="17" y2="17"/>' },
  { name: 'Forum Activity', desc: 'Flagged: 0.2%', status: 'Warning', colorClass: 'bg-amber-100 text-amber-600', icon: '<path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z"/>' },
]

const moderationQueue = [
  { id: 1, type: 'Report', time: '10m ago', title: 'Indikasi Spam di Forum Kalkulus', desc: 'User memposting link eksternal yang mencurigakan sebanyak 4 kali.' },
  { id: 2, type: 'Flagged', time: '45m ago', title: 'Materi Biologi Terduga Plagiat', desc: 'AI mendeteksi kesamaan 85% dengan jurnal eksternal tanpa sitasi.' },
  { id: 3, type: 'Report', time: '1h ago', title: 'Komentar Ofensif di Thread Fisika', desc: 'Dilaporkan oleh 3 pengguna berbeda karena penggunaan kata kasar.' }
]

const liveActivity = [
  { id: 1, title: 'Budi S. mendaftar sebagai Pelajar', time: 'Baru saja', colorClass: 'bg-emerald-500', icon: '<path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"/><circle cx="12" cy="7" r="4"/>' },
  { id: 2, title: 'Tutor Sarah memverifikasi 3 jawaban', time: '5m ago', colorClass: 'bg-[#334EAC]', icon: '<polyline points="20 6 9 17 4 12"/>' },
  { id: 3, title: 'Materi "Kalkulus Dasar" diunggah', time: '12m ago', colorClass: 'bg-indigo-500', icon: '<path d="M14 2v4a2 2 0 0 0 2 2h4"/><path d="M10.4 12.6a2 2 0 1 1 3 3L8 21l-4 1 1-4Z"/><path d="M20 18.5a2 2 0 1 0-4-4"/>' },
  { id: 4, title: 'Mentoring #402 dijadwalkan', time: '28m ago', colorClass: 'bg-sky-500', icon: '<rect width="18" height="18" x="3" y="4" rx="2" ry="2"/><line x1="16" x2="16" y1="2" y2="6"/><line x1="8" x2="8" y1="2" y2="6"/><line x1="3" x2="21" y1="10" y2="10"/>' },
]

const topContributors = [
  { name: 'Dr. Sarah R.', initials: 'SR', role: 'Best Mentor', rep: '15.4k', avatarBg: 'bg-gradient-to-br from-[#334EAC] to-[#081F5C]' },
  { name: 'Andi Pratama', initials: 'AP', role: 'Top Pelajar', rep: '4.2k', avatarBg: 'bg-gradient-to-br from-indigo-400 to-purple-500' },
  { name: 'Prof. Budi', initials: 'PB', role: 'Top Tutor', rep: '12.1k', avatarBg: 'bg-gradient-to-br from-emerald-400 to-teal-500' },
]
</script>
