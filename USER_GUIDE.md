# 📖 USER_GUIDE.md — Panduan Penggunaan FokusIn

Selamat datang di **FokusIn** — platform belajar digital yang membantu kamu belajar lebih cerdas dan terstruktur. Dokumen ini adalah panduan lengkap untuk semua pengguna aplikasi.

---

## Daftar Isi

- [Memulai: Registrasi & Login](#1-memulai-registrasi--login)
- [Panduan Pelajar](#2-panduan-pelajar)
  - [Dashboard](#21-dashboard-pelajar)
  - [Forum Tanya-Jawab](#22-forum-tanya-jawab)
  - [AI Analyzer](#23-ai-analyzer-analisis-soal-ujian)
  - [Mentoring](#24-sesi-mentoring)
  - [Materi Belajar](#25-materi-belajar)
  - [Kuis](#26-kuis-interaktif)
- [Panduan Tutor](#3-panduan-tutor)
  - [Dashboard Tutor](#31-dashboard-tutor)
  - [Upload & Validasi Arsip Ujian](#32-upload--validasi-arsip-ujian)
  - [Manajemen Mentoring](#33-manajemen-mentoring)
  - [Verifikasi Forum](#34-verifikasi-jawaban-di-forum)
- [Panduan Admin](#4-panduan-admin)
  - [Dashboard Admin](#41-dashboard-admin)
  - [Manajemen Pengguna](#42-manajemen-pengguna)
  - [Moderasi Konten](#43-moderasi-konten)
  - [Manajemen Kuis](#44-manajemen-kuis)
- [Fitur Umum](#5-fitur-umum)
  - [Notifikasi](#51-notifikasi)
  - [Profil Pengguna](#52-profil-pengguna)
  - [Leaderboard](#53-leaderboard)
- [Pertanyaan Umum (FAQ)](#6-pertanyaan-umum-faq)

---

## 1. Memulai: Registrasi & Login

### Cara Mendaftar Akun Baru

1. Buka aplikasi FokusIn di browser
2. Klik tombol **"Daftar Sekarang"** di halaman landing, atau navigasi ke `/auth/register`
3. Isi formulir pendaftaran:
   - **Nama Lengkap** — Nama yang akan ditampilkan ke pengguna lain
   - **Email** — Email aktif yang belum terdaftar
   - **Password** — Minimal 8 karakter
   - **Konfirmasi Password** — Ulangi password yang sama
   - **Daftar Sebagai** — Pilih **Pelajar** atau **Tutor**

   > ⚠️ **Penting:** Role tidak dapat diubah setelah pendaftaran. Pilih dengan hati-hati.

4. Klik **"Daftar"**
5. Kamu akan otomatis login dan diarahkan ke dashboard sesuai role

### Cara Login

1. Buka `/auth/login`
2. Masukkan **Email** dan **Password** yang sudah terdaftar
3. Klik **"Masuk"**
4. Kamu akan diarahkan ke dashboard:
   - `/pelajar/dashboard` untuk pelajar
   - `/tutor/dashboard` untuk tutor
   - `/admin/dashboard` untuk admin

### Lupa Password

Jika lupa password, klik **"Lupa Password?"** di halaman login dan ikuti instruksi yang diberikan.

### Logout

Klik foto profil / nama pengguna di pojok kanan atas, lalu klik **"Keluar"**.

---

## 2. Panduan Pelajar

### 2.1 Dashboard Pelajar

Dashboard adalah pusat informasi aktivitas belajarmu. Di sini kamu bisa melihat:

- **Statistik Aktivitas:** Total post di forum, sesi mentoring, dan kuis yang dikerjakan
- **AI Insights:** Rekomendasi belajar berdasarkan analisis pola soal
- **Aktivitas Terbaru:** Post dan sesi mentoring terbaru
- **Progress Badge:** Badge yang sudah diraih dan target badge berikutnya

**Cara menggunakan dashboard:**
1. Setelah login, kamu otomatis diarahkan ke dashboard
2. Klik kartu statistik untuk melihat detail fitur terkait
3. Klik "Lihat Semua" untuk melihat riwayat lengkap

---

### 2.2 Forum Tanya-Jawab

Forum adalah tempat kamu bertanya dan berdiskusi dengan sesama pelajar dan tutor.

#### Melihat Daftar Pertanyaan

1. Klik **"Forum"** di menu sidebar
2. Semua pertanyaan ditampilkan dari yang terbaru
3. Gunakan filter **Kategori** untuk menyaring topik tertentu (Matematika, Fisika, dll.)

#### Membuat Pertanyaan Baru

1. Di halaman Forum, klik tombol **"+ Buat Pertanyaan"**
2. Isi form:
   - **Judul** — Buat judul yang jelas dan spesifik (contoh: "Cara menghitung limit tak tentu dengan L'Hopital")
   - **Kategori** — Pilih kategori yang paling sesuai
   - **Deskripsi** — Jelaskan masalahmu secara detail. Sertakan apa yang sudah kamu coba.
3. Klik **"Publikasikan"**

#### Menjawab Pertanyaan

1. Klik judul pertanyaan yang ingin dijawab
2. Scroll ke bawah hingga bagian "Tulis Jawaban"
3. Ketik jawabanmu di kolom teks
4. Klik **"Kirim Jawaban"**

#### Voting & Best Answer

- **Vote Up:** Klik ikon 👍 pada post/jawaban yang membantu
- **Best Answer:** Jika kamu adalah penanya, kamu bisa menandai satu jawaban sebagai "Jawaban Terbaik" dengan klik ikon ⭐

#### Melaporkan Konten

Jika menemukan konten yang tidak pantas:
1. Klik tombol **"Laporkan"** (ikon bendera) pada post tersebut
2. Tulis alasan pelaporan
3. Klik **"Kirim Laporan"**

---

### 2.3 AI Analyzer: Analisis Soal Ujian

Fitur unggulan FokusIn — upload soal ujian lama dan dapatkan analisis pola soal berbasis AI!

#### Cara Menggunakan AI Analyzer

**Langkah 1: Buka AI Analyzer**
1. Klik **"AI Analyzer"** di menu sidebar
2. Klik tombol **"+ Analisis Baru"**

**Langkah 2: Upload File Soal**
1. Klik area upload atau drag & drop file
2. Format yang didukung: **PDF**, **DOC**, **DOCX**
3. Ukuran maksimal: **10 MB**
4. Tunggu proses upload selesai

**Langkah 3: Lihat Hasil Analisis**

AI akan menganalisis dan menampilkan:

| Bagian | Deskripsi |
|---|---|
| **Frekuensi Topik** | Grafik persentase topik yang paling sering muncul di soal |
| **Tingkat Kesulitan** | Kategori: Mudah / Sedang / Sulit |
| **Rekomendasi Belajar** | 3-5 saran konkret untuk fokus belajar |
| **Kata Kunci** | Konsep/istilah penting yang perlu dikuasai |

**Contoh Hasil Analisis:**
```
📊 Frekuensi Topik:
  • Kalkulus (40%) ─────────────────
  • Aljabar Linear (35%) ────────────
  • Statistika (25%) ───────────

⚡ Tingkat Kesulitan: Sedang

📚 Rekomendasi Belajar:
  1. Perbanyak latihan soal integral substitusi
  2. Review kembali konsep determinan matriks
  3. Latih soal distribusi normal

🔑 Kata Kunci: integral, turunan, matriks, distribusi
```

> 💡 **Tips:** Untuk hasil terbaik, gunakan file PDF yang berisi teks (bukan hasil scan). File scan mungkin gagal diekstrak.

---

### 2.4 Sesi Mentoring

Booking sesi belajar langsung dengan tutor berpengalaman.

#### Mencari Tutor

1. Klik **"Mentoring"** di menu sidebar
2. Lihat daftar tutor yang tersedia beserta:
   - Rating bintang
   - Keahlian/spesialisasi
   - Total sesi yang telah diselesaikan
3. Klik nama tutor untuk melihat profil lengkap

#### Booking Sesi Mentoring

1. Di profil tutor, klik **"Booking Sesi"**
2. Isi form booking:
   - **Topik/Mata Pelajaran** — Apa yang ingin kamu pelajari
   - **Waktu** — Pilih tanggal dan jam yang tersedia
   - **Catatan** — Jelaskan kebutuhan spesifik (opsional)
3. Klik **"Konfirmasi Booking"**
4. Status sesi: **Pending** (menunggu konfirmasi tutor)

#### Memantau Status Sesi

Di halaman Mentoring, kamu dapat melihat status sesi:
- 🟡 **Pending** — Menunggu konfirmasi dari tutor
- 🟢 **Confirmed** — Tutor sudah mengkonfirmasi, sesi akan berlangsung
- 🔵 **Completed** — Sesi selesai
- 🔴 **Cancelled** — Sesi dibatalkan

---

### 2.5 Materi Belajar

Akses koleksi materi belajar yang diupload oleh tutor dan admin.

#### Menjelajahi Materi

1. Klik **"Materi"** di sidebar
2. Browse berdasarkan kategori atau cari dengan keyword
3. Klik judul materi untuk membuka detail

#### Membaca Materi

Di halaman detail materi:
- Baca konten materi langsung di browser
- Jika berupa file, klik tombol **"Unduh"** atau **"Lihat File"**

---

### 2.6 Kuis Interaktif

Uji pemahamanmu dengan kuis pilihan ganda.

#### Mengerjakan Kuis

1. Klik **"Kuis"** di sidebar
2. Pilih set kuis yang ingin dikerjakan
3. Klik **"Mulai Kuis"**
4. Jawab setiap pertanyaan dengan klik salah satu pilihan
5. Navigasi antar soal dengan tombol **"Soal Sebelumnya"** / **"Soal Berikutnya"**
6. Setelah semua soal dijawab, klik **"Submit"**

#### Melihat Hasil Kuis

Setelah submit, kamu akan melihat:
- **Skor akhir** (persentase benar)
- **Detail per soal:** jawaban kamu vs jawaban benar
- **Rekomendasi:** Area yang perlu diperbaiki

> 💡 **Tips:** Kerjakan kuis beberapa kali untuk melacak perkembangan belajarmu!

---

## 3. Panduan Tutor

### 3.1 Dashboard Tutor

Dashboard tutor menampilkan:
- **Statistik Sesi:** Total sesi pending, confirmed, dan completed
- **Rating Rata-rata:** Penilaian dari pelajar
- **Aktivitas Terbaru:** Sesi dan permintaan terbaru
- **Analytics Timeline:** Grafik aktivitas mentoring dari waktu ke waktu

---

### 3.2 Upload & Validasi Arsip Ujian

Sebagai tutor, kamu bisa menambah koleksi arsip soal ujian untuk dianalisis AI.

#### Upload Arsip Ujian

1. Klik **"Upload Ujian"** di sidebar
2. Klik area upload atau drag & drop file PDF
3. Pilih **Kategori** yang sesuai
4. Klik **"Upload"**
5. File akan diunggah ke sistem dan siap divalidasi

#### Validasi Arsip Ujian

Setiap arsip yang diupload perlu divalidasi untuk memastikan kualitas konten.

1. Klik **"AI Validation"** di sidebar
2. Kamu akan melihat daftar arsip dengan status **Pending**
3. Klik arsip yang ingin divalidasi
4. Di halaman detail:
   - Review konten dokumen
   - Baca teks yang sudah diekstrak
   - Periksa apakah soal sesuai standar akademik
5. Pilih keputusan:
   - ✅ **"Tandai Valid"** — Konten sesuai, arsip dapat digunakan untuk analisis AI
   - ❌ **"Tandai Invalid"** — Konten tidak sesuai, tulis alasan penolakan
6. Klik **"Simpan Keputusan"**

**Status Validasi:**
| Status | Arti |
|---|---|
| 🟡 Pending | Belum divalidasi |
| ✅ Valid | Konten telah diverifikasi dan siap digunakan |
| ❌ Invalid | Konten tidak memenuhi standar, tidak akan digunakan AI |

---

### 3.3 Manajemen Mentoring

#### Melihat Permintaan Sesi

1. Klik **"Mentoring"** di sidebar
2. Tab **"Permintaan Baru"** menampilkan booking dari pelajar yang statusnya Pending

#### Konfirmasi atau Tolak Sesi

1. Klik sesi yang ingin diproses
2. Baca detail: topik, jadwal, dan catatan dari pelajar
3. Klik:
   - **"Konfirmasi Sesi"** — Sesi dikonfirmasi, pelajar mendapat notifikasi
   - **"Tolak"** — Sesi dibatalkan, tulis alasan (opsional)

#### Mengisi Feedback Pasca-Sesi

Setelah sesi selesai, isi feedback untuk melengkapi rekam jejak:
1. Di daftar sesi, temukan sesi yang statusnya "Completed"
2. Klik **"Isi Feedback"**
3. Tulis catatan tentang perkembangan pelajar
4. Klik **"Simpan Feedback"**

#### Mengatur Jadwal Ketersediaan

1. Klik **"Jadwal"** di sidebar
2. Tandai hari dan jam kamu tersedia untuk sesi mentoring
3. Klik **"Simpan Jadwal"**

---

### 3.4 Verifikasi Jawaban di Forum

Sebagai tutor, kamu dapat memverifikasi jawaban di forum agar pelajar tahu mana jawaban yang bisa dipercaya.

1. Klik **"Verifikasi Jawaban"** di sidebar
2. Kamu akan melihat daftar pertanyaan yang sudah memiliki jawaban
3. Klik pertanyaan untuk membaca diskusi
4. Pada jawaban yang benar dan berkualitas, klik **"Verifikasi"** (ikon centang)
5. Jawaban yang terverifikasi akan memiliki label **"Diverifikasi Tutor"** ✓

---

## 4. Panduan Admin

### 4.1 Dashboard Admin

Dashboard admin memberikan overview lengkap platform:

- **Statistik Utama:** Total pengguna, post, sesi mentoring aktif, dan kuis
- **Grafik Timeline:** Pertumbuhan aktivitas platform dari waktu ke waktu
- **Aktivitas Terbaru:** Log aktivitas pengguna
- **AI Usage:** Statistik penggunaan fitur AI Analyzer

---

### 4.2 Manajemen Pengguna

#### Melihat Semua Pengguna

1. Klik **"Pengguna"** di sidebar admin
2. Tabel menampilkan semua pengguna dengan kolom: Nama, Email, Role, Reputasi, Tanggal Daftar

#### Menambah Pengguna Baru

1. Klik **"+ Tambah Pengguna"**
2. Isi formulir: Nama, Email, Password, Role
3. Klik **"Simpan"**

> 💡 Admin adalah satu-satunya yang bisa membuat akun dengan role **Admin**.

#### Mengedit Pengguna

1. Klik ikon edit (✏️) pada baris pengguna
2. Ubah data yang diperlukan
3. Klik **"Update"**

#### Menghapus Pengguna

1. Klik ikon hapus (🗑️) pada baris pengguna
2. Konfirmasi penghapusan
3. Pengguna dan semua data terkait akan dihapus permanen

---

### 4.3 Moderasi Konten

#### Melihat Laporan Pengguna

1. Klik **"Laporan"** di sidebar
2. Daftar laporan menampilkan: Pelapor, Konten yang dilaporkan, Alasan, Status
3. Filter berdasarkan status: **Pending** atau **Resolved**

#### Memproses Laporan

1. Klik laporan untuk melihat detail
2. Baca alasan pelaporan dan review konten
3. Ambil tindakan:
   - **Hapus Konten:** Jika laporan valid, hapus post yang dilaporkan
   - **Tandai Selesai (Resolve):** Jika laporan tidak valid atau sudah ditangani
4. Klik **"Selesaikan Laporan"**

#### Moderasi Forum Langsung

1. Klik **"Moderasi"** di sidebar
2. Lihat semua post yang dilaporkan
3. Klik post untuk melihat detail
4. Klik **"Hapus Post"** jika konten melanggar aturan

---

### 4.4 Manajemen Kuis

#### Melihat Semua Kuis

1. Klik **"Quiz Monitoring"** di sidebar
2. Daftar semua set kuis dengan statistik attempt

#### Membuat Kuis Baru

1. Klik **"+ Buat Kuis"**
2. Isi:
   - **Judul Kuis**
   - **Kategori**
3. Tambahkan soal satu per satu:
   - Teks pertanyaan
   - 4 pilihan jawaban (A, B, C, D)
   - Tandai jawaban yang benar
4. Klik **"Simpan Kuis"**

#### Mengedit Kuis

1. Klik nama kuis → klik ikon edit
2. Ubah soal atau tambah soal baru
3. Klik **"Update"**

#### Menghapus Kuis

1. Klik ikon hapus pada kuis
2. Konfirmasi penghapusan
3. Semua attempt dari kuis ini juga akan terhapus

---

### 4.5 AI Monitoring

1. Klik **"AI Monitoring"** di sidebar
2. Lihat statistik penggunaan AI: jumlah analisis per kategori, response time, dll.
3. Untuk memperbarui analisis AI untuk kategori tertentu, klik **"Refresh AI Summary"** dan pilih kategori

---

## 5. Fitur Umum

### 5.1 Notifikasi

Notifikasi in-app memberitahumu tentang aktivitas penting:

| Notifikasi | Kapan Muncul |
|---|---|
| Sesi mentoring dikonfirmasi | Tutor mengkonfirmasi booking |
| Jawaban baru di pertanyaanmu | Ada yang menjawab pertanyaanmu |
| Jawaban diverifikasi | Jawabanmu mendapat verifikasi tutor |
| Badge baru | Kamu meraih badge pencapaian |

**Cara melihat notifikasi:**
1. Klik ikon 🔔 di topbar
2. Atau klik **"Notifikasi"** di menu sidebar

---

### 5.2 Profil Pengguna

#### Melihat Profil

1. Klik **"Profil"** di sidebar
2. Profil menampilkan: foto, nama, email, reputasi, badge yang dimiliki

#### Edit Profil

1. Klik **"Edit Profil"**
2. Ubah:
   - **Nama Lengkap**
   - **Bio / Deskripsi Diri**
   - **Foto Profil** (URL atau upload)
3. Klik **"Simpan Perubahan"**

---

### 5.3 Leaderboard

Leaderboard menampilkan pelajar paling aktif berdasarkan skor reputasi.

**Cara mendapatkan reputasi:**
- ✅ Membuat post di forum
- ✅ Mendapat vote pada jawabanmu
- ✅ Mengerjakan kuis
- ✅ Menyelesaikan sesi mentoring
- ✅ Jawabanmu ditandai sebagai best answer

**Melihat leaderboard:**
- Tersedia di halaman publik (tanpa login)
- Navigasi ke menu **"Leaderboard"** di landing page

---

## 6. Pertanyaan Umum (FAQ)

**Q: Apakah saya bisa mengubah role (dari pelajar ke tutor)?**  
A: Tidak. Role dipilih saat pertama kali mendaftar dan tidak bisa diubah. Jika ingin berganti role, hubungi admin untuk membuat akun baru.

---

**Q: Format file apa yang didukung di AI Analyzer?**  
A: PDF, DOC, dan DOCX. Ukuran maksimal 10 MB. Pastikan file adalah PDF berbasis teks (bukan hasil scan kamera).

---

**Q: Berapa lama proses analisis AI?**  
A: Biasanya 5-15 detik tergantung ukuran file dan koneksi internet. Jika gagal, coba lagi beberapa saat kemudian.

---

**Q: Apakah sesi mentoring dilakukan secara online atau offline?**  
A: Platform ini hanya memfasilitasi booking dan komunikasi. Tutor dan pelajar perlu menyepakati sendiri platform video call (Zoom, Google Meet, dll.) untuk pelaksanaan sesi.

---

**Q: Saya tidak bisa melihat tombol "Verifikasi" di forum. Kenapa?**  
A: Fitur verifikasi hanya tersedia untuk pengguna dengan role **Tutor** dan **Admin**.

---

**Q: Bagaimana cara mendapatkan badge?**  
A: Badge diberikan otomatis oleh sistem berdasarkan pencapaian tertentu, seperti membuat post pertama, mendapat 10 vote, atau menyelesaikan 5 sesi mentoring.

---

**Q: Bagaimana cara melaporkan bug atau masalah teknis?**  
A: Gunakan fitur **"Hubungi Kami"** di halaman Contact, atau kirim laporan ke email tim pengembang.

---

*Dokumen ini terakhir diperbarui: Juni 2026*  
*Versi Aplikasi: FokusIn v2.0*
