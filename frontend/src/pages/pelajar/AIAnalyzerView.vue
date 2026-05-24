<template>
  <div class="space-y-8 animate-in fade-in duration-500">
    
    <!-- Header Section -->
    <div class="flex flex-col md:flex-row md:items-center justify-between gap-6 mb-12">
      <div class="max-w-2xl">
        <h1 class="text-3xl md:text-4xl font-extrabold text-[#081F5C] tracking-tight mb-3">AI Pattern Analyzer</h1>
        <p class="text-slate-500 font-medium text-[16px] leading-relaxed">Upload past exams or study materials. Our AI will analyze historical patterns and tailor a strategic learning plan for you.</p>
      </div>
      <!-- Primary CTA -->
      <RouterLink to="/pelajar/ai-analyzer/create" class="inline-flex items-center justify-center gap-2.5 px-7 py-3.5 bg-[#334EAC] hover:bg-[#081F5C] text-white rounded-2xl font-extrabold transition-all shadow-[0_4px_15px_rgba(51,78,172,0.15)] active:scale-95 shrink-0">
        <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"><path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"/><polyline points="17 8 12 3 7 8"/><line x1="12" x2="12" y1="3" y2="15"/></svg>
        New Analysis
      </RouterLink>
    </div>

    <!-- Upload Area -->
    <div class="bg-white rounded-[2rem] p-8 md:p-14 mb-12 shadow-[0_4px_24px_rgba(0,0,0,0.02)] border border-slate-100/80 group transition-all">
      <div class="max-w-3xl mx-auto flex flex-col items-center justify-center p-12 md:p-16 border-[2.5px] border-dashed border-slate-200 rounded-[2rem] bg-[#F7F2EB]/30 hover:bg-[#F7F2EB]/80 hover:border-[#7096D1] transition-all cursor-pointer relative overflow-hidden">
        
        <div class="w-20 h-20 rounded-full bg-[#EDF1F6] flex items-center justify-center text-[#334EAC] mb-6 group-hover:-translate-y-2 group-hover:shadow-md transition-all duration-300 border border-slate-100/50">
          <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"/><polyline points="17 8 12 3 7 8"/><line x1="12" x2="12" y1="3" y2="15"/></svg>
        </div>
        
        <h3 class="text-[22px] font-extrabold text-[#081F5C] text-center mb-3">Drag and drop your document here</h3>
        <p class="text-[15px] font-medium text-slate-500 text-center max-w-md mb-8 leading-relaxed">We accept PDF, DOCX, and TXT files containing exam papers, lecture notes, or textbook chapters.</p>
        
        <div class="flex items-center gap-3">
          <span class="px-4 py-1.5 bg-white text-slate-400 text-[11px] font-extrabold rounded-xl shadow-sm border border-slate-200/60 uppercase tracking-widest">PDF</span>
          <span class="px-4 py-1.5 bg-white text-slate-400 text-[11px] font-extrabold rounded-xl shadow-sm border border-slate-200/60 uppercase tracking-widest">DOCX</span>
          <span class="px-4 py-1.5 bg-[#EDF1F6] text-[#334EAC] text-[11px] font-extrabold rounded-xl shadow-sm border border-slate-200/60 uppercase tracking-widest">Max 10MB</span>
        </div>
      </div>
    </div>

    <!-- Analytics Grid Layout (Compact & Clean) -->
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6 lg:gap-8">
      
      <!-- Most Frequent Topics -->
      <div class="lg:col-span-2 bg-white rounded-[2rem] p-8 shadow-[0_4px_24px_rgba(0,0,0,0.02)] border border-slate-100/80 hover:shadow-md transition-shadow">
        <div class="flex items-center justify-between mb-8">
          <h3 class="text-[17px] font-extrabold text-[#081F5C] flex items-center gap-3">
            <span class="w-8 h-8 rounded-lg bg-[#EDF1F6] flex items-center justify-center text-[#334EAC]"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"><path d="M3 3v18h18"/><path d="m19 9-5 5-4-4-3 3"/></svg></span>
            Topic Frequency
          </h3>
          <span class="text-[12px] font-bold text-slate-400">Based on recent upload</span>
        </div>
        
        <div class="space-y-6">
          <div class="group cursor-pointer">
            <div class="flex justify-between items-center text-[14px] font-bold mb-2">
              <span class="text-[#081F5C] group-hover:text-[#334EAC] transition-colors">Kinematics & Dynamics</span>
              <span class="text-slate-500 font-extrabold">32%</span>
            </div>
            <div class="w-full h-2.5 bg-[#EDF1F6] rounded-full overflow-hidden">
              <div class="h-full bg-[#334EAC] w-[32%] rounded-full transition-all"></div>
            </div>
          </div>

          <div class="group cursor-pointer">
            <div class="flex justify-between items-center text-[14px] font-bold mb-2">
              <span class="text-[#081F5C] group-hover:text-[#334EAC] transition-colors">Electromagnetism</span>
              <span class="text-slate-500 font-extrabold">24%</span>
            </div>
            <div class="w-full h-2.5 bg-[#EDF1F6] rounded-full overflow-hidden">
              <div class="h-full bg-[#7096D1] w-[24%] rounded-full transition-all"></div>
            </div>
          </div>

          <div class="group cursor-pointer">
            <div class="flex justify-between items-center text-[14px] font-bold mb-2">
              <span class="text-[#081F5C] group-hover:text-[#334EAC] transition-colors">Thermodynamics</span>
              <span class="text-slate-500 font-extrabold">18%</span>
            </div>
            <div class="w-full h-2.5 bg-[#EDF1F6] rounded-full overflow-hidden">
              <div class="h-full bg-[#BAD6EB] w-[18%] rounded-full transition-all"></div>
            </div>
          </div>

          <div class="group cursor-pointer">
            <div class="flex justify-between items-center text-[14px] font-bold mb-2">
              <span class="text-[#081F5C] group-hover:text-[#334EAC] transition-colors">Modern Physics</span>
              <span class="text-slate-500 font-extrabold">15%</span>
            </div>
            <div class="w-full h-2.5 bg-[#EDF1F6] rounded-full overflow-hidden">
              <div class="h-full bg-slate-300 w-[15%] rounded-full transition-all"></div>
            </div>
          </div>
        </div>
      </div>

      <!-- Difficulty Chart -->
      <div class="bg-white rounded-[2rem] p-8 shadow-[0_4px_24px_rgba(0,0,0,0.02)] border border-slate-100/80 flex flex-col items-center hover:shadow-md transition-shadow">
        <h3 class="text-[17px] font-extrabold text-[#081F5C] mb-8 w-full text-left flex items-center gap-3">
          <span class="w-8 h-8 rounded-lg bg-[#F7F2EB] flex items-center justify-center text-amber-600"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"><path d="M12 2v20"/><path d="M17 5H9.5a3.5 3.5 0 0 0 0 7h5a3.5 3.5 0 0 1 0 7H6"/></svg></span>
          Difficulty Mix
        </h3>
        
        <!-- Clean Donut Mockup -->
        <div class="relative w-44 h-44 mb-6">
          <svg viewBox="0 0 36 36" class="w-full h-full transform -rotate-90">
            <!-- Background -->
            <path class="text-[#EDF1F6]" d="M18 2.0845 a 15.9155 15.9155 0 0 1 0 31.831 a 15.9155 15.9155 0 0 1 0 -31.831" fill="none" stroke="currentColor" stroke-width="3.5" />
            <!-- Hard -->
            <path class="text-rose-400" stroke-dasharray="45, 100" d="M18 2.0845 a 15.9155 15.9155 0 0 1 0 31.831 a 15.9155 15.9155 0 0 1 0 -31.831" fill="none" stroke="currentColor" stroke-width="3.5" />
            <!-- Medium -->
            <path class="text-[#7096D1]" stroke-dasharray="35, 100" stroke-dashoffset="-45" d="M18 2.0845 a 15.9155 15.9155 0 0 1 0 31.831 a 15.9155 15.9155 0 0 1 0 -31.831" fill="none" stroke="currentColor" stroke-width="3.5" />
            <!-- Easy -->
            <path class="text-[#BAD6EB]" stroke-dasharray="20, 100" stroke-dashoffset="-80" d="M18 2.0845 a 15.9155 15.9155 0 0 1 0 31.831 a 15.9155 15.9155 0 0 1 0 -31.831" fill="none" stroke="currentColor" stroke-width="3.5" />
          </svg>
          <div class="absolute inset-0 flex flex-col items-center justify-center">
            <span class="text-3xl font-extrabold text-[#081F5C]">45%</span>
            <span class="text-[10px] font-extrabold text-slate-400 uppercase tracking-widest mt-0.5">Hard</span>
          </div>
        </div>
        
        <div class="flex justify-center gap-5 w-full mt-auto">
          <div class="flex items-center gap-1.5">
            <div class="w-2.5 h-2.5 rounded-full bg-rose-400"></div>
            <span class="text-[12px] font-bold text-slate-500">Hard</span>
          </div>
          <div class="flex items-center gap-1.5">
            <div class="w-2.5 h-2.5 rounded-full bg-[#7096D1]"></div>
            <span class="text-[12px] font-bold text-slate-500">Medium</span>
          </div>
          <div class="flex items-center gap-1.5">
            <div class="w-2.5 h-2.5 rounded-full bg-[#BAD6EB]"></div>
            <span class="text-[12px] font-bold text-slate-500">Easy</span>
          </div>
        </div>
      </div>

      <!-- AI Summary / Intelligence Report -->
      <div class="lg:col-span-2 bg-white rounded-[2rem] p-8 shadow-[0_4px_24px_rgba(0,0,0,0.02)] border border-slate-100/80 hover:shadow-md transition-shadow">
        <h3 class="text-[17px] font-extrabold text-[#081F5C] mb-6 flex items-center gap-3">
          <span class="w-8 h-8 rounded-lg bg-emerald-50 flex items-center justify-center text-emerald-600"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"><path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"/><polyline points="14 2 14 8 20 8"/><line x1="16" y1="13" x2="8" y2="13"/><line x1="16" y1="17" x2="8" y2="17"/><polyline points="10 9 9 9 8 9"/></svg></span>
          AI Intelligence Report
        </h3>
        
        <p class="text-[14px] font-medium text-slate-600 leading-relaxed mb-8">
          The analyzed document is heavily focused on <strong class="text-[#081F5C]">Kinematics & Dynamics</strong> (32%), specifically testing your understanding of Angular Momentum and Rigid Body Dynamics. Historical data suggests these topics are often the most challenging sections in the OSN Physics examinations.
        </p>

        <h4 class="text-[13px] font-extrabold text-[#081F5C] mb-4">Recommended Learning Path</h4>
        <ul class="space-y-4 mb-6">
          <li class="flex items-start gap-3.5">
            <div class="w-6 h-6 rounded-md bg-[#EDF1F6] flex items-center justify-center text-[#334EAC] font-extrabold text-[12px] shrink-0 mt-0.5">1</div>
            <div>
              <p class="text-[14px] font-bold text-[#081F5C] mb-0.5">Review Angular Momentum Conservation</p>
              <p class="text-[13px] text-slate-500">Focus on problems involving non-uniform mass distribution.</p>
            </div>
          </li>
          <li class="flex items-start gap-3.5">
            <div class="w-6 h-6 rounded-md bg-[#EDF1F6] flex items-center justify-center text-[#334EAC] font-extrabold text-[12px] shrink-0 mt-0.5">2</div>
            <div>
              <p class="text-[14px] font-bold text-[#081F5C] mb-0.5">Practice Vector Algebra for Electromagnetism</p>
              <p class="text-[13px] text-slate-500">Specifically targeting Lorentz Force calculations.</p>
            </div>
          </li>
        </ul>

        <button class="mt-2 inline-flex items-center gap-2 text-[14px] font-extrabold text-[#334EAC] hover:text-[#081F5C] transition-colors">
          View full personalized syllabus
          <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"><path d="m9 18 6-6-6-6"/></svg>
        </button>
      </div>

      <!-- Important Keywords -->
      <div class="bg-white rounded-[2rem] p-8 shadow-[0_4px_24px_rgba(0,0,0,0.02)] border border-slate-100/80 hover:shadow-md transition-shadow">
        <h3 class="text-[17px] font-extrabold text-[#081F5C] mb-6 flex items-center gap-3">
          <span class="w-8 h-8 rounded-lg bg-[#F7F2EB] flex items-center justify-center text-[#334EAC]"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"><path d="M12 2v20"/><path d="m17 5-5-3-5 3v14l5 3 5-3Z"/></svg></span>
          Important Keywords
        </h3>
        
        <div class="flex flex-wrap gap-2.5">
          <span class="px-3.5 py-1.5 bg-slate-50 hover:bg-[#EDF1F6] text-slate-600 hover:text-[#081F5C] text-[12px] font-bold rounded-lg border border-slate-200/60 shadow-sm transition-colors cursor-pointer">Angular Momentum</span>
          <span class="px-3.5 py-1.5 bg-slate-50 hover:bg-[#EDF1F6] text-slate-600 hover:text-[#081F5C] text-[12px] font-bold rounded-lg border border-slate-200/60 shadow-sm transition-colors cursor-pointer">Lorentz Force</span>
          <span class="px-3.5 py-1.5 bg-slate-50 hover:bg-[#EDF1F6] text-slate-600 hover:text-[#081F5C] text-[12px] font-bold rounded-lg border border-slate-200/60 shadow-sm transition-colors cursor-pointer">Entropy</span>
          <span class="px-3.5 py-1.5 bg-slate-50 hover:bg-[#EDF1F6] text-slate-600 hover:text-[#081F5C] text-[12px] font-bold rounded-lg border border-slate-200/60 shadow-sm transition-colors cursor-pointer">Relativity</span>
          <span class="px-3.5 py-1.5 bg-slate-50 hover:bg-[#EDF1F6] text-slate-600 hover:text-[#081F5C] text-[12px] font-bold rounded-lg border border-slate-200/60 shadow-sm transition-colors cursor-pointer">Maxwell's Eqs</span>
          <span class="px-3.5 py-1.5 bg-slate-50 hover:bg-[#EDF1F6] text-slate-600 hover:text-[#081F5C] text-[12px] font-bold rounded-lg border border-slate-200/60 shadow-sm transition-colors cursor-pointer">Thermodynamics</span>
        </div>
      </div>

    </div>
  </div>
</template>

<script setup>
import { RouterLink } from 'vue-router'
// Minimalist Academic AI Analyzer Dashboard
</script>
