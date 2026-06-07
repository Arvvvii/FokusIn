<template>
  <div class="space-y-8 animate-in fade-in duration-500">
    
    <!-- 1. HEADER SECTION -->
    <div class="page-header-banner p-6 md:p-8 flex flex-col md:flex-row md:items-center justify-between gap-6 mb-8 relative">
      <div class="absolute right-0 top-0 w-1/3 h-full bg-gradient-to-l from-[#EDF1F6]/80 to-transparent pointer-events-none"></div>
      
      <div class="relative z-10 flex items-center gap-4">
        <span class="page-header-icon w-12 h-12 flex items-center justify-center shrink-0">
          <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="m12 3-1.912 5.813a2 2 0 0 1-1.275 1.275L3 12l5.813 1.912a2 2 0 0 1 1.275 1.275L12 21l1.912-5.813a2 2 0 0 1 1.275-1.275L21 12l-5.813-1.912a2 2 0 0 1-1.275-1.275L12 3Z"/></svg>
        </span>
        <div>
          <h1 class="text-2xl md:text-3xl font-extrabold text-[#081F5C] tracking-tight">Analisis Pola AI</h1>
          <p class="text-xs md:text-sm text-[#4A5880]/90 font-medium mt-1.5 max-w-xl leading-relaxed">
            Unggah ujian sebelumnya atau materi belajar. AI kami akan menganalisis pola historis dan merancang rencana belajar strategis untukmu.
          </p>
        </div>
      </div>

      <!-- Primary CTA -->
      <div class="relative z-10 flex shrink-0 w-full md:w-auto">
        <RouterLink to="/pelajar/ai-analyzer/create" class="btn-solid w-full md:w-auto px-5 py-2.5 flex items-center justify-center gap-2">
          <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"/><polyline points="17 8 12 3 7 8"/><line x1="12" x2="12" y1="3" y2="15"/></svg>
          Analisis Baru
        </RouterLink>
      </div>
    </div>

    <!-- Upload Area -->
    <RouterLink to="/pelajar/ai-analyzer/create" class="block card-base rounded-3xl p-8 md:p-14 mb-12 transition-all duration-300 ease-out relative overflow-hidden group">
      <!-- Glow Orb -->
      <div class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 w-96 h-96 bg-[#334EAC]/10 blur-[100px] rounded-full pointer-events-none opacity-0 group-hover:opacity-100 transition-opacity duration-700"></div>
      
      <div class="upload-zone max-w-3xl mx-auto flex flex-col items-center justify-center p-12 md:p-16 rounded-3xl cursor-pointer relative z-10">
        
        <div class="w-20 h-20 rounded-full bg-gradient-to-br from-[#F7F2EB] to-white flex items-center justify-center text-[#081F5C] mb-6 group-hover:-translate-y-2 group-hover:shadow-lg group-hover:shadow-[#334EAC]/20 transition-all duration-300 border border-[#D0E3FF]/50 relative">
          <div class="absolute inset-0 rounded-full bg-[#7096D1]/20 blur-md animate-pulse"></div>
          <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" class="relative z-10"><path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"/><polyline points="17 8 12 3 7 8"/><line x1="12" x2="12" y1="3" y2="15"/></svg>
        </div>
        
        <h3 class="text-[22px] font-bold text-slate-900 text-center mb-3 tracking-tight">Tarik dan lepaskan dokumenmu di sini</h3>
        <p class="text-[15px] font-medium text-slate-500 text-center max-w-md mb-8 leading-relaxed">Kami menerima file PDF, DOCX, dan TXT yang berisi lembar ujian, catatan kuliah, atau bab buku.</p>
        
        <div class="flex items-center gap-4">
          <span class="px-4 py-1.5 bg-white text-slate-400 text-[11px] font-extrabold rounded-xl shadow-sm border border-slate-200/60 uppercase tracking-widest">PDF</span>
          <span class="px-4 py-1.5 bg-white text-slate-400 text-[11px] font-extrabold rounded-xl shadow-sm border border-slate-200/60 uppercase tracking-widest">DOCX</span>
          <span class="px-4 py-1.5 bg-[#EDF1F6] text-[#334EAC] text-[11px] font-extrabold rounded-xl shadow-sm border border-slate-200/60 uppercase tracking-widest">Maks 10MB</span>
        </div>
      </div>
    </RouterLink>

    <!-- Analytics Grid Layout (Compact & Clean) -->
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6 lg:gap-8">
      
      <!-- Most Frequent Topics -->
      <div class="card-panel lg:col-span-2 rounded-3xl p-8 transition-all duration-300 ease-out group/card">
        <div class="flex items-center justify-between mb-8">
          <h3 class="text-[17px] font-bold text-slate-900 flex items-center gap-3 tracking-tight">
            <span class="w-8 h-8 rounded-lg bg-[#F7F2EB] flex items-center justify-center text-[#081F5C] border border-[#D0E3FF]/50 group-hover/card:scale-110 transition-transform"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"><path d="M3 3v18h18"/><path d="m19 9-5 5-4-4-3 3"/></svg></span>
            Frekuensi Topik
          </h3>
          <span class="text-[12px] font-bold text-slate-400">Berdasarkan unggahan terakhir</span>
        </div>
        
        <div class="space-y-6">
          <div class="group cursor-pointer">
            <div class="flex justify-between items-center text-[14px] font-bold mb-2">
              <span class="text-[#081F5C] group-hover:text-[#334EAC] transition-colors">Kinematika & Dinamika</span>
              <span class="text-slate-500 font-extrabold">32%</span>
            </div>
            <div class="w-full h-2.5 bg-[#EDF1F6] rounded-full overflow-hidden">
              <div class="h-full bg-[#334EAC] w-[32%] rounded-full transition-all"></div>
            </div>
          </div>

          <div class="group cursor-pointer">
            <div class="flex justify-between items-center text-[14px] font-bold mb-2">
              <span class="text-[#081F5C] group-hover:text-[#334EAC] transition-colors">Elektromagnetisme</span>
              <span class="text-slate-500 font-extrabold">24%</span>
            </div>
            <div class="w-full h-2.5 bg-[#EDF1F6] rounded-full overflow-hidden">
              <div class="h-full bg-[#7096D1] w-[24%] rounded-full transition-all"></div>
            </div>
          </div>

          <div class="group cursor-pointer">
            <div class="flex justify-between items-center text-[14px] font-bold mb-2">
              <span class="text-[#081F5C] group-hover:text-[#334EAC] transition-colors">Termodinamika</span>
              <span class="text-slate-500 font-extrabold">18%</span>
            </div>
            <div class="w-full h-2.5 bg-[#EDF1F6] rounded-full overflow-hidden">
              <div class="h-full bg-[#BAD6EB] w-[18%] rounded-full transition-all"></div>
            </div>
          </div>

          <div class="group cursor-pointer">
            <div class="flex justify-between items-center text-[14px] font-bold mb-2">
              <span class="text-[#081F5C] group-hover:text-[#334EAC] transition-colors">Fisika Modern</span>
              <span class="text-slate-500 font-extrabold">15%</span>
            </div>
            <div class="w-full h-2.5 bg-[#EDF1F6] rounded-full overflow-hidden">
              <div class="h-full bg-slate-300 w-[15%] rounded-full transition-all"></div>
            </div>
          </div>
        </div>
      </div>

      <!-- Difficulty Chart -->
      <div class="card-panel rounded-3xl p-8 flex flex-col items-center transition-all duration-300 ease-out group/card relative overflow-hidden">
        <div class="absolute inset-0 bg-gradient-to-br from-amber-500/5 to-transparent opacity-0 group-hover/card:opacity-100 transition-opacity duration-500 pointer-events-none"></div>
        <h3 class="text-[17px] font-bold text-slate-900 mb-8 w-full text-left flex items-center gap-3 tracking-tight">
          <span class="w-8 h-8 rounded-lg bg-amber-50 flex items-center justify-center text-amber-600 border border-amber-100/50 group-hover/card:scale-110 transition-transform"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"><path d="M12 2v20"/><path d="M17 5H9.5a3.5 3.5 0 0 0 0 7h5a3.5 3.5 0 0 1 0 7H6"/></svg></span>
          Tingkat Kesulitan
        </h3>
        
        <!-- Clean Donut Mockup -->
        <div class="relative w-44 h-44 mb-6">
          <svg viewBox="0 0 36 36" class="w-full h-full transform -rotate-90">
            <!-- Background -->
            <path class="text-[#EDF1F6]" d="M18 2.0845 a 15.9155 15.9155 0 0 1 0 31.831 a 15.9155 15.9155 0 0 1 0 -31.831" fill="none" stroke="currentColor" stroke-width="3.5" />
            <!-- Hard -->
            <path class="text-rose-400" stroke-dasharray="45, 100" d="M18 2.0845 a 15.9155 15.9155 0 0 1 0 31.831 a 15.9155 15.9155 0 0 1 0 -31.831" fill="none" stroke="currentColor" stroke-width="3.5" />
            <!-- Medium -->
            <path class="text-[#7096D1]" stroke-dasharray="35, 100" stroke-dashoffset="-45" d="M18 2.0845 a 15.9155 15.9155 0 0 1 0 31.831 a 15.9155 15.9155 0 0 1 0 -31.831" fill="none" stroke="currentColor" stroke-width="3.5" />
            <!-- Easy -->
            <path class="text-[#BAD6EB]" stroke-dasharray="20, 100" stroke-dashoffset="-80" d="M18 2.0845 a 15.9155 15.9155 0 0 1 0 31.831 a 15.9155 15.9155 0 0 1 0 -31.831" fill="none" stroke="currentColor" stroke-width="3.5" />
          </svg>
          <div class="absolute inset-0 flex flex-col items-center justify-center">
            <span class="text-3xl font-extrabold text-[#081F5C]">45%</span>
            <span class="text-[10px] font-extrabold text-slate-400 uppercase tracking-widest mt-0.5">Sulit</span>
          </div>
        </div>
        
        <div class="flex justify-center gap-5 w-full mt-auto">
          <div class="flex items-center gap-1.5">
            <div class="w-2.5 h-2.5 rounded-full bg-rose-400"></div>
            <span class="text-[12px] font-bold text-slate-500">Sulit</span>
          </div>
          <div class="flex items-center gap-1.5">
            <div class="w-2.5 h-2.5 rounded-full bg-[#7096D1]"></div>
            <span class="text-[12px] font-bold text-slate-500">Sedang</span>
          </div>
          <div class="flex items-center gap-1.5">
            <div class="w-2.5 h-2.5 rounded-full bg-[#BAD6EB]"></div>
            <span class="text-[12px] font-bold text-slate-500">Mudah</span>
          </div>
        </div>
      </div>

      <!-- AI Summary / Intelligence Report -->
      <div class="card-panel lg:col-span-2 rounded-3xl p-8 transition-all duration-300 ease-out group/card relative overflow-hidden">
        <div class="absolute inset-0 bg-gradient-to-br from-emerald-500/5 to-transparent opacity-0 group-hover/card:opacity-100 transition-opacity duration-500 pointer-events-none"></div>
        <h3 class="text-[17px] font-bold text-slate-900 mb-6 flex items-center gap-3 tracking-tight">
          <span class="w-8 h-8 rounded-lg bg-emerald-50 flex items-center justify-center text-emerald-600 border border-emerald-100/50 group-hover/card:scale-110 transition-transform"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"><path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"/><polyline points="14 2 14 8 20 8"/><line x1="16" y1="13" x2="8" y2="13"/><line x1="16" y1="17" x2="8" y2="17"/><polyline points="10 9 9 9 8 9"/></svg></span>
          Laporan Kecerdasan AI
        </h3>
        
        <p class="text-[14px] font-medium text-slate-600 leading-relaxed mb-8">
          Dokumen yang dianalisis sangat berfokus pada <strong class="text-[#081F5C]">Kinematika & Dinamika</strong> (32%), secara spesifik menguji pemahamanmu tentang Momentum Sudut dan Dinamika Benda Tegar. Data historis menunjukkan topik ini sering menjadi bagian paling menantang dalam ujian Fisika Dasar.
        </p>

        <h4 class="text-[13px] font-extrabold text-[#081F5C] mb-4">Rekomendasi Jalur Belajar</h4>
        <ul class="space-y-4 mb-6">
          <li class="flex items-start gap-3.5">
            <div class="w-6 h-6 rounded-md bg-[#EDF1F6] flex items-center justify-center text-[#334EAC] font-extrabold text-[12px] shrink-0 mt-0.5">1</div>
            <div>
              <p class="text-[14px] font-bold text-[#081F5C] mb-0.5">Ulangi Konservasi Momentum Sudut</p>
              <p class="text-[13px] text-slate-500">Fokus pada masalah yang melibatkan distribusi massa tidak seragam.</p>
            </div>
          </li>
          <li class="flex items-start gap-3.5">
            <div class="w-6 h-6 rounded-md bg-[#EDF1F6] flex items-center justify-center text-[#334EAC] font-extrabold text-[12px] shrink-0 mt-0.5">2</div>
            <div>
              <p class="text-[14px] font-bold text-[#081F5C] mb-0.5">Latihan Aljabar Vektor untuk Elektromagnetisme</p>
              <p class="text-[13px] text-slate-500">Secara khusus menargetkan perhitungan Gaya Lorentz.</p>
            </div>
          </li>
        </ul>

        <RouterLink to="/pelajar/materials" class="mt-2 inline-flex items-center gap-2 text-[14px] font-extrabold text-[#334EAC] hover:text-[#081F5C] transition-colors">
          Lihat silabus personal penuh
          <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"><path d="m9 18 6-6-6-6"/></svg>
        </RouterLink>
      </div>

      <!-- Important Keywords -->
      <div class="card-panel rounded-3xl p-8 transition-all duration-300 ease-out group/card relative overflow-hidden">
        <div class="absolute inset-0 bg-gradient-to-br from-[#334EAC]/5 to-transparent opacity-0 group-hover/card:opacity-100 transition-opacity duration-500 pointer-events-none"></div>
        <h3 class="text-[17px] font-bold text-slate-900 mb-6 flex items-center gap-3 tracking-tight">
          <span class="w-8 h-8 rounded-lg bg-[#F7F2EB] flex items-center justify-center text-[#081F5C] border border-[#D0E3FF]/50 group-hover/card:scale-110 transition-transform"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"><path d="M12 2v20"/><path d="m17 5-5-3-5 3v14l5 3 5-3Z"/></svg></span>
          Kata Kunci Penting
        </h3>
        
        <div class="flex flex-wrap gap-2.5">
          <span class="px-3.5 py-1.5 bg-slate-50 hover:bg-[#EDF1F6] text-slate-600 hover:text-[#081F5C] text-[12px] font-bold rounded-lg border border-slate-200/60 shadow-sm transition-colors cursor-pointer">Momentum Sudut</span>
          <span class="px-3.5 py-1.5 bg-slate-50 hover:bg-[#EDF1F6] text-slate-600 hover:text-[#081F5C] text-[12px] font-bold rounded-lg border border-slate-200/60 shadow-sm transition-colors cursor-pointer">Gaya Lorentz</span>
          <span class="px-3.5 py-1.5 bg-slate-50 hover:bg-[#EDF1F6] text-slate-600 hover:text-[#081F5C] text-[12px] font-bold rounded-lg border border-slate-200/60 shadow-sm transition-colors cursor-pointer">Entropi</span>
          <span class="px-3.5 py-1.5 bg-slate-50 hover:bg-[#EDF1F6] text-slate-600 hover:text-[#081F5C] text-[12px] font-bold rounded-lg border border-slate-200/60 shadow-sm transition-colors cursor-pointer">Relativitas</span>
          <span class="px-3.5 py-1.5 bg-slate-50 hover:bg-[#EDF1F6] text-slate-600 hover:text-[#081F5C] text-[12px] font-bold rounded-lg border border-slate-200/60 shadow-sm transition-colors cursor-pointer">Persamaan Maxwell</span>
          <span class="px-3.5 py-1.5 bg-slate-50 hover:bg-[#EDF1F6] text-slate-600 hover:text-[#081F5C] text-[12px] font-bold rounded-lg border border-slate-200/60 shadow-sm transition-colors cursor-pointer">Termodinamika</span>
        </div>
      </div>

    </div>
  </div>
</template>

<script setup>
import { RouterLink } from 'vue-router'
</script>

<style scoped>
/* AI Analyzer Specific Adjustments */
.ai-analyzer-hero {
  background: linear-gradient(135deg, #081F5C 0%, #0e2370 60%, #1a3aa8 100%);
  box-shadow: inset 0 0 40px rgba(112,150,209,0.2), 0 10px 40px rgba(8,31,92,0.15);
}
.ai-hero-icon {
  background: rgba(255,255,255,0.1);
  border: 1px solid rgba(255,255,255,0.2);
  box-shadow: 0 0 15px rgba(255,255,255,0.2);
  animation: ai-icon-pulse 3s infinite;
}
@keyframes ai-icon-pulse {
  0% { box-shadow: 0 0 10px rgba(255,255,255,0.1); }
  50% { box-shadow: 0 0 15px rgba(255,255,255,0.25); }
  100% { box-shadow: 0 0 10px rgba(255,255,255,0.1); }
}
.upload-zone {
  background: linear-gradient(135deg, rgba(255,255,255,0.6), rgba(237,241,246,0.5));
  border: 2px dashed rgba(112,150,209,0.4);
  transition: all 0.3s ease;
}
.upload-zone:hover {
  background: rgba(255,255,255,0.9);
  border-color: #334EAC;
}
</style>
