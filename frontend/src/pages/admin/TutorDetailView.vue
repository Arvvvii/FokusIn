<template>
  <div class="p-6 md:p-8 xl:p-10 max-w-[1450px] mx-auto animate-in fade-in duration-500 space-y-5">
      
    <!-- Back Navigation -->
    <div class="mb-6 flex items-center gap-2">
      <RouterLink
        to="/admin/tutors"
        class="text-sm font-bold text-slate-400 hover:text-[#334EAC] transition-colors flex items-center gap-1 w-fit bg-white/50 px-3 py-1.5 rounded-lg border border-slate-200/50"
      >
        ← Kembali ke Tutor
      </RouterLink>
    </div>

    <!-- Compact Editorial Header -->
    <div class="admin-dashboard-hero mb-6 flex flex-col sm:flex-row sm:items-center justify-between gap-5">
      <div class="flex items-center gap-4 relative z-10">
        <span class="w-12 h-12 rounded-xl bg-[#334EAC]/10 text-[#334EAC] flex items-center justify-center shrink-0">
          <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path d="M2 21a8 8 0 0 1 13.292-6"/><circle cx="10" cy="8" r="5"/><path d="m16 19 2 2 4-4"/></svg>
        </span>
        <div>
          <h1 class="text-3xl md:text-4xl font-extrabold text-slate-900 tracking-tight leading-tight">Detail Tutor</h1>
          <p class="text-[15px] text-slate-600 font-medium mt-2 max-w-xl leading-relaxed">Profil pengajar, kualifikasi, bimbingan, dan statistik performa mentoring.</p>
        </div>
      </div>
    </div>

    <!-- Loading State -->
    <div v-if="loading" class="grid grid-cols-1 lg:grid-cols-3 gap-5 animate-pulse">
      <div class="admin-card p-5 space-y-4 text-center">
        <div class="w-20 h-20 mx-auto rounded-full bg-slate-200"></div>
        <div class="h-4 bg-slate-200 rounded w-1/2 mx-auto"></div>
        <div class="h-3 bg-slate-200 rounded w-1/3 mx-auto"></div>
      </div>
      <div class="lg:col-span-2 admin-card p-5 space-y-4">
        <div class="h-4 bg-slate-200 rounded w-1/4"></div>
        <div class="h-3 bg-slate-200 rounded w-3/4"></div>
        <div class="h-3 bg-slate-200 rounded w-5/6"></div>
      </div>
    </div>

    <!-- Error State -->
    <div v-else-if="error" class="admin-card p-8 text-center max-w-lg mx-auto my-12">
      <div class="w-16 h-16 bg-rose-50 rounded-full flex items-center justify-center text-rose-600 mx-auto mb-4">
        <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="10"/><line x1="12" x2="12" y1="8" y2="12"/><line x1="12" x2="12.01" y1="16" y2="16"/></svg>
      </div>
      <h3 class="text-lg font-bold text-slate-950 mb-2">Gagal Memuat Detail Tutor</h3>
      <p class="text-sm text-slate-600 mb-6">{{ error }}</p>
      <button @click="fetchTutorDetail" class="btn-modal-primary px-6 py-2 mx-auto">Coba Lagi</button>
    </div>

    <!-- Detail Info -->
    <div v-else-if="tutor" class="grid grid-cols-1 lg:grid-cols-3 gap-5">
      
      <!-- Profile Column -->
      <div class="admin-card p-5 space-y-4 text-center">
        <div class="w-20 h-20 mx-auto rounded-full bg-gradient-to-br from-[#334EAC] to-[#081F5C] flex items-center justify-center text-white font-bold text-2xl shadow-sm border border-slate-100">
          {{ getInitials(tutor.name) }}
        </div>
        <div>
          <h3 class="text-base font-semibold text-slate-900">{{ tutor.name }}</h3>
          <p class="text-xs text-slate-500 font-medium">{{ tutor.email }}</p>
        </div>
        <div class="inline-flex items-center gap-1.5 px-2.5 py-1 bg-emerald-50 text-emerald-700 text-xs font-semibold rounded-md border border-emerald-100">
          <span class="w-1.5 h-1.5 rounded-full bg-emerald-500"></span>
          {{ tutor.status || 'Active' }} Tutor
        </div>
        <div class="pt-4 border-t border-slate-100 grid grid-cols-2 gap-2 text-left">
          <div>
            <p class="text-[10px] font-bold text-slate-400 uppercase tracking-widest">Sesi Mentoring</p>
            <p class="text-sm font-bold text-slate-900">{{ tutor.sessions_count || tutor.sessions || 0 }} Sesi</p>
          </div>
          <div>
            <p class="text-[10px] font-bold text-slate-400 uppercase tracking-widest">Rating Mentoring</p>
            <p class="text-sm font-bold text-slate-900">{{ tutor.rating || '0.00' }} / 5.00</p>
          </div>
        </div>
      </div>

      <!-- Academic Performance & Qualifications -->
      <div class="lg:col-span-2 admin-card p-5 space-y-4">
        <h3 class="text-base font-semibold text-slate-900 border-b border-slate-100 pb-2">Kualifikasi Pengajaran</h3>
        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
          <div>
            <p class="text-[10px] font-bold text-slate-400 uppercase tracking-widest mb-0.5">Spesialisasi</p>
            <p class="text-sm font-semibold text-slate-800">
              {{ Array.isArray(tutor.specializations) ? tutor.specializations.join(', ') : (tutor.specializations || 'Belum diisi') }}
            </p>
          </div>
          <div>
            <p class="text-[10px] font-bold text-slate-400 uppercase tracking-widest mb-0.5">Biografi</p>
            <p class="text-sm text-slate-700">{{ tutor.bio || 'Tidak ada biografi singkat.' }}</p>
          </div>
        </div>
        <div class="pt-4 border-t border-slate-100">
          <h4 class="text-xs font-bold text-slate-400 uppercase tracking-widest mb-2">Statistik Akademik Lainnya</h4>
          <div class="grid grid-cols-2 sm:grid-cols-3 gap-4">
            <div class="p-3 bg-slate-50 rounded-lg border border-slate-100">
              <p class="text-xs text-slate-500 font-semibold uppercase">Ulasan Pelanggan</p>
              <p class="text-lg font-bold text-slate-900">{{ tutor.reviews || 0 }}</p>
            </div>
            <div class="p-3 bg-slate-50 rounded-lg border border-slate-100">
              <p class="text-xs text-slate-500 font-semibold uppercase">Pelajar Dibantu</p>
              <p class="text-lg font-bold text-slate-900">{{ tutor.studentsHelped || 0 }}</p>
            </div>
            <div class="p-3 bg-slate-50 rounded-lg border border-slate-100">
              <p class="text-xs text-slate-500 font-semibold uppercase">Sesi Selesai</p>
              <p class="text-lg font-bold text-slate-900">{{ tutor.sessions_completed || 0 }}</p>
            </div>
          </div>
        </div>
      </div>

    </div>
  </div>
</template>

<script setup>
import { ref, onMounted } from 'vue'
import { useRoute } from 'vue-router'
import { adminService } from '@/services/admin.service'

const route = useRoute()
const tutor = ref(null)
const loading = ref(false)
const error = ref(null)

const getInitials = (name) => {
  if (!name) return '?'
  const parts = name.split(' ')
  return parts.map(p => p[0]).slice(0, 2).join('').toUpperCase()
}

const fetchTutorDetail = async () => {
  loading.value = true
  error.value = null
  try {
    const response = await adminService.getTutorDetail(route.params.id)
    tutor.value = response.data || response
  } catch (err) {
    error.value = err
  } finally {
    loading.value = false
  }
}

onMounted(() => {
  fetchTutorDetail()
})
</script>
