<template>
  <div class="space-y-6 animate-in fade-in duration-500 max-w-7xl mx-auto">
    
    <!-- 1. Top Header -->
    <div class="mb-6 max-w-3xl">
      <h1 class="text-xl md:text-2xl font-bold text-slate-900 tracking-tight mb-1">Workspace Mentoring Akademik</h1>
      <p class="text-slate-500 font-normal text-xs md:text-sm leading-relaxed">Jadwalkan asistensi dan bimbingan belajar 1-on-1 bersama tutor universitas dan asisten mahasiswa pilihan untuk menunjang capaian akademismu.</p>
    </div>

    <!-- 2. Search & Filter Section -->
    <div class="bg-white rounded-2xl p-4 shadow-sm border border-slate-200/80 mb-6 flex flex-col md:flex-row gap-3.5 relative overflow-hidden">
      
      <!-- Search -->
      <div class="relative flex-1">
        <div class="absolute inset-y-0 left-0 pl-3.5 flex items-center pointer-events-none text-slate-400">
          <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><circle cx="11" cy="11" r="8"/><path d="m21 21-4.3-4.3"/></svg>
        </div>
        <input type="text" class="w-full pl-9 pr-4 py-2 bg-white border border-slate-200 rounded-xl text-xs font-bold text-[#081F5C] placeholder-slate-400 focus:outline-none focus:border-[#7096D1] focus:ring-2 focus:ring-[#7096D1]/10 transition-all shadow-sm" placeholder="Cari nama, mata pelajaran, atau instansi universitas...">
      </div>

      <!-- Categories -->
      <div class="relative min-w-[150px]">
        <select class="w-full pl-3 pr-8 py-2 bg-white border border-slate-200 rounded-xl text-xs font-bold text-[#081F5C] appearance-none focus:outline-none focus:border-[#7096D1] transition-all cursor-pointer shadow-sm">
          <option value="">Semua Kategori</option>
          <option value="cs">Ilmu Komputer</option>
          <option value="math">Matematika</option>
          <option value="physics">Fisika</option>
        </select>
        <div class="absolute inset-y-0 right-0 pr-3 flex items-center pointer-events-none text-slate-400">
          <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"><path d="m6 9 6 6 6-6"/></svg>
        </div>
      </div>

      <!-- Rating -->
      <div class="relative min-w-[130px]">
        <select class="w-full pl-3 pr-8 py-2 bg-white border border-slate-200 rounded-xl text-xs font-bold text-[#081F5C] appearance-none focus:outline-none focus:border-[#7096D1] transition-all cursor-pointer shadow-sm">
          <option value="">Semua Penilaian</option>
          <option value="4.5">4.5 ke atas</option>
          <option value="4.0">4.0 ke atas</option>
        </select>
        <div class="absolute inset-y-0 right-0 pr-3 flex items-center pointer-events-none text-slate-400">
          <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"><path d="m6 9 6 6 6-6"/></svg>
        </div>
      </div>

      <!-- Filter Button -->
      <button class="px-4 py-2 bg-[#334EAC] hover:bg-[#081F5C] text-white rounded-xl font-bold text-xs transition-all shadow-sm active:scale-95 shrink-0 flex items-center justify-center gap-1.5">
        <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"><path d="M22 3H2l8 9.46V19l4 2v-8.54L22 3z"/></svg>
        Filter
      </button>

    </div>

    <!-- Layout: Left (Upcoming/History) and Right (Mentors) -->
    <div class="flex flex-col xl:flex-row gap-6">
      
      <!-- LEFT PANEL: Sessions -->
      <div class="w-full xl:w-[35%] shrink-0 space-y-6">
        
        <!-- 3. Upcoming Session Card: Styled as academic schedule panel -->
        <div class="bg-white rounded-2xl p-5 shadow-sm border border-slate-200/80 transition-all duration-200 relative overflow-hidden">
          <div class="flex items-center justify-between mb-4">
            <h3 class="text-xs font-bold text-slate-400 uppercase tracking-widest flex items-center gap-2">
              <span class="w-2 h-2 rounded-full bg-rose-500 animate-pulse"></span>
              Jadwal Sesi Terdekat
            </h3>
            <span class="px-2 py-0.5 bg-[#EDF1F6] text-[#334EAC] text-[9px] font-bold rounded uppercase tracking-wider">Mulai 2 Jam Lagi</span>
          </div>

          <div class="flex items-center gap-3 mb-4">
            <div class="w-10 h-10 rounded-xl bg-slate-100 overflow-hidden shrink-0 border border-slate-200">
              <img src="https://i.pravatar.cc/150?u=a042581f4e29026704d" alt="Mentor" class="w-full h-full object-cover">
            </div>
            <div>
              <h4 class="text-sm font-bold text-[#081F5C] mb-0.5">Kalkulus Lanjut</h4>
              <p class="text-[11px] text-slate-400">Tutor: <span class="text-[#334EAC] font-bold">Dr. Sarah Smith</span></p>
            </div>
          </div>

          <div class="bg-slate-50 rounded-xl p-3 mb-4 flex items-center justify-between border border-slate-200/40">
            <div class="flex items-center gap-2.5">
              <div class="w-7 h-7 rounded-lg bg-white flex items-center justify-center text-[#334EAC] border border-slate-200/60 shadow-sm">
                <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><rect x="3" y="4" width="18" height="18" rx="2" ry="2"/><line x1="16" y1="2" x2="16" y2="6"/><line x1="8" y1="2" x2="8" y2="6"/><line x1="3" y1="10" x2="21" y2="10"/></svg>
              </div>
              <div>
                <p class="text-[11px] font-bold text-[#081F5C]">Hari ini, 15:00 WIB</p>
                <p class="text-[9px] text-slate-400">Asistensi Daring • 45 Menit</p>
              </div>
            </div>
          </div>

          <button class="w-full py-2.5 bg-[#334EAC] hover:bg-[#081F5C] text-white rounded-xl font-bold text-xs transition-all shadow-sm active:scale-95 flex items-center justify-center gap-1.5">
            <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"><path d="M2 12h20"/><path d="m15 5 7 7-7 7"/></svg>
            Masuk Ruang Mentoring
          </button>
        </div>

        <!-- 4. Session History Panel -->
        <div class="bg-white rounded-2xl p-5 shadow-sm border border-slate-200/80 transition-all duration-200">
          <div class="flex items-center justify-between mb-4">
            <h3 class="text-xs font-bold text-[#081F5C] uppercase tracking-wider">Riwayat Sesi Selesai</h3>
            <button class="text-[11px] font-bold text-[#334EAC] hover:text-[#081F5C] transition-colors">Lihat Semua</button>
          </div>

          <div class="space-y-3">
            <!-- History Card -->
            <div class="flex items-start gap-3 p-3 rounded-xl bg-slate-50 hover:bg-[#F7F2EB]/50 border border-slate-200/40 hover:border-slate-200 transition-all cursor-pointer group">
              <div class="w-8 h-8 rounded-lg bg-emerald-50 flex items-center justify-center text-emerald-600 shrink-0 border border-emerald-100">
                <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"><polyline points="20 6 9 17 4 12"/></svg>
              </div>
              <div class="min-w-0 flex-1">
                <h4 class="text-xs font-bold text-[#081F5C] mb-0.5 group-hover:text-[#334EAC] transition-colors truncate">Kinematika OSN</h4>
                <p class="text-[10px] text-slate-500 mb-1.5">Prof. Anderson • 12 Mei</p>
                <div class="flex items-center gap-0.5">
                  <svg v-for="i in 5" :key="i" xmlns="http://www.w3.org/2000/svg" width="8" height="8" viewBox="0 0 24 24" fill="#F59E0B" stroke="#F59E0B" stroke-width="2"><polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"/></svg>
                </div>
              </div>
            </div>

            <!-- History Card -->
            <div class="flex items-start gap-3 p-3 rounded-xl bg-slate-50 hover:bg-[#F7F2EB]/50 border border-slate-200/40 hover:border-slate-200 transition-all cursor-pointer group">
              <div class="w-8 h-8 rounded-lg bg-emerald-50 flex items-center justify-center text-emerald-600 shrink-0 border border-emerald-100">
                <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"><polyline points="20 6 9 17 4 12"/></svg>
              </div>
              <div class="min-w-0 flex-1">
                <h4 class="text-xs font-bold text-[#081F5C] mb-0.5 group-hover:text-[#334EAC] transition-colors truncate">Struktur Data Python</h4>
                <p class="text-[10px] text-slate-500 mb-1.5">Budi Santoso • 08 Mei</p>
                <div class="flex items-center gap-0.5">
                  <svg v-for="i in 5" :key="i" xmlns="http://www.w3.org/2000/svg" width="8" height="8" viewBox="0 0 24 24" fill="#F59E0B" stroke="#F59E0B" stroke-width="2"><polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"/></svg>
                </div>
              </div>
            </div>

          </div>
        </div>

      </div>

      <!-- RIGHT PANEL: Recommended Mentors -->
      <div class="flex-1 w-full xl:w-[65%] min-w-0">
        
        <div class="flex items-center justify-between mb-4">
          <h2 class="text-base font-bold text-[#081F5C]">Rekomendasi Pembimbing Akademik</h2>
          <span class="text-xs text-slate-400">124 tutor aktif</span>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
          
          <!-- Mentor Card 1 -->
          <div class="bg-white rounded-2xl p-5 border border-slate-200 shadow-sm flex flex-col justify-between h-full relative">
            
            <!-- TOP SECTION: avatar + name + verified + rating -->
            <div class="flex items-start justify-between mb-3.5">
              <div class="flex items-center gap-3">
                <div class="relative shrink-0">
                  <div class="w-12 h-12 rounded-full bg-slate-100 overflow-hidden border border-slate-200">
                    <img src="https://i.pravatar.cc/150?u=a042581f4e29026704d" alt="Dr. Sarah Smith" class="w-full h-full object-cover">
                  </div>
                  <!-- Verification Badge Subtle -->
                  <div class="absolute -bottom-0.5 -right-0.5 w-4 h-4 bg-[#334EAC] rounded-full border border-white flex items-center justify-center text-white shadow-sm">
                    <svg xmlns="http://www.w3.org/2000/svg" width="8" height="8" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="4" stroke-linecap="round" stroke-linejoin="round"><polyline points="20 6 9 17 4 12"/></svg>
                  </div>
                </div>
                <div>
                  <h3 class="text-sm font-bold text-[#081F5C] leading-tight">Dr. Sarah Smith</h3>
                  <p class="text-[10px] font-bold text-slate-400">Ph.D. Matematika • MIT</p>
                </div>
              </div>

              <!-- Rating compact di kanan atas -->
              <div class="bg-[#F7F2EB] px-2 py-0.5 rounded border border-amber-100 flex items-center gap-0.5 shrink-0">
                <svg xmlns="http://www.w3.org/2000/svg" width="10" height="10" viewBox="0 0 24 24" fill="#F59E0B" stroke="#F59E0B" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"/></svg>
                <span class="text-[10px] font-bold text-[#081F5C]">4.9</span>
              </div>
            </div>

            <!-- MIDDLE SECTION: specialization, bio / institution, tags -->
            <div class="mb-4 flex-1">
              <p class="text-xs text-slate-500 leading-relaxed mb-3">Spesialisasi pengajaran matematika kalkulus multivariabel, aljabar linear, dan persiapan ujian universitas.</p>
              
              <div class="flex flex-wrap gap-1.5">
                <span class="px-2 py-0.5 bg-slate-100 text-slate-600 text-[9px] font-bold rounded uppercase tracking-wider">Kalkulus</span>
                <span class="px-2 py-0.5 bg-slate-100 text-slate-600 text-[9px] font-bold rounded uppercase tracking-wider">Aljabar</span>
              </div>
            </div>

            <!-- BOTTOM SECTION: pricing + availability + CTA -->
            <div class="pt-3.5 border-t border-slate-100 flex flex-col gap-3">
              <div class="flex justify-between items-center text-xs">
                <span class="text-slate-400 font-semibold">Tersedia: <span class="text-slate-700">Senin - Jumat</span></span>
                <span class="text-[#081F5C] font-bold">Rp 150k <span class="text-[10px] text-slate-400 font-normal">/ jam</span></span>
              </div>
              <button @click="openBooking('Dr. Sarah Smith', 'Matematika')" class="w-full py-2.5 bg-[#EDF1F6] hover:bg-[#334EAC] hover:text-white text-[#334EAC] rounded-xl font-bold text-xs transition-colors shadow-sm text-center">
                Pesan Mentoring
              </button>
            </div>
          </div>

          <!-- Mentor Card 2 -->
          <div class="bg-white rounded-2xl p-5 border border-slate-200 shadow-sm flex flex-col justify-between h-full relative">
            
            <!-- TOP SECTION: avatar + name + verified + rating -->
            <div class="flex items-start justify-between mb-3.5">
              <div class="flex items-center gap-3">
                <div class="relative shrink-0">
                  <div class="w-12 h-12 rounded-full bg-slate-100 overflow-hidden border border-slate-200">
                    <img src="https://i.pravatar.cc/150?u=1" alt="Prof. Anderson" class="w-full h-full object-cover">
                  </div>
                  <!-- Verification Badge Subtle -->
                  <div class="absolute -bottom-0.5 -right-0.5 w-4 h-4 bg-[#334EAC] rounded-full border border-white flex items-center justify-center text-white shadow-sm">
                    <svg xmlns="http://www.w3.org/2000/svg" width="8" height="8" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="4" stroke-linecap="round" stroke-linejoin="round"><polyline points="20 6 9 17 4 12"/></svg>
                  </div>
                </div>
                <div>
                  <h3 class="text-sm font-bold text-[#081F5C] leading-tight">Prof. Anderson</h3>
                  <p class="text-[10px] font-bold text-slate-400">Dosen Fisika • UI</p>
                </div>
              </div>

              <!-- Rating compact di kanan atas -->
              <div class="bg-[#F7F2EB] px-2 py-0.5 rounded border border-amber-100 flex items-center gap-0.5 shrink-0">
                <svg xmlns="http://www.w3.org/2000/svg" width="10" height="10" viewBox="0 0 24 24" fill="#F59E0B" stroke="#F59E0B" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"/></svg>
                <span class="text-[10px] font-bold text-[#081F5C]">4.8</span>
              </div>
            </div>

            <!-- MIDDLE SECTION: specialization, bio / institution, tags -->
            <div class="mb-4 flex-1">
              <p class="text-xs text-slate-500 leading-relaxed mb-3">Persiapan intensif kompetisi sains Fisika, mekanika klasik, termodinamika, dan kinematika dasar.</p>
              
              <div class="flex flex-wrap gap-1.5">
                <span class="px-2 py-0.5 bg-slate-100 text-slate-600 text-[9px] font-bold rounded uppercase tracking-wider">Kinematika</span>
                <span class="px-2 py-0.5 bg-slate-100 text-slate-600 text-[9px] font-bold rounded uppercase tracking-wider">OSN</span>
              </div>
            </div>

            <!-- BOTTOM SECTION: pricing + availability + CTA -->
            <div class="pt-3.5 border-t border-slate-100 flex flex-col gap-3">
              <div class="flex justify-between items-center text-xs">
                <span class="text-slate-400 font-semibold">Tersedia: <span class="text-slate-700">Sabtu - Minggu</span></span>
                <span class="text-[#081F5C] font-bold">Rp 200k <span class="text-[10px] text-slate-400 font-normal">/ jam</span></span>
              </div>
              <button @click="openBooking('Prof. Anderson', 'Fisika')" class="w-full py-2.5 bg-[#EDF1F6] hover:bg-[#334EAC] hover:text-white text-[#334EAC] rounded-xl font-bold text-xs transition-colors shadow-sm text-center">
                Pesan Mentoring
              </button>
            </div>
          </div>

          <!-- Mentor Card 3 -->
          <div class="bg-white rounded-2xl p-5 border border-slate-200 shadow-sm flex flex-col justify-between h-full relative">
            
            <!-- TOP SECTION: avatar + name + verified + rating -->
            <div class="flex items-start justify-between mb-3.5">
              <div class="flex items-center gap-3">
                <div class="relative shrink-0">
                  <div class="w-12 h-12 rounded-full bg-[#EDF1F6] overflow-hidden border border-slate-200 flex items-center justify-center font-extrabold text-[#334EAC] text-xs">
                    BS
                  </div>
                </div>
                <div>
                  <h3 class="text-sm font-bold text-[#081F5C] leading-tight">Budi Santoso</h3>
                  <p class="text-[10px] font-bold text-slate-400">Senior Dev • Gojek</p>
                </div>
              </div>

              <!-- Rating compact di kanan atas -->
              <div class="bg-[#F7F2EB] px-2 py-0.5 rounded border border-amber-100 flex items-center gap-0.5 shrink-0">
                <svg xmlns="http://www.w3.org/2000/svg" width="10" height="10" viewBox="0 0 24 24" fill="#F59E0B" stroke="#F59E0B" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"/></svg>
                <span class="text-[10px] font-bold text-[#081F5C]">4.5</span>
              </div>
            </div>

            <!-- MIDDLE SECTION: specialization, bio / institution, tags -->
            <div class="mb-4 flex-1">
              <p class="text-xs text-slate-500 leading-relaxed mb-3">Mentoring pemrograman frontend modern, Vue.js Composition API, struktur data, dan arsitektur kode.</p>
              
              <div class="flex flex-wrap gap-1.5">
                <span class="px-2 py-0.5 bg-slate-100 text-slate-600 text-[9px] font-bold rounded uppercase tracking-wider">Vue.js</span>
                <span class="px-2 py-0.5 bg-slate-100 text-slate-600 text-[9px] font-bold rounded uppercase tracking-wider">Algoritma</span>
              </div>
            </div>

            <!-- BOTTOM SECTION: pricing + availability + CTA -->
            <div class="pt-3.5 border-t border-slate-100 flex flex-col gap-3">
              <div class="flex justify-between items-center text-xs">
                <span class="text-slate-400 font-semibold">Tersedia: <span class="text-slate-700">Malam Hari</span></span>
                <span class="text-[#081F5C] font-bold">Rp 120k <span class="text-[10px] text-slate-400 font-normal">/ jam</span></span>
              </div>
              <button @click="openBooking('Budi Santoso', 'Ilmu Komputer')" class="w-full py-2.5 bg-[#EDF1F6] hover:bg-[#334EAC] hover:text-white text-[#334EAC] rounded-xl font-bold text-xs transition-colors shadow-sm text-center">
                Pesan Mentoring
              </button>
            </div>
          </div>

        </div>
      </div>
      
    </div>

    <!-- Booking Modal -->
    <div v-if="showModal" class="fixed inset-0 z-50 flex items-center justify-center p-4">
      <div class="absolute inset-0 bg-slate-900/40 backdrop-blur-sm" @click="closeBooking"></div>
      <div class="bg-white/90 backdrop-blur-xl rounded-3xl border border-white/50 w-full max-w-lg relative z-10 shadow-[0_20px_60px_rgba(15,23,42,0.15)] animate-in zoom-in-95 duration-200 overflow-hidden flex flex-col max-h-[90vh]">
        <div class="p-6 md:p-8 border-b border-slate-100 overflow-y-auto">
          <h2 class="text-2xl font-extrabold text-[#081F5C] mb-2">Booking Mentor</h2>
          <p class="text-sm font-bold text-slate-500 mb-6">Jadwalkan sesi 1-on-1 dengan {{ selectedMentor.name }} ({{ selectedMentor.expertise }})</p>
          
          <div class="space-y-5">
            <div>
              <label class="block text-xs font-extrabold text-slate-500 uppercase tracking-widest mb-2">Tanggal</label>
              <input type="date" class="w-full bg-slate-50 border border-slate-200 rounded-xl px-4 py-3 text-sm font-bold text-[#081F5C] focus:outline-none focus:ring-4 focus:ring-[#7096D1]/20 focus:border-[#7096D1] transition-all">
            </div>
            <div>
              <label class="block text-xs font-extrabold text-slate-500 uppercase tracking-widest mb-2">Waktu</label>
              <select class="w-full bg-slate-50 border border-slate-200 rounded-xl px-4 py-3 text-sm font-bold text-[#081F5C] focus:outline-none focus:ring-4 focus:ring-[#7096D1]/20 focus:border-[#7096D1] transition-all appearance-none cursor-pointer">
                <option value="">Pilih Jam</option>
                <option value="10:00">10:00 WIB</option>
                <option value="13:00">13:00 WIB</option>
                <option value="15:00">15:00 WIB</option>
              </select>
            </div>
            <div>
              <label class="block text-xs font-extrabold text-slate-500 uppercase tracking-widest mb-2">Topik Mentoring</label>
              <input type="text" class="w-full bg-slate-50 border border-slate-200 rounded-xl px-4 py-3 text-sm font-bold text-[#081F5C] focus:outline-none focus:ring-4 focus:ring-[#7096D1]/20 focus:border-[#7096D1] transition-all placeholder-slate-400" placeholder="Contoh: Persiapan UTS Kalkulus Lanjut">
            </div>
            <div>
              <label class="block text-xs font-extrabold text-slate-500 uppercase tracking-widest mb-2">Catatan Tambahan (Opsional)</label>
              <textarea rows="3" class="w-full bg-slate-50 border border-slate-200 rounded-xl px-4 py-3 text-sm font-medium text-slate-700 focus:outline-none focus:ring-4 focus:ring-[#7096D1]/20 focus:border-[#7096D1] transition-all resize-none placeholder-slate-400" placeholder="Ada materi spesifik yang ingin dibahas?"></textarea>
            </div>
          </div>
        </div>
        <div class="p-6 bg-slate-50/80 flex items-center justify-end gap-3 rounded-b-3xl">
          <button @click="closeBooking" class="px-6 py-2.5 text-sm font-bold text-slate-500 hover:text-[#081F5C] hover:bg-slate-200/50 rounded-xl transition-all">Batalkan</button>
          <button @click="submitBooking" class="px-6 py-2.5 bg-[#334EAC] hover:bg-[#081F5C] text-white text-sm font-extrabold rounded-xl transition-all shadow-md active:scale-95">Konfirmasi Booking</button>
        </div>
      </div>
    </div>

    <!-- Success Toast -->
    <div v-if="showSuccess" class="fixed bottom-6 right-6 z-50 bg-emerald-500 text-white px-6 py-4 rounded-2xl shadow-[0_10px_40px_rgba(16,185,129,0.3)] flex items-center gap-3 animate-in slide-in-from-bottom-5">
      <div class="w-8 h-8 bg-white/20 rounded-full flex items-center justify-center shrink-0">
        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"><polyline points="20 6 9 17 4 12"/></svg>
      </div>
      <div>
        <h4 class="font-extrabold text-sm">Booking Berhasil!</h4>
        <p class="text-xs text-emerald-100 font-medium">Jadwalmu telah ditambahkan ke dashboard.</p>
      </div>
    </div>

  </div>
</template>

<script setup>
import { ref } from 'vue'

const showModal = ref(false)
const showSuccess = ref(false)
const selectedMentor = ref({ name: '', expertise: '' })

const openBooking = (name, expertise) => {
  selectedMentor.value = { name, expertise }
  showModal.value = true
}

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
