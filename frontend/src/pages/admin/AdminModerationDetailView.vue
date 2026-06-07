<template>
  <div class="p-6 md:p-8 xl:p-10 max-w-[1600px] mx-auto animate-in fade-in duration-500">
    
    <!-- Back Navigation -->
    <div class="mb-6 flex items-center gap-2">
      <RouterLink
        to="/admin/moderation"
        class="text-sm font-bold text-slate-400 hover:text-[#334EAC] transition-colors flex items-center gap-1 w-fit bg-white/50 px-3 py-1.5 rounded-lg border border-slate-200/50"
      >
        ← Kembali ke Antrean
      </RouterLink>
    </div>

    <!-- Header -->
    <div class="bg-white/60 backdrop-blur-xl rounded-3xl p-7 md:p-8 shadow-[0_10px_40px_rgba(15,23,42,0.06)] border border-slate-200/60 relative overflow-hidden mb-8">
      <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4 relative z-10">
        <div>
          <h1 class="text-3xl md:text-4xl font-extrabold text-slate-900 tracking-tight leading-tight">Moderation Case #{{ id }}</h1>
          <p class="text-[15px] text-slate-600 font-medium mt-2 max-w-xl leading-relaxed">Review and take action on flagged content.</p>
        </div>
      </div>
    </div>

    <div class="bg-white rounded-2xl border border-slate-200 shadow-sm p-8 max-w-4xl">
      <div class="flex items-center gap-3 mb-6">
        <span class="px-3 py-1 bg-rose-50 text-rose-700 text-xs font-bold uppercase tracking-widest rounded-md">High Confidence Spam</span>
      </div>
      <h2 class="text-2xl font-bold text-slate-900 mb-2">Diskon Joki Tugas Murah!</h2>
      <p class="text-sm text-slate-500 mb-6 font-medium">Diposting oleh <span class="font-bold text-slate-700">joki_master99</span> pada 12 Mei 2026</p>
      
      <div class="bg-slate-50 p-6 rounded-xl border border-slate-200 text-base text-slate-700 leading-relaxed mb-8">
        Menerima jasa joki tugas dengan harga sangat murah hubungi WA 08123456789. Dijamin A dan cepat selesai.
      </div>

      <div class="flex gap-4 border-t border-slate-100 pt-6">
        <button class="px-6 py-3 bg-emerald-50 text-emerald-700 border border-emerald-200 font-bold text-sm rounded-xl hover:bg-emerald-100 transition-colors">
          Approve (False Positive)
        </button>
        <button class="px-6 py-3 bg-rose-600 text-white font-bold text-sm rounded-xl hover:bg-rose-700 transition-colors shadow-sm">
          Delete Content & Suspend User
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
