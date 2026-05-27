<template>
  <div class="p-6 md:p-8 xl:p-10 max-w-[1600px] mx-auto animate-in fade-in duration-500">
    
    <!-- Header -->
    <div class="bg-white/60 backdrop-blur-xl rounded-3xl p-7 md:p-8 shadow-[0_10px_40px_rgba(15,23,42,0.06)] border border-slate-200/60 relative overflow-hidden mb-8">
      <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4 relative z-10">
        <div>
          <div class="flex items-center gap-2 mb-2">
            <RouterLink to="/admin/mentoring" class="inline-flex items-center gap-2 px-4 py-2 bg-white text-slate-700 text-sm font-bold rounded-xl border border-slate-200 shadow-sm hover:bg-slate-50 transition-colors">
              <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="m15 18-6-6 6-6"/></svg>
              Back to Mentoring
            </RouterLink>
          </div>
          <h1 class="text-3xl md:text-4xl font-extrabold text-slate-900 tracking-tight leading-tight">Session Monitor #{{ id }}</h1>
          <p class="text-[15px] text-slate-600 font-medium mt-2 max-w-xl leading-relaxed">Tinjauan sesi mentoring aktif dan log aktivitas.</p>
        </div>
      </div>
    </div>

    <div class="bg-white rounded-2xl border border-slate-200 shadow-sm p-8 max-w-4xl">
      <div class="grid grid-cols-2 gap-6 mb-8">
        <div>
          <p class="text-sm font-bold text-slate-500 uppercase tracking-widest mb-1">Topik</p>
          <p class="text-lg font-bold text-slate-900">Review Aljabar Linear</p>
        </div>
        <div>
          <p class="text-sm font-bold text-slate-500 uppercase tracking-widest mb-1">Status</p>
          <p class="text-lg font-bold text-emerald-600">In Progress</p>
        </div>
        <div>
          <p class="text-sm font-bold text-slate-500 uppercase tracking-widest mb-1">Tutor</p>
          <p class="text-lg font-bold text-slate-900">Dr. Sarah R.</p>
        </div>
        <div>
          <p class="text-sm font-bold text-slate-500 uppercase tracking-widest mb-1">Student</p>
          <p class="text-lg font-bold text-slate-900">Andi P.</p>
        </div>
      </div>
      
      <div class="bg-slate-50 p-6 rounded-xl border border-slate-200">
        <h3 class="text-base font-bold text-slate-900 mb-4">Live Activity Log</h3>
        <ul class="space-y-4">
          <li class="flex gap-4 text-sm font-medium">
            <span class="text-slate-400">10:05</span>
            <span class="text-slate-700">Student joined the session.</span>
          </li>
          <li class="flex gap-4 text-sm font-medium">
            <span class="text-slate-400">10:07</span>
            <span class="text-slate-700">Tutor shared screen.</span>
          </li>
          <li class="flex gap-4 text-sm font-medium">
            <span class="text-slate-400">10:15</span>
            <span class="text-slate-700">Whiteboard interaction started.</span>
          </li>
        </ul>
      </div>

      <div class="flex gap-4 border-t border-slate-100 pt-6 mt-8">
        <button class="px-6 py-3 bg-rose-50 text-rose-700 border border-rose-200 font-bold text-sm rounded-xl hover:bg-rose-100 transition-colors">
          Force Terminate Session
        </button>
      </div>
    </div>
  </div>
</template>

<script setup>
import { useRoute, RouterLink } from 'vue-router'

const route = useRoute()
const id = route.params.id
</script>
