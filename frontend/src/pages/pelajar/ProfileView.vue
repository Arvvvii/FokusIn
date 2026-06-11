<template>
  <div class="space-y-6 animate-in fade-in duration-500 min-w-0 max-w-7xl mx-auto">
    
    <!-- LOADING STATE -->
    <div v-if="isLoading" class="space-y-6 animate-pulse">
      <!-- Hero Skeleton -->
      <div class="bg-slate-200/60 rounded-2xl p-6 md:p-8 h-[240px] flex items-end gap-6">
        <div class="w-24 h-24 md:w-32 md:h-32 rounded-full bg-slate-300 shrink-0"></div>
        <div class="flex-1 space-y-3">
          <div class="h-4 bg-slate-300 rounded w-1/4"></div>
          <div class="h-8 bg-slate-300 rounded w-1/2"></div>
          <div class="h-4 bg-slate-300 rounded w-1/3"></div>
        </div>
      </div>
      <!-- Stats Cards Skeleton -->
      <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
        <div class="bg-slate-200/60 h-24 rounded-2xl p-4"></div>
        <div class="bg-slate-200/60 h-24 rounded-2xl p-4"></div>
        <div class="bg-slate-200/60 h-24 rounded-2xl p-4"></div>
      </div>
      <!-- Grid Content Skeleton -->
      <div class="grid grid-cols-1 xl:grid-cols-3 gap-6 md:gap-8">
        <div class="xl:col-span-2 bg-slate-200/60 h-64 rounded-2xl"></div>
        <div class="bg-slate-200/60 h-64 rounded-2xl"></div>
      </div>
    </div>

    <!-- ERROR STATE -->
    <div v-else-if="errorMsg" class="card-base p-8 text-center max-w-md mx-auto space-y-4">
      <div class="w-16 h-16 bg-red-50 text-red-500 rounded-full flex items-center justify-center mx-auto">
        <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"/><line x1="12" y1="8" x2="12" y2="12"/><line x1="12" y1="16" x2="12.01" y2="16"/></svg>
      </div>
      <h3 class="text-lg font-bold text-slate-900">Gagal Memuat Profil</h3>
      <p class="text-sm text-slate-500">{{ errorMsg }}</p>
      <button @click="fetchProfile" class="px-6 py-2.5 bg-[#334EAC] text-white rounded-xl font-bold text-xs hover:bg-[#081F5C] transition-all shadow-sm">
        Coba Lagi
      </button>
    </div>

    <!-- MAIN APP CONTENT -->
    <div v-else class="space-y-6">
      <!-- 1. PROFILE HERO SECTION -->
      <div class="bg-[linear-gradient(135deg,#081F5C_0%,#334EAC_100%)] rounded-2xl p-6 md:p-8 text-white relative overflow-hidden shadow-lg flex flex-col md:flex-row gap-6 items-center md:items-end min-h-[240px]">
        
        <!-- Subtle graphic border decoration instead of giant glows -->
        <div class="absolute inset-0 border border-white/5 rounded-2xl pointer-events-none"></div>
        <div class="absolute -right-16 -top-16 w-64 h-64 border border-white/10 rounded-full pointer-events-none"></div>
        
        <div class="relative z-10 flex flex-col md:flex-row gap-6 items-center md:items-end w-full">
          <!-- Avatar -->
          <div class="w-24 h-24 md:w-32 md:h-32 rounded-full bg-white/10 border-2 border-white/20 shadow-md overflow-hidden shrink-0 backdrop-blur-md relative group cursor-pointer flex items-center justify-center">
            <img v-if="profile?.avatar_url" :src="profile.avatar_url" alt="Profile" class="w-full h-full object-cover">
            <div v-else class="w-full h-full bg-[#334EAC] flex items-center justify-center text-white text-3xl font-extrabold select-none">
              {{ initials }}
            </div>
            <div class="absolute inset-0 bg-black/40 opacity-0 group-hover:opacity-100 transition-opacity flex items-center justify-center">
               <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="white" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M23 19a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2V8a2 2 0 0 1 2-2h4l2-3h6l2 3h4a2 2 0 0 1 2 2z"/><circle cx="12" cy="13" r="4"/></svg>
            </div>
          </div>

          <!-- Info -->
          <div class="flex-1 text-center md:text-left">
            <div class="flex flex-wrap items-center justify-center md:justify-start gap-1.5 mb-1.5">
              <span class="px-2.5 py-0.5 bg-white/10 rounded-full border border-white/10 text-[9px] font-bold uppercase tracking-wider text-white shadow-sm flex items-center gap-1">
                <span class="w-1 h-1 rounded-full bg-emerald-400"></span> Online
              </span>
              <span class="px-2.5 py-0.5 bg-[#BAD6EB]/20 rounded-full border border-[#BAD6EB]/20 text-[9px] font-bold uppercase tracking-wider text-[#BAD6EB] shadow-sm">
                {{ profile?.role === 'pelajar' ? 'Pelajar' : (profile?.role === 'tutor' ? 'Tutor' : 'Admin') }}
              </span>
            </div>
            <h1 class="text-2xl md:text-3xl font-bold tracking-tight mb-1 text-white">{{ name }}</h1>
            
            <div class="flex items-center justify-center md:justify-start gap-3 mt-3">
              <div class="flex items-center gap-1.5 text-xs font-bold text-white/90">
                <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><rect width="18" height="18" x="3" y="4" rx="2" ry="2"/><line x1="16" x2="16" y1="2" y2="6"/><line x1="8" x2="8" y1="2" y2="6"/><line x1="3" x2="21" y1="10" y2="10"/></svg>
                Bergabung {{ formatDate(profile?.created_at) }}
              </div>
            </div>
          </div>
          
          <!-- Action Button -->
          <div class="shrink-0">
             <RouterLink to="/pelajar/profile/edit" class="px-4 py-2.5 bg-white text-[#081F5C] hover:bg-[#F7F2EB] rounded-xl font-bold text-xs transition-all shadow-sm flex items-center gap-1.5 group">
                <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M17 3a2.85 2.83 0 1 1 4 4L7.5 20.5 2 22l1.5-5.5Z"/><path d="m15 5 4 4"/></svg>
                Edit Profil
             </RouterLink>
          </div>
        </div>
      </div>

      <!-- 2. PROFILE ANALYTICS -->
      <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
        <!-- Stat Card 1: Reputasi -->
        <div class="card-panel p-4 flex flex-col justify-between hover:border-[#7096D1]/40 transition-all group">
          <div class="flex items-center justify-between mb-2">
            <span class="text-[9px] font-bold text-slate-400 uppercase tracking-wider">Reputasi</span>
            <div class="w-6 h-6 rounded bg-amber-50 flex items-center justify-center text-amber-500 border border-amber-100/50">
               <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"/></svg>
            </div>
          </div>
          <h4 class="text-xl font-bold text-slate-900 tracking-tight">{{ profile?.reputation_score !== undefined ? profile.reputation_score : 0 }}</h4>
        </div>
        
        <!-- Stat Card 2: Postingan -->
        <div class="card-panel p-4 flex flex-col justify-between hover:border-[#7096D1]/40 transition-all group">
          <div class="flex items-center justify-between mb-2">
            <span class="text-[9px] font-bold text-slate-400 uppercase tracking-wider">Postingan</span>
            <div class="w-6 h-6 rounded bg-[#EDF1F6] flex items-center justify-center text-[#334EAC] border border-slate-200/50">
               <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z"/></svg>
            </div>
          </div>
          <h4 class="text-xl font-bold text-slate-900 tracking-tight">
            {{ profile?.total_posts !== undefined ? profile.total_posts : 0 }} Postingan
          </h4>
        </div>

        <!-- Stat Card 3: Jawaban -->
        <div class="card-panel p-4 flex flex-col justify-between hover:border-[#7096D1]/40 transition-all group">
          <div class="flex items-center justify-between mb-2">
            <span class="text-[9px] font-bold text-slate-400 uppercase tracking-wider">Jawaban</span>
            <div class="w-6 h-6 rounded bg-emerald-50 flex items-center justify-center text-emerald-500 border border-emerald-100/50">
               <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"/><polyline points="22 4 12 14.01 9 11.01"/></svg>
            </div>
          </div>
          <h4 class="text-xl font-bold text-slate-900 tracking-tight">
            {{ profile?.total_answers !== undefined ? profile.total_answers : 0 }} Jawaban
          </h4>
        </div>
      </div>

      <!-- MAIN GRID -->
      <div class="grid grid-cols-1 xl:grid-cols-3 gap-6 md:gap-8 items-start">
        
        <!-- LEFT COLUMN -->
        <div class="xl:col-span-2 space-y-6 md:space-y-8 min-w-0">
          
          <!-- 3. BADGE MILESTONE SYSTEM -->
          <div class="card-base p-7 md:p-8 group/card">
            <div class="flex items-center justify-between mb-6">
              <h3 class="text-[17px] font-bold text-slate-900 flex items-center gap-3 tracking-tight">
                <span class="w-8 h-8 rounded-lg bg-[#F7F2EB] flex items-center justify-center text-amber-500"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M3.85 8.62a4 4 0 0 1 4.78-4.77 4 4 0 0 1 6.74 0 4 4 0 0 1 4.78 4.78 4 4 0 0 1 0 6.74 4 4 0 0 1-4.77 4.78 4 4 0 0 1-6.75 0 4 4 0 0 1-4.78-4.77 4 4 0 1 0-6.76Z"/><path d="M9.09 9a3 3 0 0 1 5.83 1c0 2-3 3-3 3"/></svg></span>
                Pencapaian & Badge
              </h3>
              <div v-if="profile?.badges && profile.badges.length > 0" class="text-right">
                <span class="text-[13px] font-extrabold text-[#334EAC] block mb-1">
                  {{ profile.badges.length }} Badge Terbuka
                </span>
              </div>
            </div>

            <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
              <!-- Rendered Badges -->
              <div v-for="badge in profile?.badges || []" :key="badge.id" class="p-4 rounded-[1.25rem] bg-gradient-to-br from-[#EDF1F6] to-white border border-slate-200 flex flex-col items-center justify-center text-center gap-3 hover:shadow-md transition-all cursor-pointer">
                <div class="w-12 h-12 rounded-full bg-[#334EAC]/10 flex items-center justify-center text-[#334EAC] border border-[#334EAC]/20">
                  <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="m12 2 3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z"/></svg>
                </div>
                <div>
                  <p class="text-[13px] font-extrabold text-[#081F5C]">{{ badge.name }}</p>
                  <p class="text-[10px] font-bold text-[#334EAC]/70 uppercase tracking-widest mt-0.5">Tercapai</p>
                </div>
              </div>

              <!-- Fallback Badge -->
              <div v-if="!profile?.badges || profile.badges.length === 0" class="col-span-full py-8 text-center text-slate-400 text-sm font-semibold border border-dashed border-slate-200 rounded-[1.25rem]">
                Belum memiliki badge
              </div>
            </div>
          </div>

        </div>
        
        <!-- RIGHT SIDEBAR -->
        <div class="space-y-6 md:space-y-8 min-w-0">
          
          <!-- Profile Completion -->
          <div class="card-base p-6 text-center flex flex-col items-center group/card">
            <div class="relative w-24 h-24 mb-4">
              <svg viewBox="0 0 36 36" class="w-full h-full transform -rotate-90">
                <path class="text-[#EDF1F6]" d="M18 2.0845 a 15.9155 15.9155 0 0 1 0 31.831 a 15.9155 15.9155 0 0 1 0 -31.831" fill="none" stroke="currentColor" stroke-width="4" />
                <path class="text-[#334EAC]" stroke-dasharray="100, 100" d="M18 2.0845 a 15.9155 15.9155 0 0 1 0 31.831 a 15.9155 15.9155 0 0 1 0 -31.831" fill="none" stroke="currentColor" stroke-width="4" stroke-linecap="round" />
              </svg>
              <div class="absolute inset-0 flex flex-col items-center justify-center">
                <span class="text-xl font-extrabold text-[#081F5C]">100%</span>
              </div>
            </div>
            <h3 class="text-[15px] font-bold text-slate-900 mb-2 tracking-tight">Profil Anda</h3>
            <p class="text-[12px] font-medium text-slate-500 mb-5">Data profil Anda telah disinkronisasikan dengan sistem utama.</p>
            <RouterLink to="/pelajar/profile/edit" class="w-full py-2.5 bg-[#EDF1F6] hover:bg-[#334EAC] hover:text-white text-[#334EAC] rounded-xl font-extrabold text-[13px] transition-colors active:scale-95 text-center">
              Lengkapi / Edit Profil
            </RouterLink>
          </div>

          <!-- Quick Links -->
          <div class="card-base p-6 group/card">
            <h3 class="text-[15px] font-bold text-slate-900 mb-4 tracking-tight">Tautan Cepat</h3>
            <div class="space-y-2">
              <RouterLink to="/pelajar/materials" class="flex items-center gap-3 p-3 rounded-xl hover:bg-slate-50 transition-colors group text-[13px] font-bold text-slate-600 hover:text-[#334EAC]">
                <div class="w-8 h-8 rounded-lg bg-slate-100 group-hover:bg-[#EDF1F6] flex items-center justify-center transition-colors">
                  <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M4 19.5v-15A2.5 2.5 0 0 1 6.5 2H20v20H6.5a2.5 2.5 0 0 1 0-5H20"/></svg>
                </div>
                Materi Tersimpan
              </RouterLink>
              <RouterLink to="/pelajar/forum" class="flex items-center gap-3 p-3 rounded-xl hover:bg-slate-50 transition-colors group text-[13px] font-bold text-slate-600 hover:text-[#334EAC]">
                <div class="w-8 h-8 rounded-lg bg-slate-100 group-hover:bg-[#EDF1F6] flex items-center justify-center transition-colors">
                  <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z"/></svg>
                </div>
                Diskusi Tersimpan
              </RouterLink>
              <RouterLink to="/pelajar/profile/edit" class="flex items-center gap-3 p-3 rounded-xl hover:bg-slate-50 transition-colors group text-[13px] font-bold text-slate-600 hover:text-[#334EAC] cursor-pointer">
                <div class="w-8 h-8 rounded-lg bg-slate-100 group-hover:bg-[#EDF1F6] flex items-center justify-center transition-colors">
                  <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M12.22 2h-.44a2 2 0 0 0-2 2v.18a2 2 0 0 1-1 1.73l-.43.25a2 2 0 0 1-2 0l-.15-.08a2 2 0 0 0-2.73.73l-.22.38a2 2 0 0 0 .73 2.73l.15.1a2 2 0 0 1 1 1.72v.51a2 2 0 0 1-1 1.74l-.15.09a2 2 0 0 0-.73 2.73l.22.38a2 2 0 0 0 2.73.73l.15-.08a2 2 0 0 1 2 0l.43.25a2 2 0 0 1 1 1.73V20a2 2 0 0 0 2 2h.44a2 2 0 0 0 2-2v-.18a2 2 0 0 1 1-1.73l.43-.25a2 2 0 0 1 2 0l.15.08a2 2 0 0 0 2.73-.73l.22-.39a2 2 0 0 0-.73-2.73l-.15-.08a2 2 0 0 1-1-1.74v-.5a2 2 0 0 1 1-1.74l.15-.09a2 2 0 0 0 .73-2.73l-.22-.38a2 2 0 0 0-2.73-.73l-.15.08a2 2 0 0 1-2 0l-.43-.25a2 2 0 0 1-1-1.73V4a2 2 0 0 0-2-2z"/><circle cx="12" cy="12" r="3"/></svg>
                </div>
                Pengaturan Akun
              </RouterLink>
            </div>
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
import { profileService } from '@/services/profile.service'

const authStore = useAuthStore()

const profile = ref(null)
const isLoading = ref(true)
const errorMsg = ref(null)

const name = computed(() => profile.value?.name || 'Jennie Kim')

const initials = computed(() => {
  const currentName = name.value
  const parts = currentName.trim().split(/\s+/)
  if (parts.length >= 2) {
    return (parts[0][0] + parts[1][0]).toUpperCase()
  }
  return currentName.slice(0, 2).toUpperCase()
})

const formatDate = (dateStr) => {
  if (!dateStr) return 'Juni 2026'
  const date = new Date(dateStr)
  const months = ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember']
  return `${months[date.getMonth()]} ${date.getFullYear()}`
}

const fetchProfile = async () => {
  isLoading.value = true
  errorMsg.value = null
  try {
    const userId = authStore.user?.id
    if (userId) {
      profile.value = await profileService.getProfile(userId)
    } else {
      errorMsg.value = 'User tidak terautentikasi.'
    }
  } catch (err) {
    console.error(err)
    errorMsg.value = err || 'Gagal memuat profil.'
  } finally {
    isLoading.value = false
  }
}

onMounted(() => {
  fetchProfile()
})
</script>
