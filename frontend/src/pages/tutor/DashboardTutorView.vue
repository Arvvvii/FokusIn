<template>
  <div class="space-y-8 w-full">
    
    <!-- LOADING STATE -->
    <div v-if="isLoading" class="space-y-8 w-full animate-pulse">
      <!-- Greeting Hero Skeleton -->
      <div class="bg-slate-200/60 rounded-3xl h-[160px] w-full"></div>
      
      <!-- Asymmetric Grid Skeleton -->
      <div class="grid grid-cols-1 lg:grid-cols-[minmax(0,1fr)_360px] gap-8 w-full">
        <!-- Left content skeleton -->
        <div class="space-y-8 flex-1">
          <!-- Stats Grid -->
          <div class="grid grid-cols-2 md:grid-cols-3 gap-4">
            <div v-for="i in 6" :key="i" class="bg-slate-200/60 h-28 rounded-2xl"></div>
          </div>
          <!-- Operasional cards -->
          <div class="bg-slate-200/60 h-36 rounded-2xl"></div>
          <!-- Activities timeline -->
          <div class="bg-slate-200/60 h-52 rounded-2xl"></div>
        </div>
        <!-- Right sidebar skeleton -->
        <div class="space-y-6 w-full lg:w-[360px]">
          <div class="bg-slate-200/60 h-[240px] rounded-3xl"></div>
          <div class="bg-slate-200/60 h-[180px] rounded-3xl"></div>
        </div>
      </div>
    </div>

    <!-- ERROR STATE -->
    <div v-else-if="errorMsg" class="card-base p-8 text-center max-w-md mx-auto space-y-4 my-12">
      <div class="w-16 h-16 bg-red-50 text-red-500 rounded-full flex items-center justify-center mx-auto">
        <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"/><line x1="12" y1="8" x2="12" y2="12"/><line x1="12" y1="16" x2="12.01" y2="16"/></svg>
      </div>
      <h3 class="text-lg font-bold text-slate-900">Gagal memuat dashboard tutor.</h3>
      <p class="text-sm text-slate-500">{{ errorMsg }}</p>
      <button @click="loadTutorDashboard" class="px-6 py-2.5 bg-[#334EAC] text-white rounded-xl font-bold text-xs hover:bg-[#081F5C] transition-all shadow-sm">
        Coba Lagi
      </button>
    </div>

    <!-- MAIN APP CONTENT -->
    <div v-else class="space-y-8 w-full">
      <!-- 1. GLASSMORPHIC GREETING HERO SECTION -->
      <div class="tutor-dashboard-hero relative overflow-hidden flex flex-col md:flex-row md:items-center justify-between gap-6">
        <div class="absolute right-0 top-0 w-1/3 h-full bg-gradient-to-l from-[#EDF1F6]/80 to-transparent pointer-events-none"></div>
        
        <div class="relative z-10">
          <div class="flex flex-wrap items-center gap-2 mb-3">
            <span class="badge-mentor-aktif flex items-center gap-1.5 shadow-sm">
              <span class="w-1.5 h-1.5 rounded-full bg-emerald-500 animate-pulse"></span>
              Mentor Aktif
            </span>
            <span class="badge-level shadow-sm">
              Level 8
            </span>
            <span class="badge-expert flex items-center gap-1 shadow-sm">
              👑 Expert Mentor
            </span>
          </div>
          <h1 class="hero-name">Selamat pagi, {{ authStore.user?.name || 'Tutor' }}</h1>
          <p class="hero-greeting mt-2 max-w-xl">
            Ada <span class="hero-highlight-amber">{{ dashboardData?.pending_requests ?? 0 }} sesi bimbingan pending</span> yang memerlukan tindakan Anda hari ini.
          </p>
        </div>

        <div class="relative z-10 flex shrink-0 gap-3">
           <RouterLink to="/tutor/forum" class="btn-cek-forum shadow-sm active:scale-95 flex items-center gap-2">
              Cek Forum
           </RouterLink>
           <RouterLink to="/tutor/mentoring" class="btn-kelola-jadwal shadow-sm active:scale-95 flex items-center gap-2">
              Kelola Jadwal
           </RouterLink>
        </div>
      </div>

      <!-- 2. STRUCTURAL ASYMMETRIC GRID -->
      <div class="grid grid-cols-1 lg:grid-cols-[minmax(0,1fr)_360px] gap-8 items-start w-full">
        
        <!-- LEFT CONTAINER: METRICS & TIMELINES -->
        <div class="space-y-8 flex-1 self-stretch">
          
          <!-- Stats cards grid (First 3 are live API data, remaining 3 are fallback/static UI) -->
          <div class="grid grid-cols-2 md:grid-cols-3 gap-4">
            
            <!-- Card 1: Pending Requests (Live API) -->
            <RouterLink to="/tutor/mentoring" class="stat-card group active:scale-[0.98]">
              <div class="flex items-center justify-between mb-4">
                <div class="stat-icon-wrapper bg-[#F7F2EB] text-[#334EAC] border-[#D0E3FF] group-hover:scale-105">
                   <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M16 21v-2a4 4 0 0 0-4-4H6a4 4 0 0 0-4 4v2"/><circle cx="9" cy="7" r="4"/></svg>
                </div>
                <span class="text-[11px] font-bold text-amber-500 bg-amber-50 px-2 py-0.5 rounded-lg border border-amber-100">Live</span>
              </div>
              <p class="stat-label mb-1">Permintaan Pending</p>
              <h3 class="stat-value">{{ dashboardData?.pending_requests ?? 0 }}</h3>
            </RouterLink>

            <!-- Card 2: Completed Sessions (Live API) -->
            <RouterLink to="/tutor/mentoring" class="stat-card group active:scale-[0.98]">
              <div class="flex items-center justify-between mb-4">
                <div class="stat-icon-wrapper bg-emerald-50 text-emerald-600 border-emerald-100 group-hover:scale-105">
                   <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"/><polyline points="22 4 12 14.01 9 11.01"/></svg>
                </div>
                <span class="text-[11px] font-bold text-emerald-500 bg-emerald-50 px-2 py-0.5 rounded-lg border border-emerald-100">Live</span>
              </div>
              <p class="stat-label mb-1">Sesi Selesai</p>
              <h3 class="stat-value">{{ dashboardData?.completed_sessions ?? 0 }}</h3>
            </RouterLink>

            <!-- Card 3: Average Rating (Live API) -->
            <RouterLink to="/tutor/profile" class="stat-card group active:scale-[0.98]">
              <div class="flex items-center justify-between mb-4">
                <div class="stat-icon-wrapper bg-amber-50 text-amber-600 border-amber-100 group-hover:scale-105">
                   <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"/></svg>
                </div>
                <span class="text-[11px] font-bold text-[#334EAC] bg-[#EDF1F6] px-2 py-0.5 rounded-lg border border-[#D0E3FF]">Live</span>
              </div>
              <p class="stat-label mb-1">Rating Tutor</p>
              <h3 class="stat-value">
                {{ dashboardData?.average_rating !== undefined ? dashboardData.average_rating.toFixed(1) : '0.0' }}
                <span class="text-xs text-slate-400 font-medium ml-1">/ 5.0</span>
              </h3>
            </RouterLink>

            <!-- Card 4: Students Requests (Live Computed UI) -->
            <RouterLink to="/tutor/student-requests" class="stat-card group active:scale-[0.98]">
              <div class="flex items-center justify-between mb-4">
                <div class="stat-icon-wrapper bg-[#F7F2EB] text-[#334EAC] border-[#D0E3FF] group-hover:scale-105">
                   <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M16 21v-2a4 4 0 0 0-4-4H6a4 4 0 0 0-4 4v2"/><circle cx="9" cy="7" r="4"/><path d="M22 21v-2a4 4 0 0 0-3-3.87"/></svg>
                </div>
                <span class="text-[11px] font-bold text-[#334EAC] bg-[#EDF1F6] px-2 py-0.5 rounded-lg border border-[#D0E3FF]">Sistem</span>
              </div>
              <p class="stat-label mb-1">Mahasiswa Bimbingan</p>
              <h3 class="stat-value">{{ uniqueStudentsCount }}</h3>
            </RouterLink>

            <!-- Card 5: Teaching Hours (Live Computed UI) -->
            <RouterLink to="/tutor/schedule" class="stat-card group active:scale-[0.98]">
              <div class="flex items-center justify-between mb-4">
                <div class="stat-icon-wrapper bg-sky-50 text-sky-600 border-sky-100 group-hover:scale-105">
                   <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"/><polyline points="12 6 12 12 16 14"/></svg>
                </div>
                <span class="text-[11px] font-bold text-[#334EAC] bg-[#EDF1F6] px-2 py-0.5 rounded-lg border border-[#D0E3FF]">Sistem</span>
              </div>
              <p class="stat-label mb-1">Jam Mentoring</p>
              <h3 class="stat-value">{{ totalTeachingHours }}<span class="text-xs text-slate-400 font-medium ml-1">jam</span></h3>
            </RouterLink>

            <!-- Card 6: Satisfaction (Live Computed UI) -->
            <RouterLink to="/tutor/analytics" class="stat-card group active:scale-[0.98]">
              <div class="flex items-center justify-between mb-4">
                <div class="stat-icon-wrapper bg-rose-50 text-rose-600 border-rose-100 group-hover:scale-105">
                   <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M20.84 4.61a5.5 5.5 0 0 0-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 0 0-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 0 0 0-7.78z"/></svg>
                </div>
                <span class="text-[11px] font-bold text-[#334EAC] bg-[#EDF1F6] px-2 py-0.5 rounded-lg border border-[#D0E3FF]">Sistem</span>
              </div>
              <p class="stat-label mb-1">Tingkat Kepuasan</p>
              <h3 class="stat-value">{{ satisfactionRate }}</h3>
            </RouterLink>

          </div>

          <!-- Onboarding Capabilities -->
          <div class="tutor-card">
            <h3 class="text-base font-bold text-slate-900 mb-6 flex items-center gap-3">
               <span class="w-8 h-8 rounded-lg bg-[#F7F2EB] text-[#334EAC] flex items-center justify-center">🎓</span>
               Operasional & Fitur Utama Tutor
            </h3>

            <div class="grid grid-cols-2 sm:grid-cols-4 gap-4">
              <RouterLink to="/tutor/verify-answer" class="flex flex-col p-4 rounded-2xl bg-slate-50 hover:bg-[#EDF1F6] border border-slate-200/50 shadow-sm transition-all group active:scale-[0.98]">
                 <h4 class="text-xs font-bold text-[#081F5C] mb-1">Verifikasi Jawaban</h4>
                 <p class="text-[10px] text-slate-400 font-semibold leading-tight">Review validasi forum.</p>
              </RouterLink>
              <RouterLink to="/tutor/mentoring" class="flex flex-col p-4 rounded-2xl bg-slate-50 hover:bg-[#EDF1F6] border border-slate-200/50 shadow-sm transition-all group active:scale-[0.98]">
                 <h4 class="text-xs font-bold text-[#081F5C] mb-1">Kelola Mentoring</h4>
                 <p class="text-[10px] text-slate-400 font-semibold leading-tight">Konfirmasi jadwal konsultasi.</p>
              </RouterLink>
              <RouterLink to="/tutor/materials" class="flex flex-col p-4 rounded-2xl bg-slate-50 hover:bg-[#EDF1F6] border border-slate-200/50 shadow-sm transition-all group active:scale-[0.98]">
                 <h4 class="text-xs font-bold text-[#081F5C] mb-1">Bagikan Materi</h4>
                 <p class="text-[10px] text-slate-400 font-semibold leading-tight">Menerbitkan arsip/bank soal.</p>
              </RouterLink>
              <RouterLink to="/tutor/ai-validation" class="flex flex-col p-4 rounded-2xl bg-[#334EAC] hover:bg-[#081F5C] text-white border-transparent shadow-sm transition-all group active:scale-[0.98]">
                 <h4 class="text-xs font-bold text-white mb-1">Antrean Validasi AI</h4>
                 <p class="text-[10px] text-[#D0E3FF] font-medium leading-tight">Koreksi hasil ekstraksi OCR.</p>
              </RouterLink>
            </div>
          </div>

          <!-- Recent activities timeline -->
          <div class="tutor-card space-y-6">
            <h2 class="text-base font-bold text-slate-900">Aktivitas Mahasiswa Terakhir</h2>
            <div class="relative pl-6 space-y-6 before:absolute before:inset-y-0 before:left-2.5 before:w-px before:bg-slate-100">
              
              <!-- Empty State -->
              <div v-if="recentActivities.length === 0" class="py-8 text-center text-slate-400 text-sm font-semibold border border-dashed border-slate-200 rounded-2xl">
                Belum ada aktivitas bimbingan mahasiswa terbaru.
              </div>

              <div v-else v-for="act in recentActivities" :key="act.id" class="relative">
                <div class="absolute -left-[28px] w-4.5 h-4.5 rounded-full bg-amber-500 border-4 border-white shadow-sm"></div>
                <div class="flex items-center gap-2 mb-1">
                  <span class="px-2 py-0.5 bg-amber-50 text-amber-600 rounded text-[9px] font-bold uppercase">{{ act.type }}</span>
                  <span class="text-[11px] text-slate-400 font-semibold">{{ act.time }}</span>
                </div>
                <h4 class="text-xs sm:text-sm font-bold text-slate-900">{{ act.title }}</h4>
                <RouterLink :to="act.link" class="mt-2.5 inline-flex items-center gap-1.5 px-3 py-1.5 bg-slate-50 border border-slate-200 rounded-xl text-xs font-bold text-[#334EAC] hover:border-[#7096D1]">
                  Tinjau Permintaan
                </RouterLink>
              </div>

            </div>
          </div>

        </div>

        <!-- RIGHT SIDEBAR: JADWAL & ANNOUNCEMENTS -->
        <div class="space-y-6 w-full shrink-0 lg:w-[360px]">
          <!-- Schedule Today -->
          <div class="bg-white rounded-3xl p-6 border border-slate-200/60 shadow-sm space-y-4">
            <div class="flex items-center justify-between">
              <h3 class="text-xs font-bold text-slate-400 uppercase tracking-widest">Jadwal Hari Ini</h3>
              <RouterLink to="/tutor/mentoring" class="text-[11px] font-bold text-[#334EAC] hover:underline">Lihat Semua</RouterLink>
            </div>

            <div class="space-y-3">
              <!-- Empty State -->
              <div v-if="scheduleToday.length === 0" class="py-6 text-center text-slate-400 text-xs font-semibold border border-dashed border-slate-200 rounded-2xl">
                Tidak ada jadwal bimbingan terkonfirmasi hari ini.
              </div>

              <div v-else v-for="sched in scheduleToday" :key="sched.id" class="p-3.5 bg-emerald-50/20 border border-emerald-100 rounded-2xl flex gap-3">
                <div class="w-1 bg-[#334EAC] rounded-full shrink-0"></div>
                <div>
                  <span class="text-[9px] font-extrabold text-[#334EAC] uppercase tracking-wider block">{{ sched.time }}</span>
                  <h4 class="text-xs font-bold text-slate-900 mt-0.5">{{ sched.title }}</h4>
                </div>
              </div>
            </div>
          </div>

          <!-- AI Insight Card -->
          <div class="tutor-insight-card relative overflow-hidden space-y-4">
            <div class="absolute -right-4 -top-4 w-28 h-28 bg-white/10 blur-2xl rounded-full"></div>
            <h3 class="text-sm font-bold tracking-tight flex items-center gap-2">
              <span>✨</span> AI Insight
            </h3>
            <p class="text-xs text-[#D0E3FF] leading-relaxed">
              Mahasiswa di kelas Anda terdeteksi mengalami kendala pemahaman pada topik <strong>"Pointer C++"</strong>. Sangat disarankan untuk menerbitkan berkas latihan tambahan.
            </p>
            <RouterLink to="/tutor/materials" class="w-full text-center py-2 bg-white hover:bg-slate-50 text-[#081F5C] rounded-xl font-bold text-xs shadow-sm transition-all block">
              Bagikan Materi Latihan
            </RouterLink>
          </div>
        </div>

      </div>

    </div>

  </div>
</template>

<script setup>
import { ref, computed, onMounted } from 'vue'
import { RouterLink } from 'vue-router'
import { useAuthStore } from '@/stores/auth'
import { dashboardService } from '@/services/dashboard.service'
import { mentoringService } from '@/services/mentoring.service'

const authStore = useAuthStore()

const dashboardData = ref(null)
const scheduleToday = ref([])
const recentActivities = ref([])
const isLoading = ref(true)
const errorMsg = ref(null)

const uniqueStudentsCount = ref(0)
const totalTeachingHours = ref(0)

const satisfactionRate = computed(() => {
  const rating = dashboardData.value?.average_rating
  if (rating === undefined || rating === null || rating === 0) return '—'
  return `${Math.round((rating / 5) * 100)}%`
})

const formatSessionTimeRange = (scheduledAt, durationMinutes = 60) => {
  if (!scheduledAt) return '10:00 - 11:00 WIB'
  const start = new Date(scheduledAt)
  const end = new Date(start.getTime() + durationMinutes * 60 * 1000)
  
  const pad = (n) => n.toString().padStart(2, '0')
  const startTime = `${pad(start.getHours())}:${pad(start.getMinutes())}`
  const endTime = `${pad(end.getHours())}:${pad(end.getMinutes())}`
  
  return `${startTime} - ${endTime} WIB`
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

const loadTutorDashboard = async () => {
  isLoading.value = true
  errorMsg.value = null
  try {
    // 1. Fetch dashboard metrics
    dashboardData.value = await dashboardService.getTutorDashboard()

    // 2. Fetch mentoring sessions
    try {
      const sessions = await mentoringService.getSessions()
      const sessionsArray = sessions || []

      // Calculate unique students
      const studentNames = new Set(sessionsArray.map(s => s.student?.name).filter(Boolean))
      uniqueStudentsCount.value = studentNames.size

      // Calculate total completed mentoring hours
      const completedSessions = sessionsArray.filter(s => s.status === 'completed')
      const totalMins = completedSessions.reduce((sum, s) => sum + (s.duration_minutes || 60), 0)
      totalTeachingHours.value = Math.round(totalMins / 60)
      
      // Populate "Jadwal Hari Ini" from confirmed sessions
      const todaySessions = sessionsArray.filter(s => s.status === 'confirmed')
      scheduleToday.value = todaySessions.slice(0, 3).map(s => {
        return {
          id: s.id,
          time: formatSessionTimeRange(s.scheduled_at || s.created_at, s.duration_minutes),
          title: s.title || 'Sesi Mentoring',
          status: s.status
        }
      })

      // Populate "Aktivitas Mahasiswa Terakhir" from pending requests
      const recentReqs = sessionsArray.filter(s => s.status === 'pending')
      recentActivities.value = recentReqs.slice(0, 3).map(s => {
        return {
          id: s.id,
          type: 'Request Bimbingan',
          time: formatTime(s.created_at),
          title: `${s.student?.name || 'Mahasiswa'} meminta sesi bimbingan: "${s.title || 'Mentoring'}"`,
          link: '/tutor/mentoring'
        }
      })
    } catch (e) {
      console.error('Error loading tutor mentoring sessions:', e)
      scheduleToday.value = []
      recentActivities.value = []
    }

  } catch (err) {
    console.error(err)
    errorMsg.value = err || 'Gagal memuat dashboard tutor.'
  } finally {
    isLoading.value = false
  }
}

onMounted(() => {
  loadTutorDashboard()
})
</script>
