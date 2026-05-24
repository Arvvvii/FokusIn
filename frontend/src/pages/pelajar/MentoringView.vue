<template>
  <div class="space-y-6 animate-in fade-in duration-500">
    
    <!-- 1. Top Header -->
    <div class="mb-12 max-w-3xl">
      <h1 class="text-3xl md:text-4xl font-bold text-slate-900 tracking-tight mb-4">Mentoring 1-on-1</h1>
      <p class="text-slate-500 font-medium text-[16px] leading-relaxed">Terhubung dengan tutor universitas terkemuka dan pakar industri. Pesan sesi privat untuk mempercepat kemajuan akademikmu dan menyelesaikan masalah kompleks.</p>
    </div>

    <!-- 2. Search & Filter Section -->
    <div class="bg-white/80 backdrop-blur-xl rounded-3xl p-4 md:p-5 shadow-[0_10px_40px_rgba(15,23,42,0.06)] border border-slate-100 mb-12 flex flex-col md:flex-row gap-4 relative overflow-hidden">
      
      <!-- Search -->
      <div class="relative flex-1">
        <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none text-slate-400">
          <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><circle cx="11" cy="11" r="8"/><path d="m21 21-4.3-4.3"/></svg>
        </div>
        <input type="text" class="w-full pl-12 pr-4 py-3.5 bg-slate-50 hover:bg-slate-100/50 border-none rounded-[1.25rem] text-[15px] font-bold text-[#081F5C] placeholder-slate-400 focus:outline-none focus:ring-4 focus:ring-[#7096D1]/20 transition-all" placeholder="Cari berdasarkan nama, subjek, atau universitas...">
      </div>

      <!-- Categories -->
      <div class="relative min-w-[180px]">
        <select class="w-full pl-4 pr-10 py-3.5 bg-slate-50 hover:bg-slate-100/50 border-none rounded-[1.25rem] text-[14px] font-bold text-[#081F5C] appearance-none focus:outline-none focus:ring-4 focus:ring-[#7096D1]/20 transition-all cursor-pointer">
          <option value="">Semua Kategori</option>
          <option value="cs">Ilmu Komputer</option>
          <option value="math">Matematika</option>
          <option value="physics">Fisika</option>
        </select>
        <div class="absolute inset-y-0 right-0 pr-4 flex items-center pointer-events-none text-slate-400">
          <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"><path d="m6 9 6 6 6-6"/></svg>
        </div>
      </div>

      <!-- Rating -->
      <div class="relative min-w-[140px]">
        <select class="w-full pl-4 pr-10 py-3.5 bg-slate-50 hover:bg-slate-100/50 border-none rounded-[1.25rem] text-[14px] font-bold text-[#081F5C] appearance-none focus:outline-none focus:ring-4 focus:ring-[#7096D1]/20 transition-all cursor-pointer">
          <option value="">Semua Penilaian</option>
          <option value="4.5">4.5 ke atas</option>
          <option value="4.0">4.0 ke atas</option>
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
        <div class="bg-white/80 backdrop-blur-xl rounded-3xl p-7 shadow-[0_10px_40px_rgba(15,23,42,0.06)] border border-slate-100 transition-all duration-300 ease-out hover:-translate-y-1 hover:shadow-xl relative overflow-hidden group/card">
          <!-- Subtle Accent -->
          <div class="absolute top-0 right-0 w-32 h-32 bg-[#7096D1] rounded-full blur-3xl opacity-[0.08] pointer-events-none"></div>

          <div class="flex items-center justify-between mb-6 relative z-10">
            <h3 class="text-[17px] font-bold text-slate-900 flex items-center gap-2.5 tracking-tight">
              <span class="w-2.5 h-2.5 rounded-full bg-rose-500 animate-pulse"></span>
              Sesi Mendatang
            </h3>
            <span class="px-3 py-1 bg-[#EDF1F6] text-[#334EAC] text-[10px] font-extrabold rounded-md uppercase tracking-widest">Dalam 2 jam</span>
          </div>

          <div class="flex items-center gap-4 mb-6 relative z-10">
            <div class="w-14 h-14 rounded-2xl bg-slate-100 overflow-hidden shrink-0 border border-slate-200">
              <img src="https://i.pravatar.cc/150?u=a042581f4e29026704d" alt="Mentor" class="w-full h-full object-cover">
            </div>
            <div>
              <h4 class="text-[16px] font-extrabold text-[#081F5C] mb-1">Kalkulus Lanjut</h4>
              <p class="text-[13px] font-bold text-slate-500">dengan <span class="text-[#334EAC]">Dr. Sarah Smith</span></p>
            </div>
          </div>

          <div class="bg-slate-50 rounded-2xl p-4 mb-6 flex items-center justify-between border border-slate-100 relative z-10">
            <div class="flex items-center gap-3">
              <div class="w-10 h-10 rounded-full bg-white flex items-center justify-center text-[#334EAC] shadow-sm border border-slate-100">
                <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><rect x="3" y="4" width="18" height="18" rx="2" ry="2"/><line x1="16" y1="2" x2="16" y2="6"/><line x1="8" y1="2" x2="8" y2="6"/><line x1="3" y1="10" x2="21" y2="10"/></svg>
              </div>
              <div>
                <p class="text-[13px] font-extrabold text-[#081F5C]">Hari ini, 15:00 WIB</p>
                <p class="text-[11px] font-bold text-slate-400">45 Menit</p>
              </div>
            </div>
          </div>

          <button class="w-full py-4 bg-[#334EAC] hover:bg-[#081F5C] text-white rounded-[1.25rem] font-extrabold text-[15px] transition-all shadow-[0_4px_15px_rgba(51,78,172,0.15)] active:scale-95 flex items-center justify-center gap-2 relative z-10">
            <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"><path d="M2 12h20"/><path d="m15 5 7 7-7 7"/></svg>
            Masuk Ruang Diskusi
          </button>
        </div>

        <!-- 4. Session History Panel -->
        <div class="bg-white/80 backdrop-blur-xl rounded-3xl p-7 shadow-[0_10px_40px_rgba(15,23,42,0.06)] border border-slate-100 transition-all duration-300 ease-out hover:-translate-y-1 hover:shadow-xl">
          <div class="flex items-center justify-between mb-6">
            <h3 class="text-[16px] font-extrabold text-[#081F5C]">Riwayat Terbaru</h3>
            <button class="text-[12px] font-bold text-[#334EAC] hover:text-[#081F5C] transition-colors">Lihat Semua</button>
          </div>

          <div class="space-y-4">
            <!-- History Card -->
            <div class="flex items-start gap-4 p-4 rounded-[1.25rem] bg-slate-50/50 hover:bg-[#F7F2EB]/50 border border-transparent hover:border-slate-200/60 transition-all cursor-pointer group">
              <div class="w-10 h-10 rounded-full bg-emerald-50 flex items-center justify-center text-emerald-600 shrink-0 border border-emerald-100">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"><polyline points="20 6 9 17 4 12"/></svg>
              </div>
              <div>
                <h4 class="text-[13px] font-extrabold text-[#081F5C] mb-0.5 group-hover:text-[#334EAC] transition-colors">Kinematika OSN</h4>
                <p class="text-[11px] font-bold text-slate-500 mb-2">Prof. Anderson • 12 Mei</p>
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
                <h4 class="text-[13px] font-extrabold text-[#081F5C] mb-0.5 group-hover:text-[#334EAC] transition-colors">Struktur Data Python</h4>
                <p class="text-[11px] font-bold text-slate-500 mb-2">Budi Santoso • 08 Mei</p>
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
          <h2 class="text-2xl font-extrabold text-[#081F5C]">Rekomendasi Mentor</h2>
          <span class="text-[13px] font-bold text-slate-400">124 tersedia</span>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
          
          <!-- Mentor Card -->
          <div class="bg-white/80 backdrop-blur-xl rounded-3xl p-6 shadow-[0_10px_40px_rgba(15,23,42,0.06)] border border-slate-100 transition-all duration-300 ease-out hover:-translate-y-1 hover:shadow-xl group flex flex-col h-full">
            
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
              <p class="text-[13px] font-bold text-slate-500 mb-3">Ph.D. di Matematika • MIT</p>
              
              <div class="flex flex-wrap gap-2">
                <span class="px-2.5 py-1 bg-slate-50 text-slate-600 text-[10px] font-extrabold rounded-md border border-slate-200/60 uppercase tracking-widest">Kalkulus</span>
                <span class="px-2.5 py-1 bg-slate-50 text-slate-600 text-[10px] font-extrabold rounded-md border border-slate-200/60 uppercase tracking-widest">Aljabar</span>
              </div>
            </div>

            <div class="flex items-center justify-between pt-5 border-t border-slate-100/80">
              <div>
                <p class="text-[11px] font-bold text-slate-400 uppercase tracking-widest mb-0.5">Biaya Sesi</p>
                <p class="text-[15px] font-extrabold text-[#081F5C]">Rp 150k <span class="text-[12px] font-bold text-slate-400">/ jam</span></p>
              </div>
              <button @click="openBooking('Dr. Sarah Smith', 'Matematika')" class="px-5 py-2.5 bg-[#EDF1F6] hover:bg-[#334EAC] hover:text-white text-[#334EAC] rounded-xl font-extrabold text-[13px] transition-colors active:scale-95">
                Pesan
              </button>
            </div>
          </div>

          <!-- Mentor Card -->
          <div class="bg-white/80 backdrop-blur-xl rounded-3xl p-6 shadow-[0_10px_40px_rgba(15,23,42,0.06)] border border-slate-100 transition-all duration-300 ease-out hover:-translate-y-1 hover:shadow-xl group flex flex-col h-full">
            
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
              <p class="text-[13px] font-bold text-slate-500 mb-3">Dosen Fisika • UI</p>
              
              <div class="flex flex-wrap gap-2">
                <span class="px-2.5 py-1 bg-slate-50 text-slate-600 text-[10px] font-extrabold rounded-md border border-slate-200/60 uppercase tracking-widest">Kinematika</span>
                <span class="px-2.5 py-1 bg-slate-50 text-slate-600 text-[10px] font-extrabold rounded-md border border-slate-200/60 uppercase tracking-widest">OSN</span>
              </div>
            </div>

            <div class="flex items-center justify-between pt-5 border-t border-slate-100/80">
              <div>
                <p class="text-[11px] font-bold text-slate-400 uppercase tracking-widest mb-0.5">Biaya Sesi</p>
                <p class="text-[15px] font-extrabold text-[#081F5C]">Rp 200k <span class="text-[12px] font-bold text-slate-400">/ jam</span></p>
              </div>
              <button @click="openBooking('Prof. Anderson', 'Fisika')" class="px-5 py-2.5 bg-[#EDF1F6] hover:bg-[#334EAC] hover:text-white text-[#334EAC] rounded-xl font-extrabold text-[13px] transition-colors active:scale-95">
                Pesan
              </button>
            </div>
          </div>

          <!-- Mentor Card -->
          <div class="bg-white/80 backdrop-blur-xl rounded-3xl p-6 shadow-[0_10px_40px_rgba(15,23,42,0.06)] border border-slate-100 transition-all duration-300 ease-out hover:-translate-y-1 hover:shadow-xl group flex flex-col h-full">
            
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
                <span class="px-2.5 py-1 bg-slate-50 text-slate-600 text-[10px] font-extrabold rounded-md border border-slate-200/60 uppercase tracking-widest">Algoritma</span>
              </div>
            </div>

            <div class="flex items-center justify-between pt-5 border-t border-slate-100/80">
              <div>
                <p class="text-[11px] font-bold text-slate-400 uppercase tracking-widest mb-0.5">Biaya Sesi</p>
                <p class="text-[15px] font-extrabold text-[#081F5C]">Rp 120k <span class="text-[12px] font-bold text-slate-400">/ jam</span></p>
              </div>
              <button @click="openBooking('Budi Santoso', 'Ilmu Komputer')" class="px-5 py-2.5 bg-[#EDF1F6] hover:bg-[#334EAC] hover:text-white text-[#334EAC] rounded-xl font-extrabold text-[13px] transition-colors active:scale-95">
                Pesan
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
