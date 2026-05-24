<template>
  <div class="relative min-h-screen pb-12 overflow-hidden bg-[#F7F2EB]">
    <!-- Mesh Background / Atmosphere -->
    <div class="absolute inset-0 pointer-events-none overflow-hidden">
      <div class="absolute top-[-10%] left-[-5%] w-[40%] h-[40%] bg-[#334EAC]/5 blur-[120px] rounded-full mix-blend-multiply"></div>
      <div class="absolute bottom-[-10%] right-[-10%] w-[50%] h-[50%] bg-[#7096D1]/10 blur-[120px] rounded-full mix-blend-multiply"></div>
      <div class="absolute inset-0 bg-[url('data:image/svg+xml;base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHdpZHRoPSIyNCIgaGVpZ2h0PSIyNCI+CjxyZWN0IHdpZHRoPSIyNCIgaGVpZ2h0PSIyNCIgZmlsbD0ibm9uZSIvPgo8Y2lyY2xlIGN4PSIyIiBjeT0iMiIgcj0iMSIgZmlsbD0icmdiYSgwLCAwLCAwLCAwLjA1KSIvPgo8L3N2Zz4=')] opacity-50 mix-blend-overlay"></div>
    </div>

    <div class="relative z-10 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8 space-y-8">
      
      <!-- 1. HEADER SECTION -->
      <div class="bg-white/80 backdrop-blur-xl rounded-3xl p-7 md:p-8 shadow-[0_10px_40px_rgba(15,23,42,0.06)] border border-white/40 relative overflow-hidden flex flex-col md:flex-row md:items-center justify-between gap-6 transition-all duration-300 ease-out hover:shadow-xl group/card">
        <div class="absolute right-0 top-0 w-1/3 h-full bg-gradient-to-l from-[#EDF1F6]/80 to-transparent pointer-events-none"></div>
        
        <div class="relative z-10">
          <div class="flex items-center gap-3 mb-2">
             <span class="w-10 h-10 rounded-xl bg-[#334EAC]/10 text-[#334EAC] flex items-center justify-center shrink-0">
               <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><rect width="18" height="18" x="3" y="4" rx="2" ry="2"/><line x1="16" x2="16" y1="2" y2="6"/><line x1="8" x2="8" y1="2" y2="6"/><line x1="3" x2="21" y1="10" y2="10"/><path d="M8 14h.01"/><path d="M12 14h.01"/><path d="M16 14h.01"/><path d="M8 18h.01"/><path d="M12 18h.01"/><path d="M16 18h.01"/></svg>
             </span>
             <h1 class="text-2xl md:text-3xl font-bold text-slate-900 tracking-tight">Kelola Mentoring</h1>
          </div>
          <p class="text-[14px] text-slate-500 font-medium max-w-xl leading-relaxed ml-14">
            Atur jadwal bimbingan, tinjau permintaan sesi baru, dan pantau durasi mengajar Anda secara real-time.
          </p>
        </div>

        <div class="relative z-10 flex shrink-0 gap-4">
          <div class="bg-slate-50 border border-slate-100 rounded-2xl p-4 flex flex-col items-center justify-center min-w-[100px]">
             <span class="text-2xl font-bold text-amber-500 leading-none mb-1 tracking-tight">3</span>
             <span class="text-[11px] font-bold text-slate-400 uppercase tracking-widest">Request</span>
          </div>
          <div class="bg-slate-50 border border-slate-100 rounded-2xl p-4 flex flex-col items-center justify-center min-w-[100px]">
             <span class="text-2xl font-bold text-emerald-500 leading-none mb-1 tracking-tight">4</span>
             <span class="text-[11px] font-bold text-slate-400 uppercase tracking-widest">Upcoming</span>
          </div>
          <div class="bg-slate-50 border border-slate-100 rounded-2xl p-4 flex flex-col items-center justify-center min-w-[110px] hidden sm:flex">
             <span class="text-2xl font-bold text-[#334EAC] leading-none mb-1 tracking-tight">12<span class="text-sm">j</span></span>
             <span class="text-[11px] font-bold text-slate-400 uppercase tracking-widest">Bulan Ini</span>
          </div>
        </div>
      </div>

      <div class="grid grid-cols-1 lg:grid-cols-12 gap-8">
        
        <!-- LEFT/CENTER CONTENT -->
        <div class="lg:col-span-8 space-y-6">
          
          <!-- 2. SESSION MANAGEMENT TABS -->
          <div class="bg-white/80 backdrop-blur-xl rounded-3xl p-2 shadow-sm border border-slate-200/60 flex flex-col sm:flex-row gap-2 transition-all duration-300 ease-out">
            <!-- Filters -->
            <div class="flex items-center gap-1 overflow-x-auto no-scrollbar w-full">
              <button class="px-5 py-2.5 rounded-xl bg-[#334EAC] text-white text-[13px] font-bold shadow-sm whitespace-nowrap active:scale-95 transition-transform">
                Jadwal Mendatang
              </button>
              <button class="px-5 py-2.5 rounded-xl text-slate-500 hover:text-[#081F5C] hover:bg-slate-100 text-[13px] font-bold transition-colors whitespace-nowrap relative">
                Permintaan Baru
                <span class="absolute top-1.5 right-1.5 w-2 h-2 bg-rose-500 rounded-full"></span>
              </button>
              <button class="px-5 py-2.5 rounded-xl text-slate-500 hover:text-[#081F5C] hover:bg-slate-100 text-[13px] font-bold transition-colors whitespace-nowrap">
                Selesai
              </button>
              
              <div class="ml-auto flex items-center gap-2 pl-4">
                <button class="flex items-center gap-2 px-4 py-2 bg-slate-50 border border-slate-200 hover:border-[#7096D1] text-[#334EAC] rounded-xl text-[12px] font-extrabold transition-all">
                  <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><rect width="18" height="18" x="3" y="4" rx="2" ry="2"/><line x1="16" x2="16" y1="2" y2="6"/><line x1="8" x2="8" y1="2" y2="6"/><line x1="3" x2="21" y1="10" y2="10"/><path d="M8 14h.01"/><path d="M12 14h.01"/><path d="M16 14h.01"/><path d="M8 18h.01"/><path d="M12 18h.01"/><path d="M16 18h.01"/></svg>
                  Tampilan Kalender
                </button>
              </div>
            </div>
          </div>

          <!-- 3. SESSION CARDS -->
          <div class="space-y-5">
            
            <!-- Card 1: Upcoming Session -->
            <div class="bg-white/80 backdrop-blur-xl rounded-3xl p-6 sm:p-7 shadow-[0_10px_40px_rgba(15,23,42,0.06)] border border-slate-100 group/card transition-all duration-300 ease-out hover:shadow-xl">
              <div class="flex flex-col sm:flex-row justify-between gap-5">
                
                <!-- Info -->
                <div class="flex-1">
                  <div class="flex items-center gap-3 mb-4">
                    <div class="w-12 h-12 rounded-full bg-[#EDF1F6] border-2 border-white shadow-sm flex items-center justify-center shrink-0 overflow-hidden">
                      <span class="text-[#081F5C] font-bold text-lg">BW</span>
                    </div>
                    <div>
                      <h3 class="text-[16px] font-bold text-slate-900 leading-none mb-1.5 tracking-tight">Budi Wijaya</h3>
                      <div class="flex items-center gap-2 text-[12px] font-bold text-slate-500">
                        <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round" class="text-[#7096D1]"><path d="M4 19.5v-15A2.5 2.5 0 0 1 6.5 2H20v20H6.5a2.5 2.5 0 0 1 0-5H20"/></svg>
                        Topik: Algoritma & Struktur Data
                      </div>
                    </div>
                  </div>
                  
                  <div class="bg-slate-50 border border-slate-100 rounded-xl p-3 mb-4 inline-block">
                    <p class="text-[11px] font-bold text-slate-400 uppercase tracking-widest mb-1">Notes Mahasiswa</p>
                    <p class="text-[13px] font-medium text-slate-600">"Pak, saya masih bingung cara mengimplementasikan Binary Search Tree di Java."</p>
                  </div>
                  
                  <div class="flex flex-wrap items-center gap-x-6 gap-y-3">
                    <div class="flex items-center gap-2 text-[13px] font-bold text-slate-900 tracking-tight">
                      <span class="w-7 h-7 rounded-lg bg-emerald-50 text-emerald-500 flex items-center justify-center"><svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><rect width="18" height="18" x="3" y="4" rx="2" ry="2"/><line x1="16" x2="16" y1="2" y2="6"/><line x1="8" x2="8" y1="2" y2="6"/><line x1="3" x2="21" y1="10" y2="10"/></svg></span>
                      Besok, 10:00 WIB
                    </div>
                    <div class="flex items-center gap-2 text-[13px] font-bold text-slate-900 tracking-tight">
                      <span class="w-7 h-7 rounded-lg bg-sky-50 text-sky-500 flex items-center justify-center"><svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"/><polyline points="12 6 12 12 16 14"/></svg></span>
                      Durasi 60 Menit
                    </div>
                    <span class="px-2.5 py-1 bg-emerald-50 text-emerald-600 rounded-lg text-[10px] font-extrabold uppercase tracking-widest border border-emerald-100">
                      Disetujui
                    </span>
                  </div>
                </div>

                <!-- 4. QUICK ACTIONS -->
                <div class="flex flex-row sm:flex-col items-center sm:items-end justify-center sm:justify-start gap-2 shrink-0 border-t sm:border-t-0 sm:border-l border-slate-100 pt-4 sm:pt-0 sm:pl-5">
                  <RouterLink to="/tutor/mentoring" class="w-full sm:w-auto px-5 py-2.5 bg-[#334EAC] hover:bg-[#081F5C] text-white rounded-2xl font-bold text-[13px] transition-all active:scale-95 flex justify-center items-center gap-2 shadow-sm">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="m15.6 11.6 5.4-3.2c.5-.3 1.2 0 1.2.7v5.8c0 .7-.7 1-1.2.7l-5.4-3.2a1.2 1.2 0 0 1 0-2Z"/><rect width="14" height="14" x="2" y="5" rx="3" ry="3"/></svg>
                    Mulai Sesi
                  </RouterLink>
                  <button class="w-full sm:w-auto px-5 py-2.5 bg-slate-50 hover:bg-[#EDF1F6] border border-slate-200 text-slate-600 rounded-2xl font-bold text-[13px] transition-all active:scale-95 flex justify-center items-center gap-2">
                    <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M21 12v7a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h11"/><path d="m21 15-3.086-3.086a2 2 0 0 0-2.828 0L6 21"/></svg>
                    Detail Link
                  </button>
                  <button class="w-full sm:w-auto px-5 py-2.5 text-slate-400 hover:text-rose-500 rounded-xl font-bold text-[12px] transition-colors mt-auto flex justify-center items-center">
                    Batalkan Sesi
                  </button>
                </div>

              </div>
            </div>

            <!-- Card 2: Pending Request -->
            <div class="bg-amber-50/40 backdrop-blur-xl rounded-3xl p-6 sm:p-7 shadow-[0_10px_40px_rgba(245,158,11,0.06)] border border-amber-200 group/card relative overflow-hidden transition-all duration-300 ease-out hover:shadow-xl">
              <div class="absolute top-0 left-0 w-1 h-full bg-amber-400"></div>
              <div class="flex flex-col sm:flex-row justify-between gap-5 pl-2">
                
                <!-- Info -->
                <div class="flex-1">
                  <div class="flex items-center gap-3 mb-4">
                    <div class="w-12 h-12 rounded-full bg-slate-100 border-2 border-white shadow-sm flex items-center justify-center shrink-0 overflow-hidden">
                      <span class="text-slate-500 font-bold text-lg">AS</span>
                    </div>
                    <div>
                      <h3 class="text-[16px] font-bold text-slate-900 leading-none mb-1.5 tracking-tight">Andi Saputra</h3>
                      <div class="flex items-center gap-2 text-[12px] font-bold text-slate-500">
                        <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round" class="text-[#7096D1]"><path d="M4 19.5v-15A2.5 2.5 0 0 1 6.5 2H20v20H6.5a2.5 2.5 0 0 1 0-5H20"/></svg>
                        Topik: Review Desain Database
                      </div>
                    </div>
                  </div>
                  
                  <div class="bg-amber-50/50 border border-amber-100/50 rounded-xl p-3 mb-4 inline-block">
                    <p class="text-[11px] font-bold text-amber-600/80 uppercase tracking-widest mb-1">Notes Mahasiswa</p>
                    <p class="text-[13px] font-medium text-amber-900/80">"Mohon direview relasi tabel e-commerce saya, apakah sudah memenuhi 3NF?"</p>
                  </div>
                  
                  <div class="flex flex-wrap items-center gap-x-6 gap-y-3">
                    <div class="flex items-center gap-2 text-[13px] font-bold text-slate-900 tracking-tight">
                      <span class="w-7 h-7 rounded-lg bg-slate-50 text-slate-500 flex items-center justify-center"><svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><rect width="18" height="18" x="3" y="4" rx="2" ry="2"/><line x1="16" x2="16" y1="2" y2="6"/><line x1="8" x2="8" y1="2" y2="6"/><line x1="3" x2="21" y1="10" y2="10"/></svg></span>
                      Kamis, 14:00 WIB
                    </div>
                    <span class="px-2.5 py-1 bg-amber-50 text-amber-600 rounded-lg text-[10px] font-bold uppercase tracking-widest border border-amber-100">
                      Menunggu Persetujuan
                    </span>
                  </div>
                </div>

                <!-- QUICK ACTIONS -->
                <div class="flex flex-row sm:flex-col items-center sm:items-end justify-center sm:justify-start gap-2 shrink-0 border-t sm:border-t-0 sm:border-l border-slate-100 pt-4 sm:pt-0 sm:pl-5">
                  <button class="w-full sm:w-auto px-5 py-2.5 bg-emerald-500 hover:bg-emerald-600 text-white rounded-2xl font-bold text-[13px] transition-all active:scale-95 flex justify-center items-center gap-2 shadow-sm">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"/><polyline points="22 4 12 14.01 9 11.01"/></svg>
                    Terima Request
                  </button>
                  <button class="w-full sm:w-auto px-5 py-2.5 bg-slate-50 hover:bg-[#EDF1F6] border border-slate-200 text-[#081F5C] rounded-2xl font-bold text-[13px] transition-all active:scale-95 flex justify-center items-center gap-2">
                    <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M21 12v7a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h11"/><path d="m21 15-3.086-3.086a2 2 0 0 0-2.828 0L6 21"/></svg>
                    Jadwalkan Ulang
                  </button>
                  <button class="w-full sm:w-auto px-5 py-2.5 text-slate-400 hover:text-rose-500 rounded-xl font-bold text-[12px] transition-colors mt-auto flex justify-center items-center">
                    Tolak Sesi
                  </button>
                </div>

              </div>
            </div>

          </div>
        </div>

        <!-- 5. RIGHT SIDEBAR -->
        <div class="lg:col-span-4 space-y-8">
          
          <!-- Schedule Overview -->
          <div class="bg-white/80 backdrop-blur-xl rounded-3xl p-6 shadow-[0_10px_40px_rgba(15,23,42,0.06)] border border-slate-100 transition-all duration-300 ease-out hover:shadow-xl group/card">
             <div class="flex items-center justify-between mb-5">
               <h3 class="text-[15px] font-bold text-slate-900 tracking-tight">Jadwal Hari Ini</h3>
               <span class="w-8 h-8 rounded-lg bg-[#EDF1F6] flex items-center justify-center text-[#334EAC] font-bold text-xs">2</span>
             </div>

             <div class="space-y-3">
               <div class="p-4 rounded-xl border border-[#334EAC]/20 bg-[#334EAC]/5 flex items-start gap-4">
                 <div class="w-1.5 h-full min-h-[40px] bg-[#334EAC] rounded-full shrink-0"></div>
                 <div>
                   <p class="text-[11px] font-extrabold text-[#334EAC] uppercase tracking-widest mb-1">10:00 - 11:30</p>
                   <p class="text-[13px] font-bold text-slate-900 tracking-tight">Mentoring Algoritma</p>
                   <p class="text-[12px] font-medium text-slate-500 mt-0.5">Budi & Siti</p>
                 </div>
               </div>
               
               <div class="p-4 rounded-xl border border-slate-100 bg-slate-50 flex items-start gap-4 opacity-70">
                 <div class="w-1.5 h-full min-h-[40px] bg-slate-300 rounded-full shrink-0"></div>
                 <div>
                   <p class="text-[11px] font-extrabold text-slate-500 uppercase tracking-widest mb-1">15:00 - 16:00</p>
                   <p class="text-[13px] font-bold text-slate-600 line-through">Review UI/UX</p>
                   <p class="text-[12px] font-medium text-rose-500 mt-0.5">Dibatalkan Siswa</p>
                 </div>
               </div>
             </div>
          </div>

          <!-- AI Mentor Recommendation -->
          <div class="bg-gradient-to-br from-[#081F5C] to-[#334EAC] rounded-3xl p-6 shadow-[0_15px_40px_rgba(8,31,92,0.15)] border border-white/10 text-white relative overflow-hidden transition-all duration-300 ease-out hover:shadow-2xl group/card">
            <div class="absolute -right-4 -top-4 w-32 h-32 bg-white/10 blur-[40px] rounded-full pointer-events-none"></div>
            
            <h3 class="text-[15px] font-bold tracking-tight mb-4 flex items-center gap-2 relative z-10">
              <span class="w-7 h-7 rounded-lg bg-white/10 flex items-center justify-center"><svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="m12 3-1.912 5.813a2 2 0 0 1-1.275 1.275L3 12l5.813 1.912a2 2 0 0 1 1.275 1.275L12 21l1.912-5.813a2 2 0 0 1 1.275-1.275L21 12l-5.813-1.912a2 2 0 0 1-1.275-1.275L12 3Z"/></svg></span>
              Rekomendasi Penjadwalan
            </h3>
            
            <p class="text-[12px] font-medium text-[#BAD6EB] leading-tight relative z-10 mb-4">
              Jadwal Anda terlihat padat di hari Kamis. AI merekomendasikan membuka slot baru di hari <strong>Jumat sore</strong> untuk menampung 3 request pending yang tertunda.
            </p>
            
            <button class="w-full py-2.5 bg-white hover:bg-[#F7F2EB] text-[#081F5C] rounded-2xl font-bold text-[12px] transition-all flex items-center justify-center gap-2 shadow-sm active:scale-95 relative z-10">
              Buka Slot Jumat (15:00 - 17:00)
            </button>
          </div>

          <!-- Productivity Stats -->
          <div class="bg-white/80 backdrop-blur-xl rounded-3xl p-6 shadow-[0_10px_40px_rgba(15,23,42,0.06)] border border-slate-100 transition-all duration-300 ease-out hover:shadow-xl group/card">
             <h3 class="text-[15px] font-bold text-slate-900 mb-5 tracking-tight">Statistik Mengajar</h3>
             
             <div class="flex items-center gap-4 mb-5">
               <div class="w-12 h-12 rounded-full bg-orange-50 border border-orange-100 flex items-center justify-center text-orange-500 shrink-0">
                 <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M8.5 14.5A2.5 2.5 0 0 0 11 12c0-1.38-.5-2-1-3-1.072-2.143-.224-4.054 2-6 .5 2.5 2 4.9 4 6.5 2 1.6 3 3.5 3 5.5a7 7 0 1 1-14 0c0-1.153.433-2.294 1-3a2.5 2.5 0 0 0 2.5 2.5z"/></svg>
               </div>
               <div>
                 <p class="text-[11px] font-bold text-slate-400 uppercase tracking-widest mb-0.5">Mentor Streak</p>
                 <p class="text-[16px] font-bold text-slate-900 leading-none tracking-tight">12 Minggu Aktif</p>
               </div>
             </div>
             
             <div class="grid grid-cols-2 gap-3">
               <div class="bg-slate-50 border border-slate-100 rounded-xl p-3 text-center">
                 <p class="text-[20px] font-bold text-emerald-500 leading-none mb-1 tracking-tight">98%</p>
                 <p class="text-[10px] font-bold text-slate-400 uppercase tracking-widest">Tingkat Hadir</p>
               </div>
               <div class="bg-slate-50 border border-slate-100 rounded-xl p-3 text-center">
                 <p class="text-[20px] font-bold text-[#334EAC] leading-none mb-1 tracking-tight">4.9</p>
                 <p class="text-[10px] font-bold text-slate-400 uppercase tracking-widest">Sesi Rating</p>
               </div>
             </div>
          </div>

        </div>
      </div>
    </div>
  </div>
</template>

<script setup>
import { RouterLink } from 'vue-router'
</script>

<style scoped>
.no-scrollbar::-webkit-scrollbar {
  display: none;
}
.no-scrollbar {
  -ms-overflow-style: none;
  scrollbar-width: none;
}
</style>
