<template>
  <div class="space-y-6 animate-in fade-in duration-500 pb-12">
    
    <!-- 1. GLASSMORPHIC HEADER SECTION -->
    <div class="bg-white/60 backdrop-blur-xl rounded-3xl p-7 md:p-8 shadow-[0_10px_40px_rgba(15,23,42,0.06)] border border-slate-200/60 relative overflow-hidden">
      <!-- Decorative background elements -->
      <div class="absolute top-0 right-0 -mr-20 -mt-20 w-64 h-64 rounded-full bg-gradient-to-br from-[#EEF3FF] to-[#E2EAF8] opacity-70 blur-3xl mix-blend-multiply"></div>
      
      <div class="relative z-10 flex flex-col md:flex-row gap-6 justify-between items-start md:items-center">
        <div>
          <div class="inline-flex items-center gap-2 px-3 py-1.5 rounded-full bg-slate-100/80 border border-slate-200/60 mb-4 backdrop-blur-sm">
            <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" class="text-blue-600"><circle cx="12" cy="12" r="10"/><path d="M9.09 9a3 3 0 0 1 5.83 1c0 2-3 3-3 3"/><path d="M12 17h.01"/></svg>
            <span class="text-xs font-bold tracking-wide text-slate-600 uppercase">Pusat Bantuan</span>
          </div>
          <h1 class="text-3xl md:text-4xl font-extrabold text-slate-900 tracking-tight leading-tight">
            Bantuan & Dukungan
          </h1>
          <p class="text-[15px] text-slate-600 font-medium mt-2 max-w-xl leading-relaxed">
            Temukan jawaban atas pertanyaanmu atau hubungi tim dukungan kami untuk mendapatkan bantuan lebih lanjut.
          </p>
        </div>
      </div>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
      <!-- Left Column: FAQ -->
      <div class="lg:col-span-2 space-y-6">
        <div class="bg-white rounded-3xl p-6 md:p-8 shadow-[0_10px_40px_rgba(15,23,42,0.04)] border border-slate-100">
          <h2 class="text-xl font-bold text-slate-900 mb-6">Pertanyaan yang Sering Diajukan</h2>
          
          <div class="space-y-4">
            <!-- FAQ Item 1 -->
            <div class="border border-slate-100 rounded-2xl p-5 hover:border-slate-200 transition-colors">
              <h3 class="text-[15px] font-bold text-slate-800 mb-2">Bagaimana cara menjadwalkan sesi mentoring?</h3>
              <p class="text-[14px] text-slate-500 font-medium leading-relaxed">
                Pilih menu Mentoring, cari mentor yang sesuai dengan mata pelajaran yang Anda inginkan, klik "Lihat Profil" lalu "Jadwalkan Mentoring". Pilih waktu yang tersedia dan konfirmasi sesi Anda.
              </p>
            </div>
            
            <!-- FAQ Item 2 -->
            <div class="border border-slate-100 rounded-2xl p-5 hover:border-slate-200 transition-colors">
              <h3 class="text-[15px] font-bold text-slate-800 mb-2">Apakah saya bisa bertanya langsung ke AI?</h3>
              <p class="text-[14px] text-slate-500 font-medium leading-relaxed">
                Tentu saja! Fitur Analisis AI tersedia di dashboard Anda. Anda dapat mengunggah soal atau dokumen, dan AI kami akan memberikan analisis komprehensif serta penjelasan langkah demi langkah.
              </p>
            </div>

            <!-- FAQ Item 3 -->
            <div class="border border-slate-100 rounded-2xl p-5 hover:border-slate-200 transition-colors">
              <h3 class="text-[15px] font-bold text-slate-800 mb-2">Bagaimana cara berdiskusi di Forum?</h3>
              <p class="text-[14px] text-slate-500 font-medium leading-relaxed">
                Buka menu Forum, Anda bisa melihat topik diskusi yang sedang tren atau membuat postingan baru dengan mengklik tombol "Buat Postingan Baru" di pojok kanan atas.
              </p>
            </div>
          </div>
        </div>
      </div>
      
      <!-- Right Column: Contact Support -->
      <div class="space-y-6">
        <div class="bg-white rounded-3xl p-6 shadow-[0_10px_40px_rgba(15,23,42,0.04)] border border-slate-100 relative overflow-hidden">
          <div class="absolute top-0 right-0 p-4 opacity-5">
            <svg xmlns="http://www.w3.org/2000/svg" width="80" height="80" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"/></svg>
          </div>
          <div class="relative z-10">
            <div class="w-12 h-12 rounded-xl bg-[#EEF3FF] text-[#334EAC] flex items-center justify-center mb-4">
              <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><rect width="20" height="16" x="2" y="4" rx="2"/><path d="m22 7-8.97 5.7a1.94 1.94 0 0 1-2.06 0L2 7"/></svg>
            </div>
            <h3 class="text-[16px] font-bold text-slate-900 mb-2">Butuh Bantuan Lebih Lanjut?</h3>
            <p class="text-[13px] text-slate-500 font-medium mb-6 leading-relaxed">Tim dukungan kami siap membantu menyelesaikan masalah Anda. Silakan hubungi kami via tiket bantuan atau email.</p>
            
            <button class="w-full py-3.5 bg-[#334EAC] hover:bg-[#081F5C] text-white text-[13px] font-bold rounded-xl transition-all shadow-[0_4px_15px_rgba(51,78,172,0.15)] active:scale-95 flex items-center justify-center gap-2">
              <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><line x1="22" x2="11" y1="2" y2="13"/><polygon points="22 2 15 22 11 13 2 9 22 2"/></svg>
              Kirim Tiket Bantuan
            </button>
            
            <div class="mt-4 pt-4 border-t border-slate-100 flex items-center justify-between">
              <span class="text-xs font-semibold text-slate-400">Atau email kami:</span>
              <a href="mailto:support@fokusin.com" class="text-xs font-bold text-[#334EAC] hover:underline">support@fokusin.com</a>
            </div>
          </div>
        </div>
      </div>
      
    </div>
  </div>
</template>

<script setup>
</script>
