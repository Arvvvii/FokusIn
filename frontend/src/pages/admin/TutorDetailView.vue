<template>
  <div class="relative min-h-screen pb-12 bg-[#F7F2EB]">
    <div class="max-w-[1450px] mx-auto px-4 sm:px-6 xl:px-8 py-6 space-y-5 animate-in fade-in duration-500">
      
      <!-- Compact Editorial Header -->
      <div class="bg-white rounded-2xl border border-slate-200 shadow-sm p-5 flex flex-col sm:flex-row sm:items-center justify-between gap-5 mb-6 relative overflow-hidden">
        <div class="flex items-center gap-4">
          <span class="w-12 h-12 rounded-xl bg-[#334EAC]/10 text-[#334EAC] flex items-center justify-center shrink-0">
            <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path d="M2 21a8 8 0 0 1 13.292-6"/><circle cx="10" cy="8" r="5"/><path d="m16 19 2 2 4-4"/></svg>
          </span>
          <div>
            <h1 class="text-[30px] font-semibold text-slate-900 tracking-tight leading-tight mb-1">Detail Tutor</h1>
            <p class="text-base text-slate-500 leading-relaxed max-w-xl">Profil pengajar, verifikasi berkas ilmiah, dan total rating bimbingan.</p>
          </div>
        </div>
        <div class="flex shrink-0 gap-2">
          <RouterLink to="/admin/tutors" class="px-5 h-10 rounded-xl bg-white border border-slate-200 text-slate-700 hover:bg-slate-50 text-sm font-medium transition-all shadow-sm flex items-center justify-center">
            Kembali ke Daftar
          </RouterLink>
        </div>
      </div>

      <!-- Detail Info -->
      <div class="grid grid-cols-1 lg:grid-cols-3 gap-5">
        
        <!-- Profile Column -->
        <div class="bg-white rounded-xl border border-slate-200 p-5 shadow-sm space-y-4 text-center">
          <div class="w-20 h-20 mx-auto rounded-full bg-gradient-to-br from-[#334EAC] to-[#081F5C] flex items-center justify-center text-white font-bold text-2xl shadow-sm border border-slate-100">
            SR
          </div>
          <div>
            <h3 class="text-base font-semibold text-slate-900">Dr. Sarah R.</h3>
            <p class="text-xs text-slate-500 font-medium">sarah.r@university.edu</p>
          </div>
          <div class="inline-flex items-center gap-1.5 px-2.5 py-1 bg-emerald-50 text-emerald-700 text-xs font-semibold rounded-md border border-emerald-100">
            <span class="w-1.5 h-1.5 rounded-full bg-emerald-500"></span>
            Verified Expert Tutor
          </div>
          <div class="pt-4 border-t border-slate-100 grid grid-cols-2 gap-2 text-left">
            <div>
              <p class="text-[10px] font-bold text-slate-400 uppercase tracking-widest">Reputasi</p>
              <p class="text-sm font-bold text-slate-900">15,400 Poin</p>
            </div>
            <div>
              <p class="text-[10px] font-bold text-slate-400 uppercase tracking-widest">Rating Mentoring</p>
              <p class="text-sm font-bold text-slate-900">4.92 / 5.00</p>
            </div>
          </div>
        </div>

        <!-- Academic Performance & Qualifications -->
        <div class="lg:col-span-2 bg-white rounded-xl border border-slate-200 p-5 shadow-sm space-y-4">
          <h3 class="text-base font-semibold text-slate-900 border-b border-slate-100 pb-2">Kualifikasi Pengajaran</h3>
          <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
            <div>
              <p class="text-[10px] font-bold text-slate-400 uppercase tracking-widest mb-0.5">Spesialisasi</p>
              <p class="text-sm font-semibold text-slate-800">Fisika Quantum, Kalkulus Multivariat</p>
            </div>
            <div>
              <p class="text-[10px] font-bold text-slate-400 uppercase tracking-widest mb-0.5">Total Materi Terbit</p>
              <p class="text-sm font-semibold text-slate-800">42 Modul Ajar</p>
            </div>
          </div>
          <div>
            <h4 class="text-xs font-bold text-slate-400 uppercase tracking-widest mb-2 mt-2">Log Validasi Terkini</h4>
            <ul class="space-y-2 text-xs font-medium text-slate-600">
              <li class="p-2.5 rounded-lg border border-slate-100 bg-slate-50/50">Memvalidasi 3 kunci jawaban soal kalkulus mahasiswa • 3 jam yang lalu</li>
              <li class="p-2.5 rounded-lg border border-slate-100 bg-slate-50/50">Menerbitkan dokumen "Kalkulus III: Integral Lipat" • 2 hari yang lalu</li>
            </ul>
          </div>
        </div>

      </div>

    </div>
  </div>
</template>

<script setup>
</script>
