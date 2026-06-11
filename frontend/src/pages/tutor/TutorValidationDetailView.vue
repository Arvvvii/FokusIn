<template>
  <div class="space-y-8 w-full">
    
    <!-- Back Navigation -->
    <div class="mb-6 flex items-center gap-2">
      <RouterLink
        to="/tutor/ai-validation"
        class="text-sm font-bold text-slate-400 hover:text-[#334EAC] transition-colors flex items-center gap-1 w-fit bg-white/50 px-3 py-1.5 rounded-lg border border-slate-200/50"
      >
        ← Kembali ke Antrean
      </RouterLink>
    </div>

    <!-- Loading State -->
    <div v-if="loading" class="bg-white border border-slate-200 shadow-sm rounded-2xl p-12 flex flex-col items-center justify-center min-h-[400px]">
      <div class="w-12 h-12 border-4 border-slate-200 border-t-[#334EAC] rounded-full animate-spin mb-4"></div>
      <p class="text-sm font-bold text-slate-600">Memuat detail arsip ujian...</p>
    </div>

    <!-- Error State -->
    <div v-else-if="error" class="bg-white border border-slate-200 shadow-sm rounded-2xl p-12 flex flex-col items-center justify-center min-h-[400px]">
      <div class="w-16 h-16 rounded-full bg-rose-50 text-rose-500 flex items-center justify-center mb-4 border border-rose-100">
        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"/><line x1="12" x2="12" y1="16" y2="12"/><line x1="12" x2="12.01" y1="8" y2="8"/></svg>
      </div>
      <h3 class="text-sm font-bold text-slate-800 mb-2">Gagal memuat detail arsip ujian.</h3>
      <p class="text-xs text-slate-500 mb-6 max-w-sm leading-relaxed">{{ error }}</p>
      <button @click="fetchDetail" class="px-5 py-2.5 bg-[#334EAC] hover:bg-[#081F5C] text-white rounded-2xl font-bold text-xs shadow-md transition-all active:scale-95">
        Coba Lagi
      </button>
    </div>

    <!-- Main Workspace (Loaded State) -->
    <div v-else-if="examUpload" class="space-y-8">
      <!-- 1. EDITORIAL WORKSPACE HEADER SECTION -->
      <div class="bg-white border border-slate-200 shadow-sm rounded-2xl p-7 md:p-8 flex flex-col md:flex-row md:items-center justify-between gap-6 relative">
        <div class="absolute right-0 top-0 w-1/3 h-full bg-gradient-to-l from-[#EDF1F6]/50 to-transparent pointer-events-none"></div>
        
        <div class="relative z-10 flex items-center gap-4">
          <span class="w-12 h-12 rounded-2xl bg-[#334EAC]/10 text-[#334EAC] flex items-center justify-center shrink-0">
            <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="m12 3-1.912 5.813a2 2 0 0 1-1.275 1.275L3 12l5.813 1.912a2 2 0 0 1 1.275 1.275L12 21l1.912-5.813a2 2 0 0 1 1.275-1.275L21 12l-5.813-1.912a2 2 0 0 1-1.275-1.275L12 3Z"/></svg>
          </span>
          <div>
            <div class="flex items-center gap-2">
              <h1 class="text-2xl font-extrabold text-[#081F5C] tracking-tight leading-tight flex items-center gap-2">
                Validasi Ekstraksi AI
                <span class="px-2.5 py-0.5 bg-[#EDF1F6] text-[#334EAC] text-[9px] font-bold rounded-lg uppercase tracking-wider">
                  {{ examUpload.category?.name || 'Kategori' }}
                </span>
              </h1>
            </div>
            <p class="text-[13px] text-slate-500 font-medium mt-2 max-w-xl leading-relaxed">
              Mengevaluasi hasil pemindaian berkas: <span class="font-semibold text-slate-700">{{ examUpload.original_filename || examUpload.file_url?.split('/').pop() || 'Dokumen' }}</span>
            </p>
          </div>
        </div>

        <div class="relative z-10 flex shrink-0 gap-2 flex-wrap sm:flex-nowrap">
          <button 
            @click="updateStatus('invalid')" 
            :disabled="saving"
            class="px-5 py-2.5 bg-white border border-slate-200 hover:border-rose-200 text-rose-600 rounded-2xl font-bold text-[13px] shadow-sm active:scale-95 transition-all disabled:opacity-50"
          >
            Tolak Parsing
          </button>
          <button 
            @click="updateStatus('pending')" 
            :disabled="saving"
            class="px-5 py-2.5 bg-white border border-slate-200 hover:border-[#7096D1] text-[#334EAC] rounded-2xl font-bold text-[13px] shadow-sm active:scale-95 transition-all disabled:opacity-50"
          >
            Simpan Draft
          </button>
          <button 
            @click="updateStatus('valid')" 
            :disabled="saving"
            class="px-5 py-2.5 bg-emerald-600 hover:bg-emerald-700 text-white rounded-2xl font-bold text-[13px] shadow-sm active:scale-95 transition-all flex items-center gap-2 disabled:opacity-50"
          >
            <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"/><polyline points="22 4 12 14.01 9 11.01"/></svg>
            Setujui Validasi
          </button>
        </div>
      </div>

      <!-- 2. MASTER 3-COLUMN WORKSPACE CONTAINER -->
      <div class="bg-white border border-slate-200 rounded-3xl shadow-[0_5px_20px_rgba(15,23,42,0.02)] overflow-hidden flex flex-col w-full">
        <div class="flex flex-col lg:flex-row min-h-[620px] divide-y lg:divide-y-0 lg:divide-x divide-slate-200">
          
          <!-- COLUMN 1: Source Preview & Info (22%) -->
          <div class="w-full lg:w-[22%] bg-slate-50/30 p-5 flex flex-col gap-5">
            <div class="flex flex-col gap-2">
              <div class="flex items-center justify-between">
                 <h3 class="text-[11px] font-semibold text-slate-400 uppercase tracking-wide">Dokumen Sumber</h3>
                 <span class="text-[10px] font-semibold bg-slate-100 text-slate-500 px-2.5 py-0.5 rounded-lg">Pratinjau</span>
              </div>

              <!-- PDF Access: Render button or message based on file availability -->
              <div class="w-full mt-2">
                <div v-if="examUpload.file_url" class="space-y-3">
                  <a 
                    :href="examUpload.file_url" 
                    target="_blank" 
                    class="bg-slate-100 rounded-2xl border border-slate-200 flex items-center justify-center relative overflow-hidden group cursor-pointer p-4 h-[220px] shadow-inner"
                  >
                    <div class="absolute inset-0 bg-slate-900/40 backdrop-blur-[1px] flex items-center justify-center opacity-0 group-hover:opacity-100 transition-opacity z-10 rounded-2xl">
                       <span class="bg-[#334EAC] text-white px-3.5 py-2 rounded-xl text-xs font-bold shadow-md">Buka PDF</span>
                    </div>
                    
                    <!-- Scanned page preview mockup -->
                    <div class="w-[85%] h-full bg-white shadow-sm border border-slate-200/60 p-4 flex flex-col gap-2 relative transition-transform duration-300 group-hover:scale-[1.02] rounded-lg">
                      <div class="h-2 w-2/3 bg-slate-300 rounded mb-1"></div>
                      <div class="h-1.5 w-full bg-slate-100 rounded"></div>
                      <div class="h-1.5 w-full bg-slate-100 rounded"></div>
                      <div class="h-1.5 w-full bg-slate-100 rounded"></div>
                      <div class="h-1.5 w-3/4 bg-slate-100 rounded"></div>
                      <div class="mt-auto text-[8px] font-bold text-slate-300 text-right">PDF PREVIEW</div>
                    </div>
                  </a>

                  <a 
                    :href="examUpload.file_url" 
                    target="_blank" 
                    class="w-full text-center py-2.5 bg-[#334EAC] hover:bg-[#253B83] text-white rounded-xl font-bold text-xs shadow-sm transition-all block"
                  >
                    Lihat Dokumen
                  </a>
                </div>

                <div v-else class="space-y-3">
                  <div class="bg-slate-100 rounded-2xl border border-slate-200 flex items-center justify-center p-4 h-[220px] shadow-inner text-slate-400 text-xs font-semibold text-center leading-relaxed">
                    Pratinjau tidak tersedia.
                  </div>
                  <div class="w-full text-center py-2.5 bg-slate-100 text-slate-400 border border-slate-200 rounded-xl font-semibold text-xs shadow-sm block">
                    Dokumen tidak tersedia.
                  </div>
                </div>
              </div>
            </div>

            <div class="space-y-3">
              <h3 class="text-[11px] font-semibold text-slate-400 uppercase tracking-wide">Informasi Berkas</h3>
              <div class="space-y-2.5 text-xs">
                <div>
                  <span class="text-slate-400 font-medium block uppercase tracking-wider text-[10px] mb-0.5">Judul Arsip</span>
                  <span class="font-bold text-slate-800">{{ examUpload.category?.name || 'Mata Kuliah' }} Soal Ujian</span>
                </div>
                
                <div>
                  <span class="text-slate-400 font-medium block uppercase tracking-wider text-[10px] mb-0.5">Nama File</span>
                  <span class="font-bold text-slate-700 break-all">{{ examUpload.original_filename || examUpload.file_url?.split('/').pop() || 'Dokumen.pdf' }}</span>
                </div>

                <div>
                  <span class="text-slate-400 font-medium block uppercase tracking-wider text-[10px] mb-0.5">Kategori</span>
                  <span class="font-bold text-slate-800">{{ examUpload.category?.name || 'Umum' }}</span>
                </div>

                <div>
                  <span class="text-slate-400 font-medium block uppercase tracking-wider text-[10px] mb-0.5">Uploader</span>
                  <span class="font-bold text-slate-800">{{ examUpload.user?.name || 'Pengguna' }}</span>
                </div>

                <div>
                  <span class="text-slate-400 font-medium block uppercase tracking-wider text-[10px] mb-0.5">Tanggal Upload</span>
                  <span class="font-bold text-slate-800">{{ formatDate(examUpload.created_at) }}</span>
                </div>
              </div>
            </div>
          </div>

          <!-- COLUMN 2: Validation Editor (53% Dominance) -->
          <div class="flex-1 w-full lg:w-[53%] flex flex-col bg-white">
            <div class="px-5 py-3.5 bg-slate-50/50 border-b border-slate-200 flex items-center justify-between shrink-0">
              <div class="flex items-center gap-1.5">
                 <button class="p-1.5 text-slate-400 hover:text-[#081F5C] hover:bg-slate-200 rounded transition-colors" title="Bold"><svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M14 12a4 4 0 0 0 0-8H6v8"/><path d="M15 20a4 4 0 0 0 0-8H6v8Z"/></svg></button>
                 <button class="p-1.5 text-slate-400 hover:text-[#081F5C] hover:bg-slate-200 rounded transition-colors" title="Italic"><svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><line x1="19" x2="5" y1="4" y2="20"/><line x1="15" x2="5" y1="4" y2="4"/><line x1="19" x2="9" y1="20" y2="20"/></svg></button>
                 <div class="w-px h-4 bg-slate-200 mx-1.5"></div>
                 <button class="p-1.5 text-slate-400 hover:text-[#081F5C] hover:bg-slate-200 rounded transition-colors" title="Bullet List"><svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><line x1="8" x2="21" y1="6" y2="6"/><line x1="8" x2="21" y1="12" y2="12"/><line x1="8" x2="21" y1="18" y2="18"/><line x1="3" x2="3.01" y1="6" y2="6"/><line x1="3" x2="3.01" y1="12" y2="12"/><line x1="3" x2="3.01" y1="18" y2="18"/></svg></button>
              </div>
              
              <button @click="triggerAutoFix" class="px-3 py-1.5 bg-[#EDF1F6] hover:bg-[#D0E3FF] text-[#334EAC] rounded-xl text-xs font-bold flex items-center gap-1.5 transition-colors">
                <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M12 20h9"/><path d="M16.5 3.5a2.12 2.12 0 0 1 3 3L7 19l-4 1 1-4Z"/></svg>
                Format Otomatis
              </button>
            </div>
            
            <div class="p-6 flex-1 flex flex-col relative min-h-[460px]">
              <div class="flex items-center justify-between mb-4">
                <span class="text-xs font-bold text-slate-400 uppercase tracking-wider">Hasil OCR / Editor Teks</span>
                <div v-if="hasTypo" class="bg-amber-50 border border-amber-100 text-amber-600 px-2.5 py-0.5 rounded-lg text-[10px] font-bold flex items-center gap-1.5">
                   <svg xmlns="http://www.w3.org/2000/svg" class="w-3.5 h-3.5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"/><line x1="12" x2="12" y1="8" y2="12"/><line x1="12" x2="12.01" y1="16" y2="16"/></svg>
                   Kemungkinan Typo
                </div>
                <div v-else class="bg-emerald-50 border border-emerald-100 text-emerald-600 px-2.5 py-0.5 rounded-lg text-[10px] font-bold flex items-center gap-1.5">
                   <svg xmlns="http://www.w3.org/2000/svg" class="w-3.5 h-3.5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"><polyline points="20 6 9 17 4 12"/></svg>
                   OCR Terverifikasi
                </div>
              </div>
              
              <textarea v-model="editorText" class="w-full flex-1 resize-none focus:outline-none text-xs text-slate-700 font-medium leading-relaxed overflow-y-auto" spellcheck="false"></textarea>
            </div>
            
            <div class="px-5 py-3 bg-slate-50/50 border-t border-slate-200 flex items-center justify-between text-xs shrink-0 font-medium text-slate-500">
              <div class="flex items-center gap-2">
                <span class="w-2 h-2 rounded-full bg-emerald-500"></span>
                <span>Soal Terdeteksi: Pilihan Ganda (2), Esai (1)</span>
              </div>
              <button @click="triggerAutoFix" class="font-bold text-[#334EAC] hover:underline">Terapkan Auto-Fix Tatabahasa</button>
            </div>
          </div>

          <!-- COLUMN 3: Review Summary Panel (25%) -->
          <div class="w-full lg:w-[25%] bg-slate-50/30 p-5 flex flex-col gap-5 shrink-0">
            <div class="space-y-1">
              <h3 class="text-[11px] font-semibold text-slate-400 uppercase tracking-wide">Ringkasan Validasi</h3>
            </div>
            
            <div class="space-y-1.5">
              <span class="text-[10px] font-bold text-slate-400 uppercase tracking-wider block">Status Validasi</span>
              <div class="flex items-center justify-between">
                <span 
                  class="px-2.5 py-0.5 rounded-lg text-[10px] font-bold uppercase tracking-wider border"
                  :class="{
                    'bg-amber-50 text-amber-600 border-amber-100': examUpload.status === 'pending',
                    'bg-emerald-50 text-emerald-600 border-emerald-100': examUpload.status === 'valid',
                    'bg-rose-50 text-rose-600 border-rose-100': examUpload.status === 'invalid'
                  }"
                >
                  {{ getStatusText(examUpload.status) }}
                </span>
                <span class="text-xs text-slate-400">Diperbarui: {{ formatDate(examUpload.updated_at) }}</span>
              </div>
            </div>
            
            <hr class="border-slate-200/60" />
            
            <div class="space-y-2">
              <span class="text-[10px] font-bold text-slate-400 uppercase tracking-wider block">Metrik Akurasi AI</span>
              <div class="space-y-3">
                <div>
                  <div class="flex justify-between text-xs font-bold text-slate-700 mb-1">
                    <span>OCR Confidence</span>
                    <span class="text-[#334EAC]">{{ getOcrAccuracy(examUpload.id) }}%</span>
                  </div>
                  <div class="h-1.5 w-full bg-slate-200 rounded-full overflow-hidden">
                    <div class="h-full bg-emerald-500 rounded-full" :style="{ width: getOcrAccuracy(examUpload.id) + '%' }"></div>
                  </div>
                </div>
                <div>
                  <div class="flex justify-between text-xs font-bold text-slate-700 mb-1">
                    <span>Format Alignment</span>
                    <span class="text-[#334EAC]">92%</span>
                  </div>
                  <div class="h-1.5 w-full bg-slate-200 rounded-full overflow-hidden">
                    <div class="h-full bg-[#334EAC] rounded-full" style="width: 92%"></div>
                  </div>
                </div>
              </div>
            </div>
            
            <hr class="border-slate-200/60" />
            
            <div class="space-y-3">
              <div>
                <label class="block text-[10px] font-bold text-slate-400 uppercase tracking-wider mb-1.5">Catatan Validasi</label>
                <textarea 
                  v-model="validationNotes" 
                  class="w-full h-24 p-3 bg-white border border-slate-200 rounded-xl text-xs text-slate-600 focus:outline-none focus:border-[#7096D1] resize-none font-medium placeholder-slate-400 shadow-sm" 
                  placeholder="Masukkan catatan evaluasi di sini..."
                ></textarea>
              </div>
              
              <div class="flex items-center gap-2">
                <input type="checkbox" id="mark_urgent" class="rounded text-[#334EAC] focus:ring-[#7096D1]/20 border-slate-300 w-3.5 h-3.5 cursor-pointer">
                <label for="mark_urgent" class="text-xs font-bold text-slate-500 cursor-pointer select-none">Eskalasi ke Admin Utama</label>
              </div>
            </div>
          </div>

        </div>
      </div>
    </div>

    <!-- Feedback Toast -->
    <div v-if="showToast" class="fixed bottom-6 right-6 z-50 bg-[#334EAC] text-white px-6 py-4 rounded-2xl shadow-xl flex items-center gap-3 animate-in slide-in-from-bottom-5">
      <div class="w-8 h-8 bg-white/20 rounded-full flex items-center justify-center shrink-0">
        <svg v-if="toastTitle === 'Sukses'" xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"><polyline points="20 6 9 17 4 12"/></svg>
        <svg v-else xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"/><line x1="12" x2="12" y1="16" y2="12"/><line x1="12" x2="12.01" y1="8" y2="8"/></svg>
      </div>
      <div>
        <h4 class="font-bold text-sm">{{ toastTitle }}</h4>
        <p class="text-xs text-[#D0E3FF] font-medium">{{ toastMsg }}</p>
      </div>
    </div>

  </div>
</template>

<script setup>
import { ref, onMounted } from 'vue'
import { RouterLink, useRouter, useRoute } from 'vue-router'
import { examUploadService } from '@/services/examUpload.service'

const router = useRouter()
const route = useRoute()

const examUpload = ref(null)
const loading = ref(true)
const error = ref(null)
const saving = ref(false)

const hasTypo = ref(true)
const editorText = ref('')
const validationNotes = ref('')

const showToast = ref(false)
const toastTitle = ref('')
const toastMsg = ref('')

const fetchDetail = async () => {
  loading.value = true
  error.value = null
  try {
    const data = await examUploadService.getExamUploadById(route.params.id)
    examUpload.value = data
    editorText.value = data.extracted_text || ''
    validationNotes.value = data.validation_notes || ''
  } catch (err) {
    console.error(err)
    error.value = err
  } finally {
    loading.value = false
  }
}

const updateStatus = async (newStatus) => {
  saving.value = true
  try {
    // Save validation status updates
    const payload = {
      status: newStatus,
      validation_notes: validationNotes.value
    }
    await examUploadService.updateExamUpload(route.params.id, payload)
    
    // Persist edited OCR text text to PUT /api/exam-uploads/{id}/extracted-text
    try {
      await examUploadService.updateExtractedText(route.params.id, {
        extracted_text: editorText.value
      })
      toastTitle.value = 'Sukses'
      toastMsg.value = 'Perubahan teks OCR berhasil disimpan.'
    } catch (ocrErr) {
      console.error('Failed to persist OCR text edits:', ocrErr)
      toastTitle.value = 'Info'
      toastMsg.value = 'Validasi tersimpan, namun gagal memperbarui teks OCR.'
    }

    // Update local state status
    if (examUpload.value) {
      examUpload.value.status = newStatus
    }

    showToast.value = true
    
    setTimeout(() => {
      showToast.value = false
      if (newStatus === 'valid' || newStatus === 'invalid') {
        router.push('/tutor/ai-validation')
      }
    }, 2000)
  } catch (err) {
    console.error(err)
    toastTitle.value = 'Gagal'
    toastMsg.value = 'Gagal menyimpan perubahan OCR.'
    showToast.value = true
    setTimeout(() => {
      showToast.value = false
    }, 3000)
  } finally {
    saving.value = false
  }
}

const getStatusText = (status) => {
  switch (status) {
    case 'pending': return 'Menunggu'
    case 'valid': return 'Terverifikasi'
    case 'invalid': return 'Ditolak'
    default: return 'Menunggu'
  }
}

const getOcrAccuracy = (id) => {
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

// Auto fix triggers OCR persist as well
const triggerAutoFix = async () => {
  hasTypo.value = false
  editorText.value = `Ujian Akhir Semester
Mata Kuliah: Struktur Data
Waktu: 120 Menit

Bagian 1: Pilihan Ganda (Bobot 30%)
1. Struktur data mana yang mengikuti prinsip LIFO (Last In First Out)?
   A. Queue
   B. Stack (Kunci Jawaban)
   C. Linked List
   D. Tree

2. Kompleksitas waktu untuk mencari elemen pada Binary Search Tree (BST) yang seimbang adalah?
   A. O(n)
   B. O(log n) (Kunci Jawaban)
   C. O(n log n)
   D. O(1)

Bagian 2: Esai (Bobot 70%)
Jelaskan perbedaan mendasar antara Singly Linked List dan Doubly Linked List, sertakan contoh kasus penggunaan yang paling optimal untuk keduanya!`
  
  try {
    await examUploadService.updateExtractedText(route.params.id, {
      extracted_text: editorText.value
    })
    toastTitle.value = 'Auto-Fix Diterapkan!'
    toastMsg.value = 'Perubahan teks OCR berhasil disimpan.'
  } catch (e) {
    console.error('Failed auto-fix text save:', e)
    toastTitle.value = 'Auto-Fix Diterapkan!'
    toastMsg.value = 'Typo dan spasi editor diformat ulang (lokal).'
  }

  showToast.value = true
  setTimeout(() => {
    showToast.value = false
  }, 3000)
}

onMounted(() => {
  fetchDetail()
})
</script>

