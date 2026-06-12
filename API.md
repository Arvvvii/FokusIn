# 📡 API.md — Dokumentasi API FokusIn

**Base URL:** `https://fokusin-production.up.railway.app/api`  
**Versi:** `2.0`  
**Format Response:** `application/json`  
**Autentikasi:** Bearer Token (Laravel Sanctum)

---

## Konvensi

### Request Headers

```
Content-Type: application/json
Authorization: Bearer {token}   ← Wajib untuk protected routes
```

### Format Response Sukses

```json
{
  "data": { ... }       // atau langsung objek/array
}
```

### Format Response Error

```json
{
  "message": "Deskripsi error",
  "errors": {           // Hanya ada saat validasi gagal
    "field": ["pesan error"]
  }
}
```

### Kode Status HTTP

| Kode | Arti |
|---|---|
| `200` | OK — Request berhasil |
| `201` | Created — Resource baru berhasil dibuat |
| `401` | Unauthorized — Token tidak valid atau tidak ada |
| `403` | Forbidden — Tidak punya hak akses |
| `404` | Not Found — Resource tidak ditemukan |
| `422` | Unprocessable Entity — Validasi gagal |
| `429` | Too Many Requests — Rate limit terlampaui |
| `500` | Internal Server Error — Kesalahan server |
| `503` | Service Unavailable — Layanan AI tidak tersedia |

---

## 🔓 Public Routes (Tanpa Autentikasi)

### Health Check

```
GET /api/
```

**Response `200`:**
```json
{
  "message": "FokusIn API Running",
  "version": "2.0"
}
```

---

### 🔐 Autentikasi

#### Register

```
POST /api/auth/register
```

**Request Body:**
```json
{
  "name": "Budi Santoso",
  "email": "budi@email.com",
  "password": "password123",
  "password_confirmation": "password123",
  "role": "pelajar"   // "pelajar" atau "tutor"
}
```

**Response `201`:**
```json
{
  "user": {
    "id": 1,
    "name": "Budi Santoso",
    "email": "budi@email.com",
    "role": "pelajar",
    "reputation_score": 0,
    "avatar_url": "https://ui-avatars.com/api/?name=Budi+Santoso"
  },
  "token": "1|abc123xyz..."
}
```

**Error `422`:**
```json
{
  "message": "The email has already been taken.",
  "errors": {
    "email": ["The email has already been taken."]
  }
}
```

---

#### Login

```
POST /api/auth/login
```

**Request Body:**
```json
{
  "email": "budi@email.com",
  "password": "password123"
}
```

**Response `200`:**
```json
{
  "user": {
    "id": 1,
    "name": "Budi Santoso",
    "role": "pelajar",
    "reputation_score": 150,
    "badges": [ ... ]
  },
  "token": "2|def456uvw..."
}
```

**Error `401`:**
```json
{
  "message": "Email atau password salah."
}
```

> ⚠️ Rate Limit: maks **10 request per menit** per IP.

---

#### Logout *(Protected)*

```
POST /api/auth/logout
Authorization: Bearer {token}
```

**Response `200`:**
```json
{
  "message": "Berhasil logout."
}
```

---

#### Get Current User *(Protected)*

```
GET /api/auth/me
Authorization: Bearer {token}
```

**Response `200`:**
```json
{
  "data": {
    "id": 1,
    "name": "Budi Santoso",
    "email": "budi@email.com",
    "role": "pelajar",
    "reputation_score": 150,
    "bio": "Mahasiswa teknik informatika.",
    "avatar_url": "https://...",
    "badges": [
      { "id": 1, "name": "Kontributor Pertama", "icon": "🏅" }
    ]
  }
}
```

---

### 📊 Global Statistics

```
GET /api/global-stats
```

**Response `200`:**
```json
{
  "total_users": 1250,
  "total_posts": 3400,
  "total_materials": 89,
  "total_tutors": 45
}
```

---

### 📚 Kategori

#### Daftar Semua Kategori

```
GET /api/categories
```

**Response `200`:**
```json
[
  {
    "id": 1,
    "name": "Matematika",
    "slug": "matematika",
    "posts_count": 150,
    "exam_uploads_count": 23
  }
]
```

---

### 📝 Forum / Posts

#### Daftar Post

```
GET /api/posts
```

**Query Params:**
| Param | Tipe | Deskripsi |
|---|---|---|
| `category_id` | integer | Filter berdasarkan kategori |
| `type` | string | `question` atau `answer` |
| `page` | integer | Halaman pagination |

**Response `200`:**
```json
{
  "data": [
    {
      "id": 1,
      "title": "Bagaimana cara menghitung integral?",
      "content": "Saya kesulitan dengan...",
      "type": "question",
      "is_verified": false,
      "is_best_answer": false,
      "user": { "id": 2, "name": "Andi", "role": "pelajar" },
      "category": { "id": 1, "name": "Matematika" },
      "votes_count": 5,
      "created_at": "2026-06-10T08:00:00.000000Z"
    }
  ],
  "meta": { "current_page": 1, "last_page": 10 }
}
```

---

#### Buat Post *(Protected)*

```
POST /api/posts
Authorization: Bearer {token}
```

**Request Body:**
```json
{
  "title": "Bagaimana cara kerja rekursi?",
  "content": "Saya ingin memahami konsep rekursi dalam pemrograman.",
  "category_id": 2,
  "type": "question",
  "parent_id": null
}
```

**Response `201`:** Objek post yang baru dibuat.

---

#### Vote Post *(Protected)*

```
POST /api/posts/{id}/vote
Authorization: Bearer {token}
```

**Response `200`:**
```json
{ "message": "Vote berhasil.", "votes_count": 6 }
```

---

#### Verifikasi Post *(Protected — Tutor/Admin)*

```
POST /api/posts/{id}/verify
Authorization: Bearer {token}
```

**Response `200`:**
```json
{ "message": "Post berhasil diverifikasi.", "is_verified": true }
```

---

#### Tandai Best Answer *(Protected)*

```
POST /api/posts/{id}/best-answer
Authorization: Bearer {token}
```

**Response `200`:**
```json
{ "message": "Jawaban terbaik berhasil ditandai." }
```

---

### 📖 Materi Belajar

#### Daftar Materi

```
GET /api/materials
```

**Query Params:** `category_id`, `page`

**Response `200`:** Daftar paginated materi dengan relasi `user` dan `category`.

---

#### Detail Materi

```
GET /api/materials/{id}
```

**Response `200`:** Objek materi lengkap.

---

#### Upload Materi *(Protected — Tutor/Admin)*

```
POST /api/materials
Authorization: Bearer {token}
Content-Type: multipart/form-data
```

**Request Body (FormData):**
| Field | Tipe | Deskripsi |
|---|---|---|
| `title` | string | Judul materi |
| `category_id` | integer | ID kategori |
| `file` | file | File materi |

---

#### Hapus Materi *(Protected)*

```
DELETE /api/materials/{id}
Authorization: Bearer {token}
```

**Response `200`:** `{ "message": "Materi berhasil dihapus." }`

---

### 🎯 Kuis

#### Daftar Kuis

```
GET /api/quizzes
```

**Response `200`:** Array quiz set dengan jumlah soal.

---

#### Detail Kuis + Soal

```
GET /api/quizzes/{id}
```

**Response `200`:**
```json
{
  "id": 1,
  "title": "Kuis Matematika Dasar",
  "category": { "id": 1, "name": "Matematika" },
  "questions": [
    {
      "id": 1,
      "question": "Berapa hasil dari 2 + 2?",
      "options": ["2", "3", "4", "5"]
    }
  ]
}
```

---

#### Submit Kuis *(Protected)*

```
POST /api/quizzes/{id}/attempt
Authorization: Bearer {token}
```

**Request Body:**
```json
{
  "answers": {
    "1": "4",
    "2": "Java",
    "3": "HTTP"
  }
}
```

**Response `201`:**
```json
{
  "score": 80,
  "total_questions": 5,
  "correct_answers": 4,
  "details": [
    { "question_id": 1, "is_correct": true }
  ]
}
```

---

### 🤖 AI Analyzer

#### Analisis File Ujian *(Protected)*

```
POST /api/ai/analyze
Authorization: Bearer {token}
Content-Type: multipart/form-data
```

**Request Body (FormData):**
| Field | Tipe | Keterangan |
|---|---|---|
| `file` | file | File PDF/DOC/DOCX, maks 10MB |

**Response `200`:**
```json
{
  "frekuensi_topik": [
    { "topik": "Kalkulus", "persentase": 40 },
    { "topik": "Aljabar", "persentase": 35 },
    { "topik": "Statistika", "persentase": 25 }
  ],
  "tingkat_kesulitan": "Sedang",
  "rekomendasi_belajar": [
    "Fokus latihan soal integral dan diferensial",
    "Pelajari lebih dalam materi matriks",
    "Latih soal-soal statistika deskriptif"
  ],
  "kata_kunci": ["integral", "turunan", "matriks", "distribusi normal"]
}
```

**Error `422`:**
```json
{ "message": "Gagal mengekstrak teks dari file atau file kosong." }
```

**Error `503`:**
```json
{ "message": "Layanan AI sedang tidak tersedia. Coba lagi nanti." }
```

---

#### Get AI Summary *(Protected)*

```
GET /api/ai-pattern/summary?category_id={id}
Authorization: Bearer {token}
```

**Response `200`:** Sama seperti response analyze (dari cache).

---

#### Refresh AI Summary *(Protected — Admin only)*

```
POST /api/ai-pattern/refresh
Authorization: Bearer {token}
```

**Request Body:** `{ "category_id": 1 }`

**Response `200`:**
```json
{
  "message": "Analisis AI berhasil diperbarui secara instan.",
  "data": { ... }
}
```

---

### 📁 Arsip Ujian (Exam Uploads)

#### Daftar Arsip Ujian *(Protected)*

```
GET /api/exam-uploads
Authorization: Bearer {token}
```

**Response `200`:** Paginated list dengan relasi user dan category.

---

#### Upload Arsip Ujian *(Protected — Tutor/Admin)*

```
POST /api/exam-uploads
Authorization: Bearer {token}
Content-Type: multipart/form-data
```

**Request Body (FormData):**
| Field | Tipe | Keterangan |
|---|---|---|
| `category_id` | integer | ID kategori |
| `file` | file | PDF, maks 10MB |
| `extracted_text` | string (optional) | Teks ekstraksi manual |

**Response `201`:** Objek exam upload lengkap.

**Error `403`:** User bukan tutor atau admin.

---

#### Hapus Arsip Ujian *(Protected)*

```
DELETE /api/exam-uploads/{id}
Authorization: Bearer {token}
```

**Response `200`:** `{ "message": "Dokumen berhasil dihapus dari sistem." }`

---

#### Update Extracted Text *(Protected)*

```
PUT /api/exam-uploads/{id}/extracted-text
Authorization: Bearer {token}
```

**Request Body:**
```json
{ "extracted_text": "Teks hasil OCR yang sudah diperbaiki..." }
```

**Response `200`:** `{ "message": "Hasil OCR berhasil diperbarui.", "exam_upload": { ... } }`

---

### 👨‍🏫 Mentoring

#### Daftar Tutor Aktif (Publik)

```
GET /api/tutors
```

**Response `200`:** Array tutor dengan profil dan rating.

---

#### Detail Tutor *(Protected)*

```
GET /api/tutors/{id}
Authorization: Bearer {token}
```

---

#### Booking Sesi Mentoring *(Protected)*

```
POST /api/mentoring/requests
Authorization: Bearer {token}
```

**Request Body:**
```json
{
  "tutor_id": 3,
  "subject": "Kalkulus Integral",
  "scheduled_at": "2026-06-20T10:00:00",
  "notes": "Saya butuh bantuan soal integral substitusi"
}
```

**Response `201`:** Objek session dengan status `pending`.

---

#### Daftar Sesi Mentoring *(Protected)*

```
GET /api/mentoring/sessions
Authorization: Bearer {token}
```

---

#### Update Status Sesi *(Protected)*

```
PATCH /api/mentoring/sessions/{id}/status
Authorization: Bearer {token}
```

**Request Body:**
```json
{ "status": "confirmed" }   // pending | confirmed | completed | cancelled
```

---

#### Submit Feedback Sesi *(Protected)*

```
POST /api/mentoring/sessions/{id}/feedback
Authorization: Bearer {token}
```

**Request Body:**
```json
{
  "feedback": "Sesi berjalan lancar, pelajar sangat antusias.",
  "student_rating": 5
}
```

---

### 📋 Laporan (Reports)

#### Buat Laporan *(Protected)*

```
POST /api/reports
Authorization: Bearer {token}
```

**Request Body:**
```json
{
  "reported_id": 15,
  "reported_type": "post",   // "post" atau "user"
  "reason": "Konten ini mengandung jawaban yang menyesatkan."
}
```

---

### 🏆 Leaderboard

```
GET /api/leaderboard
```

**Response `200`:**
```json
[
  {
    "rank": 1,
    "user": { "id": 5, "name": "Rina", "avatar_url": "..." },
    "reputation_score": 2500,
    "posts_count": 45
  }
]
```

---

## 🔒 Admin Routes (`/api/admin/*`)

> Semua route admin memerlukan `Authorization: Bearer {token}` dan role `admin`.

### Dashboard Admin

```
GET /api/admin/dashboard
```

**Response:** Statistik platform lengkap (total user, post, sesi mentoring, dll.)

---

### AI Monitoring

```
GET /api/admin/ai-monitoring
```

---

### Moderasi

```
GET  /api/admin/moderation                    # Daftar post yang dilaporkan
DELETE /api/admin/moderation/posts/{id}       # Hapus post
```

---

### Manajemen Reports

```
GET   /api/admin/reports                      # Semua laporan
PATCH /api/admin/reports/{id}/resolve         # Tandai laporan selesai
```

---

### Analytics

```
GET /api/admin/analytics/timeline             # Data timeline aktivitas
```

---

### Manajemen User

```
GET    /api/admin/users                       # Daftar semua user
POST   /api/admin/users                       # Buat user baru
PUT    /api/admin/users/{id}                  # Update user
DELETE /api/admin/users/{id}                  # Hapus user
```

**Request Body POST/PUT:**
```json
{
  "name": "Nama Baru",
  "email": "email@baru.com",
  "password": "passwordbaru",
  "role": "pelajar"
}
```

---

### Manajemen Tutor

```
GET  /api/admin/tutors                        # Daftar tutor
POST /api/admin/tutors                        # Tambah tutor baru
GET  /api/admin/tutors/{id}                   # Detail tutor
```

---

### Manajemen Mentoring

```
GET   /api/admin/mentoring                    # Semua sesi mentoring
GET   /api/admin/mentoring/{id}               # Detail sesi
PATCH /api/admin/mentoring/{id}/status        # Force update status
```

---

### Manajemen Kuis

```
GET    /api/admin/quizzes/{id}                # Detail kuis
POST   /api/admin/quizzes                     # Buat kuis baru
PUT    /api/admin/quizzes/{id}                # Update kuis
DELETE /api/admin/quizzes/{id}                # Hapus kuis
```

**Request Body POST/PUT (Buat/Update Kuis):**
```json
{
  "title": "Kuis Fisika Dasar",
  "category_id": 3,
  "questions": [
    {
      "question": "Apa satuan dari gaya?",
      "options": ["Joule", "Newton", "Watt", "Pascal"],
      "correct_answer": "Newton"
    }
  ]
}
```

---

### Manajemen Kategori

```
POST   /api/admin/categories                  # Buat kategori baru
PUT    /api/admin/categories/{id}             # Update kategori
DELETE /api/admin/categories/{id}             # Hapus kategori
```

**Request Body:**
```json
{
  "name": "Fisika",
  "slug": "fisika"
}
```
