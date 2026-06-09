<template>
  <div class="relative min-h-screen bg-[#F7F2EB]">
    <div class="max-w-[1000px] mx-auto px-6 py-6 space-y-6 animate-in fade-in duration-500">
      
      <!-- Back Navigation -->
      <div class="mb-6 flex items-center gap-2">
        <RouterLink
          to="/pelajar/mentoring"
          class="text-sm font-bold text-slate-400 hover:text-[#334EAC] transition-colors flex items-center gap-1 w-fit bg-white/50 px-3 py-1.5 rounded-lg border border-slate-200/50"
        >
          ← Kembali ke Mentoring
        </RouterLink>
      </div>

      <!-- Breadcrumb & Header -->
      <div class="space-y-2">
        <div class="flex items-center gap-2 text-xs font-bold text-slate-400 uppercase tracking-widest">
          <RouterLink to="/pelajar/mentoring" class="hover:text-[#334EAC] transition-colors">Mentoring</RouterLink>
          <span class="text-slate-300">/</span>
          <span class="text-[#334EAC]">Profil Mentor</span>
        </div>
        
        <div class="bg-[#F7F2EB] rounded-2xl border border-slate-200 shadow-sm p-5 flex flex-col sm:flex-row sm:items-center justify-between gap-5 mb-6 relative overflow-hidden">
          <div class="flex items-center gap-4">
            <span class="w-12 h-12 rounded-xl bg-[#334EAC]/10 text-[#334EAC] flex items-center justify-center shrink-0">
              <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"/><circle cx="12" cy="7" r="4"/></svg>
            </span>
            <div>
              <h1 class="text-3xl md:text-4xl font-extrabold text-slate-900 tracking-tight leading-tight">Detail Mentor</h1>
              <p class="text-[15px] text-slate-600 font-medium mt-2 max-w-xl leading-relaxed">
                Kenali lebih dekat profil akademik, bidang spesialisasi, dan pengalaman mengajar mentor pilihan Anda.
              </p>
            </div>
          </div>
        </div>
      </div>

      <!-- Loading State -->
      <div v-if="isLoading" class="animate-pulse grid grid-cols-1 md:grid-cols-3 gap-6">
        <div class="md:col-span-1 bg-white rounded-xl p-6 shadow-sm border border-slate-200 flex flex-col items-center space-y-4">
          <div class="w-24 h-24 rounded-full bg-slate-200"></div>
          <div class="h-4 bg-slate-200 rounded w-3/4"></div>
          <div class="h-3 bg-slate-200 rounded w-1/2"></div>
          <div class="h-10 bg-slate-200 rounded w-full pt-4"></div>
        </div>
        <div class="md:col-span-2 space-y-6">
          <div class="bg-white rounded-xl p-6 shadow-sm border border-slate-200 h-40"></div>
          <div class="bg-white rounded-xl p-6 shadow-sm border border-slate-200 h-60"></div>
        </div>
      </div>

      <!-- Error State -->
      <div v-else-if="isError" class="card-base p-12 text-center space-y-4 flex flex-col items-center justify-center bg-white border border-slate-200 max-w-xl mx-auto my-12">
        <div class="w-16 h-16 rounded-full bg-rose-50 flex items-center justify-center text-rose-500 mx-auto">
          <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"/><line x1="12" y1="8" x2="12" y2="12"/><line x1="12" y1="16" x2="12.01" y2="16"/></svg>
        </div>
        <div class="space-y-1">
          <h3 class="text-base font-bold text-slate-800">Gagal memuat detail mentor.</h3>
          <p class="text-xs text-slate-500 font-medium">Tutor tidak ditemukan atau terjadi masalah koneksi.</p>
        </div>
        <button @click="fetchMentor" class="px-5 py-2.5 bg-[#334EAC] hover:bg-[#081F5C] text-white font-bold text-xs rounded-xl transition-all shadow-sm">
          Coba Lagi
        </button>
      </div>

      <!-- Main Layout Grid -->
      <div v-else-if="mentor" class="grid grid-cols-1 md:grid-cols-3 gap-6">
        
        <!-- Mentor Info Card (Left) -->
        <div class="md:col-span-1 bg-white rounded-xl p-6 shadow-sm border border-slate-200 flex flex-col items-center text-center space-y-4 h-fit">
          <div class="w-24 h-24 rounded-full bg-[#EDF1F6] border-2 border-slate-200 flex items-center justify-center shrink-0 overflow-hidden text-[#334EAC] font-bold text-2xl">
            <img :src="mentor.avatar_url" :alt="mentor.name" class="w-full h-full object-cover">
          </div>

          <div class="space-y-1 w-full">
            <div class="flex items-center justify-center gap-1">
              <h2 class="text-lg font-bold text-slate-900 truncate">{{ mentor.name }}</h2>
              <svg v-if="mentor.is_verified" class="w-4 h-4 text-[#334EAC] shrink-0" viewBox="0 0 24 24" fill="currentColor">
                <path d="M12 2C6.5 2 2 6.5 2 12s4.5 10 10 10 10-4.5 10-10S17.5 2 12 2zm-2 15l-5-5 1.41-1.41L10 14.17l7.59-7.59L19 8l-9 9z"/>
              </svg>
            </div>
            <p class="text-xs text-[#334EAC] font-semibold bg-[#EDF1F6] px-2.5 py-1 rounded-lg w-fit mx-auto">
              {{ mentor.badges && mentor.badges.length > 0 ? mentor.badges[0].name : 'Tutor Akademik' }}
            </p>
          </div>

          <!-- Quick Stats -->
          <div class="grid grid-cols-2 gap-4 w-full pt-4 border-t border-slate-100">
            <div v-if="mentor.tutor_profile?.rating">
              <p class="text-[10px] font-bold text-slate-400 uppercase tracking-wider">Rating</p>
              <div class="flex items-center justify-center gap-1 text-slate-900 font-bold text-sm mt-0.5">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 text-amber-500 fill-current" viewBox="0 0 24 24"><polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"/></svg>
                <span>{{ parseFloat(mentor.tutor_profile.rating).toFixed(1) }}</span>
              </div>
            </div>
            <!-- Hide price section if price does not exist in schema -->
            <div v-if="mentor.price">
              <p class="text-[10px] font-bold text-slate-400 uppercase tracking-wider">Harga Sesi</p>
              <p class="text-slate-900 font-bold text-sm mt-0.5">Rp {{ mentor.price / 1000 }}k<span class="text-[10px] text-slate-400 font-normal">/jam</span></p>
            </div>
          </div>

          <button @click="showBookingModal = true" class="w-full bg-[#334EAC] hover:bg-[#081F5C] text-white rounded-xl h-11 text-sm font-medium transition-all shadow-sm flex items-center justify-center gap-2">
            Jadwalkan Bimbingan
          </button>
        </div>

        <!-- Biography & Qualifications (Right) -->
        <div class="md:col-span-2 space-y-6">
          
          <div class="bg-white rounded-xl p-6 shadow-sm border border-slate-200 space-y-5">
            <h3 class="text-base font-bold text-slate-900 border-b border-slate-100 pb-2.5 flex items-center gap-2">
              <span class="w-2.5 h-2.5 rounded-full bg-[#334EAC]"></span>
              Tentang Mentor
            </h3>
            <p class="text-sm text-slate-600 leading-relaxed">
              {{ mentor.tutor_profile?.bio || 'Tutor bimbingan belajar FokusIn terverifikasi siap membimbing pencapaian akademismu.' }}
            </p>
          </div>

          <div v-if="mentor.badges && mentor.badges.length > 0" class="bg-white rounded-xl p-6 shadow-sm border border-slate-200 space-y-5">
            <h3 class="text-base font-bold text-slate-900 border-b border-slate-100 pb-2.5 flex items-center gap-2">
              <span class="w-2.5 h-2.5 rounded-full bg-[#334EAC]"></span>
              Lencana Kredensial
            </h3>
            <div class="flex flex-wrap gap-2">
              <span v-for="badge in mentor.badges" :key="badge.id" class="px-3 py-1.5 bg-slate-50 text-slate-700 text-xs font-semibold rounded-lg border border-slate-200">
                Lencana: {{ badge.name }}
              </span>
            </div>
          </div>

          <!-- Reviews Section -->
          <div class="bg-white rounded-xl p-6 shadow-sm border border-slate-200 space-y-5">
            <h3 class="text-base font-bold text-slate-900 border-b border-slate-100 pb-2.5 flex items-center gap-2">
              <span class="w-2.5 h-2.5 rounded-full bg-emerald-500"></span>
              Ulasan Siswa
            </h3>
            
            <div v-if="mentor.tutor_reviews && mentor.tutor_reviews.length > 0" class="space-y-4">
              <div v-for="review in mentor.tutor_reviews" :key="review.id" class="space-y-2 pb-4 border-b border-slate-100 last:border-0 last:pb-0">
                <div class="flex items-center justify-between">
                  <div class="flex items-center gap-2">
                    <div class="w-8 h-8 rounded-full bg-[#EDF1F6] flex items-center justify-center font-bold text-slate-700 text-xs overflow-hidden border border-slate-100">
                      <img v-if="review.student?.avatar_url" :src="review.student.avatar_url" class="w-full h-full object-cover">
                      <span v-else>{{ getInitials(review.student?.name) }}</span>
                    </div>
                    <div>
                      <h4 class="text-xs font-bold text-slate-900">{{ review.student?.name || 'Siswa' }}</h4>
                      <p class="text-[9px] text-slate-400">{{ formatDate(review.created_at) }}</p>
                    </div>
                  </div>
                  <div class="flex items-center gap-0.5 text-xs text-amber-500 font-bold bg-amber-50 px-2 py-0.5 rounded border border-amber-100">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-3 h-3 fill-current" viewBox="0 0 24 24"><polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"/></svg>
                    <span>{{ review.rating }}</span>
                  </div>
                </div>
                <p class="text-xs text-slate-500 leading-relaxed font-medium pl-10">"{{ review.review }}"</p>
              </div>
            </div>
            
            <div v-else class="text-center py-6 text-sm text-slate-400 font-medium">
              Belum ada ulasan.
            </div>
          </div>

        </div>

      </div>

    </div>

    <!-- Booking Modal -->
    <div v-if="showBookingModal" class="fixed inset-0 z-50 flex items-center justify-center p-4">
      <div class="absolute inset-0 bg-slate-900/40 backdrop-blur-sm" @click="showBookingModal = false"></div>
      <div class="bg-white rounded-xl border border-slate-200 w-full max-w-lg relative z-10 shadow-lg animate-in zoom-in-95 duration-200 overflow-hidden flex flex-col max-h-[90vh]">
        <div class="p-6 md:p-8 border-b border-slate-100 overflow-y-auto">
          <h2 class="text-2xl font-bold text-slate-900 mb-2">Booking Mentor</h2>
          <p class="text-sm font-medium text-slate-500 mb-6">Jadwalkan sesi 1-on-1 dengan <span class="font-semibold text-slate-900">{{ mentor ? mentor.name : '' }}</span></p>
          
          <div class="space-y-5">
            <div>
              <label class="block text-xs font-semibold text-slate-500 uppercase tracking-widest mb-2">Tanggal</label>
              <input type="date" v-model="bookingDate" class="w-full bg-slate-50 border border-slate-200 rounded-xl px-4 py-2.5 text-sm font-medium text-slate-900 focus:outline-none focus:ring-4 focus:ring-[#7096D1]/20 focus:border-[#7096D1] transition-all">
            </div>
            <div>
              <label class="block text-xs font-semibold text-slate-500 uppercase tracking-widest mb-2">Waktu</label>
              <select v-model="bookingTime" class="w-full bg-slate-50 border border-slate-200 rounded-xl px-4 py-2.5 text-sm font-medium text-slate-900 focus:outline-none focus:ring-4 focus:ring-[#7096D1]/20 focus:border-[#7096D1] transition-all appearance-none cursor-pointer">
                <option value="">Pilih Jam</option>
                <option value="10:00">10:00 WIB</option>
                <option value="13:00">13:00 WIB</option>
                <option value="15:00">15:00 WIB</option>
              </select>
            </div>
            <div>
              <label class="block text-xs font-semibold text-slate-500 uppercase tracking-widest mb-2">Topik Mentoring</label>
              <input type="text" v-model="bookingTopic" class="w-full bg-slate-50 border border-slate-200 rounded-xl px-4 py-2.5 text-sm font-medium text-slate-900 focus:outline-none focus:ring-4 focus:ring-[#7096D1]/20 focus:border-[#7096D1] transition-all placeholder-slate-400" placeholder="Contoh: Persiapan UTS Kalkulus Lanjut">
            </div>
            <div>
              <label class="block text-xs font-semibold text-slate-500 uppercase tracking-widest mb-2">Catatan Tambahan (Minimal 20 Karakter)</label>
              <textarea rows="3" v-model="bookingNotes" class="w-full bg-slate-50 border border-slate-200 rounded-xl px-4 py-2.5 text-sm font-medium text-slate-900 focus:outline-none focus:ring-4 focus:ring-[#7096D1]/20 focus:border-[#7096D1] transition-all resize-none placeholder-slate-400" placeholder="Materi apa saja yang ingin Anda bicarakan?"></textarea>
            </div>
          </div>
        </div>
        <div class="p-6 bg-slate-50/80 flex items-center justify-end gap-3 rounded-b-xl border-t border-slate-100">
          <button @click="showBookingModal = false" class="bg-white border border-slate-200 text-slate-700 rounded-xl h-10 px-5 text-sm font-medium hover:bg-slate-50 transition-all shadow-sm">Batalkan</button>
          <button @click="submitBooking" :disabled="isSubmitting" class="bg-[#334EAC] text-white rounded-xl h-10 px-5 text-sm font-medium hover:bg-[#081F5C] transition-all shadow-sm flex items-center gap-2" :class="isSubmitting ? 'opacity-70 cursor-wait' : ''">
            <svg v-if="isSubmitting" class="animate-spin h-4 w-4 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
              <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
              <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
            </svg>
            {{ isSubmitting ? 'Mengirim...' : 'Konfirmasi Booking' }}
          </button>
        </div>
      </div>
    </div>

    <!-- Success Toast -->
    <div v-if="showSuccess" class="fixed bottom-6 right-6 z-50 bg-emerald-500 text-white px-6 py-4 rounded-xl shadow-[0_10px_40px_rgba(16,185,129,0.3)] flex items-center gap-3 animate-in slide-in-from-bottom-5">
      <div class="w-8 h-8 bg-white/20 rounded-full flex items-center justify-center shrink-0">
        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><polyline points="20 6 9 17 4 12"/></svg>
      </div>
      <div>
        <h4 class="font-semibold text-sm">Booking Berhasil!</h4>
        <p class="text-xs text-emerald-50 font-medium mt-0.5">Jadwalmu telah ditambahkan ke bimbingan.</p>
      </div>
    </div>

  </div>
</template>

<script setup>
import { ref, onMounted } from 'vue'
import { useRoute, RouterLink, useRouter } from 'vue-router'
import { mentoringService } from '@/services/mentoring.service'

const route = useRoute()
const router = useRouter()

const mentor = ref(null)
const isLoading = ref(true)
const isError = ref(false)
const showBookingModal = ref(false)
const showSuccess = ref(false)
const isSubmitting = ref(false)

// Booking form states
const bookingDate = ref('')
const bookingTime = ref('')
const bookingTopic = ref('')
const bookingNotes = ref('')

const fetchMentor = async () => {
  const mentorId = route.params.id
  isLoading.value = true
  isError.value = false
  try {
    const data = await mentoringService.getTutorById(mentorId)
    mentor.value = data
  } catch (error) {
    console.error('Failed fetching mentor detail:', error)
    isError.value = true
  } finally {
    isLoading.value = false
  }
}

onMounted(() => {
  fetchMentor()
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

const submitBooking = async () => {
  if (!bookingDate.value || !bookingTime.value || !bookingTopic.value) {
    alert('Harap isi tanggal, waktu, dan topik.')
    return
  }

  const desc = `Jadwal: ${bookingDate.value} pukul ${bookingTime.value} WIB. Catatan: ${bookingNotes.value || '-'}`
  if (desc.length < 20) {
    alert('Harap isi catatan tambahan minimal 20 karakter agar jelas bagi tutor.')
    return
  }

  isSubmitting.value = true
  try {
    await mentoringService.createMentoringRequest({
      tutor_id: mentor.value.id,
      title: bookingTopic.value,
      description: desc,
      duration_minutes: 60,
      student_message: bookingNotes.value || null
    })
    showBookingModal.value = false
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
