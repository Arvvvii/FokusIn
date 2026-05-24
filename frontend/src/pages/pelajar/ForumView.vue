<template>
  <div class="space-y-6 animate-in fade-in duration-500">
          
          <!-- Page Header -->
          <div class="flex flex-col md:flex-row md:items-end justify-between gap-4 mb-8">
            <div>
              <h1 class="text-3xl md:text-4xl font-extrabold text-[#081F5C] tracking-tight mb-2">Community Forum</h1>
              <p class="text-slate-500 font-medium text-lg max-w-2xl">Collaborate, ask questions, and share knowledge with thousands of students and tutors.</p>
            </div>
            <!-- Mobile CTA -->
            <RouterLink to="/pelajar/forum/create" class="xl:hidden inline-flex items-center justify-center gap-2 px-6 py-3.5 bg-[#334EAC] hover:bg-[#081F5C] text-white rounded-xl font-extrabold transition-all shadow-[0_8px_20px_rgba(51,78,172,0.2)] hover:-translate-y-0.5 active:scale-95 shrink-0">
              <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"><path d="M5 12h14"/><path d="M12 5v14"/></svg>
              Start Discussion
            </RouterLink>
          </div>

          <!-- 3-Column Layout -->
          <div class="flex flex-col xl:flex-row gap-8">
            
            <!-- 1. LEFT SIDEBAR FILTER (xl:w-[20%]) -->
            <div class="hidden xl:flex flex-col w-[20%] shrink-0 space-y-8 sticky top-[32px] h-fit">
              
              <!-- Categories -->
              <div>
                <h3 class="text-xs font-extrabold text-slate-400 uppercase tracking-widest mb-4">Categories</h3>
                <ul class="space-y-1.5">
                  <li v-for="cat in categories" :key="cat.name">
                    <button 
                      class="w-full flex items-center justify-between px-3 py-2.5 rounded-xl font-bold text-sm transition-all border border-transparent"
                      :class="cat.active ? 'bg-[#081F5C] text-white shadow-md' : 'text-slate-500 hover:bg-white hover:border-slate-200 hover:text-[#081F5C] hover:shadow-sm'"
                    >
                      {{ cat.name }}
                      <span 
                        class="px-2 py-0.5 rounded-md text-[10px] font-extrabold"
                        :class="cat.active ? 'bg-white/20 text-white' : 'bg-slate-100 text-slate-400'"
                      >{{ cat.count }}</span>
                    </button>
                  </li>
                </ul>
              </div>

              <!-- Trending Tags -->
              <div>
                <h3 class="text-xs font-extrabold text-slate-400 uppercase tracking-widest mb-4">Trending Tags</h3>
                <div class="flex flex-wrap gap-2">
                  <span v-for="tag in tags" :key="tag" class="px-3 py-1.5 bg-white border border-slate-200 rounded-lg text-xs font-bold text-[#334EAC] hover:border-[#7096D1] hover:bg-[#EDF1F6] cursor-pointer transition-colors shadow-sm">
                    {{ tag }}
                  </span>
                </div>
              </div>
            </div>

            <!-- 2. MAIN DISCUSSION FEED (xl:w-[55%]) -->
            <div class="flex-1 w-full xl:w-[55%] flex flex-col min-w-0">
              
              <!-- Feed Controls -->
              <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4 mb-6">
                <div class="flex items-center gap-1 p-1 bg-white border border-slate-200/80 rounded-xl shadow-sm">
                  <button class="px-5 py-2 bg-[#EDF1F6] text-[#081F5C] rounded-lg font-extrabold text-sm shadow-[0_1px_2px_rgba(0,0,0,0.05)] transition-all">Trending</button>
                  <button class="px-5 py-2 text-slate-500 hover:text-[#081F5C] rounded-lg font-extrabold text-sm transition-all hover:bg-slate-50">Newest</button>
                  <button class="px-5 py-2 text-slate-500 hover:text-[#081F5C] rounded-lg font-extrabold text-sm transition-all hover:bg-slate-50 hidden sm:block">Unanswered</button>
                </div>
                
                <div class="relative w-full sm:w-72">
                  <div class="absolute inset-y-0 left-0 pl-3.5 flex items-center pointer-events-none text-slate-400">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><circle cx="11" cy="11" r="8"/><path d="m21 21-4.3-4.3"/></svg>
                  </div>
                  <input type="text" class="w-full pl-10 pr-4 py-2.5 bg-white border border-slate-200/80 rounded-xl text-sm font-bold text-slate-800 placeholder-slate-400 focus:outline-none focus:border-[#7096D1] focus:ring-4 focus:ring-[#7096D1]/10 transition-all shadow-sm" placeholder="Search discussions...">
                </div>
              </div>

              <!-- Post List -->
              <div class="space-y-4">
                <RouterLink :to="`/pelajar/forum/${post.id}`" v-for="post in posts" :key="post.id" class="group bg-white rounded-[1.5rem] p-5 md:p-6 shadow-[0_4px_24px_rgba(0,0,0,0.02)] border border-slate-100/80 hover:border-[#7096D1]/40 hover:-translate-y-1 hover:shadow-[0_8px_30px_rgba(8,31,92,0.06)] transition-all flex flex-col sm:flex-row gap-5 cursor-pointer block">
                  
                  <!-- Left Stats (StackOverflow style but modern) -->
                  <div class="flex sm:flex-col items-center gap-4 sm:gap-2 shrink-0">
                    <!-- Upvotes -->
                    <div class="flex sm:flex-col items-center gap-1.5 bg-[#F7F2EB] sm:bg-transparent px-3 py-1 sm:p-0 rounded-lg">
                      <button class="text-slate-400 hover:text-[#334EAC] transition-colors"><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"><path d="m18 15-6-6-6 6"/></svg></button>
                      <span class="font-extrabold text-[#081F5C] text-[15px]">{{ post.upvotes }}</span>
                      <button class="text-slate-400 hover:text-rose-500 transition-colors sm:hidden"><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"><path d="m6 9 6 6 6-6"/></svg></button>
                    </div>
                    
                    <!-- Answers -->
                    <div class="flex flex-col items-center justify-center min-w-[3.5rem] py-1.5 rounded-xl border shadow-sm transition-colors mt-0 sm:mt-1"
                      :class="post.isResolved ? 'bg-emerald-50 border-emerald-200 text-emerald-700 shadow-emerald-100/50' : (post.answers > 0 ? 'bg-[#EDF1F6] border-slate-200 text-[#081F5C]' : 'bg-transparent border-transparent text-slate-400')"
                    >
                      <span class="font-extrabold text-[15px] leading-none">{{ post.answers }}</span>
                      <span class="text-[9px] font-extrabold uppercase tracking-widest mt-1">Ans</span>
                    </div>
                  </div>

                  <!-- Post Content -->
                  <div class="flex-1 min-w-0 flex flex-col">
                    <div class="flex items-center gap-2 mb-2">
                      <span class="px-2.5 py-0.5 bg-[#EDF1F6] text-[#334EAC] text-[10px] font-extrabold rounded-md uppercase tracking-widest">{{ post.category }}</span>
                      <span v-if="post.isResolved" class="flex items-center gap-1 text-[10px] font-extrabold text-emerald-700 bg-emerald-50 px-2.5 py-0.5 rounded-md uppercase tracking-widest">
                        <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"><polyline points="20 6 9 17 4 12"/></svg>
                        Resolved
                      </span>
                    </div>
                    
                    <h2 class="text-lg md:text-[19px] font-bold text-[#081F5C] leading-snug mb-2 group-hover:text-[#334EAC] transition-colors">{{ post.title }}</h2>
                    <p class="text-[13px] text-slate-500 font-medium line-clamp-2 mb-4 leading-relaxed">{{ post.preview }}</p>
                    
                    <div class="mt-auto flex flex-col sm:flex-row sm:items-center justify-between gap-4">
                      <div class="flex items-center gap-2 flex-wrap">
                        <div v-for="tag in post.tags" :key="tag" class="text-[11px] font-bold text-slate-400 hover:text-[#334EAC] transition-colors">
                          {{ tag }}
                        </div>
                      </div>
                      
                      <!-- Author Info -->
                      <div class="flex items-center gap-2.5 bg-slate-50 px-3 py-1.5 rounded-xl border border-slate-100 hover:bg-slate-100 transition-colors shrink-0">
                        <div class="w-6 h-6 rounded-full bg-gradient-to-br from-[#334EAC] to-[#081F5C] flex items-center justify-center text-white text-[9px] font-bold shadow-sm">
                          {{ post.author.avatar }}
                        </div>
                        <div class="flex flex-col">
                          <span class="text-[11px] font-extrabold text-[#081F5C] leading-none">{{ post.author.name }}</span>
                          <div class="flex items-center gap-1.5 mt-1">
                            <span class="text-[10px] font-extrabold text-amber-500 leading-none">{{ post.author.rep }} rep</span>
                            <span class="text-[10px] text-slate-400 font-bold leading-none">• {{ post.time }}</span>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>

                </RouterLink>
              </div>
              
              <!-- Pagination (Simple mock) -->
              <div class="mt-8 flex justify-center">
                <button class="px-6 py-3 bg-white border border-slate-200 text-[#081F5C] rounded-xl font-extrabold text-sm shadow-sm hover:bg-[#F7F2EB] hover:border-[#7096D1] transition-all active:scale-95">Load More Discussions</button>
              </div>

            </div>

            <!-- 3. RIGHT PANEL (xl:w-[25%]) -->
            <div class="hidden xl:flex flex-col w-[25%] shrink-0 space-y-6 sticky top-[32px] h-fit">
              
              <!-- Create Post CTA -->
              <RouterLink to="/pelajar/forum/create" class="w-full flex items-center justify-center gap-2 px-6 py-4 bg-[#334EAC] hover:bg-[#081F5C] text-white rounded-[1.25rem] font-extrabold text-[15px] transition-all shadow-[0_8px_20px_rgba(51,78,172,0.2)] hover:-translate-y-0.5 active:scale-95 group">
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round" class="group-hover:rotate-90 transition-transform"><path d="M5 12h14"/><path d="M12 5v14"/></svg>
                Start Discussion
              </RouterLink>

              <!-- Top Contributors -->
              <div class="bg-white rounded-[1.5rem] p-6 shadow-[0_4px_24px_rgba(0,0,0,0.02)] border border-slate-100/80">
                <div class="flex items-center gap-2 mb-5">
                  <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="#F59E0B" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"/></svg>
                  <h3 class="text-[15px] font-extrabold text-[#081F5C]">Top Contributors</h3>
                </div>
                
                <div class="space-y-4">
                  <div v-for="user in contributors" :key="user.name" class="flex items-center gap-3">
                    <div class="w-10 h-10 rounded-full bg-[#EDF1F6] flex items-center justify-center font-extrabold text-[#081F5C] text-sm shrink-0 border border-slate-200">
                      {{ user.avatar }}
                    </div>
                    <div class="flex-1 min-w-0">
                      <h4 class="text-sm font-bold text-[#081F5C] truncate mb-0.5">{{ user.name }}</h4>
                      <div class="flex items-center gap-2">
                        <span class="text-[10px] font-extrabold text-amber-500">{{ user.rep }}</span>
                        <span class="px-1.5 py-0.5 rounded-md bg-slate-100 text-slate-500 text-[9px] font-bold uppercase tracking-wider">{{ user.role }}</span>
                      </div>
                    </div>
                  </div>
                </div>
              </div>

              <!-- AI Assistant Widget -->
              <div class="bg-gradient-to-br from-[#081F5C] to-[#334EAC] rounded-[1.5rem] p-6 text-white shadow-[0_15px_40px_rgba(8,31,92,0.15)] relative overflow-hidden border border-white/5">
                <div class="absolute -right-10 -bottom-10 w-32 h-32 bg-[#7096D1] blur-3xl rounded-full opacity-30 pointer-events-none"></div>
                <div class="relative z-10">
                  <div class="flex items-center gap-2 mb-3">
                    <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="#BAD6EB" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="m12 3-1.912 5.813a2 2 0 0 1-1.275 1.275L3 12l5.813 1.912a2 2 0 0 1 1.275 1.275L12 21l1.912-5.813a2 2 0 0 1 1.275-1.275L21 12l-5.813-1.912a2 2 0 0 1-1.275-1.275L12 3Z"/><path d="M5 3v4"/><path d="M19 17v4"/><path d="M3 5h4"/><path d="M17 19h4"/></svg>
                    <h3 class="text-xs font-extrabold tracking-widest uppercase text-[#BAD6EB]">Ask Fokus AI</h3>
                  </div>
                  <p class="text-[13px] font-medium text-[#BAD6EB] mb-5 leading-relaxed">Stuck on a problem? Get instant hints before posting to the forum.</p>
                  <RouterLink to="/pelajar/forum/1" class="w-full py-3 bg-white/10 hover:bg-white/20 border border-white/10 rounded-xl text-white font-bold text-sm transition-all shadow-sm active:scale-95 flex items-center justify-center hover:-translate-y-0.5">
                    Launch Assistant
                  </RouterLink>
                </div>
              </div>

            </div>
          </div>
        </div>

</template>

<script setup>
import { RouterLink } from 'vue-router'

const categories = [
  { name: 'All Topics', count: '1,240', active: true },
  { name: 'Computer Science', count: '420' },
  { name: 'Mathematics', count: '315' },
  { name: 'Physics', count: '180' },
  { name: 'English', count: '95' },
]

const tags = ['#algorithms', '#vue3', '#calculus', '#machine-learning', '#ielts']

const posts = [
  {
    id: 1,
    title: 'How does Dijkstra Algorithm actually work under the hood?',
    preview: 'I understand the basic premise of finding the shortest path, but I am struggling to implement the priority queue efficiently in C++. Does anyone have a good mental model?',
    category: 'Computer Science',
    tags: ['#algorithms', '#c++'],
    author: { name: 'Alex Johnson', avatar: 'AJ', rep: '1.2k' },
    time: '2 hours ago',
    upvotes: 42,
    answers: 5,
    isResolved: true
  },
  {
    id: 2,
    title: 'Integration by Parts: When to use tabular method?',
    preview: 'Is there a specific rule of thumb for when the tabular method (DI method) is better than the standard u-dv formula? I always get confused on exams.',
    category: 'Mathematics',
    tags: ['#calculus'],
    author: { name: 'Maria Garcia', avatar: 'MG', rep: '850' },
    time: '5 hours ago',
    upvotes: 18,
    answers: 2,
    isResolved: false
  },
  {
    id: 3,
    title: 'Understanding Reactivity in Vue 3 Composition API',
    preview: 'What is the exact difference between ref() and reactive()? When should I prefer one over the other in a large scale application architecture?',
    category: 'Computer Science',
    tags: ['#vue3', '#javascript'],
    author: { name: 'Budi Santoso', avatar: 'BS', rep: '3.4k' },
    time: '1 day ago',
    upvotes: 156,
    answers: 12,
    isResolved: true
  },
  {
    id: 4,
    title: 'Best strategy for TOEFL Reading Section?',
    preview: 'I always run out of time when dealing with the long passages. Should I read the questions first or skim the entire text before answering?',
    category: 'English',
    tags: ['#toefl', '#reading'],
    author: { name: 'Dian Sastro', avatar: 'DS', rep: '120' },
    time: '2 days ago',
    upvotes: 8,
    answers: 0,
    isResolved: false
  }
]

const contributors = [
  { name: 'Dr. Sarah Smith', rep: '15.4k', role: 'Tutor', avatar: 'SS' },
  { name: 'Budi Santoso', rep: '3.4k', role: 'Pelajar', avatar: 'BS' },
  { name: 'Prof. Anderson', rep: '12.1k', role: 'Tutor', avatar: 'PA' },
]
</script>
