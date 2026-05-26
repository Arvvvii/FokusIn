<template>
  <div class="relative min-h-screen pb-12 bg-[#F7F2EB]">
    <div class="max-w-[1450px] mx-auto px-4 sm:px-6 xl:px-8 py-6 space-y-5 animate-in fade-in duration-500">
      
      <!-- Compact Editorial Header -->
      <div class="bg-white rounded-2xl border border-slate-200 shadow-sm p-5 flex flex-col sm:flex-row sm:items-center justify-between gap-5 mb-6 relative overflow-hidden">
        <div class="flex items-center gap-4">
          <span class="w-9 h-9 rounded-xl bg-amber-50 border border-amber-100 text-amber-600 flex items-center justify-center shrink-0">
            <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path d="m3 21 1.9-5.7a8.5 8.5 0 1 1 3.8 3.8z"/></svg>
          </span>
          <div>
            <h1 class="text-[30px] font-semibold text-slate-900 tracking-tight leading-tight mb-1">Antrean Moderasi Diskusi</h1>
            <p class="text-base text-slate-500 leading-relaxed max-w-xl">Kelola penyaringan kiriman, validasi konten akademik, dan tangguhkan pelanggaran pedoman komunitas.</p>
          </div>
        </div>
      </div>

      <!-- Moderation Queue -->
      <div class="bg-white rounded-xl border border-slate-200 shadow-sm overflow-hidden">
        <div class="px-5 py-4 border-b border-slate-100 flex items-center justify-between">
          <h2 class="text-base font-semibold text-slate-900">Konten Perlu Tindakan Moderasi</h2>
        </div>
        <div class="divide-y divide-slate-100">
          <div v-for="item in queue" :key="item.id" class="p-5 flex flex-col md:flex-row md:items-start justify-between gap-4 hover:bg-slate-50/50 transition-colors">
            <div class="space-y-2 max-w-4xl">
              <div class="flex items-center gap-2">
                <span class="px-2 py-0.5 bg-rose-50 text-rose-700 text-xs font-semibold rounded border border-rose-100 uppercase tracking-widest">{{ item.priority }}</span>
                <span class="text-xs text-slate-400">ID: #MOD-{{ item.id }} • Dilaporkan oleh: {{ item.reporter }}</span>
              </div>
              <h3 class="text-base font-semibold text-slate-900 leading-snug tracking-tight">{{ item.title }}</h3>
              <div class="p-3 bg-slate-50 rounded-lg border border-slate-200 text-xs text-slate-700 font-mono leading-relaxed">
                "{{ item.content }}"
              </div>
            </div>
            <div class="flex shrink-0 gap-2 items-center">
              <button @click="approveItem(item)" class="h-10 px-4 bg-emerald-50 text-emerald-600 hover:bg-emerald-100 rounded-xl text-sm font-semibold transition-all">
                Loloskan
              </button>
              <button @click="rejectItem(item)" class="h-10 px-4 bg-rose-50 text-rose-600 hover:bg-rose-100 rounded-xl text-sm font-semibold transition-all">
                Hapus
              </button>
              <RouterLink :to="'/admin/moderation/' + item.id" class="h-10 px-4 bg-slate-100 text-slate-700 hover:bg-slate-200 rounded-xl text-sm font-semibold transition-all flex items-center justify-center">
                Audit Detail
              </RouterLink>
            </div>
          </div>
        </div>
      </div>

    </div>
  </div>
</template>

<script setup>
import { ref } from 'vue'
import { RouterLink } from 'vue-router'

const queue = ref([
  { id: 701, priority: 'Tinggi', reporter: 'System AI Auditor', title: 'Thread Pelanggaran Plagiarisme Kalkulus III', content: 'Materi terdeteksi memiliki kesamaan 92% dengan modul berhak cipta tanpa sitasi.', status: 'Pending' },
  { id: 702, priority: 'Sedang', reporter: 'Andi Pratama', title: 'Spam Tautan Judi di Forum Pemrograman', content: 'Kunjungi link casino online kami sekarang juga untuk keuntungan melimpah.', status: 'Pending' },
])

const approveItem = (item) => {
  const index = queue.value.indexOf(item)
  if (index !== -1) queue.value.splice(index, 1)
}

const rejectItem = (item) => {
  const index = queue.value.indexOf(item)
  if (index !== -1) queue.value.splice(index, 1)
}
</script>
