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

    <main class="flex-1 relative z-10 pt-32 pb-24 max-w-3xl mx-auto px-6 w-full">
      <div class="text-center mb-12">
        <h1 class="text-4xl md:text-5xl font-extrabold text-[#081F5C] mb-6 tracking-tight">Hubungi Kami</h1>
        <p class="text-lg text-slate-600 leading-relaxed font-medium">
          Punya pertanyaan atau masukan? Jangan ragu untuk mengirim pesan.
        </p>
      </div>

      <div class="bg-white/80 backdrop-blur-xl rounded-3xl p-8 md:p-10 shadow-[0_10px_40px_rgba(15,23,42,0.06)] border border-slate-100 transition-all duration-300 ease-out hover:shadow-xl">
        <form class="space-y-6" @submit.prevent="submitForm">
          <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div class="space-y-2">
              <label class="text-[13px] font-bold text-slate-600 ml-1">Nama Lengkap</label>
              <input type="text" placeholder="Masukkan nama..." class="w-full px-4 py-3 bg-slate-50 border border-slate-200 rounded-xl text-[14px] font-medium focus:outline-none focus:border-[#334EAC] focus:ring-4 focus:ring-[#334EAC]/10 transition-all">
            </div>
            <div class="space-y-2">
              <label class="text-[13px] font-bold text-slate-600 ml-1">Email</label>
              <input type="email" placeholder="email@contoh.com" class="w-full px-4 py-3 bg-slate-50 border border-slate-200 rounded-xl text-[14px] font-medium focus:outline-none focus:border-[#334EAC] focus:ring-4 focus:ring-[#334EAC]/10 transition-all">
            </div>
          </div>
          
          <div class="space-y-2">
            <label class="text-[13px] font-bold text-slate-600 ml-1">Subjek</label>
            <input type="text" placeholder="Topik pesan..." class="w-full px-4 py-3 bg-slate-50 border border-slate-200 rounded-xl text-[14px] font-medium focus:outline-none focus:border-[#334EAC] focus:ring-4 focus:ring-[#334EAC]/10 transition-all">
          </div>

          <div class="space-y-2">
            <label class="text-[13px] font-bold text-slate-600 ml-1">Pesan</label>
            <textarea rows="5" placeholder="Tuliskan pesanmu di sini..." class="w-full px-4 py-3 bg-slate-50 border border-slate-200 rounded-xl text-[14px] font-medium focus:outline-none focus:border-[#334EAC] focus:ring-4 focus:ring-[#334EAC]/10 transition-all resize-none"></textarea>
          </div>

          <button type="submit" class="w-full py-4 bg-[#334EAC] hover:bg-[#081F5C] text-white rounded-xl font-extrabold text-[15px] transition-all shadow-[0_8px_20px_rgba(51,78,172,0.25)] hover:shadow-[0_12px_25px_rgba(8,31,92,0.3)] hover:-translate-y-0.5">
            Kirim Pesan
          </button>
        </form>
      </div>
    </main>
  </div>
</template>

<script setup>
import { RouterLink, useRouter } from 'vue-router'
const router = useRouter()

const submitForm = () => {
  // Mock form submission
  router.push('/')
}
</script>
