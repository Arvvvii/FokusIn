<template>
  <div class="relative min-h-screen pb-12 bg-[#F7F2EB]">
    <div class="max-w-[1450px] mx-auto px-4 sm:px-6 xl:px-8 py-6 space-y-5 animate-in fade-in duration-500">
      
      <!-- Compact Editorial Header -->
      <div class="bg-white rounded-2xl border border-slate-200 shadow-sm p-5 flex flex-col sm:flex-row sm:items-center justify-between gap-5 mb-6 relative overflow-hidden">
        <div class="flex items-center gap-4">
          <span class="w-12 h-12 rounded-xl bg-[#334EAC]/10 text-[#334EAC] flex items-center justify-center shrink-0">
            <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><circle cx="12" cy="12" r="10"/><path d="M9.09 9a3 3 0 0 1 5.83 1c0 2-3 3-3 3"/><line x1="12" x2="12.01" y1="17" y2="17"/></svg>
          </span>
          <div>
            <h1 class="text-[30px] font-semibold text-slate-900 tracking-tight leading-tight mb-1">Monitoring Kuis</h1>
            <p class="text-base text-slate-500 leading-relaxed max-w-xl">Pantau partisipasi kuis, integritas akademik ujian, dan statistik rata-rata skor kelulusan mahasiswa.</p>
          </div>
        </div>
        <div class="flex shrink-0">
          <RouterLink to="/admin/quiz-monitoring/comparative" class="px-4 py-2 bg-white text-[#334EAC] border border-[#334EAC] hover:bg-[#334EAC]/5 rounded-xl font-medium text-sm shadow-sm transition-all active:scale-95 flex items-center justify-center">
            Analisis Komparatif
          </RouterLink>
        </div>
      </div>

      <!-- Quick Metrics Grid -->
      <div class="grid grid-cols-1 sm:grid-cols-3 gap-4">
        <div class="bg-white p-4 rounded-xl border border-slate-200 shadow-sm">
          <p class="text-xs text-slate-500 font-semibold mb-1">Partisipasi Ujian</p>
          <h3 class="text-xl font-bold text-slate-900">1,824 Mahasiswa</h3>
          <p class="text-xs text-slate-400 font-medium mt-1">Aktif di kuis mandiri</p>
        </div>
        <div class="bg-white p-4 rounded-xl border border-slate-200 shadow-sm">
          <p class="text-xs text-slate-500 font-semibold mb-1">Rata-rata Skor Kelulusan</p>
          <h3 class="text-xl font-bold text-slate-900">76.4 / 100</h3>
          <p class="text-xs text-emerald-600 font-medium mt-1">Sesuai standar kelulusan KKM</p>
        </div>
        <div class="bg-white p-4 rounded-xl border border-slate-200 shadow-sm">
          <p class="text-xs text-slate-500 font-semibold mb-1">Tingkat Integritas Ujian</p>
          <h3 class="text-xl font-bold text-slate-900">99.2%</h3>
          <p class="text-xs text-emerald-600 font-medium mt-1">Deteksi anomali AI sangat rendah</p>
        </div>
      </div>

      <!-- Quiz Integrity Table -->
      <div class="bg-white rounded-xl border border-slate-200 shadow-sm overflow-hidden">
        <div class="px-5 py-4 border-b border-slate-100 flex items-center justify-between">
          <h2 class="text-base font-semibold text-slate-900">Laporan Aktivitas Kuis & Ujian</h2>
        </div>
        <div class="overflow-x-auto">
          <table class="w-full text-left border-collapse">
            <thead>
              <tr class="bg-slate-50/80 border-b border-slate-200">
                <th class="px-5 py-3 text-xs font-bold text-slate-400 uppercase tracking-widest">Judul Kuis</th>
                <th class="px-5 py-3 text-xs font-bold text-slate-400 uppercase tracking-widest">Subjek</th>
                <th class="px-5 py-3 text-xs font-bold text-slate-400 uppercase tracking-widest">Tingkat Kesulitan</th>
                <th class="px-5 py-3 text-xs font-bold text-slate-400 uppercase tracking-widest">Peserta</th>
                <th class="px-5 py-3 text-xs font-bold text-slate-400 uppercase tracking-widest text-right">Rata-rata Nilai</th>
              </tr>
            </thead>
            <tbody class="divide-y divide-slate-100">
              <tr v-for="quiz in quizzes" :key="quiz.id" class="hover:bg-slate-50/50 transition-colors">
                <td class="px-5 py-3.5">
                    <RouterLink :to="'/admin/quiz-monitoring/' + quiz.id" class="text-sm font-semibold text-slate-900 leading-snug tracking-tight hover:text-[#334EAC] transition-colors block">
                      {{ quiz.title }}
                    </RouterLink>
                    <p class="text-xs text-slate-400 mt-0.5">ID: #QZ-{{ quiz.id }}</p>
                </td>
                <td class="px-5 py-3.5">
                  <span class="px-2.5 py-0.5 bg-slate-100 text-slate-600 text-xs font-semibold rounded-md uppercase tracking-wider">{{ quiz.subject }}</span>
                </td>
                <td class="px-5 py-3.5">
                  <span class="text-sm font-medium" :class="quiz.difficulty === 'Tinggi' ? 'text-rose-600' : 'text-slate-600'">{{ quiz.difficulty }}</span>
                </td>
                <td class="px-5 py-3.5">
                  <span class="text-sm font-medium text-slate-700">{{ quiz.participants }} Pelajar</span>
                </td>
                <td class="px-5 py-3.5 text-right">
                  <span class="text-sm font-bold text-slate-900">{{ quiz.averageScore }}</span>
                </td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>

    </div>
  </div>
</template>

<script setup>
import { ref } from 'vue'
import { RouterLink } from 'vue-router'

const quizzes = ref([
  { id: 201, title: 'Kuis Struktur Aljabar & Pembuktian Teorema', subject: 'Matematika', difficulty: 'Tinggi', participants: 412, averageScore: '71.5 / 100' },
  { id: 202, title: 'Pemrograman Fungsional JavaScript & ES6+', subject: 'Ilmu Komputer', difficulty: 'Sedang', participants: 812, averageScore: '82.0 / 100' },
  { id: 203, title: 'Termodinamika Lanjut & Entropi Sistem Fisika', subject: 'Fisika', difficulty: 'Tinggi', participants: 254, averageScore: '69.8 / 100' },
])
</script>
