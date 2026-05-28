<template>
  <div class="relative min-h-screen pb-12 bg-[#F7F2EB]">
    <div class="max-w-[1450px] mx-auto px-4 sm:px-6 xl:px-8 py-6 space-y-5 animate-in fade-in duration-500">
      
      <!-- Compact Editorial Header -->
      <div class="bg-white/60 backdrop-blur-xl rounded-3xl p-7 md:p-8 shadow-[0_10px_40px_rgba(15,23,42,0.06)] border border-slate-200/60 relative overflow-hidden flex flex-col sm:flex-row sm:items-center justify-between gap-5 mb-6">
        <div class="flex items-center gap-4">
          <span class="w-9 h-9 rounded-xl bg-rose-50 border border-rose-100 text-rose-600 flex items-center justify-center shrink-0">
            <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path d="m21.73 18-8-14a2 2 0 0 0-3.48 0l-8 14A2 2 0 0 0 4 21h16a2 2 0 0 0 1.73-3Z"/><line x1="12" x2="12" y1="9" y2="13"/><line x1="12" x2="12.01" y1="17" y2="17"/></svg>
          </span>
          <div>
            <h1 class="text-3xl md:text-4xl font-extrabold text-slate-900 tracking-tight leading-tight">Detail Laporan Kasus</h1>
            <p class="text-[15px] text-slate-600 font-medium mt-2 max-w-xl leading-relaxed">Tinjau pelanggaran pedoman komunitas, barang bukti konten, dan riwayat laporan.</p>
          </div>
        </div>
        <div class="flex shrink-0 gap-2">
          <RouterLink to="/admin/reports" class="px-5 h-10 rounded-xl bg-white border border-slate-200 text-slate-700 hover:bg-slate-50 text-sm font-medium transition-all shadow-sm flex items-center justify-center">
            Kembali ke Daftar
          </RouterLink>
        </div>
      </div>

      <!-- Detail Info -->
      <div class="grid grid-cols-1 lg:grid-cols-3 gap-5">
        
        <!-- Left Side: Case Context -->
        <div class="lg:col-span-2 bg-white rounded-xl border border-slate-200 p-5 shadow-sm space-y-4">
          <div class="flex items-center justify-between border-b border-slate-100 pb-2">
            <h3 class="text-base font-semibold text-slate-900">Deskripsi Kasus & Konten</h3>
            <span class="px-2.5 py-0.5 bg-rose-50 text-rose-600 text-xs font-semibold rounded-md border border-rose-100 uppercase tracking-widest">High Severity</span>
          </div>
          <div>
            <p class="text-[10px] font-bold text-slate-400 uppercase tracking-widest mb-1.5">Judul Konten Yang Dilaporkan</p>
            <p class="text-sm font-bold text-[#081F5C] mb-3">Jawaban di "Bagaimana algoritma Dijkstra bekerja?"</p>
            
            <p class="text-[10px] font-bold text-slate-400 uppercase tracking-widest mb-1.5">Barang Bukti Konten (Evidence)</p>
            <div class="p-4 bg-slate-50 rounded-xl border border-slate-200 text-sm text-slate-700 leading-relaxed font-mono">
              "Untuk jawaban lengkapnya silakan kunjungi website casino online kami di http://spam-link-example.com/bonus-new-member. Algoritma dijamin jalan 100%!"
            </div>
          </div>
        </div>

        <!-- Right Side: Action Panel -->
        <div class="bg-white rounded-xl border border-slate-200 p-5 shadow-sm space-y-4 flex flex-col justify-between">
          <div class="space-y-4">
            <h3 class="text-base font-semibold text-slate-900 border-b border-slate-100 pb-2">Panel Tindakan</h3>
            <div class="text-sm text-slate-600 space-y-2">
              <p>Dilaporkan oleh: <strong>Budi Santoso</strong></p>
              <p>Alasan: <strong class="text-rose-600">Tautan Eksternal/Spam</strong></p>
              <p>Waktu Masuk: <strong>12 menit lalu</strong></p>
            </div>
          </div>
          <div class="pt-4 border-t border-slate-100 space-y-2">
            <button class="w-full h-10 px-5 rounded-xl bg-emerald-50 text-emerald-600 hover:bg-emerald-100 text-sm font-medium transition-all shadow-sm">
              Pulihkan (Abaikan Laporan)
            </button>
            <button class="w-full h-10 px-5 rounded-xl bg-rose-600 text-white hover:bg-rose-700 text-sm font-medium transition-all shadow-sm">
              Hapus Konten Permanen
            </button>
          </div>
        </div>

      </div>

    </div>
  </div>
</template>

<script setup>
</script>
