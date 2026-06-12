<template>
  <div class="space-y-8 animate-in fade-in duration-500">
    
    <!-- 1. HEADER SECTION -->
    <div class="page-header-banner p-6 md:p-8 mb-2 relative">
      <div class="absolute right-0 top-0 w-1/3 h-full bg-gradient-to-l from-[#EDF1F6]/80 to-transparent pointer-events-none"></div>

      <!-- Title Row -->
      <div class="relative z-10 flex flex-col sm:flex-row sm:items-center justify-between gap-4 mb-6">
        <div class="flex items-center gap-4">
          <span class="page-header-icon w-12 h-12 flex items-center justify-center shrink-0">
            <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="m12 3-1.912 5.813a2 2 0 0 1-1.275 1.275L3 12l5.813 1.912a2 2 0 0 1 1.275 1.275L12 21l1.912-5.813a2 2 0 0 1 1.275-1.275L21 12l-5.813-1.912a2 2 0 0 1-1.275-1.275L12 3Z"/></svg>
          </span>
          <div>
            <h1 class="text-2xl md:text-3xl font-extrabold text-[#081F5C] tracking-tight">Analisis Pola AI</h1>
            <p class="text-xs md:text-sm text-[#4A5880]/90 font-medium mt-1.5 max-w-xl leading-relaxed">
              Unggah ujian sebelumnya atau materi belajar. AI kami akan menganalisis pola historis dan merancang rencana belajar strategis untukmu.
            </p>
          </div>
        </div>
        <RouterLink to="/pelajar/ai-analyzer/create" class="btn-solid shrink-0 px-5 py-2.5 flex items-center gap-2 self-start sm:self-center">
          <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"/><polyline points="17 8 12 3 7 8"/><line x1="12" x2="12" y1="3" y2="15"/></svg>
          Analisis Baru
        </RouterLink>
      </div>

      <!-- Filter Bar -->
      <div class="relative z-10 grid grid-cols-1 sm:grid-cols-3 gap-3">
        <div class="space-y-1.5">
          <label class="text-[10px] font-extrabold text-slate-400 uppercase tracking-widest ml-1">Jurusan</label>
          <div class="relative">
            <select v-model="selectedJurusan" class="w-full px-4 py-2.5 bg-white border border-slate-200 rounded-xl text-[13px] font-bold text-slate-800 focus:outline-none focus:border-[#334EAC] focus:ring-4 focus:ring-[#334EAC]/10 transition-all appearance-none cursor-pointer">
              <option value="">— Pilih Jurusan —</option>
              <option value="Teknologi Rekayasa Instrumentasi dan Kontrol (TRIK)">Teknologi Rekayasa Instrumentasi &amp; Kontrol (TRIK)</option>
              <option value="Kearsipan dan Informasi Digital (KID)">Kearsipan dan Informasi Digital (KID)</option>
              <option value="Teknik Informatika">Teknik Informatika</option>
            </select>
            <div class="absolute inset-y-0 right-0 pr-3 flex items-center pointer-events-none text-slate-400"><svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"><path d="m6 9 6 6 6-6"/></svg></div>
          </div>
        </div>
        <div class="space-y-1.5">
          <label class="text-[10px] font-extrabold uppercase tracking-widest ml-1 transition-colors" :class="selectedJurusan ? 'text-slate-400' : 'text-slate-300'">Semester</label>
          <div class="relative">
            <select v-model="selectedSemester" :disabled="!selectedJurusan" class="w-full px-4 py-2.5 bg-white border border-slate-200 rounded-xl text-[13px] font-bold text-slate-800 focus:outline-none focus:border-[#334EAC] focus:ring-4 focus:ring-[#334EAC]/10 transition-all appearance-none cursor-pointer disabled:opacity-40 disabled:cursor-not-allowed disabled:bg-slate-50">
              <option value="">— Pilih Semester —</option>
              <option v-for="i in 6" :key="i" :value="i">Semester {{ i }}</option>
            </select>
            <div class="absolute inset-y-0 right-0 pr-3 flex items-center pointer-events-none text-slate-400"><svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"><path d="m6 9 6 6 6-6"/></svg></div>
          </div>
        </div>
        <div class="space-y-1.5">
          <label class="text-[10px] font-extrabold uppercase tracking-widest ml-1 transition-colors" :class="selectedSemester ? 'text-slate-400' : 'text-slate-300'">Mata Kuliah</label>
          <div class="relative">
            <select v-model="selectedCategoryId" :disabled="!selectedSemester" class="w-full px-4 py-2.5 bg-white border border-slate-200 rounded-xl text-[13px] font-bold text-slate-800 focus:outline-none focus:border-[#334EAC] focus:ring-4 focus:ring-[#334EAC]/10 transition-all appearance-none cursor-pointer disabled:opacity-40 disabled:cursor-not-allowed disabled:bg-slate-50">
              <option value="" disabled>— Pilih Mata Kuliah —</option>
              <option v-for="cat in filteredCategories" :key="cat.id" :value="cat.id">{{ cat.name }}</option>
            </select>
            <div class="absolute inset-y-0 right-0 pr-3 flex items-center pointer-events-none text-slate-400"><svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"><path d="m6 9 6 6 6-6"/></svg></div>
          </div>
        </div>
      </div>
    </div>

    <!-- Loading State -->
    <div v-if="loading" class="bg-white rounded-3xl p-8 shadow-sm border border-slate-200 flex flex-col items-center justify-center min-h-[300px]">
      <div class="relative mb-6">
        <div class="w-16 h-16 rounded-full border-4 border-[#EDF1F6] border-t-[#334EAC] animate-spin"></div>
        <div class="absolute inset-0 flex items-center justify-center">
          <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="#334EAC" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="m12 3-1.912 5.813a2 2 0 0 1-1.275 1.275L3 12l5.813 1.912a2 2 0 0 1 1.275 1.275L12 21l1.912-5.813a2 2 0 0 1 1.275-1.275L21 12l-5.813-1.912a2 2 0 0 1-1.275-1.275L12 3Z"/></svg>
        </div>
      </div>
      <p class="text-base font-bold text-slate-700 mb-1">{{ isAnalyzingNew ? 'Menganalisis dokumen baru...' : 'Memproses analisis pola AI...' }}</p>
      <p class="text-sm font-medium text-slate-400">{{ isAnalyzingNew ? 'AI sedang memproses isi dokumen yang baru kamu unggah.' : 'Harap tunggu sebentar.' }}</p>
    </div>

    <!-- Error State -->
    <div v-else-if="error" class="bg-white rounded-3xl p-8 shadow-sm border border-rose-200 bg-rose-50 text-rose-700">
      <div class="flex items-center gap-3">
        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" class="shrink-0"><circle cx="12" cy="12" r="10"/><line x1="12" y1="8" x2="12" y2="12"/><line x1="12" y1="16" x2="12.01" y2="16"/></svg>
        <div>
          <h4 class="font-bold">Gagal memuat Analisis AI</h4>
          <p class="text-sm font-medium mt-1">{{ error }}</p>
        </div>
      </div>
      <button @click="fetchSummary" class="mt-4 px-4 py-2 bg-rose-600 hover:bg-rose-700 text-white rounded-xl text-xs font-semibold transition-all">
        Coba Lagi
      </button>
    </div>

    <template v-else>
      <!-- Jika belum memilih mata kuliah -->
      <div v-if="!selectedCategoryId" class="bg-white rounded-3xl p-12 text-center border border-slate-200/60 shadow-sm flex flex-col items-center justify-center min-h-[300px]">
        <div class="w-16 h-16 rounded-full bg-[#EDF1F6] flex items-center justify-center text-[#334EAC] mb-4 border border-[#D0E3FF]/50">
          <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><circle cx="12" cy="12" r="10"/><path d="m15 9-6 6"/><path d="m9 9 6 6"/></svg>
        </div>
        <h3 class="text-base font-bold text-slate-800 mb-2">Pilih Mata Kuliah</h3>
        <p class="text-slate-500 text-xs max-w-sm mx-auto leading-relaxed">
          Pilih Jurusan, Semester, dan Mata Kuliah di atas untuk melihat daftar analisis materi AI.
        </p>
      </div>

      <!-- Jika sudah memilih mata kuliah, tetapi belum membuka detail analisis (Tampilan Daftar Forum) -->
      <template v-else-if="!selectedAnalysis">
        <div class="space-y-6">
          <div class="flex items-center justify-between">
            <h2 class="text-lg font-extrabold text-[#081F5C] tracking-tight">Daftar Analisis Materi</h2>
            <RouterLink :to="{ path: '/pelajar/ai-analyzer/create', query: { category_id: selectedCategoryId, jurusan: selectedJurusan, semester: selectedSemester } }" class="btn-solid shrink-0 px-4 py-2 flex items-center gap-1.5 text-xs font-bold shadow-sm">
              <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path d="M12 5v14M5 12h14"/></svg>
              Tambah Analisis
            </RouterLink>
          </div>

          <!-- Empty State for List -->
          <div v-if="analysesList.length === 0" class="bg-white rounded-3xl p-12 text-center border border-slate-200/60 shadow-sm flex flex-col items-center justify-center min-h-[250px]">
            <div class="w-16 h-16 rounded-full bg-[#EDF1F6] flex items-center justify-center text-[#334EAC] mb-4 border border-[#D0E3FF]/50">
              <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><circle cx="12" cy="12" r="10"/><line x1="12" y1="8" x2="12" y2="12"/><line x1="12" y1="16" x2="12.01" y2="16"/></svg>
            </div>
            <h3 class="text-base font-bold text-slate-800 mb-2">Belum ada analisis materi</h3>
            <p class="text-slate-500 text-xs max-w-sm mx-auto leading-relaxed mb-6">
              Materi belajar untuk mata kuliah ini belum diunggah. Unggah berkas soal atau modul pertamamu untuk memulai analisis AI.
            </p>
            <RouterLink :to="{ path: '/pelajar/ai-analyzer/create', query: { category_id: selectedCategoryId, jurusan: selectedJurusan, semester: selectedSemester } }" class="inline-flex items-center justify-center gap-1.5 px-4 py-2 bg-[#334EAC] hover:bg-[#081F5C] text-white rounded-xl font-bold text-xs transition-all shadow-sm active:scale-95">
              Unggah Sekarang
            </RouterLink>
          </div>

          <!-- Forum Cards Listing -->
          <div v-else class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div 
              v-for="analysis in analysesList" 
              :key="analysis.id" 
              @click="openAnalysis(analysis.id)"
              class="bg-white rounded-3xl p-6 border border-slate-200/60 shadow-sm hover:shadow-md hover:border-[#7096D1]/50 cursor-pointer transition-all duration-300 relative group flex flex-col min-h-[200px]"
            >
              <!-- Format & Time -->
              <div class="flex items-center justify-between mb-4">
                <span class="px-2.5 py-1 bg-[#EDF1F6] text-[#334EAC] text-[10px] font-extrabold rounded-md uppercase tracking-wider">
                  {{ analysis.file_url?.split('.').pop()?.substring(0, 4) || 'Arsip' }}
                </span>
                <span class="text-[11px] font-bold text-slate-400">
                  {{ formatRelativeTime(analysis.created_at) }}
                </span>
              </div>

              <!-- Title -->
              <h3 class="text-[16px] font-extrabold text-[#081F5C] group-hover:text-[#334EAC] transition-colors line-clamp-2 mb-2">
                {{ analysis.title || 'Analisis Tanpa Judul' }}
              </h3>

              <!-- Snippet / Description -->
              <p class="text-[13px] text-slate-500 font-medium line-clamp-3 mb-6 leading-relaxed">
                {{ analysis.ai_analysis?.message || 'Analisis materi belajar dan simulasi kuis kustom bertenaga kecerdasan buatan.' }}
              </p>

              <!-- Footer info -->
              <div class="flex items-center justify-between pt-4 border-t border-slate-100 mt-auto">
                <div class="flex items-center gap-2">
                  <div class="w-7 h-7 rounded-full bg-[#EDF1F6] flex items-center justify-center text-[#081F5C] text-[11px] font-extrabold">
                    {{ getInitials(analysis.user?.name) }}
                  </div>
                  <span class="text-[12px] font-bold text-slate-600">{{ analysis.user?.name || 'Mahasiswa' }}</span>
                </div>

                <span class="text-[12px] font-extrabold text-[#334EAC] group-hover:translate-x-1 transition-transform flex items-center gap-1">
                  Buka Analisis
                  <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"><path d="M5 12h14"/><path d="m12 5 7 7-7 7"/></svg>
                </span>
              </div>
            </div>
          </div>
        </div>
      </template>

      <!-- Jika sudah membuka detail analisis (Tampilan Detail Analisis Dashboard) -->
      <div v-else class="space-y-6">
        <!-- Back Button & Material Header Info -->
        <div class="bg-white/80 backdrop-blur-xl rounded-3xl p-6 shadow-sm border border-slate-200/60 flex flex-col md:flex-row md:items-center justify-between gap-4">
          <div class="flex flex-col gap-2">
            <button @click="backToList" class="text-xs font-extrabold text-slate-400 hover:text-[#334EAC] transition-all flex items-center gap-1 bg-slate-50 px-3 py-1.5 rounded-lg border border-slate-200/60 w-fit">
              ← Kembali ke Daftar Materi
            </button>
            <h2 class="text-xl md:text-2xl font-extrabold text-[#081F5C] tracking-tight mt-1">
              {{ selectedAnalysis.title }}
            </h2>
            <div class="flex flex-wrap items-center gap-3 text-xs font-bold text-slate-400">
              <span>Diunggah oleh: <strong class="text-slate-600">{{ selectedAnalysis.user?.name }}</strong></span>
              <span>•</span>
              <span>{{ formatRelativeTime(selectedAnalysis.created_at) }}</span>
            </div>
          </div>

          <!-- File Source Access Button -->
          <a 
            v-if="selectedAnalysis.file_url" 
            :href="selectedAnalysis.file_url" 
            target="_blank" 
            class="px-5 py-3 bg-[#081F5C] hover:bg-[#334EAC] text-white rounded-xl font-bold text-[13px] transition-colors flex items-center justify-center gap-2 shadow-sm shrink-0"
          >
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"/><polyline points="7 10 12 15 17 10"/><line x1="12" x2="12" y1="15" y2="3"/></svg>
            Unduh Berkas Sumber
          </a>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-3 gap-6 lg:gap-8">
        
        <!-- Most Frequent Topics -->
        <div class="card-panel lg:col-span-2 rounded-3xl p-8 transition-all duration-300 ease-out group/card">
          <div class="flex items-center justify-between mb-8">
            <h3 class="text-[17px] font-bold text-slate-900 flex items-center gap-3 tracking-tight">
              <span class="w-8 h-8 rounded-lg bg-[#F7F2EB] flex items-center justify-center text-[#081F5C] border border-[#D0E3FF]/50 group-hover/card:scale-110 transition-transform"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"><path d="M3 3v18h18"/><path d="m19 9-5 5-4-4-3 3"/></svg></span>
              Frekuensi Topik
            </h3>
            <span class="text-[12px] font-bold text-slate-400">Berdasarkan unggahan terakhir</span>
          </div>
          
          <div class="space-y-6">
            <div v-for="(topic, index) in summaryData.topics" :key="index" class="group cursor-pointer">
              <div class="flex justify-between items-start text-[14px] font-bold mb-2">
                <div class="flex flex-col">
                  <span class="text-[#081F5C] group-hover:text-[#334EAC] transition-colors">{{ topic.name }}</span>
                  <span v-if="topic.description" class="text-[11px] text-slate-400 font-medium normal-case mt-0.5">{{ topic.description }}</span>
                </div>
                <span class="text-slate-500 font-extrabold shrink-0 pl-4">
                  {{ topic.frequency }} ({{ getFrequencyPercent(topic.frequency) }}%)
                </span>
              </div>
              <div class="w-full h-2.5 bg-[#EDF1F6] rounded-full overflow-hidden">
                <div class="h-full rounded-full transition-all" :class="getBarColor(index)" :style="{ width: getFrequencyPercent(topic.frequency) + '%' }"></div>
              </div>
            </div>
          </div>
        </div>

        <!-- Difficulty Chart -->
        <div class="card-panel rounded-3xl p-8 flex flex-col items-center transition-all duration-300 ease-out group/card relative overflow-hidden">
          <div class="absolute inset-0 bg-gradient-to-br from-amber-500/5 to-transparent opacity-0 group-hover/card:opacity-100 transition-opacity duration-500 pointer-events-none"></div>
          <h3 class="text-[17px] font-bold text-slate-900 mb-8 w-full text-left flex items-center gap-3 tracking-tight">
            <span class="w-8 h-8 rounded-lg bg-amber-50 flex items-center justify-center text-amber-600 border border-amber-100/50 group-hover/card:scale-110 transition-transform"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"><path d="M12 2v20"/><path d="M17 5H9.5a3.5 3.5 0 0 0 0 7h5a3.5 3.5 0 0 1 0 7H6"/></svg></span>
            Tingkat Kesulitan
          </h3>
          
          <!-- Clean Donut Mockup -->
          <div class="relative w-44 h-44 mb-6">
            <svg viewBox="0 0 36 36" class="w-full h-full transform -rotate-90">
              <!-- Background -->
              <path class="text-[#EDF1F6]" d="M18 2.0845 a 15.9155 15.9155 0 0 1 0 31.831 a 15.9155 15.9155 0 0 1 0 -31.831" fill="none" stroke="currentColor" stroke-width="3.5" />
              <!-- Hard -->
              <path class="text-rose-400" :stroke-dasharray="`${difficultyValues.hard}, 100`" d="M18 2.0845 a 15.9155 15.9155 0 0 1 0 31.831 a 15.9155 15.9155 0 0 1 0 -31.831" fill="none" stroke="currentColor" stroke-width="3.5" />
              <!-- Medium -->
              <path class="text-[#7096D1]" :stroke-dasharray="`${difficultyValues.medium}, 100`" :stroke-dashoffset="difficultyValues.mediumOffset" d="M18 2.0845 a 15.9155 15.9155 0 0 1 0 31.831 a 15.9155 15.9155 0 0 1 0 -31.831" fill="none" stroke="currentColor" stroke-width="3.5" />
              <!-- Easy -->
              <path class="text-[#BAD6EB]" :stroke-dasharray="`${difficultyValues.easy}, 100`" :stroke-dashoffset="difficultyValues.easyOffset" d="M18 2.0845 a 15.9155 15.9155 0 0 1 0 31.831 a 15.9155 15.9155 0 0 1 0 -31.831" fill="none" stroke="currentColor" stroke-width="3.5" />
            </svg>
            <div class="absolute inset-0 flex flex-col items-center justify-center">
              <span class="text-3xl font-extrabold text-[#081F5C]">{{ summaryData.difficulty_distribution?.hard || '0%' }}</span>
              <span class="text-[10px] font-extrabold text-slate-400 uppercase tracking-widest mt-0.5">Sulit</span>
            </div>
          </div>
          
          <div class="flex justify-center gap-5 w-full mt-auto">
            <div class="flex items-center gap-1.5">
              <div class="w-2.5 h-2.5 rounded-full bg-rose-400"></div>
              <span class="text-[12px] font-bold text-slate-500">Sulit ({{ summaryData.difficulty_distribution?.hard || '0%' }})</span>
            </div>
            <div class="flex items-center gap-1.5">
              <div class="w-2.5 h-2.5 rounded-full bg-[#7096D1]"></div>
              <span class="text-[12px] font-bold text-slate-500">Sedang ({{ summaryData.difficulty_distribution?.medium || '0%' }})</span>
            </div>
            <div class="flex items-center gap-1.5">
              <div class="w-2.5 h-2.5 rounded-full bg-[#BAD6EB]"></div>
              <span class="text-[12px] font-bold text-slate-500">Mudah ({{ summaryData.difficulty_distribution?.easy || '0%' }})</span>
            </div>
          </div>
        </div>

        <!-- AI Summary / Intelligence Report -->
        <div class="card-panel lg:col-span-2 rounded-3xl p-8 transition-all duration-300 ease-out group/card relative overflow-hidden">
          <div class="absolute inset-0 bg-gradient-to-br from-emerald-500/5 to-transparent opacity-0 group-hover/card:opacity-100 transition-opacity duration-500 pointer-events-none"></div>
          <h3 class="text-[17px] font-bold text-slate-900 mb-6 flex items-center gap-3 tracking-tight">
            <span class="w-8 h-8 rounded-lg bg-emerald-50 flex items-center justify-center text-emerald-600 border border-emerald-100/50 group-hover/card:scale-110 transition-transform"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"><path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"/><polyline points="14 2 14 8 20 8"/><line x1="16" y1="13" x2="8" y2="13"/><line x1="16" y1="17" x2="8" y2="17"/><polyline points="10 9 9 9 8 9"/></svg></span>
            Laporan Kecerdasan AI
          </h3>
          
          <p class="text-[14px] font-medium text-slate-600 leading-relaxed mb-8">
            {{ summaryData.message }}
          </p>

          <h4 class="text-[13px] font-extrabold text-[#081F5C] mb-4">Rekomendasi Jalur Belajar</h4>
          <ul class="space-y-4 mb-6">
            <li v-for="(rec, index) in summaryData.recommendations" :key="index" class="flex items-start gap-3.5">
              <div class="w-6 h-6 rounded-md bg-[#EDF1F6] flex items-center justify-center text-[#334EAC] font-extrabold text-[12px] shrink-0 mt-0.5">
                {{ index + 1 }}
              </div>
              <div>
                <p class="text-[14px] font-bold text-[#081F5C] mb-0.5">{{ parseRecommendation(rec).title }}</p>
                <p v-if="parseRecommendation(rec).desc" class="text-[13px] text-slate-500">{{ parseRecommendation(rec).desc }}</p>
              </div>
            </li>
          </ul>

          <RouterLink to="/pelajar/materials" class="mt-2 inline-flex items-center gap-2 text-[14px] font-extrabold text-[#334EAC] hover:text-[#081F5C] transition-colors">
            Lihat silabus personal penuh
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"><path d="m9 18 6-6-6-6"/></svg>
          </RouterLink>
        </div>

        <!-- Important Keywords -->
        <div class="card-panel rounded-3xl p-8 transition-all duration-300 ease-out group/card relative overflow-hidden">
          <div class="absolute inset-0 bg-gradient-to-br from-[#334EAC]/5 to-transparent opacity-0 group-hover/card:opacity-100 transition-opacity duration-500 pointer-events-none"></div>
          <h3 class="text-[17px] font-bold text-slate-900 mb-6 flex items-center gap-3 tracking-tight">
            <span class="w-8 h-8 rounded-lg bg-[#F7F2EB] flex items-center justify-center text-[#081F5C] border border-[#D0E3FF]/50 group-hover/card:scale-110 transition-transform"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"><path d="M12 2v20"/><path d="m17 5-5-3-5 3v14l5 3 5-3Z"/></svg></span>
            Kata Kunci Penting
          </h3>
          
          <div class="flex flex-wrap gap-2.5">
            <span v-for="keyword in summaryData.frequent_keywords" :key="keyword" class="px-3.5 py-1.5 bg-slate-50 hover:bg-[#EDF1F6] text-slate-600 hover:text-[#081F5C] text-[12px] font-bold rounded-lg border border-slate-200/60 shadow-sm transition-colors cursor-pointer">
              {{ keyword }}
            </span>
          </div>
        </div>

        <!-- Rangkuman Materi Belajar -->
        <div v-if="summaryData.detailed_summary" class="card-panel lg:col-span-3 rounded-3xl p-8 transition-all duration-300 ease-out group/card relative overflow-hidden">
          <div class="absolute inset-0 bg-gradient-to-br from-indigo-500/5 to-transparent opacity-0 group-hover/card:opacity-100 transition-opacity duration-500 pointer-events-none"></div>
          <h3 class="text-[17px] font-bold text-slate-900 mb-6 flex items-center gap-3 tracking-tight">
            <span class="w-8 h-8 rounded-lg bg-indigo-50 flex items-center justify-center text-indigo-600 border border-indigo-100/50 group-hover/card:scale-110 transition-transform">
              <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"><path d="M4 19.5v-15A2.5 2.5 0 0 1 6.5 2H20v20H6.5a2.5 2.5 0 0 1-2.5-2.5Z"/><path d="M6 6h10"/><path d="M6 10h10"/><path d="M6 14h10"/></svg>
            </span>
            Rangkuman Materi Belajar
          </h3>
          
          <div class="text-[14.5px] text-slate-600 leading-relaxed space-y-4 whitespace-pre-line bg-slate-50/50 rounded-2xl p-6 border border-slate-200/50">
            {{ summaryData.detailed_summary }}
          </div>
        </div>

        <!-- Simulator Kuis Prediksi AI -->
        <div v-if="summaryData.quiz_set && summaryData.quiz_set.questions && summaryData.quiz_set.questions.length > 0" class="card-panel lg:col-span-3 rounded-3xl p-8 transition-all duration-300 ease-out group/card relative overflow-hidden">
          <div class="absolute inset-0 bg-gradient-to-br from-amber-500/5 to-transparent opacity-0 group-hover/card:opacity-100 transition-opacity duration-500 pointer-events-none"></div>
          
          <div class="flex items-center justify-between mb-6">
            <h3 class="text-[17px] font-bold text-slate-900 flex items-center gap-3 tracking-tight">
              <span class="w-8 h-8 rounded-lg bg-amber-50 flex items-center justify-center text-amber-600 border border-amber-100/50 group-hover/card:scale-110 transition-transform">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"/><path d="m9.09 9a3 3 0 0 1 5.83 1c0 2-3 3-3 3"/><line x1="12" x2="12.01" y2="17"/></svg>
              </span>
              Simulator Kuis Prediksi AI
            </h3>
            <span class="px-3 py-1 bg-amber-100/60 text-amber-800 text-[11px] font-extrabold rounded-lg uppercase tracking-wider border border-amber-200/40">
              Tersedia di Menu Kuis
            </span>
          </div>

          <!-- 1. Start Screen -->
          <div v-if="!simulatorStarted" class="flex flex-col items-center justify-center p-8 bg-slate-50/50 rounded-2xl border border-slate-200/50 text-center">
            <div class="w-16 h-16 bg-gradient-to-br from-[#F7F2EB] to-white flex items-center justify-center text-amber-600 rounded-2xl mb-4 border border-amber-100 shadow-sm">
              <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M12 22c5.523 0 10-4.477 10-10S17.523 2 12 2 2 6.477 2 12s4.477 10 10 10z"/><path d="m9 12 2 2 4-4"/></svg>
            </div>
            <h4 class="text-base font-bold text-slate-800 mb-2">Uji Pemahaman Materi Anda</h4>
            <p class="text-xs md:text-sm text-slate-500 max-w-lg mb-6 leading-relaxed">
              AI telah merumuskan 5 soal prediksi pilihan ganda berdasarkan pola ujian sebelumnya. Kerjakan simulasi ini untuk mengukur kesiapan belajarmu.
            </p>
            <button @click="startSimulator" class="px-6 py-3 bg-[#334EAC] hover:bg-[#081F5C] text-white text-[13px] font-bold rounded-xl shadow-md transition-all active:scale-95 flex items-center gap-2">
              Mulai Simulasi Kuis
              <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"><path d="M5 12h14"/><path d="m12 5 7 7-7 7"/></svg>
            </button>
          </div>

          <!-- 2. Active Screen (Playing) -->
          <div v-else-if="simulatorStarted && !simulatorSubmitted" class="space-y-6">
            <!-- Progress & Score Header -->
            <div class="flex items-center justify-between text-xs font-bold text-slate-400">
              <span>Pertanyaan {{ simulatorCurrentIndex + 1 }} dari {{ summaryData.quiz_set.questions.length }}</span>
              <div class="flex items-center gap-2">
                <span class="w-2.5 h-2.5 rounded-full bg-amber-500 animate-pulse"></span>
                <span class="text-amber-600 font-extrabold">Simulasi Berjalan</span>
              </div>
            </div>

            <!-- Progress Bar -->
            <div class="w-full h-2 bg-slate-100 rounded-full overflow-hidden">
              <div class="h-full bg-gradient-to-r from-amber-500 to-[#334EAC] transition-all duration-300" :style="{ width: ((simulatorCurrentIndex + 1) / summaryData.quiz_set.questions.length) * 100 + '%' }"></div>
            </div>

            <!-- Question & Options Block -->
            <div class="p-6 bg-slate-50/50 rounded-2xl border border-slate-200/50 space-y-6">
              <!-- Question Content -->
              <h4 class="text-base font-extrabold text-slate-800 leading-relaxed">
                {{ summaryData.quiz_set.questions[simulatorCurrentIndex].content }}
              </h4>

              <!-- Options Grid (Single Column) -->
              <div class="space-y-3">
                <button 
                  v-for="(optionText, key) in summaryData.quiz_set.questions[simulatorCurrentIndex].options" 
                  :key="key"
                  @click="selectSimulatorOption(summaryData.quiz_set.questions[simulatorCurrentIndex].id, key)"
                  class="w-full text-left px-5 py-4 rounded-xl border text-[13.5px] font-bold transition-all flex items-center gap-3 active:scale-[0.99] group/opt"
                  :class="simulatorAnswers[summaryData.quiz_set.questions[simulatorCurrentIndex].id] === key
                    ? 'bg-[#334EAC]/10 border-[#334EAC] text-[#334EAC]'
                    : 'bg-white hover:bg-[#EDF1F6]/50 border-slate-200 text-slate-700 hover:text-slate-900'"
                >
                  <span class="w-7 h-7 flex items-center justify-center rounded-lg border text-xs font-extrabold shrink-0"
                    :class="simulatorAnswers[summaryData.quiz_set.questions[simulatorCurrentIndex].id] === key
                      ? 'bg-[#334EAC] text-white border-transparent'
                      : 'bg-slate-50 border-slate-200 text-slate-400 group-hover/opt:border-[#334EAC] group-hover/opt:text-[#334EAC]'"
                  >
                    {{ key }}
                  </span>
                  {{ optionText }}
                </button>
              </div>
            </div>

            <!-- Error Alerts -->
            <div v-if="simulatorError" class="p-4 bg-rose-50 border border-rose-100 text-rose-700 rounded-xl text-xs font-bold flex items-center gap-2">
              <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><circle cx="12" cy="12" r="10"/><line x1="12" y1="8" x2="12" y2="12"/><line x1="12" y1="16" x2="12.01" y2="16"/></svg>
              {{ simulatorError }}
            </div>

            <!-- Navigation Controls -->
            <div class="flex items-center justify-between pt-4 border-t border-slate-100">
              <button 
                @click="prevSimulatorQuestion"
                :disabled="simulatorCurrentIndex === 0"
                class="px-4 py-2 text-[12px] font-bold text-slate-500 hover:text-[#334EAC] transition-all disabled:opacity-40 disabled:hover:text-slate-500 flex items-center gap-1.5"
              >
                <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"><path d="m15 18-6-6 6-6"/></svg>
                Sebelumnya
              </button>

              <div class="flex items-center gap-3">
                <button 
                  v-if="simulatorCurrentIndex < summaryData.quiz_set.questions.length - 1"
                  @click="nextSimulatorQuestion(summaryData.quiz_set.questions.length)"
                  class="px-5 py-2.5 bg-slate-900 hover:bg-slate-800 text-white text-[12px] font-bold rounded-xl shadow-sm transition-all flex items-center gap-1.5"
                >
                  Selanjutnya
                  <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"><path d="m9 18 6-6-6-6"/></svg>
                </button>
                <button 
                  v-else
                  @click="submitSimulator"
                  :disabled="simulatorSubmitting"
                  class="px-6 py-2.5 bg-emerald-600 hover:bg-emerald-700 text-white text-[12px] font-bold rounded-xl shadow-sm transition-all disabled:opacity-50 flex items-center gap-2"
                >
                  <span v-if="simulatorSubmitting" class="w-3.5 h-3.5 border-2 border-white border-t-transparent animate-spin rounded-full"></span>
                  Kirim Jawaban
                </button>
              </div>
            </div>
          </div>

          <!-- 3. Results Screen -->
          <div v-else class="space-y-6 animate-in zoom-in-95 duration-300">
            <!-- Score Overview Card -->
            <div class="flex flex-col md:flex-row md:items-center justify-between gap-6 p-6 bg-slate-50/50 rounded-2xl border border-slate-200/50">
              <div class="flex items-center gap-4">
                <div class="w-16 h-16 rounded-full flex items-center justify-center text-white font-extrabold text-xl shadow-md"
                  :class="simulatorScore >= 75 ? 'bg-emerald-500 shadow-emerald-500/20' : simulatorScore >= 50 ? 'bg-amber-500 shadow-amber-500/20' : 'bg-rose-500 shadow-rose-500/20'"
                >
                  {{ simulatorScore }}
                </div>
                <div>
                  <h4 class="text-base font-extrabold text-slate-800 mb-0.5">Hasil Simulasi Kuis</h4>
                  <p class="text-xs text-slate-400 font-bold uppercase tracking-wider">
                    Benar {{ simulatorCorrectCount }} dari {{ summaryData.quiz_set.questions.length }} soal
                  </p>
                </div>
              </div>

              <div class="flex items-center gap-3">
                <button @click="startSimulator" class="px-4 py-2.5 bg-white border border-slate-200 hover:border-slate-300 rounded-xl text-[12px] font-bold text-slate-700 transition-all shadow-sm">
                  Ulangi Simulasi
                </button>
                <RouterLink :to="`/pelajar/quiz`" class="px-5 py-2.5 bg-[#334EAC] hover:bg-[#081F5C] text-white text-[12px] font-bold rounded-xl shadow-md transition-all flex items-center gap-1.5">
                  Buka Menu Kuis
                  <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"><path d="m9 18 6-6-6-6"/></svg>
                </RouterLink>
              </div>
            </div>

            <!-- Review of Questions -->
            <div class="space-y-4">
              <h5 class="text-xs font-extrabold text-slate-400 uppercase tracking-widest pl-1">Review Jawaban &amp; Pembahasan</h5>

              <div 
                v-for="(question, index) in summaryData.quiz_set.questions" 
                :key="question.id"
                class="p-6 rounded-2xl border text-[13.5px] font-bold space-y-4"
                :class="simulatorAnswers[question.id] === question.correct_answer 
                  ? 'bg-emerald-50/30 border-emerald-200/60' 
                  : 'bg-rose-50/30 border-rose-200/60'"
              >
                <!-- Question Title & Indicator -->
                <div class="flex items-start justify-between gap-4">
                  <span class="text-[#081F5C] leading-relaxed">
                    {{ index + 1 }}. {{ question.content }}
                  </span>
                  <span class="px-2.5 py-1 text-[9.5px] font-extrabold rounded-md uppercase tracking-wider shrink-0"
                    :class="simulatorAnswers[question.id] === question.correct_answer 
                      ? 'bg-emerald-100 text-emerald-800' 
                      : 'bg-rose-100 text-rose-800'"
                  >
                    {{ simulatorAnswers[question.id] === question.correct_answer ? 'Benar' : 'Salah' }}
                  </span>
                </div>

                <!-- Chosen & Correct Option details -->
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4 text-xs font-bold py-2.5 border-y border-dashed border-slate-200">
                  <div class="flex items-center gap-2">
                    <span class="text-slate-400">Jawaban Anda:</span>
                    <span class="px-2 py-0.5 rounded text-[11px]"
                      :class="simulatorAnswers[question.id] === question.correct_answer 
                        ? 'bg-emerald-100 text-emerald-800' 
                        : 'bg-rose-100 text-rose-800'"
                    >
                      Opsi {{ simulatorAnswers[question.id] }}
                    </span>
                  </div>
                  <div class="flex items-center gap-2">
                    <span class="text-slate-400">Jawaban Benar:</span>
                    <span class="px-2 py-0.5 rounded bg-emerald-100 text-emerald-800 text-[11px]">
                      Opsi {{ question.correct_answer }}
                    </span>
                  </div>
                </div>

                <!-- Pembahasan/Explanation -->
                <div class="p-4 bg-slate-50 border border-slate-200/60 rounded-xl space-y-1">
                  <p class="text-[11px] font-extrabold text-slate-400 uppercase tracking-wider">Pembahasan</p>
                  <p class="text-[12.5px] text-slate-600 font-medium leading-relaxed">
                    {{ question.explanation }}
                  </p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      </div>
    </template>
  </div>
</template>

<script setup>
import { ref, onMounted, computed, watch } from 'vue'
import { RouterLink, useRoute } from 'vue-router'
import { aiService } from '@/services/ai.service'
import { forumService } from '@/services/forum.service'
import { quizService } from '@/services/quiz.service'
import { examUploadService } from '@/services/examUpload.service'

const summaryData = ref(null)
const loading = ref(false)
const error = ref(null)
const categories = ref([])
const selectedCategoryId = ref('')
const selectedJurusan = ref('')
const selectedSemester = ref('')
const isAnalyzingNew = ref(false) // flag saat baru saja upload

const analysesList = ref([])
const selectedAnalysis = ref(null)

const getInitials = (name) => {
  if (!name) return '?'
  const parts = name.trim().split(/\s+/)
  if (parts.length === 1) {
    return parts[0].substring(0, 2).toUpperCase()
  }
  return (parts[0][0] + parts[parts.length - 1][0]).toUpperCase()
}

const formatRelativeTime = (dateString) => {
  if (!dateString) return ''
  try {
    const date = new Date(dateString)
    const now = new Date()
    const diffMs = now - date
    const diffSec = Math.floor(diffMs / 1000)
    const diffMin = Math.floor(diffSec / 60)
    const diffHrs = Math.floor(diffMin / 60)
    const diffDays = Math.floor(diffHrs / 24)
    const diffWeeks = Math.floor(diffDays / 7)
    const diffMonths = Math.floor(diffDays / 30)
    const diffYears = Math.floor(diffDays / 365)

    if (diffSec < 60) {
      return 'baru saja'
    } else if (diffMin < 60) {
      return `${diffMin} menit lalu`
    } else if (diffHrs < 24) {
      return `${diffHrs} jam lalu`
    } else if (diffDays < 7) {
      return `${diffDays} hari lalu`
    } else if (diffWeeks < 4) {
      return `${diffWeeks} minggu lalu`
    } else if (diffMonths < 12) {
      return `${diffMonths} bulan lalu`
    } else {
      return `${diffYears} tahun lalu`
    }
  } catch (e) {
    return dateString
  }
}

const route = useRoute()

const filteredCategories = computed(() => {
  return categories.value.filter(c => 
    c.jurusan === selectedJurusan.value && 
    c.semester === selectedSemester.value
  )
})

const fetchCategories = async () => {
  try {
    const data = await forumService.getCategories()
    categories.value = data
    if (filteredCategories.value.length > 0) {
      selectedCategoryId.value = filteredCategories.value[0].id
    }
  } catch (err) {
    console.error('Error fetching categories:', err)
  }
}

watch([selectedJurusan, selectedSemester], () => {
  if (filteredCategories.value.length > 0) {
    selectedCategoryId.value = filteredCategories.value[0].id
  } else {
    selectedCategoryId.value = ''
    summaryData.value = null
    analysesList.value = []
    selectedAnalysis.value = null
  }
})

// Simulator State
const simulatorStarted = ref(false)
const simulatorCurrentIndex = ref(0)
const simulatorAnswers = ref({})
const simulatorSubmitted = ref(false)
const simulatorScore = ref(0)
const simulatorCorrectCount = ref(0)
const simulatorSubmitting = ref(false)
const simulatorError = ref(null)

const startSimulator = () => {
  simulatorStarted.value = true
  simulatorCurrentIndex.value = 0
  simulatorAnswers.value = {}
  simulatorSubmitted.value = false
  simulatorScore.value = 0
  simulatorCorrectCount.value = 0
  simulatorError.value = null
}

const selectSimulatorOption = (questionId, optionLetter) => {
  if (simulatorSubmitted.value) return
  simulatorAnswers.value[questionId] = optionLetter
}

const prevSimulatorQuestion = () => {
  if (simulatorCurrentIndex.value > 0) {
    simulatorCurrentIndex.value--
  }
}

const nextSimulatorQuestion = (questionsCount) => {
  if (simulatorCurrentIndex.value < questionsCount - 1) {
    simulatorCurrentIndex.value++
  }
}

const submitSimulator = async () => {
  const quizSet = summaryData.value?.quiz_set
  if (!quizSet) return
  
  // Periksa apakah semua soal sudah dijawab
  const unanswered = quizSet.questions.filter(q => !simulatorAnswers.value[q.id])
  if (unanswered.length > 0) {
    simulatorError.value = 'Harap jawab semua soal sebelum mengirim!'
    return
  }

  simulatorSubmitting.value = true
  simulatorError.value = null
  try {
    const res = await quizService.submitAttempt(quizSet.id, simulatorAnswers.value)
    simulatorScore.value = res.score
    simulatorCorrectCount.value = res.correct_answers_count
    simulatorSubmitted.value = true
  } catch (err) {
    simulatorError.value = err || 'Gagal mengirimkan jawaban kuis.'
    console.error('Error submitting simulator attempt:', err)
  } finally {
    simulatorSubmitting.value = false
  }
}

const fetchAnalysesList = async () => {
  if (!selectedCategoryId.value) return
  loading.value = true
  error.value = null
  try {
    const data = await examUploadService.getExamUploads({ category_id: selectedCategoryId.value })
    analysesList.value = data || []
  } catch (err) {
    error.value = err || 'Gagal mengambil daftar analisis.'
    console.error('Error fetching analyses list:', err)
  } finally {
    loading.value = false
  }
}

const openAnalysis = async (analysisId) => {
  loading.value = true
  error.value = null
  try {
    const data = await examUploadService.getExamUploadById(analysisId)
    selectedAnalysis.value = data
    
    // Map to summaryData format
    summaryData.value = {
      message: data.ai_analysis?.message || 'Analisis materi selesai.',
      detailed_summary: data.ai_analysis?.detailed_summary || '',
      topics: data.ai_analysis?.topics || [],
      difficulty_distribution: data.ai_analysis?.difficulty_distribution || { easy: '0%', medium: '0%', hard: '0%' },
      frequent_keywords: data.ai_analysis?.frequent_keywords || [],
      recommendations: data.ai_analysis?.recommendations || [],
      quiz_set: data.quiz_set || null
    }
    // Reset simulator
    startSimulator()
  } catch (err) {
    error.value = err || 'Gagal memuat detail analisis.'
    console.error(err)
  } finally {
    loading.value = false
  }
}

const backToList = () => {
  selectedAnalysis.value = null
  summaryData.value = null
  fetchAnalysesList()
}

// Keep fetchSummary fallback for compatibility
const fetchSummary = async () => {
  if (selectedAnalysis.value) {
    await openAnalysis(selectedAnalysis.value.id)
  } else {
    await fetchAnalysesList()
  }
}

watch(selectedCategoryId, () => {
  selectedAnalysis.value = null
  summaryData.value = null
  fetchAnalysesList()
  // Reset simulator
  simulatorStarted.value = false
  simulatorCurrentIndex.value = 0
  simulatorAnswers.value = {}
  simulatorSubmitted.value = false
  simulatorScore.value = 0
  simulatorCorrectCount.value = 0
  simulatorSubmitting.value = false
  simulatorError.value = null
})

onMounted(async () => {
  await fetchCategories()

  // Jika redirect dari halaman upload (ada query params), pre-fill filter
  if (route.query.category_id) {
    isAnalyzingNew.value = true
    selectedJurusan.value = route.query.jurusan || ''
    selectedSemester.value = route.query.semester ? Number(route.query.semester) : ''
    selectedCategoryId.value = Number(route.query.category_id)
    
    // Tunggu kategori diset lalu fetch list
    await fetchAnalysesList()
    
    // Dan otomatis buka analisis terbaru yang baru saja diunggah
    if (analysesList.value.length > 0) {
      await openAnalysis(analysesList.value[0].id)
    }
  } else {
    if (selectedCategoryId.value) {
      await fetchAnalysesList()
    }
  }
})

const getFrequencyPercent = (frequency) => {
  const f = (frequency || '').toLowerCase()
  if (f === 'tinggi') return 85
  if (f === 'sedang') return 60
  if (f === 'rendah') return 35
  return 50 // default fallback
}

const barColors = ['bg-[#334EAC]', 'bg-[#7096D1]', 'bg-[#BAD6EB]', 'bg-slate-300']
const getBarColor = (index) => barColors[index % barColors.length]

const parsePercent = (val) => {
  if (!val) return 0
  return parseFloat(val.toString().replace('%', '')) || 0
}

const difficultyValues = computed(() => {
  const dist = summaryData.value?.difficulty_distribution || { easy: '0%', medium: '0%', hard: '0%' }
  const easy = parsePercent(dist.easy)
  const medium = parsePercent(dist.medium)
  const hard = parsePercent(dist.hard)
  return {
    easy,
    medium,
    hard,
    easyOffset: -(hard + medium),
    mediumOffset: -hard
  }
})

const parseRecommendation = (rec) => {
  if (!rec) return { title: '', desc: '' }
  const parts = rec.split(':')
  if (parts.length > 1) {
    return {
      title: parts[0].trim(),
      desc: parts.slice(1).join(':').trim()
    }
  }
  return {
    title: rec,
    desc: ''
  }
}


</script>

<style scoped>
/* AI Analyzer Specific Adjustments */
.ai-analyzer-hero {
  background: linear-gradient(135deg, #081F5C 0%, #0e2370 60%, #1a3aa8 100%);
  box-shadow: inset 0 0 40px rgba(112,150,209,0.2), 0 10px 40px rgba(8,31,92,0.15);
}
.ai-hero-icon {
  background: rgba(255,255,255,0.1);
  border: 1px solid rgba(255,255,255,0.2);
  box-shadow: 0 0 15px rgba(255,255,255,0.2);
  animation: ai-icon-pulse 3s infinite;
}
@keyframes ai-icon-pulse {
  0% { box-shadow: 0 0 10px rgba(255,255,255,0.1); }
  50% { box-shadow: 0 0 15px rgba(255,255,255,0.25); }
  100% { box-shadow: 0 0 10px rgba(255,255,255,0.1); }
}
.upload-zone {
  background: linear-gradient(135deg, rgba(255,255,255,0.6), rgba(237,241,246,0.5));
  border: 2px dashed rgba(112,150,209,0.4);
  transition: all 0.3s ease;
}
.upload-zone:hover {
  background: rgba(255,255,255,0.9);
  border-color: #334EAC;
}
</style>
