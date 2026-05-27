<template>
  <div class="p-6 md:p-8 xl:p-10 max-w-[1600px] mx-auto animate-in fade-in duration-500">
    
    <!-- Header -->
    <div class="bg-white/60 backdrop-blur-xl rounded-3xl p-7 md:p-8 shadow-[0_10px_40px_rgba(15,23,42,0.06)] border border-slate-200/60 relative overflow-hidden mb-8">
      <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4 relative z-10">
        <div>
          <h1 class="text-3xl md:text-4xl font-extrabold text-slate-900 tracking-tight leading-tight">Materials & Category Management</h1>
          <p class="text-[15px] text-slate-600 font-medium mt-2 max-w-xl leading-relaxed">Kelola taksonomi akademik, kategori materi, forum, dan AI analyzer.</p>
        </div>
        <div class="flex items-center gap-4">
          <button 
            @click="$router.push({ name: 'admin-materials-create' })"
            class="px-5 py-2.5 bg-indigo-600 text-white rounded-xl font-semibold text-sm shadow-sm hover:bg-indigo-700 transition-all"
          >
            + Tambah Kategori
          </button>
        </div>
      </div>
    </div>

    <!-- Category List -->
    <div class="bg-white rounded-2xl border border-slate-200 shadow-sm overflow-hidden mb-8">
      <div class="p-6 border-b border-slate-100 flex items-center justify-between">
        <h2 class="text-lg font-bold text-slate-900 tracking-tight">Academic Categories</h2>
      </div>
      
      <div class="overflow-x-auto">
        <table class="w-full text-left border-collapse">
          <thead>
            <tr class="bg-slate-50 border-b border-slate-100">
              <th class="px-6 py-4 text-xs font-bold text-slate-500 uppercase tracking-wider">Group</th>
              <th class="px-6 py-4 text-xs font-bold text-slate-500 uppercase tracking-wider">Category Name</th>
              <th class="px-6 py-4 text-xs font-bold text-slate-500 uppercase tracking-wider">Modules Attached</th>
              <th class="px-6 py-4 text-xs font-bold text-slate-500 uppercase tracking-wider text-right">Action</th>
            </tr>
          </thead>
          <tbody class="divide-y divide-slate-100">
            <tr v-for="cat in categories" :key="cat.id" class="hover:bg-slate-50/50 transition-colors">
              <td class="px-6 py-4 text-sm font-bold text-indigo-600">{{ cat.group }}</td>
              <td class="px-6 py-4 text-sm font-bold text-slate-900">{{ cat.name }}</td>
              <td class="px-6 py-4 text-sm text-slate-700 font-medium">{{ cat.modules }} items</td>
              <td class="px-6 py-4 text-right">
                <button class="px-3 py-1.5 text-xs font-bold text-slate-600 bg-white border border-slate-200 rounded-lg mr-2 hover:bg-slate-50">Edit</button>
                <button class="px-3 py-1.5 text-xs font-bold text-rose-600 bg-rose-50 rounded-lg hover:bg-rose-100">Hapus</button>
              </td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</template>

<script setup>
import { ref } from 'vue'

const categories = ref([
  { id: 1, group: 'STEM', name: 'Kalkulus Dasar', modules: 45 },
  { id: 2, group: 'STEM', name: 'Fisika Kuantum', modules: 12 },
  { id: 3, group: 'Social Sciences', name: 'Sosiologi Modern', modules: 8 },
])
</script>
