<template>
  <div class="min-h-screen bg-[#F7F2EB] font-sans selection:bg-[#7096D1] selection:text-white relative overflow-hidden flex flex-col">
    <!-- Navbar -->
    <nav class="fixed top-0 inset-x-0 z-50 bg-[#F7F2EB]/80 backdrop-blur-md border-b border-[#081F5C]/5">
      <div class="max-w-7xl mx-auto px-6 h-20 flex items-center justify-between">
        <RouterLink to="/" class="flex items-center gap-2 group">
          <div class="w-8 h-8 rounded-lg bg-gradient-to-br from-[#081F5C] to-[#334EAC] flex items-center justify-center shadow-md">
            <span class="text-white font-black text-lg leading-none">F</span>
          </div>
          <span class="text-xl font-extrabold tracking-tight text-[#081F5C]">FokusIn</span>
        </RouterLink>
        <RouterLink to="/" class="px-5 py-2 text-[#081F5C] font-bold text-sm hover:bg-[#081F5C]/5 rounded-xl transition-colors">
          Kembali ke Beranda
        </RouterLink>
      </div>
    </nav>

    <main class="flex-1 relative z-10 pt-32 pb-24 max-w-4xl mx-auto px-6 w-full">
      <div class="text-center mb-16">
        <h1 class="text-4xl md:text-5xl font-extrabold text-[#081F5C] mb-6 tracking-tight">FAQ</h1>
        <p class="text-lg text-slate-600 leading-relaxed font-medium">
          Pertanyaan yang sering diajukan mengenai layanan FokusIn.
        </p>
      </div>

      <div class="space-y-4">
        <!-- FAQ Item 1 -->
        <div class="bg-white rounded-2xl p-6 shadow-sm border border-slate-100">
          <h3 class="text-[16px] font-extrabold text-[#081F5C] mb-2">Apakah FokusIn gratis untuk digunakan?</h3>
          <p class="text-[14px] text-slate-600 font-medium leading-relaxed">
            Ya, fitur dasar FokusIn seperti forum diskusi dan akses materi dapat digunakan secara gratis. Tersedia opsi berlangganan untuk akses AI tak terbatas.
          </p>
        </div>
        <!-- FAQ Item 2 -->
        <div class="bg-white rounded-2xl p-6 shadow-sm border border-slate-100">
          <h3 class="text-[16px] font-extrabold text-[#081F5C] mb-2">Siapa saja yang bisa menjadi Mentor?</h3>
          <p class="text-[14px] text-slate-600 font-medium leading-relaxed">
            Mahasiswa tingkat akhir atau alumni yang telah diverifikasi oleh tim administrasi FokusIn berkesempatan untuk menjadi tutor/mentor di platform kami.
          </p>
        </div>
        <!-- FAQ Item 3 -->
        <div class="bg-white rounded-2xl p-6 shadow-sm border border-slate-100">
          <h3 class="text-[16px] font-extrabold text-[#081F5C] mb-2">Bagaimana sistem AI Analyzer bekerja?</h3>
          <p class="text-[14px] text-slate-600 font-medium leading-relaxed">
            Sistem AI kami memproses materi PDF atau teks yang Anda unggah, kemudian mengekstrak poin-poin utama dan menyajikannya dalam format ringkasan yang mudah dibaca.
          </p>
        </div>
      </div>
    </main>
  </div>
</template>

<script setup>
import { RouterLink } from 'vue-router'
</script>
