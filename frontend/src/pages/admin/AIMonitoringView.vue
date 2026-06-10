<template>
  <div class="p-6 md:p-8 xl:p-10 max-w-[1600px] mx-auto animate-in fade-in duration-500">
    
    <!-- Header -->
    <div class="admin-dashboard-hero mb-8">
      <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4 relative z-10">
        <div>
          <h1 class="text-3xl md:text-4xl font-extrabold text-slate-900 tracking-tight leading-tight">AI Monitoring Workspace</h1>
          <p class="text-[15px] text-slate-600 font-medium mt-2 max-w-xl leading-relaxed">Pantau kinerja sistem ekstraksi AI, tingkat kepercayaan, dan log analisis real-time.</p>
        </div>
        <div class="flex items-center gap-4">
          <div class="pill-ai-monitoring">
            <span class="live-dot animate-ping absolute"></span>
            <span class="live-dot relative"></span>
            AI Node: Active
          </div>
        </div>
      </div>
    </div>

    <!-- Analytics Cards -->
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4 mb-8">
      <div class="admin-card p-5 stat-panel">
        <p class="text-[11px] font-extrabold text-slate-400 uppercase tracking-widest mb-1">Total Analysis Today</p>
        <h3 class="text-3xl font-extrabold text-[#081F5C] tracking-tight">{{ stats?.total_ai_summaries_generated || stats?.summaries_count || 0 }}</h3>
        <p class="change-up mt-2 flex items-center gap-1">
          <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3"><polyline points="22 7 13.5 15.5 8.5 10.5 2 17"/><polyline points="16 7 22 7 22 13"/></svg>
          Live data
        </p>
      </div>
      <div class="admin-card p-5 stat-panel">
        <p class="text-[11px] font-extrabold text-slate-400 uppercase tracking-widest mb-1">Avg Confidence Score</p>
        <h3 class="text-3xl font-extrabold text-[#081F5C] tracking-tight">{{ stats?.average_confidence || stats?.avg_confidence || '94.2' }}%</h3>
        <p class="text-xs font-bold text-slate-400 mt-2 flex items-center gap-1">
          Target: >90% (Optimal)
        </p>
      </div>
      <div class="admin-card p-5 stat-panel">
        <p class="text-[11px] font-extrabold text-slate-400 uppercase tracking-widest mb-1">Registered Tutors</p>
        <h3 class="text-3xl font-extrabold text-[#081F5C] tracking-tight">{{ stats?.user_stats?.tutors || stats?.tutors_count || 0 }}</h3>
        <p class="text-xs font-bold text-emerald-500 mt-2 flex items-center gap-1">
          Active mentors
        </p>
      </div>
      <div class="admin-card p-5 stat-panel">
        <p class="text-[11px] font-extrabold text-slate-400 uppercase tracking-widest mb-1">Registered Students</p>
        <h3 class="text-3xl font-extrabold text-[#081F5C] tracking-tight">{{ stats?.user_stats?.students || stats?.students_count || 0 }}</h3>
        <p class="text-xs font-bold text-indigo-500 mt-2 flex items-center gap-1">
          Pelajar terdaftar
        </p>
      </div>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
      
      <!-- Chart Area -->
      <div class="admin-card p-6 lg:col-span-2 flex flex-col panel-chart">
        <div class="flex items-center justify-between mb-6">
          <h2 class="text-lg font-extrabold text-[#081F5C]">AI Confidence Trends</h2>
          <div class="flex gap-2">
            <button class="px-3 py-1 bg-slate-100 text-slate-600 rounded-lg text-xs font-bold">Hari Ini</button>
            <button class="px-3 py-1 bg-white border border-slate-200 text-slate-400 hover:text-slate-600 rounded-lg text-xs font-bold transition-colors">7 Hari</button>
          </div>
        </div>
        
        <div class="chart-display-area min-h-[300px] relative">
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
      <div class="admin-card p-6 flex flex-col h-full panel-logs">
        <h2 class="text-lg font-extrabold text-[#081F5C] mb-6">Live AI Logs</h2>
        
        <div v-if="isLoading" class="text-center py-12 text-slate-500 font-medium">
          Memuat log AI...
        </div>
        
        <div v-else class="flex-1 flex flex-col">
          <div v-if="aiLogs.length === 0" class="flex-1 flex flex-col items-center justify-center py-12 text-center">
            <div class="w-12 h-12 bg-slate-50 rounded-full flex items-center justify-center text-slate-400 mb-3 mx-auto">
              <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"/><polyline points="14 2 14 8 20 8"/><line x1="16" x2="8" y1="13" y2="13"/><line x1="16" x2="8" y1="17" y2="17"/><polyline points="10 9 9 9 8 9"/></svg>
            </div>
            <p class="text-sm font-semibold text-slate-600">Tidak Ada Log Aktivitas AI</p>
            <p class="text-xs text-slate-400 mt-1 max-w-[200px]">Belum ada aktivitas summarization atau pemindaian OCR hari ini.</p>
          </div>

          <div v-else class="space-y-3 overflow-y-auto custom-scrollbar pr-2 max-h-[350px]">
            <div v-for="log in aiLogs" :key="log.id" class="ai-log-item relative" :class="log.status === 'Success' ? 'status-success' : (log.status === 'Warning' ? 'status-warning' : 'status-error')">
              <div class="absolute left-0 top-0 bottom-0 w-1" :class="log.status === 'Success' ? 'bg-emerald-400' : (log.status === 'Warning' ? 'bg-amber-400' : 'bg-rose-400')"></div>
              
              <div class="pl-2">
                <div class="flex items-center justify-between mb-1">
                  <span class="text-xs font-bold" :class="log.status === 'Success' ? 'text-emerald-700' : (log.status === 'Warning' ? 'text-amber-700' : 'text-rose-700')">[{{ log.timestamp || log.time }}]</span>
                  <span class="text-[9px] px-1.5 py-0.5 rounded uppercase tracking-wider font-bold" :class="log.status === 'Success' ? 'bg-emerald-100 text-emerald-800' : (log.status === 'Warning' ? 'bg-amber-100 text-amber-800' : 'bg-rose-100 text-rose-800')">{{ log.status || 'Success' }}</span>
                </div>
                <p class="text-slate-700 leading-tight">{{ log.message }}</p>
                <p v-if="log.confidence" class="text-[10px] font-sans font-bold text-slate-400 mt-2">Confidence Score: <span :class="log.confidence > 90 ? 'text-emerald-500' : 'text-amber-500'">{{ log.confidence }}%</span></p>
              </div>
            </div>
          </div>
        </div>
      </div>
      
    </div>
  </div>
</template>

<script setup>
import { ref, onMounted } from 'vue'
import { adminService } from '@/services/admin.service'

const stats = ref(null)
const aiLogs = ref([])
const isLoading = ref(true)

const loadLogs = async () => {
  try {
    isLoading.value = true
    const response = await adminService.getAIMonitoring()
    const data = response.data || response || {}
    stats.value = data
    aiLogs.value = data.logs || data.ai_logs || []
  } catch (err) {
    console.error('Failed to load AI logs:', err)
  } finally {
    isLoading.value = false
  }
}

onMounted(() => {
  loadLogs()
})
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
