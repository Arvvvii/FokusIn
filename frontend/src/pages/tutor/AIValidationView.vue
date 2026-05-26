<template>
  <div class="space-y-8 w-full">
    <!-- 1. GLASSMORPHIC HEADER SECTION -->
    <div class="bg-white/80 backdrop-blur-xl rounded-3xl p-7 md:p-8 shadow-[0_10px_40px_rgba(15,23,42,0.06)] border border-white/40 relative overflow-hidden flex flex-col md:flex-row md:items-center justify-between gap-6">
      <div class="absolute right-0 top-0 w-1/3 h-full bg-gradient-to-l from-[#EDF1F6]/80 to-transparent pointer-events-none"></div>
      
      <div class="relative z-10 flex items-center gap-4">
        <span class="w-12 h-12 rounded-2xl bg-[#334EAC]/10 text-[#334EAC] flex items-center justify-center shrink-0">
          <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="m12 3-1.912 5.813a2 2 0 0 1-1.275 1.275L3 12l5.813 1.912a2 2 0 0 1 1.275 1.275L12 21l1.912-5.813a2 2 0 0 1 1.275-1.275L21 12l-5.813-1.912a2 2 0 0 1-1.275-1.275L12 3Z"/></svg>
        </span>
        <div>
          <h1 class="text-2xl md:text-3xl font-bold text-slate-900 tracking-tight leading-none mb-1">Antrean Validasi AI</h1>
          <p class="text-[14px] text-slate-500 font-medium leading-relaxed mt-1">
            Verifikasi hasil ekstraksi OCR dan struktur soal ujian yang diproses oleh AI sebelum diterbitkan ke bank soal FokusIn.
          </p>
        </div>
      </div>

      <div class="relative z-10 flex shrink-0 gap-4">
        <div class="bg-slate-50 border border-slate-200/60 rounded-2xl p-4 flex flex-col items-center justify-center min-w-[100px] shadow-sm">
           <span class="text-2xl font-bold text-amber-500 tracking-tight leading-none mb-1">3</span>
           <span class="text-[11px] font-bold text-slate-400 uppercase tracking-widest">Antrean</span>
        </div>
        <div class="bg-slate-50 border border-slate-200/60 rounded-2xl p-4 flex flex-col items-center justify-center min-w-[100px] shadow-sm">
           <span class="text-2xl font-bold text-emerald-500 tracking-tight leading-none mb-1">42</span>
           <span class="text-[11px] font-bold text-slate-400 uppercase tracking-widest">Selesai</span>
        </div>
      </div>
    </div>

    <!-- 2. METADATA & INSTRUCTIONS -->
    <div class="grid grid-cols-1 md:grid-cols-2 gap-6 w-full">
      <!-- Info Card -->
      <div class="bg-white rounded-3xl p-6 border border-slate-200/60 shadow-[0_5px_20px_rgba(15,23,42,0.02)]">
        <h3 class="text-sm font-bold text-slate-900 mb-3 flex items-center gap-2">
          <span class="w-6 h-6 rounded-lg bg-indigo-50 text-[#334EAC] flex items-center justify-center"><svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"/><line x1="12" x2="12" y1="16" y2="12"/><line x1="12" x2="12.01" y1="8" y2="8"/></svg></span>
          Panduan Validasi AI
        </h3>
        <p class="text-xs text-slate-500 leading-relaxed mb-4">
          AI memindai dokumen soal ujian dengan OCR dan memformatnya menjadi Markdown terstruktur. Tugas Anda adalah:
        </p>
        <ul class="space-y-2.5 text-xs text-slate-600 font-medium">
          <li class="flex items-start gap-2">
            <span class="w-4 h-4 rounded-full bg-indigo-50 border border-indigo-100 flex items-center justify-center shrink-0 text-[10px] text-[#334EAC] font-bold">1</span>
            Memperbaiki kesalahan deteksi karakter (typo).
          </li>
          <li class="flex items-start gap-2">
            <span class="w-4 h-4 rounded-full bg-indigo-50 border border-indigo-100 flex items-center justify-center shrink-0 text-[10px] text-[#334EAC] font-bold">2</span>
            Memastikan bobot skor pilihan ganda & esai tepat.
          </li>
          <li class="flex items-start gap-2">
            <span class="w-4 h-4 rounded-full bg-indigo-50 border border-indigo-100 flex items-center justify-center shrink-0 text-[10px] text-[#334EAC] font-bold">3</span>
            Menandai tingkat kesulitan dan kesesuaian silabus.
          </li>
        </ul>
      </div>

      <!-- AI Performance -->
      <div class="bg-white rounded-3xl p-6 border border-slate-200/60 shadow-[0_5px_20px_rgba(15,23,42,0.02)]">
        <h3 class="text-sm font-bold text-slate-900 mb-4 uppercase tracking-wider text-[11px] text-slate-400">Efisiensi Ekstraksi AI</h3>
        <div class="space-y-4">
          <div>
            <div class="flex justify-between text-xs font-bold text-slate-700 mb-1">
              <span>Rata-rata Akurasi OCR</span>
              <span class="text-emerald-600">96.0%</span>
            </div>
            <div class="h-1.5 w-full bg-slate-100 rounded-full overflow-hidden">
              <div class="h-full bg-emerald-500 rounded-full" style="width: 96%"></div>
            </div>
          </div>
          <div>
            <div class="flex justify-between text-xs font-bold text-slate-700 mb-1">
              <span>Waktu Hemat per Dokumen</span>
              <span class="text-[#334EAC]">~18 Menit</span>
            </div>
            <div class="h-1.5 w-full bg-slate-100 rounded-full overflow-hidden">
              <div class="h-full bg-[#334EAC] rounded-full" style="width: 85%"></div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- 3. QUEUE TABLE -->
    <div class="bg-white rounded-3xl border border-slate-200/60 shadow-sm overflow-hidden flex-1 flex flex-col w-full">
      <div class="px-7 py-5 border-b border-slate-100 flex items-center justify-between bg-white">
        <h2 class="text-[16px] font-bold text-slate-900 tracking-tight">Dokumen Menunggu Validasi</h2>
        <span class="px-3 py-1 bg-amber-50 text-amber-600 border border-amber-100 rounded-xl text-[11px] font-bold uppercase tracking-widest flex items-center gap-1.5 shadow-sm">
          <span class="w-1.5 h-1.5 rounded-full bg-amber-500 animate-pulse"></span>
          Perlu Tindakan
        </span>
      </div>

      <div class="overflow-x-auto flex-1">
        <table class="w-full border-collapse text-left whitespace-nowrap">
          <thead>
            <tr class="bg-slate-50/60 border-b border-slate-200/80 text-[11px] font-bold text-slate-400 uppercase tracking-widest">
              <th class="py-4 px-7 font-bold">Nama Berkas</th>
              <th class="py-4 px-7 font-bold">Mata Kuliah</th>
              <th class="py-4 px-7 font-bold">Tanggal Upload</th>
              <th class="py-4 px-7 font-bold">OCR Confidence</th>
              <th class="py-4 px-7 text-right font-bold">Aksi</th>
            </tr>
          </thead>
          <tbody class="divide-y divide-slate-100/80 text-[13.5px] font-medium text-slate-700 bg-white">
            <tr v-for="doc in pendingQueue" :key="doc.id" class="hover:bg-slate-50/50 transition-colors group">
              <td class="py-4 px-7 align-middle">
                <div class="flex items-center gap-4">
                  <span class="w-10 h-10 rounded-2xl bg-rose-50 text-rose-500 flex items-center justify-center shrink-0 border border-rose-100 group-hover:scale-105 transition-transform">
                    <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M14.5 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V7.5L14.5 2z"/><polyline points="14 2 14 8 20 8"/></svg>
                  </span>
                  <span class="font-bold text-[#081F5C] tracking-tight">{{ doc.name }}</span>
                </div>
              </td>
              <td class="py-4 px-7 align-middle text-slate-500">{{ doc.course }}</td>
              <td class="py-4 px-7 align-middle text-slate-500">{{ doc.date }}</td>
              <td class="py-4 px-7 align-middle">
                <div class="flex items-center gap-3">
                  <div class="w-16 bg-slate-100 rounded-full h-2 overflow-hidden shadow-inner">
                    <div class="bg-emerald-500 h-full rounded-full" :style="{ width: doc.ocrAccuracy + '%' }"></div>
                  </div>
                  <span class="text-xs font-bold text-slate-700 w-8">{{ doc.ocrAccuracy }}%</span>
                </div>
              </td>
              <td class="py-4 px-7 align-middle text-right">
                <RouterLink 
                  :to="'/tutor/validation/' + doc.id" 
                  class="inline-flex items-center gap-2 px-4 py-2 bg-[#EEF3FF] hover:bg-[#334EAC] text-[#334EAC] hover:text-white rounded-xl text-xs font-bold transition-all active:scale-95 border border-[#7096D1]/30 hover:border-transparent"
                >
                  Validasi Sekarang
                  <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M5 12h14"/><path d="m12 5 7 7-7 7"/></svg>
                </RouterLink>
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

const pendingQueue = ref([
  {
    id: 1,
    name: 'Struktur_Data_UAS_2025.pdf',
    course: 'Struktur Data',
    date: '25 Mei 2026',
    ocrAccuracy: 96
  },
  {
    id: 2,
    name: 'Fisika_Kuis_Besaran.pdf',
    course: 'Fisika Dasar I',
    date: '24 Mei 2026',
    ocrAccuracy: 93
  },
  {
    id: 3,
    name: 'Aljabar_Linear_UTS.docx',
    course: 'Aljabar Linear',
    date: '23 Mei 2026',
    ocrAccuracy: 98
  }
])
</script>
