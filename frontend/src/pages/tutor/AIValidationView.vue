<template>
  <div class="relative min-h-screen pb-12 overflow-hidden bg-[#F7F2EB]">
    <!-- Mesh Background / Atmosphere -->
    <div class="absolute inset-0 pointer-events-none overflow-hidden">
      <div class="absolute top-[-10%] left-[-5%] w-[40%] h-[40%] bg-[#334EAC]/5 blur-[120px] rounded-full mix-blend-multiply"></div>
      <div class="absolute bottom-[-10%] right-[-10%] w-[50%] h-[50%] bg-[#7096D1]/10 blur-[120px] rounded-full mix-blend-multiply"></div>
      <div class="absolute inset-0 bg-[url('data:image/svg+xml;base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHdpZHRoPSIyNCIgaGVpZ2h0PSIyNCI+CjxyZWN0IHdpZHRoPSIyNCIgaGVpZ2h0PSIyNCIgZmlsbD0ibm9uZSIvPgo8Y2lyY2xlIGN4PSIyIiBjeT0iMiIgcj0iMSIgZmlsbD0icmdiYSgwLCAwLCAwLCAwLjA1KSIvPgo8L3N2Zz4=')] opacity-50 mix-blend-overlay"></div>
    </div>

    <!-- Header Actions (Sticky) -->
    <div class="sticky top-[72px] z-20 bg-white/80 backdrop-blur-xl border-b border-slate-200/60 px-4 sm:px-6 lg:px-8 py-4 mb-6 flex flex-col md:flex-row md:items-center justify-between gap-4">
      <div class="flex items-center gap-3">
         <RouterLink to="/tutor/upload-exam" class="w-10 h-10 rounded-xl bg-slate-50 border border-slate-200 text-slate-500 hover:text-[#334EAC] hover:border-[#7096D1] flex items-center justify-center transition-colors">
           <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="m15 18-6-6 6-6"/></svg>
         </RouterLink>
         <div>
           <h1 class="text-[18px] font-bold text-slate-900 tracking-tight leading-none mb-1">Validasi Ekstraksi AI</h1>
           <p class="text-[12px] font-bold text-slate-500">Struktur_Data_UAS_2025.pdf</p>
         </div>
      </div>
      <div class="flex flex-wrap items-center gap-2">
        <button class="px-4 py-2 bg-white border border-rose-200 text-rose-600 hover:bg-rose-50 rounded-2xl font-bold text-[12px] transition-all shadow-sm active:scale-95 flex items-center gap-2">
          <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M18 6 6 18"/><path d="m6 6 12 12"/></svg>
          Tolak Parsing
        </button>
        <button class="px-4 py-2 bg-white border border-slate-200 text-slate-600 hover:border-[#7096D1] hover:text-[#334EAC] rounded-2xl font-bold text-[12px] transition-all shadow-sm active:scale-95 flex items-center gap-2">
          Simpan Validasi
        </button>
        <button class="px-4 py-2 bg-emerald-500 hover:bg-emerald-600 text-white rounded-2xl font-bold text-[12px] transition-all shadow-sm active:scale-95 flex items-center gap-2">
          <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"/><polyline points="22 4 12 14.01 9 11.01"/></svg>
          Setujui AI
        </button>
      </div>
    </div>

    <!-- 3 COLUMN WORKSPACE -->
    <div class="relative z-10 max-w-[1400px] mx-auto px-4 sm:px-6 lg:px-8 flex flex-col lg:flex-row gap-6">
      
      <!-- 1. LEFT PANEL: Source & Extraction Meta -->
      <div class="w-full lg:w-1/4 flex flex-col gap-6">
        
        <!-- Source Preview -->
        <div class="bg-white/80 backdrop-blur-xl rounded-3xl p-5 shadow-[0_10px_40px_rgba(15,23,42,0.06)] border border-slate-100 flex flex-col h-[300px] transition-all duration-300 ease-out hover:shadow-xl group/card">
          <h3 class="text-[13px] font-bold text-slate-900 tracking-tight mb-3 flex items-center justify-between">
             Dokumen Sumber
             <span class="text-[10px] bg-slate-100 text-slate-500 px-2 py-0.5 rounded-lg">Hal 1 dari 4</span>
          </h3>
          <div class="flex-1 bg-slate-100 rounded-xl border border-slate-200 flex items-center justify-center relative overflow-hidden group cursor-pointer">
            <div class="absolute inset-0 bg-white/50 backdrop-blur-[1px] flex items-center justify-center opacity-0 group-hover:opacity-100 transition-opacity">
               <span class="bg-[#334EAC] text-white px-3 py-1.5 rounded-lg text-[11px] font-bold shadow-md">Lihat Full PDF</span>
            </div>
            <!-- Dummy document content -->
            <div class="w-[80%] h-[90%] bg-white shadow-sm border border-slate-200 p-3 flex flex-col gap-2">
              <div class="h-2 w-1/2 bg-slate-200 rounded"></div>
              <div class="h-1.5 w-full bg-slate-100 rounded"></div>
              <div class="h-1.5 w-full bg-slate-100 rounded"></div>
              <div class="h-1.5 w-3/4 bg-slate-100 rounded"></div>
              <div class="mt-4 h-2 w-1/3 bg-slate-200 rounded"></div>
              <div class="h-1.5 w-full bg-slate-100 rounded"></div>
              <div class="h-1.5 w-full bg-slate-100 rounded"></div>
            </div>
          </div>
        </div>

        <!-- AI Confidence & Topics -->
        <div class="bg-gradient-to-br from-[#081F5C] to-[#334EAC] rounded-3xl p-5 shadow-[0_8px_30px_rgba(8,31,92,0.15)] border border-white/10 text-white relative overflow-hidden transition-all duration-300 ease-out hover:shadow-2xl group/card">
          <div class="absolute -right-4 -top-4 w-32 h-32 bg-white/10 blur-[40px] rounded-full pointer-events-none"></div>
          
          <h3 class="text-[13px] font-bold tracking-tight mb-4 flex items-center gap-2 relative z-10">
            <span class="w-6 h-6 rounded-md bg-white/10 flex items-center justify-center"><svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="m12 3-1.912 5.813a2 2 0 0 1-1.275 1.275L3 12l5.813 1.912a2 2 0 0 1 1.275 1.275L12 21l1.912-5.813a2 2 0 0 1 1.275-1.275L21 12l-5.813-1.912a2 2 0 0 1-1.275-1.275L12 3Z"/></svg></span>
            Metrik Ekstraksi
          </h3>
          
          <div class="space-y-4 relative z-10">
            <div>
              <div class="flex justify-between text-[11px] font-bold text-[#BAD6EB] mb-1">
                <span>OCR Confidence</span>
                <span class="text-white">96%</span>
              </div>
              <div class="h-1.5 w-full bg-white/20 rounded-full overflow-hidden">
                <div class="h-full bg-emerald-400 rounded-full" style="width: 96%"></div>
              </div>
            </div>
            
            <div class="pt-2 border-t border-white/10">
              <p class="text-[11px] font-bold text-[#BAD6EB] uppercase tracking-widest mb-2">Topik Terdeteksi</p>
              <div class="flex flex-wrap gap-1.5">
                <span class="px-2 py-0.5 bg-white/10 border border-white/20 rounded text-[10px] font-bold">Binary Tree</span>
                <span class="px-2 py-0.5 bg-white/10 border border-white/20 rounded text-[10px] font-bold">Linked List</span>
                <span class="px-2 py-0.5 bg-white/10 border border-white/20 rounded text-[10px] font-bold">Sorting</span>
              </div>
            </div>
          </div>
        </div>

      </div>

      <!-- 2. CENTER PANEL: Editor -->
      <div class="w-full lg:w-1/2 flex flex-col">
        <div class="bg-white/80 backdrop-blur-xl rounded-3xl flex-1 shadow-[0_10px_40px_rgba(15,23,42,0.06)] border border-slate-100 flex flex-col overflow-hidden transition-all duration-300 ease-out hover:shadow-xl group/card">
          
          <!-- Editor Toolbar -->
          <div class="px-4 py-3 border-b border-slate-100 bg-slate-50 flex items-center justify-between">
            <div class="flex items-center gap-2">
               <button class="p-1.5 text-slate-400 hover:text-[#081F5C] hover:bg-slate-200 rounded transition-colors"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M14 12a4 4 0 0 0 0-8H6v8"/><path d="M15 20a4 4 0 0 0 0-8H6v8Z"/></svg></button>
               <button class="p-1.5 text-slate-400 hover:text-[#081F5C] hover:bg-slate-200 rounded transition-colors"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><line x1="19" x2="5" y1="4" y2="20"/><line x1="15" x2="5" y1="4" y2="4"/><line x1="19" x2="9" y1="20" y2="20"/></svg></button>
               <div class="w-px h-4 bg-slate-300 mx-1"></div>
               <button class="p-1.5 text-slate-400 hover:text-[#081F5C] hover:bg-slate-200 rounded transition-colors"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><line x1="8" x2="21" y1="6" y2="6"/><line x1="8" x2="21" y1="12" y2="12"/><line x1="8" x2="21" y1="18" y2="18"/><line x1="3" x2="3.01" y1="6" y2="6"/><line x1="3" x2="3.01" y1="12" y2="12"/><line x1="3" x2="3.01" y1="18" y2="18"/></svg></button>
            </div>
            
            <button class="px-3 py-1 bg-[#EDF1F6] text-[#334EAC] rounded-lg text-[11px] font-bold flex items-center gap-1 hover:bg-[#D0E3FF] transition-colors">
              <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M12 20h9"/><path d="M16.5 3.5a2.12 2.12 0 0 1 3 3L7 19l-4 1 1-4Z"/></svg>
              Revisi Hasil
            </button>
          </div>
          
          <!-- Editor Body -->
          <div class="p-6 flex-1 bg-white relative">
            <div class="absolute right-4 top-4 bg-amber-50 border border-amber-100 text-amber-600 px-2 py-1 rounded text-[10px] font-bold flex items-center gap-1">
               <svg xmlns="http://www.w3.org/2000/svg" width="10" height="10" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"/><line x1="12" x2="12" y1="8" y2="12"/><line x1="12" x2="12.01" y1="16" y2="16"/></svg>
               Kemungkinan Typo
            </div>
            
            <textarea class="w-full h-full min-h-[400px] resize-none focus:outline-none text-[14px] text-slate-700 font-medium leading-relaxed" spellcheck="false">
Ujian Akhir Semester
Mata Kuliah: Struktur Data
Waktu: 120 Menit

Bagian 1: Pilihan Ganda (Bobot 30%)
1. Struktur data mana yang mengikuti prinsip LIFO (Last In First Out)?
A. Queue
B. Stack
C. Linked List
D. Tree

2. Kompleksitas waktu untuk mencari elemen pada Binary Search Tree yang seimbang adalah?
A. O(n)
B. O(log n) 
C. O(n log n)
D. O(1)

Bagian 2: Esai (Bobot 70%)
Jelaskan perbedaan mendasar antara Singly Linked List dan Doubly Linked List, sertakan contoh kasus penggunaan yang paling optimal untuk keduanya!
            </textarea>
          </div>
          
          <!-- AI Recommendation Bottom Bar -->
          <div class="px-5 py-3 bg-slate-50 border-t border-slate-100 flex items-center justify-between">
            <div class="flex items-center gap-2">
              <span class="w-2 h-2 rounded-full bg-emerald-500 animate-pulse"></span>
              <span class="text-[11px] font-bold text-slate-500">Struktur soal terdeteksi: Pilihan Ganda (2), Esai (1)</span>
            </div>
            <button class="text-[11px] font-bold text-[#334EAC] hover:underline">Terapkan Format Auto-Fix</button>
          </div>
          
        </div>
      </div>

      <!-- 3. RIGHT SIDEBAR: Validation Meta -->
      <div class="w-full lg:w-1/4 flex flex-col gap-6">
        
        <!-- Validation Notes -->
        <div class="bg-white/80 backdrop-blur-xl rounded-3xl p-5 shadow-[0_10px_40px_rgba(15,23,42,0.06)] border border-slate-100 transition-all duration-300 ease-out hover:shadow-xl group/card">
          <h3 class="text-[13px] font-bold text-slate-900 tracking-tight mb-3 flex items-center gap-2">
             <span class="w-6 h-6 rounded-md bg-[#EDF1F6] text-[#334EAC] flex items-center justify-center"><svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M12 20h9"/><path d="M16.5 3.5a2.12 2.12 0 0 1 3 3L7 19l-4 1 1-4Z"/></svg></span>
             Catatan Validasi
          </h3>
          <textarea class="w-full h-24 p-3 bg-slate-50 border border-slate-200 rounded-xl text-[12px] text-slate-600 focus:outline-none focus:border-[#7096D1] resize-none font-medium placeholder-slate-400" placeholder="Tambahkan catatan khusus untuk ekstraksi ini... (opsional)"></textarea>
          <div class="mt-3 flex items-center gap-2">
            <input type="checkbox" id="mark_urgent" class="rounded text-[#334EAC] focus:ring-[#7096D1] border-slate-300 w-4 h-4">
            <label for="mark_urgent" class="text-[11px] font-bold text-slate-500 cursor-pointer">Tandai perlu review Admin</label>
          </div>
        </div>

        <!-- Approval Status -->
        <div class="bg-white/80 backdrop-blur-xl rounded-3xl p-5 shadow-[0_10px_40px_rgba(15,23,42,0.06)] border border-slate-100 transition-all duration-300 ease-out hover:shadow-xl group/card">
          <h3 class="text-[13px] font-bold text-slate-900 tracking-tight mb-4">Status & Metrik Kualitas</h3>
          
          <div class="space-y-4">
            <div class="flex items-center justify-between">
               <span class="text-[12px] font-bold text-slate-500">Status Validasi</span>
               <span class="px-2.5 py-1 bg-amber-50 text-amber-600 rounded-lg text-[10px] font-bold uppercase tracking-widest border border-amber-100">
                 Menunggu
               </span>
            </div>
            
            <div class="w-full h-px bg-slate-100"></div>
            
            <div class="flex items-center justify-between">
               <span class="text-[12px] font-bold text-slate-500">Tingkat Kesulitan (AI)</span>
               <span class="text-[12px] font-bold text-slate-900 tracking-tight">Menengah</span>
            </div>
            
            <div class="flex items-center justify-between">
               <span class="text-[12px] font-bold text-slate-500">Kelengkapan Format</span>
               <span class="text-[12px] font-bold text-emerald-500 flex items-center gap-1 tracking-tight">
                 <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"/><polyline points="22 4 12 14.01 9 11.01"/></svg>
                 Sempurna
               </span>
            </div>
          </div>
        </div>
        
        <!-- Recent Validations -->
        <div class="bg-white/80 backdrop-blur-xl rounded-3xl p-5 shadow-[0_10px_40px_rgba(15,23,42,0.06)] border border-slate-100 transition-all duration-300 ease-out hover:shadow-xl group/card">
          <h3 class="text-[13px] font-bold text-slate-900 tracking-tight mb-4">Riwayat Validasi Anda</h3>
          
          <div class="space-y-3">
             <div class="flex items-center gap-3">
               <div class="w-8 h-8 rounded-lg bg-emerald-50 text-emerald-500 flex items-center justify-center shrink-0">
                 <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"/><polyline points="22 4 12 14.01 9 11.01"/></svg>
               </div>
               <div>
                 <p class="text-[11px] font-bold text-slate-900 leading-none mb-1 line-clamp-1 tracking-tight">Kuis_Algoritma.pdf</p>
                 <p class="text-[9px] font-bold text-slate-400">Disetujui 2 jam lalu</p>
               </div>
             </div>
             
             <div class="flex items-center gap-3">
               <div class="w-8 h-8 rounded-lg bg-emerald-50 text-emerald-500 flex items-center justify-center shrink-0">
                 <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"/><polyline points="22 4 12 14.01 9 11.01"/></svg>
               </div>
               <div>
                 <p class="text-[11px] font-bold text-slate-900 leading-none mb-1 line-clamp-1 tracking-tight">BasisData_UTS.docx</p>
                 <p class="text-[9px] font-bold text-slate-400">Disetujui kemarin</p>
               </div>
             </div>
          </div>
        </div>

      </div>
      
    </div>
  </div>
</template>

<script setup>
import { RouterLink } from 'vue-router'
</script>
