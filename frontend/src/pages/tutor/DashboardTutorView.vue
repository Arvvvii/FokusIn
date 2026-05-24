<template>
  <div class="relative min-h-screen pb-12 overflow-hidden bg-[#F7F2EB]">
    <div class="relative z-10 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8 space-y-8">
      
      <div class="grid grid-cols-1 lg:grid-cols-12 gap-8">
        
        <!-- LEFT/CENTER CONTENT -->
        <div class="lg:col-span-8 space-y-8">
          
          <!-- 1. HERO SECTION -->
          <div class="bg-white/80 backdrop-blur-xl rounded-3xl p-7 md:p-8 shadow-[0_10px_40px_rgba(15,23,42,0.06)] border border-slate-100 relative overflow-hidden group">
            <div class="absolute right-0 top-0 w-[40%] h-full bg-gradient-to-l from-[#EDF1F6]/80 to-transparent pointer-events-none"></div>
            
            <div class="relative z-10 flex flex-col md:flex-row md:items-center justify-between gap-6">
              <div>
                <div class="flex flex-wrap items-center gap-2 mb-3">
                  <span class="px-3 py-1 bg-emerald-50 text-emerald-600 rounded-full text-[11px] font-extrabold uppercase tracking-widest border border-emerald-100 flex items-center gap-1.5 shadow-sm">
                    <span class="w-1.5 h-1.5 rounded-full bg-emerald-500 animate-pulse"></span>
                    Mentor Aktif
                  </span>
                  <span class="px-3 py-1 bg-[#334EAC]/10 text-[#334EAC] rounded-full text-[11px] font-extrabold uppercase tracking-widest border border-[#334EAC]/10 shadow-sm">
                    Level 8
                  </span>
                  <span class="px-3 py-1 bg-amber-50 text-amber-600 rounded-full text-[11px] font-extrabold uppercase tracking-widest border border-amber-100 flex items-center gap-1 shadow-sm">
                    <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" viewBox="0 0 24 24" fill="currentColor" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"/></svg>
                    Expert Mentor
                  </span>
                  <span class="px-3 py-1 bg-indigo-50 text-indigo-600 rounded-full text-[11px] font-extrabold uppercase tracking-widest border border-indigo-100 flex items-center gap-1 shadow-sm">
                    <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="m12 3-1.912 5.813a2 2 0 0 1-1.275 1.275L3 12l5.813 1.912a2 2 0 0 1 1.275 1.275L12 21l1.912-5.813a2 2 0 0 1 1.275-1.275L21 12l-5.813-1.912a2 2 0 0 1-1.275-1.275L12 3Z"/></svg>
                    AI Validator
                  </span>
                </div>
                <h1 class="text-2xl md:text-3xl font-bold text-slate-900 mb-2 tracking-tight">Selamat pagi, Dr. Sarah</h1>
                <p class="text-[14px] text-slate-500 font-medium max-w-lg leading-relaxed">
                  Ada <span class="text-[#334EAC] font-bold">4 sesi mentoring</span> dan <span class="text-amber-500 font-bold">12 jawaban pending</span> yang menunggu verifikasi Anda hari ini.
                </p>
              </div>

              <div class="flex shrink-0 gap-3">
                 <RouterLink to="/pelajar/forum" class="px-5 py-3.5 bg-white border border-slate-200 hover:border-[#7096D1] hover:text-[#334EAC] text-slate-600 rounded-xl font-extrabold text-[13px] transition-all shadow-sm active:scale-95 flex items-center gap-2">
                    Cek Forum
                 </RouterLink>
                 <RouterLink to="/tutor/mentoring" class="px-5 py-3.5 bg-[#334EAC] hover:bg-[#081F5C] text-white rounded-xl font-extrabold text-[13px] transition-all shadow-[0_8px_20px_rgba(51,78,172,0.2)] hover:shadow-[0_8px_25px_rgba(8,31,92,0.3)] hover:-translate-y-0.5 active:scale-95 flex items-center gap-2">
                    Kelola Jadwal
                 </RouterLink>
              </div>
            </div>
          </div>

          <!-- 2. ANALYTICS SECTION -->
          <div class="grid grid-cols-2 md:grid-cols-3 gap-4">
            <!-- Analytics Card 1 -->
            <RouterLink to="/tutor/mentoring" class="block bg-white/80 backdrop-blur-xl rounded-3xl p-5 shadow-[0_10px_40px_rgba(15,23,42,0.06)] border border-slate-100 hover:-translate-y-1 hover:shadow-xl transition-all duration-300 ease-out group active:scale-[0.98]">
              <div class="flex items-center justify-between mb-4">
                <div class="w-10 h-10 rounded-xl bg-indigo-50 text-indigo-500 flex items-center justify-center group-hover:scale-110 transition-transform">
                   <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M16 21v-2a4 4 0 0 0-4-4H6a4 4 0 0 0-4 4v2"/><circle cx="9" cy="7" r="4"/><path d="M22 21v-2a4 4 0 0 0-3-3.87"/><path d="M16 3.13a4 4 0 0 1 0 7.75"/></svg>
                </div>
                <span class="text-[12px] font-extrabold text-emerald-500 flex items-center gap-1 bg-emerald-50 px-2 py-0.5 rounded-lg border border-emerald-100">+12%</span>
              </div>
              <p class="text-[12px] font-bold text-slate-400 uppercase tracking-wider mb-1">Total Mentoring</p>
              <h3 class="text-2xl font-bold text-slate-900 tracking-tight">148</h3>
            </RouterLink>
            
            <!-- Analytics Card 2 -->
            <RouterLink to="/pelajar/forum" class="block bg-white/80 backdrop-blur-xl rounded-3xl p-5 shadow-[0_10px_40px_rgba(15,23,42,0.06)] border border-slate-100 hover:-translate-y-1 hover:shadow-xl transition-all duration-300 ease-out group active:scale-[0.98]">
              <div class="flex items-center justify-between mb-4">
                <div class="w-10 h-10 rounded-xl bg-emerald-50 text-emerald-500 flex items-center justify-center group-hover:scale-110 transition-transform">
                   <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"/><polyline points="22 4 12 14.01 9 11.01"/></svg>
                </div>
                <span class="text-[12px] font-extrabold text-emerald-500 flex items-center gap-1 bg-emerald-50 px-2 py-0.5 rounded-lg border border-emerald-100">+5%</span>
              </div>
              <p class="text-[12px] font-bold text-slate-400 uppercase tracking-wider mb-1">Jwb Diverifikasi</p>
              <h3 class="text-2xl font-bold text-slate-900 tracking-tight">324</h3>
            </RouterLink>

            <!-- Analytics Card 3 -->
            <RouterLink to="/tutor/profile" class="block bg-white/80 backdrop-blur-xl rounded-3xl p-5 shadow-[0_10px_40px_rgba(15,23,42,0.06)] border border-slate-100 hover:-translate-y-1 hover:shadow-xl transition-all duration-300 ease-out group active:scale-[0.98]">
              <div class="flex items-center justify-between mb-4">
                <div class="w-10 h-10 rounded-xl bg-amber-50 text-amber-500 flex items-center justify-center group-hover:scale-110 transition-transform">
                   <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"/></svg>
                </div>
                <span class="text-[12px] font-extrabold text-slate-400 flex items-center gap-1 bg-slate-50 px-2 py-0.5 rounded-lg border border-slate-200">Tetap</span>
              </div>
              <p class="text-[12px] font-bold text-slate-400 uppercase tracking-wider mb-1">Rating Mentor</p>
              <h3 class="text-2xl font-bold text-slate-900 tracking-tight">4.9<span class="text-sm text-slate-400 font-medium ml-1">/ 5.0</span></h3>
            </RouterLink>

            <!-- Analytics Card 4 -->
            <div class="block bg-white/80 backdrop-blur-xl rounded-3xl p-5 shadow-[0_10px_40px_rgba(15,23,42,0.06)] border border-slate-100">
              <div class="flex items-center justify-between mb-4">
                <div class="w-10 h-10 rounded-xl bg-[#EDF1F6] text-[#334EAC] flex items-center justify-center">
                   <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"/><circle cx="9" cy="7" r="4"/><path d="M23 21v-2a4 4 0 0 0-3-3.87"/><path d="M16 3.13a4 4 0 0 1 0 7.75"/></svg>
                </div>
              </div>
              <p class="text-[12px] font-bold text-slate-400 uppercase tracking-wider mb-1">Mahasiswa Bimbingan</p>
              <h3 class="text-2xl font-bold text-slate-900 tracking-tight">86</h3>
            </div>

            <!-- Analytics Card 5 -->
            <div class="block bg-white/80 backdrop-blur-xl rounded-3xl p-5 shadow-[0_10px_40px_rgba(15,23,42,0.06)] border border-slate-100">
              <div class="flex items-center justify-between mb-4">
                <div class="w-10 h-10 rounded-xl bg-sky-50 text-sky-500 flex items-center justify-center">
                   <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"/><polyline points="12 6 12 12 16 14"/></svg>
                </div>
              </div>
              <p class="text-[12px] font-bold text-slate-400 uppercase tracking-wider mb-1">Jam Mentoring</p>
              <h3 class="text-2xl font-bold text-slate-900 tracking-tight">420<span class="text-sm text-slate-400 font-medium ml-1">jam</span></h3>
            </div>

            <!-- Analytics Card 6 -->
            <div class="block bg-white/80 backdrop-blur-xl rounded-3xl p-5 shadow-[0_10px_40px_rgba(15,23,42,0.06)] border border-slate-100">
              <div class="flex items-center justify-between mb-4">
                <div class="w-10 h-10 rounded-xl bg-rose-50 text-rose-500 flex items-center justify-center">
                   <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M20.84 4.61a5.5 5.5 0 0 0-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 0 0-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 0 0 0-7.78z"/></svg>
                </div>
              </div>
              <p class="text-[12px] font-bold text-slate-400 uppercase tracking-wider mb-1">Tingkat Kepuasan</p>
              <h3 class="text-2xl font-bold text-slate-900 tracking-tight">98%</h3>
            </div>
          </div>

          <!-- 3. ONBOARDING / ROLE CAPABILITIES CARD -->
          <div class="bg-gradient-to-br from-white/80 to-[#F7F2EB]/50 backdrop-blur-xl rounded-3xl p-7 shadow-[0_10px_40px_rgba(15,23,42,0.06)] border border-slate-100 relative overflow-hidden">
            <div class="absolute right-0 top-0 w-[50%] h-full bg-[url('data:image/svg+xml;base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHdpZHRoPSIyNCIgaGVpZ2h0PSIyNCI+CjxyZWN0IHdpZHRoPSIyNCIgaGVpZ2h0PSIyNCIgZmlsbD0ibm9uZSIvPgo8Y2lyY2xlIGN4PSIyIiBjeT0iMiIgcj0iMSIgZmlsbD0icmdiYSgzMywgNzgsIDE3MiwgMC4wNSkiLz4KPC9zdmc+')] opacity-60 mix-blend-multiply pointer-events-none"></div>
            
            <h3 class="text-[18px] font-bold text-slate-900 mb-6 flex items-center gap-3 relative z-10 tracking-tight">
               <span class="w-10 h-10 rounded-xl bg-gradient-to-br from-[#334EAC] to-[#081F5C] flex items-center justify-center text-white shadow-lg">
                 <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"/></svg>
               </span>
               Apa yang Bisa Kamu Lakukan Sebagai Tutor?
            </h3>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-5 gap-4 relative z-10">
              
              <!-- Card 1 -->
              <RouterLink to="/tutor/verify-answer" class="flex flex-col p-4 rounded-2xl bg-white/50 border border-slate-100 shadow-sm hover:shadow-xl hover:-translate-y-1 hover:border-[#7096D1]/50 transition-all duration-300 ease-out group active:scale-[0.98]">
                 <div class="w-10 h-10 rounded-xl bg-emerald-50 text-emerald-500 flex items-center justify-center mb-4 group-hover:scale-110 transition-transform">
                   <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"/><polyline points="22 4 12 14.01 9 11.01"/></svg>
                 </div>
                 <h4 class="text-[13px] font-extrabold text-[#081F5C] mb-1">Verifikasi Jawaban</h4>
                 <p class="text-[11px] font-medium text-slate-500 leading-tight">Jaga kualitas akademik forum mahasiswa.</p>
              </RouterLink>

              <!-- Card 2 -->
              <RouterLink to="/tutor/mentoring" class="flex flex-col p-4 rounded-2xl bg-white/50 border border-slate-100 shadow-sm hover:shadow-xl hover:-translate-y-1 hover:border-[#7096D1]/50 transition-all duration-300 ease-out group active:scale-[0.98]">
                 <div class="w-10 h-10 rounded-xl bg-indigo-50 text-indigo-500 flex items-center justify-center mb-4 group-hover:scale-110 transition-transform">
                   <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><rect width="18" height="18" x="3" y="4" rx="2" ry="2"/><line x1="16" x2="16" y1="2" y2="6"/><line x1="8" x2="8" y1="2" y2="6"/><line x1="3" x2="21" y1="10" y2="10"/></svg>
                 </div>
                 <h4 class="text-[13px] font-extrabold text-[#081F5C] mb-1">Kelola Mentoring</h4>
                 <p class="text-[11px] font-medium text-slate-500 leading-tight">Atur jadwal bimbingan & request siswa.</p>
              </RouterLink>

              <!-- Card 3 -->
              <RouterLink to="/pelajar/materials" class="flex flex-col p-4 rounded-2xl bg-white/50 border border-slate-100 shadow-sm hover:shadow-xl hover:-translate-y-1 hover:border-[#7096D1]/50 transition-all duration-300 ease-out group active:scale-[0.98]">
                 <div class="w-10 h-10 rounded-xl bg-amber-50 text-amber-500 flex items-center justify-center mb-4 group-hover:scale-110 transition-transform">
                   <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M4 19.5v-15A2.5 2.5 0 0 1 6.5 2H20v20H6.5a2.5 2.5 0 0 1 0-5H20"/></svg>
                 </div>
                 <h4 class="text-[13px] font-extrabold text-[#081F5C] mb-1">Bagikan Materi</h4>
                 <p class="text-[11px] font-medium text-slate-500 leading-tight">Unggah arsip soal & panduan ahli.</p>
              </RouterLink>

              <!-- Card 4 -->
              <RouterLink to="/tutor/profile" class="flex flex-col p-4 rounded-2xl bg-white/50 border border-slate-100 shadow-sm hover:shadow-xl hover:-translate-y-1 hover:border-[#7096D1]/50 transition-all duration-300 ease-out group active:scale-[0.98]">
                 <div class="w-10 h-10 rounded-xl bg-rose-50 text-rose-500 flex items-center justify-center mb-4 group-hover:scale-110 transition-transform">
                   <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M12 20h9"/><path d="M16.5 3.5a2.12 2.12 0 0 1 3 3L7 19l-4 1 1-4Z"/></svg>
                 </div>
                 <h4 class="text-[13px] font-extrabold text-[#081F5C] mb-1">Tingkatkan Reputasi</h4>
                 <p class="text-[11px] font-medium text-slate-500 leading-tight">Raih badge Expert & rating terbaik.</p>
              </RouterLink>

              <!-- Card 5 -->
              <RouterLink to="/pelajar/ai-analyzer" class="flex flex-col p-4 rounded-2xl bg-gradient-to-br from-[#081F5C] to-[#334EAC] border border-white/10 shadow-lg hover:shadow-xl hover:-translate-y-1 transition-all duration-300 ease-out group active:scale-[0.98]">
                 <div class="w-10 h-10 rounded-xl bg-white/10 text-white flex items-center justify-center mb-4 group-hover:scale-110 transition-transform">
                   <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="m12 3-1.912 5.813a2 2 0 0 1-1.275 1.275L3 12l5.813 1.912a2 2 0 0 1 1.275 1.275L12 21l1.912-5.813a2 2 0 0 1-1.275-1.275L21 12l-5.813-1.912a2 2 0 0 1-1.275-1.275L12 3Z"/></svg>
                 </div>
                 <h4 class="text-[13px] font-extrabold text-white mb-1">Validasi AI</h4>
                 <p class="text-[11px] font-medium text-[#BAD6EB] leading-tight">Analisa & koreksi hasil generasi AI.</p>
              </RouterLink>

            </div>
          </div>

          <!-- 4. RECENT ACTIVITY -->
          <div class="bg-white/80 backdrop-blur-xl rounded-3xl p-7 shadow-[0_10px_40px_rgba(15,23,42,0.06)] border border-slate-100">
            <h3 class="text-[16px] font-bold text-slate-900 mb-6 flex items-center gap-3 tracking-tight">
               <span class="w-8 h-8 rounded-lg bg-[#EDF1F6] flex items-center justify-center text-[#334EAC]">
                 <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M12 20h9"/><path d="M16.5 3.5a2.12 2.12 0 0 1 3 3L7 19l-4 1 1-4Z"/></svg>
               </span>
               Aktivitas Mahasiswa Terbaru
            </h3>
            
            <div class="relative pl-6 space-y-8 before:absolute before:inset-y-0 before:left-2.5 before:w-px before:bg-slate-200">
              
              <!-- Timeline Item 1 -->
              <div class="relative">
                <div class="absolute -left-[29px] w-5 h-5 rounded-full bg-emerald-50 border-2 border-emerald-500 flex items-center justify-center z-10">
                  <div class="w-1.5 h-1.5 rounded-full bg-emerald-500"></div>
                </div>
                <div class="flex items-center gap-2 mb-1">
                  <span class="text-[10px] font-extrabold text-white bg-emerald-500 px-2 py-0.5 rounded uppercase tracking-wider">JAWABAN BARU</span>
                  <p class="text-[12px] font-bold text-slate-400">10 menit lalu</p>
                </div>
                <p class="text-[13px] font-extrabold text-[#081F5C] mb-2">Budi Santoso menjawab diskusi "Optimasi Query SQL"</p>
                <RouterLink to="/pelajar/forum/1" class="inline-flex items-center gap-2 px-4 py-2 bg-slate-50 border border-slate-200 rounded-xl text-[12px] font-extrabold text-[#334EAC] hover:border-[#7096D1] hover:bg-white transition-colors cursor-pointer">
                  Verifikasi Jawaban
                  <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M5 12h14"/><path d="m12 5 7 7-7 7"/></svg>
                </RouterLink>
              </div>

              <!-- Timeline Item 2 -->
              <div class="relative">
                <div class="absolute -left-[29px] w-5 h-5 rounded-full bg-amber-50 border-2 border-amber-500 flex items-center justify-center z-10">
                  <div class="w-1.5 h-1.5 rounded-full bg-amber-500"></div>
                </div>
                <div class="flex items-center gap-2 mb-1">
                  <span class="text-[10px] font-extrabold text-white bg-amber-500 px-2 py-0.5 rounded uppercase tracking-wider">REQUEST MENTORING</span>
                  <p class="text-[12px] font-bold text-slate-400">1 jam lalu</p>
                </div>
                <p class="text-[13px] font-extrabold text-[#081F5C] mb-2">Andi Wijaya meminta sesi mentoring untuk "Struktur Data"</p>
                <RouterLink to="/tutor/mentoring" class="inline-flex items-center gap-2 px-4 py-2 bg-slate-50 border border-slate-200 rounded-xl text-[12px] font-extrabold text-slate-600 hover:text-[#334EAC] hover:border-[#7096D1] hover:bg-white transition-colors cursor-pointer">
                  Terima Request
                </RouterLink>
              </div>

              <!-- Timeline Item 3 (AI Recommendation) -->
              <div class="relative">
                <div class="absolute -left-[29px] w-5 h-5 rounded-full bg-indigo-50 border-2 border-indigo-500 flex items-center justify-center z-10">
                  <div class="w-1.5 h-1.5 rounded-full bg-indigo-500"></div>
                </div>
                <div class="flex items-center gap-2 mb-1">
                  <span class="text-[10px] font-extrabold text-white bg-indigo-500 px-2 py-0.5 rounded uppercase tracking-wider flex items-center gap-1">
                    <svg xmlns="http://www.w3.org/2000/svg" width="10" height="10" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"><path d="m12 3-1.912 5.813a2 2 0 0 1-1.275 1.275L3 12l5.813 1.912a2 2 0 0 1 1.275 1.275L12 21l1.912-5.813a2 2 0 0 1 1.275-1.275L21 12l-5.813-1.912a2 2 0 0 1-1.275-1.275L12 3Z"/></svg>
                    AI INSIGHT
                  </span>
                  <p class="text-[12px] font-bold text-slate-400">Hari ini, 08:00</p>
                </div>
                <p class="text-[13px] font-medium text-slate-600 bg-indigo-50/50 p-3 rounded-xl border border-indigo-100/50">
                  Mahasiswa di kelas Anda mengalami kesulitan pada topik <strong>"Pointer di C++"</strong>. Disarankan untuk membagikan materi tambahan atau membuka sesi diskusi terbuka.
                </p>
                <RouterLink to="/pelajar/materials" class="mt-3 inline-flex items-center gap-2 px-4 py-2 bg-[#334EAC] text-white rounded-xl text-[12px] font-extrabold hover:bg-[#081F5C] transition-colors cursor-pointer shadow-sm">
                  Upload Materi Tambahan
                </RouterLink>
              </div>

            </div>
          </div>

          <!-- 5. RECENT VERIFIED CONTRIBUTIONS -->
          <div class="bg-white/80 backdrop-blur-xl rounded-3xl p-7 shadow-[0_10px_40px_rgba(15,23,42,0.06)] border border-slate-100">
            <div class="flex items-center justify-between mb-6">
              <h3 class="text-[16px] font-bold text-slate-900 flex items-center gap-3 tracking-tight">
                 <span class="w-8 h-8 rounded-lg bg-emerald-50 flex items-center justify-center text-emerald-500">
                   <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"/><polyline points="22 4 12 14.01 9 11.01"/></svg>
                 </span>
                 Kontribusi Terverifikasi Terbaru
              </h3>
              <RouterLink to="/pelajar/forum" class="text-[12px] font-bold text-[#334EAC] hover:text-[#081F5C] transition-colors">Lihat Riwayat</RouterLink>
            </div>
            
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
              
              <!-- Contribution Card 1 -->
              <div class="p-5 bg-slate-50 border border-slate-100 rounded-2xl hover:border-[#7096D1]/30 transition-all cursor-pointer group">
                <div class="flex items-start justify-between mb-3">
                  <div class="flex items-center gap-2">
                    <span class="px-2 py-0.5 bg-emerald-100 text-emerald-600 rounded text-[10px] font-extrabold uppercase tracking-widest flex items-center gap-1">
                      <svg xmlns="http://www.w3.org/2000/svg" width="10" height="10" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"/><polyline points="22 4 12 14.01 9 11.01"/></svg>
                      Verified
                    </span>
                    <span class="px-2 py-0.5 bg-amber-100 text-amber-600 rounded text-[10px] font-extrabold uppercase tracking-widest flex items-center gap-1">
                      <svg xmlns="http://www.w3.org/2000/svg" width="10" height="10" viewBox="0 0 24 24" fill="currentColor" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"/></svg>
                      Best Answer
                    </span>
                  </div>
                  <div class="flex items-center gap-1 text-slate-400 group-hover:text-[#334EAC] transition-colors">
                    <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="m18 15-6-6-6 6"/></svg>
                    <span class="text-[12px] font-extrabold">24</span>
                  </div>
                </div>
                <h4 class="text-[14px] font-extrabold text-[#081F5C] mb-2 line-clamp-2">"Cara mengoptimalkan recursive function pada Python agar tidak mencapai recursion limit"</h4>
                <p class="text-[12px] font-medium text-slate-500 mb-4 line-clamp-2">Penjelasan terperinci mengenai teknik memoization dan iterasi alternatif menggunakan stack memory.</p>
                
                <div class="pt-3 border-t border-slate-200/60 flex items-center justify-between">
                  <div class="flex items-center gap-2">
                    <div class="w-6 h-6 rounded-full bg-indigo-100 text-indigo-600 flex items-center justify-center text-[8px] font-bold">AS</div>
                    <span class="text-[11px] font-bold text-slate-500">Andi S. (Mahasiswa)</span>
                  </div>
                  <span class="text-[10px] font-extrabold text-slate-400 bg-white border border-slate-200 px-2 py-0.5 rounded-lg">Algoritma</span>
                </div>
              </div>

              <!-- Contribution Card 2 -->
              <div class="p-5 bg-slate-50 border border-slate-100 rounded-2xl hover:border-[#7096D1]/30 transition-all cursor-pointer group">
                <div class="flex items-start justify-between mb-3">
                  <div class="flex items-center gap-2">
                    <span class="px-2 py-0.5 bg-emerald-100 text-emerald-600 rounded text-[10px] font-extrabold uppercase tracking-widest flex items-center gap-1">
                      <svg xmlns="http://www.w3.org/2000/svg" width="10" height="10" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"/><polyline points="22 4 12 14.01 9 11.01"/></svg>
                      Verified
                    </span>
                  </div>
                  <div class="flex items-center gap-1 text-slate-400 group-hover:text-[#334EAC] transition-colors">
                    <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="m18 15-6-6-6 6"/></svg>
                    <span class="text-[12px] font-extrabold">12</span>
                  </div>
                </div>
                <h4 class="text-[14px] font-extrabold text-[#081F5C] mb-2 line-clamp-2">"Penyebab memory leak pada aplikasi React Native dengan banyak instance flatlist"</h4>
                <p class="text-[12px] font-medium text-slate-500 mb-4 line-clamp-2">Analisis mendalam mengenai penguraian referensi memori pada list components.</p>
                
                <div class="pt-3 border-t border-slate-200/60 flex items-center justify-between">
                  <div class="flex items-center gap-2">
                    <div class="w-6 h-6 rounded-full bg-rose-100 text-rose-600 flex items-center justify-center text-[8px] font-bold">MK</div>
                    <span class="text-[11px] font-bold text-slate-500">M. Kevin (Mahasiswa)</span>
                  </div>
                  <span class="text-[10px] font-extrabold text-slate-400 bg-white border border-slate-200 px-2 py-0.5 rounded-lg">Mobile Dev</span>
                </div>
              </div>

            </div>
          </div>

        </div>

        <!-- RIGHT SIDEBAR -->
        <div class="lg:col-span-4 space-y-8">
          
          <!-- Schedule Overview -->
          <div class="bg-white/80 backdrop-blur-xl rounded-3xl p-6 shadow-[0_10px_40px_rgba(15,23,42,0.06)] border border-slate-100">
             <div class="flex items-center justify-between mb-5">
               <h3 class="text-[15px] font-bold text-slate-900 tracking-tight">Jadwal Hari Ini</h3>
               <RouterLink to="/tutor/mentoring" class="text-[12px] font-bold text-[#334EAC] hover:text-[#081F5C] transition-colors">Lihat Semua</RouterLink>
             </div>

             <div class="space-y-3">
               <div class="p-4 rounded-xl border border-emerald-100 bg-emerald-50/30 flex items-start gap-4">
                 <div class="w-1.5 h-full min-h-[40px] bg-emerald-400 rounded-full shrink-0"></div>
                 <div>
                   <p class="text-[11px] font-extrabold text-emerald-600 uppercase tracking-widest mb-1">10:00 - 11:30</p>
                   <p class="text-[13px] font-bold text-[#081F5C]">Mentoring Algoritma</p>
                   <p class="text-[12px] font-medium text-slate-500 mt-0.5 flex items-center gap-1.5">
                     <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M19 21v-2a4 4 0 0 0-4-4H9a4 4 0 0 0-4 4v2"/><circle cx="12" cy="7" r="4"/></svg>
                     Budi & Siti
                   </p>
                 </div>
               </div>

               <div class="p-4 rounded-xl border border-slate-100 bg-slate-50 flex items-start gap-4 hover:border-[#7096D1]/30 transition-colors">
                 <div class="w-1.5 h-full min-h-[40px] bg-[#334EAC] rounded-full shrink-0"></div>
                 <div>
                   <p class="text-[11px] font-extrabold text-[#334EAC] uppercase tracking-widest mb-1">14:00 - 15:00</p>
                   <p class="text-[13px] font-bold text-[#081F5C]">Review Tugas Akhir</p>
                   <p class="text-[12px] font-medium text-slate-500 mt-0.5 flex items-center gap-1.5">
                     <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M19 21v-2a4 4 0 0 0-4-4H9a4 4 0 0 0-4 4v2"/><circle cx="12" cy="7" r="4"/></svg>
                     Andi Wijaya
                   </p>
                 </div>
               </div>
             </div>
             
             <RouterLink to="/tutor/mentoring" class="mt-4 w-full block text-center py-2.5 bg-slate-50 hover:bg-[#EDF1F6] border border-slate-200 text-[#334EAC] rounded-xl font-extrabold text-[12px] transition-colors">
               + Jadwal Baru
             </RouterLink>
          </div>

          <!-- AI Mentor Insights -->
          <div class="bg-gradient-to-br from-[#081F5C] to-[#334EAC] rounded-3xl p-6 shadow-[0_10px_40px_rgba(15,23,42,0.15)] border border-white/10 text-white relative overflow-hidden group">
            <div class="absolute -right-4 -top-4 w-32 h-32 bg-white/10 blur-[40px] rounded-full pointer-events-none animate-pulse"></div>
            
            <h3 class="text-[15px] font-extrabold mb-4 flex items-center gap-2 relative z-10">
              <span class="w-7 h-7 rounded-lg bg-white/10 flex items-center justify-center"><svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M21 16V8a2 2 0 0 0-1-1.73l-7-4a2 2 0 0 0-2 0l-7 4A2 2 0 0 0 3 8v8a2 2 0 0 0 1 1.73l7 4a2 2 0 0 0 2 0l7-4A2 2 0 0 0 21 16z"/><polyline points="7.5 4.21 12 6.81 16.5 4.21"/><polyline points="7.5 19.79 7.5 14.6 3 12"/><polyline points="21 12 16.5 14.6 16.5 19.79"/><polyline points="3.27 6.96 12 12.01 20.73 6.96"/><line x1="12" x2="12" y1="22.08" y2="12"/></svg></span>
              AI Mentor Insights
            </h3>
            
            <ul class="space-y-3 relative z-10">
              <li class="flex items-start gap-2.5">
                <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round" class="text-emerald-400 mt-1 shrink-0"><polyline points="20 6 9 17 4 12"/></svg>
                <p class="text-[12px] font-medium text-[#BAD6EB] leading-tight">Mahasiswa bimbingan Anda meningkat pemahamannya 15% minggu ini.</p>
              </li>
              <li class="flex items-start gap-2.5">
                <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round" class="text-amber-400 mt-1 shrink-0"><circle cx="12" cy="12" r="10"/><line x1="12" x2="12" y1="8" y2="12"/><line x1="12" x2="12.01" y1="16" y2="16"/></svg>
                <p class="text-[12px] font-medium text-[#BAD6EB] leading-tight">2 diskusi forum membutuhkan verifikasi jawaban ahli Anda.</p>
              </li>
            </ul>
            
            <RouterLink to="/pelajar/ai-analyzer" class="mt-5 w-full py-2.5 bg-white hover:bg-[#F7F2EB] text-[#081F5C] rounded-xl font-extrabold text-[12px] transition-all flex items-center justify-center gap-2 shadow-sm active:scale-95 relative z-10">
              Buka AI Workspace
            </RouterLink>
          </div>

          <!-- Top Performing Students -->
          <div class="bg-white/80 backdrop-blur-xl rounded-3xl p-6 shadow-[0_10px_40px_rgba(15,23,42,0.06)] border border-slate-100">
             <h3 class="text-[15px] font-bold text-slate-900 mb-5 tracking-tight">Performa Terbaik Bulan Ini</h3>
             
             <div class="space-y-4">
               <div class="flex items-center justify-between group">
                 <div class="flex items-center gap-3">
                   <div class="w-8 h-8 rounded-full bg-[#EDF1F6] flex items-center justify-center text-[10px] font-bold text-[#081F5C] ring-2 ring-transparent group-hover:ring-[#7096D1] transition-all cursor-pointer">A</div>
                   <div>
                     <p class="text-[13px] font-bold text-[#081F5C] cursor-pointer group-hover:text-[#334EAC] transition-colors">Andi Wijaya</p>
                     <p class="text-[11px] font-medium text-slate-500">12 Sesi Selesai</p>
                   </div>
                 </div>
                 <span class="text-[12px] font-extrabold text-emerald-500 bg-emerald-50 px-2 py-1 rounded-lg">98%</span>
               </div>
               
               <div class="flex items-center justify-between group">
                 <div class="flex items-center gap-3">
                   <div class="w-8 h-8 rounded-full bg-amber-50 flex items-center justify-center text-[10px] font-bold text-amber-600 ring-2 ring-transparent group-hover:ring-amber-300 transition-all cursor-pointer">S</div>
                   <div>
                     <p class="text-[13px] font-bold text-[#081F5C] cursor-pointer group-hover:text-[#334EAC] transition-colors">Siti Aminah</p>
                     <p class="text-[11px] font-medium text-slate-500">8 Sesi Selesai</p>
                   </div>
                 </div>
                 <span class="text-[12px] font-extrabold text-emerald-500 bg-emerald-50 px-2 py-1 rounded-lg">95%</span>
               </div>
             </div>
          </div>

        </div>
      </div>
    </div>
  </div>
</template>

<script setup>
import { RouterLink } from 'vue-router'
</script>

<style scoped>
/* Optional: Animations specific to this component */
</style>
