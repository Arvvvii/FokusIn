<template>
  <div class="space-y-6 animate-in fade-in duration-500">
    
    <div class="flex flex-col xl:flex-row gap-8 items-start">
      
      <!-- Left Panel: Main Exam Area -->
      <div class="w-full xl:w-[70%] space-y-6">
        
        <!-- Header / Progress Bar -->
        <div class="bg-white rounded-[2rem] p-6 shadow-[0_4px_24px_rgba(0,0,0,0.02)] border border-slate-100/80 flex flex-col md:flex-row md:items-center justify-between gap-4">
          <div class="flex-1">
            <h2 class="text-[15px] font-extrabold text-[#081F5C] mb-2 flex items-center gap-2">
              <span class="w-2.5 h-2.5 rounded-full bg-[#334EAC]"></span>
              Question 4 of 15
            </h2>
            <div class="w-full h-2.5 bg-[#EDF1F6] rounded-full overflow-hidden">
              <div class="h-full bg-[#334EAC] w-[26%] rounded-full transition-all duration-500"></div>
            </div>
          </div>
          
          <div class="flex items-center gap-3 px-5 py-3 bg-[#F7F2EB] rounded-2xl border border-amber-100 shrink-0">
            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="#F59E0B" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"/><polyline points="12 6 12 12 16 14"/></svg>
            <span class="text-[17px] font-extrabold text-[#081F5C] tracking-widest">24:15</span>
          </div>
        </div>

        <!-- Question Content -->
        <div class="bg-white rounded-[2rem] p-8 md:p-12 shadow-[0_4px_24px_rgba(0,0,0,0.02)] border border-slate-100/80">
          <div class="flex items-start justify-between gap-4 mb-8">
            <h1 class="text-xl md:text-2xl font-bold text-[#081F5C] leading-relaxed">
              A solid cylinder of mass <span class="font-mono text-[#334EAC] bg-[#EDF1F6] px-1.5 py-0.5 rounded">M</span> and radius <span class="font-mono text-[#334EAC] bg-[#EDF1F6] px-1.5 py-0.5 rounded">R</span> rolls without slipping down an inclined plane of angle <span class="font-mono text-[#334EAC] bg-[#EDF1F6] px-1.5 py-0.5 rounded">θ</span>. What is its linear acceleration?
            </h1>
            <button class="w-10 h-10 rounded-xl bg-slate-50 border border-slate-200 flex items-center justify-center text-slate-400 hover:text-rose-500 hover:bg-rose-50 hover:border-rose-200 transition-colors shrink-0" title="Flag for review">
              <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M4 15s1-1 4-1 5 2 8 2 4-1 4-1V3s-1 1-4 1-5-2-8-2-4 1-4 1z"/><line x1="4" x2="4" y1="22" y2="15"/></svg>
            </button>
          </div>

          <!-- Answer Options -->
          <div class="space-y-4 mb-10">
            <!-- Option A (Unselected) -->
            <label class="flex items-center gap-4 p-5 rounded-[1.25rem] border-[2px] border-slate-100 bg-white cursor-pointer hover:border-[#7096D1] hover:bg-[#F7F2EB]/30 transition-all group">
              <div class="w-8 h-8 rounded-lg bg-slate-100 border border-slate-200 flex items-center justify-center text-[13px] font-extrabold text-slate-500 group-hover:bg-white group-hover:text-[#334EAC] transition-colors">A</div>
              <input type="radio" name="answer" class="sr-only">
              <span class="text-[16px] font-bold text-slate-600 group-hover:text-[#081F5C] transition-colors">g sin(θ)</span>
            </label>

            <!-- Option B (Unselected) -->
            <label class="flex items-center gap-4 p-5 rounded-[1.25rem] border-[2px] border-slate-100 bg-white cursor-pointer hover:border-[#7096D1] hover:bg-[#F7F2EB]/30 transition-all group">
              <div class="w-8 h-8 rounded-lg bg-slate-100 border border-slate-200 flex items-center justify-center text-[13px] font-extrabold text-slate-500 group-hover:bg-white group-hover:text-[#334EAC] transition-colors">B</div>
              <input type="radio" name="answer" class="sr-only">
              <span class="text-[16px] font-bold text-slate-600 group-hover:text-[#081F5C] transition-colors">(1/2) g sin(θ)</span>
            </label>

            <!-- Option C (Selected Active State) -->
            <label class="flex items-center gap-4 p-5 rounded-[1.25rem] border-[2px] border-[#334EAC] bg-[#EDF1F6] cursor-pointer shadow-sm transition-all group">
              <div class="w-8 h-8 rounded-lg bg-[#334EAC] border border-[#081F5C] flex items-center justify-center text-[13px] font-extrabold text-white shadow-inner">C</div>
              <input type="radio" name="answer" class="sr-only" checked>
              <span class="text-[16px] font-bold text-[#081F5C]">(2/3) g sin(θ)</span>
            </label>

            <!-- Option D (Unselected) -->
            <label class="flex items-center gap-4 p-5 rounded-[1.25rem] border-[2px] border-slate-100 bg-white cursor-pointer hover:border-[#7096D1] hover:bg-[#F7F2EB]/30 transition-all group">
              <div class="w-8 h-8 rounded-lg bg-slate-100 border border-slate-200 flex items-center justify-center text-[13px] font-extrabold text-slate-500 group-hover:bg-white group-hover:text-[#334EAC] transition-colors">D</div>
              <input type="radio" name="answer" class="sr-only">
              <span class="text-[16px] font-bold text-slate-600 group-hover:text-[#081F5C] transition-colors">(3/4) g sin(θ)</span>
            </label>
          </div>

          <!-- Navigation Buttons -->
          <div class="flex items-center justify-between pt-6 border-t border-slate-100">
            <button class="px-6 py-3.5 bg-white border border-slate-200 hover:bg-slate-50 text-slate-500 rounded-xl font-extrabold text-[14px] transition-all flex items-center gap-2">
              <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"><path d="m15 18-6-6 6-6"/></svg>
              Previous
            </button>
            <button class="px-8 py-3.5 bg-[#081F5C] hover:bg-[#334EAC] text-white rounded-xl font-extrabold text-[14px] transition-all shadow-[0_4px_15px_rgba(8,31,92,0.15)] flex items-center gap-2">
              Next Question
              <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"><path d="m9 18 6-6-6-6"/></svg>
            </button>
          </div>
        </div>

      </div>

      <!-- Right Panel: Navigator & Tools -->
      <div class="w-full xl:w-[30%] shrink-0 space-y-6">
        
        <!-- Question Navigator Grid -->
        <div class="bg-white rounded-[2rem] p-7 shadow-[0_4px_24px_rgba(0,0,0,0.02)] border border-slate-100/80">
          <h3 class="text-[15px] font-extrabold text-[#081F5C] mb-5">Question Navigator</h3>
          
          <div class="grid grid-cols-5 gap-2 mb-8">
            <!-- Answered -->
            <button v-for="n in 3" :key="'ans-'+n" class="w-full aspect-square rounded-xl bg-[#EDF1F6] border border-[#7096D1] text-[#334EAC] font-extrabold text-[14px] flex items-center justify-center hover:bg-[#BAD6EB] transition-colors">
              {{ n }}
            </button>
            <!-- Current -->
            <button class="w-full aspect-square rounded-xl bg-[#334EAC] border border-[#081F5C] text-white font-extrabold text-[14px] flex items-center justify-center shadow-inner relative">
              4
              <span class="absolute -top-1 -right-1 w-2.5 h-2.5 bg-rose-500 rounded-full animate-pulse border-2 border-white"></span>
            </button>
            <!-- Flagged -->
            <button class="w-full aspect-square rounded-xl bg-white border-2 border-rose-200 text-rose-500 font-extrabold text-[14px] flex items-center justify-center hover:bg-rose-50 transition-colors relative">
              5
              <span class="absolute top-1 right-1">
                <svg xmlns="http://www.w3.org/2000/svg" width="8" height="8" viewBox="0 0 24 24" fill="currentColor" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M4 15s1-1 4-1 5 2 8 2 4-1 4-1V3s-1 1-4 1-5-2-8-2-4 1-4 1z"/><line x1="4" x2="4" y1="22" y2="15"/></svg>
              </span>
            </button>
            <!-- Unanswered -->
            <button v-for="n in 10" :key="'unans-'+n" class="w-full aspect-square rounded-xl bg-slate-50 border border-slate-200 text-slate-400 font-extrabold text-[14px] flex items-center justify-center hover:bg-slate-100 hover:text-slate-600 transition-colors">
              {{ n + 5 }}
            </button>
          </div>

          <div class="flex flex-col gap-2 pt-5 border-t border-slate-100">
            <div class="flex items-center justify-between text-[12px] font-bold">
              <span class="flex items-center gap-2 text-slate-500"><div class="w-3 h-3 rounded-md bg-[#EDF1F6] border border-[#7096D1]"></div> Answered</span>
              <span>3</span>
            </div>
            <div class="flex items-center justify-between text-[12px] font-bold">
              <span class="flex items-center gap-2 text-slate-500"><div class="w-3 h-3 rounded-md bg-white border-2 border-rose-200"></div> Flagged</span>
              <span>1</span>
            </div>
            <div class="flex items-center justify-between text-[12px] font-bold">
              <span class="flex items-center gap-2 text-slate-500"><div class="w-3 h-3 rounded-md bg-slate-50 border border-slate-200"></div> Unanswered</span>
              <span>11</span>
            </div>
          </div>
        </div>

        <!-- AI Help Widget -->
        <div class="bg-gradient-to-br from-[#F7F2EB] to-white rounded-[2rem] p-6 border border-amber-100 shadow-sm relative overflow-hidden">
          <div class="absolute top-0 right-0 w-24 h-24 bg-[#334EAC]/5 rounded-bl-full pointer-events-none"></div>
          <h3 class="text-[14px] font-extrabold text-[#081F5C] mb-2 flex items-center gap-2 relative z-10">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="#F59E0B" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"/><path d="M12 16v-4"/><path d="M12 8h.01"/></svg>
            AI Hint Available
          </h3>
          <p class="text-[12px] font-medium text-slate-500 mb-4 relative z-10 leading-relaxed">Stuck on this rolling motion problem? Request a structural hint without losing full points.</p>
          <button class="w-full py-2.5 bg-white border border-amber-200 hover:border-amber-400 text-amber-600 rounded-xl font-extrabold text-[12px] transition-colors shadow-sm relative z-10">
            Reveal Hint (-5 pts)
          </button>
        </div>

        <!-- Submit CTA -->
        <div class="pt-4">
          <button @click="submitQuiz" class="w-full py-4 bg-[#334EAC] hover:bg-[#081F5C] text-white rounded-[1.25rem] font-extrabold text-[15px] transition-all shadow-[0_4px_15px_rgba(51,78,172,0.15)] active:scale-95 flex items-center justify-center gap-2">
            <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"><path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"/><path d="m9 11 3 3L22 4"/></svg>
            Submit Quiz
          </button>
          <button class="w-full py-3 mt-2 bg-transparent text-slate-400 hover:text-[#081F5C] rounded-[1.25rem] font-bold text-[13px] transition-colors">
            Save & Exit
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
