<template>
  <div class="p-6 md:p-8 xl:p-10 max-w-[1600px] mx-auto animate-in fade-in duration-500">
    
    <!-- Header -->
    <div class="admin-dashboard-hero mb-8">
      <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4 relative z-10">
        <div>
          <h1 class="text-3xl md:text-4xl font-extrabold text-slate-900 tracking-tight leading-tight">User Reports & Escalation</h1>
          <p class="text-[15px] text-slate-600 font-medium mt-2 max-w-xl leading-relaxed">Tinjau laporan pengguna, tangani pelanggaran serius, dan kelola eskalasi kasus secara komprehensif.</p>
        </div>
      </div>
    </div>

    <!-- LOADING STATE & ERROR STATE -->
    <!-- Skeleton loader -->
    <div v-if="isLoading" class="space-y-4">
      <div v-for="n in 3" :key="n" class="w-full bg-white border border-slate-200/60 rounded-2xl p-5 animate-pulse flex items-center justify-between">
        <div class="space-y-2 w-1/4">
          <div class="h-4 bg-slate-200 rounded w-1/3"></div>
          <div class="h-3 bg-slate-200 rounded w-2/3"></div>
        </div>
        <div class="h-4 bg-slate-200 rounded w-1/3"></div>
        <div class="h-8 bg-slate-200 rounded w-24"></div>
      </div>
    </div>

    <!-- Error State with Retry Button -->
    <div v-else-if="errorMsg" class="bg-white border border-slate-200 shadow-sm rounded-2xl p-10 text-center flex flex-col items-center justify-center gap-4">
      <div class="w-12 h-12 rounded-full bg-rose-50 text-rose-500 flex items-center justify-center">
        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="10"/><line x1="12" x2="12" y1="8" y2="12"/><line x1="12" x2="12.01" y1="16" y2="16"/></svg>
      </div>
      <div>
        <h3 class="text-lg font-bold text-slate-900">Gagal memuat data laporan.</h3>
        <p class="text-sm text-slate-500 mt-1">{{ errorMsg }}</p>
      </div>
      <button @click="loadReports" class="px-5 py-2 bg-[#081F5C] hover:bg-[#334EAC] text-white text-xs font-bold rounded-xl transition-colors shadow-sm">
        Coba Lagi
      </button>
    </div>

    <!-- Moderation Queues -->
    <div v-else class="grid grid-cols-1 lg:grid-cols-3 gap-8">
      
      <!-- Left Column: Queue List -->
      <div class="lg:col-span-1 flex flex-col gap-4 max-h-[800px] overflow-y-auto custom-scrollbar pr-2">
        <div v-for="report in reports" :key="report.id" 
             class="report-card group"
             :class="{ 'selected': selectedReport?.id === report.id }"
             @click="selectedReport = report">
          <div class="flex items-start justify-between mb-3">
            <span :class="report.type === 'Spam' ? 'badge-spam' : (report.type === 'Plagiarisme' ? 'badge-plagiarisme' : 'badge-spam')">
              {{ report.type }}
            </span>
            <span class="text-xs font-bold text-slate-400">{{ report.time }}</span>
          </div>
          <h3 class="text-base font-bold text-slate-900 mb-1 line-clamp-1 group-hover:text-[#081F5C] tracking-tight">{{ report.targetTitle }}</h3>
          <p class="text-xs text-slate-500 mb-3">Dilaporkan oleh: <span class="font-bold text-slate-700">{{ report.reporter }}</span> ({{ report.reason }})</p>
          <div class="flex items-center gap-2">
            <div class="flex -space-x-2">
              <span class="w-6 h-6 rounded-full bg-slate-200 border-2 border-white"></span>
              <span class="w-6 h-6 rounded-full bg-slate-300 border-2 border-white"></span>
            </div>
            <span class="text-[10px] font-bold text-slate-400">{{ report.flagCount }} laporan serupa</span>
          </div>
        </div>
        <div v-if="reports.length === 0" class="text-center py-12 text-slate-400 font-semibold border border-dashed border-slate-200 rounded-2xl bg-white">
          Tidak ada laporan pending.
        </div>
      </div>

      <!-- Right Column: Detail & Action Panel -->
      <div class="lg:col-span-2">
        <div v-if="selectedReport" class="admin-card h-full flex flex-col overflow-hidden animate-in fade-in zoom-in-95 duration-200">
          
          <!-- Detail Header -->
          <div class="p-6 border-b border-slate-100 bg-slate-50/50">
            <div class="flex items-center gap-3 mb-2">
              <span class="badge-dilaporkan">
                <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" class="inline-block mr-1 -mt-0.5"><path d="m21.73 18-8-14a2 2 0 0 0-3.48 0l-8 14A2 2 0 0 0 4 21h16a2 2 0 0 0 1.73-3Z"/><line x1="12" x2="12" y1="9" y2="13"/><line x1="12" x2="12.01" y1="17" y2="17"/></svg>
                Dilaporkan {{ selectedReport.flagCount }} kali
              </span>
              <span class="text-xs font-bold text-slate-400">ID: #RPT-{{ selectedReport.id }}</span>
            </div>
            <h2 class="text-[28px] font-bold text-slate-900 tracking-tight mb-2">{{ selectedReport.targetTitle }}</h2>
            <div class="flex items-center gap-2 text-sm text-slate-500 font-medium">
              Ditulis oleh <span class="font-bold text-[#081F5C] cursor-pointer hover:underline">{{ selectedReport.author }}</span> pada {{ selectedReport.postDate }}
            </div>
          </div>

          <!-- Content Review -->
          <div class="p-6 flex-1 overflow-y-auto">
            <h3 class="text-xs font-bold text-slate-400 uppercase tracking-widest mb-4">Konten yang Dilaporkan</h3>
            <div class="reported-content-box mb-6">
              {{ selectedReport.content }}
            </div>
            
            <h3 class="text-xs font-bold text-slate-400 uppercase tracking-widest mb-4">Konteks Pelanggaran</h3>
            <ul class="space-y-3">
              <li v-for="(reason, i) in selectedReport.reasonsDetail" :key="i" class="flex items-start gap-3 p-3 rounded-xl border border-rose-100 bg-rose-50/50">
                <div class="mt-0.5">
                  <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="#be123c" stroke-width="2"><path d="M20 6 9 17l-5-5"/></svg>
                </div>
                <div>
                  <p class="text-sm font-bold text-rose-900">{{ reason.title }}</p>
                  <p class="text-xs text-rose-700/80">{{ reason.desc }}</p>
                </div>
              </li>
            </ul>
          </div>

          <!-- Action Footer -->
          <div class="p-6 border-t border-slate-100 bg-white flex items-center justify-between gap-4 mt-auto">
            <button @click="handleResolve('keep')" class="px-5 py-2.5 text-slate-500 font-bold text-sm hover:text-emerald-600 hover:bg-emerald-50 rounded-xl transition-all">
              Abaikan (Restore)
            </button>
            <div class="flex gap-3">
              <button @click="handleResolve('keep')" class="px-5 py-2.5 bg-amber-50 text-amber-700 border border-amber-200 hover:bg-amber-100 font-bold text-sm rounded-xl transition-all shadow-sm">
                Tandai Spam
              </button>
              <button @click="handleResolve('delete')" class="px-5 py-2.5 bg-rose-600 text-white font-bold text-sm rounded-xl hover:bg-rose-700 transition-all shadow-[0_4px_15px_rgba(225,29,72,0.2)] flex items-center gap-2">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path d="M3 6h18"/><path d="M19 6v14c0 1-1 2-2 2H7c-1 0-2-1-2-2V6"/><path d="M8 6V4c0-1 1-2 2-2h4c1 0 2 1 2 2v2"/></svg>
                Remove Content
              </button>
            </div>
          </div>

        </div>

        <!-- Empty State -->
        <div v-else class="admin-card report-empty-state">
          <div class="report-empty-icon">
            <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M12 22c5.523 0 10-4.477 10-10S17.523 2 12 2 2 6.477 2 12s4.477 10 10 10z"/><path d="m9 12 2 2 4-4"/></svg>
          </div>
          <h3 class="report-empty-title">Tidak ada laporan yang dipilih</h3>
          <p class="report-empty-desc">Pilih laporan dari daftar di sebelah kiri untuk meninjau dan mengambil tindakan operasional.</p>
        </div>
      </div>
      
    </div>
  </div>
</template>

<script setup>
import { ref, onMounted } from 'vue'
import { adminService } from '@/services/admin.service'

const reports = ref([])
const selectedReport = ref(null)
const isLoading = ref(true)
const errorMsg = ref(null)

const loadReports = async () => {
  try {
    isLoading.value = true
    errorMsg.value = null
    const response = await adminService.getReports()
    
    // Map the backend reports list (which returns data array in pagination format)
    const rawList = response.data || response || []
    reports.value = rawList
      .filter(r => r.status === 'Pending')
      .map(r => {
        const type = r.reason ? r.reason.split(' ')[0] : 'Spam'
        return {
          id: r.id,
          type,
          severity: 'Medium',
          time: r.time || '10m lalu',
          targetTitle: `Konten di "${r.topic || 'Forum'}"`,
          author: r.studentName || 'Pengguna',
          postDate: 'Hari Ini',
          reporter: 'System / User',
          reason: r.reason || 'Spam / Iklan tidak relevan',
          flagCount: 3,
          content: r.content || 'Konten spam / tidak pantas.',
          reasonsDetail: [
            { title: r.reason || 'Konteks Pelanggaran', desc: 'Sistem mendeteksi aktivitas mencurigakan atau laporan pengguna.' }
          ],
          status: r.status || 'Pending'
        }
      })
    
    if (reports.value.length > 0) {
      selectedReport.value = reports.value[0]
    } else {
      selectedReport.value = null
    }
  } catch (err) {
    console.error('Failed to load reports:', err)
    errorMsg.value = err.message || 'Gagal mengambil data laporan.'
  } finally {
    isLoading.value = false
  }
}

const handleResolve = async (action) => {
  if (!selectedReport.value) return
  try {
    const act = action === 'keep' ? 'keep' : 'delete'
    await adminService.resolveReport(selectedReport.value.id, act)
    alert(`Laporan berhasil diproses: ${action === 'keep' ? 'Dibiarkan' : 'Dihapus'}`)
    await loadReports()
  } catch (err) {
    console.error('Error resolving report:', err)
  }
}

onMounted(() => {
  loadReports()
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
  background: rgba(15, 23, 42, 0.1);
  border-radius: 10px;
}
.custom-scrollbar:hover::-webkit-scrollbar-thumb {
  background: rgba(15, 23, 42, 0.2);
}
</style>
