<template>
  <div class="space-y-6 animate-in fade-in duration-500 max-w-7xl mx-auto">
    
    <!-- 1. GLASSMORPHIC HEADER SECTION -->
    <div class="page-header-banner p-6 md:p-8 flex flex-col md:flex-row md:items-center justify-between gap-6 mb-8 relative">
      <div class="absolute right-0 top-0 w-1/3 h-full bg-gradient-to-l from-[#EDF1F6]/80 to-transparent pointer-events-none"></div>
      
      <div class="relative z-10 flex items-center gap-4">
        <span class="page-header-icon w-12 h-12 flex items-center justify-center shrink-0">
          <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M16 21v-2a4 4 0 0 0-4-4H6a4 4 0 0 0-4 4v2"/><circle cx="9" cy="7" r="4"/></svg>
        </span>
        <div>
          <h1 class="text-2xl md:text-3xl font-extrabold text-[#081F5C] tracking-tight">Workspace Mentoring Akademik</h1>
          <p class="text-xs md:text-sm text-[#4A5880]/90 font-medium mt-1.5 max-w-xl leading-relaxed">
            Jadwalkan asistensi dan bimbingan belajar 1-on-1 bersama tutor universitas dan asisten mahasiswa pilihan untuk menunjang capaian akademismu.
          </p>
        </div>
      </div>
    </div>

    <!-- 2. Search & Filter Section -->
    <div class="card-panel p-4 mb-6 flex flex-col md:flex-row gap-3.5 relative overflow-hidden">
      
      <!-- Search -->
      <div class="relative flex-1">
        <div class="absolute inset-y-0 left-0 pl-3.5 flex items-center pointer-events-none text-slate-400">
          <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><circle cx="11" cy="11" r="8"/><path d="m21 21-4.3-4.3"/></svg>
        </div>
        <input type="text" v-model="searchQuery" class="w-full pl-9 pr-4 py-2 bg-white border border-slate-200 rounded-xl text-xs font-bold text-[#081F5C] placeholder-slate-400 focus:outline-none focus:border-[#7096D1] focus:ring-2 focus:ring-[#7096D1]/10 transition-all shadow-sm" placeholder="Cari nama atau deskripsi tutor...">
      </div>

      <!-- Categories -->
      <div class="relative min-w-[150px]">
        <select v-model="selectedCategory" class="w-full pl-3 pr-8 py-2 bg-white border border-slate-200 rounded-xl text-xs font-bold text-[#081F5C] appearance-none focus:outline-none focus:border-[#7096D1] transition-all cursor-pointer shadow-sm">
          <option value="">Semua Bidang</option>
          <option value="cs">Ilmu Komputer</option>
          <option value="math">Matematika</option>
          <option value="physics">Fisika</option>
        </select>
        <div class="absolute inset-y-0 right-0 pr-3 flex items-center pointer-events-none text-slate-400">
          <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"><path d="m6 9 6 6 6-6"/></svg>
        </div>
      </div>

      <!-- Rating -->
      <div class="relative min-w-[130px]">
        <select v-model="selectedRating" class="w-full pl-3 pr-8 py-2 bg-white border border-slate-200 rounded-xl text-xs font-bold text-[#081F5C] appearance-none focus:outline-none focus:border-[#7096D1] transition-all cursor-pointer shadow-sm">
          <option value="">Semua Penilaian</option>
          <option value="4.5">4.5 ke atas</option>
          <option value="4.0">4.0 ke atas</option>
        </select>
        <div class="absolute inset-y-0 right-0 pr-3 flex items-center pointer-events-none text-slate-400">
          <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"><path d="m6 9 6 6 6-6"/></svg>
        </div>
      </div>

      <!-- Filter Button -->
      <button @click="applyFilter" :disabled="isFiltering" class="px-4 py-2 bg-[#334EAC] hover:bg-[#081F5C] text-white rounded-xl font-bold text-xs transition-all shadow-sm active:scale-95 shrink-0 flex items-center justify-center gap-1.5" :class="isFiltering ? 'opacity-70 cursor-wait' : ''">
        <svg v-if="!isFiltering" xmlns="http://www.w3.org/2000/svg" width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"><path d="M22 3H2l8 9.46V19l4 2v-8.54L22 3z"/></svg>
        <svg v-else class="animate-spin" xmlns="http://www.w3.org/2000/svg" width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"><path d="M21 12a9 9 0 1 1-6.219-8.56"/></svg>
        {{ isFiltering ? 'Menyaring...' : 'Filter' }}
      </button>

    </div>

    <!-- 3. STRUCTURAL ASYMMETRIC GRID -->
    <div class="grid grid-cols-1 lg:grid-cols-[minmax(0,1fr)_360px] gap-8 items-start w-full">
      
      <!-- LEFT WORKSPACE: Recommended Mentors -->
      <div class="space-y-6 flex-1 self-stretch">
        <div class="flex items-center justify-between">
          <h2 class="text-base font-bold text-slate-900">Rekomendasi Pembimbing Akademik</h2>
          <span v-if="!isLoading && !isError" class="text-xs text-slate-400 font-medium">{{ filteredTutors.length }} tutor aktif</span>
        </div>

        <div class="space-y-4">
          
          <!-- Loading Skeleton -->
          <div v-if="isLoading" class="space-y-4">
            <div v-for="i in 3" :key="i" class="card-base mentor-card p-6 md:p-7 relative overflow-hidden animate-pulse bg-white border border-slate-100">
              <div class="flex flex-col sm:flex-row justify-between gap-6">
                <div class="flex-1 space-y-4">
                  <div class="flex items-center gap-4">
                    <div class="w-14 h-14 bg-slate-200 rounded-full"></div>
                    <div class="space-y-2">
                      <div class="h-4 bg-slate-200 rounded w-36"></div>
                      <div class="h-3 bg-slate-200 rounded w-24"></div>
                    </div>
                  </div>
                  <div class="h-14 bg-slate-100 rounded-2xl w-full"></div>
                </div>
                <div class="flex flex-row sm:flex-col items-center justify-between sm:justify-start gap-2.5 shrink-0 pt-4 sm:pt-0 sm:pl-6 min-w-[140px]">
                  <div class="h-9 bg-slate-200 rounded-xl w-full"></div>
                  <div class="h-9 bg-slate-200 rounded-xl w-full"></div>
                </div>
              </div>
            </div>
          </div>

          <!-- Error State -->
          <div v-else-if="isError" class="card-base p-8 text-center space-y-4 flex flex-col items-center justify-center bg-white border border-slate-200">
            <div class="w-16 h-16 rounded-full bg-rose-50 flex items-center justify-center text-rose-500 mx-auto">
              <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"/><line x1="12" y1="8" x2="12" y2="12"/><line x1="12" y1="16" x2="12.01" y2="16"/></svg>
            </div>
            <div class="space-y-1">
              <h3 class="text-base font-bold text-slate-800">Gagal memuat data mentoring.</h3>
              <p class="text-xs text-slate-500 font-medium">Periksa koneksi internet Anda atau coba beberapa saat lagi.</p>
            </div>
            <button @click="fetchData" class="px-5 py-2.5 bg-[#334EAC] hover:bg-[#081F5C] text-white font-bold text-xs rounded-xl transition-all shadow-sm">
              Coba Lagi
            </button>
          </div>

          <!-- Empty State -->
          <div v-else-if="filteredTutors.length === 0" class="card-base p-12 text-center space-y-4 flex flex-col items-center justify-center bg-white border border-slate-200">
            <div class="w-20 h-20 rounded-full bg-slate-50 flex items-center justify-center text-slate-400 mx-auto">
              <svg xmlns="http://www.w3.org/2000/svg" width="36" height="36" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M16 21v-2a4 4 0 0 0-4-4H6a4 4 0 0 0-4 4v2"/><circle cx="9" cy="7" r="4"/><path d="M22 21v-2a4 4 0 0 0-3-3.87"/><path d="M16 3.13a4 4 0 0 1 0 7.75"/></svg>
            </div>
            <div class="space-y-1">
              <h3 class="text-base font-bold text-slate-800">Belum ada sesi mentoring tersedia.</h3>
              <p class="text-xs text-slate-500 font-medium">Tutor tidak ditemukan untuk kriteria filter yang Anda pilih.</p>
            </div>
          </div>

          <!-- Dynamic Tutor Cards -->
          <div v-else class="space-y-4">
            <div v-for="tutor in filteredTutors" :key="tutor.id" class="card-base mentor-card p-6 md:p-7 relative overflow-hidden group/card bg-white border border-slate-200 shadow-sm">
              <div class="flex flex-col sm:flex-row justify-between gap-6">
                
                <!-- Tutor Info -->
                <div class="flex-1 space-y-4">
                  <div class="flex items-start justify-between">
                    <div class="flex items-center gap-4">
                      <div class="relative shrink-0">
                        <div class="mentor-avatar w-14 h-14 rounded-full overflow-hidden transition-colors border border-slate-100">
                          <img :src="tutor.avatar_url" :alt="tutor.name" class="w-full h-full object-cover">
                        </div>
                        <div v-if="tutor.is_verified" class="absolute -bottom-0.5 -right-0.5 w-4.5 h-4.5 rounded-full border border-white flex items-center justify-center text-white shadow-sm status-indicator">
                          <svg xmlns="http://www.w3.org/2000/svg" width="9" height="9" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="4" stroke-linecap="round" stroke-linejoin="round"><polyline points="20 6 9 17 4 12"/></svg>
                        </div>
                      </div>
                      <div>
                        <h3 class="text-base font-bold text-slate-900 leading-none tracking-tight group-hover:text-[#334EAC] transition-colors">{{ tutor.name }}</h3>
                        <p class="text-xs font-semibold text-slate-400 mt-1">
                          {{ tutor.badges && tutor.badges.length > 0 ? tutor.badges[0].name : 'Tutor Akademik' }}
                        </p>
                      </div>
                    </div>

                    <!-- Eager check if rating exists on tutor_profile -->
                    <div v-if="tutor.tutor_profile?.rating" class="bg-[#F7F2EB] px-2.5 py-1 rounded-xl border border-amber-100 flex items-center gap-1 shrink-0">
                      <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" viewBox="0 0 24 24" fill="#F59E0B" stroke="#F59E0B" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"/></svg>
                      <span class="text-xs font-bold text-[#081F5C]">{{ parseFloat(tutor.tutor_profile.rating).toFixed(1) }}</span>
                    </div>
                  </div>

                  <div v-if="tutor.tutor_profile?.bio" class="bg-slate-50 border border-slate-100 rounded-2xl p-4">
                    <p class="text-xs text-slate-600 font-medium leading-relaxed">{{ tutor.tutor_profile.bio }}</p>
                  </div>

                  <div class="flex flex-wrap items-center gap-2 pt-1">
                    <span v-for="badge in tutor.badges" :key="badge.id" class="px-2.5 py-1 bg-slate-100 text-slate-500 rounded-xl border border-slate-200/50 uppercase tracking-widest text-[9px] font-bold">
                      {{ badge.name }}
                    </span>
                    <span v-if="tutor.session_count > 0" class="text-xs font-bold text-emerald-500 ml-auto flex items-center gap-1">
                      {{ tutor.session_count }} Sesi Selesai
                    </span>
                  </div>
                </div>

                <!-- Quick Actions -->
                <div class="flex flex-row sm:flex-col items-center justify-between sm:justify-start gap-2.5 shrink-0 border-t sm:border-t-0 sm:border-l border-slate-100 pt-4 sm:pt-0 sm:pl-6 min-w-[140px]">
                  <!-- Hide price section since the API does not return a price field -->
                  <div v-if="tutor.price" class="text-right sm:text-center w-full mb-2">
                    <span class="text-sm font-bold text-[#081F5C]">Rp {{ tutor.price / 1000 }}k</span><span class="text-[10px] font-bold text-slate-400"> /jam</span>
                  </div>
                  
                  <button @click="openBooking(tutor)" class="w-full text-center px-4 py-2.5 bg-[#334EAC] hover:bg-[#081F5C] text-white rounded-xl font-bold text-xs shadow-sm active:scale-95 transition-all flex items-center justify-center gap-1.5">
                    <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="m15.6 11.6 5.4-3.2c.5-.3 1.2 0 1.2.7v5.8c0 .7-.7 1-1.2.7l-5.4-3.2a1.2 1.2 0 0 1 0-2Z"/><rect width="14" height="14" x="2" y="5" rx="3" ry="3"/></svg>
                    Pesan
                  </button>
                  <RouterLink :to="'/pelajar/mentor/' + tutor.id" class="w-full text-center px-4 py-2.5 bg-white border border-slate-200 hover:border-[#7096D1] text-slate-600 rounded-xl font-bold text-xs shadow-sm active:scale-95 transition-all flex items-center justify-center">
                    Lihat Profil
                  </RouterLink>
                </div>
              </div>
            </div>
          </div>
          
        </div>
      </div>

      <!-- RIGHT SIDEBAR (360px): PERFORMANCE & QUICK ACTIONS -->
      <div class="space-y-6 lg:sticky lg:top-6">
        
        <!-- Upcoming Session Card -->
        <div v-if="upcomingSession" class="card-panel p-5 transition-all duration-200 relative overflow-hidden bg-white border border-slate-200 shadow-sm">
          <div class="flex items-center justify-between mb-4">
            <h3 class="text-xs font-bold text-slate-900 uppercase tracking-widest flex items-center gap-2">
              <span class="w-2 h-2 rounded-full bg-rose-500 animate-pulse"></span>
              Jadwal Sesi Terdekat
            </h3>
            <span class="px-2 py-0.5 bg-[#EDF1F6] text-[#334EAC] text-[9px] font-bold rounded uppercase tracking-wider">Terjadwalkan</span>
          </div>

          <div class="flex items-center gap-3 mb-4">
            <div class="w-10 h-10 rounded-xl bg-slate-100 overflow-hidden shrink-0 border border-slate-200">
              <img :src="upcomingSession.tutor?.avatar_url || 'https://ui-avatars.com/api/?name=' + upcomingSession.tutor?.name" alt="Mentor" class="w-full h-full object-cover">
            </div>
            <div>
              <h4 class="text-sm font-bold text-[#081F5C] mb-0.5 truncate max-w-[180px]">{{ upcomingSession.title }}</h4>
              <p class="text-[11px] text-slate-400">Tutor: <span class="text-[#334EAC] font-bold">{{ upcomingSession.tutor?.name }}</span></p>
            </div>
          </div>

          <div class="bg-slate-50 rounded-xl p-3 mb-4 flex items-center justify-between border border-slate-200/40">
            <div class="flex items-center gap-2.5">
              <div class="w-7 h-7 rounded-lg bg-white flex items-center justify-center text-[#334EAC] border border-slate-200/60 shadow-sm">
                <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><rect x="3" y="4" width="18" height="18" rx="2" ry="2"/><line x1="16" y1="2" x2="16" y2="6"/><line x1="8" y1="2" x2="8" y2="6"/><line x1="3" y1="10" x2="21" y2="10"/></svg>
              </div>
              <div>
                <p class="text-[11px] font-bold text-[#081F5C]">{{ formatSessionTime(upcomingSession) }}</p>
                <p class="text-[9px] text-slate-400">{{ upcomingSession.duration_minutes }} Menit • Status: {{ upcomingSession.status }}</p>
              </div>
            </div>
          </div>

          <button @click="enterMentoringRoom" class="w-full py-2.5 bg-[#334EAC] hover:bg-[#081F5C] text-white rounded-xl font-bold text-xs transition-all shadow-sm active:scale-95 flex items-center justify-center gap-1.5">
            <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"><path d="M2 12h20"/><path d="m15 5 7 7-7 7"/></svg>
            Masuk Ruang Mentoring
          </button>
        </div>

        <div v-else class="card-panel p-5 text-center py-8 bg-white border border-slate-200 shadow-sm">
          <div class="w-10 h-10 rounded-full bg-slate-50 flex items-center justify-center text-slate-400 mx-auto mb-3 border border-slate-100">
            <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><rect width="18" height="18" x="3" y="4" rx="2" ry="2"/><line x1="16" x2="16" y1="2" y2="6"/><line x1="8" x2="8" y1="2" y2="6"/><line x1="3" x2="21" y1="10" y2="10"/></svg>
          </div>
          <h4 class="text-xs font-bold text-slate-700">Tidak ada bimbingan terdekat</h4>
          <p class="text-[10px] text-slate-400 mt-1 max-w-[200px] mx-auto">Jadwal bimbingan aktif Anda bersama tutor pilihan akan muncul di sini.</p>
        </div>

        <!-- Session History Panel -->
        <div class="card-panel p-5 transition-all duration-200 bg-white border border-slate-200 shadow-sm">
          <div class="flex items-center justify-between mb-4">
            <h3 class="text-xs font-bold text-slate-900 uppercase tracking-wider">Riwayat Sesi Selesai</h3>
            <span class="text-[10px] text-slate-400 font-bold">Terbaru</span>
          </div>

          <div v-if="completedSessions.length > 0" class="space-y-3">
            <div v-for="session in completedSessions.slice(0, 3)" :key="session.id" class="flex items-start gap-3 p-3 rounded-xl bg-slate-50 hover:bg-[#F7F2EB]/50 border border-slate-200/40 hover:border-slate-200 transition-all cursor-pointer group">
              <div class="w-8 h-8 rounded-lg bg-emerald-50 flex items-center justify-center text-emerald-600 shrink-0 border border-emerald-100">
                <svg v-if="session.status === 'completed'" xmlns="http://www.w3.org/2000/svg" width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"><polyline points="20 6 9 17 4 12"/></svg>
                <svg v-else xmlns="http://www.w3.org/2000/svg" width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round" class="text-rose-500"><line x1="18" y1="6" x2="6" y2="18"/><line x1="6" y1="6" x2="18" y2="18"/></svg>
              </div>
              <div class="min-w-0 flex-1">
                <h4 class="text-xs font-bold text-[#081F5C] mb-0.5 group-hover:text-[#334EAC] transition-colors truncate">{{ session.title }}</h4>
                <p class="text-[10px] text-slate-500 mb-1">Tutor: {{ session.tutor?.name }}</p>
                <div class="flex items-center justify-between">
                  <span class="text-[9px] text-slate-400 font-medium">{{ formatSessionDate(session) }}</span>
                  <span class="text-[9px] font-bold px-1.5 py-0.5 rounded capitalize" :class="session.status === 'completed' ? 'bg-emerald-100 text-emerald-800' : 'bg-rose-100 text-rose-800'">{{ session.status }}</span>
                </div>
              </div>
            </div>
          </div>
          
          <div v-else class="text-center py-6 text-[10px] text-slate-400 font-medium">
            Belum ada riwayat sesi selesai.
          </div>
        </div>

      </div>
    </div>

    <!-- Booking Modal -->
    <Teleport to="body">
      <div v-if="showModal" class="fixed inset-0 z-[100] flex items-center justify-center p-4 sm:p-6">
        <div class="absolute inset-0 bg-[#081F5C]/60 backdrop-blur-md transition-opacity" @click="closeBooking"></div>
        
        <div class="bg-white rounded-[24px] w-full max-w-xl relative z-10 shadow-2xl animate-in zoom-in-95 duration-300 overflow-hidden flex flex-col max-h-[90vh] border border-slate-100">
          
          <!-- Modal Header -->
          <div class="px-8 pt-8 pb-6 border-b border-slate-100 bg-white relative shrink-0">
            <button @click="closeBooking" class="absolute top-6 right-6 w-8 h-8 flex items-center justify-center rounded-full bg-slate-50 text-slate-400 hover:bg-slate-100 hover:text-slate-600 transition-colors">
              <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M18 6 6 18"/><path d="m6 6 12 12"/></svg>
            </button>
            <div class="flex items-center gap-5">
              <div class="w-14 h-14 rounded-2xl bg-[#EEF3FF] text-[#334EAC] flex items-center justify-center shrink-0 border border-[#D5E2F5]">
                <svg xmlns="http://www.w3.org/2000/svg" width="26" height="26" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><rect width="18" height="18" x="3" y="4" rx="2" ry="2"/><line x1="16" x2="16" y1="2" y2="6"/><line x1="8" x2="8" y1="2" y2="6"/><line x1="3" x2="21" y1="10" y2="10"/></svg>
              </div>
              <div>
                <h2 class="text-2xl font-bold text-slate-900 tracking-tight">Jadwalkan Mentoring</h2>
                <p class="text-[14px] font-medium text-slate-500 mt-1">
                  Sesi 1-on-1 dengan <span class="font-bold text-[#334EAC]">{{ selectedTutor ? selectedTutor.name : '' }}</span>
                </p>
              </div>
            </div>
          </div>
          
          <!-- Modal Body -->
          <div class="p-8 overflow-y-auto custom-scrollbar bg-slate-50/50">
            <div class="space-y-6">
              <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div class="space-y-2">
                  <label class="block text-[12px] font-bold text-slate-600 ml-1">Tanggal Sesi</label>
                  <div class="relative">
                    <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none text-slate-400">
                      <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><rect width="18" height="18" x="3" y="4" rx="2" ry="2"/><line x1="16" x2="16" y1="2" y2="6"/><line x1="8" x2="8" y1="2" y2="6"/><line x1="3" x2="21" y1="10" y2="10"/></svg>
                    </div>
                    <input type="date" v-model="bookingDate" class="w-full pl-11 pr-4 py-3.5 bg-white border border-slate-200 hover:border-[#7096D1] rounded-2xl text-[14px] font-bold text-slate-900 focus:outline-none focus:ring-2 focus:ring-[#334EAC] focus:border-transparent transition-all shadow-sm">
                  </div>
                </div>
                <div class="space-y-2">
                  <label class="block text-[12px] font-bold text-slate-600 ml-1">Waktu Mulai</label>
                  <div class="relative">
                    <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none text-slate-400">
                      <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"/><polyline points="12 6 12 12 16 14"/></svg>
                    </div>
                    <select v-model="bookingTime" class="w-full pl-11 pr-4 py-3.5 bg-white border border-slate-200 hover:border-[#7096D1] rounded-2xl text-[14px] font-bold text-slate-900 focus:outline-none focus:ring-2 focus:ring-[#334EAC] focus:border-transparent transition-all shadow-sm appearance-none cursor-pointer">
                      <option value="">Pilih Jam</option>
                      <option value="10:00">10:00 WIB</option>
                      <option value="13:00">13:00 WIB</option>
                      <option value="15:00">15:00 WIB</option>
                    </select>
                    <div class="absolute inset-y-0 right-0 pr-4 flex items-center pointer-events-none text-slate-400">
                      <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"><path d="m6 9 6 6 6-6"/></svg>
                    </div>
                  </div>
                </div>
              </div>
              
              <div class="space-y-2">
                <label class="block text-[12px] font-bold text-slate-600 ml-1">Topik Mentoring</label>
                <input type="text" v-model="bookingTopic" class="w-full px-5 py-3.5 bg-white border border-slate-200 hover:border-[#7096D1] rounded-2xl text-[14px] font-bold text-slate-900 focus:outline-none focus:ring-2 focus:ring-[#334EAC] focus:border-transparent transition-all shadow-sm placeholder-slate-400" placeholder="Contoh: Persiapan UTS Kalkulus Lanjut, Review Algoritma">
              </div>
              
              <div class="space-y-2">
                <label class="block text-[12px] font-bold text-slate-600 ml-1">Catatan Tambahan (Minimal 20 Karakter)</label>
                <textarea rows="3" v-model="bookingNotes" class="w-full px-5 py-3.5 bg-white border border-slate-200 hover:border-[#7096D1] rounded-2xl text-[14px] font-medium text-slate-700 focus:outline-none focus:ring-2 focus:ring-[#334EAC] focus:border-transparent transition-all shadow-sm resize-none placeholder-slate-400" placeholder="Ada materi spesifik yang ingin dibahas? Tuliskan secara detail di sini."></textarea>
              </div>
            </div>
          </div>
          
          <!-- Modal Footer -->
          <div class="px-8 py-6 bg-white border-t border-slate-100 flex items-center justify-end gap-3 rounded-b-[24px] shrink-0">
            <button @click="closeBooking" class="px-6 py-3.5 text-[14px] font-bold text-slate-600 hover:bg-slate-50 bg-white border border-slate-200 hover:border-slate-300 rounded-xl transition-all shadow-sm active:scale-95">Batalkan</button>
            <button @click="submitBooking" :disabled="isSubmitting" class="px-8 py-3.5 bg-[#334EAC] hover:bg-[#081F5C] text-white text-[14px] font-bold rounded-xl transition-all shadow-[0_4px_15px_rgba(51,78,172,0.15)] active:scale-95 flex items-center gap-2" :class="isSubmitting ? 'opacity-70 cursor-wait' : ''">
              <svg v-if="isSubmitting" class="animate-spin -ml-1 mr-2 h-4 w-4 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
              </svg>
              {{ isSubmitting ? 'Mengirim...' : 'Konfirmasi Booking' }}
            </button>
          </div>
        </div>
      </div>
    </Teleport>

    <!-- Success Toast -->
    <Teleport to="body">
      <div v-if="showSuccess" class="fixed bottom-6 right-6 z-[100] bg-emerald-500 text-white px-6 py-4 rounded-2xl shadow-[0_10px_40px_rgba(16,185,129,0.3)] flex items-center gap-3 animate-in slide-in-from-bottom-5">
        <div class="w-8 h-8 bg-white/20 rounded-full flex items-center justify-center shrink-0">
          <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"><polyline points="20 6 9 17 4 12"/></svg>
        </div>
        <div>
          <h4 class="font-extrabold text-sm">{{ toastTitle }}</h4>
          <p class="text-xs text-emerald-100 font-medium">{{ toastMessage }}</p>
        </div>
      </div>
    </Teleport>
    
    <!-- Info Toast -->
    <Teleport to="body">
      <div v-if="showInfo" class="fixed bottom-6 right-6 z-[100] bg-[#334EAC] text-white px-6 py-4 rounded-2xl shadow-[0_10px_40px_rgba(51,78,172,0.3)] flex items-center gap-3 animate-in slide-in-from-bottom-5">
        <div class="w-8 h-8 bg-white/20 rounded-full flex items-center justify-center shrink-0">
          <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"/><line x1="12" y1="16" x2="12" y2="12"/><line x1="12" y1="8" x2="12.01" y2="8"/></svg>
        </div>
        <div>
          <h4 class="font-extrabold text-sm">Informasi</h4>
          <p class="text-xs text-[#BAD6EB] font-medium">{{ infoMessage }}</p>
        </div>
      </div>
    </Teleport>

  </div>
</template>

<script setup>
import { ref, onMounted, computed } from 'vue'
import { useRouter, RouterLink } from 'vue-router'
import { mentoringService } from '@/services/mentoring.service'

const router = useRouter()
const tutors = ref([])
const sessions = ref([])
const isLoading = ref(true)
const isError = ref(false)
const isSubmitting = ref(false)

const showModal = ref(false)
const showSuccess = ref(false)
const showInfo = ref(false)
const toastTitle = ref('Berhasil!')
const toastMessage = ref('Aksi berhasil dilakukan.')
const infoMessage = ref('')
const selectedTutor = ref(null)

// Booking form states
const bookingDate = ref('')
const bookingTime = ref('')
const bookingTopic = ref('')
const bookingNotes = ref('')

// Filter states
const searchQuery = ref('')
const selectedCategory = ref('')
const selectedRating = ref('')
const isFiltering = ref(false)

const fetchData = async () => {
  isLoading.value = true
  isError.value = false
  try {
    const [tutorsRes, sessionsRes] = await Promise.all([
      mentoringService.getTutors(),
      mentoringService.getSessions()
    ])
    tutors.value = tutorsRes.data || []
    sessions.value = sessionsRes || []
  } catch (error) {
    console.error('Failed fetching mentoring workspace data:', error)
    isError.value = true
  } finally {
    isLoading.value = false
  }
}

onMounted(() => {
  fetchData()
})

// Filtered tutors computed property
const filteredTutors = computed(() => {
  return tutors.value.filter(tutor => {
    // Search filter
    const matchesSearch = !searchQuery.value || 
      tutor.name.toLowerCase().includes(searchQuery.value.toLowerCase()) ||
      (tutor.email && tutor.email.toLowerCase().includes(searchQuery.value.toLowerCase())) ||
      (tutor.tutor_profile?.bio && tutor.tutor_profile.bio.toLowerCase().includes(searchQuery.value.toLowerCase()))

    // Rating filter
    const rating = parseFloat(tutor.tutor_profile?.rating || 0)
    const matchesRating = !selectedRating.value || rating >= parseFloat(selectedRating.value)

    // Category filter: since we don't have explicit category fields, we can match bio keywords or badges
    const matchesCategory = !selectedCategory.value || (() => {
      const bio = (tutor.tutor_profile?.bio || '').toLowerCase()
      if (selectedCategory.value === 'cs') {
        return bio.includes('komputer') || bio.includes('vue') || bio.includes('programming') || bio.includes('web') || bio.includes('software') || bio.includes('data') || bio.includes('algoritma')
      } else if (selectedCategory.value === 'math') {
        return bio.includes('matematika') || bio.includes('kalkulus') || bio.includes('aljabar')
      } else if (selectedCategory.value === 'physics') {
        return bio.includes('fisika') || bio.includes('mekanika') || bio.includes('termodinamika')
      }
      return true
    })()

    return matchesSearch && matchesRating && matchesCategory
  })
})

// Upcoming sessions: next active session (pending/confirmed)
const upcomingSession = computed(() => {
  const active = sessions.value.filter(s => s.status === 'pending' || s.status === 'confirmed')
  return active.length > 0 ? active[active.length - 1] : null // latest active session
})

// Completed sessions
const completedSessions = computed(() => {
  return sessions.value.filter(s => s.status === 'completed' || s.status === 'cancelled')
})

const openBooking = (tutor) => {
  selectedTutor.value = tutor
  bookingTopic.value = ''
  bookingDate.value = ''
  bookingTime.value = ''
  bookingNotes.value = ''
  showModal.value = true
}

const closeBooking = () => {
  showModal.value = false
}

const submitBooking = async () => {
  if (!bookingDate.value || !bookingTime.value || !bookingTopic.value) {
    triggerSuccessToast('Form tidak lengkap', 'Harap isi tanggal, waktu, dan topik.')
    return
  }

  // Construct description combining notes, date, time
  const desc = `Jadwal: ${bookingDate.value} pukul ${bookingTime.value} WIB. Catatan: ${bookingNotes.value || '-'}`
  if (desc.length < 20) {
    triggerSuccessToast('Catatan Kurang Panjang', 'Harap isi catatan tambahan minimal 20 karakter agar jelas bagi tutor.')
    return
  }

  isSubmitting.value = true
  try {
    await mentoringService.createMentoringRequest({
      tutor_id: selectedTutor.value.id,
      title: bookingTopic.value,
      description: desc,
      duration_minutes: 60,
      student_message: bookingNotes.value || null
    })
    showModal.value = false
    triggerSuccessToast('Booking Berhasil!', 'Permintaan mentoring Anda telah dikirim.')
    fetchData()
  } catch (err) {
    triggerSuccessToast('Gagal Booking', err || 'Terjadi kesalahan saat mengirim permintaan mentoring.')
  } finally {
    isSubmitting.value = false
  }
}

const applyFilter = () => {
  isFiltering.value = true
  setTimeout(() => {
    isFiltering.value = false
    triggerSuccessToast('Filter Diterapkan', 'Daftar tutor telah diperbarui.')
  }, 300)
}

const enterMentoringRoom = () => {
  showInfoToast('Memasuki ruang mentoring daring...')
}

const triggerSuccessToast = (title, message) => {
  toastTitle.value = title
  toastMessage.value = message
  showSuccess.value = true
  setTimeout(() => {
    showSuccess.value = false
  }, 3000)
}

const showInfoToast = (msg) => {
  infoMessage.value = msg
  showInfo.value = true
  setTimeout(() => {
    showInfo.value = false
  }, 3000)
}

// Helpers for formatted date/time extraction from combined description
const formatSessionTime = (session) => {
  if (session.scheduled_at) {
    const d = new Date(session.scheduled_at)
    return d.toLocaleDateString('id-ID', { weekday: 'long', day: 'numeric', month: 'short' }) + ', ' + d.toLocaleTimeString('id-ID', { hour: '2-digit', minute: '2-digit' }) + ' WIB'
  }
  if (session.description && session.description.startsWith('Jadwal: ')) {
    const parts = session.description.split('. ')
    return parts[0].replace('Jadwal: ', '')
  }
  return 'Jadwal belum ditentukan'
}

const formatSessionDate = (session) => {
  if (session.scheduled_at) {
    const d = new Date(session.scheduled_at)
    return d.toLocaleDateString('id-ID', { day: 'numeric', month: 'short' })
  }
  if (session.description && session.description.startsWith('Jadwal: ')) {
    const parts = session.description.split(' pukul ')
    if (parts[0]) {
      return parts[0].replace('Jadwal: ', '')
    }
  }
  const d = new Date(session.created_at)
  return d.toLocaleDateString('id-ID', { day: 'numeric', month: 'short' })
}
</script>

<style scoped>
/* Mentoring Specific Adjustments */
.mentor-card {
  transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
}
.mentor-card:hover {
  transform: translateY(-4px);
  box-shadow: 0 15px 35px rgba(15, 23, 42, 0.08);
}
.mentor-avatar {
  border: 2px solid transparent;
}
.mentor-card:hover .mentor-avatar {
  border-color: #334EAC;
}
.status-indicator {
  background: linear-gradient(135deg, #10B981, #059669);
}
</style>
