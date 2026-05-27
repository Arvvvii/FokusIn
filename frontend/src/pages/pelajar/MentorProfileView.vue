<template>
  <div class="space-y-6 animate-in fade-in duration-500 pb-12">
    
    <!-- Back Navigation -->
    <div class="mb-6 flex items-center gap-2">
      <RouterLink
        to="/pelajar/mentoring"
        class="text-sm font-bold text-slate-400 hover:text-[#334EAC] transition-colors flex items-center gap-1 w-fit bg-white/50 px-3 py-1.5 rounded-lg border border-slate-200/50"
      >
        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="m15 18-6-6 6-6"></path></svg>
        Kembali ke Mentoring
      </RouterLink>
    </div>

    <!-- 1. GLASSMORPHIC HEADER SECTION -->
    <div class="bg-white/60 backdrop-blur-xl rounded-3xl p-7 md:p-8 shadow-[0_10px_40px_rgba(15,23,42,0.06)] border border-slate-200/60 relative overflow-hidden flex flex-col md:flex-row md:items-center justify-between gap-6 mb-8">
      <div class="absolute right-0 top-0 w-1/3 h-full bg-gradient-to-l from-[#EDF1F6]/80 to-transparent pointer-events-none"></div>
      
      <div class="relative z-10 flex items-center gap-4">
        <div>
          <h1 class="text-3xl md:text-4xl font-extrabold text-slate-900 tracking-tight leading-tight">Profil Mentor</h1>
          <p class="text-[15px] text-slate-600 font-medium mt-2 max-w-xl leading-relaxed">
            Lihat kredensial, ulasan, dan jadwalkan sesi mentoring.
          </p>
        </div>
      </div>
    </div>

    <div class="grid grid-cols-1 xl:grid-cols-[1fr_360px] gap-8">
      
      <!-- Left Column: Profile Info -->
      <div class="space-y-8">
        
        <!-- Hero Card -->
        <div class="bg-white/80 backdrop-blur-xl rounded-3xl p-8 md:p-10 shadow-[0_10px_40px_rgba(15,23,42,0.06)] border border-slate-100 relative overflow-hidden">
          <div class="absolute top-0 right-0 w-64 h-64 bg-gradient-to-br from-[#334EAC]/5 to-transparent rounded-bl-full pointer-events-none"></div>
          
          <div class="flex flex-col sm:flex-row items-center sm:items-start gap-8 relative z-10">
            <div class="relative shrink-0">
              <div class="w-32 h-32 rounded-3xl bg-slate-100 overflow-hidden border-4 border-white shadow-lg">
                <img src="https://i.pravatar.cc/150?u=a042581f4e29026704d" alt="Dr. Sarah Smith" class="w-full h-full object-cover">
              </div>
              <div class="absolute -bottom-2 -right-2 w-8 h-8 bg-[#334EAC] rounded-full border-4 border-white flex items-center justify-center text-white shadow-sm">
                <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="4" stroke-linecap="round" stroke-linejoin="round"><polyline points="20 6 9 17 4 12"/></svg>
              </div>
            </div>
            
            <div class="flex-1 text-center sm:text-left">
              <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4 mb-2">
                <div>
                  <h2 class="text-3xl font-bold text-slate-900 tracking-tight mb-1">Dr. Sarah Smith</h2>
                  <p class="text-[15px] font-bold text-slate-500 bg-slate-100/80 px-3 py-1 rounded-lg inline-block border border-slate-200/50">Ph.D. Matematika • MIT</p>
                </div>
                <div class="bg-[#F7F2EB] px-4 py-2 rounded-xl border border-amber-100 flex flex-col items-center justify-center shrink-0">
                  <div class="flex items-center gap-1.5 mb-0.5">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="#F59E0B" stroke="#F59E0B" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"/></svg>
                    <span class="text-xl font-bold text-[#081F5C] leading-none">4.9</span>
                  </div>
                  <span class="text-[10px] font-bold text-amber-600 uppercase tracking-widest">120 Ulasan</span>
                </div>
              </div>
              
              <p class="text-[15px] text-slate-600 leading-relaxed mb-6 max-w-2xl">
                Halo! Saya Sarah, lulusan program Ph.D. Matematika dari MIT. Saya memiliki spesialisasi dalam pengajaran matematika tingkat lanjut, termasuk kalkulus multivariabel, aljabar linear, dan persiapan intensif untuk ujian masuk universitas terkemuka. Saya percaya setiap konsep yang sulit dapat dipecah menjadi bagian-bagian logis yang mudah dipahami.
              </p>
              
              <div class="flex flex-wrap items-center justify-center sm:justify-start gap-2">
                <span class="px-3 py-1.5 bg-[#EEF3FF] text-[#334EAC] text-[12px] font-bold rounded-xl uppercase tracking-wider border border-[#D5E2F5]">Kalkulus</span>
                <span class="px-3 py-1.5 bg-[#EEF3FF] text-[#334EAC] text-[12px] font-bold rounded-xl uppercase tracking-wider border border-[#D5E2F5]">Aljabar</span>
                <span class="px-3 py-1.5 bg-[#EEF3FF] text-[#334EAC] text-[12px] font-bold rounded-xl uppercase tracking-wider border border-[#D5E2F5]">Persiapan Universitas</span>
              </div>
            </div>
          </div>
        </div>

        <!-- Experience & Credentials -->
        <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
          <div class="bg-white/80 backdrop-blur-xl rounded-3xl p-8 shadow-[0_10px_40px_rgba(15,23,42,0.06)] border border-slate-100 transition-all hover:shadow-xl">
            <h3 class="text-[15px] font-bold text-slate-900 mb-6 flex items-center gap-2">
              <span class="w-8 h-8 rounded-lg bg-emerald-50 text-emerald-500 flex items-center justify-center border border-emerald-100">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M22 10v6M2 10l10-5 10 5-10 5z"/><path d="M6 12v5c3 3 9 3 12 0v-5"/></svg>
              </span>
              Pendidikan
            </h3>
            <div class="space-y-6">
              <div class="relative pl-6 border-l-2 border-slate-100 pb-2">
                <div class="absolute -left-[9px] top-0 w-4 h-4 rounded-full bg-white border-[3px] border-[#334EAC]"></div>
                <h4 class="text-[14px] font-bold text-slate-900">Ph.D. in Applied Mathematics</h4>
                <p class="text-[13px] font-medium text-[#334EAC] mb-1">Massachusetts Institute of Technology</p>
                <p class="text-[12px] font-bold text-slate-400">2016 - 2021</p>
              </div>
              <div class="relative pl-6 border-l-2 border-slate-100 pb-2">
                <div class="absolute -left-[9px] top-0 w-4 h-4 rounded-full bg-white border-[3px] border-slate-300"></div>
                <h4 class="text-[14px] font-bold text-slate-900">B.S. in Mathematics</h4>
                <p class="text-[13px] font-medium text-slate-600 mb-1">Stanford University</p>
                <p class="text-[12px] font-bold text-slate-400">2012 - 2016</p>
              </div>
            </div>
          </div>

          <div class="bg-white/80 backdrop-blur-xl rounded-3xl p-8 shadow-[0_10px_40px_rgba(15,23,42,0.06)] border border-slate-100 transition-all hover:shadow-xl">
            <h3 class="text-[15px] font-bold text-slate-900 mb-6 flex items-center gap-2">
              <span class="w-8 h-8 rounded-lg bg-[#EEF3FF] text-[#334EAC] flex items-center justify-center border border-[#D5E2F5]">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M16 21v-2a4 4 0 0 0-4-4H6a4 4 0 0 0-4 4v2"/><circle cx="9" cy="7" r="4"/><polyline points="16 11 18 13 22 9"/></svg>
              </span>
              Pengalaman
            </h3>
            <div class="space-y-6">
              <div class="relative pl-6 border-l-2 border-slate-100 pb-2">
                <div class="absolute -left-[9px] top-0 w-4 h-4 rounded-full bg-white border-[3px] border-[#334EAC]"></div>
                <h4 class="text-[14px] font-bold text-slate-900">Senior Academic Mentor</h4>
                <p class="text-[13px] font-medium text-[#334EAC] mb-1">FokusIn Ecosystem</p>
                <p class="text-[12px] font-bold text-slate-400">2022 - Sekarang</p>
              </div>
              <div class="relative pl-6 border-l-2 border-slate-100 pb-2">
                <div class="absolute -left-[9px] top-0 w-4 h-4 rounded-full bg-white border-[3px] border-slate-300"></div>
                <h4 class="text-[14px] font-bold text-slate-900">Teaching Assistant</h4>
                <p class="text-[13px] font-medium text-slate-600 mb-1">MIT Department of Mathematics</p>
                <p class="text-[12px] font-bold text-slate-400">2018 - 2021</p>
              </div>
            </div>
          </div>
        </div>

        <!-- Student Reviews -->
        <div class="bg-white/80 backdrop-blur-xl rounded-3xl p-8 md:p-10 shadow-[0_10px_40px_rgba(15,23,42,0.06)] border border-slate-100">
          <div class="flex items-center justify-between mb-8">
            <h3 class="text-[17px] font-bold text-slate-900">Ulasan Pelajar</h3>
            <div class="flex gap-2">
              <button class="w-10 h-10 rounded-xl bg-slate-50 border border-slate-200 flex items-center justify-center text-slate-400 hover:text-slate-600 hover:bg-slate-100 transition-all">
                <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="m15 18-6-6 6-6"/></svg>
              </button>
              <button class="w-10 h-10 rounded-xl bg-slate-50 border border-slate-200 flex items-center justify-center text-slate-400 hover:text-slate-600 hover:bg-slate-100 transition-all">
                <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="m9 18 6-6-6-6"/></svg>
              </button>
            </div>
          </div>

          <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div class="p-6 bg-slate-50 rounded-2xl border border-slate-100">
              <div class="flex items-center justify-between mb-4">
                <div class="flex items-center gap-3">
                  <div class="w-10 h-10 rounded-full bg-white overflow-hidden shadow-sm">
                    <img src="https://i.pravatar.cc/150?u=a" alt="User" class="w-full h-full object-cover">
                  </div>
                  <div>
                    <h4 class="text-[13px] font-bold text-slate-900">Kevin S.</h4>
                    <p class="text-[11px] text-slate-400 font-bold">12 Mei 2026</p>
                  </div>
                </div>
                <div class="flex items-center gap-0.5">
                  <svg v-for="i in 5" :key="i" xmlns="http://www.w3.org/2000/svg" width="12" height="12" viewBox="0 0 24 24" fill="#F59E0B" stroke="#F59E0B" stroke-width="2"><polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"/></svg>
                </div>
              </div>
              <p class="text-[13px] text-slate-600 leading-relaxed font-medium">"Sangat membantu! Penjelasan Kak Sarah tentang kalkulus multivariabel sangat terstruktur dan mudah diikuti. Saya berhasil mendapatkan nilai A di ujian tengah semester."</p>
            </div>

            <div class="p-6 bg-slate-50 rounded-2xl border border-slate-100">
              <div class="flex items-center justify-between mb-4">
                <div class="flex items-center gap-3">
                  <div class="w-10 h-10 rounded-full bg-white overflow-hidden shadow-sm">
                    <img src="https://i.pravatar.cc/150?u=b" alt="User" class="w-full h-full object-cover">
                  </div>
                  <div>
                    <h4 class="text-[13px] font-bold text-slate-900">Amanda T.</h4>
                    <p class="text-[11px] text-slate-400 font-bold">05 Mei 2026</p>
                  </div>
                </div>
                <div class="flex items-center gap-0.5">
                  <svg v-for="i in 5" :key="i" xmlns="http://www.w3.org/2000/svg" width="12" height="12" viewBox="0 0 24 24" fill="#F59E0B" stroke="#F59E0B" stroke-width="2"><polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"/></svg>
                </div>
              </div>
              <p class="text-[13px] text-slate-600 leading-relaxed font-medium">"Mentoring terbaik yang pernah saya ikuti. Sangat sabar dalam menjawab semua pertanyaan saya, bahkan untuk konsep dasar yang sering saya lupakan."</p>
            </div>
          </div>
        </div>

      </div>

      <!-- Right Column: Booking & Availability -->
      <div class="space-y-6">
        
        <!-- Booking Card -->
        <div class="bg-white/90 backdrop-blur-xl rounded-3xl p-8 shadow-[0_10px_40px_rgba(15,23,42,0.06)] border border-slate-100 sticky top-8">
          <div class="flex items-center justify-between mb-6">
            <span class="text-[14px] font-bold text-slate-500 uppercase tracking-widest">Tarif Sesi</span>
            <span class="text-2xl font-bold text-[#081F5C]">Rp 150k<span class="text-[12px] text-slate-400 font-medium">/jam</span></span>
          </div>

          <div class="space-y-6 mb-8">
            <div class="flex items-start gap-4">
              <div class="w-10 h-10 rounded-xl bg-emerald-50 text-emerald-500 flex items-center justify-center shrink-0 border border-emerald-100">
                <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><rect width="18" height="18" x="3" y="4" rx="2" ry="2"/><line x1="16" x2="16" y1="2" y2="6"/><line x1="8" x2="8" y1="2" y2="6"/><line x1="3" x2="21" y1="10" y2="10"/></svg>
              </div>
              <div>
                <h4 class="text-[13px] font-bold text-slate-900 mb-1">Jadwal Tersedia</h4>
                <p class="text-[12px] font-medium text-slate-500 leading-relaxed">Tutor ini menerima jadwal mentoring dari Senin hingga Jumat, pukul 10:00 - 18:00 WIB.</p>
              </div>
            </div>

            <div class="flex items-start gap-4">
              <div class="w-10 h-10 rounded-xl bg-[#EEF3FF] text-[#334EAC] flex items-center justify-center shrink-0 border border-[#D5E2F5]">
                <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="m15.6 11.6 5.4-3.2c.5-.3 1.2 0 1.2.7v5.8c0 .7-.7 1-1.2.7l-5.4-3.2a1.2 1.2 0 0 1 0-2Z"/><rect width="14" height="14" x="2" y="5" rx="3" ry="3"/></svg>
              </div>
              <div>
                <h4 class="text-[13px] font-bold text-slate-900 mb-1">Platform Mentoring</h4>
                <p class="text-[12px] font-medium text-slate-500 leading-relaxed">Sesi dilakukan secara daring via Google Meet terintegrasi atau platform kolaborasi.</p>
              </div>
            </div>
          </div>

          <button @click="showModal = true" class="w-full py-4 bg-[#334EAC] hover:bg-[#081F5C] text-white rounded-2xl font-bold text-[15px] transition-all shadow-[0_4px_15px_rgba(51,78,172,0.15)] active:scale-95 flex items-center justify-center gap-2">
            <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"><rect width="18" height="18" x="3" y="4" rx="2" ry="2"/><line x1="16" x2="16" y1="2" y2="6"/><line x1="8" x2="8" y1="2" y2="6"/><line x1="3" x2="21" y1="10" y2="10"/></svg>
            Jadwalkan Mentoring
          </button>
        </div>

      </div>
    </div>

    <!-- Booking Modal -->
    <Teleport to="body">
      <div v-if="showModal" class="fixed inset-0 z-[100] flex items-center justify-center p-4 sm:p-6">
        <div class="absolute inset-0 bg-[#081F5C]/60 backdrop-blur-md transition-opacity" @click="closeBooking"></div>
        
        <div class="bg-white rounded-[24px] w-full max-w-xl relative z-10 shadow-2xl animate-in zoom-in-95 duration-300 overflow-hidden flex flex-col max-h-[90vh] border border-slate-100">
          
          <!-- Modal Header -->
          <div class="px-8 pt-8 pb-6 border-b border-slate-100 bg-white relative shrink-0">
            <button @click="closeBooking" class="absolute top-6 right-6 w-8 h-8 flex items-center justify-center rounded-full bg-slate-50 text-slate-400 hover:bg-slate-100 hover:text-slate-600 transition-colors">
              <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M18 6 6 18"/><path d="m6 6 12 12"/></svg>
            </button>
            <div class="flex items-center gap-5">
              <div class="w-14 h-14 rounded-2xl bg-[#EEF3FF] text-[#334EAC] flex items-center justify-center shrink-0 border border-[#D5E2F5]">
                <svg xmlns="http://www.w3.org/2000/svg" width="26" height="26" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><rect width="18" height="18" x="3" y="4" rx="2" ry="2"/><line x1="16" x2="16" y1="2" y2="6"/><line x1="8" x2="8" y1="2" y2="6"/><line x1="3" x2="21" y1="10" y2="10"/></svg>
              </div>
              <div>
                <h2 class="text-2xl font-bold text-slate-900 tracking-tight">Jadwalkan Mentoring</h2>
                <p class="text-[14px] font-medium text-slate-500 mt-1">
                  Sesi 1-on-1 dengan <span class="font-bold text-[#334EAC]">Dr. Sarah Smith</span>
                </p>
              </div>
            </div>
          </div>
          
          <!-- Modal Body -->
          <div class="p-8 overflow-y-auto custom-scrollbar bg-slate-50/50">
            <div class="space-y-6">
              <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div class="space-y-2">
                  <label class="block text-[12px] font-bold text-slate-600 ml-1">Tanggal Sesi</label>
                  <div class="relative">
                    <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none text-slate-400">
                      <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><rect width="18" height="18" x="3" y="4" rx="2" ry="2"/><line x1="16" x2="16" y1="2" y2="6"/><line x1="8" x2="8" y1="2" y2="6"/><line x1="3" x2="21" y1="10" y2="10"/></svg>
                    </div>
                    <input type="date" class="w-full pl-11 pr-4 py-3.5 bg-white border border-slate-200 hover:border-[#7096D1] rounded-2xl text-[14px] font-bold text-slate-900 focus:outline-none focus:ring-2 focus:ring-[#334EAC] focus:border-transparent transition-all shadow-sm">
                  </div>
                </div>
                <div class="space-y-2">
                  <label class="block text-[12px] font-bold text-slate-600 ml-1">Waktu Mulai</label>
                  <div class="relative">
                    <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none text-slate-400">
                      <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"/><polyline points="12 6 12 12 16 14"/></svg>
                    </div>
                    <select class="w-full pl-11 pr-4 py-3.5 bg-white border border-slate-200 hover:border-[#7096D1] rounded-2xl text-[14px] font-bold text-slate-900 focus:outline-none focus:ring-2 focus:ring-[#334EAC] focus:border-transparent transition-all shadow-sm appearance-none cursor-pointer">
                      <option value="">Pilih Jam</option>
                      <option value="10:00">10:00 WIB</option>
                      <option value="13:00">13:00 WIB</option>
                      <option value="15:00">15:00 WIB</option>
                    </select>
                    <div class="absolute inset-y-0 right-0 pr-4 flex items-center pointer-events-none text-slate-400">
                      <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"><path d="m6 9 6 6 6-6"/></svg>
                    </div>
                  </div>
                </div>
              </div>
              
              <div class="space-y-2">
                <label class="block text-[12px] font-bold text-slate-600 ml-1">Topik Mentoring</label>
                <input type="text" class="w-full px-5 py-3.5 bg-white border border-slate-200 hover:border-[#7096D1] rounded-2xl text-[14px] font-bold text-slate-900 focus:outline-none focus:ring-2 focus:ring-[#334EAC] focus:border-transparent transition-all shadow-sm placeholder-slate-400" placeholder="Contoh: Persiapan UTS Kalkulus Lanjut, Review Algoritma">
              </div>
              
              <div class="space-y-2">
                <label class="block text-[12px] font-bold text-slate-600 ml-1">Catatan Tambahan (Opsional)</label>
                <textarea rows="3" class="w-full px-5 py-3.5 bg-white border border-slate-200 hover:border-[#7096D1] rounded-2xl text-[14px] font-medium text-slate-700 focus:outline-none focus:ring-2 focus:ring-[#334EAC] focus:border-transparent transition-all shadow-sm resize-none placeholder-slate-400" placeholder="Ada materi spesifik yang ingin dibahas? Tuliskan secara detail di sini."></textarea>
              </div>
            </div>
          </div>
          
          <!-- Modal Footer -->
          <div class="px-8 py-6 bg-white border-t border-slate-100 flex items-center justify-end gap-3 rounded-b-[24px] shrink-0">
            <button @click="closeBooking" class="px-6 py-3.5 text-[14px] font-bold text-slate-600 hover:bg-slate-50 bg-white border border-slate-200 hover:border-slate-300 rounded-xl transition-all shadow-sm active:scale-95">Batalkan</button>
            <button @click="submitBooking" class="px-8 py-3.5 bg-[#334EAC] hover:bg-[#081F5C] text-white text-[14px] font-bold rounded-xl transition-all shadow-[0_4px_15px_rgba(51,78,172,0.15)] active:scale-95 flex items-center gap-2">
              Konfirmasi Booking
            </button>
          </div>
        </div>
      </div>
    </Teleport>

    <!-- Success Toast -->
    <Teleport to="body">
      <div v-if="showSuccess" class="fixed bottom-6 right-6 z-[100] bg-emerald-500 text-white px-6 py-4 rounded-2xl shadow-[0_10px_40px_rgba(16,185,129,0.3)] flex items-center gap-3 animate-in slide-in-from-bottom-5">
        <div class="w-8 h-8 bg-white/20 rounded-full flex items-center justify-center shrink-0">
          <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"><polyline points="20 6 9 17 4 12"/></svg>
        </div>
        <div>
          <h4 class="font-extrabold text-sm">Booking Berhasil!</h4>
          <p class="text-xs text-emerald-100 font-medium">Jadwalmu telah ditambahkan ke dashboard.</p>
        </div>
      </div>
    </Teleport>

  </div>
</template>

<script setup>
import { ref } from 'vue'
import { RouterLink } from 'vue-router'

const showModal = ref(false)
const showSuccess = ref(false)

const closeBooking = () => {
  showModal.value = false
}

const submitBooking = () => {
  showModal.value = false
  showSuccess.value = true
  setTimeout(() => {
    showSuccess.value = false
  }, 3000)
}
</script>
