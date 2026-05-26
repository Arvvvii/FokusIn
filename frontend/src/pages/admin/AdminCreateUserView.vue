<template>
  <div class="p-6 md:p-8 xl:p-10 max-w-[1200px] mx-auto animate-in fade-in duration-500">
    
    <!-- Header -->
    <div class="bg-white rounded-2xl border border-slate-200 shadow-sm px-6 py-5 flex flex-col sm:flex-row sm:items-start justify-between gap-5 mb-6">
      <div class="flex items-center gap-4">
        <button 
          @click="$router.push({ name: 'admin-users' })"
          class="w-10 h-10 rounded-full flex items-center justify-center text-slate-500 hover:bg-slate-100 hover:text-slate-900 transition-colors shrink-0"
        >
          <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="m15 18-6-6 6-6"/></svg>
        </button>
        <div>
          <h1 class="text-[28px] font-semibold tracking-tight text-[#081F5C] mb-1">Tambah User</h1>
          <p class="text-sm text-slate-600">Buat akun baru untuk pelajar, tutor, atau administrator.</p>
        </div>
      </div>
    </div>

    <!-- Form Section -->
    <div class="bg-white rounded-2xl border border-slate-200 shadow-sm p-6 md:p-8">
      <h3 class="text-lg font-semibold text-slate-900 mb-6">Informasi Akun</h3>
      <form @submit.prevent="submitForm" class="max-w-2xl space-y-6">
        
        <!-- Name & Email -->
        <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
          <div class="space-y-2">
            <label class="text-sm font-semibold text-slate-900 block">Nama Lengkap</label>
            <input 
              v-model="form.name"
              type="text" 
              required
              class="w-full px-4 py-2.5 bg-white border border-slate-200 rounded-xl text-sm text-slate-900 placeholder-slate-400 focus:outline-none focus:border-[#7096D1] focus:ring-4 focus:ring-[#7096D1]/10 transition-all shadow-sm"
              placeholder="Masukkan nama lengkap"
            >
          </div>
          <div class="space-y-2">
            <label class="text-sm font-semibold text-slate-900 block">Email Address</label>
            <input 
              v-model="form.email"
              type="email" 
              required
              class="w-full px-4 py-2.5 bg-white border border-slate-200 rounded-xl text-sm text-slate-900 placeholder-slate-400 focus:outline-none focus:border-[#7096D1] focus:ring-4 focus:ring-[#7096D1]/10 transition-all shadow-sm"
              placeholder="email@example.com"
            >
          </div>
        </div>

        <!-- Role & Status -->
        <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
          <div class="space-y-2">
            <label class="text-sm font-semibold text-slate-900 block">Role Akun</label>
            <select 
              v-model="form.role"
              required
              class="w-full px-4 py-2.5 bg-white border border-slate-200 rounded-xl text-sm text-slate-900 focus:outline-none focus:border-[#7096D1] focus:ring-4 focus:ring-[#7096D1]/10 transition-all shadow-sm appearance-none cursor-pointer"
            >
              <option value="pelajar">Pelajar</option>
              <option value="tutor">Tutor</option>
              <option value="admin">Administrator</option>
            </select>
          </div>
          <div class="space-y-2">
            <label class="text-sm font-semibold text-slate-900 block">Status Awal</label>
            <select 
              v-model="form.status"
              required
              class="w-full px-4 py-2.5 bg-white border border-slate-200 rounded-xl text-sm text-slate-900 focus:outline-none focus:border-[#7096D1] focus:ring-4 focus:ring-[#7096D1]/10 transition-all shadow-sm appearance-none cursor-pointer"
            >
              <option value="active">Active</option>
              <option value="suspended">Suspended</option>
            </select>
          </div>
        </div>

        <!-- Specialization (Only for Tutor) -->
        <div v-if="form.role === 'tutor'" class="space-y-2">
          <label class="text-sm font-semibold text-slate-900 block">Spesialisasi <span class="text-slate-400 font-normal">(Opsional)</span></label>
          <input 
            v-model="form.specialization"
            type="text" 
            class="w-full px-4 py-2.5 bg-white border border-slate-200 rounded-xl text-sm text-slate-900 placeholder-slate-400 focus:outline-none focus:border-[#7096D1] focus:ring-4 focus:ring-[#7096D1]/10 transition-all shadow-sm"
            placeholder="Contoh: Matematika, Fisika, dll."
          >
        </div>

        <!-- Password -->
        <div class="space-y-2">
          <label class="text-sm font-semibold text-slate-900 block">Password Setup</label>
          <input 
            v-model="form.password"
            type="password" 
            required
            class="w-full px-4 py-2.5 bg-white border border-slate-200 rounded-xl text-sm text-slate-900 placeholder-slate-400 focus:outline-none focus:border-[#7096D1] focus:ring-4 focus:ring-[#7096D1]/10 transition-all shadow-sm"
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
            class="text-sm font-medium h-10 px-5 rounded-xl bg-[#334EAC] text-white shadow-sm hover:bg-[#081F5C] transition-colors"
          >
            Simpan User
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
  role: 'pelajar',
  status: 'active',
  specialization: '',
  password: ''
})

const submitForm = () => {
  console.log('Form submitted:', form)
  router.push({ name: 'admin-users' })
}
</script>
