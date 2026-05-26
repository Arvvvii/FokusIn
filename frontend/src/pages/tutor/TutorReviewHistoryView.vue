<template>
  <div class="relative min-h-screen pb-12 overflow-hidden bg-[#F7F2EB]">
    <div class="relative z-10 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8 space-y-8">
      
      <!-- HEADER -->
      <div class="bg-white rounded-2xl border border-slate-200 shadow-sm p-5 flex flex-col sm:flex-row sm:items-center justify-between gap-5 mb-6 relative overflow-hidden">
        <div class="absolute right-0 top-0 w-1/3 h-full bg-gradient-to-l from-[#EDF1F6]/50 to-transparent pointer-events-none"></div>
        <div class="relative z-10 flex items-center gap-4">
          <span class="w-12 h-12 rounded-xl bg-[#334EAC]/10 text-[#334EAC] flex items-center justify-center shrink-0">
            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M12 22c5.523 0 10-4.477 10-10S17.523 2 12 2 2 6.477 2 12s4.477 10 10 10z"/><path d="m9 12 2 2 4-4"/></svg>
          </span>
          <div>
            <h1 class="text-lg md:text-xl font-bold text-slate-900 tracking-tight mb-0.5">Riwayat Verifikasi Forum</h1>
            <p class="text-xs md:text-sm text-slate-500 font-medium max-w-xl leading-relaxed">
              Katalog verifikasi jawaban, pemberian feedback kontribusi mahasiswa, serta penganugerahan badge Jawaban Terbaik.
            </p>
          </div>
        </div>
      </div>

      <!-- FILTER TABS -->
      <div class="bg-white rounded-2xl p-2 shadow-sm border border-slate-200/60 flex items-center gap-2">
        <button 
          v-for="filter in ['Semua', 'Terbaik', 'Terverifikasi', 'Ditolak']" 
          :key="filter"
          @click="activeFilter = filter"
          class="px-4 py-2 rounded-xl text-xs font-bold transition-all"
          :class="activeFilter === filter ? 'bg-[#334EAC] text-white shadow-sm' : 'text-slate-500 hover:text-slate-800 hover:bg-slate-50'"
        >
          {{ filter }}
        </button>
      </div>

      <!-- LIST LOGS -->
      <div class="space-y-4">
        <div 
          v-for="item in filteredHistory" 
          :key="item.id" 
          class="bg-white rounded-2xl p-5 shadow-sm border border-slate-200"
        >
          <div class="flex items-start justify-between gap-4 border-b border-slate-100 pb-3 mb-4">
            <div class="flex items-center gap-4">
              <div class="w-9 h-9 rounded-full bg-slate-100 flex items-center justify-center font-bold text-xs text-[#081F5C]">{{ item.initial }}</div>
              <div>
                <h4 class="text-xs font-bold text-slate-800 leading-none mb-1">{{ item.studentName }}</h4>
                <p class="text-[10px] text-slate-400 font-semibold">{{ item.time }}</p>
              </div>
            </div>
            <span 
              class="px-2.5 py-1 rounded-lg text-[9px] font-bold uppercase tracking-widest border"
              :class="{
                'bg-emerald-50 text-emerald-600 border-emerald-100': item.decision === 'Verified',
                'bg-amber-50 text-amber-600 border-amber-100': item.decision === 'Best Answer',
                'bg-rose-50 text-rose-600 border-rose-100': item.decision === 'Rejected'
              }"
            >
              {{ item.decision === 'Best Answer' ? 'Terbaik' : (item.decision === 'Verified' ? 'Terverifikasi' : 'Ditolak') }}
            </span>
          </div>

          <p class="text-xs font-bold text-[#334EAC] mb-2">Topik: {{ item.topic }}</p>
          <p class="text-xs font-medium text-slate-600 bg-slate-50 border border-slate-100 rounded-xl p-3 mb-3">{{ item.answerText }}</p>
          
          <div v-if="item.feedback" class="pt-3 border-t border-slate-100">
            <p class="text-[10px] font-bold text-slate-400 uppercase tracking-widest mb-1">Feedback Anda</p>
            <p class="text-xs text-slate-500 font-medium italic">"{{ item.feedback }}"</p>
          </div>
        </div>
      </div>

    </div>
  </div>
</template>

<script setup>
import { ref, computed } from 'vue'

const activeFilter = ref('Semua')
const history = ref([
  {
    id: 1,
    initial: 'BS',
    studentName: 'Budi Santoso',
    time: '2 jam lalu',
    decision: 'Verified',
    topic: 'Optimasi Query SQL',
    answerText: 'Menggunakan indexing pada composite columns dan menganalisa execution plan dengan EXPLAIN.',
    feedback: 'Penjelasan yang logis dan sesuai standard industri.'
  },
  {
    id: 2,
    initial: 'AW',
    studentName: 'Andi Wijaya',
    time: '1 hari lalu',
    decision: 'Best Answer',
    topic: 'Struktur Data BST',
    answerText: 'Teknik penelusuran Binary Search Tree menggunakan iterasi stack internal dibanding rekursi murni.',
    feedback: 'Sangat baik! Teknik ini mencegah call-stack overflow pada tree yang besar.'
  },
  {
    id: 3,
    initial: 'RD',
    studentName: 'Rizky Dharmawan',
    time: '2 hari lalu',
    decision: 'Rejected',
    topic: 'Java Pointer Null',
    answerText: 'Membungkus try-catch NullPointerException secara paksa di semua blok kode.',
    feedback: 'Bad practice. Hindari menangkap exception umum, lakukan check null sebelum method invocation.'
  }
])

const filteredHistory = computed(() => {
  if (activeFilter.value === 'Semua') return history.value
  if (activeFilter.value === 'Terbaik') return history.value.filter(h => h.decision === 'Best Answer')
  if (activeFilter.value === 'Terverifikasi') return history.value.filter(h => h.decision === 'Verified')
  if (activeFilter.value === 'Ditolak') return history.value.filter(h => h.decision === 'Rejected')
  return history.value
})
</script>
