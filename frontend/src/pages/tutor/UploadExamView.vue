<template>
  <div class="space-y-8 w-full">
    

    <!-- 1. EDITORIAL WORKSPACE HEADER SECTION -->
    <div class="bg-white border border-slate-200 shadow-sm rounded-2xl p-7 md:p-8 flex flex-col md:flex-row md:items-center justify-between gap-6 relative">
      <div class="absolute right-0 top-0 w-1/3 h-full bg-gradient-to-l from-[#EDF1F6]/50 to-transparent pointer-events-none"></div>
      
      <div class="relative z-10 flex items-center gap-4">
        <span class="w-12 h-12 rounded-2xl bg-[#334EAC]/10 text-[#334EAC] flex items-center justify-center shrink-0">
          <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"/><polyline points="17 8 12 3 7 8"/><line x1="12" x2="12" y1="3" y2="15"/></svg>
        </span>
        <div>
          <h1 class="text-2xl font-extrabold text-[#081F5C] tracking-tight leading-tight">Upload Arsip Soal</h1>
          <p class="text-[13px] text-slate-500 font-medium mt-2 max-w-xl leading-relaxed">
            Unggah berkas ujian, kuis, atau tugas mandiri. AI kami akan secara otomatis memindai teks, mendeteksi mata kuliah, dan memformat materi.
          </p>
        </div>
      </div>

      <div class="relative z-10 flex shrink-0 gap-2">
        <button @click.prevent class="btn-outline">
          Simpan Draft
        </button>
        <button @click="handleUpload" :disabled="isUploading" class="btn-solid disabled:opacity-75">
          <span v-if="isUploading">Memproses...</span>
          <span v-else class="flex items-center gap-2">
            Mulai Ekstraksi
            <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M5 12h14"/><path d="m12 5 7 7-7 7"/></svg>
          </span>
        </button>
      </div>
    </div>

    <!-- 2. STRUCTURAL ASYMMETRIC GRID -->
    <div class="grid grid-cols-1 lg:grid-cols-[minmax(0,1fr)_380px] gap-8 items-start w-full">
      
      <!-- LEFT WORKSPACE: DRAG-DROP & INFO -->
      <div class="space-y-8 flex-1 self-stretch">
        
        <!-- Drag & Drop Box -->
        <div 
          @click="selectFile" 
          @dragover.prevent="handleDragOver"
          @dragleave.prevent="handleDragLeave"
          @drop.prevent="handleDrop"
          :class="['upload-zone', isDragActive ? 'drag-active' : '']"
        >
          <input 
            type="file" 
            ref="fileInput" 
            accept="application/pdf" 
            class="hidden" 
            @click.stop
            @change="onFileChange" 
          />
          <div class="w-14 h-14 rounded-2xl bg-[#F7F2EB] text-[#334EAC] flex items-center justify-center mb-4 group-hover:scale-105 transition-transform border border-[#D0E3FF]">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M14.5 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V7.5L14.5 2z"/><polyline points="14 2 14 8 20 8"/></svg>
          </div>
          
          <h3 class="text-base font-bold text-slate-900 mb-1">
            {{ selectedFile ? selectedFile.name : 'Tarik & Lepas File Ujian di Sini' }}
          </h3>
          
          <p class="text-xs text-slate-400 text-center max-w-sm">
            {{ selectedFile ? `Ukuran: ${formatSize(selectedFile.size)}` : 'Mendukung berkas PDF hingga 10MB.' }}
          </p>
          
          <div class="mt-5 px-5 py-2.5 bg-white border border-slate-200 text-slate-800 rounded-xl text-xs font-bold shadow-sm flex items-center gap-2 hover:border-[#7096D1] transition-all">
            <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"/><polyline points="17 8 12 3 7 8"/><line x1="12" x2="12" y1="3" y2="15"/></svg>
            {{ selectedFile ? 'Ganti Dokumen' : 'Pilih Berkas Komputer' }}
          </div>
        </div>

        <!-- Info Form -->
        <div class="form-card">
          <h3 class="text-base font-bold text-slate-950 flex items-center gap-2 border-b border-slate-100 pb-4">
             <span class="w-8 h-8 rounded-xl bg-slate-50 border border-slate-200 flex items-center justify-center text-[#334EAC]">
               <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><rect width="18" height="18" x="3" y="4" rx="2" ry="2"/><line x1="16" x2="16" y1="2" y2="6"/><line x1="8" x2="8" y1="2" y2="6"/><line x1="3" x2="21" y1="10" y2="10"/></svg>
             </span>
             Metadata Bank Soal
          </h3>

          <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div class="space-y-2">
              <label class="text-[11px] font-bold text-slate-400 uppercase tracking-wider ml-1">Jurusan</label>
              <select v-model="selectedJurusan" class="input-field">
                <option value="">Pilih Jurusan</option>
                <option value="Teknologi Rekayasa Instrumentasi dan Kontrol (TRIK)">TRIK</option>
                <option value="Kearsipan dan Informasi Digital (KID)">KID</option>
                <option value="Teknik Informatika">Teknik Informatika</option>
              </select>
            </div>

            <div class="space-y-2">
              <label class="text-[11px] font-bold text-slate-400 uppercase tracking-wider ml-1">Semester</label>
              <select v-model="selectedSemester" :disabled="!selectedJurusan" class="input-field disabled:opacity-50 disabled:cursor-not-allowed">
                <option value="">Pilih Semester</option>
                <option v-for="i in 6" :key="i" :value="i">Semester {{ i }}</option>
              </select>
            </div>
            
            <div class="space-y-2 md:col-span-2">
              <label class="text-[11px] font-bold text-slate-400 uppercase tracking-wider ml-1">Mata Kuliah</label>
              <select v-model="selectedCategoryId" :disabled="!selectedSemester" class="input-field disabled:opacity-50 disabled:cursor-not-allowed">
                <option value="" disabled selected>Pilih Mata Kuliah</option>
                <option v-for="cat in filteredCategories" :key="cat.id" :value="cat.id">{{ cat.name }}</option>
              </select>
            </div>
          </div>

          <div class="space-y-3">
            <label class="text-[11px] font-bold text-slate-400 uppercase tracking-wider ml-1">Kategori Ujian</label>
            <div class="flex flex-wrap gap-2.5">
              <button 
                v-for="cat in ['UAS', 'UTS', 'Kuis', 'Latihan']"
                :key="cat"
                @click="selectedCategory = cat"
                :class="['category-btn', selectedCategory === cat ? 'active' : '']"
              >
                {{ cat }}
              </button>
            </div>
          </div>
        </div>
      </div>

      <!-- RIGHT SIDEBAR: OCR PERFORMANCE & HISTORY -->
      <div class="space-y-6 w-full shrink-0 lg:w-[380px]">
        <!-- AI OCR Preview Details -->
        <div class="bg-white rounded-3xl p-6 border border-slate-200/60 shadow-sm space-y-4">
          <h3 class="text-sm font-bold text-slate-900 flex items-center gap-2">
            <span class="w-6 h-6 rounded-lg bg-emerald-50 text-emerald-600 flex items-center justify-center"><svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M12 2v20"/><path d="m17 5-5-3-5 3"/><path d="m17 19-5 3-5-3"/></svg></span>
            Kecerdasan Ekstraksi FokusIn
          </h3>
          <p class="text-xs text-slate-500 leading-relaxed">
            AI secara otomatis mengidentifikasi struktur teks, mengecek tata bahasa akademis, dan menandai topik materi yang sesuai dengan RPS dosen.
          </p>
          <div class="pt-3 border-t border-slate-100 flex items-center justify-between text-xs font-semibold">
            <span class="text-slate-400">Rata-rata Akurasi</span>
            <span class="text-emerald-600 font-bold">98.4% Terjaga</span>
          </div>
        </div>

        <!-- Validation Quick Links -->
        <div class="bg-white rounded-3xl p-6 border border-slate-200/60 shadow-sm space-y-4">
          <h4 class="text-[11px] font-bold text-slate-400 uppercase tracking-widest">Tindakan Cepat</h4>
          <RouterLink to="/tutor/ai-validation" class="py-3 px-4 bg-[#334EAC] hover:bg-[#081F5C] text-white rounded-2xl font-bold text-xs transition-all flex items-center justify-center gap-2 shadow-sm text-center">
            Buka Antrean Validasi AI
            <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M5 12h14"/><path d="m12 5 7 7-7 7"/></svg>
          </RouterLink>
        </div>
      </div>

    </div>

    <!-- Feedback Toast -->
    <div v-if="showSuccess" class="fixed bottom-6 right-6 z-50 bg-[#334EAC] text-white px-6 py-4 rounded-2xl shadow-xl flex items-center gap-3 animate-in slide-in-from-bottom-5">
      <div class="w-8 h-8 bg-white/20 rounded-full flex items-center justify-center shrink-0">
        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"><polyline points="20 6 9 17 4 12"/></svg>
      </div>
      <div>
        <h4 class="font-bold text-sm">Berhasil!</h4>
        <p class="text-xs text-[#D0E3FF] font-medium">Dokumen berhasil disubmit ke antrean AI validation.</p>
      </div>
    </div>

    <!-- Error Toast -->
    <div v-if="showError" class="fixed bottom-6 right-6 z-50 bg-red-600 text-white px-6 py-4 rounded-2xl shadow-xl flex items-center gap-3 animate-in slide-in-from-bottom-5">
      <div class="w-8 h-8 bg-white/20 rounded-full flex items-center justify-center shrink-0">
        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg>
      </div>
      <div>
        <h4 class="font-bold text-sm">Gagal!</h4>
        <p class="text-xs text-red-100 font-medium">{{ errorMessage || 'Gagal mengunggah berkas.' }}</p>
      </div>
    </div>

  </div>
</template>

<script setup>
import { ref, onMounted, computed, watch } from 'vue'
import { useRouter, RouterLink } from 'vue-router'
import { forumService } from '@/services/forum.service'
import { examUploadService } from '@/services/examUpload.service'

const router = useRouter()
const selectedFile = ref(null)
const categories = ref([])
const selectedCategoryId = ref('')
const selectedJurusan = ref('Teknik Informatika') // Set default based on seed
const selectedSemester = ref(1) // Set default based on seed
const selectedCategory = ref('UAS')
const isUploading = ref(false)
const showSuccess = ref(false)
const showError = ref(false)
const errorMessage = ref('')

const filteredCategories = computed(() => {
  return categories.value.filter(c => 
    c.jurusan === selectedJurusan.value && 
    c.semester === selectedSemester.value
  )
})

watch([selectedJurusan, selectedSemester], () => {
  if (filteredCategories.value.length > 0) {
    selectedCategoryId.value = filteredCategories.value[0].id
  } else {
    selectedCategoryId.value = ''
  }
})

const fetchCategories = async () => {
  try {
    const data = await forumService.getCategories()
    categories.value = data || []
    if (filteredCategories.value.length > 0) {
      selectedCategoryId.value = filteredCategories.value[0].id
    }
  } catch (err) {
    console.error('Gagal mengambil data kategori:', err)
  }
}

onMounted(() => {
  fetchCategories()
})

const fileInput = ref(null)
const isDragActive = ref(false)

const selectFile = () => {
  if (fileInput.value) {
    fileInput.value.click()
  }
}

const onFileChange = (e) => {
  if (e.target.files && e.target.files.length > 0) {
    const file = e.target.files[0]
    if (file.type === 'application/pdf' || file.name.endsWith('.pdf')) {
      selectedFile.value = file
    } else {
      errorMessage.value = 'Hanya mendukung berkas format PDF.'
      triggerErrorToast()
    }
  }
}

const handleDragOver = (e) => {
  e.preventDefault()
  isDragActive.value = true
}

const handleDragLeave = () => {
  isDragActive.value = false
}

const handleDrop = (e) => {
  e.preventDefault()
  isDragActive.value = false
  if (e.dataTransfer.files && e.dataTransfer.files.length > 0) {
    const file = e.dataTransfer.files[0]
    if (file.type === 'application/pdf' || file.name.endsWith('.pdf')) {
      selectedFile.value = file
    } else {
      errorMessage.value = 'Hanya mendukung berkas format PDF.'
      triggerErrorToast()
    }
  }
}

const formatSize = (bytes) => {
  if (bytes === 0) return '0 Bytes'
  const k = 1024
  const sizes = ['Bytes', 'KB', 'MB', 'GB']
  const i = Math.floor(Math.log(bytes) / Math.log(k))
  return parseFloat((bytes / Math.pow(k, i)).toFixed(2)) + ' ' + sizes[i]
}

const triggerErrorToast = () => {
  showError.value = true
  setTimeout(() => {
    showError.value = false
  }, 4000)
}

const handleUpload = async () => {
  if (!selectedFile.value) {
    errorMessage.value = 'Harap pilih berkas terlebih dahulu.'
    triggerErrorToast()
    return
  }

  isUploading.value = true
  showSuccess.value = false
  showError.value = false

  try {
    const formData = new FormData()
    formData.append('category_id', selectedCategoryId.value.toString())
    formData.append('file', selectedFile.value)

    await examUploadService.createExamUpload(formData)

    showSuccess.value = true
    setTimeout(() => {
      showSuccess.value = false
      router.push('/tutor/ai-validation')
    }, 1500)
  } catch (error) {
    console.error('Upload failed:', error)
    errorMessage.value = error.response?.data?.message || error.message || 'Gagal mengunggah berkas.'
    triggerErrorToast()
  } finally {
    isUploading.value = false
  }
}
</script>
