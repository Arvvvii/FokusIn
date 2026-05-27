<template>
  <div class="relative min-h-screen bg-[#F7F2EB]">
    <div class="max-w-[1000px] mx-auto px-6 py-6 space-y-6 animate-in fade-in duration-500">
      
      <!-- 1. Breadcrumb & Header -->
      <div class="space-y-2">
        <div class="flex items-center gap-2 text-xs font-bold text-slate-400 uppercase tracking-widest">
          <RouterLink to="/pelajar/mentoring" class="hover:text-[#334EAC] transition-colors">Mentoring</RouterLink>
          <span class="text-slate-300">/</span>
          <span class="text-[#334EAC]">Cari Mentor Khusus</span>
        </div>
        
        <div class="bg-[#F7F2EB] rounded-2xl border border-slate-200 shadow-sm p-5 flex flex-col sm:flex-row sm:items-center justify-between gap-5 mb-6 relative overflow-hidden">
          <div class="flex items-center gap-4">
            <span class="w-12 h-12 rounded-xl bg-[#334EAC]/10 text-[#334EAC] flex items-center justify-center shrink-0">
              <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M16 21v-2a4 4 0 0 0-4-4H6a4 4 0 0 0-4 4v2"/><circle cx="9" cy="7" r="4"/><line x1="19" x2="19" y1="8" y2="14"/><line x1="22" x2="16" y1="11" y2="11"/></svg>
            </span>
            <div>
              <h1 class="text-3xl md:text-4xl font-extrabold text-slate-900 tracking-tight leading-tight">Ajukan Sesi Mentoring Khusus</h1>
              <p class="text-[15px] text-slate-600 font-medium mt-2 max-w-xl leading-relaxed">
                Gagal menemukan topik spesifik atau jadwal yang cocok? Ajukan kebutuhan belajarmu secara mendetail, dan sistem kami akan mencocokkanmu dengan mentor terbaik.
              </p>
            </div>
          </div>
        </div>
      </div>

      <!-- 2. Main Form Card -->
      <div class="bg-white rounded-xl p-6 shadow-sm border border-slate-200 space-y-6">
        <h2 class="text-lg font-semibold text-slate-900 border-b border-slate-100 pb-3 flex items-center gap-2">
          <span class="w-2.5 h-2.5 rounded-full bg-[#334EAC]"></span>
          Formulir Permintaan Sesi Khusus
        </h2>

        <form @submit.prevent="submitRequest" class="space-y-5">
          <!-- Row 1: Subject & Topic -->
          <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
            <div class="space-y-1.5">
              <label class="text-xs font-bold text-slate-500 uppercase tracking-wider block ml-1">Kategori Keilmuan</label>
              <div class="relative">
                <select v-model="form.category" required class="w-full px-4 py-2.5 bg-slate-50 border border-slate-200 rounded-xl text-sm font-medium text-slate-700 appearance-none focus:bg-white focus:border-[#334EAC] focus:ring-2 focus:ring-[#334EAC]/10 transition-all outline-none cursor-pointer">
                  <option value="" disabled>Pilih Kategori</option>
                  <option value="Computer Science">Ilmu Komputer & Sistem Informasi</option>
                  <option value="Mathematics">Matematika & Statistika</option>
                  <option value="Physics">Fisika & Rekayasa</option>
                  <option value="Chemistry">Kimia & Biologi</option>
                  <option value="Business">Ekonomi & Bisnis</option>
                </select>
                <div class="absolute inset-y-0 right-0 pr-3 flex items-center pointer-events-none text-slate-400">
                  <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"><path d="m6 9 6 6 6-6"/></svg>
                </div>
              </div>
            </div>

            <div class="space-y-1.5">
              <label class="text-xs font-bold text-slate-500 uppercase tracking-wider block ml-1">Topik Spesifik / Mata Kuliah</label>
              <input type="text" v-model="form.subject" required placeholder="contoh: Pemrograman Dinamis, Kalkulus Peubah Banyak" class="w-full px-4 py-2.5 bg-slate-50 border border-slate-200 rounded-xl text-sm font-medium text-slate-700 placeholder-slate-400 focus:bg-white focus:border-[#334EAC] focus:ring-2 focus:ring-[#334EAC]/10 transition-all outline-none">
            </div>
          </div>

          <!-- Description / Learning Goals -->
          <div class="space-y-1.5">
            <label class="text-xs font-bold text-slate-500 uppercase tracking-wider block ml-1">Rincian Materi & Target Belajar</label>
            <textarea rows="4" v-model="form.description" required placeholder="Jelaskan secara detail materi spesifik yang ingin dibahas, tugas/projek yang sedang dihadapi, atau persiapan ujian yang sedang kamu lakukan agar kami dapat mencocokkan mentor yang paling kompeten." class="w-full px-4 py-2.5 bg-slate-50 border border-slate-200 rounded-xl text-sm font-medium text-slate-700 placeholder-slate-400 focus:bg-white focus:border-[#334EAC] focus:ring-2 focus:ring-[#334EAC]/10 transition-all outline-none resize-none"></textarea>
          </div>

          <!-- Row 2: Difficulty & Campus -->
          <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
            <div class="space-y-1.5">
              <label class="text-xs font-bold text-slate-500 uppercase tracking-wider block ml-1">Tingkat Pemahaman</label>
              <div class="grid grid-cols-3 gap-3">
                <button type="button" @click="form.level = 'Dasar'" :class="form.level === 'Dasar' ? 'bg-[#334EAC]/10 border-[#334EAC] text-[#334EAC]' : 'bg-slate-50 border-slate-200 text-slate-600'" class="py-2 px-3 text-xs font-semibold rounded-xl border transition-all text-center">Dasar</button>
                <button type="button" @click="form.level = 'Menengah'" :class="form.level === 'Menengah' ? 'bg-[#334EAC]/10 border-[#334EAC] text-[#334EAC]' : 'bg-slate-50 border-slate-200 text-slate-600'" class="py-2 px-3 text-xs font-semibold rounded-xl border transition-all text-center">Menengah</button>
                <button type="button" @click="form.level = 'Lanjut'" :class="form.level === 'Lanjut' ? 'bg-[#334EAC]/10 border-[#334EAC] text-[#334EAC]' : 'bg-slate-50 border-slate-200 text-slate-600'" class="py-2 px-3 text-xs font-semibold rounded-xl border transition-all text-center">Lanjut</button>
              </div>
            </div>

            <div class="space-y-1.5">
              <label class="text-xs font-bold text-slate-500 uppercase tracking-wider block ml-1">Preferensi Asal Universitas Mentor</label>
              <div class="relative">
                <select v-model="form.university" class="w-full px-4 py-2.5 bg-slate-50 border border-slate-200 rounded-xl text-sm font-medium text-slate-700 appearance-none focus:bg-white focus:border-[#334EAC] focus:ring-2 focus:ring-[#334EAC]/10 transition-all outline-none cursor-pointer">
                  <option value="Bebas">Bebas (Mana Saja Terbaik)</option>
                  <option value="Universitas Indonesia">Universitas Indonesia (UI)</option>
                  <option value="Institut Teknologi Bandung">Institut Teknologi Bandung (ITB)</option>
                  <option value="Universitas Gadjah Mada">Universitas Gadjah Mada (UGM)</option>
                  <option value="Universitas Airlangga">Universitas Airlangga (UNAIR)</option>
                </select>
                <div class="absolute inset-y-0 right-0 pr-3 flex items-center pointer-events-none text-slate-400">
                  <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"><path d="m6 9 6 6 6-6"/></svg>
                </div>
              </div>
            </div>
          </div>

          <!-- Row 3: Date & Duration -->
          <div class="grid grid-cols-1 md:grid-cols-3 gap-5">
            <div class="space-y-1.5">
              <label class="text-xs font-bold text-slate-500 uppercase tracking-wider block ml-1">Tanggal yang Diharapkan</label>
              <input type="date" v-model="form.date" required class="w-full px-4 py-2.5 bg-slate-50 border border-slate-200 rounded-xl text-sm font-medium text-slate-700 focus:bg-white focus:border-[#334EAC] focus:ring-2 focus:ring-[#334EAC]/10 transition-all outline-none text-slate-500">
            </div>

            <div class="space-y-1.5">
              <label class="text-xs font-bold text-slate-500 uppercase tracking-wider block ml-1">Waktu Sesi</label>
              <input type="time" v-model="form.time" required class="w-full px-4 py-2.5 bg-slate-50 border border-slate-200 rounded-xl text-sm font-medium text-slate-700 focus:bg-white focus:border-[#334EAC] focus:ring-2 focus:ring-[#334EAC]/10 transition-all outline-none text-slate-500">
            </div>

            <div class="space-y-1.5">
              <label class="text-xs font-bold text-slate-500 uppercase tracking-wider block ml-1">Durasi Sesi</label>
              <div class="relative">
                <select v-model="form.duration" class="w-full px-4 py-2.5 bg-slate-50 border border-slate-200 rounded-xl text-sm font-medium text-slate-700 appearance-none focus:bg-white focus:border-[#334EAC] focus:ring-2 focus:ring-[#334EAC]/10 transition-all outline-none cursor-pointer">
                  <option value="45 Menit">45 Menit</option>
                  <option value="60 Menit">60 Menit</option>
                  <option value="90 Menit">90 Menit</option>
                  <option value="120 Menit">120 Menit (Intensif)</option>
                </select>
                <div class="absolute inset-y-0 right-0 pr-3 flex items-center pointer-events-none text-slate-400">
                  <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"><path d="m6 9 6 6 6-6"/></svg>
                </div>
              </div>
            </div>
          </div>

          <!-- Bottom Action Buttons -->
          <div class="flex items-center justify-end gap-3 pt-4 border-t border-slate-100 mt-6">
            <RouterLink to="/pelajar/mentoring" class="px-5 py-2.5 bg-white border border-slate-200 hover:bg-slate-50 text-slate-600 rounded-xl font-medium text-sm transition-all text-center">
              Batal
            </RouterLink>
            <button type="submit" :disabled="isSubmitting" class="px-6 py-2.5 bg-[#334EAC] hover:bg-[#081F5C] disabled:bg-slate-300 text-white rounded-xl font-medium text-sm transition-all shadow-sm flex items-center gap-2">
              <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round" v-if="!isSubmitting"><path d="m5 12 5 5L20 7"/></svg>
              <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round" class="animate-spin" v-else><path d="M21 12a9 9 0 1 1-6.219-8.56"/></svg>
              {{ isSubmitting ? 'Mengajukan...' : 'Kirim Permintaan' }}
            </button>
          </div>
        </form>
      </div>
    </div>

    <!-- Success Modal Notification -->
    <div v-if="showSuccessModal" class="fixed inset-0 z-50 flex items-center justify-center p-4 bg-slate-900/60 backdrop-blur-sm animate-in fade-in duration-300">
      <div class="bg-white rounded-2xl max-w-md w-full p-6 shadow-xl border border-slate-100 text-center space-y-4 scale-in duration-300">
        <div class="w-16 h-16 rounded-full bg-emerald-50 text-emerald-500 flex items-center justify-center mx-auto border border-emerald-100 shadow-sm">
          <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"/><polyline points="22 4 12 14.01 9 11.01"/></svg>
        </div>
        <div class="space-y-1">
          <h3 class="text-xl font-bold text-slate-900">Permintaan Dikirim!</h3>
          <p class="text-sm text-slate-500">Permintaan mentoring khusus Anda telah berhasil diajukan ke sistem. Kami sedang mencocokkan kriteria Anda dengan database mentor terbaik kami.</p>
        </div>
        <div class="bg-slate-50 rounded-xl p-3.5 border border-slate-100 text-left text-xs text-slate-600 space-y-1.5">
          <div class="flex justify-between"><span class="font-semibold text-slate-400">Subjek:</span> <span class="font-bold text-slate-800">{{ form.subject }}</span></div>
          <div class="flex justify-between"><span class="font-semibold text-slate-400">Level:</span> <span class="font-bold text-slate-800">{{ form.level }}</span></div>
          <div class="flex justify-between"><span class="font-semibold text-slate-400">Jadwal:</span> <span class="font-bold text-slate-800">{{ form.date }} @ {{ form.time }}</span></div>
        </div>
        <button @click="closeModal" class="w-full py-2.5 bg-[#334EAC] hover:bg-[#081F5C] text-white font-medium text-sm rounded-xl transition-all shadow-sm">
          Kembali ke Mentoring
        </button>
      </div>
    </div>
  </div>
</template>

<script setup>
import { ref, reactive } from 'vue'
import { useRouter, RouterLink } from 'vue-router'

const router = useRouter()
const isSubmitting = ref(false)
const showSuccessModal = ref(false)

const form = reactive({
  category: '',
  subject: '',
  description: '',
  level: 'Menengah',
  university: 'Bebas',
  date: '',
  time: '',
  duration: '60 Menit'
})

const submitRequest = () => {
  isSubmitting.value = true
  setTimeout(() => {
    isSubmitting.value = false
    showSuccessModal.value = true
  }, 1000)
}

const closeModal = () => {
  showSuccessModal.value = false
  router.push('/pelajar/mentoring')
}
</script>

<style scoped>
.scale-in {
  animation: scaleIn 0.3s cubic-bezier(0.16, 1, 0.3, 1);
}
@keyframes scaleIn {
  from { transform: scale(0.95); opacity: 0; }
  to { transform: scale(1); opacity: 1; }
}
</style>
