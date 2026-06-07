<template>
  <div class="space-y-8 w-full pb-12">
    <!-- Back Navigation -->
    <div class="mb-6 flex items-center gap-2">
      <RouterLink
        to="/tutor/dashboard"
        class="text-sm font-bold text-slate-400 hover:text-[#334EAC] transition-colors flex items-center gap-1 w-fit bg-white/50 px-3 py-1.5 rounded-lg border border-slate-200/50"
      >
        ← Kembali ke Dashboard
      </RouterLink>
    </div>

    <!-- 1. EDITORIAL WORKSPACE HEADER SECTION -->
    <div class="bg-white border border-slate-200 shadow-sm rounded-2xl p-7 md:p-8 flex flex-col md:flex-row md:items-center justify-between gap-6 relative mb-8">
        <div class="absolute right-0 top-0 w-1/3 h-full bg-gradient-to-l from-[#EDF1F6]/50 to-transparent pointer-events-none"></div>
        
        <div class="relative z-10 flex items-center gap-4">
          <span class="w-12 h-12 rounded-2xl bg-[#334EAC]/10 text-[#334EAC] flex items-center justify-center shrink-0">
            <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M3 3v18h18"/><path d="m19 9-5 5-4-4-3 3"/></svg>
          </span>
          <div>
            <h1 class="text-2xl font-extrabold text-[#081F5C] tracking-tight leading-tight">Statistik & Analisis Mentor</h1>
            <p class="text-[13px] text-slate-500 font-medium mt-2 max-w-xl leading-relaxed">
              Tinjau performa kualitatif dan kuantitatif kontribusi Anda, termasuk kepuasan bimbingan dan keakuratan verifikasi.
            </p>
          </div>
        </div>
      </div>

      <!-- METRICS GRID -->
      <div class="grid grid-cols-1 md:grid-cols-4 gap-6">
        
        <!-- Metric 1 -->
        <div class="bg-white rounded-xl p-5 shadow-sm border border-slate-200">
          <p class="text-xs font-bold text-slate-400 uppercase tracking-widest mb-1">Total Jam Mengajar</p>
          <h3 class="text-3xl font-bold text-[#081F5C] mb-2 tracking-tight">420<span class="text-sm font-medium text-slate-400 ml-1">jam</span></h3>
          <span class="text-xs font-semibold text-emerald-500 bg-emerald-50 border border-emerald-100 px-2 py-0.5 rounded">+15 jam minggu ini</span>
        </div>

        <!-- Metric 2 -->
        <div class="bg-white rounded-xl p-5 shadow-sm border border-slate-200">
          <p class="text-xs font-bold text-slate-400 uppercase tracking-widest mb-1">Rata-rata Rating Sesi</p>
          <h3 class="text-3xl font-bold text-[#081F5C] mb-2 tracking-tight">4.9<span class="text-sm font-medium text-slate-400 ml-1">/ 5.0</span></h3>
          <span class="text-xs font-semibold text-slate-400 bg-slate-50 border border-slate-200 px-2 py-0.5 rounded">Konsisten 3 bulan terakhir</span>
        </div>

        <!-- Metric 3 -->
        <div class="bg-white rounded-xl p-5 shadow-sm border border-slate-200">
          <p class="text-xs font-bold text-slate-400 uppercase tracking-widest mb-1">Akurasi Validasi AI</p>
          <h3 class="text-3xl font-bold text-[#081F5C] mb-2 tracking-tight">98.2%</h3>
          <span class="text-xs font-semibold text-emerald-500 bg-emerald-50 border border-emerald-100 px-2 py-0.5 rounded">+0.4% peningkatan</span>
        </div>

        <!-- Metric 4 -->
        <div class="bg-white rounded-xl p-5 shadow-sm border border-slate-200">
          <p class="text-xs font-bold text-slate-400 uppercase tracking-widest mb-1">Rasio Tanggapan</p>
          <h3 class="text-3xl font-bold text-[#081F5C] mb-2 tracking-tight">96%</h3>
          <span class="text-xs font-semibold text-emerald-500 bg-emerald-50 border border-emerald-100 px-2 py-0.5 rounded">Sangat Responsif</span>
        </div>

      </div>

      <div class="grid grid-cols-1 lg:grid-cols-[minmax(0,1fr)_360px] gap-6 xl:gap-8 items-start">
        
        <!-- LEFT: CHARTS & DRILLDOWNS -->
        <div class="space-y-6 min-w-0 w-full">
          
          <!-- Month Activity Chart (Simulation) -->
          <div class="bg-white rounded-xl p-5 shadow-sm border border-slate-200">
            <h3 class="text-[16px] font-bold text-[#081F5C] mb-6">Distribusi Durasi Mentoring per Bulan</h3>
            
            <div class="h-64 flex items-end justify-between gap-4 pt-4 border-b border-slate-200 px-2">
              <div class="flex-1 flex flex-col items-center gap-2">
                <div class="w-full bg-[#334EAC]/20 rounded-t-lg transition-all hover:bg-[#334EAC] h-[40%] group relative">
                  <span class="absolute -top-8 left-1/2 -translate-x-1/2 bg-slate-800 text-white text-[10px] px-2 py-0.5 rounded opacity-0 group-hover:opacity-100 transition-opacity">24 jam</span>
                </div>
                <span class="text-[10px] font-bold text-slate-400">Jan</span>
              </div>
              <div class="flex-1 flex flex-col items-center gap-2">
                <div class="w-full bg-[#334EAC]/20 rounded-t-lg transition-all hover:bg-[#334EAC] h-[60%] group relative">
                  <span class="absolute -top-8 left-1/2 -translate-x-1/2 bg-slate-800 text-white text-[10px] px-2 py-0.5 rounded opacity-0 group-hover:opacity-100 transition-opacity">36 jam</span>
                </div>
                <span class="text-[10px] font-bold text-slate-400">Feb</span>
              </div>
              <div class="flex-1 flex flex-col items-center gap-2">
                <div class="w-full bg-[#334EAC]/20 rounded-t-lg transition-all hover:bg-[#334EAC] h-[80%] group relative">
                  <span class="absolute -top-8 left-1/2 -translate-x-1/2 bg-slate-800 text-white text-[10px] px-2 py-0.5 rounded opacity-0 group-hover:opacity-100 transition-opacity">48 jam</span>
                </div>
                <span class="text-[10px] font-bold text-slate-400">Mar</span>
              </div>
              <div class="flex-1 flex flex-col items-center gap-2">
                <div class="w-full bg-[#334EAC] rounded-t-lg h-[95%] group relative">
                  <span class="absolute -top-8 left-1/2 -translate-x-1/2 bg-slate-800 text-white text-[10px] px-2 py-0.5 rounded">60 jam</span>
                </div>
                <span class="text-[10px] font-bold text-slate-400">Apr</span>
              </div>
              <div class="flex-1 flex flex-col items-center gap-2">
                <div class="w-full bg-[#334EAC]/20 rounded-t-lg transition-all hover:bg-[#334EAC] h-[55%] group relative">
                  <span class="absolute -top-8 left-1/2 -translate-x-1/2 bg-slate-800 text-white text-[10px] px-2 py-0.5 rounded opacity-0 group-hover:opacity-100 transition-opacity">33 jam</span>
                </div>
                <span class="text-[10px] font-bold text-slate-400">Mei</span>
              </div>
            </div>
          </div>

          <!-- Student Satisfaction Breakdown -->
          <div class="bg-white rounded-xl p-5 shadow-sm border border-slate-200">
            <h3 class="text-[16px] font-bold text-[#081F5C] mb-6">Umpan Balik Kualitatif Sesi</h3>
            
            <div class="space-y-4">
              <div v-for="trend in feedbackTrends" :key="trend.topic" class="p-4 bg-slate-50 border border-slate-100 rounded-2xl flex justify-between items-center">
                <div>
                  <h4 class="text-sm font-bold text-[#081F5C]">{{ trend.topic }}</h4>
                  <p class="text-xs text-slate-500 font-medium">Berdasarkan ulasan di {{ trend.reviewCount }} sesi mentoring</p>
                </div>
                <div class="flex items-center gap-2">
                  <span class="text-xs font-bold text-[#334EAC] bg-[#EEF3FF] px-2.5 py-1 rounded-xl">{{ trend.score }} / 5.0</span>
                </div>
              </div>
            </div>
          </div>

        </div>

        <!-- RIGHT: STUDENT PERFORMANCE -->
        <div class="space-y-6 w-full sticky top-6">
          <div class="bg-white rounded-xl p-5 shadow-sm border border-slate-200">
            <h3 class="text-[15px] font-bold text-[#081F5C] tracking-tight mb-5">Mahasiswa Bimbingan Teraktif</h3>
            
            <div class="space-y-4">
              <div v-for="student in activeStudents" :key="student.name" class="flex items-center justify-between group">
                <div class="flex items-center gap-4">
                  <div class="w-8 h-8 rounded-full bg-slate-100 text-[#081F5C] flex items-center justify-center font-bold text-[11px]">{{ student.initial }}</div>
                  <div>
                    <h4 class="text-xs font-bold text-slate-800 leading-none mb-1">{{ student.name }}</h4>
                    <p class="text-[10px] text-slate-400 font-medium">{{ student.hours }} jam bimbingan</p>
                  </div>
                </div>
                <span class="text-xs font-bold text-emerald-600 bg-emerald-50 border border-emerald-100 px-2 py-0.5 rounded">{{ student.accuracy }}%</span>
              </div>
            </div>
          </div>
        </div>

      </div>
  </div>
</template>

<script setup>
import { ref } from 'vue'
import { RouterLink } from 'vue-router'

const feedbackTrends = ref([
  { topic: 'Kejelasan Materi & Penjelasan', reviewCount: 45, score: '4.95' },
  { topic: 'Ketepatan Waktu & Kesiapan', reviewCount: 32, score: '4.88' },
  { topic: 'Kualitas Bahan Ajar Tambahan', reviewCount: 28, score: '4.91' }
])

const activeStudents = ref([
  { initial: 'AW', name: 'Andi Wijaya', hours: 24, accuracy: 98 },
  { initial: 'BS', name: 'Budi Santoso', hours: 18, accuracy: 95 },
  { initial: 'SA', name: 'Siti Aminah', hours: 12, accuracy: 94 },
  { initial: 'MK', name: 'M. Kevin', hours: 10, accuracy: 91 }
])
</script>
