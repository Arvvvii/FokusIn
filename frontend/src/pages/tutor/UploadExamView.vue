<template>
  <div class="space-y-8 w-full">
    
    <!-- 1. GLASSMORPHIC HEADER SECTION -->
    <div class="bg-white/80 backdrop-blur-xl rounded-3xl p-7 md:p-8 shadow-[0_10px_40px_rgba(15,23,42,0.06)] border border-white/40 relative overflow-hidden flex flex-col md:flex-row md:items-center justify-between gap-6">
      <div class="absolute right-0 top-0 w-1/3 h-full bg-gradient-to-l from-[#EDF1F6]/80 to-transparent pointer-events-none"></div>
      
      <div class="relative z-10 flex items-center gap-4">
        <span class="w-12 h-12 rounded-2xl bg-[#334EAC]/10 text-[#334EAC] flex items-center justify-center shrink-0">
          <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"/><polyline points="17 8 12 3 7 8"/><line x1="12" x2="12" y1="3" y2="15"/></svg>
        </span>
        <div>
          <h1 class="text-2xl md:text-3xl font-bold text-slate-900 tracking-tight leading-none mb-1">Upload Arsip Soal</h1>
          <p class="text-[14px] text-slate-500 font-medium leading-relaxed mt-1">
            Unggah berkas ujian, kuis, atau tugas mandiri. AI kami akan secara otomatis memindai teks, mendeteksi mata kuliah, dan memformat materi.
          </p>
        </div>
      </div>

      <div class="relative z-10 flex shrink-0 gap-2">
        <button @click="selectFile" class="px-5 py-2.5 bg-white border border-slate-200 hover:border-[#7096D1] text-[#334EAC] rounded-2xl font-bold text-[13px] shadow-sm active:scale-95 transition-all">
          Simpan Draft
        </button>
        <button @click="handleUpload" :disabled="isUploading" class="px-5 py-2.5 bg-[#334EAC] hover:bg-[#081F5C] text-white rounded-2xl font-bold text-[13px] shadow-sm active:scale-95 transition-all flex items-center gap-2 disabled:opacity-75">
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
        <div @click="selectFile" class="bg-white rounded-3xl p-8 border-2 border-dashed border-slate-200 hover:border-[#334EAC] transition-all cursor-pointer flex flex-col items-center justify-center min-h-[260px] group relative overflow-hidden shadow-sm">
          <div class="w-14 h-14 rounded-2xl bg-indigo-50 text-[#334EAC] flex items-center justify-center mb-4 group-hover:scale-105 transition-transform border border-indigo-100">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M14.5 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V7.5L14.5 2z"/><polyline points="14 2 14 8 20 8"/></svg>
          </div>
          
          <h3 class="text-base font-bold text-slate-900 mb-1">
            {{ selectedFile ? selectedFile.name : 'Tarik & Lepas File Ujian di Sini' }}
          </h3>
          
          <p class="text-xs text-slate-400 text-center max-w-sm">
            {{ selectedFile ? `Ukuran: ${selectedFile.size}` : 'Mendukung berkas PDF, DOCX, atau Gambar hingga 10MB.' }}
          </p>
          
          <div class="mt-5 px-5 py-2.5 bg-white border border-slate-200 text-slate-800 rounded-xl text-xs font-bold shadow-sm flex items-center gap-2 hover:border-[#7096D1] transition-all">
            <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"/><polyline points="17 8 12 3 7 8"/><line x1="12" x2="12" y1="3" y2="15"/></svg>
            {{ selectedFile ? 'Ganti Dokumen' : 'Pilih Berkas Komputer' }}
          </div>
        </div>

        <!-- Info Form -->
        <div class="bg-white border border-slate-200 rounded-3xl p-6 shadow-sm space-y-6">
          <h3 class="text-base font-bold text-slate-950 flex items-center gap-2 border-b border-slate-100 pb-4">
             <span class="w-8 h-8 rounded-xl bg-slate-50 border border-slate-200 flex items-center justify-center text-[#334EAC]">
               <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><rect width="18" height="18" x="3" y="4" rx="2" ry="2"/><line x1="16" x2="16" y1="2" y2="6"/><line x1="8" x2="8" y1="2" y2="6"/><line x1="3" x2="21" y1="10" y2="10"/></svg>
             </span>
             Metadata Bank Soal
          </h3>

          <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div class="space-y-2">
              <label class="text-[11px] font-bold text-slate-400 uppercase tracking-wider ml-1">Mata Kuliah</label>
              <select v-model="selectedSubject" class="w-full px-3.5 py-2.5 bg-slate-50 border border-slate-200 rounded-xl text-xs text-slate-700 focus:outline-none focus:border-[#7096D1] focus:ring-4 focus:ring-[#7096D1]/10 transition-all font-medium appearance-none">
                <option value="" disabled selected>Pilih Mata Kuliah</option>
                <option>Struktur Data</option>
                <option>Algoritma Dasar</option>
                <option>Sistem Basis Data</option>
              </select>
            </div>
            
            <div class="space-y-2">
              <label class="text-[11px] font-bold text-slate-400 uppercase tracking-wider ml-1">Semester</label>
              <select v-model="selectedSemester" class="w-full px-3.5 py-2.5 bg-slate-50 border border-slate-200 rounded-xl text-xs text-slate-700 focus:outline-none focus:border-[#7096D1] focus:ring-4 focus:ring-[#7096D1]/10 transition-all font-medium appearance-none">
                <option value="" disabled selected>Pilih Semester</option>
                <option>Ganjil 2025/2026</option>
                <option>Genap 2025/2026</option>
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
                :class="selectedCategory === cat ? 'bg-[#334EAC] text-white border-transparent' : 'bg-white border-slate-200 text-slate-600 hover:border-slate-300'"
                class="px-5 py-2.5 rounded-xl border font-bold text-xs shadow-sm transition-all active:scale-[0.98]"
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
        <p class="text-xs text-indigo-100 font-medium">Dokumen berhasil disubmit ke antrean AI validation.</p>
      </div>
    </div>

  </div>
</template>

<script setup>
import { ref } from 'vue'
import { useRouter, RouterLink } from 'vue-router'

const router = useRouter()
const selectedFile = ref(null)
const selectedSubject = ref('')
const selectedSemester = ref('')
const selectedCategory = ref('UAS')
const isUploading = ref(false)
const showSuccess = ref(false)

const selectFile = () => {
  selectedFile.value = {
    name: 'Struktur_Data_UAS_2025.pdf',
    size: '2.4 MB'
  }
}

const handleUpload = () => {
  if (!selectedFile.value) {
    alert('Harap pilih berkas terlebih dahulu.')
    return
  }
  isUploading.value = true
  setTimeout(() => {
    isUploading.value = false
    showSuccess.value = true
    setTimeout(() => {
      showSuccess.value = false
      router.push('/tutor/ai-validation')
    }, 1500)
  }, 1500)
}
</script>
