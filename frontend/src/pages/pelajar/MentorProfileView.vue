<template>
  <div class="space-y-6 animate-in fade-in duration-500 pb-12">
    
    <!-- Back Navigation -->
    <div class="mb-6 flex items-center gap-2">
      <RouterLink
        to="/pelajar/mentoring"
        class="text-sm font-bold text-slate-400 hover:text-[#334EAC] transition-colors flex items-center gap-1 w-fit bg-white/50 px-3 py-1.5 rounded-lg border border-slate-200/50"
      >
        ← Kembali ke Mentoring
      </RouterLink>
    </div>

    <!-- Loading Skeleton Screen -->
    <div v-if="isLoading" class="animate-pulse space-y-6">
      <div class="page-header-banner p-7 md:p-8 flex flex-col justify-between gap-6 mb-8 bg-slate-200 h-28 rounded-[24px]"></div>
      <div class="grid grid-cols-1 xl:grid-cols-[1fr_360px] gap-8">
        <div class="space-y-8">
          <div class="card-base p-8 md:p-10 bg-white border border-slate-100 rounded-[24px] space-y-6">
            <div class="flex flex-col sm:flex-row items-center gap-8">
              <div class="w-32 h-32 rounded-3xl bg-slate-200"></div>
              <div class="flex-1 space-y-3">
                <div class="h-6 bg-slate-200 rounded w-1/3"></div>
                <div class="h-4 bg-slate-200 rounded w-1/4"></div>
                <div class="h-16 bg-slate-100 rounded w-full"></div>
              </div>
            </div>
          </div>
          <div class="card-base p-8 bg-white border border-slate-100 rounded-[24px] h-40"></div>
        </div>
        <div class="card-base p-8 bg-white border border-slate-100 rounded-[24px] h-60"></div>
      </div>
    </div>

    <!-- Error State -->
    <div v-else-if="isError" class="card-base p-12 text-center space-y-4 flex flex-col items-center justify-center bg-white border border-slate-200 max-w-xl mx-auto my-12">
      <div class="w-16 h-16 rounded-full bg-rose-50 flex items-center justify-center text-rose-500 mx-auto">
        <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"/><line x1="12" y1="8" x2="12" y2="12"/><line x1="12" y1="16" x2="12.01" y2="16"/></svg>
      </div>
      <div class="space-y-1">
        <h3 class="text-base font-bold text-slate-800">Gagal memuat profil mentor.</h3>
        <p class="text-xs text-slate-500 font-medium">Tutor tidak ditemukan atau terjadi masalah koneksi.</p>
      </div>
      <button @click="fetchTutor" class="px-5 py-2.5 bg-[#334EAC] hover:bg-[#081F5C] text-white font-bold text-xs rounded-xl transition-all shadow-sm">
        Coba Lagi
      </button>
    </div>

    <!-- Profile Workspace -->
    <div v-else-if="tutor" class="space-y-6">
      
      <!-- 1. GLASSMORPHIC HEADER SECTION -->
      <div class="page-header-banner p-7 md:p-8 flex flex-col md:flex-row md:items-center justify-between gap-6 mb-8 relative">
        <div class="absolute right-0 top-0 w-1/3 h-full bg-gradient-to-l from-[#EDF1F6]/80 to-transparent pointer-events-none"></div>
        
        <div class="relative z-10 flex items-center gap-4">
          <div>
            <h1 class="text-3xl md:text-4xl font-extrabold text-[#081F5C] tracking-tight leading-tight">Profil Mentor</h1>
            <p class="text-[15px] text-slate-600 font-medium mt-2 max-w-xl leading-relaxed">
              Lihat kredensial, ulasan, dan jadwalkan sesi mentoring bersama {{ tutor.name }}.
            </p>
          </div>
        </div>
      </div>

      <div class="grid grid-cols-1 xl:grid-cols-[1fr_360px] gap-8">
        
        <!-- Left Column: Profile Info -->
        <div class="space-y-8">
          
          <!-- Hero Card -->
          <div class="card-base p-8 md:p-10 relative overflow-hidden bg-white border border-slate-200 shadow-sm rounded-[24px]">
            <div class="absolute top-0 right-0 w-64 h-64 bg-gradient-to-br from-[#334EAC]/5 to-transparent rounded-bl-full pointer-events-none"></div>
            
            <div class="flex flex-col sm:flex-row items-center sm:items-start gap-8 relative z-10">
              <div class="relative shrink-0">
                <div class="w-32 h-32 rounded-3xl bg-slate-100 overflow-hidden border-4 border-white shadow-lg">
                  <img :src="tutor.avatar_url" :alt="tutor.name" class="w-full h-full object-cover">
                </div>
                <div v-if="tutor.is_verified" class="absolute -bottom-2 -right-2 w-8 h-8 bg-[#334EAC] rounded-full border-4 border-white flex items-center justify-center text-white shadow-sm">
                  <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="4" stroke-linecap="round" stroke-linejoin="round"><polyline points="20 6 9 17 4 12"/></svg>
                </div>
              </div>
              
              <div class="flex-1 text-center sm:text-left">
                <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4 mb-2">
                  <div>
                    <h2 class="text-3xl font-bold text-slate-900 tracking-tight mb-1">{{ tutor.name }}</h2>
                    <p class="text-[15px] font-bold text-slate-500 bg-slate-100/80 px-3 py-1 rounded-lg inline-block border border-slate-200/50">
                      {{ tutor.badges && tutor.badges.length > 0 ? tutor.badges[0].name : 'Tutor Terverifikasi' }}
                    </p>
                  </div>
                  <div v-if="tutor.tutor_profile?.rating" class="bg-[#F7F2EB] px-4 py-2 rounded-xl border border-amber-100 flex flex-col items-center justify-center shrink-0">
                    <div class="flex items-center gap-1.5 mb-0.5">
                      <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="#F59E0B" stroke="#F59E0B" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"/></svg>
                      <span class="text-xl font-bold text-[#081F5C] leading-none">{{ parseFloat(tutor.tutor_profile.rating).toFixed(1) }}</span>
                    </div>
                    <span class="text-[10px] font-bold text-amber-600 uppercase tracking-widest">{{ tutor.tutor_reviews?.length || 0 }} Ulasan</span>
                  </div>
                </div>
                
                <p class="text-[15px] text-slate-600 leading-relaxed mb-6 max-w-2xl">
                  {{ tutor.tutor_profile?.bio || 'Halo! Saya berkomitmen membantu Anda memahami materi kuliah dan asisten akademik secara komprehensif.' }}
                </p>
                
                <div v-if="tutor.badges && tutor.badges.length > 0" class="flex flex-wrap items-center justify-center sm:justify-start gap-2">
                  <span v-for="badge in tutor.badges" :key="badge.id" class="px-3 py-1.5 bg-[#EEF3FF] text-[#334EAC] text-[12px] font-bold rounded-xl uppercase tracking-wider border border-[#D5E2F5]">
                    {{ badge.name }}
                  </span>
                </div>
              </div>
            </div>
          </div>

          <!-- Experience & Credentials: Only show if dynamic fields exist in schema -->
          <div v-if="tutor.education || tutor.experience" class="grid grid-cols-1 md:grid-cols-2 gap-8">
            <div v-if="tutor.education" class="card-base p-8 hover:shadow-xl transition-all bg-white border border-slate-200 rounded-[24px]">
              <h3 class="text-[15px] font-bold text-slate-900 mb-6 flex items-center gap-2">
                <span class="w-8 h-8 rounded-lg bg-emerald-50 text-emerald-500 flex items-center justify-center border border-emerald-100">
                  <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M22 10v6M2 10l10-5 10 5-10 5z"/><path d="M6 12v5c3 3 9 3 12 0v-5"/></svg>
                </span>
                Pendidikan
              </h3>
              <div class="space-y-6">
                <div v-for="(edu, index) in tutor.education" :key="index" class="relative pl-6 border-l-2 border-slate-100 pb-2">
                  <div class="absolute -left-[9px] top-0 w-4 h-4 rounded-full bg-white border-[3px]" :class="index === 0 ? 'border-[#334EAC]' : 'border-slate-300'"></div>
                  <h4 class="text-[14px] font-bold text-slate-900">{{ edu.degree }}</h4>
                  <p class="text-[13px] font-medium text-[#334EAC] mb-1">{{ edu.school }}</p>
                  <p class="text-[12px] font-bold text-slate-400">{{ edu.period }}</p>
                </div>
              </div>
            </div>

            <div v-if="tutor.experience" class="card-base p-8 hover:shadow-xl transition-all bg-white border border-slate-200 rounded-[24px]">
              <h3 class="text-[15px] font-bold text-slate-900 mb-6 flex items-center gap-2">
                <span class="w-8 h-8 rounded-lg bg-[#EEF3FF] text-[#334EAC] flex items-center justify-center border border-[#D5E2F5]">
                  <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M16 21v-2a4 4 0 0 0-4-4H6a4 4 0 0 0-4 4v2"/><circle cx="9" cy="7" r="4"/><polyline points="16 11 18 13 22 9"/></svg>
                </span>
                Pengalaman
              </h3>
              <div class="space-y-6">
                <div v-for="(exp, index) in tutor.experience" :key="index" class="relative pl-6 border-l-2 border-slate-100 pb-2">
                  <div class="absolute -left-[9px] top-0 w-4 h-4 rounded-full bg-white border-[3px]" :class="index === 0 ? 'border-[#334EAC]' : 'border-slate-300'"></div>
                  <h4 class="text-[14px] font-bold text-slate-900">{{ exp.title }}</h4>
                  <p class="text-[13px] font-medium text-[#334EAC] mb-1">{{ exp.company }}</p>
                  <p class="text-[12px] font-bold text-slate-400">{{ exp.period }}</p>
                </div>
              </div>
            </div>
          </div>

          <!-- Student Reviews -->
          <div class="card-base p-8 md:p-10 bg-white border border-slate-200 shadow-sm rounded-[24px]">
            <div class="flex items-center justify-between mb-8">
              <h3 class="text-[17px] font-bold text-slate-900">Ulasan Pelajar</h3>
            </div>

            <div v-if="tutor.tutor_reviews && tutor.tutor_reviews.length > 0" class="grid grid-cols-1 md:grid-cols-2 gap-6">
              <div v-for="review in tutor.tutor_reviews" :key="review.id" class="p-6 bg-slate-50 rounded-2xl border border-slate-100">
                <div class="flex items-center justify-between mb-4">
                  <div class="flex items-center gap-3">
                    <div class="w-10 h-10 rounded-full bg-white overflow-hidden shadow-sm flex items-center justify-center font-bold text-slate-700 text-xs border border-slate-100">
                      <img v-if="review.student?.avatar_url" :src="review.student.avatar_url" alt="User" class="w-full h-full object-cover">
                      <span v-else>{{ getInitials(review.student?.name) }}</span>
                    </div>
                    <div>
                      <h4 class="text-[13px] font-bold text-slate-900">{{ review.student?.name || 'Siswa' }}</h4>
                      <p class="text-[11px] text-slate-400 font-bold">{{ formatDate(review.created_at) }}</p>
                    </div>
                  </div>
                  <div class="flex items-center gap-0.5">
                    <svg v-for="i in 5" :key="i" xmlns="http://www.w3.org/2000/svg" width="12" height="12" viewBox="0 0 24 24" :fill="i <= review.rating ? '#F59E0B' : 'none'" :stroke="i <= review.rating ? '#F59E0B' : '#CBD5E1'" stroke-width="2"><polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"/></svg>
                  </div>
                </div>
                <p class="text-[13px] text-slate-600 leading-relaxed font-medium">"{{ review.review }}"</p>
              </div>
            </div>
            
            <div v-else class="text-center py-8 text-sm text-slate-400 font-medium bg-slate-50 rounded-2xl border border-slate-100/50">
              Belum ada ulasan.
            </div>
          </div>

        </div>

        <!-- Right Column: Booking & Availability -->
        <div class="space-y-6">
          
          <!-- Booking Card -->
          <div class="card-base p-8 sticky top-8 bg-white border border-slate-200 shadow-sm rounded-[24px]">
            <!-- Hide price section since the field is not in schema -->
            <div v-if="tutor.price" class="flex items-center justify-between mb-6">
              <span class="text-[14px] font-bold text-slate-500 uppercase tracking-widest">Tarif Sesi</span>
              <span class="text-2xl font-bold text-[#081F5C]">Rp {{ tutor.price / 1000 }}k<span class="text-[12px] text-slate-400 font-medium">/jam</span></span>
            </div>

            <div class="space-y-6 mb-8">
              <div class="flex items-start gap-4">
                <div class="w-10 h-10 rounded-xl bg-emerald-50 text-emerald-500 flex items-center justify-center shrink-0 border border-emerald-100">
                  <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><rect width="18" height="18" x="3" y="4" rx="2" ry="2"/><line x1="16" x2="16" y1="2" y2="6"/><line x1="8" x2="8" y1="2" y2="6"/><line x1="3" x2="21" y1="10" y2="10"/></svg>
                </div>
                <div>
                  <h4 class="text-[13px] font-bold text-slate-900 mb-1">Jadwal Tersedia</h4>
                  <p class="text-[12px] font-medium text-slate-500 leading-relaxed">Tutor ini menerima jadwal mentoring dari Senin hingga Jumat, pukul 10:00 - 18:00 WIB.</p>
                </div>
              </div>

              <div class="flex items-start gap-4">
                <div class="w-10 h-10 rounded-xl bg-[#EEF3FF] text-[#334EAC] flex items-center justify-center shrink-0 border border-[#D5E2F5]">
                  <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="m15.6 11.6 5.4-3.2c.5-.3 1.2 0 1.2.7v5.8c0 .7-.7 1-1.2.7l-5.4-3.2a1.2 1.2 0 0 1 0-2Z"/><rect width="14" height="14" x="2" y="5" rx="3" ry="3"/></svg>
                </div>
                <div>
                  <h4 class="text-[13px] font-bold text-slate-900 mb-1">Platform Mentoring</h4>
                  <p class="text-[12px] font-medium text-slate-500 leading-relaxed">Sesi dilakukan secara daring via Google Meet terintegrasi atau platform kolaborasi.</p>
                </div>
              </div>
            </div>

            <button @click="showModal = true" class="w-full py-4 bg-[#334EAC] hover:bg-[#081F5C] text-white rounded-2xl font-bold text-[15px] transition-all shadow-[0_4px_15px_rgba(51,78,172,0.15)] active:scale-95 flex items-center justify-center gap-2">
              <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"><rect width="18" height="18" x="3" y="4" rx="2" ry="2"/><line x1="16" x2="16" y1="2" y2="6"/><line x1="8" x2="8" y1="2" y2="6"/><line x1="3" x2="21" y1="10" y2="10"/></svg>
              Jadwalkan Mentoring
            </button>
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
                    Sesi 1-on-1 dengan <span class="font-bold text-[#334EAC]">{{ tutor.name }}</span>
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
            <h4 class="font-extrabold text-sm">Booking Berhasil!</h4>
            <p class="text-xs text-emerald-100 font-medium">Jadwalmu telah ditambahkan ke dashboard.</p>
          </div>
        </div>
      </Teleport>

    </div>
  </div>
</template>

<script setup>
import { ref, onMounted, computed } from 'vue'
import { RouterLink, useRoute, useRouter } from 'vue-router'
import { mentoringService } from '@/services/mentoring.service'

const route = useRoute()
const router = useRouter()

const tutor = ref(null)
const isLoading = ref(true)
const isError = ref(false)
const isSubmitting = ref(false)

const showModal = ref(false)
const showSuccess = ref(false)

// Booking form states
const bookingDate = ref('')
const bookingTime = ref('')
const bookingTopic = ref('')
const bookingNotes = ref('')

const fetchTutor = async () => {
  const tutorId = route.params.id
  isLoading.value = true
  isError.value = false
  try {
    const data = await mentoringService.getTutorById(tutorId)
    tutor.value = data
  } catch (error) {
    console.error('Failed fetching tutor profile:', error)
    isError.value = true
  } finally {
    isLoading.value = false
  }
}

onMounted(() => {
  fetchTutor()
})

const getInitials = (name) => {
  if (!name) return ''
  return name.split(' ').map(n => n[0]).join('').substring(0, 2).toUpperCase()
}

const formatDate = (dateString) => {
  if (!dateString) return ''
  const d = new Date(dateString)
  return d.toLocaleDateString('id-ID', { day: 'numeric', month: 'short', year: 'numeric' })
}

const closeBooking = () => {
  showModal.value = false
}

const submitBooking = async () => {
  if (!bookingDate.value || !bookingTime.value || !bookingTopic.value) {
    alert('Harap isi tanggal, waktu, dan topik.')
    return
  }

  // Construct description combining notes, date, time
  const desc = `Jadwal: ${bookingDate.value} pukul ${bookingTime.value} WIB. Catatan: ${bookingNotes.value || '-'}`
  if (desc.length < 20) {
    alert('Harap isi catatan tambahan minimal 20 karakter agar jelas bagi tutor.')
    return
  }

  isSubmitting.value = true
  try {
    await mentoringService.createMentoringRequest({
      tutor_id: tutor.value.id,
      title: bookingTopic.value,
      description: desc,
      duration_minutes: 60,
      student_message: bookingNotes.value || null
    })
    showModal.value = false
    showSuccess.value = true
    setTimeout(() => {
      showSuccess.value = false
      router.push('/pelajar/mentoring')
    }, 2000)
  } catch (err) {
    alert(err || 'Gagal mengirim permintaan bimbingan.')
  } finally {
    isSubmitting.value = false
  }
}
</script>
