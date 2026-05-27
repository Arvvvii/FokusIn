<template>
  <div class="space-y-8 animate-in fade-in duration-500">
    
    <!-- Back Navigation -->
    <div class="mb-6 flex items-center gap-2">
      <RouterLink
        to="/pelajar/ai-analyzer"
        class="text-sm font-bold text-slate-400 hover:text-[#334EAC] transition-colors flex items-center gap-1 w-fit bg-white/50 px-3 py-1.5 rounded-lg border border-slate-200/50"
      >
        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="m15 18-6-6 6-6"></path></svg>
        Kembali ke Analisis AI
      </RouterLink>
    </div>

    <!-- 1. HEADER SECTION -->
    <div class="bg-white rounded-3xl p-7 md:p-8 shadow-sm border border-slate-200 relative overflow-hidden mb-8">
      <div class="relative z-10 flex flex-col md:flex-row gap-6 justify-between items-start md:items-center">
        <div>
          <h1 class="text-3xl md:text-4xl font-extrabold text-slate-900 tracking-tight leading-tight">Buat Analisis AI Baru</h1>
          <p class="text-[15px] text-slate-600 font-medium mt-2 max-w-xl leading-relaxed">
            Unggah dokumenmu dan konfigurasikan mesin AI untuk menghasilkan wawasan akademik, prediksi topik, dan jalur belajar personal.
          </p>
        </div>
      </div>
    </div>

    <div class="flex flex-col xl:flex-row gap-8 min-w-0">
      
      <!-- Left / Main Form (w-65%) -->
      <div class="w-full xl:w-[65%] space-y-8 min-w-0">
        
        <!-- 3. Document Input Section -->
        <div class="bg-white rounded-3xl p-6 md:p-10 shadow-sm border border-slate-200 w-full overflow-hidden transition-all duration-300 ease-out hover:shadow-md group/card">
          <h3 class="text-[17px] font-bold text-slate-900 mb-5 flex items-center gap-3 tracking-tight">
            <span class="w-8 h-8 rounded-full bg-[#EDF1F6] flex items-center justify-center text-[#334EAC]"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M14.5 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V7.5L14.5 2z"/><polyline points="14 2 14 8 20 8"/></svg></span>
            Dokumen Sumber
          </h3>
          
          <div class="relative flex flex-col items-center justify-center p-12 border-[2px] border-dashed border-slate-200 rounded-3xl bg-slate-50/50 hover:bg-[#F7F2EB]/50 hover:border-[#7096D1] transition-all cursor-pointer group">
            <div class="w-16 h-16 rounded-2xl bg-white shadow-sm border border-slate-100 flex items-center justify-center text-[#334EAC] mb-5 group-hover:-translate-y-1 transition-transform">
              <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"/><polyline points="17 8 12 3 7 8"/><line x1="12" x2="12" y1="3" y2="15"/></svg>
            </div>
            <h4 class="text-[16px] font-bold text-slate-900 text-center mb-1 tracking-tight">Klik atau tarik file untuk mengunggah</h4>
            <p class="text-[13px] font-medium text-slate-400 text-center mb-6">Mendukung PDF, DOCX, PPT, dan MD</p>
            
            <button @click.prevent class="px-6 py-2.5 bg-white border border-slate-200 rounded-xl text-slate-900 font-bold text-[13px] hover:border-[#334EAC] transition-colors shadow-sm">Pilih File</button>
          </div>
        </div>

        <!-- 4. Analysis Configuration -->
        <div class="bg-white rounded-3xl shadow-sm border border-slate-200 w-full overflow-hidden relative transition-all duration-300 ease-out hover:shadow-md group/card">
          <!-- Subtle top gradient line -->
          <div class="absolute top-0 left-0 w-full h-1.5 bg-gradient-to-r from-[#334EAC] via-[#7096D1] to-[#BAD6EB]"></div>
          
          <div class="p-6 md:p-10">
            <!-- New Premium Header -->
            <div class="flex items-start justify-between mb-8">
              <div>
                <h3 class="text-[19px] font-bold text-slate-900 mb-2 flex items-center gap-3 tracking-tight">
                  Konfigurasi Analisis AI
                  <span class="px-2.5 py-1 bg-[#EDF1F6] text-[#334EAC] text-[10px] font-bold rounded-lg uppercase tracking-widest flex items-center gap-1">
                    <svg xmlns="http://www.w3.org/2000/svg" width="10" height="10" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"><path d="m12 3-1.912 5.813a2 2 0 0 1-1.275 1.275L3 12l5.813 1.912a2 2 0 0 1 1.275 1.275L12 21l1.912-5.813a2 2 0 0 1 1.275-1.275L21 12l-5.813-1.912a2 2 0 0 1-1.275-1.275L12 3Z"/></svg>
                    Pro
                  </span>
                </h3>
                <p class="text-[14px] font-medium text-slate-500 max-w-lg leading-relaxed">
                  Sesuaikan modul AI yang digunakan untuk menganalisis materimu.
                </p>
              </div>
              <div class="hidden sm:flex w-12 h-12 rounded-2xl bg-slate-50 border border-slate-100 items-center justify-center text-slate-300">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M12 2v20"/><path d="M17 5H9.5a3.5 3.5 0 0 0 0 7h5a3.5 3.5 0 0 1 0 7H6"/></svg>
              </div>
            </div>

            <!-- Existing Selects -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-10">
              <div class="space-y-3">
                <label class="text-[12px] font-extrabold text-slate-400 uppercase tracking-widest ml-1">Tipe Analisis</label>
                <div class="relative">
                  <select class="w-full px-5 py-3.5 bg-slate-50 hover:bg-slate-100/50 border border-slate-200 rounded-2xl text-[14px] font-bold text-slate-900 focus:outline-none focus:border-[#7096D1] focus:ring-4 focus:ring-[#7096D1]/10 transition-all appearance-none cursor-pointer">
                    <option>Analisis Ujian</option>
                    <option>Analisis Riset</option>
                    <option>Pola Belajar</option>
                  </select>
                  <div class="absolute inset-y-0 right-0 pr-4 flex items-center pointer-events-none text-slate-400">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"><path d="m6 9 6 6 6-6"/></svg>
                  </div>
                </div>
              </div>
              <div class="space-y-3">
                <label class="text-[12px] font-extrabold text-slate-400 uppercase tracking-widest ml-1">Kategori Mata Kuliah</label>
                <div class="relative">
                  <select class="w-full px-5 py-3.5 bg-slate-50 hover:bg-slate-100/50 border border-slate-200 rounded-2xl text-[14px] font-bold text-slate-900 focus:outline-none focus:border-[#7096D1] focus:ring-4 focus:ring-[#7096D1]/10 transition-all appearance-none cursor-pointer">
                    <option>Fisika</option>
                    <option>Ilmu Komputer</option>
                    <option>Matematika</option>
                  </select>
                  <div class="absolute inset-y-0 right-0 pr-4 flex items-center pointer-events-none text-slate-400">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"><path d="m6 9 6 6 6-6"/></svg>
                  </div>
                </div>
              </div>
              <div class="space-y-3 md:col-span-2">
                <label class="text-[12px] font-extrabold text-slate-400 uppercase tracking-widest ml-1">Target Tingkat Kesulitan</label>
                <div class="flex flex-wrap gap-3">
                  <label class="relative cursor-pointer">
                    <input type="radio" name="difficulty" class="peer sr-only">
                    <div class="px-5 py-2.5 bg-white border border-slate-200 rounded-xl text-[13px] font-bold text-slate-500 peer-checked:border-[#334EAC] peer-checked:bg-[#EDF1F6] peer-checked:text-[#334EAC] transition-all">Dasar</div>
                  </label>
                  <label class="relative cursor-pointer">
                    <input type="radio" name="difficulty" class="peer sr-only" checked>
                    <div class="px-5 py-2.5 bg-white border border-slate-200 rounded-xl text-[13px] font-bold text-slate-500 peer-checked:border-[#334EAC] peer-checked:bg-[#EDF1F6] peer-checked:text-[#334EAC] transition-all">Menengah</div>
                  </label>
                  <label class="relative cursor-pointer">
                    <input type="radio" name="difficulty" class="peer sr-only">
                    <div class="px-5 py-2.5 bg-white border border-slate-200 rounded-xl text-[13px] font-bold text-slate-500 peer-checked:border-[#334EAC] peer-checked:bg-[#EDF1F6] peer-checked:text-[#334EAC] transition-all">Lanjut (OSN)</div>
                  </label>
                </div>
              </div>
            </div>

            <!-- AI Focus Modules Redesign -->
            <div class="pt-6 border-t border-slate-100">
              <label class="text-[12px] font-extrabold text-slate-400 uppercase tracking-widest block mb-4 ml-1">Modul AI Aktif</label>
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
                  <h4 class="text-[14px] font-extrabold text-[#081F5C] mb-1">Deteksi Topik</h4>
                  <p class="text-[12px] font-medium text-slate-500 leading-relaxed max-w-[90%]">Memindai struktur dokumen untuk memetakan pertanyaan terhadap standar kurikulum nasional.</p>
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
                  <h4 class="text-[14px] font-extrabold text-[#081F5C] mb-1">Analisis Kelemahan</h4>
                  <p class="text-[12px] font-medium text-slate-500 leading-relaxed max-w-[90%]">Mengidentifikasi pola rumit dan area di mana kesalahan logika sering terjadi.</p>
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
                  <h4 class="text-[14px] font-extrabold text-[#081F5C] mb-1">Mesin Rekomendasi</h4>
                  <p class="text-[12px] font-medium text-slate-500 leading-relaxed max-w-[90%]">Menghasilkan materi belajar personal dan mencocokkanmu dengan tutor yang sesuai secara otomatis.</p>
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
                  <h4 class="text-[14px] font-extrabold text-[#081F5C] mb-1">Prediksi Ujian</h4>
                  <p class="text-[12px] font-medium text-slate-500 leading-relaxed max-w-[90%]">Memprediksi potensi topik ujian mendatang dengan menganalisis pola historis.</p>
                </label>

              </div>
            </div>
          </div>
        </div>
      </div>

      <!-- Right Panel / Preview & Actions (w-35%) -->
      <div class="w-full xl:w-[35%] shrink-0 space-y-6 min-w-0">
        
        <!-- 5. Selected AI Capabilities Panel -->
        <div class="bg-gradient-to-b from-white to-[#EDF1F6]/50 rounded-3xl p-8 shadow-[0_10px_40px_rgba(15,23,42,0.06)] border border-slate-100 transition-all duration-300 ease-out hover:shadow-xl group/card">
          <div class="flex items-center gap-3 mb-8">
            <div class="w-10 h-10 rounded-[1rem] bg-[#334EAC] flex items-center justify-center text-white shadow-sm">
              <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M14.5 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V7.5L14.5 2z"/><polyline points="14 2 14 8 20 8"/><path d="M12 12v6"/><path d="M8 15h8"/></svg>
            </div>
            <div>
              <h3 class="text-[16px] font-bold text-slate-900 tracking-tight">Kemampuan AI Terpilih</h3>
              <p class="text-[12px] font-bold text-slate-400">Pratinjau langsung</p>
            </div>
          </div>
          
          <div class="space-y-4 mb-8">
            
            <div class="flex items-center justify-between p-4 bg-white rounded-2xl border border-slate-100 shadow-sm hover:border-[#7096D1]/30 transition-colors">
              <div class="flex items-center gap-4">
                <div class="w-8 h-8 rounded-lg bg-[#F7F2EB] flex items-center justify-center text-amber-600">
                  <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><rect width="8" height="4" x="8" y="2" rx="1" ry="1"/><path d="M16 4h2a2 2 0 0 1 2 2v14a2 2 0 0 1-2 2H6a2 2 0 0 1-2-2V6a2 2 0 0 1 2-2h2"/><path d="m9 14 2 2 4-4"/></svg>
                </div>
                <span class="text-[13px] font-extrabold text-[#081F5C]">Modul Aktif</span>
              </div>
              <span class="text-[14px] font-extrabold text-[#334EAC]">2 / 4</span>
            </div>

            <div class="flex items-center justify-between p-4 bg-white rounded-2xl border border-slate-100 shadow-sm hover:border-[#7096D1]/30 transition-colors">
              <div class="flex items-center gap-4">
                <div class="w-8 h-8 rounded-lg bg-[#EDF1F6] flex items-center justify-center text-[#334EAC]">
                  <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"/><polyline points="12 6 12 12 16 14"/></svg>
                </div>
                <span class="text-[13px] font-extrabold text-[#081F5C]">Estimasi Waktu</span>
              </div>
              <span class="text-[13px] font-extrabold text-slate-600">~1m 45s</span>
            </div>

            <div class="flex items-center justify-between p-4 bg-white rounded-2xl border border-slate-100 shadow-sm hover:border-[#7096D1]/30 transition-colors">
              <div class="flex items-center gap-4">
                <div class="w-8 h-8 rounded-lg bg-emerald-50 flex items-center justify-center text-emerald-600">
                  <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M12 22c5.523 0 10-4.477 10-10S17.523 2 12 2 2 6.477 2 12s4.477 10 10 10z"/><path d="m9 12 2 2 4-4"/></svg>
                </div>
                <span class="text-[13px] font-extrabold text-[#081F5C]">Tingkat Kepercayaan</span>
              </div>
              <span class="text-[13px] font-extrabold text-emerald-600">Tinggi (94%)</span>
            </div>

          </div>

          <div class="p-5 bg-gradient-to-br from-[#081F5C] to-[#334EAC] rounded-2xl relative overflow-hidden shadow-lg">
            <div class="absolute top-0 right-0 w-24 h-24 bg-white/10 blur-[20px] rounded-full"></div>
            <h4 class="text-[12px] font-extrabold text-[#BAD6EB] uppercase tracking-widest mb-2 relative z-10 flex items-center gap-1.5">
              <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"><path d="m12 3-1.912 5.813a2 2 0 0 1-1.275 1.275L3 12l5.813 1.912a2 2 0 0 1 1.275 1.275L12 21l1.912-5.813a2 2 0 0 1 1.275-1.275L21 12l-5.813-1.912a2 2 0 0 1-1.275-1.275L12 3Z"/></svg>
              Rekomendasi
            </h4>
            <p class="text-[13px] font-medium text-white leading-relaxed relative z-10">
              Untuk persiapan OSN yang komprehensif, kami sangat merekomendasikan mengaktifkan <strong class="font-extrabold text-[#F7F2EB]">Prediksi Ujian</strong> untuk menemukan pola yang sering muncul.
            </p>
          </div>
        </div>

        <!-- 6. Action Buttons -->
        <div class="bg-white rounded-3xl p-6 md:p-8 shadow-sm border border-slate-200 flex flex-col gap-3 transition-all duration-300 ease-out hover:shadow-md group/card">
          <RouterLink to="/pelajar/ai-analyzer" class="w-full py-4 bg-[#334EAC] hover:bg-[#081F5C] text-white rounded-2xl font-bold text-[15px] transition-all shadow-[0_4px_15px_rgba(51,78,172,0.15)] active:scale-95 flex items-center justify-center gap-2">
            <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"><path d="m12 3-1.912 5.813a2 2 0 0 1-1.275 1.275L3 12l5.813 1.912a2 2 0 0 1 1.275 1.275L12 21l1.912-5.813a2 2 0 0 1 1.275-1.275L21 12l-5.813-1.912a2 2 0 0 1-1.275-1.275L12 3Z"/></svg>
            Mulai Analisis AI
          </RouterLink>
          
          <div class="flex gap-3">
            <button @click.prevent class="flex-1 py-3.5 bg-white border border-slate-200 hover:border-[#334EAC] text-slate-600 hover:text-[#334EAC] rounded-2xl font-bold text-[14px] transition-colors active:scale-95">
              Simpan Draf
            </button>
            <RouterLink to="/pelajar/ai-analyzer" class="flex-1 py-3.5 bg-slate-50 border border-transparent hover:bg-slate-100 text-slate-500 hover:text-slate-900 rounded-2xl font-bold text-[14px] transition-colors active:scale-95 text-center">
              Batal
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
