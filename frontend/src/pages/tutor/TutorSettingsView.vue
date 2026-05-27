<template>
  <div class="relative min-h-screen pb-12 bg-[#F7F2EB] text-slate-900 selection:bg-[#BAD6EB]/40">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 py-8 space-y-6">
      
      <!-- Back Navigation -->
      <div class="mb-6 flex items-center gap-2">
        <RouterLink
          to="/tutor/dashboard"
          class="text-sm font-bold text-slate-400 hover:text-[#334EAC] transition-colors flex items-center gap-1 w-fit bg-white/50 px-3 py-1.5 rounded-lg border border-slate-200/50"
        >
          <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="m15 18-6-6 6-6"></path></svg>
          Kembali ke Dashboard
        </RouterLink>
      </div>

      <!-- Page Header -->
      <div class="mb-6">
        <h1 class="text-3xl md:text-4xl font-extrabold text-slate-900 tracking-tight leading-tight">Pengaturan Pendidik</h1>
        <p class="text-[15px] text-slate-600 font-medium mt-2 max-w-xl leading-relaxed">Atur akun akademik Anda, ketersediaan mentoring, preferensi harga per jam, serta integrasi asisten AI.</p>
      </div>

      <!-- Settings Layout -->
      <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
        
        <!-- Tabs Sidebar (Flat standard academic layout) -->
        <div class="md:col-span-1 space-y-2">
          <button 
            v-for="tab in tabs" 
            :key="tab.id" 
            @click="activeTab = tab.id"
            class="w-full flex items-center gap-3 px-4 py-3 rounded-xl border transition-colors text-left font-bold text-xs md:text-sm"
            :class="activeTab === tab.id ? 'bg-[#EEF3FF] border-l-4 border-l-[#2F4DA0] border-slate-200 text-slate-900 shadow-sm' : 'bg-white/70 border-slate-200 text-slate-500 hover:bg-slate-50 hover:text-slate-900 shadow-sm'"
          >
            <span class="shrink-0" v-html="tab.icon"></span>
            {{ tab.name }}
          </button>
        </div>

        <!-- Settings Content Panel -->
        <div class="md:col-span-2 bg-white rounded-2xl p-6 shadow-sm border border-slate-200 flex flex-col gap-6">
          
          <!-- TAB 1: Profile -->
          <div v-if="activeTab === 'profile'" class="space-y-6">
            <h3 class="text-sm font-bold text-[#081F5C] uppercase tracking-wider">Informasi Akademis</h3>
            
            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
              <div>
                <label class="block text-xs font-bold text-slate-500 uppercase tracking-widest mb-2">Nama Lengkap</label>
                <input type="text" v-model="profile.name" class="w-full bg-slate-50 border border-slate-200 rounded-xl px-4 py-2.5 text-sm font-bold text-[#081F5C] focus:outline-none focus:ring-2 focus:ring-[#7096D1]/20">
              </div>
              <div>
                <label class="block text-xs font-bold text-slate-500 uppercase tracking-widest mb-2">Gelar & Spesialisasi</label>
                <input type="text" v-model="profile.title" class="w-full bg-slate-50 border border-slate-200 rounded-xl px-4 py-2.5 text-sm font-bold text-[#081F5C] focus:outline-none focus:ring-2 focus:ring-[#7096D1]/20">
              </div>
              <div class="sm:col-span-2">
                <label class="block text-xs font-bold text-slate-500 uppercase tracking-widest mb-2">Universitas / Institusi</label>
                <input type="text" v-model="profile.institution" class="w-full bg-slate-50 border border-slate-200 rounded-xl px-4 py-2.5 text-sm font-bold text-[#081F5C] focus:outline-none focus:ring-2 focus:ring-[#7096D1]/20">
              </div>
              <div class="sm:col-span-2">
                <label class="block text-xs font-bold text-slate-500 uppercase tracking-widest mb-2">Bio Singkat</label>
                <textarea rows="3" v-model="profile.bio" class="w-full bg-slate-50 border border-slate-200 rounded-xl px-4 py-2.5 text-xs md:text-sm font-medium text-slate-700 focus:outline-none focus:ring-2 focus:ring-[#7096D1]/20 resize-none"></textarea>
              </div>
            </div>
          </div>

          <!-- TAB 2: Mentoring -->
          <div v-if="activeTab === 'mentoring'" class="space-y-6">
            <h3 class="text-sm font-bold text-[#081F5C] uppercase tracking-wider">Ketersediaan & Biaya Sesi</h3>
            
            <div class="space-y-4">
              <!-- Active Availability Toggle -->
              <div class="flex items-center justify-between p-4 bg-slate-50 rounded-xl border border-slate-200">
                <div>
                  <h4 class="text-sm font-bold text-slate-900 mb-0.5">Status Mentoring</h4>
                  <p class="text-xs text-slate-500 font-medium">Buka pemesanan jadwal bimbingan untuk mahasiswa.</p>
                </div>
                <div 
                  @click="profile.available = !profile.available"
                  class="w-10 h-6 rounded-full p-1 cursor-pointer transition-colors shadow-inner flex items-center"
                  :class="profile.available ? 'bg-emerald-500' : 'bg-slate-200'"
                >
                  <div class="w-4 h-4 bg-white rounded-full shadow-sm transition-transform" :class="{'translate-x-4': profile.available}"></div>
                </div>
              </div>

              <!-- Pricing Config -->
              <div>
                <label class="block text-xs font-bold text-slate-500 uppercase tracking-widest mb-2">Biaya Sesi per Jam (Rp)</label>
                <div class="relative max-w-[200px]">
                  <span class="absolute inset-y-0 left-0 pl-4 flex items-center text-sm font-bold text-slate-500">Rp</span>
                  <input type="text" v-model="profile.price" class="w-full bg-slate-50 border border-slate-200 rounded-xl pl-10 pr-4 py-2.5 text-sm font-bold text-[#081F5C] focus:outline-none focus:ring-2 focus:ring-[#7096D1]/20">
                </div>
              </div>
            </div>
          </div>

          <!-- TAB 3: AI & Notifications -->
          <div v-if="activeTab === 'notifications'" class="space-y-6">
            <h3 class="text-sm font-bold text-[#081F5C] uppercase tracking-wider">Notifikasi & Asisten AI</h3>
            
            <div class="space-y-4 text-xs md:text-sm text-slate-700">
              <div class="flex items-start gap-3">
                <input type="checkbox" id="notif_new_request" v-model="settings.notifNewRequest" class="rounded text-[#334EAC] focus:ring-[#7096D1]/20 border-slate-300 w-4 h-4 mt-0.5 cursor-pointer">
                <label for="notif_new_request" class="font-medium cursor-pointer">
                  <span class="font-bold text-slate-900 block">Permohonan Mentoring Baru</span>
                  Kirim pemberitahuan ketika mahasiswa mengajukan bimbingan baru.
                </label>
              </div>

              <hr class="border-slate-100" />

              <div class="flex items-start gap-3">
                <input type="checkbox" id="notif_verify_pending" v-model="settings.notifVerifyPending" class="rounded text-[#334EAC] focus:ring-[#7096D1]/20 border-slate-300 w-4 h-4 mt-0.5 cursor-pointer">
                <label for="notif_verify_pending" class="font-medium cursor-pointer">
                  <span class="font-bold text-slate-900 block">Antrean Verifikasi Jawaban</span>
                  Dapatkan pengingat untuk postingan forum yang perlu diverifikasi ahli.
                </label>
              </div>

              <hr class="border-slate-100" />

              <div class="flex items-start gap-3">
                <input type="checkbox" id="ai_autofix" v-model="settings.aiAutofix" class="rounded text-[#334EAC] focus:ring-[#7096D1]/20 border-slate-300 w-4 h-4 mt-0.5 cursor-pointer">
                <label for="ai_autofix" class="font-medium cursor-pointer">
                  <span class="font-bold text-slate-900 block">Asisten AI Auto-Fix</span>
                  Tampilkan rekomendasi pemformatan otomatis dan koreksi typo pada AI Validation Workspace.
                </label>
              </div>
            </div>
          </div>

          <!-- Bottom Save Actions -->
          <div class="pt-4 border-t border-slate-200 flex items-center justify-end gap-3 mt-auto">
            <button @click="showSuccessToast" class="px-5 py-2.5 bg-[#334EAC] hover:bg-[#081F5C] text-white rounded-xl font-bold text-xs md:text-sm transition-all shadow-sm active:scale-[0.98]">
              Simpan Perubahan
            </button>
          </div>

        </div>
      </div>

      <!-- Success Toast -->
      <div v-if="showSuccess" class="fixed bottom-6 right-6 z-50 bg-emerald-500 text-white px-6 py-4 rounded-2xl shadow-[0_10px_40px_rgba(16,185,129,0.3)] flex items-center gap-3 animate-in slide-in-from-bottom-5">
        <div class="w-8 h-8 bg-white/20 rounded-full flex items-center justify-center shrink-0">
          <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"><polyline points="20 6 9 17 4 12"/></svg>
        </div>
        <div>
          <h4 class="font-bold text-sm">Berhasil Disimpan!</h4>
          <p class="text-xs text-emerald-100 font-medium">Pengaturan akademis Anda telah diperbarui.</p>
        </div>
      </div>

    </div>
  </div>
</template>

<script setup>
import { ref } from 'vue'

const activeTab = ref('profile')
const showSuccess = ref(false)

const tabs = [
  { id: 'profile', name: 'Profil Akademik', icon: '<svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5"><path stroke-linecap="round" stroke-linejoin="round" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" /></svg>' },
  { id: 'mentoring', name: 'Mentoring & Tarif', icon: '<svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5"><rect width="18" height="18" x="3" y="4" rx="2" ry="2"/><line x1="16" x2="16" y1="2" y2="6"/><line x1="8" x2="8" y1="2" y2="6"/><line x1="3" x2="21" y1="10" y2="10"/></svg>' },
  { id: 'notifications', name: 'Notifikasi & AI', icon: '<svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5"><path stroke-linecap="round" stroke-linejoin="round" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9" /></svg>' }
]

const profile = ref({
  name: 'Dr. Sarah R.',
  title: 'Ph.D. di Matematika • MIT',
  institution: 'Institut Teknologi Bandung / MIT Global Scholar',
  bio: 'Peneliti senior bidang AI Matematika & Algoritma Lanjut. Berdedikasi melatih penalaran analitik mahasiswa.',
  available: true,
  price: '150.000'
})

const settings = ref({
  notifNewRequest: true,
  notifVerifyPending: true,
  aiAutofix: true
})

const showSuccessToast = () => {
  showSuccess.value = true
  setTimeout(() => {
    showSuccess.value = false
  }, 3000)
}
</script>
