<template>
  <div class="p-6 md:p-8 xl:p-10 max-w-[1600px] mx-auto animate-in fade-in duration-500">
    
    <!-- Header -->
    <div class="bg-white/60 backdrop-blur-xl rounded-3xl p-7 md:p-8 shadow-[0_10px_40px_rgba(15,23,42,0.06)] border border-slate-200/60 relative overflow-hidden mb-8">
      <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4 relative z-10">
        <div>
          <h1 class="text-3xl md:text-4xl font-extrabold text-slate-900 tracking-tight leading-tight">AI Monitoring Workspace</h1>
          <p class="text-[15px] text-slate-600 font-medium mt-2 max-w-xl leading-relaxed">Pantau kinerja sistem ekstraksi AI, tingkat kepercayaan, dan log analisis real-time.</p>
        </div>
        <div class="flex items-center gap-4">
          <div class="px-4 py-2 bg-[#F7F2EB] border border-[#D0E3FF] rounded-xl text-[#081F5C] font-bold text-sm shadow-sm flex items-center gap-2">
            <span class="w-2 h-2 rounded-full bg-[#334EAC] animate-ping absolute"></span>
            <span class="w-2 h-2 rounded-full bg-[#334EAC] relative"></span>
            AI Node: Active
          </div>
        </div>
      </div>
    </div>

    <!-- Analytics Cards -->
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4 mb-8">
      <div class="bg-white p-5 rounded-2xl border border-slate-200 shadow-sm">
        <p class="text-[11px] font-extrabold text-slate-400 uppercase tracking-widest mb-1">Total Analysis Today</p>
        <h3 class="text-3xl font-extrabold text-[#081F5C] tracking-tight">8,431</h3>
        <p class="text-xs font-bold text-emerald-500 mt-2 flex items-center gap-1">
          <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3"><polyline points="22 7 13.5 15.5 8.5 10.5 2 17"/><polyline points="16 7 22 7 22 13"/></svg>
          +14% vs yesterday
        </p>
      </div>
      <div class="bg-white p-5 rounded-2xl border border-slate-200 shadow-sm">
        <p class="text-[11px] font-extrabold text-slate-400 uppercase tracking-widest mb-1">Avg Confidence Score</p>
        <h3 class="text-3xl font-extrabold text-[#081F5C] tracking-tight">94.2%</h3>
        <p class="text-xs font-bold text-slate-400 mt-2 flex items-center gap-1">
          Target: >90% (Optimal)
        </p>
      </div>
      <div class="bg-white p-5 rounded-2xl border border-slate-200 shadow-sm">
        <p class="text-[11px] font-extrabold text-slate-400 uppercase tracking-widest mb-1">Pending AI Validation</p>
        <h3 class="text-3xl font-extrabold text-[#081F5C] tracking-tight">42</h3>
        <p class="text-xs font-bold text-amber-500 mt-2 flex items-center gap-1">
          Waiting for Tutor Review
        </p>
      </div>
      <div class="bg-white p-5 rounded-2xl border border-slate-200 shadow-sm">
        <p class="text-[11px] font-extrabold text-slate-400 uppercase tracking-widest mb-1">Failed Parsing</p>
        <h3 class="text-3xl font-extrabold text-[#081F5C] tracking-tight">18</h3>
        <p class="text-xs font-bold text-rose-500 mt-2 flex items-center gap-1">
          Requires manual override
        </p>
      </div>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
      
      <!-- Chart Area (Dummy representation) -->
      <div class="bg-white rounded-2xl border border-slate-200 shadow-sm p-6 lg:col-span-2 flex flex-col">
        <div class="flex items-center justify-between mb-6">
          <h2 class="text-lg font-extrabold text-[#081F5C]">AI Confidence Trends</h2>
          <div class="flex gap-2">
            <button class="px-3 py-1 bg-slate-100 text-slate-600 rounded-lg text-xs font-bold">Hari Ini</button>
            <button class="px-3 py-1 bg-white border border-slate-200 text-slate-400 hover:text-slate-600 rounded-lg text-xs font-bold transition-colors">7 Hari</button>
          </div>
        </div>
        
        <div class="flex-1 bg-slate-50/50 rounded-xl border border-slate-100 flex items-center justify-center p-8 relative overflow-hidden min-h-[300px]">
          <!-- Dummy Chart Graphic -->
          <div class="absolute bottom-0 inset-x-0 h-1/2 bg-gradient-to-t from-[#F7F2EB] to-transparent"></div>
          <svg class="absolute inset-0 w-full h-full" preserveAspectRatio="none" viewBox="0 0 100 100">
            <path d="M0,80 Q20,60 40,70 T80,40 T100,50 L100,100 L0,100 Z" fill="rgba(99, 102, 241, 0.1)" stroke="none"/>
            <path d="M0,80 Q20,60 40,70 T80,40 T100,50" fill="none" stroke="#4F46E5" stroke-width="0.5"/>
          </svg>
          <div class="relative z-10 bg-white/80 backdrop-blur-sm px-4 py-2 border border-slate-200 rounded-lg shadow-sm text-center">
            <p class="text-[10px] font-extrabold text-slate-400 uppercase tracking-widest mb-0.5">Peak Performance</p>
            <p class="text-lg font-extrabold text-[#081F5C]">98.5% Accuracy</p>
          </div>
        </div>
      </div>

      <!-- Live AI Logs -->
      <div class="bg-white rounded-2xl border border-slate-200 shadow-sm p-6 flex flex-col h-full">
        <h2 class="text-lg font-extrabold text-[#081F5C] mb-6">Live AI Logs</h2>
        <div class="flex-1 space-y-3 overflow-y-auto custom-scrollbar pr-2 max-h-[350px]">
          
          <div v-for="log in aiLogs" :key="log.id" class="p-3 rounded-xl border bg-slate-50 text-sm font-mono relative overflow-hidden group" :class="log.status === 'Success' ? 'border-emerald-100' : (log.status === 'Warning' ? 'border-amber-100' : 'border-rose-100')">
            <!-- decorative gradient line -->
            <div class="absolute left-0 top-0 bottom-0 w-1" :class="log.status === 'Success' ? 'bg-emerald-400' : (log.status === 'Warning' ? 'bg-amber-400' : 'bg-rose-400')"></div>
            
            <div class="pl-2">
              <div class="flex items-center justify-between mb-1">
                <span class="text-xs font-bold" :class="log.status === 'Success' ? 'text-emerald-700' : (log.status === 'Warning' ? 'text-amber-700' : 'text-rose-700')">[{{ log.timestamp }}]</span>
                <span class="text-[9px] px-1.5 py-0.5 rounded uppercase tracking-wider font-bold" :class="log.status === 'Success' ? 'bg-emerald-100 text-emerald-800' : (log.status === 'Warning' ? 'bg-amber-100 text-amber-800' : 'bg-rose-100 text-rose-800')">{{ log.status }}</span>
              </div>
              <p class="text-slate-700 leading-tight">{{ log.message }}</p>
              <p v-if="log.confidence" class="text-[10px] font-sans font-bold text-slate-400 mt-2">Confidence Score: <span :class="log.confidence > 90 ? 'text-emerald-500' : 'text-amber-500'">{{ log.confidence }}%</span></p>
            </div>
          </div>
          
        </div>
      </div>
      
    </div>
  </div>
</template>

<script setup>
const aiLogs = [
  { id: 1, timestamp: '14:24:05', status: 'Success', message: 'Extracted PDF text from "Kalkulus_Bab1.pdf". Applied OCR filter.', confidence: 96 },
  { id: 2, timestamp: '14:23:42', status: 'Success', message: 'Processed image upload. Identified math equation: Integral x^2 dx.', confidence: 92 },
  { id: 3, timestamp: '14:21:15', status: 'Warning', message: 'Low confidence detection in handwritten note image.', confidence: 64 },
  { id: 4, timestamp: '14:18:30', status: 'Error', message: 'Failed to parse document "Tugas Akhir.docx". Corrupted file format.' },
  { id: 5, timestamp: '14:15:11', status: 'Success', message: 'Generated discussion tags automatically.', confidence: 98 },
]
</script>

<style scoped>
.custom-scrollbar::-webkit-scrollbar {
  width: 4px;
}
.custom-scrollbar::-webkit-scrollbar-track {
  background: transparent;
}
.custom-scrollbar::-webkit-scrollbar-thumb {
  background: rgba(8, 31, 92, 0.1);
  border-radius: 10px;
}
.custom-scrollbar:hover::-webkit-scrollbar-thumb {
  background: rgba(8, 31, 92, 0.2);
}
</style>
