<template>
  <div class="relative animate-in fade-in duration-500 min-h-screen max-w-7xl mx-auto">
    
    <!-- MAIN CONTENT -->
    <div class="relative z-10 space-y-6">
      
      <!-- Page Header -->
      <div 
        :class="[
          route.path.startsWith('/tutor') 
            ? 'bg-white border border-slate-200 shadow-sm rounded-2xl p-7 md:p-8 flex flex-col md:flex-row md:items-center justify-between gap-6 relative mb-8' 
            : 'page-header-banner p-6 md:p-8 flex flex-col md:flex-row md:items-center justify-between gap-6 relative mb-8'
        ]"
      >
        <div 
          :class="[
            route.path.startsWith('/tutor')
              ? 'absolute right-0 top-0 w-1/3 h-full bg-gradient-to-l from-[#EDF1F6]/50 to-transparent pointer-events-none'
              : 'absolute right-0 top-0 w-1/3 h-full bg-gradient-to-l from-[#EDF1F6]/80 to-transparent pointer-events-none'
          ]"
        ></div>
        
        <div class="relative z-10 flex items-center gap-4">
          <span 
            :class="[
              route.path.startsWith('/tutor')
                ? 'w-12 h-12 rounded-2xl bg-[#334EAC]/10 text-[#334EAC] flex items-center justify-center shrink-0'
                : 'page-header-icon w-12 h-12 flex items-center justify-center shrink-0'
            ]"
          >
            <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z"/></svg>
          </span>
          <div>
            <h1 
              :class="[
                route.path.startsWith('/tutor')
                  ? 'text-2xl font-extrabold text-[#081F5C] tracking-tight leading-tight'
                  : 'text-2xl md:text-3xl font-extrabold text-[#081F5C] tracking-tight'
              ]"
            >
              Forum Diskusi Akademik
            </h1>
            <p 
              :class="[
                route.path.startsWith('/tutor')
                  ? 'text-[13px] text-slate-500 font-medium mt-2 max-w-xl leading-relaxed'
                  : 'text-xs md:text-sm text-[#4A5880]/90 font-medium mt-1.5 max-w-xl leading-relaxed'
              ]"
            >
              Berkolaborasi, bertanya, dan berbagi catatan belajar bersama rekan mahasiswa dan tutor di FokusIn.
            </p>
          </div>
        </div>

        <div class="relative z-10 flex shrink-0 w-full md:w-auto">
          <RouterLink 
            :to="`${baseForumRoute}/create`" 
            :class="[
              route.path.startsWith('/tutor')
                ? 'px-5 py-2.5 bg-[#334EAC] hover:bg-[#1E3A8A] text-white rounded-2xl font-bold text-[13px] shadow-sm active:scale-95 transition-all flex items-center justify-center gap-2 w-full md:w-auto'
                : 'btn-solid w-full md:w-auto px-5 py-2.5 flex items-center justify-center gap-2'
            ]"
          >
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M5 12h14"/><path d="M12 5v14"/></svg>
            Mulai Diskusi Baru
          </RouterLink>
        </div>
      </div>

      <!-- 3-Column Layout -->
      <div class="flex flex-col xl:flex-row gap-6">
        
        <!-- 1. LEFT SIDEBAR FILTER (xl:w-[24%]) -->
        <div class="hidden xl:flex flex-col w-[24%] shrink-0 space-y-5 sticky top-[24px] h-fit">
          
          <!-- Trending Tags: Unified visual system -->
          <div>
            <h3 class="text-[10px] font-bold text-slate-900 uppercase tracking-widest mb-2.5">Tag Populer</h3>
            <div class="flex flex-wrap gap-1.5">
              <span v-for="tag in tags" :key="tag" @click="selectTag(tag)" class="px-2.5 py-1 bg-white hover:bg-slate-50 border border-slate-200 rounded-lg text-xs font-semibold text-[#334EAC] transition-all cursor-pointer shadow-sm">
                {{ tag }}
              </span>
            </div>
          </div>

          <!-- Today's Activity Panel -->
          <div class="card-panel p-4 space-y-3">
            <h3 class="text-[10px] font-bold text-slate-900 uppercase tracking-widest pb-1.5 border-b border-slate-100">Aktivitas Hari Ini</h3>
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
          
          <!-- Search & Academic Filter Bar -->
          <div class="card-panel p-4 md:p-5 mb-6 space-y-4">
            <!-- Search -->
            <div class="relative">
              <input type="text" v-model="searchQuery" placeholder="Cari diskusi, kata kunci, atau tag..." class="w-full pl-10 pr-4 py-2.5 bg-slate-50 hover:bg-slate-100/30 border border-slate-200 rounded-xl text-xs text-slate-800 focus:outline-none focus:border-[#334EAC] focus:ring-4 focus:ring-[#334EAC]/10 transition-all placeholder-slate-400 font-bold" />
              <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" class="absolute left-3.5 top-3.5 text-slate-400"><circle cx="11" cy="11" r="8"/><path d="m21 21-4.3-4.3"/></svg>
            </div>

            <!-- Academic Dropdowns (Spacious & Premium Grid) -->
            <div class="grid grid-cols-1 sm:grid-cols-3 gap-3 pt-3 border-t border-slate-200/60">
              <!-- Jurusan -->
              <div class="space-y-1">
                <label class="text-[9px] font-extrabold text-slate-400 uppercase tracking-widest ml-1">Jurusan</label>
                <div class="relative">
                  <select v-model="selectedJurusan" class="w-full pl-3 pr-8 py-2 bg-slate-50 hover:bg-white border border-slate-200 rounded-xl text-[11px] font-bold text-slate-800 appearance-none focus:outline-none focus:ring-4 focus:ring-[#334EAC]/10 transition-all cursor-pointer">
                    <option value="">Semua Jurusan</option>
                    <option value="Teknologi Rekayasa Instrumentasi dan Kontrol (TRIK)">TRIK</option>
                    <option value="Kearsipan dan Informasi Digital (KID)">KID</option>
                    <option value="Teknik Informatika">Teknik Informatika</option>
                  </select>
                  <div class="absolute inset-y-0 right-0 pr-3 flex items-center pointer-events-none text-slate-400"><svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"><path d="m6 9 6 6 6-6"/></svg></div>
                </div>
              </div>

              <!-- Semester -->
              <div class="space-y-1">
                <label class="text-[9px] font-extrabold uppercase tracking-widest ml-1 transition-colors" :class="selectedJurusan ? 'text-slate-400' : 'text-slate-300'">Semester</label>
                <div class="relative">
                  <select v-model="selectedSemester" :disabled="!selectedJurusan" class="w-full pl-3 pr-8 py-2 bg-slate-50 hover:bg-white border border-slate-200 rounded-xl text-[11px] font-bold text-slate-800 appearance-none focus:outline-none focus:ring-4 focus:ring-[#334EAC]/10 transition-all cursor-pointer disabled:opacity-40 disabled:cursor-not-allowed">
                    <option value="">Semua Semester</option>
                    <option v-for="i in 6" :key="i" :value="i">Semester {{ i }}</option>
                  </select>
                  <div class="absolute inset-y-0 right-0 pr-3 flex items-center pointer-events-none text-slate-400"><svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"><path d="m6 9 6 6 6-6"/></svg></div>
                </div>
              </div>

              <!-- Mata Kuliah -->
              <div class="space-y-1">
                <label class="text-[9px] font-extrabold uppercase tracking-widest ml-1 transition-colors" :class="selectedSemester ? 'text-slate-400' : 'text-slate-300'">Mata Kuliah</label>
                <div class="relative">
                  <select v-model="selectedCategoryId" :disabled="!selectedSemester" class="w-full pl-3 pr-8 py-2 bg-slate-50 hover:bg-white border border-slate-200 rounded-xl text-[11px] font-bold text-slate-800 appearance-none focus:outline-none focus:ring-4 focus:ring-[#334EAC]/10 transition-all cursor-pointer disabled:opacity-40 disabled:cursor-not-allowed">
                    <option value="">Semua Mata Kuliah</option>
                    <option v-for="cat in filteredCategories" :key="cat.id" :value="cat.id">{{ cat.name }}</option>
                  </select>
                  <div class="absolute inset-y-0 right-0 pr-3 flex items-center pointer-events-none text-slate-400"><svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"><path d="m6 9 6 6 6-6"/></svg></div>
                </div>
              </div>
            </div>
          </div>

          <!-- Loading State -->
          <div v-if="isLoading" class="flex flex-col items-center justify-center py-12 card-base space-y-3 bg-white/50 backdrop-blur-sm border border-slate-200/60 rounded-2xl">
            <svg class="animate-spin text-[#334EAC]" xmlns="http://www.w3.org/2000/svg" width="36" height="36" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round">
              <path d="M21 12a9 9 0 1 1-6.219-8.56"/>
            </svg>
            <p class="text-sm font-bold text-[#081F5C]">Memuat daftar diskusi...</p>
          </div>

          <!-- Error State -->
          <div v-else-if="error" class="flex flex-col items-center justify-center py-12 card-base space-y-4 bg-rose-50/50 border border-rose-200/60 rounded-2xl">
            <div class="w-12 h-12 rounded-full bg-rose-100 flex items-center justify-center text-rose-600">
              <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
                <circle cx="12" cy="12" r="10"/><line x1="12" x2="12" y1="8" y2="12"/><line x1="12" x2="12.01" y1="16" y2="16"/>
              </svg>
            </div>
            <div class="text-center">
              <h3 class="text-base font-bold text-rose-800">Gagal Memuat Diskusi</h3>
              <p class="text-xs text-rose-600/80 font-medium mt-1">{{ error }}</p>
            </div>
            <button @click="fetchPostsData(true)" class="px-5 py-2.5 bg-[#334EAC] hover:bg-[#081F5C] text-white rounded-xl font-bold text-xs shadow-sm transition-all active:scale-95">
              Coba Lagi
            </button>
          </div>

          <!-- Empty State -->
          <div v-else-if="filteredPosts.length === 0" class="flex flex-col items-center justify-center py-16 card-base space-y-4 bg-white/50 backdrop-blur-sm border border-slate-200/60 rounded-2xl">
            <div class="w-16 h-16 rounded-2xl bg-[#334EAC]/5 text-[#334EAC] flex items-center justify-center">
              <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                <path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z"/>
              </svg>
            </div>
            <div class="text-center max-w-sm">
              <h3 class="text-base font-bold text-[#081F5C]">Belum Ada Diskusi</h3>
              <p class="text-xs text-slate-500 font-medium mt-1.5 leading-relaxed">Jadilah yang pertama untuk memulai diskusi atau mengajukan pertanyaan tentang topik ini!</p>
            </div>
            <RouterLink :to="`${baseForumRoute}/create`" class="px-5 py-2.5 bg-[#334EAC] hover:bg-[#081F5C] text-white rounded-xl font-bold text-xs shadow-sm transition-all active:scale-95">
              Mulai Diskusi
            </RouterLink>
          </div>

          <!-- Post List -->
          <div v-else class="space-y-3">
            <RouterLink :to="`${baseForumRoute}/${post.id}`" v-for="(post, index) in filteredPosts" :key="post.id" :class="[index === 0 ? 'card-featured' : 'card-supporting', 'group card-base forum-card flex flex-col sm:flex-row gap-5 cursor-pointer relative overflow-hidden']">
              
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
                  <span class="tag-academic">{{ post.category }}</span>
                  <span v-if="post.isResolved" class="flex items-center gap-0.5 text-[9px] font-bold text-emerald-700 bg-emerald-50 px-2 py-0.5 rounded uppercase tracking-wider">
                    <svg xmlns="http://www.w3.org/2000/svg" width="10" height="10" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"><polyline points="20 6 9 17 4 12"/></svg>
                    Selesai
                  </span>
                </div>
                
                <h2 class="text-base font-bold text-slate-900 leading-snug mb-1 group-hover:text-[#334EAC] transition-colors tracking-tight">{{ post.title }}</h2>
                <p class="text-xs text-slate-500 font-normal line-clamp-2 mb-3 leading-relaxed">{{ post.preview }}</p>
                
                <div class="mt-auto flex flex-col sm:flex-row sm:items-center justify-between gap-3 pt-2 border-t border-slate-100">
                  <div class="flex items-center gap-2 flex-wrap">
                    <span v-for="tag in post.tags" :key="tag" class="tag-academic opacity-70 border-none px-0 text-slate-500">
                      #{{ tag }}
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
          <div v-if="!isLoading && !error && filteredPosts.length > 0 && hasMore" class="mt-8 flex justify-center">
            <button @click="loadMore" class="px-6 py-2.5 bg-white border border-slate-200 text-slate-800 rounded-xl font-bold text-xs shadow-sm hover:bg-slate-50 transition-all active:scale-95 flex items-center gap-2">
              <svg v-if="isLoadingMore" class="animate-spin" xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"><path d="M21 12a9 9 0 1 1-6.219-8.56"/></svg>
              {{ isLoadingMore ? 'Memuat...' : 'Muat Lebih Banyak' }}
            </button>
          </div>

        </div>

        <!-- 3. RIGHT PANEL (xl:w-[25%]) -->
        <div class="hidden xl:flex flex-col w-[25%] shrink-0 space-y-6 sticky top-[24px] h-fit">
          
          <!-- Create Post CTA -->
          <RouterLink :to="`${baseForumRoute}/create`" class="btn-solid w-full flex items-center justify-center gap-1.5 px-4 py-3 group">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round" class="group-hover:rotate-90 transition-transform"><path d="M5 12h14"/><path d="M12 5v14"/></svg>
            Mulai Diskusi Baru
          </RouterLink>

          <!-- Top Contributors -->
          <div class="card-panel kontributor-panel p-5">
            <div class="flex items-center gap-2 mb-4">
              <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="#F59E0B" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"/></svg>
              <h3 class="text-xs font-bold text-slate-900 uppercase tracking-wider">Kontributor Terbaik</h3>
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
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="#334EAC" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="m12 3-1.912 5.813a2 2 0 0 1-1.275 1.275L3 12l5.813 1.912a2 2 0 0 1 1.275 1.275L12 21l1.912-5.813a2 2 0 0 1 1.275-1.275L21 12l-5.813-1.912a2 2 0 0 1-1.275-1.275L12 3Z"/></svg>
                <h3 class="text-[10px] font-bold tracking-wider uppercase text-slate-900">Tanya Fokus AI</h3>
              </div>
              <p class="text-[11px] text-slate-600 mb-4 leading-relaxed font-medium">Kesulitan menjawab soal? Dapatkan petunjuk instan sebelum bertanya di forum.</p>
              <RouterLink :to="baseAIAnalyzerRoute" class="w-full py-2 bg-white hover:bg-slate-50 border border-slate-200 rounded-lg text-[#334EAC] font-bold text-[11px] transition-all flex items-center justify-center shadow-sm">
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
import { ref, computed, onMounted, watch } from 'vue'
import { RouterLink, useRoute } from 'vue-router'
import { forumService } from '@/services/forum.service'

const route = useRoute()
const baseForumRoute = computed(() => {
  return route.path.startsWith('/tutor') ? '/tutor/forum' : '/pelajar/forum'
})

const baseAIAnalyzerRoute = computed(() => {
  return route.path.startsWith('/tutor') ? '/tutor/ai-validation' : '/pelajar/ai-analyzer'
})

const categories = ref([])
const posts = ref([])
const isLoading = ref(false)
const isLoadingMore = ref(false)
const error = ref(null)
const currentPage = ref(1)
const lastPage = ref(1)

const selectedJurusan = ref('')
const selectedSemester = ref('')
const selectedCategoryId = ref('')

const hasMore = computed(() => currentPage.value < lastPage.value)

const filteredCategories = computed(() => {
  return categories.value.filter(c => 
    c.jurusan === selectedJurusan.value && 
    String(c.semester) === String(selectedSemester.value)
  )
})

watch(selectedJurusan, () => {
  selectedSemester.value = ''
  selectedCategoryId.value = ''
  fetchPostsData(true)
})

watch(selectedSemester, () => {
  selectedCategoryId.value = ''
  fetchPostsData(true)
})

watch(selectedCategoryId, () => {
  fetchPostsData(true)
})

const tags = computed(() => {
  return categories.value
    .map(c => `#${c.name.toLowerCase().replace(/\s+/g, '-')}`)
})

const getCategoryIcon = (name) => {
  const lowercaseName = name.toLowerCase()
  if (lowercaseName.includes('pemrograman') || lowercaseName.includes('komputer') || lowercaseName.includes('dasar')) {
    return '<rect width="18" height="18" x="3" y="3" rx="2"/><path d="m9 10 3 3-3 3"/><path d="M14 16h2"/>'
  } else if (lowercaseName.includes('matematika')) {
    return '<path d="M19 4H5.8a1 1 0 0 0-.7 1.7L11.8 12l-6.7 6.3a1 1 0 0 0 .7 1.7H19"/>'
  } else if (lowercaseName.includes('elektronika') || lowercaseName.includes('listrik') || lowercaseName.includes('mikrokontroler') || lowercaseName.includes('embedded') || lowercaseName.includes('sistem')) {
    return '<path d="M5 22h14"/><path d="M9 2h6"/><path d="M14 22a7 7 0 0 0-4 0"/><path d="M9 2v6L4.5 16.5a2 2 0 0 0-.3 1.5 2 2 0 0 0 1.8 1.4h12c1 0 1.7-.6 1.8-1.5.1-.5 0-1-.3-1.4L15 8V2z"/>'
  } else if (lowercaseName.includes('inggris') || lowercaseName.includes('bahasa')) {
    return '<path d="m5 8 6 6"/><path d="m4 14 6-6"/><path d="M2 5h12"/><path d="M7 2h1"/><path d="M22 22l-5-10-5 10"/><path d="M14 18h6"/>'
  } else {
    return '<path d="M4 19.5v-15A2.5 2.5 0 0 1 6.5 2H20v20H6.5a2.5 2.5 0 0 1-2.5-2.5Z"/><path d="M6 6h10M6 10h10"/>'
  }
}

const getAvatarInitials = (name) => {
  if (!name) return '?'
  const parts = name.trim().split(/\s+/)
  if (parts.length >= 2) {
    return (parts[0][0] + parts[1][0]).toUpperCase()
  }
  return parts[0].substring(0, 2).toUpperCase()
}

const formatTime = (dateString) => {
  if (!dateString) return ''
  const date = new Date(dateString)
  const now = new Date()
  const diffMs = now - date
  const diffMins = Math.floor(diffMs / 60000)
  const diffHours = Math.floor(diffMins / 60)
  const diffDays = Math.floor(diffHours / 24)

  if (diffMins < 1) return 'Baru saja'
  if (diffMins < 60) return `${diffMins} menit lalu`
  if (diffHours < 24) return `${diffHours} jam lalu`
  return `${diffDays} hari lalu`
}

const mapBackendPost = (post) => {
  return {
    id: post.id,
    title: post.title,
    preview: post.content,
    category: post.category ? post.category.name : 'Umum',
    tags: post.category ? [post.category.name] : [],
    author: {
      name: post.user ? post.user.name : 'Anonim',
      avatar: post.user ? getAvatarInitials(post.user.name) : 'A'
    },
    time: formatTime(post.created_at),
    upvotes: post.votes_count || 0,
    answers: post.answers_count || 0,
    isResolved: post.is_verified || false
  }
}

const fetchCategories = async () => {
  try {
    const data = await forumService.getCategories()
    categories.value = data.map(c => ({
      id: c.id,
      name: c.name,
      jurusan: c.jurusan,
      semester: c.semester,
      icon: getCategoryIcon(c.name)
    }))
  } catch (err) {
    console.error('Error fetching categories:', err)
  }
}

const fetchPostsData = async (isReset = false) => {
  if (isReset) {
    currentPage.value = 1
    posts.value = []
  }

  if (currentPage.value === 1) {
    isLoading.value = true
  } else {
    isLoadingMore.value = true
  }

  error.value = null

  try {
    const params = {
      page: currentPage.value
    }
    if (selectedCategoryId.value) {
      params.category_id = selectedCategoryId.value
    } else {
      if (selectedJurusan.value) {
        params.jurusan = selectedJurusan.value
      }
      if (selectedSemester.value) {
        params.semester = selectedSemester.value
      }
    }

    const response = await forumService.getPosts(params)
    const newPosts = response.data.map(mapBackendPost)

    if (isReset) {
      posts.value = newPosts
    } else {
      posts.value = [...posts.value, ...newPosts]
    }

    currentPage.value = response.current_page
    lastPage.value = response.last_page
  } catch (err) {
    error.value = err || 'Gagal memuat diskusi.'
    console.error('Error fetching posts:', err)
  } finally {
    isLoading.value = false
    isLoadingMore.value = false
  }
}

const searchQuery = ref('')
const showInfo = ref(false)
const infoMessage = ref('')

const filteredPosts = computed(() => {
  if (!searchQuery.value.trim()) {
    return posts.value
  }
  const query = searchQuery.value.toLowerCase()
  return posts.value.filter(post => {
    return post.title.toLowerCase().includes(query) || 
           post.preview.toLowerCase().includes(query) || 
           post.tags.some(t => t.toLowerCase().includes(query))
  })
})

const selectTag = (tag) => {
  searchQuery.value = tag.startsWith('#') ? tag : `#${tag}`
  showInfoToast(`Menyaring tag: ${searchQuery.value}`)
}

const loadMore = () => {
  if (currentPage.value < lastPage.value) {
    currentPage.value += 1
    fetchPostsData(false)
  } else {
    showInfoToast('Tidak ada diskusi lama yang tersedia.')
  }
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

onMounted(async () => {
  await fetchCategories()
  await fetchPostsData(true)
})
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
  background: rgba(255, 255, 255, 0.78);
  border: 1px solid rgba(51, 78, 172, 0.14);
  border-top: 3px solid rgba(51, 78, 172, 0.25);

}
</style>

