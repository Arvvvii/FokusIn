<template>
  <div class="relative min-h-screen pb-12 bg-[#F7F2EB]">
    <div class="max-w-[1450px] mx-auto px-4 sm:px-6 xl:px-8 py-6 space-y-5 animate-in fade-in duration-500">
      
      <!-- Compact Editorial Header -->
      <div class="bg-white rounded-2xl border border-slate-200 shadow-sm p-5 flex flex-col sm:flex-row sm:items-center justify-between gap-5 mb-6 relative overflow-hidden">
        <div class="flex items-center gap-4">
          <span class="w-12 h-12 rounded-xl bg-[#334EAC]/10 text-[#334EAC] flex items-center justify-center shrink-0">
            <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path d="M16 21v-2a4 4 0 0 0-4-4H6a4 4 0 0 0-4 4v2"/><circle cx="9" cy="7" r="4"/></svg>
          </span>
          <div>
            <h1 class="text-[30px] font-semibold text-slate-900 tracking-tight leading-tight mb-1">Tambah Tutor Baru</h1>
            <p class="text-base text-slate-500 leading-relaxed max-w-xl">Daftarkan staf pengajar baru, tentukan gelar akademik, institusi asal, dan keahlian spesifik.</p>
          </div>
        </div>
        <div class="flex shrink-0">
          <button @click="goBack" class="px-5 h-10 rounded-xl bg-white border border-slate-200 text-slate-700 hover:bg-slate-50 text-sm font-medium transition-all shadow-sm flex items-center justify-center">
            Kembali
          </button>
        </div>
      </div>

      <!-- Form Container -->
      <div class="bg-white rounded-xl border border-slate-200 p-6 shadow-sm max-w-3xl mx-auto space-y-6">
        <h3 class="text-lg font-semibold text-slate-900 border-b border-slate-100 pb-2">Informasi Kredensial Pengajar</h3>
        <form @submit.prevent="submitForm" class="space-y-4">
          <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
            <div>
              <label class="block text-xs font-bold text-slate-400 uppercase tracking-widest mb-1.5">Nama Lengkap & Gelar</label>
              <input v-model="form.name" type="text" required class="w-full px-3.5 py-2 border border-slate-200 rounded-xl text-sm text-slate-700 focus:outline-none focus:border-[#7096D1] bg-white" placeholder="Contoh: Dr. Sarah Rahman, M.T.">
            </div>
            <div>
              <label class="block text-xs font-bold text-slate-400 uppercase tracking-widest mb-1.5">Email Akademik</label>
              <input v-model="form.email" type="email" required class="w-full px-3.5 py-2 border border-slate-200 rounded-xl text-sm text-slate-700 focus:outline-none focus:border-[#7096D1] bg-white" placeholder="Contoh: sarah.r@university.edu">
            </div>
          </div>
          <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
            <div>
              <label class="block text-xs font-bold text-slate-400 uppercase tracking-widest mb-1.5">Spesialisasi Ajar Utama</label>
              <input v-model="form.specialization" type="text" required class="w-full px-3.5 py-2 border border-slate-200 rounded-xl text-sm text-slate-700 focus:outline-none focus:border-[#7096D1] bg-white" placeholder="Contoh: Fisika Kuantum, Kalkulus Lanjut">
            </div>
            <div>
              <label class="block text-xs font-bold text-slate-400 uppercase tracking-widest mb-1.5">Institusi / Universitas Asal</label>
              <input v-model="form.institution" type="text" required class="w-full px-3.5 py-2 border border-slate-200 rounded-xl text-sm text-slate-700 focus:outline-none focus:border-[#7096D1] bg-white" placeholder="Contoh: Universitas Indonesia">
            </div>
          </div>
          <div class="pt-4 border-t border-slate-100 flex justify-end gap-2">
            <button type="button" @click="goBack" class="px-5 h-10 bg-slate-50 border border-slate-200 text-slate-600 rounded-xl text-sm font-medium hover:bg-slate-100 transition-all">
              Batal
            </button>
            <button type="submit" class="px-5 h-10 bg-[#334EAC] hover:bg-[#081F5C] text-white rounded-xl text-sm font-medium shadow-sm transition-all">
              Simpan & Daftarkan Tutor
            </button>
          </div>
        </form>
      </div>

    </div>
  </div>
</template>

<script setup>
import { ref } from 'vue'
import { useRouter } from 'vue-router'

const router = useRouter()

const form = ref({
  name: '',
  email: '',
  specialization: '',
  institution: ''
})

const goBack = () => {
  router.back()
}

const submitForm = () => {
  router.push('/admin/tutors')
}
</script>
