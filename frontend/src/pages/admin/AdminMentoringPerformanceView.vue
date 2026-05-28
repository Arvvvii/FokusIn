<template>
  <div class="relative min-h-screen pb-12 bg-[#F7F2EB]">
    <div class="max-w-[1450px] mx-auto px-4 sm:px-6 xl:px-8 py-6 space-y-5 animate-in fade-in duration-500">
      
      <!-- Compact Editorial Header -->
      <div class="bg-white/60 backdrop-blur-xl rounded-3xl p-7 md:p-8 shadow-[0_10px_40px_rgba(15,23,42,0.06)] border border-slate-200/60 relative overflow-hidden flex flex-col sm:flex-row sm:items-center justify-between gap-5 mb-6">
        <div class="flex items-center gap-4">
          <span class="w-12 h-12 rounded-xl bg-[#334EAC]/10 text-[#334EAC] flex items-center justify-center shrink-0">
            <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path d="M21.21 15.89A10 10 0 1 1 8 2.83"/></svg>
          </span>
          <div>
            <h1 class="text-3xl md:text-4xl font-extrabold text-slate-900 tracking-tight leading-tight">Laporan Kinerja Mentoring</h1>
            <p class="text-[15px] text-slate-600 font-medium mt-2 max-w-xl leading-relaxed">Statistik penyelesaian sesi, rating rata-rata tutor, dan kepuasan belajar mahasiswa.</p>
          </div>
        </div>
        <div class="flex shrink-0">
          <RouterLink to="/admin/mentoring" class="px-5 h-10 rounded-xl bg-white border border-slate-200 text-slate-700 hover:bg-slate-50 text-sm font-medium transition-all shadow-sm flex items-center justify-center">
            Kembali
          </RouterLink>
        </div>
      </div>

      <!-- Stats Grid -->
      <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
        <div class="bg-white p-4 rounded-xl border border-slate-200 shadow-sm">
          <p class="text-xs text-slate-500 font-semibold mb-1">Rasio Penyelesaian (Completion Rate)</p>
          <h3 class="text-xl font-bold text-slate-900">97.8%</h3>
          <p class="text-xs text-emerald-600 font-medium mt-1">Sangat Tinggi (Optimal)</p>
        </div>
        <div class="bg-white p-4 rounded-xl border border-slate-200 shadow-sm">
          <p class="text-xs text-slate-500 font-semibold mb-1">Rating Rata-rata Tutor</p>
          <h3 class="text-xl font-bold text-slate-900">4.89 / 5.00</h3>
          <p class="text-xs text-emerald-600 font-medium mt-1">Berdasarkan umpan balik semester ini</p>
        </div>
        <div class="bg-white p-4 rounded-xl border border-slate-200 shadow-sm">
          <p class="text-xs text-slate-500 font-semibold mb-1">Sesi Sukses Bulan Ini</p>
          <h3 class="text-xl font-bold text-slate-900">342 Sesi</h3>
          <p class="text-xs text-slate-400 font-medium mt-1">Sesuai dengan target kurikulum</p>
        </div>
      </div>

      <!-- Performance Insights -->
      <div class="bg-white rounded-xl border border-slate-200 p-5 shadow-sm space-y-4">
        <h3 class="text-base font-semibold text-slate-900 border-b border-slate-100 pb-2">Evaluasi Kualitas Sesi</h3>
        <p class="text-sm text-slate-600 leading-relaxed">
          Berdasarkan ekstraksi kuesioner otomatis, 94% pelajar menyatakan pemahaman materi fisika dasar meningkat signifikan setelah sesi privat. Latensi audio-video server terpantau stabil di bawah 95ms secara nasional.
        </p>
      </div>

    </div>
  </div>
</template>

<script setup>
import { RouterLink } from 'vue-router'
</script>
