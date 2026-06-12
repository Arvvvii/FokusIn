# 🎯 FokusIn

**FokusIn** adalah platform edukasi digital berbasis web yang dirancang untuk membantu pelajar dan mahasiswa belajar lebih efektif melalui fitur forum tanya-jawab, analisis soal ujian berbasis AI, sesi mentoring online, materi belajar, dan kuis interaktif.

> 🏆 Proyek ini dikembangkan untuk keperluan lomba pengembangan aplikasi digital.

---

## 📋 Daftar Isi

- [Fitur Utama](#fitur-utama)
- [Tech Stack](#tech-stack)
- [Prasyarat](#prasyarat)
- [Cara Instalasi](#cara-instalasi)
- [Konfigurasi Environment Variables](#konfigurasi-environment-variables)
- [Cara Menjalankan](#cara-menjalankan)
- [Struktur Proyek](#struktur-proyek)
- [Role & Akses Pengguna](#role--akses-pengguna)
- [Tim Pengembang](#tim-pengembang)

---

## ✨ Fitur Utama

| Fitur | Deskripsi | Role |
|---|---|---|
| **Forum Tanya-Jawab** | Diskusi akademik dengan sistem vote, verifikasi jawaban, dan best answer | Semua |
| **AI Analyzer** | Upload soal ujian (PDF/DOCX), AI menganalisis pola soal dan memberikan rekomendasi belajar menggunakan Groq API (LLaMA3) | Pelajar |
| **Arsip Ujian** | Upload dan kelola arsip soal ujian per kategori (disimpan di Cloudinary) | Tutor, Admin |
| **Tutor Validation Workspace** | Tutor memvalidasi konten arsip ujian (valid/invalid) | Tutor |
| **Mentoring Online** | Booking sesi mentoring dengan tutor, manajemen jadwal, dan feedback | Pelajar, Tutor |
| **Materi Belajar** | Upload, kelola, dan akses materi pembelajaran per kategori | Semua |
| **Kuis Interaktif** | Kerjakan kuis berbasis pilihan ganda, lihat skor dan histori | Pelajar |
| **Leaderboard** | Papan peringkat pelajar berdasarkan reputasi dan aktivitas | Publik |
| **Sistem Badge** | Penghargaan otomatis untuk pencapaian pengguna | Semua |
| **Laporan & Moderasi** | Sistem pelaporan konten dan moderasi oleh admin | Admin |
| **Dashboard Analytics** | Statistik lengkap aktivitas platform untuk admin dan tutor | Admin, Tutor |

---

## 🛠️ Tech Stack

### Backend
| Teknologi | Versi | Kegunaan |
|---|---|---|
| **PHP** | `^8.2` | Bahasa pemrograman server |
| **Laravel** | `^12.0` | Framework backend utama |
| **Laravel Sanctum** | `^4.3` | Autentikasi API berbasis token |
| **Spatie Laravel Permission** | `^6.25` | Manajemen role & permission |
| **MySQL** | `8.x` | Database relasional utama |
| **Cloudinary** | `^3.0` | Cloud storage file (PDF) |
| **Smalot PDF Parser** | `^2.12` | Ekstraksi teks dari PDF |
| **Groq API (LLaMA3-8b)** | — | AI analisis pola soal ujian |

### Frontend
| Teknologi | Versi | Kegunaan |
|---|---|---|
| **Vue 3** | `^3.5.32` | Framework frontend utama |
| **Vite** | `^8.0.8` | Build tool & dev server |
| **Vue Router** | `^5.0.4` | Routing SPA |
| **Pinia** | `^3.0.4` | State management |
| **Axios** | `^1.16.1` | HTTP client |
| **Tailwind CSS** | `^4.3.0` | Utility-first CSS framework |

### Infrastruktur & Deployment
| Teknologi | Kegunaan |
|---|---|
| **Railway** | Deployment backend (Laravel) |
| **Cloudinary** | CDN & cloud storage untuk file PDF |
| **Laragon** | Environment development lokal (Windows) |

---

## 📦 Prasyarat

Pastikan sistem kamu sudah terinstall:

- **PHP** >= 8.2 + ekstensi: `pdo`, `pdo_mysql`, `zip`, `gd`, `curl`
- **Composer** >= 2.x
- **Node.js** >= 20.19.0 atau >= 22.12.0
- **npm** >= 10.x
- **MySQL** >= 8.x
- **Git**

---

## 🚀 Cara Instalasi

### 1. Clone Repositori

```bash
git clone https://github.com/[username]/FokusIn.git
cd FokusIn
```

### 2. Setup Backend (Laravel)

```bash
# Masuk ke direktori backend
cd backend

# Install dependency PHP
composer install

# Salin file environment
cp .env.example .env

# Generate application key
php artisan key:generate

# Buat database MySQL bernama 'fokus_in_db' lalu isi konfigurasi di .env
# Jalankan migrasi database
php artisan migrate

# (Opsional) Jalankan seeder jika tersedia
php artisan db:seed
```

### 3. Setup Frontend (Vue 3)

```bash
# Masuk ke direktori frontend
cd ../frontend

# Install dependency Node
npm install

# Salin file environment
cp .env.example .env
```

---

## 🔐 Konfigurasi Environment Variables

### Backend (`backend/.env`)

```env
# Informasi Aplikasi
APP_NAME=FokusIn
APP_ENV=local
APP_KEY=             # Generate dengan: php artisan key:generate
APP_DEBUG=true
APP_URL=http://localhost:8000

# Database MySQL
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=fokus_in_db
DB_USERNAME=root
DB_PASSWORD=

# CORS (sesuaikan dengan port frontend)
SANCTUM_STATEFUL_DOMAINS=localhost:5173
CORS_ALLOWED_ORIGINS=http://localhost:5173

# Cloudinary (File Storage)
CLOUDINARY_CLOUD_NAME=your_cloud_name
CLOUDINARY_API_KEY=your_api_key
CLOUDINARY_API_SECRET=your_api_secret

# Groq AI API (untuk fitur AI Analyzer)
GROQ_API_KEY=your_groq_api_key

# Queue & Cache
QUEUE_CONNECTION=database
CACHE_STORE=database
```

### Frontend (`frontend/.env`)

```env
# URL API Backend
VITE_API_URL=http://localhost:8000/api
VITE_API_BASE_URL=http://localhost:8000
```

---

## ▶️ Cara Menjalankan

### Development (Lokal)

**Terminal 1 — Backend:**
```bash
cd backend
php artisan serve
# Server berjalan di: http://localhost:8000
```

**Terminal 2 — Frontend:**
```bash
cd frontend
npm run dev
# Server berjalan di: http://localhost:5173
```

Atau gunakan script composer untuk menjalankan semua sekaligus:
```bash
cd backend
composer run dev
```

### Production Build (Frontend)
```bash
cd frontend
npm run build
# Output di folder: frontend/dist/
```

---

## 📂 Struktur Proyek

```
FokusIn/
├── backend/                    # Laravel 12 API
│   ├── app/
│   │   ├── Http/Controllers/   # 24 Controller API
│   │   ├── Models/             # 18 Eloquent Model
│   │   └── Services/           # Business logic (AI, Badge, Reputation)
│   ├── database/
│   │   ├── migrations/         # 28 file migrasi
│   │   └── seeders/
│   └── routes/
│       └── api.php             # Semua API routes
│
├── frontend/                   # Vue 3 SPA
│   └── src/
│       ├── components/         # Komponen reusable
│       ├── layouts/            # Layout per role (Admin, Tutor, Pelajar)
│       ├── pages/
│       │   ├── admin/          # 22 halaman admin
│       │   ├── pelajar/        # 17 halaman pelajar
│       │   ├── tutor/          # 16 halaman tutor
│       │   ├── auth/           # Login, Register
│       │   └── public/         # Landing page, About, FAQ
│       ├── router/             # Vue Router config
│       ├── services/           # 14 service (Axios wrappers)
│       └── stores/             # Pinia stores (auth, toast)
│
└── README.md
```

---

## 👥 Role & Akses Pengguna

| Role | Deskripsi | Jalur Registrasi |
|---|---|---|
| **Pelajar** | Pengguna umum, dapat mengakses semua fitur belajar | Register mandiri |
| **Tutor** | Pengajar yang dapat upload materi, validasi ujian, dan melayani mentoring | Register mandiri dengan role tutor |
| **Admin** | Pengelola platform, dapat melakukan moderasi dan manajemen penuh | Dibuat oleh Admin lain |

---

## 📄 Dokumentasi Lanjutan

| Dokumen | Deskripsi |
|---|---|
| [SYSTEM.md](./SYSTEM.md) | Alur sistem, flowchart, dan skema database |
| [ARCHITECTURE.md](./ARCHITECTURE.md) | Arsitektur teknis dan struktur folder |
| [API.md](./API.md) | Referensi lengkap semua endpoint API |
| [CODING_STANDARDS.md](./CODING_STANDARDS.md) | Standar penulisan kode |
| [UI_DESIGN.md](./UI_DESIGN.md) | Sistem desain dan komponen UI |
| [DECISIONS.md](./DECISIONS.md) | Architecture Decision Records (ADR) |
| [USER_GUIDE.md](./USER_GUIDE.md) | Panduan penggunaan aplikasi |

---

## 👨‍💻 Tim Pengembang

> Dikembangkan dengan ❤️ untuk keperluan kompetisi pengembangan aplikasi digital.