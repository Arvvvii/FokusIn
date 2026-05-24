<template>
  <div class="space-y-6 md:space-y-8 animate-in fade-in duration-500">
    
    <!-- TOP ROW: Hero & Featured Module -->
    <div class="flex flex-col xl:flex-row gap-6 md:gap-8">
      
      <!-- 1. Large Hero Card (Left) -->
      <div class="xl:w-[70%] bg-gradient-to-br from-[#334EAC] to-[#081F5C] rounded-[2rem] p-8 md:p-12 text-white relative overflow-hidden shadow-[0_15px_40px_rgba(8,31,92,0.15)] flex flex-col justify-between min-h-[340px]">
        
        <!-- Decorative abstract glow -->
        <div class="absolute -right-24 -top-24 w-96 h-96 bg-white/10 blur-[100px] rounded-full pointer-events-none"></div>
        <div class="absolute bottom-0 right-10 w-64 h-64 bg-[#7096D1]/20 blur-[80px] rounded-full pointer-events-none"></div>
        
        <div class="relative z-10 max-w-2xl">
          <div class="inline-flex items-center gap-2 px-3.5 py-1.5 bg-white/10 backdrop-blur-md rounded-full border border-white/20 mb-6 shadow-sm">
            <span class="w-2 h-2 rounded-full bg-[#BAD6EB] shadow-[0_0_8px_#BAD6EB] animate-pulse"></span>
            <span class="text-[11px] font-bold text-white tracking-widest uppercase">Semester 4 Active</span>
          </div>
          
          <h1 class="text-4xl md:text-5xl lg:text-[3.5rem] font-extrabold tracking-tight mb-5 leading-[1.1] text-white">
            Welcome back, John. <br /> Let's master something new.
          </h1>
          <p class="text-lg md:text-xl text-[#BAD6EB] font-medium mb-10 max-w-xl leading-relaxed">
            You're currently in the top 15% of your cohort. Keep the momentum going by checking your latest materials.
          </p>
          
          <div class="flex flex-col sm:flex-row items-start sm:items-center gap-6 md:gap-8">
            <button class="px-7 py-4 bg-white text-[#081F5C] hover:bg-[#F7F2EB] rounded-2xl font-extrabold text-sm transition-all shadow-[0_8px_20px_rgba(0,0,0,0.1)] active:scale-95 flex items-center gap-3 shrink-0 group">
              Continue Learning
              <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round" class="group-hover:translate-x-1 transition-transform"><path d="M5 12h14"/><path d="m12 5 7 7-7 7"/></svg>
            </button>
            
            <!-- Hero Progress Bar -->
            <div class="w-full sm:w-auto flex-1 max-w-xs">
              <div class="flex justify-between text-xs font-bold mb-2.5">
                <span class="text-[#BAD6EB] uppercase tracking-wider">Weekly Goal</span>
                <span class="text-white">80%</span>
              </div>
              <div class="h-2.5 w-full bg-black/20 rounded-full overflow-hidden backdrop-blur-sm border border-white/10">
                <div class="h-full bg-gradient-to-r from-[#BAD6EB] to-white rounded-full w-[80%] shadow-[0_0_10px_rgba(255,255,255,0.5)]"></div>
              </div>
            </div>
          </div>
        </div>
      </div>

      <!-- 2. Featured Module / Recommendation (Right) -->
      <div class="xl:w-[30%] bg-[#081F5C] rounded-[2rem] p-8 text-white relative shadow-[0_15px_40px_rgba(8,31,92,0.15)] flex flex-col overflow-hidden border border-white/5">
        
        <!-- Abstract overlay -->
        <div class="absolute inset-0 opacity-20 pointer-events-none" style="background-image: radial-gradient(circle at 100% 0%, #7096D1 0%, transparent 60%);"></div>

        <div class="relative z-10 flex items-center justify-between mb-8">
          <div class="flex items-center gap-3">
            <div class="w-10 h-10 rounded-xl bg-gradient-to-br from-[#7096D1] to-[#334EAC] flex items-center justify-center shadow-inner border border-white/20">
               <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="white" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="m12 3-1.912 5.813a2 2 0 0 1-1.275 1.275L3 12l5.813 1.912a2 2 0 0 1 1.275 1.275L12 21l1.912-5.813a2 2 0 0 1 1.275-1.275L21 12l-5.813-1.912a2 2 0 0 1-1.275-1.275L12 3Z"/></svg>
            </div>
            <span class="text-sm font-extrabold tracking-wide uppercase text-[#BAD6EB]">AI Module</span>
          </div>
          <button class="text-[#7096D1] hover:text-white transition-colors bg-white/5 hover:bg-white/10 p-2 rounded-lg">
            <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="1"/><circle cx="19" cy="12" r="1"/><circle cx="5" cy="12" r="1"/></svg>
          </button>
        </div>

        <div class="relative z-10 flex-1 flex flex-col justify-center">
          <h3 class="text-[1.6rem] font-bold tracking-tight mb-3 leading-snug text-white">Graph Algorithms & Networks</h3>
          <p class="text-[#BAD6EB] text-sm leading-relaxed font-medium mb-8">
            Based on your latest Data Structures quiz, reviewing this module will boost your overall understanding by ~15%.
          </p>
        </div>

        <button class="relative z-10 w-full py-4 bg-white/10 hover:bg-white/20 border border-white/10 rounded-2xl text-white font-bold text-sm transition-all flex justify-center items-center gap-2 active:scale-95 shadow-sm">
          Start Module
          <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M5 12h14"/><path d="m12 5 7 7-7 7"/></svg>
        </button>
      </div>
    </div>

    <!-- MIDDLE ROW: 3. Compact Analytics Grid -->
    <div class="grid grid-cols-2 lg:grid-cols-4 gap-4 md:gap-6">
      <div v-for="stat in stats" :key="stat.label" class="bg-white rounded-[1.5rem] p-5 shadow-[0_4px_24px_rgba(0,0,0,0.02)] border border-slate-100/80 flex flex-col justify-between hover:shadow-[0_8px_30px_rgba(8,31,92,0.06)] hover:border-slate-200 transition-all group">
        <div class="flex items-center justify-between mb-4">
          <span class="text-xs font-bold text-slate-400 uppercase tracking-wider">{{ stat.label }}</span>
          <div class="w-9 h-9 rounded-xl flex items-center justify-center shrink-0 shadow-sm border" :class="stat.bg">
             <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" :class="stat.color" v-html="stat.icon"></svg>
          </div>
        </div>
        <div class="flex items-end justify-between">
          <h4 class="text-3xl font-extrabold text-[#081F5C] tracking-tight">{{ stat.value }}</h4>
          <div class="flex items-center gap-1 text-[11px] font-extrabold px-2 py-1 rounded-lg" :class="stat.trend === 'up' ? 'text-emerald-600 bg-emerald-50 border border-emerald-100' : 'text-amber-600 bg-amber-50 border border-amber-100'">
            <svg v-if="stat.trend === 'up'" xmlns="http://www.w3.org/2000/svg" width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"><path d="m18 15-6-6-6 6"/></svg>
            {{ stat.change }}
          </div>
        </div>
      </div>
    </div>

    <!-- BOTTOM ROW: 4. Content Cards (Split) -->
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6 md:gap-8">
      
      <!-- Trending Discussions (Larger width) -->
      <div class="lg:col-span-2 bg-white rounded-[2rem] p-7 md:p-8 shadow-[0_4px_24px_rgba(0,0,0,0.02)] border border-slate-100/80 flex flex-col">
        <div class="flex items-center justify-between mb-6">
          <h3 class="text-xl font-extrabold text-[#081F5C]">Trending Discussions</h3>
          <button class="text-sm font-bold text-[#334EAC] hover:text-[#7096D1] transition-colors flex items-center gap-1">
            View all
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="m9 18 6-6-6-6"/></svg>
          </button>
        </div>

        <div class="flex-1 space-y-3">
          <div v-for="disc in discussions" :key="disc.title" class="group flex gap-4 items-center p-4 bg-[#EDF1F6]/50 hover:bg-[#F7F2EB] border border-transparent hover:border-slate-200 rounded-2xl transition-all cursor-pointer">
            <div class="w-12 h-12 bg-white rounded-xl shadow-[0_2px_10px_rgba(0,0,0,0.03)] border border-slate-100 flex items-center justify-center shrink-0 text-[#334EAC] group-hover:bg-[#334EAC] group-hover:text-white transition-colors">
              <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z"/></svg>
            </div>
            <div class="flex-1 min-w-0">
              <h4 class="text-[15px] font-bold text-[#081F5C] leading-snug truncate mb-1">{{ disc.title }}</h4>
              <div class="flex items-center gap-2.5 text-xs font-semibold text-slate-400">
                <span class="text-[#334EAC] bg-[#EDF1F6] px-2 py-0.5 rounded-md">{{ disc.category }}</span>
                <span class="flex items-center gap-1">
                  <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z"/></svg>
                  {{ disc.replies }}
                </span>
                <span>•</span>
                <span>{{ disc.time }}</span>
              </div>
            </div>
            <div class="hidden sm:flex text-slate-300 group-hover:text-[#334EAC] transition-colors pr-2">
              <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="m9 18 6-6-6-6"/></svg>
            </div>
          </div>
        </div>
      </div>

      <!-- Upcoming Mentoring (Right narrow column) -->
      <div class="bg-white rounded-[2rem] p-7 md:p-8 shadow-[0_4px_24px_rgba(0,0,0,0.02)] border border-slate-100/80 flex flex-col">
        <div class="flex items-center justify-between mb-6">
          <h3 class="text-xl font-extrabold text-[#081F5C]">Upcoming</h3>
          <span class="px-2.5 py-1 bg-[#EDF1F6] text-[#334EAC] text-[10px] font-extrabold rounded-lg uppercase tracking-wider">2 Sessions</span>
        </div>
        
        <div class="space-y-4 flex-1">
          <div v-for="mentor in mentoring" :key="mentor.tutor" class="flex flex-col p-4 bg-white border border-slate-100 hover:border-[#7096D1]/40 rounded-[1.5rem] shadow-sm hover:shadow-md transition-all">
            <div class="flex items-center gap-4 mb-3">
              <div class="w-14 h-14 bg-gradient-to-br from-[#F7F2EB] to-[#EDF1F6] rounded-2xl flex flex-col items-center justify-center shrink-0 border border-slate-200/50 shadow-inner">
                <span class="text-[9px] font-bold text-slate-500 uppercase tracking-widest">{{ mentor.dateMonth }}</span>
                <span class="text-[18px] font-extrabold text-[#081F5C] leading-none mt-0.5">{{ mentor.dateDay }}</span>
              </div>
              <div>
                <h4 class="text-[15px] font-bold text-[#081F5C] mb-1 leading-tight">{{ mentor.subject }}</h4>
                <p class="text-[12px] font-semibold text-slate-400">with {{ mentor.tutor }}</p>
              </div>
            </div>
            <div class="flex items-center justify-between mt-auto pt-3 border-t border-slate-50">
              <span class="flex items-center gap-1.5 text-xs font-bold text-slate-400">
                <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"/><polyline points="12 6 12 12 16 14"/></svg>
                {{ mentor.time }}
              </span>
              <button class="w-8 h-8 rounded-full bg-[#EDF1F6] text-[#334EAC] flex items-center justify-center hover:bg-[#334EAC] hover:text-white transition-colors shadow-sm">
                <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><polygon points="5 3 19 12 5 21 5 3"/></svg>
              </button>
            </div>
          </div>
        </div>
      </div>
      
    </div>
  </div>
</template>

<script setup>
const stats = [
  { label: 'Reputation', value: '1,240', change: '+12%', trend: 'up', icon: '<polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"/>', color: 'text-amber-500', bg: 'bg-amber-50 border-amber-100/50' },
  { label: 'Total Posts', value: '48', change: '+3%', trend: 'up', icon: '<path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z"/>', color: 'text-[#334EAC]', bg: 'bg-[#334EAC]/10 border-[#334EAC]/10' },
  { label: 'Best Answers', value: '15', change: '+1%', trend: 'up', icon: '<path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"/><polyline points="22 4 12 14.01 9 11.01"/>', color: 'text-emerald-500', bg: 'bg-emerald-50 border-emerald-100/50' },
  { label: 'Quizzes Done', value: '24', change: '+2%', trend: 'up', icon: '<path d="M15 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V7Z"/><path d="M14 2v4a2 2 0 0 0 2 2h4"/><path d="M10 9H8"/><path d="M16 13H8"/><path d="M16 17H8"/>', color: 'text-[#7096D1]', bg: 'bg-[#7096D1]/10 border-[#7096D1]/10' },
]

const discussions = [
  { title: 'Understanding Vue 3 Composition API', category: 'Programming', replies: 12, time: '2h ago' },
  { title: 'Calculus: Integration by Parts tricks?', category: 'Mathematics', replies: 8, time: '5h ago' },
  { title: 'Best resources for TOEFL preparation?', category: 'English', replies: 24, time: '1d ago' },
  { title: 'How does Dijkstra Algorithm actually work?', category: 'Computer Science', replies: 5, time: '2d ago' },
]

const mentoring = [
  { tutor: 'Dr. Sarah Smith', subject: 'Advanced Algorithms', dateMonth: 'May', dateDay: '25', time: '14:00', type: 'Video' },
  { tutor: 'Budi Santoso', subject: 'Linear Algebra', dateMonth: 'May', dateDay: '27', time: '10:00', type: 'Chat' },
]
</script>
