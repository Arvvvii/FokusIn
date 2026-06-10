<template>
  <div class="space-y-8 w-full pb-12">
      <!-- 1. EDITORIAL WORKSPACE HEADER SECTION -->
      <div class="bg-white border border-slate-200 shadow-sm rounded-2xl p-7 md:p-8 flex flex-col md:flex-row md:items-center justify-between gap-6 relative mb-6">
        <div class="absolute right-0 top-0 w-1/3 h-full bg-gradient-to-l from-[#EDF1F6]/50 to-transparent pointer-events-none"></div>
        <div class="relative z-10 flex items-center gap-4">
          <span class="w-12 h-12 rounded-2xl bg-[#334EAC]/10 text-[#334EAC] flex items-center justify-center shrink-0">
            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M12 22c5.523 0 10-4.477 10-10S17.523 2 12 2 2 6.477 2 12s4.477 10 10 10z"/><path d="m9 12 2 2 4-4"/></svg>
          </span>
          <div>
            <h1 class="text-2xl font-extrabold text-[#081F5C] tracking-tight leading-tight">Riwayat Verifikasi Forum</h1>
            <p class="text-[13px] text-slate-500 font-medium mt-2 max-w-xl leading-relaxed">
              Katalog verifikasi jawaban, pemberian feedback kontribusi mahasiswa, serta penganugerahan badge Jawaban Terbaik.
            </p>
          </div>
        </div>
      </div>

      <!-- FILTER TABS -->
      <div class="bg-white rounded-2xl p-2 shadow-sm border border-slate-200/60 flex items-center gap-2">
        <button 
          v-for="filter in ['Semua', 'Terbaik', 'Terverifikasi', 'Ditolak']" 
          :key="filter"
          @click="activeFilter = filter"
          class="px-4 py-2 rounded-xl text-xs font-bold transition-all"
          :class="activeFilter === filter ? 'bg-[#334EAC] text-white shadow-sm' : 'text-slate-500 hover:text-slate-800 hover:bg-slate-50'"
        >
          {{ filter }}
        </button>
      </div>

      <!-- LOADING & EMPTY STATES -->
      <div v-if="isLoading" class="text-center py-12 text-slate-500 font-medium">
        Memuat riwayat verifikasi...
      </div>
      <div v-else-if="filteredHistory.length === 0" class="text-center py-12 text-slate-400 font-semibold border border-dashed border-slate-200 rounded-2xl bg-white">
        Belum ada riwayat verifikasi untuk kategori ini.
      </div>

      <!-- LIST LOGS -->
      <div v-else class="space-y-4">
        <div 
          v-for="item in filteredHistory" 
          :key="item.id" 
          class="bg-white rounded-2xl p-5 shadow-sm border border-slate-200"
        >
          <div class="flex items-start justify-between gap-4 border-b border-slate-100 pb-3 mb-4">
            <div class="flex items-center gap-4">
              <div class="w-9 h-9 rounded-full bg-slate-100 flex items-center justify-center font-bold text-xs text-[#081F5C]">{{ item.initial }}</div>
              <div>
                <h4 class="text-xs font-bold text-slate-800 leading-none mb-1">{{ item.studentName }}</h4>
                <p class="text-[10px] text-slate-400 font-semibold">{{ item.time }}</p>
              </div>
            </div>
            <span 
              class="px-2.5 py-1 rounded-lg text-[9px] font-bold uppercase tracking-widest border"
              :class="{
                'bg-emerald-50 text-emerald-600 border-emerald-100': item.decision === 'Verified',
                'bg-amber-50 text-amber-600 border-amber-100': item.decision === 'Best Answer',
                'bg-rose-50 text-rose-600 border-rose-100': item.decision === 'Rejected'
              }"
            >
              {{ item.decision === 'Best Answer' ? 'Terbaik' : (item.decision === 'Verified' ? 'Terverifikasi' : 'Ditolak') }}
            </span>
          </div>

          <p class="text-xs font-bold text-[#334EAC] mb-2">Topik: {{ item.topic }}</p>
          <p class="text-xs font-medium text-slate-600 bg-slate-50 border border-slate-100 rounded-xl p-3 mb-3">{{ item.answerText }}</p>
          
          <div v-if="item.feedback" class="pt-3 border-t border-slate-100">
            <p class="text-[10px] font-bold text-slate-400 uppercase tracking-widest mb-1">Feedback Anda</p>
            <p class="text-xs text-slate-500 font-medium italic">"{{ item.feedback }}"</p>
          </div>
        </div>
      </div>

  </div>
</template>

<script setup>
import { ref, computed, onMounted } from 'vue'
import { forumService } from '@/services/forum.service'

const activeFilter = ref('Semua')
const history = ref([])
const isLoading = ref(false)

const getAvatarInitials = (name) => {
  if (!name) return '?'
  const parts = name.trim().split(/\s+/)
  if (parts.length >= 2) {
    return (parts[0][0] + parts[1][0]).toUpperCase()
  }
  return parts[0].substring(0, 2).toUpperCase()
}

const formatTime = (dateString) => {
  if (!dateString) return ''
  const date = new Date(dateString)
  const now = new Date()
  const diffMs = now - date
  const diffMins = Math.floor(diffMs / 60000)
  const diffHours = Math.floor(diffMins / 60)
  const diffDays = Math.floor(diffHours / 24)

  if (diffMins < 1) return 'Baru saja'
  if (diffMins < 60) return `${diffMins} menit lalu`
  if (diffHours < 24) return `${diffHours} jam lalu`
  return `${diffDays} hari lalu`
}

const loadHistory = async () => {
  try {
    isLoading.value = true
    const response = await forumService.getPosts()
    const rawList = response.data || []
    
    // We filter for posts that are either verified or set as best answer.
    history.value = rawList
      .filter(post => post.is_verified || post.is_best_answer)
      .map(post => {
        let decision = 'Verified'
        if (post.is_best_answer) decision = 'Best Answer'
        const studentName = post.user ? post.user.name : 'Anonim'
        return {
          id: post.id,
          initial: getAvatarInitials(studentName),
          studentName,
          time: formatTime(post.created_at),
          decision: decision,
          topic: post.title || 'Diskusi Akademik',
          answerText: post.content,
          feedback: post.feedback || 'Telah ditinjau dan divalidasi oleh Tutor.'
        }
      })
  } catch (err) {
    console.error('Error loading verification history:', err)
  } finally {
    isLoading.value = false
  }
}

const filteredHistory = computed(() => {
  if (activeFilter.value === 'Semua') return history.value
  if (activeFilter.value === 'Terbaik') return history.value.filter(h => h.decision === 'Best Answer')
  if (activeFilter.value === 'Terverifikasi') return history.value.filter(h => h.decision === 'Verified')
  if (activeFilter.value === 'Ditolak') return history.value.filter(h => h.decision === 'Rejected')
  return history.value
})

onMounted(() => {
  loadHistory()
})
</script>
