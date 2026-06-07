<template>
  <div class="relative min-h-screen pb-12 bg-[#F7F2EB]">
    <div class="max-w-[1450px] mx-auto px-4 sm:px-6 xl:px-8 py-6 space-y-5 animate-in fade-in duration-500">
      
      <!-- Back Navigation -->
      <div class="mb-6 flex items-center gap-2">
        <RouterLink
          to="/admin/quiz-monitoring"
          class="text-sm font-bold text-slate-400 hover:text-[#334EAC] transition-colors flex items-center gap-1 w-fit bg-white/50 px-3 py-1.5 rounded-lg border border-slate-200/50"
        >
          ← Kembali ke Monitoring Kuis
        </RouterLink>
      </div>

      <!-- Compact Editorial Header -->
      <div class="bg-white/60 backdrop-blur-xl rounded-3xl p-7 md:p-8 shadow-[0_10px_40px_rgba(15,23,42,0.06)] border border-slate-200/60 relative overflow-hidden flex flex-col sm:flex-row sm:items-center justify-between gap-5 mb-6">
        <div class="flex items-center gap-4">
          <span class="w-12 h-12 rounded-xl bg-[#334EAC]/10 text-[#334EAC] flex items-center justify-center shrink-0">
            <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><rect width="18" height="18" x="3" y="3" rx="2" ry="2"/><line x1="3" x2="21" y1="9" y2="9"/><line x1="9" x2="9" y1="21" y2="9"/></svg>
          </span>
          <div>
            <h1 class="text-3xl md:text-4xl font-extrabold text-slate-900 tracking-tight leading-tight">Analisis Komparatif Kuis</h1>
            <p class="text-[15px] text-slate-600 font-medium mt-2 max-w-xl leading-relaxed">Perbandingan hasil kuis antar kelas, analisis tingkat kesulitan soal, dan grafik performa historis.</p>
          </div>
        </div>
      </div>

      <!-- Comparison Metrics -->
      <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
        <div class="bg-white p-5 rounded-xl border border-slate-200 shadow-sm space-y-3">
          <h3 class="text-base font-semibold text-slate-900">Perbandingan Rata-rata Skor</h3>
          <div class="space-y-2">
            <div>
              <div class="flex justify-between text-xs font-bold text-slate-500 mb-1">
                <span>Ilmu Komputer (Kuis ES6+)</span>
                <span>82.0 / 100</span>
              </div>
              <div class="w-full h-2 bg-slate-100 rounded-full overflow-hidden">
                <div class="h-full bg-[#334EAC] w-[82%]"></div>
              </div>
            </div>
            <div>
              <div class="flex justify-between text-xs font-bold text-slate-500 mb-1">
                <span>Fisika (Termodinamika)</span>
                <span>69.8 / 100</span>
              </div>
              <div class="w-full h-2 bg-slate-100 rounded-full overflow-hidden">
                <div class="h-full bg-rose-500 w-[70%]"></div>
              </div>
            </div>
          </div>
        </div>

        <div class="bg-white p-5 rounded-xl border border-slate-200 shadow-sm space-y-3">
          <h3 class="text-base font-semibold text-slate-900">Tingkat Kesulitan Kuis</h3>
          <p class="text-sm text-slate-600 leading-relaxed">
            Kuis Fisika memiliki sebaran nilai dengan standar deviasi paling tinggi, menandakan tingkat variasi pemahaman materi yang memerlukan penyesuaian bobot ajar oleh pengampu.
          </p>
        </div>
      </div>

    </div>
  </div>
</template>

<script setup>
import { RouterLink } from 'vue-router'
</script>
