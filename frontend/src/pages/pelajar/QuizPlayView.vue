<template>
  <div class="space-y-6 animate-in fade-in duration-500">
    
    <!-- Loading State -->
    <div v-if="loading" class="card-base p-8 text-center flex flex-col items-center justify-center min-h-[300px]">
      <svg class="animate-spin h-10 w-10 text-[#334EAC] mb-4" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
        <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
        <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
      </svg>
      <span class="text-sm font-bold text-slate-500">Memuat detail kuis...</span>
    </div>

    <!-- Error State -->
    <div v-else-if="error" class="card-base p-8 text-center flex flex-col items-center justify-center min-h-[300px] border-rose-100 bg-rose-50/50">
      <div class="w-16 h-16 rounded-full bg-rose-100 text-rose-600 flex items-center justify-center mb-4">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
          <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" />
        </svg>
      </div>
      <h3 class="text-lg font-bold text-rose-950 mb-2">Gagal Memuat Kuis</h3>
      <p class="text-sm text-rose-800 mb-6">{{ error }}</p>
      <button @click="fetchQuiz" class="px-6 py-2.5 bg-[#334EAC] hover:bg-[#081F5C] text-white rounded-xl font-bold text-xs shadow-sm transition-all active:scale-95">
        Coba Lagi
      </button>
    </div>

    <!-- Empty State -->
    <div v-else-if="!quizData || !questions.length" class="card-base p-8 text-center flex flex-col items-center justify-center min-h-[300px]">
      <p class="text-sm font-bold text-slate-500">Kuis tidak memiliki pertanyaan.</p>
      <button @click="saveAndExit" class="mt-4 px-6 py-2 bg-slate-900 hover:bg-slate-800 text-white rounded-xl font-bold text-xs shadow-sm">
        Kembali ke Daftar Kuis
      </button>
    </div>
    
    <div v-else class="flex flex-col xl:flex-row gap-8 items-start">
      
      <!-- Left Panel: Main Exam Area -->
      <div class="w-full xl:w-[70%] space-y-6">
        
        <!-- Header / Progress Bar -->
        <div class="card-base p-6 flex flex-col md:flex-row md:items-center justify-between gap-4 group/card">
          <div class="flex-1">
            <h2 class="text-[15px] font-bold text-slate-900 mb-2 flex items-center gap-2 tracking-tight">
              <span class="w-2.5 h-2.5 rounded-full bg-[#334EAC]"></span>
              Pertanyaan {{ currentQuestion }} dari {{ totalQuestions }}
            </h2>
            <div class="w-full h-2.5 bg-[#EDF1F6] rounded-full overflow-hidden">
              <div class="h-full bg-[#334EAC] rounded-full transition-all duration-500" :style="{ width: progressPercentage + '%' }"></div>
            </div>
          </div>
          
          <div class="flex items-center gap-3 px-5 py-3 bg-[#F7F2EB] rounded-2xl border border-amber-100 shrink-0">
            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="#F59E0B" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"/><polyline points="12 6 12 12 16 14"/></svg>
            <span class="text-[17px] font-bold text-slate-900 tracking-tight">{{ formattedTime }}</span>
          </div>
        </div>

        <!-- Question Content -->
        <div class="card-base p-7 md:p-8 relative overflow-hidden">
          <div class="flex items-start justify-between gap-4 mb-8">
            <h1 class="text-3xl md:text-4xl font-extrabold text-slate-900 tracking-tight leading-tight" v-if="currentQuestionData">
              {{ currentQuestionData.content }}
            </h1>
            <button @click="toggleFlag" class="w-10 h-10 rounded-xl bg-slate-50 border flex items-center justify-center transition-colors shrink-0" :class="isFlagged ? 'border-rose-200 text-rose-500 bg-rose-50' : 'border-slate-200 text-slate-400 hover:text-rose-500 hover:bg-rose-50 hover:border-rose-200'" title="Tandai untuk ditinjau">
              <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" :class="{ 'fill-rose-500': isFlagged }"><path d="M4 15s1-1 4-1 5 2 8 2 4-1 4-1V3s-1 1-4 1-5-2-8-2-4 1-4 1z"/><line x1="4" x2="4" y1="22" y2="15"/></svg>
            </button>
          </div>

          <!-- Answer Options -->
          <div class="space-y-4 mb-10" v-if="currentQuestionData">
            <label 
              v-for="(optionText, optionKey) in currentQuestionData.options" 
              :key="optionKey"
              class="flex items-center gap-4 p-5 rounded-2xl border-[2px] cursor-pointer transition-all group" 
              :class="selectedAnswer === optionKey ? 'border-[#334EAC] bg-[#EDF1F6] shadow-sm' : 'border-slate-100 bg-white hover:border-[#7096D1] hover:bg-[#F7F2EB]/30'"
            >
              <div class="w-8 h-8 rounded-lg flex items-center justify-center text-[13px] font-bold transition-colors" :class="selectedAnswer === optionKey ? 'bg-[#334EAC] border-[#081F5C] text-white shadow-inner' : 'bg-slate-100 border-slate-200 text-slate-500 group-hover:bg-white group-hover:text-[#334EAC]'">
                {{ optionKey }}
              </div>
              <input type="radio" :name="'answer_' + currentQuestionData.id" :value="optionKey" v-model="selectedAnswer" class="sr-only" @change="markAnswered">
              <span class="text-[16px] font-bold transition-colors" :class="selectedAnswer === optionKey ? 'text-slate-900' : 'text-slate-600 group-hover:text-slate-900'">
                {{ optionText }}
              </span>
            </label>
          </div>

          <!-- Navigation Buttons -->
          <div class="flex items-center justify-between pt-6 border-t border-slate-100">
            <button @click="prevQuestion" :disabled="currentQuestion === 1" class="px-6 py-3.5 border rounded-xl font-bold text-[14px] transition-all flex items-center gap-2" :class="currentQuestion === 1 ? 'bg-slate-50 border-slate-200 text-slate-400 opacity-50 cursor-not-allowed' : 'bg-white border-slate-200 hover:bg-slate-50 text-slate-500'">
              <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"><path d="m15 18-6-6 6-6"/></svg>
              Sebelumnya
            </button>
            <button v-if="currentQuestion < totalQuestions" @click="nextQuestion" class="px-8 py-3.5 bg-[#081F5C] hover:bg-[#334EAC] text-white rounded-xl font-bold text-[14px] transition-all shadow-[0_4px_15px_rgba(8,31,92,0.15)] flex items-center gap-2 active:scale-95">
              Pertanyaan Selanjutnya
              <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"><path d="m9 18 6-6-6-6"/></svg>
            </button>
            <button v-else @click="submitQuiz" :disabled="submitting" class="px-8 py-3.5 bg-emerald-600 hover:bg-emerald-700 text-white rounded-xl font-bold text-[14px] transition-all shadow-[0_4px_15px_rgba(5,150,105,0.15)] flex items-center gap-2 active:scale-95 disabled:opacity-50">
              <span v-if="!submitting">Selesaikan Kuis</span>
              <span v-else>Mengirim...</span>
              <svg v-if="!submitting" xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"><polyline points="20 6 9 17 4 12"/></svg>
            </button>
          </div>
        </div>

      </div>

      <!-- Right Panel: Navigator & Tools -->
      <div class="w-full xl:w-[30%] shrink-0 space-y-6">
        
        <!-- Question Navigator Grid -->
        <div class="card-base p-7 group/card">
          <h3 class="text-[15px] font-bold text-slate-900 mb-5 tracking-tight">Navigasi Pertanyaan</h3>
          
          <div class="grid grid-cols-5 gap-2 mb-8">
            <button v-for="n in totalQuestions" :key="n" @click="goToQuestion(n)" class="w-full aspect-square rounded-xl font-bold text-[14px] flex items-center justify-center transition-colors relative" :class="getGridClass(n)">
              {{ n }}
              <span v-if="currentQuestion === n" class="absolute -top-1 -right-1 w-2.5 h-2.5 bg-rose-500 rounded-full animate-pulse border-2 border-white"></span>
              <span v-if="flaggedQuestions.includes(n) && currentQuestion !== n" class="absolute top-1 right-1">
                <svg xmlns="http://www.w3.org/2000/svg" width="8" height="8" viewBox="0 0 24 24" fill="currentColor" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M4 15s1-1 4-1 5 2 8 2 4-1 4-1V3s-1 1-4 1-5-2-8-2-4 1-4 1z"/><line x1="4" x2="4" y1="22" y2="15"/></svg>
              </span>
            </button>
          </div>

          <div class="flex flex-col gap-2 pt-5 border-t border-slate-100">
            <div class="flex items-center justify-between text-[12px] font-bold">
              <span class="flex items-center gap-2 text-slate-500"><div class="w-3 h-3 rounded-md bg-[#EDF1F6] border border-[#7096D1]"></div> Terjawab</span>
              <span>{{ answeredQuestions.length }}</span>
            </div>
            <div class="flex items-center justify-between text-[12px] font-bold">
              <span class="flex items-center gap-2 text-slate-500"><div class="w-3 h-3 rounded-md bg-white border-2 border-rose-200"></div> Ditandai</span>
              <span>{{ flaggedQuestions.length }}</span>
            </div>
            <div class="flex items-center justify-between text-[12px] font-bold">
              <span class="flex items-center gap-2 text-slate-500"><div class="w-3 h-3 rounded-md bg-slate-50 border border-slate-200"></div> Belum Terjawab</span>
              <span>{{ totalQuestions - answeredQuestions.length }}</span>
            </div>
          </div>
        </div>

        <!-- AI Help Widget -->
        <div class="bg-gradient-to-br from-[#F7F2EB] to-white rounded-3xl p-6 border border-amber-100 shadow-sm relative overflow-hidden transition-all duration-300 ease-out hover:-translate-y-1 hover:shadow-lg">
          <div class="absolute top-0 right-0 w-24 h-24 bg-[#334EAC]/5 rounded-bl-full pointer-events-none"></div>
          <h3 class="text-[14px] font-bold text-slate-900 mb-2 flex items-center gap-2 relative z-10 tracking-tight">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="#F59E0B" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"/><path d="M12 16v-4"/><path d="M12 8h.01"/></svg>
            Petunjuk AI Tersedia
          </h3>
          <p class="text-[12px] font-medium text-slate-500 mb-4 relative z-10 leading-relaxed">Terkendala pada masalah ini? Minta petunjuk struktural tanpa kehilangan poin penuh.</p>
          <button v-if="!showHint" @click="showHint = true" class="w-full py-2.5 bg-white border border-amber-200 hover:border-amber-400 text-amber-600 rounded-xl font-bold text-[12px] transition-colors shadow-sm relative z-10 active:scale-95">
            Tampilkan Petunjuk
          </button>
          <div v-else class="p-3 bg-amber-50 border border-amber-200 text-amber-800 text-[12px] rounded-xl font-medium animate-in slide-in-from-top-2">
            <strong>Petunjuk:</strong> Pikirkan tentang prinsip dasar dari topik ini untuk menemukan jawaban yang paling logis.
          </div>
        </div>

        <!-- Submit CTA -->
        <div class="pt-4 space-y-3">
          <button @click="submitQuiz" :disabled="submitting" class="w-full py-4 bg-[#334EAC] hover:bg-[#081F5C] text-white rounded-2xl font-bold text-[15px] transition-all shadow-[0_4px_15px_rgba(51,78,172,0.15)] active:scale-95 flex items-center justify-center gap-2 disabled:opacity-50">
            <span v-if="!submitting">Kumpulkan Kuis</span>
            <span v-else>Mengirim...</span>
            <svg v-if="!submitting" xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"><path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"/><path d="m9 11 3 3L22 4"/></svg>
          </button>
          <button @click="saveAndExit" class="w-full py-3.5 bg-white border border-slate-200 hover:border-slate-300 hover:text-[#081F5C] text-slate-500 rounded-2xl font-bold text-[13px] transition-all shadow-sm active:scale-95">
            Simpan & Keluar
          </button>
        </div>

      </div>

    </div>
  </div>
</template>

<script setup>
import { ref, computed, onMounted, onUnmounted } from 'vue'
import { useRouter, useRoute } from 'vue-router'
import { quizService } from '@/services/quiz.service'

const router = useRouter()
const route = useRoute()

const loading = ref(false)
const error = ref(null)
const quizData = ref(null)
const questions = ref([])
const userAnswers = ref({})

const totalQuestions = computed(() => questions.value.length)
const currentQuestion = ref(1)
const showHint = ref(false)
const flaggedQuestions = ref([])
const answeredQuestions = ref([])

const currentQuestionData = computed(() => {
  return questions.value[currentQuestion.value - 1] || null
})

const progressPercentage = computed(() => {
  if (totalQuestions.value === 0) return 0
  return Math.round((currentQuestion.value / totalQuestions.value) * 100)
})

const isFlagged = computed(() => {
  return flaggedQuestions.value.includes(currentQuestion.value)
})

const selectedAnswer = computed({
  get() {
    return currentQuestionData.value ? (userAnswers.value[currentQuestionData.value.id] || '') : ''
  },
  set(val) {
    if (currentQuestionData.value) {
      userAnswers.value[currentQuestionData.value.id] = val
    }
  }
})

// Timer state (30 minutes default)
const timeLeft = ref(1800)
const formattedTime = computed(() => {
  const minutes = Math.floor(timeLeft.value / 60)
  const seconds = timeLeft.value % 60
  return `${String(minutes).padStart(2, '0')}:${String(seconds).padStart(2, '0')}`
})

let timerInterval = null

const startTimer = () => {
  timerInterval = setInterval(() => {
    if (timeLeft.value > 0) {
      timeLeft.value--
    } else {
      clearInterval(timerInterval)
      submitQuiz()
    }
  }, 1000)
}

const fetchQuiz = async () => {
  loading.value = true
  error.value = null
  try {
    const res = await quizService.getQuizById(route.params.id)
    quizData.value = res
    questions.value = res.questions || []
    
    // Automatically set timer: 2 minutes per question
    timeLeft.value = (res.questions?.length || 10) * 120
    startTimer()
  } catch (err) {
    error.value = err
  } finally {
    loading.value = false
  }
}

onMounted(() => {
  fetchQuiz()
})

onUnmounted(() => {
  if (timerInterval) {
    clearInterval(timerInterval)
  }
})

const getGridClass = (n) => {
  if (currentQuestion.value === n) {
    return 'bg-[#334EAC] border-[#081F5C] text-white shadow-inner'
  }
  if (flaggedQuestions.value.includes(n)) {
    return 'bg-white border-2 border-rose-200 text-rose-500 hover:bg-rose-50'
  }
  if (answeredQuestions.value.includes(n)) {
    return 'bg-[#EDF1F6] border border-[#7096D1] text-[#334EAC] hover:bg-[#BAD6EB]'
  }
  return 'bg-slate-50 border border-slate-200 text-slate-400 hover:bg-slate-100 hover:text-slate-600'
}

const markAnswered = () => {
  if (currentQuestionData.value && !answeredQuestions.value.includes(currentQuestion.value)) {
    answeredQuestions.value.push(currentQuestion.value)
  }
}

const toggleFlag = () => {
  const index = flaggedQuestions.value.indexOf(currentQuestion.value)
  if (index > -1) {
    flaggedQuestions.value.splice(index, 1)
  } else {
    flaggedQuestions.value.push(currentQuestion.value)
  }
}

const nextQuestion = () => {
  if (currentQuestion.value < totalQuestions.value) {
    currentQuestion.value++
    showHint.value = false
  }
}

const prevQuestion = () => {
  if (currentQuestion.value > 1) {
    currentQuestion.value--
    showHint.value = false
  }
}

const goToQuestion = (n) => {
  currentQuestion.value = n
  showHint.value = false
}

const submitting = ref(false)
const submitQuiz = async () => {
  if (submitting.value) return
  
  // Optional confirmation dialog if time remains
  if (timeLeft.value > 0) {
    const confirmSubmit = confirm('Apakah Anda yakin ingin menyelesaikan kuis?')
    if (!confirmSubmit) return
  }

  submitting.value = true
  try {
    const response = await quizService.submitAttempt(route.params.id, userAnswers.value)
    sessionStorage.setItem(`quiz_attempt_${route.params.id}`, JSON.stringify(response))
    router.push(`/pelajar/quiz/${route.params.id}/result`)
  } catch (err) {
    alert(err || 'Gagal mengirim jawaban kuis.')
  } finally {
    submitting.value = false
  }
}

const saveAndExit = () => {
  if (confirm('Keluar dari kuis? Progress jawaban saat ini tidak akan disimpan di server.')) {
    router.push('/pelajar/quiz')
  }
}
</script>
