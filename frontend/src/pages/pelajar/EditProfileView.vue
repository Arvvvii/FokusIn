<template>
  <div class="space-y-6 md:space-y-8 animate-in fade-in duration-500 min-w-0 max-w-7xl mx-auto">
    
    <!-- Back Navigation -->
    <div class="mb-6 flex items-center gap-2">
      <RouterLink
        to="/pelajar/profile"
        class="text-sm font-bold text-slate-400 hover:text-[#334EAC] transition-colors flex items-center gap-1 w-fit bg-white/50 px-3 py-1.5 rounded-lg border border-slate-200/50"
      >
        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="m15 18-6-6 6-6"></path></svg>
        Kembali ke Profil
      </RouterLink>
    </div>

    <!-- 1. GLASSMORPHIC HEADER SECTION -->
    <div class="page-header-banner p-7 md:p-8 flex flex-col md:flex-row md:items-center justify-between gap-6 mb-8">
      <div class="absolute right-0 top-0 w-1/3 h-full bg-gradient-to-l from-[#EDF1F6]/80 to-transparent pointer-events-none"></div>
      
      <div class="relative z-10 flex items-center gap-4">
        <span class="w-12 h-12 rounded-2xl bg-[#334EAC]/10 text-[#334EAC] flex items-center justify-center shrink-0">
          <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"/><circle cx="12" cy="7" r="4"/></svg>
        </span>
        <div>
          <h1 class="text-3xl md:text-4xl font-extrabold text-slate-900 tracking-tight leading-tight">Edit Profil Akademik</h1>
          <p class="text-[15px] text-slate-600 font-medium mt-2 max-w-xl leading-relaxed">
            Sesuaikan identitas akademik dan preferensi belajar Anda.
          </p>
        </div>
      </div>
      <div class="relative z-10 flex items-center gap-4">
        <div class="w-12 h-12 rounded-full bg-[#EDF1F6] flex items-center justify-center shrink-0 border border-slate-200 overflow-hidden shadow-sm">
           <img src="https://i.pravatar.cc/300?u=a042581f4e29026704d" alt="Profile Badge" class="w-full h-full object-cover">
        </div>
      </div>
    </div>

    <!-- MAIN EDIT LAYOUT -->
    <div class="flex flex-col xl:flex-row gap-6 md:gap-8 relative">
      
      <!-- LEFT CONTENT (FORM) -->
      <div class="flex-1 space-y-6 md:space-y-8 min-w-0">
        
        <!-- 2. PROFILE HERO EDIT CARD -->
        <div class="card-base overflow-hidden group/card">
          <!-- Cover -->
          <div class="h-40 md:h-48 bg-gradient-to-br from-[#081F5C] via-[#334EAC] to-[#7096D1] relative">
            <button class="absolute top-4 right-4 p-2 bg-black/20 hover:bg-black/40 backdrop-blur-md rounded-xl text-white transition-colors">
              <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M21.174 6.812a1 1 0 0 0-3.986-3.987L3.842 16.174a2 2 0 0 0-.5.83l-1.321 4.352a.5.5 0 0 0 .623.622l4.353-1.32a2 2 0 0 0 .83-.497z"/><path d="m15 5 4 4"/></svg>
            </button>
          </div>
          
          <div class="p-6 md:p-8 relative">
            <!-- Avatar Edit -->
            <div class="absolute -top-16 left-6 md:left-8 group/avatar">
              <div class="w-24 h-24 md:w-32 md:h-32 rounded-full border-4 border-white shadow-lg overflow-hidden bg-white relative cursor-pointer">
                <img src="https://i.pravatar.cc/300?u=a042581f4e29026704d" alt="Avatar" class="w-full h-full object-cover transition-transform duration-300 group-hover/avatar:scale-105">
                <div class="absolute inset-0 bg-black/40 opacity-0 group-hover/avatar:opacity-100 transition-opacity flex items-center justify-center">
                  <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="white" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M23 19a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2V8a2 2 0 0 1 2-2h4l2-3h6l2 3h4a2 2 0 0 1 2 2z"/><circle cx="12" cy="13" r="4"/></svg>
                </div>
              </div>
            </div>
            
            <div class="mt-12 md:mt-16 space-y-5">
              <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
                <div class="space-y-1.5">
                  <label class="text-[12px] font-bold text-slate-500 uppercase tracking-wider ml-1">Nama Lengkap</label>
                  <input type="text" value="John Doe" class="w-full px-4 py-3 bg-[#F7F2EB]/50 border border-slate-200 rounded-2xl text-[14px] font-bold text-[#081F5C] focus:bg-white focus:border-[#334EAC] focus:ring-4 focus:ring-[#334EAC]/10 transition-all outline-none">
                </div>
                <div class="space-y-1.5">
                  <label class="text-[12px] font-bold text-slate-500 uppercase tracking-wider ml-1">Username</label>
                  <div class="relative">
                    <span class="absolute left-4 top-1/2 -translate-y-1/2 text-slate-400 font-bold">@</span>
                    <input type="text" value="johndoe_cs" class="w-full pl-9 pr-4 py-3 bg-[#F7F2EB]/50 border border-slate-200 rounded-2xl text-[14px] font-bold text-[#081F5C] focus:bg-white focus:border-[#334EAC] focus:ring-4 focus:ring-[#334EAC]/10 transition-all outline-none">
                  </div>
                </div>
              </div>
              <div class="space-y-1.5">
                <label class="text-[12px] font-bold text-slate-500 uppercase tracking-wider ml-1">Bio</label>
                <textarea rows="3" class="w-full px-4 py-3 bg-[#F7F2EB]/50 border border-slate-200 rounded-2xl text-[14px] font-medium text-slate-600 focus:bg-white focus:border-[#334EAC] focus:ring-4 focus:ring-[#334EAC]/10 transition-all outline-none resize-none">Mahasiswa S1 dengan fokus pada Kecerdasan Buatan dan Sistem Terdistribusi. Aktif mengeksplorasi persimpangan antara Data Science dan Software Engineering.</textarea>
              </div>
              <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
                 <div class="space-y-1.5">
                  <label class="text-[12px] font-bold text-slate-500 uppercase tracking-wider ml-1">Peran Akademik</label>
                  <select class="w-full px-4 py-3 bg-[#F7F2EB]/50 border border-slate-200 rounded-2xl text-[14px] font-bold text-[#081F5C] focus:bg-white focus:border-[#334EAC] focus:ring-4 focus:ring-[#334EAC]/10 transition-all outline-none appearance-none cursor-pointer">
                    <option>Mahasiswa S1</option>
                    <option>Mahasiswa S2/S3</option>
                    <option>Asisten Peneliti</option>
                  </select>
                </div>
              </div>
            </div>
          </div>
        </div>

        <!-- 3. PERSONAL INFORMATION SECTION -->
        <div class="card-base p-7 md:p-8 group/card">
          <h3 class="text-[16px] font-bold text-slate-900 tracking-tight mb-6 flex items-center gap-3">
             <span class="w-8 h-8 rounded-lg bg-[#EDF1F6] flex items-center justify-center text-[#334EAC]">
               <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M19 21v-2a4 4 0 0 0-4-4H9a4 4 0 0 0-4 4v2"/><circle cx="12" cy="7" r="4"/></svg>
             </span>
             Informasi Personal
          </h3>
          
          <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div class="space-y-1.5 relative group">
              <label class="text-[12px] font-bold text-slate-500 uppercase tracking-wider ml-1">Email</label>
              <input type="email" value="john.doe@ui.ac.id" class="w-full px-4 py-3 bg-white border border-slate-200 rounded-2xl text-[14px] font-medium text-slate-700 focus:border-[#334EAC] focus:ring-4 focus:ring-[#334EAC]/10 transition-all outline-none">
            </div>
            <div class="space-y-1.5 relative group">
              <label class="text-[12px] font-bold text-slate-500 uppercase tracking-wider ml-1">Nomor Telepon</label>
              <input type="tel" value="+62 812 3456 7890" class="w-full px-4 py-3 bg-white border border-slate-200 rounded-2xl text-[14px] font-medium text-slate-700 focus:border-[#334EAC] focus:ring-4 focus:ring-[#334EAC]/10 transition-all outline-none">
            </div>
            <div class="space-y-1.5 relative group">
              <label class="text-[12px] font-bold text-slate-500 uppercase tracking-wider ml-1">Universitas</label>
              <input type="text" value="Universitas Indonesia" class="w-full px-4 py-3 bg-white border border-slate-200 rounded-2xl text-[14px] font-medium text-slate-700 focus:border-[#334EAC] focus:ring-4 focus:ring-[#334EAC]/10 transition-all outline-none">
            </div>
             <div class="space-y-1.5 relative group">
              <label class="text-[12px] font-bold text-slate-500 uppercase tracking-wider ml-1">Jurusan / Program</label>
              <input type="text" value="Computer Science" class="w-full px-4 py-3 bg-white border border-slate-200 rounded-2xl text-[14px] font-medium text-slate-700 focus:border-[#334EAC] focus:ring-4 focus:ring-[#334EAC]/10 transition-all outline-none">
            </div>
            <div class="space-y-1.5 relative group">
              <label class="text-[12px] font-bold text-slate-500 uppercase tracking-wider ml-1">Semester</label>
              <input type="number" value="4" class="w-full px-4 py-3 bg-white border border-slate-200 rounded-2xl text-[14px] font-medium text-slate-700 focus:border-[#334EAC] focus:ring-4 focus:ring-[#334EAC]/10 transition-all outline-none">
            </div>
            <div class="space-y-1.5 relative group">
              <label class="text-[12px] font-bold text-slate-500 uppercase tracking-wider ml-1">NIM</label>
              <input type="text" value="2006123456" class="w-full px-4 py-3 bg-white border border-slate-200 rounded-2xl text-[14px] font-medium text-slate-700 focus:border-[#334EAC] focus:ring-4 focus:ring-[#334EAC]/10 transition-all outline-none">
            </div>
            <div class="space-y-1.5 relative group">
              <label class="text-[12px] font-bold text-slate-500 uppercase tracking-wider ml-1">Tanggal Lahir</label>
              <input type="date" value="2002-05-15" class="w-full px-4 py-3 bg-white border border-slate-200 rounded-2xl text-[14px] font-medium text-slate-700 focus:border-[#334EAC] focus:ring-4 focus:ring-[#334EAC]/10 transition-all outline-none text-slate-500">
            </div>
            <div class="space-y-1.5 relative group">
              <label class="text-[12px] font-bold text-slate-500 uppercase tracking-wider ml-1">Lokasi</label>
              <input type="text" value="Depok, West Java" class="w-full px-4 py-3 bg-white border border-slate-200 rounded-2xl text-[14px] font-medium text-slate-700 focus:border-[#334EAC] focus:ring-4 focus:ring-[#334EAC]/10 transition-all outline-none">
            </div>
          </div>
        </div>

        <!-- 4. ACADEMIC PREFERENCES -->
        <div class="card-base p-7 md:p-8 group/card">
          <h3 class="text-[16px] font-bold text-slate-900 tracking-tight mb-6 flex items-center gap-3">
             <span class="w-8 h-8 rounded-lg bg-[#EDF1F6] flex items-center justify-center text-[#334EAC]">
               <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M12 22c5.523 0 10-4.477 10-10S17.523 2 12 2 2 6.477 2 12s4.477 10 10 10z"/><path d="m9 12 2 2 4-4"/></svg>
             </span>
             Preferensi Akademik
          </h3>

          <div class="space-y-8">
            <!-- Favorite Subjects -->
            <div>
              <label class="text-[13px] font-bold text-slate-900 block mb-3">Mata Pelajaran Favorit</label>
              <div class="flex flex-wrap gap-2">
                <button class="px-4 py-2 rounded-xl border border-[#334EAC] bg-[#334EAC]/5 text-[#334EAC] text-[13px] font-bold transition-all hover:bg-[#334EAC]/10">Algoritma</button>
                <button class="px-4 py-2 rounded-xl border border-[#334EAC] bg-[#334EAC]/5 text-[#334EAC] text-[13px] font-bold transition-all hover:bg-[#334EAC]/10">Struktur Data</button>
                <button class="px-4 py-2 rounded-xl border border-[#334EAC] bg-[#334EAC]/5 text-[#334EAC] text-[13px] font-bold transition-all hover:bg-[#334EAC]/10">Machine Learning</button>
                <button class="px-4 py-2 rounded-xl border border-slate-200 bg-white text-slate-500 text-[13px] font-bold transition-all hover:border-[#7096D1] hover:text-[#334EAC] border-dashed">+ Tambah Mapel</button>
              </div>
            </div>

            <!-- Learning Style -->
            <div>
              <label class="text-[13px] font-bold text-slate-900 block mb-3">Gaya Belajar</label>
              <div class="grid grid-cols-2 md:grid-cols-4 gap-3">
                 <button class="p-3 rounded-xl border-2 border-[#334EAC] bg-[#F7F2EB]/30 text-center font-bold text-[#081F5C] text-[13px] transition-all">Visual</button>
                 <button class="p-3 rounded-xl border-2 border-slate-100 hover:border-slate-200 text-center font-bold text-slate-500 text-[13px] transition-all bg-white">Auditori</button>
                 <button class="p-3 rounded-xl border-2 border-slate-100 hover:border-slate-200 text-center font-bold text-slate-500 text-[13px] transition-all bg-white">Membaca/Menulis</button>
                 <button class="p-3 rounded-xl border-2 border-[#334EAC] bg-[#F7F2EB]/30 text-center font-bold text-[#081F5C] text-[13px] transition-all">Kinestetik</button>
              </div>
            </div>

            <div class="space-y-4">
              <!-- AI Recommendation Preference -->
              <div class="flex items-center justify-between p-4 rounded-xl border border-slate-100 bg-slate-50/50">
                <div>
                  <h4 class="text-[14px] font-bold text-[#081F5C] mb-1">Rekomendasi Belajar AI</h4>
                  <p class="text-[12px] font-medium text-slate-500">Izinkan AI menganalisis progres Anda dan menyarankan materi.</p>
                </div>
                <button class="relative inline-flex h-6 w-11 items-center rounded-full bg-[#334EAC] transition-colors focus:outline-none focus:ring-2 focus:ring-[#334EAC] focus:ring-offset-2">
                  <span class="inline-block h-4 w-4 translate-x-6 rounded-full bg-white transition-transform"></span>
                </button>
              </div>

              <!-- Collaboration Preference -->
              <div class="flex items-center justify-between p-4 rounded-xl border border-slate-100 bg-slate-50/50">
                <div>
                  <h4 class="text-[14px] font-bold text-[#081F5C] mb-1">Terbuka untuk Kolaborasi</h4>
                  <p class="text-[12px] font-medium text-slate-500">Biarkan mahasiswa lain menemukan Anda untuk tugas kelompok.</p>
                </div>
                <button class="relative inline-flex h-6 w-11 items-center rounded-full bg-[#334EAC] transition-colors focus:outline-none focus:ring-2 focus:ring-[#334EAC] focus:ring-offset-2">
                  <span class="inline-block h-4 w-4 translate-x-6 rounded-full bg-white transition-transform"></span>
                </button>
              </div>

              <!-- Mentoring Interest -->
              <div class="flex items-center justify-between p-4 rounded-xl border border-slate-100 bg-slate-50/50">
                <div>
                  <h4 class="text-[14px] font-bold text-[#081F5C] mb-1">Minat Mentoring</h4>
                  <p class="text-[12px] font-medium text-slate-500">Terima notifikasi tentang peluang mentoring.</p>
                </div>
                <button class="relative inline-flex h-6 w-11 items-center rounded-full bg-slate-200 transition-colors focus:outline-none focus:ring-2 focus:ring-slate-400 focus:ring-offset-2">
                  <span class="inline-block h-4 w-4 translate-x-1 rounded-full bg-white transition-transform"></span>
                </button>
              </div>
            </div>
          </div>
        </div>

        <!-- 5. ACCOUNT & SECURITY -->
        <div class="card-base p-7 md:p-8 group/card">
           <h3 class="text-[16px] font-bold text-slate-900 tracking-tight mb-6 flex items-center gap-3">
             <span class="w-8 h-8 rounded-lg bg-[#EDF1F6] flex items-center justify-center text-[#334EAC]">
               <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><rect width="18" height="11" x="3" y="11" rx="2" ry="2"/><path d="M7 11V7a5 5 0 0 1 10 0v4"/></svg>
             </span>
             Akun & Keamanan
          </h3>

          <div class="space-y-4">
            <!-- Change Password -->
            <div class="p-5 rounded-[1.5rem] border border-slate-100 flex flex-col md:flex-row items-start md:items-center justify-between gap-4">
               <div>
                  <h4 class="text-[14px] font-bold text-[#081F5C] mb-1">Ubah Kata Sandi</h4>
                  <p class="text-[12px] font-medium text-slate-500">Pastikan akun Anda menggunakan kata sandi panjang dan acak agar tetap aman.</p>
               </div>
               <button class="px-4 py-2 bg-white border border-slate-200 hover:border-[#7096D1] text-slate-600 hover:text-[#334EAC] rounded-xl font-bold text-[13px] transition-colors whitespace-nowrap">
                 Perbarui Kata Sandi
               </button>
            </div>
            
            <!-- Connected Google Account -->
            <div class="p-5 rounded-[1.5rem] border border-slate-100 flex flex-col md:flex-row items-start md:items-center justify-between gap-4">
               <div class="flex items-center gap-4">
                  <div class="w-10 h-10 rounded-full bg-white border border-slate-100 flex items-center justify-center shadow-sm shrink-0">
                    <svg viewBox="0 0 24 24" width="20" height="20" xmlns="http://www.w3.org/2000/svg"><path d="M22.56 12.25c0-.78-.07-1.53-.2-2.25H12v4.26h5.92c-.26 1.37-1.04 2.53-2.21 3.31v2.77h3.57c2.08-1.92 3.28-4.74 3.28-8.09z" fill="#4285F4"/><path d="M12 23c2.97 0 5.46-.98 7.28-2.66l-3.57-2.77c-.98.66-2.23 1.06-3.71 1.06-2.86 0-5.29-1.93-6.16-4.53H2.18v2.84C3.99 20.53 7.7 23 12 23z" fill="#34A853"/><path d="M5.84 14.09c-.22-.66-.35-1.36-.35-2.09s.13-1.43.35-2.09V7.07H2.18C1.43 8.55 1 10.22 1 12s.43 3.45 1.18 4.93l2.85-2.22.81-.62z" fill="#FBBC05"/><path d="M12 5.38c1.62 0 3.06.56 4.21 1.64l3.15-3.15C17.45 2.09 14.97 1 12 1 7.7 1 3.99 3.47 2.18 7.07l3.66 2.84c.87-2.6 3.3-4.53 6.16-4.53z" fill="#EA4335"/></svg>
                  </div>
                  <div>
                    <h4 class="text-[14px] font-bold text-[#081F5C] mb-1 flex items-center gap-2">Akun Google <span class="px-2 py-0.5 bg-emerald-50 text-emerald-600 rounded text-[10px] uppercase font-bold tracking-wider border border-emerald-100">Terhubung</span></h4>
                    <p class="text-[12px] font-medium text-slate-500">john.doe@ui.ac.id</p>
                  </div>
               </div>
               <button class="px-4 py-2 bg-white border border-rose-200 hover:bg-rose-50 text-rose-600 rounded-xl font-bold text-[13px] transition-colors whitespace-nowrap">
                 Putuskan
               </button>
            </div>

            <!-- Two Factor Auth -->
            <div class="p-5 rounded-[1.5rem] border border-slate-100 flex flex-col md:flex-row items-start md:items-center justify-between gap-4">
               <div>
                  <h4 class="text-[14px] font-bold text-[#081F5C] mb-1">Autentikasi Dua Langkah</h4>
                  <p class="text-[12px] font-medium text-slate-500">Tambahkan lapisan keamanan ekstra pada akun Anda.</p>
               </div>
               <button class="px-4 py-2 bg-[#334EAC] hover:bg-[#081F5C] text-white rounded-xl font-bold text-[13px] transition-colors shadow-sm whitespace-nowrap">
                 Aktifkan 2FA
               </button>
            </div>
          </div>
        </div>

        <!-- 7. ACTION BUTTONS -->
        <div class="flex items-center justify-end gap-4 pt-4">
           <RouterLink to="/pelajar/profile" class="px-6 py-3 bg-white border border-slate-200 hover:bg-slate-50 text-slate-600 rounded-xl font-bold text-[14px] transition-all">
             Batal
           </RouterLink>
           <button class="px-6 py-3 bg-slate-100 text-[#334EAC] hover:bg-slate-200 rounded-xl font-bold text-[14px] transition-all hidden md:block">
             Pratinjau Profil
           </button>
           <button @click="saveChanges" class="px-8 py-3 bg-[#334EAC] hover:bg-[#081F5C] text-white rounded-xl font-bold text-[14px] transition-all shadow-[0_8px_20px_rgba(51,78,172,0.2)] hover:shadow-[0_8px_25px_rgba(8,31,92,0.3)] hover:-translate-y-0.5 active:scale-95 flex items-center gap-2">
             <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round" v-if="!isSaving"><path d="M19 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h11l5 5v11a2 2 0 0 1-2 2z"/><polyline points="17 21 17 13 7 13 7 21"/><polyline points="7 3 7 8 15 8"/></svg>
             <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round" class="animate-spin" v-else><path d="M21 12a9 9 0 1 1-6.219-8.56"/></svg>
             {{ isSaving ? 'Menyimpan...' : 'Simpan Perubahan' }}
           </button>
        </div>
      </div>

      <!-- 6. RIGHT SIDEBAR PANEL -->
      <div class="w-full xl:w-80 shrink-0 space-y-6 md:space-y-8">
        
        <!-- Profile Completion -->
        <div class="card-base p-6 text-center flex flex-col items-center group/card">
          <div class="relative w-24 h-24 mb-4">
            <svg viewBox="0 0 36 36" class="w-full h-full transform -rotate-90">
              <path class="text-[#EDF1F6]" d="M18 2.0845 a 15.9155 15.9155 0 0 1 0 31.831 a 15.9155 15.9155 0 0 1 0 -31.831" fill="none" stroke="currentColor" stroke-width="4" />
              <path class="text-[#334EAC]" stroke-dasharray="85, 100" d="M18 2.0845 a 15.9155 15.9155 0 0 1 0 31.831 a 15.9155 15.9155 0 0 1 0 -31.831" fill="none" stroke="currentColor" stroke-width="4" stroke-linecap="round" />
            </svg>
            <div class="absolute inset-0 flex flex-col items-center justify-center">
              <span class="text-xl font-bold text-slate-900 tracking-tight">85%</span>
            </div>
          </div>
          <h3 class="text-[15px] font-bold text-slate-900 mb-2 tracking-tight">Profil Hampir Lengkap</h3>
          <p class="text-[12px] font-medium text-slate-500 mb-0">Isi tautan GitHub dan sertifikat untuk mencapai 100%.</p>
        </div>

        <!-- AI Profile Suggestions -->
        <div class="bg-[#F7F2EB] rounded-3xl p-6 border border-[#334EAC]/10 transition-all duration-300 ease-out hover:shadow-md">
           <h3 class="text-[14px] font-bold text-slate-900 tracking-tight mb-4 flex items-center gap-2">
             <span class="w-6 h-6 rounded bg-[#334EAC]/10 flex items-center justify-center text-[#334EAC]"><svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"><path d="m12 3-1.912 5.813a2 2 0 0 1-1.275 1.275L3 12l5.813 1.912a2 2 0 0 1 1.275 1.275L12 21l1.912-5.813a2 2 0 0 1 1.275-1.275L21 12l-5.813-1.912a2 2 0 0 1-1.275-1.275L12 3Z"/></svg></span>
             Saran AI
          </h3>
          <div class="space-y-3">
             <div class="flex items-start gap-3 p-3 bg-white rounded-xl border border-slate-100 shadow-sm cursor-pointer hover:border-[#7096D1] transition-all">
               <div class="w-5 h-5 rounded-full bg-emerald-50 text-emerald-500 flex items-center justify-center shrink-0 mt-0.5">
                  <svg xmlns="http://www.w3.org/2000/svg" width="10" height="10" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"><path d="M12 5v14"/><path d="M5 12h14"/></svg>
               </div>
               <div>
                 <p class="text-[12px] font-bold text-[#081F5C] leading-tight mb-1">Tambahkan Profil GitHub Anda</p>
                 <p class="text-[11px] text-slate-500">Mentor sering mencari portofolio kode.</p>
               </div>
             </div>
             <div class="flex items-start gap-3 p-3 bg-white rounded-xl border border-slate-100 shadow-sm cursor-pointer hover:border-[#7096D1] transition-all">
               <div class="w-5 h-5 rounded-full bg-amber-50 text-amber-500 flex items-center justify-center shrink-0 mt-0.5">
                  <svg xmlns="http://www.w3.org/2000/svg" width="10" height="10" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"><path d="M12 5v14"/><path d="M5 12h14"/></svg>
               </div>
               <div>
                 <p class="text-[12px] font-bold text-[#081F5C] leading-tight mb-1">Perluas teks Bio</p>
                 <p class="text-[11px] text-slate-500">Tambahkan 2-3 kalimat tentang tujuan karier Anda.</p>
               </div>
             </div>
          </div>
        </div>

      </div>
    </div>
  </div>
</template>

<script setup>
import { ref } from 'vue'
import { useRouter, RouterLink } from 'vue-router'

const router = useRouter()
const isSaving = ref(false)

const saveChanges = () => {
  isSaving.value = true
  setTimeout(() => {
    isSaving.value = false
    router.push('/pelajar/profile')
  }, 800)
}
</script>
