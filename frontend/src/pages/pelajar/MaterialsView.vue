<template>
  <div class="space-y-6 animate-in fade-in duration-500">
    
    <!-- 1. CONDITIONAL HEADER SECTION -->
    <div 
      :class="[
        route.path.startsWith('/tutor') 
          ? 'bg-white border border-slate-200 shadow-sm rounded-2xl p-7 md:p-8 flex flex-col md:flex-row md:items-center justify-between gap-6 relative' 
          : 'page-header-banner p-6 md:p-8 flex flex-col md:flex-row md:items-center justify-between gap-6 mb-8 relative'
      ]"
    >
      <div 
        :class="[
          route.path.startsWith('/tutor') 
            ? 'absolute right-0 top-0 w-1/3 h-full bg-gradient-to-l from-[#EDF1F6]/50 to-transparent pointer-events-none' 
            : 'absolute right-0 top-0 w-1/3 h-full bg-gradient-to-l from-[#EDF1F6]/80 to-transparent pointer-events-none'
        ]"
      ></div>
      
      <div class="relative z-10 flex items-center gap-4">
        <span 
          :class="[
            route.path.startsWith('/tutor') 
              ? 'w-12 h-12 rounded-2xl bg-[#334EAC]/10 text-[#334EAC] flex items-center justify-center shrink-0' 
              : 'page-header-icon w-12 h-12 flex items-center justify-center shrink-0'
          ]"
        >
          <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M4 19.5v-15A2.5 2.5 0 0 1 6.5 2H20v20H6.5a2.5 2.5 0 0 1 0-5H20"/></svg>
        </span>
        <div>
          <h1 
            :class="[
              route.path.startsWith('/tutor') 
                ? 'text-2xl font-extrabold text-[#081F5C] tracking-tight leading-tight' 
                : 'text-2xl md:text-3xl font-extrabold text-[#081F5C] tracking-tight'
            ]"
          >
            Materi Akademik
          </h1>
          <p 
            :class="[
              route.path.startsWith('/tutor') 
                ? 'text-[13px] text-slate-500 font-medium mt-2 max-w-xl leading-relaxed' 
                : 'text-xs md:text-sm text-[#4A5880]/90 font-medium mt-1.5 max-w-xl leading-relaxed'
            ]"
          >
            Akses perpustakaan catatan kuliah, soal ujian, dan sumber daya akademik terverifikasi yang dikurasi oleh para tutor ahli FokusIn.
          </p>
        </div>
      </div>

      <div v-if="authStore.role === 'tutor' || authStore.role === 'admin'" class="relative z-10 flex shrink-0 w-full md:w-auto">
        <RouterLink 
          :to="`${baseMaterialsRoute}/create`" 
          :class="[
            route.path.startsWith('/tutor')
              ? 'px-5 py-2.5 bg-[#334EAC] hover:bg-[#1E3A8A] text-white rounded-2xl font-bold text-[13px] shadow-sm active:scale-95 transition-all flex items-center justify-center gap-2 w-full md:w-auto'
              : 'btn-solid w-full md:w-auto px-5 py-2.5 flex items-center justify-center gap-2'
          ]"
        >
          <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"/><polyline points="17 8 12 3 7 8"/><line x1="12" x2="12" y1="3" y2="15"/></svg>
          Unggah Materi Baru
        </RouterLink>
      </div>
    </div>

    <!-- 2. Search & Filter Section -->
    <div class="card-panel filter-bar p-5 md:p-6 mb-10 space-y-5 transition-all duration-300 ease-out group">
      
      <!-- Top Row: Search & Format -->
      <div class="flex flex-col md:flex-row gap-4">
        <!-- Search -->
        <div class="relative flex-1">
          <div class="absolute inset-y-0 left-0 pl-5 flex items-center pointer-events-none text-slate-400">
            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><circle cx="11" cy="11" r="8"/><path d="m21 21-4.3-4.3"/></svg>
          </div>
          <input type="text" v-model="searchQuery" class="w-full pl-14 pr-5 py-3.5 bg-slate-50 hover:bg-white border border-slate-200 hover:border-slate-300 rounded-2xl text-[14px] font-bold text-slate-900 placeholder-slate-400 focus:outline-none focus:ring-4 focus:ring-[#334EAC]/10 focus:border-[#334EAC] transition-all" placeholder="Cari materi, topik, atau tutor...">
        </div>

        <!-- File Type -->
        <div class="relative min-w-[180px]">
          <select v-model="selectedFileType" class="w-full pl-5 pr-10 py-3.5 bg-slate-50 hover:bg-white border border-slate-200 hover:border-slate-300 rounded-2xl text-[14px] font-bold text-slate-900 appearance-none focus:outline-none focus:ring-4 focus:ring-[#334EAC]/10 focus:border-[#334EAC] transition-all cursor-pointer">
            <option value="">Semua Format</option>
            <option value="pdf">PDF</option>
            <option value="docx">DOCX</option>
            <option value="video">VIDEO</option>
          </select>
          <div class="absolute inset-y-0 right-0 pr-5 flex items-center pointer-events-none text-slate-400">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"><path d="m6 9 6 6 6-6"/></svg>
          </div>
        </div>

        <!-- Reset Button -->
        <button @click="resetFilters" class="px-6 py-3.5 bg-slate-100 hover:bg-slate-200 text-slate-700 rounded-2xl font-bold text-[14px] transition-all shadow-sm active:scale-95 shrink-0 flex items-center justify-center gap-2">
          <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M3 12a9 9 0 0 1 9-9 9.75 9.75 0 0 1 6.74 2.74L21 8"/><path d="M16 3h5v5"/><path d="M21 12a9 9 0 0 1-9 9 9.75 9.75 0 0 1-6.74-2.74L3 16"/><path d="M8 21H3v-5"/></svg>
          Reset Filter
        </button>
      </div>

      <!-- Bottom Row: 3-Step Academic Dropdowns -->
      <div class="grid grid-cols-1 md:grid-cols-3 gap-4 pt-4 border-t border-slate-200/60">
        <!-- Jurusan -->
        <div class="space-y-1.5">
          <label class="text-[10px] font-extrabold text-slate-400 uppercase tracking-widest ml-1">Jurusan</label>
          <div class="relative">
            <select v-model="selectedJurusan" class="w-full pl-5 pr-10 py-3 bg-slate-50 hover:bg-white border border-slate-200 hover:border-slate-300 rounded-2xl text-[13px] font-bold text-slate-900 appearance-none focus:outline-none focus:ring-4 focus:ring-[#334EAC]/10 focus:border-[#334EAC] transition-all cursor-pointer">
              <option value="">Semua Jurusan</option>
              <option value="Teknologi Rekayasa Instrumentasi dan Kontrol (TRIK)">Teknologi Rekayasa Instrumentasi &amp; Kontrol (TRIK)</option>
              <option value="Kearsipan dan Informasi Digital (KID)">Kearsipan dan Informasi Digital (KID)</option>
              <option value="Teknik Informatika">Teknik Informatika</option>
            </select>
            <div class="absolute inset-y-0 right-0 pr-4 flex items-center pointer-events-none text-slate-400">
              <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"><path d="m6 9 6 6 6-6"/></svg>
            </div>
          </div>
        </div>

        <!-- Semester -->
        <div class="space-y-1.5">
          <label class="text-[10px] font-extrabold uppercase tracking-widest ml-1 transition-colors" :class="selectedJurusan ? 'text-slate-400' : 'text-slate-300'">Semester</label>
          <div class="relative">
            <select v-model="selectedSemester" :disabled="!selectedJurusan" class="w-full pl-5 pr-10 py-3 bg-slate-50 hover:bg-white border border-slate-200 hover:border-slate-300 rounded-2xl text-[13px] font-bold text-slate-900 appearance-none focus:outline-none focus:ring-4 focus:ring-[#334EAC]/10 focus:border-[#334EAC] transition-all cursor-pointer disabled:opacity-40 disabled:cursor-not-allowed">
              <option value="">Semua Semester</option>
              <option v-for="i in 6" :key="i" :value="i">Semester {{ i }}</option>
            </select>
            <div class="absolute inset-y-0 right-0 pr-4 flex items-center pointer-events-none text-slate-400">
              <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"><path d="m6 9 6 6 6-6"/></svg>
            </div>
          </div>
        </div>

        <!-- Mata Kuliah -->
        <div class="space-y-1.5">
          <label class="text-[10px] font-extrabold uppercase tracking-widest ml-1 transition-colors" :class="selectedSemester ? 'text-slate-400' : 'text-slate-300'">Mata Kuliah</label>
          <div class="relative">
            <select v-model="selectedCategory" :disabled="!selectedSemester" class="w-full pl-5 pr-10 py-3 bg-slate-50 hover:bg-white border border-slate-200 hover:border-slate-300 rounded-2xl text-[13px] font-bold text-slate-900 appearance-none focus:outline-none focus:ring-4 focus:ring-[#334EAC]/10 focus:border-[#334EAC] transition-all cursor-pointer disabled:opacity-40 disabled:cursor-not-allowed">
              <option value="">Semua Mata Kuliah</option>
              <option v-for="cat in filteredCategories" :key="cat.id" :value="cat.id">{{ cat.name }}</option>
            </select>
            <div class="absolute inset-y-0 right-0 pr-4 flex items-center pointer-events-none text-slate-400">
              <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"><path d="m6 9 6 6 6-6"/></svg>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- 3. Material Grid -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6 lg:gap-8">
      
      <!-- Loading State -->
      <div v-if="loading" v-for="n in 4" :key="n" class="card-base flex flex-col h-full opacity-70 animate-pulse">
        <div class="w-full h-44 bg-slate-200 rounded-2xl mb-5"></div>
        <div class="h-4 bg-slate-200 rounded w-1/3 mb-2"></div>
        <div class="h-6 bg-slate-200 rounded w-full mb-2"></div>
        <div class="h-6 bg-slate-200 rounded w-2/3 mb-6"></div>
        <div class="flex items-center gap-2 mt-auto pt-3 border-t border-slate-100">
          <div class="w-6 h-6 rounded-full bg-slate-200"></div>
          <div class="h-4 bg-slate-200 rounded w-1/2"></div>
        </div>
      </div>

      <!-- Error State -->
      <div v-else-if="error" class="col-span-full py-12 flex flex-col items-center justify-center bg-rose-50/50 border border-rose-100 rounded-3xl p-8">
        <div class="w-16 h-16 rounded-full bg-rose-100 text-rose-600 flex items-center justify-center mb-4">
          <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
            <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" />
          </svg>
        </div>
        <h3 class="text-lg font-bold text-rose-950 mb-2">Gagal Memuat Data</h3>
        <p class="text-sm text-rose-800 text-center max-w-md mb-6">{{ error }}</p>
        <button @click="fetchMaterials" class="px-6 py-2.5 bg-[#334EAC] hover:bg-[#081F5C] text-white rounded-xl font-bold text-xs shadow-sm transition-all active:scale-95">
          Coba Lagi
        </button>
      </div>

      <!-- Empty State -->
      <div v-else-if="filteredMaterials.length === 0" class="col-span-full">
        <EmptyState
          title="Tidak Ada Materi"
          description="Tidak ditemukan materi akademik yang cocok dengan kriteria pencarian Anda."
        >
          <template #icon>
            <svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12 text-[#334EAC]" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
              <path stroke-linecap="round" stroke-linejoin="round" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253" />
            </svg>
          </template>
        </EmptyState>
      </div>

      <!-- Materials List -->
      <RouterLink 
        v-else
        v-for="material in filteredMaterials" 
        :key="material.id" 
        :to="`${baseMaterialsRoute}/${material.id}`" 
        class="card-base card-supporting group flex flex-col h-full cursor-pointer block"
      >
        <div 
          :class="[
            'material-thumb w-full h-44 rounded-2xl mb-5 relative overflow-hidden',
            getFileType(material.file_url) === 'pdf' ? 'material-pdf' : 
            getFileType(material.file_url) === 'docx' ? 'material-docx' : 'material-vid'
          ]"
        >
          <div class="absolute inset-0 flex flex-col items-center justify-center text-slate-400 group-hover:scale-105 transition-transform duration-500">
            <svg v-if="getFileType(material.file_url) !== 'video'" xmlns="http://www.w3.org/2000/svg" width="48" height="48" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="mb-2"><path d="M14.5 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V7.5L14.5 2z"/><polyline points="14 2 14 8 20 8"/></svg>
            <svg v-else xmlns="http://www.w3.org/2000/svg" width="48" height="48" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="mb-2"><polygon points="5 3 19 12 5 21 5 3"/></svg>
          </div>
          <div 
            :class="[
              'absolute top-3 right-3 format-badge px-2.5 py-1 rounded-lg tag-content-type',
              getFileType(material.file_url) === 'pdf' ? 'badge-pdf' : 
              getFileType(material.file_url) === 'docx' ? 'badge-docx' : 'badge-vid'
            ]"
          >
            {{ getFileType(material.file_url).toUpperCase() }}
          </div>
        </div>

        <div class="flex-1 flex flex-col">
          <span class="text-[#334EAC] text-[10px] font-bold uppercase tracking-widest mb-2">
            {{ material.category?.name || 'Materi' }}
          </span>
          <h3 class="text-[16px] font-bold text-slate-900 mb-2 leading-snug group-hover:text-[#334EAC] transition-colors line-clamp-2 tracking-tight">
            {{ material.title }}
          </h3>
          
          <div class="flex items-center gap-2 mb-4 mt-auto pt-3">
            <div class="w-6 h-6 rounded-full bg-[#EDF1F6] flex items-center justify-center font-bold text-slate-900 text-[10px] border border-slate-200">
              {{ getInitials(material.user?.name) }}
            </div>
            <span class="text-[12px] font-bold text-slate-500">{{ material.user?.name || 'Tutor' }}</span>
          </div>

          <div class="flex items-center justify-between pt-4 border-t border-slate-100/80">
            <div class="flex items-center gap-1.5 text-slate-400">
              <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"/><polyline points="7 10 12 15 17 10"/><line x1="12" x2="12" y1="15" y2="3"/></svg>
              <span class="text-[12px] font-bold">120</span>
            </div>
            <div class="text-[#334EAC] font-bold text-[13px] hover:text-[#081F5C] transition-colors flex items-center gap-1">
              Buka <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"><path d="m9 18 6-6-6-6"/></svg>
            </div>
          </div>
        </div>
      </RouterLink>

    </div>

    <!-- Success Toast -->
    <Teleport to="body">
      <div v-if="showSuccess" class="fixed bottom-6 right-6 z-[100] bg-emerald-500 text-white px-6 py-4 rounded-2xl shadow-[0_10px_40px_rgba(16,185,129,0.3)] flex items-center gap-3 animate-in slide-in-from-bottom-5">
        <div class="w-8 h-8 bg-white/20 rounded-full flex items-center justify-center shrink-0">
          <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"><polyline points="20 6 9 17 4 12"/></svg>
        </div>
        <div>
          <h4 class="font-extrabold text-sm">Filter Diterapkan</h4>
          <p class="text-xs text-emerald-100 font-medium">Menampilkan materi sesuai kriteria.</p>
        </div>
      </div>
    </Teleport>
  </div>
</template>

<script setup>
import { ref, computed, onMounted, watch } from 'vue'
import { RouterLink, useRoute } from 'vue-router'
import { materialService } from '@/services/material.service'
import { useAuthStore } from '@/stores/auth'
import EmptyState from '@/components/shared/EmptyState.vue'

const route = useRoute()
const authStore = useAuthStore()
const baseMaterialsRoute = computed(() => {
  return route.path.startsWith('/tutor') ? '/tutor/materials' : '/pelajar/materials'
})

const searchQuery = ref('')
const selectedJurusan = ref('')
const selectedSemester = ref('')
const selectedCategory = ref('')
const selectedFileType = ref('')
const isFiltering = ref(false)
const showSuccess = ref(false)

const loading = ref(false)
const error = ref(null)
const categories = ref([])
const materials = ref([])

let isInitializing = false

const filteredCategories = computed(() => {
  return categories.value.filter(c => 
    c.jurusan === selectedJurusan.value && 
    String(c.semester) === String(selectedSemester.value)
  )
})

watch(selectedJurusan, () => {
  if (isInitializing) return
  selectedSemester.value = ''
  selectedCategory.value = ''
})

watch(selectedSemester, () => {
  if (isInitializing) return
  selectedCategory.value = ''
})

const fetchCategories = async () => {
  try {
    const res = await materialService.getCategories()
    categories.value = res
  } catch (err) {
    console.error('Gagal mengambil kategori:', err)
  }
}

const fetchMaterials = async () => {
  loading.value = true
  error.value = null
  try {
    const params = {}
    if (selectedCategory.value) {
      params.category_id = selectedCategory.value
    } else {
      if (selectedJurusan.value) {
        params.jurusan = selectedJurusan.value
      }
      if (selectedSemester.value) {
        params.semester = selectedSemester.value
      }
    }
    const res = await materialService.getMaterials(params)
    // Laravel paginated list structure has data field containing the items
    materials.value = res.data || []
  } catch (err) {
    error.value = err
  } finally {
    loading.value = false
  }
}

watch([selectedJurusan, selectedSemester, selectedCategory], () => {
  if (isInitializing) return
  fetchMaterials()
})

onMounted(async () => {
  isInitializing = true
  await fetchCategories()
  
  if (route.query.category_id) {
    selectedJurusan.value = route.query.jurusan || ''
    selectedSemester.value = route.query.semester ? Number(route.query.semester) : ''
    selectedCategory.value = route.query.category_id ? Number(route.query.category_id) : ''
  }
  
  await fetchMaterials()
  isInitializing = false
})

const filteredMaterials = computed(() => {
  return materials.value.filter(material => {
    const matchSearch = !searchQuery.value || 
      material.title.toLowerCase().includes(searchQuery.value.toLowerCase()) ||
      (material.user?.name && material.user.name.toLowerCase().includes(searchQuery.value.toLowerCase()))
    
    let matchCat = true
    if (selectedCategory.value) {
      matchCat = String(material.category_id) === String(selectedCategory.value)
    } else if (selectedSemester.value) {
      matchCat = material.category?.jurusan === selectedJurusan.value && 
                 String(material.category?.semester) === String(selectedSemester.value)
    } else if (selectedJurusan.value) {
      matchCat = material.category?.jurusan === selectedJurusan.value
    }
    
    let matchType = true
    if (selectedFileType.value) {
      const type = getFileType(material.file_url)
      matchType = type === selectedFileType.value
    }
    
    return matchSearch && matchCat && matchType
  })
})

const getFileType = (fileUrl) => {
  if (!fileUrl) return 'pdf'
  const ext = fileUrl.split('.').pop().toLowerCase()
  if (ext === 'pdf') return 'pdf'
  if (ext === 'docx' || ext === 'doc') return 'docx'
  if (['mp4', 'mkv', 'avi', 'mov', 'webm'].includes(ext)) return 'video'
  return 'pdf'
}

const getInitials = (name) => {
  if (!name) return 'U'
  return name.split(' ').map(n => n[0]).join('').substring(0, 2).toUpperCase()
}

const applyFilter = () => {
  isFiltering.value = true
  setTimeout(() => {
    isFiltering.value = false
    showSuccess.value = true
    setTimeout(() => {
      showSuccess.value = false
    }, 3000)
  }, 600)
}

const resetFilters = () => {
  searchQuery.value = ''
  selectedJurusan.value = ''
  selectedSemester.value = ''
  selectedCategory.value = ''
  selectedFileType.value = ''
}
</script>

<style scoped>
/* Materials Specific Adjustments */
.filter-bar {
  background: linear-gradient(135deg, rgba(255,255,255,0.7), rgba(237,241,246,0.6));
  box-shadow: 0 4px 15px rgba(8,31,92,0.05);
}
.material-thumb {
  border: 1px solid rgba(112, 150, 209, 0.2);
}
.material-pdf { background: linear-gradient(135deg, #FFF0F0, #FEE2E2); color: #F43F5E; }
.material-docx { background: linear-gradient(135deg, #F0F9FF, #E0F2FE); color: #0EA5E9; }
.material-vid { background: linear-gradient(135deg, #ECFDF5, #D1FAE5); color: #10B981; }

.format-badge {
  background: white;
  box-shadow: 0 2px 6px rgba(0,0,0,0.06);
}
.badge-pdf { color: #F43F5E; }
.badge-docx { color: #0EA5E9; }
.badge-vid { color: #10B981; }
</style>
