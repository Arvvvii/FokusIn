<template>
  <div class="space-y-8 w-full">
    
    <!-- 1. GLASSMORPHIC HEADER SECTION -->
    <div class="bg-white/60 backdrop-blur-xl rounded-3xl p-7 md:p-8 shadow-[0_10px_40px_rgba(15,23,42,0.06)] border border-slate-200/60 relative overflow-hidden flex flex-col md:flex-row md:items-center justify-between gap-6">
      <div class="absolute right-0 top-0 w-1/3 h-full bg-gradient-to-l from-[#EDF1F6]/80 to-transparent pointer-events-none"></div>
      
      <div class="relative z-10 flex items-center gap-4">
        <span class="w-12 h-12 rounded-2xl bg-[#334EAC]/10 text-[#334EAC] flex items-center justify-center shrink-0">
          <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><rect width="18" height="18" x="3" y="4" rx="2" ry="2"/><line x1="16" x2="16" y1="2" y2="6"/><line x1="8" x2="8" y1="2" y2="6"/><line x1="3" x2="21" y1="10" y2="10"/></svg>
        </span>
        <div>
          <h1 class="text-3xl md:text-4xl font-extrabold text-slate-900 tracking-tight leading-tight">Kelola Mentoring</h1>
          <p class="text-[15px] text-slate-600 font-medium mt-2 max-w-xl leading-relaxed">
            Atur jadwal bimbingan akademik, tinjau permintaan sesi baru dari mahasiswa, dan pantau histori konsultasi terintegrasi.
          </p>
        </div>
      </div>

      <div class="relative z-10 flex shrink-0 gap-4">
        <div class="bg-slate-50 border border-slate-200/60 rounded-2xl p-4 flex flex-col items-center justify-center min-w-[100px] shadow-sm">
           <span class="text-2xl font-bold text-amber-500 tracking-tight leading-none mb-1">3</span>
           <span class="text-[11px] font-bold text-slate-400 uppercase tracking-widest">Permintaan</span>
        </div>
        <div class="bg-slate-50 border border-slate-200/60 rounded-2xl p-4 flex flex-col items-center justify-center min-w-[100px] shadow-sm">
           <span class="text-2xl font-bold text-emerald-500 tracking-tight leading-none mb-1">4</span>
           <span class="text-[11px] font-bold text-slate-400 uppercase tracking-widest">Mendatang</span>
        </div>
      </div>
    </div>

    <!-- 2. STRUCTURAL ASYMMETRIC GRID -->
    <div class="grid grid-cols-1 lg:grid-cols-[minmax(0,1fr)_360px] gap-8 items-start w-full">
      
      <!-- LEFT WORKSPACE: SESSIONS & TABS -->
      <div class="space-y-6 flex-1 self-stretch">
        
        <!-- Tabs Toolbar -->
        <div class="bg-white rounded-3xl p-3 shadow-sm border border-slate-200/60 flex flex-col sm:flex-row gap-3 items-center justify-between">
          <div class="flex items-center gap-1.5 overflow-x-auto no-scrollbar w-full sm:w-auto">
            <button 
              @click="currentTab = 'upcoming'"
              :class="currentTab === 'upcoming' ? 'bg-[#334EAC] text-white shadow-sm' : 'text-slate-500 hover:text-[#081F5C] hover:bg-slate-100'"
              class="px-4 py-2 rounded-xl text-xs font-bold transition-all whitespace-nowrap active:scale-95"
            >
              Jadwal Mendatang
            </button>
            <button 
              @click="currentTab = 'requests'"
              :class="currentTab === 'requests' ? 'bg-[#334EAC] text-white shadow-sm' : 'text-slate-500 hover:text-[#081F5C] hover:bg-slate-100'"
              class="px-4 py-2 rounded-xl text-xs font-bold transition-all whitespace-nowrap relative active:scale-95"
            >
              Permintaan Baru
              <span v-if="hasPendingRequest" class="absolute top-1.5 right-1.5 w-1.5 h-1.5 bg-rose-500 rounded-full"></span>
            </button>
            <button 
              @click="currentTab = 'completed'"
              :class="currentTab === 'completed' ? 'bg-[#334EAC] text-white shadow-sm' : 'text-slate-500 hover:text-[#081F5C] hover:bg-slate-100'"
              class="px-4 py-2 rounded-xl text-xs font-bold transition-all whitespace-nowrap active:scale-95"
            >
              Selesai
            </button>
          </div>
          
          <RouterLink to="/tutor/schedule" class="flex items-center gap-1.5 px-4 py-2 bg-slate-50 border border-slate-200 hover:border-[#7096D1] text-[#334EAC] rounded-xl text-xs font-bold shadow-sm transition-all whitespace-nowrap">
            <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><rect width="18" height="18" x="3" y="4" rx="2" ry="2"/><line x1="16" x2="16" y1="2" y2="6"/><line x1="8" x2="8" y1="2" y2="6"/><line x1="3" x2="21" y1="10" y2="10"/></svg>
            Tampilan Kalender
          </RouterLink>
        </div>

        <!-- Mentoring List Content -->
        <div class="space-y-6">
          <div 
            v-for="sess in filteredSessions" 
            :key="sess.id"
            class="bg-white rounded-3xl p-6 md:p-7 border border-slate-200/60 shadow-[0_5px_20px_rgba(15,23,42,0.02)] relative overflow-hidden group/card"
          >
            <div v-if="sess.tab === 'requests'" class="absolute top-0 left-0 w-1.5 h-full bg-amber-400"></div>
            
            <div class="flex flex-col sm:flex-row justify-between gap-6" :class="{'pl-2': sess.tab === 'requests'}">
              <!-- Student Info -->
              <div class="flex-1 space-y-4">
                <div class="flex items-center gap-4">
                  <div class="w-12 h-12 rounded-full bg-[#EDF1F6] border border-slate-200 flex items-center justify-center font-bold text-lg text-[#081F5C] shrink-0">
                    {{ sess.initials }}
                  </div>
                  <div>
                    <h3 class="text-base font-bold text-slate-900 leading-none tracking-tight">{{ sess.studentName }}</h3>
                    <p class="text-xs text-slate-400 font-semibold mt-1.5 flex items-center gap-1.5">
                      <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M4 19.5v-15A2.5 2.5 0 0 1 6.5 2H20v20H6.5a2.5 2.5 0 0 1 0-5H20"/></svg>
                      Topik: {{ sess.topic }}
                    </p>
                  </div>
                </div>

                <div class="bg-slate-50 border border-slate-100 rounded-2xl p-4">
                  <span class="text-[10px] font-bold text-slate-400 uppercase tracking-wider block mb-1">Catatan Kebutuhan Sesi</span>
                  <p class="text-xs text-slate-600 font-medium leading-relaxed">"{{ sess.notes }}"</p>
                </div>

                <div class="flex flex-wrap items-center gap-4 text-xs font-bold text-slate-700 pt-1">
                  <span class="flex items-center gap-1.5 bg-slate-100 px-3 py-1.5 rounded-xl border border-slate-200/50">
                    <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><rect width="18" height="18" x="3" y="4" rx="2" ry="2"/><line x1="16" x2="16" y1="2" y2="6"/><line x1="8" x2="8" y1="2" y2="6"/><line x1="3" x2="21" y1="10" y2="10"/></svg>
                    {{ sess.time }}
                  </span>
                  <span class="flex items-center gap-1.5 bg-slate-100 px-3 py-1.5 rounded-xl border border-slate-200/50">
                    <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"/><polyline points="12 6 12 12 16 14"/></svg>
                    Durasi: {{ sess.duration }}
                  </span>
                  <span class="px-2.5 py-1 bg-emerald-50 text-emerald-600 rounded-xl border border-emerald-100 uppercase tracking-widest text-[9px] font-bold">{{ sess.status }}</span>
                </div>
              </div>

              <!-- Quick Actions -->
              <div class="flex flex-row sm:flex-col items-center sm:items-end justify-center sm:justify-start gap-2.5 shrink-0 border-t sm:border-t-0 sm:border-l border-slate-100 pt-4 sm:pt-0 sm:pl-6 min-w-[140px]">
                <template v-if="sess.tab === 'upcoming'">
                  <RouterLink :to="`/tutor/mentoring/${sess.id}`" class="w-full text-center px-4 py-2.5 bg-[#334EAC] hover:bg-[#081F5C] text-white rounded-xl font-bold text-xs shadow-sm active:scale-95 transition-all flex items-center justify-center gap-1.5">
                    <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="m15.6 11.6 5.4-3.2c.5-.3 1.2 0 1.2.7v5.8c0 .7-.7 1-1.2.7l-5.4-3.2a1.2 1.2 0 0 1 0-2Z"/><rect width="14" height="14" x="2" y="5" rx="3" ry="3"/></svg>
                    Mulai Sesi
                  </RouterLink>
                  <button @click="showSessionLink(sess.studentName)" class="w-full px-4 py-2.5 bg-white border border-slate-200 hover:border-[#7096D1] text-slate-600 rounded-xl font-bold text-xs shadow-sm active:scale-95 transition-all">
                    Detail Link Sesi
                  </button>
                  <button @click="cancelSession(sess.id)" class="w-full text-center py-2 text-slate-400 hover:text-rose-500 font-bold text-xs transition-colors mt-auto">
                    Batalkan Sesi
                  </button>
                </template>
                
                <template v-else-if="sess.tab === 'requests'">
                  <button @click="acceptRequest(sess.id)" class="w-full px-4 py-2.5 bg-emerald-500 hover:bg-emerald-600 text-white rounded-xl font-bold text-xs shadow-sm active:scale-95 transition-all flex items-center justify-center gap-1.5">
                    <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"><polyline points="20 6 9 17 4 12"/></svg>
                    Setujui Sesi
                  </button>
                  <button @click="rejectRequest(sess.id)" class="w-full px-4 py-2.5 bg-white border border-slate-200 text-slate-600 hover:bg-slate-50 rounded-xl font-bold text-xs shadow-sm active:scale-95 transition-all">
                    Jadwalkan Ulang
                  </button>
                  <button @click="rejectRequest(sess.id)" class="w-full text-center py-2 text-slate-400 hover:text-rose-500 font-bold text-xs transition-colors mt-auto">
                    Tolak Sesi
                  </button>
                </template>
                
                <template v-else>
                  <span class="text-[11px] font-bold text-slate-400 mb-2">Selesai pada {{ sess.time }}</span>
                  <button @click="viewFeedback(sess.id)" class="w-full px-4 py-2.5 bg-white border border-slate-200 hover:border-[#7096D1] text-[#334EAC] rounded-xl font-bold text-xs shadow-sm active:scale-95 transition-all flex items-center justify-center gap-1">
                    Lihat Feedback
                  </button>
                </template>
              </div>
            </div>
          </div>
        </div>

      </div>

      <!-- RIGHT SIDEBAR: QUICK CALENDAR & STATS -->
      <div class="space-y-6 w-full shrink-0 lg:w-[360px]">
        <!-- Schedule Today -->
        <div class="bg-white rounded-3xl p-6 border border-slate-200/60 shadow-sm space-y-4">
          <h3 class="text-sm font-bold text-slate-900 tracking-tight flex items-center justify-between">
            <span>Jadwal Hari Ini</span>
            <span class="px-2 py-0.5 bg-indigo-50 text-[#334EAC] rounded-lg text-xs font-bold">2 Kelas</span>
          </h3>

          <div class="space-y-3">
            <div class="p-3.5 rounded-2xl border border-indigo-100 bg-indigo-50/20 flex gap-3">
              <div class="w-1 bg-[#334EAC] rounded-full shrink-0"></div>
              <div>
                <p class="text-[11px] font-extrabold text-[#334EAC] uppercase tracking-wider">10:00 - 11:30</p>
                <h4 class="text-xs font-bold text-slate-900 mt-0.5">Struktur Data Budi</h4>
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
        <p class="text-xs text-indigo-100 font-medium">{{ successMessage }}</p>
      </div>
    </div>

  </div>
</template>

<script setup>
import { ref, computed } from 'vue'
import { useRouter } from 'vue-router'

const router = useRouter()
const showSuccess = ref(false)
const successMessage = ref('')
const currentTab = ref('upcoming')
const hasPendingRequest = ref(true)

const sessions = ref([
  {
    id: 1,
    studentName: 'Budi Santoso',
    initials: 'BS',
    topic: 'Struktur Data (Binary Search Tree)',
    notes: 'Butuh bantuan memahami BST traversal dan visualisasi pencariannya.',
    time: 'Hari Ini, 10:00 WIB',
    duration: '90 Menit',
    status: 'Telah Dikonfirmasi',
    tab: 'upcoming'
  },
  {
    id: 2,
    studentName: 'Siti Aminah',
    initials: 'SA',
    topic: 'Algoritma Pencarian & Sorting',
    notes: 'Kuis besok, butuh review cepat mengenai Merge Sort dan Quick Sort.',
    time: '25 Mei 2026, 14:00 WIB',
    duration: '60 Menit',
    status: 'Menunggu Konfirmasi',
    tab: 'requests'
  },
  {
    id: 3,
    studentName: 'Rizky Dharmawan',
    initials: 'RD',
    rep: 120,
    topic: 'Java Object-Oriented Programming',
    notes: 'Sesi selesai dengan sangat baik.',
    time: 'Kemarin, 16:00 WIB',
    duration: '60 Menit',
    status: 'Selesai',
    tab: 'completed'
  }
])

const filteredSessions = computed(() => {
  return sessions.value.filter(s => s.tab === currentTab.value)
})

const viewFeedback = (id) => {
  router.push('/tutor/mentoring/feedback/' + id)
}

const acceptRequest = (id) => {
  const sess = sessions.value.find(s => s.id === id)
  if (sess) {
    sess.tab = 'upcoming'
    sess.status = 'Telah Dikonfirmasi'
    successMessage.value = `Permintaan bimbingan dari ${sess.studentName} berhasil disetujui!`
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
