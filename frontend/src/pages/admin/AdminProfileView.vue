<template>
  <div class="p-6 md:p-8 xl:p-10 max-w-[1600px] mx-auto animate-in fade-in duration-500">
    
    <!-- 1. HERO PROFILE SECTION -->
    <div class="bg-white/60 backdrop-blur-xl rounded-3xl shadow-[0_10px_40px_rgba(15,23,42,0.06)] border border-slate-200/60 relative overflow-hidden mb-8">
      <!-- Cover Photo -->
      <div class="h-32 md:h-48 bg-gradient-to-r from-[#081F5C] to-indigo-600 relative">
      </div>
      
      <div class="px-6 md:px-10 pb-8 relative">
        <div class="flex flex-col md:flex-row gap-6 md:gap-8 items-start">
          
          <!-- Avatar -->
          <div class="-mt-16 md:-mt-20 shrink-0 relative group">
            <div class="w-32 h-32 md:w-40 md:h-40 bg-gradient-to-br from-slate-100 to-white rounded-full border-4 border-white shadow-lg flex items-center justify-center overflow-hidden relative z-10">
              <span class="text-slate-900 font-bold text-4xl tracking-tight">AD</span>
            </div>
            <button @click="triggerAvatarUpload" class="absolute bottom-2 right-2 w-10 h-10 bg-white rounded-full shadow-lg border border-slate-100 flex items-center justify-center text-slate-400 hover:text-indigo-600 transition-colors z-20 hover:scale-105 active:scale-95">
              <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M14.5 4h-5L7 7H4a2 2 0 0 0-2 2v9a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V9a2 2 0 0 0-2-2h-3l-2.5-3z"/><circle cx="12" cy="13" r="3"/></svg>
            </button>
          </div>

          <!-- Profile Info -->
          <div class="flex-1 pt-2 md:pt-4">
            <div class="flex flex-col md:flex-row md:items-start justify-between gap-4">
              <div>
                <h1 class="text-2xl md:text-[28px] font-bold text-slate-900 tracking-tight flex items-center gap-2 mb-1">
                  Administrator Utama
                  <span class="w-5 h-5 bg-indigo-500 rounded-full flex items-center justify-center shadow-sm" title="System Admin">
                    <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="white" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"/></svg>
                  </span>
                </h1>
                <p class="text-base font-medium text-slate-500 mb-3">Chief of University Operations</p>
                
                <div class="flex flex-wrap items-center gap-3">
                  <span class="px-3 py-1.5 bg-slate-100 text-slate-700 rounded-xl text-xs font-bold uppercase tracking-widest flex items-center gap-1.5 border border-slate-200">
                    <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M12 2v20M17 5H9.5a3.5 3.5 0 0 0 0 7h5a3.5 3.5 0 0 1 0 7H6"/></svg>
                    FokusIn HQ
                  </span>
                </div>
              </div>

              <div class="flex gap-2">
                <RouterLink to="/admin/settings" class="px-5 py-2.5 bg-indigo-600 hover:bg-indigo-700 text-white rounded-xl font-bold text-sm transition-all shadow-sm active:scale-95 flex items-center gap-2">
                  <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="3"/><path d="M19.4 15a1.65 1.65 0 0 0 .33 1.82l.06.06a2 2 0 0 1 0 2.83 2 2 0 0 1-2.83 0l-.06-.06a1.65 1.65 0 0 0-1.82-.33 1.65 1.65 0 0 0-1 1.51V21a2 2 0 0 1-2 2 2 2 0 0 1-2-2v-.09A1.65 1.65 0 0 0 9 19.4a1.65 1.65 0 0 0-1.82.33l-.06.06a2 2 0 0 1-2.83 0 2 2 0 0 1 0-2.83l.06-.06a1.65 1.65 0 0 0 .33-1.82 1.65 1.65 0 0 0-1.51-1H3a2 2 0 0 1-2-2 2 2 0 0 1 2-2h.09A1.65 1.65 0 0 0 4.6 9a1.65 1.65 0 0 0-.33-1.82l-.06-.06a2 2 0 0 1 0-2.83 2 2 0 0 1 2.83 0l.06.06a1.65 1.65 0 0 0 1.82.33H9a1.65 1.65 0 0 0 1-1.51V3a2 2 0 0 1 2-2 2 2 0 0 1 2 2v.09a1.65 1.65 0 0 0 1 1.51 1.65 1.65 0 0 0 1.82-.33l.06-.06a2 2 0 0 1 2.83 0 2 2 0 0 1 0 2.83l-.06.06a1.65 1.65 0 0 0-.33 1.82V9a1.65 1.65 0 0 0 1.51 1H21a2 2 0 0 1 2 2 2 2 0 0 1-2 2h-.09a1.65 1.65 0 0 0-1.51 1z"/></svg>
                  Pengaturan Akun
                </RouterLink>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Edit Profile Form -->
    <div class="bg-white rounded-2xl border border-slate-200 shadow-sm p-6 md:p-8 max-w-4xl">
      <h3 class="text-xl font-bold text-slate-900 mb-6 border-b border-slate-100 pb-4">Informasi Personal</h3>
      
      <form @submit.prevent="submitForm" class="space-y-6">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
          <div class="space-y-2">
            <label class="text-sm font-semibold text-slate-900 block">Nama Lengkap</label>
            <input type="text" value="Administrator Utama" class="w-full px-4 py-3 bg-white border border-slate-200 rounded-xl text-sm text-slate-900 focus:outline-none focus:border-indigo-500 focus:ring-4 focus:ring-indigo-500/10 transition-all shadow-sm">
          </div>
          <div class="space-y-2">
            <label class="text-sm font-semibold text-slate-900 block">Email Address</label>
            <input type="email" value="admin@fokusin.edu" disabled class="w-full px-4 py-3 bg-slate-50 border border-slate-200 rounded-xl text-sm text-slate-500 shadow-sm cursor-not-allowed">
            <p class="text-xs text-slate-400">Email administrator tidak dapat diubah secara manual.</p>
          </div>
          <div class="space-y-2 md:col-span-2">
            <label class="text-sm font-semibold text-slate-900 block">Nomor Kontak Operasional</label>
            <input type="text" value="+62 812-3456-7890" class="w-full px-4 py-3 bg-white border border-slate-200 rounded-xl text-sm text-slate-900 focus:outline-none focus:border-indigo-500 focus:ring-4 focus:ring-indigo-500/10 transition-all shadow-sm">
          </div>
        </div>

        <div class="pt-6 border-t border-slate-100 flex items-center justify-end gap-3">
          <button type="submit" class="text-sm font-medium h-10 px-6 rounded-xl bg-indigo-600 text-white shadow-sm hover:bg-indigo-700 transition-colors">
            Simpan Perubahan
          </button>
        </div>
      </form>
    </div>

    <!-- Success Toast -->
    <div v-if="showSuccess" class="fixed bottom-6 right-6 z-50 bg-indigo-600 text-white px-6 py-4 rounded-2xl shadow-lg flex items-center gap-3 animate-in slide-in-from-bottom-5">
      <div class="w-8 h-8 bg-white/20 rounded-full flex items-center justify-center shrink-0">
        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"><polyline points="20 6 9 17 4 12"/></svg>
      </div>
      <div>
        <h4 class="font-bold text-sm">Berhasil!</h4>
        <p class="text-xs text-indigo-100 font-medium">{{ successMessage }}</p>
      </div>
    </div>

  </div>
</template>

<script setup>
import { ref } from 'vue'
import { RouterLink } from 'vue-router'

const showSuccess = ref(false)
const successMessage = ref('')

const triggerAvatarUpload = () => {
  successMessage.value = 'Foto berhasil diperbarui!'
  showSuccess.value = true
  setTimeout(() => { showSuccess.value = false }, 3000)
}

const submitForm = () => {
  successMessage.value = 'Profil admin berhasil disimpan.'
  showSuccess.value = true
  setTimeout(() => { showSuccess.value = false }, 3000)
}
</script>
