<template>
  <div class="space-y-6 md:space-y-8 animate-in fade-in duration-500 w-full">
    
    <!-- Back Navigation -->
    <div class="mb-6 flex items-center gap-2">
      <RouterLink
        :to="baseForumRoute"
        class="text-sm font-bold text-slate-400 hover:text-[#334EAC] transition-colors flex items-center gap-1 w-fit bg-white/50 px-3 py-1.5 rounded-lg border border-slate-200/50"
      >
        ← Kembali ke Forum
      </RouterLink>
    </div>

    <!-- 1. CONDITIONAL HEADER SECTION -->
    <div 
      :class="[
        route.path.startsWith('/tutor') 
          ? 'bg-white border border-slate-200 shadow-sm rounded-2xl p-7 md:p-8 flex flex-col md:flex-row md:items-center justify-between gap-6 relative mb-8' 
          : 'page-header-banner p-7 md:p-8 mb-8'
      ]"
    >
      <div 
        :class="[
          route.path.startsWith('/tutor') 
            ? 'absolute right-0 top-0 w-1/3 h-full bg-gradient-to-l from-[#EDF1F6]/50 to-transparent pointer-events-none' 
            : 'absolute right-0 top-0 w-1/3 h-full bg-gradient-to-l from-[#EDF1F6]/80 to-transparent pointer-events-none'
        ]"
      ></div>
      
      <div class="relative z-10 flex items-center gap-4">
        <span 
          :class="[
            route.path.startsWith('/tutor') 
              ? 'w-12 h-12 rounded-2xl bg-[#334EAC]/10 text-[#334EAC] flex items-center justify-center shrink-0' 
              : 'hidden'
          ]"
        >
          <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M5 12h14"/><path d="M12 5v14"/></svg>
        </span>
        <div>
          <h1 
            :class="[
              route.path.startsWith('/tutor') 
                ? 'text-2xl font-extrabold text-[#081F5C] tracking-tight leading-tight' 
                : 'text-3xl md:text-4xl font-extrabold text-slate-900 tracking-tight leading-tight'
            ]"
          >
            Mulai Diskusi
          </h1>
          <p 
            :class="[
              route.path.startsWith('/tutor') 
                ? 'text-[13px] text-slate-500 font-medium mt-2 max-w-xl leading-relaxed' 
                : 'text-[15px] text-slate-600 font-medium mt-2 max-w-xl leading-relaxed'
            ]"
          >
            Bertanya, berbagi pengetahuan, atau mencari bantuan dari komunitas dan AI.
          </p>
        </div>
      </div>
    </div>

    <!-- Layout: Main Content (w-75%) and Right Sidebar (w-25%) -->
    <div class="flex flex-col xl:flex-row gap-8">
      
      <!-- MAIN EDITOR -->
      <div class="w-full xl:w-[75%] space-y-6">
        
        <!-- Post Form Container -->
        <div class="card-base p-6 md:p-10 space-y-8 group/card">
          
          <!-- Title -->
          <div class="space-y-3">
            <label class="text-[14px] font-bold text-slate-400 uppercase tracking-widest px-1">Judul Diskusi</label>
            <input v-model="postTitle" type="text" placeholder="contoh: Bagaimana cara mengimplementasikan algoritma Dijkstra secara efisien?" class="w-full px-5 py-4 bg-[#F7F2EB]/50 border-2 border-slate-100 rounded-2xl text-[15px] font-bold text-slate-900 placeholder-slate-400 focus:outline-none focus:border-[#7096D1] focus:bg-white focus:ring-4 focus:ring-[#7096D1]/10 transition-all shadow-sm hover:border-slate-200">
          </div>

          <!-- 3-Step Academic Selection -->
          <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            <!-- Jurusan -->
            <div class="space-y-3">
              <label class="text-[14px] font-bold text-slate-400 uppercase tracking-widest px-1">Jurusan</label>
              <div class="relative">
                <select v-model="selectedJurusan" class="w-full px-5 py-4 bg-[#F7F2EB]/50 border-2 border-slate-100 rounded-2xl text-[14px] font-bold text-slate-900 focus:outline-none focus:border-[#7096D1] focus:bg-white focus:ring-4 focus:ring-[#7096D1]/10 transition-all appearance-none cursor-pointer shadow-sm hover:border-slate-200">
                  <option value="" disabled selected>Pilih Jurusan...</option>
                  <option value="Teknologi Rekayasa Instrumentasi dan Kontrol (TRIK)">TRIK</option>
                  <option value="Kearsipan dan Informasi Digital (KID)">KID</option>
                  <option value="Teknik Informatika">Teknik Informatika</option>
                </select>
                <div class="absolute inset-y-0 right-5 flex items-center pointer-events-none text-slate-400"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"><path d="m6 9 6 6 6-6"/></svg></div>
              </div>
            </div>

            <!-- Semester -->
            <div class="space-y-3">
              <label class="text-[14px] font-bold uppercase tracking-widest px-1" :class="selectedJurusan ? 'text-slate-400' : 'text-slate-200'">Semester</label>
              <div class="relative">
                <select v-model="selectedSemester" :disabled="!selectedJurusan" class="w-full px-5 py-4 bg-[#F7F2EB]/50 border-2 border-slate-100 rounded-2xl text-[14px] font-bold text-slate-900 focus:outline-none focus:border-[#7096D1] focus:bg-white focus:ring-4 focus:ring-[#7096D1]/10 transition-all appearance-none cursor-pointer shadow-sm hover:border-slate-200 disabled:opacity-40 disabled:cursor-not-allowed">
                  <option value="" disabled selected>Pilih Semester...</option>
                  <option v-for="i in 6" :key="i" :value="i">Semester {{ i }}</option>
                </select>
                <div class="absolute inset-y-0 right-5 flex items-center pointer-events-none text-slate-400"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"><path d="m6 9 6 6 6-6"/></svg></div>
              </div>
            </div>

            <!-- Mata Kuliah -->
            <div class="space-y-3">
              <label class="text-[14px] font-bold uppercase tracking-widest px-1" :class="selectedSemester ? 'text-slate-400' : 'text-slate-200'">Mata Kuliah</label>
              <div class="relative">
                <select v-model="postCategory" :disabled="!selectedSemester" class="w-full px-5 py-4 bg-[#F7F2EB]/50 border-2 border-slate-100 rounded-2xl text-[14px] font-bold text-slate-900 focus:outline-none focus:border-[#7096D1] focus:bg-white focus:ring-4 focus:ring-[#7096D1]/10 transition-all appearance-none cursor-pointer shadow-sm hover:border-slate-200 disabled:opacity-40 disabled:cursor-not-allowed">
                  <option value="" disabled selected>Pilih Mata Kuliah...</option>
                  <option v-for="cat in filteredCategories" :key="cat.id" :value="cat.id">{{ cat.name }}</option>
                </select>
                <div class="absolute inset-y-0 right-5 flex items-center pointer-events-none text-slate-400"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"><path d="m6 9 6 6 6-6"/></svg></div>
              </div>
            </div>
          </div>

          <!-- Tags -->
          <div class="space-y-3">
            <label class="text-[14px] font-bold text-slate-400 uppercase tracking-widest px-1">Tag</label>
            <div class="w-full bg-[#F7F2EB]/50 border-2 border-slate-100 rounded-2xl p-3 focus-within:border-[#7096D1] focus-within:bg-white focus-within:ring-4 focus-within:ring-[#7096D1]/10 transition-all flex flex-wrap items-center gap-2 shadow-sm hover:border-slate-200">
              <span v-for="tag in activeTags" :key="tag" class="px-3 py-1.5 bg-white text-[#334EAC] text-[13px] font-bold rounded-lg flex items-center gap-1.5 shadow-[0_2px_10px_rgba(0,0,0,0.05)] border border-slate-200">
                {{ tag }}
                <button @click="removeTag(tag)" class="text-slate-400 hover:text-rose-500 transition-colors"><svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"><path d="M18 6 6 18"/><path d="m6 6 12 12"/></svg></button>
              </span>
              <input v-model="newTagInput" @keydown.enter.prevent="addTag" type="text" placeholder="Tekan Enter untuk menambah tag..." class="flex-1 bg-transparent border-none text-[15px] font-bold text-slate-900 placeholder-slate-400 focus:ring-0 px-2 py-1 min-w-[200px]">
            </div>
          </div>

          <!-- Rich Text Editor -->
          <div class="space-y-3">
            <div class="flex items-center justify-between px-1">
              <label class="text-[14px] font-bold text-slate-400 uppercase tracking-widest">Detail</label>
              <div class="flex bg-slate-100 p-1.5 rounded-xl">
                <button class="px-4 py-1.5 bg-white text-slate-900 font-bold text-[13px] rounded-lg shadow-sm">Tulis</button>
                <button @click="triggerPreview" class="px-4 py-1.5 text-slate-500 hover:text-[#081F5C] font-bold text-[13px] rounded-lg transition-colors">Pratinjau</button>
              </div>
            </div>
            
            <div class="border-2 border-slate-100 rounded-3xl overflow-hidden focus-within:border-[#7096D1] focus-within:ring-4 focus-within:ring-[#7096D1]/10 transition-all flex flex-col shadow-sm">
              
              <!-- Toolbar -->
              <div class="bg-slate-50 border-b-2 border-slate-100 px-4 py-3 flex flex-wrap items-center gap-1.5">
                <div class="flex items-center gap-1">
                  <button @click="insertFormat('bold')" class="w-9 h-9 flex items-center justify-center text-slate-500 hover:text-[#081F5C] hover:bg-[#EDF1F6] rounded-xl transition-all" title="Bold"><svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M14 12a4 4 0 0 0 0-8H6v8"/><path d="M15 20a4 4 0 0 0 0-8H6v8Z"/></svg></button>
                  <button @click="insertFormat('italic')" class="w-9 h-9 flex items-center justify-center text-slate-500 hover:text-[#081F5C] hover:bg-[#EDF1F6] rounded-xl transition-all" title="Italic"><svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><line x1="19" x2="10" y1="4" y2="4"/><line x1="14" x2="5" y1="20" y2="20"/><line x1="15" x2="9" y1="4" y2="20"/></svg></button>
                </div>
                
                <div class="w-px h-6 bg-slate-200 mx-2"></div>
                
                <!-- Lists -->
                <div class="flex items-center gap-1">
                  <button @click="insertFormat('list')" class="w-9 h-9 flex items-center justify-center text-slate-500 hover:text-[#081F5C] hover:bg-[#EDF1F6] rounded-xl transition-all" title="List"><svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><line x1="8" x2="21" y1="6" y2="6"/><line x1="8" x2="21" y1="12" y2="12"/><line x1="8" x2="21" y1="18" y2="18"/><line x1="3" x2="3.01" y1="6" y2="6"/><line x1="3" x2="3.01" y1="12" y2="12"/><line x1="3" x2="3.01" y1="18" y2="18"/></svg></button>
                </div>
                
                <div class="w-px h-6 bg-slate-200 mx-2"></div>
                
                <!-- AI Assistant Trigger -->
                <button @click="optimizeWithAI" :disabled="isOptimizing" class="flex items-center gap-2 px-4 py-2 bg-gradient-to-r from-[#081F5C] to-[#334EAC] text-white rounded-xl font-bold text-[13px] shadow-[0_4px_15px_rgba(8,31,92,0.15)] hover:opacity-90 transition-all active:scale-95 ml-auto disabled:opacity-60 disabled:cursor-not-allowed">
                  <svg v-if="isOptimizing" class="animate-spin" xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"><path d="M21 12a9 9 0 1 1-6.219-8.56"/></svg>
                  <svg v-else xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"><path d="m12 3-1.912 5.813a2 2 0 0 1-1.275 1.275L3 12l5.813 1.912a2 2 0 0 1 1.275 1.275L12 21l1.912-5.813a2 2 0 0 1 1.275-1.275L21 12l-5.813-1.912a2 2 0 0 1-1.275-1.275L12 3Z"/></svg>
                  {{ isOptimizing ? 'Mengoptimalkan...' : 'Optimalkan dengan AI' }}
                </button>
              </div>
              
              <!-- Textarea -->
              <textarea v-model="postBody" rows="14" class="w-full p-6 text-[15px] font-medium text-slate-700 bg-white border-none focus:ring-0 resize-y leading-relaxed" placeholder="Jelaskan masalahmu secara detail..."></textarea>
            </div>
          </div>

          <div class="pt-8 mt-4 border-t border-slate-100 flex flex-col sm:flex-row items-center justify-between gap-4">
            <button @click="saveDraft" class="w-full sm:w-auto px-6 py-3.5 text-slate-600 hover:text-[#334EAC] hover:bg-slate-50 font-bold text-[15px] rounded-xl transition-colors">
              Simpan sebagai Draf
            </button>
            <button 
              @click="publishPost" 
              :disabled="isSubmitting"
              class="w-full sm:w-auto px-10 py-3.5 bg-[#334EAC] hover:bg-[#081F5C] text-white rounded-2xl font-bold text-[15px] transition-all active:scale-95 text-center disabled:opacity-75 disabled:cursor-not-allowed flex items-center justify-center gap-2"
            >
              <svg v-if="isSubmitting" class="animate-spin text-white" xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"><path d="M21 12a9 9 0 1 1-6.219-8.56"/></svg>
              {{ isSubmitting ? 'Mempublikasikan...' : 'Publikasikan Diskusi' }}
            </button>
          </div>
          
        </div>
      </div>

      <!-- RIGHT SIDEBAR (xl:w-[25%]) -->
      <div class="w-full xl:w-[25%] shrink-0 space-y-6">
        
        <!-- Community Guidelines -->
        <div class="card-base p-7 group/card">
          <div class="flex items-center gap-3 mb-6">
            <div class="w-10 h-10 rounded-[1rem] bg-[#EDF1F6] flex items-center justify-center text-[#334EAC]">
              <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"/><line x1="12" x2="12" y1="8" y2="12"/><line x1="12" x2="12.01" y1="16" y2="16"/></svg>
            </div>
            <h3 class="text-[17px] font-bold text-slate-900 tracking-tight">Panduan Memposting</h3>
          </div>
          
          <ul class="space-y-5">
            <li class="flex items-start gap-3">
              <span class="w-6 h-6 rounded-lg bg-emerald-50 text-emerald-600 flex items-center justify-center shrink-0 mt-0.5 text-[11px] font-bold border border-emerald-100">1</span>
              <p class="text-[14px] font-bold text-slate-600 leading-snug">Spesifik dan bayangkan kamu sedang bertanya kepada orang lain.</p>
            </li>
            <li class="flex items-start gap-3">
              <span class="w-6 h-6 rounded-lg bg-emerald-50 text-emerald-600 flex items-center justify-center shrink-0 mt-0.5 text-[11px] font-bold border border-emerald-100">2</span>
              <p class="text-[14px] font-bold text-slate-600 leading-snug">Sertakan semua informasi yang dibutuhkan seseorang untuk menjawab pertanyaanmu.</p>
            </li>
          </ul>
        </div>

      </div>

    </div>

    <!-- Success Toast -->
    <div v-if="showSuccess" class="fixed bottom-6 right-6 z-50 bg-[#334EAC] text-white px-6 py-4 rounded-2xl shadow-xl flex items-center gap-3 animate-in slide-in-from-bottom-5">
      <div class="w-8 h-8 bg-white/20 rounded-full flex items-center justify-center shrink-0">
        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"><polyline points="20 6 9 17 4 12"/></svg>
      </div>
      <div>
        <h4 class="font-bold text-sm">Berhasil!</h4>
        <p class="text-xs text-[#D0E3FF] font-medium">{{ toastMessage }}</p>
      </div>
    </div>

    <!-- Error Toast -->
    <div v-if="showError" class="fixed bottom-6 right-6 z-50 bg-rose-600 text-white px-6 py-4 rounded-2xl shadow-xl flex items-center gap-3 animate-in slide-in-from-bottom-5">
      <div class="w-8 h-8 bg-white/20 rounded-full flex items-center justify-center shrink-0">
        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round">
          <circle cx="12" cy="12" r="10"/><line x1="12" x2="12" y1="8" y2="12"/><line x1="12" x2="12.01" y1="16" y2="16"/>
        </svg>
      </div>
      <div>
        <h4 class="font-bold text-sm">Gagal!</h4>
        <p class="text-xs text-rose-100 font-medium">{{ errorMessage }}</p>
      </div>
    </div>

  </div>
</template>

<script setup>
import { ref, computed, onMounted, watch } from 'vue'
import { RouterLink, useRoute, useRouter } from 'vue-router'
import { forumService } from '@/services/forum.service'

const route = useRoute()
const router = useRouter()

const postTitle = ref('')
const selectedJurusan = ref('')
const selectedSemester = ref('')
const postCategory = ref('')
const postBody = ref('')
const activeTags = ref(['algoritma'])
const newTagInput = ref('')

const showSuccess = ref(false)
const toastMessage = ref('')
const showError = ref(false)
const errorMessage = ref('')
const isSubmitting = ref(false)
const categories = ref([])

const baseForumRoute = computed(() => {
  return route.path.startsWith('/tutor') ? '/tutor/forum' : '/pelajar/forum'
})

const filteredCategories = computed(() => {
  return categories.value.filter(c => 
    c.jurusan === selectedJurusan.value && 
    String(c.semester) === String(selectedSemester.value)
  )
})

watch(selectedJurusan, () => {
  selectedSemester.value = ''
  postCategory.value = ''
})

watch(selectedSemester, () => {
  postCategory.value = ''
})

const fetchCategories = async () => {
  try {
    categories.value = await forumService.getCategories()
  } catch (err) {
    console.error('Error fetching categories:', err)
  }
}

onMounted(() => {
  fetchCategories()
})

const addTag = () => {
  const val = newTagInput.value.trim().toLowerCase()
  if (val && !activeTags.value.includes(val) && activeTags.value.length < 5) {
    activeTags.value.push(val)
  }
  newTagInput.value = ''
}

const removeTag = (tag) => {
  activeTags.value = activeTags.value.filter(t => t !== tag)
}

const triggerPreview = () => {
  alert('Pratinjau Markdown:\n\n' + postBody.value)
}

const insertFormat = (type) => {
  if (type === 'bold') postBody.value += ' **Teks Tebal**'
  if (type === 'italic') postBody.value += ' *Teks Miring*'
  if (type === 'list') postBody.value += '\n- Item List'
}

const isOptimizing = ref(false)

const optimizeWithAI = async () => {
  if (!postBody.value.trim()) {
    alert('Tulis pertanyaan terlebih dahulu agar AI bisa mengoptimasi tata bahasa Anda.')
    return
  }
  if (postBody.value.trim().length < 10) {
    alert('Teks terlalu pendek untuk dioptimasi. Tuliskan minimal 10 karakter.')
    return
  }

  isOptimizing.value = true
  try {
    const result = await forumService.optimizePost({
      content: postBody.value.trim(),
      title: postTitle.value.trim() || undefined,
    })

    if (result.optimized_content) {
      const originalText = postBody.value
      postBody.value = result.optimized_content

      toastMessage.value = 'Pertanyaan berhasil dioptimalkan oleh AI!'
      showSuccess.value = true
      setTimeout(() => { showSuccess.value = false }, 3000)
    } else {
      errorMessage.value = 'AI tidak mengembalikan hasil. Silakan coba lagi.'
      showError.value = true
      setTimeout(() => { showError.value = false }, 3000)
    }
  } catch (err) {
    errorMessage.value = typeof err === 'string' ? err : 'Gagal mengoptimalkan teks. Silakan coba lagi.'
    showError.value = true
    setTimeout(() => { showError.value = false }, 3000)
  } finally {
    isOptimizing.value = false
  }
}

const saveDraft = () => {
  toastMessage.value = 'Pesan diskusi berhasil disimpan sebagai draf!'
  showSuccess.value = true
  setTimeout(() => { showSuccess.value = false }, 3000)
}

const publishPost = async () => {
  if (!postTitle.value.trim() || !postCategory.value || !postBody.value.trim()) {
    alert('Harap lengkapi judul, kategori, dan detail diskusi terlebih dahulu.')
    return
  }
  
  isSubmitting.value = true
  showSuccess.value = false
  showError.value = false

  try {
    const payload = {
      category_id: postCategory.value,
      title: postTitle.value.trim(),
      content: postBody.value.trim()
    }
    const newPost = await forumService.createPost(payload)
    
    toastMessage.value = 'Diskusi baru berhasil diterbitkan di forum!'
    showSuccess.value = true
    setTimeout(() => {
      showSuccess.value = false
      router.push(`${baseForumRoute.value}/${newPost.id}`)
    }, 1500)
  } catch (err) {
    errorMessage.value = err || 'Gagal menerbitkan diskusi baru.'
    showError.value = true
    setTimeout(() => {
      showError.value = false
    }, 3000)
  } finally {
    isSubmitting.value = false
  }
}
</script>
