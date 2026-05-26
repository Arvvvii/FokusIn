<template>
  <div class="p-6 md:p-8 xl:p-10 max-w-4xl mx-auto animate-in fade-in duration-500">
    
    <!-- Header -->
    <div class="bg-white/80 backdrop-blur-xl rounded-3xl p-7 md:p-8 shadow-[0_10px_40px_rgba(15,23,42,0.06)] border border-white/40 relative overflow-hidden mb-8">
      <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4 relative z-10">
        <div class="flex items-center gap-4">
          <button 
            @click="$router.push({ name: 'admin-quiz-monitoring' })"
            class="w-10 h-10 rounded-full flex items-center justify-center text-slate-500 hover:bg-slate-100 hover:text-slate-900 transition-colors shrink-0 bg-white shadow-sm border border-slate-200"
          >
            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="m15 18-6-6 6-6"/></svg>
          </button>
          <div>
            <h1 class="text-[28px] font-bold text-slate-900 tracking-tight mb-1">Tambah Quiz Dataset</h1>
            <p class="text-base text-slate-500 font-medium">Impor atau buat set pertanyaan baru untuk sistem kuis.</p>
          </div>
        </div>
      </div>
    </div>

    <!-- Form Section -->
    <div class="bg-white rounded-2xl border border-slate-200 shadow-sm p-6 md:p-8">
      <h3 class="text-xl font-bold text-slate-900 mb-6 border-b border-slate-100 pb-4">Detail Dataset</h3>
      <form @submit.prevent="submitForm" class="space-y-6">
        
        <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
          <div class="space-y-2">
            <label class="text-sm font-semibold text-slate-900 block">Judul Kuis</label>
            <input 
              v-model="form.title"
              type="text" 
              required
              class="w-full px-4 py-2.5 bg-white border border-slate-200 rounded-xl text-sm text-slate-900 placeholder-slate-400 focus:outline-none focus:border-indigo-500 focus:ring-4 focus:ring-indigo-500/10 transition-all shadow-sm"
              placeholder="Contoh: Kuis Biologi Seluler"
            >
          </div>
          <div class="space-y-2">
            <label class="text-sm font-semibold text-slate-900 block">Mata Pelajaran</label>
            <select 
              v-model="form.subject"
              required
              class="w-full px-4 py-2.5 bg-white border border-slate-200 rounded-xl text-sm text-slate-900 focus:outline-none focus:border-indigo-500 focus:ring-4 focus:ring-indigo-500/10 transition-all shadow-sm appearance-none cursor-pointer"
            >
              <option value="biologi">Biologi</option>
              <option value="matematika">Matematika</option>
              <option value="fisika">Fisika</option>
              <option value="kimia">Kimia</option>
            </select>
          </div>
        </div>

        <div class="space-y-2">
          <label class="text-sm font-semibold text-slate-900 block">Upload Dataset (JSON/CSV)</label>
          <div class="border-2 border-dashed border-slate-300 rounded-xl p-8 text-center hover:bg-slate-50 transition-colors cursor-pointer bg-white shadow-sm">
            <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="mx-auto text-slate-400 mb-3"><path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"/><polyline points="17 8 12 3 7 8"/><line x1="12" x2="12" y1="3" y2="15"/></svg>
            <p class="text-sm font-bold text-slate-900">Pilih file untuk diupload</p>
            <p class="text-xs text-slate-500 mt-1">atau tarik dan lepas file ke sini</p>
          </div>
        </div>

        <!-- Actions -->
        <div class="pt-6 border-t border-slate-100 flex items-center justify-end gap-3">
          <button 
            type="button"
            @click="$router.push({ name: 'admin-quiz-monitoring' })"
            class="text-sm font-medium h-10 px-5 rounded-xl bg-white border border-slate-200 text-slate-600 hover:bg-slate-50 transition-colors shadow-sm"
          >
            Batal
          </button>
          <button 
            type="submit"
            class="text-sm font-medium h-10 px-5 rounded-xl bg-indigo-600 text-white shadow-sm hover:bg-indigo-700 transition-colors"
          >
            Impor & Simpan
          </button>
        </div>
        
      </form>
    </div>
  </div>
</template>

<script setup>
import { reactive } from 'vue'
import { useRouter } from 'vue-router'

const router = useRouter()

const form = reactive({
  title: '',
  subject: 'biologi'
})

const submitForm = () => {
  router.push({ name: 'admin-quiz-monitoring' })
}
</script>
