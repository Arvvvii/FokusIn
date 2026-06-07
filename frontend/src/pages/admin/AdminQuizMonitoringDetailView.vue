<template>
  <div class="p-6 md:p-8 xl:p-10 max-w-[1600px] mx-auto animate-in fade-in duration-500">
    
    <!-- Back Navigation -->
    <div class="mb-6 flex items-center gap-2">
      <RouterLink
        to="/admin/quiz-monitoring"
        class="text-sm font-bold text-slate-400 hover:text-[#334EAC] transition-colors flex items-center gap-1 w-fit bg-white/50 px-3 py-1.5 rounded-lg border border-slate-200/50"
      >
        ← Kembali ke Monitoring Kuis
      </RouterLink>
    </div>

    <!-- Header -->
    <div class="bg-white/60 backdrop-blur-xl rounded-3xl p-7 md:p-8 shadow-[0_10px_40px_rgba(15,23,42,0.06)] border border-slate-200/60 relative overflow-hidden mb-8">
      <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4 relative z-10">
        <div>
          <h1 class="text-3xl md:text-4xl font-extrabold text-slate-900 tracking-tight leading-tight">Quiz Report #{{ id }}</h1>
          <p class="text-[15px] text-slate-600 font-medium mt-2 max-w-xl leading-relaxed">Analitik pengerjaan kuis dan manajemen soal.</p>
        </div>
      </div>
    </div>

    <div class="bg-white rounded-2xl border border-slate-200 shadow-sm p-8 max-w-4xl">
      <h2 class="text-2xl font-bold text-slate-900 mb-6">Ujian Tengah Semester - Biologi Dasar</h2>
      
      <div class="grid grid-cols-3 gap-6 mb-8">
        <div class="p-5 border border-slate-200 rounded-xl bg-slate-50">
          <p class="text-sm font-bold text-slate-500 uppercase mb-1">Average Score</p>
          <p class="text-2xl font-bold text-slate-900">76.4</p>
        </div>
        <div class="p-5 border border-slate-200 rounded-xl bg-slate-50">
          <p class="text-sm font-bold text-slate-500 uppercase mb-1">Completion Rate</p>
          <p class="text-2xl font-bold text-slate-900">92%</p>
        </div>
        <div class="p-5 border border-slate-200 rounded-xl bg-slate-50">
          <p class="text-sm font-bold text-slate-500 uppercase mb-1">Anomalies Detected</p>
          <p class="text-2xl font-bold text-rose-600">2</p>
        </div>
      </div>

      <h3 class="text-lg font-bold text-slate-900 mb-4">Question Management</h3>
      <div class="space-y-4">
        <div class="p-4 border border-slate-200 rounded-xl flex items-center justify-between">
          <div>
            <p class="text-sm font-bold text-slate-900">Q1: Apa fungsi mitokondria?</p>
            <p class="text-xs text-slate-500 font-medium">Correct answer: B (Respirasi sel)</p>
          </div>
          <RouterLink :to="`/admin/quiz-monitoring/${id}/edit`" class="px-3 py-1.5 text-xs font-bold text-[#081F5C] bg-[#F7F2EB] rounded-lg">Edit</RouterLink>
        </div>
        <div class="p-4 border border-slate-200 rounded-xl flex items-center justify-between">
          <div>
            <p class="text-sm font-bold text-slate-900">Q2: ...</p>
          </div>
          <RouterLink :to="`/admin/quiz-monitoring/${id}/edit`" class="px-3 py-1.5 text-xs font-bold text-[#081F5C] bg-[#F7F2EB] rounded-lg">Edit</RouterLink>
        </div>
      </div>
    </div>
  </div>
</template>

<script setup>
import { useRoute, RouterLink } from 'vue-router'

const route = useRoute()
const id = route.params.id
</script>
