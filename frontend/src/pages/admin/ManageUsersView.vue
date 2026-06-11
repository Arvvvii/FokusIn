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
          v-model="searchQuery"
          type="text" 
          class="admin-search-input pl-11 pr-4 py-1.5" 
          placeholder="Cari nama, email..."
        >
      </div>
      <div class="flex items-center gap-2 w-full md:w-auto ml-auto">
        <select v-model="filterRole" class="filter-dropdown appearance-none">
          <option value="">Semua Role</option>
          <option value="Pelajar">Pelajar</option>
          <option value="Tutor">Tutor</option>
          <option value="Admin">Admin</option>
        </select>
        <select v-model="filterStatus" class="filter-dropdown appearance-none">
          <option value="">Semua Status</option>
          <option value="Active">Active</option>
          <option value="Suspended">Suspended</option>
        </select>
      </div>
    </div>

    <!-- Table Container -->
    <!-- Skeleton Loading State -->
    <div v-if="isLoading" class="space-y-4">
      <div v-for="n in 5" :key="n" class="w-full bg-white border border-slate-200/60 rounded-2xl p-5 animate-pulse flex items-center justify-between">
        <div class="flex items-center gap-3 w-1/3">
          <div class="w-9 h-9 rounded-full bg-slate-200"></div>
          <div class="space-y-2 flex-1">
            <div class="h-4 bg-slate-200 rounded w-2/3"></div>
            <div class="h-3 bg-slate-200 rounded w-1/2"></div>
          </div>
        </div>
        <div class="h-6 bg-slate-200 rounded w-20"></div>
        <div class="h-4 bg-slate-200 rounded w-16"></div>
        <div class="h-4 bg-slate-200 rounded w-24"></div>
        <div class="h-8 bg-slate-200 rounded w-28"></div>
      </div>
    </div>

    <!-- Error State with Retry Button -->
    <div v-else-if="errorMsg" class="bg-white border border-slate-200 shadow-sm rounded-2xl p-10 text-center flex flex-col items-center justify-center gap-4">
      <div class="w-12 h-12 rounded-full bg-rose-50 text-rose-500 flex items-center justify-center">
        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="10"/><line x1="12" x2="12" y1="8" y2="12"/><line x1="12" x2="12.01" y1="16" y2="16"/></svg>
      </div>
      <div>
        <h3 class="text-lg font-bold text-slate-900">Gagal memuat data pengguna.</h3>
        <p class="text-sm text-slate-500 mt-1">{{ errorMsg }}</p>
      </div>
      <button @click="loadUsers" class="px-5 py-2 bg-[#081F5C] hover:bg-[#334EAC] text-white text-xs font-bold rounded-xl transition-colors shadow-sm">
        Coba Lagi
      </button>
    </div>

    <!-- Empty State -->
    <div v-else-if="filteredUsers.length === 0" class="bg-white border border-slate-200 shadow-sm rounded-2xl p-10 text-center flex flex-col items-center justify-center gap-4">
      <div class="w-12 h-12 rounded-full bg-slate-50 text-slate-400 flex items-center justify-center">
        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M16 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"/><circle cx="9" cy="7" r="4"/></svg>
      </div>
      <div>
        <h3 class="text-lg font-bold text-slate-900">Tidak ada pengguna ditemukan.</h3>
        <p class="text-sm text-slate-500 mt-1">Gunakan kata kunci atau filter lain untuk memperluas pencarian Anda.</p>
      </div>
    </div>

    <div v-else class="admin-table-container">
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
            <tr v-for="user in filteredUsers" :key="user.id" class="admin-table-row group">
              <td class="px-6 py-4">
                <div class="flex items-center gap-3">
                  <div class="w-9 h-9 rounded-full flex items-center justify-center text-white font-bold text-xs shrink-0" :class="user.avatarBg || 'bg-slate-400'">
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
                <div class="flex items-center justify-end gap-1 md:opacity-0 md:group-hover:opacity-100 transition-opacity">
                  <button class="p-1.5 text-slate-400 bg-slate-50 hover:text-[#334EAC] hover:bg-[#D0E3FF] rounded-lg transition-colors border border-slate-100" title="Edit" @click="openModal('Edit', user)">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M17 3a2.85 2.83 0 1 1 4 4L7.5 20.5 2 22l1.5-5.5Z"/></svg>
                  </button>
                  <button class="p-1.5 text-slate-400 bg-slate-50 hover:text-rose-600 hover:bg-rose-50 rounded-lg transition-colors border border-slate-100" title="Delete" @click="openModal('Delete', user)">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M3 6h18"/><path d="M19 6v14c0 1-1 2-2 2H7c-1 0-2-1-2-2V6"/><path d="M8 6V4c0-1 1-2 2-2h4c1 0 2 1 2 2v2"/></svg>
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
        <span class="text-xs font-medium text-slate-500">Menampilkan {{ filteredUsers.length }} pengguna</span>
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
              <div class="w-12 h-12 rounded-full flex items-center justify-center text-white font-bold text-lg shrink-0" :class="selectedUser?.avatarBg || 'bg-slate-400'">
                {{ selectedUser?.initials }}
              </div>
              <div>
                <p class="text-base font-bold text-slate-900">{{ selectedUser?.name }}</p>
                <p class="text-sm text-slate-500">{{ selectedUser?.email }}</p>
              </div>
            </div>

            <!-- Edit Form mode -->
            <div v-if="modalAction === 'Edit'" class="space-y-4 mb-6">
              <div class="space-y-1">
                <label class="text-xs font-bold text-slate-500 uppercase">Nama Lengkap</label>
                <input v-model="editForm.name" type="text" class="admin-input w-full p-2 border border-slate-200 rounded-lg">
              </div>
              <div class="space-y-1">
                <label class="text-xs font-bold text-slate-500 uppercase">Email</label>
                <input v-model="editForm.email" type="email" class="admin-input w-full p-2 border border-slate-200 rounded-lg">
              </div>
              <div class="space-y-1">
                <label class="text-xs font-bold text-slate-500 uppercase">Role</label>
                <select v-model="editForm.role" class="admin-input w-full p-2 border border-slate-200 rounded-lg">
                  <option value="Pelajar">Pelajar</option>
                  <option value="Tutor">Tutor</option>
                  <option value="Admin">Admin</option>
                </select>
              </div>
            </div>

            <p v-else class="text-sm text-slate-600 mb-6">
              <span v-if="modalAction === 'Suspend'">Anda yakin ingin menangguhkan akun ini? Pengguna tidak akan bisa mengakses platform.</span>
              <span v-else-if="modalAction === 'Activate'">Anda yakin ingin mengaktifkan kembali akun ini?</span>
              <span v-else-if="modalAction === 'Delete'">Anda yakin ingin menghapus permanen akun pengguna ini? Tindakan ini tidak dapat dibatalkan.</span>
            </p>

            <div class="flex items-center justify-end gap-3">
              <button @click="closeModal" class="btn-modal-secondary">Batal</button>
              <button 
                @click="confirmAction" 
                class="btn-modal-primary"
                :class="modalAction === 'Suspend' || modalAction === 'Delete' ? '!bg-rose-600 hover:!bg-rose-700 !shadow-rose-600/25' : ''"
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
import { ref, computed, onMounted, reactive } from 'vue'
import { adminService } from '@/services/admin.service'
import { useToastStore } from '@/stores/toast'

const toastStore = useToastStore()
const users = ref([])
const isLoading = ref(true)
const errorMsg = ref(null)

const searchQuery = ref('')
const filterRole = ref('')
const filterStatus = ref('')

const isModalOpen = ref(false)
const modalAction = ref('')
const selectedUser = ref(null)

const editForm = reactive({
  name: '',
  email: '',
  role: 'Pelajar'
})

const loadUsers = async () => {
  try {
    isLoading.value = true
    errorMsg.value = null
    const response = await adminService.getUsers()
    const rawList = response.data || response || []
    
    users.value = rawList.map(u => {
      const initials = u.name ? u.name.split(' ').map(n => n[0]).join('').substring(0, 2).toUpperCase() : 'U'
      const colors = [
        'bg-gradient-to-br from-[#334EAC] to-[#081F5C]',
        'bg-gradient-to-br from-[#7096D1] to-[#7096D1]',
        'bg-gradient-to-br from-emerald-400 to-teal-500',
        'bg-gradient-to-br from-rose-400 to-orange-400',
        'bg-gradient-to-br from-violet-500 to-indigo-600',
        'bg-gradient-to-br from-sky-400 to-blue-500'
      ]
      const avatarBg = colors[u.id % colors.length]
      
      let mappedRole = u.role || 'Pelajar'
      if (mappedRole.toLowerCase() === 'pelajar') mappedRole = 'Pelajar'
      else if (mappedRole.toLowerCase() === 'tutor') mappedRole = 'Tutor'
      else if (mappedRole.toLowerCase() === 'admin') mappedRole = 'Admin'

      return {
        ...u,
        role: mappedRole,
        status: u.status || 'Active',
        lastActive: u.updated_at ? new Date(u.updated_at).toLocaleDateString('id-ID') : 'Baru saja',
        initials,
        avatarBg
      }
    })
  } catch (err) {
    console.error('Failed to load users:', err)
    errorMsg.value = err.message || 'Gagal memuat data pengguna.'
  } finally {
    isLoading.value = false
  }
}

const filteredUsers = computed(() => {
  return users.value.filter(u => {
    const nameStr = String(u.name || '').toLowerCase()
    const emailStr = String(u.email || '').toLowerCase()
    const matchesSearch = nameStr.includes(searchQuery.value.toLowerCase()) || 
                          emailStr.includes(searchQuery.value.toLowerCase())
    const matchesRole = !filterRole.value || u.role === filterRole.value
    const matchesStatus = !filterStatus.value || u.status === filterStatus.value
    return matchesSearch && matchesRole && matchesStatus
  })
})

const openModal = (action, user) => {
  modalAction.value = action
  selectedUser.value = user
  if (action === 'Edit') {
    editForm.name = user.name
    editForm.email = user.email
    editForm.role = user.role
  }
  isModalOpen.value = true
}

const closeModal = () => {
  isModalOpen.value = false
  setTimeout(() => {
    selectedUser.value = null
    modalAction.value = ''
  }, 300)
}

const confirmAction = async () => {
  if (!selectedUser.value) return
  try {
    if (modalAction.value === 'Suspend') {
      await adminService.updateUser(selectedUser.value.id, { status: 'Suspended' })
      toastStore.success('Akun pengguna berhasil ditangguhkan.')
    } else if (modalAction.value === 'Activate') {
      await adminService.updateUser(selectedUser.value.id, { status: 'Active' })
      toastStore.success('Akun pengguna berhasil diaktifkan kembali.')
    } else if (modalAction.value === 'Delete') {
      await adminService.deleteUser(selectedUser.value.id)
      toastStore.success('Akun pengguna berhasil dihapus secara permanen.')
    } else if (modalAction.value === 'Edit') {
      await adminService.updateUser(selectedUser.value.id, {
        name: editForm.name,
        email: editForm.email,
        role: editForm.role.toLowerCase()
      })
      toastStore.success('Profil pengguna berhasil diperbarui.')
    }
    await loadUsers()
  } catch (err) {
    console.error('Error executing user action:', err)
    toastStore.error(err || 'Gagal mengeksekusi aksi pengguna.')
  } finally {
    closeModal()
  }
}

onMounted(() => {
  loadUsers()
})
</script>
