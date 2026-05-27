<template>
  <div class="p-6 md:p-8 xl:p-10 max-w-[1600px] mx-auto animate-in fade-in duration-500">
    
    <!-- Header -->
    <div class="bg-white/60 backdrop-blur-xl rounded-3xl p-7 md:p-8 shadow-[0_10px_40px_rgba(15,23,42,0.06)] border border-slate-200/60 relative overflow-hidden mb-8">
      <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4 relative z-10">
        <div>
          <h1 class="text-3xl md:text-4xl font-extrabold text-slate-900 tracking-tight leading-tight">Live Content Moderation</h1>
          <p class="text-[15px] text-slate-600 font-medium mt-2 max-w-xl leading-relaxed">Antrean moderasi forum, pembersihan otomatis AI, dan tinjauan persetujuan konten publik.</p>
        </div>
        <div class="flex items-center gap-4">
          <button class="px-5 py-2.5 bg-[#081F5C] text-white rounded-xl font-semibold text-sm shadow-sm hover:bg-[#081F5C] transition-all flex items-center gap-2">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"/><polyline points="7 10 12 15 17 10"/><line x1="12" x2="12" y1="15" y2="3"/></svg>
            Export Log
          </button>
        </div>
      </div>
    </div>

    <!-- Stats -->
    <div class="grid grid-cols-1 md:grid-cols-4 gap-4 mb-8">
      <div class="bg-white p-5 rounded-2xl border border-slate-200 shadow-sm">
        <p class="text-sm font-semibold text-slate-500 mb-2">Pending Review</p>
        <h3 class="text-[28px] font-bold text-slate-900">42</h3>
      </div>
      <div class="bg-white p-5 rounded-2xl border border-slate-200 shadow-sm">
        <p class="text-sm font-semibold text-slate-500 mb-2">Auto-Rejected (AI)</p>
        <h3 class="text-[28px] font-bold text-slate-900">128</h3>
      </div>
      <div class="bg-white p-5 rounded-2xl border border-slate-200 shadow-sm">
        <p class="text-sm font-semibold text-slate-500 mb-2">Approved Today</p>
        <h3 class="text-[28px] font-bold text-slate-900">3,405</h3>
      </div>
      <div class="bg-white p-5 rounded-2xl border border-slate-200 shadow-sm">
        <p class="text-sm font-semibold text-slate-500 mb-2">Flagged Users</p>
        <h3 class="text-[28px] font-bold text-rose-600">5</h3>
      </div>
    </div>

    <!-- Live Queue -->
    <div class="bg-white rounded-2xl border border-slate-200 shadow-sm overflow-hidden">
      <div class="p-6 border-b border-slate-100 flex items-center justify-between">
        <h2 class="text-lg font-bold text-slate-900 tracking-tight">Live Moderation Queue</h2>
        <div class="flex gap-2">
          <input type="text" placeholder="Search content..." class="px-4 py-2 border border-slate-200 rounded-lg text-sm focus:outline-none focus:border-[#334EAC]" />
        </div>
      </div>
      
      <div class="overflow-x-auto">
        <table class="w-full text-left border-collapse">
          <thead>
            <tr class="bg-slate-50 border-b border-slate-100">
              <th class="px-6 py-4 text-xs font-bold text-slate-500 uppercase tracking-wider">ID</th>
              <th class="px-6 py-4 text-xs font-bold text-slate-500 uppercase tracking-wider">Content Snippet</th>
              <th class="px-6 py-4 text-xs font-bold text-slate-500 uppercase tracking-wider">Author</th>
              <th class="px-6 py-4 text-xs font-bold text-slate-500 uppercase tracking-wider">AI Confidence</th>
              <th class="px-6 py-4 text-xs font-bold text-slate-500 uppercase tracking-wider text-right">Action</th>
            </tr>
          </thead>
          <tbody class="divide-y divide-slate-100">
            <tr v-for="item in queue" :key="item.id" class="hover:bg-slate-50/50 transition-colors">
              <td class="px-6 py-4 text-sm font-bold text-slate-900">#{{ item.id }}</td>
              <td class="px-6 py-4">
                <p class="text-sm font-semibold text-slate-900 mb-1 line-clamp-1">{{ item.title }}</p>
                <p class="text-xs text-slate-500 line-clamp-1">{{ item.snippet }}</p>
              </td>
              <td class="px-6 py-4 text-sm text-slate-700 font-medium">{{ item.author }}</td>
              <td class="px-6 py-4">
                <span class="px-2.5 py-1 text-xs font-bold rounded-md" :class="item.confidence > 80 ? 'bg-rose-50 text-rose-700' : 'bg-amber-50 text-amber-700'">
                  {{ item.confidence }}% Spam
                </span>
              </td>
              <td class="px-6 py-4 text-right">
                <RouterLink :to="`/admin/moderation/${item.id}`" class="inline-block px-4 py-2 bg-white border border-slate-200 text-slate-700 text-sm font-semibold rounded-lg hover:bg-slate-50 transition-colors">
                  Review
                </RouterLink>
              </td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</template>

<script setup>
import { ref } from 'vue'
import { RouterLink } from 'vue-router'

const queue = ref([
  { id: 701, title: 'Diskon Joki Tugas Murah!', snippet: 'Menerima jasa joki tugas dengan harga sangat murah hubungi WA...', author: 'joki_master99', confidence: 98 },
  { id: 702, title: 'Jawaban Ujian Kalkulus B', snippet: 'Ini bocoran soal kalkulus semester 2 yang kemarin dari kelas Pak Budi...', author: 'anonymous_std', confidence: 85 },
  { id: 703, title: 'Pertanyaan tentang turunan ganda', snippet: 'Maaf mau tanya, untuk turunan ganda ini apakah ada yang bisa bantu... (terdeteksi flood)', author: 'student_123', confidence: 60 }
])
</script>
