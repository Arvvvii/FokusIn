<template>
  <div class="space-y-8 w-full pb-12">
    <!-- Back Navigation -->
    <div class="mb-6 flex items-center gap-2">
      <RouterLink
        to="/tutor/mentoring"
        class="text-sm font-bold text-slate-400 hover:text-[#334EAC] transition-colors flex items-center gap-1 w-fit bg-white/50 px-3 py-1.5 rounded-lg border border-slate-200/50"
      >
        ← Kembali ke Kelola Mentoring
      </RouterLink>
    </div>

    <!-- 1. EDITORIAL WORKSPACE HEADER SECTION -->
    <div class="bg-white border border-slate-200 shadow-sm rounded-2xl p-7 md:p-8 flex flex-col md:flex-row md:items-center justify-between gap-6 relative">
        <div class="absolute right-0 top-0 w-1/3 h-full bg-gradient-to-l from-[#EDF1F6]/50 to-transparent pointer-events-none"></div>
        
        <div class="relative z-10 flex items-center gap-4">
          <span class="w-12 h-12 rounded-2xl bg-[#334EAC]/10 text-[#334EAC] flex items-center justify-center shrink-0">
            <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><rect width="18" height="18" x="3" y="4" rx="2" ry="2"/><line x1="16" x2="16" y1="2" y2="6"/><line x1="8" x2="8" y1="2" y2="6"/><line x1="3" x2="21" y1="10" y2="10"/></svg>
          </span>
          <div>
            <h1 class="text-2xl font-extrabold text-[#081F5C] tracking-tight leading-tight">Jadwal & Kalender Mentoring</h1>
            <p class="text-[13px] text-slate-500 font-medium mt-2 max-w-xl leading-relaxed">
              Kelola slot ketersediaan mengajar Anda, atur konsultasi terjadwal, dan integrasikan dengan Google Calendar.
            </p>
          </div>
        </div>

        <div class="relative z-10 flex shrink-0 gap-3">
          <button @click="triggerSync" class="px-5 py-2.5 bg-white border border-slate-200 hover:border-[#7096D1] text-slate-600 rounded-2xl font-bold text-[13px] transition-all shadow-sm active:scale-95 flex items-center gap-2">
            <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M21 12a9 9 0 0 0-9-9 9.75 9.75 0 0 0-6.74 2.74L3 8"/><path d="M3 3v5h5"/><path d="M3 12a9 9 0 0 0 9 9 9.75 9.75 0 0 0 6.74-2.74L21 16"/><path d="M16 16h5v5"/></svg>
            Sinkronisasi
          </button>
          <button @click="showAddSlot = true" class="px-5 py-2.5 bg-[#334EAC] hover:bg-[#081F5C] text-white rounded-2xl font-bold text-[13px] transition-all shadow-sm active:scale-95 flex items-center gap-2">
            + Tambah Slot
          </button>
        </div>
      </div>

      <!-- MAIN WORKSPACE -->
      <div class="grid grid-cols-1 lg:grid-cols-12 gap-8">
        
        <!-- LEFT: CALENDAR VIEW (8 columns) -->
        <div class="lg:col-span-8 space-y-6">
          <div class="bg-white rounded-3xl p-6 shadow-sm border border-slate-200">
            <!-- Calendar Month Header -->
            <div class="flex items-center justify-between mb-6">
              <h2 class="text-lg font-bold text-slate-900">{{ currentMonthName }}</h2>
              <div class="flex items-center gap-1.5">
                <button @click="prevMonth" class="p-2 hover:bg-slate-100 rounded-xl transition-colors text-slate-600">
                  <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="m15 18-6-6 6-6"/></svg>
                </button>
                <button @click="nextMonth" class="p-2 hover:bg-slate-100 rounded-xl transition-colors text-slate-600">
                  <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="m9 18 6-6-6-6"/></svg>
                </button>
              </div>
            </div>

            <!-- Calendar Grid -->
            <div class="grid grid-cols-7 gap-1 sm:gap-2 text-center text-[10px] sm:text-xs font-bold text-slate-400 mb-2">
              <span>MIN</span><span>SEN</span><span>SEL</span><span>RAB</span><span>KAM</span><span>JUM</span><span>SAB</span>
            </div>
            <div class="grid grid-cols-7 gap-1 sm:gap-2">
              <!-- Calendar empty slots -->
              <div v-for="i in startDayOfWeek" :key="'empty-'+i" class="h-12 sm:h-20 bg-slate-50/50 border border-slate-100 rounded-xl opacity-30"></div>
              
              <!-- Real Days -->
              <div 
                v-for="day in daysInMonth" 
                :key="day" 
                @click="selectedDay = day"
                class="h-12 sm:h-20 p-1 sm:p-2 border rounded-xl flex flex-col justify-between cursor-pointer transition-all hover:border-[#334EAC]/30 group"
                :class="[
                  selectedDay === day ? 'bg-[#EEF3FF] border-[#334EAC] text-[#081F5C] shadow-inner' : 'bg-white border-slate-200 text-slate-800',
                  hasSessions(day) ? 'ring-2 ring-[#334EAC]/20 bg-[#F0F5FF]/40' : ''
                ]"
              >
                <span class="text-[10px] sm:text-xs font-bold" :class="selectedDay === day ? 'text-[#334EAC]' : 'text-slate-500'">{{ day }}</span>
                
                <!-- Dot Session Indicators -->
                <div class="flex flex-wrap gap-0.5 sm:gap-1 mt-auto justify-center sm:justify-start">
                  <span 
                    v-for="s in getSessionsForDay(day)" 
                    :key="s.id" 
                    class="w-1.5 h-1.5 rounded-full" 
                    :class="s.status === 'confirmed' || s.status === 'approved' ? 'bg-[#334EAC]' : (s.status === 'pending' || s.status === 'requested' ? 'bg-amber-500' : 'bg-emerald-500')"
                    :title="s.title"
                  ></span>
                </div>
              </div>
            </div>
          </div>
        </div>

        <!-- RIGHT: DAY DETAILS & QUEUE (4 columns) -->
        <div class="lg:col-span-4 space-y-6">
          <div class="bg-white rounded-3xl p-6 shadow-sm border border-slate-200">
            <h3 class="text-[15px] font-bold text-slate-900 tracking-tight mb-4">Agenda Hari Ini: {{ selectedDay }} {{ currentMonthName }}</h3>
            
            <div v-if="selectedDaySessions.length > 0" class="space-y-4">
              <RouterLink 
                v-for="sess in selectedDaySessions" 
                :key="sess.id" 
                :to="`/tutor/mentoring/${sess.id}`" 
                class="block p-4 rounded-2xl border transition-colors"
                :class="sess.status === 'confirmed' || sess.status === 'approved' ? 'border-emerald-100 bg-emerald-50/20 hover:border-emerald-300' : 'border-slate-200 bg-slate-50/50 hover:border-[#7096D1]/30'"
              >
                <span class="text-[10px] font-bold uppercase tracking-widest block mb-1" :class="sess.status === 'confirmed' || sess.status === 'approved' ? 'text-[#334EAC]' : 'text-slate-500'">
                  {{ formatSessionTimeRange(sess) }}
                </span>
                <h4 class="text-sm font-bold text-[#081F5C] mb-0.5">{{ sess.title || sess.topic || 'Mentoring Akademik' }}</h4>
                <p class="text-xs text-slate-500">Mahasiswa: {{ sess.student?.name || 'Mahasiswa' }}</p>
                <div class="mt-2.5 flex items-center justify-between text-xs font-bold text-[#334EAC]">
                  <span>Detail Workspace →</span>
                  <span class="px-2 py-0.5 rounded text-[10px]" :class="getSessionStatusClass(sess.status)">
                    {{ getSessionStatusLabel(sess.status) }}
                  </span>
                </div>
              </RouterLink>
            </div>

            <div v-else class="py-12 text-center">
              <div class="w-10 h-10 rounded-full bg-slate-50 border border-slate-100 flex items-center justify-center mx-auto mb-3 text-slate-400">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><rect width="18" height="18" x="3" y="4" rx="2" ry="2"/><line x1="16" x2="16" y1="2" y2="6"/><line x1="8" x2="8" y1="2" y2="6"/><line x1="3" x2="21" y1="10" y2="10"/></svg>
              </div>
              <h4 class="text-xs font-bold text-slate-700 mb-1">Tidak Ada Jadwal</h4>
              <p class="text-[11px] text-slate-400 max-w-[200px] mx-auto">Anda tidak memiliki sesi bimbingan terjadwal pada hari ini.</p>
            </div>
          </div>
        </div>

      </div>
    <div v-if="showSyncToast" class="fixed bottom-6 right-6 z-50 bg-emerald-500 text-white px-6 py-4 rounded-2xl shadow-[0_10px_40px_rgba(16,185,129,0.3)] flex items-center gap-3 animate-in slide-in-from-bottom-5">
      <div class="w-8 h-8 bg-white/20 rounded-full flex items-center justify-center shrink-0">
        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"><polyline points="20 6 9 17 4 12"/></svg>
      </div>
      <div>
        <h4 class="font-bold text-sm">Sinkronisasi Berhasil!</h4>
        <p class="text-xs text-emerald-100 font-medium">Kalender FokusIn telah disinkronkan dengan Google Calendar.</p>
      </div>
    </div>
  </div>
</template>

<script setup>
import { ref, computed, onMounted } from 'vue'
import { RouterLink } from 'vue-router'
import { mentoringService } from '@/services/mentoring.service'

const currentDate = ref(new Date())
const selectedDay = ref(new Date().getDate())
const showSyncToast = ref(false)
const showAddSlot = ref(false)
const sessions = ref([])
const isLoading = ref(false)

const currentMonthName = computed(() => {
  return currentDate.value.toLocaleString('id-ID', { month: 'long', year: 'numeric' })
})

const daysInMonth = computed(() => {
  const year = currentDate.value.getFullYear()
  const month = currentDate.value.getMonth()
  return new Date(year, month + 1, 0).getDate()
})

const startDayOfWeek = computed(() => {
  const year = currentDate.value.getFullYear()
  const month = currentDate.value.getMonth()
  return new Date(year, month, 1).getDay()
})

const prevMonth = () => {
  currentDate.value = new Date(currentDate.value.getFullYear(), currentDate.value.getMonth() - 1, 1)
  selectedDay.value = 1
}

const nextMonth = () => {
  currentDate.value = new Date(currentDate.value.getFullYear(), currentDate.value.getMonth() + 1, 1)
  selectedDay.value = 1
}

const loadSessions = async () => {
  try {
    isLoading.value = true
    const data = await mentoringService.getSessions()
    sessions.value = data || []
  } catch (err) {
    console.error('Error fetching sessions:', err)
  } finally {
    isLoading.value = false
  }
}

const getSessionsForDay = (day) => {
  return sessions.value.filter(s => {
    const dateStr = s.scheduled_at || s.created_at
    if (!dateStr) return false
    const d = new Date(dateStr)
    return d.getDate() === day &&
           d.getMonth() === currentDate.value.getMonth() &&
           d.getFullYear() === currentDate.value.getFullYear()
  })
}

const hasSessions = (day) => {
  return getSessionsForDay(day).length > 0
}

const selectedDaySessions = computed(() => {
  return getSessionsForDay(selectedDay.value)
})

const formatSessionTimeRange = (sess) => {
  const dateStr = sess.scheduled_at || sess.created_at
  if (!dateStr) return ''
  const d = new Date(dateStr)
  const hours = d.getHours().toString().padStart(2, '0')
  const mins = d.getMinutes().toString().padStart(2, '0')
  const duration = sess.duration_minutes || 60
  const endD = new Date(d.getTime() + duration * 60000)
  const endHours = endD.getHours().toString().padStart(2, '0')
  const endMins = endD.getMinutes().toString().padStart(2, '0')
  return `${hours}:${mins} - ${endHours}:${endMins}`
}

const getSessionStatusLabel = (status) => {
  const s = (status || '').toLowerCase()
  if (s === 'pending' || s === 'requested') return 'Pending'
  if (s === 'confirmed' || s === 'approved') return 'Disetujui'
  if (s === 'completed' || s === 'finished') return 'Selesai'
  if (s === 'rejected') return 'Ditolak'
  return status
}

const getSessionStatusClass = (status) => {
  const s = (status || '').toLowerCase()
  if (s === 'pending' || s === 'requested') return 'bg-amber-100 text-amber-700'
  if (s === 'confirmed' || s === 'approved') return 'bg-emerald-100 text-emerald-700'
  if (s === 'completed' || s === 'finished') return 'bg-blue-100 text-blue-700'
  return 'bg-slate-100 text-slate-700'
}

const triggerSync = () => {
  showSyncToast.value = true
  setTimeout(() => {
    showSyncToast.value = false
  }, 3000)
}

onMounted(() => {
  loadSessions()
})
</script>
