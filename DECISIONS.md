# 🧠 DECISIONS.md — Architecture Decision Records (ADR)

Dokumen ini mencatat semua keputusan arsitektur signifikan yang dibuat selama pengembangan FokusIn, beserta alasan, trade-off, dan alternatif yang dipertimbangkan.

---

## Format ADR

Setiap keputusan dicatat dalam format:
- **Status:** Diterima / Ditolak / Deprecated
- **Konteks:** Situasi yang membutuhkan keputusan
- **Keputusan:** Pilihan yang diambil
- **Alasan:** Mengapa pilihan ini diambil
- **Trade-off / Konsekuensi:** Dampak positif dan negatif
- **Alternatif yang ditolak:** Opsi lain yang dipertimbangkan

---

## ADR-001: Memilih Laravel sebagai Backend Framework

**Status:** ✅ Diterima  
**Tanggal:** Mei 2026

### Konteks
Kami butuh backend framework PHP yang mendukung pengembangan cepat, memiliki ekosistem luas, dan cocok untuk REST API.

### Keputusan
Menggunakan **Laravel 12** sebagai backend framework utama.

### Alasan
- **Produktivitas tinggi:** Artisan CLI, Eloquent ORM, dan built-in authentication sangat mempercepat development
- **Ekosistem kaya:** Sanctum (auth), Spatie Permission (RBAC), Cloudinary SDK tersedia sebagai package resmi
- **Dokumentasi lengkap:** Komunitas besar dan dokumentasi excellent memudahkan onboarding developer baru
- **File handling:** Mudah diintegrasikan dengan Cloudinary dan mendukung berbagai format file
- **Queue & Background Jobs:** Siap digunakan untuk proses asinkron di masa depan

### Trade-off
| ➕ Keuntungan | ➖ Kekurangan |
|---|---|
| Sangat cepat untuk prototyping | Overhead lebih besar dibanding micro-framework |
| Eloquent ORM sangat intuitif | Membutuhkan PHP >= 8.2 |
| Built-in testing (PHPUnit) | Tidak native untuk real-time (WebSocket) |

### Alternatif yang Ditolak
- **Node.js + Express:** Lebih cepat untuk I/O, tapi tim lebih familiar dengan PHP
- **FastAPI (Python):** Bagus untuk AI, tapi harus split stack lebih jauh
- **NestJS:** Lebih modern, tapi learning curve lebih tinggi untuk tim

---

## ADR-002: Memilih Vue 3 sebagai Frontend Framework

**Status:** ✅ Diterima  
**Tanggal:** Mei 2026

### Konteks
Kami butuh frontend framework JavaScript modern yang mendukung SPA (Single Page Application) dengan state management dan routing yang handal.

### Keputusan
Menggunakan **Vue 3** dengan Composition API (`<script setup>`) sebagai frontend framework.

### Alasan
- **Composition API:** Memudahkan reuse logika antar komponen (dibanding Options API)
- **Pinia:** State management resmi Vue 3 yang lebih simpel dari Vuex
- **Vue Router 5:** Mendukung route guard berbasis role yang kami butuhkan
- **Ekosistem:** Vite + Vue devtools + @vitejs/plugin-vue berjalan sangat baik bersama
- **Tim:** Anggota tim sudah familiar dengan Vue

### Trade-off
| ➕ Keuntungan | ➖ Kekurangan |
|---|---|
| DX (Developer Experience) sangat baik dengan Vite | Ekosistem UI component library lebih kecil dari React |
| `<script setup>` sangat clean | Server-Side Rendering lebih kompleks (butuh Nuxt) |
| Pinia sangat ringan dan intuitif | Tidak se-mainstream React di pasar kerja |

### Alternatif yang Ditolak
- **React + Next.js:** SSR built-in lebih baik, tapi learning curve lebih tinggi & kompleksitas lebih besar
- **Nuxt 3:** Dipertimbangkan untuk SSR, tapi overkill untuk kebutuhan lomba
- **Vanilla JS:** Tidak memadai untuk kompleksitas SPA multi-role

---

## ADR-003: Memilih Groq API (LLaMA3) untuk Fitur AI

**Status:** ✅ Diterima  
**Tanggal:** Mei 2026

### Konteks
Fitur inti FokusIn adalah analisis pola soal ujian menggunakan AI. Kami butuh LLM API yang cepat, akurat, dan terjangkau (idealnya gratis untuk prototype).

### Keputusan
Menggunakan **Groq API** dengan model **`llama3-8b-8192`** untuk analisis teks soal ujian.

### Alasan
- **Gratis untuk development:** Groq menawarkan free tier yang cukup untuk prototype dan demonstrasi lomba
- **Sangat cepat:** Groq menggunakan LPU (Language Processing Unit) sehingga inference speed-nya jauh lebih cepat dari GPU biasa
- **OpenAI-compatible API:** Format request/response sama dengan OpenAI API sehingga mudah di-migrate
- **JSON mode:** Mendukung `response_format: { type: 'json_object' }` sehingga response terstruktur dan mudah diparsing
- **LLaMA3-8b cukup:** Untuk analisis pola soal yang terstruktur, model 8B parameters sudah sangat memadai

### Konfigurasi yang Digunakan
```php
// Dari AIPatternController.php
'model' => 'llama3-8b-8192',
'temperature' => 0.2,           // Rendah untuk respons konsisten
'response_format' => ['type' => 'json_object']
```

### Trade-off
| ➕ Keuntungan | ➖ Kekurangan |
|---|---|
| Gratis & sangat cepat | Rate limit di free tier |
| JSON mode terjamin | Model lebih lemah dari GPT-4 untuk analisis kompleks |
| OpenAI-compatible | Bergantung pada layanan pihak ketiga |

### Alternatif yang Ditolak
- **OpenAI GPT-4:** Lebih powerful, tapi berbayar dan terlalu mahal untuk lomba
- **Gemini API:** Tersedia gratis, namun format response lebih kompleks dikonfigurasi
- **Ollama (local LLM):** Bebas dari API dependency, tapi butuh server dengan GPU yang tidak kami miliki

---

## ADR-004: Memilih Cloudinary untuk File Storage

**Status:** ✅ Diterima  
**Tanggal:** Mei 2026

### Konteks
Aplikasi butuh penyimpanan file PDF yang aman, dapat diakses via URL publik, dan mudah dihapus saat diperlukan.

### Keputusan
Menggunakan **Cloudinary** sebagai cloud storage untuk file arsip ujian (PDF).

### Alasan
- **Free tier cukup:** 25 GB storage dan 25 GB bandwidth gratis per bulan
- **Secure URL:** Setiap file mendapat HTTPS URL yang langsung bisa digunakan
- **PHP SDK resmi:** `cloudinary-labs/cloudinary-laravel` terintegrasi mulus dengan Laravel
- **Manajemen mudah:** `public_id` memudahkan penghapusan file dari storage saat data di-delete
- **CDN global:** File diakses cepat dari mana saja

### Trade-off
| ➕ Keuntungan | ➖ Kekurangan |
|---|---|
| Tanpa konfigurasi server storage | Bergantung layanan eksternal |
| CDN otomatis | Batasan free tier |
| URL publik langsung | Privacy: file PDF bisa diakses siapapun yang punya URL |

### Alternatif yang Ditolak
- **Laravel local storage:** Tidak cocok untuk deployment di Railway (ephemeral filesystem)
- **AWS S3:** Terlalu kompleks dan berbayar untuk kebutuhan lomba
- **Firebase Storage:** Bisa, tapi tim belum familiar dengan ekosistem Firebase

---

## ADR-005: Memilih Laravel Sanctum untuk Autentikasi API

**Status:** ✅ Diterima  
**Tanggal:** Mei 2026

### Konteks
Aplikasi SPA membutuhkan mekanisme autentikasi yang aman antara frontend Vue dan backend Laravel.

### Keputusan
Menggunakan **Laravel Sanctum** dengan **Bearer Token** yang disimpan di `localStorage`.

### Alasan
- **Simpel untuk SPA:** Sanctum dirancang khusus untuk SPA dan mobile app
- **Token-based:** Bearer token ideal untuk API stateless yang dikonsumsi frontend terpisah
- **Built-in Laravel:** Tidak perlu package eksternal tambahan yang kompleks
- **Token invalidation:** Mudah me-revoke token (`$user->tokens()->delete()`)

### Strategi Penyimpanan Token
```javascript
// Disimpan di localStorage dengan key spesifik
localStorage.setItem('fokusin_token', token)
localStorage.setItem('fokusin_user', JSON.stringify(user))
```

### Trade-off
| ➕ Keuntungan | ➖ Kekurangan |
|---|---|
| Simple setup | localStorage rentan XSS (dibanding HttpOnly cookie) |
| Stateless API | Token tidak auto-expire (butuh manual invalidation) |
| Mudah digunakan di Axios | — |

### Mitigasi Risiko
- Token lama selalu dihapus saat login baru (`$user->tokens()->delete()`)
- Axios response interceptor menangani token expired (401 → redirect login)

### Alternatif yang Ditolak
- **JWT (tymon/jwt-auth):** Lebih kompleks, Sanctum sudah cukup untuk kebutuhan ini
- **Cookie-based (session):** Lebih aman tapi memerlukan konfigurasi CORS cookie yang lebih kompleks untuk SPA terpisah domain

---

## ADR-006: Memilih Spatie Laravel Permission untuk RBAC

**Status:** ✅ Diterima  
**Tanggal:** Mei 2026

### Konteks
Aplikasi memiliki 3 role utama (pelajar, tutor, admin) dengan hak akses yang berbeda. Butuh sistem RBAC yang fleksibel.

### Keputusan
Menggunakan **Spatie Laravel Permission** yang di-sync dengan kolom `role` di tabel `users`.

### Alasan
- **Industry standard:** Package paling populer untuk RBAC di ekosistem Laravel
- **Fleksibel:** Mendukung role, permission, dan kombinasi keduanya
- **Mudah digunakan:** `$user->assignRole('pelajar')`, `$user->hasRole('admin')`
- **Integrasi mudah:** Bekerja bersama Eloquent dan Middleware bawaan Laravel

### Implementasi Aktual
```php
// Di AuthController.php — Assign role saat register
$user->assignRole($validated['role']);

// Di controller — Cek akses manual
if (!in_array(auth()->user()->role, ['admin', 'tutor'])) {
    return response()->json(['message' => 'Unauthorized'], 403);
}
```

### Trade-off
| ➕ Keuntungan | ➖ Kekurangan |
|---|---|
| Sangat mudah digunakan | Menambah beberapa tabel di database |
| Dokumentasi excellent | Cache perlu di-flush saat role berubah |
| Bisa sync dengan kolom `role` | Overhead sedikit saat check permission |

---

## ADR-007: Memilih SQLite (Dev) + MySQL (Prod)

**Status:** ✅ Diterima  
**Tanggal:** Mei 2026

### Konteks
Butuh database yang mudah di-setup untuk development dan handal untuk produksi.

### Keputusan
- **Development:** SQLite (file-based, tanpa setup server)
- **Produksi:** MySQL 8.x (di Railway)

### Alasan
- **SQLite untuk dev:** Zero configuration — langsung jalan tanpa install server MySQL
- **MySQL untuk prod:** Lebih handal, mendukung concurrent connections, dan Railway menyediakan MySQL plugin

### Konfigurasi
```php
// .env.example (default dev)
DB_CONNECTION=sqlite

// .env produksi
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_DATABASE=fokus_in_db
```

### Trade-off
| ➕ Keuntungan | ➖ Kekurangan |
|---|---|
| Dev environment sangat mudah | Potensi perbedaan perilaku SQL antara SQLite & MySQL |
| Migration compatible di kedua DB | Beberapa fitur MySQL tidak tersedia di SQLite |

---

## ADR-008: Arsitektur Decoupled (Terpisah Frontend-Backend)

**Status:** ✅ Diterima  
**Tanggal:** Mei 2026

### Konteks
Kami memilih antara: (A) Laravel Monolith dengan Blade templates, atau (B) Frontend terpisah sebagai SPA.

### Keputusan
Memilih arsitektur **decoupled** — backend Laravel pure API + frontend Vue 3 SPA sebagai aplikasi terpisah.

### Alasan
- **Separation of concerns:** Frontend dan backend dapat dikembangkan secara paralel oleh developer berbeda
- **Fleksibilitas deployment:** Frontend dan backend bisa di-deploy ke platform berbeda
- **Pengalaman belajar:** Mengimplementasikan real-world pattern yang digunakan industri
- **Modern UX:** SPA memberikan transisi halaman yang instan tanpa full page reload

### Trade-off
| ➕ Keuntungan | ➖ Kekurangan |
|---|---|
| Development lebih paralel | CORS configuration wajib |
| Frontend lebih interaktif | SEO lebih sulit (SPA tidak SSR) |
| Bisa scale frontend & backend terpisah | Dua codebase yang harus di-maintain |
| Mudah ganti stack frontend di masa depan | Token management lebih kompleks |

### Alternatif yang Ditolak
- **Laravel Blade (Full Monolith):** Lebih simpel tapi pengalaman pengguna (UX) inferior, tidak ada SPA feel
- **Nuxt 3 + Laravel API:** SSR lebih baik tapi kompleksitas lebih tinggi untuk waktu lomba yang terbatas

---

## ADR-009: Strategi Caching AI Summary

**Status:** ✅ Diterima  
**Tanggal:** Juni 2026

### Konteks
Groq API memiliki rate limit dan latency. Memanggil AI setiap kali user request tidak efisien.

### Keputusan
Meng-cache hasil analisis AI ke tabel `ai_summaries` di database, dengan **invalidasi otomatis** saat ada upload baru ke kategori yang sama.

### Implementasi
```php
// AIPatternService.php (konsep)
// 1. Cek cache di tabel ai_summaries
$cached = AiSummary::where('category_id', $categoryId)->first();
if ($cached) return $cached->summary;

// 2. Jika tidak ada cache, panggil Groq API
$result = $this->callGroqAPI($texts);

// 3. Simpan ke cache
AiSummary::create(['category_id' => $categoryId, 'summary' => $result]);

// ExamUploadController.php — Invalidasi cache saat upload baru
AiSummary::where('category_id', $request->category_id)->delete();
```

### Trade-off
| ➕ Keuntungan | ➖ Kekurangan |
|---|---|
| Hemat API calls ke Groq | Summary mungkin stale sebentar |
| Response lebih cepat | Butuh tabel tambahan di database |
| Admin bisa force-refresh | — |

---

## ADR-010: Memilih Railway untuk Deployment Backend

**Status:** ✅ Diterima  
**Tanggal:** Juni 2026

### Konteks
Butuh platform hosting untuk backend Laravel yang mudah, cepat, dan terjangkau untuk demonstrasi lomba.

### Keputusan
Menggunakan **Railway.app** untuk deployment backend Laravel + MySQL database.

### Alasan
- **Free tier cukup:** Railway menawarkan trial credits yang cukup untuk demonstrasi
- **Zero DevOps:** Push ke GitHub → otomatis build & deploy
- **MySQL plugin:** Database MySQL tersedia langsung tanpa konfigurasi eksternal
- **Environment variables:** Mudah set semua env vars langsung dari dashboard Railway
- **URL publik otomatis:** Dapat URL HTTPS langsung tanpa setup Nginx/Apache

**URL Produksi:** `https://fokusin-production.up.railway.app`

### Alternatif yang Ditolak
- **VPS (DigitalOcean/Vultr):** Lebih kontrol, tapi butuh DevOps setup yang memakan waktu
- **Heroku:** Pernah populer tapi sudah tidak ada free tier
- **Shared Hosting:** Tidak mendukung Laravel 12 dengan baik (butuh PHP 8.2+)
- **Firebase Hosting:** Tidak mendukung PHP backend
