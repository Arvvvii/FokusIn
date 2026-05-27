<template>
  <div class="p-6 md:p-8 xl:p-10 max-w-[1600px] mx-auto animate-in fade-in duration-500">
    
    <!-- Header -->
    <div class="bg-white/60 backdrop-blur-xl rounded-3xl p-7 md:p-8 shadow-[0_10px_40px_rgba(15,23,42,0.06)] border border-slate-200/60 relative overflow-hidden mb-8">
      <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4 relative z-10">
        <div>
          <h1 class="text-3xl md:text-4xl font-extrabold text-slate-900 tracking-tight leading-tight">System Settings</h1>
          <p class="text-[15px] text-slate-600 font-medium mt-2 max-w-xl leading-relaxed">Konfigurasi keamanan, integrasi API, preferensi sistem, dan parameter platform.</p>
        </div>
        <div class="flex items-center gap-4">
          <button @click="saveChanges" class="px-5 py-2.5 bg-[#081F5C] text-white rounded-xl font-semibold text-sm shadow-sm hover:bg-[#081F5C] transition-all">
            Save Changes
          </button>
        </div>
      </div>
    </div>

    <!-- Settings Forms -->
    <div class="grid grid-cols-1 lg:grid-cols-4 gap-8">
      <div class="lg:col-span-1">
        <div class="flex flex-col gap-2">
          <button 
            @click="activeTab = 'security'"
            :class="activeTab === 'security' ? 'bg-white shadow-sm border border-slate-200 text-[#081F5C]' : 'text-slate-600 hover:bg-slate-50 border border-transparent'"
            class="px-4 py-3 text-left font-bold text-sm rounded-xl transition-all"
          >
            Security Configuration
          </button>
          <button 
            @click="activeTab = 'api'"
            :class="activeTab === 'api' ? 'bg-white shadow-sm border border-slate-200 text-[#081F5C]' : 'text-slate-600 hover:bg-slate-50 border border-transparent'"
            class="px-4 py-3 text-left font-bold text-sm rounded-xl transition-all"
          >
            API & Domain
          </button>
          <button 
            @click="activeTab = 'ai'"
            :class="activeTab === 'ai' ? 'bg-white shadow-sm border border-slate-200 text-[#081F5C]' : 'text-slate-600 hover:bg-slate-50 border border-transparent'"
            class="px-4 py-3 text-left font-bold text-sm rounded-xl transition-all"
          >
            AI Analyzer Parameters
          </button>
          <button 
            @click="activeTab = 'global'"
            :class="activeTab === 'global' ? 'bg-white shadow-sm border border-slate-200 text-[#081F5C]' : 'text-slate-600 hover:bg-slate-50 border border-transparent'"
            class="px-4 py-3 text-left font-bold text-sm rounded-xl transition-all"
          >
            Global Preferences
          </button>
        </div>
      </div>

      <div class="lg:col-span-3">
        <!-- Security Tab -->
        <div v-if="activeTab === 'security'" class="bg-white rounded-2xl border border-slate-200 shadow-sm p-8 animate-in fade-in slide-in-from-bottom-2 duration-300">
          <h2 class="text-xl font-bold text-slate-900 mb-6 border-b border-slate-100 pb-4">Security Configuration</h2>
          
          <div class="space-y-6 max-w-2xl">
            <div>
              <label class="block text-sm font-bold text-slate-700 mb-2">Session Timeout (Minutes)</label>
              <input type="number" value="120" class="w-full px-4 py-3 rounded-xl border border-slate-200 focus:outline-none focus:border-[#334EAC] font-medium text-slate-900" />
            </div>

            <div>
              <label class="block text-sm font-bold text-slate-700 mb-2">Maximum Login Attempts</label>
              <input type="number" value="5" class="w-full px-4 py-3 rounded-xl border border-slate-200 focus:outline-none focus:border-[#334EAC] font-medium text-slate-900" />
            </div>

            <div class="flex items-center justify-between p-4 border border-slate-200 rounded-xl">
              <div>
                <p class="text-sm font-bold text-slate-900">Require 2FA for Admins</p>
                <p class="text-xs text-slate-500 font-medium">Wajibkan otentikasi dua faktor bagi semua akun dengan role Administrator.</p>
              </div>
              <label class="relative inline-flex items-center cursor-pointer">
                <input type="checkbox" checked class="sr-only peer">
                <div class="w-11 h-6 bg-slate-200 peer-focus:outline-none rounded-full peer peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-slate-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all peer-checked:bg-[#081F5C]"></div>
              </label>
            </div>
          </div>
        </div>

        <!-- API Tab -->
        <div v-else-if="activeTab === 'api'" class="bg-white rounded-2xl border border-slate-200 shadow-sm p-8 animate-in fade-in slide-in-from-bottom-2 duration-300">
          <h2 class="text-xl font-bold text-slate-900 mb-6 border-b border-slate-100 pb-4">API & Domain</h2>
          <div class="space-y-6 max-w-2xl">
            <div>
              <label class="block text-sm font-bold text-slate-700 mb-2">Primary Domain</label>
              <input type="text" value="https://fokusin.edu" class="w-full px-4 py-3 rounded-xl border border-slate-200 focus:outline-none focus:border-[#334EAC] font-medium text-slate-900" />
            </div>
          </div>
        </div>

        <!-- AI Tab -->
        <div v-else-if="activeTab === 'ai'" class="bg-white rounded-2xl border border-slate-200 shadow-sm p-8 animate-in fade-in slide-in-from-bottom-2 duration-300">
          <h2 class="text-xl font-bold text-slate-900 mb-6 border-b border-slate-100 pb-4">AI Analyzer Parameters</h2>
          <div class="space-y-6 max-w-2xl">
            <div>
              <label class="block text-sm font-bold text-slate-700 mb-2">Strictness Level (1-10)</label>
              <input type="range" min="1" max="10" value="7" class="w-full" />
            </div>
          </div>
        </div>

        <!-- Global Tab -->
        <div v-else-if="activeTab === 'global'" class="bg-white rounded-2xl border border-slate-200 shadow-sm p-8 animate-in fade-in slide-in-from-bottom-2 duration-300">
          <h2 class="text-xl font-bold text-slate-900 mb-6 border-b border-slate-100 pb-4">Global Preferences</h2>
          <div class="space-y-6 max-w-2xl">
            <div>
              <label class="block text-sm font-bold text-slate-700 mb-2">Default Language</label>
              <select class="w-full px-4 py-3 rounded-xl border border-slate-200 focus:outline-none focus:border-[#334EAC] font-medium text-slate-900 appearance-none bg-white">
                <option value="id" selected>Bahasa Indonesia</option>
                <option value="en">English</option>
              </select>
            </div>
          </div>
        </div>
      </div>
    </div>

  </div>
</template>

<script setup>
import { ref } from 'vue'

const activeTab = ref('security')

const saveChanges = () => {
  alert('Pengaturan sistem berhasil disimpan.')
}
</script>
