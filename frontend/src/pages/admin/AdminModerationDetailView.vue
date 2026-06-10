<template>
  <div class="p-6 md:p-8 xl:p-10 max-w-[1600px] mx-auto animate-in fade-in duration-500">
    
    <!-- Back Navigation -->
    <div class="mb-6 flex items-center gap-2">
      <RouterLink
        to="/admin/moderation"
        class="text-sm font-bold text-slate-400 hover:text-[#334EAC] transition-colors flex items-center gap-1 w-fit bg-white/50 px-3 py-1.5 rounded-lg border border-slate-200/50"
      >
        ← Kembali ke Antrean
      </RouterLink>
    </div>

    <!-- Header -->
    <div class="bg-white/60 backdrop-blur-xl rounded-3xl p-7 md:p-8 shadow-[0_10px_40px_rgba(15,23,42,0.06)] border border-slate-200/60 relative overflow-hidden mb-8">
      <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4 relative z-10">
        <div>
          <h1 class="text-3xl md:text-4xl font-extrabold text-slate-900 tracking-tight leading-tight">Moderation Case #{{ id }}</h1>
          <p class="text-[15px] text-slate-600 font-medium mt-2 max-w-xl leading-relaxed">Review and take action on flagged content.</p>
        </div>
      </div>
    </div>

    <div v-if="isLoading" class="text-center py-12 text-slate-500 font-medium bg-white border border-slate-200 shadow-sm rounded-2xl">
      Memuat detail kasus...
    </div>

    <div v-else-if="item" class="bg-white rounded-2xl border border-slate-200 shadow-sm p-8 max-w-4xl">
      <div class="flex items-center gap-3 mb-6">
        <span class="px-3 py-1 bg-rose-50 text-rose-700 text-xs font-bold uppercase tracking-widest rounded-md">{{ item.type }} Moderation</span>
      </div>
      <h2 class="text-2xl font-bold text-slate-900 mb-2">{{ item.title }}</h2>
      <p class="text-sm text-slate-500 mb-6 font-medium">Diposting oleh <span class="font-bold text-slate-700">{{ item.author }}</span></p>
      
      <div class="bg-slate-50 p-6 rounded-xl border border-slate-200 text-base text-slate-700 leading-relaxed mb-8">
        {{ item.snippet }}
      </div>

      <div class="flex gap-4 border-t border-slate-100 pt-6">
        <button @click="resolveCase('approve')" class="px-6 py-3 bg-emerald-50 text-emerald-700 border border-emerald-200 font-bold text-sm rounded-xl hover:bg-emerald-100 transition-colors">
          Approve (False Positive)
        </button>
        <button @click="resolveCase('reject')" class="px-6 py-3 bg-rose-600 text-white font-bold text-sm rounded-xl hover:bg-rose-700 transition-colors shadow-sm">
          Delete Content & Suspend User
        </button>
      </div>

      <!-- Remaining Backend Gaps Note -->
      <div class="mt-8 p-5 bg-[#FFF9F2] border border-[#F2D7B4] rounded-2xl">
        <h4 class="text-sm font-bold text-[#8A581F] flex items-center gap-2 mb-2">
          <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path d="m21.73 18-8-14a2 2 0 0 0-3.48 0l-8 14A2 2 0 0 0 4 21h16a2 2 0 0 0 1.73-3Z"/><line x1="12" x2="12" y1="9" y2="13"/><line x1="12" x2="12.01" y1="17" y2="17"/></svg>
          Remaining Backend Gaps
        </h4>
        <ul class="list-disc pl-5 text-xs text-[#8A581F] space-y-1.5 font-medium">
          <li><code>DELETE /api/posts/{id}</code> (atau endpoint reject moderasi) belum tersedia.</li>
          <li>Aksi Approve sudah menggunakan <code>POST /api/posts/{id}/verify</code>.</li>
          <li>Aksi Reject/Delete masih berupa frontend simulation hingga endpoint backend tersedia.</li>
        </ul>
      </div>
    </div>
  </div>
</template>

<script setup>
import { ref, onMounted } from 'vue'
import { useRoute, RouterLink, useRouter } from 'vue-router'
import { adminService } from '@/services/admin.service'

const route = useRoute()
const router = useRouter()
const id = route.params.id
const item = ref(null)
const isLoading = ref(true)

const loadCase = async () => {
  try {
    isLoading.value = true
    const response = await adminService.getModerationQueue()
    const list = response.moderation_queue?.data || response.data || []
    const rawItem = list.find(x => x.id === Number(id))
    if (rawItem) {
      item.value = {
        id: rawItem.id,
        title: rawItem.title || 'Tanpa Judul',
        snippet: rawItem.content || 'Konten kosong.',
        author: rawItem.user?.name || 'Pengguna',
        type: rawItem.type || 'Post'
      }
    }
  } catch (err) {
    console.error('Failed to load case:', err)
  } finally {
    isLoading.value = false
  }
}

const resolveCase = async (action) => {
  try {
    await adminService.resolveModeration(id, action)
    alert(`Kasus berhasil di-${action === 'approve' ? 'setujui' : 'tolak'}.`)
    router.push('/admin/moderation')
  } catch (err) {
    console.error('Error resolving moderation case:', err)
  }
}

onMounted(() => {
  loadCase()
})
</script>
