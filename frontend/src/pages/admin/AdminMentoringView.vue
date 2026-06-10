<template>
  <div class="p-6 md:p-8 xl:p-10 max-w-[1600px] mx-auto animate-in fade-in duration-500">
    
    <!-- Header -->
    <div class="bg-white/60 backdrop-blur-xl rounded-3xl p-7 md:p-8 shadow-[0_10px_40px_rgba(15,23,42,0.06)] border border-slate-200/60 relative overflow-hidden mb-8">
      <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4 relative z-10">
        <div>
          <h1 class="text-3xl md:text-4xl font-extrabold text-slate-900 tracking-tight leading-tight">Mentoring Administration</h1>
          <p class="text-[15px] text-slate-600 font-medium mt-2 max-w-xl leading-relaxed">Monitor sesi mentoring aktif, tinjau laporan tutor, dan analitik performa mentoring.</p>
        </div>
      </div>
    </div>

    <!-- Active Sessions -->
    <div class="bg-white rounded-2xl border border-slate-200 shadow-sm overflow-hidden mb-8">
      <div class="p-6 border-b border-slate-100 flex items-center justify-between">
        <h2 class="text-lg font-bold text-slate-900 tracking-tight">Active Mentoring Sessions</h2>
      </div>

      <!-- Loading State -->
      <div v-if="loading" class="p-12 space-y-4">
        <div v-for="i in 3" :key="i" class="flex gap-4 animate-pulse">
          <div class="h-10 bg-slate-100 rounded w-1/12"></div>
          <div class="h-10 bg-slate-100 rounded w-1/3"></div>
          <div class="h-10 bg-slate-100 rounded w-1/4"></div>
          <div class="h-10 bg-slate-100 rounded w-1/8 ml-auto"></div>
        </div>
      </div>

      <!-- Error State -->
      <div v-else-if="error" class="p-12 text-center">
        <p class="text-rose-600 font-medium mb-4">{{ error }}</p>
        <button @click="fetchSessions" class="btn-modal-primary px-6 py-2 mx-auto">Coba Lagi</button>
      </div>

      <!-- Empty State -->
      <div v-else-if="sessions.length === 0" class="p-12 text-center text-slate-500 font-medium">
        Tidak ada sesi mentoring yang tercatat saat ini.
      </div>
      
      <div v-else class="overflow-x-auto">
        <table class="w-full text-left border-collapse">
          <thead>
            <tr class="bg-slate-50 border-b border-slate-100">
              <th class="px-6 py-4 text-xs font-bold text-slate-500 uppercase tracking-wider">Session ID</th>
              <th class="px-6 py-4 text-xs font-bold text-slate-500 uppercase tracking-wider">Topic</th>
              <th class="px-6 py-4 text-xs font-bold text-slate-500 uppercase tracking-wider">Tutor</th>
              <th class="px-6 py-4 text-xs font-bold text-slate-500 uppercase tracking-wider">Student</th>
              <th class="px-6 py-4 text-xs font-bold text-slate-500 uppercase tracking-wider">Schedule</th>
              <th class="px-6 py-4 text-xs font-bold text-slate-500 uppercase tracking-wider">Status</th>
              <th class="px-6 py-4 text-xs font-bold text-slate-500 uppercase tracking-wider text-right">Action</th>
            </tr>
          </thead>
          <tbody class="divide-y divide-slate-100">
            <tr v-for="session in sessions" :key="session.id" class="hover:bg-slate-50/50 transition-colors">
              <td class="px-6 py-4 text-sm font-bold text-slate-900">#{{ session.id }}</td>
              <td class="px-6 py-4 text-sm font-semibold text-slate-900">{{ session.title || session.topic || 'Mentoring Session' }}</td>
              <td class="px-6 py-4 text-sm text-slate-700 font-medium">{{ session.tutor?.name || session.tutor || 'Tutor' }}</td>
              <td class="px-6 py-4 text-sm text-slate-700 font-medium">{{ session.student?.name || session.student || 'Student' }}</td>
              <td class="px-6 py-4 text-sm text-slate-600">{{ session.schedule || session.date || '-' }}</td>
              <td class="px-6 py-4">
                <span :class="getStatusBadgeClass(session.status)" class="px-2.5 py-1 text-xs font-bold rounded-md uppercase">
                  {{ session.status || 'pending' }}
                </span>
              </td>
              <td class="px-6 py-4 text-right">
                <RouterLink :to="`/admin/mentoring/${session.id}`" class="inline-block px-4 py-2 bg-white border border-slate-200 text-slate-700 text-sm font-semibold rounded-lg hover:bg-slate-50 transition-colors">
                  Monitor
                </RouterLink>
              </td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</template>

<script setup>
import { ref, onMounted } from 'vue'
import { RouterLink } from 'vue-router'
import { adminService } from '@/services/admin.service'

const sessions = ref([])
const loading = ref(false)
const error = ref(null)

const fetchSessions = async () => {
  loading.value = true
  error.value = null
  try {
    const response = await adminService.getAdminMentoring()
    const rawList = response.data?.data || response.data || response?.data || response || []
    sessions.value = Array.isArray(rawList) ? rawList : []
  } catch (err) {
    error.value = err
  } finally {
    loading.value = false
  }
}

const getStatusBadgeClass = (status) => {
  const s = String(status || '').toLowerCase()
  if (s === 'completed' || s === 'selesai') return 'bg-emerald-50 text-emerald-700 border border-emerald-200'
  if (s === 'in_progress' || s === 'in progress' || s === 'aktif') return 'bg-sky-50 text-sky-700 border border-sky-200'
  return 'bg-amber-50 text-amber-700 border border-amber-200'
}

onMounted(() => {
  fetchSessions()
})
</script>
