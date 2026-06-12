# 🏛️ ARCHITECTURE.md — Dokumentasi Arsitektur FokusIn

Dokumen ini menjelaskan gambaran arsitektur teknis, struktur folder, alur request, dan strategi deployment FokusIn.

---

## 1. Gambaran Arsitektur

FokusIn menggunakan arsitektur **Decoupled Monolith** — frontend dan backend dipisah sepenuhnya sebagai aplikasi mandiri yang berkomunikasi melalui REST API.

```
┌─────────────────────────────────────────────────────────────┐
│                        CLIENT BROWSER                        │
│                                                             │
│   ┌─────────────────────────────────────────────────┐      │
│   │         Vue 3 SPA (Vite + Vue Router + Pinia)    │      │
│   │   - Single Page Application                      │      │
│   │   - State management via Pinia                   │      │
│   │   - HTTP calls via Axios                         │      │
│   └──────────────────────┬──────────────────────────┘      │
└──────────────────────────│──────────────────────────────────┘
                           │ HTTPS REST API (Bearer Token)
                           ▼
┌─────────────────────────────────────────────────────────────┐
│                BACKEND — Laravel 12 API Server               │
│                  (Railway / localhost:8000)                  │
│                                                             │
│   ┌───────────┐  ┌───────────┐  ┌───────────────────────┐  │
│   │  Routes   │→ │Controllers│→ │      Services         │  │
│   │ api.php   │  │ (24 ctrl) │  │ AIPatternService      │  │
│   └───────────┘  └───────────┘  │ BadgeService          │  │
│                        │        │ ReputationService     │  │
│                        ▼        └───────────────────────┘  │
│                  ┌───────────┐                              │
│                  │  Models   │                              │
│                  │(Eloquent) │                              │
│                  └─────┬─────┘                              │
└────────────────────────│────────────────────────────────────┘
                         │
           ┌─────────────┴──────────────┐
           ▼                            ▼
┌─────────────────┐           ┌──────────────────┐
│   MySQL DB      │           │   External APIs   │
│ fokus_in_db     │           │ • Cloudinary      │
│ (18 tabel)      │           │   (File Storage)  │
└─────────────────┘           │ • Groq API        │
                              │   (LLaMA3 AI)     │
                              └──────────────────┘
```

---

## 2. Struktur Folder Detail

### 2.1 Backend (`/backend`)

```
backend/
├── app/
│   ├── Http/
│   │   └── Controllers/
│   │       ├── AuthController.php           # Register, Login, Logout, Me
│   │       ├── PostController.php           # Forum CRUD + Vote + Verify
│   │       ├── ExamUploadController.php     # Upload & validasi arsip ujian
│   │       ├── AIPatternController.php      # AI analyze + summary + refresh
│   │       ├── MaterialController.php       # Materi belajar
│   │       ├── MentoringController.php      # Sesi mentoring
│   │       ├── QuizController.php           # Kuis & attempt
│   │       ├── TutorController.php          # Detail & review tutor
│   │       ├── TutorScheduleController.php  # Jadwal tutor
│   │       ├── TutorDashboardController.php # Dashboard analytics tutor
│   │       ├── TutorAnalyticsController.php # Analytics per tutor
│   │       ├── ReportController.php         # Sistem pelaporan
│   │       ├── LeaderboardController.php    # Papan peringkat
│   │       ├── LeaderboardController.php    # Papan peringkat
│   │       ├── CategoryController.php       # Manajemen kategori
│   │       ├── DashboardController.php      # Dashboard pelajar + AI insights
│   │       ├── TestimonialController.php    # Testimoni
│   │       ├── NotificationController.php   # Notifikasi
│   │       ├── UserController.php           # Profil & global stats
│   │       ├── AdminDashboardController.php # Admin: dashboard + monitoring
│   │       ├── AdminUserController.php      # Admin: CRUD users
│   │       ├── AdminTutorController.php     # Admin: manajemen tutor
│   │       ├── AdminMentoringController.php # Admin: monitoring mentoring
│   │       └── AdminQuizController.php      # Admin: CRUD kuis
│   │
│   ├── Models/                              # 18 Eloquent Models
│   │   ├── User.php
│   │   ├── Post.php
│   │   ├── ExamUpload.php
│   │   ├── MentoringSession.php
│   │   ├── QuizSet.php, QuizQuestion.php, QuizAttempt.php
│   │   ├── Material.php
│   │   ├── Category.php
│   │   ├── Vote.php
│   │   ├── Badge.php, UserBadge.php
│   │   ├── Report.php
│   │   ├── Testimonial.php
│   │   ├── TutorProfile.php, TutorReview.php, TutorSchedule.php
│   │   └── AiSummary.php
│   │
│   └── Services/
│       ├── AIPatternService.php  # Logika cache & generate AI summary
│       ├── BadgeService.php      # Assign badge berdasarkan pencapaian
│       └── ReputationService.php # Update reputasi user
│
├── database/
│   ├── migrations/               # 28 file migration berurutan
│   └── seeders/
│
└── routes/
    └── api.php                   # Semua route API (206 baris)
```

### 2.2 Frontend (`/frontend/src`)

```
frontend/src/
├── main.js                    # Entry point: Pinia + Router + initSession()
├── App.vue                    # Root component
├── style.css                  # Global styles (Tailwind + custom)
├── admin.css                  # Styles khusus tampilan admin
│
├── layouts/
│   ├── AdminLayout.vue        # Sidebar admin + topbar
│   ├── DashboardLayout.vue    # Sidebar pelajar + topbar
│   ├── TutorLayout.vue        # Sidebar tutor + topbar
│   └── AuthLayout.vue         # Layout polos untuk login/register
│
├── router/
│   └── index.js               # Definisi route + navigation guard (role-based)
│
├── stores/
│   ├── auth.js                # Pinia store: user, token, isAuthenticated
│   └── toast.js               # Pinia store: notifikasi toast UI
│
├── services/                  # Axios wrappers ke API
│   ├── api.js                 # Axios instance (base URL, interceptors)
│   ├── auth.service.js        # login(), register(), logout()
│   ├── forum.service.js       # getPosts(), createPost(), vote()
│   ├── mentoring.service.js   # listTutors(), bookSession(), updateStatus()
│   ├── quiz.service.js        # getQuizzes(), getQuizById(), attempt()
│   ├── material.service.js    # getMaterials(), uploadMaterial()
│   ├── examUpload.service.js  # getUploads(), uploadExam(), deleteUpload()
│   ├── ai.service.js          # analyzeFile(), getAISummary()
│   ├── admin.service.js       # Semua operasi admin
│   ├── category.service.js    # getCategories()
│   ├── dashboard.service.js   # getDashboardData(), getAIInsights()
│   ├── profile.service.js     # getUserProfile()
│   ├── stats.service.js       # getGlobalStats()
│   └── notifications.service.js # getNotifications()
│
├── components/
│   ├── admin/                 # Komponen khusus admin
│   └── shared/                # Komponen reusable (Toast, Modal, dll.)
│
└── pages/
    ├── public/
    │   ├── HomeLandingView.vue     # Landing page utama
    │   ├── AboutView.vue
    │   ├── ContactView.vue
    │   └── FAQView.vue
    ├── auth/
    │   ├── LoginView.vue
    │   ├── RegisterView.vue
    │   └── ForgotPasswordView.vue
    ├── pelajar/                    # 17 halaman
    ├── tutor/                      # 16 halaman
    └── admin/                      # 22 halaman
```

---

## 3. Alur Request: Frontend → Backend → Database

### Contoh: Pelajar Mengerjakan Kuis

```
1. [Browser] User klik "Mulai Kuis" di /pelajar/quiz/3

2. [Vue Router] Load QuizPlayView.vue (halaman kuis aktif)

3. [QuizPlayView.vue] Panggil quiz.service.js → getQuizById(3)

4. [quiz.service.js] Axios GET request ke:
   GET https://api.fokusin.app/api/quizzes/3
   Headers: { Authorization: "Bearer {token}" }

5. [api.js interceptor] Otomatis attach token dari localStorage

6. [Laravel Router] Route::get('/quizzes/{id}') → QuizController@show

7. [QuizController] QuizSet::with('questions')->findOrFail(3) → Query MySQL

8. [MySQL] Kembalikan data quiz_sets + quiz_questions

9. [QuizController] Return JSON response

10. [Axios] Response diterima → quiz.service.js resolve promise

11. [QuizPlayView.vue] Render soal-soal di DOM

12. [User] Jawab semua soal → klik "Submit"

13. [QuizPlayView.vue] Panggil quiz.service.js → submitAttempt(3, answers)

14. [quiz.service.js] POST /api/quizzes/3/attempt { answers: [...] }

15. [QuizController@attempt] Hitung skor → Simpan ke quiz_attempts → Update reputation_score

16. [Vue Router] Redirect ke /pelajar/quiz/3/result

17. [QuizResultView.vue] Tampilkan skor & review jawaban
```

---

## 4. Navigation Guard & Proteksi Route

File: [`frontend/src/router/index.js`](./frontend/src/router/index.js)

```javascript
router.beforeEach((to, from) => {
  const authStore = useAuthStore()

  // 1. Cek apakah route butuh login
  if (to.meta.requiresAuth && !authStore.isAuthenticated) {
    return '/auth/login'
  }

  // 2. Validasi role pengguna
  if (to.meta.requiresAuth && to.meta.role) {
    if (authStore.role !== to.meta.role) {
      return `/${authStore.role}/dashboard`  // Redirect ke dashboard yang sesuai
    }
  }

  // 3. Cegah user login mengakses halaman auth
  if (to.path.startsWith('/auth') && authStore.isAuthenticated) {
    return `/${authStore.role}/dashboard`
  }
})
```

**Route Groups:**
| Prefix | Meta Role | Layout |
|---|---|---|
| `/` | — | Tidak ada (halaman publik) |
| `/auth/*` | — | AuthLayout |
| `/pelajar/*` | `pelajar` | DashboardLayout |
| `/tutor/*` | `tutor` | TutorLayout |
| `/admin/*` | `admin` | AdminLayout |

---

## 5. Manajemen State (Pinia)

### Auth Store (`stores/auth.js`)

```javascript
// State yang dikelola:
{
  user: null,           // Objek user dari API
  token: null,          // Bearer token Sanctum
  isAuthenticated: false,
  loading: false,
  error: null
}

// Getter:
role: (state) => state.user?.role || null

// Actions: login(), register(), logout(), initSession()
```

**Persistensi:** Token dan data user disimpan di `localStorage` dengan key:
- `fokusin_token` — Bearer token
- `fokusin_user` — Objek user (JSON)

`initSession()` dipanggil saat aplikasi pertama kali dimuat di `main.js` untuk restore sesi dari `localStorage`.

---

## 6. Konfigurasi Axios (HTTP Client)

File: [`frontend/src/services/api.js`](./frontend/src/services/api.js)

| Konfigurasi | Nilai |
|---|---|
| `baseURL` | `VITE_API_URL` env var |
| `timeout` | 10.000 ms (10 detik) |
| `Content-Type` default | `application/json` |
| Request Interceptor | Otomatis attach `Authorization: Bearer {token}` |
| Response Interceptor | Tangani 401 → clear localStorage → redirect login |
| FormData handling | Hapus `Content-Type` header agar browser generate multipart boundary |

---

## 7. Integrasi External Services

### 7.1 Cloudinary (File Storage)

- **Digunakan untuk:** Penyimpanan file PDF arsip ujian
- **Package:** `cloudinary-labs/cloudinary-laravel ^3.0`
- **Flow:** Upload via `cloudinary()->uploadApi()->upload()` → dapat `secure_url` dan `public_id`
- **Hapus file:** `cloudinary()->uploadApi()->destroy($publicId)`

### 7.2 Groq API (AI)

- **Model:** `llama3-8b-8192`
- **Digunakan untuk:** Analisis pola soal ujian
- **Endpoint:** `POST https://api.groq.com/openai/v1/chat/completions`
- **Response format:** JSON object (`response_format: { type: 'json_object' }`)
- **Rate limit:** Request throttle maks 10 req/menit (dari Laravel throttle middleware)
- **Max input text:** 15.000 karakter (dipotong di backend)

---

## 8. Strategi Deployment

### Backend (Railway)

```
Railway Platform
├── Service: fokusin-backend (Laravel)
│   └── Environment: Production
│       ├── APP_URL = https://fokusin-production.up.railway.app
│       ├── DB_CONNECTION = mysql
│       └── [Semua env vars terisi]
│
└── Addons: MySQL database (Railway MySQL plugin)
```

**URL Produksi Backend:** `https://fokusin-production.up.railway.app`

### Frontend (Static Hosting)

Frontend di-build dengan:
```bash
cd frontend
npm run build
# Output: frontend/dist/
```

File `dist/` dapat di-deploy ke:
- **Netlify** — Drag & drop folder `dist/`
- **Vercel** — Connect repo, set `build command: npm run build`, `output: dist`
- **GitHub Pages** — Upload `dist/` ke branch `gh-pages`

**Catatan:** Pastikan `VITE_API_URL` di-set ke URL backend produksi sebelum build.

---

## 9. Keamanan

| Aspek | Implementasi |
|---|---|
| **Autentikasi** | Laravel Sanctum Bearer Token |
| **Otorisasi** | Spatie Laravel Permission (role-based) + pengecekan manual di controller |
| **CORS** | Konfigurasi via `SANCTUM_STATEFUL_DOMAINS` dan `CORS_ALLOWED_ORIGINS` |
| **Rate Limiting** | Throttle `10,1` pada endpoint auth (10 req/menit) |
| **Input Validation** | Laravel `$request->validate()` di setiap controller |
| **Mass Assignment** | `$guarded = ['id']` pada semua model |
| **Password Hashing** | `bcrypt` dengan `BCRYPT_ROUNDS=12` |
| **File Upload** | Validasi MIME type (pdf) dan max size (10MB) di backend |
| **Token Invalidation** | Token lama dihapus saat login ulang (`$user->tokens()->delete()`) |
