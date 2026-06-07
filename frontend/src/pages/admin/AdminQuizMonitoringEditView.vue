<template>
  <div class="p-6 md:p-8 xl:p-10 max-w-[1600px] mx-auto animate-in fade-in duration-500">
    <!-- Back Navigation -->
    <div class="mb-6 flex items-center gap-2">
      <RouterLink
        :to="`/admin/quiz-monitoring/${id}`"
        class="text-sm font-bold text-slate-400 hover:text-[#334EAC] transition-colors flex items-center gap-1 w-fit bg-white/50 px-3 py-1.5 rounded-lg border border-slate-200/50"
      >
        ← Kembali ke Laporan Kuis
      </RouterLink>
    </div>

    <div class="admin-dashboard-hero mb-8">
      <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4 relative z-10">
        <div>
          <h1 class="text-3xl md:text-4xl font-extrabold text-slate-900 tracking-tight leading-tight">Edit Question</h1>
          <p class="text-[15px] text-slate-600 font-medium mt-2 max-w-xl leading-relaxed">Perbarui teks soal, jawaban, atau tingkat kesulitan.</p>
        </div>
      </div>
    </div>

    <div class="admin-form-card max-w-3xl">
      <h2 class="form-section-title">Informasi Soal</h2>
      
      <div class="space-y-5">
        <div>
          <label class="admin-label">Teks Soal</label>
          <textarea class="admin-input min-h-[120px]" placeholder="Masukkan pertanyaan soal...">Apa fungsi mitokondria?</textarea>
        </div>
        
        <div class="grid grid-cols-2 gap-5">
          <div>
            <label class="admin-label">Kunci Jawaban</label>
            <select class="admin-input">
              <option value="A">Pilihan A</option>
              <option value="B" selected>Pilihan B</option>
              <option value="C">Pilihan C</option>
              <option value="D">Pilihan D</option>
            </select>
          </div>
          <div>
            <label class="admin-label">Bobot Nilai</label>
            <input type="number" class="admin-input" value="10" />
          </div>
        </div>

        <div class="space-y-3 mt-4">
          <label class="admin-label">Opsi Jawaban</label>
          <div class="flex items-center gap-3">
            <span class="font-bold text-slate-500 w-6">A</span>
            <input type="text" class="admin-input" value="Sintesis protein" />
          </div>
          <div class="flex items-center gap-3">
            <span class="font-bold text-[#0F8A7E] w-6">B</span>
            <input type="text" class="admin-input border-[#17A99A] bg-[#f0fdfa]" value="Respirasi sel" />
          </div>
          <div class="flex items-center gap-3">
            <span class="font-bold text-slate-500 w-6">C</span>
            <input type="text" class="admin-input" value="Pembelahan sel" />
          </div>
          <div class="flex items-center gap-3">
            <span class="font-bold text-slate-500 w-6">D</span>
            <input type="text" class="admin-input" value="Fotosintesis" />
          </div>
        </div>

        <div class="pt-6 border-t border-slate-100 flex justify-end gap-3 mt-8">
          <button @click="$router.back()" class="btn-modal-secondary">Batal</button>
          <button @click="$router.push(`/admin/quiz-monitoring/${id}`)" class="btn-modal-primary">Simpan Perubahan</button>
        </div>
      </div>
    </div>
  </div>
</template>

<script setup>
import { useRoute, useRouter, RouterLink } from 'vue-router'

const route = useRoute()
const router = useRouter()
const id = route.params.id || '201'
</script>
