<template>
  <div class="space-y-8 animate-in fade-in duration-500">
    
    <!-- 1. GLASSMORPHIC HEADER SECTION -->
    <div class="bg-white/80 backdrop-blur-xl rounded-3xl p-7 md:p-8 shadow-[0_10px_40px_rgba(15,23,42,0.06)] border border-white/40 relative overflow-hidden flex flex-col md:flex-row md:items-center justify-between gap-6 mb-8">
      <div class="absolute right-0 top-0 w-1/3 h-full bg-gradient-to-l from-[#EDF1F6]/80 to-transparent pointer-events-none"></div>
      
      <div class="relative z-10 flex items-center gap-4">
        <RouterLink :to="baseMaterialsRoute" class="w-10 h-10 rounded-xl bg-white border border-slate-200 text-slate-500 hover:text-[#334EAC] hover:border-[#7096D1] flex items-center justify-center transition-all shadow-sm active:scale-95 shrink-0" title="Kembali">
          <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="m15 18-6-6 6-6"/></svg>
        </RouterLink>
        <span class="w-12 h-12 rounded-2xl bg-[#334EAC]/10 text-[#334EAC] flex items-center justify-center shrink-0">
          <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"/><polyline points="17 8 12 3 7 8"/><line x1="12" x2="12" y1="3" y2="15"/></svg>
        </span>
        <div>
          <h1 class="text-2xl md:text-3xl font-bold text-slate-900 tracking-tight leading-none mb-1">Publikasikan Materi Akademik</h1>
          <p class="text-[14px] text-slate-500 font-medium leading-relaxed mt-1">
            Bagikan catatan kuliah, ringkasan, dan persiapan ujianmu dengan komunitas FokusIn.
          </p>
        </div>
      </div>
    </div>

    <div class="flex flex-col xl:flex-row gap-8 min-w-0">
      
      <!-- Left / Main Upload Form (w-65%) -->
      <div class="w-full xl:w-[65%] space-y-8 min-w-0">
        
        <!-- Document Upload Area -->
        <div class="bg-white/80 backdrop-blur-xl rounded-3xl p-6 md:p-10 shadow-[0_10px_40px_rgba(15,23,42,0.06)] border border-slate-100 w-full overflow-hidden transition-all duration-300 ease-out hover:shadow-xl group/card">
          <h3 class="text-[17px] font-bold text-slate-900 mb-5 flex items-center gap-3 tracking-tight">
            <span class="w-8 h-8 rounded-full bg-[#EDF1F6] flex items-center justify-center text-[#334EAC]">
              <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"/><polyline points="17 8 12 3 7 8"/><line x1="12" x2="12" y1="3" y2="15"/></svg>
            </span>
            Lampiran File
          </h3>
          
          <div class="relative flex flex-col items-center justify-center p-12 border-[2px] border-dashed border-slate-200 rounded-3xl bg-slate-50/50 hover:bg-[#F7F2EB]/50 hover:border-[#7096D1] transition-all cursor-pointer group">
            <div class="w-16 h-16 rounded-2xl bg-white shadow-sm border border-slate-100 flex items-center justify-center text-[#334EAC] mb-5 group-hover:-translate-y-1 transition-transform">
              <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M14.5 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V7.5L14.5 2z"/><polyline points="14 2 14 8 20 8"/></svg>
            </div>
            <h4 class="text-[16px] font-bold text-slate-900 text-center mb-1 tracking-tight">Tarik & letakkan filemu di sini</h4>
            <p class="text-[13px] font-medium text-slate-400 text-center mb-6">PDF, DOCX, PPTX hingga 50MB</p>
            <button @click.prevent="triggerFileUpload" class="px-6 py-2.5 bg-white border border-slate-200 rounded-xl text-slate-900 font-bold text-[13px] hover:border-[#334EAC] transition-colors shadow-sm">Jelajahi File</button>
          </div>

          <!-- Upload Progress Mockup -->
          <div v-if="isUploading" class="mt-6 p-4 border border-slate-200 rounded-2xl bg-slate-50">
            <div class="flex items-center justify-between mb-2">
              <div class="flex items-center gap-4">
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" class="text-[#334EAC]"><path d="M14.5 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V7.5L14.5 2z"/><polyline points="14 2 14 8 20 8"/></svg>
                <span class="text-[13px] font-bold text-slate-900 tracking-tight">{{ uploadedFileName || 'Materi_Kuliah_Baru.pdf' }}</span>
              </div>
              <span class="text-[12px] font-bold text-slate-400">{{ uploadProgress }}%</span>
            </div>
            <div class="w-full h-1.5 bg-slate-200 rounded-full overflow-hidden">
              <div class="h-full bg-[#334EAC] transition-all duration-300 rounded-full" :style="{ width: uploadProgress + '%' }"></div>
            </div>
          </div>
        </div>

        <!-- Material Details Form -->
        <div class="bg-white/80 backdrop-blur-xl rounded-3xl p-6 md:p-10 shadow-[0_10px_40px_rgba(15,23,42,0.06)] border border-slate-100 w-full overflow-hidden transition-all duration-300 ease-out hover:shadow-xl group/card">
          <h3 class="text-[17px] font-bold text-slate-900 mb-8 flex items-center gap-3 tracking-tight">
            <span class="w-8 h-8 rounded-full bg-[#EDF1F6] flex items-center justify-center text-[#334EAC]">
              <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"/><path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z"/></svg>
            </span>
            Detail & Metadata
          </h3>

          <div class="space-y-6">
            <div class="space-y-3">
              <label class="text-[13px] font-bold text-slate-400 uppercase tracking-widest ml-1">Judul Dokumen</label>
              <input v-model="materialTitle" type="text" class="w-full px-5 py-3.5 bg-slate-50 border border-slate-200 rounded-2xl text-[14px] font-bold text-slate-900 placeholder-slate-400 focus:outline-none focus:border-[#7096D1] focus:ring-4 focus:ring-[#7096D1]/10 transition-all" placeholder="contoh, Panduan Lengkap Aljabar Linear">
            </div>

            <div class="space-y-3">
              <label class="text-[13px] font-bold text-slate-400 uppercase tracking-widest ml-1">Deskripsi / Ringkasan</label>
              <textarea v-model="materialDesc" rows="4" class="w-full px-5 py-3.5 bg-slate-50 border border-slate-200 rounded-2xl text-[14px] font-bold text-slate-900 placeholder-slate-400 focus:outline-none focus:border-[#7096D1] focus:ring-4 focus:ring-[#7096D1]/10 transition-all resize-none" placeholder="Jelaskan secara singkat apa yang dibahas materi ini..."></textarea>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
              <div class="space-y-3">
                <label class="text-[13px] font-bold text-slate-400 uppercase tracking-widest ml-1">Kategori</label>
                <div class="relative">
                  <select v-model="materialCat" class="w-full px-5 py-3.5 bg-slate-50 border border-slate-200 rounded-2xl text-[14px] font-bold text-slate-900 focus:outline-none focus:border-[#7096D1] focus:ring-4 focus:ring-[#7096D1]/10 transition-all appearance-none cursor-pointer">
                    <option value="">Pilih Kategori</option>
                    <option>Fisika</option>
                    <option>Ilmu Komputer</option>
                    <option>Matematika</option>
                  </select>
                  <div class="absolute inset-y-0 right-0 pr-4 flex items-center pointer-events-none text-slate-400">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"><path d="m6 9 6 6 6-6"/></svg>
                  </div>
                </div>
              </div>
              <div class="space-y-3">
                <label class="text-[13px] font-bold text-slate-400 uppercase tracking-widest ml-1">Jenis File</label>
                <div class="relative">
                  <select v-model="materialFileType" class="w-full px-5 py-3.5 bg-slate-50 border border-slate-200 rounded-2xl text-[14px] font-bold text-slate-900 focus:outline-none focus:border-[#7096D1] focus:ring-4 focus:ring-[#7096D1]/10 transition-all appearance-none cursor-pointer">
                    <option>Dokumen PDF</option>
                    <option>Word (DOCX)</option>
                    <option>PowerPoint (PPT)</option>
                  </select>
                  <div class="absolute inset-y-0 right-0 pr-4 flex items-center pointer-events-none text-slate-400">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"><path d="m6 9 6 6 6-6"/></svg>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

      </div>

      <!-- Right Panel / Tagging & Publish (w-35%) -->
      <div class="w-full xl:w-[35%] shrink-0 space-y-6 min-w-0">
        
        <!-- Tags & AI Recommendation -->
        <div class="bg-white/80 backdrop-blur-xl rounded-3xl p-6 md:p-8 shadow-[0_10px_40px_rgba(15,23,42,0.06)] border border-slate-100 transition-all duration-300 ease-out hover:shadow-xl group/card">
          <h3 class="text-[15px] font-bold text-slate-900 mb-5 tracking-tight">Tag & Klasifikasi</h3>
          
          <div class="space-y-3 mb-6">
            <input v-model="newTag" @keydown.enter.prevent="addTag" type="text" class="w-full px-4 py-3 bg-slate-50 border border-slate-200 rounded-xl text-[13px] font-bold text-slate-900 placeholder-slate-400 focus:outline-none focus:border-[#7096D1] focus:ring-2 focus:ring-[#7096D1]/10 transition-all" placeholder="Tambah tag (tekan Enter)">
            <div class="flex flex-wrap gap-2">
              <span v-for="tag in materialTags" :key="tag" class="inline-flex items-center gap-1.5 px-3 py-1.5 bg-[#EDF1F6] text-[#334EAC] rounded-lg text-[11px] font-bold border border-[#BAD6EB]">
                {{ tag }} <button @click="removeTag(tag)" class="hover:text-rose-500 transition-colors"><svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"><line x1="18" x2="6" y1="6" y2="18"/><line x1="6" x2="18" y1="6" y2="18"/></svg></button>
              </span>
            </div>
          </div>

          <!-- AI Auto-Tag Suggestion -->
          <div class="p-5 rounded-2xl bg-gradient-to-br from-[#F7F2EB] to-white border border-amber-100 relative overflow-hidden group">
            <div class="absolute top-0 right-0 w-24 h-24 bg-amber-100/30 rounded-bl-full pointer-events-none group-hover:scale-110 transition-transform"></div>
            <h4 class="text-[13px] font-bold text-slate-900 mb-2 flex items-center gap-2 relative z-10 tracking-tight">
              <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="#F59E0B" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"/><path d="M12 16v-4"/><path d="M12 8h.01"/></svg>
              Tag Otomatis AI
            </h4>
            <p class="text-[12px] font-medium text-slate-500 mb-4 leading-relaxed relative z-10">Unggah file, dan AI kami akan secara otomatis memindai dan menyarankan tag kurikulum yang sesuai.</p>
            <button @click.prevent="runAISuggestion" :disabled="isAISuggesting" class="w-full py-2 bg-white border border-amber-200 text-amber-600 rounded-lg text-[11px] font-bold hover:border-amber-300 transition-colors relative z-10 disabled:opacity-50">
              {{ isAISuggesting ? 'Memindai...' : 'Pindai Dokumen' }}
            </button>
          </div>
        </div>

        <!-- Action Buttons -->
        <div class="bg-white/80 backdrop-blur-xl rounded-3xl p-6 md:p-8 shadow-[0_10px_40px_rgba(15,23,42,0.06)] border border-slate-100 flex flex-col gap-3 transition-all duration-300 ease-out hover:shadow-xl group/card">
          <button @click="publishMaterial" class="w-full py-4 bg-[#334EAC] hover:bg-[#081F5C] text-white rounded-2xl font-bold text-[15px] transition-all shadow-[0_4px_15px_rgba(51,78,172,0.15)] active:scale-95 flex items-center justify-center gap-2 text-center">
            <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"><path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"/><polyline points="17 8 12 3 7 8"/><line x1="12" x2="12" y1="3" y2="15"/></svg>
            Publikasikan Materi
          </button>
          
          <div class="flex gap-3">
            <button @click.prevent="saveDraft" class="flex-1 py-3.5 bg-white border border-slate-200 hover:border-[#334EAC] text-slate-600 hover:text-[#334EAC] rounded-2xl font-bold text-[14px] transition-colors active:scale-95">
              Simpan Draf
            </button>
            <RouterLink :to="baseMaterialsRoute" class="flex-1 py-3.5 bg-slate-50 border border-transparent hover:bg-slate-100 text-slate-500 hover:text-slate-900 rounded-2xl font-bold text-[14px] transition-colors active:scale-95 text-center">
              Batal
            </RouterLink>
          </div>
        </div>

      </div>
    </div>

    <!-- Dynamic Success Toast -->
    <div v-if="showSuccess" class="fixed bottom-6 right-6 z-50 bg-[#334EAC] text-white px-6 py-4 rounded-2xl shadow-[0_10px_40px_rgba(51,78,172,0.3)] flex items-center gap-3 animate-in slide-in-from-bottom-5">
      <div class="w-8 h-8 bg-white/20 rounded-full flex items-center justify-center shrink-0">
        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"><polyline points="20 6 9 17 4 12"/></svg>
      </div>
      <div>
        <h4 class="font-bold text-sm">Berhasil!</h4>
        <p class="text-xs text-indigo-100 font-medium">{{ successMessage }}</p>
      </div>
    </div>

  </div>
</template>

<script setup>
import { ref, computed } from 'vue'
import { RouterLink, useRoute, useRouter } from 'vue-router'

const route = useRoute()
const router = useRouter()
const baseMaterialsRoute = computed(() => {
  return route.path.startsWith('/tutor') ? '/tutor/materials' : '/pelajar/materials'
})

const materialTitle = ref('')
const materialDesc = ref('')
const materialCat = ref('Matematika')
const materialFileType = ref('Dokumen PDF')
const materialTags = ref(['Kalkulus'])
const newTag = ref('')
const isUploading = ref(false)
const uploadProgress = ref(0)
const uploadedFileName = ref('')
const isAISuggesting = ref(false)

const showSuccess = ref(false)
const successMessage = ref('')

const triggerFileUpload = () => {
  isUploading.value = true
  uploadedFileName.value = 'Mekanika_Lanjutan_UAS_Prep.pdf'
  uploadProgress.value = 10
  
  const timer = setInterval(() => {
    if (uploadProgress.value < 100) {
      uploadProgress.value += 15
      if (uploadProgress.value > 100) uploadProgress.value = 100
    } else {
      clearInterval(timer)
      successMessage.value = 'Lampiran dokumen berhasil diunggah!'
      showSuccess.value = true
      setTimeout(() => { showSuccess.value = false }, 3000)
    }
  }, 150)
}

const addTag = () => {
  if (newTag.value.trim() && !materialTags.value.includes(newTag.value.trim())) {
    materialTags.value.push(newTag.value.trim())
    newTag.value = ''
  }
}

const removeTag = (tag) => {
  materialTags.value = materialTags.value.filter(t => t !== tag)
}

const runAISuggestion = () => {
  isAISuggesting.value = true
  setTimeout(() => {
    isAISuggesting.value = false
    if (!materialTags.value.includes('Integral')) materialTags.value.push('Integral')
    if (!materialTags.value.includes('Olimpiade')) materialTags.value.push('Olimpiade')
    successMessage.value = 'AI berhasil mendeteksi tag kurikulum!'
    showSuccess.value = true
    setTimeout(() => { showSuccess.value = false }, 3000)
  }, 1000)
}

const publishMaterial = () => {
  successMessage.value = 'Materi akademik berhasil dipublikasikan!'
  showSuccess.value = true
  setTimeout(() => {
    showSuccess.value = false
    router.push(baseMaterialsRoute.value)
  }, 1500)
}

const saveDraft = () => {
  successMessage.value = 'Materi berhasil disimpan sebagai draf!'
  showSuccess.value = true
  setTimeout(() => {
    showSuccess.value = false
    router.push(baseMaterialsRoute.value)
  }, 1500)
}
</script>
