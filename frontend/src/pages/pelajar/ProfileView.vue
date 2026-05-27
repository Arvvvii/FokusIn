<template>
  <div class="space-y-6 md:space-y-8 animate-in fade-in duration-500 min-w-0">
    
    <!-- 1. PROFILE HERO SECTION -->
    <div class="bg-gradient-to-br from-[#081F5C] via-[#334EAC] to-[#7096D1] rounded-[2rem] p-8 md:p-10 text-white relative overflow-hidden shadow-[0_15px_40px_rgba(8,31,92,0.15)] flex flex-col md:flex-row gap-8 items-center md:items-end min-h-[280px]">
      
      <!-- Decorative abstract glow -->
      <div class="absolute -right-24 -top-24 w-96 h-96 bg-white/10 blur-[100px] rounded-full pointer-events-none"></div>
      <div class="absolute bottom-0 left-20 w-64 h-64 bg-[#BAD6EB]/20 blur-[80px] rounded-full pointer-events-none"></div>
      
      <div class="relative z-10 flex flex-col md:flex-row gap-6 md:gap-8 items-center md:items-end w-full">
        <!-- Avatar -->
        <div class="w-32 h-32 md:w-40 md:h-40 rounded-full bg-white/10 border-4 border-white/20 shadow-xl overflow-hidden shrink-0 backdrop-blur-md relative group cursor-pointer">
          <img :src="avatarUrl" alt="Profile" class="w-full h-full object-cover">
          <div class="absolute inset-0 bg-black/40 opacity-0 group-hover:opacity-100 transition-opacity flex items-center justify-center">
             <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="white" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M23 19a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2V8a2 2 0 0 1 2-2h4l2-3h6l2 3h4a2 2 0 0 1 2 2z"/><circle cx="12" cy="13" r="4"/></svg>
          </div>
        </div>

        <!-- Info -->
        <div class="flex-1 text-center md:text-left">
          <div class="flex flex-wrap items-center justify-center md:justify-start gap-2 mb-2">
            <span class="px-3 py-1 bg-white/10 backdrop-blur-md rounded-full border border-white/20 text-[11px] font-bold uppercase tracking-widest text-white shadow-sm flex items-center gap-1.5">
              <span class="w-1.5 h-1.5 rounded-full bg-emerald-400"></span> Online
            </span>
            <span class="px-3 py-1 bg-[#BAD6EB]/20 backdrop-blur-md rounded-full border border-[#BAD6EB]/30 text-[11px] font-bold uppercase tracking-widest text-[#BAD6EB] shadow-sm capitalize">
              {{ academicStatus }}
            </span>
          </div>
          <h1 class="text-3xl md:text-4xl lg:text-5xl font-extrabold tracking-tight mb-2 leading-[1.1] text-white">{{ userName }}</h1>
          <p class="text-[15px] md:text-[16px] text-[#BAD6EB] font-medium max-w-xl leading-relaxed mb-4">
            {{ userBio }}
          </p>
          
          <div class="flex items-center justify-center md:justify-start gap-4">
            <div class="flex items-center gap-1.5 text-sm font-bold text-white/90">
              <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M12 2v20"/><path d="M17 5H9.5a3.5 3.5 0 0 0 0 7h5a3.5 3.5 0 0 1 0 7H6"/></svg>
              Level 42 Scholar
            </div>
            <div class="h-4 w-px bg-white/20"></div>
            <div class="flex items-center gap-1.5 text-sm font-bold text-white/90">
              <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"/><polyline points="17 8 12 3 7 8"/><line x1="12" x2="12" y1="3" y2="15"/></svg>
              Universitas Indonesia
            </div>
          </div>
        </div>
        
        <!-- Action Button -->
        <div class="shrink-0">
           <button class="px-6 py-3.5 bg-white text-[#081F5C] hover:bg-[#F7F2EB] rounded-[1.25rem] font-extrabold text-[14px] transition-all shadow-[0_8px_20px_rgba(0,0,0,0.15)] active:scale-95 flex items-center gap-2 group">
              <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M17 3a2.85 2.83 0 1 1 4 4L7.5 20.5 2 22l1.5-5.5Z"/><path d="m15 5 4 4"/></svg>
              Edit Profile
           </button>
        </div>
      </div>
    </div>

    <!-- 2. PROFILE ANALYTICS -->
    <div class="grid grid-cols-2 lg:grid-cols-6 gap-4">
      <!-- Stat Card 1 -->
      <div class="bg-white rounded-[1.5rem] p-5 shadow-[0_4px_24px_rgba(0,0,0,0.02)] border border-slate-100/80 flex flex-col justify-between hover:border-[#7096D1]/40 transition-colors group">
        <div class="flex items-center justify-between mb-3">
          <span class="text-[11px] font-bold text-slate-400 uppercase tracking-wider">Reputation</span>
          <div class="w-8 h-8 rounded-lg bg-amber-50 flex items-center justify-center text-amber-500 border border-amber-100/50">
             <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"/></svg>
          </div>
        </div>
        <h4 class="text-2xl font-extrabold text-[#081F5C] tracking-tight">{{ reputationScore }}</h4>
      </div>
      <!-- Stat Card 2 -->
      <div class="bg-white rounded-[1.5rem] p-5 shadow-[0_4px_24px_rgba(0,0,0,0.02)] border border-slate-100/80 flex flex-col justify-between hover:border-[#7096D1]/40 transition-colors group">
        <div class="flex items-center justify-between mb-3">
          <span class="text-[11px] font-bold text-slate-400 uppercase tracking-wider">Posts</span>
          <div class="w-8 h-8 rounded-lg bg-[#EDF1F6] flex items-center justify-center text-[#334EAC] border border-slate-200/50">
             <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z"/></svg>
          </div>
        </div>
        <h4 class="text-2xl font-extrabold text-[#081F5C] tracking-tight">48</h4>
      </div>
      <!-- Stat Card 3 -->
      <div class="bg-white rounded-[1.5rem] p-5 shadow-[0_4px_24px_rgba(0,0,0,0.02)] border border-slate-100/80 flex flex-col justify-between hover:border-[#7096D1]/40 transition-colors group">
        <div class="flex items-center justify-between mb-3">
          <span class="text-[11px] font-bold text-slate-400 uppercase tracking-wider">Best Ans.</span>
          <div class="w-8 h-8 rounded-lg bg-emerald-50 flex items-center justify-center text-emerald-500 border border-emerald-100/50">
             <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"/><polyline points="22 4 12 14.01 9 11.01"/></svg>
          </div>
        </div>
        <h4 class="text-2xl font-extrabold text-[#081F5C] tracking-tight">15</h4>
      </div>
      <!-- Stat Card 4 -->
      <div class="bg-white rounded-[1.5rem] p-5 shadow-[0_4px_24px_rgba(0,0,0,0.02)] border border-slate-100/80 flex flex-col justify-between hover:border-[#7096D1]/40 transition-colors group">
        <div class="flex items-center justify-between mb-3">
          <span class="text-[11px] font-bold text-slate-400 uppercase tracking-wider">Quiz Acc.</span>
          <div class="w-8 h-8 rounded-lg bg-rose-50 flex items-center justify-center text-rose-500 border border-rose-100/50">
             <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"/><path d="m15 9-6 6"/><path d="m9 9 6 6"/></svg>
          </div>
        </div>
        <h4 class="text-2xl font-extrabold text-[#081F5C] tracking-tight">86%</h4>
      </div>
      <!-- Stat Card 5 -->
      <div class="bg-white rounded-[1.5rem] p-5 shadow-[0_4px_24px_rgba(0,0,0,0.02)] border border-slate-100/80 flex flex-col justify-between hover:border-[#7096D1]/40 transition-colors group">
        <div class="flex items-center justify-between mb-3">
          <span class="text-[11px] font-bold text-slate-400 uppercase tracking-wider">Uploads</span>
          <div class="w-8 h-8 rounded-lg bg-indigo-50 flex items-center justify-center text-indigo-500 border border-indigo-100/50">
             <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"/><polyline points="14 2 14 8 20 8"/><line x1="12" y1="18" x2="12" y2="12"/><line x1="9" y1="15" x2="12" y2="12"/><line x1="15" y1="15" x2="12" y2="12"/></svg>
          </div>
        </div>
        <h4 class="text-2xl font-extrabold text-[#081F5C] tracking-tight">12</h4>
      </div>
      <!-- Stat Card 6 -->
      <div class="bg-white rounded-[1.5rem] p-5 shadow-[0_4px_24px_rgba(0,0,0,0.02)] border border-slate-100/80 flex flex-col justify-between hover:border-[#7096D1]/40 transition-colors group">
        <div class="flex items-center justify-between mb-3">
          <span class="text-[11px] font-bold text-slate-400 uppercase tracking-wider">Mentoring</span>
          <div class="w-8 h-8 rounded-lg bg-[#F7F2EB] flex items-center justify-center text-amber-600 border border-amber-100/50">
             <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M16 21v-2a4 4 0 0 0-4-4H6a4 4 0 0 0-4 4v2"/><circle cx="9" cy="7" r="4"/><path d="M22 21v-2a4 4 0 0 0-3-3.87"/><path d="M16 3.13a4 4 0 0 1 0 7.75"/></svg>
          </div>
        </div>
        <h4 class="text-2xl font-extrabold text-[#081F5C] tracking-tight">4</h4>
      </div>
    </div>

    <!-- MAIN GRID -->
    <div class="flex flex-col xl:flex-row gap-6 md:gap-8">
      
      <!-- LEFT COLUMN -->
      <div class="flex-1 space-y-6 md:space-y-8 min-w-0">
        
        <!-- 3. LEARNING PROGRESS -->
        <div class="bg-white rounded-[2rem] p-7 md:p-8 shadow-[0_4px_24px_rgba(0,0,0,0.02)] border border-slate-100/80">
          <h3 class="text-[17px] font-extrabold text-[#081F5C] mb-6 flex items-center gap-3">
            <span class="w-8 h-8 rounded-lg bg-[#EDF1F6] flex items-center justify-center text-[#334EAC]"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><polyline points="22 12 18 12 15 21 9 3 6 12 2 12"/></svg></span>
            Learning Progress
          </h3>
          
          <div class="space-y-6">
            <!-- Semester Progress -->
            <div>
              <div class="flex justify-between items-center text-[14px] font-bold mb-2">
                <span class="text-[#081F5C]">Semester 4 Completion</span>
                <span class="text-[#334EAC] font-extrabold">68%</span>
              </div>
              <div class="w-full h-2.5 bg-[#EDF1F6] rounded-full overflow-hidden">
                <div class="h-full bg-gradient-to-r from-[#334EAC] to-[#7096D1] w-[68%] rounded-full transition-all"></div>
              </div>
            </div>

            <!-- Subject breakdown -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 pt-4 border-t border-slate-100">
              <!-- Strongest -->
              <div>
                <h4 class="text-[12px] font-extrabold text-slate-400 uppercase tracking-widest mb-4">Strongest Subjects</h4>
                <div class="space-y-4">
                  <div class="group">
                    <div class="flex justify-between items-center text-[13px] font-bold mb-2">
                      <span class="text-slate-600 group-hover:text-[#081F5C] transition-colors">Data Structures</span>
                      <span class="text-emerald-500 font-extrabold">92%</span>
                    </div>
                    <div class="w-full h-1.5 bg-[#EDF1F6] rounded-full overflow-hidden">
                      <div class="h-full bg-emerald-400 w-[92%] rounded-full transition-all"></div>
                    </div>
                  </div>
                  <div class="group">
                    <div class="flex justify-between items-center text-[13px] font-bold mb-2">
                      <span class="text-slate-600 group-hover:text-[#081F5C] transition-colors">Calculus II</span>
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
                <h4 class="text-[12px] font-extrabold text-slate-400 uppercase tracking-widest mb-4">Needs Focus</h4>
                <div class="space-y-4">
                  <div class="group">
                    <div class="flex justify-between items-center text-[13px] font-bold mb-2">
                      <span class="text-slate-600 group-hover:text-[#081F5C] transition-colors">Computer Networks</span>
                      <span class="text-rose-500 font-extrabold">45%</span>
                    </div>
                    <div class="w-full h-1.5 bg-[#EDF1F6] rounded-full overflow-hidden">
                      <div class="h-full bg-rose-400 w-[45%] rounded-full transition-all"></div>
                    </div>
                  </div>
                  <div class="group">
                    <div class="flex justify-between items-center text-[13px] font-bold mb-2">
                      <span class="text-slate-600 group-hover:text-[#081F5C] transition-colors">Linear Algebra</span>
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

        <!-- 4. ACHIEVEMENTS & BADGES -->
        <div class="bg-white rounded-[2rem] p-7 md:p-8 shadow-[0_4px_24px_rgba(0,0,0,0.02)] border border-slate-100/80">
          <div class="flex items-center justify-between mb-6">
            <h3 class="text-[17px] font-extrabold text-[#081F5C] flex items-center gap-3">
              <span class="w-8 h-8 rounded-lg bg-[#F7F2EB] flex items-center justify-center text-amber-500"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M3.85 8.62a4 4 0 0 1 4.78-4.77 4 4 0 0 1 6.74 0 4 4 0 0 1 4.78 4.78 4 4 0 0 1 0 6.74 4 4 0 0 1-4.77 4.78 4 4 0 0 1-6.75 0 4 4 0 0 1-4.78-4.77 4 4 0 0 1 0-6.76Z"/><path d="M9.09 9a3 3 0 0 1 5.83 1c0 2-3 3-3 3"/></svg></span>
              Achievements & Badges
            </h3>
            <button class="text-[13px] font-bold text-[#334EAC] hover:text-[#081F5C] transition-colors">View All</button>
          </div>

          <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
            <!-- Badge 1 -->
            <div class="p-4 rounded-[1.25rem] bg-gradient-to-br from-amber-50 to-white border border-amber-100 flex flex-col items-center justify-center text-center gap-3 hover:shadow-md transition-shadow cursor-pointer">
              <div class="w-12 h-12 rounded-full bg-amber-100/50 flex items-center justify-center text-amber-500 border border-amber-200">
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M6 9H4.5a2.5 2.5 0 0 1 0-5H6"/><path d="M18 9h1.5a2.5 2.5 0 0 0 0-5H18"/><path d="M4 22h16"/><path d="M10 14.66V17c0 .55-.47.98-.97 1.21C7.85 18.75 7 20.24 7 22"/><path d="M14 14.66V17c0 .55.47.98.97 1.21C16.15 18.75 17 20.24 17 22"/><path d="M18 2H6v7a6 6 0 0 0 12 0V2Z"/></svg>
              </div>
              <div>
                <p class="text-[13px] font-extrabold text-[#081F5C]">Top 5%</p>
                <p class="text-[10px] font-bold text-amber-600/70 uppercase tracking-widest mt-0.5">Algorithm</p>
              </div>
            </div>
            <!-- Badge 2 -->
            <div class="p-4 rounded-[1.25rem] bg-gradient-to-br from-[#EDF1F6] to-white border border-slate-200 flex flex-col items-center justify-center text-center gap-3 hover:shadow-md transition-shadow cursor-pointer">
              <div class="w-12 h-12 rounded-full bg-[#334EAC]/10 flex items-center justify-center text-[#334EAC] border border-[#334EAC]/20">
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"/><polyline points="22 4 12 14.01 9 11.01"/></svg>
              </div>
              <div>
                <p class="text-[13px] font-extrabold text-[#081F5C]">Solver</p>
                <p class="text-[10px] font-bold text-[#334EAC]/70 uppercase tracking-widest mt-0.5">15 Best Ans.</p>
              </div>
            </div>
            <!-- Badge 3 -->
            <div class="p-4 rounded-[1.25rem] bg-gradient-to-br from-emerald-50 to-white border border-emerald-100 flex flex-col items-center justify-center text-center gap-3 hover:shadow-md transition-shadow cursor-pointer">
              <div class="w-12 h-12 rounded-full bg-emerald-100/50 flex items-center justify-center text-emerald-500 border border-emerald-200">
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M12 2v20"/><path d="m17 5-5-3-5 3v14l5 3 5-3Z"/></svg>
              </div>
              <div>
                <p class="text-[13px] font-extrabold text-[#081F5C]">Streak</p>
                <p class="text-[10px] font-bold text-emerald-600/70 uppercase tracking-widest mt-0.5">30 Days</p>
              </div>
            </div>
            <!-- Certificate -->
            <div class="p-4 rounded-[1.25rem] bg-slate-50 border border-slate-200 border-dashed flex flex-col items-center justify-center text-center gap-2 hover:border-[#7096D1] hover:bg-slate-100 transition-colors cursor-pointer text-slate-400 hover:text-[#334EAC]">
              <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M14.5 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V7.5L14.5 2z"/><polyline points="14 2 14 8 20 8"/><line x1="12" y1="18" x2="12" y2="12"/><line x1="9" y1="15" x2="12" y2="12"/><line x1="15" y1="15" x2="12" y2="12"/></svg>
              <span class="text-[12px] font-extrabold mt-1">Add Cert.</span>
            </div>
          </div>
        </div>

        <!-- 5. RECENT ACTIVITY -->
        <div class="bg-white rounded-[2rem] p-7 md:p-8 shadow-[0_4px_24px_rgba(0,0,0,0.02)] border border-slate-100/80">
          <h3 class="text-[17px] font-extrabold text-[#081F5C] mb-6 flex items-center gap-3">
            <span class="w-8 h-8 rounded-lg bg-[#EDF1F6] flex items-center justify-center text-[#334EAC]"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M12 20h9"/><path d="M16.5 3.5a2.12 2.12 0 0 1 3 3L7 19l-4 1 1-4Z"/></svg></span>
            Recent Activity
          </h3>
          
          <div class="relative pl-6 space-y-8 before:absolute before:inset-y-0 before:left-2.5 before:w-px before:bg-slate-200">
            <!-- Timeline Item 1 -->
            <div class="relative">
              <div class="absolute -left-[29px] w-5 h-5 rounded-full bg-emerald-50 border-2 border-emerald-500 flex items-center justify-center z-10">
                <div class="w-1.5 h-1.5 rounded-full bg-emerald-500"></div>
              </div>
              <p class="text-[13px] font-extrabold text-[#081F5C] mb-1">Achieved 95% in Data Structures Quiz</p>
              <p class="text-[12px] font-bold text-slate-400 mb-3">2 hours ago</p>
              <RouterLink to="/pelajar/quiz/1/result" class="inline-flex px-4 py-2 bg-slate-50 border border-slate-200 rounded-xl text-[12px] font-extrabold text-slate-500 hover:border-[#7096D1] hover:text-[#334EAC] transition-colors">
                View Result
              </RouterLink>
            </div>
            
            <!-- Timeline Item 2 -->
            <div class="relative">
              <div class="absolute -left-[29px] w-5 h-5 rounded-full bg-[#EDF1F6] border-2 border-[#334EAC] flex items-center justify-center z-10">
                <div class="w-1.5 h-1.5 rounded-full bg-[#334EAC]"></div>
              </div>
              <p class="text-[13px] font-extrabold text-[#081F5C] mb-1">Uploaded new study material</p>
              <p class="text-[12px] font-bold text-slate-400 mb-3">Yesterday, 14:30</p>
              <div class="p-4 bg-slate-50 border border-slate-100 rounded-xl max-w-sm cursor-pointer hover:border-[#7096D1] hover:bg-white transition-all flex items-center gap-3">
                <div class="w-8 h-8 rounded-lg bg-red-50 text-red-500 flex items-center justify-center shrink-0">
                  <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"><path d="M14.5 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V7.5L14.5 2z"/><polyline points="14 2 14 8 20 8"/></svg>
                </div>
                <div>
                  <p class="text-[13px] font-extrabold text-[#081F5C] truncate">Graph_Theory_Notes.pdf</p>
                  <p class="text-[11px] font-bold text-slate-400">PDF • 2.4 MB</p>
                </div>
              </div>
            </div>
            
            <!-- Timeline Item 3 -->
            <div class="relative">
              <div class="absolute -left-[29px] w-5 h-5 rounded-full bg-indigo-50 border-2 border-indigo-400 flex items-center justify-center z-10">
                <div class="w-1.5 h-1.5 rounded-full bg-indigo-400"></div>
              </div>
              <p class="text-[13px] font-extrabold text-[#081F5C] mb-1">Answered a forum question</p>
              <p class="text-[12px] font-bold text-slate-400 mb-3">3 days ago</p>
              <RouterLink to="/pelajar/forum/1" class="block p-4 bg-slate-50 border border-slate-100 rounded-xl hover:border-[#7096D1] hover:bg-white transition-all">
                <p class="text-[13px] font-semibold text-slate-600 line-clamp-2">"You can solve this by implementing a Breadth-First Search instead of DFS to find the shortest path..."</p>
              </RouterLink>
            </div>
          </div>
        </div>

      </div>
      
      <!-- 6. RIGHT SIDEBAR -->
      <div class="w-full xl:w-80 shrink-0 space-y-6 md:space-y-8 min-w-0">
        
        <!-- Profile Completion -->
        <div class="bg-white rounded-[2rem] p-6 shadow-[0_4px_24px_rgba(0,0,0,0.02)] border border-slate-100/80 text-center flex flex-col items-center">
          <div class="relative w-24 h-24 mb-4">
            <svg viewBox="0 0 36 36" class="w-full h-full transform -rotate-90">
              <path class="text-[#EDF1F6]" d="M18 2.0845 a 15.9155 15.9155 0 0 1 0 31.831 a 15.9155 15.9155 0 0 1 0 -31.831" fill="none" stroke="currentColor" stroke-width="4" />
              <path class="text-[#334EAC]" stroke-dasharray="85, 100" d="M18 2.0845 a 15.9155 15.9155 0 0 1 0 31.831 a 15.9155 15.9155 0 0 1 0 -31.831" fill="none" stroke="currentColor" stroke-width="4" stroke-linecap="round" />
            </svg>
            <div class="absolute inset-0 flex flex-col items-center justify-center">
              <span class="text-xl font-extrabold text-[#081F5C]">85%</span>
            </div>
          </div>
          <h3 class="text-[15px] font-extrabold text-[#081F5C] mb-2">Profile almost complete</h3>
          <p class="text-[12px] font-medium text-slate-500 mb-5">Add your GitHub link to stand out to mentors and peers.</p>
          <button class="w-full py-2.5 bg-[#EDF1F6] hover:bg-[#334EAC] hover:text-white text-[#334EAC] rounded-xl font-extrabold text-[13px] transition-colors active:scale-95">
            Complete Profile
          </button>
        </div>

        <!-- AI Study Recommendation -->
        <div class="bg-gradient-to-br from-[#081F5C] to-[#334EAC] rounded-[2rem] p-6 shadow-[0_4px_24px_rgba(0,0,0,0.02)] border border-white/10 text-white relative overflow-hidden group">
          <div class="absolute -right-4 -top-4 w-24 h-24 bg-white/10 blur-[30px] rounded-full pointer-events-none"></div>
          
          <h3 class="text-[14px] font-extrabold mb-4 flex items-center gap-2 relative z-10">
            <span class="w-6 h-6 rounded bg-white/10 flex items-center justify-center"><svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"><path d="m12 3-1.912 5.813a2 2 0 0 1-1.275 1.275L3 12l5.813 1.912a2 2 0 0 1 1.275 1.275L12 21l1.912-5.813a2 2 0 0 1 1.275-1.275L21 12l-5.813-1.912a2 2 0 0 1-1.275-1.275L12 3Z"/></svg></span>
            AI Recommendation
          </h3>
          <p class="text-[13px] font-medium text-[#BAD6EB] leading-relaxed mb-5 relative z-10">
            Your performance in "Computer Networks" is dipping. Schedule a 1-on-1 mentoring session before your midterm.
          </p>
          <RouterLink to="/pelajar/mentoring" class="w-full py-3 bg-white hover:bg-[#F7F2EB] text-[#081F5C] rounded-xl font-extrabold text-[13px] transition-all flex items-center justify-center gap-2 relative z-10 shadow-sm active:scale-95">
            Find a Mentor
          </RouterLink>
        </div>

        <!-- Next Mentoring Schedule -->
        <div class="bg-white rounded-[2rem] p-6 shadow-[0_4px_24px_rgba(0,0,0,0.02)] border border-slate-100/80">
          <h3 class="text-[15px] font-extrabold text-[#081F5C] mb-4 flex items-center justify-between">
            Next Session
            <span class="w-2 h-2 rounded-full bg-rose-500 animate-pulse"></span>
          </h3>
          
          <div class="flex gap-3 mb-4">
            <div class="w-12 h-12 bg-[#F7F2EB] rounded-xl flex flex-col items-center justify-center shrink-0 border border-amber-100">
              <span class="text-[9px] font-bold text-slate-500 uppercase">May</span>
              <span class="text-[16px] font-extrabold text-[#081F5C] leading-none">25</span>
            </div>
            <div>
              <p class="text-[14px] font-bold text-[#081F5C] mb-0.5">Advanced Algorithms</p>
              <p class="text-[12px] font-medium text-slate-500">14:00 • with Dr. Smith</p>
            </div>
          </div>
          <button class="w-full py-2.5 bg-slate-50 border border-slate-200 hover:border-[#7096D1] text-slate-600 hover:text-[#334EAC] rounded-xl font-extrabold text-[13px] transition-colors">
            Reschedule
          </button>
        </div>

        <!-- Quick Links -->
        <div class="bg-white rounded-[2rem] p-6 shadow-[0_4px_24px_rgba(0,0,0,0.02)] border border-slate-100/80">
          <h3 class="text-[15px] font-extrabold text-[#081F5C] mb-4">Quick Links</h3>
          <div class="space-y-2">
            <RouterLink to="/pelajar/materials" class="flex items-center gap-3 p-3 rounded-xl hover:bg-slate-50 transition-colors group text-[13px] font-bold text-slate-600 hover:text-[#334EAC]">
              <div class="w-8 h-8 rounded-lg bg-slate-100 group-hover:bg-[#EDF1F6] flex items-center justify-center transition-colors">
                <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M4 19.5v-15A2.5 2.5 0 0 1 6.5 2H20v20H6.5a2.5 2.5 0 0 1 0-5H20"/></svg>
              </div>
              Saved Materials
            </RouterLink>
            <RouterLink to="/pelajar/forum" class="flex items-center gap-3 p-3 rounded-xl hover:bg-slate-50 transition-colors group text-[13px] font-bold text-slate-600 hover:text-[#334EAC]">
              <div class="w-8 h-8 rounded-lg bg-slate-100 group-hover:bg-[#EDF1F6] flex items-center justify-center transition-colors">
                <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z"/></svg>
              </div>
              Bookmarked Discussions
            </RouterLink>
            <div class="flex items-center gap-3 p-3 rounded-xl hover:bg-slate-50 transition-colors group text-[13px] font-bold text-slate-600 hover:text-[#334EAC] cursor-pointer">
              <div class="w-8 h-8 rounded-lg bg-slate-100 group-hover:bg-[#EDF1F6] flex items-center justify-center transition-colors">
                <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M12.22 2h-.44a2 2 0 0 0-2 2v.18a2 2 0 0 1-1 1.73l-.43.25a2 2 0 0 1-2 0l-.15-.08a2 2 0 0 0-2.73.73l-.22.38a2 2 0 0 0 .73 2.73l.15.1a2 2 0 0 1 1 1.72v.51a2 2 0 0 1-1 1.74l-.15.09a2 2 0 0 0-.73 2.73l.22.38a2 2 0 0 0 2.73.73l.15-.08a2 2 0 0 1 2 0l.43.25a2 2 0 0 1 1 1.73V20a2 2 0 0 0 2 2h.44a2 2 0 0 0 2-2v-.18a2 2 0 0 1 1-1.73l.43-.25a2 2 0 0 1 2 0l.15.08a2 2 0 0 0 2.73-.73l.22-.39a2 2 0 0 0-.73-2.73l-.15-.08a2 2 0 0 1-1-1.74v-.5a2 2 0 0 1 1-1.74l.15-.09a2 2 0 0 0 .73-2.73l-.22-.38a2 2 0 0 0-2.73-.73l-.15.08a2 2 0 0 1-2 0l-.43-.25a2 2 0 0 1-1-1.73V4a2 2 0 0 0-2-2z"/><circle cx="12" cy="12" r="3"/></svg>
              </div>
              Account Settings
            </div>
          </div>
        </div>

      </div>
    </div>
  </div>
</template>

<script setup>
import { computed } from 'vue'
import { RouterLink } from 'vue-router'

const user = JSON.parse(localStorage.getItem('user') || '{}')
const userName = user.name || 'User'
const userRole = localStorage.getItem('role') || 'pelajar'
const reputationScore = user.reputation_score !== undefined ? user.reputation_score.toLocaleString() : '0'

const avatarUrl = computed(() => {
  return `https://ui-avatars.com/api/?name=${encodeURIComponent(userName)}&background=BAD6EB&color=081F5C&bold=true`
})

const userBio = computed(() => {
  if (userRole === 'admin') {
    return 'Backend and system administrator for FokusIn platform. Managing user permissions, categories, and analytical statistics.'
  } else if (userRole === 'tutor') {
    return 'Experienced educator and academic mentor. Reviewing forum answers, verifying explanations, and conducting tutoring sessions.'
  } else {
    return 'Undergraduate student focusing on Artificial Intelligence and Distributed Systems. Actively exploring the intersection of Data Science and Software Engineering.'
  }
})

const academicStatus = computed(() => {
  if (userRole === 'admin') {
    return 'System Administrator'
  } else if (userRole === 'tutor') {
    return 'Academic Tutor'
  } else {
    return 'Active Scholar'
  }
})
</script>
