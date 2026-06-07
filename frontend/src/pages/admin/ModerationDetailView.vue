<template>
  <div class="relative min-h-screen pb-12 bg-[#F7F2EB]">
    <div class="max-w-[1450px] mx-auto px-4 sm:px-6 xl:px-8 py-6 space-y-5 animate-in fade-in duration-500">
      
      <!-- Back Navigation -->
      <div class="mb-6 flex items-center gap-2">
        <RouterLink
          to="/admin/moderation"
          class="text-sm font-bold text-slate-400 hover:text-[#334EAC] transition-colors flex items-center gap-1 w-fit bg-white/50 px-3 py-1.5 rounded-lg border border-slate-200/50"
        >
          ← Kembali ke Antrean
        </RouterLink>
      </div>

      <!-- Compact Editorial Header -->
      <div class="bg-white/60 backdrop-blur-xl rounded-3xl p-7 md:p-8 shadow-[0_10px_40px_rgba(15,23,42,0.06)] border border-slate-200/60 relative overflow-hidden flex flex-col sm:flex-row sm:items-center justify-between gap-5 mb-6">
        <div class="flex items-center gap-4">
          <span class="w-12 h-12 rounded-xl bg-[#334EAC]/10 text-[#334EAC] flex items-center justify-center shrink-0">
            <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path d="m3 21 1.9-5.7a8.5 8.5 0 1 1 3.8 3.8z"/></svg>
          </span>
          <div>
            <h1 class="text-3xl md:text-4xl font-extrabold text-slate-900 tracking-tight leading-tight">Detail Audit Moderasi</h1>
            <p class="text-[15px] text-slate-600 font-medium mt-2 max-w-xl leading-relaxed">Pemeriksaan konten berbendera AI (AI Flagged) atau dilaporkan pengguna.</p>
          </div>
        </div>
      </div>

      <!-- Detail Info -->
      <div class="grid grid-cols-1 lg:grid-cols-3 gap-5">
        
        <!-- Left Side: Content Audit -->
        <div class="lg:col-span-2 bg-white rounded-xl border border-slate-200 p-5 shadow-sm space-y-4">
          <div class="flex items-center justify-between border-b border-slate-100 pb-2">
            <h3 class="text-base font-semibold text-slate-900">Isi Thread / Diskusi</h3>
            <span class="px-2.5 py-0.5 bg-amber-50 text-amber-600 text-xs font-semibold rounded-md border border-amber-100 uppercase tracking-widest">AI Flagged</span>
          </div>
          <div>
            <p class="text-[10px] font-bold text-slate-400 uppercase tracking-widest mb-1">Materi Terduga Plagiat</p>
            <p class="text-sm font-bold text-[#081F5C] mb-3">Catatan Kalkulus Dasar Semester 1</p>
            
            <p class="text-[10px] font-bold text-slate-400 uppercase tracking-widest mb-1">Audit Log Kesamaan AI (AI Similarity Audit)</p>
            <div class="p-4 bg-slate-50 rounded-xl border border-slate-200 text-sm text-slate-700 leading-relaxed font-mono mb-4">
              "Similarity: 89% dengan Modul Resmi Kalkulus Universitas X. Tidak ada sitasi valid yang disertakan oleh pengunggah."
            </div>
          </div>
        </div>

        <!-- Right Side: Action Panel -->
        <div class="bg-white rounded-xl border border-slate-200 p-5 shadow-sm space-y-4 flex flex-col justify-between">
          <div class="space-y-4">
            <h3 class="text-base font-semibold text-slate-900 border-b border-slate-100 pb-2">Detail Insiden</h3>
            <div class="text-sm text-slate-600 space-y-2">
              <p>Pengunggah: <strong>Andi Pratama</strong></p>
              <p>Pelapor: <strong>System AI Auditor</strong></p>
              <p>Status: <strong class="text-amber-600">Pending Review</strong></p>
            </div>
          </div>
          <div class="pt-4 border-t border-slate-100 space-y-2">
            <button class="w-full h-10 px-5 rounded-xl bg-emerald-50 text-emerald-600 hover:bg-emerald-100 text-sm font-medium transition-all shadow-sm">
              Sertifikasi Aman (Safe)
            </button>
            <button class="w-full h-10 px-5 rounded-xl bg-rose-600 text-white hover:bg-rose-700 text-sm font-medium transition-all shadow-sm">
              Hapus & Bekukan User
            </button>
          </div>
        </div>

      </div>

    </div>
  </div>
</template>

<script setup>
</script>
