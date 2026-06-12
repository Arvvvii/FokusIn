# 🎨 UI_DESIGN.md — Dokumentasi Frontend & UI/UX FokusIn

Dokumen ini menjelaskan sistem desain, komponen UI, palet warna, tipografi, dan prinsip layout yang digunakan dalam aplikasi FokusIn.

---

## 1. Prinsip Desain

FokusIn menggunakan pendekatan desain **modern, bersih, dan akademis** dengan fokus pada keterbacaan dan kemudahan navigasi. Beberapa prinsip utama:

- **Clarity First** — Informasi penting selalu terlihat tanpa hambatan visual
- **Role-Based UX** — Setiap role (pelajar, tutor, admin) memiliki pengalaman yang disesuaikan
- **Consistent Layout** — Sidebar + Topbar digunakan konsisten di semua dashboard
- **Responsive** — Semua halaman optimal di desktop dan tablet
- **Feedback Visual** — Setiap aksi pengguna mendapatkan feedback (loading state, toast notification, success/error indicator)

---

## 2. Tech Stack UI

| Teknologi | Versi | Kegunaan |
|---|---|---|
| **Vue 3** | `^3.5.32` | Framework komponen |
| **Tailwind CSS** | `^4.3.0` | Utility-first styling |
| **Vite** | `^8.0.8` | HMR & build tool |
| **Custom CSS** | — | `style.css` (global), `admin.css` (admin panel) |

---

## 3. Palet Warna

### Warna Primer

| Nama | Nilai Hex | Kegunaan |
|---|---|---|
| **Primary Blue** | `#2563EB` (blue-600) | Tombol utama, link aktif, highlight |
| **Primary Dark** | `#1E40AF` (blue-800) | Hover state tombol utama |
| **Primary Light** | `#DBEAFE` (blue-100) | Background badge, chip |

### Warna Status

| Nama | Nilai Hex | Kegunaan |
|---|---|---|
| **Success** | `#16A34A` (green-600) | Status valid, sukses, konfirmasi |
| **Warning** | `#D97706` (amber-600) | Status pending, peringatan |
| **Danger** | `#DC2626` (red-600) | Error, hapus, status invalid/cancelled |
| **Info** | `#0891B2` (cyan-600) | Informasi tambahan, tooltip |

### Warna Netral

| Nama | Nilai Hex | Kegunaan |
|---|---|---|
| **Gray 900** | `#111827` | Teks utama (dark) |
| **Gray 700** | `#374151` | Teks sekunder |
| **Gray 500** | `#6B7280` | Placeholder, label disabled |
| **Gray 200** | `#E5E7EB` | Border, divider |
| **Gray 50** | `#F9FAFB` | Background halaman |
| **White** | `#FFFFFF` | Background card, modal |

### Warna Sidebar

| Role | Background Sidebar | Aksen Aktif |
|---|---|---|
| **Pelajar** | Gradient biru-ungu (dark) | `#2563EB` |
| **Tutor** | Gradient biru gelap | `#3B82F6` |
| **Admin** | Dark slate (`#1E293B`) | `#2563EB` |

---

## 4. Tipografi

FokusIn menggunakan font sistem default (Inter/system-ui) yang di-load melalui Tailwind CSS.

### Hierarki Teks

| Level | Kelas Tailwind | Ukuran | Berat | Contoh Penggunaan |
|---|---|---|---|---|
| **H1 Halaman** | `text-3xl font-bold` | 30px | 700 | Judul halaman dashboard |
| **H2 Seksi** | `text-2xl font-semibold` | 24px | 600 | Judul seksi/card |
| **H3 Sub-seksi** | `text-xl font-semibold` | 20px | 600 | Judul sub-komponen |
| **Body Besar** | `text-base` | 16px | 400 | Konten utama, paragraf |
| **Body Kecil** | `text-sm` | 14px | 400 | Label, deskripsi, metadata |
| **Caption** | `text-xs` | 12px | 400 | Timestamp, info pendukung |
| **Badge/Tag** | `text-xs font-medium` | 12px | 500 | Status badge, kategori tag |

---

## 5. Komponen UI

### 5.1 Layout Components

#### `DashboardLayout.vue` — Layout Pelajar
```
┌─────────────────────────────────────────────┐
│  SIDEBAR (fixed, 256px)  │  MAIN CONTENT    │
│  ┌────────────────────┐  │  ┌─────────────┐ │
│  │ Logo FokusIn       │  │  │  TOPBAR     │ │
│  │ ─────────────────  │  │  │ (breadcrumb)│ │
│  │ Menu:              │  │  └─────────────┘ │
│  │ • Dashboard        │  │  ┌─────────────┐ │
│  │ • Forum            │  │  │  PAGE       │ │
│  │ • AI Analyzer      │  │  │  CONTENT    │ │
│  │ • Mentoring        │  │  │  (<router   │ │
│  │ • Materi           │  │  │   -view/>)  │ │
│  │ • Kuis             │  │  │             │ │
│  │ • Profil           │  │  └─────────────┘ │
│  └────────────────────┘  │                  │
└─────────────────────────────────────────────┘
```

#### `AdminLayout.vue` — Layout Admin
- Sidebar gelap dengan logo + menu navigasi admin
- Topbar dengan informasi user dan notifikasi
- Konten utama menggunakan `<router-view>`

#### `AuthLayout.vue`
- Layout minimalis tanpa sidebar
- Center-aligned card form login/register

---

### 5.2 Card Component

Digunakan di seluruh dashboard untuk menampilkan data ringkas.

```html
<!-- Contoh implementasi card statistik di DashboardAdminView.vue -->
<div class="bg-white rounded-xl shadow-sm border border-gray-100 p-6">
  <div class="flex items-center justify-between mb-4">
    <h3 class="text-sm font-medium text-gray-500">Total Pengguna</h3>
    <span class="text-blue-600 bg-blue-50 p-2 rounded-lg">
      <!-- Ikon -->
    </span>
  </div>
  <div class="text-3xl font-bold text-gray-900">1,250</div>
  <p class="text-sm text-green-600 mt-1">+12% dari bulan lalu</p>
</div>
```

---

### 5.3 Status Badge

Badge status digunakan konsisten di seluruh aplikasi:

```html
<!-- Status Mentoring -->
<span class="px-2 py-1 text-xs font-medium rounded-full
  bg-yellow-100 text-yellow-800">   <!-- pending -->
  Pending
</span>

<span class="px-2 py-1 text-xs font-medium rounded-full
  bg-green-100 text-green-800">    <!-- confirmed/valid -->
  Dikonfirmasi
</span>

<span class="px-2 py-1 text-xs font-medium rounded-full
  bg-blue-100 text-blue-800">     <!-- completed -->
  Selesai
</span>

<span class="px-2 py-1 text-xs font-medium rounded-full
  bg-red-100 text-red-800">       <!-- cancelled/invalid -->
  Dibatalkan
</span>
```

**Mapping Status → Warna:**
| Status | Background | Text |
|---|---|---|
| `pending` | `bg-yellow-100` | `text-yellow-800` |
| `confirmed` / `valid` | `bg-green-100` | `text-green-800` |
| `completed` | `bg-blue-100` | `text-blue-800` |
| `cancelled` / `invalid` | `bg-red-100` | `text-red-800` |

---

### 5.4 Button

```html
<!-- Tombol Primer -->
<button class="bg-blue-600 hover:bg-blue-700 text-white font-medium
               px-4 py-2 rounded-lg transition-colors duration-200">
  Simpan
</button>

<!-- Tombol Sekunder -->
<button class="border border-gray-300 hover:bg-gray-50 text-gray-700
               font-medium px-4 py-2 rounded-lg transition-colors">
  Batal
</button>

<!-- Tombol Danger -->
<button class="bg-red-600 hover:bg-red-700 text-white font-medium
               px-4 py-2 rounded-lg transition-colors">
  Hapus
</button>

<!-- Tombol Ghost/Link -->
<button class="text-blue-600 hover:text-blue-800 font-medium
               underline-offset-2 hover:underline">
  Lihat Detail
</button>
```

---

### 5.5 Form Input

```html
<!-- Input Teks -->
<div class="mb-4">
  <label class="block text-sm font-medium text-gray-700 mb-1">
    Nama Lengkap
  </label>
  <input
    type="text"
    class="w-full border border-gray-300 rounded-lg px-3 py-2 text-sm
           focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent
           transition-colors"
    placeholder="Masukkan nama lengkap"
  />
</div>

<!-- Select -->
<select class="w-full border border-gray-300 rounded-lg px-3 py-2 text-sm
               focus:outline-none focus:ring-2 focus:ring-blue-500">
  <option value="">Pilih Kategori</option>
</select>

<!-- State error -->
<input class="... border-red-500 focus:ring-red-500" />
<p class="text-red-600 text-xs mt-1">Email tidak valid.</p>
```

---

### 5.6 Toast Notification

Dikelola oleh Pinia `toastStore` (`stores/toast.js`).

```javascript
// Penggunaan di komponen
import { useToastStore } from '@/stores/toast'
const toastStore = useToastStore()

toastStore.show('Berhasil disimpan!', 'success')   // Hijau
toastStore.show('Terjadi kesalahan.', 'error')     // Merah
toastStore.show('Harap isi semua field.', 'warning') // Kuning
```

**Tampilan:**
- Muncul di pojok kanan bawah layar
- Auto-dismiss setelah 3 detik
- Dapat ditutup manual

---

### 5.7 Loading State

```html
<!-- Spinner di tengah halaman -->
<div v-if="isLoading" class="flex justify-center items-center py-20">
  <div class="animate-spin rounded-full h-8 w-8
              border-b-2 border-blue-600"></div>
</div>

<!-- Skeleton placeholder untuk card -->
<div v-if="isLoading" class="animate-pulse">
  <div class="h-4 bg-gray-200 rounded w-3/4 mb-2"></div>
  <div class="h-4 bg-gray-200 rounded w-1/2"></div>
</div>
```

---

## 6. Halaman per Role

### 6.1 Halaman Pelajar (17 halaman)

| Halaman | Route | Deskripsi |
|---|---|---|
| `DashboardPelajarView` | `/pelajar/dashboard` | Ringkasan aktivitas, progress belajar, AI insights |
| `ForumView` | `/pelajar/forum` | Daftar pertanyaan dengan filter kategori |
| `PostDetailView` | `/pelajar/forum/:id` | Detail post + jawaban + voting |
| `CreatePostView` | `/pelajar/forum/create` | Form buat pertanyaan baru |
| `AIAnalyzerView` | `/pelajar/ai-analyzer` | Daftar riwayat analisis AI |
| `CreateAIAnalysisView` | `/pelajar/ai-analyzer/create` | Upload file & lihat hasil analisis AI |
| `MentoringView` | `/pelajar/mentoring` | Daftar tutor + booking sesi |
| `MentorProfileView` | `/pelajar/mentor/:id` | Profil lengkap tutor + booking |
| `MaterialsView` | `/pelajar/materials` | Daftar materi belajar |
| `MaterialDetailView` | `/pelajar/materials/:id` | Detail & preview materi |
| `QuizView` | `/pelajar/quiz` | Daftar set kuis |
| `QuizPlayView` | `/pelajar/quiz/:id` | Halaman aktif kuis |
| `QuizResultView` | `/pelajar/quiz/:id/result` | Hasil & review kuis |
| `ProfileView` | `/pelajar/profile` | Profil pengguna + badge |
| `EditProfileView` | `/pelajar/profile/edit` | Edit informasi profil |
| `PelajarNotificationsView` | `/pelajar/notifications` | Daftar notifikasi |

### 6.2 Halaman Tutor (16 halaman)

| Halaman | Route | Deskripsi |
|---|---|---|
| `DashboardTutorView` | `/tutor/dashboard` | Statistik tutor + aktivitas terkini |
| `VerifyAnswerView` | `/tutor/verify-answer` | Verifikasi jawaban di forum |
| `MentoringManagementView` | `/tutor/mentoring` | Kelola semua sesi mentoring |
| `TutorMentoringDetailView` | `/tutor/mentoring/:id` | Detail sesi + checklist agenda |
| `TutorMentoringFeedbackView` | `/tutor/mentoring/feedback/:id` | Isi feedback pasca-sesi |
| `TutorScheduleView` | `/tutor/schedule` | Kelola jadwal ketersediaan |
| `UploadExamView` | `/tutor/upload-exam` | Upload arsip soal ujian |
| `AIValidationView` | `/tutor/ai-validation` | Daftar arsip yang perlu divalidasi |
| `TutorValidationDetailView` | `/tutor/validation/:id` | Detail validasi arsip ujian |
| `TutorAnalyticsView` | `/tutor/analytics` | Grafik performa dan statistik tutor |
| `TutorProfileView` | `/tutor/profile` | Profil publik tutor |
| `TutorSettingsView` | `/tutor/settings` | Pengaturan akun |
| `TutorNotificationsView` | `/tutor/notifications` | Notifikasi incoming |
| `TutorStudentRequestsView` | `/tutor/student-requests` | Permintaan sesi dari pelajar |

### 6.3 Halaman Admin (22 halaman)

| Halaman | Route | Deskripsi |
|---|---|---|
| `DashboardAdminView` | `/admin/dashboard` | Overview platform + KPI |
| `ManageUsersView` | `/admin/users` | CRUD pengguna |
| `ManageTutorsView` | `/admin/tutors` | Manajemen tutor |
| `ManageReportsView` | `/admin/reports` | Kelola laporan pengguna |
| `AdminModerationView` | `/admin/moderation` | Moderasi konten forum |
| `AdminMentoringView` | `/admin/mentoring` | Monitor semua sesi mentoring |
| `AdminMaterialsView` | `/admin/materials` | Kelola materi belajar |
| `AdminQuizMonitoringView` | `/admin/quiz-monitoring` | Monitor & kelola kuis |
| `AnalyticsView` | `/admin/analytics` | Analytics platform lengkap |
| `AIMonitoringView` | `/admin/ai-monitoring` | Monitor penggunaan AI |

---

## 7. Layout Grid System

FokusIn menggunakan grid berbasis Tailwind CSS:

```html
<!-- Grid 3 kolom statistik (Dashboard) -->
<div class="grid grid-cols-1 md:grid-cols-3 gap-6">
  <div class="col-span-1"><!-- Card statistik --></div>
</div>

<!-- Grid 2 kolom (form + preview) -->
<div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
  ...
</div>

<!-- Layout halaman dengan tabel (full width) -->
<div class="w-full overflow-x-auto">
  <table class="min-w-full divide-y divide-gray-200">
    ...
  </table>
</div>
```

---

## 8. Responsivitas

| Breakpoint | Tailwind Prefix | Lebar |
|---|---|---|
| Mobile | (default) | < 768px |
| Tablet | `md:` | 768px+ |
| Desktop | `lg:` | 1024px+ |
| Wide | `xl:` | 1280px+ |

**Sidebar:** Tersembunyi di mobile, muncul di `lg:` ke atas.

---

## 9. Ikon & Ilustrasi

- **Ikon:** Menggunakan Unicode emoji dan SVG inline (tidak menggunakan icon library eksternal)
- **Avatar:** Default menggunakan [UI Avatars API](https://ui-avatars.com/api/?name={name}) untuk generate avatar dari nama pengguna
- **Ilustrasi:** SVG inline di halaman landing (HomeLandingView.vue)

---

## 10. Animasi & Transisi

| Animasi | Kelas Tailwind | Digunakan pada |
|---|---|---|
| Spin (loading) | `animate-spin` | Spinner loading |
| Pulse (skeleton) | `animate-pulse` | Skeleton placeholder |
| Fade hover | `transition-colors duration-200` | Semua tombol & link |
| Transform hover | `hover:scale-105 transition-transform` | Card interaktif |

**Prinsip:** Animasi hanya digunakan untuk feedback interaktif, bukan dekorasi berlebihan yang mengganggu keterbacaan.
