<template>
  <div class="min-h-screen bg-[#F7F2EB] font-sans selection:bg-[#7096D1] selection:text-white relative overflow-hidden flex flex-col">
    <!-- Navbar placeholder (use a simple version or reuse components) -->
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
        <h1 class="text-4xl md:text-5xl font-extrabold text-[#081F5C] mb-6 tracking-tight">Tentang FokusIn</h1>
        <p class="text-lg text-slate-600 leading-relaxed font-medium">
          Membangun masa depan pendidikan melalui kolaborasi dan kecerdasan buatan.
        </p>
      </div>

      <div class="bg-white/80 backdrop-blur-xl rounded-3xl p-8 md:p-12 shadow-[0_10px_40px_rgba(15,23,42,0.06)] border border-slate-100 transition-all duration-300 ease-out hover:shadow-xl">
        <div class="prose prose-slate max-w-none text-[15px] font-medium text-slate-600 leading-relaxed">
          <p class="mb-6">
            FokusIn hadir untuk memberikan solusi atas tantangan yang dihadapi mahasiswa dalam mengatur jadwal belajar, memahami materi kuliah yang kompleks, dan terhubung dengan sesama mahasiswa secara efektif.
          </p>
          <h2 class="text-2xl font-extrabold text-[#081F5C] mt-10 mb-4">Misi Kami</h2>
          <p class="mb-6">
            Kami percaya bahwa setiap mahasiswa berhak mendapatkan akses ke pendidikan yang personal dan suportif. Melalui perpaduan antara <strong>Kecerdasan Buatan (AI)</strong> dan ekosistem pembelajaran kolaboratif, FokusIn memberdayakan pelajar untuk mencapai potensi terbaik mereka.
          </p>
          <h2 class="text-2xl font-extrabold text-[#081F5C] mt-10 mb-4">Nilai Inti Kami</h2>
          <ul class="space-y-3 mb-6">
            <li class="flex items-start gap-3">
              <span class="text-[#334EAC] mt-1"><svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"><polyline points="20 6 9 17 4 12"/></svg></span>
              <span><strong>Kolaborasi:</strong> Belajar bersama menciptakan pemahaman yang lebih kuat.</span>
            </li>
            <li class="flex items-start gap-3">
              <span class="text-[#334EAC] mt-1"><svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"><polyline points="20 6 9 17 4 12"/></svg></span>
              <span><strong>Inovasi:</strong> Menggunakan teknologi AI untuk mempermudah proses belajar.</span>
            </li>
            <li class="flex items-start gap-3">
              <span class="text-[#334EAC] mt-1"><svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"><polyline points="20 6 9 17 4 12"/></svg></span>
              <span><strong>Aksesibilitas:</strong> Pendidikan berkualitas harus mudah dijangkau oleh semua kalangan.</span>
            </li>
          </ul>
        </div>
      </div>
    </main>
  </div>
</template>

<script setup>
import { RouterLink } from 'vue-router'
</script>
