<template>
  <div class="relative min-h-screen pb-12 overflow-hidden bg-[#F7F2EB]">
    <div class="relative z-10 max-w-[1450px] mx-auto px-4 sm:px-6 xl:px-8 py-8 space-y-6">
      
      <!-- Back Navigation -->
      <div class="mb-6 flex items-center gap-2">
        <RouterLink
          to="/tutor/mentoring"
          class="text-sm font-bold text-slate-400 hover:text-[#334EAC] transition-colors flex items-center gap-1 w-fit bg-white/50 px-3 py-1.5 rounded-lg border border-slate-200/50"
        >
          <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="m15 18-6-6 6-6"></path></svg>
          Kembali ke Mentoring
        </RouterLink>
      </div>

      <!-- HEADER -->
      <div class="bg-white/60 backdrop-blur-xl rounded-3xl p-7 md:p-8 shadow-[0_10px_40px_rgba(15,23,42,0.06)] border border-slate-200/60 relative overflow-hidden sm:p-7 flex flex-col sm:flex-row sm:items-center justify-between gap-4">
        <div class="flex items-center gap-4">
          <div>
            <div class="flex items-center gap-2">
              <h1 class="text-3xl md:text-4xl font-extrabold text-slate-900 tracking-tight leading-tight">Workspace Mentoring: Sesi #{{ $route.params.id || '1' }}</h1>
              <span class="px-2.5 py-0.5 bg-emerald-50 text-emerald-600 rounded text-[9px] font-bold border border-emerald-100 uppercase">Aktif</span>
            </div>
            <p class="text-[15px] text-slate-600 font-medium mt-2 max-w-xl leading-relaxed">Algoritma & Struktur Data • Java & C++ Spesialist</p>
          </div>
        </div>

        <div class="flex items-center gap-2">
          <button @click="showLaunch = true" class="px-4 py-2 bg-[#334EAC] hover:bg-[#081F5C] text-white rounded-xl font-bold text-xs transition-all shadow-sm active:scale-[0.98] flex items-center gap-1.5">
            <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="m15.6 11.6 5.4-3.2c.5-.3 1.2 0 1.2.7v5.8c0 .7-.7 1-1.2.7l-5.4-3.2a1.2 1.2 0 0 1 0-2Z"/><rect width="14" height="14" x="2" y="5" rx="3" ry="3"/></svg>
            Luncurkan Kelas Virtual
          </button>
        </div>
      </div>

      <!-- WORKSPACE CONTENT -->
      <div class="grid grid-cols-1 lg:grid-cols-[minmax(0,1fr)_360px] gap-6 xl:gap-8 items-start">
        
        <!-- LEFT PANEL: DETAILS, AGENDA & RESOURCES -->
        <div class="space-y-6 w-full min-w-0">
          
          <!-- Student profile info -->
          <div class="bg-white rounded-3xl p-6 shadow-sm border border-slate-200 flex flex-col md:flex-row gap-6 items-start">
            <div class="w-16 h-16 rounded-full bg-[#EDF1F6] flex items-center justify-center font-bold text-xl text-[#081F5C] shrink-0">BS</div>
            <div class="space-y-2 flex-1">
              <h3 class="text-md font-bold text-[#081F5C] leading-none mb-1">Budi Santoso</h3>
              <p class="text-xs text-slate-500">Mahasiswa Ilmu Komputer • Semester 4</p>
              <div class="flex flex-wrap gap-2 pt-1">
                <span class="px-2 py-0.5 bg-slate-100 rounded text-[10px] font-semibold text-slate-500 border border-slate-200">Kehadiran: 100%</span>
                <span class="px-2 py-0.5 bg-slate-100 rounded text-[10px] font-semibold text-slate-500 border border-slate-200">6 Sesi Selesai</span>
              </div>
            </div>
          </div>

          <!-- Agenda & Syllabus Tracking -->
          <div class="bg-white rounded-3xl p-6 shadow-sm border border-slate-200 space-y-4">
            <h3 class="text-[15px] font-bold text-[#081F5C] tracking-tight border-b border-slate-100 pb-3">Agenda Sesi & Capaian Silabus</h3>
            
            <div class="space-y-3">
              <div class="flex items-start gap-3 text-sm">
                <input type="checkbox" id="agenda_1" checked class="rounded text-[#334EAC] focus:ring-[#7096D1]/20 border-slate-300 w-4 h-4 mt-0.5">
                <label for="agenda_1" class="font-medium text-slate-600 line-through">Review Konsep Binary Search Tree (BST)</label>
              </div>
              <div class="flex items-start gap-3 text-sm">
                <input type="checkbox" id="agenda_2" checked class="rounded text-[#334EAC] focus:ring-[#7096D1]/20 border-slate-300 w-4 h-4 mt-0.5">
                <label for="agenda_2" class="font-medium text-slate-600 line-through">Implementasi BST Traversal (Inorder, Preorder) di Java</label>
              </div>
              <div class="flex items-start gap-3 text-sm">
                <input type="checkbox" id="agenda_3" class="rounded text-[#334EAC] focus:ring-[#7096D1]/20 border-slate-300 w-4 h-4 mt-0.5">
                <label for="agenda_3" class="font-medium text-slate-800 font-bold">Latihan Mandiri & Analisa Kompleksitas Big-O</label>
              </div>
            </div>
          </div>

          <!-- Private Notes & Log -->
          <div class="bg-white rounded-3xl p-6 shadow-sm border border-slate-200 space-y-4">
            <div class="flex items-center justify-between border-b border-slate-100 pb-3">
              <h3 class="text-[15px] font-bold text-[#081F5C] tracking-tight">Catatan Evaluasi Mentor (Private)</h3>
              <button @click="saveNote" class="text-xs font-bold text-[#334EAC] hover:underline">Simpan Catatan</button>
            </div>
            <textarea 
              v-model="notes" 
              class="w-full bg-slate-50 border border-slate-200 rounded-2xl p-4 text-sm font-medium text-slate-700 focus:outline-none focus:border-[#7096D1] resize-none" 
              rows="6"
              placeholder="Catat evaluasi detail, progress pemahaman siswa, atau checklist materi untuk sesi berikutnya..."
            ></textarea>
          </div>

        </div>

        <!-- RIGHT PANEL: ROOM PREVIEW & SHARING -->
        <div class="space-y-6 w-full sticky top-6">
          
          <!-- Shared Resources -->
          <div class="bg-white rounded-3xl p-6 shadow-sm border border-slate-200 space-y-4">
            <h3 class="text-[15px] font-bold text-[#081F5C] tracking-tight border-b border-slate-100 pb-3">Berkas Pembelajaran Sesi</h3>
            
            <div class="space-y-2">
              <div v-for="file in filesList" :key="file.name" class="p-3 bg-slate-50 border border-slate-100 rounded-xl flex items-center justify-between gap-3">
                <div class="flex items-center gap-2.5 min-w-0">
                  <div class="w-8 h-8 rounded-lg bg-indigo-50 border border-indigo-100 text-indigo-500 flex items-center justify-center shrink-0">
                    <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M14.5 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V7.5L14.5 2z"/><polyline points="14 2 14 8 20 8"/></svg>
                  </div>
                  <span class="text-xs font-bold text-slate-700 truncate">{{ file.name }}</span>
                </div>
                <button class="text-xs font-bold text-[#334EAC] hover:underline shrink-0">Buka</button>
              </div>
            </div>

            <!-- Upload Resource Button -->
            <button @click="triggerUpload" class="w-full py-2.5 bg-slate-50 hover:bg-[#EDF1F6] border border-slate-200 text-[#334EAC] rounded-xl font-bold text-xs transition-colors flex items-center justify-center gap-2">
              <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"/><polyline points="17 8 12 3 7 8"/><line x1="12" x2="12" y1="3" y2="15"/></svg>
              Bagikan File Baru
            </button>
          </div>

        </div>

      </div>
    </div>

    <!-- Virtual Room Simulation Modal -->
    <div v-if="showLaunch" class="fixed inset-0 z-50 bg-[#081F5C]/80 backdrop-blur-md flex items-center justify-center p-4">
      <div class="bg-white rounded-3xl max-w-2xl w-full p-6 sm:p-8 shadow-2xl border border-white/10 flex flex-col gap-6 relative">
        <button @click="showLaunch = false" class="absolute top-4 right-4 text-slate-400 hover:text-slate-600">
          <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M18 6 6 18"/><path d="m6 6 12 12"/></svg>
        </button>
        
        <div>
          <h3 class="text-lg font-bold text-[#081F5C] mb-1">Simulasi Kelas Virtual FokusIn</h3>
          <p class="text-xs text-slate-500">Anda sedang terhubung ke ruang bimbingan interaktif bersama Budi Santoso.</p>
        </div>

        <div class="aspect-video bg-slate-900 rounded-2xl flex flex-col items-center justify-center text-white p-6 relative overflow-hidden">
          <div class="absolute inset-0 bg-[radial-gradient(circle_at_center,rgba(51,78,172,0.15),transparent)]"></div>
          <div class="w-16 h-16 rounded-full bg-emerald-500 flex items-center justify-center text-white mb-4 animate-pulse">
            <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="m15.6 11.6 5.4-3.2c.5-.3 1.2 0 1.2.7v5.8c0 .7-.7 1-1.2.7l-5.4-3.2a1.2 1.2 0 0 1 0-2Z"/><rect width="14" height="14" x="2" y="5" rx="3" ry="3"/></svg>
          </div>
          <h4 class="text-sm font-bold mb-1">Kelas Aktif & Terenkripsi</h4>
          <p class="text-xs text-slate-400 text-center max-w-sm">Audio, video, whiteboard sharing, dan integrasi editor kode Java terhubung.</p>
        </div>

        <div class="flex justify-end gap-3">
          <button @click="showLaunch = false" class="px-5 py-2.5 bg-rose-500 hover:bg-rose-600 text-white rounded-2xl font-bold text-xs transition-colors">
            Akhiri Sesi
          </button>
        </div>
      </div>
    </div>

    <!-- Success Toast -->
    <div v-if="showSuccess" class="fixed bottom-6 right-6 z-50 bg-emerald-500 text-white px-6 py-4 rounded-2xl shadow-[0_10px_40px_rgba(16,185,129,0.3)] flex items-center gap-3 animate-in slide-in-from-bottom-5">
      <div class="w-8 h-8 bg-white/20 rounded-full flex items-center justify-center shrink-0">
        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"><polyline points="20 6 9 17 4 12"/></svg>
      </div>
      <div>
        <h4 class="font-bold text-sm">Aksi Berhasil!</h4>
        <p class="text-xs text-emerald-100 font-medium">Data baru berhasil ditambahkan.</p>
      </div>
    </div>
  </div>
</template>

<script setup>
import { ref } from 'vue'
import { RouterLink } from 'vue-router'

const showLaunch = ref(false)
const showSuccess = ref(false)
const notes = ref('Budi Santoso menunjukkan pemahaman yang sangat baik dalam konsep dasar rekursif, namun masih sering kesulitan dalam mengidentifikasi base-case pada tree traversal. Selama kelas, kami mempraktekkan BST traversal di editor C++.')

const filesList = ref([
  { name: 'BST_Java_Template.zip' }
])

const saveNote = () => {
  showSuccess.value = true
  setTimeout(() => {
    showSuccess.value = false
  }, 3000)
}

const triggerUpload = () => {
  filesList.value.push({
    name: 'Analisa_Kompleksitas_BST.pdf'
  })
  showSuccess.value = true
  setTimeout(() => {
    showSuccess.value = false
  }, 3000)
}
</script>
