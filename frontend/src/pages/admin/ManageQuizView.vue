<template>
  <div class="p-6 md:p-8 xl:p-10 max-w-[1600px] mx-auto animate-in fade-in duration-500">
    
    <!-- Header -->
    <div class="admin-dashboard-hero mb-6 flex flex-col sm:flex-row sm:items-start justify-between gap-5">
      <div>
        <h1 class="text-3xl md:text-4xl font-extrabold text-slate-900 tracking-tight leading-tight">Monitoring Kuis</h1>
        <p class="text-[15px] text-slate-600 font-medium mt-2 max-w-xl leading-relaxed">Pantau partisipasi kuis, integritas akademik ujian, dan statistik rata-rata skor kelulusan mahasiswa.</p>
      </div>
      <div class="flex items-center gap-4">
        <RouterLink to="/admin/quiz-monitoring/comparative" class="btn-save-settings px-5 h-10 flex items-center justify-center">
          Analisis Komparatif
        </RouterLink>
      </div>
    </div>

    <!-- Quick Metrics Grid -->
    <div class="grid grid-cols-1 sm:grid-cols-3 gap-4 mb-6">
      <div class="admin-card p-5">
        <p class="text-sm text-slate-500 font-medium mb-1">Partisipasi Ujian</p>
        <h3 class="text-2xl font-bold text-slate-900 mb-2">1,824 Mahasiswa</h3>
        <p class="text-xs text-slate-400 font-medium bg-slate-50 px-2 py-1 rounded-md inline-block border border-slate-100">Aktif di kuis mandiri</p>
      </div>
      <div class="admin-card p-5">
        <p class="text-sm text-slate-500 font-medium mb-1">Rata-rata Skor Kelulusan</p>
        <h3 class="text-2xl font-bold text-slate-900 mb-2">76.4 <span class="text-base text-slate-400 font-medium">/ 100</span></h3>
        <p class="text-xs text-emerald-600 font-medium bg-emerald-50 px-2 py-1 rounded-md inline-block">Sesuai standar kelulusan KKM</p>
      </div>
      <div class="admin-card p-5">
        <p class="text-sm text-slate-500 font-medium mb-1">Tingkat Integritas Ujian</p>
        <h3 class="text-2xl font-bold text-slate-900 mb-2">99.2%</h3>
        <p class="text-xs text-emerald-600 font-medium bg-emerald-50 px-2 py-1 rounded-md inline-block">Deteksi anomali AI sangat rendah</p>
      </div>
    </div>

    <!-- Quiz Integrity Table -->
    <div class="admin-table-container">
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
