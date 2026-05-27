<template>
  <div class="space-y-6 animate-in fade-in duration-500 max-w-7xl mx-auto">
    
    <!-- TOP ROW: Academic Hero & Recommender -->
    <section class="flex flex-col xl:flex-row gap-6">
      
      <!-- 1. Refined Academic Hero Card (Left) -->
      <div class="dashboard-hero xl:w-[70%] rounded-[18px] p-7 md:p-8 text-white relative overflow-hidden flex flex-col justify-between">
        
        <!-- Academic Mesh & Soft Radial Glow -->
        <div class="absolute inset-0 bg-[url('data:image/svg+xml;base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHdpZHRoPSI0MCIgaGVpZ2h0PSI0MCI+PHBhdGggZD0iTTAgMGg0MHY0MEgweiIgZmlsbD0ibm9uZSIvPgo8cGF0aCBkPSJNMCA0MGg0MFYweiIgZmlsbD0ibm9uZSIvPgo8cGF0aCBkPSJNMCA0MGg0MFYweiIgZmlsbD0ibm9uZSIgc3Ryb2tlPSIjZmZmZmZmIiBzdHJva2Utb3BhY2l0eT0iMC4wNSIgc3Ryb2tlLXdpZHRoPSIxIi8+Cjwvc3ZnPg==')] opacity-40 pointer-events-none"></div>
        <div class="absolute -right-20 -top-20 w-96 h-96 bg-[#334EAC] rounded-full blur-[90px] pointer-events-none opacity-50"></div>
        
        <div class="relative z-10 flex-1 flex flex-col justify-center">
          <div class="inline-flex items-center gap-2 px-3 py-1.5 bg-white/5 rounded-lg border border-white/10 mb-4 shadow-sm backdrop-blur-sm self-start">
            <span class="w-1.5 h-1.5 rounded-full bg-emerald-400 shadow-[0_0_8px_rgba(52,211,153,0.8)]"></span>
            <span class="text-[11px] font-semibold text-white tracking-wide uppercase">Semester 4 Aktif</span>
          </div>
          
          <h1 class="text-[26px] md:text-[28px] font-bold tracking-tight mb-2 text-white leading-tight">
            Selamat datang kembali, John.
          </h1>
          <p class="text-[14px] text-[#D0E3FF]/90 font-medium mb-8 max-w-xl leading-relaxed">
            Jelajahi, belajar, dan berkembang! Tingkatkan aktivitas di forum, jadwalkan sesi mentoring mendatang, dan pantau progres belajarmu.
          </p>
          
          <div class="flex flex-col sm:flex-row items-start sm:items-center gap-5 mt-auto">
            <RouterLink to="/pelajar/forum" class="h-11 px-6 bg-white text-[#081F5C] hover:bg-slate-50 rounded-xl font-bold text-[13px] transition-all duration-200 shadow-sm flex items-center justify-center gap-2 shrink-0 active:scale-95">
              Mulai Diskusi
              <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z"/></svg>
            </RouterLink>
            
            <!-- Compact Editorial Progress -->
            <div class="w-full sm:w-auto flex-1 max-w-xs pl-0 sm:pl-5 sm:border-l border-white/10 pt-2 sm:pt-0">
              <div class="flex justify-between items-end mb-2">
                <span class="text-[12px] font-semibold text-[#D0E3FF]/80">Progres Belajar</span>
                <span class="text-[13px] font-bold text-white">80%</span>
              </div>
              <div class="h-1.5 w-full bg-white/10 rounded-full overflow-hidden">
                <div class="hero-progress-bar h-full rounded-full w-[80%]"></div>
              </div>
            </div>
          </div>
        </div>
      </div>

      <!-- 2. Academic Recommender (Right) -->
      <div class="card-panel insight-panel xl:w-[30%] p-7 text-slate-800 relative flex flex-col overflow-hidden">
        
        <div class="relative z-10 flex items-center justify-between mb-4">
          <div class="flex items-center gap-2.5">
            <div class="ai-orb w-8 h-8 rounded-full flex items-center justify-center shrink-0 bg-[linear-gradient(135deg,#334EAC,#7096D1)] text-white">
              <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"><path d="M12 2v20"/><path d="M17 5H9.5a3.5 3.5 0 0 0 0 7h5a3.5 3.5 0 0 1 0 7H6"/></svg>
            </div>
            <span class="text-xs font-bold tracking-widest uppercase text-slate-900">Insight Akademik</span>
          </div>
          <span class="ai-conf-badge px-2 py-0.5 rounded text-[10px] font-bold uppercase tracking-wider">AI Conf: 88%</span>
        </div>

        <div class="relative z-10 flex-1 flex flex-col justify-center">
          <p class="text-slate-500 text-[13px] font-medium leading-relaxed mb-4">
            Berdasarkan analisis riwayat kuis dan tugas terbarumu, area berikut memerlukan perhatian:
          </p>
          <ul class="space-y-2.5 mb-6">
            <li class="flex flex-col gap-1.5 p-3 rounded-xl border border-slate-100 bg-slate-50">
              <div class="flex items-center justify-between">
                <span class="text-[12px] text-slate-900 font-bold">Kalkulus: Integral Parsial</span>
                <span class="px-1.5 py-0.5 bg-rose-100 text-rose-600 rounded text-[9px] font-extrabold uppercase">Prioritas Tinggi</span>
              </div>
              <div class="w-full h-1 bg-slate-200 rounded-full overflow-hidden">
                <div class="h-full bg-rose-400 w-[35%] rounded-full"></div>
              </div>
            </li>
            <li class="flex flex-col gap-1.5 p-3 rounded-xl border border-slate-100 bg-slate-50">
              <div class="flex items-center justify-between">
                <span class="text-[12px] text-slate-900 font-bold">Aljabar: Nilai Eigen</span>
                <span class="px-1.5 py-0.5 bg-amber-100 text-amber-600 rounded text-[9px] font-extrabold uppercase">Tinjau Ulang</span>
              </div>
              <div class="w-full h-1 bg-slate-200 rounded-full overflow-hidden">
                <div class="h-full bg-amber-400 w-[60%] rounded-full"></div>
              </div>
            </li>
          </ul>
        </div>

        <RouterLink to="/pelajar/ai-analyzer" class="relative z-10 w-full h-11 bg-[linear-gradient(135deg,#334EAC,#7096D1)] hover:opacity-90 text-white rounded-xl font-bold text-[12px] transition-opacity flex justify-center items-center gap-2 shadow-sm text-center">
          Buka Laporan AI
          <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M5 12h14"/><path d="m12 5 7 7-7 7"/></svg>
        </RouterLink>
      </div>
    </section>

    <!-- ONBOARDING NARRATIVE SECTION -->
    <section class="bg-white rounded-2xl p-6 shadow-sm border border-slate-200/80 relative overflow-hidden">
      <div class="mb-5">
        <h2 class="text-xl font-bold text-slate-900 mb-1 tracking-tight">Ekosistem Pembelajaran Vokasi</h2>
        <p class="text-slate-500 text-xs leading-relaxed">Manfaatkan seluruh fitur akademik FokusIn untuk mempercepat pemahaman materi.</p>
      </div>

      <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-5 gap-4">
        <!-- Card 1 -->
        <RouterLink to="/pelajar/forum" class="card-base ecosystem-card p-4 rounded-2xl block group/card">
          <div class="w-10 h-10 rounded-[10px] bg-[#F7F2EB] border border-[#D0E3FF]/50 flex items-center justify-center text-[#081F5C] mb-3 group-hover/card:scale-105 transition-transform">
             <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z"/></svg>
          </div>
          <h4 class="text-[13px] font-bold text-slate-900 tracking-tight mb-1 group-hover/card:text-[#334EAC] transition-colors">Forum Diskusi</h4>
          <p class="text-[11px] font-medium text-slate-500 leading-relaxed">Berbagi tanya jawab dan berkolaborasi antar pelajar.</p>
        </RouterLink>

        <!-- Card 2 -->
        <RouterLink to="/pelajar/ai-analyzer" class="card-base ecosystem-card p-4 rounded-2xl block group/card">
          <div class="w-10 h-10 rounded-[10px] bg-emerald-50 border border-emerald-100/50 flex items-center justify-center text-emerald-600 mb-3 group-hover/card:scale-105 transition-transform">
             <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M12 2v20"/><path d="M17 5H9.5a3.5 3.5 0 0 0 0 7h5a3.5 3.5 0 0 1 0 7H6"/></svg>
          </div>
          <h4 class="text-[13px] font-bold text-slate-900 tracking-tight mb-1 group-hover/card:text-[#334EAC] transition-colors">Pattern Analyzer</h4>
          <p class="text-[11px] font-medium text-slate-500 leading-relaxed">Analisis pola soal ujian secara mendalam.</p>
        </RouterLink>

        <!-- Card 3 -->
        <RouterLink to="/pelajar/mentoring" class="card-base ecosystem-card p-4 rounded-2xl block group/card">
          <div class="w-10 h-10 rounded-[10px] bg-amber-50 border border-amber-100/50 flex items-center justify-center text-amber-600 mb-3 group-hover/card:scale-105 transition-transform">
             <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><rect width="18" height="18" x="3" y="4" rx="2" ry="2"/><line x1="16" x2="16" y1="2" y2="6"/><line x1="8" x2="8" y1="2" y2="6"/><line x1="3" x2="21" y1="10" y2="10"/></svg>
          </div>
          <h4 class="text-[13px] font-bold text-slate-900 tracking-tight mb-1 group-hover/card:text-[#334EAC] transition-colors">Mentoring Akademik</h4>
          <p class="text-[11px] font-medium text-slate-500 leading-relaxed">Bimbingan belajar 1-on-1 bersama asisten dan tutor.</p>
        </RouterLink>

        <!-- Card 4 -->
        <RouterLink to="/pelajar/materials" class="card-base ecosystem-card p-4 rounded-2xl block group/card">
          <div class="w-10 h-10 rounded-[10px] bg-rose-50 border border-rose-100/50 flex items-center justify-center text-rose-600 mb-3 group-hover/card:scale-105 transition-transform">
             <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M4 19.5v-15A2.5 2.5 0 0 1 6.5 2H20v20H6.5a2.5 2.5 0 0 1 0-5H20"/></svg>
          </div>
          <h4 class="text-[13px] font-bold text-slate-900 tracking-tight mb-1 group-hover/card:text-[#334EAC] transition-colors">Repositori Materi</h4>
          <p class="text-[11px] font-medium text-slate-500 leading-relaxed">Akses kumpulan materi kuliah & catatan terbaik.</p>
        </RouterLink>

        <!-- Card 5 -->
        <RouterLink to="/pelajar/profile" class="card-base ecosystem-card p-4 rounded-2xl block group/card">
          <div class="w-10 h-10 rounded-[10px] bg-[#334EAC]/10 border border-[#334EAC]/10 flex items-center justify-center text-[#334EAC] mb-3 group-hover/card:scale-105 transition-transform">
             <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="8" r="6"/><path d="M15.477 12.89 17 22l-5-3-5 3 1.523-9.11"/></svg>
          </div>
          <h4 class="text-[13px] font-bold text-slate-900 tracking-tight mb-1 group-hover/card:text-[#334EAC] transition-colors">Capaian Akademik</h4>
          <p class="text-[11px] font-medium text-slate-500 leading-relaxed">Evaluasi poin reputasi, kontribusi, dan lencana.</p>
        </RouterLink>
      </div>
    </section>

    <!-- MIDDLE ROW: Compact Analytics Grid -->
    <section class="grid grid-cols-2 lg:grid-cols-4 gap-4">
      <div v-for="stat in stats" :key="stat.label" class="card-base p-4 rounded-2xl flex flex-col justify-between">
        <div class="flex items-center justify-between mb-3">
          <span class="text-[10px] font-bold text-slate-400 uppercase tracking-wider">{{ stat.label }}</span>
          <div class="w-8 h-8 rounded-lg flex items-center justify-center border" :class="stat.bg">
             <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" :class="stat.color" v-html="stat.icon"></svg>
          </div>
        </div>
        <div class="flex items-end justify-between">
          <h4 class="text-2xl font-bold text-slate-900 tracking-tight">{{ stat.value }}</h4>
          <div class="flex items-center gap-0.5 text-[10px] font-bold px-2 py-0.5 rounded" :class="stat.trend === 'up' ? 'text-emerald-600 bg-emerald-50 border border-emerald-100' : 'text-amber-600 bg-amber-50 border border-amber-100'">
            {{ stat.change }}
          </div>
        </div>
      </div>
    </section>

    <!-- BOTTOM ROW: Asymmetrical Editorial Panels -->
    <section class="grid grid-cols-1 lg:grid-cols-3 gap-6">
      
      <!-- Trending Discussions (Larger width) -->
      <div class="card-panel lg:col-span-2 p-6 flex flex-col">
        <div class="flex items-center justify-between mb-5">
          <h3 class="text-lg font-bold text-slate-900 tracking-tight">Diskusi Terpopuler Harian</h3>
          <RouterLink to="/pelajar/forum" class="text-xs font-bold text-[#334EAC] hover:text-[#7096D1] transition-colors flex items-center gap-1">
            Buka Forum
            <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="m9 18 6-6-6-6"/></svg>
          </RouterLink>
        </div>

        <div class="flex-1 space-y-2.5">
          <RouterLink :to="`/pelajar/forum/${disc.id}`" v-for="disc in discussions" :key="disc.title" class="group flex gap-3 items-center p-3 bg-slate-50 hover:bg-[#F7F2EB]/50 border border-slate-200/40 hover:border-slate-200 rounded-xl transition-all cursor-pointer">
            <div class="w-9 h-9 bg-white rounded-lg border border-slate-200 flex items-center justify-center shrink-0 text-[#334EAC]">
              <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z"/></svg>
            </div>
            <div class="flex-1 min-w-0">
              <h4 class="text-sm font-bold text-[#081F5C] truncate mb-0.5 group-hover:text-[#334EAC] transition-colors">{{ disc.title }}</h4>
              <div class="flex items-center gap-2 text-[10px] font-semibold text-slate-400">
                <span class="text-[#334EAC] bg-[#EDF1F6] px-1.5 py-0.5 rounded">{{ disc.category }}</span>
                <span class="flex items-center gap-0.5">
                  <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z"/></svg>
                  {{ disc.replies }}
                </span>
                <span>•</span>
                <span>{{ disc.time }}</span>
              </div>
            </div>
            <div class="text-slate-300 group-hover:text-[#334EAC] transition-colors pr-1">
              <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="m9 18 6-6-6-6"/></svg>
            </div>
          </RouterLink>
        </div>
      </div>

      <!-- Upcoming Mentoring (Right column) -->
      <div class="card-panel p-6 flex flex-col">
        <div class="flex items-center justify-between mb-5">
          <h3 class="text-lg font-bold text-slate-900 tracking-tight">Jadwal Sesi Terdekat</h3>
          <span class="px-2 py-0.5 bg-[#EDF1F6] text-[#334EAC] text-[10px] font-bold rounded">2 Sesi Aktif</span>
        </div>
        
        <div class="space-y-3 flex-1">
          <RouterLink to="/pelajar/mentoring" v-for="mentor in mentoring" :key="mentor.tutor" class="block flex flex-col p-3 bg-slate-50 border border-slate-200/50 hover:border-[#7096D1]/40 rounded-xl transition-all group">
            <div class="flex items-center gap-3 mb-2">
              <div class="w-10 h-10 bg-white rounded-lg flex flex-col items-center justify-center shrink-0 border border-slate-200">
                <span class="text-[8px] font-bold text-slate-400 uppercase leading-none">{{ mentor.dateMonth }}</span>
                <span class="text-base font-extrabold text-[#081F5C] leading-none mt-0.5">{{ mentor.dateDay }}</span>
              </div>
              <div class="min-w-0">
                <h4 class="text-xs font-bold text-[#081F5C] truncate group-hover:text-[#334EAC] transition-colors">{{ mentor.subject }}</h4>
                <p class="text-[10px] text-slate-400 font-medium">bersama {{ mentor.tutor }}</p>
              </div>
            </div>
            <div class="flex items-center justify-between pt-2 border-t border-slate-200/40">
              <span class="flex items-center gap-1 text-[10px] font-semibold text-slate-400">
                <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"/><polyline points="12 6 12 12 16 14"/></svg>
                {{ mentor.time }} WIB
              </span>
              <span class="text-[10px] font-bold text-[#334EAC] bg-[#EDF1F6] px-1.5 py-0.5 rounded">{{ mentor.type }}</span>
            </div>
          </RouterLink>
        </div>
      </div>
      
    </section>
  </div>
</template>

<script setup>
import { RouterLink } from 'vue-router'

const stats = [
  { label: 'Reputasi', value: '1,240', change: '+12%', trend: 'up', icon: '<polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"/>', color: 'text-amber-500', bg: 'bg-amber-50 border-amber-100/50' },
  { label: 'Total Diskusi', value: '48', change: '+3%', trend: 'up', icon: '<path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z"/>', color: 'text-[#334EAC]', bg: 'bg-[#334EAC]/10 border-[#334EAC]/10' },
  { label: 'Jawaban Terbaik', value: '15', change: '+1%', trend: 'up', icon: '<path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"/><polyline points="22 4 12 14.01 9 11.01"/>', color: 'text-emerald-500', bg: 'bg-emerald-50 border-emerald-100/50' },
  { label: 'Kuis Selesai', value: '24', change: '+2%', trend: 'up', icon: '<path d="M15 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V7Z"/><path d="M14 2v4a2 2 0 0 0 2 2h4"/><path d="M10 9H8"/><path d="M16 13H8"/><path d="M16 17H8"/>', color: 'text-[#7096D1]', bg: 'bg-[#7096D1]/10 border-[#7096D1]/10' },
]

const discussions = [
  { id: 1, title: 'Memahami Vue 3 Composition API', category: 'Pemrograman', replies: 12, time: '2 jam lalu' },
  { id: 2, title: 'Kalkulus: Trik Integral Parsial?', category: 'Matematika', replies: 8, time: '5 jam lalu' },
  { id: 3, title: 'Sumber belajar terbaik untuk persiapan TOEFL?', category: 'Bahasa Inggris', replies: 24, time: '1 hari lalu' },
  { id: 4, title: 'Bagaimana Algoritma Dijkstra bekerja secara nyata?', category: 'Ilmu Komputer', replies: 5, time: '2 hari lalu' },
]

const mentoring = [
  { tutor: 'Dr. Sarah Smith', subject: 'Algoritma Lanjut', dateMonth: 'Mei', dateDay: '25', time: '14:00', type: 'Video' },
  { tutor: 'Budi Santoso', subject: 'Aljabar Linear', dateMonth: 'Mei', dateDay: '27', time: '10:00', type: 'Chat' },
]
</script>

<style scoped>
/* Dashboard Specific Adjustments */
.dashboard-hero {
  background: linear-gradient(135deg, #081F5C 0%, #334EAC 100%);
  border: 1px solid rgba(112, 150, 209, 0.2);
  box-shadow: inset 0 2px 20px rgba(255,255,255,0.1), 0 8px 32px rgba(8, 31, 92, 0.15);
}
.hero-progress-bar {
  background: linear-gradient(90deg, #BAD6EB, #7096D1);
  box-shadow: 0 0 10px rgba(112,150,209,0.5);
}
.insight-panel {
  background: linear-gradient(135deg, rgba(255,255,255,0.9), rgba(237,241,246,0.7));
  border-top: 2px solid #7096D1;
}
.ai-conf-badge {
  background: linear-gradient(135deg, #334EAC, #7096D1);
  color: white;
  box-shadow: 0 2px 8px rgba(51,78,172,0.25);
}
.ecosystem-card {
  transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
}
.ecosystem-card:hover {
  background: rgba(255,255,255,0.95);
  border-color: rgba(112,150,209,0.3);
  transform: translateY(-4px);
  box-shadow: 0 12px 24px rgba(8,31,92,0.08);
}
</style>
