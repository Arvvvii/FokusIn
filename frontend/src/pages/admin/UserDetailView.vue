<template>
  <div class="relative min-h-screen pb-12 bg-[#F7F2EB]">
    <div class="max-w-[1450px] mx-auto px-4 sm:px-6 xl:px-8 py-6 space-y-5 animate-in fade-in duration-500">
      
      <!-- Compact Editorial Header -->
      <div class="bg-white rounded-2xl border border-slate-200 shadow-sm p-5 flex flex-col sm:flex-row sm:items-center justify-between gap-5 mb-6 relative overflow-hidden">
        <div class="flex items-center gap-4">
          <span class="w-12 h-12 rounded-xl bg-[#334EAC]/10 text-[#334EAC] flex items-center justify-center shrink-0">
            <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path d="M19 21v-2a4 4 0 0 0-4-4H9a4 4 0 0 0-4 4v2"/><circle cx="12" cy="7" r="4"/></svg>
          </span>
          <div>
            <h1 class="text-[30px] font-semibold text-slate-900 tracking-tight leading-tight mb-1">Detail Pelajar</h1>
            <p class="text-base text-slate-500 leading-relaxed max-w-xl">Profil komprehensif, performa kuis, dan riwayat aktivitas akademik pelajar.</p>
          </div>
        </div>
        <div class="flex shrink-0 gap-2">
          <RouterLink to="/admin/users" class="px-5 h-10 rounded-xl bg-white border border-slate-200 text-slate-700 hover:bg-slate-50 text-sm font-medium transition-all shadow-sm flex items-center justify-center">
            Kembali ke Daftar
          </RouterLink>
        </div>
      </div>

      <!-- Detail Card & Performance -->
      <div class="grid grid-cols-1 lg:grid-cols-3 gap-5">
        
        <!-- Profile Column -->
        <div class="bg-white rounded-xl border border-slate-200 p-5 shadow-sm space-y-4 text-center">
          <div class="w-20 h-20 mx-auto rounded-full bg-gradient-to-br from-indigo-400 to-purple-500 flex items-center justify-center text-white font-bold text-2xl shadow-sm border border-slate-100">
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
