<template>
  <div class="p-6 md:p-8 xl:p-10 max-w-[1600px] mx-auto animate-in fade-in duration-500">
    
    <!-- Header -->
    <div class="bg-white/60 backdrop-blur-xl rounded-3xl p-7 md:p-8 shadow-[0_10px_40px_rgba(15,23,42,0.06)] border border-slate-200/60 relative overflow-hidden mb-8">
      <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4 relative z-10">
        <div>
          <h1 class="text-3xl md:text-4xl font-extrabold text-slate-900 tracking-tight leading-tight">Materials & Category Management</h1>
          <p class="text-[15px] text-slate-600 font-medium mt-2 max-w-xl leading-relaxed">Kelola taksonomi akademik, kategori materi, forum, dan AI analyzer.</p>
        </div>
        <div class="flex items-center gap-4">
          <button 
            @click="$router.push({ name: 'admin-materials-create' })"
            class="px-5 py-2.5 bg-[#081F5C] text-white rounded-xl font-semibold text-sm shadow-sm hover:bg-[#061746] transition-all"
          >
            + Tambah Kategori
          </button>
        </div>
      </div>
    </div>

    <!-- Category List Section -->
    <div class="bg-white rounded-2xl border border-slate-200 shadow-sm overflow-hidden mb-8">
      <div class="p-6 border-b border-slate-100 flex items-center justify-between">
        <h2 class="text-lg font-bold text-slate-900 tracking-tight">Academic Categories</h2>
      </div>

      <!-- Loading State -->
      <div v-if="loading" class="p-12 space-y-4">
        <div v-for="i in 3" :key="i" class="flex gap-4 animate-pulse">
          <div class="h-10 bg-slate-100 rounded w-1/4"></div>
          <div class="h-10 bg-slate-100 rounded w-1/2"></div>
          <div class="h-10 bg-slate-100 rounded w-1/8 ml-auto"></div>
        </div>
      </div>

      <!-- Error State -->
      <div v-else-if="error" class="p-12 text-center">
        <p class="text-rose-600 font-medium mb-4">{{ error }}</p>
        <button @click="fetchCategories" class="btn-modal-primary px-6 py-2 mx-auto">Coba Lagi</button>
      </div>

      <!-- Empty State -->
      <div v-else-if="categories.length === 0" class="p-12 text-center text-slate-500 font-medium">
        Tidak ada kategori akademik yang tersedia. Klik "+ Tambah Kategori" untuk membuat baru.
      </div>
      
      <div v-else class="overflow-x-auto">
        <table class="w-full text-left border-collapse">
          <thead>
            <tr class="bg-slate-50 border-b border-slate-100">
              <th class="px-6 py-4 text-xs font-bold text-slate-500 uppercase tracking-wider">Group</th>
              <th class="px-6 py-4 text-xs font-bold text-slate-500 uppercase tracking-wider">Category Name</th>
              <th class="px-6 py-4 text-xs font-bold text-slate-500 uppercase tracking-wider">Description</th>
              <th class="px-6 py-4 text-xs font-bold text-slate-500 uppercase tracking-wider text-right">Action</th>
            </tr>
          </thead>
          <tbody class="divide-y divide-slate-100">
            <tr v-for="cat in categories" :key="cat.id" class="hover:bg-slate-50/50 transition-colors">
              <td class="px-6 py-4 text-sm font-bold text-[#081F5C]">{{ cat.group || 'STEM' }}</td>
              <td class="px-6 py-4 text-sm font-bold text-slate-900">{{ cat.name }}</td>
              <td class="px-6 py-4 text-sm text-slate-600 font-medium">{{ cat.description || '-' }}</td>
              <td class="px-6 py-4 text-right">
                <button 
                  @click="openEditModal(cat)"
                  class="px-3 py-1.5 text-xs font-bold text-slate-600 bg-white border border-slate-200 rounded-lg mr-2 hover:bg-slate-50"
                >
                  Edit
                </button>
                <button 
                  @click="handleDelete(cat.id)"
                  class="px-3 py-1.5 text-xs font-bold text-rose-600 bg-rose-50 rounded-lg hover:bg-rose-100"
                >
                  Hapus
                </button>
              </td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>

    <!-- Edit Category Modal -->
    <Teleport to="body">
      <div v-if="isEditModalOpen" class="fixed inset-0 z-50 flex items-center justify-center p-4">
        <div class="absolute inset-0 bg-slate-900/40 backdrop-blur-sm" @click="closeEditModal"></div>
        <div class="admin-modal relative w-full max-w-lg overflow-hidden animate-in zoom-in-95 duration-200 bg-white rounded-2xl shadow-xl border border-slate-200">
          <div class="p-6 border-b border-slate-100 flex items-center justify-between">
            <h3 class="text-lg font-bold text-slate-900">Edit Kategori</h3>
            <button @click="closeEditModal" class="text-slate-400 hover:text-slate-600">
              <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M18 6 6 18"/><path d="m6 6 12 12"/></svg>
            </button>
          </div>
          
          <form @submit.prevent="handleUpdate" class="p-6 space-y-4">
            <div class="space-y-1">
              <label class="text-xs font-bold text-slate-500 uppercase">Nama Kategori</label>
              <input v-model="editForm.name" type="text" required class="admin-input w-full p-2 border border-slate-200 rounded-lg">
            </div>
            <div class="space-y-1">
              <label class="text-xs font-bold text-slate-500 uppercase">Grup Taksonomi</label>
              <select v-model="editForm.group" required class="admin-input w-full p-2 border border-slate-200 rounded-lg">
                <option value="STEM">STEM</option>
                <option value="Social Sciences">Social Sciences</option>
                <option value="Humanities">Humanities</option>
                <option value="Medical & Health">Medical & Health</option>
              </select>
            </div>
            <div class="space-y-1">
              <label class="text-xs font-bold text-slate-500 uppercase">Deskripsi</label>
              <textarea v-model="editForm.description" rows="3" class="admin-input w-full p-2 border border-slate-200 rounded-lg resize-none"></textarea>
            </div>
            
            <div class="flex justify-end gap-3 pt-4 border-t border-slate-100">
              <button type="button" @click="closeEditModal" class="btn-modal-secondary">Batal</button>
              <button type="submit" class="btn-modal-primary" :disabled="submitting">Simpan Perubahan</button>
            </div>
          </form>
        </div>
      </div>
    </Teleport>
  </div>
</template>

<script setup>
import { ref, onMounted } from 'vue'
import { categoryService } from '@/services/category.service'
import { useToastStore } from '@/stores/toast'

const toastStore = useToastStore()
const categories = ref([])
const loading = ref(false)
const error = ref(null)

const isEditModalOpen = ref(false)
const submitting = ref(false)
const selectedCategory = ref(null)
const editForm = ref({ name: '', group: 'STEM', description: '' })

const fetchCategories = async () => {
  loading.value = true
  error.value = null
  try {
    const response = await categoryService.getCategories()
    categories.value = response.data || response || []
  } catch (err) {
    error.value = err
  } finally {
    loading.value = false
  }
}

const handleDelete = async (id) => {
  if (!confirm('Apakah Anda yakin ingin menghapus kategori ini?')) return
  try {
    await categoryService.deleteCategory(id)
    toastStore.success('Kategori berhasil dihapus.')
    fetchCategories()
  } catch (err) {
    toastStore.error(err || 'Gagal menghapus kategori.')
  }
}

const openEditModal = (cat) => {
  selectedCategory.value = cat
  editForm.value = { 
    name: cat.name, 
    group: cat.group || 'STEM', 
    description: cat.description || '' 
  }
  isEditModalOpen.value = true
}

const closeEditModal = () => {
  isEditModalOpen.value = false
  selectedCategory.value = null
}

const handleUpdate = async () => {
  submitting.value = true
  try {
    await categoryService.updateCategory(selectedCategory.value.id, editForm.value)
    toastStore.success('Kategori berhasil diperbarui.')
    closeEditModal()
    fetchCategories()
  } catch (err) {
    toastStore.error(err || 'Gagal memperbarui kategori.')
  } finally {
    submitting.value = false
  }
}

onMounted(() => {
  fetchCategories()
})
</script>
