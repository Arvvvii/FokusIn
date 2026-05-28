<template>
  <div class="space-y-6 animate-in fade-in duration-500 min-w-0 max-w-7xl mx-auto">
    
    <!-- 1. PROFILE HERO SECTION -->
    <div class="bg-[linear-gradient(135deg,#081F5C_0%,#334EAC_100%)] rounded-2xl p-6 md:p-8 text-white relative overflow-hidden shadow-lg flex flex-col md:flex-row gap-6 items-center md:items-end min-h-[240px]">
      
      <!-- Subtle graphic border decoration instead of giant glows -->
      <div class="absolute inset-0 border border-white/5 rounded-2xl pointer-events-none"></div>
      <div class="absolute -right-16 -top-16 w-64 h-64 border border-white/10 rounded-full pointer-events-none"></div>
      
      <div class="relative z-10 flex flex-col md:flex-row gap-6 items-center md:items-end w-full">
        <!-- Avatar -->
        <div class="w-24 h-24 md:w-32 md:h-32 rounded-full bg-white/10 border-2 border-white/20 shadow-md overflow-hidden shrink-0 backdrop-blur-md relative group cursor-pointer">
          <img src="https://i.pravatar.cc/300?u=a042581f4e29026704d" alt="Profile" class="w-full h-full object-cover">
          <div class="absolute inset-0 bg-black/40 opacity-0 group-hover:opacity-100 transition-opacity flex items-center justify-center">
             <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="white" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M23 19a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2V8a2 2 0 0 1 2-2h4l2-3h6l2 3h4a2 2 0 0 1 2 2z"/><circle cx="12" cy="13" r="4"/></svg>
          </div>
        </div>

        <!-- Info -->
        <div class="flex-1 text-center md:text-left">
          <div class="flex flex-wrap items-center justify-center md:justify-start gap-1.5 mb-1.5">
            <span class="px-2.5 py-0.5 bg-white/10 rounded-full border border-white/10 text-[9px] font-bold uppercase tracking-wider text-white shadow-sm flex items-center gap-1">
              <span class="w-1 h-1 rounded-full bg-emerald-400"></span> Online
            </span>
            <span class="px-2.5 py-0.5 bg-[#BAD6EB]/20 rounded-full border border-[#BAD6EB]/20 text-[9px] font-bold uppercase tracking-wider text-[#BAD6EB] shadow-sm">
              Ilmu Komputer '24
            </span>
          </div>
          <h1 class="text-2xl md:text-3xl font-bold tracking-tight mb-1 text-white">{{ authStore.user?.name || 'Pelajar' }}</h1>
          <p class="text-xs md:text-sm text-[#BAD6EB] font-normal max-w-xl leading-relaxed mb-3">
            Mahasiswa S1 dengan fokus pada Kecerdasan Buatan dan Sistem Terdistribusi. Aktif mengeksplorasi persimpangan antara Data Science dan Software Engineering.
          </p>
          
          <div class="flex items-center justify-center md:justify-start gap-3">
            <div class="flex items-center gap-1 text-xs font-bold text-white/90">
              <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M12 2v20"/><path d="M17 5H9.5a3.5 3.5 0 0 0 0 7h5a3.5 3.5 0 0 1 0 7H6"/></svg>
              Pelajar Level 42
            </div>
            <div class="h-3 w-px bg-white/20"></div>
            <div class="flex items-center gap-1 text-xs font-bold text-white/90">
              <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"/><polyline points="17 8 12 3 7 8"/><line x1="12" x2="12" y1="3" y2="15"/></svg>
              Universitas Indonesia
            </div>
          </div>
        </div>
        
        <!-- Action Button -->
        <div class="shrink-0">
           <RouterLink to="/pelajar/profile/edit" class="px-4 py-2.5 bg-white text-[#081F5C] hover:bg-[#F7F2EB] rounded-xl font-bold text-xs transition-all shadow-sm flex items-center gap-1.5 group">
              <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M17 3a2.85 2.83 0 1 1 4 4L7.5 20.5 2 22l1.5-5.5Z"/><path d="m15 5 4 4"/></svg>
              Edit Profil
           </RouterLink>
        </div>
      </div>
    </div>

    <!-- 2. PROFILE ANALYTICS -->
    <div class="grid grid-cols-2 lg:grid-cols-6 gap-3">
      <!-- Stat Card 1 -->
      <div class="card-panel p-4 flex flex-col justify-between hover:border-[#7096D1]/40 transition-all group">
        <div class="flex items-center justify-between mb-2">
          <span class="text-[9px] font-bold text-slate-400 uppercase tracking-wider">Reputasi</span>
          <div class="w-6 h-6 rounded bg-amber-50 flex items-center justify-center text-amber-500 border border-amber-100/50">
             <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"/></svg>
          </div>
        </div>
        <h4 class="text-xl font-bold text-slate-900 tracking-tight">1,240</h4>
      </div>
      <!-- Stat Card 2 -->
      <div class="card-panel p-4 flex flex-col justify-between hover:border-[#7096D1]/40 transition-all group">
        <div class="flex items-center justify-between mb-2">
          <span class="text-[9px] font-bold text-slate-400 uppercase tracking-wider">Postingan</span>
          <div class="w-6 h-6 rounded bg-[#EDF1F6] flex items-center justify-center text-[#334EAC] border border-slate-200/50">
             <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z"/></svg>
          </div>
        </div>
        <h4 class="text-xl font-bold text-slate-900 tracking-tight">48</h4>
      </div>
      <!-- Stat Card 3 -->
      <div class="card-panel p-4 flex flex-col justify-between hover:border-[#7096D1]/40 transition-all group">
        <div class="flex items-center justify-between mb-2">
          <span class="text-[9px] font-bold text-slate-400 uppercase tracking-wider">Jwb Terbaik</span>
          <div class="w-6 h-6 rounded bg-emerald-50 flex items-center justify-center text-emerald-500 border border-emerald-100/50">
             <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"/><polyline points="22 4 12 14.01 9 11.01"/></svg>
          </div>
        </div>
        <h4 class="text-xl font-bold text-slate-900 tracking-tight">15</h4>
      </div>
      <!-- Stat Card 4 -->
      <div class="card-panel p-4 flex flex-col justify-between hover:border-[#7096D1]/40 transition-all group">
        <div class="flex items-center justify-between mb-2">
          <span class="text-[9px] font-bold text-slate-400 uppercase tracking-wider">Akurasi Kuis</span>
          <div class="w-6 h-6 rounded bg-rose-50 flex items-center justify-center text-rose-500 border border-rose-100/50">
             <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"/><path d="m15 9-6 6"/><path d="m9 9 6 6"/></svg>
          </div>
        </div>
        <h4 class="text-xl font-bold text-slate-900 tracking-tight">86%</h4>
      </div>
      <!-- Stat Card 5 -->
      <div class="card-panel p-4 flex flex-col justify-between hover:border-[#7096D1]/40 transition-all group">
        <div class="flex items-center justify-between mb-2">
          <span class="text-[9px] font-bold text-slate-400 uppercase tracking-wider">Unggahan</span>
          <div class="w-6 h-6 rounded bg-[#F7F2EB] flex items-center justify-center text-[#334EAC] border border-[#D0E3FF]/50">
             <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"/><polyline points="14 2 14 8 20 8"/><line x1="12" y1="18" x2="12" y2="12"/><line x1="9" y1="15" x2="12" y2="12"/><line x1="15" y1="15" x2="12" y2="12"/></svg>
          </div>
        </div>
        <h4 class="text-xl font-bold text-slate-900 tracking-tight">12</h4>
      </div>
      <!-- Stat Card 6 -->
      <div class="card-panel p-4 flex flex-col justify-between hover:border-[#7096D1]/40 transition-all group">
        <div class="flex items-center justify-between mb-2">
          <span class="text-[9px] font-bold text-slate-400 uppercase tracking-wider">Mentoring</span>
          <div class="w-6 h-6 rounded bg-[#F7F2EB] flex items-center justify-center text-amber-600 border border-amber-100/50">
             <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M16 21v-2a4 4 0 0 0-4-4H6a4 4 0 0 0-4 4v2"/><circle cx="9" cy="7" r="4"/><path d="M22 21v-2a4 4 0 0 0-3-3.87"/><path d="M16 3.13a4 4 0 0 1 0 7.75"/></svg>
          </div>
        </div>
        <h4 class="text-xl font-bold text-slate-900 tracking-tight">4</h4>
      </div>
    </div>

    <!-- MAIN GRID -->
    <div class="flex flex-col xl:flex-row gap-6 md:gap-8">
      
      <!-- LEFT COLUMN -->
      <div class="flex-1 space-y-6 md:space-y-8 min-w-0">
        
        <!-- 3. LEARNING PROGRESS -->
        <div class="card-base p-7 md:p-8 group/card">
          <h3 class="text-[17px] font-bold text-slate-900 mb-6 flex items-center gap-3 tracking-tight">
            <span class="w-8 h-8 rounded-lg bg-[#EDF1F6] flex items-center justify-center text-[#334EAC]"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><polyline points="22 12 18 12 15 21 9 3 6 12 2 12"/></svg></span>
            Progres Belajar
          </h3>
          
          <div class="space-y-6">
            <!-- Semester Progress -->
            <div>
              <div class="flex justify-between items-center text-[14px] font-bold mb-2">
                <span class="text-slate-900">Penyelesaian Semester 4</span>
                <span class="text-[#334EAC] font-bold">68%</span>
              </div>
              <div class="w-full h-2.5 bg-[#EDF1F6] rounded-full overflow-hidden">
                <div class="h-full bg-gradient-to-r from-[#334EAC] to-[#7096D1] w-[68%] rounded-full transition-all"></div>
              </div>
            </div>

            <!-- Subject breakdown -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 pt-4 border-t border-slate-100">
              <!-- Strongest -->
              <div>
                <h4 class="text-[12px] font-extrabold text-slate-400 uppercase tracking-widest mb-4">Mata Pelajaran Terkuat</h4>
                <div class="space-y-4">
                  <div class="group">
                    <div class="flex justify-between items-center text-[13px] font-bold mb-2">
                      <span class="text-slate-600 group-hover:text-[#081F5C] transition-colors">Struktur Data</span>
                      <span class="text-emerald-500 font-extrabold">92%</span>
                    </div>
                    <div class="w-full h-1.5 bg-[#EDF1F6] rounded-full overflow-hidden">
                      <div class="h-full bg-emerald-400 w-[92%] rounded-full transition-all"></div>
                    </div>
                  </div>
                  <div class="group">
                    <div class="flex justify-between items-center text-[13px] font-bold mb-2">
                      <span class="text-slate-600 group-hover:text-[#081F5C] transition-colors">Kalkulus II</span>
                      <span class="text-emerald-500 font-extrabold">85%</span>
                    </div>
                    <div class="w-full h-1.5 bg-[#EDF1F6] rounded-full overflow-hidden">
                      <div class="h-full bg-emerald-400 w-[85%] rounded-full transition-all"></div>
                    </div>
                  </div>
                </div>
              </div>
              
              <!-- Needs Focus -->
              <div>
                <h4 class="text-[12px] font-extrabold text-slate-400 uppercase tracking-widest mb-4">Perlu Fokus</h4>
                <div class="space-y-4">
                  <div class="group">
                    <div class="flex justify-between items-center text-[13px] font-bold mb-2">
                      <span class="text-slate-600 group-hover:text-[#081F5C] transition-colors">Jaringan Komputer</span>
                      <span class="text-rose-500 font-extrabold">45%</span>
                    </div>
                    <div class="w-full h-1.5 bg-[#EDF1F6] rounded-full overflow-hidden">
                      <div class="h-full bg-rose-400 w-[45%] rounded-full transition-all"></div>
                    </div>
                  </div>
                  <div class="group">
                    <div class="flex justify-between items-center text-[13px] font-bold mb-2">
                      <span class="text-slate-600 group-hover:text-[#081F5C] transition-colors">Aljabar Linear</span>
                      <span class="text-amber-500 font-extrabold">60%</span>
                    </div>
                    <div class="w-full h-1.5 bg-[#EDF1F6] rounded-full overflow-hidden">
                      <div class="h-full bg-amber-400 w-[60%] rounded-full transition-all"></div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

        <!-- 4. BADGE MILESTONE SYSTEM -->
        <div class="card-base p-7 md:p-8 group/card">
          <div class="flex items-center justify-between mb-6">
            <h3 class="text-[17px] font-bold text-slate-900 flex items-center gap-3 tracking-tight">
              <span class="w-8 h-8 rounded-lg bg-[#F7F2EB] flex items-center justify-center text-amber-500"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M3.85 8.62a4 4 0 0 1 4.78-4.77 4 4 0 0 1 6.74 0 4 4 0 0 1 4.78 4.78 4 4 0 0 1 0 6.74 4 4 0 0 1-4.77 4.78 4 4 0 0 1-6.75 0 4 4 0 0 1-4.78-4.77 4 4 0 0 1 0-6.76Z"/><path d="M9.09 9a3 3 0 0 1 5.83 1c0 2-3 3-3 3"/></svg></span>
              Pencapaian & Badge
            </h3>
            <div class="text-right">
              <span class="text-[13px] font-extrabold text-[#334EAC] block mb-1">3/5 Badge Terbuka</span>
              <div class="w-24 h-1.5 bg-[#EDF1F6] rounded-full overflow-hidden">
                <div class="h-full bg-[#334EAC] w-[60%] rounded-full"></div>
              </div>
            </div>
          </div>

          <div class="grid grid-cols-2 md:grid-cols-5 gap-4">
            <!-- Badge 1: Pemula (Unlocked) -->
            <div class="p-4 rounded-[1.25rem] bg-gradient-to-br from-emerald-50 to-white border border-emerald-100 flex flex-col items-center justify-center text-center gap-3 hover:shadow-md transition-shadow cursor-pointer">
              <div class="w-12 h-12 rounded-full bg-emerald-100/50 flex items-center justify-center text-emerald-500 border border-emerald-200">
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="m12 2 3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z"/></svg>
              </div>
              <div>
                <p class="text-[13px] font-extrabold text-[#081F5C]">Pemula</p>
                <p class="text-[10px] font-bold text-emerald-600/70 uppercase tracking-widest mt-0.5">Tercapai</p>
              </div>
            </div>
            
            <!-- Badge 2: Kontributor (Unlocked) -->
            <div class="p-4 rounded-[1.25rem] bg-gradient-to-br from-amber-50 to-white border border-amber-100 flex flex-col items-center justify-center text-center gap-3 hover:shadow-md transition-shadow cursor-pointer">
              <div class="w-12 h-12 rounded-full bg-amber-100/50 flex items-center justify-center text-amber-500 border border-amber-200">
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M6 9H4.5a2.5 2.5 0 0 1 0-5H6"/><path d="M18 9h1.5a2.5 2.5 0 0 0 0-5H18"/><path d="M4 22h16"/><path d="M10 14.66V17c0 .55-.47.98-.97 1.21C7.85 18.75 7 20.24 7 22"/><path d="M14 14.66V17c0 .55.47.98.97 1.21C16.15 18.75 17 20.24 17 22"/><path d="M18 2H6v7a6 6 0 0 0 12 0V2Z"/></svg>
              </div>
              <div>
                <p class="text-[13px] font-extrabold text-[#081F5C]">Kontributor</p>
                <p class="text-[10px] font-bold text-amber-600/70 uppercase tracking-widest mt-0.5">Tercapai</p>
              </div>
            </div>

            <!-- Badge 3: Active Learner (Unlocked) -->
            <div class="p-4 rounded-[1.25rem] bg-gradient-to-br from-[#EDF1F6] to-white border border-slate-200 flex flex-col items-center justify-center text-center gap-3 hover:shadow-md transition-shadow cursor-pointer">
              <div class="w-12 h-12 rounded-full bg-[#334EAC]/10 flex items-center justify-center text-[#334EAC] border border-[#334EAC]/20">
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"/><polyline points="22 4 12 14.01 9 11.01"/></svg>
              </div>
              <div>
                <p class="text-[13px] font-extrabold text-[#081F5C]">Active Learner</p>
                <p class="text-[10px] font-bold text-[#334EAC]/70 uppercase tracking-widest mt-0.5">Tercapai</p>
              </div>
            </div>

            <!-- Badge 4: Top Discussion (Locked) -->
            <div class="p-4 rounded-[1.25rem] bg-slate-50 border border-slate-200 border-dashed flex flex-col items-center justify-center text-center gap-3 opacity-60 grayscale hover:grayscale-0 hover:opacity-100 transition-all cursor-not-allowed">
              <div class="w-12 h-12 rounded-full bg-slate-200 flex items-center justify-center text-slate-400">
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><rect width="18" height="11" x="3" y="11" rx="2" ry="2"/><path d="M7 11V7a5 5 0 0 1 10 0v4"/></svg>
              </div>
              <div>
                <p class="text-[13px] font-extrabold text-slate-500">Top Discussion</p>
                <p class="text-[10px] font-bold text-slate-400 uppercase tracking-widest mt-0.5">Terkunci</p>
              </div>
            </div>

            <!-- Badge 5: Mentor Favorite (Locked) -->
            <div class="p-4 rounded-[1.25rem] bg-slate-50 border border-slate-200 border-dashed flex flex-col items-center justify-center text-center gap-3 opacity-60 grayscale hover:grayscale-0 hover:opacity-100 transition-all cursor-not-allowed">
              <div class="w-12 h-12 rounded-full bg-slate-200 flex items-center justify-center text-slate-400">
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><rect width="18" height="11" x="3" y="11" rx="2" ry="2"/><path d="M7 11V7a5 5 0 0 1 10 0v4"/></svg>
              </div>
              <div>
                <p class="text-[13px] font-extrabold text-slate-500">Mentor Favorite</p>
                <p class="text-[10px] font-bold text-slate-400 uppercase tracking-widest mt-0.5">Terkunci</p>
              </div>
            </div>
          </div>
        </div>

        <!-- 5. RECENT ACTIVITY -->
        <div class="card-base p-7 md:p-8 group/card">
          <h3 class="text-[17px] font-bold text-slate-900 mb-6 flex items-center gap-3 tracking-tight">
            <span class="w-8 h-8 rounded-lg bg-[#EDF1F6] flex items-center justify-center text-[#334EAC]"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M12 20h9"/><path d="M16.5 3.5a2.12 2.12 0 0 1 3 3L7 19l-4 1 1-4Z"/></svg></span>
            Aktivitas Terbaru
          </h3>
          
          <div class="relative pl-6 space-y-8 before:absolute before:inset-y-0 before:left-2.5 before:w-px before:bg-slate-200">
            <!-- Timeline Item 1 -->
            <div class="relative">
              <div class="absolute -left-[29px] w-5 h-5 rounded-full bg-emerald-50 border-2 border-emerald-500 flex items-center justify-center z-10">
                <div class="w-1.5 h-1.5 rounded-full bg-emerald-500"></div>
              </div>
              <p class="text-[13px] font-bold text-slate-900 mb-1 tracking-tight">Meraih 95% di Kuis Struktur Data</p>
              <p class="text-[12px] font-bold text-slate-400 mb-3">2 jam lalu</p>
              <RouterLink to="/pelajar/quiz/1/result" class="inline-flex px-4 py-2 bg-slate-50 border border-slate-200 rounded-xl text-[12px] font-extrabold text-slate-500 hover:border-[#7096D1] hover:text-[#334EAC] transition-colors">
                Lihat Hasil
              </RouterLink>
            </div>
            
            <!-- Timeline Item 2 -->
            <div class="relative">
              <div class="absolute -left-[29px] w-5 h-5 rounded-full bg-[#EDF1F6] border-2 border-[#334EAC] flex items-center justify-center z-10">
                <div class="w-1.5 h-1.5 rounded-full bg-[#334EAC]"></div>
              </div>
              <p class="text-[13px] font-bold text-slate-900 mb-1 tracking-tight">Mengunggah materi belajar baru</p>
              <p class="text-[12px] font-bold text-slate-400 mb-3">Kemarin, 14:30</p>
              <div class="p-4 bg-slate-50 border border-slate-100 rounded-xl max-w-sm cursor-pointer hover:border-[#7096D1] hover:bg-white transition-all flex items-center gap-3">
                <div class="w-8 h-8 rounded-lg bg-red-50 text-red-500 flex items-center justify-center shrink-0">
                  <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"><path d="M14.5 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V7.5L14.5 2z"/><polyline points="14 2 14 8 20 8"/></svg>
                </div>
                <div>
                  <p class="text-[13px] font-bold text-slate-900 truncate tracking-tight">Graph_Theory_Notes.pdf</p>
                  <p class="text-[11px] font-bold text-slate-400">PDF • 2.4 MB</p>
                </div>
              </div>
            </div>
            
            <!-- Timeline Item 3 -->
            <div class="relative">
              <div class="absolute -left-[29px] w-5 h-5 rounded-full bg-[#F7F2EB] border-2 border-[#7096D1] flex items-center justify-center z-10">
                <div class="w-1.5 h-1.5 rounded-full bg-[#7096D1]"></div>
              </div>
              <p class="text-[13px] font-bold text-slate-900 mb-1 tracking-tight">Menjawab pertanyaan forum</p>
              <p class="text-[12px] font-bold text-slate-400 mb-3">3 hari lalu</p>
              <RouterLink to="/pelajar/forum/1" class="block p-4 bg-slate-50 border border-slate-100 rounded-xl hover:border-[#7096D1] hover:bg-white transition-all">
                <p class="text-[13px] font-semibold text-slate-600 line-clamp-2">"Anda bisa menyelesaikannya dengan menerapkan Breadth-First Search alih-alih DFS untuk mencari jalur terpendek..."</p>
              </RouterLink>
            </div>
          </div>
        </div>

      </div>
      
      <!-- 6. RIGHT SIDEBAR -->
      <div class="w-full xl:w-80 shrink-0 space-y-6 md:space-y-8 min-w-0">
        
        <!-- Profile Completion -->
        <div class="card-base p-6 text-center flex flex-col items-center group/card">
          <div class="relative w-24 h-24 mb-4">
            <svg viewBox="0 0 36 36" class="w-full h-full transform -rotate-90">
              <path class="text-[#EDF1F6]" d="M18 2.0845 a 15.9155 15.9155 0 0 1 0 31.831 a 15.9155 15.9155 0 0 1 0 -31.831" fill="none" stroke="currentColor" stroke-width="4" />
              <path class="text-[#334EAC]" stroke-dasharray="85, 100" d="M18 2.0845 a 15.9155 15.9155 0 0 1 0 31.831 a 15.9155 15.9155 0 0 1 0 -31.831" fill="none" stroke="currentColor" stroke-width="4" stroke-linecap="round" />
            </svg>
            <div class="absolute inset-0 flex flex-col items-center justify-center">
              <span class="text-xl font-extrabold text-[#081F5C]">85%</span>
            </div>
          </div>
          <h3 class="text-[15px] font-bold text-slate-900 mb-2 tracking-tight">Profil Hampir Lengkap</h3>
          <p class="text-[12px] font-medium text-slate-500 mb-5">Tambahkan tautan GitHub Anda agar menonjol bagi mentor dan teman.</p>
          <RouterLink to="/pelajar/profile/edit" class="w-full py-2.5 bg-[#EDF1F6] hover:bg-[#334EAC] hover:text-white text-[#334EAC] rounded-xl font-extrabold text-[13px] transition-colors active:scale-95 text-center">
            Lengkapi Profil
          </RouterLink>
        </div>

        <!-- AI Study Recommendation -->
        <div class="card-fokus p-6 text-white relative overflow-hidden group hover:-translate-y-1 hover:shadow-2xl transition-all duration-300">
          <div class="absolute -right-4 -top-4 w-24 h-24 bg-white/10 blur-[30px] rounded-full pointer-events-none"></div>
          
          <h3 class="text-[14px] font-extrabold mb-4 flex items-center gap-2 relative z-10">
            <span class="w-6 h-6 rounded bg-white/10 flex items-center justify-center"><svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"><path d="m12 3-1.912 5.813a2 2 0 0 1-1.275 1.275L3 12l5.813 1.912a2 2 0 0 1 1.275 1.275L12 21l1.912-5.813a2 2 0 0 1 1.275-1.275L21 12l-5.813-1.912a2 2 0 0 1-1.275-1.275L12 3Z"/></svg></span>
            Rekomendasi AI
          </h3>
          <p class="text-[13px] font-medium text-[#BAD6EB] leading-relaxed mb-5 relative z-10">
            Performa Anda di "Jaringan Komputer" sedang menurun. Jadwalkan sesi mentoring 1-on-1 sebelum ujian tengah semester.
          </p>
          <RouterLink to="/pelajar/mentoring" class="w-full py-3 bg-white hover:bg-[#F7F2EB] text-[#081F5C] rounded-xl font-extrabold text-[13px] transition-all flex items-center justify-center gap-2 relative z-10 shadow-sm active:scale-95">
            Cari Mentor
          </RouterLink>
        </div>

        <!-- Next Mentoring Schedule -->
        <div class="card-base p-6 group/card">
          <h3 class="text-[15px] font-bold text-slate-900 mb-4 flex items-center justify-between tracking-tight">
            Sesi Berikutnya
            <span class="w-2 h-2 rounded-full bg-rose-500 animate-pulse"></span>
          </h3>
          
          <div class="flex gap-3 mb-4">
            <div class="w-12 h-12 bg-[#F7F2EB] rounded-xl flex flex-col items-center justify-center shrink-0 border border-amber-100">
              <span class="text-[9px] font-bold text-slate-500 uppercase">Mei</span>
              <span class="text-[16px] font-bold text-slate-900 leading-none">25</span>
            </div>
            <div>
              <p class="text-[14px] font-bold text-slate-900 mb-0.5 tracking-tight">Algoritma Lanjut</p>
              <p class="text-[12px] font-medium text-slate-500">14:00 • dengan Dr. Smith</p>
            </div>
          </div>
          <button class="w-full py-2.5 bg-slate-50 border border-slate-200 hover:border-[#7096D1] text-slate-600 hover:text-[#334EAC] rounded-xl font-extrabold text-[13px] transition-colors">
            Jadwal Ulang
          </button>
        </div>

        <!-- Quick Links -->
        <div class="card-base p-6 group/card">
          <h3 class="text-[15px] font-bold text-slate-900 mb-4 tracking-tight">Tautan Cepat</h3>
          <div class="space-y-2">
            <RouterLink to="/pelajar/materials" class="flex items-center gap-3 p-3 rounded-xl hover:bg-slate-50 transition-colors group text-[13px] font-bold text-slate-600 hover:text-[#334EAC]">
              <div class="w-8 h-8 rounded-lg bg-slate-100 group-hover:bg-[#EDF1F6] flex items-center justify-center transition-colors">
                <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M4 19.5v-15A2.5 2.5 0 0 1 6.5 2H20v20H6.5a2.5 2.5 0 0 1 0-5H20"/></svg>
              </div>
              Materi Tersimpan
            </RouterLink>
            <RouterLink to="/pelajar/forum" class="flex items-center gap-3 p-3 rounded-xl hover:bg-slate-50 transition-colors group text-[13px] font-bold text-slate-600 hover:text-[#334EAC]">
              <div class="w-8 h-8 rounded-lg bg-slate-100 group-hover:bg-[#EDF1F6] flex items-center justify-center transition-colors">
                <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z"/></svg>
              </div>
              Diskusi Tersimpan
            </RouterLink>
            <RouterLink to="/pelajar/profile/edit" class="flex items-center gap-3 p-3 rounded-xl hover:bg-slate-50 transition-colors group text-[13px] font-bold text-slate-600 hover:text-[#334EAC] cursor-pointer">
              <div class="w-8 h-8 rounded-lg bg-slate-100 group-hover:bg-[#EDF1F6] flex items-center justify-center transition-colors">
                <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M12.22 2h-.44a2 2 0 0 0-2 2v.18a2 2 0 0 1-1 1.73l-.43.25a2 2 0 0 1-2 0l-.15-.08a2 2 0 0 0-2.73.73l-.22.38a2 2 0 0 0 .73 2.73l.15.1a2 2 0 0 1 1 1.72v.51a2 2 0 0 1-1 1.74l-.15.09a2 2 0 0 0-.73 2.73l.22.38a2 2 0 0 0 2.73.73l.15-.08a2 2 0 0 1 2 0l.43.25a2 2 0 0 1 1 1.73V20a2 2 0 0 0 2 2h.44a2 2 0 0 0 2-2v-.18a2 2 0 0 1 1-1.73l.43-.25a2 2 0 0 1 2 0l.15.08a2 2 0 0 0 2.73-.73l.22-.39a2 2 0 0 0-.73-2.73l-.15-.08a2 2 0 0 1-1-1.74v-.5a2 2 0 0 1 1-1.74l.15-.09a2 2 0 0 0 .73-2.73l-.22-.38a2 2 0 0 0-2.73-.73l-.15.08a2 2 0 0 1-2 0l-.43-.25a2 2 0 0 1-1-1.73V4a2 2 0 0 0-2-2z"/><circle cx="12" cy="12" r="3"/></svg>
              </div>
              Pengaturan Akun
            </RouterLink>
          </div>
        </div>

      </div>
    </div>
  </div>
</template>

<script setup>
import { RouterLink } from 'vue-router'
import { useAuthStore } from '@/stores/auth'

const authStore = useAuthStore()
</script>
