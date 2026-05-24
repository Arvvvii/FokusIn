<template>
  <div class="relative min-h-screen pb-12 overflow-hidden bg-[#F7F2EB]">
    <!-- Mesh Background / Atmosphere -->
    <div class="absolute inset-0 pointer-events-none overflow-hidden">
      <!-- Soft Spotlight -->
      <div class="absolute top-[-5%] left-[10%] w-[35%] h-[35%] bg-[#334EAC]/5 blur-[120px] rounded-full mix-blend-multiply"></div>
      <div class="absolute top-[30%] right-[-10%] w-[40%] h-[40%] bg-[#7096D1]/10 blur-[120px] rounded-full mix-blend-multiply"></div>
      <!-- Subtle Grid Texture -->
      <div class="absolute inset-0 bg-[url('data:image/svg+xml;base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHdpZHRoPSIyNCIgaGVpZ2h0PSIyNCI+CjxyZWN0IHdpZHRoPSIyNCIgaGVpZ2h0PSIyNCIgZmlsbD0ibm9uZSIvPgo8Y2lyY2xlIGN4PSIyIiBjeT0iMiIgcj0iMSIgZmlsbD0icmdiYSgwLCAwLCAwLCAwLjA1KSIvPgo8L3N2Zz4=')] opacity-50 mix-blend-overlay"></div>
    </div>

    <div class="relative z-10 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8 space-y-8">
      
      <!-- 1. HEADER SECTION -->
      <div class="bg-white/80 backdrop-blur-xl rounded-3xl p-7 md:p-8 shadow-[0_10px_40px_rgba(15,23,42,0.06)] border border-white/40 relative overflow-hidden flex flex-col md:flex-row md:items-center justify-between gap-6 transition-all duration-300 ease-out hover:shadow-xl group/card">
        <div class="absolute right-0 top-0 w-1/3 h-full bg-gradient-to-l from-[#EDF1F6]/80 to-transparent pointer-events-none"></div>
        
        <div class="relative z-10">
          <div class="flex items-center gap-3 mb-2">
             <span class="w-10 h-10 rounded-xl bg-[#334EAC]/10 text-[#334EAC] flex items-center justify-center shrink-0">
               <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"/><polyline points="22 4 12 14.01 9 11.01"/></svg>
             </span>
             <h1 class="text-2xl md:text-3xl font-bold text-slate-900 tracking-tight">Verifikasi Jawaban Mahasiswa</h1>
          </div>
          <p class="text-[14px] text-slate-500 font-medium max-w-xl leading-relaxed ml-14">
            Tinjau, nilai, dan verifikasi jawaban diskusi mahasiswa untuk menjaga kualitas forum akademik.
          </p>
        </div>

        <div class="relative z-10 flex shrink-0 gap-4">
          <div class="bg-slate-50 border border-slate-100 rounded-2xl p-4 flex flex-col items-center justify-center min-w-[100px]">
             <span class="text-2xl font-bold text-amber-500 tracking-tight leading-none mb-1">12</span>
             <span class="text-[11px] font-bold text-slate-400 uppercase tracking-widest">Pending</span>
          </div>
          <div class="bg-slate-50 border border-slate-100 rounded-2xl p-4 flex flex-col items-center justify-center min-w-[100px]">
             <span class="text-2xl font-bold text-emerald-500 tracking-tight leading-none mb-1">86</span>
             <span class="text-[11px] font-bold text-slate-400 uppercase tracking-widest">Diverifikasi</span>
          </div>
          <div class="bg-slate-50 border border-slate-100 rounded-2xl p-4 flex flex-col items-center justify-center min-w-[110px] hidden sm:flex">
             <span class="text-2xl font-bold text-[#334EAC] tracking-tight leading-none mb-1">2.4<span class="text-sm">j</span></span>
             <span class="text-[11px] font-bold text-slate-400 uppercase tracking-widest">Avg Resp</span>
          </div>
        </div>
      </div>

      <div class="grid grid-cols-1 lg:grid-cols-12 gap-8">
        
        <!-- LEFT/CENTER CONTENT -->
        <div class="lg:col-span-8 space-y-6">
          
          <!-- 2. FILTER & SEARCH -->
          <div class="bg-white/80 backdrop-blur-xl rounded-2xl p-2 shadow-sm border border-slate-200/60 flex flex-col sm:flex-row gap-2">
            <!-- Search -->
            <div class="relative flex-1 group">
              <div class="absolute inset-y-0 left-0 pl-3.5 flex items-center pointer-events-none text-slate-400 group-focus-within:text-[#334EAC] transition-colors">
                <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><circle cx="11" cy="11" r="8"/><path d="m21 21-4.3-4.3"/></svg>
              </div>
              <input 
                type="text" 
                class="w-full pl-10 pr-4 py-2.5 bg-transparent border-none text-[14px] text-slate-800 placeholder-slate-400 focus:outline-none focus:ring-0" 
                placeholder="Cari kata kunci, nama mahasiswa, atau ID..."
              >
            </div>
            
            <div class="h-px sm:h-auto sm:w-px bg-slate-200/80 mx-2"></div>
            
            <!-- Filters -->
            <div class="flex items-center gap-1 overflow-x-auto no-scrollbar px-2 sm:px-0">
              <button class="px-4 py-2 rounded-xl bg-[#334EAC] text-white text-[13px] font-bold shadow-sm whitespace-nowrap active:scale-95 transition-transform">
                Pending
              </button>
              <button class="px-4 py-2 rounded-xl text-slate-500 hover:text-[#081F5C] hover:bg-slate-100 text-[13px] font-bold transition-colors whitespace-nowrap">
                Semua
              </button>
              <button class="px-4 py-2 rounded-xl text-slate-500 hover:text-[#081F5C] hover:bg-slate-100 text-[13px] font-bold transition-colors whitespace-nowrap">
                Diverifikasi
              </button>
              <button class="px-4 py-2 rounded-xl text-slate-500 hover:text-[#081F5C] hover:bg-slate-100 text-[13px] font-bold transition-colors whitespace-nowrap">
                Ditolak
              </button>
              
              <div class="ml-auto flex items-center gap-2 pl-4">
                <button class="p-2 rounded-xl text-slate-400 hover:text-[#081F5C] hover:bg-slate-100 transition-colors border border-transparent hover:border-slate-200" title="Kategori">
                  <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><polygon points="22 3 2 3 10 12.46 10 19 14 21 14 12.46 22 3"/></svg>
                </button>
              </div>
            </div>
          </div>

          <!-- 3. ANSWER REVIEW LIST -->
          <div class="space-y-5">
            
            <!-- Review Card 1 -->
            <div class="bg-white/80 backdrop-blur-xl rounded-3xl p-6 sm:p-7 shadow-[0_10px_40px_rgba(15,23,42,0.06)] border border-slate-100 transition-all duration-300 ease-out hover:shadow-xl group/card">
              <!-- Meta -->
              <div class="flex flex-wrap items-center justify-between gap-3 mb-4 border-b border-slate-100 pb-4">
                <div class="flex items-center gap-3">
                  <div class="w-10 h-10 rounded-full bg-emerald-50 border border-emerald-100 flex items-center justify-center shrink-0">
                    <span class="text-emerald-600 font-bold text-sm">BS</span>
                  </div>
                  <div>
                    <h4 class="text-[14px] font-bold text-slate-900 tracking-tight leading-none">Budi Santoso</h4>
                    <div class="flex items-center gap-2 mt-1">
                      <span class="text-[11px] font-bold text-slate-400">Reputasi: 420</span>
                      <span class="w-1 h-1 rounded-full bg-slate-300"></span>
                      <span class="text-[11px] font-bold text-slate-400">10 menit lalu</span>
                    </div>
                  </div>
                </div>
                <div class="flex items-center gap-2">
                  <span class="px-2.5 py-1 bg-indigo-50 text-indigo-600 rounded-lg text-[10px] font-extrabold uppercase tracking-widest border border-indigo-100 flex items-center gap-1">
                    <svg xmlns="http://www.w3.org/2000/svg" width="10" height="10" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"><path d="m12 3-1.912 5.813a2 2 0 0 1-1.275 1.275L3 12l5.813 1.912a2 2 0 0 1 1.275 1.275L12 21l1.912-5.813a2 2 0 0 1 1.275-1.275L21 12l-5.813-1.912a2 2 0 0 1-1.275-1.275L12 3Z"/></svg>
                    AI: 95% Cocok
                  </span>
                  <span class="px-2.5 py-1 bg-amber-50 text-amber-600 rounded-lg text-[10px] font-bold uppercase tracking-widest border border-amber-100">
                    Pending
                  </span>
                </div>
              </div>

              <!-- Question & Answer -->
              <div class="mb-5">
                <RouterLink to="/pelajar/forum/1" class="text-[13px] font-bold text-[#334EAC] hover:text-[#081F5C] hover:underline mb-2 block w-fit">
                  Q: Apa perbedaan utama antara proses dan thread dalam sistem operasi?
                </RouterLink>
                <div class="bg-[#F7F2EB]/50 p-4 rounded-2xl border border-[#EDF1F6]">
                  <p class="text-[14px] text-slate-600 font-medium leading-relaxed">
                    Proses adalah program yang sedang dieksekusi dan memiliki ruang alamat memori sendiri, sedangkan thread adalah unit eksekusi terkecil di dalam sebuah proses yang berbagi memori dengan thread lain dalam proses yang sama. Thread lebih ringan karena tidak memerlukan alokasi memori yang terpisah secara masif.
                  </p>
                </div>
              </div>

              <!-- 4. REVIEW ACTION PANEL -->
              <div class="space-y-4">
                <div class="relative">
                  <textarea 
                    class="w-full bg-white border border-slate-200 rounded-xl p-3 text-[13px] text-slate-700 placeholder-slate-400 focus:outline-none focus:border-[#7096D1] focus:ring-4 focus:ring-[#7096D1]/10 transition-all resize-none" 
                    rows="2" 
                    placeholder="Beri feedback opsional untuk mahasiswa ini..."
                  ></textarea>
                </div>

                <div class="flex flex-wrap items-center gap-3">
                  <button class="px-5 py-2.5 bg-[#334EAC] hover:bg-[#081F5C] text-white rounded-2xl font-bold text-[13px] transition-all shadow-[0_4px_12px_rgba(51,78,172,0.2)] active:scale-95 flex items-center gap-2">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"/><polyline points="22 4 12 14.01 9 11.01"/></svg>
                    Verifikasi Jawaban
                  </button>
                  <button class="px-5 py-2.5 bg-slate-50 hover:bg-rose-50 text-slate-600 hover:text-rose-600 border border-slate-200 hover:border-rose-200 rounded-2xl font-bold text-[13px] transition-all active:scale-95 flex items-center gap-2">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M18 6 6 18"/><path d="m6 6 12 12"/></svg>
                    Tolak
                  </button>
                  <button class="px-4 py-2.5 bg-amber-50 hover:bg-amber-100 text-amber-600 border border-amber-100 rounded-2xl font-bold text-[13px] transition-all active:scale-95 flex items-center gap-2 ml-auto">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"/></svg>
                    Tandai Terbaik
                  </button>
                </div>
              </div>
            </div>

            <!-- Review Card 2 -->
            <div class="bg-white/80 backdrop-blur-xl rounded-3xl p-6 sm:p-7 shadow-[0_10px_40px_rgba(15,23,42,0.06)] border border-slate-100 transition-all duration-300 ease-out hover:shadow-xl group/card">
              <!-- Meta -->
              <div class="flex flex-wrap items-center justify-between gap-3 mb-4 border-b border-slate-100 pb-4">
                <div class="flex items-center gap-3">
                  <div class="w-10 h-10 rounded-full bg-sky-50 border border-sky-100 flex items-center justify-center shrink-0">
                    <span class="text-sky-600 font-bold text-sm">RD</span>
                  </div>
                  <div>
                    <h4 class="text-[14px] font-bold text-slate-900 tracking-tight leading-none">Rizky Dharmawan</h4>
                    <div class="flex items-center gap-2 mt-1">
                      <span class="text-[11px] font-bold text-slate-400">Reputasi: 120</span>
                      <span class="w-1 h-1 rounded-full bg-slate-300"></span>
                      <span class="text-[11px] font-bold text-slate-400">2 jam lalu</span>
                    </div>
                  </div>
                </div>
                <div class="flex items-center gap-2">
                  <span class="px-2.5 py-1 bg-rose-50 text-rose-600 rounded-lg text-[10px] font-bold uppercase tracking-widest border border-rose-100 flex items-center gap-1">
                    <svg xmlns="http://www.w3.org/2000/svg" width="10" height="10" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"><path d="m12 3-1.912 5.813a2 2 0 0 1-1.275 1.275L3 12l5.813 1.912a2 2 0 0 1 1.275 1.275L12 21l1.912-5.813a2 2 0 0 1 1.275-1.275L21 12l-5.813-1.912a2 2 0 0 1-1.275-1.275L12 3Z"/></svg>
                    AI: 40% (Cek Ulang)
                  </span>
                  <span class="px-2.5 py-1 bg-amber-50 text-amber-600 rounded-lg text-[10px] font-bold uppercase tracking-widest border border-amber-100">
                    Pending
                  </span>
                </div>
              </div>

              <!-- Question & Answer -->
              <div class="mb-5">
                <RouterLink to="/pelajar/forum/2" class="text-[13px] font-bold text-[#334EAC] hover:text-[#081F5C] hover:underline mb-2 block w-fit">
                  Q: Bagaimana cara mengatasi error NullPointerException di Java?
                </RouterLink>
                <div class="bg-[#F7F2EB]/50 p-4 rounded-2xl border border-[#EDF1F6]">
                  <p class="text-[14px] text-slate-600 font-medium leading-relaxed">
                    Tinggal tambahkan try catch saja di semua blok kodenya, pasti jalan.
                  </p>
                </div>
              </div>

              <!-- 4. REVIEW ACTION PANEL -->
              <div class="space-y-4">
                
                <!-- AI Warning Box -->
                <div class="bg-rose-50/50 border border-rose-100 p-3 rounded-xl flex gap-3">
                  <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" class="text-rose-500 mt-0.5 shrink-0"><circle cx="12" cy="12" r="10"/><line x1="12" x2="12" y1="8" y2="12"/><line x1="12" x2="12.01" y1="16" y2="16"/></svg>
                  <div>
                    <p class="text-[12px] font-bold text-rose-700">Rekomendasi AI: Tinjau Ulang</p>
                    <p class="text-[12px] text-rose-600 mt-0.5">Jawaban ini tidak menyelesaikan akar masalah (menghindari null) dan merupakan best practice yang buruk (menangkap Exception umum).</p>
                  </div>
                </div>

                <div class="relative">
                  <textarea 
                    class="w-full bg-white border border-slate-200 rounded-xl p-3 text-[13px] text-slate-700 placeholder-slate-400 focus:outline-none focus:border-[#7096D1] focus:ring-4 focus:ring-[#7096D1]/10 transition-all resize-none" 
                    rows="2" 
                    placeholder="Beri feedback opsional untuk mahasiswa ini..."
                  >Coba jelaskan pentingnya mengecek null sebelum memanggil method objeknya daripada sekadar membungkus dalam try-catch.</textarea>
                </div>

                <div class="flex flex-wrap items-center gap-3">
                  <button class="px-5 py-2.5 bg-slate-50 hover:bg-emerald-50 text-slate-600 hover:text-emerald-600 border border-slate-200 hover:border-emerald-200 rounded-2xl font-bold text-[13px] transition-all active:scale-95 flex items-center gap-2">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"/><polyline points="22 4 12 14.01 9 11.01"/></svg>
                    Verifikasi
                  </button>
                  <button class="px-5 py-2.5 bg-rose-500 hover:bg-rose-600 text-white rounded-2xl font-bold text-[13px] transition-all shadow-[0_4px_12px_rgba(244,63,94,0.2)] active:scale-95 flex items-center gap-2">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M18 6 6 18"/><path d="m6 6 12 12"/></svg>
                    Tolak Jawaban
                  </button>
                  <RouterLink to="/pelajar/forum/2" class="px-4 py-2.5 bg-slate-50 hover:bg-[#EDF1F6] text-slate-600 border border-slate-200 rounded-2xl font-bold text-[13px] transition-all active:scale-95 flex items-center gap-2 ml-auto">
                    Lihat Konteks
                    <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M18 13v6a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V8a2 2 0 0 1 2-2h6"/><polyline points="15 3 21 3 21 9"/><line x1="10" x2="21" y1="14" y2="3"/></svg>
                  </RouterLink>
                </div>
              </div>
            </div>

          </div>
        </div>

        <!-- 5. RIGHT SIDEBAR -->
        <div class="lg:col-span-4 space-y-8">
          
          <!-- AI Moderation Insights -->
          <div class="bg-gradient-to-br from-[#081F5C] to-[#334EAC] rounded-3xl p-6 shadow-[0_15px_40px_rgba(8,31,92,0.15)] border border-white/10 text-white relative overflow-hidden transition-all duration-300 ease-out hover:shadow-2xl group/card">
            <div class="absolute -right-4 -top-4 w-32 h-32 bg-white/10 blur-[40px] rounded-full pointer-events-none"></div>
            
            <h3 class="text-[15px] font-bold tracking-tight mb-4 flex items-center gap-2 relative z-10">
              <span class="w-7 h-7 rounded-lg bg-white/10 flex items-center justify-center"><svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M21 16V8a2 2 0 0 0-1-1.73l-7-4a2 2 0 0 0-2 0l-7 4A2 2 0 0 0 3 8v8a2 2 0 0 0 1 1.73l7 4a2 2 0 0 0 2 0l7-4A2 2 0 0 0 21 16z"/><polyline points="7.5 4.21 12 6.81 16.5 4.21"/><polyline points="7.5 19.79 7.5 14.6 3 12"/><polyline points="21 12 16.5 14.6 16.5 19.79"/><polyline points="3.27 6.96 12 12.01 20.73 6.96"/><line x1="12" x2="12" y1="22.08" y2="12"/></svg></span>
              AI Moderation Insight
            </h3>
            
            <ul class="space-y-3 relative z-10">
              <li class="flex items-start gap-2.5">
                <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round" class="text-emerald-400 mt-1 shrink-0"><polyline points="20 6 9 17 4 12"/></svg>
                <p class="text-[12px] font-medium text-[#BAD6EB] leading-tight">95% jawaban bulan ini memiliki akurasi tinggi.</p>
              </li>
              <li class="flex items-start gap-2.5">
                <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round" class="text-rose-400 mt-1 shrink-0"><path d="M10.29 3.86L1.82 18a2 2 0 0 0 1.71 3h16.94a2 2 0 0 0 1.71-3L13.71 3.86a2 2 0 0 0-3.42 0z"/><line x1="12" x2="12" y1="9" y2="13"/><line x1="12" x2="12.01" y1="17" y2="17"/></svg>
                <p class="text-[12px] font-medium text-[#BAD6EB] leading-tight">Terdeteksi peningkatan duplikasi jawaban di kategori "Sistem Basis Data".</p>
              </li>
            </ul>
          </div>

          <!-- Productivity Stats -->
          <div class="bg-white/80 backdrop-blur-xl rounded-3xl p-6 shadow-[0_10px_40px_rgba(15,23,42,0.06)] border border-slate-100 transition-all duration-300 ease-out hover:shadow-xl group/card">
             <h3 class="text-[15px] font-bold text-slate-900 tracking-tight mb-5">Statistik Verifikasi Anda</h3>
             
             <div class="space-y-4">
               <div>
                 <div class="flex items-center justify-between mb-1.5">
                   <span class="text-[12px] font-bold text-slate-500">Target Harian</span>
                   <span class="text-[12px] font-bold text-slate-900 tracking-tight">15 / 20</span>
                 </div>
                 <div class="h-2 w-full bg-[#EDF1F6] rounded-full overflow-hidden">
                   <div class="h-full bg-emerald-500 rounded-full" style="width: 75%"></div>
                 </div>
               </div>

               <div class="grid grid-cols-2 gap-3 mt-4">
                 <div class="bg-slate-50 border border-slate-100 rounded-xl p-3 text-center">
                   <p class="text-[20px] font-bold text-[#334EAC] tracking-tight leading-none mb-1">342</p>
                   <p class="text-[10px] font-bold text-slate-400 uppercase tracking-widest">Total Selesai</p>
                 </div>
                 <div class="bg-slate-50 border border-slate-100 rounded-xl p-3 text-center">
                   <p class="text-[20px] font-bold text-amber-500 tracking-tight leading-none mb-1">45</p>
                   <p class="text-[10px] font-bold text-slate-400 uppercase tracking-widest">Feedback Diberikan</p>
                 </div>
               </div>
             </div>
          </div>

          <!-- Top Active Students -->
          <div class="bg-white/80 backdrop-blur-xl rounded-3xl p-6 shadow-[0_10px_40px_rgba(15,23,42,0.06)] border border-slate-100 transition-all duration-300 ease-out hover:shadow-xl group/card">
             <h3 class="text-[15px] font-bold text-slate-900 tracking-tight mb-5">Mahasiswa Teraktif Menjawab</h3>
             
             <div class="space-y-4">
               <div class="flex items-center justify-between group">
                 <div class="flex items-center gap-3">
                   <div class="w-8 h-8 rounded-full bg-[#EDF1F6] flex items-center justify-center text-[10px] font-bold text-[#081F5C] ring-2 ring-transparent group-hover:ring-[#7096D1] transition-all cursor-pointer">B</div>
                   <div>
                     <p class="text-[13px] font-bold text-[#081F5C] cursor-pointer group-hover:text-[#334EAC] transition-colors">Budi Santoso</p>
                     <p class="text-[11px] font-medium text-slate-500">24 Jawaban Valid</p>
                   </div>
                 </div>
                 <span class="text-[12px] font-bold text-amber-500 bg-amber-50 px-2 py-1 rounded-lg flex items-center gap-1"><svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="m8 3 4 8 5-5 5 15H2L8 3z"/></svg> 1</span>
               </div>
               
               <div class="flex items-center justify-between group">
                 <div class="flex items-center gap-3">
                   <div class="w-8 h-8 rounded-full bg-slate-50 flex items-center justify-center text-[10px] font-bold text-slate-600 ring-2 ring-transparent group-hover:ring-slate-300 transition-all cursor-pointer">S</div>
                   <div>
                     <p class="text-[13px] font-bold text-[#081F5C] cursor-pointer group-hover:text-[#334EAC] transition-colors">Siti Aminah</p>
                     <p class="text-[11px] font-medium text-slate-500">18 Jawaban Valid</p>
                   </div>
                 </div>
                 <span class="text-[12px] font-bold text-slate-400 bg-slate-100 px-2 py-1 rounded-lg flex items-center gap-1"><svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="m8 3 4 8 5-5 5 15H2L8 3z"/></svg> 2</span>
               </div>
             </div>
             
             <RouterLink to="/tutor/mentoring" class="mt-4 w-full block text-center py-2.5 bg-slate-50 hover:bg-[#EDF1F6] border border-slate-200 text-[#334EAC] rounded-2xl font-bold text-[12px] transition-colors">
               Lihat Leaderboard
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

<style scoped>
/* Hide scrollbar for filter tabs */
.no-scrollbar::-webkit-scrollbar {
  display: none;
}
.no-scrollbar {
  -ms-overflow-style: none;  /* IE and Edge */
  scrollbar-width: none;  /* Firefox */
}
</style>
