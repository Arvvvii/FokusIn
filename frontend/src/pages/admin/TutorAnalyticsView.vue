<template>
  <div class="p-6 md:p-8 xl:p-10 max-w-[1600px] mx-auto animate-in fade-in duration-500">
    <div class="bg-white/60 backdrop-blur-xl rounded-3xl p-7 md:p-8 shadow-[0_10px_40px_rgba(15,23,42,0.06)] border border-slate-200/60 relative overflow-hidden mb-8">
      <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4 relative z-10">
        <div>
          <div class="flex items-center gap-2 mb-2">
            <RouterLink to="/admin/tutors" class="text-sm font-semibold text-[#081F5C] hover:underline">← Back to Tutors</RouterLink>
          </div>
          <h1 class="text-3xl md:text-4xl font-extrabold text-slate-900 tracking-tight leading-tight">Analitik Tutor</h1>
          <p class="text-[15px] text-slate-600 font-medium mt-2 max-w-xl leading-relaxed">Statistik performa, waktu mengajar, dan tingkat kepuasan.</p>
        </div>
      </div>
    </div>
    
    <div class="admin-card p-6 md:p-8">
      <div class="analytics-stats-grid">
        <div class="p-4 bg-slate-50 border border-slate-200 rounded-xl">
          <p class="text-xs font-bold text-slate-500 uppercase tracking-wider mb-1">Total Sesi</p>
          <p class="text-2xl font-bold text-slate-900">124</p>
        </div>
        <div class="p-4 bg-slate-50 border border-slate-200 rounded-xl">
          <p class="text-xs font-bold text-slate-500 uppercase tracking-wider mb-1">Siswa</p>
          <p class="text-2xl font-bold text-slate-900">89</p>
        </div>
        <div class="p-4 bg-slate-50 border border-slate-200 rounded-xl">
          <p class="text-xs font-bold text-slate-500 uppercase tracking-wider mb-1">Rating</p>
          <p class="text-2xl font-bold text-amber-500">4.9</p>
        </div>
        <div class="p-4 bg-slate-50 border border-slate-200 rounded-xl">
          <p class="text-xs font-bold text-slate-500 uppercase tracking-wider mb-1">Jam Ajar</p>
          <p class="text-2xl font-bold text-slate-900">45h</p>
        </div>
      </div>
      
      <div class="mt-8 border border-slate-200 rounded-xl p-6 flex flex-col items-center justify-center min-h-[300px] bg-slate-50/50">
        <svg xmlns="http://www.w3.org/2000/svg" width="48" height="48" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="text-slate-300 mb-4"><path d="M3 3v18h18"/><path d="m19 9-5 5-4-4-3 3"/></svg>
        <h3 class="text-lg font-bold text-slate-700">Grafik Kinerja</h3>
        <p class="text-sm text-slate-500 mt-2 text-center max-w-sm">Integrasi chart.js diperlukan untuk merender grafik data interaktif.</p>
      </div>
    </div>
  </div>
</template>

<script setup>
import { RouterLink, useRoute } from 'vue-router'

const route = useRoute()
const tutorId = route.params.id
</script>
