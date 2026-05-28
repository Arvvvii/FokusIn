<template>
  <div class="p-6 md:p-8 xl:p-10 max-w-[1600px] mx-auto animate-in fade-in duration-500">
    
    <!-- Header -->
    <div class="admin-dashboard-hero mb-8">
      <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4 relative z-10">
        <div>
          <h1 class="text-3xl md:text-4xl font-extrabold text-slate-900 tracking-tight leading-tight">Manajemen Pengguna</h1>
          <p class="text-[15px] text-slate-600 font-medium mt-2 max-w-xl leading-relaxed">Kelola akun pelajar, tutor, dan administrator platform.</p>
        </div>
        <div class="flex items-center gap-4">
          <button 
            @click="$router.push({ name: 'admin-users-create' })"
            class="btn-tambah-user px-5 py-2.5"
          >
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M5 12h14"/><path d="M12 5v14"/></svg>
            Tambah User
          </button>
        </div>
      </div>
    </div>

    <!-- Filters & Search -->
    <div class="admin-filter-bar mb-6 p-3 flex flex-col md:flex-row gap-4 items-center">
      <div class="relative flex-1 w-full max-w-md">
        <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none text-[#8A9CC0]">
          <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><circle cx="11" cy="11" r="8"/><path d="m21 21-4.3-4.3"/></svg>
        </div>
        <input 
          type="text" 
          class="admin-search-input pl-11 pr-4 py-1.5" 
          placeholder="Cari nama, email..."
        >
      </div>
      <div class="flex items-center gap-2 w-full md:w-auto ml-auto">
        <select class="filter-dropdown appearance-none">
          <option value="">Semua Role</option>
          <option value="pelajar">Pelajar</option>
          <option value="tutor">Tutor</option>
          <option value="admin">Admin</option>
        </select>
        <select class="filter-dropdown appearance-none">
          <option value="">Semua Status</option>
          <option value="active">Active</option>
          <option value="suspended">Suspended</option>
        </select>
      </div>
    </div>

    <!-- Table Container -->
    <div class="admin-table-container">
      <div class="overflow-x-auto">
        <table class="w-full text-left border-collapse">
          <thead>
            <tr class="admin-table-header">
              <th class="admin-table-col-label px-6 py-4">Name</th>
              <th class="admin-table-col-label px-6 py-4">Role</th>
              <th class="admin-table-col-label px-6 py-4">Status</th>
              <th class="admin-table-col-label px-6 py-4">Last Active</th>
              <th class="admin-table-col-label px-6 py-4 text-right">Actions</th>
            </tr>
          </thead>
          <tbody class="divide-y divide-slate-100">
            <tr v-for="user in users" :key="user.id" class="admin-table-row group">
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
                <span :class="user.role === 'Pelajar' ? 'role-badge-pelajar' : (user.role === 'Tutor' ? 'role-badge-tutor' : 'px-2.5 py-1 bg-slate-100 text-slate-700 text-xs font-medium rounded-md capitalize')">{{ user.role }}</span>
              </td>
              <td class="px-6 py-4">
                <span :class="user.status === 'Active' ? 'status-active' : 'status-suspended'">{{ user.status }}</span>
              </td>
              <td class="px-6 py-4 text-sm text-slate-600">
                {{ user.lastActive }}
              </td>
              <td class="px-6 py-4 text-right">
                <div class="flex items-center justify-end gap-1 opacity-0 group-hover:opacity-100 transition-opacity">
                  <button class="p-1.5 text-slate-400 bg-slate-50 hover:text-[#334EAC] hover:bg-[#D0E3FF] rounded-lg transition-colors border border-slate-100" title="View" @click="openModal('View', user)">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M2 12s3-7 10-7 10 7 10 7-3 7-10 7-10-7-10-7Z"/><circle cx="12" cy="12" r="3"/></svg>
                  </button>
                  <button class="p-1.5 text-slate-400 bg-slate-50 hover:text-[#081F5C] hover:bg-[#F7F2EB] rounded-lg transition-colors border border-slate-100" title="Edit" @click="openModal('Edit', user)">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M17 3a2.85 2.83 0 1 1 4 4L7.5 20.5 2 22l1.5-5.5Z"/></svg>
                  </button>
                  <button class="p-1.5 text-slate-400 bg-slate-50 hover:text-amber-600 hover:bg-amber-50 rounded-lg transition-colors border border-slate-100" title="Activity" @click="openModal('Activity', user)">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polyline points="22 12 18 12 15 21 9 3 6 12 2 12"/></svg>
                  </button>
                  <button class="p-1.5 text-slate-400 bg-slate-50 hover:text-teal-600 hover:bg-teal-50 rounded-lg transition-colors border border-slate-100" title="Reset Password" @click="openModal('Reset Password', user)">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect width="18" height="11" x="3" y="11" rx="2" ry="2"/><path d="M7 11V7a5 5 0 0 1 10 0v4"/></svg>
                  </button>
                  <button v-if="user.status === 'Active'" class="p-1.5 text-slate-400 bg-slate-50 hover:text-rose-600 hover:bg-rose-50 rounded-lg transition-colors border border-slate-100" title="Suspend" @click="openModal('Suspend', user)">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"/><line x1="4.93" x2="19.07" y1="4.93" y2="19.07"/></svg>
                  </button>
                  <button v-else class="p-1.5 text-slate-400 bg-slate-50 hover:text-emerald-600 hover:bg-emerald-50 rounded-lg transition-colors border border-slate-100" title="Activate" @click="openModal('Activate', user)">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"/><polyline points="22 4 12 14.01 9 11.01"/></svg>
                  </button>
                </div>
              </td>
            </tr>
          </tbody>
        </table>
      </div>
      <div class="px-6 py-4 border-t border-slate-200 flex items-center justify-between bg-slate-50/50">
        <span class="text-xs font-medium text-slate-500">Menampilkan 1-6 dari 6 user</span>
        <div class="flex gap-2">
          <button class="px-3 py-1.5 border border-slate-200 rounded-lg text-xs font-medium text-slate-400 cursor-not-allowed bg-white">Prev</button>
          <button class="px-3 py-1.5 border border-slate-200 rounded-lg text-xs font-medium text-slate-700 hover:bg-slate-50 bg-white">Next</button>
        </div>
      </div>
    </div>

    <!-- Action Modal -->
    <Teleport to="body">
      <div v-if="isModalOpen" class="fixed inset-0 z-50 flex items-center justify-center p-4">
        <!-- Backdrop -->
        <div class="absolute inset-0 bg-slate-900/40 backdrop-blur-sm" @click="closeModal"></div>
        
        <!-- Modal Panel -->
        <div class="admin-modal relative w-full overflow-hidden animate-in zoom-in-95 duration-200">
          <div class="admin-modal-header">
            <h3 class="admin-modal-title">{{ modalAction }} User</h3>
            <button @click="closeModal" class="admin-modal-close">
              <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M18 6 6 18"/><path d="m6 6 12 12"/></svg>
            </button>
          </div>
          
          <div class="admin-modal-body">
            <div class="flex items-center gap-4 mb-6">
              <div class="w-12 h-12 rounded-full flex items-center justify-center text-white font-bold text-lg shrink-0" :class="selectedUser?.avatarBg">
                {{ selectedUser?.initials }}
              </div>
              <div>
                <p class="text-base font-bold text-slate-900">{{ selectedUser?.name }}</p>
                <p class="text-sm text-slate-500">{{ selectedUser?.email }}</p>
              </div>
            </div>

            <p class="text-sm text-slate-600 mb-6">
              <span v-if="modalAction === 'Suspend'">Anda yakin ingin menangguhkan akun ini? Pengguna tidak akan bisa mengakses platform.</span>
              <span v-else-if="modalAction === 'Activate'">Anda yakin ingin mengaktifkan kembali akun ini?</span>
              <span v-else-if="modalAction === 'Reset Password'">Sistem akan mengirimkan tautan reset password ke email pengguna.</span>
              <span v-else>Formulir {{ modalAction.toLowerCase() }} untuk {{ selectedUser?.name }} akan dimuat di sini (Simulasi fungsional).</span>
            </p>

            <div class="flex items-center justify-end gap-3">
              <button @click="closeModal" class="btn-modal-secondary">Batal</button>
              <button 
                @click="confirmAction" 
                class="btn-modal-primary"
                :class="modalAction === 'Suspend' ? '!bg-rose-600 hover:!bg-rose-700 !shadow-rose-600/25' : ''"
              >
                Konfirmasi {{ modalAction }}
              </button>
            </div>
          </div>
        </div>
      </div>
    </Teleport>
  </div>
</template>

<script setup>
import { ref } from 'vue'

const users = ref([
  { id: 1, name: 'Dr. Sarah R.', email: 'sarah.r@university.edu', role: 'Tutor', status: 'Active', lastActive: '2 mins ago', initials: 'SR', avatarBg: 'bg-gradient-to-br from-[#334EAC] to-[#081F5C]' },
  { id: 2, name: 'Andi Pratama', email: 'andi.p@student.edu', role: 'Pelajar', status: 'Active', lastActive: '1 hour ago', initials: 'AP', avatarBg: 'bg-gradient-to-br from-[#7096D1] to-[#7096D1]' },
  { id: 3, name: 'Budi Santoso', email: 'budi.s@student.edu', role: 'Pelajar', status: 'Suspended', lastActive: '1 week ago', initials: 'BS', avatarBg: 'bg-gradient-to-br from-slate-400 to-slate-500' },
  { id: 4, name: 'Prof. Anderson', email: 'anderson@university.edu', role: 'Tutor', status: 'Active', lastActive: '3 hours ago', initials: 'PA', avatarBg: 'bg-gradient-to-br from-emerald-400 to-teal-500' },
  { id: 5, name: 'Rina Wijaya', email: 'rina.w@student.edu', role: 'Pelajar', status: 'Active', lastActive: '10 mins ago', initials: 'RW', avatarBg: 'bg-gradient-to-br from-rose-400 to-orange-400' },
  { id: 6, name: 'Admin Utama', email: 'admin@fokusin.com', role: 'Admin', status: 'Active', lastActive: 'Just now', initials: 'AU', avatarBg: 'bg-gradient-to-br from-sky-400 to-blue-500' },
])

const isModalOpen = ref(false)
const modalAction = ref('')
const selectedUser = ref(null)

const openModal = (action, user) => {
  modalAction.value = action
  selectedUser.value = user
  isModalOpen.value = true
}

const closeModal = () => {
  isModalOpen.value = false
  setTimeout(() => {
    selectedUser.value = null
    modalAction.value = ''
  }, 300)
}

const confirmAction = () => {
  if (modalAction.value === 'Suspend') {
    selectedUser.value.status = 'Suspended'
  } else if (modalAction.value === 'Activate') {
    selectedUser.value.status = 'Active'
  }
  closeModal()
}
</script>
