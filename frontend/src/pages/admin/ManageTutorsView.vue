<template>
  <div class="p-6 md:p-8 xl:p-10 max-w-[1600px] mx-auto animate-in fade-in duration-500">
    
    <!-- Header -->
    <div class="admin-dashboard-hero mb-8">
      <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4 relative z-10">
        <div>
          <h1 class="text-3xl md:text-4xl font-extrabold text-slate-900 tracking-tight leading-tight">Manajemen Tutor</h1>
          <p class="text-[15px] text-slate-600 font-medium mt-2 max-w-xl leading-relaxed">Kelola tutor, performa mentoring, dan aktivitas akademik.</p>
        </div>
        <div class="flex items-center gap-4">
          <button 
            @click="$router.push({ name: 'admin-tutors-create' })"
            class="btn-tambah-user px-5 py-2.5"
          >
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M16 21v-2a4 4 0 0 0-4-4H6a4 4 0 0 0-4 4v2"/><circle cx="9" cy="7" r="4"/><path d="M19 8v6"/><path d="M22 11h-6"/></svg>
            Tambah Tutor
          </button>
        </div>
      </div>
    </div>

    <!-- Loading State -->
    <div v-if="loading" class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6 mb-8">
      <div v-for="i in 4" :key="i" class="tutor-card flex flex-col animate-pulse">
        <div class="flex items-start justify-between mb-4">
          <div class="w-12 h-12 rounded-full bg-slate-200"></div>
          <div class="w-16 h-8 bg-slate-200 rounded-lg"></div>
        </div>
        <div class="mb-4 space-y-2">
          <div class="h-4 bg-slate-200 rounded w-3/4"></div>
          <div class="h-3 bg-slate-200 rounded w-1/2"></div>
        </div>
        <div class="mt-auto pt-4 border-t border-slate-100 space-y-2">
          <div class="h-4 bg-slate-200 rounded w-1/3"></div>
          <div class="grid grid-cols-2 gap-2">
            <div class="h-10 bg-slate-200 rounded-lg"></div>
            <div class="h-10 bg-slate-200 rounded-lg"></div>
          </div>
        </div>
      </div>
    </div>

    <!-- Error State -->
    <div v-else-if="error" class="admin-card p-8 text-center max-w-lg mx-auto my-12">
      <div class="w-16 h-16 bg-rose-50 rounded-full flex items-center justify-center text-rose-600 mx-auto mb-4">
        <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="10"/><line x1="12" x2="12" y1="8" y2="12"/><line x1="12" x2="12.01" y1="16" y2="16"/></svg>
      </div>
      <h3 class="text-lg font-bold text-slate-950 mb-2">Gagal Memuat Data</h3>
      <p class="text-sm text-slate-600 mb-6">{{ error }}</p>
      <button @click="fetchTutors" class="btn-modal-primary px-6 py-2 mx-auto">Coba Lagi</button>
    </div>

    <!-- Empty State -->
    <div v-else-if="filteredTutors.length === 0" class="admin-card p-8 text-center max-w-lg mx-auto my-12">
      <div class="w-16 h-16 bg-slate-50 rounded-full flex items-center justify-center text-slate-400 mx-auto mb-4">
        <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"/><circle cx="9" cy="7" r="4"/><path d="M23 21v-2a4 4 0 0 0-3-3.87"/><path d="M16 3.13a4 4 0 0 1 0 7.75"/></svg>
      </div>
      <h3 class="text-lg font-bold text-slate-950 mb-2">Tidak Ada Tutor</h3>
      <p class="text-sm text-slate-600 mb-6">Belum ada tutor yang terdaftar atau tidak ada hasil pencarian yang cocok.</p>
      <button @click="$router.push({ name: 'admin-tutors-create' })" class="btn-modal-primary px-6 py-2 mx-auto">Tambah Tutor Baru</button>
    </div>

    <div v-else>
      <!-- Performance Summaries -->
      <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4 mb-6">
        <div class="admin-card p-5 stat-total-tutor">
          <div class="flex items-center gap-3 mb-2">
            <div class="w-8 h-8 rounded-lg bg-[#F7F2EB] flex items-center justify-center text-[#081F5C]">
              <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path d="M16 21v-2a4 4 0 0 0-4-4H6a4 4 0 0 0-4 4v2"/><circle cx="9" cy="7" r="4"/></svg>
            </div>
            <h3 class="text-sm font-medium text-slate-600">Total Tutor Aktif</h3>
          </div>
          <p class="text-3xl font-semibold text-slate-900">{{ activeTutorsCount }}</p>
        </div>
        
        <div class="admin-card p-5 stat-rating">
          <div class="flex items-center gap-3 mb-2">
            <div class="w-8 h-8 rounded-lg bg-amber-50 flex items-center justify-center text-amber-600">
              <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"/></svg>
            </div>
            <h3 class="text-sm font-medium text-slate-600">Rata-rata Rating</h3>
          </div>
          <p class="rating-large">{{ averageRating }}<span class="rating-max">/5.0</span></p>
        </div>

        <div class="admin-card p-5 stat-sesi">
          <div class="flex items-center gap-3 mb-2">
            <div class="w-8 h-8 rounded-lg bg-sky-50 flex items-center justify-center text-sky-600">
              <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path d="M22 12h-4l-3 9L9 3l-3 9H2"/></svg>
            </div>
            <h3 class="text-sm font-medium text-slate-600">Sesi Mentoring</h3>
          </div>
          <p class="text-3xl font-semibold text-slate-900">{{ totalSessionsCount }}</p>
        </div>

        <div class="admin-card p-5 stat-antrean">
          <div class="flex items-center gap-3 mb-2">
            <div class="w-8 h-8 rounded-lg bg-amber-100 flex items-center justify-center text-amber-600">
              <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"/></svg>
            </div>
            <h3 class="text-sm font-medium text-slate-600">Pending Tutor</h3>
          </div>
          <div class="flex items-end gap-3">
            <p class="antrean-value">{{ pendingTutorsCount }}</p>
          </div>
        </div>
      </div>

      <!-- Filters -->
      <div class="admin-filter-bar mb-6 p-3 flex flex-col md:flex-row gap-4 items-center">
        <div class="relative flex-1 w-full max-w-md">
          <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none text-[#8A9CC0]">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><circle cx="11" cy="11" r="8"/><path d="m21 21-4.3-4.3"/></svg>
          </div>
          <input 
            v-model="searchQuery"
            type="text" 
            class="admin-search-input pl-11 pr-4 py-1.5" 
            placeholder="Cari tutor, email..."
          >
        </div>
        <div class="flex items-center gap-2 w-full md:w-auto ml-auto">
          <select v-model="statusFilter" class="filter-dropdown appearance-none">
            <option value="">Semua Status</option>
            <option value="active">Active</option>
            <option value="inactive">Inactive</option>
            <option value="pending">Pending</option>
          </select>
        </div>
      </div>

      <!-- Workspace Grid -->
      <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6">
        <div v-for="tutor in filteredTutors" :key="tutor.id" class="tutor-card flex flex-col group">
          <div class="flex items-start justify-between mb-4">
            <div class="tutor-avatar-circle shrink-0" :class="getAvatarBg(tutor.id)">
              {{ getInitials(tutor.name) }}
            </div>
            <div class="flex gap-1.5 items-center">
              <span :class="getStatusBadgeClass(tutor.status)" class="px-2 py-0.5 rounded-full text-xs font-semibold uppercase">
                {{ tutor.status || 'active' }}
              </span>
              <button class="tutor-action-btn" title="Detail Tutor" @click="$router.push(`/admin/tutors/${tutor.id}`)">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="1"/><circle cx="19" cy="12" r="1"/><circle cx="5" cy="12" r="1"/></svg>
              </button>
            </div>
          </div>
          
          <div class="mb-4">
            <h3 class="text-base font-semibold text-slate-900 mb-0.5 group-hover:text-[#334EAC] transition-colors cursor-pointer" @click="$router.push(`/admin/tutors/${tutor.id}`)">{{ tutor.name }}</h3>
            <p class="text-xs text-slate-500 mb-3">{{ tutor.email }}</p>
            
            <div class="flex flex-wrap gap-2">
              <span v-for="(spec, i) in (tutor.specializations || ['Tutor'])" :key="i" class="spec-tag">
                {{ spec }}
              </span>
            </div>
          </div>
          
          <div class="mt-auto pt-4 border-t border-slate-100">
            <div class="flex items-center justify-between mb-3">
              <div class="flex items-center gap-1.5">
                <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="currentColor" class="text-amber-500" stroke="none"><polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"/></svg>
                <span class="text-sm font-semibold text-slate-900">{{ tutor.rating || '0.0' }}</span>
                <span class="text-xs text-slate-500">({{ tutor.reviews || 0 }} ulasan)</span>
              </div>
            </div>
            <div class="grid grid-cols-2 gap-2 text-center">
              <div class="bg-slate-50 rounded-xl py-2 px-1 border border-slate-100">
                <p class="text-lg font-semibold text-[#081F5C] leading-none mb-1">{{ tutor.sessions_count || tutor.sessions || 0 }}</p>
                <p class="text-[10px] text-slate-500 font-semibold uppercase">Sesi Mentoring</p>
              </div>
              <div class="bg-slate-50 rounded-xl py-2 px-1 border border-slate-100">
                <p class="text-lg font-semibold text-[#081F5C] leading-none mb-1">{{ tutor.studentsHelped || 0 }}</p>
                <p class="text-[10px] text-slate-500 font-semibold uppercase">Pelajar Dibantu</p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script setup>
import { ref, onMounted, computed } from 'vue'
import { adminService } from '@/services/admin.service'

const tutors = ref([])
const loading = ref(false)
const error = ref(null)
const searchQuery = ref('')
const statusFilter = ref('')

const fetchTutors = async () => {
  loading.value = true
  error.value = null
  try {
    const response = await adminService.getTutors()
    tutors.value = response.data || response || []
  } catch (err) {
    error.value = err
  } finally {
    loading.value = false
  }
}

const getInitials = (name) => {
  if (!name) return '?'
  const parts = name.split(' ')
  return parts.map(p => p[0]).slice(0, 2).join('').toUpperCase()
}

const getAvatarBg = (id) => {
  const gradients = [
    'bg-gradient-to-br from-[#334EAC] to-[#081F5C]',
    'bg-gradient-to-br from-emerald-400 to-teal-500',
    'bg-gradient-to-br from-[#7096D1] to-[#7096D1]',
    'bg-gradient-to-br from-rose-400 to-orange-400',
    'bg-gradient-to-br from-blue-400 to-cyan-500',
    'bg-gradient-to-br from-slate-400 to-slate-600'
  ]
  return gradients[id % gradients.length]
}

const getStatusBadgeClass = (status) => {
  const s = String(status || '').toLowerCase()
  if (s === 'active') return 'bg-emerald-50 text-emerald-700 border border-emerald-200'
  if (s === 'pending') return 'bg-amber-50 text-amber-700 border border-amber-200'
  return 'bg-slate-100 text-slate-700 border border-slate-200'
}

const filteredTutors = computed(() => {
  return tutors.value.filter(t => {
    const matchesSearch = t.name?.toLowerCase().includes(searchQuery.value.toLowerCase()) || 
                          t.email?.toLowerCase().includes(searchQuery.value.toLowerCase())
    const matchesStatus = !statusFilter.value || String(t.status || '').toLowerCase() === statusFilter.value.toLowerCase()
    return matchesSearch && matchesStatus
  })
})

const activeTutorsCount = computed(() => {
  return tutors.value.filter(t => String(t.status || '').toLowerCase() === 'active').length
})

const pendingTutorsCount = computed(() => {
  return tutors.value.filter(t => String(t.status || '').toLowerCase() === 'pending').length
})

const averageRating = computed(() => {
  const rated = tutors.value.filter(t => parseFloat(t.rating) > 0)
  if (rated.length === 0) return '0.0'
  const total = rated.reduce((acc, t) => acc + parseFloat(t.rating), 0)
  return (total / rated.length).toFixed(1)
})

const totalSessionsCount = computed(() => {
  return tutors.value.reduce((acc, t) => acc + parseInt(t.sessions_count || t.sessions || 0), 0)
})

onMounted(() => {
  fetchTutors()
})
</script>
