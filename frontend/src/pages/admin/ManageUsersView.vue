<template>
  <div class="p-6 md:p-8 xl:p-10 max-w-[1600px] mx-auto animate-in fade-in duration-500">
    
    <!-- Header -->
    <div class="mb-8 flex flex-col sm:flex-row sm:items-end justify-between gap-4">
      <div>
        <h1 class="text-3xl font-extrabold text-[#081F5C] tracking-tight mb-2">User Management</h1>
        <p class="text-slate-500 font-medium">Kelola akun pelajar dan tutor, berikan badge, atau tangguhkan pengguna yang melanggar.</p>
      </div>
      <div class="flex items-center gap-3">
        <button class="px-4 py-2 bg-[#334EAC] text-white rounded-xl font-bold text-sm shadow-sm hover:bg-[#081F5C] transition-all flex items-center gap-2">
          <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M5 12h14"/><path d="M12 5v14"/></svg>
          Undang User
        </button>
      </div>
    </div>

    <!-- Filters & Search -->
    <div class="flex flex-col md:flex-row gap-4 mb-6">
      <div class="relative flex-1 max-w-md">
        <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none text-slate-400">
          <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><circle cx="11" cy="11" r="8"/><path d="m21 21-4.3-4.3"/></svg>
        </div>
        <input 
          type="text" 
          class="w-full pl-11 pr-4 py-2.5 bg-white border border-slate-200 rounded-xl text-sm font-bold text-slate-700 placeholder-slate-400 focus:outline-none focus:border-[#7096D1] focus:ring-4 focus:ring-[#7096D1]/10 transition-all shadow-sm" 
          placeholder="Cari nama, email, atau ID..."
        >
      </div>
      <div class="flex items-center gap-2">
        <select class="px-4 py-2.5 bg-white border border-slate-200 rounded-xl text-sm font-bold text-slate-600 focus:outline-none focus:border-[#7096D1] shadow-sm appearance-none cursor-pointer">
          <option value="">Semua Role</option>
          <option value="pelajar">Pelajar</option>
          <option value="tutor">Tutor</option>
        </select>
        <select class="px-4 py-2.5 bg-white border border-slate-200 rounded-xl text-sm font-bold text-slate-600 focus:outline-none focus:border-[#7096D1] shadow-sm appearance-none cursor-pointer">
          <option value="">Semua Status</option>
          <option value="active">Active</option>
          <option value="suspended">Suspended</option>
        </select>
      </div>
    </div>

    <!-- Table Container -->
    <div class="bg-white rounded-2xl border border-slate-200 shadow-[0_4px_20px_rgba(8,31,92,0.03)] overflow-hidden">
      <div class="overflow-x-auto">
        <table class="w-full text-left border-collapse">
          <thead>
            <tr class="bg-slate-50/80 border-b border-slate-200">
              <th class="px-6 py-4 text-[10px] font-extrabold text-slate-400 uppercase tracking-widest">User Info</th>
              <th class="px-6 py-4 text-[10px] font-extrabold text-slate-400 uppercase tracking-widest">Role</th>
              <th class="px-6 py-4 text-[10px] font-extrabold text-slate-400 uppercase tracking-widest">Status</th>
              <th class="px-6 py-4 text-[10px] font-extrabold text-slate-400 uppercase tracking-widest">Reputasi</th>
              <th class="px-6 py-4 text-[10px] font-extrabold text-slate-400 uppercase tracking-widest text-right">Aksi</th>
            </tr>
          </thead>
          <tbody class="divide-y divide-slate-100">
            <tr v-for="user in users" :key="user.id" class="hover:bg-slate-50/50 transition-colors group">
              <td class="px-6 py-4">
                <div class="flex items-center gap-3">
                  <div class="w-10 h-10 rounded-xl flex items-center justify-center text-white font-extrabold text-sm shrink-0" :class="user.avatarBg">
                    {{ user.initials }}
                  </div>
                  <div>
                    <p class="text-sm font-bold text-[#081F5C]">{{ user.name }}</p>
                    <p class="text-[11px] font-medium text-slate-400">{{ user.email }}</p>
                  </div>
                </div>
              </td>
              <td class="px-6 py-4">
                <span class="px-2.5 py-1 bg-slate-100 text-slate-600 text-[10px] font-extrabold rounded-md uppercase tracking-widest">{{ user.role }}</span>
              </td>
              <td class="px-6 py-4">
                <div class="flex items-center gap-1.5">
                  <span class="w-2 h-2 rounded-full" :class="user.status === 'Active' ? 'bg-emerald-500' : 'bg-rose-500'"></span>
                  <span class="text-xs font-bold" :class="user.status === 'Active' ? 'text-emerald-700' : 'text-rose-700'">{{ user.status }}</span>
                </div>
              </td>
              <td class="px-6 py-4">
                <div class="flex items-center gap-1.5">
                  <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="currentColor" class="text-amber-500" stroke="none"><polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"/></svg>
                  <span class="text-sm font-extrabold text-[#081F5C]">{{ user.rep }}</span>
                </div>
              </td>
              <td class="px-6 py-4 text-right">
                <div class="flex items-center justify-end gap-2 opacity-0 group-hover:opacity-100 transition-opacity">
                  <button class="p-2 text-slate-400 hover:text-[#334EAC] hover:bg-[#D0E3FF] rounded-lg transition-colors" title="Beri Badge">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M3.85 8.62a4 4 0 0 1 4.78-4.77 4 4 0 0 1 6.74 0 4 4 0 0 1 4.78 4.78 4 4 0 0 1 0 6.74 4 4 0 0 1-4.77 4.78 4 4 0 0 1-6.75 0 4 4 0 0 1-4.78-4.77 4 4 0 0 1 0-6.76Z"/><path d="m9 12 2 2 4-4"/></svg>
                  </button>
                  <button class="p-2 text-slate-400 hover:text-rose-600 hover:bg-rose-50 rounded-lg transition-colors" title="Tangguhkan (Suspend)">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"/><line x1="4.93" x2="19.07" y1="4.93" y2="19.07"/></svg>
                  </button>
                  <button class="p-2 text-slate-400 hover:text-[#081F5C] hover:bg-slate-100 rounded-lg transition-colors" title="Detail User" @click="openDrawer = true">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="1"/><circle cx="19" cy="12" r="1"/><circle cx="5" cy="12" r="1"/></svg>
                  </button>
                </div>
              </td>
            </tr>
          </tbody>
        </table>
      </div>
      <div class="px-6 py-4 border-t border-slate-200 flex items-center justify-between bg-slate-50/50">
        <span class="text-xs font-bold text-slate-500">Menampilkan 1-10 dari 14,205 user</span>
        <div class="flex gap-2">
          <button class="px-3 py-1.5 border border-slate-200 rounded-lg text-xs font-bold text-slate-400 cursor-not-allowed bg-white">Prev</button>
          <button class="px-3 py-1.5 border border-slate-200 rounded-lg text-xs font-bold text-[#081F5C] hover:bg-slate-100 bg-white">Next</button>
        </div>
      </div>
    </div>

    <!-- Dummy Detail Drawer Overlay -->
    <div v-if="openDrawer" class="fixed inset-0 z-50 bg-[#081F5C]/40 backdrop-blur-sm flex justify-end" @click.self="openDrawer = false">
      <div class="w-full max-w-md bg-white h-full shadow-2xl p-6 overflow-y-auto animate-in slide-in-from-right duration-300">
        <div class="flex items-center justify-between mb-8">
          <h2 class="text-xl font-extrabold text-[#081F5C]">Detail Pengguna</h2>
          <button @click="openDrawer = false" class="p-2 text-slate-400 hover:text-rose-500 hover:bg-rose-50 rounded-full transition-colors">
            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M18 6 6 18"/><path d="m6 6 12 12"/></svg>
          </button>
        </div>
        <div class="text-center mb-8">
          <div class="w-24 h-24 mx-auto rounded-full bg-gradient-to-br from-[#334EAC] to-[#081F5C] flex items-center justify-center text-white font-extrabold text-3xl mb-4 shadow-lg border-4 border-white">
            SR
          </div>
          <h3 class="text-2xl font-extrabold text-[#081F5C]">Dr. Sarah R.</h3>
          <p class="text-sm text-slate-500 font-medium">sarah.r@university.edu</p>
          <div class="mt-3 inline-flex items-center gap-2 px-3 py-1.5 bg-slate-100 rounded-lg">
            <span class="text-[10px] font-extrabold uppercase tracking-widest text-slate-600">Tutor</span>
            <span class="w-1.5 h-1.5 bg-slate-300 rounded-full"></span>
            <span class="text-[10px] font-extrabold uppercase tracking-widest text-emerald-600">Active</span>
          </div>
        </div>
        <div class="space-y-6">
          <div>
            <h4 class="text-xs font-extrabold text-slate-400 uppercase tracking-widest mb-3">Statistik Kontribusi</h4>
            <div class="grid grid-cols-2 gap-3">
              <div class="p-3 bg-slate-50 rounded-xl border border-slate-100">
                <p class="text-[10px] font-extrabold text-slate-400 uppercase tracking-widest mb-1">Reputasi</p>
                <p class="text-lg font-extrabold text-[#081F5C]">15.4k</p>
              </div>
              <div class="p-3 bg-slate-50 rounded-xl border border-slate-100">
                <p class="text-[10px] font-extrabold text-slate-400 uppercase tracking-widest mb-1">Verifikasi</p>
                <p class="text-lg font-extrabold text-[#081F5C]">342</p>
              </div>
            </div>
          </div>
          <div>
            <h4 class="text-xs font-extrabold text-slate-400 uppercase tracking-widest mb-3">Badge Aktif</h4>
            <div class="flex flex-wrap gap-2">
              <span class="px-3 py-1.5 bg-indigo-50 border border-indigo-100 text-indigo-700 text-xs font-bold rounded-lg flex items-center gap-1.5">
                <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path d="m12 3-1.912 5.813a2 2 0 0 1-1.275 1.275L3 12l5.813 1.912a2 2 0 0 1 1.275 1.275L12 21l1.912-5.813a2 2 0 0 1 1.275-1.275L21 12l-5.813-1.912a2 2 0 0 1-1.275-1.275L12 3Z"/></svg>
                Expert Mentor
              </span>
              <span class="px-3 py-1.5 bg-emerald-50 border border-emerald-100 text-emerald-700 text-xs font-bold rounded-lg flex items-center gap-1.5">
                <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"/><polyline points="22 4 12 14.01 9 11.01"/></svg>
                Verified AI Validator
              </span>
            </div>
          </div>
          <div class="pt-6 border-t border-slate-100">
            <button class="w-full py-3 bg-white border border-rose-200 text-rose-600 rounded-xl font-bold text-sm shadow-sm hover:bg-rose-50 transition-all">
              Tangguhkan Akses
            </button>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script setup>
import { ref } from 'vue'

const openDrawer = ref(false)

const users = [
  { id: 1, name: 'Dr. Sarah R.', email: 'sarah.r@university.edu', role: 'Tutor', status: 'Active', rep: '15.4k', initials: 'SR', avatarBg: 'bg-gradient-to-br from-[#334EAC] to-[#081F5C]' },
  { id: 2, name: 'Andi Pratama', email: 'andi.p@student.edu', role: 'Pelajar', status: 'Active', rep: '4.2k', initials: 'AP', avatarBg: 'bg-gradient-to-br from-indigo-400 to-purple-500' },
  { id: 3, name: 'Budi Santoso', email: 'budi.s@student.edu', role: 'Pelajar', status: 'Suspended', rep: '120', initials: 'BS', avatarBg: 'bg-gradient-to-br from-slate-400 to-slate-500' },
  { id: 4, name: 'Prof. Anderson', email: 'anderson@university.edu', role: 'Tutor', status: 'Active', rep: '12.1k', initials: 'PA', avatarBg: 'bg-gradient-to-br from-emerald-400 to-teal-500' },
  { id: 5, name: 'Rina Wijaya', email: 'rina.w@student.edu', role: 'Pelajar', status: 'Active', rep: '850', initials: 'RW', avatarBg: 'bg-gradient-to-br from-rose-400 to-orange-400' },
]
</script>
