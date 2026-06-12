<template>
  <div class="p-6 md:p-8 xl:p-10 max-w-[1600px] mx-auto animate-in fade-in duration-500">
    <!-- Back Navigation -->
    <div class="mb-6 flex items-center gap-2">
      <RouterLink
        to="/admin/tutors"
        class="text-sm font-bold text-slate-400 hover:text-[#334EAC] transition-colors flex items-center gap-1 w-fit bg-white/50 px-3 py-1.5 rounded-lg border border-slate-200/50"
      >
        ← Kembali ke Tutor
      </RouterLink>
    </div>

    <div class="bg-white/60 backdrop-blur-xl rounded-3xl p-7 md:p-8 shadow-[0_10px_40px_rgba(15,23,42,0.06)] border border-slate-200/60 relative overflow-hidden mb-8">
      <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4 relative z-10">
        <div>
          <h1 class="text-3xl md:text-4xl font-extrabold text-slate-900 tracking-tight leading-tight">Analitik Tutor</h1>
          <p class="text-[15px] text-slate-600 font-medium mt-2 max-w-xl leading-relaxed">Statistik performa, waktu mengajar, dan tingkat kepuasan.</p>
        </div>
      </div>
    </div>
    
    <!-- Loading State -->
    <div v-if="loading" class="admin-card p-8 text-center min-h-[300px] flex items-center justify-center">
      <p class="text-sm font-semibold text-slate-500 animate-pulse">Memuat analitik tutor...</p>
    </div>

    <!-- Error State -->
    <div v-else-if="error" class="admin-card p-8 text-center min-h-[300px] flex flex-col items-center justify-center gap-4">
      <p class="text-sm font-semibold text-rose-500">{{ error }}</p>
      <button @click="fetchTutorAnalytics" class="px-4 py-2 bg-[#334EAC] text-white text-xs font-bold rounded-lg hover:bg-[#081F5C] transition-colors">Coba Lagi</button>
    </div>

    <div v-else class="admin-card p-6 md:p-8">
      <div class="analytics-stats-grid">
        <div class="p-4 bg-slate-50 border border-slate-200 rounded-xl">
          <p class="text-xs font-bold text-slate-500 uppercase tracking-wider mb-1">Total Sesi</p>
          <p class="text-2xl font-bold text-slate-900">{{ tutor?.total_sessions || 0 }}</p>
        </div>
        <div class="p-4 bg-slate-50 border border-slate-200 rounded-xl">
          <p class="text-xs font-bold text-slate-500 uppercase tracking-wider mb-1">Siswa</p>
          <p class="text-2xl font-bold text-slate-900">{{ uniqueStudentsCount }}</p>
        </div>
        <div class="p-4 bg-slate-50 border border-slate-200 rounded-xl">
          <p class="text-xs font-bold text-slate-500 uppercase tracking-wider mb-1">Rating</p>
          <p class="text-2xl font-bold text-amber-500">{{ avgRating ? Number(avgRating).toFixed(1) : '0.0' }}</p>
        </div>
        <div class="p-4 bg-slate-50 border border-slate-200 rounded-xl">
          <p class="text-xs font-bold text-slate-500 uppercase tracking-wider mb-1">Jam Ajar</p>
          <p class="text-2xl font-bold text-slate-900">{{ (tutor?.completed_sessions || 0) * 1 }}h</p>
        </div>
      </div>
      
      <!-- Interactive line chart mockup using dynamic values -->
      <div class="mt-8 border border-slate-200 rounded-xl p-6 flex flex-col items-center justify-center min-h-[300px] bg-slate-50/50 relative overflow-hidden">
        <!-- Background decorative wave representing real sessions -->
        <svg class="absolute inset-x-0 bottom-0 w-full h-32 text-[#334EAC]/10" viewBox="0 0 100 100" preserveAspectRatio="none">
          <path d="M0 80 C 30 50, 70 20, 100 50 L 100 100 L 0 100 Z" fill="currentColor"></path>
        </svg>
        <svg xmlns="http://www.w3.org/2000/svg" width="48" height="48" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="text-[#334EAC] mb-4 relative z-10"><path d="M3 3v18h18"/><path d="m19 9-5 5-4-4-3 3"/></svg>
        <h3 class="text-lg font-bold text-slate-700 relative z-10">Grafik Kinerja Sesi Mentoring</h3>
        <p class="text-xs text-slate-500 mt-1 text-center max-w-sm relative z-10">Menampilkan tren penyelesaian mentoring untuk tutor: <strong>{{ tutor?.name || 'Tutor' }}</strong>.</p>
      </div>
    </div>
  </div>
</template>

<script setup>
import { ref, onMounted } from 'vue'
import { RouterLink, useRoute } from 'vue-router'
import { adminService } from '@/services/admin.service'

const route = useRoute()
const tutorId = route.params.id

const tutor = ref(null)
const avgRating = ref(0)
const uniqueStudentsCount = ref(0)
const loading = ref(true)
const error = ref(null)

const fetchTutorAnalytics = async () => {
  loading.value = true
  error.value = null
  try {
    const res = await adminService.getTutorDetail(tutorId)
    tutor.value = res.tutor || res
    avgRating.value = res.average_rating || 0
    
    // Calculate unique student count
    const sessions = tutor.value?.sessions_as_tutor || tutor.value?.sessions || []
    const studentIds = sessions.map(s => s.student_id)
    uniqueStudentsCount.value = new Set(studentIds).size
  } catch (err) {
    console.error(err)
    error.value = err || 'Gagal memuat analitik tutor.'
  } finally {
    loading.value = false
  }
}

onMounted(() => {
  fetchTutorAnalytics()
})
</script>
