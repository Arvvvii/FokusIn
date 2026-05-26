<template>
  <div class="relative min-h-screen bg-[#F7F2EB]">
    <div class="max-w-[1000px] mx-auto px-6 py-6 space-y-6 animate-in fade-in duration-500">
      
      <!-- Breadcrumb & Header -->
      <div class="space-y-2">
        <div class="flex items-center gap-2 text-xs font-bold text-slate-400 uppercase tracking-widest">
          <RouterLink to="/pelajar/mentoring" class="hover:text-[#334EAC] transition-colors">Mentoring</RouterLink>
          <span class="text-slate-300">/</span>
          <span class="text-[#334EAC]">Riwayat Sesi</span>
        </div>
        
        <div class="bg-[#F7F2EB] rounded-2xl border border-slate-200 shadow-sm p-5 flex flex-col sm:flex-row sm:items-center justify-between gap-5 mb-6 relative overflow-hidden">
          <div class="flex items-center gap-4">
            <span class="w-12 h-12 rounded-xl bg-[#334EAC]/10 text-[#334EAC] flex items-center justify-center shrink-0">
              <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M12 8v4l3 3"/><circle cx="12" cy="12" r="10"/></svg>
            </span>
            <div>
              <h1 class="text-[30px] font-semibold text-slate-900 tracking-tight leading-tight mb-1">Riwayat Bimbingan</h1>
              <p class="text-base text-slate-500 leading-relaxed max-w-xl">
                Tinjau seluruh rekaman sesi belajar privat, catatan pembelajaran, dan modul umpan balik dari mentor Anda.
              </p>
            </div>
          </div>
        </div>
      </div>

      <!-- Session History List -->
      <div class="bg-white rounded-xl p-6 shadow-sm border border-slate-200 space-y-6">
        <div class="flex items-center justify-between border-b border-slate-100 pb-3">
          <h2 class="text-lg font-bold text-slate-900 flex items-center gap-2">
            <span class="w-2.5 h-2.5 rounded-full bg-emerald-500"></span>
            Semua Sesi Selesai
          </h2>
          <span class="text-xs font-bold text-slate-500">{{ historyItems.length }} Sesi Tercatat</span>
        </div>

        <div class="space-y-4">
          <div v-for="item in historyItems" :key="item.id" class="p-5 rounded-xl border border-slate-200 bg-white hover:border-[#334EAC]/30 transition-all space-y-4">
            
            <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-3">
              <div class="flex items-center gap-4">
                <div class="w-10 h-10 rounded-full bg-[#EDF1F6] flex items-center justify-center text-[#334EAC] font-bold text-sm shrink-0 border border-slate-100">
                  {{ getInitials(item.mentorName) }}
                </div>
                <div>
                  <h3 class="text-sm font-bold text-[#081F5C]">{{ item.topic }}</h3>
                  <p class="text-xs text-slate-500">bersama <span class="font-semibold text-slate-700">{{ item.mentorName }}</span></p>
                </div>
              </div>
              
              <div class="flex items-center gap-2 self-start sm:self-center">
                <span class="px-2.5 py-1 text-[10px] font-bold uppercase tracking-wider bg-emerald-50 text-emerald-600 rounded-lg border border-emerald-100">
                  {{ item.status }}
                </span>
                <span class="text-xs font-semibold text-slate-400">
                  {{ item.date }}
                </span>
              </div>
            </div>

            <!-- Notes & Summary -->
            <div class="bg-slate-50 rounded-xl p-4 border border-slate-100 space-y-2 text-xs">
              <p class="font-bold text-slate-700 uppercase tracking-wider">Umpan Balik & Rekomendasi Mentor:</p>
              <p class="text-slate-600 leading-relaxed font-medium">{{ item.feedback }}</p>
            </div>

            <!-- Action buttons -->
            <div class="flex items-center justify-between pt-2">
              <span class="text-xs font-bold text-slate-400">Durasi: {{ item.duration }}</span>
              <RouterLink :to="`/pelajar/mentoring/session/${item.id}`" class="text-xs font-bold text-[#334EAC] hover:text-[#081F5C] flex items-center gap-1.5 transition-colors">
                Lihat Ruang Belajar Virtual
                <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"><path d="M5 12h14"/><path d="m12 5 7 7-7 7"/></svg>
              </RouterLink>
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

const historyItems = ref([
  {
    id: 1,
    topic: 'Kinematika & Persiapan OSN',
    mentorName: 'Prof. Anderson',
    status: 'Selesai',
    date: '12 Mei 2026',
    duration: '45 Menit',
    feedback: 'John menunjukkan insting analisis yang sangat baik untuk mekanika Newton. Perlu diperbanyak latihan soal osilasi harmonis sederhana dan gerak melingkar tidak seragam untuk memantapkan hasil olimpiade.'
  },
  {
    id: 2,
    topic: 'Struktur Data Python & Stack/Queue',
    mentorName: 'Budi Santoso',
    status: 'Selesai',
    date: '08 Mei 2026',
    duration: '60 Menit',
    feedback: 'Sangat baik dalam memahami implementasi Queue berbasis array. Untuk sesi berikutnya, disarankan mempelajari Heap dan Priority Queue karena sangat krusial untuk efisiensi algoritma Dijkstra.'
  },
  {
    id: 3,
    topic: 'Kalkulus 2: Integral Substitusi Trigonometri',
    mentorName: 'Dr. Sarah Smith',
    status: 'Selesai',
    date: '02 Mei 2026',
    duration: '45 Menit',
    feedback: 'Mahasiswa sudah menguasai rumus dasar substitusi trigonometri. Fokus bimbingan berikutnya adalah menyatukan pemahaman Integral Parsial dengan metode Tabular agar pengerjaan soal ujian bisa lebih cepat.'
  }
])

const getInitials = (name) => {
  if (!name) return ''
  return name.split(' ').map(n => n[0]).join('').substring(0, 2).toUpperCase()
}
</script>
