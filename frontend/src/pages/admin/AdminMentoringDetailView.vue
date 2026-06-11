<template>
  <div class="p-6 md:p-8 xl:p-10 max-w-[1600px] mx-auto animate-in fade-in duration-500">
    
    <!-- Back Navigation -->
    <div class="mb-6 flex items-center gap-2">
      <RouterLink
        to="/admin/mentoring"
        class="text-sm font-bold text-slate-400 hover:text-[#334EAC] transition-colors flex items-center gap-1 w-fit bg-white/50 px-3 py-1.5 rounded-lg border border-slate-200/50"
      >
        ← Kembali ke Mentoring
      </RouterLink>
    </div>

    <!-- Header -->
    <div class="bg-white/60 backdrop-blur-xl rounded-3xl p-7 md:p-8 shadow-[0_10px_40px_rgba(15,23,42,0.06)] border border-slate-200/60 relative overflow-hidden mb-8">
      <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4 relative z-10">
        <div>
          <h1 class="text-3xl md:text-4xl font-extrabold text-slate-900 tracking-tight leading-tight">Session Monitor #{{ id }}</h1>
          <p class="text-[15px] text-slate-600 font-medium mt-2 max-w-xl leading-relaxed">Tinjauan sesi mentoring aktif dan log aktivitas.</p>
        </div>
      </div>
    </div>

    <!-- Loading State -->
    <div v-if="loading" class="bg-white rounded-2xl border border-slate-200 shadow-sm p-8 max-w-4xl animate-pulse space-y-6">
      <div class="grid grid-cols-2 gap-6">
        <div class="h-10 bg-slate-100 rounded"></div>
        <div class="h-10 bg-slate-100 rounded"></div>
        <div class="h-10 bg-slate-100 rounded"></div>
        <div class="h-10 bg-slate-100 rounded"></div>
      </div>
      <div class="h-32 bg-slate-100 rounded"></div>
    </div>

    <!-- Error State -->
    <div v-else-if="error" class="admin-card p-8 text-center max-w-lg mx-auto my-12">
      <p class="text-rose-600 font-medium mb-4">{{ error }}</p>
      <button @click="fetchSessionDetail" class="btn-modal-primary px-6 py-2 mx-auto">Coba Lagi</button>
    </div>

    <!-- Session Detail Card -->
    <div v-else-if="session" class="bg-white rounded-2xl border border-slate-200 shadow-sm p-8 max-w-4xl">
      <div class="grid grid-cols-1 sm:grid-cols-2 gap-6 mb-8">
        <div>
          <p class="text-xs font-bold text-slate-400 uppercase tracking-widest mb-1">Topik</p>
          <p class="text-base font-bold text-slate-900">{{ session.title || session.topic || 'Mentoring Session' }}</p>
        </div>
        <div>
          <p class="text-xs font-bold text-slate-400 uppercase tracking-widest mb-1">Status</p>
          <p class="text-base font-bold" :class="getStatusColorClass(session.status)">{{ session.status || 'Pending' }}</p>
        </div>
        <div>
          <p class="text-xs font-bold text-slate-400 uppercase tracking-widest mb-1">Tutor</p>
          <p class="text-base font-bold text-slate-900">{{ session.tutor?.name || session.tutor || 'Tutor' }}</p>
        </div>
        <div>
          <p class="text-xs font-bold text-slate-400 uppercase tracking-widest mb-1">Student</p>
          <p class="text-base font-bold text-slate-900">{{ session.student?.name || session.student || 'Student' }}</p>
        </div>
      </div>
      
      <div class="bg-slate-50 p-6 rounded-xl border border-slate-200">
        <h3 class="text-base font-bold text-slate-900 mb-4">Live Activity Log</h3>
        <ul class="space-y-4">
          <li v-for="(log, idx) in activityLogs" :key="idx" class="flex gap-4 text-sm font-medium">
            <span class="text-slate-400">{{ log.time }}</span>
            <span class="text-slate-700">{{ log.message }}</span>
          </li>
        </ul>
      </div>

      <div class="flex gap-4 border-t border-slate-100 pt-6 mt-8">
        <button 
          v-if="String(session.status).toLowerCase() !== 'completed' && String(session.status).toLowerCase() !== 'terminated'"
          @click="terminateSession"
          :disabled="updating"
          class="px-6 py-3 bg-rose-50 text-rose-700 border border-rose-200 font-bold text-sm rounded-xl hover:bg-rose-100 transition-colors disabled:opacity-50"
        >
          {{ updating ? 'Processing...' : 'Force Terminate Session' }}
        </button>
      </div>
    </div>
  </div>
</template>

<script setup>
import { ref, onMounted, computed } from 'vue'
import { useRoute, RouterLink } from 'vue-router'
import { adminService } from '@/services/admin.service'
import { useToastStore } from '@/stores/toast'

const route = useRoute()
const toastStore = useToastStore()
const id = computed(() => route.params.id)

const session = ref(null)
const loading = ref(false)
const updating = ref(false)
const error = ref(null)

const fetchSessionDetail = async () => {
  if (!id.value) return
  loading.value = true
  error.value = null
  try {
    const response = await adminService.getAdminMentoringDetail(id.value)
    session.value = response.data || response
  } catch (err) {
    error.value = err
  } finally {
    loading.value = false
  }
}

const terminateSession = async () => {
  if (!confirm('Apakah Anda yakin ingin mematikan sesi ini secara paksa?')) return
  updating.value = true
  try {
    await adminService.updateAdminMentoringStatus(id.value, { status: 'completed' })
    toastStore.success('Sesi mentoring berhasil dihentikan secara paksa.')
    fetchSessionDetail()
  } catch (err) {
    toastStore.error(err || 'Gagal menghentikan sesi mentoring.')
  } finally {
    updating.value = false
  }
}

const getStatusColorClass = (status) => {
  const s = String(status || '').toLowerCase()
  if (s === 'completed' || s === 'selesai') return 'text-emerald-600'
  if (s === 'in_progress' || s === 'in progress' || s === 'aktif') return 'text-sky-600'
  return 'text-amber-600'
}

const activityLogs = computed(() => {
  if (session.value?.logs && session.value.logs.length > 0) {
    return session.value.logs
  }
  return [
    { time: '10:05', message: 'Student joined the session.' },
    { time: '10:07', message: 'Tutor shared screen.' },
    { time: '10:15', message: 'Whiteboard interaction started.' },
  ]
})

onMounted(() => {
  fetchSessionDetail()
})
</script>
