<template>
  <div class="space-y-8 w-full">
    

    <!-- 1. GLASSMORPHIC HEADER SECTION -->
    <div class="tutor-page-header flex flex-col md:flex-row md:items-center justify-between gap-6 relative">
      <div class="absolute right-0 top-0 w-1/3 h-full bg-gradient-to-l from-[#EDF1F6]/80 to-transparent pointer-events-none"></div>
      
      <div class="relative z-10 flex items-center gap-4">
        <span class="w-12 h-12 rounded-2xl bg-[#334EAC]/10 text-[#334EAC] flex items-center justify-center shrink-0">
          <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"/><polyline points="22 4 12 14.01 9 11.01"/></svg>
        </span>
        <div>
          <h1 class="header-title">Verifikasi Jawaban Mahasiswa</h1>
          <p class="header-desc mt-2 max-w-xl">
            Tinjau, nilai, dan berikan persetujuan untuk diskusi mahasiswa guna meningkatkan kualitas akademik komunitas FokusIn.
          </p>
        </div>
      </div>

      <div class="relative z-10 flex shrink-0 gap-4">
        <div class="header-stat-card">
           <span class="text-2xl font-bold text-amber-500 tracking-tight leading-none mb-1">{{ answers.filter(a => a.status === 'Pending').length }}</span>
           <span class="text-[11px] font-bold text-slate-400 uppercase tracking-widest">Pending</span>
        </div>
        <div class="header-stat-card">
           <span class="text-2xl font-bold text-emerald-500 tracking-tight leading-none mb-1">86</span>
           <span class="text-[11px] font-bold text-slate-400 uppercase tracking-widest">Diverifikasi</span>
        </div>
      </div>
    </div>

    <!-- 2. STRUCTURAL ASYMMETRIC GRID -->
    <div class="grid grid-cols-1 lg:grid-cols-[minmax(0,1fr)_360px] gap-8 items-start w-full">
      
      <!-- LEFT SECTION: FILTER & CONTENT -->
      <div class="space-y-6 flex-1 self-stretch">
        
        <!-- Filter & Search Toolbar -->
        <div class="bg-white rounded-3xl p-3 shadow-sm border border-slate-200/60 flex flex-col sm:flex-row gap-3">
          <!-- Search -->
          <div class="relative flex-1 group">
            <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none text-slate-400 group-focus-within:text-[#334EAC] transition-colors">
              <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><circle cx="11" cy="11" r="8"/><path d="m21 21-4.3-4.3"/></svg>
            </div>
            <input 
              type="text" 
              v-model="searchQuery"
              class="w-full pl-11 pr-4 py-2.5 bg-transparent border-none text-[14px] text-slate-800 placeholder-slate-400 focus:outline-none focus:ring-0 font-medium" 
              :placeholder="currentFilter === 'Leaderboard' ? 'Cari nama mahasiswa teraktif...' : 'Cari kata kunci, mahasiswa, atau topik...'"
            >
          </div>
          
          <div class="h-px sm:h-auto sm:w-px bg-slate-200 mx-2"></div>
          
          <!-- Tabs -->
          <div class="flex items-center gap-1.5 overflow-x-auto no-scrollbar">
            <button 
              v-for="filter in ['Pending', 'Semua', 'Diverifikasi', 'Leaderboard']" 
              :key="filter"
              @click="currentFilter = filter"
              :class="['tutor-tab', currentFilter === filter ? 'active' : '']"
            >
              {{ filter === 'Leaderboard' ? '🏆 Leaderboard' : filter }}
            </button>
          </div>
        </div>

        <!-- MAIN REVIEW FEED -->
        <div v-if="currentFilter !== 'Leaderboard'" class="space-y-6">
          <div 
            v-for="post in filteredAnswers" 
            :key="post.id" 
            class="discussion-card"
          >
            <!-- Card Header Meta -->
            <div class="flex flex-wrap items-center justify-between gap-3 mb-4 border-b border-slate-100 pb-4">
              <div class="flex items-center gap-3">
                <div class="w-10 h-10 rounded-full bg-[#F7F2EB] border border-[#D0E3FF] flex items-center justify-center shrink-0 text-[#334EAC] font-bold text-sm">
                  {{ post.initials }}
                </div>
                <div>
                  <h4 class="text-sm font-bold text-slate-900 leading-none">{{ post.author }}</h4>
                  <div class="flex items-center gap-2 mt-1.5 text-[11px] text-slate-400 font-bold">
                    <span>Reputasi: {{ post.rep }}</span>
                    <span class="w-1 h-1 rounded-full bg-slate-300"></span>
                    <span>{{ post.time }}</span>
                  </div>
                </div>
              </div>
              
              <div class="flex items-center gap-2">
                <span class="px-2.5 py-0.5 bg-[#F7F2EB] text-[#081F5C] rounded-lg text-[10px] font-bold border border-[#D0E3FF]/60 flex items-center gap-1">
                  AI: {{ post.match }}% Cocok
                </span>
                <span 
                  :class="['px-2.5 py-0.5 rounded-lg text-[10px] font-bold border', post.status === 'Pending' ? 'badge-pending' : post.status === 'Diverifikasi' ? 'badge-verified' : 'badge-rejected']"
                >
                  {{ post.status }}
                </span>
              </div>
            </div>

            <!-- Content Area -->
            <div class="mb-5 space-y-3">
              <RouterLink :to="post.questionUrl" class="text-sm font-bold text-[#334EAC] hover:text-[#081F5C] hover:underline block w-fit">
                {{ post.question }}
              </RouterLink>
              <div class="bg-slate-50/50 p-4 rounded-2xl border border-slate-100">
                <p class="text-xs sm:text-sm text-slate-600 font-medium leading-relaxed">
                  {{ post.content }}
                </p>
              </div>
            </div>

            <!-- AI Warnings -->
            <div v-if="post.warning" class="bg-rose-50/50 border border-rose-100 p-3 rounded-2xl flex gap-3 mb-5">
              <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" class="text-rose-500 mt-0.5 shrink-0"><circle cx="12" cy="12" r="10"/><line x1="12" x2="12" y1="8" y2="12"/><line x1="12" x2="12.01" y1="16" y2="16"/></svg>
              <div>
                <p class="text-xs font-bold text-rose-700">Rekomendasi AI: Tinjau Ulang</p>
                <p class="text-[11px] text-rose-600 mt-0.5 font-medium">{{ post.warning }}</p>
              </div>
            </div>

            <!-- Actions -->
            <div class="space-y-4 pt-3 border-t border-slate-100" v-if="post.status === 'Pending'">
              <textarea 
                v-model="post.feedback"
                class="w-full bg-white border border-slate-200 rounded-xl p-3 text-xs text-slate-700 placeholder-slate-400 focus:outline-none focus:border-[#7096D1] resize-none" 
                rows="2" 
                placeholder="Tulis saran atau feedback perbaikan untuk mahasiswa ini..."
              ></textarea>

              <div class="flex flex-wrap items-center gap-2.5">
                <button @click="handleVerify(post.id)" class="btn-verify">
                  <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"/><polyline points="22 4 12 14.01 9 11.01"/></svg>
                  Verifikasi Jawaban
                </button>
                <button @click="handleReject(post.id)" class="btn-reject">
                  <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M18 6 6 18"/><path d="m6 6 12 12"/></svg>
                  Tolak Jawaban
                </button>
                <button @click="handleMarkBest(post.id)" class="px-4 py-2 bg-amber-50 hover:bg-amber-100 text-amber-700 border border-amber-100 rounded-xl font-bold text-xs shadow-sm active:scale-95 transition-all flex items-center gap-1.5 ml-auto">
                  <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"/></svg>
                  Tandai Terbaik
                </button>
              </div>
            </div>
            <div v-else class="p-3 bg-slate-50 border border-slate-200 rounded-2xl flex items-center justify-between text-xs text-slate-500 font-bold">
              <span>Feedback Anda: {{ post.feedback || '-' }}</span>
              <span class="text-emerald-600 font-bold">Diverifikasi & Selesai</span>
            </div>
          </div>

          <!-- Empty State -->
          <div v-if="filteredAnswers.length === 0" class="bg-white rounded-3xl border border-slate-200 p-12 text-center shadow-sm">
            <svg xmlns="http://www.w3.org/2000/svg" class="w-12 h-12 text-slate-300 mx-auto mb-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="11" cy="11" r="8"/><path d="m21 21-4.3-4.3"/></svg>
            <h3 class="text-sm font-bold text-slate-900 mb-1">Tidak Ada Jawaban</h3>
            <p class="text-xs text-slate-400 font-semibold max-w-sm mx-auto">Semua jawaban di kategori ini telah selesai ditinjau.</p>
          </div>
        </div>

        <!-- 3. INTERACTIVE LEADERBOARD SUB-PAGE -->
        <div v-else class="leaderboard-container">
          <div class="flex items-center justify-between">
            <div>
              <h2 class="text-lg font-bold text-slate-950">Leaderboard Mahasiswa Teraktif</h2>
              <p class="text-xs text-slate-400 font-semibold mt-0.5">Peringkat didasarkan pada jumlah jawaban yang terverifikasi dan poin reputasi.</p>
            </div>
            <span class="px-3 py-1.5 bg-[#EDF1F6] text-[#334EAC] border border-slate-200 rounded-2xl text-xs font-bold">Mei 2026</span>
          </div>

          <!-- Podium Top 3 High Fidelity Layout -->
          <div class="grid grid-cols-1 md:grid-cols-3 gap-6 pt-4 items-end max-w-2xl mx-auto">
            <!-- 2nd Place -->
            <div class="flex flex-col items-center bg-slate-50 border border-slate-200/60 rounded-3xl p-5 relative overflow-hidden order-2 md:order-1 h-[200px] justify-end">
              <div class="absolute top-4 w-9 h-9 rounded-full bg-slate-200 border-2 border-white flex items-center justify-center font-bold text-xs text-slate-600 shadow-sm">2</div>
              <div class="w-12 h-12 rounded-full bg-[#F7F2EB] border border-slate-200 flex items-center justify-center font-bold text-sm text-[#334EAC] mb-2">SA</div>
              <h4 class="text-xs font-bold text-slate-900">Siti Aminah</h4>
              <p class="text-[11px] font-semibold text-slate-400">18 Jawaban Valid</p>
              <div class="mt-3 text-xs font-extrabold text-slate-700 bg-slate-100 px-2.5 py-0.5 rounded-lg border border-slate-200/40">310 Poin</div>
            </div>

            <!-- 1st Place -->
            <div class="flex flex-col items-center bg-amber-50/40 border-2 border-amber-200/60 rounded-3xl p-6 relative overflow-hidden order-1 md:order-2 h-[230px] justify-end shadow-sm">
              <div class="absolute top-4 w-10 h-10 rounded-full bg-amber-400 border-2 border-white flex items-center justify-center font-bold text-xs text-white shadow-md">👑 1</div>
              <div class="w-14 h-14 rounded-full bg-amber-100 border border-amber-200 flex items-center justify-center font-bold text-base text-amber-700 mb-2">BS</div>
              <h4 class="text-sm font-bold text-slate-900">Budi Santoso</h4>
              <p class="text-xs font-semibold text-amber-600">24 Jawaban Valid</p>
              <div class="mt-3 text-xs font-extrabold text-amber-800 bg-amber-100/60 px-3 py-1 rounded-xl border border-amber-200/40">420 Poin</div>
            </div>

            <!-- 3rd Place -->
            <div class="flex flex-col items-center bg-slate-50 border border-slate-200/60 rounded-3xl p-5 relative overflow-hidden order-3 md:order-3 h-[180px] justify-end">
              <div class="absolute top-4 w-8 h-8 rounded-full bg-amber-600/10 border-2 border-white flex items-center justify-center font-bold text-xs text-amber-800 shadow-sm">3</div>
              <div class="w-12 h-12 rounded-full bg-orange-50 border border-orange-100 flex items-center justify-center font-bold text-sm text-orange-600 mb-2">RD</div>
              <h4 class="text-xs font-bold text-slate-900">Rizky Dharma</h4>
              <p class="text-[11px] font-semibold text-slate-400">12 Jawaban Valid</p>
              <div class="mt-3 text-xs font-extrabold text-slate-700 bg-slate-100 px-2.5 py-0.5 rounded-lg border border-slate-200/40">120 Poin</div>
            </div>
          </div>

          <!-- Leaderboard Table Rank 4+ -->
          <div class="table-container mt-8">
            <div class="table-header p-5 flex items-center justify-between">
              <h3 class="table-title">Peringkat Selanjutnya</h3>
            </div>
            <div class="overflow-x-auto">
              <table class="w-full text-left text-sm text-slate-600">
                <thead class="bg-slate-50/50 border-b border-slate-100 text-xs uppercase tracking-wider text-slate-500 font-bold">
                  <tr>
                    <th class="py-4 px-6">Peringkat</th>
                    <th class="py-4 px-6">Mahasiswa</th>
                    <th class="py-4 px-6">Jawaban Terverifikasi</th>
                    <th class="py-4 px-6">Total Reputasi</th>
                  </tr>
                </thead>
                <tbody class="divide-y divide-slate-100/80 font-medium">
                  <tr v-for="student in activeStudentsList" :key="student.rank" class="hover:bg-slate-50/50 transition-colors">
                    <td class="py-4 px-6 font-bold text-slate-400">#{{ student.rank }}</td>
                    <td class="py-4 px-6 flex items-center gap-3">
                      <span class="w-8 h-8 rounded-full bg-[#EDF1F6] text-[#081F5C] font-bold text-xs flex items-center justify-center border border-[#D0E3FF]/60">{{ student.initials }}</span>
                      <span class="font-bold text-slate-800">{{ student.name }}</span>
                    </td>
                    <td class="py-4 px-6 font-semibold text-slate-600">{{ student.answersCount }} Jawaban</td>
                    <td class="py-4 px-6">
                      <span class="bg-[#F7F2EB] text-[#081F5C] px-2.5 py-1 rounded-lg text-xs font-bold border border-[#D0E3FF]/60">
                        {{ student.points }} Poin
                      </span>
                    </td>
                  </tr>
                </tbody>
              </table>
            </div>
          </div>
        </div>

      </div>

      <!-- RIGHT SIDEBAR: ADJACENT WIDGET INTEGRATION -->
      <div class="space-y-6 w-full shrink-0 lg:w-[360px]">
        <!-- AI Moderation Insights -->
        <div class="bg-gradient-to-br from-[#081F5C] to-[#334EAC] rounded-3xl p-6 shadow-[0_15px_40px_rgba(8,31,92,0.15)] border border-white/10 text-white relative overflow-hidden group/card">
          <div class="absolute -right-4 -top-4 w-32 h-32 bg-white/10 blur-[40px] rounded-full pointer-events-none"></div>
          
          <h3 class="text-sm font-bold tracking-tight mb-4 flex items-center gap-2 relative z-10">
            <span class="w-7 h-7 rounded-lg bg-white/10 flex items-center justify-center"><svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M21 16V8a2 2 0 0 0-1-1.73l-7-4a2 2 0 0 0-2 0l-7 4A2 2 0 0 0 3 8v8a2 2 0 0 0 1 1.73l7 4a2 2 0 0 0 2 0l7-4A2 2 0 0 0 21 16z"/><polyline points="7.5 4.21 12 6.81 16.5 4.21"/><polyline points="7.5 19.79 7.5 14.6 3 12"/><polyline points="21 12 16.5 14.6 16.5 19.79"/><polyline points="3.27 6.96 12 12.01 20.73 6.96"/><line x1="12" x2="12" y1="22.08" y2="12"/></svg></span>
            AI Moderation Insights
          </h3>
          
          <ul class="space-y-3 relative z-10 text-xs font-semibold">
            <li class="flex items-start gap-2.5">
              <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round" class="text-emerald-400 mt-0.5 shrink-0"><polyline points="20 6 9 17 4 12"/></svg>
              <p class="text-[#BAD6EB] leading-normal">95% jawaban bulan ini memiliki akurasi tinggi.</p>
            </li>
            <li class="flex items-start gap-2.5">
              <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round" class="text-rose-400 mt-0.5 shrink-0"><path d="M10.29 3.86L1.82 18a2 2 0 0 0 1.71 3h16.94a2 2 0 0 0 1.71-3L13.71 3.86a2 2 0 0 0-3.42 0z"/><line x1="12" x2="12" y1="9" y2="13"/><line x1="12" x2="12.01" y1="17" y2="17"/></svg>
              <p class="text-[#BAD6EB] leading-normal">Terdeteksi indikasi copas AI di kategori Basis Data.</p>
            </li>
          </ul>
        </div>

        <!-- Verification Stats -->
        <div class="bg-white rounded-3xl p-6 border border-slate-200/60 shadow-sm space-y-4">
          <h3 class="text-sm font-bold text-slate-900 tracking-tight">Statistik Verifikasi</h3>
          
          <div class="space-y-3 text-xs font-semibold">
            <div>
              <div class="flex items-center justify-between mb-1">
                <span class="text-slate-400">Target Hari Ini</span>
                <span class="text-slate-700">15 / 20</span>
              </div>
              <div class="h-1.5 w-full bg-slate-100 rounded-full overflow-hidden">
                <div class="h-full bg-emerald-500 rounded-full" style="width: 75%"></div>
              </div>
            </div>

            <div class="grid grid-cols-2 gap-2.5 pt-3">
              <div class="bg-slate-50 border border-slate-100 rounded-xl p-3 text-center">
                <p class="text-lg font-bold text-[#334EAC] leading-none mb-1">342</p>
                <p class="text-[9px] font-bold text-slate-400 uppercase tracking-wider">Terverifikasi</p>
              </div>
              <div class="bg-slate-50 border border-slate-100 rounded-xl p-3 text-center">
                <p class="text-lg font-bold text-amber-600 leading-none mb-1">45</p>
                <p class="text-[9px] font-bold text-slate-400 uppercase tracking-wider">Feedback</p>
              </div>
            </div>
          </div>
        </div>
      </div>

    </div>

    <!-- Success Toast -->
    <div v-if="showSuccess" class="fixed bottom-6 right-6 z-50 bg-[#334EAC] text-white px-6 py-4 rounded-2xl shadow-xl flex items-center gap-3 animate-in slide-in-from-bottom-5">
      <div class="w-8 h-8 bg-white/20 rounded-full flex items-center justify-center shrink-0">
        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"><polyline points="20 6 9 17 4 12"/></svg>
      </div>
      <div>
        <h4 class="font-bold text-sm">Berhasil!</h4>
        <p class="text-xs text-[#D0E3FF] font-medium">{{ successMessage }}</p>
      </div>
    </div>

  </div>
</template>

<script setup>
import { ref, computed } from 'vue'
import { RouterLink } from 'vue-router'

const showSuccess = ref(false)
const successMessage = ref('')
const currentFilter = ref('Pending')
const searchQuery = ref('')

const answers = ref([
  {
    id: 1,
    author: 'Budi Santoso',
    initials: 'BS',
    rep: 420,
    time: '10 menit lalu',
    match: 95,
    status: 'Pending',
    question: 'Q: Apa perbedaan utama antara proses dan thread dalam sistem operasi?',
    questionUrl: '/tutor/forum',
    content: 'Proses adalah program yang sedang dieksekusi dan memiliki ruang alamat memori sendiri, sedangkan thread adalah unit eksekusi terkecil di dalam sebuah proses yang berbagi memori dengan thread lain dalam proses yang sama.',
    feedback: ''
  },
  {
    id: 2,
    author: 'Rizky Dharmawan',
    initials: 'RD',
    rep: 120,
    time: '2 jam lalu',
    match: 40,
    status: 'Pending',
    question: 'Q: Bagaimana cara mengatasi NullPointerException di Java?',
    questionUrl: '/tutor/forum',
    content: 'Tinggal tambahkan try catch saja di semua blok kodenya, pasti jalan.',
    warning: 'Rekomendasi AI: Tinjau Ulang. Metode ini tidak memperbaiki masalah referensi null.',
    feedback: ''
  },
  {
    id: 3,
    author: 'Siti Aminah',
    initials: 'SA',
    rep: 310,
    time: 'Kemarin',
    match: 99,
    status: 'Diverifikasi',
    question: 'Q: Apa kegunaan utama index pada database?',
    questionUrl: '/tutor/forum',
    content: 'Index mempercepat proses pencarian data (SELECT) dengan mengorbankan kecepatan penulisan (INSERT/UPDATE).',
    feedback: 'Penjelasan yang ringkas dan tepat!'
  }
])

const activeStudentsList = ref([
  { rank: 4, initials: 'EP', name: 'Eko Prasetyo', answersCount: 11, points: 95 },
  { rank: 5, initials: 'RD', name: 'Riri Damayanti', answersCount: 9, points: 80 },
  { rank: 6, initials: 'AF', name: 'Ahmad Fikri', answersCount: 8, points: 75 },
  { rank: 7, initials: 'NH', name: 'Nurul Hidayah', answersCount: 6, points: 60 }
])

const filteredAnswers = computed(() => {
  return answers.value.filter(a => {
    if (currentFilter.value !== 'Semua' && a.status !== currentFilter.value) {
      return false
    }
    if (searchQuery.value.trim()) {
      const q = searchQuery.value.toLowerCase()
      return (
        a.author.toLowerCase().includes(q) ||
        a.question.toLowerCase().includes(q) ||
        a.content.toLowerCase().includes(q)
      )
    }
    return true
  })
})

const handleVerify = (id) => {
  const ans = answers.value.find(a => a.id === id)
  if (ans) {
    ans.status = 'Diverifikasi'
    successMessage.value = `Jawaban ${ans.author} berhasil diverifikasi!`
    showSuccess.value = true
    setTimeout(() => { showSuccess.value = false }, 3000)
  }
}

const handleReject = (id) => {
  const ans = answers.value.find(a => a.id === id)
  if (ans) {
    ans.status = 'Ditolak'
    successMessage.value = `Jawaban ${ans.author} ditolak.`
    showSuccess.value = true
    setTimeout(() => { showSuccess.value = false }, 3000)
  }
}

const handleMarkBest = (id) => {
  const ans = answers.value.find(a => a.id === id)
  if (ans) {
    ans.status = 'Diverifikasi'
    successMessage.value = `Jawaban ${ans.author} ditandai sebagai Jawaban Terbaik!`
    showSuccess.value = true
    setTimeout(() => { showSuccess.value = false }, 3000)
  }
}
</script>

<style scoped>
.no-scrollbar::-webkit-scrollbar {
  display: none;
}
.no-scrollbar {
  -ms-overflow-style: none;
  scrollbar-width: none;
}
</style>
