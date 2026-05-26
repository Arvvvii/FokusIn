<template>
  <div class="p-6 md:p-8 xl:p-10 max-w-[1600px] mx-auto animate-in fade-in duration-500">
    
    <!-- Header -->
    <div class="bg-white rounded-2xl border border-slate-200 shadow-sm px-6 py-5 flex flex-col sm:flex-row sm:items-start justify-between gap-5 mb-6">
      <div>
        <h1 class="text-[28px] font-semibold tracking-tight text-[#081F5C] mb-1">Monitoring Mentoring</h1>
        <p class="text-sm text-slate-600">Kelola, verifikasi, dan pantau sesi bimbingan interaktif antara pelajar dan tutor.</p>
      </div>
      <div class="flex items-center gap-4">
        <RouterLink to="/admin/mentoring/performance" class="text-sm font-medium h-10 px-5 rounded-xl bg-[#334EAC] text-white shadow-sm hover:bg-[#081F5C] transition-all flex items-center justify-center">
          Laporan Kinerja
        </RouterLink>
      </div>
    </div>

    <!-- Quick Metrics Grid -->
    <div class="grid grid-cols-1 sm:grid-cols-3 gap-4 mb-6">
      <div class="bg-white p-5 rounded-2xl border border-slate-200 shadow-sm">
        <p class="text-sm text-slate-500 font-medium mb-1">Total Sesi Bulan Ini</p>
        <h3 class="text-2xl font-bold text-slate-900 mb-2">342 Sesi</h3>
        <p class="text-xs text-emerald-600 font-medium bg-emerald-50 px-2 py-1 rounded-md inline-block">Uptime server WebRTC: 99.98%</p>
      </div>
      <div class="bg-white p-5 rounded-2xl border border-slate-200 shadow-sm">
        <p class="text-sm text-slate-500 font-medium mb-1">Rata-rata Durasi Sesi</p>
        <h3 class="text-2xl font-bold text-slate-900 mb-2">54 Menit</h3>
        <p class="text-xs text-slate-400 font-medium bg-slate-50 px-2 py-1 rounded-md inline-block border border-slate-100">Target akademik terpenuhi</p>
      </div>
      <div class="bg-white p-5 rounded-2xl border border-slate-200 shadow-sm">
        <p class="text-sm text-slate-500 font-medium mb-1">Skor Kepuasan Pelajar</p>
        <h3 class="text-2xl font-bold text-slate-900 mb-2">4.88 <span class="text-base text-slate-400 font-medium">/ 5.00</span></h3>
        <p class="text-xs text-emerald-600 font-medium bg-emerald-50 px-2 py-1 rounded-md inline-block">Berdasarkan 120 ulasan</p>
      </div>
    </div>

    <!-- Session Schedule Table -->
    <div class="bg-white rounded-xl border border-slate-200 shadow-sm overflow-hidden">
      <div class="px-5 py-4 border-b border-slate-100 flex items-center justify-between">
        <h2 class="text-base font-semibold text-slate-900">Sesi Mentoring Mendatang</h2>
      </div>
      <div class="overflow-x-auto">
        <table class="w-full text-left border-collapse">
          <thead>
            <tr class="bg-slate-50/80 border-b border-slate-200">
              <th class="px-5 py-3 text-xs font-bold text-slate-400 uppercase tracking-widest">Topik Bimbingan</th>
              <th class="px-5 py-3 text-xs font-bold text-slate-400 uppercase tracking-widest">Tutor</th>
              <th class="px-5 py-3 text-xs font-bold text-slate-400 uppercase tracking-widest">Pelajar</th>
              <th class="px-5 py-3 text-xs font-bold text-slate-400 uppercase tracking-widest">Waktu & Jadwal</th>
              <th class="px-5 py-3 text-xs font-bold text-slate-400 uppercase tracking-widest">Status</th>
            </tr>
          </thead>
          <tbody class="divide-y divide-slate-100">
            <tr v-for="session in sessions" :key="session.id" class="hover:bg-slate-50/50 transition-colors">
              <td class="px-5 py-3.5">
                  <RouterLink :to="'/admin/mentoring/' + session.id" class="text-sm font-semibold text-slate-900 leading-snug tracking-tight hover:text-[#334EAC] transition-colors block">
                    {{ session.topic }}
                  </RouterLink>
                  <p class="text-xs text-slate-400 mt-0.5">ID: #MTR-{{ session.id }}</p>
              </td>
              <td class="px-5 py-3.5">
                <span class="text-sm font-medium text-slate-700">{{ session.tutor }}</span>
              </td>
              <td class="px-5 py-3.5">
                <span class="text-sm font-medium text-slate-700">{{ session.student }}</span>
              </td>
              <td class="px-5 py-3.5">
                <p class="text-sm font-medium text-slate-700">{{ session.time }}</p>
                <p class="text-xs text-slate-400 mt-0.5">{{ session.date }}</p>
              </td>
              <td class="px-5 py-3.5">
                <span class="px-2 py-0.5 bg-indigo-50 border border-indigo-100 text-indigo-700 text-xs font-semibold rounded-md uppercase tracking-wider">
                  {{ session.status }}
                </span>
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

const sessions = ref([
  { id: 401, topic: 'Review Komparasi Limit dan Integral Lipat Dua', tutor: 'Dr. Sarah Smith', student: 'Andi Pratama', date: '26 Mei 2026', time: '19:00 WIB', status: 'Scheduled' },
  { id: 402, topic: 'Pemrograman Berorientasi Objek & Java OOP', tutor: 'Prof. Anderson', student: 'Budi Santoso', date: '27 Mei 2026', time: '14:00 WIB', status: 'In-Progress' },
  { id: 403, topic: 'Mekanika Klasik & Teori Relativitas Khusus', tutor: 'Prof. Anderson', student: 'Rina Wijaya', date: '28 Mei 2026', time: '10:00 WIB', status: 'Scheduled' },
])
</script>
