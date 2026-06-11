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
        <button 
          @click="resolveCase('approve')" 
          :disabled="resolving"
          class="px-6 py-3 bg-emerald-50 text-emerald-700 border border-emerald-200 font-bold text-sm rounded-xl hover:bg-emerald-100 transition-colors disabled:opacity-50"
        >
          Approve (False Positive)
        </button>
        <button 
          @click="resolveCase('reject')" 
          :disabled="resolving"
          class="px-6 py-3 bg-rose-600 text-white font-bold text-sm rounded-xl hover:bg-rose-700 transition-colors shadow-sm disabled:opacity-50"
        >
          Delete Content & Suspend User
        </button>
      </div>
    </div>
  </div>
</template>

<script setup>
import { ref, onMounted } from 'vue'
import { useRoute, RouterLink, useRouter } from 'vue-router'
import { adminService } from '@/services/admin.service'
import { useToastStore } from '@/stores/toast'

const route = useRoute()
const router = useRouter()
const toastStore = useToastStore()
const id = route.params.id
const item = ref(null)
const isLoading = ref(true)
const resolving = ref(false)

const loadCase = async () => {
  try {
    isLoading.value = true
    const response = await adminService.getModerationQueue()
    const data = response.data || response || {}
    const list = data.moderation_queue?.data || data.moderation_queue || data || []
    const rawItem = list.find(x => x.id === Number(id))
    if (rawItem) {
      item.value = {
        id: rawItem.id,
        title: rawItem.title || 'Tanpa Judul',
        snippet: rawItem.content || 'Konten kosong.',
        author: rawItem.user?.name || 'Pengguna',
        type: rawItem.type || 'Post'
      }
    } else {
      toastStore.error('Kasus moderasi tidak ditemukan.')
    }
  } catch (err) {
    console.error('Failed to load case:', err)
    toastStore.error('Gagal memuat detail kasus moderasi.')
  } finally {
    isLoading.value = false
  }
}

const resolveCase = async (action) => {
  resolving.value = true
  try {
    if (action === 'approve') {
      await adminService.resolveModeration(id, 'approve')
      toastStore.success('Konten disetujui dan diverifikasi.')
    } else {
      await adminService.deleteModerationPost(id)
      toastStore.success('Konten berhasil dihapus.')
    }
    router.push('/admin/moderation')
  } catch (err) {
    console.error('Error resolving moderation case:', err)
    toastStore.error(err || 'Gagal memproses moderasi konten.')
  } finally {
    resolving.value = false
  }
}

onMounted(() => {
  loadCase()
})
</script>
