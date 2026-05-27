<template>
  <header class="sticky top-0 z-30 h-[72px] bg-white/80 backdrop-blur-xl border-b border-slate-200/60 flex items-center justify-between px-5 lg:px-8 shrink-0 transition-all">
    
    <!-- Left Section: Search & Breadcrumb -->
    <div class="flex items-center gap-4 flex-1">
      
      <!-- Mobile Search Icon (Instead of Hamburger, since Sidebar has FAB) -->
      <button class="md:hidden p-2 -ml-2 text-slate-400 hover:text-[#081F5C] hover:bg-slate-100 rounded-lg transition-colors focus:outline-none">
        <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><circle cx="11" cy="11" r="8"/><path d="m21 21-4.3-4.3"/></svg>
      </button>

      <!-- Search Bar (Desktop) -->
      <div class="hidden md:flex relative w-full max-w-md group">
        <div class="absolute inset-y-0 left-0 pl-3.5 flex items-center pointer-events-none text-slate-400 group-focus-within:text-[#334EAC] transition-colors">
          <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><circle cx="11" cy="11" r="8"/><path d="m21 21-4.3-4.3"/></svg>
        </div>
        <input 
          type="text" 
          class="w-full pl-10 pr-16 py-2.5 bg-[#EDF1F6] border border-transparent rounded-xl text-[14px] text-slate-800 placeholder-slate-400 focus:outline-none focus:bg-white focus:border-[#7096D1]/30 focus:ring-4 focus:ring-[#7096D1]/10 transition-all shadow-[inset_0_1px_2px_rgba(0,0,0,0.02)]" 
          placeholder="Search forums, materials, or tutors..."
        >
        <div class="absolute inset-y-0 right-0 pr-3 flex items-center pointer-events-none">
          <span class="text-[10px] font-bold text-slate-400 border border-slate-200/80 rounded-[4px] px-1.5 py-0.5 bg-white shadow-sm tracking-widest leading-none">⌘K</span>
        </div>
      </div>
    </div>

    <!-- Right Section: Actions & Profile -->
    <div class="flex items-center gap-3 sm:gap-4 ml-4">
      
      <!-- AI Assistant Button -->
      <button class="hidden sm:flex items-center gap-2 px-3.5 py-2 bg-[#334EAC]/5 hover:bg-[#334EAC]/10 text-[#334EAC] rounded-xl font-bold text-sm transition-all border border-[#334EAC]/10 active:scale-95 shadow-sm">
        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="m12 3-1.912 5.813a2 2 0 0 1-1.275 1.275L3 12l5.813 1.912a2 2 0 0 1 1.275 1.275L12 21l1.912-5.813a2 2 0 0 1 1.275-1.275L21 12l-5.813-1.912a2 2 0 0 1-1.275-1.275L12 3Z"/><path d="M5 3v4"/><path d="M19 17v4"/><path d="M3 5h4"/><path d="M17 19h4"/></svg>
        Ask AI
      </button>

      <!-- Notification -->
      <button class="relative p-2.5 text-slate-400 hover:text-[#081F5C] hover:bg-[#EDF1F6] rounded-xl transition-colors focus:outline-none">
        <span class="absolute top-[9px] right-[10px] w-2 h-2 bg-rose-500 rounded-full ring-2 ring-white z-10"></span>
        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M6 8a6 6 0 0 1 12 0c0 7 3 9 3 9H3s3-2 3-9"/><path d="M10.3 21a1.94 1.94 0 0 0 3.4 0"/></svg>
      </button>
      
      <!-- Divider -->
      <div class="h-6 w-px bg-slate-200 hidden sm:block"></div>

      <!-- User Profile Dropdown Toggle -->
      <button class="flex items-center gap-3 p-1 pr-2 hover:bg-[#EDF1F6] rounded-xl transition-colors focus:outline-none border border-transparent hover:border-slate-200/50">
        <div class="w-9 h-9 rounded-full bg-[#EDF1F6] border-2 border-white shadow-sm shrink-0 flex items-center justify-center overflow-hidden">
          <img :src="avatarUrl" alt="Avatar" class="w-full h-full object-cover" />
        </div>
        <div class="hidden lg:flex items-center gap-2">
          <span class="text-sm font-bold text-slate-700">{{ userName }}</span>
          <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round" class="text-slate-400"><path d="m6 9 6 6 6-6"/></svg>
        </div>
      </button>
      
    </div>
  </header>
</template>

<script setup>
import { computed } from 'vue'

const user = JSON.parse(localStorage.getItem('user') || '{}')
const userName = user.name || 'User'

const avatarUrl = computed(() => {
  return `https://ui-avatars.com/api/?name=${encodeURIComponent(userName)}&background=BAD6EB&color=081F5C&bold=true`
})
</script>
