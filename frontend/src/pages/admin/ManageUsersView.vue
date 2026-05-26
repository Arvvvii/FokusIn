<template>
  <div class="p-6 md:p-8 xl:p-10 max-w-[1600px] mx-auto animate-in fade-in duration-500">
    
    <!-- Header -->
    <div class="bg-white rounded-2xl border border-slate-200 shadow-sm px-6 py-5 flex flex-col sm:flex-row sm:items-start justify-between gap-5 mb-6">
      <div>
        <h1 class="text-[28px] font-semibold tracking-tight text-[#081F5C] mb-1">Manajemen Pengguna</h1>
        <p class="text-sm text-slate-600">Kelola akun pelajar, tutor, dan administrator platform.</p>
      </div>
      <div class="flex items-center gap-4">
        <button 
          @click="$router.push({ name: 'admin-users-create' })"
          class="text-sm font-medium h-10 px-5 rounded-xl bg-[#334EAC] text-white shadow-sm hover:bg-[#081F5C] transition-all flex items-center gap-2"
        >
          <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M5 12h14"/><path d="M12 5v14"/></svg>
          Tambah User
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
          class="w-full pl-11 pr-4 py-2.5 bg-white border border-slate-200 rounded-xl text-sm font-medium text-slate-700 placeholder-slate-400 focus:outline-none focus:border-[#7096D1] focus:ring-4 focus:ring-[#7096D1]/10 transition-all shadow-sm" 
          placeholder="Cari nama, email..."
        >
      </div>
      <div class="flex items-center gap-2">
        <select class="px-4 py-2.5 bg-white border border-slate-200 rounded-xl text-sm font-medium text-slate-600 focus:outline-none focus:border-[#7096D1] shadow-sm appearance-none cursor-pointer">
          <option value="">Semua Role</option>
          <option value="pelajar">Pelajar</option>
          <option value="tutor">Tutor</option>
          <option value="admin">Admin</option>
        </select>
        <select class="px-4 py-2.5 bg-white border border-slate-200 rounded-xl text-sm font-medium text-slate-600 focus:outline-none focus:border-[#7096D1] shadow-sm appearance-none cursor-pointer">
          <option value="">Semua Status</option>
          <option value="active">Active</option>
          <option value="suspended">Suspended</option>
        </select>
      </div>
    </div>

    <!-- Table Container -->
    <div class="bg-white rounded-2xl border border-slate-200 shadow-sm overflow-hidden">
      <div class="overflow-x-auto">
        <table class="w-full text-left border-collapse">
          <thead>
            <tr class="bg-slate-50 border-b border-slate-200">
              <th class="px-6 py-4 text-xs font-semibold text-slate-500">Name</th>
              <th class="px-6 py-4 text-xs font-semibold text-slate-500">Role</th>
              <th class="px-6 py-4 text-xs font-semibold text-slate-500">Status</th>
              <th class="px-6 py-4 text-xs font-semibold text-slate-500">Last Active</th>
              <th class="px-6 py-4 text-xs font-semibold text-slate-500 text-right">Actions</th>
            </tr>
          </thead>
          <tbody class="divide-y divide-slate-100">
            <tr v-for="user in users" :key="user.id" class="hover:bg-slate-50/50 transition-colors group">
              <td class="px-6 py-4">
                <div class="flex items-center gap-3">
                  <div class="w-9 h-9 rounded-full flex items-center justify-center text-white font-bold text-xs shrink-0" :class="user.avatarBg">
                    {{ user.initials }}
                  </div>
                  <div>
                    <p class="text-sm font-medium text-slate-900">{{ user.name }}</p>
                    <p class="text-xs text-slate-500">{{ user.email }}</p>
                  </div>
                </div>
              </td>
              <td class="px-6 py-4">
                <span class="px-2.5 py-1 bg-slate-100 text-slate-700 text-xs font-medium rounded-md capitalize">{{ user.role }}</span>
              </td>
              <td class="px-6 py-4">
                <div class="flex items-center gap-1.5">
                  <span class="w-1.5 h-1.5 rounded-full" :class="user.status === 'Active' ? 'bg-emerald-500' : 'bg-rose-500'"></span>
                  <span class="text-xs font-medium" :class="user.status === 'Active' ? 'text-emerald-700' : 'text-rose-700'">{{ user.status }}</span>
                </div>
              </td>
              <td class="px-6 py-4 text-sm text-slate-600">
                {{ user.lastActive }}
              </td>
              <td class="px-6 py-4 text-right">
                <div class="flex items-center justify-end gap-1 opacity-0 group-hover:opacity-100 transition-opacity">
                  <button class="p-1.5 text-slate-400 hover:text-[#334EAC] hover:bg-[#D0E3FF] rounded-lg transition-colors" title="View" @click="actionLog('View', user.name)">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M2 12s3-7 10-7 10 7 10 7-3 7-10 7-10-7-10-7Z"/><circle cx="12" cy="12" r="3"/></svg>
                  </button>
                  <button class="p-1.5 text-slate-400 hover:text-indigo-600 hover:bg-indigo-50 rounded-lg transition-colors" title="Edit" @click="actionLog('Edit', user.name)">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M17 3a2.85 2.83 0 1 1 4 4L7.5 20.5 2 22l1.5-5.5Z"/></svg>
                  </button>
                  <button class="p-1.5 text-slate-400 hover:text-amber-600 hover:bg-amber-50 rounded-lg transition-colors" title="Activity" @click="actionLog('Activity', user.name)">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polyline points="22 12 18 12 15 21 9 3 6 12 2 12"/></svg>
                  </button>
                  <button class="p-1.5 text-slate-400 hover:text-teal-600 hover:bg-teal-50 rounded-lg transition-colors" title="Reset Password" @click="actionLog('Reset Password', user.name)">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect width="18" height="11" x="3" y="11" rx="2" ry="2"/><path d="M7 11V7a5 5 0 0 1 10 0v4"/></svg>
                  </button>
                  <button class="p-1.5 text-slate-400 hover:text-rose-600 hover:bg-rose-50 rounded-lg transition-colors" title="Suspend" @click="actionLog('Suspend', user.name)">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"/><line x1="4.93" x2="19.07" y1="4.93" y2="19.07"/></svg>
                  </button>
                </div>
              </td>
            </tr>
          </tbody>
        </table>
      </div>
      <div class="px-6 py-4 border-t border-slate-200 flex items-center justify-between bg-slate-50/50">
        <span class="text-xs font-medium text-slate-500">Menampilkan 1-10 dari 14,205 user</span>
        <div class="flex gap-2">
          <button class="px-3 py-1.5 border border-slate-200 rounded-lg text-xs font-medium text-slate-400 cursor-not-allowed bg-white">Prev</button>
          <button class="px-3 py-1.5 border border-slate-200 rounded-lg text-xs font-medium text-slate-700 hover:bg-slate-50 bg-white">Next</button>
        </div>
      </div>
    </div>
  </div>
</template>

<script setup>
const users = [
  { id: 1, name: 'Dr. Sarah R.', email: 'sarah.r@university.edu', role: 'Tutor', status: 'Active', lastActive: '2 mins ago', initials: 'SR', avatarBg: 'bg-gradient-to-br from-[#334EAC] to-[#081F5C]' },
  { id: 2, name: 'Andi Pratama', email: 'andi.p@student.edu', role: 'Pelajar', status: 'Active', lastActive: '1 hour ago', initials: 'AP', avatarBg: 'bg-gradient-to-br from-indigo-400 to-purple-500' },
  { id: 3, name: 'Budi Santoso', email: 'budi.s@student.edu', role: 'Pelajar', status: 'Suspended', lastActive: '1 week ago', initials: 'BS', avatarBg: 'bg-gradient-to-br from-slate-400 to-slate-500' },
  { id: 4, name: 'Prof. Anderson', email: 'anderson@university.edu', role: 'Tutor', status: 'Active', lastActive: '3 hours ago', initials: 'PA', avatarBg: 'bg-gradient-to-br from-emerald-400 to-teal-500' },
  { id: 5, name: 'Rina Wijaya', email: 'rina.w@student.edu', role: 'Pelajar', status: 'Active', lastActive: '10 mins ago', initials: 'RW', avatarBg: 'bg-gradient-to-br from-rose-400 to-orange-400' },
  { id: 6, name: 'Admin Utama', email: 'admin@fokusin.com', role: 'Admin', status: 'Active', lastActive: 'Just now', initials: 'AU', avatarBg: 'bg-gradient-to-br from-sky-400 to-blue-500' },
]

const actionLog = (action, name) => {
  console.log(`${action} clicked for ${name}`)
}
</script>
