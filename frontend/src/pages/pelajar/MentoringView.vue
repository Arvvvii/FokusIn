<template>
  <div class="space-y-6 animate-in fade-in duration-500">
    
    <!-- 1. Top Header -->
    <div class="mb-12 max-w-3xl">
      <h1 class="text-3xl md:text-4xl font-extrabold text-[#081F5C] tracking-tight mb-4">1-on-1 Mentoring</h1>
      <p class="text-slate-500 font-medium text-[16px] leading-relaxed">Connect with top university tutors and industry experts. Book private sessions to accelerate your academic progress and resolve complex problems.</p>
    </div>

    <!-- 2. Search & Filter Section -->
    <div class="bg-white rounded-[2rem] p-4 md:p-5 shadow-[0_4px_24px_rgba(0,0,0,0.02)] border border-slate-100/80 mb-12 flex flex-col md:flex-row gap-4">
      
      <!-- Search -->
      <div class="relative flex-1">
        <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none text-slate-400">
          <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><circle cx="11" cy="11" r="8"/><path d="m21 21-4.3-4.3"/></svg>
        </div>
        <input type="text" class="w-full pl-12 pr-4 py-3.5 bg-slate-50 hover:bg-slate-100/50 border-none rounded-[1.25rem] text-[15px] font-bold text-[#081F5C] placeholder-slate-400 focus:outline-none focus:ring-4 focus:ring-[#7096D1]/20 transition-all" placeholder="Search by name, subject, or university...">
      </div>

      <!-- Categories -->
      <div class="relative min-w-[180px]">
        <select class="w-full pl-4 pr-10 py-3.5 bg-slate-50 hover:bg-slate-100/50 border-none rounded-[1.25rem] text-[14px] font-bold text-[#081F5C] appearance-none focus:outline-none focus:ring-4 focus:ring-[#7096D1]/20 transition-all cursor-pointer">
          <option value="">All Categories</option>
          <option value="cs">Computer Science</option>
          <option value="math">Mathematics</option>
          <option value="physics">Physics</option>
        </select>
        <div class="absolute inset-y-0 right-0 pr-4 flex items-center pointer-events-none text-slate-400">
          <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"><path d="m6 9 6 6 6-6"/></svg>
        </div>
      </div>

      <!-- Rating -->
      <div class="relative min-w-[140px]">
        <select class="w-full pl-4 pr-10 py-3.5 bg-slate-50 hover:bg-slate-100/50 border-none rounded-[1.25rem] text-[14px] font-bold text-[#081F5C] appearance-none focus:outline-none focus:ring-4 focus:ring-[#7096D1]/20 transition-all cursor-pointer">
          <option value="">Any Rating</option>
          <option value="4.5">4.5 & up</option>
          <option value="4.0">4.0 & up</option>
        </select>
        <div class="absolute inset-y-0 right-0 pr-4 flex items-center pointer-events-none text-slate-400">
          <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"><path d="m6 9 6 6 6-6"/></svg>
        </div>
      </div>

      <!-- Filter Button -->
      <button class="px-8 py-3.5 bg-[#334EAC] hover:bg-[#081F5C] text-white rounded-[1.25rem] font-extrabold text-[14px] transition-all shadow-[0_4px_15px_rgba(51,78,172,0.15)] active:scale-95 shrink-0 flex items-center justify-center gap-2">
        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"><path d="M22 3H2l8 9.46V19l4 2v-8.54L22 3z"/></svg>
        Filter
      </button>

    </div>

    <!-- Layout: Left (Upcoming/History) and Right (Mentors) -->
    <div class="flex flex-col xl:flex-row gap-8 lg:gap-10">
      
      <!-- LEFT PANEL: Sessions -->
      <div class="w-full xl:w-[35%] shrink-0 space-y-8">
        
        <!-- 3. Upcoming Session Card -->
        <div class="bg-white rounded-[2rem] p-7 shadow-[0_4px_24px_rgba(0,0,0,0.02)] border border-slate-100/80 hover:shadow-md transition-shadow relative overflow-hidden group">
          <!-- Subtle Accent -->
          <div class="absolute top-0 right-0 w-32 h-32 bg-[#7096D1] rounded-full blur-3xl opacity-[0.08] pointer-events-none"></div>

          <div class="flex items-center justify-between mb-6 relative z-10">
            <h3 class="text-[17px] font-extrabold text-[#081F5C] flex items-center gap-2.5">
              <span class="w-2.5 h-2.5 rounded-full bg-rose-500 animate-pulse"></span>
              Upcoming Session
            </h3>
            <span class="px-3 py-1 bg-[#EDF1F6] text-[#334EAC] text-[10px] font-extrabold rounded-md uppercase tracking-widest">In 2 hours</span>
          </div>

          <div class="flex items-center gap-4 mb-6 relative z-10">
            <div class="w-14 h-14 rounded-2xl bg-slate-100 overflow-hidden shrink-0 border border-slate-200">
              <img src="https://i.pravatar.cc/150?u=a042581f4e29026704d" alt="Mentor" class="w-full h-full object-cover">
            </div>
            <div>
              <h4 class="text-[16px] font-extrabold text-[#081F5C] mb-1">Advanced Calculus</h4>
              <p class="text-[13px] font-bold text-slate-500">with <span class="text-[#334EAC]">Dr. Sarah Smith</span></p>
            </div>
          </div>

          <div class="bg-slate-50 rounded-[1.25rem] p-4 mb-6 flex items-center justify-between border border-slate-100/80 relative z-10">
            <div class="flex items-center gap-3">
              <div class="w-10 h-10 rounded-full bg-white flex items-center justify-center text-[#334EAC] shadow-sm border border-slate-100">
                <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><rect x="3" y="4" width="18" height="18" rx="2" ry="2"/><line x1="16" y1="2" x2="16" y2="6"/><line x1="8" y1="2" x2="8" y2="6"/><line x1="3" y1="10" x2="21" y2="10"/></svg>
              </div>
              <div>
                <p class="text-[13px] font-extrabold text-[#081F5C]">Today, 15:00 PM</p>
                <p class="text-[11px] font-bold text-slate-400">45 Minutes</p>
              </div>
            </div>
          </div>

          <button class="w-full py-4 bg-[#334EAC] hover:bg-[#081F5C] text-white rounded-[1.25rem] font-extrabold text-[15px] transition-all shadow-[0_4px_15px_rgba(51,78,172,0.15)] active:scale-95 flex items-center justify-center gap-2 relative z-10">
            <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"><path d="M2 12h20"/><path d="m15 5 7 7-7 7"/></svg>
            Join Meeting Room
          </button>
        </div>

        <!-- 4. Session History Panel -->
        <div class="bg-white rounded-[2rem] p-7 shadow-[0_4px_24px_rgba(0,0,0,0.02)] border border-slate-100/80">
          <div class="flex items-center justify-between mb-6">
            <h3 class="text-[16px] font-extrabold text-[#081F5C]">Recent History</h3>
            <button class="text-[12px] font-bold text-[#334EAC] hover:text-[#081F5C] transition-colors">View All</button>
          </div>

          <div class="space-y-4">
            <!-- History Card -->
            <div class="flex items-start gap-4 p-4 rounded-[1.25rem] bg-slate-50/50 hover:bg-[#F7F2EB]/50 border border-transparent hover:border-slate-200/60 transition-all cursor-pointer group">
              <div class="w-10 h-10 rounded-full bg-emerald-50 flex items-center justify-center text-emerald-600 shrink-0 border border-emerald-100">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"><polyline points="20 6 9 17 4 12"/></svg>
              </div>
              <div>
                <h4 class="text-[13px] font-extrabold text-[#081F5C] mb-0.5 group-hover:text-[#334EAC] transition-colors">Kinematics OSN</h4>
                <p class="text-[11px] font-bold text-slate-500 mb-2">Prof. Anderson • 12 May</p>
                <div class="flex items-center gap-1">
                  <svg v-for="i in 5" :key="i" xmlns="http://www.w3.org/2000/svg" width="10" height="10" viewBox="0 0 24 24" fill="#F59E0B" stroke="#F59E0B" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"/></svg>
                </div>
              </div>
            </div>

            <!-- History Card -->
            <div class="flex items-start gap-4 p-4 rounded-[1.25rem] bg-slate-50/50 hover:bg-[#F7F2EB]/50 border border-transparent hover:border-slate-200/60 transition-all cursor-pointer group">
              <div class="w-10 h-10 rounded-full bg-emerald-50 flex items-center justify-center text-emerald-600 shrink-0 border border-emerald-100">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"><polyline points="20 6 9 17 4 12"/></svg>
              </div>
              <div>
                <h4 class="text-[13px] font-extrabold text-[#081F5C] mb-0.5 group-hover:text-[#334EAC] transition-colors">Python Data Structures</h4>
                <p class="text-[11px] font-bold text-slate-500 mb-2">Budi Santoso • 08 May</p>
                <div class="flex items-center gap-1">
                  <svg v-for="i in 5" :key="i" xmlns="http://www.w3.org/2000/svg" width="10" height="10" viewBox="0 0 24 24" fill="#F59E0B" stroke="#F59E0B" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"/></svg>
                </div>
              </div>
            </div>

          </div>
        </div>

      </div>

      <!-- RIGHT PANEL: Recommended Mentors -->
      <div class="flex-1 w-full xl:w-[65%] min-w-0">
        
        <div class="flex items-center justify-between mb-8">
          <h2 class="text-2xl font-extrabold text-[#081F5C]">Recommended Mentors</h2>
          <span class="text-[13px] font-bold text-slate-400">124 available</span>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
          
          <!-- Mentor Card -->
          <div class="bg-white rounded-[2rem] p-6 shadow-[0_4px_24px_rgba(0,0,0,0.02)] border border-slate-100/80 hover:shadow-lg hover:-translate-y-1 transition-all group flex flex-col h-full">
            
            <div class="flex items-start justify-between mb-5">
              <div class="relative">
                <div class="w-16 h-16 rounded-full bg-slate-100 overflow-hidden border border-slate-200">
                  <img src="https://i.pravatar.cc/150?u=a042581f4e29026704d" alt="Dr. Sarah Smith" class="w-full h-full object-cover">
                </div>
                <!-- Verification Badge -->
                <div class="absolute -bottom-1 -right-1 w-6 h-6 bg-[#334EAC] rounded-full border-2 border-white flex items-center justify-center text-white shadow-sm">
                  <svg xmlns="http://www.w3.org/2000/svg" width="10" height="10" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="4" stroke-linecap="round" stroke-linejoin="round"><polyline points="20 6 9 17 4 12"/></svg>
                </div>
              </div>
              <div class="bg-[#F7F2EB] px-2.5 py-1 rounded-lg flex items-center gap-1 border border-amber-100">
                <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" viewBox="0 0 24 24" fill="#F59E0B" stroke="#F59E0B" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"/></svg>
                <span class="text-[12px] font-extrabold text-[#081F5C]">4.9</span>
              </div>
            </div>

            <div class="mb-5 flex-1">
              <h3 class="text-[17px] font-extrabold text-[#081F5C] mb-1 group-hover:text-[#334EAC] transition-colors">Dr. Sarah Smith</h3>
              <p class="text-[13px] font-bold text-slate-500 mb-3">Ph.D. in Mathematics • MIT</p>
              
              <div class="flex flex-wrap gap-2">
                <span class="px-2.5 py-1 bg-slate-50 text-slate-600 text-[10px] font-extrabold rounded-md border border-slate-200/60 uppercase tracking-widest">Calculus</span>
                <span class="px-2.5 py-1 bg-slate-50 text-slate-600 text-[10px] font-extrabold rounded-md border border-slate-200/60 uppercase tracking-widest">Algebra</span>
              </div>
            </div>

            <div class="flex items-center justify-between pt-5 border-t border-slate-100/80">
              <div>
                <p class="text-[11px] font-bold text-slate-400 uppercase tracking-widest mb-0.5">Session Rate</p>
                <p class="text-[15px] font-extrabold text-[#081F5C]">Rp 150k <span class="text-[12px] font-bold text-slate-400">/ hr</span></p>
              </div>
              <button class="px-5 py-2.5 bg-[#EDF1F6] hover:bg-[#334EAC] hover:text-white text-[#334EAC] rounded-xl font-extrabold text-[13px] transition-colors active:scale-95">
                Book
              </button>
            </div>
          </div>

          <!-- Mentor Card -->
          <div class="bg-white rounded-[2rem] p-6 shadow-[0_4px_24px_rgba(0,0,0,0.02)] border border-slate-100/80 hover:shadow-lg hover:-translate-y-1 transition-all group flex flex-col h-full">
            
            <div class="flex items-start justify-between mb-5">
              <div class="relative">
                <div class="w-16 h-16 rounded-full bg-slate-100 overflow-hidden border border-slate-200">
                  <img src="https://i.pravatar.cc/150?u=1" alt="Prof. Anderson" class="w-full h-full object-cover">
                </div>
                <!-- Verification Badge -->
                <div class="absolute -bottom-1 -right-1 w-6 h-6 bg-[#334EAC] rounded-full border-2 border-white flex items-center justify-center text-white shadow-sm">
                  <svg xmlns="http://www.w3.org/2000/svg" width="10" height="10" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="4" stroke-linecap="round" stroke-linejoin="round"><polyline points="20 6 9 17 4 12"/></svg>
                </div>
              </div>
              <div class="bg-[#F7F2EB] px-2.5 py-1 rounded-lg flex items-center gap-1 border border-amber-100">
                <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" viewBox="0 0 24 24" fill="#F59E0B" stroke="#F59E0B" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"/></svg>
                <span class="text-[12px] font-extrabold text-[#081F5C]">4.8</span>
              </div>
            </div>

            <div class="mb-5 flex-1">
              <h3 class="text-[17px] font-extrabold text-[#081F5C] mb-1 group-hover:text-[#334EAC] transition-colors">Prof. Anderson</h3>
              <p class="text-[13px] font-bold text-slate-500 mb-3">Physics Lecturer • UI</p>
              
              <div class="flex flex-wrap gap-2">
                <span class="px-2.5 py-1 bg-slate-50 text-slate-600 text-[10px] font-extrabold rounded-md border border-slate-200/60 uppercase tracking-widest">Kinematics</span>
                <span class="px-2.5 py-1 bg-slate-50 text-slate-600 text-[10px] font-extrabold rounded-md border border-slate-200/60 uppercase tracking-widest">OSN</span>
              </div>
            </div>

            <div class="flex items-center justify-between pt-5 border-t border-slate-100/80">
              <div>
                <p class="text-[11px] font-bold text-slate-400 uppercase tracking-widest mb-0.5">Session Rate</p>
                <p class="text-[15px] font-extrabold text-[#081F5C]">Rp 200k <span class="text-[12px] font-bold text-slate-400">/ hr</span></p>
              </div>
              <button class="px-5 py-2.5 bg-[#EDF1F6] hover:bg-[#334EAC] hover:text-white text-[#334EAC] rounded-xl font-extrabold text-[13px] transition-colors active:scale-95">
                Book
              </button>
            </div>
          </div>

          <!-- Mentor Card -->
          <div class="bg-white rounded-[2rem] p-6 shadow-[0_4px_24px_rgba(0,0,0,0.02)] border border-slate-100/80 hover:shadow-lg hover:-translate-y-1 transition-all group flex flex-col h-full">
            
            <div class="flex items-start justify-between mb-5">
              <div class="relative">
                <div class="w-16 h-16 rounded-full bg-[#EDF1F6] overflow-hidden border border-slate-200 flex items-center justify-center font-extrabold text-[#334EAC] text-xl">
                  BS
                </div>
              </div>
              <div class="bg-[#F7F2EB] px-2.5 py-1 rounded-lg flex items-center gap-1 border border-amber-100">
                <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" viewBox="0 0 24 24" fill="#F59E0B" stroke="#F59E0B" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"/></svg>
                <span class="text-[12px] font-extrabold text-[#081F5C]">4.5</span>
              </div>
            </div>

            <div class="mb-5 flex-1">
              <h3 class="text-[17px] font-extrabold text-[#081F5C] mb-1 group-hover:text-[#334EAC] transition-colors">Budi Santoso</h3>
              <p class="text-[13px] font-bold text-slate-500 mb-3">Senior Software Engineer • Gojek</p>
              
              <div class="flex flex-wrap gap-2">
                <span class="px-2.5 py-1 bg-slate-50 text-slate-600 text-[10px] font-extrabold rounded-md border border-slate-200/60 uppercase tracking-widest">Vue.js</span>
                <span class="px-2.5 py-1 bg-slate-50 text-slate-600 text-[10px] font-extrabold rounded-md border border-slate-200/60 uppercase tracking-widest">Algorithms</span>
              </div>
            </div>

            <div class="flex items-center justify-between pt-5 border-t border-slate-100/80">
              <div>
                <p class="text-[11px] font-bold text-slate-400 uppercase tracking-widest mb-0.5">Session Rate</p>
                <p class="text-[15px] font-extrabold text-[#081F5C]">Rp 120k <span class="text-[12px] font-bold text-slate-400">/ hr</span></p>
              </div>
              <button class="px-5 py-2.5 bg-[#EDF1F6] hover:bg-[#334EAC] hover:text-white text-[#334EAC] rounded-xl font-extrabold text-[13px] transition-colors active:scale-95">
                Book
              </button>
            </div>
          </div>

        </div>
      </div>
      
    </div>
  </div>
</template>

<script setup>
// Calm Academic Mentoring View
</script>
