<template>
  <div class="p-6 md:p-8 xl:p-10 max-w-[1600px] mx-auto animate-in fade-in duration-500">
    
    <!-- Header -->
    <div class="bg-white/60 backdrop-blur-xl rounded-3xl p-7 md:p-8 shadow-[0_10px_40px_rgba(15,23,42,0.06)] border border-slate-200/60 relative overflow-hidden mb-8">
      <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4 relative z-10">
        <div>
          <h1 class="text-3xl md:text-4xl font-extrabold text-slate-900 tracking-tight leading-tight">Manajemen Tutor</h1>
          <p class="text-[15px] text-slate-600 font-medium mt-2 max-w-xl leading-relaxed">Kelola tutor, performa mentoring, dan aktivitas akademik.</p>
        </div>
        <div class="flex items-center gap-4">
          <button 
            @click="$router.push({ name: 'admin-tutors-create' })"
            class="px-5 py-2.5 bg-indigo-600 text-white rounded-xl font-semibold text-sm shadow-sm hover:bg-indigo-700 transition-all flex items-center gap-2"
          >
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M16 21v-2a4 4 0 0 0-4-4H6a4 4 0 0 0-4 4v2"/><circle cx="9" cy="7" r="4"/><path d="M19 8v6"/><path d="M22 11h-6"/></svg>
            Tambah Tutor
          </button>
        </div>
      </div>
    </div>

    <!-- Performance Summaries -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4 mb-6">
      <div class="bg-white rounded-2xl border border-slate-200 shadow-sm p-5">
        <div class="flex items-center gap-3 mb-2">
          <div class="w-8 h-8 rounded-lg bg-indigo-50 flex items-center justify-center text-indigo-600">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path d="M16 21v-2a4 4 0 0 0-4-4H6a4 4 0 0 0-4 4v2"/><circle cx="9" cy="7" r="4"/></svg>
          </div>
          <h3 class="text-sm font-medium text-slate-600">Total Tutor Aktif</h3>
        </div>
        <p class="text-3xl font-semibold text-slate-900">142</p>
      </div>
      
      <div class="bg-white rounded-2xl border border-slate-200 shadow-sm p-5">
        <div class="flex items-center gap-3 mb-2">
          <div class="w-8 h-8 rounded-lg bg-emerald-50 flex items-center justify-center text-emerald-600">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"/></svg>
          </div>
          <h3 class="text-sm font-medium text-slate-600">Rata-rata Rating</h3>
        </div>
        <p class="text-3xl font-semibold text-slate-900">4.8<span class="text-lg text-slate-400 font-medium">/5.0</span></p>
      </div>

      <div class="bg-white rounded-2xl border border-slate-200 shadow-sm p-5">
        <div class="flex items-center gap-3 mb-2">
          <div class="w-8 h-8 rounded-lg bg-sky-50 flex items-center justify-center text-sky-600">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path d="M22 12h-4l-3 9L9 3l-3 9H2"/></svg>
          </div>
          <h3 class="text-sm font-medium text-slate-600">Sesi Mentoring</h3>
        </div>
        <p class="text-3xl font-semibold text-slate-900">1,840</p>
      </div>

      <div class="bg-amber-50/50 rounded-2xl border border-amber-200 shadow-sm p-5">
        <div class="flex items-center gap-3 mb-2">
          <div class="w-8 h-8 rounded-lg bg-amber-100 flex items-center justify-center text-amber-600">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"/></svg>
          </div>
          <h3 class="text-sm font-medium text-slate-600">Antrean Verifikasi</h3>
        </div>
        <div class="flex items-end gap-3">
          <p class="text-3xl font-semibold text-amber-700">12</p>
          <button class="text-xs font-medium text-amber-600 hover:text-amber-800 mb-1 underline">Lihat antrean</button>
        </div>
      </div>
    </div>

    <!-- Filters -->
    <div class="flex flex-col md:flex-row gap-4 mb-6">
      <div class="relative flex-1 max-w-md">
        <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none text-slate-400">
          <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><circle cx="11" cy="11" r="8"/><path d="m21 21-4.3-4.3"/></svg>
        </div>
        <input 
          type="text" 
          class="w-full pl-11 pr-4 py-2.5 bg-white border border-slate-200 rounded-xl text-sm font-medium text-slate-700 placeholder-slate-400 focus:outline-none focus:border-[#7096D1] focus:ring-4 focus:ring-[#7096D1]/10 transition-all shadow-sm" 
          placeholder="Cari tutor, email, atau spesialisasi..."
        >
      </div>
      <div class="flex items-center gap-2">
        <select class="px-4 py-2.5 bg-white border border-slate-200 rounded-xl text-sm font-medium text-slate-600 focus:outline-none focus:border-[#7096D1] shadow-sm appearance-none cursor-pointer">
          <option value="">Semua Spesialisasi</option>
          <option value="matematika">Matematika</option>
          <option value="fisika">Fisika</option>
          <option value="kimia">Kimia</option>
          <option value="biologi">Biologi</option>
          <option value="komputer">Ilmu Komputer</option>
        </select>
        <select class="px-4 py-2.5 bg-white border border-slate-200 rounded-xl text-sm font-medium text-slate-600 focus:outline-none focus:border-[#7096D1] shadow-sm appearance-none cursor-pointer">
          <option value="">Urutkan Berdasarkan</option>
          <option value="rating">Rating Tertinggi</option>
          <option value="mentoring">Sesi Terbanyak</option>
          <option value="terbaru">Tutor Terbaru</option>
        </select>
      </div>
    </div>

    <!-- Workspace Grid -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6">
      <div v-for="tutor in tutors" :key="tutor.id" class="bg-white rounded-2xl border border-slate-200 shadow-sm p-6 flex flex-col hover:border-[#7096D1] transition-all group">
        <div class="flex items-start justify-between mb-4">
          <div class="w-14 h-14 rounded-full flex items-center justify-center text-white font-bold text-lg shrink-0" :class="tutor.avatarBg">
            {{ tutor.initials }}
          </div>
          <div class="flex gap-1">
            <button class="p-1.5 text-slate-400 hover:text-indigo-600 hover:bg-indigo-50 rounded-lg transition-colors" title="Analitik Tutor" @click="openModal('Analitik', tutor)">
              <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><line x1="18" x2="18" y1="20" y2="10"/><line x1="12" x2="12" y1="20" y2="4"/><line x1="6" x2="6" y1="20" y2="14"/></svg>
            </button>
            <button class="p-1.5 text-slate-400 hover:text-[#081F5C] hover:bg-slate-100 rounded-lg transition-colors" title="Detail Tutor" @click="openModal('Detail', tutor)">
              <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="1"/><circle cx="19" cy="12" r="1"/><circle cx="5" cy="12" r="1"/></svg>
            </button>
          </div>
        </div>
        
        <div class="mb-4">
          <h3 class="text-base font-semibold text-slate-900 mb-0.5 group-hover:text-[#334EAC] transition-colors cursor-pointer" @click="openModal('Detail', tutor)">{{ tutor.name }}</h3>
          <p class="text-xs text-slate-500 mb-3">{{ tutor.email }}</p>
          
          <div class="flex flex-wrap gap-2">
            <span v-for="(spec, i) in tutor.specializations" :key="i" class="px-2 py-1 bg-slate-100 text-slate-700 text-xs font-medium rounded-md">
              {{ spec }}
            </span>
          </div>
        </div>
        
        <div class="mt-auto pt-4 border-t border-slate-100">
          <div class="flex items-center justify-between mb-3">
            <div class="flex items-center gap-1.5">
              <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="currentColor" class="text-amber-500" stroke="none"><polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"/></svg>
              <span class="text-sm font-semibold text-slate-900">{{ tutor.rating }}</span>
              <span class="text-xs text-slate-500">({{ tutor.reviews }} ulasan)</span>
            </div>
          </div>
          <div class="grid grid-cols-2 gap-2 text-center">
            <div class="bg-slate-50 rounded-xl py-2 px-1 border border-slate-100">
              <p class="text-lg font-semibold text-[#081F5C] leading-none mb-1">{{ tutor.mentoringHours }}</p>
              <p class="text-[10px] text-slate-500 font-semibold uppercase">Jam Mentoring</p>
            </div>
            <div class="bg-slate-50 rounded-xl py-2 px-1 border border-slate-100">
              <p class="text-lg font-semibold text-[#081F5C] leading-none mb-1">{{ tutor.studentsHelped }}</p>
              <p class="text-[10px] text-slate-500 font-semibold uppercase">Pelajar Dibantu</p>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Action Modal -->
    <Teleport to="body">
      <div v-if="isModalOpen" class="fixed inset-0 z-50 flex items-center justify-center p-4">
        <!-- Backdrop -->
        <div class="absolute inset-0 bg-slate-900/40 backdrop-blur-sm" @click="closeModal"></div>
        
        <!-- Modal Panel -->
        <div class="relative bg-white rounded-2xl shadow-xl w-full max-w-md overflow-hidden animate-in zoom-in-95 duration-200">
          <div class="p-6 border-b border-slate-100 flex items-center justify-between">
            <h3 class="text-lg font-bold text-slate-900">{{ modalAction }} Tutor</h3>
            <button @click="closeModal" class="p-2 text-slate-400 hover:text-slate-600 hover:bg-slate-100 rounded-xl transition-colors">
              <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M18 6 6 18"/><path d="m6 6 12 12"/></svg>
            </button>
          </div>
          
          <div class="p-6">
            <div class="flex items-center gap-4 mb-6">
              <div class="w-12 h-12 rounded-full flex items-center justify-center text-white font-bold text-lg shrink-0" :class="selectedTutor?.avatarBg">
                {{ selectedTutor?.initials }}
              </div>
              <div>
                <p class="text-base font-bold text-slate-900">{{ selectedTutor?.name }}</p>
                <p class="text-sm text-slate-500">{{ selectedTutor?.email }}</p>
              </div>
            </div>

            <p class="text-sm text-slate-600 mb-6">
              Tampilan <strong class="text-slate-800">{{ modalAction }}</strong> untuk {{ selectedTutor?.name }} akan dimuat dalam modul penuh (Simulasi Fungsional).
            </p>

            <div class="flex items-center justify-end gap-3">
              <button @click="closeModal" class="px-4 py-2 bg-slate-100 hover:bg-slate-200 text-slate-700 rounded-xl text-sm font-medium transition-colors">Tutup</button>
              <button @click="closeModal" class="px-4 py-2 bg-[#334EAC] hover:bg-[#081F5C] text-white rounded-xl text-sm font-medium transition-colors">Buka {{ modalAction }}</button>
            </div>
          </div>
        </div>
      </div>
    </Teleport>
  </div>
</template>

<script setup>
import { ref } from 'vue'

const tutors = ref([
  { 
    id: 1, 
    name: 'Dr. Sarah Rahman', 
    email: 'sarah.r@university.edu', 
    initials: 'SR', 
    avatarBg: 'bg-gradient-to-br from-[#334EAC] to-[#081F5C]',
    specializations: ['Fisika Kuantum', 'Matematika Terapan'],
    rating: '4.9',
    reviews: 124,
    mentoringHours: 320,
    studentsHelped: 412
  },
  { 
    id: 2, 
    name: 'Prof. Anderson Silva', 
    email: 'anderson@university.edu', 
    initials: 'AS', 
    avatarBg: 'bg-gradient-to-br from-emerald-400 to-teal-500',
    specializations: ['Ilmu Komputer', 'Kecerdasan Buatan'],
    rating: '4.8',
    reviews: 89,
    mentoringHours: 180,
    studentsHelped: 256
  },
  { 
    id: 3, 
    name: 'Budi Santoso, M.Si', 
    email: 'budi.s@university.edu', 
    initials: 'BS', 
    avatarBg: 'bg-gradient-to-br from-indigo-400 to-purple-500',
    specializations: ['Kimia Organik', 'Biokimia'],
    rating: '4.7',
    reviews: 56,
    mentoringHours: 120,
    studentsHelped: 184
  },
  { 
    id: 4, 
    name: 'Diana Putri, Ph.D', 
    email: 'diana.p@university.edu', 
    initials: 'DP', 
    avatarBg: 'bg-gradient-to-br from-rose-400 to-orange-400',
    specializations: ['Biologi Sel', 'Genetika'],
    rating: '5.0',
    reviews: 42,
    mentoringHours: 95,
    studentsHelped: 130
  },
  { 
    id: 5, 
    name: 'Kevin Wijaya, M.Kom', 
    email: 'kevin.w@university.edu', 
    initials: 'KW', 
    avatarBg: 'bg-gradient-to-br from-blue-400 to-cyan-500',
    specializations: ['Rekayasa Perangkat Lunak', 'Basis Data'],
    rating: '4.6',
    reviews: 210,
    mentoringHours: 450,
    studentsHelped: 820
  },
  { 
    id: 6, 
    name: 'Dr. Ahmad Fauzi', 
    email: 'ahmad.f@university.edu', 
    initials: 'AF', 
    avatarBg: 'bg-gradient-to-br from-slate-400 to-slate-600',
    specializations: ['Kalkulus', 'Statistika'],
    rating: '4.8',
    reviews: 145,
    mentoringHours: 290,
    studentsHelped: 380
  },
])

const isModalOpen = ref(false)
const modalAction = ref('')
const selectedTutor = ref(null)

const openModal = (action, tutor) => {
  modalAction.value = action
  selectedTutor.value = tutor
  isModalOpen.value = true
}

const closeModal = () => {
  isModalOpen.value = false
  setTimeout(() => {
    selectedTutor.value = null
    modalAction.value = ''
  }, 300)
}
</script>
