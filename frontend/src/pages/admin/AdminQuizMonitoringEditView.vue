<template>
  <div class="p-6 md:p-8 xl:p-10 max-w-[1600px] mx-auto animate-in fade-in duration-500">
    <!-- Back Navigation -->
    <div class="mb-6 flex items-center gap-2">
      <RouterLink
        :to="`/admin/quiz-monitoring/${id}`"
        class="text-sm font-bold text-slate-400 hover:text-[#334EAC] transition-colors flex items-center gap-1 w-fit bg-white/50 px-3 py-1.5 rounded-lg border border-slate-200/50"
      >
        ← Kembali ke Laporan Kuis
      </RouterLink>
    </div>

    <div class="admin-dashboard-hero mb-8">
      <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4 relative z-10">
        <div>
          <h1 class="text-3xl md:text-4xl font-extrabold text-slate-900 tracking-tight leading-tight">Edit Kuis</h1>
          <p class="text-[15px] text-slate-600 font-medium mt-2 max-w-xl leading-relaxed">Perbarui judul, keterangan, atau konfigurasi set pertanyaan kuis.</p>
        </div>
      </div>
    </div>

    <div v-if="isLoading" class="text-center py-12 text-slate-500 font-medium bg-white border border-slate-200 shadow-sm rounded-2xl">
      Memuat detail kuis...
    </div>

    <div v-else-if="quiz" class="admin-form-card max-w-3xl">
      <h2 class="form-section-title">Informasi Kuis</h2>
      
      <form @submit.prevent="saveChanges" class="space-y-5">
        <div>
          <label class="admin-label">Judul Kuis</label>
          <input type="text" v-model="quiz.title" class="admin-input" required placeholder="Masukkan judul kuis..." />
        </div>
        
        <div>
          <label class="admin-label">Keterangan / Deskripsi</label>
          <textarea v-model="quiz.description" class="admin-input min-h-[120px]" required placeholder="Keterangan mengenai kuis..."></textarea>
        </div>

        <div class="pt-6 border-t border-slate-100 flex justify-end gap-3 mt-8">
          <button type="button" @click="$router.back()" class="btn-modal-secondary">Batal</button>
          <button type="submit" :disabled="isSaving" class="btn-modal-primary flex items-center gap-2">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round" class="animate-spin" v-if="isSaving"><circle cx="12" cy="12" r="10"/><path d="M21 12a9 9 0 1 1-6.219-8.56"/></svg>
            Simpan Perubahan
          </button>
        </div>
      </form>
    </div>
  </div>
</template>

<script setup>
import { ref, onMounted } from 'vue'
import { useRoute, useRouter, RouterLink } from 'vue-router'
import { quizService } from '@/services/quiz.service'
import { useToastStore } from '@/stores/toast'

const route = useRoute()
const router = useRouter()
const id = route.params.id
const quiz = ref(null)
const isLoading = ref(true)
const isSaving = ref(false)
const toastStore = useToastStore()

const loadQuiz = async () => {
  try {
    isLoading.value = true
    const data = await quizService.getQuizById(id)
    quiz.value = data
  } catch (err) {
    console.error('Failed to load quiz for edit:', err)
  } finally {
    isLoading.value = false
  }
}

const saveChanges = async () => {
  try {
    isSaving.value = true
    await quizService.updateQuiz(id, {
      title: quiz.value.title,
      description: quiz.value.description,
      questions: quiz.value.questions
    })
    toastStore.success('Kuis berhasil diperbarui.')
    router.push(`/admin/quiz-monitoring/${id}`)
  } catch (err) {
    console.error('Error updating quiz:', err)
    toastStore.error(err.message || 'Gagal menyimpan perubahan.')
  } finally {
    isSaving.value = false
  }
}

onMounted(() => {
  loadQuiz()
})
</script>
