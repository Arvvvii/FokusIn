<template>
  <div class="space-y-8 w-full">
    
    <!-- 1. GLASSMORPHIC GREETING HERO SECTION -->
    <div class="bg-white/80 backdrop-blur-xl rounded-3xl p-7 md:p-8 shadow-[0_10px_40px_rgba(15,23,42,0.06)] border border-white/40 relative overflow-hidden flex flex-col md:flex-row md:items-center justify-between gap-6">
      <div class="absolute right-0 top-0 w-1/3 h-full bg-gradient-to-l from-[#EDF1F6]/80 to-transparent pointer-events-none"></div>
      
      <div class="relative z-10">
        <div class="flex flex-wrap items-center gap-2 mb-3">
          <span class="px-3 py-1 bg-emerald-50 text-emerald-600 rounded-full text-[11px] font-extrabold uppercase tracking-widest border border-emerald-100 flex items-center gap-1.5 shadow-sm">
            <span class="w-1.5 h-1.5 rounded-full bg-emerald-500 animate-pulse"></span>
            Mentor Aktif
          </span>
          <span class="px-3 py-1 bg-[#334EAC]/10 text-[#334EAC] rounded-full text-[11px] font-extrabold uppercase tracking-widest border border-[#334EAC]/10 shadow-sm">
            Level 8
          </span>
          <span class="px-3 py-1 bg-amber-50 text-amber-600 rounded-full text-[11px] font-extrabold uppercase tracking-widest border border-amber-100 flex items-center gap-1 shadow-sm">
            👑 Expert Mentor
          </span>
        </div>
        <h1 class="text-2xl md:text-3xl font-bold text-slate-900 mb-2 tracking-tight">Selamat pagi, Dr. Sarah</h1>
        <p class="text-[14px] text-slate-500 font-medium max-w-lg leading-relaxed">
          Ada <span class="text-[#334EAC] font-bold">4 sesi mentoring</span> dan <span class="text-amber-500 font-bold">12 jawaban pending</span> yang menunggu verifikasi Anda hari ini.
        </p>
      </div>

      <div class="relative z-10 flex shrink-0 gap-3">
         <RouterLink to="/tutor/forum" class="px-5 py-3 bg-white border border-slate-200 hover:border-[#7096D1] hover:text-[#334EAC] text-slate-600 rounded-2xl font-bold text-[13px] transition-all shadow-sm active:scale-95 flex items-center gap-2">
            Cek Forum
         </RouterLink>
         <RouterLink to="/tutor/mentoring" class="px-5 py-3 bg-[#334EAC] hover:bg-[#081F5C] text-white rounded-2xl font-bold text-[13px] transition-all shadow-sm active:scale-95 flex items-center gap-2">
            Kelola Jadwal
         </RouterLink>
      </div>
    </div>

    <!-- 2. STRUCTURAL ASYMMETRIC GRID -->
    <div class="grid grid-cols-1 lg:grid-cols-[minmax(0,1fr)_360px] gap-8 items-start w-full">
      
      <!-- LEFT CONTAINER: METRICS & TIMELINES -->
      <div class="space-y-8 flex-1 self-stretch">
        
        <!-- Stats cards grid -->
        <div class="grid grid-cols-2 md:grid-cols-3 gap-4">
          
          <!-- Card 1: Mentoring -->
          <RouterLink to="/tutor/mentoring" class="block bg-white rounded-3xl p-5 border border-slate-200/60 shadow-sm hover:shadow-md hover:-translate-y-0.5 transition-all duration-300 group active:scale-[0.98]">
            <div class="flex items-center justify-between mb-4">
              <div class="w-10 h-10 rounded-xl bg-indigo-50 text-[#334EAC] flex items-center justify-center border border-indigo-100 group-hover:scale-105 transition-transform">
                 <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M16 21v-2a4 4 0 0 0-4-4H6a4 4 0 0 0-4 4v2"/><circle cx="9" cy="7" r="4"/></svg>
              </div>
              <span class="text-[11px] font-bold text-emerald-500 bg-emerald-50 px-2 py-0.5 rounded-lg border border-emerald-100">+12%</span>
            </div>
            <p class="text-[11px] font-bold text-slate-400 uppercase tracking-wider mb-1">Total Mentoring</p>
            <h3 class="text-2xl font-bold text-slate-900 tracking-tight">148</h3>
          </RouterLink>

          <!-- Card 2: Answers -->
          <RouterLink to="/tutor/verify-answer" class="block bg-white rounded-3xl p-5 border border-slate-200/60 shadow-sm hover:shadow-md hover:-translate-y-0.5 transition-all duration-300 group active:scale-[0.98]">
            <div class="flex items-center justify-between mb-4">
              <div class="w-10 h-10 rounded-xl bg-emerald-50 text-emerald-600 flex items-center justify-center border border-emerald-100 group-hover:scale-105 transition-transform">
                 <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"/><polyline points="22 4 12 14.01 9 11.01"/></svg>
              </div>
              <span class="text-[11px] font-bold text-emerald-500 bg-emerald-50 px-2 py-0.5 rounded-lg border border-emerald-100">+5%</span>
            </div>
            <p class="text-[11px] font-bold text-slate-400 uppercase tracking-wider mb-1">Jwb Diverifikasi</p>
            <h3 class="text-2xl font-bold text-slate-900 tracking-tight">324</h3>
          </RouterLink>

          <!-- Card 3: Ratings -->
          <RouterLink to="/tutor/profile" class="block bg-white rounded-3xl p-5 border border-slate-200/60 shadow-sm hover:shadow-md hover:-translate-y-0.5 transition-all duration-300 group active:scale-[0.98]">
            <div class="flex items-center justify-between mb-4">
              <div class="w-10 h-10 rounded-xl bg-amber-50 text-amber-600 flex items-center justify-center border border-amber-100 group-hover:scale-105 transition-transform">
                 <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"/></svg>
              </div>
              <span class="text-[11px] font-bold text-slate-400 bg-slate-100 px-2 py-0.5 rounded-lg">Tetap</span>
            </div>
            <p class="text-[11px] font-bold text-slate-400 uppercase tracking-wider mb-1">Rating Mentor</p>
            <h3 class="text-2xl font-bold text-slate-900 tracking-tight">4.9<span class="text-xs text-slate-400 font-medium ml-1">/ 5.0</span></h3>
          </RouterLink>

          <!-- Card 4: Students Requests (Previously non-functional) -->
          <RouterLink to="/tutor/student-requests" class="block bg-white rounded-3xl p-5 border border-slate-200/60 shadow-sm hover:shadow-md hover:-translate-y-0.5 transition-all duration-300 group active:scale-[0.98]">
            <div class="flex items-center justify-between mb-4">
              <div class="w-10 h-10 rounded-xl bg-purple-50 text-purple-600 flex items-center justify-center border border-purple-100 group-hover:scale-105 transition-transform">
                 <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M16 21v-2a4 4 0 0 0-4-4H6a4 4 0 0 0-4 4v2"/><circle cx="9" cy="7" r="4"/><path d="M22 21v-2a4 4 0 0 0-3-3.87"/></svg>
              </div>
              <span class="text-[11px] font-bold text-slate-400 bg-slate-100 px-2 py-0.5 rounded-lg">Aktif</span>
            </div>
            <p class="text-[11px] font-bold text-slate-400 uppercase tracking-wider mb-1">Mahasiswa Bimbingan</p>
            <h3 class="text-2xl font-bold text-slate-900 tracking-tight">86</h3>
          </RouterLink>

          <!-- Card 5: Teaching Hours (Previously non-functional) -->
          <RouterLink to="/tutor/schedule" class="block bg-white rounded-3xl p-5 border border-slate-200/60 shadow-sm hover:shadow-md hover:-translate-y-0.5 transition-all duration-300 group active:scale-[0.98]">
            <div class="flex items-center justify-between mb-4">
              <div class="w-10 h-10 rounded-xl bg-sky-50 text-sky-600 flex items-center justify-center border border-sky-100 group-hover:scale-105 transition-transform">
                 <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"/><polyline points="12 6 12 12 16 14"/></svg>
              </div>
              <span class="text-[11px] font-bold text-emerald-500 bg-emerald-50 px-2 py-0.5 rounded-lg border border-emerald-100">+8j</span>
            </div>
            <p class="text-[11px] font-bold text-slate-400 uppercase tracking-wider mb-1">Jam Mentoring</p>
            <h3 class="text-2xl font-bold text-slate-900 tracking-tight">420<span class="text-xs text-slate-400 font-medium ml-1">jam</span></h3>
          </RouterLink>

          <!-- Card 6: Satisfaction (Previously non-functional) -->
          <RouterLink to="/tutor/analytics" class="block bg-white rounded-3xl p-5 border border-slate-200/60 shadow-sm hover:shadow-md hover:-translate-y-0.5 transition-all duration-300 group active:scale-[0.98]">
            <div class="flex items-center justify-between mb-4">
              <div class="w-10 h-10 rounded-xl bg-rose-50 text-rose-600 flex items-center justify-center border border-rose-100 group-hover:scale-105 transition-transform">
                 <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M20.84 4.61a5.5 5.5 0 0 0-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 0 0-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 0 0 0-7.78z"/></svg>
              </div>
              <span class="text-[11px] font-bold text-emerald-500 bg-emerald-50 px-2 py-0.5 rounded-lg border border-emerald-100">Optimal</span>
            </div>
            <p class="text-[11px] font-bold text-slate-400 uppercase tracking-wider mb-1">Tingkat Kepuasan</p>
            <h3 class="text-2xl font-bold text-slate-900 tracking-tight">98%</h3>
          </RouterLink>

        </div>

        <!-- Onboarding Capabilities -->
        <div class="bg-white rounded-3xl p-6 border border-slate-200/60 shadow-sm">
          <h3 class="text-base font-bold text-slate-900 mb-6 flex items-center gap-3">
             <span class="w-8 h-8 rounded-lg bg-indigo-50 text-[#334EAC] flex items-center justify-center">🎓</span>
             Operasional & Fitur Utama Tutor
          </h3>

          <div class="grid grid-cols-2 sm:grid-cols-4 gap-4">
            <RouterLink to="/tutor/verify-answer" class="flex flex-col p-4 rounded-2xl bg-slate-50 hover:bg-[#EDF1F6] border border-slate-200/50 shadow-sm transition-all group active:scale-[0.98]">
               <h4 class="text-xs font-bold text-[#081F5C] mb-1">Verifikasi Jawaban</h4>
               <p class="text-[10px] text-slate-400 font-semibold leading-tight">Review validasi forum.</p>
            </RouterLink>
            <RouterLink to="/tutor/mentoring" class="flex flex-col p-4 rounded-2xl bg-slate-50 hover:bg-[#EDF1F6] border border-slate-200/50 shadow-sm transition-all group active:scale-[0.98]">
               <h4 class="text-xs font-bold text-[#081F5C] mb-1">Kelola Mentoring</h4>
               <p class="text-[10px] text-slate-400 font-semibold leading-tight">Konfirmasi jadwal konsultasi.</p>
            </RouterLink>
            <RouterLink to="/tutor/materials" class="flex flex-col p-4 rounded-2xl bg-slate-50 hover:bg-[#EDF1F6] border border-slate-200/50 shadow-sm transition-all group active:scale-[0.98]">
               <h4 class="text-xs font-bold text-[#081F5C] mb-1">Bagikan Materi</h4>
               <p class="text-[10px] text-slate-400 font-semibold leading-tight">Menerbitkan arsip/bank soal.</p>
            </RouterLink>
            <RouterLink to="/tutor/ai-validation" class="flex flex-col p-4 rounded-2xl bg-[#334EAC] hover:bg-[#081F5C] text-white border-transparent shadow-sm transition-all group active:scale-[0.98]">
               <h4 class="text-xs font-bold text-white mb-1">Antrean Validasi AI</h4>
               <p class="text-[10px] text-indigo-100 font-medium leading-tight">Koreksi hasil ekstraksi OCR.</p>
            </RouterLink>
          </div>
        </div>

        <!-- Recent activities timeline -->
        <div class="bg-white rounded-3xl p-6 border border-slate-200/60 shadow-sm space-y-6">
          <h2 class="text-base font-bold text-slate-900">Aktivitas Mahasiswa Terakhir</h2>
          <div class="relative pl-6 space-y-6 before:absolute before:inset-y-0 before:left-2.5 before:w-px before:bg-slate-100">
            
            <div class="relative">
              <div class="absolute -left-[28px] w-4.5 h-4.5 rounded-full bg-emerald-500 border-4 border-white shadow-sm"></div>
              <div class="flex items-center gap-2 mb-1">
                <span class="px-2 py-0.5 bg-emerald-50 text-emerald-600 rounded text-[9px] font-bold uppercase">Jawaban Baru</span>
                <span class="text-[11px] text-slate-400 font-semibold">10 menit lalu</span>
              </div>
              <h4 class="text-xs sm:text-sm font-bold text-slate-900">Budi Santoso menjawab diskusi "Optimasi Query SQL"</h4>
              <RouterLink to="/tutor/verify-answer" class="mt-2.5 inline-flex items-center gap-1.5 px-3 py-1.5 bg-slate-50 border border-slate-200 rounded-xl text-xs font-bold text-[#334EAC] hover:border-[#7096D1]">
                Verifikasi Jawaban
              </RouterLink>
            </div>

            <div class="relative">
              <div class="absolute -left-[28px] w-4.5 h-4.5 rounded-full bg-amber-500 border-4 border-white shadow-sm"></div>
              <div class="flex items-center gap-2 mb-1">
                <span class="px-2 py-0.5 bg-amber-50 text-amber-600 rounded text-[9px] font-bold uppercase">Request Bimbingan</span>
                <span class="text-[11px] text-slate-400 font-semibold">1 jam lalu</span>
              </div>
              <h4 class="text-xs sm:text-sm font-bold text-slate-900">Andi Wijaya meminta sesi mentoring untuk "Struktur Data"</h4>
              <RouterLink to="/tutor/mentoring" class="mt-2.5 inline-flex items-center gap-1.5 px-3 py-1.5 bg-slate-50 border border-slate-200 rounded-xl text-xs font-bold text-slate-600 hover:text-[#334EAC]">
                Tinjau Permintaan
              </RouterLink>
            </div>

          </div>
        </div>

      </div>

      <!-- RIGHT SIDEBAR: JADWAL & ANNOUNCEMENTS -->
      <div class="space-y-6 w-full shrink-0 lg:w-[360px]">
        <!-- Schedule Today -->
        <div class="bg-white rounded-3xl p-6 border border-slate-200/60 shadow-sm space-y-4">
          <div class="flex items-center justify-between">
            <h3 class="text-xs font-bold text-slate-400 uppercase tracking-widest">Jadwal Hari Ini</h3>
            <RouterLink to="/tutor/mentoring" class="text-[11px] font-bold text-[#334EAC] hover:underline">Lihat Semua</RouterLink>
          </div>

          <div class="space-y-3">
            <div class="p-3.5 bg-emerald-50/20 border border-emerald-100 rounded-2xl flex gap-3">
              <div class="w-1 bg-emerald-500 rounded-full shrink-0"></div>
              <div>
                <span class="text-[9px] font-extrabold text-emerald-600 uppercase tracking-wider block">10:00 - 11:30 WIB</span>
                <h4 class="text-xs font-bold text-slate-900 mt-0.5">Mentoring Algoritma Budi</h4>
              </div>
            </div>
            
            <div class="p-3.5 bg-slate-50 border border-slate-200/60 rounded-2xl flex gap-3">
              <div class="w-1 bg-[#334EAC] rounded-full shrink-0"></div>
              <div>
                <span class="text-[9px] font-extrabold text-[#334EAC] uppercase tracking-wider block">14:00 - 15:00 WIB</span>
                <h4 class="text-xs font-bold text-slate-900 mt-0.5">Review Proposal Tugas Akhir</h4>
              </div>
            </div>
          </div>
        </div>

        <!-- AI Insight Card -->
        <div class="bg-gradient-to-br from-[#081F5C] to-[#334EAC] rounded-3xl p-6 text-white shadow-lg space-y-4 relative overflow-hidden">
          <div class="absolute -right-4 -top-4 w-28 h-28 bg-white/10 blur-2xl rounded-full"></div>
          <h3 class="text-sm font-bold tracking-tight flex items-center gap-2">
            <span>✨</span> AI Insight
          </h3>
          <p class="text-xs text-indigo-100 leading-relaxed">
            Mahasiswa di kelas Anda terdeteksi mengalami kendala pemahaman pada topik <strong>"Pointer C++"</strong>. Sangat disarankan untuk menerbitkan berkas latihan tambahan.
          </p>
          <RouterLink to="/tutor/materials" class="w-full text-center py-2 bg-white hover:bg-slate-50 text-[#081F5C] rounded-xl font-bold text-xs shadow-sm transition-all block">
            Bagikan Materi Latihan
          </RouterLink>
        </div>
      </div>

    </div>

  </div>
</template>

<script setup>
import { RouterLink } from 'vue-router'
</script>
