<template>
  <div class="space-y-8 w-full pb-12 animate-in fade-in duration-500">
      
      <!-- LOADING STATE -->
      <div v-if="isLoading" class="space-y-6 animate-pulse">
        <div class="bg-slate-200/60 h-48 rounded-3xl"></div>
        <div class="px-6 flex gap-6 items-end -mt-10">
          <div class="w-32 h-32 rounded-full bg-slate-300"></div>
          <div class="flex-1 space-y-3">
            <div class="h-4 bg-slate-300 rounded w-1/4"></div>
            <div class="h-8 bg-slate-300 rounded w-1/2"></div>
          </div>
        </div>
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 mt-8">
          <div class="lg:col-span-8 space-y-6">
            <div class="grid grid-cols-2 gap-4">
              <div class="bg-slate-200/60 h-24 rounded-2xl"></div>
              <div class="bg-slate-200/60 h-24 rounded-2xl"></div>
            </div>
            <div class="bg-slate-200/60 h-48 rounded-2xl"></div>
          </div>
          <div class="lg:col-span-4 bg-slate-200/60 h-64 rounded-2xl"></div>
        </div>
      </div>

      <!-- ERROR STATE -->
      <div v-else-if="errorMsg" class="card-base p-8 text-center max-w-md mx-auto space-y-4 my-12">
        <div class="w-16 h-16 bg-red-50 text-red-500 rounded-full flex items-center justify-center mx-auto">
          <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"/><line x1="12" y1="8" x2="12" y2="12"/><line x1="12" y1="16" x2="12.01" y2="16"/></svg>
        </div>
        <h3 class="text-lg font-bold text-slate-900">Gagal Memuat Profil</h3>
        <p class="text-sm text-slate-500">{{ errorMsg }}</p>
        <button @click="fetchProfile" class="px-6 py-2.5 bg-[#334EAC] text-white rounded-xl font-bold text-xs hover:bg-[#081F5C] transition-all shadow-sm">
          Coba Lagi
        </button>
      </div>

      <!-- MAIN CONTENT -->
      <div v-else class="space-y-8">
        <!-- 1. HERO PROFILE SECTION -->
        <div class="profile-hero bg-white rounded-3xl overflow-hidden shadow-sm border border-slate-100">
          <!-- Cover Photo -->
          <div class="h-32 md:h-48 bg-gradient-to-r from-[#081F5C] via-[#334EAC] to-[#7096D1] relative">
            <div class="absolute inset-0 bg-[url('data:image/svg+xml;base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHdpZHRoPSI0MCIgaGVpZ2h0PSI0MCI+PGNpcmNsZSBjeD0iMjAiIGN5PSIyMCIgcj0iMSIgZmlsbD0icmdiYSgyNTUsIDI1NSwgMjU1LCAwLjEpIi8+PC9zdmc+')] opacity-30"></div>
          </div>
          
          <div class="px-6 md:px-10 pb-8 relative">
            <div class="flex flex-col md:flex-row gap-6 md:gap-8 items-start">
              
              <!-- Avatar -->
              <div class="-mt-16 md:-mt-20 shrink-0 relative group">
                <div class="profile-avatar-container w-32 h-32 rounded-full overflow-hidden border-4 border-white bg-slate-100 flex items-center justify-center shadow-md select-none">
                  <img v-if="profile?.avatar_url" :src="profile.avatar_url" alt="Profile" class="w-full h-full object-cover">
                  <span v-else class="text-slate-900 font-bold text-4xl tracking-tight">{{ initials }}</span>
                </div>
                <button @click="triggerAvatarUpload" class="absolute bottom-2 right-2 w-10 h-10 bg-white rounded-full shadow-lg border border-slate-100 flex items-center justify-center text-slate-400 hover:text-[#334EAC] transition-colors z-20 hover:scale-105 active:scale-95">
                  <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M14.5 4h-5L7 7H4a2 2 0 0 0-2 2v9a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V9a2 2 0 0 0-2-2h-3l-2.5-3z"/><circle cx="12" cy="13" r="3"/></svg>
                </button>
              </div>

              <!-- Profile Info -->
              <div class="flex-1 pt-2 md:pt-4">
                <div class="flex flex-col md:flex-row md:items-start justify-between gap-4">
                  <div>
                    <h1 class="profile-name text-2xl font-bold flex items-center gap-2">
                      {{ name }}
                      <span v-if="profile?.is_verified" class="w-5 h-5 bg-emerald-500 rounded-full flex items-center justify-center shadow-sm" title="Verified Mentor">
                        <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="white" stroke-width="4" stroke-linecap="round" stroke-linejoin="round"><polyline points="20 6 9 17 4 12"/></svg>
                      </span>
                    </h1>
                    
                    <div class="flex flex-wrap items-center gap-3 mt-3">
                      <span class="px-3 py-1.5 bg-[#EDF1F6] text-[#081F5C] rounded-xl text-[12px] font-bold uppercase tracking-widest flex items-center gap-1.5">
                        <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M12 2v20M17 5H9.5a3.5 3.5 0 0 0 0 7h5a3.5 3.5 0 0 1 0 7H6"/></svg>
                        Tutor
                      </span>
                      <span class="px-3 py-1.5 bg-[#F7F2EB] text-amber-700 rounded-xl text-[12px] font-bold flex items-center gap-1.5 border border-amber-100">
                        <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><rect width="18" height="18" x="3" y="4" rx="2" ry="2"/><line x1="16" x2="16" y1="2" y2="6"/><line x1="8" x2="8" y1="2" y2="6"/><line x1="3" x2="21" y1="10" y2="10"/></svg>
                        Bergabung {{ formatDate(profile?.created_at) }}
                      </span>
                    </div>
                  </div>

                  <div class="flex gap-2">
                    <RouterLink to="/tutor/settings" class="px-5 py-2.5 bg-white border border-slate-200 hover:border-[#7096D1] text-[#334EAC] rounded-2xl font-bold text-[13px] transition-all shadow-sm active:scale-95 flex items-center gap-2">
                      <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M12.22 2h-.44a2 2 0 0 0-2 2v.18a2 2 0 0 1-1 1.73l-.43.25a2 2 0 0 1-2 0l-.15-.08a2 2 0 0 0-2.73.73l-.22.38a2 2 0 0 0 .73 2.73l.15.1a2 2 0 0 1 1 1.72v.51a2 2 0 0 1-1 1.74l-.15.09a2 2 0 0 0-.73 2.73l.22.38a2 2 0 0 0 2.73.73l.15-.08a2 2 0 0 1 2 0l.43.25a2 2 0 0 1 1 1.73V20a2 2 0 0 0 2 2h.44a2 2 0 0 0 2-2v-.18a2 2 0 0 1 1-1.73l.43-.25a2 2 0 0 1 2 0l.15.08a2 2 0 0 0 2.73-.73l.22-.39a2 2 0 0 0-.73-2.73l-.15-.08a2 2 0 0 1-1-1.74v-.5a2 2 0 0 1 1-1.74l.15-.09a2 2 0 0 0 .73-2.73l-.22-.38a2 2 0 0 0-2.73-.73l-.15.08a2 2 0 0 1-2 0l-.43-.25a2 2 0 0 1-1-1.73V4a2 2 0 0 0-2-2z"/><circle cx="12" cy="12" r="3"/></svg>
                      Edit Profil
                    </RouterLink>
                    <RouterLink to="/tutor/analytics" class="px-5 py-2.5 bg-[#334EAC] hover:bg-[#081F5C] text-white rounded-2xl font-bold text-[13px] transition-all shadow-sm active:scale-95 flex items-center gap-2">
                      <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M3 3v18h18"/><path d="m18.7 8-5.1 5.2-2.8-2.7L7 14.3"/></svg>
                      Statistik & Analytics
                    </RouterLink>
                  </div>
                </div>
              </div>

            </div>
          </div>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-12 gap-8">
          
          <!-- LEFT/CENTER CONTENT -->
          <div class="lg:col-span-8 space-y-8">
            
            <!-- 2. ANALYTICS GRID -->
            <div class="grid grid-cols-2 gap-4">
              <div class="stat-box p-4 bg-white border border-slate-100 rounded-2xl shadow-sm">
                <p class="text-[11px] font-bold text-slate-400 uppercase tracking-widest mb-1">Pertanyaan Forum</p>
                <h3 class="text-2xl font-bold text-[#334EAC] tracking-tight">
                  {{ profile?.total_posts !== undefined ? profile.total_posts : 0 }}
                </h3>
              </div>
              <div class="stat-box p-4 bg-white border border-slate-100 rounded-2xl shadow-sm">
                <p class="text-[11px] font-bold text-slate-400 uppercase tracking-widest mb-1">Jawaban Forum</p>
                <h3 class="text-2xl font-bold text-[#334EAC] tracking-tight">
                  {{ profile?.total_answers !== undefined ? profile.total_answers : 0 }}
                </h3>
              </div>
            </div>

            <!-- 3. BADGES/ACHIEVEMENTS SECTION -->
            <div class="section-card bg-white p-6 rounded-3xl border border-slate-100 shadow-sm">
              <h3 class="text-[16px] font-bold text-slate-900 tracking-tight mb-5 flex items-center gap-3">
                 <span class="w-8 h-8 rounded-lg bg-[#F7F2EB] flex items-center justify-center text-amber-500">
                   <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M3.85 8.62a4 4 0 0 1 4.78-4.77 4 4 0 0 1 6.74 0 4 4 0 0 1 4.78 4.78 4 4 0 0 1 0 6.74 4 4 0 0 1-4.77 4.78 4 4 0 0 1-6.75 0 4 4 0 0 1-4.78-4.77 4 4 0 1 0-6.76Z"/><path d="M9.09 9a3 3 0 0 1 5.83 1c0 2-3 3-3 3"/></svg>
                 </span>
                 Pencapaian & Badge
              </h3>
              
              <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
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
          <div class="lg:col-span-4 space-y-8">
            <!-- Profile Completion -->
            <div class="section-card bg-white p-6 rounded-3xl border border-slate-100 shadow-sm text-center flex flex-col items-center">
               <h3 class="text-[15px] font-bold text-slate-900 tracking-tight mb-4">Kelengkapan Profil</h3>
               
               <div class="mb-5 w-full">
                 <div class="flex items-center justify-between mb-2">
                   <span class="text-[12px] font-bold text-[#334EAC] tracking-tight">100% Selesai</span>
                 </div>
                 <div class="h-2.5 w-full bg-[#EDF1F6] rounded-full overflow-hidden shadow-inner">
                   <div class="h-full bg-gradient-to-r from-[#334EAC] to-[#7096D1] rounded-full w-full"></div>
                 </div>
               </div>

               <p class="text-[12px] font-medium text-slate-500 mb-5">Data profil Anda telah disinkronisasikan dengan database pusat.</p>
            </div>
          </div>
        </div>
      </div>

      <!-- Success Toast -->
      <div v-if="showSuccess" class="fixed bottom-6 right-6 z-50 bg-[#334EAC] text-white px-6 py-4 rounded-2xl shadow-[0_10px_40px_rgba(51,78,172,0.3)] flex items-center gap-3 animate-in slide-in-from-bottom-5">
        <div class="w-8 h-8 bg-white/20 rounded-full flex items-center justify-center shrink-0">
          <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"><polyline points="20 6 9 17 4 12"/></svg>
        </div>
        <div>
          <h4 class="font-bold text-sm">Berhasil!</h4>
          <p class="text-xs text-[#D0E3FF] font-medium">{{ successMessage }}</p>
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

const showSuccess = ref(false)
const successMessage = ref('')

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

const triggerAvatarUpload = () => {
  successMessage.value = 'Fitur upload avatar akan segera hadir.'
  showSuccess.value = true
  setTimeout(() => { showSuccess.value = false }, 3000)
}

onMounted(() => {
  fetchProfile()
})
</script>
