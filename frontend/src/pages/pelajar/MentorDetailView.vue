<template>
  <div class="relative min-h-screen bg-[#F7F2EB]">
    <div class="max-w-[1000px] mx-auto px-6 py-6 space-y-6 animate-in fade-in duration-500">
      
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
              <h1 class="text-[30px] font-semibold text-slate-900 tracking-tight leading-tight mb-1">Detail Mentor</h1>
              <p class="text-base text-slate-500 leading-relaxed max-w-xl">
                Kenali lebih dekat profil akademik, bidang spesialisasi, dan pengalaman mengajar mentor pilihan Anda.
              </p>
            </div>
          </div>
        </div>
      </div>

      <!-- Main Layout Grid -->
      <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
        
        <!-- Mentor Info Card (Left) -->
        <div class="md:col-span-1 bg-white rounded-xl p-6 shadow-sm border border-slate-200 flex flex-col items-center text-center space-y-4">
          <div class="w-24 h-24 rounded-full bg-[#EDF1F6] border-2 border-slate-200 flex items-center justify-center shrink-0 overflow-hidden text-[#334EAC] font-bold text-2xl">
            <img v-if="mentor.image" :src="mentor.image" :alt="mentor.name" class="w-full h-full object-cover">
            <span v-else>{{ getInitials(mentor.name) }}</span>
          </div>

          <div class="space-y-1 w-full">
            <div class="flex items-center justify-center gap-1">
              <h2 class="text-lg font-bold text-slate-900 truncate">{{ mentor.name }}</h2>
              <svg v-if="mentor.verified" class="w-4 h-4 text-[#334EAC] shrink-0" viewBox="0 0 24 24" fill="currentColor">
                <path d="M12 2C6.5 2 2 6.5 2 12s4.5 10 10 10 10-4.5 10-10S17.5 2 12 2zm-2 15l-5-5 1.41-1.41L10 14.17l7.59-7.59L19 8l-9 9z"/>
              </svg>
            </div>
            <p class="text-xs text-[#334EAC] font-semibold bg-[#EDF1F6] px-2.5 py-1 rounded-lg w-fit mx-auto">{{ mentor.subject }}</p>
            <p class="text-xs text-slate-500 pt-1">{{ mentor.specialization }}</p>
          </div>

          <!-- Quick Stats -->
          <div class="grid grid-cols-2 gap-4 w-full pt-4 border-t border-slate-100">
            <div>
              <p class="text-[10px] font-bold text-slate-400 uppercase tracking-wider">Rating</p>
              <div class="flex items-center justify-center gap-1 text-slate-900 font-bold text-sm mt-0.5">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 text-amber-500 fill-current" viewBox="0 0 24 24"><polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"/></svg>
                <span>{{ mentor.rating }}</span>
              </div>
            </div>
            <div>
              <p class="text-[10px] font-bold text-slate-400 uppercase tracking-wider">Harga Sesi</p>
              <p class="text-slate-900 font-bold text-sm mt-0.5">{{ mentor.price }}<span class="text-[10px] text-slate-400 font-normal">/jam</span></p>
            </div>
          </div>

          <button @click="showBookingModal = true" class="w-full bg-[#334EAC] hover:bg-[#081F5C] text-white rounded-xl h-11 text-sm font-medium transition-all shadow-sm flex items-center justify-center gap-2">
            Jadwalkan Bimbingan
          </button>
        </div>

        <!-- Biography & Qualifications (Right) -->
        <div class="md:col-span-2 space-y-6">
          
          <div class="bg-white rounded-xl p-6 shadow-sm border border-slate-200 space-y-5">
            <h3 class="text-base font-bold text-[#081F5C] border-b border-slate-100 pb-2.5 flex items-center gap-2">
              <span class="w-2.5 h-2.5 rounded-full bg-[#334EAC]"></span>
              Tentang Mentor
            </h3>
            <p class="text-sm text-slate-600 leading-relaxed">{{ mentor.bio }}</p>
          </div>

          <div class="bg-white rounded-xl p-6 shadow-sm border border-slate-200 space-y-5">
            <h3 class="text-base font-bold text-[#081F5C] border-b border-slate-100 pb-2.5 flex items-center gap-2">
              <span class="w-2.5 h-2.5 rounded-full bg-[#334EAC]"></span>
              Keahlian Utama
            </h3>
            <div class="flex flex-wrap gap-2">
              <span v-for="tag in mentor.tags" :key="tag" class="px-3 py-1.5 bg-slate-50 text-slate-700 text-xs font-semibold rounded-lg border border-slate-200">
                {{ tag }}
              </span>
            </div>
          </div>

          <!-- Reviews Section -->
          <div class="bg-white rounded-xl p-6 shadow-sm border border-slate-200 space-y-5">
            <h3 class="text-base font-bold text-[#081F5C] border-b border-slate-100 pb-2.5 flex items-center gap-2">
              <span class="w-2.5 h-2.5 rounded-full bg-emerald-500"></span>
              Ulasan Siswa
            </h3>
            
            <div class="space-y-4">
              <div v-for="review in mentor.reviews" :key="review.author" class="space-y-2 pb-4 border-b border-slate-100 last:border-0 last:pb-0">
                <div class="flex items-center justify-between">
                  <div class="flex items-center gap-2">
                    <div class="w-8 h-8 rounded-full bg-[#EDF1F6] flex items-center justify-center font-bold text-slate-700 text-xs">
                      {{ getInitials(review.author) }}
                    </div>
                    <div>
                      <h4 class="text-xs font-bold text-slate-900">{{ review.author }}</h4>
                      <p class="text-[9px] text-slate-400">{{ review.date }}</p>
                    </div>
                  </div>
                  <div class="flex items-center gap-0.5 text-xs text-amber-500 font-bold bg-amber-50 px-2 py-0.5 rounded border border-amber-100">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-3 h-3 fill-current" viewBox="0 0 24 24"><polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"/></svg>
                    <span>{{ review.rating }}</span>
                  </div>
                </div>
                <p class="text-xs text-slate-500 leading-relaxed font-medium pl-10">{{ review.comment }}</p>
              </div>
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
          <h2 class="text-2xl font-bold text-[#081F5C] mb-2">Booking Mentor</h2>
          <p class="text-sm font-medium text-slate-500 mb-6">Jadwalkan sesi 1-on-1 dengan <span class="font-semibold text-slate-900">{{ mentor.name }}</span></p>
          
          <div class="space-y-5">
            <div>
              <label class="block text-xs font-semibold text-slate-500 uppercase tracking-widest mb-2">Tanggal</label>
              <input type="date" class="w-full bg-slate-50 border border-slate-200 rounded-xl px-4 py-2.5 text-sm font-medium text-slate-900 focus:outline-none focus:ring-4 focus:ring-[#7096D1]/20 focus:border-[#7096D1] transition-all">
            </div>
            <div>
              <label class="block text-xs font-semibold text-slate-500 uppercase tracking-widest mb-2">Waktu</label>
              <select class="w-full bg-slate-50 border border-slate-200 rounded-xl px-4 py-2.5 text-sm font-medium text-slate-900 focus:outline-none focus:ring-4 focus:ring-[#7096D1]/20 focus:border-[#7096D1] transition-all appearance-none cursor-pointer">
                <option value="">Pilih Jam</option>
                <option value="10:00">10:00 WIB</option>
                <option value="13:00">13:00 WIB</option>
                <option value="15:00">15:00 WIB</option>
              </select>
            </div>
            <div>
              <label class="block text-xs font-semibold text-slate-500 uppercase tracking-widest mb-2">Topik Mentoring</label>
              <input type="text" class="w-full bg-slate-50 border border-slate-200 rounded-xl px-4 py-2.5 text-sm font-medium text-slate-900 focus:outline-none focus:ring-4 focus:ring-[#7096D1]/20 focus:border-[#7096D1] transition-all placeholder-slate-400" placeholder="Contoh: Persiapan UTS Kalkulus Lanjut">
            </div>
          </div>
        </div>
        <div class="p-6 bg-slate-50/80 flex items-center justify-end gap-3 rounded-b-xl border-t border-slate-100">
          <button @click="showBookingModal = false" class="bg-white border border-slate-200 text-slate-700 rounded-xl h-10 px-5 text-sm font-medium hover:bg-slate-50 transition-all shadow-sm">Batalkan</button>
          <button @click="submitBooking" class="bg-[#334EAC] text-white rounded-xl h-10 px-5 text-sm font-medium hover:bg-[#081F5C] transition-all shadow-sm">Konfirmasi Booking</button>
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
        <p class="text-xs text-emerald-50 font-medium mt-0.5">Jadwalmu telah ditambahkan ke dashboard.</p>
      </div>
    </div>

  </div>
</template>

<script setup>
import { ref, onMounted } from 'vue'
import { useRoute, RouterLink, useRouter } from 'vue-router'

const route = useRoute()
const router = useRouter()
const showBookingModal = ref(false)
const showSuccess = ref(false)

const allMentors = {
  'sarah-smith': {
    name: 'Dr. Sarah Smith',
    image: 'https://i.pravatar.cc/150?u=a042581f4e29026704d',
    verified: true,
    rating: '4.9',
    specialization: 'Ph.D. di Matematika • MIT',
    bio: 'Dosen tamu & peneliti AI Matematika. Berpengalaman 8+ tahun mengajar Kalkulus Lanjut, Aljabar Linear, dan Matematika Diskrit.',
    tags: ['Kalkulus', 'Aljabar', 'Metode Numerik'],
    price: 'Rp 150k',
    subject: 'Matematika',
    reviews: [
      { author: 'Ahmad Rafiq', rating: '5.0', date: '20 Mei 2026', comment: 'Penjelasan Dr. Sarah sangat terstruktur. Persiapan UTS Kalkulus 2 saya terbantu sekali.' },
      { author: 'Lestari Putri', rating: '4.8', date: '12 Mei 2026', comment: 'Sangat ramah, metode visualnya membuat konsep limit yang abstrak jadi mudah dipahami!' }
    ]
  },
  'anderson': {
    name: 'Prof. Anderson',
    image: 'https://i.pravatar.cc/150?u=1',
    verified: true,
    rating: '4.8',
    specialization: 'Dosen Fisika • UI',
    bio: 'Spesialis olimpiade sains nasional & internasional. Penulis buku panduan mekanika klasik & relativitas dengan pendekatan praktis.',
    tags: ['Kinematika', 'OSN', 'Termodinamika'],
    price: 'Rp 200k',
    subject: 'Fisika',
    reviews: [
      { author: 'Chandra Wijaya', rating: '5.0', date: '18 Mei 2026', comment: 'Prof. Anderson sangat mendalam pembahasannya. Kunci olimpiade terjawab dengan tuntas.' }
    ]
  },
  'budi-santoso': {
    name: 'Budi Santoso',
    image: '',
    verified: false,
    rating: '4.5',
    specialization: 'Senior Software Engineer • Gojek',
    bio: 'Praktisi industri dengan fokus pada Vue.js, Node.js & arsitektur web berskala besar. Siap membantu pengerjaan proyek akhir dan review portofolio.',
    tags: ['Vue.js', 'Algoritma', 'Arsitektur Web'],
    price: 'Rp 120k',
    subject: 'Ilmu Komputer',
    reviews: [
      { author: 'Deni Permana', rating: '4.5', date: '15 Mei 2026', comment: 'Praktis dan langsung membahas studi kasus industri nyata. Mantap mas!' }
    ]
  }
}

const mentor = ref({
  name: 'Mentor Tidak Ditemukan',
  image: '',
  verified: false,
  rating: '0.0',
  specialization: '',
  bio: '',
  tags: [],
  price: 'Rp 0',
  subject: '',
  reviews: []
})

onMounted(() => {
  const id = route.params.id
  if (allMentors[id]) {
    mentor.value = allMentors[id]
  } else {
    // Fallback to Sarah Smith if not matched
    mentor.value = allMentors['sarah-smith']
  }
})

const getInitials = (name) => {
  if (!name) return ''
  return name.split(' ').map(n => n[0]).join('').substring(0, 2).toUpperCase()
}

const submitBooking = () => {
  showBookingModal.value = false
  showSuccess.value = true
  setTimeout(() => {
    showSuccess.value = false
  }, 3000)
}
</script>
