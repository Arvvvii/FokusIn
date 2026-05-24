<template>
  <div class="relative min-h-screen pb-12 overflow-hidden bg-[#F7F2EB]">
    <!-- Mesh Background / Atmosphere -->
    <div class="absolute inset-0 pointer-events-none overflow-hidden">
      <div class="absolute top-[-10%] left-[-5%] w-[40%] h-[40%] bg-[#334EAC]/5 blur-[120px] rounded-full mix-blend-multiply"></div>
      <div class="absolute bottom-[-10%] right-[-10%] w-[50%] h-[50%] bg-[#7096D1]/10 blur-[120px] rounded-full mix-blend-multiply"></div>
      <div class="absolute inset-0 bg-[url('data:image/svg+xml;base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHdpZHRoPSIyNCIgaGVpZ2h0PSIyNCI+CjxyZWN0IHdpZHRoPSIyNCIgaGVpZ2h0PSIyNCIgZmlsbD0ibm9uZSIvPgo8Y2lyY2xlIGN4PSIyIiBjeT0iMiIgcj0iMSIgZmlsbD0icmdiYSgwLCAwLCAwLCAwLjA1KSIvPgo8L3N2Zz4=')] opacity-50 mix-blend-overlay"></div>
    </div>

    <div class="relative z-10 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8 space-y-8">
      
      <!-- HEADER SECTION -->
      <div class="bg-white/80 backdrop-blur-xl rounded-3xl p-7 md:p-8 shadow-[0_10px_40px_rgba(15,23,42,0.06)] border border-white/40 relative overflow-hidden flex flex-col md:flex-row md:items-center justify-between gap-6 transition-all duration-300 ease-out hover:shadow-xl group/card">
        <div class="absolute right-0 top-0 w-1/3 h-full bg-gradient-to-l from-[#EDF1F6]/80 to-transparent pointer-events-none"></div>
        
        <div class="relative z-10">
          <div class="flex items-center gap-3 mb-2">
             <span class="w-10 h-10 rounded-xl bg-[#334EAC]/10 text-[#334EAC] flex items-center justify-center shrink-0">
               <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M4 14.899A7 7 0 1 1 15.71 8h1.79a4.5 4.5 0 0 1 2.5 8.242"/><path d="M12 12v9"/><path d="m8 16 4-4 4 4"/></svg>
             </span>
             <h1 class="text-2xl md:text-3xl font-bold text-slate-900 tracking-tight">Upload Arsip Soal</h1>
          </div>
          <p class="text-[14px] text-slate-500 font-medium max-w-xl leading-relaxed ml-14">
            Unggah dokumen ujian atau kuis. AI kami akan secara otomatis mengekstrak teks, mendeteksi topik, dan menilai tingkat kesulitan soal.
          </p>
        </div>

        <div class="relative z-10 flex shrink-0 gap-3">
          <button class="px-5 py-2.5 bg-white border border-slate-200 hover:border-[#7096D1] text-slate-600 rounded-2xl font-bold text-[13px] transition-all shadow-sm active:scale-95 flex items-center gap-2">
            Simpan Draft
          </button>
          <button class="px-5 py-2.5 bg-[#334EAC] hover:bg-[#081F5C] text-white rounded-2xl font-bold text-[13px] transition-all shadow-[0_8px_20px_rgba(51,78,172,0.2)] active:scale-95 flex items-center gap-2">
            Upload Arsip
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M5 12h14"/><path d="m12 5 7 7-7 7"/></svg>
          </button>
        </div>
      </div>

      <div class="grid grid-cols-1 lg:grid-cols-12 gap-8">
        
        <!-- LEFT CONTENT: UPLOAD & FORM -->
        <div class="lg:col-span-7 space-y-6">
          
          <!-- Drag & Drop Uploader -->
          <div class="bg-white/60 backdrop-blur-xl rounded-3xl p-8 border-2 border-dashed border-[#7096D1]/40 hover:border-[#334EAC] hover:bg-[#EDF1F6]/50 transition-all cursor-pointer flex flex-col items-center justify-center min-h-[280px] group relative overflow-hidden">
            <div class="w-16 h-16 rounded-full bg-white shadow-sm flex items-center justify-center text-[#334EAC] mb-4 group-hover:scale-110 transition-transform relative z-10">
              <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M14 2v4a2 2 0 0 0 2 2h4"/><path d="M10.4 12.6a2 2 0 1 1 3 3L8 21l-4 1 1-4Z"/><path d="M20 18.5a2 2 0 1 0-4-4"/></svg>
            </div>
            <h3 class="text-[16px] font-bold text-slate-900 tracking-tight mb-2 relative z-10">Tarik & Lepas File di Sini</h3>
            <p class="text-[13px] font-medium text-slate-500 text-center max-w-sm relative z-10">
              Mendukung format PDF atau DOCX hingga 10MB. Gunakan file dengan teks yang dapat dibaca agar AI OCR bekerja maksimal.
            </p>
            <div class="mt-6 px-5 py-2.5 bg-white border border-slate-200 text-slate-900 rounded-2xl text-[12px] font-bold shadow-sm flex items-center gap-2 relative z-10 hover:border-[#7096D1] transition-all">
              <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"/><polyline points="17 8 12 3 7 8"/><line x1="12" x2="12" y1="3" y2="15"/></svg>
              Pilih Dokumen
            </div>
          </div>

          <!-- Upload Form -->
          <div class="bg-white/80 backdrop-blur-xl rounded-3xl p-7 shadow-[0_10px_40px_rgba(15,23,42,0.06)] border border-slate-100 transition-all duration-300 ease-out hover:shadow-xl group/card">
            <h3 class="text-[16px] font-bold text-slate-900 tracking-tight mb-6 flex items-center gap-3">
               <span class="w-8 h-8 rounded-lg bg-[#EDF1F6] flex items-center justify-center text-[#334EAC]">
                 <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><rect width="18" height="18" x="3" y="4" rx="2" ry="2"/><line x1="16" x2="16" y1="2" y2="6"/><line x1="8" x2="8" y1="2" y2="6"/><line x1="3" x2="21" y1="10" y2="10"/><path d="M8 14h.01"/><path d="M12 14h.01"/><path d="M16 14h.01"/><path d="M8 18h.01"/><path d="M12 18h.01"/><path d="M16 18h.01"/></svg>
               </span>
               Informasi Ujian
            </h3>

            <div class="space-y-5">
              <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
                <!-- Mata Kuliah -->
                <div class="space-y-2">
                  <label class="text-[13px] font-bold text-slate-900 tracking-tight">Mata Kuliah</label>
                  <select class="w-full px-4 py-3 bg-slate-50 border border-slate-200 rounded-xl text-[14px] text-slate-600 focus:outline-none focus:border-[#7096D1] focus:ring-4 focus:ring-[#7096D1]/10 transition-all appearance-none font-medium">
                    <option value="" disabled selected>Pilih Mata Kuliah</option>
                    <option>Struktur Data</option>
                    <option>Algoritma Dasar</option>
                    <option>Basis Data</option>
                  </select>
                </div>
                <!-- Semester -->
                <div class="space-y-2">
                  <label class="text-[13px] font-bold text-slate-900 tracking-tight">Semester</label>
                  <select class="w-full px-4 py-3 bg-slate-50 border border-slate-200 rounded-xl text-[14px] text-slate-600 focus:outline-none focus:border-[#7096D1] focus:ring-4 focus:ring-[#7096D1]/10 transition-all appearance-none font-medium">
                    <option value="" disabled selected>Pilih Semester</option>
                    <option>Ganjil 2025/2026</option>
                    <option>Genap 2025/2026</option>
                  </select>
                </div>
              </div>

              <!-- Kategori Ujian -->
              <div class="space-y-3">
                <label class="text-[13px] font-bold text-slate-900 tracking-tight">Kategori Ujian</label>
                <div class="flex flex-wrap gap-3">
                  <button class="px-5 py-2.5 rounded-xl border-2 border-[#334EAC] bg-[#334EAC]/5 text-[#334EAC] font-bold text-[13px] transition-all">
                    UAS
                  </button>
                  <button class="px-5 py-2.5 rounded-xl border-2 border-slate-200 bg-white text-slate-500 font-bold text-[13px] hover:border-[#7096D1] transition-all">
                    UTS
                  </button>
                  <button class="px-5 py-2.5 rounded-xl border-2 border-slate-200 bg-white text-slate-500 font-bold text-[13px] hover:border-[#7096D1] transition-all">
                    Kuis
                  </button>
                  <button class="px-5 py-2.5 rounded-xl border-2 border-slate-200 bg-white text-slate-500 font-bold text-[13px] hover:border-[#7096D1] transition-all">
                    Latihan
                  </button>
                </div>
              </div>

              <!-- Deskripsi -->
              <div class="space-y-2">
                <label class="text-[13px] font-bold text-slate-900 tracking-tight">Deskripsi Arsip</label>
                <textarea rows="3" class="w-full px-4 py-3 bg-slate-50 border border-slate-200 rounded-xl text-[14px] text-slate-600 focus:outline-none focus:border-[#7096D1] focus:ring-4 focus:ring-[#7096D1]/10 transition-all font-medium resize-none" placeholder="Masukkan deskripsi singkat tentang soal ujian ini..."></textarea>
              </div>
            </div>
          </div>
        </div>

        <!-- RIGHT CONTENT: AI EXTRACTION PREVIEW -->
        <div class="lg:col-span-5 space-y-6">
          <div class="bg-gradient-to-br from-[#081F5C] to-[#334EAC] rounded-3xl p-7 shadow-[0_15px_40px_rgba(8,31,92,0.15)] border border-white/10 text-white relative overflow-hidden transition-all duration-300 ease-out hover:shadow-2xl group/card">
            <div class="absolute -right-4 -top-4 w-40 h-40 bg-white/10 blur-[50px] rounded-full pointer-events-none"></div>
            
            <div class="flex items-center justify-between mb-6 relative z-10">
              <h3 class="text-[16px] font-bold tracking-tight flex items-center gap-2">
                <span class="w-8 h-8 rounded-lg bg-white/10 flex items-center justify-center"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="m12 3-1.912 5.813a2 2 0 0 1-1.275 1.275L3 12l5.813 1.912a2 2 0 0 1 1.275 1.275L12 21l1.912-5.813a2 2 0 0 1 1.275-1.275L21 12l-5.813-1.912a2 2 0 0 1-1.275-1.275L12 3Z"/></svg></span>
                AI Extraction Preview
              </h3>
              <span class="px-2.5 py-1 bg-emerald-500/20 border border-emerald-500/30 text-emerald-400 rounded-lg text-[10px] font-bold uppercase tracking-widest flex items-center gap-1">
                <span class="w-1.5 h-1.5 bg-emerald-400 rounded-full animate-pulse"></span> OCR Active
              </span>
            </div>

            <!-- Fake processing state (static for now) -->
            <div class="space-y-6 relative z-10">
              
              <div class="bg-white/10 border border-white/10 rounded-xl p-4">
                <p class="text-[11px] font-bold text-[#BAD6EB] uppercase tracking-widest mb-2 flex justify-between">
                  <span>Confidence Level</span>
                  <span class="text-white">96%</span>
                </p>
                <div class="h-2 w-full bg-black/20 rounded-full overflow-hidden shadow-inner">
                  <div class="h-full bg-gradient-to-r from-emerald-400 to-emerald-300 rounded-full" style="width: 96%"></div>
                </div>
                <p class="text-[12px] font-medium text-[#BAD6EB] mt-2">Teks terbaca dengan sangat jelas. Tidak ada blur signifikan.</p>
              </div>

              <div class="grid grid-cols-2 gap-3">
                <div class="bg-white/5 border border-white/10 rounded-xl p-4">
                   <p class="text-[11px] font-bold text-[#BAD6EB] uppercase tracking-widest mb-1">Estimasi Kesulitan</p>
                   <p class="text-[16px] font-bold tracking-tight text-amber-400 flex items-center gap-2">
                     <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"/></svg>
                     Menengah
                   </p>
                </div>
                <div class="bg-white/5 border border-white/10 rounded-xl p-4">
                   <p class="text-[11px] font-bold text-[#BAD6EB] uppercase tracking-widest mb-1">Topik Terdeteksi</p>
                   <p class="text-[16px] font-bold tracking-tight text-white">4 Sub-Topik</p>
                </div>
              </div>

              <div>
                <p class="text-[11px] font-bold text-[#BAD6EB] uppercase tracking-widest mb-2">Keywords Diekstrak</p>
                <div class="flex flex-wrap gap-2">
                  <span class="px-2.5 py-1 bg-white/10 border border-white/20 text-white rounded-lg text-[12px] font-bold">Linked List</span>
                  <span class="px-2.5 py-1 bg-white/10 border border-white/20 text-white rounded-lg text-[12px] font-bold">Traversal</span>
                  <span class="px-2.5 py-1 bg-white/10 border border-white/20 text-white rounded-lg text-[12px] font-bold">Big-O</span>
                  <span class="px-2.5 py-1 bg-white/10 border border-white/20 text-white rounded-lg text-[12px] font-bold">Memory</span>
                </div>
              </div>

              <div class="pt-4 border-t border-white/10 grid grid-cols-2 gap-3">
                <button class="py-2.5 bg-white/10 hover:bg-white/20 text-white rounded-2xl font-bold text-[12px] transition-all flex items-center justify-center gap-2">
                  <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M2 12s3-7 10-7 10 7 10 7-3 7-10 7-10-7-10-7Z"/><circle cx="12" cy="12" r="3"/></svg>
                  Preview Hasil
                </button>
                <RouterLink to="/tutor/ai-validation" class="py-2.5 bg-white text-slate-900 hover:bg-[#F7F2EB] rounded-2xl font-bold text-[12px] transition-all flex items-center justify-center gap-2 shadow-sm text-center">
                  <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M12 22h6a2 2 0 0 0 2-2V7l-5-5H6a2 2 0 0 0-2 2v10"/><path d="M14 2v4a2 2 0 0 0 2 2h4"/><path d="M10.4 12.6a2 2 0 1 1 3 3L8 21l-4 1 1-4Z"/></svg>
                  Validasi AI
                </RouterLink>
              </div>

            </div>
          </div>
        </div>

      </div>
    </div>
  </div>
</template>

<script setup>
import { RouterLink } from 'vue-router'
</script>
