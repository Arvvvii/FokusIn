<template>
  <div class="p-6 md:p-8 xl:p-10 max-w-4xl mx-auto animate-in fade-in duration-500">
    
    <!-- Back Navigation -->
    <div class="mb-6 flex items-center gap-2">
      <RouterLink
        to="/admin/materials"
        class="text-sm font-bold text-slate-400 hover:text-[#334EAC] transition-colors flex items-center gap-1 w-fit bg-white/50 px-3 py-1.5 rounded-lg border border-slate-200/50"
      >
        ← Kembali ke Daftar Kategori
      </RouterLink>
    </div>

    <!-- Header -->
    <div class="admin-dashboard-hero mb-8">
      <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4 relative z-10">
        <div class="flex items-center gap-4">
          <div>
            <h1 class="text-3xl md:text-4xl font-extrabold text-slate-900 tracking-tight leading-tight">Tambah Kategori</h1>
            <p class="text-[15px] text-slate-600 font-medium mt-2 max-w-xl leading-relaxed">Buat kategori baru untuk klasifikasi materi, forum, dan AI analyzer.</p>
          </div>
        </div>
      </div>
    </div>

    <!-- Form Section -->
    <div class="admin-card p-6 md:p-8">
      <h3 class="settings-form-title border-b border-slate-100 pb-4">Detail Kategori</h3>
      <form @submit.prevent="submitForm" class="space-y-6">
        
        <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
          <div class="space-y-2">
            <label class="admin-label">Nama Kategori</label>
            <input 
              v-model="form.name"
              type="text" 
              required
              class="admin-input"
              placeholder="Contoh: Kalkulus Lanjut"
              :disabled="submitting"
            >
          </div>
          <div class="space-y-2">
            <label class="admin-label">Grup Taksonomi</label>
            <select 
              v-model="form.group"
              required
              class="admin-input appearance-none cursor-pointer"
              :disabled="submitting"
            >
              <option value="STEM">STEM</option>
              <option value="Social Sciences">Social Sciences</option>
              <option value="Humanities">Humanities</option>
              <option value="Medical & Health">Medical & Health</option>
            </select>
          </div>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 gap-6 mt-6">
          <div class="space-y-2">
            <label class="admin-label">Jurusan (Opsional)</label>
            <select 
              v-model="form.jurusan"
              class="admin-input appearance-none cursor-pointer"
              :disabled="submitting"
            >
              <option value="">-- Pilih Jurusan --</option>
              <option value="Teknologi Rekayasa Instrumentasi dan Kontrol (TRIK)">Teknologi Rekayasa Instrumentasi dan Kontrol (TRIK)</option>
              <option value="Kearsipan dan Informasi Digital (KID)">Kearsipan dan Informasi Digital (KID)</option>
              <option value="Teknik Informatika">Teknik Informatika</option>
            </select>
          </div>
          <div class="space-y-2">
            <label class="admin-label">Semester (Opsional)</label>
            <select 
              v-model="form.semester"
              class="admin-input appearance-none cursor-pointer"
              :disabled="submitting"
            >
              <option value="">-- Pilih Semester --</option>
              <option v-for="i in 8" :key="i" :value="i">Semester {{ i }}</option>
            </select>
          </div>
        </div>

        <div class="space-y-2 mt-6">
          <label class="admin-label">Deskripsi Kategori</label>
          <textarea 
            v-model="form.description"
            rows="4"
            class="admin-input resize-none"
            placeholder="Deskripsi opsional terkait kategori ini"
            :disabled="submitting"
          ></textarea>
        </div>

        <!-- Actions -->
        <div class="pt-6 border-t border-slate-100 flex items-center justify-end gap-3">
          <button 
            type="button"
            @click="$router.push({ name: 'admin-materials' })"
            class="text-sm font-medium h-10 px-5 rounded-xl bg-white border border-slate-200 text-slate-600 hover:bg-slate-50 transition-colors shadow-sm"
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
            {{ submitting ? 'Menyimpan...' : 'Simpan Kategori' }}
          </button>
        </div>
        
      </form>
    </div>
  </div>
</template>

<script setup>
import { reactive, ref } from 'vue'
import { useRouter } from 'vue-router'
import { categoryService } from '@/services/category.service'
import { useToastStore } from '@/stores/toast'

const router = useRouter()
const toastStore = useToastStore()
const submitting = ref(false)

const form = reactive({
  name: '',
  group: 'STEM',
  description: '',
  jurusan: '',
  semester: ''
})

const submitForm = async () => {
  submitting.value = true
  try {
    await categoryService.createCategory({
      name: form.name,
      group: form.group,
      description: form.description,
      jurusan: form.jurusan || null,
      semester: form.semester ? parseInt(form.semester) : null
    })
    toastStore.success('Kategori baru berhasil dibuat!')
    router.push({ name: 'admin-materials' })
  } catch (err) {
    toastStore.error(err || 'Gagal membuat kategori.')
  } finally {
    submitting.value = false
  }
}
</script>
