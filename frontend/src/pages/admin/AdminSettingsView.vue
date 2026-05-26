<template>
  <div class="relative min-h-screen pb-12 bg-[#F7F2EB]">
    <div class="max-w-[1450px] mx-auto px-4 sm:px-6 xl:px-8 py-6 space-y-5 animate-in fade-in duration-500">
      
      <!-- Compact Editorial Header -->
      <div class="bg-white rounded-2xl border border-slate-200 shadow-sm p-5 flex flex-col sm:flex-row sm:items-center justify-between gap-5 mb-6 relative overflow-hidden">
        <div class="flex items-center gap-4">
          <span class="w-12 h-12 rounded-xl bg-[#334EAC]/10 text-[#334EAC] flex items-center justify-center shrink-0">
            <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path d="M12.22 2h-.44a2 2 0 0 0-2 2v.18a2 2 0 0 1-1 1.73l-.43.25a2 2 0 0 1-2 0l-.15-.08a2 2 0 0 0-2.73.73l-.22.38a2 2 0 0 0 .73 2.73l.15.1a2 2 0 0 1 1 1.72v.51a2 2 0 0 1-1 1.74l-.15.09a2 2 0 0 0-.73 2.73l.22.38a2 2 0 0 0 2.73.73l.15-.08a2 2 0 0 1 2 0l.43.25a2 2 0 0 1 1 1.73V20a2 2 0 0 0 2 2h.44a2 2 0 0 0 2-2v-.18a2 2 0 0 1 1-1.73l.43-.25a2 2 0 0 1 2 0l.15.08a2 2 0 0 0 2.73-.73l.22-.39a2 2 0 0 0-.73-2.73l-.15-.08a2 2 0 0 1-1-1.74v-.5a2 2 0 0 1 1-1.74l.15-.09a2 2 0 0 0 .73-2.73l-.22-.38a2 2 0 0 0-2.73-.73l-.15.08a2 2 0 0 1-2 0l-.43-.25a2 2 0 0 1-1-1.73V4a2 2 0 0 0-2-2z"/><circle cx="12" cy="12" r="3"/></svg>
          </span>
          <div>
            <h1 class="text-[30px] font-semibold text-slate-900 tracking-tight leading-tight mb-1">Pengaturan Sistem</h1>
            <p class="text-base text-slate-500 leading-relaxed max-w-xl">Kelola kebijakan operasional, parameter server AI, dan jadwal pencadangan basis data.</p>
          </div>
        </div>
      </div>

      <!-- Settings Layout -->
      <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
        
        <!-- Left Pane: Menu List -->
        <div class="bg-white rounded-xl border border-slate-200 p-4 shadow-sm h-fit space-y-1">
          <button 
            @click="activeTab = 'general'"
            :class="activeTab === 'general' ? 'bg-slate-50 text-[#334EAC] font-semibold' : 'text-slate-600 hover:bg-slate-50 font-medium'"
            class="w-full text-left px-3 py-2 text-sm rounded-lg flex items-center gap-2 transition-all">
            Umum & Pemeliharaan
          </button>
          <button 
            @click="activeTab = 'security'"
            :class="activeTab === 'security' ? 'bg-slate-50 text-[#334EAC] font-semibold' : 'text-slate-600 hover:bg-slate-50 font-medium'"
            class="w-full text-left px-3 py-2 text-sm rounded-lg flex items-center gap-2 transition-all">
            Keamanan & Enkripsi
          </button>
          <button 
            @click="activeTab = 'ai'"
            :class="activeTab === 'ai' ? 'bg-slate-50 text-[#334EAC] font-semibold' : 'text-slate-600 hover:bg-slate-50 font-medium'"
            class="w-full text-left px-3 py-2 text-sm rounded-lg flex items-center gap-2 transition-all">
            AI Node Endpoint
          </button>
        </div>

        <!-- Right Pane: Active Form -->
        <div class="lg:col-span-2 bg-white rounded-xl border border-slate-200 p-5 shadow-sm space-y-6">
          
          <!-- GENERAL TAB -->
          <div v-if="activeTab === 'general'" class="space-y-6">
            <div>
              <h3 class="text-sm font-semibold text-slate-900 mb-4 border-b border-slate-100 pb-2">Status & Pemeliharaan Portal</h3>
              <div class="flex items-center justify-between p-3 rounded-xl border border-slate-100 bg-slate-50/50">
                <div>
                  <p class="text-sm font-semibold text-slate-800">Mode Pemeliharaan (Maintenance Mode)</p>
                  <p class="text-xs text-slate-400 mt-0.5">Tutup akses eksternal platform untuk pemeliharaan terjadwal.</p>
                </div>
                <button @click="toggleMaintenance" class="px-3 py-1 bg-slate-100 border border-slate-200 hover:bg-slate-200 text-slate-700 text-xs font-semibold rounded-lg transition-all">
                  {{ isMaintenance ? 'Nonaktifkan' : 'Aktifkan' }}
                </button>
              </div>
            </div>

            <div>
              <h3 class="text-sm font-semibold text-slate-900 mb-4 border-b border-slate-100 pb-2">Jadwal Backup Database</h3>
              <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                <div>
                  <label class="block text-xs font-bold text-slate-400 uppercase tracking-widest mb-1.5">Frekuensi Pencadangan</label>
                  <select class="w-full px-3.5 py-2 border border-slate-200 rounded-xl text-sm text-slate-700 bg-white cursor-pointer focus:outline-none focus:border-[#7096D1]">
                    <option>Setiap Hari (02:00 WIB)</option>
                    <option>Setiap Minggu (Hari Minggu)</option>
                  </select>
                </div>
                <div>
                  <label class="block text-xs font-bold text-slate-400 uppercase tracking-widest mb-1.5">Penyimpanan Cloud</label>
                  <select class="w-full px-3.5 py-2 border border-slate-200 rounded-xl text-sm text-slate-700 bg-white cursor-pointer focus:outline-none focus:border-[#7096D1]">
                    <option>Google Cloud Storage (GCS)</option>
                    <option>AWS S3 Bucket</option>
                  </select>
                </div>
              </div>
            </div>
          </div>

          <!-- SECURITY TAB -->
          <div v-if="activeTab === 'security'" class="space-y-6">
            <div>
              <h3 class="text-sm font-semibold text-slate-900 mb-4 border-b border-slate-100 pb-2">Manajemen Keamanan Portal</h3>
              <div class="space-y-4">
                <div class="flex items-center justify-between p-3 rounded-xl border border-slate-100 bg-slate-50/50">
                  <div>
                    <p class="text-sm font-semibold text-slate-800">Multi-Factor Authentication (MFA)</p>
                    <p class="text-xs text-slate-400 mt-0.5">Wajibkan verifikasi OTP Google Authenticator saat admin masuk.</p>
                  </div>
                  <button @click="mfaActive = !mfaActive" :class="mfaActive ? 'bg-emerald-500 text-white' : 'bg-slate-100 text-slate-700'" class="px-3 py-1 text-xs font-semibold rounded-lg transition-all">
                    {{ mfaActive ? 'Aktif' : 'Nonaktif' }}
                  </button>
                </div>
                <div class="flex items-center justify-between p-3 rounded-xl border border-slate-100 bg-slate-50/50">
                  <div>
                    <p class="text-sm font-semibold text-slate-800">Reset Semua Sesi Aktif</p>
                    <p class="text-xs text-slate-400 mt-0.5">Keluarkan paksa seluruh pengguna yang terhubung.</p>
                  </div>
                  <button @click="resetSessions" class="px-3 py-1 bg-rose-50 border border-rose-100 text-rose-600 hover:bg-rose-100 text-xs font-semibold rounded-lg transition-all">
                    Reset Sekarang
                  </button>
                </div>
              </div>
            </div>
          </div>

          <!-- AI TAB -->
          <div v-if="activeTab === 'ai'" class="space-y-6">
            <div>
              <h3 class="text-sm font-semibold text-slate-900 mb-4 border-b border-slate-100 pb-2">AI Moderation Settings</h3>
              <div class="space-y-4">
                <div>
                  <label class="block text-xs font-bold text-slate-400 uppercase tracking-widest mb-1.5">Tingkat Sensitivitas AI (0-100)</label>
                  <input type="range" min="1" max="100" v-model="aiSensitivity" class="w-full accent-[#334EAC] h-1.5 bg-slate-100 rounded-lg cursor-pointer">
                  <div class="flex justify-between text-xs font-semibold text-slate-500 mt-1">
                    <span>Minimum (Abaikan)</span>
                    <span class="text-[#334EAC] font-bold">Aktif: {{ aiSensitivity }}%</span>
                    <span>Maksimum (Sangat Sensitif)</span>
                  </div>
                </div>
                <div class="flex items-center justify-between p-3 rounded-xl border border-slate-100 bg-slate-50/50">
                  <div>
                    <p class="text-sm font-semibold text-slate-800">Verifikasi Plagiarisme Otomatis</p>
                    <p class="text-xs text-slate-400 mt-0.5">Jalankan validator dokumen akademik segera saat diunggah tutor.</p>
                  </div>
                  <button @click="aiAutoVerify = !aiAutoVerify" :class="aiAutoVerify ? 'bg-emerald-500 text-white' : 'bg-slate-100 text-slate-700'" class="px-3 py-1 text-xs font-semibold rounded-lg transition-all">
                    {{ aiAutoVerify ? 'Aktif' : 'Nonaktif' }}
                  </button>
                </div>
              </div>
            </div>
          </div>

          <!-- Action Footer -->
          <div class="pt-4 border-t border-slate-100 flex justify-end gap-2">
            <button class="px-4 py-2 bg-slate-50 border border-slate-200 text-slate-600 rounded-xl text-sm font-semibold hover:bg-slate-100 active:scale-95 transition-all">
              Batal
            </button>
            <button @click="saveConfig" class="px-4 py-2 bg-[#334EAC] hover:bg-[#081F5C] text-white rounded-xl text-sm font-semibold shadow-sm active:scale-95 transition-all">
              Simpan Konfigurasi
            </button>
          </div>

        </div>

      </div>

    </div>
  </div>
</template>

<script setup>
import { ref } from 'vue'

const activeTab = ref('general')
const isMaintenance = ref(false)
const mfaActive = ref(false)
const aiSensitivity = ref(75)
const aiAutoVerify = ref(true)

const toggleMaintenance = () => {
  isMaintenance.value = !isMaintenance.value
}

const resetSessions = () => {
  alert('Seluruh sesi aktif pengguna berhasil di-reset.')
}

const saveConfig = () => {
  alert('Konfigurasi sistem berhasil disimpan.')
}
</script>
