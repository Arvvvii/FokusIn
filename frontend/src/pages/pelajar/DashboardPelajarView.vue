<template>
  <div class="space-y-6 md:space-y-8 animate-in fade-in duration-500">
    
    <!-- TOP ROW: Hero & Featured Module -->
    <section class="flex flex-col xl:flex-row gap-6 md:gap-8">
      
      <!-- 1. Large Hero Card (Left) -->
      <div class="xl:w-[70%] bg-gradient-to-br from-[#334EAC] to-[#081F5C] rounded-3xl p-8 md:p-12 text-white relative overflow-hidden shadow-[0_10px_40px_rgba(15,23,42,0.15)] flex flex-col justify-between min-h-[340px]">
        
        <!-- Decorative abstract glow -->
        <div class="absolute -right-24 -top-24 w-96 h-96 bg-white/10 blur-[100px] rounded-full pointer-events-none"></div>
        <div class="absolute bottom-0 right-10 w-64 h-64 bg-[#7096D1]/20 blur-[80px] rounded-full pointer-events-none"></div>
        
        <div class="relative z-10 max-w-2xl">
          <div class="inline-flex items-center gap-2 px-3.5 py-1.5 bg-white/10 backdrop-blur-md rounded-full border border-white/20 mb-6 shadow-sm">
            <span class="w-2 h-2 rounded-full bg-[#BAD6EB] shadow-[0_0_8px_#BAD6EB] animate-pulse"></span>
            <span class="text-[11px] font-bold text-white tracking-widest uppercase">Semester 4 Aktif</span>
          </div>
          
          <h1 class="text-4xl md:text-5xl lg:text-[3.5rem] font-extrabold tracking-tight mb-5 leading-[1.1] text-white">
            Selamat datang kembali, John. <br /> Mari pelajari hal baru hari ini.
          </h1>
          <p class="text-lg md:text-xl text-[#BAD6EB] font-medium mb-10 max-w-xl leading-relaxed">
            Kamu berada di top 15% angkatanmu. Pertahankan prestasimu dengan mengecek materi terbaru.
          </p>
          
          <div class="flex flex-col sm:flex-row items-start sm:items-center gap-6 md:gap-8">
            <RouterLink to="/pelajar/materials" class="px-7 py-4 bg-white text-slate-900 hover:bg-[#F7F2EB] rounded-2xl font-extrabold text-sm transition-all duration-300 ease-out shadow-[0_8px_20px_rgba(0,0,0,0.1)] hover:-translate-y-1 hover:shadow-xl active:scale-[0.98] flex items-center gap-3 shrink-0 group">
              Lanjutkan Belajar
              <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round" class="group-hover:translate-x-1 transition-transform"><path d="M5 12h14"/><path d="m12 5 7 7-7 7"/></svg>
            </RouterLink>
            
            <!-- Hero Progress Bar -->
            <div class="w-full sm:w-auto flex-1 max-w-xs">
              <div class="flex justify-between text-xs font-bold mb-2.5">
                <span class="text-[#BAD6EB] uppercase tracking-wider">Target Mingguan</span>
                <span class="text-white">80%</span>
              </div>
              <div class="h-2.5 w-full bg-black/20 rounded-full overflow-hidden backdrop-blur-sm border border-white/10">
                <div class="h-full bg-gradient-to-r from-[#BAD6EB] to-white rounded-full w-[80%] shadow-[0_0_10px_rgba(255,255,255,0.5)]"></div>
              </div>
            </div>
          </div>
        </div>
      </div>

      <!-- 2. Featured Module / Recommendation (Right) -->
      <div class="xl:w-[30%] bg-[#081F5C] rounded-3xl p-8 text-white relative shadow-[0_10px_40px_rgba(15,23,42,0.15)] flex flex-col overflow-hidden border border-white/5">
        
        <!-- Abstract overlay -->
        <div class="absolute inset-0 opacity-20 pointer-events-none" style="background-image: radial-gradient(circle at 100% 0%, #7096D1 0%, transparent 60%);"></div>

        <div class="relative z-10 flex items-center justify-between mb-8">
          <div class="flex items-center gap-3">
            <div class="w-10 h-10 rounded-xl bg-gradient-to-br from-[#7096D1] to-[#334EAC] flex items-center justify-center shadow-inner border border-white/20">
               <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="white" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="m12 3-1.912 5.813a2 2 0 0 1-1.275 1.275L3 12l5.813 1.912a2 2 0 0 1 1.275 1.275L12 21l1.912-5.813a2 2 0 0 1 1.275-1.275L21 12l-5.813-1.912a2 2 0 0 1-1.275-1.275L12 3Z"/></svg>
            </div>
            <span class="text-sm font-extrabold tracking-wide uppercase text-[#BAD6EB]">Modul AI</span>
          </div>
          <button class="text-[#7096D1] hover:text-white transition-colors bg-white/5 hover:bg-white/10 p-2 rounded-lg">
            <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="1"/><circle cx="19" cy="12" r="1"/><circle cx="5" cy="12" r="1"/></svg>
          </button>
        </div>

        <div class="relative z-10 flex-1 flex flex-col justify-center">
          <h3 class="text-[1.3rem] font-bold tracking-tight mb-2 leading-snug text-white">Rekomendasi FokusIn AI</h3>
          <p class="text-[#BAD6EB] text-[13px] leading-relaxed font-medium mb-4">
            Berdasarkan performa terakhrmu (Confidence Level 85%), kamu disarankan untuk mempelajari kembali:
          </p>
          <ul class="space-y-2 mb-6">
            <li class="flex items-center gap-2 text-sm text-white font-bold bg-white/10 px-3 py-2 rounded-xl">
              <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="#7096D1" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"><polyline points="20 6 9 17 4 12"/></svg>
              Integral Parsial
            </li>
            <li class="flex items-center gap-2 text-sm text-white font-bold bg-white/10 px-3 py-2 rounded-xl">
              <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="#7096D1" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"><polyline points="20 6 9 17 4 12"/></svg>
              Turunan Tingkat Lanjut
            </li>
            <li class="flex items-center gap-2 text-sm text-white font-bold bg-white/10 px-3 py-2 rounded-xl">
              <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="#7096D1" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"><polyline points="20 6 9 17 4 12"/></svg>
              Dynamic Programming
            </li>
          </ul>
        </div>

        <RouterLink to="/pelajar/materials/1" class="relative z-10 w-full py-4 bg-white/10 hover:bg-white/20 border border-white/10 rounded-2xl text-white font-bold text-sm transition-all duration-300 ease-out flex justify-center items-center gap-2 hover:-translate-y-1 hover:shadow-xl active:scale-[0.98] shadow-sm">
          Mulai Modul
          <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M5 12h14"/><path d="m12 5 7 7-7 7"/></svg>
        </RouterLink>
      </div>
    </section>

    <!-- ONBOARDING NARRATIVE SECTION -->
    <section class="bg-white/80 backdrop-blur-xl rounded-3xl p-8 lg:p-10 shadow-[0_10px_40px_rgba(15,23,42,0.06)] border border-slate-100 relative overflow-hidden group">
      <div class="absolute top-0 right-0 w-64 h-64 bg-gradient-to-bl from-[#7096D1]/10 to-transparent blur-3xl pointer-events-none"></div>
      
      <div class="mb-8 relative z-10">
        <h2 class="text-2xl md:text-3xl font-bold text-slate-900 mb-2 tracking-tight">Jelajahi, Belajar, dan Berkembang!</h2>
        <p class="text-slate-500 font-medium text-[15px] leading-relaxed">Manfaatkan ekosistem FokusIn secara penuh untuk mengakselerasi belajarmu.</p>
      </div>

      <div class="grid grid-cols-1 md:grid-cols-3 lg:grid-cols-5 gap-4 lg:gap-6 relative z-10">
        <!-- Card 1 -->
        <RouterLink to="/pelajar/forum" class="bg-slate-50/50 hover:bg-[#F7F2EB]/50 border border-slate-100 hover:border-[#7096D1]/30 p-5 rounded-3xl transition-all hover:-translate-y-1 block group/card">
          <div class="w-12 h-12 rounded-2xl bg-white shadow-sm flex items-center justify-center text-xl mb-4 group-hover/card:scale-110 transition-transform">🚀</div>
          <h4 class="text-[14px] font-extrabold text-[#081F5C] mb-2">Diskusi Aktif</h4>
          <p class="text-[12px] font-medium text-slate-500 leading-relaxed">Jangan ragu bertanya dan bantu temanmu.</p>
        </RouterLink>

        <!-- Card 2 -->
        <RouterLink to="/pelajar/ai-analyzer" class="bg-slate-50/50 hover:bg-indigo-50/50 border border-slate-100 hover:border-indigo-200/50 p-5 rounded-3xl transition-all hover:-translate-y-1 block group/card">
          <div class="w-12 h-12 rounded-2xl bg-white shadow-sm flex items-center justify-center text-xl mb-4 group-hover/card:scale-110 transition-transform">🤖</div>
          <h4 class="text-[14px] font-extrabold text-[#081F5C] mb-2">AI Pattern Analyzer</h4>
          <p class="text-[12px] font-medium text-slate-500 leading-relaxed">Biarkan AI memetakan pola materi penting.</p>
        </RouterLink>

        <!-- Card 3 -->
        <RouterLink to="/pelajar/mentoring" class="bg-slate-50/50 hover:bg-emerald-50/50 border border-slate-100 hover:border-emerald-200/50 p-5 rounded-3xl transition-all hover:-translate-y-1 block group/card">
          <div class="w-12 h-12 rounded-2xl bg-white shadow-sm flex items-center justify-center text-xl mb-4 group-hover/card:scale-110 transition-transform">🎓</div>
          <h4 class="text-[14px] font-extrabold text-[#081F5C] mb-2">Booking Tutor</h4>
          <p class="text-[12px] font-medium text-slate-500 leading-relaxed">Temukan tutor terbaik pembimbing studimu.</p>
        </RouterLink>

        <!-- Card 4 -->
        <RouterLink to="/pelajar/materials" class="bg-slate-50/50 hover:bg-[#EDF1F6]/50 border border-slate-100 hover:border-[#334EAC]/30 p-5 rounded-3xl transition-all hover:-translate-y-1 block group/card">
          <div class="w-12 h-12 rounded-2xl bg-white shadow-sm flex items-center justify-center text-xl mb-4 group-hover/card:scale-110 transition-transform">📚</div>
          <h4 class="text-[14px] font-extrabold text-[#081F5C] mb-2">Akses Materi</h4>
          <p class="text-[12px] font-medium text-slate-500 leading-relaxed">Jelajahi materi dari tutor dan kating.</p>
        </RouterLink>

        <!-- Card 5 -->
        <RouterLink to="/pelajar/profile" class="bg-slate-50/50 hover:bg-amber-50/50 border border-slate-100 hover:border-amber-200/50 p-5 rounded-3xl transition-all hover:-translate-y-1 block group/card">
          <div class="w-12 h-12 rounded-2xl bg-white shadow-sm flex items-center justify-center text-xl mb-4 group-hover/card:scale-110 transition-transform">⭐</div>
          <h4 class="text-[14px] font-extrabold text-[#081F5C] mb-2">Badge & Reputasi</h4>
          <p class="text-[12px] font-medium text-slate-500 leading-relaxed">Kumpulkan reputasi dan raih badge.</p>
        </RouterLink>
      </div>
    </section>

    <!-- MIDDLE ROW: 3. Compact Analytics Grid -->
    <section class="grid grid-cols-2 lg:grid-cols-4 gap-4 md:gap-6">
      <div v-for="stat in stats" :key="stat.label" class="bg-white/80 backdrop-blur-xl rounded-3xl p-5 shadow-[0_10px_40px_rgba(15,23,42,0.06)] border border-slate-100 flex flex-col justify-between transition-all duration-300 ease-out hover:-translate-y-1 hover:shadow-xl group">
        <div class="flex items-center justify-between mb-4">
          <span class="text-xs font-bold text-slate-400 uppercase tracking-wider">{{ stat.label }}</span>
          <div class="w-9 h-9 rounded-xl flex items-center justify-center shrink-0 shadow-sm border" :class="stat.bg">
             <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" :class="stat.color" v-html="stat.icon"></svg>
          </div>
        </div>
        <div class="flex items-end justify-between relative">
          <div class="absolute -top-10 -right-10 w-24 h-24 bg-current opacity-[0.03] blur-xl rounded-full pointer-events-none group-hover:opacity-[0.08] transition-opacity" :class="stat.color"></div>
          <h4 class="text-3xl font-bold text-slate-900 tracking-tight">{{ stat.value }}</h4>
          <div class="flex items-center gap-1 text-[11px] font-extrabold px-2 py-1 rounded-lg" :class="stat.trend === 'up' ? 'text-emerald-600 bg-emerald-50 border border-emerald-100' : 'text-amber-600 bg-amber-50 border border-amber-100'">
            <svg v-if="stat.trend === 'up'" xmlns="http://www.w3.org/2000/svg" width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"><path d="m18 15-6-6-6 6"/></svg>
            {{ stat.change }}
          </div>
        </div>
      </div>
    </section>

    <!-- BOTTOM ROW: 4. Content Cards (Split) -->
    <section class="grid grid-cols-1 lg:grid-cols-3 gap-6 md:gap-8">
      
      <!-- Trending Discussions (Larger width) -->
      <div class="lg:col-span-2 bg-white/80 backdrop-blur-xl rounded-3xl p-7 md:p-8 shadow-[0_10px_40px_rgba(15,23,42,0.06)] border border-slate-100 flex flex-col">
        <div class="flex items-center justify-between mb-6">
          <h3 class="text-xl font-bold text-slate-900 tracking-tight">Diskusi Populer</h3>
          <RouterLink to="/pelajar/forum" class="text-sm font-bold text-[#334EAC] hover:text-[#7096D1] transition-colors flex items-center gap-1">
            Lihat Semua
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="m9 18 6-6-6-6"/></svg>
          </RouterLink>
        </div>

        <div class="flex-1 space-y-3">
          <RouterLink :to="`/pelajar/forum/${disc.id}`" v-for="disc in discussions" :key="disc.title" class="group flex gap-4 items-center p-4 bg-[#EDF1F6]/50 hover:bg-[#F7F2EB] border border-transparent hover:border-slate-200 rounded-2xl transition-all cursor-pointer">
            <div class="w-12 h-12 bg-white rounded-xl shadow-[0_2px_10px_rgba(0,0,0,0.03)] border border-slate-100 flex items-center justify-center shrink-0 text-[#334EAC] group-hover:bg-[#334EAC] group-hover:text-white transition-colors">
              <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z"/></svg>
            </div>
            <div class="flex-1 min-w-0">
              <h4 class="text-[15px] font-bold text-[#081F5C] leading-snug truncate mb-1">{{ disc.title }}</h4>
              <div class="flex items-center gap-2.5 text-xs font-semibold text-slate-400">
                <span class="text-[#334EAC] bg-[#EDF1F6] px-2 py-0.5 rounded-md">{{ disc.category }}</span>
                <span class="flex items-center gap-1">
                  <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z"/></svg>
                  {{ disc.replies }}
                </span>
                <span>•</span>
                <span>{{ disc.time }}</span>
              </div>
            </div>
            <div class="hidden sm:flex text-slate-300 group-hover:text-[#334EAC] transition-colors pr-2">
              <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="m9 18 6-6-6-6"/></svg>
            </div>
          </RouterLink>
        </div>
      </div>

      <!-- Upcoming Mentoring (Right narrow column) -->
      <div class="bg-white/80 backdrop-blur-xl rounded-3xl p-7 md:p-8 shadow-[0_10px_40px_rgba(15,23,42,0.06)] border border-slate-100 flex flex-col">
        <div class="flex items-center justify-between mb-6">
          <h3 class="text-xl font-bold text-slate-900 tracking-tight">Jadwal Mendatang</h3>
          <span class="px-2.5 py-1 bg-[#EDF1F6] text-[#334EAC] text-[10px] font-extrabold rounded-lg uppercase tracking-wider">2 Sesi</span>
        </div>
        
        <div class="space-y-4 flex-1">
          <RouterLink to="/pelajar/mentoring" v-for="mentor in mentoring" :key="mentor.tutor" class="block flex flex-col p-4 bg-white/50 border border-slate-100 hover:border-[#7096D1]/40 rounded-2xl shadow-sm transition-all duration-300 ease-out hover:-translate-y-1 hover:shadow-md group">
            <div class="flex items-center gap-4 mb-3">
              <div class="w-14 h-14 bg-gradient-to-br from-[#F7F2EB] to-[#EDF1F6] rounded-2xl flex flex-col items-center justify-center shrink-0 border border-slate-200/50 shadow-inner group-hover:bg-[#334EAC] transition-colors">
                <span class="text-[9px] font-bold text-slate-500 uppercase tracking-widest group-hover:text-[#BAD6EB]">{{ mentor.dateMonth }}</span>
                <span class="text-[18px] font-extrabold text-[#081F5C] leading-none mt-0.5 group-hover:text-white">{{ mentor.dateDay }}</span>
              </div>
              <div>
                <h4 class="text-[15px] font-bold text-[#081F5C] mb-1 leading-tight group-hover:text-[#334EAC] transition-colors">{{ mentor.subject }}</h4>
                <p class="text-[12px] font-semibold text-slate-400">bersama {{ mentor.tutor }}</p>
              </div>
            </div>
            <div class="flex items-center justify-between mt-auto pt-3 border-t border-slate-50">
              <span class="flex items-center gap-1.5 text-xs font-bold text-slate-400">
                <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"/><polyline points="12 6 12 12 16 14"/></svg>
                {{ mentor.time }}
              </span>
              <div class="w-8 h-8 rounded-full bg-[#EDF1F6] text-[#334EAC] flex items-center justify-center group-hover:bg-[#334EAC] group-hover:text-white transition-colors shadow-sm">
                <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><polygon points="5 3 19 12 5 21 5 3"/></svg>
              </div>
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
