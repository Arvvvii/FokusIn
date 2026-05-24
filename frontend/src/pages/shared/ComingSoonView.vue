<template>
  <div class="min-h-screen bg-[#F7F2EB] flex flex-col items-center justify-center p-6 text-center relative overflow-hidden font-sans">
    
    <!-- Ambient Background -->
    <div class="absolute inset-0 z-0 pointer-events-none">
      <div class="absolute top-0 right-0 w-[600px] h-[600px] bg-gradient-to-bl from-[#D0E3FF]/30 to-transparent rounded-full blur-[100px] transform translate-x-1/3 -translate-y-1/3"></div>
      <div class="absolute bottom-0 left-0 w-[500px] h-[500px] bg-gradient-to-tr from-[#7096D1]/20 to-transparent rounded-full blur-[80px] transform -translate-x-1/3 translate-y-1/3"></div>
      <!-- Soft Grid -->
      <div class="absolute inset-0 bg-[url('data:image/svg+xml;base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHdpZHRoPSI0MCIgaGVpZ2h0PSI0MCI+CjxwYXRoIGQ9Ik0wIDBoNDB2NDBIMHoiIGZpbGw9Im5vbmUiLz4KPHBhdGggZD0iTTAgNDBoNDBWMHoiIGZpbGw9Im5vbmUiIHN0cm9rZT0iIzMzNEVBQyIgc3Ryb2tlLW9wYWNpdHk9IjAuMDMiIHN0cm9rZS13aWR0aD0iMSIvPgo8L3N2Zz4=')] opacity-50 mask-image:linear-gradient(to_bottom,white,transparent)"></div>
    </div>

    <div class="relative z-10 max-w-lg w-full bg-white/60 backdrop-blur-xl border border-white/80 rounded-[2.5rem] shadow-[0_24px_60px_rgba(8,31,92,0.05)] p-10 md:p-14">
      
      <!-- Icon -->
      <div class="w-20 h-20 mx-auto rounded-3xl bg-gradient-to-br from-[#081F5C] to-[#334EAC] flex items-center justify-center shadow-lg mb-8 relative">
        <div class="absolute inset-0 bg-white/20 rounded-3xl animate-pulse"></div>
        <svg xmlns="http://www.w3.org/2000/svg" width="36" height="36" viewBox="0 0 24 24" fill="none" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
          <path d="M12 2v20M17 5H9.5a3.5 3.5 0 0 0 0 7h5a3.5 3.5 0 0 1 0 7H6" />
        </svg>
      </div>

      <!-- Content -->
      <h1 class="text-3xl font-extrabold text-[#081F5C] mb-4 tracking-tight">Segera Hadir</h1>
      <p class="text-[15px] font-medium text-slate-500 leading-relaxed mb-10">
        Kami sedang membangun fitur ini untuk memberikan pengalaman yang lebih baik. Silakan kembali lagi nanti!
      </p>

      <!-- Actions -->
      <button @click="goBack" class="w-full sm:w-auto px-8 py-3.5 bg-white border border-[#BAD6EB] hover:border-[#7096D1] text-[#081F5C] rounded-xl font-extrabold text-[14px] transition-all shadow-sm hover:shadow-md hover:bg-slate-50 flex items-center justify-center gap-2 mx-auto">
        <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="m15 18-6-6 6-6"/></svg>
        Kembali ke Halaman Sebelumnya
      </button>

    </div>
    
  </div>
</template>

<script setup>
import { useRouter } from 'vue-router'

const router = useRouter()

const goBack = () => {
  if (window.history.length > 2) {
    router.back()
  } else {
    router.push('/')
  }
}
</script>
