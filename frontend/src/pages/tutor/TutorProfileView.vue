<template>
  <div class="relative min-h-screen pb-12 overflow-hidden bg-[#F7F2EB]">
    <!-- Mesh Background / Atmosphere -->
    <div class="absolute inset-0 pointer-events-none overflow-hidden">
      <!-- Top Large Blob -->
      <div class="absolute top-[-20%] left-[10%] w-[60%] h-[60%] bg-[#334EAC]/5 blur-[120px] rounded-full mix-blend-multiply"></div>
      <div class="absolute top-[20%] right-[-10%] w-[40%] h-[40%] bg-[#7096D1]/10 blur-[120px] rounded-full mix-blend-multiply"></div>
      <!-- Subtle Grid Texture -->
      <div class="absolute inset-0 bg-[url('data:image/svg+xml;base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHdpZHRoPSIyNCIgaGVpZ2h0PSIyNCI+CjxyZWN0IHdpZHRoPSIyNCIgaGVpZ2h0PSIyNCIgZmlsbD0ibm9uZSIvPgo8Y2lyY2xlIGN4PSIyIiBjeT0iMiIgcj0iMSIgZmlsbD0icmdiYSgwLCAwLCAwLCAwLjA1KSIvPgo8L3N2Zz4=')] opacity-50 mix-blend-overlay"></div>
    </div>

    <div class="relative z-10 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8 space-y-8">
      
      <!-- 1. HERO PROFILE SECTION -->
      <div class="bg-white/60 backdrop-blur-xl rounded-3xl shadow-[0_10px_40px_rgba(15,23,42,0.06)] border border-slate-200/60 overflow-hidden relative transition-all duration-300 ease-out hover:shadow-xl group/card">
        <!-- Cover Photo -->
        <div class="h-32 md:h-48 bg-gradient-to-r from-[#081F5C] via-[#334EAC] to-[#7096D1] relative">
          <!-- Optional overlay pattern -->
          <div class="absolute inset-0 bg-[url('data:image/svg+xml;base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHdpZHRoPSI0MCIgaGVpZ2h0PSI0MCI+PGNpcmNsZSBjeD0iMjAiIGN5PSIyMCIgcj0iMSIgZmlsbD0icmdiYSgyNTUsIDI1NSwgMjU1LCAwLjEpIi8+PC9zdmc+')] opacity-30"></div>
        </div>
        
        <div class="px-6 md:px-10 pb-8 relative">
          <div class="flex flex-col md:flex-row gap-6 md:gap-8 items-start">
            
            <!-- Avatar -->
            <div class="-mt-16 md:-mt-20 shrink-0 relative group">
              <div class="w-32 h-32 md:w-40 md:h-40 bg-gradient-to-br from-[#EDF1F6] to-white rounded-full border-4 border-white shadow-xl flex items-center justify-center overflow-hidden relative z-10">
                <span class="text-slate-900 font-bold text-4xl tracking-tight">SR</span>
              </div>
              <button @click="triggerAvatarUpload" class="absolute bottom-2 right-2 w-10 h-10 bg-white rounded-full shadow-lg border border-slate-100 flex items-center justify-center text-slate-400 hover:text-[#334EAC] transition-colors z-20 hover:scale-105 active:scale-95">
                <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M14.5 4h-5L7 7H4a2 2 0 0 0-2 2v9a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V9a2 2 0 0 0-2-2h-3l-2.5-3z"/><circle cx="12" cy="13" r="3"/></svg>
              </button>
            </div>

            <!-- Profile Info -->
            <div class="flex-1 pt-2 md:pt-4">
              <div class="flex flex-col md:flex-row md:items-start justify-between gap-4">
                <div>
                  <h1 class="text-2xl md:text-3xl font-bold text-slate-900 tracking-tight flex items-center gap-2 mb-1">
                    Dr. Sarah Rahman
                    <span class="w-5 h-5 bg-emerald-500 rounded-full flex items-center justify-center shadow-sm" title="Verified Mentor">
                      <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="white" stroke-width="4" stroke-linecap="round" stroke-linejoin="round"><polyline points="20 6 9 17 4 12"/></svg>
                    </span>
                  </h1>
                  <p class="text-[14px] md:text-[15px] font-bold text-slate-500 mb-3">Senior Lecturer in Computer Science</p>
                  
                  <div class="flex flex-wrap items-center gap-3">
                    <span class="px-3 py-1.5 bg-[#EDF1F6] text-[#081F5C] rounded-xl text-[12px] font-bold uppercase tracking-widest flex items-center gap-1.5">
                      <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M4 19.5v-15A2.5 2.5 0 0 1 6.5 2H20v20H6.5a2.5 2.5 0 0 1 0-5H20"/></svg>
                      Universitas Indonesia
                    </span>
                    <span class="px-3 py-1.5 bg-amber-50 text-amber-600 rounded-xl text-[12px] font-bold flex items-center gap-1.5 border border-amber-100">
                      <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" class="fill-amber-400"><polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"/></svg>
                      4.9 Rating (120 Review)
                    </span>
                  </div>
                </div>

                <div class="flex gap-2">
                  <RouterLink to="/tutor/settings" class="px-5 py-2.5 bg-white border border-slate-200 hover:border-[#7096D1] text-[#334EAC] rounded-2xl font-bold text-[13px] transition-all shadow-sm active:scale-95 flex items-center gap-2">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M12.22 2h-.44a2 2 0 0 0-2 2v.18a2 2 0 0 1-1 1.73l-.43.25a2 2 0 0 1-2 0l-.15-.08a2 2 0 0 0-2.73.73l-.22.38a2 2 0 0 0 .73 2.73l.15.1a2 2 0 0 1 1 1.72v.51a2 2 0 0 1-1 1.74l-.15.09a2 2 0 0 0-.73 2.73l.22.38a2 2 0 0 0 2.73.73l.15-.08a2 2 0 0 1 2 0l.43.25a2 2 0 0 1 1 1.73V20a2 2 0 0 0 2 2h.44a2 2 0 0 0 2-2v-.18a2 2 0 0 1 1-1.73l.43-.25a2 2 0 0 1 2 0l.15.08a2 2 0 0 0 2.73-.73l.22-.39a2 2 0 0 0-.73-2.73l-.15-.08a2 2 0 0 1-1-1.74v-.5a2 2 0 0 1 1-1.74l.15-.09a2 2 0 0 0 .73-2.73l-.22-.38a2 2 0 0 0-2.73-.73l-.15.08a2 2 0 0 1-2 0l-.43-.25a2 2 0 0 1-1-1.73V4a2 2 0 0 0-2-2z"/><circle cx="12" cy="12" r="3"/></svg>
                    Edit Profil
                  </RouterLink>
                  <RouterLink to="/tutor/analytics" class="px-5 py-2.5 bg-[#334EAC] hover:bg-[#081F5C] text-white rounded-2xl font-bold text-[13px] transition-all shadow-sm active:scale-95 flex items-center gap-2">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M3 3v18h18"/><path d="m18.7 8-5.1 5.2-2.8-2.7L7 14.3"/></svg>
                    Statistik & Analytics
                  </RouterLink>
                </div>
              </div>

              <div class="mt-6">
                <p class="text-[14px] text-slate-600 font-medium leading-relaxed max-w-3xl">
                  Memiliki pengalaman lebih dari 8 tahun dalam mengajarkan fondasi ilmu komputer, khususnya dalam Algoritma, Struktur Data, dan Arsitektur Sistem. Misi saya adalah membantu mahasiswa memahami konsep rumit menjadi penjelasan yang logis dan mudah dicerna.
                </p>
              </div>

            </div>
          </div>
        </div>
      </div>

      <div class="grid grid-cols-1 lg:grid-cols-12 gap-8">
        
        <!-- LEFT/CENTER CONTENT -->
        <div class="lg:col-span-8 space-y-8">
          
          <!-- 2. ANALYTICS GRID -->
          <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
            <RouterLink to="/tutor/mentoring" class="bg-white/80 backdrop-blur-xl rounded-3xl p-5 shadow-[0_10px_40px_rgba(15,23,42,0.06)] border border-slate-100 transition-all duration-300 ease-out hover:shadow-xl group/card block">
              <p class="text-[11px] font-bold text-slate-400 uppercase tracking-widest mb-1">Total Mentoring</p>
              <h3 class="text-2xl font-bold text-[#334EAC] tracking-tight">148</h3>
            </RouterLink>
            <RouterLink to="/tutor/verify-answer" class="bg-white/80 backdrop-blur-xl rounded-3xl p-5 shadow-[0_10px_40px_rgba(15,23,42,0.06)] border border-slate-100 transition-all duration-300 ease-out hover:shadow-xl group/card block">
              <p class="text-[11px] font-bold text-slate-400 uppercase tracking-widest mb-1">Jwb Diverifikasi</p>
              <h3 class="text-2xl font-bold text-[#334EAC] tracking-tight">324</h3>
            </RouterLink>
            <RouterLink to="/tutor/analytics" class="bg-white/80 backdrop-blur-xl rounded-3xl p-5 shadow-[0_10px_40px_rgba(15,23,42,0.06)] border border-slate-100 transition-all duration-300 ease-out hover:shadow-xl group/card block">
              <p class="text-[11px] font-bold text-slate-400 uppercase tracking-widest mb-1">Kepuasan</p>
              <h3 class="text-2xl font-bold text-[#334EAC] tracking-tight">98%</h3>
            </RouterLink>
            <RouterLink to="/tutor/student-requests" class="bg-white/80 backdrop-blur-xl rounded-3xl p-5 shadow-[0_10px_40px_rgba(15,23,42,0.06)] border border-slate-100 transition-all duration-300 ease-out hover:shadow-xl group/card block">
              <p class="text-[11px] font-bold text-slate-400 uppercase tracking-widest mb-1">Total Siswa</p>
              <h3 class="text-2xl font-bold text-[#334EAC] tracking-tight">86</h3>
            </RouterLink>
          </div>

          <!-- 3. EXPERTISE SECTION -->
          <div class="bg-white/80 backdrop-blur-xl rounded-3xl p-7 shadow-[0_10px_40px_rgba(15,23,42,0.06)] border border-slate-100 transition-all duration-300 ease-out hover:shadow-xl group/card">
            <h3 class="text-[16px] font-bold text-slate-900 tracking-tight mb-5 flex items-center gap-3">
               <span class="w-8 h-8 rounded-lg bg-[#EDF1F6] flex items-center justify-center text-[#334EAC]">
                 <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><polygon points="12 2 2 7 12 12 22 7 12 2"/><polyline points="2 17 12 22 22 17"/><polyline points="2 12 12 17 22 12"/></svg>
               </span>
               Bidang Keahlian
            </h3>
            <div class="flex flex-wrap gap-2">
              <span class="px-4 py-2 bg-slate-50 border border-slate-200 text-slate-900 rounded-xl text-[13px] font-bold">Algoritma & Struktur Data</span>
              <span class="px-4 py-2 bg-slate-50 border border-slate-200 text-slate-900 rounded-xl text-[13px] font-bold">Sistem Basis Data</span>
              <span class="px-4 py-2 bg-slate-50 border border-slate-200 text-slate-900 rounded-xl text-[13px] font-bold">Machine Learning Dasar</span>
              <span class="px-4 py-2 bg-slate-50 border border-slate-200 text-slate-900 rounded-xl text-[13px] font-bold">Pemrograman Java & C++</span>
              <span class="px-4 py-2 bg-slate-50 border border-slate-200 text-slate-900 rounded-xl text-[13px] font-bold">Software Engineering</span>
            </div>
          </div>

          <!-- 4. RECENT ACTIVITY -->
          <div class="bg-white/80 backdrop-blur-xl rounded-3xl p-7 shadow-[0_10px_40px_rgba(15,23,42,0.06)] border border-slate-100 transition-all duration-300 ease-out hover:shadow-xl group/card">
            <div class="flex items-center justify-between mb-6">
              <h3 class="text-[16px] font-bold text-slate-900 tracking-tight flex items-center gap-3">
                 <span class="w-8 h-8 rounded-lg bg-[#EDF1F6] flex items-center justify-center text-[#334EAC]">
                   <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M12 20h9"/><path d="M16.5 3.5a2.12 2.12 0 0 1 3 3L7 19l-4 1 1-4Z"/></svg>
                 </span>
                 Aktivitas Terbaru Anda
              </h3>
              <RouterLink to="/tutor/mentoring" class="text-[12px] font-bold text-[#334EAC] hover:text-[#081F5C] transition-colors">Lihat Semua</RouterLink>
            </div>
            
            <div class="relative pl-6 space-y-6 before:absolute before:inset-y-0 before:left-2.5 before:w-px before:bg-slate-200">
              
              <div class="relative">
                <div class="absolute -left-[29px] w-5 h-5 rounded-full bg-emerald-50 border-2 border-emerald-500 flex items-center justify-center z-10">
                  <div class="w-1.5 h-1.5 rounded-full bg-emerald-500"></div>
                </div>
                <p class="text-[13px] font-bold text-slate-900 tracking-tight mb-1">Membagikan materi baru: "Pengenalan Tree di Struktur Data"</p>
                <p class="text-[12px] font-medium text-slate-500 mb-2">2 jam lalu</p>
                <RouterLink to="/tutor/materials" class="bg-slate-50 border border-slate-100 hover:border-[#7096D1]/50 p-3 rounded-xl inline-flex items-center gap-3 transition-all">
                  <div class="w-8 h-8 rounded-lg bg-rose-50 text-rose-500 flex items-center justify-center">
                    <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"/><polyline points="14 2 14 8 20 8"/><line x1="16" x2="8" y1="13" y2="13"/><line x1="16" x2="8" y1="17" y2="17"/><polyline points="10 9 9 9 8 9"/></svg>
                  </div>
                  <span class="text-[12px] font-bold text-slate-600">Tree_Structure_Guide.pdf</span>
                </RouterLink>
              </div>

              <div class="relative">
                <div class="absolute -left-[29px] w-5 h-5 rounded-full bg-indigo-50 border-2 border-indigo-500 flex items-center justify-center z-10">
                  <div class="w-1.5 h-1.5 rounded-full bg-indigo-500"></div>
                </div>
                <p class="text-[13px] font-bold text-slate-900 tracking-tight mb-1">Menyelesaikan Sesi Mentoring "Review UI/UX"</p>
                <p class="text-[12px] font-medium text-slate-500">Kemarin, 15:00 WIB</p>
              </div>

            </div>
          </div>

          <!-- 5. STUDENT REVIEWS -->
          <div class="bg-white/80 backdrop-blur-xl rounded-3xl p-7 shadow-[0_10px_40px_rgba(15,23,42,0.06)] border border-slate-100 transition-all duration-300 ease-out hover:shadow-xl group/card">
            <h3 class="text-[16px] font-bold text-slate-900 tracking-tight mb-5 flex items-center gap-3">
               <span class="w-8 h-8 rounded-lg bg-[#EDF1F6] flex items-center justify-center text-[#334EAC]">
                 <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M14 9V5a3 3 0 0 0-3-3l-4 9v11h11.28a2 2 0 0 0 2-1.7l1.38-9a2 2 0 0 0-2-2.3zM7 22H4a2 2 0 0 1-2-2v-7a2 2 0 0 1 2-2h3"/></svg>
               </span>
               Ulasan Mahasiswa Terbaru
            </h3>
            
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
              <div class="p-5 bg-[#F7F2EB]/50 border border-slate-100 rounded-2xl relative">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" class="absolute top-4 right-4 text-amber-500/20"><path d="M3 21c3 0 7-1 7-8V5c0-1.25-.756-2.017-2-2H4c-1.25 0-2 .75-2 1.972V11c0 1.25.75 2 2 2 1 0 1 0 1 1v1c0 1-1 2-2 2s-1 .008-1 1.031V20c0 1 0 1 1 1z"/><path d="M15 21c3 0 7-1 7-8V5c0-1.25-.757-2.017-2-2h-4c-1.25 0-2 .75-2 1.972V11c0 1.25.75 2 2 2h.75c0 2.25.25 4-2.75 4v3c0 1 0 1 1 1z"/></svg>
                <div class="flex items-center gap-1 mb-2 text-amber-500">
                  <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" viewBox="0 0 24 24" fill="currentColor" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"/></svg>
                  <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" viewBox="0 0 24 24" fill="currentColor" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"/></svg>
                  <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" viewBox="0 0 24 24" fill="currentColor" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"/></svg>
                  <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" viewBox="0 0 24 24" fill="currentColor" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"/></svg>
                  <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" viewBox="0 0 24 24" fill="currentColor" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"/></svg>
                </div>
                <p class="text-[13px] text-slate-600 font-medium leading-relaxed italic mb-4">"Penjelasan mengenai Big-O Notation sangat mudah dipahami. Sesi mentoringnya fun dan terstruktur."</p>
                <div class="flex items-center gap-2">
                  <div class="w-6 h-6 bg-slate-200 rounded-full flex items-center justify-center text-[8px] font-bold text-slate-500">AW</div>
                  <span class="text-[11px] font-bold text-slate-500">Andi Wijaya</span>
                </div>
              </div>

              <div class="p-5 bg-[#F7F2EB]/50 border border-slate-100 rounded-2xl relative">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" class="absolute top-4 right-4 text-amber-500/20"><path d="M3 21c3 0 7-1 7-8V5c0-1.25-.756-2.017-2-2H4c-1.25 0-2 .75-2 1.972V11c0 1.25.75 2 2 2 1 0 1 0 1 1v1c0 1-1 2-2 2s-1 .008-1 1.031V20c0 1 0 1 1 1z"/><path d="M15 21c3 0 7-1 7-8V5c0-1.25-.757-2.017-2-2h-4c-1.25 0-2 .75-2 1.972V11c0 1.25.75 2 2 2h.75c0 2.25.25 4-2.75 4v3c0 1 0 1 1 1z"/></svg>
                <div class="flex items-center gap-1 mb-2 text-amber-500">
                  <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" viewBox="0 0 24 24" fill="currentColor" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"/></svg>
                  <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" viewBox="0 0 24 24" fill="currentColor" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"/></svg>
                  <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" viewBox="0 0 24 24" fill="currentColor" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"/></svg>
                  <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" viewBox="0 0 24 24" fill="currentColor" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"/></svg>
                  <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" viewBox="0 0 24 24" fill="currentColor" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="text-slate-300"><polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"/></svg>
                </div>
                <p class="text-[13px] text-slate-600 font-medium leading-relaxed italic mb-4">"Saya terbantu saat stuck di query SQL kompleks. Fast response dan verifikasi akurat."</p>
                <div class="flex items-center gap-2">
                  <div class="w-6 h-6 bg-slate-200 rounded-full flex items-center justify-center text-[8px] font-bold text-slate-500">SN</div>
                  <span class="text-[11px] font-bold text-slate-500">Siti Nuraini</span>
                </div>
              </div>
            </div>
          </div>

        </div>

        <!-- RIGHT SIDEBAR -->
        <div class="lg:col-span-4 space-y-8">
          
          <!-- AI Mentor Profile Insight -->
          <div class="bg-gradient-to-br from-[#081F5C] to-[#334EAC] rounded-3xl p-6 shadow-[0_15px_40px_rgba(8,31,92,0.15)] border border-white/10 text-white relative overflow-hidden transition-all duration-300 ease-out hover:shadow-2xl group/card">
            <div class="absolute -right-4 -top-4 w-32 h-32 bg-white/10 blur-[40px] rounded-full pointer-events-none"></div>
            
            <h3 class="text-[15px] font-bold tracking-tight mb-4 flex items-center gap-2 relative z-10">
              <span class="w-7 h-7 rounded-lg bg-white/10 flex items-center justify-center"><svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="m12 3-1.912 5.813a2 2 0 0 1-1.275 1.275L3 12l5.813 1.912a2 2 0 0 1 1.275 1.275L12 21l1.912-5.813a2 2 0 0 1 1.275-1.275L21 12l-5.813-1.912a2 2 0 0 1-1.275-1.275L12 3Z"/></svg></span>
              AI Profil Insight
            </h3>
            
            <p class="text-[12px] font-medium text-[#BAD6EB] leading-tight relative z-10 mb-4">
              Profil Anda termasuk dalam top 5% Mentor Teraktif. Rekomendasi AI: Tambahkan portofolio atau jurnal riset Anda untuk menarik mahasiswa tingkat lanjut.
            </p>
            
            <button @click="updatePortfolio" class="w-full py-2.5 bg-white hover:bg-[#F7F2EB] text-[#081F5C] rounded-2xl font-bold text-[12px] transition-all flex items-center justify-center gap-2 shadow-sm active:scale-95 relative z-10">
              Update Portofolio
            </button>
          </div>

          <!-- Profile Completion -->
          <div class="bg-white/80 backdrop-blur-xl rounded-3xl p-6 shadow-[0_10px_40px_rgba(15,23,42,0.06)] border border-slate-100 transition-all duration-300 ease-out hover:shadow-xl group/card">
             <h3 class="text-[15px] font-bold text-slate-900 tracking-tight mb-4">Kelengkapan Profil</h3>
             
             <div class="mb-5">
               <div class="flex items-center justify-between mb-2">
                 <span class="text-[12px] font-bold text-[#334EAC] tracking-tight">{{ profileCompletion }}% Selesai</span>
               </div>
               <div class="h-2.5 w-full bg-[#EDF1F6] rounded-full overflow-hidden shadow-inner">
                 <div class="h-full bg-gradient-to-r from-[#334EAC] to-[#7096D1] rounded-full transition-all duration-500" :style="{ width: profileCompletion + '%' }"></div>
               </div>
             </div>

             <ul class="space-y-3">
               <li class="flex items-center gap-4">
                 <span class="w-5 h-5 rounded-full bg-emerald-50 text-emerald-500 flex items-center justify-center shrink-0">
                   <svg xmlns="http://www.w3.org/2000/svg" width="10" height="10" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"><polyline points="20 6 9 17 4 12"/></svg>
                 </span>
                 <span class="text-[12px] font-bold text-slate-600 line-through">Informasi Dasar</span>
               </li>
               <li class="flex items-center gap-4">
                 <span class="w-5 h-5 rounded-full bg-emerald-50 text-emerald-500 flex items-center justify-center shrink-0">
                   <svg xmlns="http://www.w3.org/2000/svg" width="10" height="10" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"><polyline points="20 6 9 17 4 12"/></svg>
                 </span>
                 <span class="text-[12px] font-bold text-slate-600 line-through">Verifikasi KTP / NIDN</span>
               </li>
               <li @click="linkLinkedIn" class="flex items-center gap-4 cursor-pointer group/item">
                 <span 
                   class="w-5 h-5 rounded-full flex items-center justify-center shrink-0 border transition-colors"
                   :class="isLinkedInLinked ? 'bg-emerald-50 text-emerald-500 border-emerald-100' : 'bg-slate-100 text-slate-400 border-slate-200 group-hover/item:border-[#334EAC]'"
                 >
                   <svg v-if="isLinkedInLinked" xmlns="http://www.w3.org/2000/svg" width="10" height="10" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"><polyline points="20 6 9 17 4 12"/></svg>
                   <span v-else class="w-1.5 h-1.5 rounded-full bg-slate-300"></span>
                 </span>
                 <span class="text-[12px] font-bold transition-colors" :class="isLinkedInLinked ? 'text-slate-600 line-through' : 'text-slate-900 group-hover/item:text-[#334EAC]'">Tautkan LinkedIn</span>
               </li>
             </ul>
          </div>

          <!-- Achievements -->
          <div class="bg-white/80 backdrop-blur-xl rounded-3xl p-6 shadow-[0_10px_40px_rgba(15,23,42,0.06)] border border-slate-100 transition-all duration-300 ease-out hover:shadow-xl group/card">
             <h3 class="text-[15px] font-bold text-slate-900 tracking-tight mb-4">Pencapaian Mentor</h3>
             
             <div class="space-y-4">
                <div class="flex items-center gap-4">
                  <div class="w-12 h-12 rounded-2xl bg-gradient-to-br from-amber-300 to-amber-500 shadow-[0_4px_10px_rgba(245,158,11,0.2)] flex items-center justify-center shrink-0 border-2 border-white">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="white" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"/></svg>
                  </div>
                  <div>
                     <p class="text-[13px] font-bold text-slate-900 tracking-tight leading-none mb-1">Top 50 Mentor</p>
                    <p class="text-[11px] font-medium text-slate-500">Tahun 2026</p>
                  </div>
                </div>
                
                <div class="flex items-center gap-4">
                  <div class="w-12 h-12 rounded-2xl bg-gradient-to-br from-indigo-400 to-indigo-600 shadow-[0_4px_10px_rgba(99,102,241,0.2)] flex items-center justify-center shrink-0 border-2 border-white">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="white" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"/><polyline points="22 4 12 14.01 9 11.01"/></svg>
                  </div>
                  <div>
                     <p class="text-[13px] font-bold text-slate-900 tracking-tight leading-none mb-1">100+ Validasi</p>
                    <p class="text-[11px] font-medium text-slate-500">Menjaga kualitas forum</p>
                  </div>
                </div>
                
             </div>
          </div>

        </div>
      </div>
    </div>

    <!-- Success Toast -->
    <div v-if="showSuccess" class="fixed bottom-6 right-6 z-50 bg-[#334EAC] text-white px-6 py-4 rounded-2xl shadow-[0_10px_40px_rgba(51,78,172,0.3)] flex items-center gap-3 animate-in slide-in-from-bottom-5">
      <div class="w-8 h-8 bg-white/20 rounded-full flex items-center justify-center shrink-0">
        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"><polyline points="20 6 9 17 4 12"/></svg>
      </div>
      <div>
        <h4 class="font-bold text-sm">Berhasil!</h4>
        <p class="text-xs text-indigo-100 font-medium">{{ successMessage }}</p>
      </div>
    </div>

  </div>
</template>

<script setup>
import { ref } from 'vue'
import { RouterLink } from 'vue-router'

const showSuccess = ref(false)
const successMessage = ref('')

const isLinkedInLinked = ref(false)
const profileCompletion = ref(90)

const linkLinkedIn = () => {
  if (!isLinkedInLinked.value) {
    isLinkedInLinked.value = true
    profileCompletion.value = 100
    successMessage.value = 'LinkedIn berhasil ditautkan! Profil Anda kini 100% lengkap.'
  } else {
    isLinkedInLinked.value = false
    profileCompletion.value = 90
    successMessage.value = 'LinkedIn berhasil diputuskan.'
  }
  showSuccess.value = true
  setTimeout(() => { showSuccess.value = false }, 3000)
}

const triggerAvatarUpload = () => {
  successMessage.value = 'Pilih foto profil baru... Foto berhasil diperbarui!'
  showSuccess.value = true
  setTimeout(() => { showSuccess.value = false }, 3000)
}

const updatePortfolio = () => {
  successMessage.value = 'Mengunggah portfolio akademik terbaru... Portofolio Berhasil Diupdate!'
  showSuccess.value = true
  setTimeout(() => { showSuccess.value = false }, 3000)
}
</script>
