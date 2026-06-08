<template>
  <div class="space-y-6 md:space-y-8 animate-in fade-in duration-500">
          
          <!-- Breadcrumb & Back -->
          <div class="mb-6 flex items-center gap-2">
            <RouterLink
              :to="baseForumRoute"
              class="text-sm font-bold text-slate-400 hover:text-[#334EAC] transition-colors flex items-center gap-1 w-fit bg-white/50 px-3 py-1.5 rounded-lg border border-slate-200/50"
            >
              ← Kembali ke Forum
            </RouterLink>
          </div>

          <!-- Loading State -->
          <div v-if="loading" class="bg-white/60 backdrop-blur-xl rounded-3xl p-12 text-center border border-slate-200/60 shadow-lg">
            <div class="inline-block animate-spin rounded-full h-8 w-8 border-4 border-[#334EAC] border-t-transparent mb-4"></div>
            <p class="text-slate-600 font-semibold">Memuat detail diskusi...</p>
          </div>

          <!-- Error State -->
          <div v-else-if="error" class="bg-rose-50/60 backdrop-blur-xl rounded-3xl p-12 text-center border border-rose-200/60 shadow-lg max-w-2xl mx-auto">
            <div class="inline-flex items-center justify-center w-12 h-12 rounded-full bg-rose-100 text-rose-600 mb-4">
              <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"/><line x1="12" y1="8" x2="12" y2="12"/><line x1="12" y1="16" x2="12.01" y2="16"/></svg>
            </div>
            <h3 class="text-lg font-bold text-slate-900 mb-2">Gagal Memuat Diskusi</h3>
            <p class="text-slate-600 text-sm mb-6">{{ error }}</p>
            <button @click="fetchPost" class="px-6 py-2.5 bg-[#334EAC] hover:bg-[#081F5C] text-white font-bold rounded-xl transition-all shadow-sm active:scale-95">
              Coba Lagi
            </button>
          </div>

          <!-- Not Found State -->
          <div v-else-if="!post" class="bg-white/60 backdrop-blur-xl rounded-3xl p-12 text-center border border-slate-200/60 shadow-lg max-w-2xl mx-auto">
            <div class="inline-flex items-center justify-center w-12 h-12 rounded-full bg-slate-100 text-slate-500 mb-4">
              <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"/><line x1="12" y1="8" x2="12" y2="12"/><line x1="12" y1="16" x2="12.01" y2="16"/></svg>
            </div>
            <h3 class="text-lg font-bold text-slate-900 mb-2">Diskusi Tidak Ditemukan</h3>
            <p class="text-slate-600 text-sm mb-6">Diskusi yang Anda cari tidak dapat ditemukan atau telah dihapus.</p>
            <RouterLink :to="baseForumRoute" class="px-6 py-2.5 bg-[#334EAC] hover:bg-[#081F5C] text-white font-bold rounded-xl transition-all shadow-sm inline-block">
              Kembali ke Forum
            </RouterLink>
          </div>

          <div v-else class="flex flex-col xl:flex-row gap-8">
            
            <!-- MAIN LEFT CONTENT (xl:w-[75%]) -->
            <div class="w-full xl:w-[75%] space-y-8">
              
              <!-- Question Header & Content -->
              <div 
                :class="[
                  route.path.startsWith('/tutor')
                    ? 'bg-white border border-slate-200 shadow-sm rounded-2xl p-6 md:p-8 transition-all duration-300'
                    : 'bg-white/60 backdrop-blur-xl rounded-3xl p-6 md:p-8 shadow-[0_10px_40px_rgba(15,23,42,0.06)] border border-slate-200/60 transition-all duration-300 ease-out hover:shadow-xl group/card'
                ]"
              >
                <div class="flex flex-col md:flex-row gap-6">
                  
                  <!-- Left Voting (Desktop) -->
                  <div class="hidden md:flex flex-col items-center gap-2 shrink-0 pt-1">
                    <button @click="handleQuestionVote('up')" :class="questionVoted === 'up' ? 'text-[#334EAC] bg-[#EDF1F6] border-[#7096D1]/30' : 'text-slate-400 hover:text-[#334EAC] hover:bg-[#EDF1F6] border-transparent hover:border-slate-200'" class="w-11 h-11 rounded-2xl flex items-center justify-center transition-all border hover:scale-105 active:scale-95">
                      <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"><path d="M12 19V5M5 12l7-7 7 7"/></svg>
                    </button>
                    <span class="text-xl font-bold my-1 transition-colors tracking-tight" :class="questionVoted === 'up' ? 'text-[#334EAC]' : questionVoted === 'down' ? 'text-rose-500' : 'text-slate-900'">{{ questionVote }}</span>
                    <button @click="handleQuestionVote('down')" :class="questionVoted === 'down' ? 'text-rose-500 bg-rose-50 border-rose-200' : 'text-slate-400 hover:text-rose-500 hover:bg-rose-50 border-transparent hover:border-rose-100'" class="w-11 h-11 rounded-2xl flex items-center justify-center transition-all border hover:scale-105 active:scale-95">
                      <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"><path d="M12 5v14M19 12l-7 7-7-7"/></svg>
                    </button>
                  </div>

                  <!-- Question Body -->
                  <div class="flex-1 min-w-0">
                    <div class="flex items-center justify-between mb-4">
                      <span class="px-3 py-1.5 bg-[#EDF1F6] text-[#334EAC] text-[10px] font-extrabold rounded-lg uppercase tracking-widest shadow-sm">{{ post.category?.name || 'Kategori' }}</span>
                      
                      <!-- Mobile Voting -->
                      <div class="bg-white/60 backdrop-blur-xl rounded-3xl p-7 md:p-8 shadow-[0_10px_40px_rgba(15,23,42,0.06)] border border-slate-200/60 relative overflow-hidden flex items-center gap-3">
                        <button @click="handleQuestionVote('up')" :class="questionVoted === 'up' ? 'text-[#334EAC]' : 'text-slate-400 hover:text-[#334EAC]'" class="transition-colors active:scale-95"><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"><path d="M12 19V5M5 12l7-7 7 7"/></svg></button>
                        <span class="font-extrabold text-lg transition-colors" :class="questionVoted === 'up' ? 'text-[#334EAC]' : questionVoted === 'down' ? 'text-rose-500' : 'text-[#081F5C]'">{{ questionVote }}</span>
                        <button @click="handleQuestionVote('down')" :class="questionVoted === 'down' ? 'text-rose-500' : 'text-slate-400 hover:text-rose-500'" class="transition-colors active:scale-95"><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"><path d="M12 5v14M19 12l-7 7-7-7"/></svg></button>
                      </div>
                    </div>

                    <h1 class="text-3xl md:text-4xl font-extrabold text-slate-900 tracking-tight leading-tight">{{ post.title }}</h1>
                    
                    <!-- Content -->
                    <div class="prose prose-slate max-w-none text-[15px] leading-relaxed text-slate-600 mb-6 font-medium whitespace-pre-wrap">{{ post.content }}</div>

                    <!-- Meta & Author -->
                    <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4 pt-6 border-t border-slate-100/80">
                      <div></div>

                      <div class="flex items-center gap-3 bg-[#F7F2EB] px-4 py-3 rounded-[1.25rem] border border-slate-200/50 hover:shadow-sm transition-all cursor-pointer">
                        <img 
                          v-if="post.user?.avatar_url" 
                          :src="post.user.avatar_url" 
                          :alt="post.user?.name"
                          class="w-10 h-10 rounded-full object-cover shadow-sm border-2 border-white"
                        />
                        <div v-else class="w-10 h-10 rounded-full bg-gradient-to-br from-[#334EAC] to-[#081F5C] flex items-center justify-center text-white text-[13px] font-extrabold shadow-sm border-2 border-white">
                          {{ post.user?.name ? post.user.name.split(' ').map(n => n[0]).join('').substring(0, 2).toUpperCase() : '?' }}
                        </div>
                        <div class="flex flex-col">
                          <span class="text-[13px] font-bold text-slate-900 leading-none mb-1.5 tracking-tight">{{ post.user?.name }}</span>
                          <div class="flex items-center gap-1.5">
                            <span class="text-[10px] font-extrabold text-amber-500 leading-none">{{ post.user?.role }}</span>
                            <span class="text-[10px] text-slate-400 font-bold leading-none">• Ditanyakan {{ formatDate(post.created_at) }}</span>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>

              <!-- Answers Section -->
              <div>
                <div class="flex items-center justify-between mb-6 px-1">
                  <h3 class="text-[1.35rem] font-bold text-slate-900 tracking-tight">5 Jawaban</h3>
                  <div class="flex items-center gap-1 bg-white p-1 rounded-xl border border-slate-200/80 shadow-[0_2px_10px_rgba(0,0,0,0.02)]">
                    <button class="px-4 py-2 bg-[#EDF1F6] text-[#081F5C] rounded-lg font-extrabold text-[13px]">Teratas</button>
                    <button class="px-4 py-2 text-slate-500 hover:text-[#081F5C] hover:bg-slate-50 rounded-lg font-bold text-[13px] transition-all">Terbaru</button>
                  </div>
                </div>

                <div class="space-y-6">
                  <!-- Accepted Answer -->
                  <div class="bg-emerald-50/40 backdrop-blur-xl rounded-3xl p-6 md:p-8 shadow-[0_10px_40px_rgba(16,185,129,0.06)] border-[3px] border-emerald-400/30 relative transition-all duration-300 ease-out hover:shadow-xl group/card">
                    <div class="absolute -top-4 left-8 px-4 py-1.5 bg-gradient-to-r from-emerald-500 to-emerald-600 text-white text-[10px] font-bold uppercase tracking-widest rounded-lg shadow-[0_4px_10px_rgba(16,185,129,0.3)] flex items-center gap-1.5">
                      <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"><polyline points="20 6 9 17 4 12"/></svg>
                      Jawaban Diterima
                    </div>

                    <div class="flex flex-col md:flex-row gap-6 mt-3">
                      <div class="hidden md:flex flex-col items-center gap-2 shrink-0 pt-1">
                        <button @click="handleAnswerVote(0, 'up')" :class="answers[0].voted === 'up' ? 'text-[#334EAC] bg-white border-[#7096D1]/30' : 'text-slate-400 hover:text-[#334EAC] hover:bg-white border-transparent'" class="w-11 h-11 rounded-2xl flex items-center justify-center transition-all border hover:scale-105 active:scale-95">
                          <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"><path d="M12 19V5M5 12l7-7 7 7"/></svg>
                        </button>
                        <span class="text-xl font-bold my-1 transition-colors tracking-tight" :class="answers[0].voted === 'up' ? 'text-[#334EAC]' : answers[0].voted === 'down' ? 'text-rose-500' : 'text-slate-900'">{{ answers[0].votes }}</span>
                        <button @click="handleAnswerVote(0, 'down')" :class="answers[0].voted === 'down' ? 'text-rose-500 bg-white border-rose-200' : 'text-slate-400 hover:text-rose-500 hover:bg-white border-transparent'" class="w-11 h-11 rounded-2xl flex items-center justify-center transition-all border hover:scale-105 active:scale-95">
                          <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"><path d="M12 5v14M19 12l-7 7-7-7"/></svg>
                        </button>
                      </div>

                      <div class="flex-1 min-w-0">
                        <div class="prose prose-slate max-w-none text-[15px] leading-relaxed text-slate-700 mb-6 font-medium">
                          <p>Ya, deklarasi tersebut benar dan standar untuk min-heap di C++. Untuk memudahkan pemahaman, anggap Dijkstra sebagai BFS yang menggunakan antrean prioritas (bukan antrean biasa) untuk selalu menelusuri titik termurah terlebih dahulu.</p>
                        </div>
                        
                        <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4">
                          <div class="flex items-center gap-5">
                            <button class="text-[13px] font-bold text-slate-500 hover:text-[#081F5C] transition-colors flex items-center gap-1.5"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z"/></svg> Balas</button>
                            <button class="text-[13px] font-bold text-slate-500 hover:text-[#081F5C] transition-colors flex items-center gap-1.5"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M4 12v8a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2v-8"/><polyline points="16 6 12 2 8 6"/><line x1="12" x2="12" y1="2" y2="15"/></svg> Bagikan</button>
                          </div>

                          <div class="flex items-center gap-3 bg-white px-4 py-3 rounded-[1.25rem] border border-emerald-500/30 shadow-sm">
                            <div class="w-10 h-10 rounded-full bg-[#EDF1F6] border-2 border-white shadow-sm flex items-center justify-center text-[#081F5C] text-[13px] font-extrabold shrink-0">SS</div>
                            <div class="flex flex-col">
                              <div class="flex items-center gap-1.5 mb-1.5">
                                <span class="text-[13px] font-bold text-slate-900 leading-none tracking-tight">Dr. Sarah Smith</span>
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="#10B981" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"/><polyline points="9 12 11 14 15 10"/></svg>
                              </div>
                              <div class="flex items-center gap-2">
                                <span class="text-[9px] font-extrabold text-emerald-700 bg-emerald-100 px-1.5 rounded uppercase tracking-widest leading-none py-1">Tutor</span>
                                <span class="text-[10px] font-extrabold text-amber-500 leading-none">15.4k rep</span>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>

                  <!-- Regular Answer -->
                  <div class="bg-white/60 backdrop-blur-xl rounded-3xl p-6 md:p-8 shadow-[0_10px_40px_rgba(15,23,42,0.06)] border border-slate-200/60 transition-all duration-300 ease-out hover:shadow-xl group/card">
                    <div class="flex flex-col md:flex-row gap-6">
                      <div class="hidden md:flex flex-col items-center gap-2 shrink-0 pt-1">
                        <button @click="handleAnswerVote(1, 'up')" :class="answers[1].voted === 'up' ? 'text-[#334EAC] bg-[#EDF1F6] border-[#7096D1]/30' : 'text-slate-400 hover:text-[#334EAC] hover:bg-[#EDF1F6] border-transparent hover:border-slate-200'" class="w-11 h-11 rounded-2xl flex items-center justify-center transition-all border hover:scale-105 active:scale-95">
                          <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"><path d="M12 19V5M5 12l7-7 7 7"/></svg>
                        </button>
                        <span class="text-xl font-bold my-1 transition-colors tracking-tight" :class="answers[1].voted === 'up' ? 'text-[#334EAC]' : answers[1].voted === 'down' ? 'text-rose-500' : 'text-slate-900'">{{ answers[1].votes }}</span>
                        <button @click="handleAnswerVote(1, 'down')" :class="answers[1].voted === 'down' ? 'text-rose-500 bg-rose-50 border-rose-200' : 'text-slate-400 hover:text-rose-500 hover:bg-rose-50 border-transparent hover:border-rose-100'" class="w-11 h-11 rounded-2xl flex items-center justify-center transition-all border hover:scale-105 active:scale-95">
                          <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"><path d="M12 5v14M19 12l-7 7-7-7"/></svg>
                        </button>
                      </div>

                      <div class="flex-1 min-w-0">
                        <div class="prose prose-slate max-w-none text-[15px] leading-relaxed text-slate-600 mb-6 font-medium">
                          <p>Kamu juga bisa menggunakan struct komparator kustom jika ingin menyimpan struct daripada pairs. Kadang ini membuat kode jauh lebih bersih dibanding berurusan dengan <code>pair.first</code> dan <code>pair.second</code>.</p>
                        </div>
                        <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4 pt-5 border-t border-slate-50">
                          <div class="flex items-center gap-5">
                            <button class="text-[13px] font-bold text-slate-400 hover:text-[#081F5C] transition-colors flex items-center gap-1.5"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z"/></svg> Balas</button>
                            <button class="text-[13px] font-bold text-slate-400 hover:text-[#081F5C] transition-colors flex items-center gap-1.5"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M4 12v8a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2v-8"/><polyline points="16 6 12 2 8 6"/><line x1="12" x2="12" y1="2" y2="15"/></svg> Bagikan</button>
                          </div>
                          <div class="flex items-center gap-2.5">
                            <span class="text-[13px] font-extrabold text-slate-400">Budi Santoso</span>
                            <span class="text-[11px] text-slate-400 font-bold">• 1 jam lalu</span>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>

              <!-- Reply Input Area -->
              <div class="bg-white/80 backdrop-blur-xl rounded-3xl p-6 shadow-[0_10px_40px_rgba(15,23,42,0.06)] border border-slate-100 mt-8 transition-all duration-300 ease-out hover:shadow-xl group/card">
                <h3 class="text-[17px] font-bold text-slate-900 mb-4 tracking-tight">Jawaban Kamu</h3>
                
                <div class="border-2 border-slate-100 rounded-2xl overflow-hidden focus-within:border-[#7096D1] focus-within:ring-4 focus-within:ring-[#7096D1]/10 transition-all">
                  <!-- Toolbar -->
                  <div class="bg-slate-50 border-b-2 border-slate-100 px-3 py-2 flex items-center gap-1">
                    <button class="p-1.5 text-slate-500 hover:text-[#081F5C] hover:bg-[#EDF1F6] rounded-lg transition-colors"><svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M14 12a4 4 0 0 0 0-8H6v8"/><path d="M15 20a4 4 0 0 0 0-8H6v8Z"/></svg></button>
                    <button class="p-1.5 text-slate-500 hover:text-[#081F5C] hover:bg-[#EDF1F6] rounded-lg transition-colors"><svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><line x1="19" x2="10" y1="4" y2="4"/><line x1="14" x2="5" y1="20" y2="20"/><line x1="15" x2="9" y1="4" y2="20"/></svg></button>
                    <div class="w-px h-5 bg-slate-200 mx-2"></div>
                    <button class="p-1.5 text-slate-500 hover:text-[#081F5C] hover:bg-[#EDF1F6] rounded-lg transition-colors"><svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><polyline points="16 18 22 12 16 6"/><polyline points="8 6 2 12 8 18"/></svg></button>
                    <button class="p-1.5 text-slate-500 hover:text-[#081F5C] hover:bg-[#EDF1F6] rounded-lg transition-colors"><svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M14.5 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V7.5L14.5 2z"/><polyline points="14 2 14 8 20 8"/></svg></button>
                  </div>
                  <textarea rows="6" class="w-full p-4 text-[15px] font-medium text-slate-700 bg-white border-none focus:ring-0 resize-y" placeholder="Tulis jawabanmu di sini... Mendukung Markdown dan LaTeX."></textarea>
                </div>

                <div class="flex justify-end mt-5">
                  <button class="px-8 py-3 bg-[#334EAC] hover:bg-[#081F5C] text-white rounded-2xl font-bold text-[15px] transition-all shadow-[0_4px_15px_rgba(51,78,172,0.2)] active:scale-95">
                    Kirim Jawaban
                  </button>
                </div>
              </div>

            </div>

            <!-- RIGHT SIDEBAR (xl:w-[25%]) -->
            <div class="w-full xl:w-[25%] shrink-0 space-y-6">
              
              <!-- AI Recommendation -->
              <div class="bg-gradient-to-br from-[#081F5C] to-[#334EAC] rounded-3xl p-7 text-white shadow-[0_15px_40px_rgba(8,31,92,0.15)] relative overflow-hidden border border-white/5 transition-all duration-300 ease-out hover:shadow-2xl">
                <div class="absolute -left-10 -top-10 w-40 h-40 bg-[#7096D1] blur-3xl rounded-full opacity-30 pointer-events-none"></div>
                <div class="relative z-10">
                  <div class="flex items-center gap-2 mb-4">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="#BAD6EB" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="m12 3-1.912 5.813a2 2 0 0 1-1.275 1.275L3 12l5.813 1.912a2 2 0 0 1 1.275 1.275L12 21l1.912-5.813a2 2 0 0 1 1.275-1.275L21 12l-5.813-1.912a2 2 0 0 1-1.275-1.275L12 3Z"/><path d="M5 3v4"/><path d="M19 17v4"/><path d="M3 5h4"/><path d="M17 19h4"/></svg>
                    <h3 class="text-[11px] font-bold tracking-widest uppercase text-[#BAD6EB]">Rekomendasi Materi AI</h3>
                  </div>
                  <p class="text-[14px] font-medium text-white mb-6 leading-relaxed">Membaca modul "Dasar Teori Graf" mungkin dapat membantumu memahami Dijkstra dengan lebih baik.</p>
                  <RouterLink :to="`${baseMaterialsRoute}/1`" class="w-full py-3 bg-white/10 hover:bg-white/20 border border-white/10 rounded-xl text-white font-bold text-[14px] transition-colors shadow-sm flex items-center justify-center">
                    Buka Materi
                  </RouterLink>
                </div>
              </div>

              <!-- Related Discussions -->
              <div class="bg-white/80 backdrop-blur-xl rounded-3xl p-7 shadow-[0_10px_40px_rgba(15,23,42,0.06)] border border-slate-100 transition-all duration-300 ease-out hover:shadow-xl group/card">
                <h3 class="text-[17px] font-bold text-slate-900 mb-5 tracking-tight">Diskusi Terkait</h3>
                
                <div class="space-y-4">
                  <div class="group cursor-pointer">
                    <h4 class="text-[14px] font-bold text-slate-900 group-hover:text-[#334EAC] transition-colors leading-snug mb-1.5">Kompleksitas waktu Dijkstra dengan Fibonacci Heap?</h4>
                    <div class="flex items-center gap-2 text-[11px] font-extrabold text-slate-400">
                      <span class="text-emerald-700 bg-emerald-50 px-2 py-0.5 rounded-md">12 jawaban</span>
                    </div>
                  </div>
                  
                  <div class="w-full h-px bg-slate-100"></div>

                  <div class="group cursor-pointer">
                    <h4 class="text-[14px] font-bold text-slate-900 group-hover:text-[#334EAC] transition-colors leading-snug mb-1.5">Bagaimana cara melacak jalur dari algoritma Dijkstra?</h4>
                    <div class="flex items-center gap-2 text-[11px] font-extrabold text-slate-400">
                      <span class="bg-[#EDF1F6] text-[#081F5C] px-2 py-0.5 rounded-md">5 jawaban</span>
                    </div>
                  </div>

                  <div class="w-full h-px bg-slate-100"></div>

                  <div class="group cursor-pointer">
                    <h4 class="text-[14px] font-bold text-slate-900 group-hover:text-[#334EAC] transition-colors leading-snug mb-1.5">Bellman-Ford vs Dijkstra - Bobot negatif</h4>
                    <div class="flex items-center gap-2 text-[11px] font-extrabold text-slate-400">
                      <span class="bg-[#EDF1F6] text-[#081F5C] px-2 py-0.5 rounded-md">8 jawaban</span>
                    </div>
                  </div>
                </div>
              </div>

            </div>

          </div>
        </div>
</template>

<script setup>
import { ref, computed, onMounted } from 'vue'
import { RouterLink, useRoute } from 'vue-router'
import { forumService } from '@/services/forum.service'

const route = useRoute()
const baseForumRoute = computed(() => {
  return route.path.startsWith('/tutor') ? '/tutor/forum' : '/pelajar/forum'
})

const baseMaterialsRoute = computed(() => {
  return route.path.startsWith('/tutor') ? '/tutor/materials' : '/pelajar/materials'
})

const post = ref(null)
const loading = ref(true)
const error = ref(null)

const fetchPost = async () => {
  loading.value = true
  error.value = null
  try {
    const data = await forumService.getPostById(route.params.id)
    post.value = data
  } catch (err) {
    console.error(err)
    error.value = err || 'Gagal mengambil detail postingan.'
  } finally {
    loading.value = false
  }
}

onMounted(() => {
  fetchPost()
})

const formatDate = (dateString) => {
  if (!dateString) return ''
  try {
    const date = new Date(dateString)
    return date.toLocaleDateString('id-ID', {
      year: 'numeric',
      month: 'long',
      day: 'numeric'
    })
  } catch (e) {
    return dateString
  }
}

const questionVote = ref(42)
const questionVoted = ref(null)

const handleQuestionVote = (type) => {
  if (questionVoted.value === type) {
    questionVote.value += (type === 'up' ? -1 : 1)
    questionVoted.value = null
  } else {
    if (questionVoted.value) {
      questionVote.value += (questionVoted.value === 'up' ? -1 : 1)
    }
    questionVote.value += (type === 'up' ? 1 : -1)
    questionVoted.value = type
  }
}

const answers = ref([
  { id: 1, votes: 156, voted: null },
  { id: 2, votes: 12, voted: null }
])

const handleAnswerVote = (index, type) => {
  if (answers.value[index].voted === type) {
    answers.value[index].votes += (type === 'up' ? -1 : 1)
    answers.value[index].voted = null
  } else {
    if (answers.value[index].voted) {
      answers.value[index].votes += (answers.value[index].voted === 'up' ? -1 : 1)
    }
    answers.value[index].votes += (type === 'up' ? 1 : -1)
    answers.value[index].voted = type
  }
}
</script>

