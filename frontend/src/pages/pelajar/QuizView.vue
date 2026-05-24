<template>
  <div class="space-y-6 animate-in fade-in duration-500">
    
    <!-- 1. Header Section -->
    <div class="flex flex-col md:flex-row md:items-center justify-between gap-6 mb-10">
      <div class="max-w-2xl">
        <h1 class="text-3xl md:text-4xl font-bold text-slate-900 tracking-tight mb-3">Ekosistem Kuis AI</h1>
        <p class="text-slate-500 font-medium text-[16px] leading-relaxed">Uji pengetahuanmu dengan kuis yang dihasilkan AI, disesuaikan dengan kelemahanmu dan persyaratan silabus.</p>
      </div>
      <div class="relative w-full md:w-80 shrink-0">
        <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none text-slate-400">
          <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><circle cx="11" cy="11" r="8"/><path d="m21 21-4.3-4.3"/></svg>
        </div>
        <input type="text" class="w-full pl-12 pr-4 py-3.5 bg-white border border-slate-200 hover:border-slate-300 rounded-2xl text-[14px] font-bold text-slate-900 placeholder-slate-400 focus:outline-none focus:ring-4 focus:ring-[#7096D1]/20 focus:border-[#7096D1] transition-all shadow-sm" placeholder="Cari kuis...">
      </div>
    </div>

    <!-- 2. AI Insights & Performance (Top Banner) -->
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6 mb-12">
      
      <!-- AI Recommendation Widget -->
      <div class="lg:col-span-2 bg-gradient-to-br from-[#334EAC] to-[#081F5C] rounded-3xl p-8 shadow-[0_10px_40px_rgba(15,23,42,0.15)] relative overflow-hidden flex flex-col justify-center transition-all duration-300 ease-out hover:-translate-y-1 hover:shadow-2xl">
        <!-- Abstract Decoration -->
        <div class="absolute top-0 right-0 w-64 h-64 bg-white/5 rounded-full blur-3xl pointer-events-none -translate-y-1/2 translate-x-1/4"></div>
        <div class="absolute bottom-0 left-0 w-40 h-40 bg-[#7096D1]/20 rounded-full blur-2xl pointer-events-none translate-y-1/2 -translate-x-1/4"></div>

        <div class="relative z-10 flex flex-col md:flex-row gap-6 items-center md:items-start justify-between">
          <div>
            <div class="inline-flex items-center gap-2 px-3 py-1 bg-white/10 border border-white/20 rounded-lg text-white text-[11px] font-bold uppercase tracking-widest mb-4">
              <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="m12 3-1.912 5.813a2 2 0 0 1-1.275 1.275L3 12l5.813 1.912a2 2 0 0 1 1.275 1.275L12 21l1.912-5.813a2 2 0 0 1 1.275-1.275L21 12l-5.813-1.912a2 2 0 0 1-1.275-1.275L12 3Z"/></svg>
              Rekomendasi AI
            </div>
            <h2 class="text-2xl font-bold text-white mb-2 tracking-tight">Cek Penguasaan Kinematika</h2>
            <p class="text-[#BAD6EB] text-[14px] font-medium leading-relaxed max-w-md">Berdasarkan analisis ujian terbarumu, kami telah membuat kuis 15 pertanyaan untuk memperkuat pemahamanmu tentang Momentum Sudut.</p>
          </div>
          <RouterLink to="/pelajar/quiz/1" class="w-full md:w-auto px-8 py-3.5 bg-white hover:bg-slate-50 text-slate-900 rounded-2xl font-bold text-[14px] transition-all shadow-lg active:scale-95 shrink-0 text-center whitespace-nowrap">
            Mulai Kuis Sekarang
          </RouterLink>
        </div>
      </div>

      <!-- Weekly Performance -->
      <div class="bg-white/80 backdrop-blur-xl rounded-3xl p-8 shadow-[0_10px_40px_rgba(15,23,42,0.06)] border border-slate-100 flex flex-col justify-center transition-all duration-300 ease-out hover:shadow-xl group/card">
        <h3 class="text-[15px] font-bold text-slate-900 mb-6 flex items-center gap-2 tracking-tight">
          Akurasi Mingguan
        </h3>
        <div class="flex items-end gap-3 mb-2">
          <span class="text-4xl font-bold text-[#334EAC] tracking-tight">78%</span>
          <span class="text-[13px] font-bold text-emerald-500 mb-1 flex items-center">
            <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round" class="mr-0.5"><path d="m18 15-6-6-6 6"/></svg>
            +5%
          </span>
        </div>
        <p class="text-[13px] font-bold text-slate-400">vs minggu lalu (73%)</p>
        
        <div class="mt-6 flex gap-1.5 h-12 items-end">
          <div class="w-full bg-[#EDF1F6] rounded-t-sm h-[40%] hover:bg-[#BAD6EB] transition-colors cursor-pointer"></div>
          <div class="w-full bg-[#EDF1F6] rounded-t-sm h-[60%] hover:bg-[#BAD6EB] transition-colors cursor-pointer"></div>
          <div class="w-full bg-[#EDF1F6] rounded-t-sm h-[45%] hover:bg-[#BAD6EB] transition-colors cursor-pointer"></div>
          <div class="w-full bg-[#EDF1F6] rounded-t-sm h-[80%] hover:bg-[#BAD6EB] transition-colors cursor-pointer"></div>
          <div class="w-full bg-[#334EAC] rounded-t-sm h-[78%] cursor-pointer"></div>
        </div>
      </div>
    </div>

    <!-- 3. Category Tabs -->
    <div class="flex items-center gap-3 overflow-x-auto pb-4 mb-8 scrollbar-hide">
      <button class="px-5 py-2.5 bg-slate-900 text-white rounded-2xl font-bold text-[13px] whitespace-nowrap shadow-sm">Semua Kuis</button>
      <button class="px-5 py-2.5 bg-white border border-slate-200 hover:border-[#7096D1] hover:bg-slate-50 text-slate-600 hover:text-[#334EAC] rounded-2xl font-bold text-[13px] whitespace-nowrap transition-all">Fisika</button>
      <button class="px-5 py-2.5 bg-white border border-slate-200 hover:border-[#7096D1] hover:bg-slate-50 text-slate-600 hover:text-[#334EAC] rounded-2xl font-bold text-[13px] whitespace-nowrap transition-all">Matematika</button>
      <button class="px-5 py-2.5 bg-white border border-slate-200 hover:border-[#7096D1] hover:bg-slate-50 text-slate-600 hover:text-[#334EAC] rounded-2xl font-bold text-[13px] whitespace-nowrap transition-all">Ilmu Komputer</button>
      <button class="px-5 py-2.5 bg-white border border-slate-200 hover:border-[#7096D1] hover:bg-slate-50 text-slate-600 hover:text-[#334EAC] rounded-2xl font-bold text-[13px] whitespace-nowrap transition-all">Biologi</button>
    </div>

    <!-- 4. Quiz Grid -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6">
      
      <!-- Quiz Card 1 -->
      <RouterLink to="/pelajar/quiz/1" class="bg-white/80 backdrop-blur-xl rounded-3xl p-6 shadow-[0_10px_40px_rgba(15,23,42,0.06)] border border-slate-100 hover:shadow-xl hover:-translate-y-1 transition-all duration-300 ease-out group flex flex-col h-full cursor-pointer relative overflow-hidden">
        <div class="absolute top-0 right-0 w-24 h-24 bg-[#7096D1]/10 rounded-bl-full pointer-events-none group-hover:bg-[#7096D1]/20 transition-colors"></div>
        
        <div class="flex items-center justify-between mb-5 relative z-10">
          <div class="w-12 h-12 rounded-2xl bg-[#F7F2EB] flex items-center justify-center text-amber-600 border border-amber-100 group-hover:scale-110 transition-transform">
            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"/><path d="M12 2v20"/><path d="M17 5H9.5a3.5 3.5 0 0 0 0 7h5a3.5 3.5 0 0 1 0 7H6"/></svg>
          </div>
          <span class="px-2.5 py-1 bg-rose-50 text-rose-600 text-[10px] font-extrabold rounded-md border border-rose-100 uppercase tracking-widest">Sulit</span>
        </div>

        <div class="mb-6 flex-1 relative z-10">
          <h3 class="text-[17px] font-bold text-slate-900 mb-2 group-hover:text-[#334EAC] transition-colors leading-snug tracking-tight">Kalkulus: Teknik Integrasi</h3>
          <p class="text-[13px] font-medium text-slate-500 line-clamp-2">Integrasi parsial lanjutan dan substitusi trigonometri.</p>
        </div>

        <div class="flex items-center justify-between pt-5 border-t border-slate-100/80 relative z-10">
          <div class="flex items-center gap-4">
            <div class="flex items-center gap-1.5 text-[12px] font-bold text-slate-400">
              <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M2 12h20"/><path d="m15 5 7 7-7 7"/></svg>
              20 Soal
            </div>
            <div class="flex items-center gap-1.5 text-[12px] font-bold text-slate-400">
              <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"/><polyline points="12 6 12 12 16 14"/></svg>
              45m
            </div>
          </div>
          <div class="w-8 h-8 rounded-full bg-[#EDF1F6] flex items-center justify-center text-[#334EAC] group-hover:bg-[#334EAC] group-hover:text-white transition-colors">
            <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"><path d="m9 18 6-6-6-6"/></svg>
          </div>
        </div>
      </RouterLink>

      <!-- Quiz Card 2 (In Progress) -->
      <RouterLink to="/pelajar/quiz/2" class="bg-white/80 backdrop-blur-xl rounded-3xl p-6 shadow-[0_10px_40px_rgba(15,23,42,0.06)] border border-[#334EAC]/30 hover:shadow-xl hover:-translate-y-1 transition-all duration-300 ease-out group flex flex-col h-full cursor-pointer relative overflow-hidden ring-1 ring-[#334EAC]/5">
        <div class="absolute top-0 right-0 w-24 h-24 bg-[#7096D1]/10 rounded-bl-full pointer-events-none group-hover:bg-[#7096D1]/20 transition-colors"></div>
        
        <div class="flex items-center justify-between mb-5 relative z-10">
          <div class="w-12 h-12 rounded-2xl bg-emerald-50 flex items-center justify-center text-emerald-600 border border-emerald-100 group-hover:scale-110 transition-transform">
            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M14.5 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V7.5L14.5 2z"/><polyline points="14 2 14 8 20 8"/></svg>
          </div>
          <span class="px-2.5 py-1 bg-[#EDF1F6] text-[#334EAC] text-[10px] font-extrabold rounded-md border border-[#BAD6EB] uppercase tracking-widest animate-pulse">Sedang Berjalan</span>
        </div>

        <div class="mb-6 flex-1 relative z-10">
          <h3 class="text-[17px] font-bold text-slate-900 mb-2 group-hover:text-[#334EAC] transition-colors leading-snug tracking-tight">Struktur Data: Trees</h3>
          <p class="text-[13px] font-medium text-slate-500 mb-4 line-clamp-1">Binary Search Trees dan AVL.</p>
          <!-- Progress Bar -->
          <div class="w-full h-1.5 bg-slate-100 rounded-full overflow-hidden">
            <div class="h-full bg-[#334EAC] w-[65%] rounded-full"></div>
          </div>
          <p class="text-[11px] font-bold text-slate-400 mt-2">13 dari 20 terjawab</p>
        </div>

        <div class="flex items-center justify-between pt-5 border-t border-slate-100/80 relative z-10">
          <span class="text-[13px] font-bold text-[#334EAC]">Lanjutkan Kuis</span>
          <div class="w-8 h-8 rounded-full bg-[#EDF1F6] flex items-center justify-center text-[#334EAC] group-hover:bg-[#334EAC] group-hover:text-white transition-colors">
            <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"><path d="m9 18 6-6-6-6"/></svg>
          </div>
        </div>
      </RouterLink>

      <!-- Quiz Card 3 -->
      <RouterLink to="/pelajar/quiz/3" class="bg-white/80 backdrop-blur-xl rounded-3xl p-6 shadow-[0_10px_40px_rgba(15,23,42,0.06)] border border-slate-100 hover:shadow-xl hover:-translate-y-1 transition-all duration-300 ease-out group flex flex-col h-full cursor-pointer relative overflow-hidden">
        <div class="absolute top-0 right-0 w-24 h-24 bg-[#7096D1]/10 rounded-bl-full pointer-events-none group-hover:bg-[#7096D1]/20 transition-colors"></div>
        
        <div class="flex items-center justify-between mb-5 relative z-10">
          <div class="w-12 h-12 rounded-2xl bg-[#F7F2EB] flex items-center justify-center text-amber-600 border border-amber-100 group-hover:scale-110 transition-transform">
            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M22 12h-4l-3 9L9 3l-3 9H2"/></svg>
          </div>
          <span class="px-2.5 py-1 bg-[#EDF1F6] text-slate-500 text-[10px] font-extrabold rounded-md border border-slate-200 uppercase tracking-widest">Sedang</span>
        </div>

        <div class="mb-6 flex-1 relative z-10">
          <h3 class="text-[17px] font-bold text-slate-900 mb-2 group-hover:text-[#334EAC] transition-colors leading-snug tracking-tight">Dasar Elektromagnetisme</h3>
          <p class="text-[13px] font-medium text-slate-500 line-clamp-2">Persamaan Maxwell dan teori rangkaian dasar.</p>
        </div>

        <div class="flex items-center justify-between pt-5 border-t border-slate-100/80 relative z-10">
          <div class="flex items-center gap-4">
            <div class="flex items-center gap-1.5 text-[12px] font-bold text-slate-400">
              <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M2 12h20"/><path d="m15 5 7 7-7 7"/></svg>
              15 Soal
            </div>
            <div class="flex items-center gap-1.5 text-[12px] font-bold text-slate-400">
              <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"/><polyline points="12 6 12 12 16 14"/></svg>
              30m
            </div>
          </div>
          <div class="w-8 h-8 rounded-full bg-[#EDF1F6] flex items-center justify-center text-[#334EAC] group-hover:bg-[#334EAC] group-hover:text-white transition-colors">
            <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"><path d="m9 18 6-6-6-6"/></svg>
          </div>
        </div>
      </RouterLink>

    </div>
  </div>
</template>

<script setup>
import { RouterLink } from 'vue-router'
</script>
