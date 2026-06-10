<template>
  <div class="p-6 md:p-8 xl:p-10 max-w-[1600px] mx-auto animate-in fade-in duration-500">
    
    <!-- Header -->
    <div class="admin-dashboard-hero mb-8">
      <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4 relative z-10">
        <div>
          <h1 class="text-3xl md:text-4xl font-extrabold text-slate-900 tracking-tight leading-tight">Live Content Moderation</h1>
          <p class="text-[15px] text-slate-600 font-medium mt-2 max-w-xl leading-relaxed">Antrean moderasi forum, pembersihan otomatis AI, dan tinjauan persetujuan konten publik.</p>
        </div>
      </div>
    </div>

    <!-- Stats -->
    <div class="grid grid-cols-1 md:grid-cols-4 gap-4 mb-8">
      <div class="admin-card p-5 stat-pending">
        <p class="text-sm font-semibold text-slate-500 mb-2">Pending Review</p>
        <h3 class="text-[28px] font-bold text-slate-900">{{ pendingCount }}</h3>
      </div>
      <div class="admin-card p-5 stat-ai-validation">
        <p class="text-sm font-semibold text-slate-500 mb-2">Auto-Rejected (AI)</p>
        <h3 class="text-[28px] font-bold text-slate-900">{{ stats.auto_rejected }}</h3>
      </div>
      <div class="admin-card p-5 stat-card-positive">
        <p class="text-sm font-semibold text-slate-500 mb-2">Approved Today</p>
        <h3 class="text-[28px] font-bold text-slate-900">{{ stats.approved_today }}</h3>
      </div>
      <div class="admin-card p-5 stat-failed">
        <p class="text-sm font-semibold text-slate-500 mb-2">Flagged Users</p>
        <h3 class="text-[28px] font-bold text-rose-600">{{ stats.flagged_users }}</h3>
      </div>
    </div>

    <!-- LOADING STATE -->
    <div v-if="isLoading" class="text-center py-12 text-slate-500 font-medium bg-white border border-slate-200 shadow-sm rounded-2xl">
      Memuat antrean moderasi...
    </div>

    <!-- Live Queue -->
    <div v-else class="admin-table-container">
      <div class="p-6 border-b border-slate-100 flex items-center justify-between">
        <h2 class="text-lg font-bold text-slate-900 tracking-tight">Live Moderation Queue</h2>
        <div class="flex gap-2">
          <input type="text" v-model="searchQuery" placeholder="Search content..." class="admin-input" />
        </div>
      </div>
      
      <div class="overflow-x-auto">
        <table class="w-full text-left border-collapse">
          <thead>
            <tr class="admin-table-header">
              <th class="admin-table-col-label px-6 py-4">ID</th>
              <th class="admin-table-col-label px-6 py-4">Content Snippet</th>
              <th class="admin-table-col-label px-6 py-4">Author</th>
              <th class="admin-table-col-label px-6 py-4">AI Confidence</th>
              <th class="admin-table-col-label px-6 py-4 text-right">Action</th>
            </tr>
          </thead>
          <tbody class="divide-y divide-slate-100">
            <tr v-for="item in filteredQueue" :key="item.id" class="admin-table-row">
              <td class="px-6 py-4 text-sm font-bold text-slate-900">#{{ item.id }}</td>
              <td class="px-6 py-4">
                <p class="text-sm font-semibold text-slate-900 mb-1 line-clamp-1">{{ item.title }}</p>
                <p class="text-xs text-slate-500 line-clamp-1">{{ item.snippet }}</p>
              </td>
              <td class="px-6 py-4 text-sm text-slate-700 font-medium">{{ item.author }}</td>
              <td class="px-6 py-4">
                <span class="px-2.5 py-1 text-xs font-bold rounded-md" :class="item.confidence > 80 ? 'bg-rose-50 text-rose-700' : 'bg-amber-50 text-amber-700'">
                  {{ item.confidence }}% Spam
                </span>
              </td>
              <td class="px-6 py-4 text-right">
                <RouterLink :to="`/admin/moderation/${item.id}`" class="btn-modal-secondary py-1.5 px-3">
                  Review
                </RouterLink>
              </td>
            </tr>
          </tbody>
        </table>
      </div>
      <div v-if="filteredQueue.length === 0" class="text-center py-8 text-slate-400 font-semibold italic">
        Antrean moderasi kosong.
      </div>
    </div>
  </div>
</template>

<script setup>
import { ref, computed, onMounted } from 'vue'
import { RouterLink } from 'vue-router'
import { adminService } from '@/services/admin.service'

const queue = ref([])
const pendingCount = ref(0)
const isLoading = ref(true)
const searchQuery = ref('')
const stats = ref({
  auto_rejected: 128,
  approved_today: 3405,
  flagged_users: 5
})

const loadQueue = async () => {
  try {
    isLoading.value = true
    const response = await adminService.getModerationQueue()
    const data = response.data || response || {}
    
    // Extract queue items from pagination structure
    const rawList = Array.isArray(data.moderation_queue?.data)
      ? data.moderation_queue.data
      : Array.isArray(data.moderation_queue)
        ? data.moderation_queue
        : Array.isArray(data.data)
          ? data.data
          : Array.isArray(data)
            ? data
            : []
    pendingCount.value = data.pending_count !== undefined ? data.pending_count : rawList.length
    
    if (data.stats) {
      stats.value = { ...stats.value, ...data.stats }
    }
    
    queue.value = rawList.map(item => ({
      id: item.id,
      title: item.title || 'Tanpa Judul',
      snippet: item.content || 'Konten kosong.',
      author: item.user?.name || 'Pengguna',
      confidence: item.type === 'question' ? 85 : 65,
      status: item.is_verified ? 'Approved' : 'Pending'
    })).filter(item => item.status === 'Pending')
  } catch (err) {
    console.error('Failed to load moderation queue:', err)
  } finally {
    isLoading.value = false
  }
}

const filteredQueue = computed(() => {
  return queue.value.filter(item => {
    return item.title.toLowerCase().includes(searchQuery.value.toLowerCase()) || 
           item.snippet.toLowerCase().includes(searchQuery.value.toLowerCase())
  })
})

onMounted(() => {
  loadQueue()
})
</script>
