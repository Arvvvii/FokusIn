<template>
  <div class="space-y-6 animate-in fade-in duration-500 max-w-7xl mx-auto">
    
    <!-- TOP ROW: Academic Hero & Recommender -->
    <section class="flex flex-col xl:flex-row gap-6">
      
      <!-- 1. Refined Academic Hero Card (Left) -->
      <div class="xl:w-[70%] bg-gradient-to-br from-[#081F5C] to-[#334EAC] rounded-2xl p-6 md:p-8 text-white relative overflow-hidden shadow-md border border-[#334EAC]/20 flex flex-col justify-between min-h-[280px]">
        
        <!-- Subtle graphic border decoration instead of giant glows -->
        <div class="absolute inset-0 border border-white/5 rounded-2xl pointer-events-none"></div>
        <div class="absolute -right-16 -top-16 w-64 h-64 border border-white/10 rounded-full pointer-events-none"></div>
        
        <div class="relative z-10 max-w-2xl">
          <div class="inline-flex items-center gap-2 px-3 py-1 bg-white/10 rounded-full border border-white/10 mb-4 shadow-sm">
            <span class="w-1.5 h-1.5 rounded-full bg-[#BAD6EB] shadow-sm animate-pulse"></span>
            <span class="text-[10px] font-bold text-white tracking-wider uppercase">Semester 4 Aktif</span>
          </div>
          
          <h1 class="text-2xl md:text-3xl font-bold tracking-tight mb-3 text-white leading-tight">
            Selamat datang kembali, John. <br />Pantau progres belajar dan aktivitas akademikmu.
          </h1>
          <p class="text-sm md:text-base text-[#BAD6EB] font-normal mb-8 max-w-xl leading-relaxed">
            Kamu berada di top 15% angkatanmu semester ini. Lanjutkan untuk mempertahankan capaian akademikmu.
          </p>
          
          <div class="flex flex-col sm:flex-row items-start sm:items-center gap-6">
            <RouterLink to="/pelajar/materials" class="px-5 py-3 bg-white text-[#081F5C] hover:bg-[#F7F2EB] rounded-xl font-bold text-xs transition-all duration-200 ease-out shadow-sm flex items-center gap-2 group">
              Lanjutkan Belajar
              <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" class="group-hover:translate-x-1 transition-transform"><path d="M5 12h14"/><path d="m12 5 7 7-7 7"/></svg>
            </RouterLink>
            
            <!-- Hero Progress Bar -->
            <div class="w-full sm:w-auto flex-1 max-w-xs">
              <div class="flex justify-between text-[11px] font-bold mb-1.5">
                <span class="text-[#BAD6EB] uppercase tracking-wider">Capaian Target Mingguan</span>
                <span class="text-white">80%</span>
              </div>
              <div class="h-2 w-full bg-black/20 rounded-full overflow-hidden border border-white/5">
                <div class="h-full bg-[#BAD6EB] rounded-full w-[80%]"></div>
              </div>
            </div>
          </div>
        </div>
      </div>

      <!-- 2. Academic Recommender (Right) -->
      <div class="xl:w-[30%] bg-white rounded-2xl p-6 text-slate-800 relative shadow-sm flex flex-col overflow-hidden border border-slate-200/80">
        
        <div class="relative z-10 flex items-center justify-between mb-5">
          <div class="flex items-center gap-3">
            <div class="w-8 h-8 rounded-lg bg-[#EDF1F6] flex items-center justify-center border border-slate-200">
               <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="#334EAC" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="m12 3-1.912 5.813a2 2 0 0 1-1.275 1.275L3 12l5.813 1.912a2 2 0 0 1 1.275 1.275L12 21l1.912-5.813a2 2 0 0 1 1.275-1.275L21 12l-5.813-1.912a2 2 0 0 1-1.275-1.275L12 3Z"/></svg>
            </div>
            <span class="text-xs font-bold tracking-wider uppercase text-[#081F5C]">Rekomendasi Studi AI</span>
          </div>
        </div>

        <div class="relative z-10 flex-1 flex flex-col justify-center">
          <p class="text-slate-500 text-[12px] leading-relaxed mb-3">
            Berdasarkan performa pengerjaan kuis terakhir (Confidence Level 85%), kamu disarankan untuk mengulas kembali:
          </p>
          <ul class="space-y-1.5 mb-5">
            <li class="flex items-center gap-2 text-xs text-slate-700 font-bold bg-[#EDF1F6]/50 px-3 py-2 rounded-lg border border-slate-200/50">
              <span class="w-1.5 h-1.5 rounded-full bg-[#334EAC]"></span>
              Integral Parsial (Matematika)
            </li>
            <li class="flex items-center gap-2 text-xs text-slate-700 font-bold bg-[#EDF1F6]/50 px-3 py-2 rounded-lg border border-slate-200/50">
              <span class="w-1.5 h-1.5 rounded-full bg-[#334EAC]"></span>
              Turunan Tingkat Lanjut (Matematika)
            </li>
            <li class="flex items-center gap-2 text-xs text-slate-700 font-bold bg-[#EDF1F6]/50 px-3 py-2 rounded-lg border border-slate-200/50">
              <span class="w-1.5 h-1.5 rounded-full bg-[#334EAC]"></span>
              Dynamic Programming (Ilmu Komputer)
            </li>
          </ul>
        </div>

        <RouterLink to="/pelajar/materials" class="relative z-10 w-full py-3 bg-[#EDF1F6] hover:bg-[#334EAC] hover:text-white text-[#334EAC] border border-[#334EAC]/10 rounded-xl font-bold text-xs transition-colors flex justify-center items-center gap-2 shadow-sm text-center">
          Mulai Ulasan
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
        <RouterLink to="/pelajar/forum" class="bg-slate-50 hover:bg-[#F7F2EB]/50 border border-slate-200/60 p-4 rounded-xl transition-all block group/card">
          <div class="w-10 h-10 rounded-lg bg-white border border-slate-200 shadow-sm flex items-center justify-center text-lg mb-3">💬</div>
          <h4 class="text-[13px] font-bold text-[#081F5C] mb-1">Forum Diskusi</h4>
          <p class="text-[11px] text-slate-500 leading-normal">Berbagi tanya jawab dan berkolaborasi antar pelajar.</p>
        </RouterLink>

        <!-- Card 2 -->
        <RouterLink to="/pelajar/ai-analyzer" class="bg-slate-50 hover:bg-[#F7F2EB]/50 border border-slate-200/60 p-4 rounded-xl transition-all block group/card">
          <div class="w-10 h-10 rounded-lg bg-white border border-slate-200 shadow-sm flex items-center justify-center text-lg mb-3">🔬</div>
          <h4 class="text-[13px] font-bold text-[#081F5C] mb-1">Pattern Analyzer</h4>
          <p class="text-[11px] text-slate-500 leading-normal">Analisis pola soal ujian secara mendalam.</p>
        </RouterLink>

        <!-- Card 3 -->
        <RouterLink to="/pelajar/mentoring" class="bg-slate-50 hover:bg-[#F7F2EB]/50 border border-slate-200/60 p-4 rounded-xl transition-all block group/card">
          <div class="w-10 h-10 rounded-lg bg-white border border-slate-200 shadow-sm flex items-center justify-center text-lg mb-3">👩‍🏫</div>
          <h4 class="text-[13px] font-bold text-[#081F5C] mb-1">Mentoring Akademik</h4>
          <p class="text-[11px] text-slate-500 leading-normal">Bimbingan belajar 1-on-1 bersama asisten dan tutor.</p>
        </RouterLink>

        <!-- Card 4 -->
        <RouterLink to="/pelajar/materials" class="bg-slate-50 hover:bg-[#F7F2EB]/50 border border-slate-200/60 p-4 rounded-xl transition-all block group/card">
          <div class="w-10 h-10 rounded-lg bg-white border border-slate-200 shadow-sm flex items-center justify-center text-lg mb-3">📖</div>
          <h4 class="text-[13px] font-bold text-[#081F5C] mb-1">Repositori Materi</h4>
          <p class="text-[11px] text-slate-500 leading-normal">Akses kumpulan materi kuliah & catatan terbaik.</p>
        </RouterLink>

        <!-- Card 5 -->
        <RouterLink to="/pelajar/profile" class="bg-slate-50 hover:bg-[#F7F2EB]/50 border border-slate-200/60 p-4 rounded-xl transition-all block group/card">
          <div class="w-10 h-10 rounded-lg bg-white border border-slate-200 shadow-sm flex items-center justify-center text-lg mb-3">🏆</div>
          <h4 class="text-[13px] font-bold text-[#081F5C] mb-1">Capaian Akademik</h4>
          <p class="text-[11px] text-slate-500 leading-normal">Evaluasi poin reputasi, kontribusi, dan lencana.</p>
        </RouterLink>
      </div>
    </section>

    <!-- MIDDLE ROW: Compact Analytics Grid -->
    <section class="grid grid-cols-2 lg:grid-cols-4 gap-4">
      <div v-for="stat in stats" :key="stat.label" class="bg-white rounded-2xl p-4 border border-slate-200/80 flex flex-col justify-between shadow-sm transition-all hover:border-[#7096D1]/50">
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
      <div class="lg:col-span-2 bg-white rounded-2xl p-6 border border-slate-200/80 flex flex-col shadow-sm">
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
      <div class="bg-white rounded-2xl p-6 border border-slate-200/80 flex flex-col shadow-sm">
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
