<template>
  <div class="space-y-6 animate-in fade-in duration-500">
    
    <!-- 1. Header / Breadcrumbs -->
    <div class="mb-10 text-center flex flex-col items-center">
      <div class="w-16 h-16 rounded-3xl bg-emerald-50 flex items-center justify-center text-emerald-500 mb-6 shadow-sm border border-emerald-100/50">
        <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"/><path d="m9 11 3 3L22 4"/></svg>
      </div>
      <h1 class="text-3xl md:text-4xl font-bold text-slate-900 tracking-tight mb-3">Kuis Selesai!</h1>
      <p class="text-slate-500 font-medium text-[16px] leading-relaxed max-w-lg">Kerja bagus telah menyelesaikan Cek Penguasaan Kinematika. Tinjau analitik performa dan wawasan AI-mu di bawah ini.</p>
    </div>

    <!-- 2. Top Stats Grid -->
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
      
      <!-- Score Card -->
      <div class="bg-white/80 backdrop-blur-xl rounded-3xl p-8 shadow-[0_10px_40px_rgba(15,23,42,0.06)] border border-slate-100 flex flex-col items-center justify-center relative overflow-hidden group transition-all duration-300 ease-out hover:shadow-xl group/card">
        <div class="absolute top-0 right-0 w-32 h-32 bg-[#7096D1] rounded-full blur-3xl opacity-[0.08] pointer-events-none"></div>
        <h3 class="text-[14px] font-extrabold text-slate-400 uppercase tracking-widest mb-6">Skor Akhir</h3>
        
        <div class="relative w-36 h-36 flex items-center justify-center mb-2">
          <svg viewBox="0 0 36 36" class="w-full h-full transform -rotate-90">
            <path class="text-[#EDF1F6]" d="M18 2.0845 a 15.9155 15.9155 0 0 1 0 31.831 a 15.9155 15.9155 0 0 1 0 -31.831" fill="none" stroke="currentColor" stroke-width="2.5" />
            <path class="text-[#334EAC]" stroke-dasharray="85, 100" d="M18 2.0845 a 15.9155 15.9155 0 0 1 0 31.831 a 15.9155 15.9155 0 0 1 0 -31.831" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" />
          </svg>
          <div class="absolute inset-0 flex flex-col items-center justify-center">
            <span class="text-4xl font-bold text-slate-900 tracking-tight">85</span>
            <span class="text-[12px] font-bold text-slate-400 mt-1">dari 100</span>
          </div>
        </div>
      </div>

      <!-- Accuracy & Time -->
      <div class="bg-white/80 backdrop-blur-xl rounded-3xl p-8 shadow-[0_10px_40px_rgba(15,23,42,0.06)] border border-slate-100 flex flex-col justify-center transition-all duration-300 ease-out hover:shadow-xl group/card">
        <div class="flex items-start gap-4 mb-8">
          <div class="w-12 h-12 rounded-[1rem] bg-emerald-50 flex items-center justify-center text-emerald-500 shrink-0">
            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"/><path d="m9 11 3 3L22 4"/></svg>
          </div>
          <div>
            <p class="text-[13px] font-bold text-slate-400 uppercase tracking-widest mb-1">Akurasi</p>
            <p class="text-2xl font-bold text-slate-900 mb-1 tracking-tight">13 <span class="text-slate-400 text-[16px]">/ 15</span></p>
            <p class="text-[12px] font-bold text-emerald-500">Jawaban benar</p>
          </div>
        </div>

        <div class="w-full h-px bg-slate-100 mb-8"></div>

        <div class="flex items-start gap-4">
          <div class="w-12 h-12 rounded-[1rem] bg-[#F7F2EB] flex items-center justify-center text-amber-500 shrink-0">
            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"/><polyline points="12 6 12 12 16 14"/></svg>
          </div>
          <div>
            <p class="text-[13px] font-bold text-slate-400 uppercase tracking-widest mb-1">Waktu Dihabiskan</p>
            <p class="text-2xl font-bold text-slate-900 mb-1 tracking-tight">21:14</p>
            <p class="text-[12px] font-bold text-slate-500">Rata-rata 1,4m per soal</p>
          </div>
        </div>
      </div>

      <!-- Ranking & CTA -->
      <div class="bg-white/80 backdrop-blur-xl rounded-3xl p-8 shadow-[0_10px_40px_rgba(15,23,42,0.06)] border border-slate-100 flex flex-col transition-all duration-300 ease-out hover:shadow-xl group/card">
        <div class="flex items-start gap-4 mb-auto">
          <div class="w-12 h-12 rounded-[1rem] bg-rose-50 flex items-center justify-center text-rose-500 shrink-0">
            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M6 9H4.5a2.5 2.5 0 0 1 0-5H6"/><path d="M18 9h1.5a2.5 2.5 0 0 0 0-5H18"/><path d="M4 22h16"/><path d="M10 14.66V17c0 .55-.47.98-.97 1.21C7.85 18.75 7 20.24 7 22"/><path d="M14 14.66V17c0 .55.47.98.97 1.21C16.15 18.75 17 20.24 17 22"/><path d="M18 2H6v7a6 6 0 0 0 12 0V2Z"/></svg>
          </div>
          <div>
            <p class="text-[13px] font-bold text-slate-400 uppercase tracking-widest mb-1">Persentil Kelas</p>
            <p class="text-2xl font-bold text-slate-900 mb-1 tracking-tight">Top 12%</p>
            <p class="text-[12px] font-bold text-slate-500">Kamu mengalahkan 88% siswa</p>
          </div>
        </div>

        <div class="flex flex-col gap-3 mt-8">
          <RouterLink to="/pelajar/quiz" class="w-full py-3.5 bg-[#334EAC] hover:bg-[#081F5C] text-white rounded-2xl font-bold text-[14px] transition-all shadow-[0_4px_15px_rgba(51,78,172,0.15)] active:scale-95 text-center">
            Kembali ke Kuis
          </RouterLink>
          <button class="w-full py-3.5 bg-slate-50 border border-slate-200 hover:border-[#334EAC] text-slate-900 hover:text-[#334EAC] rounded-2xl font-bold text-[14px] transition-colors active:scale-95 flex items-center justify-center gap-2">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M3 12a9 9 0 1 0 9-9 9.75 9.75 0 0 0-6.74 2.74L3 8"/><path d="M3 3v5h5"/></svg>
            Coba Lagi Kuis
          </button>
        </div>
      </div>
    </div>

    <div class="flex flex-col xl:flex-row gap-8">
      
      <!-- Main Content (Review) -->
      <div class="w-full xl:w-[65%] space-y-6">
        <h2 class="text-2xl font-bold text-slate-900 mb-2 tracking-tight">Tinjauan Pertanyaan</h2>
        
        <!-- Correct Answer Review -->
        <div class="bg-white/80 backdrop-blur-xl rounded-3xl p-8 shadow-[0_10px_40px_rgba(15,23,42,0.06)] border border-emerald-100/60 relative overflow-hidden transition-all duration-300 ease-out hover:shadow-xl group/card">
          <div class="absolute top-0 left-0 w-2 h-full bg-emerald-400"></div>
          
          <div class="flex items-center justify-between mb-4 pl-4">
            <span class="text-[14px] font-bold text-slate-400">Pertanyaan 1</span>
            <span class="px-3 py-1 bg-emerald-50 text-emerald-600 text-[11px] font-bold rounded-md uppercase tracking-widest border border-emerald-100">Benar</span>
          </div>
          
          <h3 class="text-[17px] font-bold text-slate-900 mb-6 pl-4 leading-relaxed tracking-tight">
            Apa prinsip kekekalan momentum sudut?
          </h3>

          <div class="pl-4 space-y-3 mb-6">
            <div class="flex items-center gap-4 p-4 rounded-2xl border-2 border-emerald-500 bg-emerald-50/30">
              <div class="w-6 h-6 rounded-md bg-emerald-500 text-white flex items-center justify-center shrink-0">
                <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"><path d="M20 6 9 17l-5-5"/></svg>
              </div>
              <span class="text-[15px] font-bold text-slate-900 tracking-tight">Momentum sudut tetap konstan jika tidak ada torsi bersih eksternal yang bekerja pada sistem.</span>
              <span class="ml-auto text-[11px] font-bold text-emerald-600 uppercase tracking-widest bg-emerald-100 px-2.5 py-1 rounded-md">Jawabanmu</span>
            </div>
          </div>
        </div>

        <!-- Wrong Answer Review -->
        <div class="bg-white/80 backdrop-blur-xl rounded-3xl p-8 shadow-[0_10px_40px_rgba(15,23,42,0.06)] border border-rose-100/60 relative overflow-hidden transition-all duration-300 ease-out hover:shadow-xl group/card">
          <div class="absolute top-0 left-0 w-2 h-full bg-rose-400"></div>
          
          <div class="flex items-center justify-between mb-4 pl-4">
            <span class="text-[14px] font-bold text-slate-400">Pertanyaan 4</span>
            <span class="px-3 py-1 bg-rose-50 text-rose-600 text-[11px] font-bold rounded-md uppercase tracking-widest border border-rose-100">Salah</span>
          </div>
          
          <h3 class="text-[17px] font-bold text-slate-900 mb-6 pl-4 leading-relaxed tracking-tight">
            Sebuah silinder pejal bermassa M dan berjari-jari R menggelinding tanpa slip menuruni bidang miring dengan sudut θ. Berapakah percepatan linearnya?
          </h3>

          <div class="pl-4 space-y-3 mb-6">
            <!-- Wrong Selected -->
            <div class="flex items-center gap-4 p-4 rounded-2xl border-2 border-rose-300 bg-rose-50/30 opacity-75">
              <div class="w-6 h-6 rounded-md bg-rose-400 text-white flex items-center justify-center shrink-0">
                <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"><path d="M18 6 6 18"/><path d="m6 6 12 12"/></svg>
              </div>
              <span class="text-[15px] font-bold text-slate-600 line-through decoration-rose-300">(1/2) g sin(θ)</span>
              <span class="ml-auto text-[11px] font-bold text-rose-500 uppercase tracking-widest bg-rose-100 px-2.5 py-1 rounded-md">Jawabanmu</span>
            </div>

            <!-- Correct Option -->
            <div class="flex items-center gap-4 p-4 rounded-2xl border-2 border-emerald-500 bg-emerald-50/30">
              <div class="w-6 h-6 rounded-md bg-emerald-500 text-white flex items-center justify-center shrink-0">
                <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"><path d="M20 6 9 17l-5-5"/></svg>
              </div>
              <span class="text-[15px] font-bold text-slate-900 tracking-tight">(2/3) g sin(θ)</span>
              <span class="ml-auto text-[11px] font-bold text-emerald-600 uppercase tracking-widest bg-emerald-100 px-2.5 py-1 rounded-md">Jawaban Benar</span>
            </div>
          </div>

          <!-- Explanation Box -->
          <div class="ml-4 p-5 bg-[#F7F2EB]/50 rounded-2xl border border-slate-200/60 flex items-start gap-3">
            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="#F59E0B" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" class="shrink-0 mt-0.5"><circle cx="12" cy="12" r="10"/><path d="M12 16v-4"/><path d="M12 8h.01"/></svg>
            <div>
              <p class="text-[13px] font-bold text-slate-900 mb-1 tracking-tight">Penjelasan AI</p>
              <p class="text-[13px] text-slate-600 leading-relaxed font-medium">Untuk silinder pejal, momen inersia <span class="font-mono bg-white px-1 border border-slate-200 rounded text-[#334EAC]">I = (1/2)MR²</span>. Saat menggelinding tanpa slip, <span class="font-mono bg-white px-1 border border-slate-200 rounded text-[#334EAC]">v = ωR</span> dan <span class="font-mono bg-white px-1 border border-slate-200 rounded text-[#334EAC]">a = αR</span>. Menggunakan hukum kedua Newton untuk translasi dan rotasi menghasilkan percepatan <span class="font-mono bg-white px-1 border border-slate-200 rounded text-[#334EAC]">a = (2/3) g sin(θ)</span>.</p>
            </div>
          </div>
        </div>
      </div>

      <!-- Right Panel (AI Recommendations) -->
      <div class="w-full xl:w-[35%] space-y-6">
        <h2 class="text-2xl font-bold text-slate-900 mb-2 tracking-tight">Wawasan AI</h2>
        
        <div class="bg-gradient-to-br from-[#334EAC] to-[#081F5C] rounded-3xl p-8 shadow-[0_10px_40px_rgba(15,23,42,0.15)] relative overflow-hidden transition-all duration-300 ease-out hover:-translate-y-1 hover:shadow-2xl">
          <!-- Abstract Decoration -->
          <div class="absolute top-0 right-0 w-40 h-40 bg-white/10 rounded-full blur-2xl pointer-events-none -translate-y-1/2 translate-x-1/3"></div>

          <div class="w-12 h-12 rounded-xl bg-white/10 flex items-center justify-center text-white mb-6 border border-white/20">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M12 2v4"/><path d="M12 18v4"/><path d="M4.93 4.93l2.83 2.83"/><path d="M16.24 16.24l2.83 2.83"/><path d="M2 12h4"/><path d="M18 12h4"/><path d="M4.93 19.07l2.83-2.83"/><path d="M16.24 7.76l2.83-2.83"/></svg>
          </div>

          <h3 class="text-xl font-bold text-white mb-3 tracking-tight">Rekomendasi FokusIn AI</h3>
          <p class="text-[#BAD6EB] text-[14px] font-medium leading-relaxed mb-8">Berdasarkan performa terakhirmu, <strong>FokusIn AI merekomendasikan kamu mempelajari kembali:</strong></p>

          <h4 class="text-[12px] font-extrabold text-white/70 uppercase tracking-widest mb-4">Topik Kunci</h4>
          
          <div class="space-y-3">
            <RouterLink to="/pelajar/materials/1" class="flex items-center justify-between p-4 bg-white/10 hover:bg-white/20 rounded-xl border border-white/10 transition-colors group">
              <div class="flex items-center gap-4">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" class="text-[#BAD6EB]"><polyline points="20 6 9 17 4 12"/></svg>
                <span class="text-[13px] font-bold text-white">Integral</span>
              </div>
              <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round" class="text-white/50 group-hover:text-white transition-colors"><path d="m9 18 6-6-6-6"/></svg>
            </RouterLink>
            <RouterLink to="/pelajar/materials/2" class="flex items-center justify-between p-4 bg-white/10 hover:bg-white/20 rounded-xl border border-white/10 transition-colors group">
              <div class="flex items-center gap-4">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" class="text-[#BAD6EB]"><polyline points="20 6 9 17 4 12"/></svg>
                <span class="text-[13px] font-bold text-white">Turunan</span>
              </div>
              <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round" class="text-white/50 group-hover:text-white transition-colors"><path d="m9 18 6-6-6-6"/></svg>
            </RouterLink>
            <RouterLink to="/pelajar/materials/3" class="flex items-center justify-between p-4 bg-white/10 hover:bg-white/20 rounded-xl border border-white/10 transition-colors group">
              <div class="flex items-center gap-4">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" class="text-[#BAD6EB]"><polyline points="20 6 9 17 4 12"/></svg>
                <span class="text-[13px] font-bold text-white">Dynamic Programming</span>
              </div>
              <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round" class="text-white/50 group-hover:text-white transition-colors"><path d="m9 18 6-6-6-6"/></svg>
            </RouterLink>
          </div>
        </div>
      </div>

    </div>
  </div>
</template>

<script setup>
import { RouterLink } from 'vue-router'
</script>
