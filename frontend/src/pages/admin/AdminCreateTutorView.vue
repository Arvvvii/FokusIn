<template>
  <div class="p-6 md:p-8 xl:p-10 max-w-4xl mx-auto animate-in fade-in duration-500">
    
    <!-- Back Navigation -->
    <div class="mb-6 flex items-center gap-2">
      <RouterLink
        to="/admin/tutors"
        class="text-sm font-bold text-slate-400 hover:text-[#334EAC] transition-colors flex items-center gap-1 w-fit bg-white/50 px-3 py-1.5 rounded-lg border border-slate-200/50"
      >
        ← Kembali ke Daftar Tutor
      </RouterLink>
    </div>

    <!-- Header -->
    <div class="admin-dashboard-hero mb-8">
      <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4 relative z-10">
        <div class="flex items-center gap-4">
          <div>
            <h1 class="text-3xl md:text-4xl font-extrabold text-slate-900 tracking-tight leading-tight">Tambah Tutor</h1>
            <p class="text-[15px] text-slate-600 font-medium mt-2 max-w-xl leading-relaxed">Buat profil tutor baru dengan hak akses pengajar.</p>
          </div>
        </div>
      </div>
    </div>

    <!-- Form Section -->
    <div class="admin-card p-6 md:p-8">
      <h3 class="settings-form-title border-b border-slate-100 pb-4">Informasi Akademik</h3>
      <form @submit.prevent="submitForm" class="space-y-6">
        
        <!-- Name & Email -->
        <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
          <div class="space-y-2">
            <label class="admin-label">Nama Lengkap beserta Gelar</label>
            <input 
              v-model="form.name"
              type="text" 
              required
              class="admin-input"
              placeholder="Contoh: Dr. Sarah Rahman, S.Si."
            >
          </div>
          <div class="space-y-2">
            <label class="admin-label">Email Institusi / Pribadi</label>
            <input 
              v-model="form.email"
              type="email" 
              required
              class="admin-input"
              placeholder="email@university.edu"
            >
          </div>
        </div>

        <div class="space-y-2">
          <label class="admin-label">Spesialisasi Mengajar</label>
          <input 
            v-model="form.specialization"
            type="text" 
            required
            class="admin-input"
            placeholder="Contoh: Fisika Kuantum, Matematika Dasar"
          >
        </div>

        <!-- Password -->
        <div class="space-y-2">
          <label class="admin-label">Password Setup</label>
          <input 
            v-model="form.password"
            type="password" 
            required
            class="admin-input"
            placeholder="Buat password awal"
          >
        </div>

        <!-- Actions -->
        <div class="pt-6 border-t border-slate-100 flex items-center justify-end gap-3">
          <button 
            type="button"
            @click="$router.push({ name: 'admin-tutors' })"
            class="text-sm font-medium h-10 px-5 rounded-xl border border-slate-200 text-slate-600 hover:bg-slate-50 transition-colors"
          >
            Batal
          </button>
          <button 
            type="submit"
            class="text-sm font-medium h-10 px-5 rounded-xl bg-[#081F5C] text-white shadow-sm hover:bg-[#081F5C] transition-colors"
          >
            Simpan Tutor
          </button>
        </div>
        
      </form>
    </div>
  </div>
</template>

<script setup>
import { reactive } from 'vue'
import { useRouter } from 'vue-router'

const router = useRouter()

const form = reactive({
  name: '',
  email: '',
  specialization: '',
  password: ''
})

const submitForm = () => {
  console.log('Form submitted:', form)
  router.push({ name: 'admin-tutors' })
}
</script>
