<template>
  <div class="space-y-6 animate-in fade-in duration-500">
    
    <!-- 1. GLASSMORPHIC HEADER SECTION -->
    <div class="page-header-banner p-6 md:p-8 flex flex-col md:flex-row md:items-center justify-between gap-6 mb-8 relative">
      <div class="absolute right-0 top-0 w-1/3 h-full bg-gradient-to-l from-[#EDF1F6]/80 to-transparent pointer-events-none"></div>
      
      <div class="relative z-10 flex items-center gap-4">
        <span class="page-header-icon w-12 h-12 flex items-center justify-center shrink-0">
          <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"/><polyline points="12 6 12 12 16 14"/></svg>
        </span>
        <div>
          <h1 class="text-2xl md:text-3xl font-extrabold text-[#081F5C] tracking-tight">Ekosistem Kuis AI</h1>
          <p class="text-xs md:text-sm text-[#4A5880]/90 font-medium mt-1.5 max-w-xl leading-relaxed">
            Uji pengetahuanmu dengan kuis yang dihasilkan AI, disesuaikan dengan kelemahanmu dan persyaratan silabus.
          </p>
        </div>
      </div>
      
      <div class="relative z-10 w-full md:w-72 shrink-0">
        <div class="relative">
          <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none text-slate-400">
            <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><circle cx="11" cy="11" r="8"/><path d="m21 21-4.3-4.3"/></svg>
          </div>
          <input type="text" v-model="searchQuery" class="w-full pl-12 pr-4 py-3 bg-white/70 border border-slate-200 hover:border-[#7096D1] rounded-2xl text-[13px] font-bold text-slate-900 placeholder-slate-400 focus:outline-none focus:ring-2 focus:ring-[#7096D1]/20 focus:border-[#7096D1] transition-all shadow-sm" placeholder="Cari kuis...">
        </div>
      </div>
    </div>

    <!-- 2. AI Insights & Performance (Top Banner) -->
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6 mb-12">
      
      <!-- AI Recommendation Widget -->
      <div class="lg:col-span-2 bg-gradient-to-br from-[#334EAC] to-[#081F5C] rounded-3xl p-8 shadow-[0_10px_40px_rgba(15,23,42,0.15)] relative overflow-hidden flex flex-col justify-center transition-all duration-300 ease-out hover:-translate-y-1 hover:shadow-2xl">
        <!-- Abstract Decoration -->
        <div class="absolute top-0 right-0 w-64 h-64 bg-white/5 rounded-full blur-3xl pointer-events-none -translate-y-1/2 translate-x-1/4"></div>
        <div class="absolute bottom-0 left-0 w-40 h-40 bg-[#7096D1]/20 rounded-full blur-2xl pointer-events-none translate-y-1/2 -translate-x-1/4"></div>

        <div class="relative z-10 flex flex-col md:flex-row gap-6 items-center md:items-start justify-between">
          <div>
            <div class="inline-flex items-center gap-2 px-3 py-1 bg-white/10 border border-white/20 rounded-lg text-white text-[11px] font-bold uppercase tracking-widest mb-4">
              <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="m12 3-1.912 5.813a2 2 0 0 1-1.275 1.275L3 12l5.813 1.912a2 2 0 0 1 1.275 1.275L12 21l1.912-5.813a2 2 0 0 1 1.275-1.275L21 12l-5.813-1.912a2 2 0 0 1-1.275-1.275L12 3Z"/></svg>
              Rekomendasi AI
            </div>
            <h2 class="text-2xl font-bold text-white mb-2 tracking-tight">Cek Penguasaan Kinematika</h2>
            <p class="text-[#BAD6EB] text-[14px] font-medium leading-relaxed max-w-md">Berdasarkan analisis ujian terbarumu, kami telah membuat kuis 15 pertanyaan untuk memperkuat pemahamanmu tentang Momentum Sudut.</p>
          </div>
          <RouterLink :to="quizzes.length > 0 ? '/pelajar/quiz/' + quizzes[0].id : '/pelajar/quiz'" class="w-full md:w-auto px-8 py-3.5 bg-white hover:bg-slate-50 text-slate-900 rounded-2xl font-bold text-[14px] transition-all shadow-lg active:scale-95 shrink-0 text-center whitespace-nowrap">
            Mulai Kuis Sekarang
          </RouterLink>
        </div>
      </div>

      <!-- Weekly Performance -->
      <div class="card-panel p-8 flex flex-col justify-center group/card">
        <h3 class="text-[15px] font-bold text-slate-900 mb-6 flex items-center gap-2 tracking-tight">
          Akurasi Mingguan
        </h3>
        <div class="flex items-end gap-3 mb-2">
          <span class="text-4xl font-bold text-[#334EAC] tracking-tight">78%</span>
          <span class="text-[13px] font-bold text-emerald-500 mb-1 flex items-center">
            <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round" class="mr-0.5"><path d="m18 15-6-6-6 6"/></svg>
            +5%
          </span>
        </div>
        <p class="text-[13px] font-bold text-slate-400">vs minggu lalu (73%)</p>
        
        <div class="mt-6 flex gap-1.5 h-12 items-end">
          <div class="w-full bg-[#EDF1F6] rounded-t-sm h-[40%] hover:bg-[#BAD6EB] transition-colors cursor-pointer"></div>
          <div class="w-full bg-[#EDF1F6] rounded-t-sm h-[60%] hover:bg-[#BAD6EB] transition-colors cursor-pointer"></div>
          <div class="w-full bg-[#EDF1F6] rounded-t-sm h-[45%] hover:bg-[#BAD6EB] transition-colors cursor-pointer"></div>
          <div class="w-full bg-[#EDF1F6] rounded-t-sm h-[80%] hover:bg-[#BAD6EB] transition-colors cursor-pointer"></div>
          <div class="w-full bg-[#334EAC] rounded-t-sm h-[78%] cursor-pointer"></div>
        </div>
      </div>
    </div>

    <!-- 3. Category Tabs -->
    <div class="flex items-center gap-3 overflow-x-auto pb-4 mb-8 scrollbar-hide">
      <button 
        v-for="cat in categories" 
        :key="cat"
        @click="activeCategory = cat"
        class="px-5 py-2.5 rounded-2xl font-bold text-[13px] whitespace-nowrap transition-all"
        :class="activeCategory === cat ? 'bg-slate-900 text-white shadow-sm' : 'bg-white border border-slate-200 hover:border-[#7096D1] hover:bg-slate-50 text-slate-600 hover:text-[#334EAC]'"
      >
        {{ cat }}
      </button>
    </div>

    <!-- 4. Quiz Grid -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6">
      
      <!-- Loading State -->
      <template v-if="loading">
        <div v-for="n in 4" :key="n" class="card-base flex flex-col h-full opacity-70 animate-pulse p-6">
          <div class="w-12 h-12 bg-slate-200 rounded-2xl mb-5"></div>
          <div class="h-6 bg-slate-200 rounded w-3/4 mb-4"></div>
          <div class="h-4 bg-slate-200 rounded w-full mb-2"></div>
          <div class="h-4 bg-slate-200 rounded w-2/3 mb-6"></div>
          <div class="flex items-center justify-between pt-5 border-t border-slate-100 mt-auto">
            <div class="h-4 bg-slate-200 rounded w-1/3"></div>
            <div class="w-8 h-8 rounded-full bg-slate-200"></div>
          </div>
        </div>
      </template>

      <!-- Error State -->
      <div v-else-if="error" class="col-span-full py-12 flex flex-col items-center justify-center bg-rose-50/50 border border-rose-100 rounded-3xl p-8">
        <div class="w-16 h-16 rounded-full bg-rose-100 text-rose-600 flex items-center justify-center mb-4">
          <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
            <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" />
          </svg>
        </div>
        <h3 class="text-lg font-bold text-rose-950 mb-2">Gagal Memuat Kuis</h3>
        <p class="text-sm text-rose-800 text-center max-w-md mb-6">{{ error }}</p>
        <button @click="fetchQuizzes" class="px-6 py-2.5 bg-[#334EAC] hover:bg-[#081F5C] text-white rounded-xl font-bold text-xs shadow-sm transition-all active:scale-95">
          Coba Lagi
        </button>
      </div>

      <!-- Empty State -->
      <div v-else-if="filteredQuizzes.length === 0" class="col-span-full">
        <EmptyState
          title="Tidak Ada Kuis"
          description="Tidak ditemukan kuis yang cocok dengan kriteria pencarian Anda."
        >
          <template #icon>
            <svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12 text-[#334EAC]" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
              <circle cx="12" cy="12" r="10"/><path d="M12 16v-4"/><path d="M12 8h.01"/>
            </svg>
          </template>
        </EmptyState>
      </div>

      <!-- Quiz Card -->
      <RouterLink 
        v-else
        v-for="quiz in filteredQuizzes" 
        :key="quiz.id" 
        :to="`/pelajar/quiz/${quiz.id}`" 
        class="card-base quiz-card p-6 group flex flex-col h-full cursor-pointer relative overflow-hidden"
      >
        <div class="absolute top-0 right-0 w-24 h-24 bg-[#7096D1]/10 rounded-bl-full pointer-events-none group-hover:bg-[#7096D1]/20 transition-colors"></div>
        
        <div class="flex items-center justify-between mb-5 relative z-10">
          <div class="w-12 h-12 rounded-2xl bg-[#F7F2EB] flex items-center justify-center text-amber-600 border border-amber-100 group-hover:scale-110 transition-transform">
            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
              <circle cx="12" cy="12" r="10"/>
              <path d="M9.09 9a3 3 0 0 1 5.83 1c0 2-3 3-3 3"/>
              <line x1="12" y1="17" x2="12.01" y2="17"/>
            </svg>
          </div>
          <span class="quiz-difficulty diff-medium px-2.5 py-1 text-[10px] font-extrabold rounded-md uppercase tracking-widest">
            {{ quiz.category?.name || 'Umum' }}
          </span>
        </div>

        <div class="mb-6 flex-1 relative z-10">
          <h3 class="text-[17px] font-bold text-slate-900 mb-2 group-hover:text-[#334EAC] transition-colors leading-snug tracking-tight">
            {{ quiz.title }}
          </h3>
          <p class="text-[13px] font-medium text-slate-500 line-clamp-2">
            Uji pemahamanmu tentang {{ quiz.title }} dengan kuis ini.
          </p>
        </div>

        <div class="flex items-center justify-between pt-5 border-t border-slate-100/80 relative z-10">
          <div class="flex items-center gap-4">
            <div class="stat-badge flex items-center gap-1.5 text-[12px] font-bold text-slate-400">
              <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M2 12h20"/><path d="m15 5 7 7-7 7"/></svg>
              10 Soal
            </div>
            <div class="stat-badge flex items-center gap-1.5 text-[12px] font-bold text-slate-400">
              <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"/><polyline points="12 6 12 12 16 14"/></svg>
              20m
            </div>
          </div>
          <div class="w-8 h-8 rounded-full bg-[#EDF1F6] flex items-center justify-center text-[#334EAC] group-hover:bg-[#334EAC] group-hover:text-white transition-colors">
            <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"><path d="m9 18 6-6-6-6"/></svg>
          </div>
        </div>
      </RouterLink>
    </div>
  </div>
</template>

<script setup>
import { ref, computed, onMounted } from 'vue'
import { RouterLink } from 'vue-router'
import { quizService } from '@/services/quiz.service'
import EmptyState from '@/components/shared/EmptyState.vue'

const searchQuery = ref('')
const activeCategory = ref('Semua Kuis')

const loading = ref(false)
const error = ref(null)
const quizzes = ref([])

const fetchQuizzes = async () => {
  loading.value = true
  error.value = null
  try {
    const res = await quizService.getQuizzes()
    quizzes.value = res.data || []
  } catch (err) {
    error.value = err
  } finally {
    loading.value = false
  }
}

onMounted(() => {
  fetchQuizzes()
})

const categories = computed(() => {
  const list = new Set(quizzes.value.map(q => q.category?.name).filter(Boolean))
  return ['Semua Kuis', ...list]
})

const filteredQuizzes = computed(() => {
  return quizzes.value.filter(quiz => {
    const matchSearch = !searchQuery.value || 
      quiz.title.toLowerCase().includes(searchQuery.value.toLowerCase())
      
    const matchCategory = activeCategory.value === 'Semua Kuis' || 
      quiz.category?.name === activeCategory.value
      
    return matchSearch && matchCategory
  })
})
</script>

<style scoped>
/* Quiz Specific Adjustments */
.quiz-card {
  transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
}
.quiz-card:hover {
  transform: translateY(-4px);
  box-shadow: 0 15px 35px rgba(15, 23, 42, 0.08);
}
.quiz-difficulty {
  border: 1px solid transparent;
}
.diff-hard { background: #FFF1F2; color: #E11D48; border-color: #FFE4E6; }
.diff-medium { background: #F8FAFC; color: #64748B; border-color: #F1F5F9; }
.diff-progress { background: #F0F9FF; color: #0284C7; border-color: #E0F2FE; }
.stat-badge {
  background: rgba(248, 250, 252, 0.8);
  padding: 4px 8px;
  border-radius: 8px;
}
</style>
