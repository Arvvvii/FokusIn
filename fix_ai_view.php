<?php
// Fix AIAnalyzerView.vue to have a clean 2-row layout
$file = __DIR__ . '/frontend/src/pages/pelajar/AIAnalyzerView.vue';
$content = file_get_contents($file);

// Step 1: Fix the outer div class (remove flex row crowding)
$content = str_replace(
    'class="page-header-banner p-6 md:p-8 flex flex-col md:flex-row md:items-center justify-between gap-6 mb-8 relative"',
    'class="page-header-banner p-6 md:p-8 mb-2 relative"',
    $content
);

// Step 2: Replace the old title+icon wrapper (flex row, no separation from filters)
$content = str_replace(
    '<div class="relative z-10 flex items-center gap-4">',
    '<div class="relative z-10 flex flex-col sm:flex-row sm:items-center justify-between gap-4 mb-6"><div class="flex items-center gap-4">',
    $content
);

// Step 3: Close the inner title div and add a RouterLink for "Analisis Baru" before the filter bar
$content = str_replace(
    '</p>
        </div>
      </div>

      <!-- Primary CTA -->
      <div class="relative z-10 flex flex-col lg:flex-row shrink-0 w-full lg:w-auto gap-3 items-center mt-4 md:mt-0">',
    '</p>
          </div>
        </div>
        <RouterLink to="/pelajar/ai-analyzer/create" class="btn-solid shrink-0 px-5 py-2.5 flex items-center gap-2 self-start sm:self-center">
          <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"/><polyline points="17 8 12 3 7 8"/><line x1="12" x2="12" y1="3" y2="15"/></svg>
          Analisis Baru
        </RouterLink>
      </div>

      <!-- Filter Bar Row (3-column grid) -->
      <div class="relative z-10 grid grid-cols-1 sm:grid-cols-3 gap-3">',
    $content
);

// Step 4: Fix Jurusan dropdown label + wrapper
$content = str_replace(
    '<!-- Jurusan Dropdown -->
        <div class="relative w-full lg:w-auto min-w-[180px]">
          <select v-model="selectedJurusan" class="w-full px-4 py-2.5 bg-white border border-slate-200 rounded-xl text-[13px] font-bold text-slate-800 focus:outline-none focus:border-[#334EAC] focus:ring-4 focus:ring-[#334EAC]/10 transition-all appearance-none cursor-pointer">
            <option value="">Pilih Jurusan</option>
            <option value="Teknologi Rekayasa Instrumentasi dan Kontrol (TRIK)">TRIK</option>
            <option value="Kearsipan dan Informasi Digital (KID)">KID</option>
            <option value="Teknik Informatika">Teknik Informatika</option>
          </select>
          <div class="absolute inset-y-0 right-0 pr-3 flex items-center pointer-events-none text-slate-400">
            <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"><path d="m6 9 6 6 6-6"/></svg>
          </div>
        </div>',
    '<!-- Jurusan -->
        <div class="space-y-1.5">
          <label class="text-[10px] font-extrabold text-slate-400 uppercase tracking-widest ml-1">Jurusan</label>
          <div class="relative">
            <select v-model="selectedJurusan" @change="selectedSemester = \'\'; selectedCategoryId = \'\'" class="w-full px-4 py-2.5 bg-white border border-slate-200 rounded-xl text-[13px] font-bold text-slate-800 focus:outline-none focus:border-[#334EAC] focus:ring-4 focus:ring-[#334EAC]/10 transition-all appearance-none cursor-pointer">
              <option value="">— Pilih Jurusan —</option>
              <option value="Teknologi Rekayasa Instrumentasi dan Kontrol (TRIK)">Teknologi Rekayasa Instrumentasi &amp; Kontrol (TRIK)</option>
              <option value="Kearsipan dan Informasi Digital (KID)">Kearsipan dan Informasi Digital (KID)</option>
              <option value="Teknik Informatika">Teknik Informatika</option>
            </select>
            <div class="absolute inset-y-0 right-0 pr-3 flex items-center pointer-events-none text-slate-400">
              <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"><path d="m6 9 6 6 6-6"/></svg>
            </div>
          </div>
        </div>',
    $content
);

// Step 5: Fix Semester dropdown label + wrapper
$content = str_replace(
    '<!-- Semester Dropdown -->
        <div class="relative w-full lg:w-auto min-w-[150px]">
          <select v-model="selectedSemester" :disabled="!selectedJurusan" class="w-full px-4 py-2.5 bg-white border border-slate-200 rounded-xl text-[13px] font-bold text-slate-800 focus:outline-none focus:border-[#334EAC] focus:ring-4 focus:ring-[#334EAC]/10 transition-all appearance-none cursor-pointer disabled:opacity-50 disabled:cursor-not-allowed">
            <option value="">Pilih Semester</option>
            <option v-for="i in 6" :key="i" :value="i">Semester {{ i }}</option>
          </select>
          <div class="absolute inset-y-0 right-0 pr-3 flex items-center pointer-events-none text-slate-400">
            <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"><path d="m6 9 6 6 6-6"/></svg>
          </div>
        </div>',
    '<!-- Semester -->
        <div class="space-y-1.5">
          <label class="text-[10px] font-extrabold uppercase tracking-widest ml-1 transition-colors" :class="selectedJurusan ? \'text-slate-400\' : \'text-slate-200\'">Semester</label>
          <div class="relative">
            <select v-model="selectedSemester" :disabled="!selectedJurusan" @change="selectedCategoryId = \'\'" class="w-full px-4 py-2.5 bg-white border border-slate-200 rounded-xl text-[13px] font-bold text-slate-800 focus:outline-none focus:border-[#334EAC] focus:ring-4 focus:ring-[#334EAC]/10 transition-all appearance-none cursor-pointer disabled:opacity-40 disabled:cursor-not-allowed disabled:bg-slate-50">
              <option value="">— Pilih Semester —</option>
              <option v-for="i in 6" :key="i" :value="i">Semester {{ i }}</option>
            </select>
            <div class="absolute inset-y-0 right-0 pr-3 flex items-center pointer-events-none text-slate-400">
              <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"><path d="m6 9 6 6 6-6"/></svg>
            </div>
          </div>
        </div>',
    $content
);

// Step 6: Fix Mata Kuliah dropdown label + wrapper + remove old RouterLink
$content = str_replace(
    '<!-- Mata Kuliah Dropdown -->
        <div class="relative w-full lg:w-auto min-w-[180px]">
          <select v-model="selectedCategoryId" :disabled="!selectedSemester" class="w-full px-4 py-2.5 bg-white border border-slate-200 rounded-xl text-[13px] font-bold text-slate-800 focus:outline-none focus:border-[#334EAC] focus:ring-4 focus:ring-[#334EAC]/10 transition-all appearance-none cursor-pointer disabled:opacity-50 disabled:cursor-not-allowed">
            <option value="" disabled>Pilih Mata Kuliah</option>
            <option v-for="cat in filteredCategories" :key="cat.id" :value="cat.id">{{ cat.name }}</option>
          </select>
          <div class="absolute inset-y-0 right-0 pr-3 flex items-center pointer-events-none text-slate-400">
            <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"><path d="m6 9 6 6 6-6"/></svg>
          </div>
        </div>

        <RouterLink to="/pelajar/ai-analyzer/create" class="btn-solid w-full lg:w-auto px-5 py-2.5 flex items-center justify-center gap-2">
          <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"/><polyline points="17 8 12 3 7 8"/><line x1="12" x2="12" y1="3" y2="15"/></svg>
          Analisis Baru
        </RouterLink>
      </div>',
    '<!-- Mata Kuliah -->
        <div class="space-y-1.5">
          <label class="text-[10px] font-extrabold uppercase tracking-widest ml-1 transition-colors" :class="selectedSemester ? \'text-slate-400\' : \'text-slate-200\'">Mata Kuliah</label>
          <div class="relative">
            <select v-model="selectedCategoryId" :disabled="!selectedSemester" class="w-full px-4 py-2.5 bg-white border border-slate-200 rounded-xl text-[13px] font-bold text-slate-800 focus:outline-none focus:border-[#334EAC] focus:ring-4 focus:ring-[#334EAC]/10 transition-all appearance-none cursor-pointer disabled:opacity-40 disabled:cursor-not-allowed disabled:bg-slate-50">
              <option value="" disabled>— Pilih Mata Kuliah —</option>
              <option v-for="cat in filteredCategories" :key="cat.id" :value="cat.id">{{ cat.name }}</option>
            </select>
            <div class="absolute inset-y-0 right-0 pr-3 flex items-center pointer-events-none text-slate-400">
              <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"><path d="m6 9 6 6 6-6"/></svg>
            </div>
          </div>
        </div>
      </div>',
    $content
);

file_put_contents($file, $content);
echo "Done! File length: " . strlen($content);
