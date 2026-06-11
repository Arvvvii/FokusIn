<template>
  <!-- Loading State -->
  <div v-if="loading" class="space-y-8 animate-pulse opacity-70">
    <div class="mb-6 flex items-center gap-2">
      <div class="h-8 bg-slate-200 rounded w-32"></div>
    </div>
    <div class="bg-white rounded-3xl p-8 md:p-12 border border-slate-100 flex flex-col lg:flex-row gap-8 items-start lg:items-center">
      <div class="w-20 h-20 rounded-2xl bg-slate-200 shrink-0"></div>
      <div class="flex-1 space-y-4 w-full">
        <div class="h-4 bg-slate-200 rounded w-1/4"></div>
        <div class="h-8 bg-slate-200 rounded w-3/4"></div>
        <div class="h-4 bg-slate-200 rounded w-1/2"></div>
      </div>
    </div>
    <div class="flex flex-col xl:flex-row gap-8">
      <div class="w-full xl:w-[65%] space-y-8">
        <div class="bg-white rounded-3xl p-8 border border-slate-100 h-48"></div>
        <div class="bg-white rounded-3xl p-8 border border-slate-100 h-96"></div>
      </div>
      <div class="w-full xl:w-[35%] space-y-6">
        <div class="bg-white rounded-3xl p-8 border border-slate-100 h-64"></div>
        <div class="bg-white rounded-3xl p-8 border border-slate-100 h-64"></div>
      </div>
    </div>
  </div>

  <!-- Error State -->
  <div v-else-if="error" class="py-12 flex flex-col items-center justify-center bg-rose-50/50 border border-rose-100 rounded-3xl p-8 my-8">
    <div class="w-16 h-16 rounded-full bg-rose-100 text-rose-600 flex items-center justify-center mb-4">
      <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
        <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" />
      </svg>
    </div>
    <h3 class="text-lg font-bold text-rose-950 mb-2">Gagal Memuat Detail Materi</h3>
    <p class="text-sm text-rose-800 text-center max-w-md mb-6">{{ error }}</p>
    <button @click="fetchMaterial" class="px-6 py-2.5 bg-[#334EAC] hover:bg-[#081F5C] text-white rounded-xl font-bold text-xs shadow-sm transition-all active:scale-95">
      Coba Lagi
    </button>
  </div>

  <!-- Not Found State -->
  <div v-else-if="!material" class="py-12 flex flex-col items-center justify-center bg-slate-50 border border-slate-100 rounded-3xl p-8 my-8">
    <h3 class="text-lg font-bold text-slate-800 mb-2">Materi Tidak Ditemukan</h3>
    <p class="text-sm text-slate-500 text-center max-w-md mb-6">Materi akademik yang Anda cari tidak dapat ditemukan atau telah dihapus.</p>
    <RouterLink :to="baseMaterialsRoute" class="px-6 py-2.5 bg-[#334EAC] text-white rounded-xl font-bold text-xs shadow-sm transition-all active:scale-95">
      Kembali ke Materi
    </RouterLink>
  </div>

  <!-- Main Content -->
  <div v-else class="space-y-8 animate-in fade-in duration-500 min-w-0">
    
    <!-- 1. Back Navigation -->
    <div class="mb-6 flex items-center gap-2">
      <RouterLink
        :to="baseMaterialsRoute"
        class="text-sm font-bold text-slate-400 hover:text-[#334EAC] transition-colors flex items-center gap-1 w-fit bg-white/50 px-3 py-1.5 rounded-lg border border-slate-200/50"
      >
        ← Kembali ke Materi
      </RouterLink>
    </div>

    <!-- 2. Hero / Header Section -->
    <div 
      :class="[
        route.path.startsWith('/tutor') 
          ? 'bg-white border border-slate-200 shadow-sm rounded-2xl p-7 md:p-8 flex flex-col lg:flex-row gap-8 items-start lg:items-center min-w-0 mb-8 relative overflow-hidden' 
          : 'bg-white/80 backdrop-blur-xl rounded-3xl p-8 md:p-12 shadow-[0_10px_40px_rgba(15,23,42,0.06)] border border-slate-100 mb-8 relative overflow-hidden flex flex-col lg:flex-row gap-8 items-start lg:items-center min-w-0 transition-all duration-300 ease-out hover:shadow-xl group/card'
      ]"
    >
      <div 
        :class="[
          route.path.startsWith('/tutor')
            ? 'absolute right-0 top-0 w-1/3 h-full bg-gradient-to-l from-[#EDF1F6]/50 to-transparent pointer-events-none'
            : 'absolute top-0 right-0 w-64 h-64 bg-[#7096D1] rounded-full blur-3xl opacity-10 pointer-events-none -translate-y-1/2 translate-x-1/4'
        ]"
      ></div>
      
      <!-- Icon/Badge -->
      <div v-if="materialType === 'pdf'" class="w-20 h-20 rounded-2xl bg-rose-50 flex items-center justify-center text-rose-500 shrink-0 border border-rose-100/60 shadow-sm relative z-10">
        <svg xmlns="http://www.w3.org/2000/svg" width="36" height="36" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"><path d="M14.5 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V7.5L14.5 2z"/><polyline points="14 2 14 8 20 8"/></svg>
      </div>
      <div v-else-if="materialType === 'docx'" class="w-20 h-20 rounded-2xl bg-sky-50 flex items-center justify-center text-[#0EA5E9] shrink-0 border border-sky-100/60 shadow-sm relative z-10">
        <svg xmlns="http://www.w3.org/2000/svg" width="36" height="36" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"><path d="M14.5 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V7.5L14.5 2z"/><polyline points="14 2 14 8 20 8"/></svg>
      </div>
      <div v-else-if="materialType === 'video'" class="w-20 h-20 rounded-2xl bg-emerald-50 flex items-center justify-center text-emerald-500 shrink-0 border border-emerald-100/60 shadow-sm relative z-10">
        <svg xmlns="http://www.w3.org/2000/svg" width="36" height="36" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"><polygon points="5 3 19 12 5 21 5 3"/></svg>
      </div>

      <div class="flex-1 relative z-10 min-w-0">
        <div class="flex flex-wrap gap-2 mb-4">
          <span class="px-3 py-1 bg-[#EDF1F6] text-[#334EAC] text-[10px] font-bold uppercase tracking-widest rounded-md border border-[#BAD6EB]">
            {{ material.category?.name || 'Subjek' }}
          </span>
          <span class="px-3 py-1 bg-white text-slate-500 text-[10px] font-bold uppercase tracking-widest rounded-md border border-slate-200">
            Materi Pembelajaran
          </span>
        </div>
        <h1 
          :class="[
            route.path.startsWith('/tutor')
              ? 'text-2xl font-extrabold text-[#081F5C] tracking-tight leading-tight'
              : 'text-3xl md:text-4xl font-extrabold text-slate-900 tracking-tight leading-tight'
          ]"
        >
          {{ material.title }}
        </h1>
        
        <div class="flex flex-wrap items-center gap-6 text-[13px] font-bold text-slate-500 mt-4">
          <div class="flex items-center gap-2">
            <div class="w-7 h-7 rounded-full bg-[#EDF1F6] flex items-center justify-center font-bold text-[#081F5C] text-[10px] border border-slate-200">
              {{ getInitials(material.user?.name) }}
            </div>
            <span class="text-[#081F5C]">{{ material.user?.name || 'Tutor' }}</span>
          </div>
          <div class="flex items-center gap-1.5">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><rect width="18" height="18" x="3" y="4" rx="2" ry="2"/><line x1="16" x2="16" y1="2" y2="6"/><line x1="8" x2="8" y1="2" y2="6"/><line x1="3" x2="21" y1="10" y2="10"/></svg>
            {{ formatDate(material.created_at) }}
          </div>
          <div v-if="materialType !== 'video'" class="flex items-center gap-1.5">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M14.5 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V7.5L14.5 2z"/><polyline points="14 2 14 8 20 8"/></svg>
            Format: {{ materialType.toUpperCase() }}
          </div>
        </div>
      </div>

      <div class="flex flex-col sm:flex-row lg:flex-col gap-3 w-full lg:w-auto relative z-10 shrink-0">
        <button v-if="materialType !== 'video'" @click="downloadFile" class="w-full lg:w-48 py-4 bg-[#334EAC] hover:bg-[#081F5C] text-white rounded-2xl font-bold text-[15px] transition-all shadow-[0_4px_15px_rgba(51,78,172,0.15)] active:scale-95 flex items-center justify-center gap-2">
          <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"><path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"/><polyline points="7 10 12 15 17 10"/><line x1="12" x2="12" y1="15" y2="3"/></svg>
          Unduh Berkas
        </button>
        <button v-else @click="scrollToVideo" class="w-full lg:w-48 py-4 bg-[#334EAC] hover:bg-[#081F5C] text-white rounded-2xl font-bold text-[15px] transition-all shadow-[0_4px_15px_rgba(51,78,172,0.15)] active:scale-95 flex items-center justify-center gap-2">
          <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"><polygon points="5 3 19 12 5 21 5 3"/></svg>
          Tonton Video
        </button>
        <div class="flex gap-3 w-full lg:w-48">
          <button class="flex-1 py-3.5 bg-white border border-slate-200 hover:border-[#334EAC] text-slate-500 hover:text-[#334EAC] rounded-2xl font-bold text-[14px] transition-colors active:scale-95 flex items-center justify-center gap-2">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="m19 21-7-4-7 4V5a2 2 0 0 1 2-2h10a2 2 0 0 1 2 2v16z"/></svg>
          </button>
          <button class="flex-1 py-3.5 bg-white border border-slate-200 hover:border-[#334EAC] text-slate-500 hover:text-[#334EAC] rounded-2xl font-bold text-[14px] transition-colors active:scale-95 flex items-center justify-center gap-2">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><circle cx="18" cy="5" r="3"/><circle cx="6" cy="12" r="3"/><circle cx="18" cy="19" r="3"/><line x1="8.59" x2="15.42" y1="13.51" y2="17.49"/><line x1="15.41" x2="8.59" y1="6.51" y2="10.49"/></svg>
          </button>
        </div>
      </div>
    </div>

    <!-- Main Grid Content -->
    <div class="flex flex-col xl:flex-row gap-8 min-w-0">
      
      <!-- Left Panel: Content & Preview -->
      <div class="w-full xl:w-[65%] space-y-8 min-w-0">
        
        <!-- Description -->
        <div class="bg-white/80 backdrop-blur-xl rounded-3xl p-8 shadow-[0_10px_40px_rgba(15,23,42,0.06)] border border-slate-100 transition-all duration-300 ease-out hover:shadow-xl group/card">
          <h3 class="text-[17px] font-bold text-slate-900 mb-4 tracking-tight">Deskripsi</h3>
          <div class="prose prose-slate prose-p:text-[14px] prose-p:font-medium prose-p:leading-relaxed prose-p:text-slate-500 max-w-none space-y-3">
            <p>Materi pembelajaran yang berjudul <strong>"{{ material.title }}"</strong> ini diunggah oleh tutor terverifikasi FokusIn untuk membantu pelajar mempelajari materi akademik dengan lebih mendalam.</p>
            <p>Sangat cocok untuk belajar mandiri, persiapan ujian, dan memperkuat konsep fundamental pada subjek <strong>{{ material.category?.name || 'Materi' }}</strong>. Anda dapat melihat preview berkas, mengunduh file secara utuh, atau langsung menonton materi video jika format pendukungnya tersedia.</p>
          </div>
        </div>

        <!-- Document Preview Area for PDF -->
        <div v-if="materialType === 'pdf'" class="bg-slate-50/80 backdrop-blur-xl rounded-3xl p-4 shadow-[inset_0_4px_24px_rgba(0,0,0,0.02)] border border-slate-200 h-[550px] flex flex-col relative overflow-hidden">
          <div class="flex items-center justify-between p-3 bg-white/80 backdrop-blur-md rounded-2xl border border-slate-200 shadow-sm mb-4">
            <div class="flex items-center gap-2 text-slate-500">
              <span class="text-[12px] font-bold">Pratinjau PDF Dokumen</span>
            </div>
            <div class="flex items-center gap-2 text-slate-500">
              <button @click="downloadFile" class="text-xs font-bold text-[#334EAC] hover:text-[#081F5C] transition-colors">Buka Tab Baru →</button>
            </div>
          </div>

          <div class="flex-1 bg-white border border-slate-200 shadow-sm rounded-xl flex items-center justify-center text-slate-400 p-8 overflow-y-auto">
            <!-- Simulated PDF Content or direct URL preview if available -->
            <div class="w-full h-full max-w-2xl mx-auto space-y-6 blur-[1px] opacity-70">
              <div class="h-12 bg-slate-200 rounded w-3/4 mx-auto"></div>
              <div class="h-4 bg-slate-100 rounded w-1/4 mx-auto mb-10"></div>
              <div class="space-y-3">
                <div class="h-4 bg-slate-100 rounded w-full"></div>
                <div class="h-4 bg-slate-100 rounded w-full"></div>
                <div class="h-4 bg-slate-100 rounded w-5/6"></div>
              </div>
              <div class="h-32 bg-slate-100 rounded w-full my-8"></div>
              <div class="space-y-3">
                <div class="h-4 bg-slate-100 rounded w-full"></div>
                <div class="h-4 bg-slate-100 rounded w-4/6"></div>
              </div>
            </div>
            
            <div class="absolute inset-0 bg-gradient-to-t from-white via-white/80 to-transparent flex flex-col items-center justify-end pb-12">
              <button @click="downloadFile" class="px-6 py-3.5 bg-white border border-slate-200 hover:border-[#334EAC] text-[#081F5C] hover:text-[#334EAC] shadow-lg rounded-2xl font-bold text-[14px] transition-all flex items-center gap-2">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"/><polyline points="7 10 12 15 17 10"/><line x1="12" x2="12" y1="15" y2="3"/></svg>
                Unduh untuk Baca Penuh
              </button>
            </div>
          </div>
        </div>

        <!-- Document Preview Area for DOCX -->
        <div v-else-if="materialType === 'docx'" class="bg-slate-50/80 backdrop-blur-xl rounded-3xl p-4 shadow-[inset_0_4px_24px_rgba(0,0,0,0.02)] border border-slate-200 h-[400px] flex flex-col relative overflow-hidden">
          <div class="flex-1 bg-white border border-slate-200 shadow-sm rounded-2xl flex flex-col items-center justify-center text-slate-400 p-8">
            <svg xmlns="http://www.w3.org/2000/svg" width="64" height="64" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="text-sky-400 mb-4"><path d="M14.5 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V7.5L14.5 2z"/><polyline points="14 2 14 8 20 8"/></svg>
            <h4 class="text-slate-800 font-bold text-base mb-2">Dokumen Word (DOCX)</h4>
            <p class="text-slate-500 text-sm text-center max-w-md mb-6">Materi ini menggunakan format dokumen Word. Anda dapat langsung mengunduh file ini untuk membacanya secara lengkap.</p>
            <button @click="downloadFile" class="px-6 py-3 bg-[#334EAC] hover:bg-[#081F5C] text-white shadow-md rounded-xl font-bold text-sm transition-all flex items-center gap-2 active:scale-95">
              <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"/><polyline points="7 10 12 15 17 10"/><line x1="12" x2="12" y1="15" y2="3"/></svg>
              Unduh Dokumen
            </button>
          </div>
        </div>

        <!-- Video Player Layout -->
        <div ref="videoPlayerContainer" v-else-if="materialType === 'video'" class="bg-[#081F5C] rounded-3xl p-2 md:p-4 shadow-[0_15px_40px_rgba(8,31,92,0.15)] flex flex-col transition-all duration-300 ease-out hover:shadow-2xl">
          <div class="relative w-full aspect-video bg-black rounded-2xl overflow-hidden flex items-center justify-center">
            <!-- Native HTML5 video player -->
            <video :src="material.file_url" controls class="w-full h-full object-contain rounded-2xl"></video>
          </div>
        </div>

      </div>

      <!-- Right Panel: AI & Related -->
      <div class="w-full xl:w-[35%] shrink-0 space-y-6 min-w-0">
        
        <!-- AI Summary Widget -->
        <div class="bg-gradient-to-br from-[#334EAC] to-[#081F5C] rounded-3xl p-8 shadow-lg relative overflow-hidden transition-all duration-300 ease-out hover:shadow-xl group/card">
          <div class="absolute top-0 right-0 w-32 h-32 bg-white/10 rounded-full blur-2xl pointer-events-none -translate-y-1/2 translate-x-1/3"></div>
          
          <h3 class="text-[15px] font-bold text-white mb-4 flex items-center gap-2 relative z-10 tracking-tight">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M12 2v4"/><path d="M12 18v4"/><path d="M4.93 4.93l2.83 2.83"/><path d="M16.24 16.24l2.83 2.83"/><path d="M2 12h4"/><path d="M18 12h4"/><path d="M4.93 19.07l2.83-2.83"/><path d="M16.24 7.76l2.83-2.83"/></svg>
            Ringkasan Dokumen AI
          </h3>

          <div class="bg-white/10 backdrop-blur-sm rounded-[1.25rem] p-5 border border-white/20 relative z-10">
            <ul class="space-y-3">
              <li class="flex items-start gap-2 text-[12px] font-medium text-[#BAD6EB]">
                <div class="w-1.5 h-1.5 rounded-full bg-white mt-1.5 shrink-0"></div>
                <span class="leading-relaxed">Materi ini berfokus penuh pada subjek <strong>{{ material.category?.name || 'Akademik' }}</strong>.</span>
              </li>
              <li class="flex items-start gap-2 text-[12px] font-medium text-[#BAD6EB]">
                <div class="w-1.5 h-1.5 rounded-full bg-white mt-1.5 shrink-0"></div>
                <span class="leading-relaxed">Disajikan dengan pembahasan detail dan struktur yang sistematis.</span>
              </li>
              <li class="flex items-start gap-2 text-[12px] font-medium text-[#BAD6EB]">
                <div class="w-1.5 h-1.5 rounded-full bg-white mt-1.5 shrink-0"></div>
                <span class="leading-relaxed">Direkomendasikan untuk menunjang proses pembelajaran mandiri secara optimal.</span>
              </li>
            </ul>
          </div>
        </div>

        <!-- Related Materials -->
        <div class="bg-white/80 backdrop-blur-xl rounded-3xl p-6 shadow-[0_10px_40px_rgba(15,23,42,0.06)] border border-slate-100 transition-all duration-300 ease-out hover:shadow-xl group/card">
          <h3 class="text-[15px] font-bold text-slate-900 tracking-tight mb-5">Materi Terkait</h3>
          
          <div class="space-y-4">
            <div v-if="relatedMaterials.length === 0" class="text-xs text-slate-400 font-bold py-4 text-center">
              Tidak ada materi terkait lainnya.
            </div>
            
            <!-- Dynamic Items -->
            <RouterLink 
              v-else
              v-for="rel in relatedMaterials" 
              :key="rel.id"
              :to="`${baseMaterialsRoute}/${rel.id}`" 
              class="flex gap-4 group p-3 -m-3 rounded-2xl hover:bg-[#EDF1F6] transition-colors"
            >
              <div 
                :class="[
                  'w-12 h-12 rounded-xl flex items-center justify-center shrink-0 border border-slate-200/60',
                  getFileType(rel.file_url) === 'pdf' ? 'bg-rose-50 text-rose-500' :
                  getFileType(rel.file_url) === 'docx' ? 'bg-sky-50 text-sky-500' : 'bg-emerald-50 text-emerald-500'
                ]"
              >
                <svg v-if="getFileType(rel.file_url) !== 'video'" xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M14.5 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V7.5L14.5 2z"/><polyline points="14 2 14 8 20 8"/></svg>
                <svg v-else xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polygon points="5 3 19 12 5 21 5 3"/></svg>
              </div>
              <div class="min-w-0 flex-1">
                <h4 class="text-[13px] font-bold text-slate-900 truncate group-hover:text-[#334EAC] transition-colors">
                  {{ rel.title }}
                </h4>
                <p class="text-[11px] font-bold text-slate-400 mt-1">
                  {{ rel.category?.name || 'Materi' }}
                </p>
              </div>
            </RouterLink>
          </div>
          
          <RouterLink :to="baseMaterialsRoute" class="mt-6 block text-center text-[12px] font-bold text-[#334EAC] hover:text-slate-900 transition-colors">
            Lihat Semua Materi
          </RouterLink>
        </div>

      </div>
    </div>
  </div>
</template>

<script setup>
import { ref, computed, onMounted, watch } from 'vue'
import { RouterLink, useRoute } from 'vue-router'
import { materialService } from '@/services/material.service'

const route = useRoute()
const baseMaterialsRoute = computed(() => {
  return route.path.startsWith('/tutor') ? '/tutor/materials' : '/pelajar/materials'
})

const loading = ref(true)
const error = ref(null)
const material = ref(null)
const relatedMaterials = ref([])
const videoPlayerContainer = ref(null)

const materialType = computed(() => {
  if (!material.value || !material.value.file_url) return 'pdf'
  return getFileType(material.value.file_url)
})

const getFileType = (fileUrl) => {
  if (!fileUrl) return 'pdf'
  const ext = fileUrl.split('.').pop().toLowerCase()
  if (ext === 'pdf') return 'pdf'
  if (ext === 'docx' || ext === 'doc') return 'docx'
  if (['mp4', 'mkv', 'avi', 'mov', 'webm'].includes(ext)) return 'video'
  return 'pdf'
}

const getInitials = (name) => {
  if (!name) return 'U'
  return name.split(' ').map(n => n[0]).join('').substring(0, 2).toUpperCase()
}

const formatDate = (dateStr) => {
  if (!dateStr) return '-'
  const date = new Date(dateStr)
  return date.toLocaleDateString('id-ID', {
    day: 'numeric',
    month: 'short',
    year: 'numeric'
  })
}

const fetchMaterial = async () => {
  loading.value = true
  error.value = null
  const id = route.params.id
  try {
    const res = await materialService.getMaterialById(id)
    material.value = res
    if (res && res.category_id) {
      await fetchRelatedMaterials(res.category_id)
    }
  } catch (err) {
    console.error('Gagal mengambil detail materi:', err)
    error.value = err
  } finally {
    loading.value = false
  }
}

const fetchRelatedMaterials = async (currentCatId) => {
  try {
    const res = await materialService.getMaterials()
    const list = res.data || []
    relatedMaterials.value = list
      .filter(m => String(m.id) !== String(route.params.id) && String(m.category_id) === String(currentCatId))
      .slice(0, 2)
    
    if (relatedMaterials.value.length < 2) {
      const others = list.filter(m => String(m.id) !== String(route.params.id) && String(m.category_id) !== String(currentCatId))
      relatedMaterials.value = [...relatedMaterials.value, ...others].slice(0, 2)
    }
  } catch (err) {
    console.error('Gagal mengambil materi terkait:', err)
  }
}

const downloadFile = () => {
  if (material.value && material.value.file_url) {
    window.open(material.value.file_url, '_blank')
  }
}

const scrollToVideo = () => {
  if (videoPlayerContainer.value) {
    videoPlayerContainer.value.scrollIntoView({ behavior: 'smooth' })
  }
}

onMounted(() => {
  fetchMaterial()
})

// Watch route changes to load new materials (especially when clicking related materials)
watch(
  () => route.params.id,
  (newId) => {
    if (newId) {
      fetchMaterial()
    }
  }
)
</script>

<style scoped>
/* Scoped adjustments for premium feel */
.prose strong {
  color: #081F5C;
}
</style>

