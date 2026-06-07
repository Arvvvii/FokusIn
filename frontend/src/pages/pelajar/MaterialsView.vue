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

      <div class="relative z-10 flex shrink-0 w-full md:w-auto">
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
    <div class="card-panel filter-bar p-4 md:p-5 mb-12 flex flex-col md:flex-row gap-4 transition-all duration-300 ease-out group">
      
      <!-- Search -->
      <div class="relative flex-1">
        <div class="absolute inset-y-0 left-0 pl-5 flex items-center pointer-events-none text-slate-400">
          <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><circle cx="11" cy="11" r="8"/><path d="m21 21-4.3-4.3"/></svg>
        </div>
        <input type="text" v-model="searchQuery" class="w-full pl-14 pr-5 py-3.5 bg-slate-50 hover:bg-white border border-transparent hover:border-slate-200 rounded-2xl text-[15px] font-bold text-slate-900 placeholder-slate-400 focus:outline-none focus:ring-4 focus:ring-[#7096D1]/20 focus:border-[#7096D1] transition-all" placeholder="Cari dokumen, topik, atau penulis...">
      </div>

      <!-- Categories -->
      <div class="relative min-w-[180px]">
        <select v-model="selectedCategory" class="w-full pl-5 pr-10 py-3.5 bg-slate-50 hover:bg-white border border-transparent hover:border-slate-200 rounded-2xl text-[14px] font-bold text-slate-900 appearance-none focus:outline-none focus:ring-4 focus:ring-[#7096D1]/20 transition-all cursor-pointer">
          <option value="">Semua Subjek</option>
          <option value="physics">Fisika</option>
          <option value="cs">Ilmu Komputer</option>
          <option value="math">Matematika</option>
        </select>
        <div class="absolute inset-y-0 right-0 pr-5 flex items-center pointer-events-none text-slate-400">
          <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"><path d="m6 9 6 6 6-6"/></svg>
        </div>
      </div>

      <!-- File Type -->
      <div class="relative min-w-[150px]">
        <select v-model="selectedFileType" class="w-full pl-5 pr-10 py-3.5 bg-slate-50 hover:bg-white border border-transparent hover:border-slate-200 rounded-2xl text-[14px] font-bold text-slate-900 appearance-none focus:outline-none focus:ring-4 focus:ring-[#7096D1]/20 transition-all cursor-pointer">
          <option value="">Semua Format</option>
          <option value="pdf">PDF</option>
          <option value="docx">DOCX</option>
          <option value="video">VIDEO</option>
        </select>
        <div class="absolute inset-y-0 right-0 pr-5 flex items-center pointer-events-none text-slate-400">
          <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"><path d="m6 9 6 6 6-6"/></svg>
        </div>
      </div>

      <!-- Filter Button -->
      <button @click="applyFilter" :disabled="isFiltering" class="px-8 py-3.5 bg-white border border-slate-200 hover:border-[#334EAC] text-slate-900 hover:text-[#334EAC] rounded-2xl font-bold text-[14px] transition-all shadow-sm active:scale-95 shrink-0 flex items-center justify-center gap-2" :class="isFiltering ? 'opacity-70 cursor-wait' : ''">
        <svg v-if="!isFiltering" xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"><path d="M22 3H2l8 9.46V19l4 2v-8.54L22 3z"/></svg>
        <svg v-else class="animate-spin" xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"><path d="M21 12a9 9 0 1 1-6.219-8.56"/></svg>
        {{ isFiltering ? 'Menyaring...' : 'Filter' }}
      </button>

    </div>

    <!-- 3. Material Grid -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6 lg:gap-8">
      
      <!-- Material Card 1 -->
      <RouterLink :to="`${baseMaterialsRoute}/1`" class="card-base card-featured group flex flex-col h-full cursor-pointer block">
        <div class="material-thumb material-pdf w-full h-44 rounded-2xl mb-5 relative overflow-hidden">
          <div class="absolute inset-0 flex flex-col items-center justify-center text-slate-400 group-hover:scale-105 transition-transform duration-500">
            <svg xmlns="http://www.w3.org/2000/svg" width="48" height="48" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="mb-2"><path d="M14.5 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V7.5L14.5 2z"/><polyline points="14 2 14 8 20 8"/></svg>
          </div>
          <div class="absolute top-3 right-3 format-badge badge-pdf px-2.5 py-1 rounded-lg tag-content-type">
            PDF
          </div>
        </div>

        <div class="flex-1 flex flex-col">
          <span class="text-[#334EAC] text-[10px] font-bold uppercase tracking-widest mb-2">Fisika</span>
          <h3 class="text-[16px] font-bold text-slate-900 mb-2 leading-snug group-hover:text-[#334EAC] transition-colors line-clamp-2 tracking-tight">Soal & Pembahasan Lengkap Final OSN Fisika Nasional 2023</h3>
          
          <div class="flex items-center gap-2 mb-4 mt-auto pt-3">
            <div class="w-6 h-6 rounded-full bg-[#EDF1F6] flex items-center justify-center font-bold text-slate-900 text-[10px] border border-slate-200">
              PA
            </div>
            <span class="text-[12px] font-bold text-slate-500">Prof. Anderson</span>
          </div>

          <div class="flex items-center justify-between pt-4 border-t border-slate-100/80">
            <div class="flex items-center gap-1.5 text-slate-400">
              <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"/><polyline points="7 10 12 15 17 10"/><line x1="12" x2="12" y1="15" y2="3"/></svg>
              <span class="text-[12px] font-bold">1.2k</span>
            </div>
            <div class="text-[#334EAC] font-bold text-[13px] hover:text-[#081F5C] transition-colors flex items-center gap-1">
              Buka <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"><path d="m9 18 6-6-6-6"/></svg>
            </div>
          </div>
        </div>
      </RouterLink>

      <!-- Material Card 2 -->
      <RouterLink :to="`${baseMaterialsRoute}/2`" class="card-base card-supporting group flex flex-col h-full cursor-pointer block">
        <div class="material-thumb material-docx w-full h-44 rounded-2xl mb-5 relative overflow-hidden">
          <div class="absolute inset-0 flex flex-col items-center justify-center text-slate-400 group-hover:scale-105 transition-transform duration-500">
            <svg xmlns="http://www.w3.org/2000/svg" width="48" height="48" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="mb-2"><path d="M14.5 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V7.5L14.5 2z"/><polyline points="14 2 14 8 20 8"/></svg>
          </div>
          <div class="absolute top-3 right-3 format-badge badge-docx px-2.5 py-1 rounded-lg tag-content-type">
            DOCX
          </div>
        </div>

        <div class="flex-1 flex flex-col">
          <span class="text-[#334EAC] text-[10px] font-bold uppercase tracking-widest mb-2">Ilmu Komputer</span>
          <h3 class="text-[16px] font-bold text-slate-900 mb-2 leading-snug group-hover:text-[#334EAC] transition-colors line-clamp-2 tracking-tight">Struktur Data & Algoritma - Ringkasan UTS</h3>
          
          <div class="flex items-center gap-2 mb-4 mt-auto pt-3">
            <div class="w-6 h-6 rounded-full bg-[#EDF1F6] flex items-center justify-center font-bold text-slate-900 text-[10px] border border-slate-200">
              BS
            </div>
            <span class="text-[12px] font-bold text-slate-500">Budi Santoso</span>
          </div>

          <div class="flex items-center justify-between pt-4 border-t border-slate-100/80">
            <div class="flex items-center gap-1.5 text-slate-400">
              <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"/><polyline points="7 10 12 15 17 10"/><line x1="12" x2="12" y1="15" y2="3"/></svg>
              <span class="text-[12px] font-bold">850</span>
            </div>
            <div class="text-[#334EAC] font-bold text-[13px] hover:text-[#081F5C] transition-colors flex items-center gap-1">
              Buka <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"><path d="m9 18 6-6-6-6"/></svg>
            </div>
          </div>
        </div>
      </RouterLink>

      <!-- Material Card 3 -->
      <RouterLink :to="`${baseMaterialsRoute}/3`" class="card-base card-supporting group flex flex-col h-full cursor-pointer block">
        <div class="material-thumb material-vid w-full h-44 rounded-2xl mb-5 relative overflow-hidden">
          <div class="absolute inset-0 flex flex-col items-center justify-center text-emerald-300 group-hover:scale-105 transition-transform duration-500">
            <svg xmlns="http://www.w3.org/2000/svg" width="48" height="48" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="mb-2"><polygon points="5 3 19 12 5 21 5 3"/></svg>
          </div>
          <div class="absolute top-3 right-3 format-badge badge-vid px-2.5 py-1 rounded-lg tag-content-type">
            VIDEO
          </div>
        </div>

        <div class="flex-1 flex flex-col">
          <span class="text-[#334EAC] text-[10px] font-bold uppercase tracking-widest mb-2">Matematika</span>
          <h3 class="text-[16px] font-bold text-slate-900 mb-2 leading-snug group-hover:text-[#334EAC] transition-colors line-clamp-2 tracking-tight">Kalkulus III: Visualisasi Integral Lipat</h3>
          
          <div class="flex items-center gap-2 mb-4 mt-auto pt-3">
            <div class="w-6 h-6 rounded-full bg-[#EDF1F6] flex items-center justify-center font-bold text-slate-900 text-[10px] border border-slate-200">
              SS
            </div>
            <span class="text-[12px] font-bold text-slate-500">Dr. Sarah Smith</span>
          </div>

          <div class="flex items-center justify-between pt-4 border-t border-slate-100/80">
            <div class="flex items-center gap-1.5 text-slate-400">
              <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"/><polyline points="7 10 12 15 17 10"/><line x1="12" x2="12" y1="15" y2="3"/></svg>
              <span class="text-[12px] font-bold">3.4k</span>
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
import { ref, computed } from 'vue'
import { RouterLink, useRoute } from 'vue-router'

const route = useRoute()
const baseMaterialsRoute = computed(() => {
  return route.path.startsWith('/tutor') ? '/tutor/materials' : '/pelajar/materials'
})

const searchQuery = ref('')
const selectedCategory = ref('')
const selectedFileType = ref('')
const isFiltering = ref(false)
const showSuccess = ref(false)

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
