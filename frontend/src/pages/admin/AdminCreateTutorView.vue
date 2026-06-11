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
              :disabled="submitting"
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
              :disabled="submitting"
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
            :disabled="submitting"
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
            :disabled="submitting"
          >
        </div>

        <!-- Actions -->
        <div class="pt-6 border-t border-slate-100 flex items-center justify-end gap-3">
          <button 
            type="button"
            @click="$router.push({ name: 'admin-tutors' })"
            class="text-sm font-medium h-10 px-5 rounded-xl border border-slate-200 text-slate-600 hover:bg-slate-50 transition-colors"
            :disabled="submitting"
          >
            Batal
          </button>
          <button 
            type="submit"
            class="text-sm font-medium h-10 px-5 rounded-xl bg-[#081F5C] text-white shadow-sm hover:bg-[#061746] transition-colors flex items-center gap-2"
            :disabled="submitting"
          >
            <svg v-if="submitting" class="animate-spin h-4 w-4 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
              <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
              <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4z"></path>
            </svg>
            {{ submitting ? 'Menyimpan...' : 'Simpan Tutor' }}
          </button>
        </div>
        
      </form>
    </div>
  </div>
</template>

<script setup>
import { reactive, ref } from 'vue'
import { useRouter } from 'vue-router'
import { adminService } from '@/services/admin.service'
import { useToastStore } from '@/stores/toast'

const router = useRouter()
const toastStore = useToastStore()
const submitting = ref(false)

const form = reactive({
  name: '',
  email: '',
  specialization: '',
  password: ''
})

const submitForm = async () => {
  submitting.value = true
  try {
    const specs = form.specialization.split(',').map(s => s.trim()).filter(Boolean)
    await adminService.createTutor({
      name: form.name,
      email: form.email,
      password: form.password,
      specializations: specs,
      specialization: form.specialization // support both formats
    })
    toastStore.success('Tutor baru berhasil ditambahkan!')
    router.push({ name: 'admin-tutors' })
  } catch (err) {
    toastStore.error(err || 'Gagal menambahkan tutor.')
  } finally {
    submitting.value = false
  }
}
</script>
