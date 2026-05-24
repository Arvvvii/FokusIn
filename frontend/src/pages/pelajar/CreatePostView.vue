<template>
  <div class="space-y-6 md:space-y-8 animate-in fade-in duration-500">
    
    <!-- Header -->
    <div class="mb-8">
      <div class="flex items-center gap-2 mb-2">
        <RouterLink to="/pelajar/forum" class="text-sm font-bold text-slate-400 hover:text-[#334EAC] transition-colors flex items-center gap-1 w-fit bg-white/50 px-3 py-1.5 rounded-lg border border-slate-200/50 shadow-sm">
          <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="m15 18-6-6 6-6"/></svg>
          Back to Forum
        </RouterLink>
      </div>
      <h1 class="text-3xl md:text-4xl font-extrabold text-[#081F5C] tracking-tight mb-2 mt-4">Start a Discussion</h1>
      <p class="text-slate-500 font-medium text-lg max-w-2xl">Ask questions, share knowledge, or seek help from the community and AI.</p>
    </div>

    <!-- Layout: Main Content (w-75%) and Right Sidebar (w-25%) -->
    <div class="flex flex-col xl:flex-row gap-8">
      
      <!-- MAIN EDITOR -->
      <div class="w-full xl:w-[75%] space-y-6">
        
        <!-- Post Form Container -->
        <div class="bg-white rounded-[2.5rem] p-6 md:p-10 shadow-[0_4px_30px_rgba(0,0,0,0.03)] border border-slate-100/80 space-y-8">
          
          <!-- Title & Category -->
          <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            <div class="md:col-span-2 space-y-3">
              <label class="text-[14px] font-extrabold text-[#081F5C] px-1">Discussion Title</label>
              <input type="text" placeholder="e.g. How to implement Dijkstra's algorithm efficiently?" class="w-full px-5 py-4 bg-[#F7F2EB]/50 border-2 border-slate-100 rounded-[1.25rem] text-[15px] font-bold text-[#081F5C] placeholder-slate-400 focus:outline-none focus:border-[#7096D1] focus:bg-white focus:ring-4 focus:ring-[#7096D1]/10 transition-all shadow-sm hover:border-slate-200">
            </div>
            <div class="space-y-3">
              <label class="text-[14px] font-extrabold text-[#081F5C] px-1">Category</label>
              <div class="relative">
                <select class="w-full px-5 py-4 bg-[#F7F2EB]/50 border-2 border-slate-100 rounded-[1.25rem] text-[15px] font-bold text-[#081F5C] focus:outline-none focus:border-[#7096D1] focus:bg-white focus:ring-4 focus:ring-[#7096D1]/10 transition-all appearance-none cursor-pointer shadow-sm hover:border-slate-200">
                  <option value="" disabled selected>Select category...</option>
                  <option>Computer Science</option>
                  <option>Mathematics</option>
                  <option>Physics</option>
                  <option>English</option>
                </select>
                <div class="absolute inset-y-0 right-5 flex items-center pointer-events-none text-slate-400">
                  <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"><path d="m6 9 6 6 6-6"/></svg>
                </div>
              </div>
            </div>
          </div>

          <!-- Tags -->
          <div class="space-y-3">
            <label class="text-[14px] font-extrabold text-[#081F5C] px-1">Tags</label>
            <div class="w-full bg-[#F7F2EB]/50 border-2 border-slate-100 rounded-[1.25rem] p-3 focus-within:border-[#7096D1] focus-within:bg-white focus-within:ring-4 focus-within:ring-[#7096D1]/10 transition-all flex flex-wrap items-center gap-2 shadow-sm hover:border-slate-200">
              <span class="px-3 py-1.5 bg-white text-[#334EAC] text-[13px] font-extrabold rounded-lg flex items-center gap-1.5 shadow-[0_2px_10px_rgba(0,0,0,0.05)] border border-slate-200">
                algorithms
                <button class="text-slate-400 hover:text-rose-500 transition-colors"><svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"><path d="M18 6 6 18"/><path d="m6 6 12 12"/></svg></button>
              </span>
              <input type="text" placeholder="Add up to 5 tags..." class="flex-1 bg-transparent border-none text-[15px] font-bold text-[#081F5C] placeholder-slate-400 focus:ring-0 px-2 py-1 min-w-[150px]">
            </div>
          </div>

          <!-- Rich Text Editor -->
          <div class="space-y-3">
            <div class="flex items-center justify-between px-1">
              <label class="text-[14px] font-extrabold text-[#081F5C]">Details</label>
              <div class="flex bg-slate-100 p-1.5 rounded-xl">
                <button class="px-4 py-1.5 bg-white text-[#081F5C] font-extrabold text-[13px] rounded-lg shadow-sm">Write</button>
                <button class="px-4 py-1.5 text-slate-500 hover:text-[#081F5C] font-bold text-[13px] rounded-lg transition-colors">Preview</button>
              </div>
            </div>
            
            <div class="border-2 border-slate-100 rounded-3xl overflow-hidden focus-within:border-[#7096D1] focus-within:ring-4 focus-within:ring-[#7096D1]/10 transition-all flex flex-col shadow-sm">
              
              <!-- Toolbar -->
              <div class="bg-slate-50 border-b-2 border-slate-100 px-4 py-3 flex flex-wrap items-center gap-1.5">
                <!-- Text Formatting -->
                <div class="flex items-center gap-1">
                  <button class="w-9 h-9 flex items-center justify-center text-slate-500 hover:text-[#081F5C] hover:bg-[#EDF1F6] rounded-xl transition-all"><svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M14 12a4 4 0 0 0 0-8H6v8"/><path d="M15 20a4 4 0 0 0 0-8H6v8Z"/></svg></button>
                  <button class="w-9 h-9 flex items-center justify-center text-slate-500 hover:text-[#081F5C] hover:bg-[#EDF1F6] rounded-xl transition-all"><svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><line x1="19" x2="10" y1="4" y2="4"/><line x1="14" x2="5" y1="20" y2="20"/><line x1="15" x2="9" y1="4" y2="20"/></svg></button>
                  <button class="w-9 h-9 flex items-center justify-center text-slate-500 hover:text-[#081F5C] hover:bg-[#EDF1F6] rounded-xl transition-all"><svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M4 12v8a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2v-8"/><polyline points="16 6 12 2 8 6"/><line x1="12" x2="12" y1="2" y2="15"/></svg></button>
                </div>
                
                <div class="w-px h-6 bg-slate-200 mx-2"></div>
                
                <!-- Lists -->
                <div class="flex items-center gap-1">
                  <button class="w-9 h-9 flex items-center justify-center text-slate-500 hover:text-[#081F5C] hover:bg-[#EDF1F6] rounded-xl transition-all"><svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><line x1="8" x2="21" y1="6" y2="6"/><line x1="8" x2="21" y1="12" y2="12"/><line x1="8" x2="21" y1="18" y2="18"/><line x1="3" x2="3.01" y1="6" y2="6"/><line x1="3" x2="3.01" y1="12" y2="12"/><line x1="3" x2="3.01" y1="18" y2="18"/></svg></button>
                  <button class="w-9 h-9 flex items-center justify-center text-slate-500 hover:text-[#081F5C] hover:bg-[#EDF1F6] rounded-xl transition-all"><svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><line x1="10" x2="21" y1="6" y2="6"/><line x1="10" x2="21" y1="12" y2="12"/><line x1="10" x2="21" y1="18" y2="18"/><path d="M4 6h1v4"/><path d="M4 10h2"/><path d="M6 18H4c0-1 2-2 2-3s-1-1.5-2-1"/></svg></button>
                </div>
                
                <div class="w-px h-6 bg-slate-200 mx-2"></div>
                
                <!-- Code & Media -->
                <div class="flex items-center gap-1">
                  <button class="w-9 h-9 flex items-center justify-center text-slate-500 hover:text-[#081F5C] hover:bg-[#EDF1F6] rounded-xl transition-all"><svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><polyline points="16 18 22 12 16 6"/><polyline points="8 6 2 12 8 18"/></svg></button>
                  <button class="w-9 h-9 flex items-center justify-center text-slate-500 hover:text-[#081F5C] hover:bg-[#EDF1F6] rounded-xl transition-all"><svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><rect width="18" height="18" x="3" y="3" rx="2" ry="2"/><circle cx="9" cy="9" r="2"/><path d="m21 15-3.086-3.086a2 2 0 0 0-2.828 0L6 21"/></svg></button>
                  <button class="w-9 h-9 flex items-center justify-center text-slate-500 hover:text-[#081F5C] hover:bg-[#EDF1F6] rounded-xl transition-all"><svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M21.5 12H16c-.7 2-2 3-4 3s-3.3-1-4-3H2.5"/><path d="M5.5 5.1L2 12v6c0 1.1.9 2 2 2h16a2 2 0 0 0 2-2v-6l-3.5-6.9A2 2 0 0 0 16.5 4h-9c-.9 0-1.7.6-2 1.5z"/></svg></button>
                </div>
                
                <div class="flex-1"></div>
                
                <!-- AI Assistant Trigger -->
                <button class="flex items-center gap-2 px-4 py-2 bg-gradient-to-r from-[#081F5C] to-[#334EAC] text-white rounded-xl font-extrabold text-[13px] shadow-[0_4px_15px_rgba(8,31,92,0.15)] hover:opacity-90 transition-opacity active:scale-95">
                  <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"><path d="m12 3-1.912 5.813a2 2 0 0 1-1.275 1.275L3 12l5.813 1.912a2 2 0 0 1 1.275 1.275L12 21l1.912-5.813a2 2 0 0 1 1.275-1.275L21 12l-5.813-1.912a2 2 0 0 1-1.275-1.275L12 3Z"/></svg>
                  Optimize with AI
                </button>
              </div>
              
              <!-- Textarea -->
              <textarea rows="14" class="w-full p-6 text-[15px] font-medium text-slate-700 bg-white border-none focus:ring-0 resize-y leading-relaxed" placeholder="Describe your problem in detail. You can use Markdown, attach code snippets, or use LaTeX for math formulas..."></textarea>
            </div>
            
            <!-- Attachment Area -->
            <div class="flex items-center justify-between mt-2 px-1">
              <p class="text-[12px] font-bold text-slate-400">Styling with Markdown is supported.</p>
              <button class="flex items-center gap-1.5 text-[12px] font-extrabold text-[#334EAC] hover:text-[#081F5C] transition-colors bg-[#EDF1F6] px-3 py-1.5 rounded-lg">
                <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M21.44 11.05l-9.19 9.19a6 6 0 0 1-8.49-8.49l9.19-9.19a4 4 0 0 1 5.66 5.66l-9.2 9.19a2 2 0 0 1-2.83-2.83l8.49-8.48"/></svg>
                Attach Files (Max 5MB)
              </button>
            </div>
          </div>

          <div class="pt-8 mt-4 border-t border-slate-100 flex flex-col sm:flex-row items-center justify-between gap-4">
            <button class="w-full sm:w-auto px-6 py-3.5 text-[#081F5C] hover:bg-slate-50 font-extrabold text-[15px] rounded-xl transition-colors">
              Save as Draft
            </button>
            <button class="w-full sm:w-auto px-10 py-3.5 bg-[#334EAC] hover:bg-[#081F5C] text-white rounded-[1.25rem] font-extrabold text-[15px] transition-all shadow-[0_8px_20px_rgba(51,78,172,0.2)] active:scale-95">
              Publish Discussion
            </button>
          </div>
          
        </div>
      </div>

      <!-- RIGHT SIDEBAR (xl:w-[25%]) -->
      <div class="w-full xl:w-[25%] shrink-0 space-y-6">
        
        <!-- Community Guidelines -->
        <div class="bg-white rounded-[2rem] p-7 shadow-[0_4px_24px_rgba(0,0,0,0.02)] border border-slate-100/80">
          <div class="flex items-center gap-3 mb-6">
            <div class="w-10 h-10 rounded-[1rem] bg-[#EDF1F6] flex items-center justify-center text-[#334EAC]">
              <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"/><line x1="12" x2="12" y1="8" y2="12"/><line x1="12" x2="12.01" y1="16" y2="16"/></svg>
            </div>
            <h3 class="text-[17px] font-extrabold text-[#081F5C]">Posting Guidelines</h3>
          </div>
          
          <ul class="space-y-5">
            <li class="flex items-start gap-3">
              <span class="w-6 h-6 rounded-lg bg-emerald-50 text-emerald-600 flex items-center justify-center shrink-0 mt-0.5 text-[11px] font-extrabold border border-emerald-100">1</span>
              <p class="text-[14px] font-bold text-slate-600 leading-snug">Be specific and imagine you are asking a question to another person.</p>
            </li>
            <li class="flex items-start gap-3">
              <span class="w-6 h-6 rounded-lg bg-emerald-50 text-emerald-600 flex items-center justify-center shrink-0 mt-0.5 text-[11px] font-extrabold border border-emerald-100">2</span>
              <p class="text-[14px] font-bold text-slate-600 leading-snug">Include all the information someone would need to answer your question.</p>
            </li>
            <li class="flex items-start gap-3">
              <span class="w-6 h-6 rounded-lg bg-emerald-50 text-emerald-600 flex items-center justify-center shrink-0 mt-0.5 text-[11px] font-extrabold border border-emerald-100">3</span>
              <p class="text-[14px] font-bold text-slate-600 leading-snug">Format your code using Markdown backticks.</p>
            </li>
            <li class="flex items-start gap-3">
              <span class="w-6 h-6 rounded-lg bg-emerald-50 text-emerald-600 flex items-center justify-center shrink-0 mt-0.5 text-[11px] font-extrabold border border-emerald-100">4</span>
              <p class="text-[14px] font-bold text-slate-600 leading-snug">Review your question before posting.</p>
            </li>
          </ul>
        </div>

        <!-- AI Suggestion Widget -->
        <div class="bg-gradient-to-br from-[#081F5C] to-[#334EAC] rounded-[2rem] p-7 text-white shadow-[0_15px_40px_rgba(8,31,92,0.15)] relative overflow-hidden border border-white/5">
          <div class="absolute -right-10 -bottom-10 w-40 h-40 bg-[#7096D1] blur-3xl rounded-full opacity-30 pointer-events-none"></div>
          <div class="relative z-10">
            <div class="flex items-center gap-2 mb-4">
              <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="#BAD6EB" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="m12 3-1.912 5.813a2 2 0 0 1-1.275 1.275L3 12l5.813 1.912a2 2 0 0 1 1.275 1.275L12 21l1.912-5.813a2 2 0 0 1 1.275-1.275L21 12l-5.813-1.912a2 2 0 0 1-1.275-1.275L12 3Z"/><path d="M5 3v4"/><path d="M19 17v4"/><path d="M3 5h4"/><path d="M17 19h4"/></svg>
              <h3 class="text-[11px] font-extrabold tracking-widest uppercase text-[#BAD6EB]">Smart Writer</h3>
            </div>
            <p class="text-[14px] font-medium text-white mb-6 leading-relaxed">Having trouble expressing your problem? Let Fokus AI help you structure your question for better answers.</p>
            <button class="w-full py-3.5 bg-white text-[#081F5C] hover:bg-slate-50 border border-transparent rounded-[1rem] font-extrabold text-[14px] transition-colors shadow-[0_4px_15px_rgba(0,0,0,0.1)] active:scale-95">
              Draft with AI
            </button>
          </div>
        </div>

      </div>

    </div>
  </div>
</template>

<script setup>
import { RouterLink } from 'vue-router'
</script>
