<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class CategorySeeder extends Seeder
{
    /**
     * Seed kurikulum lengkap 3 program studi Vokasi UNAIR (D4):
     * - Teknik Informatika
     * - Teknologi Rekayasa Instrumentasi dan Kontrol (TRIK)
     * - Kearsipan dan Informasi Digital (KID)
     * Masing-masing 6 semester (sesuai permintaan sistem FokusIn).
     */
    public function run(): void
    {
        // ====================================================================
        // 1. TEKNIK INFORMATIKA (D4)
        //    Sumber: Kurikulum Vokasi UNAIR / standar D4 informatika nasional
        // ====================================================================
        $ti = [
            1 => [
                'Matematika Dasar',
                'Pemrograman Dasar',
                'Logika dan Algoritma',
                'Basis Data',
                'Pengantar Teknologi Informasi',
                'Bahasa Inggris untuk Informatika',
            ],
            2 => [
                'Pemrograman Berorientasi Objek',
                'Struktur Data',
                'Sistem Basis Data',
                'Jaringan Komputer',
                'Desain Grafis Vokasional',
                'Matematika Diskrit',
            ],
            3 => [
                'Pemrograman Web',
                'Rekayasa Perangkat Lunak',
                'Sistem Operasi',
                'Keamanan Jaringan',
                'Pemrograman Mobile',
                'Analisis dan Desain Sistem',
            ],
            4 => [
                'Pemrograman Web Lanjut',
                'Machine Learning Dasar',
                'Manajemen Proyek IT',
                'Cloud Computing',
                'Pengujian Perangkat Lunak',
                'Kecerdasan Buatan',
            ],
            5 => [
                'Pengembangan Aplikasi Enterprise',
                'Big Data Analytics',
                'Internet of Things (IoT)',
                'DevOps dan CI/CD',
                'Keamanan Siber',
                'Arsitektur Microservice',
            ],
            6 => [
                'Metodologi Penelitian Terapan',
                'Deep Learning dan AI Terapan',
                'Kewirausahaan Teknologi',
                'Etika Profesi IT',
                'Proyek Akhir Rekayasa Perangkat Lunak',
                'Seminar Ilmiah Informatika',
            ],
        ];

        // ====================================================================
        // 2. TEKNOLOGI REKAYASA INSTRUMENTASI DAN KONTROL (TRIK)
        //    Sumber: Vokasi UNAIR — fokus otomasi, elektronika, instrumentasi
        // ====================================================================
        $trik = [
            1 => [
                'Matematika Teknik',
                'Fisika Terapan',
                'Elektronika Analog',
                'Elektronika Digital',
                'Instalasi Listrik',
                'Gambar Teknik',
            ],
            2 => [
                'Rangkaian Listrik',
                'Dasar Instrumentasi',
                'Pemrograman Mikrokontroler',
                'Sensor dan Transduser',
                'Elektronika Daya',
                'Metrologi dan Kalibrasi',
            ],
            3 => [
                'Sistem Kontrol Dasar',
                'Programmable Logic Controller (PLC)',
                'Instrumentasi Industri',
                'Pengolahan Sinyal Digital',
                'Teknik Pengukuran',
                'Pneumatik dan Hidraulik',
            ],
            4 => [
                'Kontrol Proses Industri',
                'Robotika dan Otomasi',
                'Instrumentasi Medis',
                'Sistem Tertanam (Embedded)',
                'Komunikasi Data Industri',
                'Distribusi dan Transmisi Listrik',
            ],
            5 => [
                'Sistem SCADA',
                'Kontrol Adaptif dan Cerdas',
                'Pemeliharaan Sistem Instrumentasi',
                'Otomasi Industri Lanjut',
                'Keselamatan dan Kesehatan Kerja Industri',
                'Manajemen Energi',
            ],
            6 => [
                'Metodologi Penelitian Terapan',
                'Proyek Akhir Instrumentasi',
                'Seminar Ilmiah TRIK',
                'Kewirausahaan Industri',
                'Magang Industri Instrumentasi',
                'Etika Profesi Rekayasa',
            ],
        ];

        // ====================================================================
        // 3. KEARSIPAN DAN INFORMASI DIGITAL (KID)
        //    Sumber: Vokasi UNAIR — pengelolaan arsip digital, transformasi digital
        // ====================================================================
        $kid = [
            1 => [
                'Pengantar Kearsipan',
                'Dasar-Dasar Manajemen Informasi',
                'Bahasa Indonesia Ilmiah',
                'Pengantar Komputer dan Aplikasi Perkantoran',
                'Komunikasi Administrasi',
                'Hukum dan Regulasi Kearsipan',
            ],
            2 => [
                'Manajemen Rekod Aktif',
                'Klasifikasi dan Indeksasi Arsip',
                'Sistem Basis Data Kearsipan',
                'Fotografi dan Reprografi Arsip',
                'Bahasa Inggris untuk Kearsipan',
                'Konservasi dan Preservasi Arsip',
            ],
            3 => [
                'Manajemen Kearsipan Inaktif',
                'Arsip Elektronik dan E-Records',
                'Sistem Informasi Kearsipan Dinamis',
                'Manajemen Risiko Arsip',
                'Akuisisi dan Seleksi Arsip',
                'Teknologi Digitalisasi Arsip',
            ],
            4 => [
                'Manajemen Arsip Statis',
                'Cloud Storage dan Manajemen Aset Digital',
                'Keamanan Informasi dan Cyber Security',
                'Layanan Informasi dan Referensi',
                'Metadata dan Standar Deskripsi Arsip',
                'Manajemen Pengetahuan Organisasi',
            ],
            5 => [
                'Administrasi dan Tata Kelola Informasi Publik',
                'Big Data untuk Kearsipan',
                'Pengembangan Sistem Informasi Kearsipan',
                'Audit Kearsipan',
                'Kerjasama dan Jaringan Kearsipan',
                'Manajemen Proyek Digitalisasi',
            ],
            6 => [
                'Metodologi Penelitian Terapan',
                'Proyek Akhir Kearsipan',
                'Seminar Ilmiah Kearsipan',
                'Kewirausahaan Informasi Digital',
                'Magang Instansi Kearsipan',
                'Etika Profesi Arsiparist',
            ],
        ];

        // ====================================================================
        // Pemetaan kategori LAMA (id 1-8) ke jurusan & semester yang benar
        // ====================================================================
        $legacyMapping = [
            'Pemrograman Dasar'           => ['jurusan' => 'Teknik Informatika', 'semester' => 1],
            'Basis Data'                  => ['jurusan' => 'Teknik Informatika', 'semester' => 1],
            'Elektronika Digital'         => ['jurusan' => 'Teknologi Rekayasa Instrumentasi dan Kontrol (TRIK)', 'semester' => 1],
            'Jaringan Komputer'           => ['jurusan' => 'Teknik Informatika', 'semester' => 2],
            'Desain Grafis Vokasional'    => ['jurusan' => 'Teknik Informatika', 'semester' => 2],
            'Instalasi Listrik'           => ['jurusan' => 'Teknologi Rekayasa Instrumentasi dan Kontrol (TRIK)', 'semester' => 1],
            'Sistem Tertanam (Embedded)'  => ['jurusan' => 'Teknologi Rekayasa Instrumentasi dan Kontrol (TRIK)', 'semester' => 4],
            'Mikrokontroler'              => ['jurusan' => 'Teknologi Rekayasa Instrumentasi dan Kontrol (TRIK)', 'semester' => 2],
        ];

        // Update data lama dengan jurusan & semester yang benar
        foreach ($legacyMapping as $name => $data) {
            Category::where('name', $name)->update($data);
        }

        // ====================================================================
        // Sisipkan kategori baru (hindari duplikat dengan cek nama)
        // ====================================================================
        $allCurricula = [
            'Teknik Informatika'                                          => $ti,
            'Teknologi Rekayasa Instrumentasi dan Kontrol (TRIK)'         => $trik,
            'Kearsipan dan Informasi Digital (KID)'                       => $kid,
        ];

        foreach ($allCurricula as $jurusan => $semesterList) {
            foreach ($semesterList as $semester => $courses) {
                foreach ($courses as $name) {
                    // Lewati jika sudah ada (update legacyMapping sudah menanganinya)
                    $exists = Category::where('name', $name)
                        ->where('jurusan', $jurusan)
                        ->where('semester', $semester)
                        ->exists();

                    // Jika nama sama tapi jurusan/semester beda (legacy), skip insert
                    $nameExists = Category::where('name', $name)->exists();

                    if (!$exists && !$nameExists) {
                        Category::create([
                            'name'    => $name,
                            'slug'    => Str::slug($name) . '-' . Str::random(4),
                            'jurusan' => $jurusan,
                            'semester' => $semester,
                        ]);
                    }
                }
            }
        }
    }
}
