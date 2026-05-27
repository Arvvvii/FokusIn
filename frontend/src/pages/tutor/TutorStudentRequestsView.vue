<template>
  <div class="space-y-6 w-full pb-12">
      <!-- 1. GLASSMORPHIC HEADER SECTION -->
      <div class="bg-white/60 backdrop-blur-xl rounded-3xl p-7 md:p-8 shadow-[0_10px_40px_rgba(15,23,42,0.06)] border border-slate-200/60 relative overflow-hidden flex flex-col md:flex-row md:items-center justify-between gap-6 mb-8">
        <div class="absolute right-0 top-0 w-1/3 h-full bg-gradient-to-l from-[#EDF1F6]/80 to-transparent pointer-events-none"></div>
        
        <div class="relative z-10 flex items-center gap-4">
          <span class="w-12 h-12 rounded-2xl bg-[#334EAC]/10 text-[#334EAC] flex items-center justify-center shrink-0">
            <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M16 21v-2a4 4 0 0 0-4-4H6a4 4 0 0 0-4 4v2"/><circle cx="9" cy="7" r="4"/></svg>
          </span>
          <div>
            <h1 class="text-3xl md:text-4xl font-extrabold text-slate-900 tracking-tight leading-tight">Permintaan Mentoring Baru</h1>
            <p class="text-[15px] text-slate-600 font-medium mt-2 max-w-xl leading-relaxed">
              Tinjau permohonan bimbingan 1-on-1 dari mahasiswa kelas Anda.
            </p>
          </div>
        </div>
      </div>

      <!-- REQUEST QUEUE -->
      <div class="space-y-4">
        <div 
          v-for="req in requests" 
          :key="req.id" 
          class="bg-white rounded-3xl p-6 shadow-sm border border-slate-200 group/card relative overflow-hidden transition-all duration-300 ease-out hover:shadow-sm"
        >
          <div class="absolute top-0 left-0 w-1.5 h-full bg-amber-400"></div>
          <div class="flex flex-col sm:flex-row justify-between gap-5 pl-2">
            
            <!-- Info -->
            <div class="flex-1">
              <div class="flex items-center gap-3 mb-4">
                <div class="w-12 h-12 rounded-full bg-slate-100 border-2 border-white shadow-sm flex items-center justify-center shrink-0 overflow-hidden font-bold text-[#081F5C]">
                  {{ req.initial }}
                </div>
                <div>
                  <h3 class="text-[16px] font-bold text-slate-900 leading-none mb-1.5 tracking-tight">{{ req.studentName }}</h3>
                  <div class="flex items-center gap-2 text-[12px] font-bold text-slate-500">
                    <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round" class="text-[#7096D1]"><path d="M4 19.5v-15A2.5 2.5 0 0 1 6.5 2H20v20H6.5a2.5 2.5 0 0 1 0-5H20"/></svg>
                    Topik: {{ req.topic }}
                  </div>
                </div>
              </div>
              
              <div class="bg-amber-50/50 border border-amber-100/50 rounded-xl p-3 mb-4 inline-block w-full">
                <p class="text-[11px] font-bold text-amber-600/80 uppercase tracking-widest mb-1">Notes Mahasiswa</p>
                <p class="text-[13px] font-medium text-amber-900/80">"{{ req.note }}"</p>
              </div>
              
              <div class="flex flex-wrap items-center gap-x-6 gap-y-3">
                <div class="flex items-center gap-2 text-[13px] font-bold text-slate-900 tracking-tight">
                  <span class="w-7 h-7 rounded-lg bg-slate-50 text-slate-500 flex items-center justify-center"><svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><rect width="18" height="18" x="3" y="4" rx="2" ry="2"/><line x1="16" x2="16" y1="2" y2="6"/><line x1="8" x2="8" y1="2" y2="6"/><line x1="3" x2="21" y1="10" y2="10"/></svg></span>
                  {{ req.dateString }}
                </div>
                <span class="px-2.5 py-1 bg-amber-50 text-amber-600 rounded-lg text-[10px] font-bold uppercase tracking-widest border border-amber-100">
                  Menunggu Persetujuan
                </span>
              </div>
            </div>

            <!-- ACTIONS -->
            <div class="flex flex-row sm:flex-col items-center sm:items-end justify-center sm:justify-start gap-2 shrink-0 border-t sm:border-t-0 sm:border-l border-slate-100 pt-4 sm:pt-0 sm:pl-5">
              <button @click="acceptRequest(req.id)" class="w-full sm:w-auto px-5 py-2.5 bg-emerald-500 hover:bg-emerald-600 text-white rounded-2xl font-bold text-[13px] transition-all active:scale-95 flex justify-center items-center gap-2 shadow-sm">
                Terima Sesi
              </button>
              <button @click="rejectRequest(req.id)" class="w-full sm:w-auto px-5 py-2.5 bg-slate-50 hover:bg-rose-50 text-slate-500 hover:text-rose-600 border border-slate-200 hover:border-rose-200 rounded-2xl font-bold text-[13px] transition-all active:scale-95 flex justify-center items-center gap-2">
                Tolak Sesi
              </button>
            </div>

          </div>
        </div>

        <!-- Empty State -->
        <div v-if="requests.length === 0" class="bg-white rounded-3xl border border-slate-200 p-12 text-center shadow-sm">
          <div class="w-12 h-12 rounded-full bg-slate-50 border border-slate-100 flex items-center justify-center mx-auto mb-4 text-slate-400">
            <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M16 21v-2a4 4 0 0 0-4-4H6a4 4 0 0 0-4 4v2"/><circle cx="9" cy="7" r="4"/></svg>
          </div>
          <h3 class="text-sm font-bold text-slate-900 mb-1">Semua Request Terjawab</h3>
          <p class="text-xs text-slate-500 font-medium max-w-sm mx-auto">Tidak ada permohonan bimbingan baru yang menunggu persetujuan Anda saat ini.</p>
        </div>
      </div>

    </div>

    <!-- Success Toast -->
    <div v-if="showToast" class="fixed bottom-6 right-6 z-50 bg-emerald-500 text-white px-6 py-4 rounded-2xl shadow-[0_10px_40px_rgba(16,185,129,0.3)] flex items-center gap-3 animate-in slide-in-from-bottom-5">
      <div class="w-8 h-8 bg-white/20 rounded-full flex items-center justify-center shrink-0">
        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"><polyline points="20 6 9 17 4 12"/></svg>
      </div>
      <div>
        <h4 class="font-bold text-sm">Request Disetujui!</h4>
        <p class="text-xs text-emerald-100 font-medium">Sesi mentoring telah masuk ke dalam daftar jadwal aktif Anda.</p>
      </div>
  </div>
</template>

<script setup>
import { ref } from 'vue'

const showToast = ref(false)
const requests = ref([
  {
    id: 1,
    initial: 'AS',
    studentName: 'Andi Saputra',
    topic: 'Review Desain Database E-Commerce',
    note: 'Mohon direview relasi tabel e-commerce saya, apakah sudah memenuhi aturan normalisasi 3NF?',
    dateString: 'Kamis, 14:00 WIB'
  },
  {
    id: 2,
    initial: 'SA',
    studentName: 'Siti Aminah',
    topic: 'Struktur Data Graph & Shortest Path',
    note: 'Saya butuh bimbingan mengenai implementasi algoritma Dijkstra di C++.',
    dateString: 'Jumat, 15:30 WIB'
  }
])

const acceptRequest = (id) => {
  requests.value = requests.value.filter(r => r.id !== id)
  showToast.value = true
  setTimeout(() => {
    showToast.value = false
  }, 3000)
}

const rejectRequest = (id) => {
  requests.value = requests.value.filter(r => r.id !== id)
}
</script>
