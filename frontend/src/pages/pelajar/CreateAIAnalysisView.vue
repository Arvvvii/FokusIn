<template>
  <div class="space-y-8 animate-in fade-in duration-500">
    
    <!-- 1. Page Header -->
    <div class="mb-10">
      <div class="flex items-center gap-2 text-[13px] font-bold text-slate-400 mb-4 flex-wrap">
        <RouterLink to="/pelajar/ai-analyzer" class="hover:text-[#334EAC] transition-colors shrink-0">AI Analyzer</RouterLink>
        <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" class="shrink-0"><path d="m9 18 6-6-6-6"/></svg>
        <span class="text-[#081F5C] shrink-0">New Analysis</span>
      </div>
      <h1 class="text-3xl md:text-4xl font-extrabold text-[#081F5C] tracking-tight mb-3">Create New AI Analysis</h1>
      <p class="text-slate-500 font-medium text-[16px] leading-relaxed max-w-2xl">Upload your documents and configure the AI engine to generate tailored academic insights, topic predictions, and personalized study paths.</p>
    </div>

    <div class="flex flex-col xl:flex-row gap-8 min-w-0">
      
      <!-- Left / Main Form (w-65%) -->
      <div class="w-full xl:w-[65%] space-y-8 min-w-0">
        
        <!-- 3. Document Input Section -->
        <div class="bg-white rounded-[2rem] p-6 md:p-10 shadow-[0_4px_24px_rgba(0,0,0,0.02)] border border-slate-100/80 w-full overflow-hidden">
          <h3 class="text-[17px] font-extrabold text-[#081F5C] mb-5 flex items-center gap-3">
            <span class="w-8 h-8 rounded-full bg-[#EDF1F6] flex items-center justify-center text-[#334EAC]"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M14.5 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V7.5L14.5 2z"/><polyline points="14 2 14 8 20 8"/></svg></span>
            Source Document
          </h3>
          
          <div class="relative flex flex-col items-center justify-center p-12 border-[2px] border-dashed border-slate-200 rounded-[1.5rem] bg-slate-50/50 hover:bg-[#F7F2EB]/50 hover:border-[#7096D1] transition-all cursor-pointer group">
            <div class="w-16 h-16 rounded-2xl bg-white shadow-sm border border-slate-100 flex items-center justify-center text-[#334EAC] mb-5 group-hover:-translate-y-1 transition-transform">
              <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"/><polyline points="17 8 12 3 7 8"/><line x1="12" x2="12" y1="3" y2="15"/></svg>
            </div>
            <h4 class="text-[16px] font-extrabold text-[#081F5C] text-center mb-1">Click or drag file to upload</h4>
            <p class="text-[13px] font-medium text-slate-400 text-center mb-6">Supports PDF, DOCX, PPT, and MD</p>
            
            <button @click.prevent class="px-6 py-2.5 bg-white border border-slate-200 rounded-xl text-[#081F5C] font-extrabold text-[13px] hover:border-[#334EAC] transition-colors shadow-sm">Browse Files</button>
          </div>
        </div>

        <!-- 4. Analysis Configuration -->
        <div class="bg-white rounded-[2rem] shadow-[0_4px_24px_rgba(0,0,0,0.02)] border border-slate-100/80 w-full overflow-hidden relative">
          <!-- Subtle top gradient line -->
          <div class="absolute top-0 left-0 w-full h-1.5 bg-gradient-to-r from-[#334EAC] via-[#7096D1] to-[#BAD6EB]"></div>
          
          <div class="p-6 md:p-10">
            <!-- New Premium Header -->
            <div class="flex items-start justify-between mb-8">
              <div>
                <h3 class="text-[19px] font-extrabold text-[#081F5C] mb-2 flex items-center gap-3">
                  AI Analysis Configuration
                  <span class="px-2.5 py-1 bg-[#EDF1F6] text-[#334EAC] text-[10px] font-extrabold rounded-lg uppercase tracking-widest flex items-center gap-1">
                    <svg xmlns="http://www.w3.org/2000/svg" width="10" height="10" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"><path d="m12 3-1.912 5.813a2 2 0 0 1-1.275 1.275L3 12l5.813 1.912a2 2 0 0 1 1.275 1.275L12 21l1.912-5.813a2 2 0 0 1 1.275-1.275L21 12l-5.813-1.912a2 2 0 0 1-1.275-1.275L12 3Z"/></svg>
                    Pro
                  </span>
                </h3>
                <p class="text-[14px] font-medium text-slate-500 max-w-lg leading-relaxed">
                  Customize the AI modules used to analyze your academic material.
                </p>
              </div>
              <div class="hidden sm:flex w-12 h-12 rounded-2xl bg-slate-50 border border-slate-100 items-center justify-center text-slate-300">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M12 2v20"/><path d="M17 5H9.5a3.5 3.5 0 0 0 0 7h5a3.5 3.5 0 0 1 0 7H6"/></svg>
              </div>
            </div>

            <!-- Existing Selects -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-10">
              <div class="space-y-3">
                <label class="text-[12px] font-extrabold text-slate-400 uppercase tracking-widest ml-1">Analysis Type</label>
                <div class="relative">
                  <select class="w-full px-5 py-3.5 bg-slate-50 hover:bg-slate-100/50 border border-slate-200 rounded-[1.25rem] text-[14px] font-bold text-[#081F5C] focus:outline-none focus:border-[#7096D1] focus:ring-4 focus:ring-[#7096D1]/10 transition-all appearance-none cursor-pointer">
                    <option>Exam Analysis</option>
                    <option>Research Analysis</option>
                    <option>Study Pattern</option>
                  </select>
                  <div class="absolute inset-y-0 right-0 pr-4 flex items-center pointer-events-none text-slate-400">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"><path d="m6 9 6 6 6-6"/></svg>
                  </div>
                </div>
              </div>
              <div class="space-y-3">
                <label class="text-[12px] font-extrabold text-slate-400 uppercase tracking-widest ml-1">Subject Category</label>
                <div class="relative">
                  <select class="w-full px-5 py-3.5 bg-slate-50 hover:bg-slate-100/50 border border-slate-200 rounded-[1.25rem] text-[14px] font-bold text-[#081F5C] focus:outline-none focus:border-[#7096D1] focus:ring-4 focus:ring-[#7096D1]/10 transition-all appearance-none cursor-pointer">
                    <option>Physics</option>
                    <option>Computer Science</option>
                    <option>Mathematics</option>
                  </select>
                  <div class="absolute inset-y-0 right-0 pr-4 flex items-center pointer-events-none text-slate-400">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"><path d="m6 9 6 6 6-6"/></svg>
                  </div>
                </div>
              </div>
              <div class="space-y-3 md:col-span-2">
                <label class="text-[12px] font-extrabold text-slate-400 uppercase tracking-widest ml-1">Target Difficulty Level</label>
                <div class="flex flex-wrap gap-3">
                  <label class="relative cursor-pointer">
                    <input type="radio" name="difficulty" class="peer sr-only">
                    <div class="px-5 py-2.5 bg-white border border-slate-200 rounded-xl text-[13px] font-bold text-slate-500 peer-checked:border-[#334EAC] peer-checked:bg-[#EDF1F6] peer-checked:text-[#334EAC] transition-all">Basic</div>
                  </label>
                  <label class="relative cursor-pointer">
                    <input type="radio" name="difficulty" class="peer sr-only" checked>
                    <div class="px-5 py-2.5 bg-white border border-slate-200 rounded-xl text-[13px] font-bold text-slate-500 peer-checked:border-[#334EAC] peer-checked:bg-[#EDF1F6] peer-checked:text-[#334EAC] transition-all">Intermediate</div>
                  </label>
                  <label class="relative cursor-pointer">
                    <input type="radio" name="difficulty" class="peer sr-only">
                    <div class="px-5 py-2.5 bg-white border border-slate-200 rounded-xl text-[13px] font-bold text-slate-500 peer-checked:border-[#334EAC] peer-checked:bg-[#EDF1F6] peer-checked:text-[#334EAC] transition-all">Advanced (OSN)</div>
                  </label>
                </div>
              </div>
            </div>

            <!-- AI Focus Modules Redesign -->
            <div class="pt-6 border-t border-slate-100">
              <label class="text-[12px] font-extrabold text-slate-400 uppercase tracking-widest block mb-4 ml-1">Active AI Modules</label>
              <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                
                <!-- Module 1: Topic Detection (Active) -->
                <label class="relative flex flex-col p-5 rounded-2xl border-2 border-[#334EAC] bg-[#EDF1F6]/30 shadow-[0_0_15px_rgba(51,78,172,0.08)] cursor-pointer hover:-translate-y-1 hover:shadow-lg transition-all duration-300 group">
                  <input type="checkbox" checked class="sr-only peer" onchange="const isChecked = this.checked; const p = this.parentElement; if(isChecked) { p.classList.remove('border-slate-100', 'bg-white'); p.classList.add('border-[#334EAC]', 'bg-[#EDF1F6]/30', 'shadow-[0_0_15px_rgba(51,78,172,0.08)]'); p.querySelector('.check-icon').classList.remove('scale-0'); p.querySelector('.check-icon').classList.add('scale-100'); } else { p.classList.add('border-slate-100', 'bg-white'); p.classList.remove('border-[#334EAC]', 'bg-[#EDF1F6]/30', 'shadow-[0_0_15px_rgba(51,78,172,0.08)]'); p.querySelector('.check-icon').classList.add('scale-0'); p.querySelector('.check-icon').classList.remove('scale-100'); }">
                  <div class="flex items-start justify-between mb-3">
                    <div class="w-10 h-10 rounded-xl bg-white border border-slate-200 shadow-sm flex items-center justify-center text-[#334EAC] group-hover:scale-110 transition-transform duration-300">
                      <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><circle cx="11" cy="11" r="8"/><path d="m21 21-4.3-4.3"/></svg>
                    </div>
                    <!-- Animated Check -->
                    <div class="check-icon w-6 h-6 rounded-full bg-[#334EAC] text-white flex items-center justify-center scale-100 transition-transform duration-300">
                      <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"><polyline points="20 6 9 17 4 12"/></svg>
                    </div>
                  </div>
                  <h4 class="text-[14px] font-extrabold text-[#081F5C] mb-1">Topic Detection</h4>
                  <p class="text-[12px] font-medium text-slate-500 leading-relaxed max-w-[90%]">Scans document structure to map questions against national curriculum standards.</p>
                </label>

                <!-- Module 2: Weakness Analysis (Active) -->
                <label class="relative flex flex-col p-5 rounded-2xl border-2 border-[#334EAC] bg-[#EDF1F6]/30 shadow-[0_0_15px_rgba(51,78,172,0.08)] cursor-pointer hover:-translate-y-1 hover:shadow-lg transition-all duration-300 group">
                  <input type="checkbox" checked class="sr-only peer" onchange="const isChecked = this.checked; const p = this.parentElement; if(isChecked) { p.classList.remove('border-slate-100', 'bg-white'); p.classList.add('border-[#334EAC]', 'bg-[#EDF1F6]/30', 'shadow-[0_0_15px_rgba(51,78,172,0.08)]'); p.querySelector('.check-icon').classList.remove('scale-0'); p.querySelector('.check-icon').classList.add('scale-100'); } else { p.classList.add('border-slate-100', 'bg-white'); p.classList.remove('border-[#334EAC]', 'bg-[#EDF1F6]/30', 'shadow-[0_0_15px_rgba(51,78,172,0.08)]'); p.querySelector('.check-icon').classList.add('scale-0'); p.querySelector('.check-icon').classList.remove('scale-100'); }">
                  <div class="flex items-start justify-between mb-3">
                    <div class="w-10 h-10 rounded-xl bg-white border border-slate-200 shadow-sm flex items-center justify-center text-[#334EAC] group-hover:scale-110 transition-transform duration-300">
                      <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M12 5a3 3 0 1 0-5.997.125 4 4 0 0 0-2.526 5.77 4 4 0 0 0 .556 6.588A4 4 0 1 0 12 18Z"/><path d="M12 5a3 3 0 1 1 5.997.125 4 4 0 0 1 2.526 5.77 4 4 0 0 1-.556 6.588A4 4 0 1 1 12 18Z"/><path d="M15 13a4.5 4.5 0 0 1-3-4 4.5 4.5 0 0 1-3 4"/><path d="M17.599 6.5a3 3 0 0 0 .399-1.375"/></svg>
                    </div>
                    <!-- Animated Check -->
                    <div class="check-icon w-6 h-6 rounded-full bg-[#334EAC] text-white flex items-center justify-center scale-100 transition-transform duration-300">
                      <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"><polyline points="20 6 9 17 4 12"/></svg>
                    </div>
                  </div>
                  <h4 class="text-[14px] font-extrabold text-[#081F5C] mb-1">Weakness Analysis</h4>
                  <p class="text-[12px] font-medium text-slate-500 leading-relaxed max-w-[90%]">Identifies complex linguistic patterns and areas where logic errors frequently occur.</p>
                </label>

                <!-- Module 3: Recommendation Engine (Inactive) -->
                <label class="relative flex flex-col p-5 rounded-2xl border-2 border-slate-100 bg-white hover:border-[#7096D1] cursor-pointer hover:-translate-y-1 hover:shadow-lg transition-all duration-300 group">
                  <input type="checkbox" class="sr-only peer" onchange="const isChecked = this.checked; const p = this.parentElement; if(isChecked) { p.classList.remove('border-slate-100', 'bg-white'); p.classList.add('border-[#334EAC]', 'bg-[#EDF1F6]/30', 'shadow-[0_0_15px_rgba(51,78,172,0.08)]'); p.querySelector('.check-icon').classList.remove('scale-0'); p.querySelector('.check-icon').classList.add('scale-100'); } else { p.classList.add('border-slate-100', 'bg-white'); p.classList.remove('border-[#334EAC]', 'bg-[#EDF1F6]/30', 'shadow-[0_0_15px_rgba(51,78,172,0.08)]'); p.querySelector('.check-icon').classList.add('scale-0'); p.querySelector('.check-icon').classList.remove('scale-100'); }">
                  <div class="flex items-start justify-between mb-3">
                    <div class="w-10 h-10 rounded-xl bg-slate-50 border border-slate-100 flex items-center justify-center text-slate-400 group-hover:text-[#334EAC] group-hover:border-slate-200 group-hover:bg-white group-hover:scale-110 transition-all duration-300">
                      <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="m12 3-1.912 5.813a2 2 0 0 1-1.275 1.275L3 12l5.813 1.912a2 2 0 0 1 1.275 1.275L12 21l1.912-5.813a2 2 0 0 1 1.275-1.275L21 12l-5.813-1.912a2 2 0 0 1-1.275-1.275L12 3Z"/></svg>
                    </div>
                    <!-- Animated Check -->
                    <div class="check-icon w-6 h-6 rounded-full bg-[#334EAC] text-white flex items-center justify-center scale-0 transition-transform duration-300">
                      <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"><polyline points="20 6 9 17 4 12"/></svg>
                    </div>
                  </div>
                  <h4 class="text-[14px] font-extrabold text-[#081F5C] mb-1">Recommendation Engine</h4>
                  <p class="text-[12px] font-medium text-slate-500 leading-relaxed max-w-[90%]">Generates personalized study materials and matches you with suitable tutors automatically.</p>
                </label>

                <!-- Module 4: Exam Prediction (Inactive) -->
                <label class="relative flex flex-col p-5 rounded-2xl border-2 border-slate-100 bg-white hover:border-[#7096D1] cursor-pointer hover:-translate-y-1 hover:shadow-lg transition-all duration-300 group">
                  <input type="checkbox" class="sr-only peer" onchange="const isChecked = this.checked; const p = this.parentElement; if(isChecked) { p.classList.remove('border-slate-100', 'bg-white'); p.classList.add('border-[#334EAC]', 'bg-[#EDF1F6]/30', 'shadow-[0_0_15px_rgba(51,78,172,0.08)]'); p.querySelector('.check-icon').classList.remove('scale-0'); p.querySelector('.check-icon').classList.add('scale-100'); } else { p.classList.add('border-slate-100', 'bg-white'); p.classList.remove('border-[#334EAC]', 'bg-[#EDF1F6]/30', 'shadow-[0_0_15px_rgba(51,78,172,0.08)]'); p.querySelector('.check-icon').classList.add('scale-0'); p.querySelector('.check-icon').classList.remove('scale-100'); }">
                  <div class="flex items-start justify-between mb-3">
                    <div class="w-10 h-10 rounded-xl bg-slate-50 border border-slate-100 flex items-center justify-center text-slate-400 group-hover:text-[#334EAC] group-hover:border-slate-200 group-hover:bg-white group-hover:scale-110 transition-all duration-300">
                      <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><polyline points="22 7 13.5 15.5 8.5 10.5 2 17"/><polyline points="16 7 22 7 22 13"/></svg>
                    </div>
                    <!-- Animated Check -->
                    <div class="check-icon w-6 h-6 rounded-full bg-[#334EAC] text-white flex items-center justify-center scale-0 transition-transform duration-300">
                      <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"><polyline points="20 6 9 17 4 12"/></svg>
                    </div>
                  </div>
                  <h4 class="text-[14px] font-extrabold text-[#081F5C] mb-1">Exam Prediction</h4>
                  <p class="text-[12px] font-medium text-slate-500 leading-relaxed max-w-[90%]">Forecasts potential upcoming test topics by analyzing past historical patterns.</p>
                </label>

              </div>
            </div>
          </div>
        </div>
      </div>

      <!-- Right Panel / Preview & Actions (w-35%) -->
      <div class="w-full xl:w-[35%] shrink-0 space-y-6 min-w-0">
        
        <!-- 5. Selected AI Capabilities Panel -->
        <div class="bg-gradient-to-b from-white to-[#EDF1F6]/50 rounded-[2rem] p-8 shadow-[0_4px_24px_rgba(0,0,0,0.02)] border border-slate-100/80">
          <div class="flex items-center gap-3 mb-8">
            <div class="w-10 h-10 rounded-[1rem] bg-[#334EAC] flex items-center justify-center text-white shadow-sm">
              <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M14.5 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V7.5L14.5 2z"/><polyline points="14 2 14 8 20 8"/><path d="M12 12v6"/><path d="M8 15h8"/></svg>
            </div>
            <div>
              <h3 class="text-[16px] font-extrabold text-[#081F5C]">Selected AI Capabilities</h3>
              <p class="text-[12px] font-bold text-slate-400">Live preview</p>
            </div>
          </div>
          
          <div class="space-y-4 mb-8">
            
            <div class="flex items-center justify-between p-4 bg-white rounded-2xl border border-slate-100 shadow-sm hover:border-[#7096D1]/30 transition-colors">
              <div class="flex items-center gap-3">
                <div class="w-8 h-8 rounded-lg bg-[#F7F2EB] flex items-center justify-center text-amber-600">
                  <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><rect width="8" height="4" x="8" y="2" rx="1" ry="1"/><path d="M16 4h2a2 2 0 0 1 2 2v14a2 2 0 0 1-2 2H6a2 2 0 0 1-2-2V6a2 2 0 0 1 2-2h2"/><path d="m9 14 2 2 4-4"/></svg>
                </div>
                <span class="text-[13px] font-extrabold text-[#081F5C]">Active Modules</span>
              </div>
              <span class="text-[14px] font-extrabold text-[#334EAC]">2 / 4</span>
            </div>

            <div class="flex items-center justify-between p-4 bg-white rounded-2xl border border-slate-100 shadow-sm hover:border-[#7096D1]/30 transition-colors">
              <div class="flex items-center gap-3">
                <div class="w-8 h-8 rounded-lg bg-[#EDF1F6] flex items-center justify-center text-[#334EAC]">
                  <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"/><polyline points="12 6 12 12 16 14"/></svg>
                </div>
                <span class="text-[13px] font-extrabold text-[#081F5C]">Est. Time</span>
              </div>
              <span class="text-[13px] font-extrabold text-slate-600">~1m 45s</span>
            </div>

            <div class="flex items-center justify-between p-4 bg-white rounded-2xl border border-slate-100 shadow-sm hover:border-[#7096D1]/30 transition-colors">
              <div class="flex items-center gap-3">
                <div class="w-8 h-8 rounded-lg bg-emerald-50 flex items-center justify-center text-emerald-600">
                  <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M12 22c5.523 0 10-4.477 10-10S17.523 2 12 2 2 6.477 2 12s4.477 10 10 10z"/><path d="m9 12 2 2 4-4"/></svg>
                </div>
                <span class="text-[13px] font-extrabold text-[#081F5C]">Confidence</span>
              </div>
              <span class="text-[13px] font-extrabold text-emerald-600">High (94%)</span>
            </div>

          </div>

          <div class="p-5 bg-gradient-to-br from-[#081F5C] to-[#334EAC] rounded-2xl relative overflow-hidden shadow-lg">
            <div class="absolute top-0 right-0 w-24 h-24 bg-white/10 blur-[20px] rounded-full"></div>
            <h4 class="text-[12px] font-extrabold text-[#BAD6EB] uppercase tracking-widest mb-2 relative z-10 flex items-center gap-1.5">
              <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"><path d="m12 3-1.912 5.813a2 2 0 0 1-1.275 1.275L3 12l5.813 1.912a2 2 0 0 1 1.275 1.275L12 21l1.912-5.813a2 2 0 0 1 1.275-1.275L21 12l-5.813-1.912a2 2 0 0 1-1.275-1.275L12 3Z"/></svg>
              Recommendation
            </h4>
            <p class="text-[13px] font-medium text-white leading-relaxed relative z-10">
              For comprehensive OSN prep, we highly recommend enabling <strong class="font-extrabold text-[#F7F2EB]">Exam Prediction</strong> to discover recurring patterns.
            </p>
          </div>
        </div>

        <!-- 6. Action Buttons -->
        <div class="bg-white rounded-[2rem] p-6 md:p-8 shadow-[0_4px_24px_rgba(0,0,0,0.02)] border border-slate-100/80 flex flex-col gap-3">
          <RouterLink to="/pelajar/ai-analyzer" class="w-full py-4 bg-[#334EAC] hover:bg-[#081F5C] text-white rounded-[1.25rem] font-extrabold text-[15px] transition-all shadow-[0_4px_15px_rgba(51,78,172,0.15)] active:scale-95 flex items-center justify-center gap-2">
            <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"><path d="m12 3-1.912 5.813a2 2 0 0 1-1.275 1.275L3 12l5.813 1.912a2 2 0 0 1 1.275 1.275L12 21l1.912-5.813a2 2 0 0 1 1.275-1.275L21 12l-5.813-1.912a2 2 0 0 1-1.275-1.275L12 3Z"/></svg>
            Start AI Analysis
          </RouterLink>
          
          <div class="flex gap-3">
            <button @click.prevent class="flex-1 py-3.5 bg-white border border-slate-200 hover:border-[#334EAC] text-slate-600 hover:text-[#334EAC] rounded-[1.25rem] font-extrabold text-[14px] transition-colors active:scale-95">
              Save Draft
            </button>
            <RouterLink to="/pelajar/ai-analyzer" class="flex-1 py-3.5 bg-slate-50 border border-transparent hover:bg-slate-100 text-slate-500 hover:text-[#081F5C] rounded-[1.25rem] font-extrabold text-[14px] transition-colors active:scale-95 text-center">
              Cancel
            </RouterLink>
          </div>
        </div>

      </div>
    </div>
  </div>
</template>

<script setup>
import { RouterLink } from 'vue-router'
</script>
