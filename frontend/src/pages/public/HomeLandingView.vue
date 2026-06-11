<template>
  <div class="min-h-screen bg-[#F7F2EB] font-sans selection:bg-[#7096D1] selection:text-white relative overflow-hidden">
    
    <!-- Ambient Background -->
    <div class="bg-canvas" aria-hidden="true">
      <div class="blob blob-1"></div>
      <div class="blob blob-2"></div>
      <div class="blob blob-3"></div>
      <div class="dot-grid"></div>
    </div>

    <!-- 1. STICKY NAVBAR -->
    <nav class="navbar">
      <div class="max-w-7xl mx-auto px-6 h-20 flex items-center justify-between relative z-10">
        <!-- Logo -->
        <RouterLink to="/" class="flex items-center gap-2 group">
          <img src="@/assets/logo-fokusin.png" alt="FokusIn Logo" class="navbar-logo" />
        </RouterLink>

        <!-- Desktop Menu -->
        <div class="hidden md:flex items-center gap-8">
          <RouterLink to="/" class="nav-link active">Home</RouterLink>
          <a href="#fitur" class="nav-link">Fitur</a>
          <a href="#testimoni" class="nav-link">Testimoni</a>
          <RouterLink to="/about" class="nav-link">Tentang</RouterLink>
          <RouterLink to="/faq" class="nav-link">FAQ</RouterLink>
        </div>

        <!-- Auth Buttons -->
        <div class="hidden md:flex items-center gap-4">
          <RouterLink to="/auth/login" class="btn-ghost-nav">
            Masuk
          </RouterLink>
          <RouterLink to="/auth/register" class="btn-cta-primary">
            Mulai Belajar
          </RouterLink>
        </div>

        <!-- Mobile Menu Toggle -->
        <button @click="toggleMobileMenu" class="md:hidden p-2 text-[#081F5C] focus:outline-none" aria-label="Toggle Menu">
          <svg v-if="!isMobileMenuOpen" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><line x1="4" x2="20" y1="12" y2="12"/><line x1="4" x2="20" y1="6" y2="6"/><line x1="4" x2="20" y1="18" y2="18"/></svg>
          <svg v-else xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><line x1="18" y1="6" x2="6" y2="18"/><line x1="6" y1="6" x2="18" y2="18"/></svg>
        </button>
      </div>

      <!-- Mobile Menu Dropdown (Slide Down Glassmorphism) -->
      <transition
        enter-active-class="transition duration-200 ease-out"
        enter-from-class="opacity-0 -translate-y-4"
        enter-to-class="opacity-100 translate-y-0"
        leave-active-class="transition duration-150 ease-in"
        leave-from-class="opacity-100 translate-y-0"
        leave-to-class="opacity-0 -translate-y-4"
      >
        <div v-if="isMobileMenuOpen" class="md:hidden absolute top-20 left-0 right-0 bg-[#F7F2EB]/95 backdrop-blur-xl border-b border-[#7096D1]/15 shadow-lg z-50 px-6 py-6 flex flex-col gap-2">
          <RouterLink to="/" class="nav-link-mobile" @click="isMobileMenuOpen = false">Home</RouterLink>
          <a href="#fitur" class="nav-link-mobile" @click="isMobileMenuOpen = false">Fitur</a>
          <a href="#testimoni" class="nav-link-mobile" @click="isMobileMenuOpen = false">Testimoni</a>
          <RouterLink to="/about" class="nav-link-mobile" @click="isMobileMenuOpen = false">Tentang</RouterLink>
          <RouterLink to="/faq" class="nav-link-mobile" @click="isMobileMenuOpen = false">FAQ</RouterLink>
          <hr class="border-slate-200 my-2">
          <RouterLink to="/auth/login" class="btn-ghost-nav text-center" @click="isMobileMenuOpen = false">
            Masuk
          </RouterLink>
          <RouterLink to="/auth/register" class="btn-cta-primary text-center mt-2" @click="isMobileMenuOpen = false">
            Mulai Belajar
          </RouterLink>
        </div>
      </transition>
    </nav>

    <main class="relative z-10">
      <!-- 2. HERO SECTION -->
      <section class="max-w-7xl mx-auto px-6 pt-8 pb-20 md:pt-12 md:pb-28 flex flex-col lg:flex-row items-center gap-16">
        <!-- Left Content -->
        <div class="flex-1 text-center lg:text-left relative">
          <div class="hero-accent-orb" aria-hidden="true"></div>
          
          <div class="hero-badge">
            <span class="badge-dot"></span>
            Platform Akademik Masa Depan
          </div>
          
          <h1 class="text-4xl md:text-6xl lg:text-[4rem] font-extrabold text-[#081F5C] leading-[1.1] mb-6 tracking-tight relative z-10">
            Belajar Lebih Fokus dengan <span class="hero-title-ai">Bantuan AI</span>
          </h1>
          
          <p class="text-lg md:text-xl text-slate-600 mb-8 max-w-2xl mx-auto lg:mx-0 leading-relaxed font-medium relative z-10">
            Tingkatkan produktivitas akademikmu. FokusIn menggabungkan analisis AI cerdas dengan kolaborasi antar mahasiswa untuk mewujudkan pengalaman belajar yang personal dan terarah.
          </p>

          <div class="flex flex-col sm:flex-row items-center gap-4 justify-center lg:justify-start mb-10 relative z-10 w-full">
            <RouterLink to="/auth/register" class="w-full sm:w-auto btn-hero-primary justify-center">
              Mulai Gratis Sekarang
              <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M5 12h14"/><path d="m12 5 7 7-7 7"/></svg>
            </RouterLink>
            <a href="#fitur" class="w-full sm:w-auto btn-hero-secondary justify-center">
              Pelajari Fitur
            </a>
          </div>

          <div class="stats-bar hidden md:flex mx-auto lg:mx-0">
            <template v-if="loading">
              <div v-for="n in 3" :key="n" class="stat-item flex flex-col items-center">
                <div class="h-6 w-16 skeleton-bar mb-2"></div>
                <div class="h-3 w-20 skeleton-bar"></div>
              </div>
            </template>
            <template v-else-if="error">
              <div class="w-full flex items-center justify-between px-4">
                <span class="text-xs font-bold text-rose-600">Gagal memuat statistik.</span>
                <button @click="fetchStats" class="px-3 py-1.5 bg-[#334EAC] hover:bg-[#081F5C] text-white rounded-lg font-bold text-xs shadow-sm transition-all active:scale-95">
                  Coba Lagi
                </button>
              </div>
            </template>
            <template v-else>
              <div class="stat-item">
                <span class="stat-number">{{ stats.total_users?.toLocaleString() || 0 }}+</span>
                <span class="stat-label">Mahasiswa Aktif</span>
              </div>
              <div class="stat-divider"></div>
              <div class="stat-item">
                <span class="stat-number">{{ stats.total_posts?.toLocaleString() || 0 }}+</span>
                <span class="stat-label">Diskusi Forum</span>
              </div>
              <div class="stat-divider"></div>
              <div class="stat-item">
                <span class="stat-number">{{ stats.total_exam_uploads?.toLocaleString() || 0 }}+</span>
                <span class="stat-label">Arsip Ujian</span>
              </div>
            </template>
          </div>
        </div>

        <!-- Right Visual -->
        <div class="flex-1 w-full max-w-lg lg:max-w-none hero-mockup-wrapper relative z-10">
          
          <div class="hero-mockup-frame pb-6">
            <!-- Mockup Header Dots -->
            <div class="mockup-dots">
              <div class="dot-red"></div>
              <div class="dot-yellow"></div>
              <div class="dot-green"></div>
            </div>
            
            <!-- Mockup Body -->
            <div class="p-6">
               <div class="flex items-center justify-between mb-6">
                 <div>
                   <div class="h-2 w-20 skeleton-bar mb-2"></div>
                   <div class="h-4 w-32 skeleton-bar"></div>
                 </div>
                 <div class="mockup-ai-badge">AI Active</div>
               </div>
               
               <div class="space-y-3 mb-6">
                 <div class="h-16 w-full mockup-upload-zone p-4 flex items-center gap-3">
                    <div class="w-8 h-8 rounded-lg bg-white/60 flex items-center justify-center">
                      <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="#334EAC" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"/><polyline points="17 8 12 3 7 8"/><line x1="12" x2="12" y1="3" y2="15"/></svg>
                    </div>
                    <div>
                      <div class="h-2 w-24 skeleton-bar mb-1.5"></div>
                      <div class="h-1.5 w-16 skeleton-bar"></div>
                    </div>
                 </div>
                 <div class="h-16 w-full bg-slate-50/50 rounded-2xl border border-slate-100 p-4 flex items-center gap-3">
                    <div class="w-8 h-8 rounded-lg bg-white shadow-sm flex items-center justify-center">
                      <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="#081F5C" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z"/></svg>
                    </div>
                    <div>
                      <div class="h-2 w-32 skeleton-bar mb-1.5"></div>
                      <div class="h-1.5 w-20 skeleton-bar"></div>
                    </div>
                 </div>
               </div>
               
               <div class="grid grid-cols-2 gap-3">
                  <div class="h-24 mockup-card-accent p-4 flex flex-col justify-between">
                     <div class="h-2 w-12 skeleton-bar"></div>
                     <div class="h-6 w-16 skeleton-bar"></div>
                  </div>
                  <div class="h-24 mockup-card-accent p-4 flex flex-col justify-between">
                     <div class="h-2 w-16 skeleton-bar"></div>
                     <div class="h-6 w-12 skeleton-bar"></div>
                  </div>
               </div>
            </div>

            <!-- Floating Badge -->
            <div class="absolute -right-6 -bottom-6 bg-white p-4 rounded-2xl shadow-xl border border-slate-100 flex items-center gap-3 animate-bounce" style="animation-duration: 3s;">
              <div class="w-10 h-10 rounded-full bg-emerald-100 flex items-center justify-center text-emerald-500">
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"><path d="M12 22c5.523 0 10-4.477 10-10S17.523 2 12 2 2 6.477 2 12s4.477 10 10 10z"/><path d="m9 12 2 2 4-4"/></svg>
              </div>
              <div>
                <p class="text-[12px] font-extrabold text-[#081F5C]">AI Analysis Complete</p>
                <p class="text-[10px] font-bold text-slate-400">Study plan optimized</p>
              </div>
            </div>
          </div>
        </div>
      </section>

      <!-- 3. STATS SECTION -->
      <section class="bg-[#081F5C] py-16 relative overflow-hidden">
        <!-- Decoration -->
        <div class="absolute top-0 left-1/2 -translate-x-1/2 w-full h-px bg-gradient-to-r from-transparent via-[#334EAC] to-transparent"></div>
        <div class="max-w-7xl mx-auto px-6">
          <template v-if="loading">
            <div class="grid grid-cols-2 lg:grid-cols-4 gap-8 md:gap-12">
              <div v-for="n in 4" :key="n" class="text-center">
                <div class="h-10 w-24 bg-white/20 rounded-lg mx-auto mb-2 animate-pulse"></div>
                <div class="h-4 w-32 bg-white/10 rounded-lg mx-auto animate-pulse"></div>
              </div>
            </div>
          </template>
          <template v-else-if="error">
            <div class="flex flex-col items-center justify-center gap-4 text-center">
              <span class="text-sm font-bold text-[#BAD6EB]">Gagal memuat data statistik.</span>
              <button @click="fetchStats" class="px-4 py-2 bg-white hover:bg-[#F7F2EB] text-[#081F5C] rounded-xl font-bold text-xs shadow-sm transition-all active:scale-95">
                Coba Lagi
              </button>
            </div>
          </template>
          <template v-else>
            <div class="grid grid-cols-2 lg:grid-cols-4 gap-8 md:gap-12">
              <div class="text-center">
                <div class="text-4xl md:text-5xl font-black text-white mb-2">{{ stats.total_users?.toLocaleString() || 0 }}</div>
                <div class="text-[13px] font-bold text-[#BAD6EB] uppercase tracking-widest">Mahasiswa Aktif</div>
              </div>
              
              <div class="text-center">
                <div class="text-4xl md:text-5xl font-black text-white mb-2">{{ stats.total_posts?.toLocaleString() || 0 }}</div>
                <div class="text-[13px] font-bold text-[#BAD6EB] uppercase tracking-widest">Diskusi Forum</div>
              </div>
              
              <div class="text-center">
                <div class="text-4xl md:text-5xl font-black text-white mb-2">92%</div>
                <div class="text-[13px] font-bold text-[#BAD6EB] uppercase tracking-widest">Tingkat Kepuasan</div>
              </div>
              
              <div class="text-center">
                <div class="text-4xl md:text-5xl font-black text-white mb-2">{{ stats.total_exam_uploads?.toLocaleString() || 0 }}</div>
                <div class="text-[13px] font-bold text-[#BAD6EB] uppercase tracking-widest">Arsip Ujian</div>
              </div>
            </div>
          </template>
        </div>
      </section>

      <!-- 4. FEATURE SECTION -->
      <section id="fitur" class="py-24 bg-white">
        <div class="max-w-7xl mx-auto px-6">
          <div class="text-center max-w-3xl mx-auto mb-20">
            <h2 class="text-3xl md:text-5xl font-extrabold text-[#081F5C] mb-6 tracking-tight">Ekosistem Belajar Lengkap</h2>
            <p class="text-lg text-slate-500 font-medium leading-relaxed">
              FokusIn menyediakan alat canggih yang kamu butuhkan untuk memahami materi kompleks, berlatih secara efektif, dan berdiskusi dengan mahasiswa lain.
            </p>
          </div>

          <!-- Asymmetric Grid -->
          <div class="grid grid-cols-1 md:grid-cols-12 gap-6">
            
            <!-- Large Card 1 -->
            <div class="md:col-span-8 bg-[#F7F2EB] rounded-[2rem] p-8 md:p-10 border border-slate-100 hover:shadow-xl transition-all duration-300 group overflow-hidden relative flex flex-col md:flex-row gap-8 items-center">
              <div class="flex-1 z-10">
                <div class="w-12 h-12 rounded-xl bg-white shadow-sm flex items-center justify-center text-[#334EAC] mb-6">
                  <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="m12 3-1.912 5.813a2 2 0 0 1-1.275 1.275L3 12l5.813 1.912a2 2 0 0 1 1.275 1.275L12 21l1.912-5.813a2 2 0 0 1 1.275-1.275L21 12l-5.813-1.912a2 2 0 0 1-1.275-1.275L12 3Z"/></svg>
                </div>
                <h3 class="text-2xl font-extrabold text-[#081F5C] mb-4">AI Analyzer</h3>
                <p class="text-[15px] font-medium text-slate-600 leading-relaxed">
                  Unggah materimu dan biarkan AI kami mengurai konsep sulit menjadi penjelasan sederhana, ringkasan, dan poin-poin penting yang mudah dipahami.
                </p>
              </div>
              <div class="w-full md:w-64 h-48 bg-white rounded-2xl shadow-sm border border-slate-200 p-4 relative transform group-hover:-translate-y-2 group-hover:rotate-2 transition-transform duration-500 z-10">
                 <div class="h-3 w-1/2 bg-slate-200 rounded-full mb-4"></div>
                 <div class="space-y-3">
                    <RouterLink to="/auth/register" class="flex items-center justify-between p-4 bg-white/10 hover:bg-white/20 rounded-xl border border-white/10 transition-colors group">
                      <div class="flex items-center gap-4">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" class="text-[#BAD6EB]"><path d="M14.5 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V7.5L14.5 2z"/><polyline points="14 2 14 8 20 8"/></svg>
                        <span class="text-[13px] font-bold text-white">Bab 10 - Rotasi</span>
                      </div>
                      <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round" class="text-white/50 group-hover:text-white transition-colors"><path d="m9 18 6-6-6-6"/></svg>
                    </RouterLink>
                    <RouterLink to="/auth/register" class="flex items-center justify-between p-4 bg-white/10 hover:bg-white/20 rounded-xl border border-white/10 transition-colors group">
                      <div class="flex items-center gap-4">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" class="text-[#BAD6EB]"><rect width="18" height="18" x="3" y="3" rx="2" ry="2"/><circle cx="9" cy="9" r="2"/><path d="m21 15-3.086-3.086a2 2 0 0 0-2.828 0L6 21"/></svg>
                        <span class="text-[13px] font-bold text-white">Video Gesekan Menggelinding</span>
                      </div>
                      <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round" class="text-white/50 group-hover:text-white transition-colors"><path d="m9 18 6-6-6-6"/></svg>
                    </RouterLink>
                  </div>
                 <div class="absolute bottom-4 right-4 w-8 h-8 rounded-full bg-[#334EAC] flex items-center justify-center text-white">
                   <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"><polyline points="20 6 9 17 4 12"/></svg>
                 </div>
              </div>
            </div>

            <!-- Small Card 1 -->
            <div class="md:col-span-4 bg-[#EDF1F6] rounded-[2rem] p-8 md:p-10 border border-slate-100 hover:shadow-xl transition-all duration-300 group flex flex-col justify-between">
              <div>
                <div class="w-12 h-12 rounded-xl bg-white shadow-sm flex items-center justify-center text-[#334EAC] mb-6">
                  <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z"/></svg>
                </div>
                <h3 class="text-xl font-extrabold text-[#081F5C] mb-3">Forum Diskusi</h3>
                <p class="text-[14px] font-medium text-slate-600 leading-relaxed">
                  Terhubung dengan ribuan mahasiswa lainnya untuk berdiskusi, bertanya, dan berbagi pengetahuan.
                </p>
              </div>
            </div>

            <!-- Small Card 2 -->
            <div class="md:col-span-5 bg-gradient-to-br from-[#334EAC] to-[#081F5C] rounded-[2rem] p-8 md:p-10 border border-[#081F5C] hover:shadow-xl hover:shadow-[#334EAC]/20 transition-all duration-300 group flex flex-col justify-between text-white relative overflow-hidden">
               <div class="absolute -right-8 -top-8 w-40 h-40 bg-white/10 blur-[40px] rounded-full pointer-events-none"></div>
               <div class="relative z-10">
                <div class="w-12 h-12 rounded-xl bg-white/10 backdrop-blur shadow-sm flex items-center justify-center text-white mb-6 border border-white/20">
                  <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M16 21v-2a4 4 0 0 0-4-4H6a4 4 0 0 0-4 4v2"/><circle cx="9" cy="7" r="4"/><path d="M22 21v-2a4 4 0 0 0-3-3.87"/><path d="M16 3.13a4 4 0 0 1 0 7.75"/></svg>
                </div>
                <h3 class="text-xl font-extrabold mb-3">Mentoring Akademik</h3>
                <p class="text-[14px] font-medium text-[#BAD6EB] leading-relaxed">
                  Jadwalkan sesi privat 1-on-1 dengan mentor akademik yang ahli di bidangnya untuk membimbing belajarmu.
                </p>
              </div>
            </div>

            <!-- Large Card 2 -->
            <div class="md:col-span-7 bg-[#FFF9F0] rounded-[2rem] p-8 md:p-10 border border-slate-100 hover:shadow-xl transition-all duration-300 group overflow-hidden relative">
              <div class="relative z-10">
                <div class="w-12 h-12 rounded-xl bg-white shadow-sm flex items-center justify-center text-[#334EAC] mb-6">
                  <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"/><path d="m15 9-6 6"/><path d="m9 9 6 6"/></svg>
                </div>
                <h3 class="text-2xl font-extrabold text-[#081F5C] mb-4">Smart Quiz</h3>
                <p class="text-[15px] font-medium text-slate-600 leading-relaxed max-w-lg mb-8">
                  Uji pemahamanmu dengan kuis interaktif yang dihasilkan secara otomatis oleh AI berdasarkan materi kuliah yang kamu simpan.
                </p>
                <div class="flex gap-2">
                   <div class="w-10 h-10 rounded-full bg-emerald-100 border-2 border-white shadow-sm flex items-center justify-center text-emerald-600 text-xs font-bold">A</div>
                   <div class="w-10 h-10 rounded-full bg-rose-100 border-2 border-white shadow-sm flex items-center justify-center text-rose-600 text-xs font-bold -ml-4">B</div>
                   <div class="w-10 h-10 rounded-full bg-amber-100 border-2 border-white shadow-sm flex items-center justify-center text-amber-600 text-xs font-bold -ml-4">C</div>
                   <div class="w-10 h-10 rounded-full bg-slate-100 border-2 border-white shadow-sm flex items-center justify-center text-slate-600 text-xs font-bold -ml-4">D</div>
                </div>
              </div>
            </div>

          </div>
        </div>
      </section>

      <!-- 5. TESTIMONIAL SECTION -->
      <section id="testimoni" class="py-24 bg-[#F2F0DE]">
        <div class="max-w-7xl mx-auto px-6">
          <div class="flex flex-col md:flex-row justify-between items-end mb-16 gap-6">
             <div>
               <h2 class="text-3xl md:text-5xl font-extrabold text-[#081F5C] mb-4 tracking-tight">Kisah Sukses Mahasiswa</h2>
               <p class="text-lg text-slate-500 font-medium">Lihat bagaimana FokusIn membantu mereka mencapai target akademiknya.</p>
             </div>
             <div class="flex gap-4">
                <button class="w-12 h-12 rounded-full bg-white border border-slate-200 flex items-center justify-center text-[#081F5C] hover:border-[#334EAC] hover:text-[#334EAC] transition-colors">
                  <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="m15 18-6-6 6-6"/></svg>
                </button>
                <button class="w-12 h-12 rounded-full bg-white border border-slate-200 flex items-center justify-center text-[#081F5C] hover:border-[#334EAC] hover:text-[#334EAC] transition-colors">
                  <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="m9 18 6-6-6-6"/></svg>
                </button>
             </div>
          </div>

          <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            <!-- Testimonial 1 -->
            <div class="bg-white/80 backdrop-blur-xl rounded-3xl p-8 shadow-[0_10px_40px_rgba(15,23,42,0.06)] border border-slate-100 transition-all duration-300 ease-out hover:-translate-y-1 hover:shadow-xl group">
              <div class="flex items-center gap-1 text-amber-400 mb-6">
                <svg v-for="i in 5" :key="i" xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="currentColor" stroke="none"><polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"/></svg>
              </div>
              <p class="text-[15px] text-slate-600 font-medium leading-relaxed mb-8 italic">
                "AI Analyzer sangat membantu saya mengurai jurnal-jurnal ilmiah yang kompleks menjadi bahasa yang lebih mudah dicerna. Sangat menghemat waktu riset saya!"
              </p>
              <div class="flex items-center gap-4">
                <img src="https://i.pravatar.cc/150?u=a042581f4e29026024d" alt="User" class="w-12 h-12 rounded-full bg-slate-100 object-cover">
                <div>
                  <h4 class="text-[14px] font-extrabold text-[#081F5C]">Andi Pratama</h4>
                  <p class="text-[12px] font-bold text-slate-400">Teknik Informatika '22</p>
                </div>
              </div>
            </div>
            
            <!-- Testimonial 2 -->
            <div class="bg-white/80 backdrop-blur-xl rounded-3xl p-8 shadow-[0_10px_40px_rgba(15,23,42,0.06)] border border-slate-100 transition-all duration-300 ease-out hover:-translate-y-1 hover:shadow-xl group">
              <div class="flex items-center gap-1 text-amber-400 mb-6">
                <svg v-for="i in 5" :key="i" xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="currentColor" stroke="none"><polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"/></svg>
              </div>
              <p class="text-[15px] text-slate-600 font-medium leading-relaxed mb-8 italic">
                "Fitur mentoring sangat berguna saat saya stuck di materi Kalkulus. Mentornya solutif dan sabar. Platform ini benar-benar ekosistem belajar yang lengkap."
              </p>
              <div class="flex items-center gap-4">
                <img src="https://i.pravatar.cc/150?u=a042581f4e29026704d" alt="User" class="w-12 h-12 rounded-full bg-slate-100 object-cover">
                <div>
                  <h4 class="text-[14px] font-extrabold text-[#081F5C]">Siti Nurbaya</h4>
                  <p class="text-[12px] font-bold text-slate-400">Sistem Informasi '23</p>
                </div>
              </div>
            </div>

            <!-- Testimonial 3 -->
            <div class="bg-white/80 backdrop-blur-xl rounded-3xl p-8 shadow-[0_10px_40px_rgba(15,23,42,0.06)] border border-slate-100 transition-all duration-300 ease-out hover:-translate-y-1 hover:shadow-xl group">
              <div class="flex items-center gap-1 text-amber-400 mb-6">
                <svg v-for="i in 5" :key="i" xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="currentColor" stroke="none"><polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"/></svg>
              </div>
              <p class="text-[15px] text-slate-600 font-medium leading-relaxed mb-8 italic">
                "Quiz cerdasnya membantu saya mengulang materi sebelum ujian. Saya tidak perlu membuat flashcard manual lagi karena AI sudah membuatnya untuk saya."
              </p>
              <div class="flex items-center gap-4">
                <img src="https://i.pravatar.cc/150?u=a042581f4e29026703d" alt="User" class="w-12 h-12 rounded-full bg-slate-100 object-cover">
                <div>
                  <h4 class="text-[14px] font-extrabold text-[#081F5C]">Budi Santoso</h4>
                  <p class="text-[12px] font-bold text-slate-400">Manajemen Bisnis '21</p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>

      <!-- 6. CTA SECTION -->
      <section class="max-w-7xl mx-auto px-6 py-24">
        <div class="bg-gradient-to-br from-[#081F5C] via-[#081F5C] to-[#334EAC] rounded-[3rem] p-12 md:p-20 text-center relative overflow-hidden shadow-2xl">
          <!-- Decorative Glow -->
          <div class="absolute top-0 right-0 w-[500px] h-[500px] bg-[#7096D1]/30 blur-[100px] rounded-full pointer-events-none transform translate-x-1/2 -translate-y-1/2"></div>
          <div class="absolute bottom-0 left-0 w-[400px] h-[400px] bg-[#BAD6EB]/20 blur-[80px] rounded-full pointer-events-none transform -translate-x-1/2 translate-y-1/2"></div>
          
          <div class="relative z-10 max-w-3xl mx-auto">
            <h2 class="text-4xl md:text-5xl font-black text-white mb-6 leading-tight tracking-tight">
              Siap meningkatkan pengalaman belajarmu?
            </h2>
            <p class="text-lg md:text-xl text-[#BAD6EB] font-medium mb-10 max-w-2xl mx-auto">
              Bergabung dengan ribuan mahasiswa lainnya dan jadilah bagian dari platform akademik paling modern saat ini.
            </p>
            <div class="flex flex-col sm:flex-row justify-center gap-4">
              <RouterLink to="/auth/register" class="px-8 py-4 bg-white hover:bg-[#F7F2EB] text-[#081F5C] rounded-2xl font-extrabold text-[15px] transition-all shadow-xl hover:-translate-y-1 active:scale-95 flex items-center justify-center">
                Buat Akun Gratis
              </RouterLink>
              <RouterLink to="/contact" class="px-8 py-4 bg-transparent border border-white/20 hover:bg-white/10 text-white rounded-2xl font-extrabold text-[15px] transition-all flex items-center justify-center">
                Hubungi Kami
              </RouterLink>
            </div>
          </div>
        </div>
      </section>
    </main>

    <!-- 7. FOOTER -->
    <footer class="bg-white border-t border-slate-200 pt-20 pb-10">
      <div class="max-w-7xl mx-auto px-6">
        <div class="grid grid-cols-1 md:grid-cols-4 lg:grid-cols-5 gap-12 mb-16">
          
          <!-- Brand -->
          <div class="lg:col-span-2 pr-8">
            <RouterLink to="/" class="flex items-center gap-2 mb-6">
              <div class="w-8 h-8 rounded-lg bg-[#081F5C] flex items-center justify-center">
                <span class="text-white font-black text-lg leading-none">F</span>
              </div>
              <span class="text-xl font-black tracking-tight text-[#081F5C]">FokusIn</span>
            </RouterLink>
            <p class="text-[14px] text-slate-500 font-medium leading-relaxed mb-6">
              Memberdayakan generasi mahasiswa selanjutnya melalui kolaborasi dan kecerdasan buatan untuk pengalaman belajar yang superior.
            </p>
            <!-- Socials -->
            <div class="flex gap-4">
              <a href="https://facebook.com" target="_blank" class="w-10 h-10 rounded-full bg-slate-50 border border-slate-200 flex items-center justify-center text-slate-400 hover:text-[#334EAC] hover:border-[#334EAC] transition-colors">
                <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M18 2h-3a5 5 0 0 0-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 0 1 1-1h3z"/></svg>
              </a>
              <a href="https://instagram.com" target="_blank" class="w-10 h-10 rounded-full bg-slate-50 border border-slate-200 flex items-center justify-center text-slate-400 hover:text-[#334EAC] hover:border-[#334EAC] transition-colors">
                <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="2" y="2" width="20" height="20" rx="5" ry="5"/><path d="M16 11.37A4 4 0 1 1 12.63 8 4 4 0 0 1 16 11.37z"/><line x1="17.5" y1="6.5" x2="17.51" y2="6.5"/></svg>
              </a>
              <a href="https://twitter.com" target="_blank" class="w-10 h-10 rounded-full bg-slate-50 border border-slate-200 flex items-center justify-center text-slate-400 hover:text-[#334EAC] hover:border-[#334EAC] transition-colors">
                <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M22 4s-.7 2.1-2 3.4c1.6 10-9.4 17.3-18 11.6 2.2.1 4.4-.6 6-2C3 15.5.5 9.6 3 5c2.2 2.6 5.6 4.1 9 4-.9-4.2 4-6.6 7-3.8 1.1 0 3-1.2 3-1.2z"/></svg>
              </a>
            </div>
          </div>

          <!-- Links -->
          <div>
            <h4 class="text-[14px] font-extrabold text-[#081F5C] mb-6">Platform</h4>
            <ul class="space-y-4 text-[14px] font-medium text-slate-500">
              <li><RouterLink to="/auth/register" class="hover:text-[#334EAC] transition-colors">AI Analyzer</RouterLink></li>
              <li><RouterLink to="/auth/register" class="hover:text-[#334EAC] transition-colors">Mentoring</RouterLink></li>
              <li><RouterLink to="/auth/register" class="hover:text-[#334EAC] transition-colors">Smart Quiz</RouterLink></li>
              <li><RouterLink to="/auth/register" class="hover:text-[#334EAC] transition-colors">Forum Diskusi</RouterLink></li>
            </ul>
          </div>

          <div>
            <h4 class="text-[14px] font-extrabold text-[#081F5C] mb-6">Perusahaan</h4>
            <ul class="space-y-4 text-[14px] font-medium text-slate-500">
              <li><RouterLink to="/about" class="hover:text-[#334EAC] transition-colors">Tentang Kami</RouterLink></li>
              <li><RouterLink to="/coming-soon" class="hover:text-[#334EAC] transition-colors">Karir</RouterLink></li>
              <li><RouterLink to="/coming-soon" class="hover:text-[#334EAC] transition-colors">Kebijakan Privasi</RouterLink></li>
              <li><RouterLink to="/coming-soon" class="hover:text-[#334EAC] transition-colors">Syarat & Ketentuan</RouterLink></li>
            </ul>
          </div>

          <!-- Newsletter -->
          <div>
            <h4 class="text-[14px] font-extrabold text-[#081F5C] mb-6">Berlangganan</h4>
            <p class="text-[13px] font-medium text-slate-500 mb-4">Dapatkan tips belajar dan update fitur terbaru kami.</p>
            <div class="flex gap-2">
              <input type="email" placeholder="Email kamu" class="w-full px-4 py-2 bg-slate-50 border border-slate-200 rounded-xl text-[14px] focus:outline-none focus:border-[#334EAC] transition-colors">
              <button class="px-4 py-2 bg-[#081F5C] hover:bg-[#334EAC] text-white rounded-xl text-[14px] font-bold transition-colors">
                Kirim
              </button>
            </div>
          </div>

        </div>

        <div class="border-t border-slate-200 pt-8 flex flex-col md:flex-row justify-between items-center gap-4">
          <p class="text-[13px] font-medium text-slate-400">© 2024 FokusIn. Hak cipta dilindungi undang-undang.</p>
          <div class="flex items-center gap-6 text-[13px] font-medium text-slate-400">
             <span class="flex items-center gap-2"><div class="w-2 h-2 rounded-full bg-emerald-500"></div> Semua sistem normal</span>
          </div>
        </div>
      </div>
    </footer>
  </div>
</template>

<script setup>
import { ref, onMounted } from 'vue'
import { RouterLink } from 'vue-router'
import { statsService } from '@/services/stats.service'

const isMobileMenuOpen = ref(false)
const toggleMobileMenu = () => {
  isMobileMenuOpen.value = !isMobileMenuOpen.value
}

const loading = ref(false)
const error = ref(null)
const stats = ref({
  total_users: 0,
  total_posts: 0,
  total_exam_uploads: 0
})

const fetchStats = async () => {
  loading.value = true
  error.value = null
  try {
    const data = await statsService.getGlobalStats()
    stats.value = data
  } catch (err) {
    error.value = err
  } finally {
    loading.value = false
  }
}

onMounted(() => {
  fetchStats()
})
</script>

<style scoped>
.navbar-logo {
  height: 40px;
  width: auto;
  mix-blend-mode: multiply;
}

/* 1. Background */
.bg-canvas {
  position: absolute;
  inset: 0;
  z-index: 0;
  pointer-events: none;
  overflow: hidden;
}

.blob {
  position: absolute;
  border-radius: 50%;
  filter: blur(100px);
  opacity: 0.14;
}

.blob-1 { width: 700px; height: 700px; background: #334EAC; top: -250px; left: -200px; }
.blob-2 { width: 550px; height: 550px; background: #7096D1; top: 150px; right: -150px; }
.blob-3 { width: 450px; height: 450px; background: #BAD6EB; bottom: -120px; left: 35%; }

.dot-grid {
  position: absolute;
  inset: 0;
  background-image: radial-gradient(circle, rgba(51, 78, 172, 0.18) 1px, transparent 1px);
  background-size: 30px 30px;
  opacity: 0.35;
}

/* 2. Navbar */
.navbar {
  background: rgba(247, 242, 235, 0.80);
  backdrop-filter: blur(20px);
  -webkit-backdrop-filter: blur(20px);
  border-bottom: 1px solid rgba(112, 150, 209, 0.15);
  box-shadow: 0 1px 20px rgba(8, 31, 92, 0.06);
  position: sticky;
  top: 0;
  z-index: 100;
}

.logo-icon {
  background: linear-gradient(135deg, #334EAC, #7096D1);
  border-radius: 10px;
}

.nav-link {
  color: #4A5880;
  font-weight: 500;
  font-size: 14px;
  transition: color 0.15s;
  position: relative;
}
.nav-link:hover {
  color: #334EAC;
}
.nav-link.active::after {
  content: '';
  position: absolute;
  bottom: -4px;
  left: 0;
  right: 0;
  height: 2px;
  background: #334EAC;
  border-radius: 1px;
}

.btn-cta-primary {
  background: linear-gradient(135deg, #334EAC, #5570C9);
  color: #fff;
  padding: 10px 22px;
  border-radius: 10px;
  font-weight: 700;
  font-size: 14px;
  box-shadow: 0 4px 16px rgba(51, 78, 172, 0.30);
  transition: all 0.2s;
}
.btn-cta-primary:hover {
  transform: translateY(-1px);
  box-shadow: 0 6px 22px rgba(51, 78, 172, 0.38);
}

.btn-ghost-nav {
  color: #334EAC;
  font-weight: 600;
  font-size: 14px;
  padding: 9px 18px;
  border-radius: 9px;
  border: 1px solid rgba(51, 78, 172, 0.20);
  transition: all 0.18s;
}
.btn-ghost-nav:hover {
  background: rgba(51, 78, 172, 0.06);
  border-color: rgba(51, 78, 172, 0.35);
}

/* 3. Hero Section */
.hero-badge {
  display: inline-flex;
  align-items: center;
  gap: 8px;
  background: rgba(51, 78, 172, 0.08);
  border: 1px solid rgba(51, 78, 172, 0.20);
  color: #334EAC;
  font-size: 11px;
  font-weight: 700;
  letter-spacing: 1.2px;
  text-transform: uppercase;
  padding: 7px 16px;
  border-radius: 20px;
  margin-bottom: 24px;
}

.badge-dot {
  width: 7px;
  height: 7px;
  background: #334EAC;
  border-radius: 50%;
  animation: badge-blink 2s ease-in-out infinite;
}

@keyframes badge-blink {
  0%, 100% { opacity: 1; }
  50% { opacity: 0.3; }
}

.hero-title-ai {
  color: #334EAC;
}

.hero-accent-orb {
  position: absolute;
  width: 180px;
  height: 180px;
  border-radius: 50%;
  background: radial-gradient(circle, rgba(51,78,172,0.12), transparent 70%);
  top: -40px;
  left: -60px;
  pointer-events: none;
}

.btn-hero-primary {
  background: linear-gradient(135deg, #334EAC, #5570C9);
  color: #fff;
  padding: 13px 28px;
  border-radius: 11px;
  font-size: 15px;
  font-weight: 700;
  box-shadow: 0 6px 24px rgba(51, 78, 172, 0.32);
  transition: all 0.2s;
  display: inline-flex;
  align-items: center;
  justify-content: center;
  gap: 8px;
}
.btn-hero-primary:hover {
  transform: translateY(-2px);
  box-shadow: 0 10px 32px rgba(51, 78, 172, 0.40);
}

.btn-hero-secondary {
  background: rgba(255,255,255,0.6);
  color: #334EAC;
  border: 1px solid rgba(51, 78, 172, 0.18);
  padding: 12px 24px;
  border-radius: 11px;
  font-size: 15px;
  font-weight: 600;
  backdrop-filter: blur(8px);
  transition: all 0.18s;
  display: inline-flex;
  align-items: center;
  justify-content: center;
}
.btn-hero-secondary:hover {
  background: rgba(255,255,255,0.85);
  border-color: rgba(51, 78, 172, 0.30);
}

.nav-link-mobile {
  color: #4A5880;
  font-weight: 600;
  font-size: 15px;
  padding: 10px 16px;
  border-radius: 10px;
  transition: all 0.2s;
  display: block;
}
.nav-link-mobile:hover {
  background: rgba(51, 78, 172, 0.08);
  color: #334EAC;
}

/* 4. Hero Mockup */
.hero-mockup-wrapper {
  position: relative;
}

.hero-mockup-wrapper::before {
  content: '';
  position: absolute;
  inset: -30px;
  background: radial-gradient(ellipse at center, rgba(51,78,172,0.12) 0%, transparent 70%);
  border-radius: 50%;
  z-index: -1;
}

.hero-mockup-frame {
  background: rgba(255, 255, 255, 0.75);
  backdrop-filter: blur(16px);
  border: 1px solid rgba(112, 150, 209, 0.25);
  border-radius: 20px;
  box-shadow:
    0 24px 60px rgba(8, 31, 92, 0.14),
    0 4px 16px rgba(8, 31, 92, 0.08),
    inset 0 1px 0 rgba(255,255,255,0.8);
  overflow: hidden;
  transform: perspective(1200px) rotateY(-6deg) rotateX(2deg);
  transition: transform 0.4s ease;
}

.hero-mockup-frame:hover {
  transform: perspective(1200px) rotateY(-2deg) rotateX(1deg);
}

.mockup-dots {
  display: flex;
  gap: 6px;
  padding: 12px 16px 10px;
  background: rgba(237, 241, 246, 0.8);
  border-bottom: 1px solid rgba(112, 150, 209, 0.15);
}
.dot-red   { width: 10px; height: 10px; border-radius: 50%; background: #FF5F57; }
.dot-yellow{ width: 10px; height: 10px; border-radius: 50%; background: #FFBD2E; }
.dot-green { width: 10px; height: 10px; border-radius: 50%; background: #28CA41; }

.skeleton-bar {
  background: linear-gradient(90deg, rgba(112,150,209,0.15) 25%, rgba(112,150,209,0.28) 50%, rgba(112,150,209,0.15) 75%);
  background-size: 200% 100%;
  animation: skeleton-wave 1.8s ease-in-out infinite;
  border-radius: 4px;
}

@keyframes skeleton-wave {
  0% { background-position: 200% 0; }
  100% { background-position: -200% 0; }
}

.mockup-ai-badge {
  background: linear-gradient(135deg, #334EAC, #7096D1);
  color: #fff;
  font-size: 10px;
  font-weight: 700;
  padding: 4px 8px;
  border-radius: 6px;
  letter-spacing: 0.3px;
}

.mockup-upload-zone {
  background: rgba(208, 227, 255, 0.35);
  border: 1.5px dashed rgba(51, 78, 172, 0.25);
  border-radius: 10px;
}

.mockup-card-accent {
  background: linear-gradient(135deg, rgba(51,78,172,0.12), rgba(112,150,209,0.18));
  border: 1px solid rgba(51, 78, 172, 0.15);
  border-radius: 10px;
}

/* 5. Stats Bar */
.stats-bar {
  display: flex;
  align-items: center;
  justify-content: center;
  gap: 0;
  margin-top: 32px;
  padding: 16px 12px;
  background: rgba(255,255,255,0.55);
  backdrop-filter: blur(12px);
  border: 1px solid rgba(112,150,209,0.18);
  border-radius: 14px;
  width: 100%;
}

@media (min-width: 768px) {
  .stats-bar {
    margin-top: 40px;
    padding: 18px 28px;
    width: fit-content;
  }
}

.stat-item {
  display: flex;
  flex-direction: column;
  align-items: center;
  padding: 0 8px;
  flex: 1;
}

@media (min-width: 768px) {
  .stat-item {
    padding: 0 28px;
    flex: initial;
  }
}

.stat-number {
  font-size: 16px;
  font-weight: 800;
  color: #081F5C;
  letter-spacing: -0.5px;
}

@media (min-width: 768px) {
  .stat-number {
    font-size: 20px;
  }
}

.stat-label {
  font-size: 10px;
  color: #8A9CC0;
  font-weight: 500;
  margin-top: 2px;
  text-align: center;
}

@media (min-width: 768px) {
  .stat-label {
    font-size: 11px;
  }
}

.stat-divider {
  width: 1px;
  height: 24px;
  background: rgba(112,150,209,0.20);
}

@media (min-width: 768px) {
  .stat-divider {
    height: 32px;
  }
}
</style>
