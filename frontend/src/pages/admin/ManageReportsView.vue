<template>
  <div class="p-6 md:p-8 xl:p-10 max-w-[1600px] mx-auto animate-in fade-in duration-500">
    
    <!-- Header -->
    <div class="bg-white/60 backdrop-blur-xl rounded-3xl p-7 md:p-8 shadow-[0_10px_40px_rgba(15,23,42,0.06)] border border-slate-200/60 relative overflow-hidden mb-8">
      <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4 relative z-10">
        <div>
          <h1 class="text-3xl md:text-4xl font-extrabold text-slate-900 tracking-tight leading-tight">User Reports & Escalation</h1>
          <p class="text-[15px] text-slate-600 font-medium mt-2 max-w-xl leading-relaxed">Tinjau laporan pengguna, tangani pelanggaran serius, dan kelola eskalasi kasus secara komprehensif.</p>
        </div>
        <div class="flex items-center gap-4">
          <select class="px-4 py-2.5 bg-white border border-slate-200 rounded-xl text-sm font-bold text-slate-600 shadow-sm focus:outline-none focus:border-[#334EAC] appearance-none cursor-pointer">
            <option>Terbaru</option>
            <option>Prioritas Tinggi</option>
            <option>Diselesaikan</option>
          </select>
        </div>
      </div>
    </div>

    <!-- Moderation Queues -->
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
      
      <!-- Left Column: Queue List -->
      <div class="lg:col-span-1 flex flex-col gap-4 max-h-[800px] overflow-y-auto custom-scrollbar pr-2">
        <div v-for="report in reports" :key="report.id" 
             class="bg-white p-5 rounded-2xl border transition-all cursor-pointer shadow-sm group"
             :class="selectedReport?.id === report.id ? 'border-[#334EAC] ring-1 ring-[#334EAC] bg-[#F7F2EB]/10' : 'border-slate-200 hover:border-[#7096D1]'"
             @click="selectedReport = report">
          <div class="flex items-start justify-between mb-3">
            <span class="px-2.5 py-1 rounded-md text-[10px] font-bold uppercase tracking-widest"
                  :class="report.severity === 'High' ? 'bg-rose-50 text-rose-700' : (report.severity === 'Medium' ? 'bg-amber-50 text-amber-700' : 'bg-sky-50 text-sky-700')">
              {{ report.type }}
            </span>
            <span class="text-xs font-bold text-slate-400">{{ report.time }}</span>
          </div>
          <h3 class="text-base font-bold text-slate-900 mb-1 line-clamp-1 group-hover:text-[#081F5C] tracking-tight">{{ report.targetTitle }}</h3>
          <p class="text-xs text-slate-500 mb-3">Dilaporkan oleh: <span class="font-bold text-slate-700">{{ report.reporter }}</span> ({{ report.reason }})</p>
          <div class="flex items-center gap-2">
            <div class="flex -space-x-2">
              <span class="w-6 h-6 rounded-full bg-slate-200 border-2 border-white"></span>
              <span class="w-6 h-6 rounded-full bg-slate-300 border-2 border-white"></span>
            </div>
            <span class="text-[10px] font-bold text-slate-400">{{ report.flagCount }} laporan serupa</span>
          </div>
        </div>
      </div>

      <!-- Right Column: Detail & Action Panel -->
      <div class="lg:col-span-2">
        <div v-if="selectedReport" class="bg-white rounded-2xl border border-slate-200 shadow-sm h-full flex flex-col overflow-hidden animate-in fade-in zoom-in-95 duration-200">
          
          <!-- Detail Header -->
          <div class="p-6 border-b border-slate-100 bg-slate-50/50">
            <div class="flex items-center gap-3 mb-2">
              <span class="px-2.5 py-1 bg-rose-100 text-rose-700 rounded-md text-[10px] font-bold uppercase tracking-widest">
                <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" class="inline-block mr-1 -mt-0.5"><path d="m21.73 18-8-14a2 2 0 0 0-3.48 0l-8 14A2 2 0 0 0 4 21h16a2 2 0 0 0 1.73-3Z"/><line x1="12" x2="12" y1="9" y2="13"/><line x1="12" x2="12.01" y1="17" y2="17"/></svg>
                Dilaporkan {{ selectedReport.flagCount }} kali
              </span>
              <span class="text-xs font-bold text-slate-400">ID: #RPT-{{ selectedReport.id }}</span>
            </div>
            <h2 class="text-[28px] font-bold text-slate-900 tracking-tight mb-2">{{ selectedReport.targetTitle }}</h2>
            <div class="flex items-center gap-2 text-sm text-slate-500 font-medium">
              Ditulis oleh <span class="font-bold text-[#081F5C] cursor-pointer hover:underline">{{ selectedReport.author }}</span> pada {{ selectedReport.postDate }}
            </div>
          </div>

          <!-- Content Review -->
          <div class="p-6 flex-1 overflow-y-auto">
            <h3 class="text-xs font-bold text-slate-400 uppercase tracking-widest mb-4">Konten yang Dilaporkan</h3>
            <div class="p-5 bg-slate-50 rounded-xl border border-slate-200 text-sm text-slate-700 leading-relaxed mb-6 font-medium">
              {{ selectedReport.content }}
            </div>
            
            <h3 class="text-xs font-bold text-slate-400 uppercase tracking-widest mb-4">Konteks Pelanggaran</h3>
            <ul class="space-y-3">
              <li v-for="(reason, i) in selectedReport.reasonsDetail" :key="i" class="flex items-start gap-3 p-3 rounded-xl border border-rose-100 bg-rose-50/50">
                <div class="mt-0.5">
                  <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="#be123c" stroke-width="2"><path d="M20 6 9 17l-5-5"/></svg>
                </div>
                <div>
                  <p class="text-sm font-bold text-rose-900">{{ reason.title }}</p>
                  <p class="text-xs text-rose-700/80">{{ reason.desc }}</p>
                </div>
              </li>
            </ul>
          </div>

          <!-- Action Footer -->
          <div class="p-6 border-t border-slate-100 bg-white flex items-center justify-between gap-4 mt-auto">
            <button @click="resolveReport" class="px-5 py-2.5 text-slate-500 font-bold text-sm hover:text-emerald-600 hover:bg-emerald-50 rounded-xl transition-all">
              Abaikan (Restore)
            </button>
            <div class="flex gap-3">
              <button @click="markAsSpam" class="px-5 py-2.5 bg-amber-50 text-amber-700 border border-amber-200 hover:bg-amber-100 font-bold text-sm rounded-xl transition-all shadow-sm">
                Tandai Spam
              </button>
              <button @click="removeContent" class="px-5 py-2.5 bg-rose-600 text-white font-bold text-sm rounded-xl hover:bg-rose-700 transition-all shadow-[0_4px_15px_rgba(225,29,72,0.2)] flex items-center gap-2">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path d="M3 6h18"/><path d="M19 6v14c0 1-1 2-2 2H7c-1 0-2-1-2-2V6"/><path d="M8 6V4c0-1 1-2 2-2h4c1 0 2 1 2 2v2"/></svg>
                Remove Content
              </button>
            </div>
          </div>

        </div>

        <!-- Empty State -->
        <div v-else class="h-full bg-white rounded-2xl border border-slate-200 shadow-sm flex flex-col items-center justify-center p-10 text-center">
          <div class="w-16 h-16 bg-slate-50 rounded-full flex items-center justify-center mb-4 text-slate-400">
            <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M12 22c5.523 0 10-4.477 10-10S17.523 2 12 2 2 6.477 2 12s4.477 10 10 10z"/><path d="m9 12 2 2 4-4"/></svg>
          </div>
          <h3 class="text-lg font-bold text-slate-700 tracking-tight mb-2">Tidak ada laporan yang dipilih</h3>
          <p class="text-sm text-slate-500 max-w-sm">Pilih laporan dari daftar di sebelah kiri untuk meninjau dan mengambil tindakan operasional.</p>
        </div>
      </div>
      
    </div>
  </div>
</template>

<script setup>
import { ref } from 'vue'

const selectedReport = ref(null)

const resolveReport = () => {
  alert('Laporan diabaikan dan konten direstore.')
}

const markAsSpam = () => {
  alert('Konten ditandai sebagai spam dan pengguna akan menerima peringatan.')
}

const removeContent = () => {
  alert('Konten dihapus secara permanen dari platform.')
}

const reports = ref([
  { 
    id: 928, 
    type: 'Spam', 
    severity: 'Medium',
    time: '12m ago', 
    targetTitle: 'Jawaban di "Bagaimana algoritma Dijkstra bekerja?"',
    author: 'User_9981',
    postDate: '10 Mei 2026, 14:20',
    reporter: 'Budi Santoso',
    reason: 'Link mencurigakan',
    flagCount: 4,
    content: 'Untuk jawaban lengkapnya silakan kunjungi website casino online kami di http://spam-link-example.com/bonus-new-member. Algoritma dijamin jalan 100%!',
    reasonsDetail: [
      { title: 'Tautan Eksternal Berbahaya', desc: 'Sistem mendeteksi tautan yang tidak berhubungan dengan akademik.' },
      { title: 'Pola Spam Dikenali', desc: 'Pesan serupa diposting oleh user ini di 5 thread berbeda.' }
    ]
  },
  { 
    id: 929, 
    type: 'Plagiarisme', 
    severity: 'High',
    time: '45m ago', 
    targetTitle: 'Materi: "Catatan Kalkulus Dasar Semester 1"',
    author: 'Andi Pratama',
    postDate: '9 Mei 2026, 09:15',
    reporter: 'System AI',
    reason: 'Similarity 89%',
    flagCount: 1,
    content: '[Isi dokumen PDF yang diekstrak] Bab 1. Limit dan Kekontinuan... (Konten identik dengan modul resmi Universitas X tanpa atribusi).',
    reasonsDetail: [
      { title: 'AI Plagiarism Detection', desc: 'Terdeteksi 89% kesamaan dengan sumber dari internet (Modul Univ X).' }
    ]
  },
  { 
    id: 930, 
    type: 'Harassment', 
    severity: 'High',
    time: '2h ago', 
    targetTitle: 'Komentar di "Bantuan Fisika Kuantum"',
    author: 'Alex J.',
    postDate: '10 Mei 2026, 11:10',
    reporter: 'Maria Garcia',
    reason: 'Kata-kata kasar',
    flagCount: 3,
    content: 'Pertanyaan bodoh macam apa ini? Kalau soal segampang ini saja tidak bisa mending berhenti kuliah saja lu dasar ***.',
    reasonsDetail: [
      { title: 'Penggunaan Kata Kasar', desc: 'AI mendeteksi kata-kata yang melanggar pedoman komunitas FokusIn.' },
      { title: 'Laporan Pengguna', desc: 'Dilaporkan oleh 3 pelajar yang berbeda karena toxic behavior.' }
    ]
  }
])
</script>

<style scoped>
.custom-scrollbar::-webkit-scrollbar {
  width: 4px;
}
.custom-scrollbar::-webkit-scrollbar-track {
  background: transparent;
}
.custom-scrollbar::-webkit-scrollbar-thumb {
  background: rgba(15, 23, 42, 0.1);
  border-radius: 10px;
}
.custom-scrollbar:hover::-webkit-scrollbar-thumb {
  background: rgba(15, 23, 42, 0.2);
}
</style>
