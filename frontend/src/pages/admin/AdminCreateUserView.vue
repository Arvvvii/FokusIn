<template>
  <div class="p-6 md:p-8 xl:p-10 max-w-4xl mx-auto animate-in fade-in duration-500">
    
    <!-- Back Navigation -->
    <div class="mb-6 flex items-center gap-2">
      <RouterLink
        to="/admin/users"
        class="text-sm font-bold text-slate-400 hover:text-[#334EAC] transition-colors flex items-center gap-1 w-fit bg-white/50 px-3 py-1.5 rounded-lg border border-slate-200/50"
      >
        ← Kembali ke Daftar User
      </RouterLink>
    </div>

    <!-- Header -->
    <div class="admin-dashboard-hero mb-8">
      <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4 relative z-10">
        <div class="flex items-center gap-4">
          <div>
            <h1 class="text-3xl md:text-4xl font-extrabold text-slate-900 tracking-tight leading-tight">Tambah User</h1>
            <p class="text-[15px] text-slate-600 font-medium mt-2 max-w-xl leading-relaxed">Buat akun baru untuk pelajar, tutor, atau administrator.</p>
          </div>
        </div>
      </div>
    </div>

    <!-- Form Section -->
    <div class="admin-card p-6 md:p-8">
      <h3 class="settings-form-title border-b border-slate-100 pb-4">Informasi Akun</h3>
      <form @submit.prevent="submitForm" class="space-y-6">
        
        <!-- Name & Email -->
        <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
          <div class="space-y-2">
            <label class="admin-label">Nama Lengkap</label>
            <input 
              v-model="form.name"
              type="text" 
              required
              class="admin-input"
              placeholder="Masukkan nama lengkap"
            >
          </div>
          <div class="space-y-2">
            <label class="admin-label">Email Address</label>
            <input 
              v-model="form.email"
              type="email" 
              required
              class="admin-input"
              placeholder="email@example.com"
            >
          </div>
        </div>

        <!-- Role & Status -->
        <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
          <div class="space-y-2">
            <label class="admin-label">Role Akun</label>
            <select 
              v-model="form.role"
              required
              class="admin-input appearance-none cursor-pointer"
            >
              <option value="Pelajar">Pelajar</option>
              <option value="Tutor">Tutor</option>
              <option value="Admin">Administrator</option>
            </select>
          </div>
          <div class="space-y-2">
            <label class="admin-label">Status Awal</label>
            <select 
              v-model="form.status"
              required
              class="admin-input appearance-none cursor-pointer"
            >
              <option value="Active">Active</option>
              <option value="Suspended">Suspended</option>
            </select>
          </div>
        </div>

        <!-- Specialization (Only for Tutor) -->
        <div v-if="form.role === 'Tutor'" class="space-y-2">
          <label class="admin-label">Spesialisasi <span class="text-slate-400 font-normal">(Opsional)</span></label>
          <input 
            v-model="form.specialization"
            type="text" 
            class="admin-input"
            placeholder="Contoh: Matematika, Fisika, dll."
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
            @click="$router.push({ name: 'admin-users' })"
            class="text-sm font-medium h-10 px-5 rounded-xl border border-slate-200 text-slate-600 hover:bg-slate-50 transition-colors"
          >
            Batal
          </button>
          <button 
            type="submit"
            :disabled="isSaving"
            class="text-sm font-medium h-10 px-5 rounded-xl bg-[#081F5C] text-white shadow-sm hover:bg-[#081F5C] transition-colors flex items-center gap-2"
          >
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round" class="animate-spin" v-if="isSaving"><circle cx="12" cy="12" r="10"/><path d="M21 12a9 9 0 1 1-6.219-8.56"/></svg>
            {{ isSaving ? 'Menyimpan...' : 'Simpan User' }}
          </button>
        </div>
        
      </form>
    </div>
  </div>
</template>

<script setup>
import { reactive, ref } from 'vue'
import { useRouter, RouterLink } from 'vue-router'
import { adminService } from '@/services/admin.service'
import { useToastStore } from '@/stores/toast'

const router = useRouter()
const toastStore = useToastStore()
const isSaving = ref(false)

const form = reactive({
  name: '',
  email: '',
  role: 'Pelajar',
  status: 'Active',
  specialization: '',
  password: ''
})

const submitForm = async () => {
  try {
    isSaving.value = true
    await adminService.createUser({
      name: form.name,
      email: form.email,
      role: form.role,
      status: form.status,
      password: form.password
    })
    toastStore.success('Pengguna berhasil dibuat.')
    router.push({ name: 'admin-users' })
  } catch (err) {
    console.error('Error creating user:', err)
    toastStore.error('Gagal membuat pengguna.')
  } finally {
    isSaving.value = false
  }
}
</script>
