<template>
  <div class="p-6 md:p-8 xl:p-10 max-w-4xl mx-auto animate-in fade-in duration-500">
    
    <!-- Header -->
    <div class="bg-white/80 backdrop-blur-xl rounded-3xl p-7 md:p-8 shadow-[0_10px_40px_rgba(15,23,42,0.06)] border border-white/40 relative overflow-hidden mb-8">
      <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4 relative z-10">
        <div class="flex items-center gap-4">
          <button 
            @click="$router.push({ name: 'admin-users' })"
            class="w-10 h-10 rounded-full flex items-center justify-center text-slate-500 hover:bg-slate-100 hover:text-slate-900 transition-colors shrink-0"
          >
            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="m15 18-6-6 6-6"/></svg>
          </button>
          <div>
            <h1 class="text-[28px] font-bold text-slate-900 tracking-tight mb-1">Tambah User</h1>
            <p class="text-base text-slate-500 font-medium">Buat akun baru untuk pelajar, tutor, atau administrator.</p>
          </div>
        </div>
      </div>
    </div>

    <!-- Form Section -->
    <div class="bg-white rounded-2xl border border-slate-200 shadow-sm p-6 md:p-8">
      <h3 class="text-xl font-bold text-slate-900 mb-6 border-b border-slate-100 pb-4">Informasi Akun</h3>
      <form @submit.prevent="submitForm" class="space-y-6">
        
        <!-- Name & Email -->
        <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
          <div class="space-y-2">
            <label class="text-sm font-semibold text-slate-900 block">Nama Lengkap</label>
            <input 
              v-model="form.name"
              type="text" 
              required
              class="w-full px-4 py-2.5 bg-white border border-slate-200 rounded-xl text-sm text-slate-900 placeholder-slate-400 focus:outline-none focus:border-indigo-500 focus:ring-4 focus:ring-indigo-500/10 transition-all shadow-sm"
              placeholder="Masukkan nama lengkap"
            >
          </div>
          <div class="space-y-2">
            <label class="text-sm font-semibold text-slate-900 block">Email Address</label>
            <input 
              v-model="form.email"
              type="email" 
              required
              class="w-full px-4 py-2.5 bg-white border border-slate-200 rounded-xl text-sm text-slate-900 placeholder-slate-400 focus:outline-none focus:border-indigo-500 focus:ring-4 focus:ring-indigo-500/10 transition-all shadow-sm"
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
              class="w-full px-4 py-2.5 bg-white border border-slate-200 rounded-xl text-sm text-slate-900 focus:outline-none focus:border-indigo-500 focus:ring-4 focus:ring-indigo-500/10 transition-all shadow-sm appearance-none cursor-pointer"
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
              class="w-full px-4 py-2.5 bg-white border border-slate-200 rounded-xl text-sm text-slate-900 focus:outline-none focus:border-indigo-500 focus:ring-4 focus:ring-indigo-500/10 transition-all shadow-sm appearance-none cursor-pointer"
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
            class="text-sm font-medium h-10 px-5 rounded-xl bg-indigo-600 text-white shadow-sm hover:bg-indigo-700 transition-colors"
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
