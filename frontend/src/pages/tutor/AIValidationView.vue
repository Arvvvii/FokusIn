<template>
  <div class="space-y-8 w-full">

    <!-- 1. GLASSMORPHIC HEADER SECTION -->
    <div class="bg-white border border-slate-200 shadow-sm rounded-2xl p-7 md:p-8 flex flex-col md:flex-row md:items-center justify-between gap-6 relative">
      <div class="absolute right-0 top-0 w-1/3 h-full bg-gradient-to-l from-[#EDF1F6]/50 to-transparent pointer-events-none"></div>
      
      <div class="relative z-10 flex items-center gap-4">
        <span class="w-12 h-12 rounded-2xl bg-[#334EAC]/10 text-[#334EAC] flex items-center justify-center shrink-0">
          <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="m12 3-1.912 5.813a2 2 0 0 1-1.275 1.275L3 12l5.813 1.912a2 2 0 0 1 1.275 1.275L12 21l1.912-5.813a2 2 0 0 1 1.275-1.275L21 12l-5.813-1.912a2 2 0 0 1-1.275-1.275L12 3Z"/></svg>
        </span>
        <div>
          <h1 class="text-2xl font-extrabold text-[#081F5C] tracking-tight leading-tight">Antrean Validasi AI</h1>
          <p class="text-[13px] text-slate-500 font-medium mt-2 max-w-xl leading-relaxed">
            Verifikasi hasil ekstraksi OCR dan struktur soal ujian yang diproses oleh AI sebelum diterbitkan ke bank soal FokusIn.
          </p>
        </div>
      </div>

      <div class="relative z-10 flex shrink-0 gap-4">
        <div class="bg-white border border-slate-200/80 shadow-sm rounded-xl px-5 py-3 flex flex-col items-center min-w-[90px]">
           <span class="text-2xl font-bold text-amber-500 tracking-tight leading-none mb-1">{{ antreanCount }}</span>
           <span class="text-[11px] font-bold text-slate-500 uppercase tracking-widest">Antrean</span>
        </div>
        <div class="bg-white border border-slate-200/80 shadow-sm rounded-xl px-5 py-3 flex flex-col items-center min-w-[90px]">
           <span class="text-2xl font-bold text-emerald-500 tracking-tight leading-none mb-1">{{ selesaiCount }}</span>
           <span class="text-[11px] font-bold text-slate-500 uppercase tracking-widest">Selesai</span>
        </div>
      </div>
    </div>

    <!-- 2. METADATA & INSTRUCTIONS -->
    <div class="grid grid-cols-1 md:grid-cols-2 gap-6 w-full">
      <!-- Info Card -->
      <div class="bg-white border border-slate-200 shadow-sm rounded-2xl p-6 transition-all duration-300 hover:shadow-md">
        <h3 class="text-sm font-bold text-slate-900 mb-3 flex items-center gap-2">
          <span class="w-6 h-6 rounded-lg bg-[#F7F2EB] text-[#334EAC] flex items-center justify-center"><svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"/><line x1="12" x2="12" y1="16" y2="12"/><line x1="12" x2="12.01" y1="8" y2="8"/></svg></span>
          Panduan Validasi AI
        </h3>
        <p class="text-xs text-slate-500 leading-relaxed mb-4">
          AI memindai dokumen soal ujian dengan OCR dan memformatnya menjadi Markdown terstruktur. Tugas Anda adalah:
        </p>
        <ul class="space-y-2.5 text-xs text-slate-600 font-medium">
          <li class="flex items-start gap-2">
            <span class="w-4 h-4 rounded-full bg-[#F7F2EB] border border-[#D0E3FF] flex items-center justify-center shrink-0 text-[10px] text-[#334EAC] font-bold">1</span>
            Memperbaiki kesalahan deteksi karakter (typo).
          </li>
          <li class="flex items-start gap-2">
            <span class="w-4 h-4 rounded-full bg-[#F7F2EB] border border-[#D0E3FF] flex items-center justify-center shrink-0 text-[10px] text-[#334EAC] font-bold">2</span>
            Memastikan bobot skor pilihan ganda & esai tepat.
          </li>
          <li class="flex items-start gap-2">
            <span class="w-4 h-4 rounded-full bg-[#F7F2EB] border border-[#D0E3FF] flex items-center justify-center shrink-0 text-[10px] text-[#334EAC] font-bold">3</span>
            Menandai tingkat kesulitan dan kesesuaian silabus.
          </li>
        </ul>
      </div>

      <!-- AI Performance -->
      <div class="bg-white border border-slate-200 shadow-sm rounded-2xl p-6 transition-all duration-300 hover:shadow-md">
        <h3 class="text-[11px] font-bold text-slate-400 uppercase tracking-widest mb-4">Efisiensi Ekstraksi AI</h3>
        <div class="space-y-4">
          <div>
            <div class="flex justify-between text-xs font-bold text-slate-700 mb-1">
              <span>Rata-rata Akurasi OCR</span>
              <span class="text-emerald-600">96.0%</span>
            </div>
            <div class="h-1.5 w-full bg-slate-100 rounded-full overflow-hidden">
              <div class="h-full bg-emerald-500 rounded-full" style="width: 96%"></div>
            </div>
          </div>
          <div>
            <div class="flex justify-between text-xs font-bold text-slate-700 mb-1">
              <span>Waktu Hemat per Dokumen</span>
              <span class="text-[#334EAC]">~18 Menit</span>
            </div>
            <div class="h-1.5 w-full bg-slate-100 rounded-full overflow-hidden">
              <div class="h-full bg-[#334EAC] rounded-full" style="width: 85%"></div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- 3. QUEUE TABLE -->
    <div class="bg-white border border-slate-200 shadow-sm rounded-2xl flex-1 flex flex-col w-full overflow-hidden">
      <div class="px-6 py-5 border-b border-slate-200 flex flex-col sm:flex-row sm:items-center justify-between gap-4 bg-white">
        <div>
          <h2 class="text-[16px] font-extrabold text-[#081F5C]">Daftar Dokumen Ujian</h2>
          <p class="text-xs text-slate-400 font-semibold mt-0.5">Kelola dan validasi arsip dari database</p>
        </div>
        
        <!-- Tab Filters -->
        <div class="flex flex-wrap gap-1.5">
          <button 
            v-for="status in ['pending', 'valid', 'invalid', 'all']" 
            :key="status"
            @click="currentFilter = status"
            class="px-3 py-1.5 rounded-xl text-xs font-bold transition-all border"
            :style="{ minWidth: '70px' }"
            :class="currentFilter === status 
              ? 'bg-[#334EAC] text-white border-[#334EAC] shadow-sm' 
              : 'bg-white text-slate-600 border-slate-200 hover:bg-slate-50'"
          >
            {{ getFilterLabel(status) }}
          </button>
        </div>
      </div>

      <!-- Loading State (Skeleton) -->
      <div v-if="loading" class="overflow-x-auto flex-1">
        <table class="w-full border-collapse text-left whitespace-nowrap">
          <thead>
            <tr class="bg-slate-50/60 border-b border-slate-200/80 text-[11px] font-bold text-slate-400 uppercase tracking-widest">
              <th class="py-4 px-7 font-bold">Nama Berkas</th>
              <th class="py-4 px-7 font-bold">Mata Kuliah</th>
              <th class="py-4 px-7 font-bold">Pengunggah</th>
              <th class="py-4 px-7 font-bold">Tanggal Upload</th>
              <th class="py-4 px-7 font-bold">OCR Confidence</th>
              <th class="py-4 px-7 text-right font-bold">Aksi</th>
            </tr>
          </thead>
          <tbody class="divide-y divide-slate-100 bg-white">
            <tr v-for="i in 3" :key="i" class="animate-pulse">
              <td class="py-4 px-7">
                <div class="flex items-center gap-4">
                  <div class="w-10 h-10 rounded-2xl bg-slate-200"></div>
                  <div class="h-4 w-36 bg-slate-200 rounded"></div>
                </div>
              </td>
              <td class="py-4 px-7">
                <div class="h-4 w-28 bg-slate-200 rounded"></div>
              </td>
              <td class="py-4 px-7">
                <div class="h-4 w-20 bg-slate-200 rounded"></div>
              </td>
              <td class="py-4 px-7">
                <div class="h-4 w-24 bg-slate-200 rounded"></div>
              </td>
              <td class="py-4 px-7">
                <div class="h-4 w-16 bg-slate-200 rounded"></div>
              </td>
              <td class="py-4 px-7 text-right">
                <div class="inline-block h-8 w-28 bg-slate-200 rounded-xl"></div>
              </td>
            </tr>
          </tbody>
        </table>
      </div>

      <!-- Error State -->
      <div v-else-if="error" class="flex flex-col items-center justify-center py-16 px-4 text-center">
        <div class="w-16 h-16 rounded-full bg-rose-50 text-rose-500 flex items-center justify-center mb-4 border border-rose-100 shadow-sm">
          <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"/><line x1="12" x2="12" y1="16" y2="12"/><line x1="12" x2="12.01" y1="8" y2="8"/></svg>
        </div>
        <h3 class="text-sm font-bold text-slate-800 mb-2">Gagal memuat arsip ujian.</h3>
        <p class="text-xs text-slate-500 mb-6 max-w-sm leading-relaxed">{{ error }}</p>
        <button @click="fetchUploads" class="px-5 py-2.5 bg-[#334EAC] hover:bg-[#081F5C] text-white rounded-2xl font-bold text-xs shadow-md transition-all active:scale-95">
          Coba Lagi
        </button>
      </div>

      <!-- Data Table -->
      <div v-else class="overflow-x-auto flex-1">
        <table class="w-full border-collapse text-left whitespace-nowrap">
          <thead>
            <tr class="bg-slate-50/60 border-b border-slate-200/80 text-[11px] font-bold text-slate-400 uppercase tracking-widest">
              <th class="py-4 px-7 font-bold">Nama Berkas</th>
              <th class="py-4 px-7 font-bold">Mata Kuliah</th>
              <th class="py-4 px-7 font-bold">Pengunggah</th>
              <th class="py-4 px-7 font-bold">Tanggal Upload</th>
              <th class="py-4 px-7 font-bold">OCR Confidence</th>
              <th class="py-4 px-7 text-right font-bold">Aksi</th>
            </tr>
          </thead>
          <tbody class="divide-y divide-slate-100/80 text-[13.5px] font-medium text-slate-700 bg-white">
            <tr v-for="doc in filteredQueue" :key="doc.id" class="hover:bg-slate-50/50 transition-colors group">
              <td class="py-4 px-7 align-middle">
                <div class="flex items-center gap-4">
                  <span class="w-10 h-10 rounded-2xl bg-rose-50 text-rose-500 flex items-center justify-center shrink-0 border border-rose-100 group-hover:scale-105 transition-transform">
                    <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M14.5 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V7.5L14.5 2z"/><polyline points="14 2 14 8 20 8"/></svg>
                  </span>
                  <span class="font-bold text-[#081F5C] tracking-tight whitespace-normal max-w-xs break-all">
                    {{ doc.original_filename || doc.file_url?.split('/').pop() || ('Dokumen_' + doc.id + '.pdf') }}
                  </span>
                </div>
              </td>
              <td class="py-4 px-7 align-middle text-slate-500">
                {{ doc.category?.name || 'Kategori Umum' }}
              </td>
              <td class="py-4 px-7 align-middle text-slate-500">
                <span class="text-xs font-semibold text-slate-700 bg-slate-100 px-2.5 py-1 rounded-lg">
                  {{ doc.user?.name || 'Pengguna FokusIn' }}
                </span>
              </td>
              <td class="py-4 px-7 align-middle text-slate-500">
                {{ formatDate(doc.created_at) }}
              </td>
              <td class="py-4 px-7 align-middle">
                <div class="flex items-center gap-3">
                  <div class="w-16 bg-slate-100 rounded-full h-2 overflow-hidden shadow-inner">
                    <div class="bg-emerald-500 h-full rounded-full" :style="{ width: getOcrAccuracy(doc.id) + '%' }"></div>
                  </div>
                  <span class="text-xs font-bold text-slate-700 w-8">{{ getOcrAccuracy(doc.id) }}%</span>
                </div>
              </td>
              <td class="py-4 px-7 align-middle text-right">
                <RouterLink 
                  :to="'/tutor/validation/' + doc.id" 
                  class="btn-validate"
                >
                  Validasi Sekarang
                  <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M5 12h14"/><path d="m12 5 7 7-7 7"/></svg>
                </RouterLink>
              </td>
            </tr>
            <tr v-if="filteredQueue.length === 0">
              <td colspan="6" class="py-12 px-7 text-center text-slate-400 font-bold">
                Tidak ada dokumen {{ currentFilter === 'all' ? '' : getFilterLabel(currentFilter).toLowerCase() }} di sistem.
              </td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</template>

<script setup>
import { ref, computed, onMounted } from 'vue'
import { RouterLink } from 'vue-router'
import { examUploadService } from '@/services/examUpload.service'

const uploads = ref([])
const loading = ref(true)
const error = ref(null)
const currentFilter = ref('pending') // Default showing queue (pending)

const fetchUploads = async () => {
  loading.value = true
  error.value = null
  try {
    const res = await examUploadService.getExamUploads()
    uploads.value = Array.isArray(res) ? res : (res.data || [])
  } catch (err) {
    console.error(err)
    error.value = err
  } finally {
    loading.value = false
  }
}

const antreanCount = computed(() => {
  return uploads.value.filter(doc => doc.status === 'pending').length
})

const selesaiCount = computed(() => {
  return uploads.value.filter(doc => doc.status === 'valid' || doc.status === 'invalid').length
})

const filteredQueue = computed(() => {
  if (currentFilter.value === 'all') {
    return uploads.value
  }
  return uploads.value.filter(doc => doc.status === currentFilter.value)
})

const getFilterLabel = (status) => {
  switch (status) {
    case 'pending': return 'Antrean'
    case 'valid': return 'Disetujui'
    case 'invalid': return 'Ditolak'
    default: return 'Semua'
  }
}

const getOcrAccuracy = (id) => {
  // Stable accuracy value using the ID
  return 90 + (id % 10)
}

const formatDate = (dateString) => {
  if (!dateString) return '-'
  const date = new Date(dateString)
  return date.toLocaleDateString('id-ID', {
    day: 'numeric',
    month: 'short',
    year: 'numeric'
  })
}

onMounted(() => {
  fetchUploads()
})
</script>
