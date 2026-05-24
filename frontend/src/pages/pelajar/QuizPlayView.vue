<template>
  <div class="space-y-6 animate-in fade-in duration-500">
    
    <div class="flex flex-col xl:flex-row gap-8 items-start">
      
      <!-- Left Panel: Main Exam Area -->
      <div class="w-full xl:w-[70%] space-y-6">
        
        <!-- Header / Progress Bar -->
        <div class="bg-white/80 backdrop-blur-xl rounded-3xl p-6 shadow-[0_10px_40px_rgba(15,23,42,0.06)] border border-slate-100 flex flex-col md:flex-row md:items-center justify-between gap-4 transition-all duration-300 ease-out hover:shadow-xl group/card">
          <div class="flex-1">
            <h2 class="text-[15px] font-bold text-slate-900 mb-2 flex items-center gap-2 tracking-tight">
              <span class="w-2.5 h-2.5 rounded-full bg-[#334EAC]"></span>
              Pertanyaan 4 dari 15
            </h2>
            <div class="w-full h-2.5 bg-[#EDF1F6] rounded-full overflow-hidden">
              <div class="h-full bg-[#334EAC] w-[26%] rounded-full transition-all duration-500"></div>
            </div>
          </div>
          
          <div class="flex items-center gap-3 px-5 py-3 bg-[#F7F2EB] rounded-2xl border border-amber-100 shrink-0">
            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="#F59E0B" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"/><polyline points="12 6 12 12 16 14"/></svg>
            <span class="text-[17px] font-bold text-slate-900 tracking-tight">24:15</span>
          </div>
        </div>

        <!-- Question Content -->
        <div class="bg-white/80 backdrop-blur-xl rounded-3xl p-8 md:p-12 shadow-[0_10px_40px_rgba(15,23,42,0.06)] border border-slate-100 transition-all duration-300 ease-out hover:shadow-xl group/card">
          <div class="flex items-start justify-between gap-4 mb-8">
            <h1 class="text-xl md:text-2xl font-bold text-slate-900 leading-relaxed tracking-tight">
              Sebuah silinder pejal bermassa <span class="font-mono text-[#334EAC] bg-[#EDF1F6] px-1.5 py-0.5 rounded">M</span> dan berjari-jari <span class="font-mono text-[#334EAC] bg-[#EDF1F6] px-1.5 py-0.5 rounded">R</span> menggelinding tanpa slip menuruni bidang miring dengan sudut <span class="font-mono text-[#334EAC] bg-[#EDF1F6] px-1.5 py-0.5 rounded">θ</span>. Berapakah percepatan linearnya?
            </h1>
            <button class="w-10 h-10 rounded-xl bg-slate-50 border border-slate-200 flex items-center justify-center text-slate-400 hover:text-rose-500 hover:bg-rose-50 hover:border-rose-200 transition-colors shrink-0" title="Tandai untuk ditinjau">
              <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M4 15s1-1 4-1 5 2 8 2 4-1 4-1V3s-1 1-4 1-5-2-8-2-4 1-4 1z"/><line x1="4" x2="4" y1="22" y2="15"/></svg>
            </button>
          </div>

          <!-- Answer Options -->
          <div class="space-y-4 mb-10">
            <!-- Option A (Unselected) -->
            <label class="flex items-center gap-4 p-5 rounded-2xl border-[2px] border-slate-100 bg-white cursor-pointer hover:border-[#7096D1] hover:bg-[#F7F2EB]/30 transition-all group">
              <div class="w-8 h-8 rounded-lg bg-slate-100 border border-slate-200 flex items-center justify-center text-[13px] font-bold text-slate-500 group-hover:bg-white group-hover:text-[#334EAC] transition-colors">A</div>
              <input type="radio" name="answer" class="sr-only">
              <span class="text-[16px] font-bold text-slate-600 group-hover:text-slate-900 transition-colors">g sin(θ)</span>
            </label>

            <!-- Option B (Unselected) -->
            <label class="flex items-center gap-4 p-5 rounded-2xl border-[2px] border-slate-100 bg-white cursor-pointer hover:border-[#7096D1] hover:bg-[#F7F2EB]/30 transition-all group">
              <div class="w-8 h-8 rounded-lg bg-slate-100 border border-slate-200 flex items-center justify-center text-[13px] font-bold text-slate-500 group-hover:bg-white group-hover:text-[#334EAC] transition-colors">B</div>
              <input type="radio" name="answer" class="sr-only">
              <span class="text-[16px] font-bold text-slate-600 group-hover:text-slate-900 transition-colors">(1/2) g sin(θ)</span>
            </label>

            <!-- Option C (Selected Active State) -->
            <label class="flex items-center gap-4 p-5 rounded-2xl border-[2px] border-[#334EAC] bg-[#EDF1F6] cursor-pointer shadow-sm transition-all group">
              <div class="w-8 h-8 rounded-lg bg-[#334EAC] border border-[#081F5C] flex items-center justify-center text-[13px] font-bold text-white shadow-inner">C</div>
              <input type="radio" name="answer" class="sr-only" checked>
              <span class="text-[16px] font-bold text-slate-900">(2/3) g sin(θ)</span>
            </label>

            <!-- Option D (Unselected) -->
            <label class="flex items-center gap-4 p-5 rounded-2xl border-[2px] border-slate-100 bg-white cursor-pointer hover:border-[#7096D1] hover:bg-[#F7F2EB]/30 transition-all group">
              <div class="w-8 h-8 rounded-lg bg-slate-100 border border-slate-200 flex items-center justify-center text-[13px] font-bold text-slate-500 group-hover:bg-white group-hover:text-[#334EAC] transition-colors">D</div>
              <input type="radio" name="answer" class="sr-only">
              <span class="text-[16px] font-bold text-slate-600 group-hover:text-slate-900 transition-colors">(3/4) g sin(θ)</span>
            </label>
          </div>

          <!-- Navigation Buttons -->
          <div class="flex items-center justify-between pt-6 border-t border-slate-100">
            <button class="px-6 py-3.5 bg-white border border-slate-200 hover:bg-slate-50 text-slate-500 rounded-xl font-bold text-[14px] transition-all flex items-center gap-2">
              <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"><path d="m15 18-6-6 6-6"/></svg>
              Sebelumnya
            </button>
            <button class="px-8 py-3.5 bg-[#081F5C] hover:bg-[#334EAC] text-white rounded-xl font-bold text-[14px] transition-all shadow-[0_4px_15px_rgba(8,31,92,0.15)] flex items-center gap-2">
              Pertanyaan Selanjutnya
              <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"><path d="m9 18 6-6-6-6"/></svg>
            </button>
          </div>
        </div>

      </div>

      <!-- Right Panel: Navigator & Tools -->
      <div class="w-full xl:w-[30%] shrink-0 space-y-6">
        
        <!-- Question Navigator Grid -->
        <div class="bg-white/80 backdrop-blur-xl rounded-3xl p-7 shadow-[0_10px_40px_rgba(15,23,42,0.06)] border border-slate-100 transition-all duration-300 ease-out hover:shadow-xl group/card">
          <h3 class="text-[15px] font-bold text-slate-900 mb-5 tracking-tight">Navigasi Pertanyaan</h3>
          
          <div class="grid grid-cols-5 gap-2 mb-8">
            <!-- Answered -->
            <button v-for="n in 3" :key="'ans-'+n" class="w-full aspect-square rounded-xl bg-[#EDF1F6] border border-[#7096D1] text-[#334EAC] font-bold text-[14px] flex items-center justify-center hover:bg-[#BAD6EB] transition-colors">
              {{ n }}
            </button>
            <!-- Current -->
            <button class="w-full aspect-square rounded-xl bg-[#334EAC] border border-[#081F5C] text-white font-bold text-[14px] flex items-center justify-center shadow-inner relative">
              4
              <span class="absolute -top-1 -right-1 w-2.5 h-2.5 bg-rose-500 rounded-full animate-pulse border-2 border-white"></span>
            </button>
            <!-- Flagged -->
            <button class="w-full aspect-square rounded-xl bg-white border-2 border-rose-200 text-rose-500 font-bold text-[14px] flex items-center justify-center hover:bg-rose-50 transition-colors relative">
              5
              <span class="absolute top-1 right-1">
                <svg xmlns="http://www.w3.org/2000/svg" width="8" height="8" viewBox="0 0 24 24" fill="currentColor" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M4 15s1-1 4-1 5 2 8 2 4-1 4-1V3s-1 1-4 1-5-2-8-2-4 1-4 1z"/><line x1="4" x2="4" y1="22" y2="15"/></svg>
              </span>
            </button>
            <!-- Unanswered -->
            <button v-for="n in 10" :key="'unans-'+n" class="w-full aspect-square rounded-xl bg-slate-50 border border-slate-200 text-slate-400 font-bold text-[14px] flex items-center justify-center hover:bg-slate-100 hover:text-slate-600 transition-colors">
              {{ n + 5 }}
            </button>
          </div>

          <div class="flex flex-col gap-2 pt-5 border-t border-slate-100">
            <div class="flex items-center justify-between text-[12px] font-bold">
              <span class="flex items-center gap-2 text-slate-500"><div class="w-3 h-3 rounded-md bg-[#EDF1F6] border border-[#7096D1]"></div> Terjawab</span>
              <span>3</span>
            </div>
            <div class="flex items-center justify-between text-[12px] font-bold">
              <span class="flex items-center gap-2 text-slate-500"><div class="w-3 h-3 rounded-md bg-white border-2 border-rose-200"></div> Ditandai</span>
              <span>1</span>
            </div>
            <div class="flex items-center justify-between text-[12px] font-bold">
              <span class="flex items-center gap-2 text-slate-500"><div class="w-3 h-3 rounded-md bg-slate-50 border border-slate-200"></div> Belum Terjawab</span>
              <span>11</span>
            </div>
          </div>
        </div>

        <!-- AI Help Widget -->
        <div class="bg-gradient-to-br from-[#F7F2EB] to-white rounded-3xl p-6 border border-amber-100 shadow-sm relative overflow-hidden transition-all duration-300 ease-out hover:-translate-y-1 hover:shadow-lg">
          <div class="absolute top-0 right-0 w-24 h-24 bg-[#334EAC]/5 rounded-bl-full pointer-events-none"></div>
          <h3 class="text-[14px] font-bold text-slate-900 mb-2 flex items-center gap-2 relative z-10 tracking-tight">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="#F59E0B" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"/><path d="M12 16v-4"/><path d="M12 8h.01"/></svg>
            Petunjuk AI Tersedia
          </h3>
          <p class="text-[12px] font-medium text-slate-500 mb-4 relative z-10 leading-relaxed">Terkendala pada masalah gerak menggelinding ini? Minta petunjuk struktural tanpa kehilangan poin penuh.</p>
          <button class="w-full py-2.5 bg-white border border-amber-200 hover:border-amber-400 text-amber-600 rounded-xl font-bold text-[12px] transition-colors shadow-sm relative z-10">
            Tampilkan Petunjuk (-5 poin)
          </button>
        </div>

        <!-- Submit CTA -->
        <div class="pt-4">
          <button @click="submitQuiz" class="w-full py-4 bg-[#334EAC] hover:bg-[#081F5C] text-white rounded-2xl font-bold text-[15px] transition-all shadow-[0_4px_15px_rgba(51,78,172,0.15)] active:scale-95 flex items-center justify-center gap-2">
            <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"><path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"/><path d="m9 11 3 3L22 4"/></svg>
            Kumpulkan Kuis
          </button>
          <button class="w-full py-3 mt-2 bg-transparent text-slate-400 hover:text-slate-900 rounded-2xl font-bold text-[13px] transition-colors">
            Simpan & Keluar
          </button>
        </div>

      </div>

    </div>
  </div>
</template>

<script setup>
import { useRouter, useRoute } from 'vue-router'

const router = useRouter()
const route = useRoute()

const submitQuiz = () => {
  // Push to Result View
  router.push(`/pelajar/quiz/${route.params.id}/result`)
}
</script>
