<template>
  <div class="relative min-h-screen pb-12 bg-[#F7F2EB]">
    <div class="max-w-[1450px] mx-auto px-4 sm:px-6 xl:px-8 py-6 space-y-5 animate-in fade-in duration-500">
      
      <!-- Compact Editorial Header -->
      <div class="bg-white rounded-2xl border border-slate-200 shadow-sm p-5 flex flex-col sm:flex-row sm:items-center justify-between gap-5 mb-6 relative overflow-hidden">
        <div class="flex items-center gap-4">
          <span class="w-12 h-12 rounded-xl bg-[#334EAC]/10 text-[#334EAC] flex items-center justify-center shrink-0">
            <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M4 19.5v-15A2.5 2.5 0 0 1 6.5 2H20v20H6.5a2.5 2.5 0 0 1 0-5H20"/></svg>
          </span>
          <div>
            <h1 class="text-[30px] font-semibold text-slate-900 tracking-tight leading-tight mb-1">Arsip & Kurasi Materi</h1>
            <p class="text-base text-slate-500 leading-relaxed max-w-xl">Verifikasi, setujui, atau tolak materi ilmiah dan modul ajar yang diunggah oleh tutor.</p>
          </div>
        </div>
        <div class="flex shrink-0">
          <button class="px-4 py-2 bg-white text-slate-700 border border-slate-200 rounded-xl font-medium text-sm hover:bg-slate-50 shadow-sm transition-all active:scale-95">
            Ekspor CSV
          </button>
        </div>
      </div>

      <!-- Filters & Search -->
      <div class="flex flex-col md:flex-row gap-3">
        <div class="relative flex-1">
          <div class="absolute inset-y-0 left-0 pl-3.5 flex items-center pointer-events-none text-slate-400">
            <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><circle cx="11" cy="11" r="8"/><path d="m21 21-4.3-4.3"/></svg>
          </div>
          <input 
            type="text" 
            v-model="searchQuery"
            class="w-full pl-10 pr-4 py-2.5 bg-white border border-slate-200 rounded-xl text-sm text-slate-800 placeholder-slate-400 focus:outline-none focus:border-[#7096D1] focus:ring-4 focus:ring-[#7096D1]/10 transition-all shadow-sm" 
            placeholder="Cari judul materi, pengunggah, atau subjek..."
          >
        </div>
        <div class="flex items-center gap-2">
          <select v-model="filterSubject" class="px-4 py-2.5 bg-white border border-slate-200 rounded-xl text-sm font-medium text-slate-600 focus:outline-none focus:border-[#7096D1] shadow-sm cursor-pointer">
            <option value="">Semua Subjek</option>
            <option value="Fisika">Fisika</option>
            <option value="Ilmu Komputer">Ilmu Komputer</option>
            <option value="Matematika">Matematika</option>
          </select>
          <select v-model="filterStatus" class="px-4 py-2.5 bg-white border border-slate-200 rounded-xl text-sm font-medium text-slate-600 focus:outline-none focus:border-[#7096D1] shadow-sm cursor-pointer">
            <option value="">Semua Status</option>
            <option value="Pending">Menunggu Verifikasi</option>
            <option value="Approved">Disetujui</option>
          </select>
        </div>
      </div>

      <!-- Materials List -->
      <div class="bg-white rounded-xl border border-slate-200 shadow-sm overflow-hidden">
        <div class="overflow-x-auto">
          <table class="w-full text-left border-collapse">
            <thead>
              <tr class="bg-slate-50/80 border-b border-slate-200">
                <th class="px-5 py-3 text-xs font-bold text-slate-400 uppercase tracking-widest">Informasi Dokumen</th>
                <th class="px-5 py-3 text-xs font-bold text-slate-400 uppercase tracking-widest">Pengunggah</th>
                <th class="px-5 py-3 text-xs font-bold text-slate-400 uppercase tracking-widest">Subjek</th>
                <th class="px-5 py-3 text-xs font-bold text-slate-400 uppercase tracking-widest">Status</th>
                <th class="px-5 py-3 text-xs font-bold text-slate-400 uppercase tracking-widest text-right">Aksi</th>
              </tr>
            </thead>
            <tbody class="divide-y divide-slate-100">
              <tr v-for="item in filteredMaterials" :key="item.id" class="hover:bg-slate-50/50 transition-colors">
                <td class="px-5 py-3.5">
                  <div class="flex items-center gap-4">
                    <div class="w-8 h-8 rounded-lg bg-indigo-50 border border-indigo-100 text-indigo-600 flex items-center justify-center shrink-0">
                      <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path d="M14.5 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V7.5L14.5 2z"/><polyline points="14 2 14 8 20 8"/></svg>
                    </div>
                    <div>
                      <RouterLink :to="'/admin/materials/' + item.id" class="text-sm font-semibold text-slate-900 leading-snug tracking-tight hover:text-[#334EAC] transition-colors block">
                        {{ item.title }}
                      </RouterLink>
                      <p class="text-xs text-slate-400 mt-0.5">Format: {{ item.format }} • Ukuran: {{ item.size }}</p>
                    </div>
                  </div>
                </td>
                <td class="px-5 py-3.5">
                  <p class="text-sm font-medium text-slate-700">{{ item.author }}</p>
                  <p class="text-xs text-slate-400 mt-0.5">Role: {{ item.authorRole }}</p>
                </td>
                <td class="px-5 py-3.5">
                  <span class="px-2 py-0.5 bg-slate-100 text-slate-600 text-xs font-medium rounded-md">{{ item.subject }}</span>
                </td>
                <td class="px-5 py-3.5">
                  <div class="flex items-center gap-1.5">
                    <span class="w-1.5 h-1.5 rounded-full" :class="item.status === 'Approved' ? 'bg-emerald-500' : 'bg-amber-500'"></span>
                    <span class="text-xs font-semibold" :class="item.status === 'Approved' ? 'text-emerald-700' : 'text-amber-700'">{{ item.status }}</span>
                  </div>
                </td>
                <td class="px-5 py-3.5 text-right">
                  <div class="flex items-center justify-end gap-2">
                    <button 
                      v-if="item.status === 'Pending'"
                      @click="approveItem(item)"
                      class="px-3 py-1 bg-emerald-50 text-emerald-600 border border-emerald-100 hover:bg-emerald-100 rounded-lg text-xs font-bold transition-all active:scale-95"
                    >
                      Setujui
                    </button>
                    <button 
                      v-if="item.status === 'Pending'"
                      @click="rejectItem(item)"
                      class="px-3 py-1 bg-rose-50 text-rose-600 border border-rose-100 hover:bg-rose-100 rounded-lg text-xs font-bold transition-all active:scale-95"
                    >
                      Tolak
                    </button>
                    <span v-else class="text-xs text-slate-400 font-semibold px-2">Sudah Terverifikasi</span>
                  </div>
                </td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>

    </div>
  </div>
</template>

<script setup>
import { ref, computed } from 'vue'
import { RouterLink } from 'vue-router'

const searchQuery = ref('')
const filterSubject = ref('')
const filterStatus = ref('')

const materials = ref([
  { id: 1, title: 'Modul Praktikum Fisika Dasar 1A', author: 'Prof. Anderson', authorRole: 'Tutor', subject: 'Fisika', format: 'PDF', size: '4.2 MB', status: 'Approved' },
  { id: 2, title: 'Kunci Pembahasan Ujian Tengah Semester Kalkulus III', author: 'Dr. Sarah Smith', authorRole: 'Tutor', subject: 'Matematika', format: 'PDF', size: '2.1 MB', status: 'Pending' },
  { id: 3, title: 'Pengenalan Bahasa Python untuk Struktur Data', author: 'Budi Santoso', authorRole: 'Pelajar', subject: 'Ilmu Komputer', format: 'DOCX', size: '1.5 MB', status: 'Pending' },
  { id: 4, title: 'Arsip Kuliah Jaringan Komputer Lanjut', author: 'Prof. Anderson', authorRole: 'Tutor', subject: 'Ilmu Komputer', format: 'PDF', size: '8.4 MB', status: 'Approved' },
])

const filteredMaterials = computed(() => {
  return materials.value.filter(item => {
    const matchesSearch = item.title.toLowerCase().includes(searchQuery.value.toLowerCase()) ||
                          item.author.toLowerCase().includes(searchQuery.value.toLowerCase())
    const matchesSubject = !filterSubject.value || item.subject === filterSubject.value
    const matchesStatus = !filterStatus.value || item.status === filterStatus.value
    return matchesSearch && matchesSubject && matchesStatus
  })
})

const approveItem = (item) => {
  item.status = 'Approved'
}

const rejectItem = (item) => {
  const index = materials.value.findIndex(m => m.id === item.id)
  if (index !== -1) {
    materials.value.splice(index, 1)
  }
}
</script>
