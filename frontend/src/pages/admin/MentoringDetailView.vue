<template>
  <div class="relative min-h-screen pb-12 bg-[#F7F2EB]">
    <div class="max-w-[1450px] mx-auto px-4 sm:px-6 xl:px-8 py-6 space-y-5 animate-in fade-in duration-500">
      
      <!-- Compact Editorial Header -->
      <div class="bg-white/60 backdrop-blur-xl rounded-3xl p-7 md:p-8 shadow-[0_10px_40px_rgba(15,23,42,0.06)] border border-slate-200/60 relative overflow-hidden flex flex-col sm:flex-row sm:items-center justify-between gap-5 mb-6">
        <div class="flex items-center gap-4">
          <span class="w-12 h-12 rounded-xl bg-[#334EAC]/10 text-[#334EAC] flex items-center justify-center shrink-0">
            <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><rect width="18" height="18" x="3" y="4" rx="2" ry="2"/><line x1="16" x2="16" y1="2" y2="6"/><line x1="8" x2="8" y1="2" y2="6"/><line x1="3" x2="21" y1="10" y2="10"/></svg>
          </span>
          <div>
            <h1 class="text-3xl md:text-4xl font-extrabold text-slate-900 tracking-tight leading-tight">Detail Sesi Mentoring</h1>
            <p class="text-[15px] text-slate-600 font-medium mt-2 max-w-xl leading-relaxed">Informasi alokasi kelas, koneksi audio-video, serta rangkuman ulasan sesi.</p>
          </div>
        </div>
        <div class="flex shrink-0 gap-2">
          <div class="mb-6 flex items-center gap-2">
  <RouterLink
    to="/admin/mentoring"
    class="text-sm font-bold text-slate-400 hover:text-[#334EAC] transition-colors flex items-center gap-1 w-fit bg-white/50 px-3 py-1.5 rounded-lg border border-slate-200/50"
  >
    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="m15 18-6-6 6-6"></path></svg>
    Kembali ke Mentoring
  </RouterLink>
</div>
        </div>
      </div>

      <!-- Detail Info -->
      <div class="grid grid-cols-1 lg:grid-cols-3 gap-5">
        
        <!-- Left Side: Session Log -->
        <div class="lg:col-span-2 bg-white rounded-xl border border-slate-200 p-5 shadow-sm space-y-4">
          <div class="flex items-center justify-between border-b border-slate-100 pb-2">
            <h3 class="text-base font-semibold text-slate-900">Log Aktivitas Sesi</h3>
            <span class="px-2.5 py-0.5 bg-[#F7F2EB] text-[#081F5C] text-xs font-semibold rounded-md border border-[#D0E3FF] uppercase tracking-widest">Scheduled</span>
          </div>
          <div class="space-y-4 text-sm text-slate-600">
            <div>
              <p class="text-[10px] font-bold text-slate-400 uppercase tracking-widest">Topik Utama Bimbingan</p>
              <p class="text-sm font-bold text-[#081F5C]">Review Komparasi Limit dan Integral Lipat Dua</p>
            </div>
            <div>
              <p class="text-[10px] font-bold text-slate-400 uppercase tracking-widest">Agenda Sesi</p>
              <p class="leading-relaxed">Membahas 5 soal latihan ujian akhir semester kalkulus multivariat. Diskusi mengenai penerapan koordinat polar pada integral lipat dua.</p>
            </div>
          </div>
        </div>

        <!-- Right Side: Session Metadata -->
        <div class="bg-white rounded-xl border border-slate-200 p-5 shadow-sm space-y-4 flex flex-col justify-between">
          <div class="space-y-4">
            <h3 class="text-base font-semibold text-slate-900 border-b border-slate-100 pb-2">Peserta & Waktu</h3>
            <div class="text-sm text-slate-600 space-y-2">
              <p>Tutor: <strong>Dr. Sarah Smith</strong></p>
              <p>Pelajar: <strong>Andi Pratama</strong></p>
              <p>Tanggal: <strong>26 Mei 2026</strong></p>
              <p>Waktu: <strong>19:00 WIB</strong></p>
            </div>
          </div>
          <div class="pt-4 border-t border-slate-100">
            <button class="w-full h-10 px-5 rounded-xl bg-[#334EAC] text-white hover:bg-[#081F5C] text-sm font-medium transition-all shadow-sm">
              Pantau Jalur WebRTC
            </button>
          </div>
        </div>

      </div>

    </div>
  </div>
</template>

<script setup>
</script>
