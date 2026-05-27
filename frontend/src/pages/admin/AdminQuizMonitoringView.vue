<template>
  <div class="p-6 md:p-8 xl:p-10 max-w-[1600px] mx-auto animate-in fade-in duration-500">
    
    <!-- Header -->
    <div class="bg-white/60 backdrop-blur-xl rounded-3xl p-7 md:p-8 shadow-[0_10px_40px_rgba(15,23,42,0.06)] border border-slate-200/60 relative overflow-hidden mb-8">
      <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4 relative z-10">
        <div>
          <h1 class="text-3xl md:text-4xl font-extrabold text-slate-900 tracking-tight leading-tight">Quiz System Administration</h1>
          <p class="text-[15px] text-slate-600 font-medium mt-2 max-w-xl leading-relaxed">Manajemen dataset kuis, pantau penggunaan, dan kelola kualitas soal.</p>
        </div>
        <div class="flex items-center gap-4">
          <button 
            @click="$router.push({ name: 'admin-quiz-monitoring-create' })"
            class="px-5 py-2.5 bg-indigo-600 text-white rounded-xl font-semibold text-sm shadow-sm hover:bg-indigo-700 transition-all"
          >
            + Tambah Quiz Dataset
          </button>
        </div>
      </div>
    </div>

    <!-- Quiz List -->
    <div class="bg-white rounded-2xl border border-slate-200 shadow-sm overflow-hidden mb-8">
      <div class="p-6 border-b border-slate-100 flex items-center justify-between">
        <h2 class="text-lg font-bold text-slate-900 tracking-tight">Active Quizzes</h2>
      </div>
      
      <div class="overflow-x-auto">
        <table class="w-full text-left border-collapse">
          <thead>
            <tr class="bg-slate-50 border-b border-slate-100">
              <th class="px-6 py-4 text-xs font-bold text-slate-500 uppercase tracking-wider">Quiz ID</th>
              <th class="px-6 py-4 text-xs font-bold text-slate-500 uppercase tracking-wider">Title</th>
              <th class="px-6 py-4 text-xs font-bold text-slate-500 uppercase tracking-wider">Subject</th>
              <th class="px-6 py-4 text-xs font-bold text-slate-500 uppercase tracking-wider">Participants</th>
              <th class="px-6 py-4 text-xs font-bold text-slate-500 uppercase tracking-wider text-right">Action</th>
            </tr>
          </thead>
          <tbody class="divide-y divide-slate-100">
            <tr v-for="quiz in quizzes" :key="quiz.id" class="hover:bg-slate-50/50 transition-colors">
              <td class="px-6 py-4 text-sm font-bold text-slate-900">#{{ quiz.id }}</td>
              <td class="px-6 py-4 text-sm font-semibold text-slate-900">{{ quiz.title }}</td>
              <td class="px-6 py-4 text-sm text-slate-700 font-medium">{{ quiz.subject }}</td>
              <td class="px-6 py-4 text-sm text-slate-700 font-medium">{{ quiz.participants }} users</td>
              <td class="px-6 py-4 text-right">
                <RouterLink :to="`/admin/quiz-monitoring/${quiz.id}`" class="inline-block px-4 py-2 bg-white border border-slate-200 text-slate-700 text-sm font-semibold rounded-lg hover:bg-slate-50 transition-colors">
                  Detail & Report
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

const quizzes = ref([
  { id: 201, title: 'Ujian Tengah Semester - Biologi Dasar', subject: 'Biologi', participants: 450 },
  { id: 202, title: 'Kuis Singkat Kalkulus Integrasi', subject: 'Matematika', participants: 120 },
])
</script>
