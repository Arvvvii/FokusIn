<template>
  <div class="relative min-h-screen pb-12 bg-[#F7F2EB]">
    <div class="max-w-[1450px] mx-auto px-4 sm:px-6 xl:px-8 py-6 space-y-5 animate-in fade-in duration-500">
      
      <!-- Compact Editorial Header -->
      <div class="bg-white/60 backdrop-blur-xl rounded-3xl p-7 md:p-8 shadow-[0_10px_40px_rgba(15,23,42,0.06)] border border-slate-200/60 relative overflow-hidden flex flex-col sm:flex-row sm:items-center justify-between gap-5 mb-6">
        <div class="flex items-center gap-4">
          <span class="w-12 h-12 rounded-xl bg-[#334EAC]/10 text-[#334EAC] flex items-center justify-center shrink-0">
            <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path d="M19 21v-2a4 4 0 0 0-4-4H9a4 4 0 0 0-4 4v2"/><circle cx="12" cy="7" r="4"/></svg>
          </span>
          <div>
            <h1 class="text-3xl md:text-4xl font-extrabold text-slate-900 tracking-tight leading-tight">Detail Pelajar</h1>
            <p class="text-[15px] text-slate-600 font-medium mt-2 max-w-xl leading-relaxed">Profil komprehensif, performa kuis, dan riwayat aktivitas akademik pelajar.</p>
          </div>
        </div>
        <div class="flex shrink-0 gap-2">
          <div class="mb-6 flex items-center gap-2">
  <RouterLink
    to="/admin/users"
    class="text-sm font-bold text-slate-400 hover:text-[#334EAC] transition-colors flex items-center gap-1 w-fit bg-white/50 px-3 py-1.5 rounded-lg border border-slate-200/50"
  >
    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="m15 18-6-6 6-6"></path></svg>
    Kembali ke Pengguna
  </RouterLink>
</div>
        </div>
      </div>

      <!-- Detail Card & Performance -->
      <div class="grid grid-cols-1 lg:grid-cols-3 gap-5">
        
        <!-- Profile Column -->
        <div class="bg-white rounded-xl border border-slate-200 p-5 shadow-sm space-y-4 text-center">
          <div class="w-20 h-20 mx-auto rounded-full bg-gradient-to-br from-[#7096D1] to-[#7096D1] flex items-center justify-center text-white font-bold text-2xl shadow-sm border border-slate-100">
            AP
          </div>
          <div>
            <h3 class="text-base font-semibold text-slate-900">Andi Pratama</h3>
            <p class="text-xs text-slate-500 font-medium">andi.p@student.edu</p>
          </div>
          <div class="inline-flex items-center gap-1.5 px-2.5 py-1 bg-emerald-50 text-emerald-700 text-xs font-semibold rounded-md border border-emerald-100">
            <span class="w-1.5 h-1.5 rounded-full bg-emerald-500"></span>
            Pelajar Aktif
          </div>
          <div class="pt-4 border-t border-slate-100 grid grid-cols-2 gap-2 text-left">
            <div>
              <p class="text-[10px] font-bold text-slate-400 uppercase tracking-widest">Reputasi</p>
              <p class="text-sm font-bold text-slate-900">4,200 Poin</p>
            </div>
            <div>
              <p class="text-[10px] font-bold text-slate-400 uppercase tracking-widest">Sesi Selesai</p>
              <p class="text-sm font-bold text-slate-900">24 Sesi</p>
            </div>
          </div>
        </div>

        <!-- Academic performance -->
        <div class="lg:col-span-2 bg-white rounded-xl border border-slate-200 p-5 shadow-sm space-y-4">
          <h3 class="text-base font-semibold text-slate-900 border-b border-slate-100 pb-2">Informasi Akademik</h3>
          <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
            <div>
              <p class="text-[10px] font-bold text-slate-400 uppercase tracking-widest mb-0.5">Subjek Favorit</p>
              <p class="text-sm font-semibold text-slate-800">Matematika, Ilmu Komputer</p>
            </div>
            <div>
              <p class="text-[10px] font-bold text-slate-400 uppercase tracking-widest mb-0.5">Rata-rata Skor Kuis</p>
              <p class="text-sm font-semibold text-slate-800">82.5 / 100</p>
            </div>
          </div>
          <div>
            <h4 class="text-xs font-bold text-slate-400 uppercase tracking-widest mb-2 mt-2">Aktivitas Terakhir</h4>
            <ul class="space-y-2 text-xs font-medium text-slate-600">
              <li class="p-2.5 rounded-lg border border-slate-100 bg-slate-50/50">Mengerjakan kuis *Struktur Aljabar* • Skor 85 • 2 jam yang lalu</li>
              <li class="p-2.5 rounded-lg border border-slate-100 bg-slate-50/50">Menghadiri sesi mentoring bersama Dr. Sarah Smith • 1 hari yang lalu</li>
            </ul>
          </div>
        </div>

      </div>

    </div>
  </div>
</template>

<script setup>
</script>
