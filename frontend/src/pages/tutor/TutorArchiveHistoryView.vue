<template>
  <div class="relative min-h-screen pb-12 overflow-hidden bg-[#F7F2EB]">
    <div class="relative z-10 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8 space-y-8">
      
      <!-- HEADER -->
      <div class="bg-white rounded-3xl p-7 md:p-8 shadow-sm border border-slate-200/60 relative overflow-hidden flex flex-col md:flex-row md:items-center justify-between gap-6">
        <div class="absolute right-0 top-0 w-1/3 h-full bg-gradient-to-l from-[#EDF1F6]/80 to-transparent pointer-events-none"></div>
        <div class="relative z-10">
          <div class="flex items-center gap-3 mb-2">
             <span class="w-12 h-12 rounded-xl bg-[#334EAC]/10 text-[#334EAC] flex items-center justify-center shrink-0">
               <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M22 19a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h5l2 3h9a2 2 0 0 1 2 2z"/></svg>
             </span>
             <h1 class="text-2xl md:text-3xl font-bold text-slate-900 tracking-tight">Arsip Dokumen Ujian</h1>
          </div>
          <p class="text-[14px] text-slate-500 font-medium max-w-xl leading-relaxed ml-14">
            Daftar seluruh berkas soal, kuis, dan latihan mahasiswa yang telah diunggah dan diverifikasi ke dalam bank soal FokusIn.
          </p>
        </div>

        <div class="relative z-10 flex shrink-0">
          <RouterLink to="/tutor/upload-exam" class="px-5 py-2.5 bg-[#334EAC] hover:bg-[#081F5C] text-white rounded-2xl font-bold text-[13px] transition-all shadow-sm active:scale-95 flex items-center gap-2">
            + Upload Dokumen Baru
          </RouterLink>
        </div>
      </div>

      <!-- TABLE VIEW -->
      <div class="bg-white rounded-3xl shadow-sm border border-slate-200 overflow-hidden">
        <div class="overflow-x-auto">
          <table class="w-full border-collapse text-left">
            <thead>
              <tr class="bg-slate-50/80 border-b border-slate-200 text-xs font-bold text-slate-400 uppercase tracking-widest">
                <th class="py-4 px-6">Nama Dokumen</th>
                <th class="py-4 px-6">Mata Kuliah</th>
                <th class="py-4 px-6">Tanggal Upload</th>
                <th class="py-4 px-6">Keandalan OCR</th>
                <th class="py-4 px-6">Status</th>
                <th class="py-4 px-6 text-right">Aksi</th>
              </tr>
            </thead>
            <tbody class="divide-y divide-slate-100 text-sm font-medium text-slate-700">
              <tr v-for="doc in archives" :key="doc.id" class="hover:bg-slate-50/50 transition-colors">
                <td class="py-4 px-6">
                  <div class="flex items-center gap-4">
                    <span class="w-8 h-8 rounded-lg bg-rose-50 text-rose-500 flex items-center justify-center shrink-0">
                      <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M14.5 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V7.5L14.5 2z"/><polyline points="14 2 14 8 20 8"/></svg>
                    </span>
                    <span class="font-bold text-[#081F5C]">{{ doc.name }}</span>
                  </div>
                </td>
                <td class="py-4 px-6 text-slate-500">{{ doc.course }}</td>
                <td class="py-4 px-6 text-slate-500">{{ doc.date }}</td>
                <td class="py-4 px-6">
                  <span class="px-2 py-0.5 bg-emerald-50 text-emerald-600 rounded text-xs font-bold border border-emerald-100">{{ doc.ocrAccuracy }}%</span>
                </td>
                <td class="py-4 px-6">
                  <span 
                    class="px-2.5 py-1 rounded-lg text-[10px] font-bold uppercase tracking-widest border"
                    :class="{
                      'bg-emerald-50 text-emerald-600 border-emerald-100': doc.status === 'Approved',
                      'bg-amber-50 text-amber-600 border-amber-100': doc.status === 'Pending'
                    }"
                  >
                    {{ doc.status === 'Approved' ? 'Terverifikasi' : 'Pending Validasi' }}
                  </span>
                </td>
                <td class="py-4 px-6 text-right">
                  <RouterLink 
                    :to="doc.status === 'Approved' ? '/tutor/archive-history' : '/tutor/validation/' + doc.id"
                    class="inline-flex items-center gap-1.5 px-3 py-1.5 border border-slate-200 hover:border-[#7096D1] text-[#334EAC] hover:bg-slate-50 rounded-lg text-xs font-bold transition-all"
                  >
                    {{ doc.status === 'Approved' ? 'Pratinjau' : 'Validasi Sekarang' }}
                  </RouterLink>
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

const archives = ref([
  {
    id: 1,
    name: 'Struktur_Data_UAS_2025.pdf',
    course: 'Struktur Data',
    date: '25 Mei 2026',
    ocrAccuracy: 96,
    status: 'Pending'
  },
  {
    id: 2,
    name: 'BasisData_UTS_2025.docx',
    course: 'Sistem Basis Data',
    date: '24 Mei 2026',
    ocrAccuracy: 98,
    status: 'Approved'
  },
  {
    id: 3,
    name: 'Kuis_Algoritma_Searching.pdf',
    course: 'Algoritma Dasar',
    date: '22 Mei 2026',
    ocrAccuracy: 94,
    status: 'Approved'
  }
])
</script>
