<template>
  <div class="p-6 md:p-8 xl:p-10 max-w-[1600px] mx-auto animate-in fade-in duration-500">
    
    <!-- Header -->
    <div class="bg-white/80 backdrop-blur-xl rounded-3xl p-7 md:p-8 shadow-[0_10px_40px_rgba(15,23,42,0.06)] border border-white/40 relative overflow-hidden mb-8">
      <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4 relative z-10">
        <div>
          <h1 class="text-[28px] font-bold text-slate-900 tracking-tight mb-1">Mentoring Administration</h1>
          <p class="text-base text-slate-500 font-medium">Monitor sesi mentoring aktif, tinjau laporan tutor, dan analitik performa mentoring.</p>
        </div>
      </div>
    </div>

    <!-- Active Sessions -->
    <div class="bg-white rounded-2xl border border-slate-200 shadow-sm overflow-hidden mb-8">
      <div class="p-6 border-b border-slate-100 flex items-center justify-between">
        <h2 class="text-lg font-bold text-slate-900 tracking-tight">Active Mentoring Sessions</h2>
      </div>
      
      <div class="overflow-x-auto">
        <table class="w-full text-left border-collapse">
          <thead>
            <tr class="bg-slate-50 border-b border-slate-100">
              <th class="px-6 py-4 text-xs font-bold text-slate-500 uppercase tracking-wider">Session ID</th>
              <th class="px-6 py-4 text-xs font-bold text-slate-500 uppercase tracking-wider">Topic</th>
              <th class="px-6 py-4 text-xs font-bold text-slate-500 uppercase tracking-wider">Tutor</th>
              <th class="px-6 py-4 text-xs font-bold text-slate-500 uppercase tracking-wider">Student</th>
              <th class="px-6 py-4 text-xs font-bold text-slate-500 uppercase tracking-wider">Status</th>
              <th class="px-6 py-4 text-xs font-bold text-slate-500 uppercase tracking-wider text-right">Action</th>
            </tr>
          </thead>
          <tbody class="divide-y divide-slate-100">
            <tr v-for="session in sessions" :key="session.id" class="hover:bg-slate-50/50 transition-colors">
              <td class="px-6 py-4 text-sm font-bold text-slate-900">#{{ session.id }}</td>
              <td class="px-6 py-4 text-sm font-semibold text-slate-900">{{ session.topic }}</td>
              <td class="px-6 py-4 text-sm text-slate-700 font-medium">{{ session.tutor }}</td>
              <td class="px-6 py-4 text-sm text-slate-700 font-medium">{{ session.student }}</td>
              <td class="px-6 py-4">
                <span class="px-2.5 py-1 text-xs font-bold rounded-md bg-emerald-50 text-emerald-700">
                  In Progress
                </span>
              </td>
              <td class="px-6 py-4 text-right">
                <RouterLink :to="`/admin/mentoring/${session.id}`" class="inline-block px-4 py-2 bg-white border border-slate-200 text-slate-700 text-sm font-semibold rounded-lg hover:bg-slate-50 transition-colors">
                  Monitor
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

const sessions = ref([
  { id: 402, topic: 'Review Aljabar Linear', tutor: 'Dr. Sarah R.', student: 'Andi P.' },
  { id: 403, topic: 'Konsultasi Skripsi', tutor: 'Prof. Budi', student: 'Rina S.' },
])
</script>
