<template>
  <div class="space-y-8 animate-in fade-in duration-500 min-w-0">
    
    <!-- 1. Analytics Hero -->
    <section class="flex flex-col md:flex-row md:items-end justify-between gap-6 bg-white/80 backdrop-blur-xl rounded-3xl p-8 shadow-[0_10px_40px_rgba(15,23,42,0.06)] border border-slate-100 relative overflow-hidden group">
      <!-- Decorative background -->
      <div class="absolute -right-20 -top-20 w-64 h-64 bg-gradient-to-bl from-[#7096D1]/10 to-transparent blur-3xl pointer-events-none rounded-full"></div>
      
      <div class="relative z-10">
        <div class="flex items-center gap-2 text-[13px] font-bold text-slate-400 mb-3 uppercase tracking-widest">
          <span class="w-2 h-2 rounded-full bg-emerald-500 animate-pulse"></span>
          Live Data
        </div>
        <h1 class="text-3xl md:text-4xl font-bold text-slate-900 tracking-tight mb-2">Platform Analytics</h1>
        <p class="text-slate-500 font-medium text-[15px] max-w-xl leading-relaxed">
          Pusat komando wawasan akademik dan performa ekosistem FokusIn. Lacak metrik kunci dan pertumbuhan pengguna secara real-time.
        </p>
      </div>

      <div class="flex flex-col sm:flex-row gap-3 relative z-10 shrink-0">
        <!-- Date Range Filter -->
        <div class="relative min-w-[200px]">
          <select class="w-full pl-5 pr-10 py-3.5 bg-slate-50 hover:bg-white border border-transparent hover:border-slate-200 rounded-2xl text-[14px] font-bold text-slate-900 appearance-none focus:outline-none focus:ring-4 focus:ring-[#7096D1]/20 transition-all cursor-pointer shadow-sm">
            <option value="7">7 Hari Terakhir</option>
            <option value="30" selected>30 Hari Terakhir</option>
            <option value="90">3 Bulan Terakhir</option>
            <option value="year">Tahun Ini</option>
          </select>
          <div class="absolute inset-y-0 right-0 pr-4 flex items-center pointer-events-none text-slate-400">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"><path d="m6 9 6 6 6-6"/></svg>
          </div>
        </div>
        
        <!-- Export Action -->
        <button class="px-6 py-3.5 bg-[#334EAC] hover:bg-[#081F5C] text-white rounded-2xl font-extrabold text-[14px] transition-all shadow-[0_4px_15px_rgba(51,78,172,0.15)] active:scale-95 flex items-center justify-center gap-2">
          <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"><path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"/><polyline points="7 10 12 15 17 10"/><line x1="12" x2="12" y1="15" y2="3"/></svg>
          Export CSV
        </button>
      </div>
    </section>

    <!-- 2. KPI Grid -->
    <section class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-4 gap-6">
      
      <!-- KPI 1 -->
      <div class="bg-white/80 backdrop-blur-xl rounded-3xl p-6 shadow-[0_10px_40px_rgba(15,23,42,0.06)] border border-slate-100 flex flex-col justify-between hover:border-[#7096D1]/30 transition-all duration-300 ease-out hover:-translate-y-1 hover:shadow-xl group">
        <div class="flex items-center justify-between mb-4">
          <div class="w-10 h-10 rounded-xl bg-[#EDF1F6] flex items-center justify-center text-[#334EAC] group-hover:scale-110 transition-transform">
            <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M16 21v-2a4 4 0 0 0-4-4H6a4 4 0 0 0-4 4v2"/><circle cx="9" cy="7" r="4"/><path d="M22 21v-2a4 4 0 0 0-3-3.87"/><path d="M16 3.13a4 4 0 0 1 0 7.75"/></svg>
          </div>
          <span class="px-2.5 py-1 bg-emerald-50 text-emerald-600 text-[11px] font-extrabold rounded-lg flex items-center gap-1 border border-emerald-100">
            <svg xmlns="http://www.w3.org/2000/svg" width="10" height="10" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"><path d="m18 15-6-6-6 6"/></svg>
            12.5%
          </span>
        </div>
        <div>
          <h4 class="text-[13px] font-extrabold text-slate-400 uppercase tracking-widest mb-1">Total Pengguna</h4>
          <p class="text-3xl font-bold text-slate-900 tracking-tight">14,208</p>
        </div>
      </div>

      <!-- KPI 2 -->
      <div class="bg-white/80 backdrop-blur-xl rounded-3xl p-6 shadow-[0_10px_40px_rgba(15,23,42,0.06)] border border-slate-100 flex flex-col justify-between hover:border-[#7096D1]/30 transition-all duration-300 ease-out hover:-translate-y-1 hover:shadow-xl group">
        <div class="flex items-center justify-between mb-4">
          <div class="w-10 h-10 rounded-xl bg-amber-50 flex items-center justify-center text-amber-500 group-hover:scale-110 transition-transform">
            <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M22 12h-4l-3 9L9 3l-3 9H2"/></svg>
          </div>
          <span class="px-2.5 py-1 bg-emerald-50 text-emerald-600 text-[11px] font-extrabold rounded-lg flex items-center gap-1 border border-emerald-100">
            <svg xmlns="http://www.w3.org/2000/svg" width="10" height="10" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"><path d="m18 15-6-6-6 6"/></svg>
            8.2%
          </span>
        </div>
        <div>
          <h4 class="text-[13px] font-extrabold text-slate-400 uppercase tracking-widest mb-1">Sesi Aktif Harian</h4>
          <p class="text-3xl font-bold text-slate-900 tracking-tight">3,842</p>
        </div>
      </div>

      <!-- KPI 3 -->
      <div class="bg-white/80 backdrop-blur-xl rounded-3xl p-6 shadow-[0_10px_40px_rgba(15,23,42,0.06)] border border-slate-100 flex flex-col justify-between hover:border-[#7096D1]/30 transition-all duration-300 ease-out hover:-translate-y-1 hover:shadow-xl group">
        <div class="flex items-center justify-between mb-4">
          <div class="w-10 h-10 rounded-xl bg-indigo-50 flex items-center justify-center text-indigo-500 group-hover:scale-110 transition-transform">
            <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M12 2v4"/><path d="M12 18v4"/><path d="M4.93 4.93l2.83 2.83"/><path d="M16.24 16.24l2.83 2.83"/><path d="M2 12h4"/><path d="M18 12h4"/><path d="M4.93 19.07l2.83-2.83"/><path d="M16.24 7.76l2.83-2.83"/></svg>
          </div>
          <span class="px-2.5 py-1 bg-emerald-50 text-emerald-600 text-[11px] font-extrabold rounded-lg flex items-center gap-1 border border-emerald-100">
            <svg xmlns="http://www.w3.org/2000/svg" width="10" height="10" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"><path d="m18 15-6-6-6 6"/></svg>
            24.1%
          </span>
        </div>
        <div>
          <h4 class="text-[13px] font-extrabold text-slate-400 uppercase tracking-widest mb-1">Permintaan AI (Tokens)</h4>
          <p class="text-3xl font-bold text-slate-900 tracking-tight">1.2M</p>
        </div>
      </div>

      <!-- KPI 4 -->
      <div class="bg-white/80 backdrop-blur-xl rounded-3xl p-6 shadow-[0_10px_40px_rgba(15,23,42,0.06)] border border-slate-100 flex flex-col justify-between hover:border-[#7096D1]/30 transition-all duration-300 ease-out hover:-translate-y-1 hover:shadow-xl group">
        <div class="flex items-center justify-between mb-4">
          <div class="w-10 h-10 rounded-xl bg-rose-50 flex items-center justify-center text-rose-500 group-hover:scale-110 transition-transform">
            <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M14.5 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V7.5L14.5 2z"/><polyline points="14 2 14 8 20 8"/></svg>
          </div>
          <span class="px-2.5 py-1 bg-rose-50 text-rose-600 text-[11px] font-extrabold rounded-lg flex items-center gap-1 border border-rose-100">
            <svg xmlns="http://www.w3.org/2000/svg" width="10" height="10" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"><path d="m6 9 6 6 6-6"/></svg>
            1.4%
          </span>
        </div>
        <div>
          <h4 class="text-[13px] font-extrabold text-slate-400 uppercase tracking-widest mb-1">Materi Diunduh</h4>
          <p class="text-3xl font-bold text-slate-900 tracking-tight">8,405</p>
        </div>
      </div>

    </section>

    <!-- 3. Charts Section -->
    <section class="grid grid-cols-1 xl:grid-cols-3 gap-6">
      
      <!-- Main Chart (Activity) -->
      <div class="xl:col-span-2 bg-white/80 backdrop-blur-xl rounded-3xl p-8 shadow-[0_10px_40px_rgba(15,23,42,0.06)] border border-slate-100 flex flex-col transition-all duration-300 ease-out hover:shadow-xl group/card">
        <div class="flex items-center justify-between mb-8">
          <div>
            <h3 class="text-xl font-bold text-slate-900 mb-1 tracking-tight">Aktivitas Platform</h3>
            <p class="text-sm font-medium text-slate-500">Total sesi pembelajaran (30 Hari Terakhir)</p>
          </div>
          <div class="flex gap-2 bg-[#EDF1F6] p-1 rounded-xl">
            <button class="px-4 py-1.5 bg-white text-[#081F5C] text-[12px] font-extrabold rounded-lg shadow-sm">Sesi</button>
            <button class="px-4 py-1.5 text-slate-500 hover:text-[#081F5C] text-[12px] font-extrabold rounded-lg transition-colors">Users</button>
          </div>
        </div>

        <!-- Simulated CSS Bar Chart -->
        <div class="flex-1 flex items-end gap-2 sm:gap-4 mt-auto pt-6 min-h-[240px] border-b border-slate-100 relative">
          <!-- Y-Axis Lines (Decorative) -->
          <div class="absolute inset-x-0 top-0 border-t border-slate-100 border-dashed"></div>
          <div class="absolute inset-x-0 top-1/2 -translate-y-1/2 border-t border-slate-100 border-dashed"></div>
          
          <!-- Bars -->
          <div v-for="(bar, i) in 14" :key="i" class="flex-1 flex flex-col justify-end group relative z-10 h-full">
            <div class="w-full bg-[#334EAC]/20 group-hover:bg-[#334EAC] rounded-t-lg transition-colors cursor-pointer relative" :style="`height: ${Math.floor(Math.random() * 60 + 30)}%`">
              <!-- Tooltip -->
              <div class="absolute -top-10 left-1/2 -translate-x-1/2 bg-[#081F5C] text-white text-[11px] font-bold py-1.5 px-3 rounded-lg opacity-0 group-hover:opacity-100 transition-opacity pointer-events-none whitespace-nowrap shadow-lg">
                {{ Math.floor(Math.random() * 500 + 200) }} Sesi
              </div>
            </div>
            <span class="text-center text-[10px] font-bold text-slate-400 mt-3 hidden sm:block">Hari {{ i + 1 }}</span>
          </div>
        </div>
      </div>

      <!-- Secondary Chart (Demographics/Distribution) -->
      <div class="bg-white/80 backdrop-blur-xl rounded-3xl p-8 shadow-[0_10px_40px_rgba(15,23,42,0.06)] border border-slate-100 flex flex-col transition-all duration-300 ease-out hover:shadow-xl group/card">
        <h3 class="text-xl font-bold text-slate-900 mb-1 tracking-tight">Distribusi Pengguna</h3>
        <p class="text-sm font-medium text-slate-500 mb-8">Berdasarkan role di ekosistem</p>

        <!-- Simulated Doughnut / Progress bars -->
        <div class="flex-1 flex flex-col justify-center space-y-6">
          
          <!-- Role: Pelajar -->
          <div>
            <div class="flex justify-between items-center mb-2">
              <span class="text-[14px] font-bold text-slate-900 flex items-center gap-2 tracking-tight">
                <span class="w-3 h-3 rounded bg-[#334EAC]"></span> Pelajar
              </span>
              <span class="text-[14px] font-extrabold text-slate-500">82%</span>
            </div>
            <div class="w-full h-3 bg-[#EDF1F6] rounded-full overflow-hidden">
              <div class="h-full bg-[#334EAC] w-[82%] rounded-full"></div>
            </div>
          </div>

          <!-- Role: Tutor -->
          <div>
            <div class="flex justify-between items-center mb-2">
              <span class="text-[14px] font-bold text-slate-900 flex items-center gap-2 tracking-tight">
                <span class="w-3 h-3 rounded bg-[#7096D1]"></span> Tutor
              </span>
              <span class="text-[14px] font-extrabold text-slate-500">15%</span>
            </div>
            <div class="w-full h-3 bg-[#EDF1F6] rounded-full overflow-hidden">
              <div class="h-full bg-[#7096D1] w-[15%] rounded-full"></div>
            </div>
          </div>

          <!-- Role: Admin -->
          <div>
            <div class="flex justify-between items-center mb-2">
              <span class="text-[14px] font-bold text-slate-900 flex items-center gap-2 tracking-tight">
                <span class="w-3 h-3 rounded bg-amber-400"></span> Admin
              </span>
              <span class="text-[14px] font-extrabold text-slate-500">3%</span>
            </div>
            <div class="w-full h-3 bg-[#EDF1F6] rounded-full overflow-hidden">
              <div class="h-full bg-amber-400 w-[3%] rounded-full"></div>
            </div>
          </div>
          
        </div>
      </div>

    </section>

    <!-- 4. Bottom Insights (AI Powered) -->
    <section class="bg-gradient-to-br from-[#081F5C] via-[#334EAC] to-[#081F5C] rounded-3xl p-8 lg:p-10 shadow-[0_10px_40px_rgba(15,23,42,0.15)] relative overflow-hidden text-white flex flex-col md:flex-row gap-8 items-center group transition-all duration-300 ease-out hover:-translate-y-1 hover:shadow-2xl">
      <!-- Glow abstract -->
      <div class="absolute -left-20 -bottom-20 w-80 h-80 bg-white/10 blur-[80px] rounded-full pointer-events-none"></div>
      
      <div class="w-16 h-16 rounded-[1.25rem] bg-white/10 border border-white/20 backdrop-blur-md flex items-center justify-center shrink-0 shadow-lg relative z-10">
        <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M12 2v4"/><path d="M12 18v4"/><path d="M4.93 4.93l2.83 2.83"/><path d="M16.24 16.24l2.83 2.83"/><path d="M2 12h4"/><path d="M18 12h4"/><path d="M4.93 19.07l2.83-2.83"/><path d="M16.24 7.76l2.83-2.83"/></svg>
      </div>

      <div class="flex-1 relative z-10 text-center md:text-left">
        <h3 class="text-xl md:text-2xl font-extrabold mb-2 tracking-tight">FokusIn AI Insights</h3>
        <p class="text-[15px] font-medium text-[#BAD6EB] leading-relaxed max-w-3xl">
          Sistem analitik AI mendeteksi lonjakan aktivitas pencarian modul <strong class="text-white">"Algoritma Dinamis"</strong> sebesar 45% dalam 3 hari terakhir. Sangat disarankan untuk memberi notifikasi kepada Tutor Ilmu Komputer agar memperbanyak materi atau jadwal mentoring terkait topik tersebut menjelang masa UTS.
        </p>
      </div>

      <div class="shrink-0 relative z-10">
        <button class="px-6 py-3 bg-white text-[#081F5C] hover:bg-[#F7F2EB] rounded-2xl font-extrabold text-[14px] transition-all shadow-lg active:scale-95 flex items-center justify-center gap-2">
          Buat Notifikasi Global
        </button>
      </div>
    </section>

  </div>
</template>

<script setup>
// Admin Analytics View
</script>
