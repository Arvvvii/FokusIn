<template>
  <div class="space-y-8 w-full">
    
    <!-- Back Navigation -->
    <div class="mb-6 flex items-center gap-2">
      <RouterLink
        to="/tutor/ai-validation"
        class="text-sm font-bold text-slate-400 hover:text-[#334EAC] transition-colors flex items-center gap-1 w-fit bg-white/50 px-3 py-1.5 rounded-lg border border-slate-200/50"
      >
        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="m15 18-6-6 6-6"></path></svg>
        Kembali ke Antrean
      </RouterLink>
    </div>

    <!-- 1. GLASSMORPHIC WORKSPACE HEADER -->
    <div class="bg-white/60 backdrop-blur-xl rounded-3xl p-7 md:p-8 shadow-[0_10px_40px_rgba(15,23,42,0.06)] border border-slate-200/60 relative overflow-hidden flex flex-col md:flex-row md:items-center justify-between gap-6">
      <div class="absolute right-0 top-0 w-1/3 h-full bg-gradient-to-l from-[#EDF1F6]/80 to-transparent pointer-events-none"></div>
      
      <div class="relative z-10 flex items-center gap-4">
        <div>
          <div class="flex items-center gap-2">
            <h1 class="text-2xl md:text-3xl font-bold text-slate-900 tracking-tight flex items-center gap-2">
              Validasi Ekstraksi AI
              <span class="px-2 py-0.5 bg-[#EDF1F6] text-[#334EAC] text-[9px] font-bold rounded-lg uppercase tracking-wider">UAS SOAL</span>
            </h1>
          </div>
          <p class="text-[14px] text-slate-500 font-medium leading-relaxed mt-1">
            Mengevaluasi hasil pemindaian berkas: <span class="font-semibold text-slate-700">Struktur_Data_UAS_2025.pdf</span>
          </p>
        </div>
      </div>

      <div class="relative z-10 flex shrink-0 gap-2">
        <button @click="rejectParsing" class="px-5 py-2.5 bg-white border border-slate-200 hover:border-rose-200 text-rose-600 rounded-2xl font-bold text-[13px] shadow-sm active:scale-95 transition-all">
          Tolak Parsing
        </button>
        <button @click="saveDraft" class="px-5 py-2.5 bg-white border border-slate-200 hover:border-[#7096D1] text-[#334EAC] rounded-2xl font-bold text-[13px] shadow-sm active:scale-95 transition-all">
          Simpan Draft
        </button>
        <button @click="approveValidation" class="px-5 py-2.5 bg-emerald-600 hover:bg-emerald-700 text-white rounded-2xl font-bold text-[13px] shadow-sm active:scale-95 transition-all flex items-center gap-2">
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
               <span class="text-[10px] font-semibold bg-slate-100 text-slate-500 px-2.5 py-0.5 rounded-lg">Hal 1 dari 4</span>
            </div>
            <div class="bg-slate-100 rounded-2xl border border-slate-200 flex items-center justify-center relative overflow-hidden group cursor-pointer p-4 h-[280px] shadow-inner">
              <div class="absolute inset-0 bg-slate-900/40 backdrop-blur-[1px] flex items-center justify-center opacity-0 group-hover:opacity-100 transition-opacity z-10 rounded-2xl">
                 <span class="bg-[#334EAC] text-white px-3.5 py-2 rounded-xl text-xs font-bold shadow-md">Lihat Full PDF</span>
              </div>
              
              <!-- Scanned page preview -->
              <div class="w-[85%] h-full bg-white shadow-sm border border-slate-200/60 p-4 flex flex-col gap-2 relative transition-transform duration-300 group-hover:scale-[1.02] rounded-lg">
                <div class="h-2 w-2/3 bg-slate-300 rounded mb-1"></div>
                <div class="h-1.5 w-full bg-slate-100 rounded"></div>
                <div class="h-1.5 w-full bg-slate-100 rounded"></div>
                <div class="h-1.5 w-full bg-slate-100 rounded"></div>
                <div class="h-1.5 w-3/4 bg-slate-100 rounded"></div>
                <div class="mt-3 h-2 w-1/2 bg-slate-200 rounded"></div>
                <div class="h-1.5 w-full bg-slate-100 rounded"></div>
                <div class="h-1.5 w-full bg-slate-100 rounded"></div>
                <div class="mt-auto text-[8px] font-bold text-slate-300 text-right">FOKUSIN OCR v1.2</div>
              </div>
            </div>
          </div>

          <div class="space-y-3">
            <h3 class="text-[11px] font-semibold text-slate-400 uppercase tracking-wide">Informasi Berkas</h3>
            <div class="space-y-2.5 text-xs">
              <div>
                <span class="text-slate-400 font-medium block uppercase tracking-wider text-[10px] mb-0.5">Format Deteksi</span>
                <span class="font-semibold text-slate-700 bg-slate-100 border border-slate-200 px-2 py-0.5 rounded uppercase text-[10px]">PDF Scan / OCR</span>
              </div>
              
              <div class="pt-3 border-t border-slate-200/60">
                <span class="text-slate-400 font-medium block uppercase tracking-wider text-[10px] mb-1.5">Topik Utama</span>
                <div class="flex flex-wrap gap-1.5">
                  <span class="px-2.5 py-0.5 bg-slate-100 border border-slate-200 rounded-lg text-[10px] font-semibold text-slate-600">Binary Tree</span>
                  <span class="px-2.5 py-0.5 bg-slate-100 border border-slate-200 rounded-lg text-[10px] font-semibold text-slate-600">Linked List</span>
                  <span class="px-2.5 py-0.5 bg-slate-100 border border-slate-200 rounded-lg text-[10px] font-semibold text-slate-600">Sorting</span>
                </div>
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
                :class="valStatus === 'Pending' ? 'bg-amber-50 text-amber-600 border-amber-100' : 'bg-emerald-50 text-emerald-600 border-emerald-100'"
              >
                {{ valStatus === 'Pending' ? 'Menunggu' : 'Terverifikasi' }}
              </span>
              <span class="text-xs text-slate-400">Diperbarui: Hari Ini</span>
            </div>
          </div>
          
          <hr class="border-slate-200/60" />
          
          <div class="space-y-2">
            <span class="text-[10px] font-bold text-slate-400 uppercase tracking-wider block">Metrik Akurasi AI</span>
            <div class="space-y-3">
              <div>
                <div class="flex justify-between text-xs font-bold text-slate-700 mb-1">
                  <span>OCR Confidence</span>
                  <span class="text-[#334EAC]">96%</span>
                </div>
                <div class="h-1.5 w-full bg-slate-200 rounded-full overflow-hidden">
                  <div class="h-full bg-emerald-500 rounded-full" style="width: 96%"></div>
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
              <textarea class="w-full h-20 p-3 bg-white border border-slate-200 rounded-xl text-xs text-slate-600 focus:outline-none focus:border-[#7096D1] resize-none font-medium placeholder-slate-400 shadow-sm" placeholder="Catatan opsional..."></textarea>
            </div>
            
            <div class="flex items-center gap-2">
              <input type="checkbox" id="mark_urgent" class="rounded text-[#334EAC] focus:ring-[#7096D1]/20 border-slate-300 w-3.5 h-3.5 cursor-pointer">
              <label for="mark_urgent" class="text-xs font-bold text-slate-500 cursor-pointer select-none">Eskalasi ke Admin Utama</label>
            </div>
          </div>
        </div>

      </div>
    </div>

    <!-- Feedback Toast -->
    <div v-if="showToast" class="fixed bottom-6 right-6 z-50 bg-[#334EAC] text-white px-6 py-4 rounded-2xl shadow-xl flex items-center gap-3 animate-in slide-in-from-bottom-5">
      <div class="w-8 h-8 bg-white/20 rounded-full flex items-center justify-center shrink-0">
        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"><polyline points="20 6 9 17 4 12"/></svg>
      </div>
      <div>
        <h4 class="font-bold text-sm">{{ toastTitle }}</h4>
        <p class="text-xs text-indigo-100 font-medium">{{ toastMsg }}</p>
      </div>
    </div>

  </div>
</template>

<script setup>
import { ref } from 'vue'
import { RouterLink, useRouter } from 'vue-router'

const router = useRouter()
const hasTypo = ref(true)
const valStatus = ref('Pending')
const showToast = ref(false)
const toastTitle = ref('')
const toastMsg = ref('')

const editorText = ref(`Ujian Akhir Semester
Mata Kuliah: Struktur Data
Waktu: 120 Menit

Bagian 1: Pilihan Ganda (Bobot 30%)
1. Struktur data mana yang mengikuti prinsip LIFO (Last In First Out)?
A. Queue
B. Stack
C. Linked List
D. Tree

2. Kompleksitas waktu untuk mencari elemen pada Binary Search Tree yang seimbang adalah?
A. O(n)
B. O(log n) 
C. O(n log n)
D. O(1)

Bagian 2: Esai (Bobot 70%)
Jelaskan perbedaan mendasar antara Singly Linked List dan Doubly Linked List, sertakan contoh kasus penggunaan yang paling optimal untuk keduanya!`)

const triggerAutoFix = () => {
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
  
  toastTitle.value = 'Auto-Fix Diterapkan!'
  toastMsg.value = 'Typo dan spasi editor berhasil diformat ulang secara otomatis.'
  showToast.value = true
  setTimeout(() => {
    showToast.value = false
  }, 3000)
}

const saveDraft = () => {
  toastTitle.value = 'Draft Disimpan'
  toastMsg.value = 'Perubahan editor Anda berhasil disimpan sebagai draft.'
  showToast.value = true
  setTimeout(() => {
    showToast.value = false
  }, 3000)
}

const rejectParsing = () => {
  toastTitle.value = 'Parsing Ditolak'
  toastMsg.value = 'Status ekstraksi dokumen diubah menjadi ditolak parsing.'
  showToast.value = true
  setTimeout(() => {
    showToast.value = false
    router.push('/tutor/ai-validation')
  }, 2000)
}

const approveValidation = () => {
  valStatus.value = 'Approved'
  toastTitle.value = 'Validasi Disetujui!'
  toastMsg.value = 'Dokumen ujian berhasil diterbitkan ke dalam bank soal FokusIn.'
  showToast.value = true
  setTimeout(() => {
    showToast.value = false
    router.push('/tutor/ai-validation')
  }, 2000)
}
</script>
