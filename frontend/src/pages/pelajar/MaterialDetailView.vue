<template>
  <div class="space-y-8 animate-in fade-in duration-500 min-w-0">
    
    <!-- 1. Breadcrumbs -->
    <div class="mb-8">
      <div class="flex items-center gap-2 text-[13px] font-bold text-slate-400 mb-4 flex-wrap">
        <RouterLink to="/pelajar/materials" class="hover:text-[#334EAC] transition-colors shrink-0">Materials</RouterLink>
        <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" class="shrink-0"><path d="m9 18 6-6-6-6"/></svg>
        <RouterLink to="/pelajar/materials" class="hover:text-[#334EAC] transition-colors shrink-0">Physics</RouterLink>
        <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" class="shrink-0"><path d="m9 18 6-6-6-6"/></svg>
        <span class="text-[#081F5C] shrink-0 truncate max-w-[200px] md:max-w-none">OSN Physics National Final...</span>
      </div>
    </div>

    <!-- 2. Hero / Header Section -->
    <div class="bg-white rounded-[2.5rem] p-8 md:p-12 shadow-[0_4px_24px_rgba(0,0,0,0.02)] border border-slate-100/80 mb-8 relative overflow-hidden flex flex-col lg:flex-row gap-8 items-start lg:items-center min-w-0">
      <div class="absolute top-0 right-0 w-64 h-64 bg-[#7096D1] rounded-full blur-3xl opacity-10 pointer-events-none -translate-y-1/2 translate-x-1/4"></div>
      
      <!-- Icon/Badge -->
      <div class="w-24 h-24 rounded-[1.5rem] bg-[#F7F2EB] flex items-center justify-center text-rose-500 shrink-0 border border-slate-200/60 shadow-sm relative z-10">
        <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"><path d="M14.5 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V7.5L14.5 2z"/><polyline points="14 2 14 8 20 8"/></svg>
        <div class="absolute -bottom-2 -right-2 px-2.5 py-1 bg-white border border-slate-100 shadow-sm rounded-lg text-[10px] font-extrabold text-[#081F5C] uppercase tracking-widest">
          PDF
        </div>
      </div>

      <div class="flex-1 relative z-10 min-w-0">
        <div class="flex flex-wrap gap-2 mb-4">
          <span class="px-3 py-1 bg-[#EDF1F6] text-[#334EAC] text-[10px] font-extrabold uppercase tracking-widest rounded-md border border-[#BAD6EB]">Physics</span>
          <span class="px-3 py-1 bg-white text-slate-500 text-[10px] font-extrabold uppercase tracking-widest rounded-md border border-slate-200">OSN Prep</span>
        </div>
        <h1 class="text-3xl md:text-4xl font-extrabold text-[#081F5C] tracking-tight mb-4 leading-snug">OSN Physics National Final Exam 2023 - Complete Solution</h1>
        
        <div class="flex flex-wrap items-center gap-6 text-[13px] font-bold text-slate-500">
          <div class="flex items-center gap-2">
            <div class="w-7 h-7 rounded-full bg-[#EDF1F6] flex items-center justify-center font-bold text-[#081F5C] text-[10px] border border-slate-200">
              PA
            </div>
            <span class="text-[#081F5C]">Prof. Anderson</span>
          </div>
          <div class="flex items-center gap-1.5">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><rect width="18" height="18" x="3" y="4" rx="2" ry="2"/><line x1="16" x2="16" y1="2" y2="6"/><line x1="8" x2="8" y1="2" y2="6"/><line x1="3" x2="21" y1="10" y2="10"/></svg>
            Oct 12, 2024
          </div>
          <div class="flex items-center gap-1.5">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"/><polyline points="7 10 12 15 17 10"/><line x1="12" x2="12" y1="15" y2="3"/></svg>
            1,245 Downloads
          </div>
          <div class="flex items-center gap-1.5">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M2 12h20"/><path d="m15 5 7 7-7 7"/></svg>
            45 Pages
          </div>
        </div>
      </div>

      <div class="flex flex-col sm:flex-row lg:flex-col gap-3 w-full lg:w-auto relative z-10 shrink-0">
        <button class="w-full lg:w-48 py-4 bg-[#334EAC] hover:bg-[#081F5C] text-white rounded-[1.25rem] font-extrabold text-[15px] transition-all shadow-[0_4px_15px_rgba(51,78,172,0.15)] active:scale-95 flex items-center justify-center gap-2">
          <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"><path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"/><polyline points="7 10 12 15 17 10"/><line x1="12" x2="12" y1="15" y2="3"/></svg>
          Download PDF
        </button>
        <div class="flex gap-3 w-full lg:w-48">
          <button class="flex-1 py-3.5 bg-white border border-slate-200 hover:border-[#334EAC] text-slate-500 hover:text-[#334EAC] rounded-[1.25rem] font-extrabold text-[14px] transition-colors active:scale-95 flex items-center justify-center gap-2">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="m19 21-7-4-7 4V5a2 2 0 0 1 2-2h10a2 2 0 0 1 2 2v16z"/></svg>
          </button>
          <button class="flex-1 py-3.5 bg-white border border-slate-200 hover:border-[#334EAC] text-slate-500 hover:text-[#334EAC] rounded-[1.25rem] font-extrabold text-[14px] transition-colors active:scale-95 flex items-center justify-center gap-2">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><circle cx="18" cy="5" r="3"/><circle cx="6" cy="12" r="3"/><circle cx="18" cy="19" r="3"/><line x1="8.59" x2="15.42" y1="13.51" y2="17.49"/><line x1="15.41" x2="8.59" y1="6.51" y2="10.49"/></svg>
          </button>
        </div>
      </div>
    </div>

    <!-- Main Grid Content -->
    <div class="flex flex-col xl:flex-row gap-8 min-w-0">
      
      <!-- Left Panel: Content & Preview -->
      <div class="w-full xl:w-[65%] space-y-8 min-w-0">
        
        <!-- Description -->
        <div class="bg-white rounded-[2rem] p-8 shadow-[0_4px_24px_rgba(0,0,0,0.02)] border border-slate-100/80">
          <h3 class="text-[17px] font-extrabold text-[#081F5C] mb-4">Description</h3>
          <div class="prose prose-slate prose-p:text-[14px] prose-p:font-medium prose-p:leading-relaxed prose-p:text-slate-500 max-w-none">
            <p>This document contains the fully verified solutions for the 2023 OSN (Olimpiade Sains Nasional) Physics Final Examination. It covers advanced topics including Rigid Body Dynamics, Thermodynamics, Electromagnetism, and Quantum Mechanics introductions.</p>
            <p>Ideal for high school students preparing for national-level competitions or university freshmen reviewing advanced mechanics. Step-by-step mathematical proofs are included for every question.</p>
          </div>
        </div>

        <!-- Document Preview Area (Mockup) -->
        <div class="bg-slate-50 rounded-[2rem] p-4 shadow-[inset_0_4px_24px_rgba(0,0,0,0.02)] border border-slate-200 h-[600px] flex flex-col relative overflow-hidden">
          <div class="flex items-center justify-between p-3 bg-white rounded-[1.25rem] border border-slate-200 shadow-sm mb-4">
            <div class="flex items-center gap-2 text-slate-500">
              <button class="p-1.5 hover:bg-slate-100 rounded-lg transition-colors"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="m15 18-6-6 6-6"/></svg></button>
              <span class="text-[12px] font-bold">Page 1 / 45</span>
              <button class="p-1.5 hover:bg-slate-100 rounded-lg transition-colors"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="m9 18 6-6-6-6"/></svg></button>
            </div>
            <div class="flex items-center gap-2 text-slate-500">
              <button class="p-1.5 hover:bg-slate-100 rounded-lg transition-colors"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><circle cx="11" cy="11" r="8"/><line x1="21" x2="16.65" y1="21" y2="16.65"/><line x1="11" x2="11" y1="8" y2="14"/><line x1="8" x2="14" y1="11" y2="11"/></svg></button>
              <button class="p-1.5 hover:bg-slate-100 rounded-lg transition-colors"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><circle cx="11" cy="11" r="8"/><line x1="21" x2="16.65" y1="21" y2="16.65"/><line x1="8" x2="14" y1="11" y2="11"/></svg></button>
            </div>
          </div>

          <div class="flex-1 bg-white border border-slate-200 shadow-sm rounded-xl flex items-center justify-center text-slate-400 p-8 overflow-y-auto">
            <!-- Simulated PDF Content -->
            <div class="w-full h-full max-w-2xl mx-auto space-y-6 blur-[1px] opacity-70">
              <div class="h-12 bg-slate-200 rounded w-3/4 mx-auto"></div>
              <div class="h-4 bg-slate-100 rounded w-1/4 mx-auto mb-10"></div>
              <div class="space-y-3">
                <div class="h-4 bg-slate-100 rounded w-full"></div>
                <div class="h-4 bg-slate-100 rounded w-full"></div>
                <div class="h-4 bg-slate-100 rounded w-5/6"></div>
              </div>
              <div class="h-32 bg-slate-100 rounded w-full my-8"></div>
              <div class="space-y-3">
                <div class="h-4 bg-slate-100 rounded w-full"></div>
                <div class="h-4 bg-slate-100 rounded w-4/6"></div>
              </div>
            </div>
            
            <div class="absolute inset-0 bg-gradient-to-t from-white via-white/80 to-transparent flex flex-col items-center justify-end pb-12">
              <button class="px-6 py-3.5 bg-white border border-slate-200 hover:border-[#334EAC] text-[#081F5C] hover:text-[#334EAC] shadow-lg rounded-xl font-extrabold text-[14px] transition-all flex items-center gap-2">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"/><polyline points="7 10 12 15 17 10"/><line x1="12" x2="12" y1="15" y2="3"/></svg>
                Download to Read Full
              </button>
            </div>
          </div>
        </div>

      </div>

      <!-- Right Panel: AI & Related -->
      <div class="w-full xl:w-[35%] shrink-0 space-y-6 min-w-0">
        
        <!-- AI Summary Widget -->
        <div class="bg-gradient-to-br from-[#334EAC] to-[#081F5C] rounded-[2rem] p-8 shadow-lg relative overflow-hidden">
          <div class="absolute top-0 right-0 w-32 h-32 bg-white/10 rounded-full blur-2xl pointer-events-none -translate-y-1/2 translate-x-1/3"></div>
          
          <h3 class="text-[15px] font-extrabold text-white mb-4 flex items-center gap-2 relative z-10">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M12 2v4"/><path d="M12 18v4"/><path d="M4.93 4.93l2.83 2.83"/><path d="M16.24 16.24l2.83 2.83"/><path d="M2 12h4"/><path d="M18 12h4"/><path d="M4.93 19.07l2.83-2.83"/><path d="M16.24 7.76l2.83-2.83"/></svg>
            AI Document Summary
          </h3>

          <div class="bg-white/10 backdrop-blur-sm rounded-[1.25rem] p-5 border border-white/20 relative z-10">
            <ul class="space-y-3">
              <li class="flex items-start gap-2 text-[12px] font-medium text-[#BAD6EB]">
                <div class="w-1.5 h-1.5 rounded-full bg-white mt-1.5 shrink-0"></div>
                <span class="leading-relaxed">Primarily focuses on classical mechanics and thermodynamics.</span>
              </li>
              <li class="flex items-start gap-2 text-[12px] font-medium text-[#BAD6EB]">
                <div class="w-1.5 h-1.5 rounded-full bg-white mt-1.5 shrink-0"></div>
                <span class="leading-relaxed">Contains 15 complex essay questions with proofs.</span>
              </li>
              <li class="flex items-start gap-2 text-[12px] font-medium text-[#BAD6EB]">
                <div class="w-1.5 h-1.5 rounded-full bg-white mt-1.5 shrink-0"></div>
                <span class="leading-relaxed">Matches your current study weakness: Rigid Body Dynamics.</span>
              </li>
            </ul>
          </div>
        </div>

        <!-- Related Materials -->
        <div class="bg-white rounded-[2rem] p-6 shadow-[0_4px_24px_rgba(0,0,0,0.02)] border border-slate-100/80">
          <h3 class="text-[15px] font-extrabold text-[#081F5C] mb-5">Related Materials</h3>
          
          <div class="space-y-4">
            <!-- Item 1 -->
            <RouterLink to="/pelajar/materials/2" class="flex gap-4 group p-3 -m-3 rounded-2xl hover:bg-[#F7F2EB] transition-colors">
              <div class="w-12 h-12 rounded-xl bg-[#EDF1F6] flex items-center justify-center text-[#334EAC] shrink-0 border border-slate-200/60">
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M14.5 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V7.5L14.5 2z"/><polyline points="14 2 14 8 20 8"/></svg>
              </div>
              <div class="min-w-0 flex-1">
                <h4 class="text-[13px] font-extrabold text-[#081F5C] truncate group-hover:text-[#334EAC] transition-colors">OSN 2022 Solutions</h4>
                <p class="text-[11px] font-bold text-slate-400 mt-1">Physics • 12 Pages</p>
              </div>
            </RouterLink>

            <!-- Item 2 -->
            <RouterLink to="/pelajar/materials/3" class="flex gap-4 group p-3 -m-3 rounded-2xl hover:bg-[#F7F2EB] transition-colors">
              <div class="w-12 h-12 rounded-xl bg-rose-50 flex items-center justify-center text-rose-500 shrink-0 border border-rose-100/60">
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"/><polyline points="17 8 12 3 7 8"/><line x1="12" x2="12" y1="3" y2="15"/></svg>
              </div>
              <div class="min-w-0 flex-1">
                <h4 class="text-[13px] font-extrabold text-[#081F5C] truncate group-hover:text-[#334EAC] transition-colors">Thermodynamics Formula Sheet</h4>
                <p class="text-[11px] font-bold text-slate-400 mt-1">Physics • 2 Pages</p>
              </div>
            </RouterLink>
          </div>
          
          <RouterLink to="/pelajar/materials" class="mt-6 block text-center text-[12px] font-extrabold text-[#334EAC] hover:text-[#081F5C] transition-colors">
            View more in Physics
          </RouterLink>
        </div>

      </div>
    </div>
  </div>
</template>

<script setup>
import { RouterLink } from 'vue-router'
// Material Detail View
</script>
