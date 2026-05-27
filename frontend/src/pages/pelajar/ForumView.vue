<template>
  <div class="relative animate-in fade-in duration-500 min-h-screen max-w-7xl mx-auto">
    
    <!-- MAIN CONTENT -->
    <div class="relative z-10 space-y-6">
      
      <!-- Page Header -->
      <div class="page-header-banner p-7 md:p-8 flex flex-col md:flex-row md:items-center justify-between gap-6 mb-6">
        <div class="absolute right-0 top-0 w-1/3 h-full bg-gradient-to-l from-[#EDF1F6]/80 to-transparent pointer-events-none"></div>
        <div class="relative z-10 flex items-center gap-4">
          <span class="page-header-icon w-12 h-12 flex items-center justify-center shrink-0">
            <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"/><polyline points="17 8 12 3 7 8"/><line x1="12" x2="12" y1="3" y2="15"/></svg>
          </span>
          <div>
            <h1 class="text-3xl md:text-4xl font-extrabold text-slate-900 tracking-tight leading-tight">Forum Diskusi Akademik</h1>
            <p class="text-[15px] text-slate-600 font-medium mt-2 max-w-xl leading-relaxed">
              Berkolaborasi, bertanya, dan berbagi catatan belajar bersama rekan mahasiswa dan tutor di FokusIn.
            </p>
          </div>
        </div>
      </div>

      <!-- 3-Column Layout -->
      <div class="flex flex-col xl:flex-row gap-6">
        
        <!-- 1. LEFT SIDEBAR FILTER (xl:w-[24%]) -->
        <div class="hidden xl:flex flex-col w-[24%] shrink-0 space-y-5 sticky top-[24px] h-fit">
          
          <!-- Categories: Refened as Stacked Selectable Category Cards -->
          <div>
            <h3 class="text-[10px] font-bold text-slate-400 uppercase tracking-widest mb-3">Kategori Diskusi</h3>
            <ul class="space-y-2">
              <li v-for="cat in categories" :key="cat.name">
                <button 
                  @click="selectCategory(cat)"
                  class="w-full text-left p-3 rounded-xl border transition-all flex items-start gap-3 shadow-sm select-none"
                  :class="cat.active ? 'border-l-4 border-l-[#334EAC] border-slate-200 bg-[#EEF3FF] text-[#081F5C]' : 'bg-white/70 border-slate-200 text-slate-700 hover:bg-white'"
                >
                  <!-- Academic outline Lucide icon -->
                  <div class="w-8 h-8 rounded-lg bg-slate-50 border border-slate-200/60 flex items-center justify-center shrink-0 text-slate-400 transition-colors">
                    <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="w-3.5 h-3.5" v-html="cat.icon"></svg>
                  </div>
                  
                  <div class="min-w-0 flex-1">
                    <span class="block text-xs font-bold leading-tight" :class="cat.active ? 'text-[#081F5C]' : 'text-slate-700'">{{ cat.name }}</span>
                    <span class="block text-[10px] text-slate-400 font-semibold mt-1">{{ cat.count }} diskusi aktif</span>
                  </div>
                </button>
              </li>
            </ul>
          </div>

          <!-- Trending Tags: Unified visual system -->
          <div>
            <h3 class="text-[10px] font-bold text-slate-400 uppercase tracking-widest mb-2.5">Tag Populer</h3>
            <div class="flex flex-wrap gap-1.5">
              <span v-for="tag in tags" :key="tag" @click="selectTag(tag)" class="px-2.5 py-1 bg-white hover:bg-slate-50 border border-slate-200 rounded-lg text-xs font-semibold text-[#334EAC] transition-all cursor-pointer shadow-sm">
                {{ tag }}
              </span>
            </div>
          </div>

          <!-- Today's Activity Panel -->
          <div class="card-panel p-4 space-y-3">
            <h3 class="text-[10px] font-bold text-slate-400 uppercase tracking-widest pb-1.5 border-b border-slate-100">Aktivitas Hari Ini</h3>
            <div class="space-y-2 text-xs">
              <div class="flex items-center justify-between text-slate-600 font-semibold">
                <span class="flex items-center gap-1.5">
                  <span class="w-1.5 h-1.5 bg-[#334EAC] rounded-full"></span>
                  Diskusi baru
                </span>
                <span class="text-[#081F5C] font-bold">124</span>
              </div>
              <div class="flex items-center justify-between text-slate-600 font-semibold">
                <span class="flex items-center gap-1.5">
                  <span class="w-1.5 h-1.5 bg-emerald-500 rounded-full"></span>
                  Jawaban terverifikasi
                </span>
                <span class="text-[#081F5C] font-bold">18</span>
              </div>
              <div class="flex items-center justify-between text-slate-600 font-semibold">
                <span class="flex items-center gap-1.5">
                  <span class="w-1.5 h-1.5 bg-amber-500 rounded-full"></span>
                  Mentor aktif
                </span>
                <span class="text-[#081F5C] font-bold">9</span>
              </div>
              <div class="flex items-center justify-between text-slate-600 font-semibold">
                <span class="flex items-center gap-1.5">
                  <span class="w-1.5 h-1.5 bg-sky-500 rounded-full"></span>
                  Pelajar daring
                </span>
                <span class="text-[#081F5C] font-bold">42</span>
              </div>
            </div>
          </div>

        </div>

        <!-- 2. MAIN DISCUSSION FEED (xl:w-[51%]) -->
        <div class="flex-1 w-full xl:w-[51%] flex flex-col min-w-0">
          
          <!-- Search & Info Bar -->
          <div class="relative mb-6 card-panel p-2">
            <input type="text" v-model="searchQuery" placeholder="Cari diskusi, kata kunci, atau tag..." class="w-full pl-9 pr-4 py-2 bg-transparent text-xs text-slate-800 focus:outline-none focus:ring-0 placeholder-slate-400 font-medium" />
            <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" class="absolute left-3 top-2.5 text-slate-400"><circle cx="11" cy="11" r="8"/><path d="m21 21-4.3-4.3"/></svg>
          </div>

          <!-- Post List: Clean, high readability discussions -->
          <div class="space-y-3">
            <RouterLink :to="`${baseForumRoute}/${post.id}`" v-for="post in filteredPosts" :key="post.id" class="group card-base forum-card p-5 flex flex-col sm:flex-row gap-5 cursor-pointer relative overflow-hidden">
              
              <!-- Left Stats: Elegant & compact voting UI -->
              <div class="flex sm:flex-col items-center gap-3 sm:gap-1.5 shrink-0">
                <!-- Upvotes -->
                <div class="flex sm:flex-col items-center gap-1 bg-[#F7F2EB] sm:bg-slate-50 px-2.5 py-1 sm:px-2 sm:py-1.5 rounded-lg border border-slate-200/30">
                  <button class="text-slate-400 hover:text-[#334EAC] transition-colors"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"><path d="m18 15-6-6-6 6"/></svg></button>
                  <span class="font-extrabold text-[#081F5C] text-xs">{{ post.upvotes }}</span>
                </div>
                
                <!-- Answers -->
                <div class="flex sm:flex-col items-center justify-center min-w-[3rem] py-1 rounded-lg border shadow-sm transition-colors text-[10px]"
                  :class="post.isResolved ? 'bg-emerald-50 border-emerald-200 text-emerald-700' : (post.answers > 0 ? 'bg-[#EDF1F6] border-slate-200 text-[#081F5C]' : 'bg-transparent border-transparent text-slate-400')"
                >
                  <span class="font-extrabold text-xs leading-none">{{ post.answers }}</span>
                  <span class="text-[8px] font-bold uppercase tracking-wider mt-0.5">Jawab</span>
                </div>
              </div>

              <!-- Post Content -->
              <div class="flex-1 min-w-0 flex flex-col">
                <div class="flex items-center gap-2 mb-1.5">
                  <span class="px-2 py-0.5 bg-[#EDF1F6] text-[#334EAC] text-[9px] font-bold rounded uppercase tracking-wider">{{ post.category }}</span>
                  <span v-if="post.isResolved" class="flex items-center gap-0.5 text-[9px] font-bold text-emerald-700 bg-emerald-50 px-2 py-0.5 rounded uppercase tracking-wider">
                    <svg xmlns="http://www.w3.org/2000/svg" width="10" height="10" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"><polyline points="20 6 9 17 4 12"/></svg>
                    Selesai
                  </span>
                </div>
                
                <h2 class="text-base font-bold text-slate-900 leading-snug mb-1 group-hover:text-[#334EAC] transition-colors tracking-tight">{{ post.title }}</h2>
                <p class="text-xs text-slate-500 font-normal line-clamp-2 mb-3 leading-relaxed">{{ post.preview }}</p>
                
                <div class="mt-auto flex flex-col sm:flex-row sm:items-center justify-between gap-3 pt-2 border-t border-slate-100">
                  <div class="flex items-center gap-2 flex-wrap">
                    <span v-for="tag in post.tags" :key="tag" class="text-[10px] font-bold text-slate-400">
                      {{ tag }}
                    </span>
                  </div>
                  
                  <!-- Author Info -->
                  <div class="flex items-center gap-2 bg-slate-50 px-2.5 py-1.5 rounded-lg border border-slate-200/40 shrink-0">
                    <div class="w-6 h-6 rounded-full bg-gradient-to-br from-[#334EAC] to-[#081F5C] flex items-center justify-center text-white text-[9px] font-bold shadow-sm">
                      {{ post.author.avatar }}
                    </div>
                    <div class="flex flex-col">
                      <span class="text-[10px] font-extrabold text-[#081F5C] leading-none">{{ post.author.name }}</span>
                      <div class="flex items-center gap-1.5 mt-0.5">
                        <span class="text-[9px] font-bold text-slate-400">{{ post.time }}</span>
                      </div>
                    </div>
                  </div>
                </div>
              </div>

            </RouterLink>
          </div>
          
          <!-- Pagination -->
          <div class="mt-8 flex justify-center">
            <button @click="loadMore" class="px-6 py-2.5 bg-white border border-slate-200 text-slate-800 rounded-xl font-bold text-xs shadow-sm hover:bg-slate-50 transition-all active:scale-95 flex items-center gap-2">
              <svg v-if="isLoadingMore" class="animate-spin" xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"><path d="M21 12a9 9 0 1 1-6.219-8.56"/></svg>
              {{ isLoadingMore ? 'Memuat...' : 'Muat Lebih Banyak' }}
            </button>
          </div>

        </div>

        <!-- 3. RIGHT PANEL (xl:w-[25%]) -->
        <div class="hidden xl:flex flex-col w-[25%] shrink-0 space-y-6 sticky top-[24px] h-fit">
          
          <!-- Create Post CTA -->
          <RouterLink :to="`${baseForumRoute}/create`" class="btn-banner-cta w-full flex items-center justify-center gap-1.5 px-4 py-3 group">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round" class="group-hover:rotate-90 transition-transform"><path d="M5 12h14"/><path d="M12 5v14"/></svg>
            Mulai Diskusi Baru
          </RouterLink>

          <!-- Top Contributors -->
          <div class="card-panel kontributor-panel p-5">
            <div class="flex items-center gap-2 mb-4">
              <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="#F59E0B" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"/></svg>
              <h3 class="text-xs font-bold text-[#081F5C] uppercase tracking-wider">Kontributor Terbaik</h3>
            </div>
            
            <div class="space-y-3">
              <div v-for="user in contributors" :key="user.name" class="flex items-center gap-3">
                <div class="w-8 h-8 rounded-full bg-[#EDF1F6] flex items-center justify-center font-extrabold text-[#081F5C] text-xs shrink-0 border border-slate-200">
                  {{ user.avatar }}
                </div>
                <div class="flex-1 min-w-0">
                  <h4 class="text-xs font-bold text-[#081F5C] truncate">{{ user.name }}</h4>
                  <div class="flex items-center gap-1.5 mt-0.5">
                    <span class="text-[9px] font-bold text-amber-500">{{ user.rep }} rep</span>
                    <span class="px-1 py-0.2 rounded bg-slate-100 text-slate-500 text-[8px] font-bold uppercase tracking-wider">{{ user.role }}</span>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <!-- AI Assistant Widget -->
          <div class="card-panel ai-help-panel p-5 relative overflow-hidden">
            <div class="relative z-10">
              <div class="flex items-center gap-2 mb-2">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="#BAD6EB" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="m12 3-1.912 5.813a2 2 0 0 1-1.275 1.275L3 12l5.813 1.912a2 2 0 0 1 1.275 1.275L12 21l1.912-5.813a2 2 0 0 1 1.275-1.275L21 12l-5.813-1.912a2 2 0 0 1-1.275-1.275L12 3Z"/></svg>
                <h3 class="text-[10px] font-bold tracking-wider uppercase text-[#BAD6EB]">Tanya Fokus AI</h3>
              </div>
              <p class="text-[11px] text-[#BAD6EB] mb-4 leading-relaxed">Kesulitan menjawab soal? Dapatkan petunjuk instan sebelum bertanya di forum.</p>
              <RouterLink :to="baseAIAnalyzerRoute" class="w-full py-2 bg-white/10 hover:bg-white/20 border border-white/10 rounded-lg text-white font-bold text-[11px] transition-all flex items-center justify-center">
                Mulai Asisten AI
              </RouterLink>
            </div>
          </div>

        </div>
      </div>
    </div>

    <!-- Mobile CTA (Floating Action Button) -->
    <RouterLink :to="`${baseForumRoute}/create`" class="xl:hidden fixed bottom-6 right-6 z-40 w-14 h-14 bg-[#334EAC] text-white rounded-2xl shadow-xl flex items-center justify-center hover:bg-[#081F5C] hover:scale-105 active:scale-95 transition-all">
      <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"><line x1="12" y1="5" x2="12" y2="19"/><line x1="5" y1="12" x2="19" y2="12"/></svg>
    </RouterLink>

    <!-- Info Toast -->
    <Teleport to="body">
      <div v-if="showInfo" class="fixed bottom-6 right-6 z-[100] bg-[#334EAC] text-white px-6 py-4 rounded-2xl shadow-[0_10px_40px_rgba(51,78,172,0.3)] flex items-center gap-3 animate-in slide-in-from-bottom-5">
        <div class="w-8 h-8 bg-white/20 rounded-full flex items-center justify-center shrink-0">
          <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"/><line x1="12" y1="16" x2="12" y2="12"/><line x1="12" y1="8" x2="12.01" y2="8"/></svg>
        </div>
        <div>
          <h4 class="font-extrabold text-sm">Informasi</h4>
          <p class="text-xs text-[#BAD6EB] font-medium">{{ infoMessage }}</p>
        </div>
      </div>
    </Teleport>
  </div>
</template>

<script setup>
import { ref, computed } from 'vue'
import { RouterLink, useRoute } from 'vue-router'

const route = useRoute()
const baseForumRoute = computed(() => {
  return route.path.startsWith('/tutor') ? '/tutor/forum' : '/pelajar/forum'
})

const baseAIAnalyzerRoute = computed(() => {
  return route.path.startsWith('/tutor') ? '/tutor/ai-validation' : '/pelajar/ai-analyzer'
})

const categories = ref([
  { name: 'Semua Topik', count: '1,240', active: true, icon: '<rect width="18" height="18" x="3" y="3" rx="2"/><path d="m7 8 3 3-3 3"/><path d="M12 14h4"/>' },
  { name: 'Ilmu Komputer', count: '420', active: false, icon: '<rect width="18" height="18" x="3" y="3" rx="2"/><path d="m9 10 3 3-3 3"/><path d="M14 16h2"/>' },
  { name: 'Matematika', count: '315', active: false, icon: '<path d="M19 4H5.8a1 1 0 0 0-.7 1.7L11.8 12l-6.7 6.3a1 1 0 0 0 .7 1.7H19"/>' },
  { name: 'Fisika', count: '180', active: false, icon: '<path d="M5 22h14"/><path d="M9 2h6"/><path d="M14 22a7 7 0 0 0-4 0"/><path d="M9 2v6L4.5 16.5a2 2 0 0 0-.3 1.5 2 2 0 0 0 1.8 1.4h12c1 0 1.7-.6 1.8-1.5.1-.5 0-1-.3-1.4L15 8V2z"/>' },
  { name: 'Bahasa Inggris', count: '95', active: false, icon: '<path d="m5 8 6 6"/><path d="m4 14 6-6"/><path d="M2 5h12"/><path d="M7 2h1"/><path d="M22 22l-5-10-5 10"/><path d="M14 18h6"/>' },
])

const tags = ['#algoritma', '#vue3', '#kalkulus', '#machine-learning', '#ielts']

const selectCategory = (category) => {
  categories.value.forEach(c => {
    c.active = c.name === category.name
  })
}

const posts = ref([
  {
    id: 1,
    title: 'Bagaimana sebenarnya algoritma Dijkstra bekerja?',
    preview: 'Saya paham konsep dasar pencarian jalur terpendek, tapi kesulitan menerapkan antrean prioritas (priority queue) di C++. Adakah yang punya penjelasan sederhana?',
    category: 'Ilmu Komputer',
    tags: ['#algoritma', '#c++'],
    author: { name: 'Alex Johnson', avatar: 'AJ', rep: '1.2k' },
    time: '2 jam lalu',
    upvotes: 42,
    answers: 5,
    isResolved: true
  },
  {
    id: 2,
    title: 'Integral Parsial: Kapan menggunakan metode tabular?',
    preview: 'Adakah aturan pasti kapan metode tabular (DI method) lebih baik digunakan dibanding rumus standar u-dv? Saya sering bingung saat ujian.',
    category: 'Matematika',
    tags: ['#kalkulus'],
    author: { name: 'Maria Garcia', avatar: 'MG', rep: '850' },
    time: '5 jam lalu',
    upvotes: 18,
    answers: 2,
    isResolved: false
  },
  {
    id: 3,
    title: 'Memahami Reaktivitas di Vue 3 Composition API',
    preview: 'Apa perbedaan pasti antara ref() dan reactive()? Kapan saya harus memilih salah satu dibanding yang lain untuk aplikasi skala besar?',
    category: 'Ilmu Komputer',
    tags: ['#vue3', '#javascript'],
    author: { name: 'Budi Santoso', avatar: 'BS', rep: '3.4k' },
    time: '1 hari lalu',
    upvotes: 156,
    answers: 12,
    isResolved: true
  },
  {
    id: 4,
    title: 'Strategi terbaik untuk bagian Reading TOEFL?',
    preview: 'Saya selalu kehabisan waktu saat berhadapan dengan bacaan panjang. Haruskah membaca soal terlebih dahulu atau sekilas membaca keseluruhan teks?',
    category: 'Bahasa Inggris',
    tags: ['#toefl', '#reading'],
    author: { name: 'Dian Sastro', avatar: 'DS', rep: '120' },
    time: '2 hari lalu',
    upvotes: 8,
    answers: 0,
    isResolved: false
  }
])

const searchQuery = ref('')
const isLoadingMore = ref(false)
const showInfo = ref(false)
const infoMessage = ref('')

const activeCategoryName = computed(() => {
  const active = categories.value.find(c => c.active)
  return active ? active.name : 'Semua Topik'
})

const filteredPosts = computed(() => {
  return posts.value.filter(post => {
    let matchCat = true
    let matchSearch = true

    if (activeCategoryName.value !== 'Semua Topik' && post.category !== activeCategoryName.value) {
      matchCat = false
    }

    if (searchQuery.value) {
      const query = searchQuery.value.toLowerCase()
      matchSearch = post.title.toLowerCase().includes(query) || 
                    post.preview.toLowerCase().includes(query) || 
                    post.tags.some(t => t.toLowerCase().includes(query))
    }

    return matchCat && matchSearch
  })
})

const selectTag = (tag) => {
  searchQuery.value = tag
  showInfoToast(`Menyaring tag: ${tag}`)
}

const loadMore = () => {
  isLoadingMore.value = true
  setTimeout(() => {
    isLoadingMore.value = false
    showInfoToast('Tidak ada diskusi lama yang tersedia.')
  }, 800)
}

const showInfoToast = (msg) => {
  infoMessage.value = msg
  showInfo.value = true
  setTimeout(() => {
    showInfo.value = false
  }, 3000)
}

const contributors = [
  { name: 'Dr. Sarah Smith', rep: '15.4k', role: 'Tutor', avatar: 'SS' },
  { name: 'Budi Santoso', rep: '3.4k', role: 'Pelajar', avatar: 'BS' },
  { name: 'Prof. Anderson', rep: '12.1k', role: 'Tutor', avatar: 'PA' },
]
</script>

<style scoped>
/* Forum Specific Adjustments */
.forum-card {
  transition: all 0.25s ease;
}
.forum-card:hover {
  transform: translateX(4px);
  border-left-width: 4px;
  border-left-color: #334EAC;
  background: rgba(255,255,255,0.95);
}
.kontributor-panel {
  background: linear-gradient(135deg, rgba(255,255,255,0.8), rgba(255,249,240,0.8));
}
.ai-help-panel {
  background: linear-gradient(135deg, #081F5C, #334EAC);
  color: white;
  border: 1px solid rgba(112, 150, 209, 0.3);
  box-shadow: 0 10px 30px rgba(8, 31, 92, 0.2);
}
</style>

