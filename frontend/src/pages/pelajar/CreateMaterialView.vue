<template>
  <div class="space-y-8 animate-in fade-in duration-500">
    
    <!-- 1. Page Header -->
    <div class="mb-10">
      <div class="flex items-center gap-2 text-[13px] font-bold text-slate-400 mb-4 flex-wrap">
        <RouterLink to="/pelajar/materials" class="hover:text-[#334EAC] transition-colors shrink-0">Materi</RouterLink>
        <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" class="shrink-0"><path d="m9 18 6-6-6-6"/></svg>
        <span class="text-[#081F5C] shrink-0">Unggah</span>
      </div>
      <h1 class="text-3xl md:text-4xl font-bold text-slate-900 tracking-tight mb-3">Publikasikan Materi Akademik</h1>
      <p class="text-slate-500 font-medium text-[16px] leading-relaxed max-w-2xl">Bagikan catatan kuliah, ringkasan, dan persiapan ujianmu dengan komunitas FokusIn.</p>
    </div>

    <div class="flex flex-col xl:flex-row gap-8 min-w-0">
      
      <!-- Left / Main Upload Form (w-65%) -->
      <div class="w-full xl:w-[65%] space-y-8 min-w-0">
        
        <!-- Document Upload Area -->
        <div class="bg-white/80 backdrop-blur-xl rounded-3xl p-6 md:p-10 shadow-[0_10px_40px_rgba(15,23,42,0.06)] border border-slate-100 w-full overflow-hidden transition-all duration-300 ease-out hover:shadow-xl group/card">
          <h3 class="text-[17px] font-bold text-slate-900 mb-5 flex items-center gap-3 tracking-tight">
            <span class="w-8 h-8 rounded-full bg-[#EDF1F6] flex items-center justify-center text-[#334EAC]">
              <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"/><polyline points="17 8 12 3 7 8"/><line x1="12" x2="12" y1="3" y2="15"/></svg>
            </span>
            Lampiran File
          </h3>
          
          <div class="relative flex flex-col items-center justify-center p-12 border-[2px] border-dashed border-slate-200 rounded-3xl bg-slate-50/50 hover:bg-[#F7F2EB]/50 hover:border-[#7096D1] transition-all cursor-pointer group">
            <div class="w-16 h-16 rounded-2xl bg-white shadow-sm border border-slate-100 flex items-center justify-center text-[#334EAC] mb-5 group-hover:-translate-y-1 transition-transform">
              <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M14.5 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V7.5L14.5 2z"/><polyline points="14 2 14 8 20 8"/></svg>
            </div>
            <h4 class="text-[16px] font-bold text-slate-900 text-center mb-1 tracking-tight">Tarik & letakkan filemu di sini</h4>
            <p class="text-[13px] font-medium text-slate-400 text-center mb-6">PDF, DOCX, PPTX hingga 50MB</p>
            <button @click.prevent class="px-6 py-2.5 bg-white border border-slate-200 rounded-xl text-slate-900 font-bold text-[13px] hover:border-[#334EAC] transition-colors shadow-sm">Jelajahi File</button>
          </div>

          <!-- Upload Progress Mockup (Hidden by default, shown for example) -->
          <div class="mt-6 p-4 border border-slate-200 rounded-2xl bg-slate-50 hidden">
            <div class="flex items-center justify-between mb-2">
              <div class="flex items-center gap-3">
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" class="text-[#334EAC]"><path d="M14.5 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V7.5L14.5 2z"/><polyline points="14 2 14 8 20 8"/></svg>
                <span class="text-[13px] font-bold text-slate-900 tracking-tight">Physics_Chapter_1_Notes.pdf</span>
              </div>
              <span class="text-[12px] font-bold text-slate-400">45%</span>
            </div>
            <div class="w-full h-1.5 bg-slate-200 rounded-full overflow-hidden">
              <div class="h-full bg-[#334EAC] w-[45%] rounded-full"></div>
            </div>
          </div>
        </div>

        <!-- Material Details Form -->
        <div class="bg-white/80 backdrop-blur-xl rounded-3xl p-6 md:p-10 shadow-[0_10px_40px_rgba(15,23,42,0.06)] border border-slate-100 w-full overflow-hidden transition-all duration-300 ease-out hover:shadow-xl group/card">
          <h3 class="text-[17px] font-bold text-slate-900 mb-8 flex items-center gap-3 tracking-tight">
            <span class="w-8 h-8 rounded-full bg-[#EDF1F6] flex items-center justify-center text-[#334EAC]">
              <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"/><path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z"/></svg>
            </span>
            Detail & Metadata
          </h3>

          <div class="space-y-6">
            <div class="space-y-3">
              <label class="text-[13px] font-bold text-slate-400 uppercase tracking-widest ml-1">Judul Dokumen</label>
              <input type="text" class="w-full px-5 py-3.5 bg-slate-50 border border-slate-200 rounded-2xl text-[14px] font-bold text-slate-900 placeholder-slate-400 focus:outline-none focus:border-[#7096D1] focus:ring-4 focus:ring-[#7096D1]/10 transition-all" placeholder="contoh, Panduan Lengkap Aljabar Linear">
            </div>

            <div class="space-y-3">
              <label class="text-[13px] font-bold text-slate-400 uppercase tracking-widest ml-1">Deskripsi / Ringkasan</label>
              <textarea rows="4" class="w-full px-5 py-3.5 bg-slate-50 border border-slate-200 rounded-2xl text-[14px] font-bold text-slate-900 placeholder-slate-400 focus:outline-none focus:border-[#7096D1] focus:ring-4 focus:ring-[#7096D1]/10 transition-all resize-none" placeholder="Jelaskan secara singkat apa yang dibahas materi ini..."></textarea>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
              <div class="space-y-3">
                <label class="text-[13px] font-bold text-slate-400 uppercase tracking-widest ml-1">Kategori</label>
                <div class="relative">
                  <select class="w-full px-5 py-3.5 bg-slate-50 border border-slate-200 rounded-2xl text-[14px] font-bold text-slate-900 focus:outline-none focus:border-[#7096D1] focus:ring-4 focus:ring-[#7096D1]/10 transition-all appearance-none cursor-pointer">
                    <option>Pilih Kategori</option>
                    <option>Fisika</option>
                    <option>Ilmu Komputer</option>
                    <option>Matematika</option>
                  </select>
                  <div class="absolute inset-y-0 right-0 pr-4 flex items-center pointer-events-none text-slate-400">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"><path d="m6 9 6 6 6-6"/></svg>
                  </div>
                </div>
              </div>
              <div class="space-y-3">
                <label class="text-[13px] font-bold text-slate-400 uppercase tracking-widest ml-1">Jenis File</label>
                <div class="relative">
                  <select class="w-full px-5 py-3.5 bg-slate-50 border border-slate-200 rounded-2xl text-[14px] font-bold text-slate-900 focus:outline-none focus:border-[#7096D1] focus:ring-4 focus:ring-[#7096D1]/10 transition-all appearance-none cursor-pointer">
                    <option>Dokumen PDF</option>
                    <option>Word (DOCX)</option>
                    <option>PowerPoint (PPT)</option>
                  </select>
                  <div class="absolute inset-y-0 right-0 pr-4 flex items-center pointer-events-none text-slate-400">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"><path d="m6 9 6 6 6-6"/></svg>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

      </div>

      <!-- Right Panel / Tagging & Publish (w-35%) -->
      <div class="w-full xl:w-[35%] shrink-0 space-y-6 min-w-0">
        
        <!-- Tags & AI Recommendation -->
        <div class="bg-white/80 backdrop-blur-xl rounded-3xl p-6 md:p-8 shadow-[0_10px_40px_rgba(15,23,42,0.06)] border border-slate-100 transition-all duration-300 ease-out hover:shadow-xl group/card">
          <h3 class="text-[15px] font-bold text-slate-900 mb-5 tracking-tight">Tag & Klasifikasi</h3>
          
          <div class="space-y-3 mb-6">
            <input type="text" class="w-full px-4 py-3 bg-slate-50 border border-slate-200 rounded-xl text-[13px] font-bold text-slate-900 placeholder-slate-400 focus:outline-none focus:border-[#7096D1] focus:ring-2 focus:ring-[#7096D1]/10 transition-all" placeholder="Tambah tag (tekan Enter)">
            <div class="flex flex-wrap gap-2">
              <span class="inline-flex items-center gap-1.5 px-3 py-1.5 bg-[#EDF1F6] text-[#334EAC] rounded-lg text-[11px] font-bold border border-[#BAD6EB]">
                Kalkulus <button class="hover:text-rose-500 transition-colors"><svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"><line x1="18" x2="6" y1="6" y2="18"/><line x1="6" x2="18" y1="6" y2="18"/></svg></button>
              </span>
            </div>
          </div>

          <!-- AI Auto-Tag Suggestion -->
          <div class="p-5 rounded-2xl bg-gradient-to-br from-[#F7F2EB] to-white border border-amber-100 relative overflow-hidden group">
            <div class="absolute top-0 right-0 w-24 h-24 bg-amber-100/30 rounded-bl-full pointer-events-none group-hover:scale-110 transition-transform"></div>
            <h4 class="text-[13px] font-bold text-slate-900 mb-2 flex items-center gap-2 relative z-10 tracking-tight">
              <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="#F59E0B" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"/><path d="M12 16v-4"/><path d="M12 8h.01"/></svg>
              Tag Otomatis AI
            </h4>
            <p class="text-[12px] font-medium text-slate-500 mb-4 leading-relaxed relative z-10">Unggah file, dan AI kami akan secara otomatis memindai dan menyarankan tag kurikulum yang sesuai.</p>
            <button @click.prevent class="w-full py-2 bg-white border border-amber-200 text-amber-600 rounded-lg text-[11px] font-bold hover:border-amber-300 transition-colors relative z-10">
              Pindai Dokumen
            </button>
          </div>
        </div>

        <!-- Action Buttons -->
        <div class="bg-white/80 backdrop-blur-xl rounded-3xl p-6 md:p-8 shadow-[0_10px_40px_rgba(15,23,42,0.06)] border border-slate-100 flex flex-col gap-3 transition-all duration-300 ease-out hover:shadow-xl group/card">
          <RouterLink to="/pelajar/materials" class="w-full py-4 bg-[#334EAC] hover:bg-[#081F5C] text-white rounded-2xl font-bold text-[15px] transition-all shadow-[0_4px_15px_rgba(51,78,172,0.15)] active:scale-95 flex items-center justify-center gap-2 text-center">
            <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"><path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"/><polyline points="17 8 12 3 7 8"/><line x1="12" x2="12" y1="3" y2="15"/></svg>
            Publikasikan Materi
          </RouterLink>
          
          <div class="flex gap-3">
            <button @click.prevent class="flex-1 py-3.5 bg-white border border-slate-200 hover:border-[#334EAC] text-slate-600 hover:text-[#334EAC] rounded-2xl font-bold text-[14px] transition-colors active:scale-95">
              Simpan Draf
            </button>
            <RouterLink to="/pelajar/materials" class="flex-1 py-3.5 bg-slate-50 border border-transparent hover:bg-slate-100 text-slate-500 hover:text-slate-900 rounded-2xl font-bold text-[14px] transition-colors active:scale-95 text-center">
              Batal
            </RouterLink>
          </div>
        </div>

      </div>
    </div>
  </div>
</template>

<script setup>
import { RouterLink } from 'vue-router'
// Upload Material Workspace
</script>
