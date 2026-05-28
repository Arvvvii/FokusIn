<template>
  <div class="relative min-h-screen bg-[#F7F2EB] flex flex-col">
    <!-- Top Header -->
    <div class="bg-white/60 backdrop-blur-xl rounded-3xl p-7 md:p-8 shadow-[0_10px_40px_rgba(15,23,42,0.06)] border border-slate-200/60 relative overflow-hidden flex items-center justify-between">
      <div class="flex items-center gap-4">
        <RouterLink 
          to="/pelajar/mentoring" 
          class="text-sm font-bold text-slate-400 hover:text-[#334EAC] transition-colors flex items-center gap-1 w-fit bg-white/50 px-3 py-1.5 rounded-lg border border-slate-200/50"
        >
          <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="m15 18-6-6 6-6"/></svg>
          Kembali ke Mentoring
        </RouterLink>
        <div>
          <h1 class="text-base font-bold text-[#081F5C] flex items-center gap-2 leading-none">
            Ruang Belajar Virtual: Kalkulus Lanjut
            <span class="w-2 h-2 rounded-full bg-emerald-500 animate-pulse"></span>
          </h1>
          <p class="text-xs text-slate-500 font-medium mt-1">bersama Dr. Sarah Smith • ID Sesi #28372</p>
        </div>
      </div>

      <div class="flex items-center gap-4">
        <span class="text-xs font-bold text-[#334EAC] bg-[#EDF1F6] px-3 py-1.5 rounded-xl border border-[#334EAC]/10 flex items-center gap-1.5">
          <span class="w-1.5 h-1.5 rounded-full bg-[#334EAC]"></span>
          Sesi Aktif
        </span>
      </div>
    </div>

    <!-- Main Workspace Layout Grid -->
    <div class="flex-1 grid grid-cols-1 lg:grid-cols-12 overflow-hidden h-[calc(100vh-140px)]">
      
      <!-- LEFT CONTENT: Whiteboard / Screen Share (col-span-8) -->
      <div class="lg:col-span-8 flex flex-col p-6 space-y-4 overflow-y-auto">
        
        <!-- Whiteboard Canvas Card -->
        <div class="bg-white rounded-xl shadow-sm border border-slate-200 overflow-hidden flex flex-col flex-1 min-h-[400px]">
          <!-- Whiteboard Controls -->
          <div class="bg-slate-50 border-b border-slate-100 px-4 py-3 flex items-center justify-between">
            <span class="text-xs font-bold text-slate-700 flex items-center gap-2">
              <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M12 20h9"/><path d="m16.5 3.5 4 4L7 21H3v-4Z"/></svg>
              Papan Tulis Kolaboratif (Simulasi)
            </span>
            <div class="flex items-center gap-1">
              <button class="w-8 h-8 rounded-lg bg-white border border-slate-200 text-slate-500 hover:text-slate-900 flex items-center justify-center shadow-sm" title="Pensil"><svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M17 3a2.85 2.83 0 1 1 4 4L7.5 20.5 2 22l1.5-5.5Z"/></svg></button>
              <button class="w-8 h-8 rounded-lg bg-white border border-slate-200 text-slate-500 hover:text-slate-900 flex items-center justify-center shadow-sm" title="Teks"><svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M4 7V4h16v3"/><path d="M9 20h6"/><path d="M12 4v16"/></svg></button>
              <button class="w-8 h-8 rounded-lg bg-white border border-slate-200 text-slate-500 hover:text-slate-900 flex items-center justify-center shadow-sm" title="Hapus"><svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="m7 21-4.3-4.3c-1-1-1-2.5 0-3.4l9.6-9.6c1-1 2.5-1 3.4 0l4.3 4.3c1 1 1 2.5 0 3.4l-9.6 9.6c-1 1-2.5 1-3.4 0z"/><path d="M19 21H9"/></svg></button>
            </div>
          </div>

          <!-- Whiteboard Board Workspace -->
          <div class="flex-1 bg-slate-900 relative p-6 flex flex-col justify-center items-center text-center">
            <!-- Simulated mathematical drawing -->
            <div class="space-y-4 max-w-md text-slate-300 font-mono text-xs">
              <p class="text-[#BAD6EB] font-bold text-sm">// Catatan Dr. Sarah Smith</p>
              <div class="p-4 bg-slate-800/80 rounded-xl border border-slate-700/60 shadow-lg text-left leading-relaxed text-[#7096D1]">
                <p class="text-white font-bold">1. Aturan Turunan Rantai:</p>
                <p class="mt-1">dy/dx = (dy/du) * (du/dx)</p>
                <p class="text-white font-bold mt-3">2. Studi Kasus Menggelinding:</p>
                <p class="mt-1">I = (1/2) * M * R² (Momen Inersia Silinder Pejal)</p>
                <p>Στ = I * α  =>  f * R = ((1/2)MR²) * (a/R)</p>
                <p>f = (1/2) * M * a</p>
              </div>
              <p class="text-[10px] text-slate-500">Gunakan perangkat layar sentuh atau mouse untuk menggambar secara langsung saat sesi aktif.</p>
            </div>
          </div>
        </div>

        <!-- Participants cards -->
        <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
          <div class="bg-white rounded-xl p-3 border border-slate-200 shadow-sm flex items-center gap-3">
            <div class="w-10 h-10 rounded-full bg-[#EDF1F6] overflow-hidden border border-slate-200 shrink-0">
              <img src="https://i.pravatar.cc/150?u=a042581f4e29026704d" alt="Dr. Sarah Smith" class="w-full h-full object-cover">
            </div>
            <div class="min-w-0">
              <h4 class="text-xs font-bold text-[#081F5C] truncate">Dr. Sarah</h4>
              <p class="text-[9px] font-semibold text-emerald-600 flex items-center gap-1"><span class="w-1 h-1 bg-emerald-500 rounded-full"></span> Bersuara</p>
            </div>
          </div>

          <div class="bg-white rounded-xl p-3 border border-slate-200 shadow-sm flex items-center gap-3">
            <div class="w-10 h-10 rounded-full bg-[#EDF1F6] flex items-center justify-center font-bold text-[#334EAC] text-sm border border-slate-200 shrink-0">
              JD
            </div>
            <div class="min-w-0">
              <h4 class="text-xs font-bold text-[#081F5C] truncate">John (Anda)</h4>
              <p class="text-[9px] font-semibold text-slate-400 flex items-center gap-1"><span class="w-1 h-1 bg-slate-300 rounded-full"></span> Senyap</p>
            </div>
          </div>
        </div>

      </div>

      <!-- RIGHT SIDEBAR: Live Chat / Questions (col-span-4) -->
      <div class="lg:col-span-4 bg-white border-l border-slate-200 flex flex-col h-full overflow-hidden">
        <div class="p-4 border-b border-slate-100 flex items-center justify-between bg-slate-50 shrink-0">
          <span class="text-xs font-bold text-[#081F5C] uppercase tracking-wider">Obrolan Sesi</span>
          <span class="px-2 py-0.5 rounded bg-[#EDF1F6] text-[#334EAC] text-[9px] font-bold">2 Online</span>
        </div>

        <!-- Chat Feed Area -->
        <div class="flex-1 overflow-y-auto p-4 space-y-4">
          
          <div class="space-y-1">
            <div class="flex items-center gap-1.5">
              <span class="text-[11px] font-bold text-[#334EAC]">Dr. Sarah Smith</span>
              <span class="text-[8px] text-slate-400">15:02</span>
            </div>
            <div class="p-3 bg-slate-100 rounded-2xl rounded-tl-none max-w-[85%] text-xs font-medium text-slate-700 leading-relaxed shadow-sm">
              Halo John! Selamat datang di sesi hari ini. Sudah siap membahas soal Kalkulus Lanjut dan Momen Inersia?
            </div>
          </div>

          <div class="space-y-1">
            <div class="flex items-center justify-between">
              <span class="text-[8px] text-slate-400">15:03</span>
              <span class="text-[11px] font-bold text-slate-600">Anda</span>
            </div>
            <div class="p-3 bg-[#334EAC] text-white rounded-2xl rounded-tr-none max-w-[85%] text-xs font-medium leading-relaxed shadow-sm ml-auto">
              Siap, Dr. Sarah! Saya agak bingung menerapkan aturan rantai pada persoalan silinder menggelinding kemarin.
            </div>
          </div>

          <div class="space-y-1">
            <div class="flex items-center gap-1.5">
              <span class="text-[11px] font-bold text-[#334EAC]">Dr. Sarah Smith</span>
              <span class="text-[8px] text-slate-400">15:04</span>
            </div>
            <div class="p-3 bg-slate-100 rounded-2xl rounded-tl-none max-w-[85%] text-xs font-medium text-slate-700 leading-relaxed shadow-sm">
              Bagus sekali. Mari kita mulai dari konsep gaya gesek statis yang membuat benda menggelinding tanpa slip terlebih dahulu. Silakan lihat catatan di papan tulis ya.
            </div>
          </div>

          <!-- Dynamic Chat Message list from state -->
          <div v-for="msg in chatMessages" :key="msg.id" class="space-y-1">
            <div class="flex items-center justify-between">
              <span class="text-[8px] text-slate-400">{{ msg.time }}</span>
              <span class="text-[11px] font-bold text-slate-600">Anda</span>
            </div>
            <div class="p-3 bg-[#334EAC] text-white rounded-2xl rounded-tr-none max-w-[85%] text-xs font-medium leading-relaxed shadow-sm ml-auto">
              {{ msg.text }}
            </div>
          </div>

        </div>

        <!-- Chat Input Form -->
        <form @submit.prevent="sendChat" class="p-4 border-t border-slate-100 flex items-center gap-2 bg-slate-50 shrink-0">
          <input 
            type="text" 
            v-model="newMsg"
            placeholder="Tulis pesan..." 
            class="flex-1 bg-white border border-slate-200 rounded-xl px-4 py-2 text-xs font-medium text-slate-700 placeholder-slate-400 focus:outline-none focus:border-[#334EAC] transition-all"
          >
          <button type="submit" class="bg-[#334EAC] hover:bg-[#081F5C] text-white p-2 rounded-xl transition-colors shrink-0 shadow-sm flex items-center justify-center">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="m22 2-7 20-4-9-9-4Z"/><path d="M22 2 11 13"/></svg>
          </button>
        </form>
      </div>

    </div>
  </div>
</template>

<script setup>
import { ref } from 'vue'
import { RouterLink } from 'vue-router'

const newMsg = ref('')
const chatMessages = ref([])

const sendChat = () => {
  if (!newMsg.value.trim()) return
  
  const d = new Date()
  const timeStr = `${String(d.getHours()).padStart(2, '0')}:${String(d.getMinutes()).padStart(2, '0')}`

  chatMessages.value.push({
    id: Date.now(),
    time: timeStr,
    text: newMsg.value
  })

  newMsg.value = ''
}
</script>
