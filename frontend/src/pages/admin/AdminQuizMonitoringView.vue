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
            class="px-5 py-2.5 bg-[#081F5C] text-white rounded-xl font-semibold text-sm shadow-sm hover:bg-[#081F5C] transition-all"
          >
            + Tambah Quiz Dataset
          </button>
        </div>
      </div>
    </div>

    <!-- Quiz List -->
    <!-- Skeleton loader -->
    <div v-if="isLoading" class="space-y-4">
      <div v-for="n in 3" :key="n" class="w-full bg-white border border-slate-200/60 rounded-2xl p-5 animate-pulse flex items-center justify-between">
        <div class="space-y-2 w-1/4">
          <div class="h-4 bg-slate-200 rounded w-1/3"></div>
          <div class="h-3 bg-slate-200 rounded w-2/3"></div>
        </div>
        <div class="h-4 bg-slate-200 rounded w-1/3"></div>
        <div class="h-4 bg-slate-200 rounded w-12"></div>
        <div class="h-8 bg-slate-200 rounded w-24"></div>
      </div>
    </div>

    <!-- Error State with Retry Button -->
    <div v-else-if="errorMsg" class="bg-white border border-slate-200 shadow-sm rounded-2xl p-10 text-center flex flex-col items-center justify-center gap-4">
      <div class="w-12 h-12 rounded-full bg-rose-50 text-rose-500 flex items-center justify-center">
        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="10"/><line x1="12" x2="12" y1="8" y2="12"/><line x1="12" x2="12.01" y1="16" y2="16"/></svg>
      </div>
      <div>
        <h3 class="text-lg font-bold text-slate-900">Gagal memuat daftar kuis.</h3>
        <p class="text-sm text-slate-500 mt-1">{{ errorMsg }}</p>
      </div>
      <button @click="loadQuizzes" class="px-5 py-2 bg-[#081F5C] hover:bg-[#334EAC] text-white text-xs font-bold rounded-xl transition-colors shadow-sm">
        Coba Lagi
      </button>
    </div>

    <!-- Empty State -->
    <div v-else-if="quizzes.length === 0" class="bg-white border border-slate-200 shadow-sm rounded-2xl p-10 text-center flex flex-col items-center justify-center gap-4">
      <div class="w-12 h-12 rounded-full bg-slate-50 text-slate-400 flex items-center justify-center">
        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="10"/><path d="M9.09 9a3 3 0 0 1 5.83 1c0 2-3 3-3 3"/><line x1="12" x2="12.01" y1="17" y2="17"/></svg>
      </div>
      <div>
        <h3 class="text-lg font-bold text-slate-900">Tidak ada kuis aktif.</h3>
        <p class="text-sm text-slate-500 mt-1">Belum ada dataset kuis yang ditambahkan ke sistem.</p>
      </div>
    </div>

    <div v-else class="bg-white rounded-2xl border border-slate-200 shadow-sm overflow-hidden mb-8">
      <div class="p-6 border-b border-slate-100 flex items-center justify-between">
        <h2 class="text-lg font-bold text-slate-900 tracking-tight">Active Quizzes</h2>
      </div>
      
      <div class="overflow-x-auto">
        <table class="w-full text-left border-collapse">
          <thead>
            <tr class="admin-table-header">
              <th class="admin-table-col-label px-6 py-4">Quiz ID</th>
              <th class="admin-table-col-label px-6 py-4">Title</th>
              <th class="admin-table-col-label px-6 py-4">Description</th>
              <th class="admin-table-col-label px-6 py-4">Questions</th>
              <th class="admin-table-col-label px-6 py-4 text-right">Action</th>
            </tr>
          </thead>
          <tbody class="divide-y divide-slate-100">
            <tr v-for="quiz in quizzes" :key="quiz.id" class="admin-table-row">
              <td class="px-6 py-4 text-sm font-bold text-slate-900">#{{ quiz.id }}</td>
              <td class="px-6 py-4 text-sm font-semibold text-slate-900">{{ quiz.title }}</td>
              <td class="px-6 py-4 text-sm text-slate-500 font-medium">{{ quiz.description }}</td>
              <td class="px-6 py-4 text-sm text-slate-700 font-medium">{{ quiz.questions_count ?? quiz.questions?.length ?? 0 }} soal</td>
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
import { ref, onMounted } from 'vue'
import { RouterLink } from 'vue-router'
import { quizService } from '@/services/quiz.service'

const quizzes = ref([])
const isLoading = ref(true)
const errorMsg = ref(null)

const loadQuizzes = async () => {
  try {
    isLoading.value = true
    errorMsg.value = null
    // Frontend will consume the paginated payload and use response.data.data as the primary dataset while preserving future pagination support.
    const data = await quizService.getQuizzes()
    quizzes.value = data || []
  } catch (err) {
    console.error('Failed to load quizzes:', err)
    errorMsg.value = err.message || 'Gagal mengambil daftar kuis.'
  } finally {
    isLoading.value = false
  }
}

onMounted(() => {
  loadQuizzes()
})
</script>
