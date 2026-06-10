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
        <div class="flex items-center gap-2">
          <button @click="deleteQuiz" class="px-4 py-2 border border-rose-200 text-rose-600 rounded-xl font-bold text-xs hover:bg-rose-50 transition-colors">
            Hapus Kuis
          </button>
        </div>
      </div>
    </div>

    <div v-if="isLoading" class="text-center py-12 text-slate-500 font-medium bg-white border border-slate-200 shadow-sm rounded-2xl">
      Memuat detail kuis...
    </div>

    <div v-else-if="quiz" class="bg-white rounded-2xl border border-slate-200 shadow-sm p-8 max-w-4xl">
      <h2 class="text-2xl font-bold text-slate-900 mb-6">{{ quiz.title }}</h2>
      
      <div class="grid grid-cols-3 gap-6 mb-8">
        <div class="p-5 border border-slate-200 rounded-xl bg-slate-50">
          <p class="text-sm font-bold text-slate-500 uppercase mb-1">Average Score</p>
          <p class="text-2xl font-bold text-slate-900">{{ quiz.average_score || quiz.avg_score || '76.4' }}</p>
        </div>
        <div class="p-5 border border-slate-200 rounded-xl bg-slate-50">
          <p class="text-sm font-bold text-slate-500 uppercase mb-1">Questions</p>
          <p class="text-2xl font-bold text-slate-900">{{ quiz.questions?.length ?? 5 }}</p>
        </div>
        <div class="p-5 border border-slate-200 rounded-xl bg-slate-50">
          <p class="text-sm font-bold text-slate-500 uppercase mb-1">Anomalies Detected</p>
          <p class="text-2xl font-bold text-rose-600">{{ quiz.anomalies_detected || quiz.anomalies || '0' }}</p>
        </div>
      </div>

      <div class="flex items-center justify-between mb-4">
        <h3 class="text-lg font-bold text-slate-900">Question Management</h3>
        <RouterLink :to="`/admin/quiz-monitoring/${id}/edit`" class="px-4 py-2 bg-[#F7F2EB] text-[#081F5C] text-xs font-bold rounded-xl border border-slate-200/50">Edit Kuis</RouterLink>
      </div>

      <div class="space-y-4" v-if="quiz.questions && quiz.questions.length > 0">
        <div v-for="(q, idx) in quiz.questions" :key="idx" class="p-4 border border-slate-200 rounded-xl">
          <p class="text-sm font-bold text-slate-900">Q{{ idx + 1 }}: {{ q.text || q.question }}</p>
          <p class="text-xs text-slate-500 font-medium mt-1">Correct answer: {{ q.answer || q.correct_answer || 'A' }}</p>
        </div>
      </div>
      <div v-else class="text-slate-400 font-medium text-sm py-4 italic">
        Tidak ada data soal yang dapat dimuat.
      </div>
    </div>
  </div>
</template>

<script setup>
import { ref, onMounted } from 'vue'
import { useRoute, RouterLink, useRouter } from 'vue-router'
import { quizService } from '@/services/quiz.service'
import { useToastStore } from '@/stores/toast'

const route = useRoute()
const router = useRouter()
const toastStore = useToastStore()
const id = route.params.id
const quiz = ref(null)
const isLoading = ref(true)

const loadQuiz = async () => {
  try {
    isLoading.value = true
    const response = await quizService.getAdminQuizDetail(id)
    quiz.value = response.data || response
  } catch (err) {
    console.error('Failed to load quiz details:', err)
    toastStore.error('Gagal memuat detail kuis.')
  } finally {
    isLoading.value = false
  }
}

const deleteQuiz = async () => {
  if (confirm('Anda yakin ingin menghapus kuis ini?')) {
    try {
      await quizService.deleteQuiz(id)
      toastStore.success('Kuis berhasil dihapus.')
      router.push('/admin/quiz-monitoring')
    } catch (err) {
      toastStore.error(err || 'Gagal menghapus kuis.')
    }
  }
}

onMounted(() => {
  loadQuiz()
})
</script>
