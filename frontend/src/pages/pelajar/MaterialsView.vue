<template>
  <div class="space-y-6 animate-in fade-in duration-500">
    
    <!-- 1. Top Header -->
    <div class="flex flex-col md:flex-row md:items-center justify-between gap-6 mb-12">
      <div class="max-w-2xl">
        <h1 class="text-3xl md:text-4xl font-extrabold text-[#081F5C] tracking-tight mb-3">Academic Materials</h1>
        <p class="text-slate-500 font-medium text-[16px] leading-relaxed">Access a curated library of lecture notes, exam papers, and university resources to accelerate your learning.</p>
      </div>
      <!-- Primary CTA -->
      <RouterLink to="/pelajar/materials/create" class="inline-flex items-center justify-center gap-2.5 px-7 py-3.5 bg-[#334EAC] hover:bg-[#081F5C] text-white rounded-[1.25rem] font-extrabold transition-all shadow-[0_4px_15px_rgba(51,78,172,0.15)] active:scale-95 shrink-0">
        <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"><path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"/><polyline points="17 8 12 3 7 8"/><line x1="12" x2="12" y1="3" y2="15"/></svg>
        Upload Material
      </RouterLink>
    </div>

    <!-- 2. Search & Filter Section -->
    <div class="bg-white rounded-[2rem] p-4 md:p-5 shadow-[0_4px_24px_rgba(0,0,0,0.02)] border border-slate-100/80 mb-12 flex flex-col md:flex-row gap-4">
      
      <!-- Search -->
      <div class="relative flex-1">
        <div class="absolute inset-y-0 left-0 pl-5 flex items-center pointer-events-none text-slate-400">
          <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><circle cx="11" cy="11" r="8"/><path d="m21 21-4.3-4.3"/></svg>
        </div>
        <input type="text" class="w-full pl-14 pr-5 py-3.5 bg-[#F7F2EB]/50 hover:bg-[#EDF1F6]/50 border border-transparent hover:border-slate-200 rounded-[1.25rem] text-[15px] font-bold text-[#081F5C] placeholder-slate-400 focus:outline-none focus:ring-4 focus:ring-[#7096D1]/20 focus:border-[#7096D1] transition-all" placeholder="Search for documents, topics, or authors...">
      </div>

      <!-- Categories -->
      <div class="relative min-w-[180px]">
        <select class="w-full pl-5 pr-10 py-3.5 bg-[#F7F2EB]/50 hover:bg-[#EDF1F6]/50 border border-transparent hover:border-slate-200 rounded-[1.25rem] text-[14px] font-bold text-[#081F5C] appearance-none focus:outline-none focus:ring-4 focus:ring-[#7096D1]/20 transition-all cursor-pointer">
          <option value="">All Subjects</option>
          <option value="physics">Physics</option>
          <option value="cs">Computer Science</option>
          <option value="math">Mathematics</option>
        </select>
        <div class="absolute inset-y-0 right-0 pr-5 flex items-center pointer-events-none text-slate-400">
          <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"><path d="m6 9 6 6 6-6"/></svg>
        </div>
      </div>

      <!-- File Type -->
      <div class="relative min-w-[150px]">
        <select class="w-full pl-5 pr-10 py-3.5 bg-[#F7F2EB]/50 hover:bg-[#EDF1F6]/50 border border-transparent hover:border-slate-200 rounded-[1.25rem] text-[14px] font-bold text-[#081F5C] appearance-none focus:outline-none focus:ring-4 focus:ring-[#7096D1]/20 transition-all cursor-pointer">
          <option value="">Any Format</option>
          <option value="pdf">PDF</option>
          <option value="docx">DOCX</option>
          <option value="ppt">PPT</option>
        </select>
        <div class="absolute inset-y-0 right-0 pr-5 flex items-center pointer-events-none text-slate-400">
          <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"><path d="m6 9 6 6 6-6"/></svg>
        </div>
      </div>

      <!-- Filter Button -->
      <button class="px-8 py-3.5 bg-white border border-slate-200 hover:border-[#334EAC] text-[#081F5C] hover:text-[#334EAC] rounded-[1.25rem] font-extrabold text-[14px] transition-all shadow-sm active:scale-95 shrink-0 flex items-center justify-center gap-2">
        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"><path d="M22 3H2l8 9.46V19l4 2v-8.54L22 3z"/></svg>
        Filter
      </button>

    </div>

    <!-- 3. Material Grid -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6 lg:gap-8">
      
      <!-- Material Card 1 -->
      <RouterLink to="/pelajar/materials/1" class="bg-white rounded-[2rem] p-5 shadow-[0_4px_24px_rgba(0,0,0,0.02)] border border-slate-100/80 hover:shadow-lg hover:-translate-y-1 transition-all group flex flex-col h-full cursor-pointer block">
        <div class="w-full h-44 bg-[#F7F2EB] rounded-2xl mb-5 relative overflow-hidden border border-slate-200/60">
          <div class="absolute inset-0 flex flex-col items-center justify-center text-slate-400 group-hover:scale-105 transition-transform duration-500">
            <svg xmlns="http://www.w3.org/2000/svg" width="48" height="48" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="mb-2"><path d="M14.5 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V7.5L14.5 2z"/><polyline points="14 2 14 8 20 8"/></svg>
          </div>
          <div class="absolute top-3 right-3 bg-white px-2.5 py-1 rounded-lg text-rose-500 text-[10px] font-extrabold shadow-sm border border-slate-100 uppercase tracking-widest">
            PDF
          </div>
        </div>

        <div class="flex-1 flex flex-col">
          <span class="text-[#334EAC] text-[10px] font-extrabold uppercase tracking-widest mb-2">Physics</span>
          <h3 class="text-[16px] font-extrabold text-[#081F5C] mb-2 leading-snug group-hover:text-[#334EAC] transition-colors line-clamp-2">OSN Physics National Final Exam 2023 - Complete Solution</h3>
          
          <div class="flex items-center gap-2 mb-4 mt-auto pt-3">
            <div class="w-6 h-6 rounded-full bg-[#EDF1F6] flex items-center justify-center font-bold text-[#081F5C] text-[10px] border border-slate-200">
              PA
            </div>
            <span class="text-[12px] font-bold text-slate-500">Prof. Anderson</span>
          </div>

          <div class="flex items-center justify-between pt-4 border-t border-slate-100/80">
            <div class="flex items-center gap-1.5 text-slate-400">
              <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"/><polyline points="7 10 12 15 17 10"/><line x1="12" x2="12" y1="15" y2="3"/></svg>
              <span class="text-[12px] font-bold">1.2k</span>
            </div>
            <div class="text-[#334EAC] font-extrabold text-[13px] hover:text-[#081F5C] transition-colors flex items-center gap-1">
              Open <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"><path d="m9 18 6-6-6-6"/></svg>
            </div>
          </div>
        </div>
      </RouterLink>

      <!-- Material Card 2 -->
      <RouterLink to="/pelajar/materials/2" class="bg-white rounded-[2rem] p-5 shadow-[0_4px_24px_rgba(0,0,0,0.02)] border border-slate-100/80 hover:shadow-lg hover:-translate-y-1 transition-all group flex flex-col h-full cursor-pointer block">
        <div class="w-full h-44 bg-[#EDF1F6] rounded-2xl mb-5 relative overflow-hidden border border-slate-200/60">
          <div class="absolute inset-0 flex flex-col items-center justify-center text-slate-400 group-hover:scale-105 transition-transform duration-500">
            <svg xmlns="http://www.w3.org/2000/svg" width="48" height="48" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="mb-2"><path d="M14.5 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V7.5L14.5 2z"/><polyline points="14 2 14 8 20 8"/></svg>
          </div>
          <div class="absolute top-3 right-3 bg-white px-2.5 py-1 rounded-lg text-blue-500 text-[10px] font-extrabold shadow-sm border border-slate-100 uppercase tracking-widest">
            DOCX
          </div>
        </div>

        <div class="flex-1 flex flex-col">
          <span class="text-[#334EAC] text-[10px] font-extrabold uppercase tracking-widest mb-2">Computer Science</span>
          <h3 class="text-[16px] font-extrabold text-[#081F5C] mb-2 leading-snug group-hover:text-[#334EAC] transition-colors line-clamp-2">Data Structures & Algorithms - Midterm Review</h3>
          
          <div class="flex items-center gap-2 mb-4 mt-auto pt-3">
            <div class="w-6 h-6 rounded-full bg-[#EDF1F6] flex items-center justify-center font-bold text-[#081F5C] text-[10px] border border-slate-200">
              BS
            </div>
            <span class="text-[12px] font-bold text-slate-500">Budi Santoso</span>
          </div>

          <div class="flex items-center justify-between pt-4 border-t border-slate-100/80">
            <div class="flex items-center gap-1.5 text-slate-400">
              <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"/><polyline points="7 10 12 15 17 10"/><line x1="12" x2="12" y1="15" y2="3"/></svg>
              <span class="text-[12px] font-bold">850</span>
            </div>
            <div class="text-[#334EAC] font-extrabold text-[13px] hover:text-[#081F5C] transition-colors flex items-center gap-1">
              Open <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"><path d="m9 18 6-6-6-6"/></svg>
            </div>
          </div>
        </div>
      </RouterLink>

      <!-- Material Card 3 -->
      <RouterLink to="/pelajar/materials/3" class="bg-white rounded-[2rem] p-5 shadow-[0_4px_24px_rgba(0,0,0,0.02)] border border-slate-100/80 hover:shadow-lg hover:-translate-y-1 transition-all group flex flex-col h-full cursor-pointer block">
        <div class="w-full h-44 bg-[#F7F2EB] rounded-2xl mb-5 relative overflow-hidden border border-slate-200/60">
          <div class="absolute inset-0 flex flex-col items-center justify-center text-slate-400 group-hover:scale-105 transition-transform duration-500">
            <svg xmlns="http://www.w3.org/2000/svg" width="48" height="48" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="mb-2"><rect width="18" height="18" x="3" y="3" rx="2" ry="2"/><circle cx="9" cy="9" r="2"/><path d="m21 15-3.086-3.086a2 2 0 0 0-2.828 0L6 21"/></svg>
          </div>
          <div class="absolute top-3 right-3 bg-white px-2.5 py-1 rounded-lg text-amber-500 text-[10px] font-extrabold shadow-sm border border-slate-100 uppercase tracking-widest">
            PPT
          </div>
        </div>

        <div class="flex-1 flex flex-col">
          <span class="text-[#334EAC] text-[10px] font-extrabold uppercase tracking-widest mb-2">Mathematics</span>
          <h3 class="text-[16px] font-extrabold text-[#081F5C] mb-2 leading-snug group-hover:text-[#334EAC] transition-colors line-clamp-2">Calculus III: Multiple Integrals Visualized</h3>
          
          <div class="flex items-center gap-2 mb-4 mt-auto pt-3">
            <div class="w-6 h-6 rounded-full bg-[#EDF1F6] flex items-center justify-center font-bold text-[#081F5C] text-[10px] border border-slate-200">
              SS
            </div>
            <span class="text-[12px] font-bold text-slate-500">Dr. Sarah Smith</span>
          </div>

          <div class="flex items-center justify-between pt-4 border-t border-slate-100/80">
            <div class="flex items-center gap-1.5 text-slate-400">
              <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"/><polyline points="7 10 12 15 17 10"/><line x1="12" x2="12" y1="15" y2="3"/></svg>
              <span class="text-[12px] font-bold">3.4k</span>
            </div>
            <div class="text-[#334EAC] font-extrabold text-[13px] hover:text-[#081F5C] transition-colors flex items-center gap-1">
              Open <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"><path d="m9 18 6-6-6-6"/></svg>
            </div>
          </div>
        </div>
      </RouterLink>

    </div>
  </div>
</template>

<script setup>
import { RouterLink } from 'vue-router'
// Modern Academic Materials Library View
</script>
