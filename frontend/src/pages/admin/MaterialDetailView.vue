<template>
  <div class="relative min-h-screen pb-12 bg-[#F7F2EB]">
    <div class="max-w-[1450px] mx-auto px-4 sm:px-6 xl:px-8 py-6 space-y-5 animate-in fade-in duration-500">
      
      <!-- Compact Editorial Header -->
      <div class="bg-white/60 backdrop-blur-xl rounded-3xl p-7 md:p-8 shadow-[0_10px_40px_rgba(15,23,42,0.06)] border border-slate-200/60 relative overflow-hidden flex flex-col sm:flex-row sm:items-center justify-between gap-5 mb-6">
        <div class="flex items-center gap-4">
          <span class="w-12 h-12 rounded-xl bg-[#334EAC]/10 text-[#334EAC] flex items-center justify-center shrink-0">
            <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path d="M4 19.5v-15A2.5 2.5 0 0 1 6.5 2H20v20H6.5a2.5 2.5 0 0 1 0-5H20"/></svg>
          </span>
          <div>
            <h1 class="text-3xl md:text-4xl font-extrabold text-slate-900 tracking-tight leading-tight">Detail Materi Akademik</h1>
            <p class="text-[15px] text-slate-600 font-medium mt-2 max-w-xl leading-relaxed">Informasi berkas, pengarang, subjek pengajaran, dan validasi keaslian dokumen.</p>
          </div>
        </div>
        <div class="flex shrink-0 gap-2">
          <RouterLink to="/admin/materials" class="px-5 h-10 rounded-xl bg-white border border-slate-200 text-slate-700 hover:bg-slate-50 text-sm font-medium transition-all shadow-sm flex items-center justify-center">
            Kembali ke Daftar
          </RouterLink>
        </div>
      </div>

      <!-- Detail Info -->
      <div class="grid grid-cols-1 lg:grid-cols-3 gap-5">
        
        <!-- Left Side: Document Details -->
        <div class="lg:col-span-2 bg-white rounded-xl border border-slate-200 p-5 shadow-sm space-y-4">
          <div class="flex items-center justify-between border-b border-slate-100 pb-2">
            <h3 class="text-base font-semibold text-slate-900">Spesifikasi Dokumen</h3>
            <span class="px-2.5 py-0.5 bg-emerald-50 text-emerald-700 text-xs font-semibold rounded-md border border-emerald-100 uppercase tracking-widest">Approved</span>
          </div>
          <div class="space-y-4 text-sm text-slate-600">
            <div>
              <p class="text-[10px] font-bold text-slate-400 uppercase tracking-widest">Judul Dokumen</p>
              <p class="text-sm font-bold text-[#081F5C]">Modul Praktikum Fisika Dasar 1A</p>
            </div>
            <div>
              <p class="text-[10px] font-bold text-slate-400 uppercase tracking-widest">Sinopsis / Cakupan Materi</p>
              <p class="leading-relaxed">Dokumen ajar praktikum fisika untuk mahasiswa semester 1 mencakup mekanika klasik, gerak melingkar, getaran harmonis, dan elastisitas bahan.</p>
            </div>
          </div>
        </div>

        <!-- Right Side: File Meta -->
        <div class="bg-white rounded-xl border border-slate-200 p-5 shadow-sm space-y-4 flex flex-col justify-between">
          <div class="space-y-4">
            <h3 class="text-base font-semibold text-slate-900 border-b border-slate-100 pb-2">Meta Berkas</h3>
            <div class="text-sm text-slate-600 space-y-2">
              <p>Format Berkas: <strong>PDF Document</strong></p>
              <p>Ukuran Berkas: <strong>4.2 Megabytes</strong></p>
              <p>Subjek: <strong>Fisika</strong></p>
            </div>
          </div>
          <div class="pt-4 border-t border-slate-100">
            <button class="w-full h-10 px-5 rounded-xl bg-[#334EAC] text-white hover:bg-[#081F5C] text-sm font-medium transition-all shadow-sm flex items-center justify-center gap-2">
              Unduh Berkas Ajar
            </button>
          </div>
        </div>

      </div>

    </div>
  </div>
</template>

<script setup>
</script>
