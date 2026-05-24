<template>
  <div class="min-h-screen w-full flex flex-col lg:flex-row bg-[#F7F2EB] font-sans text-slate-800 overflow-hidden selection:bg-[#BAD6EB]/40">
    
    <!-- Left Section: Midnight Navy Sidebar -->
    <div class="hidden lg:flex lg:w-[45%] relative flex-col justify-between p-12 lg:p-16 bg-[#081F5C] text-white overflow-hidden">
      <!-- Soft Abstract Shapes -->
      <div class="absolute inset-0 z-0 pointer-events-none opacity-40">
        <div class="absolute -top-32 -left-32 w-96 h-96 rounded-full bg-[#334EAC] blur-[100px]"></div>
        <div class="absolute bottom-[-10%] right-[-10%] w-80 h-80 rounded-full bg-[#7096D1] blur-[120px]"></div>
      </div>

      <!-- Top: Logo -->
      <div class="z-10 flex items-center gap-3">
        <div class="w-10 h-10 bg-white/10 backdrop-blur-md rounded-xl flex items-center justify-center border border-white/20">
          <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" class="text-white"><path d="M13 10V3L4 14h7v7l9-11h-7z"/></svg>
        </div>
        <span class="text-xl font-bold tracking-tight text-white">FokusIn</span>
      </div>

      <!-- Center: Academic & Calm Hero -->
      <div class="z-10 max-w-lg mt-12">
        <div class="inline-flex items-center gap-2 px-3 py-1.5 rounded-full bg-white/5 border border-white/10 text-[#BAD6EB] text-xs font-semibold uppercase tracking-wider mb-8 backdrop-blur-sm">
          AI-Powered Learning
        </div>
        <h1 class="text-4xl lg:text-5xl font-bold tracking-tight leading-[1.2] mb-6 text-white">
          A quieter space <br /> for deeper learning.
        </h1>
        <p class="text-[1.1rem] text-[#BAD6EB] leading-relaxed max-w-md font-normal opacity-90">
          Unlock your academic potential with a collaborative platform designed for focus, clarity, and modern productivity.
        </p>
      </div>

      <!-- Bottom: Trust indicator -->
      <div class="z-10 flex items-center gap-4 mt-auto pt-12">
        <div class="flex -space-x-2">
          <div class="w-9 h-9 rounded-full border-2 border-[#081F5C] bg-[#EDF1F6] flex items-center justify-center shadow-sm"><span class="text-[10px] font-bold text-[#081F5C]">UN</span></div>
          <div class="w-9 h-9 rounded-full border-2 border-[#081F5C] bg-[#BAD6EB] flex items-center justify-center shadow-sm"><span class="text-[10px] font-bold text-[#081F5C]">IT</span></div>
          <div class="w-9 h-9 rounded-full border-2 border-[#081F5C] bg-[#7096D1] flex items-center justify-center shadow-sm"><span class="text-[10px] font-bold text-white">UI</span></div>
        </div>
        <div class="text-sm font-medium text-[#BAD6EB]">
          Trusted by <span class="text-white font-semibold">10,000+</span> students
        </div>
      </div>
    </div>

    <!-- Right Section: Calm Productivity Form -->
    <div class="w-full lg:w-[55%] flex items-center justify-center p-6 sm:p-12 relative z-10 bg-[#F7F2EB]">
      
      <!-- Mobile Logo -->
      <div class="absolute top-8 left-6 lg:hidden flex items-center gap-3">
        <div class="w-9 h-9 bg-[#334EAC] rounded-xl flex items-center justify-center shadow-sm">
          <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="white" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M13 10V3L4 14h7v7l9-11h-7z"/></svg>
        </div>
        <span class="text-xl font-bold tracking-tight text-[#081F5C]">FokusIn</span>
      </div>

      <!-- Form Container -->
      <div class="w-full max-w-[420px] mt-12 lg:mt-0">
        
        <div class="mb-10 text-center lg:text-left">
          <h2 class="text-3xl font-bold tracking-tight text-[#081F5C] mb-2">Log in to FokusIn</h2>
          <p class="text-slate-500 text-sm font-medium">Welcome back! Please enter your details.</p>
        </div>

        <!-- The White Card for form elements -->
        <div class="bg-white rounded-[1.5rem] shadow-[0_8px_30px_rgb(0,0,0,0.03)] border border-slate-100 p-8 sm:p-10">
          <form @submit.prevent="handleLogin" class="space-y-6">
            
            <!-- Email Input -->
            <div class="space-y-2">
              <label for="email" class="text-sm font-semibold text-slate-700">Email address</label>
              <input 
                id="email" 
                type="email" 
                v-model="form.email" 
                required
                class="w-full px-4 py-3 bg-[#EDF1F6] border-none rounded-xl text-slate-800 placeholder-slate-400 focus:outline-none focus:ring-2 focus:ring-[#7096D1] transition-all shadow-sm"
                placeholder="name@student.unair.ac.id"
              />
            </div>

            <!-- Password Input -->
            <div class="space-y-2">
              <label for="password" class="text-sm font-semibold text-slate-700">Password</label>
              <div class="relative">
                <input 
                  id="password" 
                  :type="showPassword ? 'text' : 'password'" 
                  v-model="form.password" 
                  required
                  class="w-full px-4 pr-12 py-3 bg-[#EDF1F6] border-none rounded-xl text-slate-800 placeholder-slate-400 focus:outline-none focus:ring-2 focus:ring-[#7096D1] transition-all shadow-sm"
                  placeholder="••••••••"
                />
                <button type="button" @click="showPassword = !showPassword" class="absolute inset-y-0 right-0 pr-4 flex items-center text-slate-400 hover:text-slate-600 transition-colors">
                  <svg v-if="!showPassword" xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M2 12s3-7 10-7 10 7 10 7-3 7-10 7-10-7-10-7Z"/><circle cx="12" cy="12" r="3"/></svg>
                  <svg v-else xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M9.88 9.88a3 3 0 1 0 4.24 4.24"/><path d="M10.73 5.08A10.43 10.43 0 0 1 12 5c7 0 10 7 10 7a13.16 13.16 0 0 1-1.67 2.68"/><path d="M6.61 6.61A13.526 13.526 0 0 0 2 12s3 7 10 7a9.74 9.74 0 0 0 5.39-1.61"/><line x1="2" x2="22" y1="2" y2="22"/></svg>
                </button>
              </div>
            </div>

            <!-- Options -->
            <div class="flex items-center justify-between pt-1">
              <label class="flex items-center gap-2.5 cursor-pointer group">
                <div class="relative flex items-center justify-center">
                  <input type="checkbox" v-model="form.remember" class="peer appearance-none w-4.5 h-4.5 border-2 border-slate-200 rounded-md bg-white checked:bg-[#334EAC] checked:border-[#334EAC] focus:outline-none focus:ring-2 focus:ring-[#7096D1] focus:ring-offset-2 transition-all cursor-pointer" />
                  <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="white" stroke-width="3.5" stroke-linecap="round" stroke-linejoin="round" class="absolute pointer-events-none opacity-0 peer-checked:opacity-100 transition-opacity"><polyline points="20 6 9 17 4 12"/></svg>
                </div>
                <span class="text-sm font-medium text-slate-600 group-hover:text-slate-800 transition-colors select-none">Remember me</span>
              </label>
              
              <RouterLink to="/auth/forgot-password" class="text-sm font-semibold text-[#334EAC] hover:text-[#7096D1] transition-colors">
                Forgot password?
              </RouterLink>
            </div>

            <!-- Submit Button -->
            <div class="pt-4">
              <button 
                type="submit" 
                class="w-full flex justify-center items-center py-3.5 px-4 rounded-xl text-sm font-bold text-white bg-[#334EAC] hover:bg-[#7096D1] focus:outline-none focus:ring-2 focus:ring-[#7096D1] focus:ring-offset-2 transition-all active:scale-[0.98] shadow-sm"
              >
                Sign In
              </button>
            </div>
          </form>

          <!-- Divider -->
          <div class="mt-8 flex items-center gap-4">
            <div class="flex-1 h-px bg-slate-100"></div>
            <span class="text-xs font-semibold text-slate-400 tracking-wider">OR</span>
            <div class="flex-1 h-px bg-slate-100"></div>
          </div>

          <!-- Google Auth -->
          <div class="mt-6">
            <button 
              type="button"
              class="w-full inline-flex justify-center items-center py-3.5 px-4 border border-slate-200 rounded-xl bg-white hover:bg-[#F7F2EB] text-sm font-semibold text-slate-700 transition-all focus:outline-none focus:ring-2 focus:ring-slate-200 focus:ring-offset-2 active:scale-[0.98] shadow-sm"
            >
              <svg class="w-5 h-5 mr-3" viewBox="0 0 24 24" fill="currentColor">
                <path d="M22.56 12.25c0-.78-.07-1.53-.2-2.25H12v4.26h5.92c-.26 1.37-1.04 2.53-2.21 3.31v2.77h3.57c2.08-1.92 3.28-4.74 3.28-8.09z" fill="#4285F4"/>
                <path d="M12 23c2.97 0 5.46-.98 7.28-2.66l-3.57-2.77c-.98.66-2.23 1.06-3.71 1.06-2.86 0-5.29-1.93-6.16-4.53H2.18v2.84C3.99 20.53 7.7 23 12 23z" fill="#34A853"/>
                <path d="M5.84 14.09c-.22-.66-.35-1.36-.35-2.09s.13-1.43.35-2.09V7.07H2.18C1.43 8.55 1 10.22 1 12s.43 3.45 1.18 4.93l2.85-2.22.81-.62z" fill="#FBBC05"/>
                <path d="M12 5.38c1.62 0 3.06.56 4.21 1.64l3.15-3.15C17.45 2.09 14.97 1 12 1 7.7 1 3.99 3.47 2.18 7.07l3.66 2.84c.87-2.6 3.3-4.53 6.16-4.53z" fill="#EA4335"/>
              </svg>
              Continue with Google
            </button>
          </div>
        </div>

        <!-- Register Link -->
        <p class="text-center text-sm text-slate-500 mt-8">
          Don't have an account? 
          <RouterLink to="/auth/register" class="font-semibold text-[#334EAC] hover:text-[#7096D1] transition-colors ml-1">
            Sign up
          </RouterLink>
        </p>

      </div>
    </div>
  </div>
</template>

<script setup>
import { ref } from 'vue'
import { useRouter } from 'vue-router'

const router = useRouter()
const showPassword = ref(false)
const form = ref({
  email: '',
  password: '',
  remember: false
})

const handleLogin = () => {
  console.log('Login attempt:', form.value)
  // Default routing for demonstration
  router.push('/pelajar/dashboard')
}
</script>
