# 🏗️ SYSTEM.md — Dokumentasi Sistem FokusIn

Dokumen ini menjelaskan alur sistem secara keseluruhan, proses bisnis utama, dan skema database FokusIn.

---

## 1. Gambaran Umum Sistem

FokusIn adalah platform edukasi dengan arsitektur **SPA (Single Page Application) + REST API**. Frontend Vue 3 berkomunikasi dengan backend Laravel melalui API JSON. Autentikasi menggunakan **Laravel Sanctum (Bearer Token)** yang disimpan di `localStorage`.

### Aktor Sistem

| Aktor | Deskripsi |
|---|---|
| **Guest / Pengunjung** | Dapat melihat landing page, forum publik, materi, kuis, dan leaderboard tanpa login |
| **Pelajar** | Pengguna terdaftar yang dapat mengakses semua fitur belajar |
| **Tutor** | Pengajar yang mengelola arsip ujian, materi, mentoring, dan validasi konten |
| **Admin** | Superuser yang mengelola seluruh platform |

---

## 2. Alur Sistem Utama

### 2.1 Alur Registrasi & Login

```
[User] → Isi Form Register/Login
         ↓
[Frontend] → POST /api/auth/register atau /api/auth/login
         ↓
[Backend] → Validasi input → Hash password (bcrypt) → Assign role Spatie
         ↓
[Backend] → Buat Sanctum Token → Return { user, token }
         ↓
[Frontend] → Simpan token ke localStorage['fokusin_token']
         ↓
[Router Guard] → Redirect ke /{role}/dashboard
```

### 2.2 Alur AI Analyzer (Fitur Utama)

```
[Pelajar] → Upload file PDF/DOCX soal ujian
         ↓
[Frontend] → POST /api/ai/analyze (FormData: file)
         ↓
[Backend - AIPatternController] → Ekstraksi teks:
         • PDF    → smalot/pdfparser
         • DOCX   → ZipArchive + strip_tags(word/document.xml)
         • DOC    → preg_replace (regex fallback)
         ↓
[Backend] → Potong teks ke maks 15.000 karakter
         ↓
[Backend] → POST ke Groq API (model: llama3-8b-8192)
         Prompt: "Analisis pola soal → JSON frekuensi_topik, tingkat_kesulitan,
                  rekomendasi_belajar, kata_kunci"
         ↓
[Groq API] → Return JSON analysis
         ↓
[Frontend] → Tampilkan hasil: grafik frekuensi topik, rekomendasi belajar
```

### 2.3 Alur Upload Arsip Ujian (Tutor)

```
[Tutor] → Pilih kategori → Upload PDF
         ↓
[Frontend] → POST /api/exam-uploads (FormData: category_id, file)
         ↓
[Backend] → Cek role (hanya admin/tutor)
         ↓
[Backend] → Upload file ke Cloudinary → Dapatkan secure_url + public_id
         ↓
[Backend] → Simpan ke tabel exam_uploads
         ↓
[Backend] → Hapus cache ai_summaries untuk kategori tersebut (invalidasi)
         ↓
[Backend] → Return data exam_upload
         ↓
[Tutor] → Dapat memvalidasi status: pending → valid / invalid
```

### 2.4 Alur Booking Mentoring

```
[Pelajar] → Buka halaman Mentoring → Pilih Tutor
         ↓
[Frontend] → GET /api/tutors → Tampilkan daftar tutor dengan rating
         ↓
[Pelajar] → Pilih Tutor → Buka profil tutor → Booking sesi
         ↓
[Frontend] → POST /api/mentoring/requests { tutor_id, subject, scheduled_at, ... }
         ↓
[Backend] → Simpan ke mentoring_sessions (status: 'pending')
         ↓
[Tutor] → Terima notifikasi → Konfirmasi / Tolak
         ↓
[Backend] → PATCH /api/mentoring/sessions/{id}/status { status: 'confirmed' }
         ↓
[Sesi berlangsung] → Tutor mengisi feedback
         ↓
[Backend] → POST /api/mentoring/sessions/{id}/feedback
         ↓
[Status] → 'completed'
```

### 2.5 Alur Forum Tanya-Jawab

```
[Pengguna] → Buat pertanyaan (POST /api/posts, type: 'question')
         ↓
[Pengguna lain] → Beri jawaban (POST /api/posts, type: 'answer', parent_id)
         ↓
[Tutor/Admin] → Verifikasi jawaban (POST /api/posts/{id}/verify)
         ↓
[Penanya] → Tandai best answer (POST /api/posts/{id}/best-answer)
         ↓
[Pengguna] → Vote postingan (POST /api/posts/{id}/vote)
         ↓
[System - BadgeService] → Cek & assign badge berdasarkan aktivitas
```

### 2.6 Alur Kuis

```
[Pelajar] → GET /api/quizzes → Pilih set kuis
         ↓
[Frontend] → GET /api/quizzes/{id} → Tampilkan soal-soal
         ↓
[Pelajar] → Jawab semua soal → Submit
         ↓
[Frontend] → POST /api/quizzes/{id}/attempt { answers: [...] }
         ↓
[Backend - QuizController] → Hitung skor → Simpan ke quiz_attempts
         ↓
[Backend] → Update reputation_score pengguna
         ↓
[Frontend] → Tampilkan halaman hasil (skor, jawaban benar/salah)
```

---

## 3. Diagram Alur Proses Bisnis

### Flowchart: Validasi Arsip Ujian oleh Tutor

```
START
  │
  ▼
Tutor upload PDF ke sistem
  │
  ▼
Sistem upload ke Cloudinary → dapat secure_url
  │
  ▼
Record disimpan ke exam_uploads (status: 'pending')
  │
  ▼
Tutor buka Validation Workspace (/tutor/ai-validation)
  │
  ▼
Tutor review konten dokumen
  │
  ▼
[Keputusan] ─────────────┐
Konten sesuai?           │
  │ YA                   │ TIDAK
  ▼                      ▼
Status → 'valid'    Status → 'invalid'
Tulis catatan       Tulis alasan penolakan
  │                      │
  └──────────┬───────────┘
             ▼
  Update exam_uploads (PUT /api/exam-uploads/{id}/extracted-text)
             │
             ▼
           END
```

---

## 4. Skema Database (ERD)

### 4.1 Tabel Utama

#### `users`
| Kolom | Tipe | Keterangan |
|---|---|---|
| `id` | bigint PK | Auto-increment |
| `name` | varchar(255) | Nama lengkap |
| `email` | varchar(255) UNIQUE | Email login |
| `password` | varchar(255) | Hash bcrypt |
| `role` | enum(pelajar, tutor, admin) | Role utama |
| `reputation_score` | int DEFAULT 0 | Skor reputasi |
| `bio` | text NULL | Biografi pengguna |
| `avatar_url` | varchar NULL | URL foto profil |
| `is_verified` | boolean | Status verifikasi |
| `email_verified_at` | timestamp NULL | — |
| `created_at`, `updated_at` | timestamp | — |

#### `posts`
| Kolom | Tipe | Keterangan |
|---|---|---|
| `id` | bigint PK | — |
| `user_id` | FK → users | Penulis |
| `category_id` | FK → categories NULL | Kategori |
| `title` | varchar(255) | Judul post |
| `content` | text | Isi konten |
| `type` | enum(question, answer) | Jenis post |
| `parent_id` | FK → posts NULL | Referensi jawaban ke pertanyaan |
| `is_verified` | boolean | Diverifikasi tutor/admin |
| `is_best_answer` | boolean | Ditandai best answer |
| `created_at`, `updated_at` | timestamp | — |

#### `exam_uploads`
| Kolom | Tipe | Keterangan |
|---|---|---|
| `id` | bigint PK | — |
| `user_id` | FK → users | Pengunggah |
| `category_id` | FK → categories | Kategori soal |
| `file_url` | varchar NULL | URL file di Cloudinary |
| `cloudinary_public_id` | varchar NULL | ID untuk penghapusan file |
| `extracted_text` | text NULL | Teks hasil ekstraksi |
| `status` | varchar DEFAULT 'pending' | Status: pending/valid/invalid |
| `validation_notes` | text NULL | Catatan validasi tutor |
| `original_filename` | varchar NULL | Nama file asli |

#### `mentoring_sessions`
| Kolom | Tipe | Keterangan |
|---|---|---|
| `id` | bigint PK | — |
| `tutor_id` | FK → users | Tutor pengajar |
| `student_id` | FK → users | Pelajar peserta |
| `status` | enum(pending, confirmed, completed, cancelled) | Status sesi |
| `scheduled_at` | datetime | Waktu sesi dijadwalkan |
| `subject` | varchar NULL | Topik/mata pelajaran |
| `notes` | text NULL | Catatan tambahan |
| `files` | JSON NULL | Daftar file yang dilampirkan |
| `agenda_checklist` | JSON NULL | Checklist agenda sesi |
| `feedback` | text NULL | Feedback dari tutor setelah sesi |
| `student_rating` | int NULL | Rating dari pelajar (1-5) |

#### `quiz_sets`
| Kolom | Tipe | Keterangan |
|---|---|---|
| `id` | bigint PK | — |
| `category_id` | FK → categories | Kategori kuis |
| `title` | varchar(255) | Judul set kuis |

#### `quiz_questions`
| Kolom | Tipe | Keterangan |
|---|---|---|
| `id` | bigint PK | — |
| `quiz_set_id` | FK → quiz_sets | Milik set kuis mana |
| `question` | text | Teks soal |
| `options` | JSON | Pilihan jawaban (array) |
| `correct_answer` | varchar | Kunci jawaban |

#### `quiz_attempts`
| Kolom | Tipe | Keterangan |
|---|---|---|
| `id` | bigint PK | — |
| `quiz_set_id` | FK → quiz_sets | Set kuis yang dikerjakan |
| `user_id` | FK → users | Pelajar |
| `score` | int | Nilai akhir |
| `answers` | JSON | Jawaban pelajar |

#### `reports`
| Kolom | Tipe | Keterangan |
|---|---|---|
| `id` | bigint PK | — |
| `reporter_id` | FK → users | Pelapor |
| `reported_id` | bigint | ID entitas yang dilaporkan |
| `reported_type` | varchar | Tipe: 'post' atau 'user' |
| `reason` | text | Alasan pelaporan |
| `status` | varchar DEFAULT 'pending' | Status: pending/resolved |

#### `tutor_profiles`
| Kolom | Tipe | Keterangan |
|---|---|---|
| `id` | bigint PK | — |
| `user_id` | FK → users | Tutor |
| `bio` | text NULL | Deskripsi tutor |
| `rating` | decimal(3,2) DEFAULT 0 | Rating rata-rata |
| `total_reviews` | int DEFAULT 0 | Jumlah ulasan |

#### `ai_summaries`
| Kolom | Tipe | Keterangan |
|---|---|---|
| `id` | bigint PK | — |
| `category_id` | FK → categories | Kategori yang dianalisis |
| `summary` | JSON | Hasil analisis AI (di-cache) |
| `created_at`, `updated_at` | timestamp | — |

### 4.2 Tabel Pendukung

| Tabel | Deskripsi |
|---|---|
| `categories` | Kategori konten (Forum, Materi, Kuis, Exam) |
| `materials` | File materi belajar |
| `votes` | Vote pengguna pada post |
| `badges` | Definisi badge sistem |
| `user_badges` | Pivot: badge yang dimiliki user |
| `tutor_reviews` | Ulasan pelajar terhadap tutor |
| `tutor_schedules` | Jadwal ketersediaan tutor |
| `testimonials` | Testimoni pengguna (ditampilkan di landing) |
| `notifications` | Notifikasi in-app |

---

## 5. Hubungan Antar Entitas (Ringkasan)

```
users ──────────────── posts (1:N, sebagai penulis)
users ──────────────── mentoring_sessions (1:N, sebagai tutor & student)
users ──────────────── exam_uploads (1:N)
users ──────────────── quiz_attempts (1:N)
users ──────────────── tutor_profiles (1:1)
users ──────────────── badges (M:N via user_badges)
users ──────────────── reports (1:N, sebagai reporter)

posts ──────────────── posts (self-referential: answer → question via parent_id)
posts ──────────────── votes (1:N)
posts ──────────────── categories (N:1)

quiz_sets ──────────── quiz_questions (1:N)
quiz_sets ──────────── quiz_attempts (1:N)
quiz_sets ──────────── categories (N:1)

exam_uploads ────────── categories (N:1)
ai_summaries ─────────── categories (1:1 cached)
```

---

## 6. Sistem Role & Permission

FokusIn menggunakan **Spatie Laravel Permission** yang di-sync dengan kolom `role` di tabel `users`. Setiap role memiliki akses:

| Endpoint Group | Pelajar | Tutor | Admin |
|---|:---:|:---:|:---:|
| Baca forum, materi, kuis | ✅ | ✅ | ✅ |
| Buat post forum | ✅ | ✅ | ✅ |
| Upload materi | ❌ | ✅ | ✅ |
| Upload arsip ujian | ❌ | ✅ | ✅ |
| Validasi arsip ujian | ❌ | ✅ | ✅ |
| Booking mentoring | ✅ | ❌ | ❌ |
| Kelola sesi mentoring | ❌ | ✅ | ✅ |
| Moderasi konten | ❌ | ❌ | ✅ |
| Kelola user | ❌ | ❌ | ✅ |
| Refresh AI summary | ❌ | ❌ | ✅ |
| Analytics platform | ❌ | Terbatas | ✅ |
