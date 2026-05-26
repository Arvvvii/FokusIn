<template>
  <div class="relative min-h-screen pb-12 bg-[#F7F2EB]">
    <div class="max-w-[1450px] mx-auto px-4 sm:px-6 xl:px-8 py-6 space-y-5 animate-in fade-in duration-500">
      
      <!-- Compact Editorial Header -->
      <div class="bg-white rounded-2xl border border-slate-200 shadow-sm p-5 flex flex-col sm:flex-row sm:items-center justify-between gap-5 mb-6 relative overflow-hidden">
        <div class="flex items-center gap-4">
          <span class="w-12 h-12 rounded-xl bg-[#334EAC]/10 text-[#334EAC] flex items-center justify-center shrink-0">
            <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><circle cx="12" cy="12" r="10"/><path d="M9.09 9a3 3 0 0 1 5.83 1c0 2-3 3-3 3"/><line x1="12" x2="12.01" y1="17" y2="17"/></svg>
          </span>
          <div>
            <h1 class="text-[30px] font-semibold text-slate-900 tracking-tight leading-tight mb-1">Detail Pemantauan Kuis</h1>
            <p class="text-base text-slate-500 leading-relaxed max-w-xl">Statistik partisipasi kuis, tingkat kelulusan, serta integritas kecurangan akademik.</p>
          </div>
        </div>
        <div class="flex shrink-0 gap-2">
          <RouterLink to="/admin/quiz-monitoring" class="px-5 h-10 rounded-xl bg-white border border-slate-200 text-slate-700 hover:bg-slate-50 text-sm font-medium transition-all shadow-sm flex items-center justify-center">
            Kembali ke Daftar
          </RouterLink>
        </div>
      </div>

      <!-- Detail Info -->
      <div class="grid grid-cols-1 lg:grid-cols-3 gap-5">
        
        <!-- Left Side: Quiz Parameters -->
        <div class="lg:col-span-2 bg-white rounded-xl border border-slate-200 p-5 shadow-sm space-y-4">
          <div class="flex items-center justify-between border-b border-slate-100 pb-2">
            <h3 class="text-base font-semibold text-slate-900">Parameter Ujian</h3>
            <span class="px-2.5 py-0.5 bg-rose-50 text-rose-700 text-xs font-semibold rounded-md border border-rose-100 uppercase tracking-widest">Tinggi</span>
          </div>
          <div class="space-y-4 text-sm text-slate-600">
            <div>
              <p class="text-[10px] font-bold text-slate-400 uppercase tracking-widest">Judul Kuis / Ujian</p>
              <p class="text-sm font-bold text-[#081F5C]">Kuis Struktur Aljabar & Pembuktian Teorema</p>
            </div>
            <div>
              <p class="text-[10px] font-bold text-slate-400 uppercase tracking-widest">Tingkat Integritas Ujian</p>
              <p class="leading-relaxed">Nilai integritas: <strong>99.5%</strong>. AI memantau tab switching dan deteksi kecurangan dengan status optimal.</p>
            </div>
          </div>
        </div>

        <!-- Right Side: Stats Panel -->
        <div class="bg-white rounded-xl border border-slate-200 p-5 shadow-sm space-y-4 flex flex-col justify-between">
          <div class="space-y-4">
            <h3 class="text-base font-semibold text-slate-900 border-b border-slate-100 pb-2">Hasil Evaluasi</h3>
            <div class="text-sm text-slate-600 space-y-2">
              <p>Subjek: <strong>Matematika</strong></p>
              <p>Total Peserta: <strong>412 Pelajar</strong></p>
              <p>Rata-rata Nilai: <strong>71.5 / 100</strong></p>
            </div>
          </div>
          <div class="pt-4 border-t border-slate-100">
            <button class="w-full h-10 px-5 rounded-xl bg-[#334EAC] text-white hover:bg-[#081F5C] text-sm font-medium transition-all shadow-sm">
              Analisis Distribusi Nilai
            </button>
          </div>
        </div>

      </div>

    </div>
  </div>
</template>

<script setup>
</script>
