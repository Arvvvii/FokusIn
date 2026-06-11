<template>
  <div class="p-6 md:p-8 xl:p-10 max-w-4xl mx-auto animate-in fade-in duration-500">
    
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
    <div class="admin-dashboard-hero mb-8">
      <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4 relative z-10">
        <div class="flex items-center gap-4">
          <div>
            <h1 class="text-3xl md:text-4xl font-extrabold text-slate-900 tracking-tight leading-tight">Tambah Quiz Dataset</h1>
            <p class="text-[15px] text-slate-600 font-medium mt-2 max-w-xl leading-relaxed">Impor atau buat set pertanyaan baru untuk sistem kuis.</p>
          </div>
        </div>
      </div>
    </div>

    <!-- Form Section -->
    <div class="admin-card p-6 md:p-8">
      <h3 class="settings-form-title border-b border-slate-100 pb-4">Detail Dataset</h3>
      <form @submit.prevent="submitForm" class="space-y-6">
        
        <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
          <div class="space-y-2">
            <label class="admin-label">Judul Kuis</label>
            <input 
              v-model="form.title"
              type="text" 
              required
              class="admin-input"
              placeholder="Contoh: Kuis Biologi Seluler"
            >
          </div>
          <div class="space-y-2">
            <label class="admin-label">Mata Pelajaran</label>
            <select 
              v-model="form.subject"
              required
              class="admin-input appearance-none cursor-pointer"
            >
              <option value="biologi">Biologi</option>
              <option value="matematika">Matematika</option>
              <option value="fisika">Fisika</option>
              <option value="kimia">Kimia</option>
            </select>
          </div>
        </div>

        <div class="space-y-2">
          <label class="admin-label">Deskripsi Singkat</label>
          <textarea 
            v-model="form.description"
            class="admin-input resize-none"
            rows="3"
            placeholder="Masukkan keterangan kuis..."
          ></textarea>
        </div>

        <!-- Actions -->
        <div class="pt-6 border-t border-slate-100 flex items-center justify-end gap-3">
          <button 
            type="button"
            @click="$router.push({ name: 'admin-quiz-monitoring' })"
            class="text-sm font-medium h-10 px-5 rounded-xl bg-white border border-slate-200 text-slate-600 hover:bg-slate-50 transition-colors shadow-sm"
          >
            Batal
          </button>
          <button 
            type="submit"
            :disabled="isSaving"
            class="text-sm font-medium h-10 px-5 rounded-xl bg-[#081F5C] text-white shadow-sm hover:bg-[#081F5C] transition-colors flex items-center gap-2"
          >
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round" class="animate-spin" v-if="isSaving"><circle cx="12" cy="12" r="10"/><path d="M21 12a9 9 0 1 1-6.219-8.56"/></svg>
            {{ isSaving ? 'Menyimpan...' : 'Impor & Simpan' }}
          </button>
        </div>
        
      </form>
    </div>
  </div>
</template>

<script setup>
import { reactive, ref } from 'vue'
import { useRouter, RouterLink } from 'vue-router'
import { quizService } from '@/services/quiz.service'
import { useToastStore } from '@/stores/toast'

const router = useRouter()
const toastStore = useToastStore()
const isSaving = ref(false)

const form = reactive({
  title: '',
  description: 'Ujian Kuis Akademik Baru',
  subject: 'biologi',
  questions: [
    { text: 'Apa itu organel sel pembangkit energi?', type: 'multiple', options: ['Mitokondria', 'Kloroplas', 'Ribosom', 'Nukleus'], answer: 'Mitokondria' }
  ]
})

const submitForm = async () => {
  try {
    isSaving.value = true
    await quizService.createQuiz({
      title: form.title,
      description: form.description,
      category_id: 1, // Force category_id: 1 for production seeds compatibility
      questions: form.questions.map(q => ({
        question_text: q.text,
        options: q.options,
        correct_answer: q.answer
      }))
    })
    toastStore.success('Kuis berhasil dibuat.')
    router.push({ name: 'admin-quiz-monitoring' })
  } catch (err) {
    console.error('Failed to create quiz:', err)
    toastStore.error('Gagal membuat kuis.')
  } finally {
    isSaving.value = false
  }
}
</script>
