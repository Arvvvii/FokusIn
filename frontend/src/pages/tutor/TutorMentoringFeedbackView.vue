<template>
  <div class="space-y-8 w-full">
    
    <!-- Back Navigation -->
    <div class="mb-6 flex items-center gap-2">
      <RouterLink
        to="/tutor/mentoring"
        class="text-sm font-bold text-slate-400 hover:text-[#334EAC] transition-colors flex items-center gap-1 w-fit bg-white/50 px-3 py-1.5 rounded-lg border border-slate-200/50"
      >
        ← Kembali ke Mentoring
      </RouterLink>
    </div>

    <!-- 1. EDITORIAL WORKSPACE HEADER SECTION -->
    <div class="bg-white border border-slate-200 shadow-sm rounded-2xl p-7 md:p-8 flex flex-col md:flex-row md:items-center justify-between gap-6 relative">
      <div class="absolute right-0 top-0 w-1/3 h-full bg-gradient-to-l from-[#EDF1F6]/50 to-transparent pointer-events-none"></div>
      
      <div class="relative z-10 flex items-center gap-4">
        <span class="w-12 h-12 rounded-2xl bg-[#334EAC]/10 text-[#334EAC] flex items-center justify-center shrink-0">
          <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z"/></svg>
        </span>
        <div>
          <div class="flex items-center gap-2">
            <h1 class="text-2xl font-extrabold text-[#081F5C] tracking-tight leading-tight flex items-center gap-2">
              Detail Ulasan & Feedback
              <span class="px-2.5 py-0.5 bg-emerald-50 text-emerald-600 text-[9px] font-bold rounded-lg uppercase tracking-wider border border-emerald-100">Selesai</span>
            </h1>
          </div>
          <p class="text-[13px] text-slate-500 font-medium mt-2 max-w-xl leading-relaxed">
            Ulasan yang diberikan oleh mahasiswa setelah sesi mentoring bimbingan selesai dilaksanakan.
          </p>
        </div>
      </div>
    </div>

    <!-- 2. STRUCTURAL ASYMMETRIC GRID -->
    <div class="grid grid-cols-1 lg:grid-cols-[minmax(0,1fr)_380px] gap-8 items-start w-full">
      
      <!-- LEFT CONTAINER: FEEDBACK CARD & REPLY -->
      <div class="space-y-6 flex-1 self-stretch">
        
        <!-- Feedback details -->
        <div class="bg-white rounded-3xl p-6 md:p-8 border border-slate-200/60 shadow-[0_5px_20px_rgba(15,23,42,0.02)] space-y-6">
          <div class="flex items-center justify-between border-b border-slate-100 pb-4">
            <div class="flex items-center gap-4">
              <div class="w-12 h-12 rounded-full bg-[#F7F2EB] border border-[#D0E3FF] flex items-center justify-center font-bold text-base text-[#334EAC]">
                {{ feedbackData.initials }}
              </div>
              <div>
                <h3 class="text-base font-bold text-slate-900">{{ feedbackData.studentName }}</h3>
                <p class="text-xs text-slate-400 font-semibold mt-1">{{ feedbackData.date }} • Sesi #{{ $route.params.id }}</p>
              </div>
            </div>

            <!-- Star rating -->
            <div class="flex items-center gap-1.5 bg-amber-50 border border-amber-100 px-3 py-1.5 rounded-2xl">
              <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="currentColor" class="text-amber-500"><polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"/></svg>
              <span class="text-sm font-bold text-amber-700">{{ feedbackData.rating }}.0</span>
            </div>
          </div>

          <!-- Topic and Comment -->
          <div class="space-y-4">
            <div>
              <span class="text-[10px] font-bold text-slate-400 uppercase tracking-widest block mb-1">Mata Kuliah / Topik Sesi</span>
              <span class="px-3 py-1.5 bg-slate-50 border border-slate-200 rounded-xl text-xs font-bold text-slate-700 inline-block">{{ feedbackData.topic }}</span>
            </div>
            
            <div class="space-y-2">
              <span class="text-[10px] font-bold text-slate-400 uppercase tracking-widest block">Ulasan Mahasiswa</span>
              <div class="bg-slate-50/50 border border-slate-100 p-5 rounded-2xl italic text-slate-700 text-sm font-medium leading-relaxed">
                "{{ feedbackData.comment }}"
              </div>
            </div>
          </div>

          <!-- Reply form -->
          <div class="space-y-4 pt-6 border-t border-slate-100">
            <h4 class="text-sm font-bold text-slate-900">Balas Ulasan (Opsional)</h4>
            
            <div v-if="!replySubmitted" class="space-y-3">
              <textarea 
                v-model="tutorReply"
                class="w-full bg-white border border-slate-200 rounded-xl p-4 text-xs sm:text-sm text-slate-700 placeholder-slate-400 focus:outline-none focus:border-[#7096D1] resize-none"
                rows="4"
                placeholder="Tulis pesan balasan atau catatan motivasi untuk mahasiswa..."
              ></textarea>
              <div class="flex justify-end">
                <button @click="submitReply" class="px-5 py-2.5 bg-[#334EAC] hover:bg-[#081F5C] text-white rounded-2xl font-bold text-xs shadow-sm active:scale-95 transition-all">
                  Kirim Balasan
                </button>
              </div>
            </div>
            
            <div v-else class="bg-[#F7F2EB]/40 border border-[#D0E3FF] p-5 rounded-2xl space-y-2.5">
              <div class="flex items-center justify-between">
                <span class="text-[11px] font-bold text-[#334EAC] uppercase tracking-wider">Telah Dibalas Oleh Anda</span>
                <span class="text-[10px] text-slate-400 font-medium">Hari Ini</span>
              </div>
              <p class="text-xs sm:text-sm font-medium text-slate-700">"{{ tutorReply }}"</p>
            </div>
          </div>
        </div>

      </div>

      <!-- RIGHT SIDEBAR: INSTRUCTIONS & GENERAL RATING -->
      <div class="space-y-6 w-full shrink-0 lg:w-[380px]">
        
        <!-- Professional summary rating distributions -->
        <div class="bg-white rounded-3xl p-6 border border-slate-200/60 shadow-sm space-y-4">
          <h3 class="text-sm font-bold text-slate-900">Performa Mengajar</h3>
          <div class="flex items-baseline gap-2">
            <span class="text-4xl font-extrabold text-[#334EAC] tracking-tight">4.9</span>
            <span class="text-xs text-slate-400 font-semibold">/ 5.0 Rating Kumulatif</span>
          </div>

          <div class="space-y-2 pt-2 border-t border-slate-100 text-xs">
            <div class="flex items-center justify-between font-bold text-slate-600">
              <span>Sesi Tepat Waktu</span>
              <span class="text-emerald-600">98%</span>
            </div>
            <div class="flex items-center justify-between font-bold text-slate-600">
              <span>Materi Terstruktur</span>
              <span class="text-emerald-600">96%</span>
            </div>
          </div>
        </div>

      </div>

    </div>

    <!-- Success Toast -->
    <div v-if="showSuccess" class="fixed bottom-6 right-6 z-50 bg-[#334EAC] text-white px-6 py-4 rounded-2xl shadow-xl flex items-center gap-3 animate-in slide-in-from-bottom-5">
      <div class="w-8 h-8 bg-white/20 rounded-full flex items-center justify-center shrink-0">
        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"><polyline points="20 6 9 17 4 12"/></svg>
      </div>
      <div>
        <h4 class="font-bold text-sm">Balasan Terkirim!</h4>
        <p class="text-xs text-[#D0E3FF] font-medium">Mahasiswa akan menerima notifikasi balasan ulasan Anda.</p>
      </div>
    </div>

  </div>
</template>

<script setup>
import { ref } from 'vue'
import { RouterLink, useRoute } from 'vue-router'

const route = useRoute()
const showSuccess = ref(false)
const replySubmitted = ref(false)
const tutorReply = ref('')

const feedbackData = ref({
  studentName: 'Budi Santoso',
  initials: 'BS',
  date: '25 Mei 2026',
  topic: 'Algoritma Pencarian & Sorting',
  rating: 5,
  comment: 'Penjelasan Dr. Sarah sangat terstruktur dan mudah dimengerti. Latihan coding java yang diberikan sangat membantu persiapan kuis saya besok! Terima kasih banyak Dok.'
})

const submitReply = () => {
  if (!tutorReply.value.trim()) return
  replySubmitted.value = true
  showSuccess.value = true
  setTimeout(() => { showSuccess.value = false }, 3000)
}
</script>
