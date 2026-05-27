<template>
  <div class="min-h-screen bg-[#F7F2EB] font-sans text-slate-800 flex flex-col selection:bg-[#BAD6EB]/40">
    
    <!-- Navigation Bar -->
    <header class="sticky top-0 z-50 bg-[#F7F2EB]/90 backdrop-blur-md border-b border-slate-200/40 px-6 py-4 lg:px-12 flex items-center justify-between transition-all">
      <div class="flex items-center gap-3">
        <div class="w-10 h-10 bg-[#081F5C] rounded-xl flex items-center justify-center border border-[#334EAC]/10 shadow-sm">
          <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="white" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M13 10V3L4 14h7v7l9-11h-7z"/></svg>
        </div>
        <span class="text-xl font-bold tracking-tight text-[#081F5C]">FokusIn</span>
      </div>

      <!-- Navigation Links (Desktop) -->
      <nav class="hidden md:flex items-center gap-8 text-sm font-semibold text-slate-600">
        <a href="#features" class="hover:text-[#081F5C] transition-colors">Features</a>
        <a href="#stats" class="hover:text-[#081F5C] transition-colors">Why Us</a>
        <a href="#cta" class="hover:text-[#081F5C] transition-colors">Get Started</a>
      </nav>

      <!-- Auth Action Buttons -->
      <div class="flex items-center gap-3">
        <!-- If already logged in, show 'Go to Dashboard' -->
        <template v-if="isLoggedIn">
          <RouterLink 
            :to="dashboardPath" 
            class="px-5 py-2.5 rounded-xl text-sm font-bold text-white bg-[#081F5C] hover:bg-[#334EAC] shadow-md transition-all active:scale-[0.98]"
          >
            Go to Dashboard
          </RouterLink>
        </template>
        <template v-else>
          <RouterLink 
            to="/auth/login" 
            class="px-4 py-2 rounded-xl text-sm font-bold text-[#081F5C] hover:bg-slate-100 transition-all"
          >
            Log In
          </RouterLink>
          <RouterLink 
            to="/auth/register" 
            class="px-5 py-2.5 rounded-xl text-sm font-bold text-white bg-[#334EAC] hover:bg-[#7096D1] shadow-md transition-all active:scale-[0.98]"
          >
            Sign Up
          </RouterLink>
        </template>
      </div>
    </header>

    <!-- Hero Section -->
    <section class="relative flex-1 flex flex-col items-center justify-center text-center px-6 py-20 lg:py-32 overflow-hidden">
      <!-- Soft Abstract Shapes -->
      <div class="absolute inset-0 z-0 pointer-events-none opacity-20">
        <div class="absolute -top-32 -left-32 w-96 h-96 rounded-full bg-[#334EAC] blur-[120px]"></div>
        <div class="absolute bottom-[-10%] right-[-10%] w-96 h-96 rounded-full bg-[#7096D1] blur-[150px]"></div>
      </div>

      <div class="max-w-4xl z-10 space-y-8">
        <!-- Floating Tag -->
        <div class="inline-flex items-center gap-2 px-3 py-1.5 rounded-full bg-[#334EAC]/10 border border-[#334EAC]/15 text-[#334EAC] text-xs font-semibold uppercase tracking-wider backdrop-blur-sm">
          🌟 Introducing FokusIn 2.0
        </div>

        <h1 class="text-4xl sm:text-6xl font-extrabold tracking-tight text-[#081F5C] leading-[1.1] max-w-3xl mx-auto">
          A quieter space <br class="hidden sm:inline" /> for deeper academic learning.
        </h1>

        <p class="text-lg sm:text-xl text-slate-500 max-w-xl mx-auto leading-relaxed font-normal">
          Unlock your potential with a calm, collaborative study platform designed for student focus, academic support, and AI-powered performance analysis.
        </p>

        <div class="flex flex-col sm:flex-row items-center justify-center gap-4 pt-4">
          <RouterLink 
            :to="isLoggedIn ? dashboardPath : '/auth/register'" 
            class="w-full sm:w-auto px-8 py-4 rounded-xl text-base font-bold text-white bg-[#081F5C] hover:bg-[#334EAC] shadow-[0_10px_25px_rgba(8,31,92,0.15)] transition-all active:scale-[0.98] flex items-center justify-center gap-2 group"
          >
            Start Learning Free
            <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" class="group-hover:translate-x-1 transition-transform"><line x1="5" x2="19" y1="12" y2="12"/><polyline points="12 5 19 12 12 19"/></svg>
          </RouterLink>
          <a 
            href="#features" 
            class="w-full sm:w-auto px-8 py-4 rounded-xl text-base font-bold text-[#081F5C] bg-white hover:bg-slate-50 border border-slate-200/80 transition-all flex items-center justify-center gap-2 shadow-sm"
          >
            Explore Features
          </a>
        </div>

        <!-- Trust indicator -->
        <div class="flex items-center justify-center gap-4 pt-8">
          <div class="flex -space-x-2">
            <div class="w-9 h-9 rounded-full border-2 border-white bg-[#EDF1F6] flex items-center justify-center shadow-sm"><span class="text-[10px] font-bold text-[#081F5C]">UN</span></div>
            <div class="w-9 h-9 rounded-full border-2 border-white bg-[#BAD6EB] flex items-center justify-center shadow-sm"><span class="text-[10px] font-bold text-[#081F5C]">IT</span></div>
            <div class="w-9 h-9 rounded-full border-2 border-white bg-[#7096D1] flex items-center justify-center shadow-sm"><span class="text-[10px] font-bold text-white">UI</span></div>
          </div>
          <div class="text-sm font-semibold text-slate-500">
            Trusted by <span class="text-[#081F5C] font-bold">10,000+</span> students & mentors
          </div>
        </div>
      </div>
    </section>

    <!-- Features Section -->
    <section id="features" class="py-20 lg:py-28 bg-white px-6 lg:px-12 relative">
      <div class="max-w-7xl mx-auto space-y-16">
        <div class="text-center max-w-2xl mx-auto space-y-4">
          <h2 class="text-[12px] font-extrabold text-[#334EAC] uppercase tracking-widest">Everything You Need</h2>
          <h3 class="text-3xl sm:text-4xl font-extrabold text-[#081F5C] tracking-tight">Tailored features for ultimate study success</h3>
          <p class="text-slate-500 text-sm font-medium">FokusIn brings clean productivity, mentoring, and advanced analytics together in one collaborative hub.</p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
          <!-- Feature 1 -->
          <div class="bg-[#F7F2EB] rounded-[1.75rem] p-8 border border-slate-100 hover:shadow-xl hover:border-[#7096D1]/30 transition-all group">
            <div class="w-12 h-12 bg-white rounded-xl flex items-center justify-center text-[#334EAC] shadow-sm mb-6 group-hover:scale-110 transition-transform">
              <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="m12 3-1.912 5.813a2 2 0 0 1-1.275 1.275L3 12l5.813 1.912a2 2 0 0 1 1.275 1.275L12 21l1.912-5.813a2 2 0 0 1 1.275-1.275L21 12l-5.813-1.912a2 2 0 0 1-1.275-1.275L12 3Z"/></svg>
            </div>
            <h4 class="text-lg font-bold text-[#081F5C] mb-3">AI Study Recommendations</h4>
            <p class="text-slate-500 text-sm leading-relaxed">Our advanced AI scans your learning patterns, offering customized study roadmaps, flashcard suggestions, and focal tips.</p>
          </div>

          <!-- Feature 2 -->
          <div class="bg-[#F7F2EB] rounded-[1.75rem] p-8 border border-slate-100 hover:shadow-xl hover:border-[#7096D1]/30 transition-all group">
            <div class="w-12 h-12 bg-white rounded-xl flex items-center justify-center text-[#334EAC] shadow-sm mb-6 group-hover:scale-110 transition-transform">
              <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z"/></svg>
            </div>
            <h4 class="text-lg font-bold text-[#081F5C] mb-3">Collaborative Forum & Q&A</h4>
            <p class="text-slate-500 text-sm leading-relaxed">Engage in rich discussions, ask academic questions, and receive verified answers from credentialed student tutors.</p>
          </div>

          <!-- Feature 3 -->
          <div class="bg-[#F7F2EB] rounded-[1.75rem] p-8 border border-slate-100 hover:shadow-xl hover:border-[#7096D1]/30 transition-all group">
            <div class="w-12 h-12 bg-white rounded-xl flex items-center justify-center text-[#334EAC] shadow-sm mb-6 group-hover:scale-110 transition-transform">
              <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><polyline points="9 11 12 14 22 4"/><path d="M21 12v7a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h11"/></svg>
            </div>
            <h4 class="text-lg font-bold text-[#081F5C] mb-3">Interactive Quizzes & Stats</h4>
            <p class="text-slate-500 text-sm leading-relaxed">Test your skills in custom quizzes, track active reputation scores, and earn beautiful completion badges and certificates.</p>
          </div>
        </div>
      </div>
    </section>

    <!-- Stats / Trust Section -->
    <section id="stats" class="py-16 bg-[#081F5C] text-white px-6 lg:px-12 relative overflow-hidden">
      <div class="max-w-7xl mx-auto grid grid-cols-2 md:grid-cols-4 gap-8 text-center relative z-10">
        <div>
          <h4 class="text-4xl sm:text-5xl font-extrabold text-[#BAD6EB] mb-2">10k+</h4>
          <p class="text-slate-300 text-sm font-semibold uppercase tracking-wider">Active Students</p>
        </div>
        <div>
          <h4 class="text-4xl sm:text-5xl font-extrabold text-[#BAD6EB] mb-2">500+</h4>
          <p class="text-slate-300 text-sm font-semibold uppercase tracking-wider">Verified Tutors</p>
        </div>
        <div>
          <h4 class="text-4xl sm:text-5xl font-extrabold text-[#BAD6EB] mb-2">98%</h4>
          <p class="text-slate-300 text-sm font-semibold uppercase tracking-wider">Completion Rate</p>
        </div>
        <div>
          <h4 class="text-4xl sm:text-5xl font-extrabold text-[#BAD6EB] mb-2">4.9/5</h4>
          <p class="text-slate-300 text-sm font-semibold uppercase tracking-wider">Student Rating</p>
        </div>
      </div>
    </section>

    <!-- Call to Action Section -->
    <section id="cta" class="py-20 lg:py-28 bg-[#F7F2EB] px-6 lg:px-12 relative">
      <div class="max-w-5xl mx-auto bg-gradient-to-br from-[#081F5C] to-[#334EAC] rounded-[2.5rem] p-8 sm:p-16 text-white text-center relative overflow-hidden shadow-[0_20px_50px_rgba(8,31,92,0.2)]">
        <div class="absolute -right-24 -top-24 w-80 h-80 bg-white/10 blur-[100px] rounded-full pointer-events-none"></div>
        <div class="absolute bottom-0 left-20 w-64 h-64 bg-[#BAD6EB]/20 blur-[80px] rounded-full pointer-events-none"></div>

        <div class="max-w-2xl mx-auto space-y-8 relative z-10">
          <h3 class="text-3xl sm:text-5xl font-extrabold tracking-tight leading-[1.2]">
            Ready to revolutionize your learning journey?
          </h3>
          <p class="text-sm sm:text-base text-[#BAD6EB] leading-relaxed max-w-lg mx-auto font-medium">
            Join thousands of university students today. Access verified study materials, interact with AI recommendations, and study smarter.
          </p>
          <div class="flex flex-col sm:flex-row items-center justify-center gap-4 pt-2">
            <RouterLink 
              :to="isLoggedIn ? dashboardPath : '/auth/register'" 
              class="w-full sm:w-auto px-8 py-4 bg-white text-[#081F5C] hover:bg-[#F7F2EB] rounded-xl font-extrabold text-sm transition-all shadow-md active:scale-[0.98]"
            >
              Sign Up Now (Free)
            </RouterLink>
            <RouterLink 
              to="/auth/login" 
              class="w-full sm:w-auto px-8 py-4 bg-transparent border border-white/30 hover:bg-white/5 rounded-xl font-extrabold text-sm transition-all"
            >
              Already Registered? Log In
            </RouterLink>
          </div>
        </div>
      </div>
    </section>

    <!-- Footer -->
    <footer class="bg-white border-t border-slate-200/60 py-12 px-6 lg:px-12 text-center text-slate-400 text-xs font-semibold tracking-wider uppercase">
      <div class="max-w-7xl mx-auto flex flex-col sm:flex-row items-center justify-between gap-6">
        <div class="flex items-center gap-3">
          <div class="w-8 h-8 bg-[#081F5C] rounded-lg flex items-center justify-center">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="white" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M13 10V3L4 14h7v7l9-11h-7z"/></svg>
          </div>
          <span class="text-sm font-bold tracking-tight text-[#081F5C]">FokusIn</span>
        </div>
        <div>
          © 2026 FokusIn. All rights reserved.
        </div>
      </div>
    </footer>

  </div>
</template>

<script setup>
import { computed } from 'vue'
import { RouterLink } from 'vue-router'

const token = localStorage.getItem('token')
const role = localStorage.getItem('role')
const isLoggedIn = computed(() => !!token)

const dashboardPath = computed(() => {
  if (role === 'admin') {
    return '/admin/dashboard'
  } else if (role === 'tutor') {
    return '/tutor/dashboard'
  } else {
    return '/pelajar/dashboard'
  }
})
</script>

<style scoped>
html {
  scroll-behavior: smooth;
}
</style>
