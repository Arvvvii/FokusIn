# 📐 CODING_STANDARDS.md — Standar Penulisan Kode FokusIn

Dokumen ini menjadi panduan wajib bagi semua developer yang berkontribusi pada proyek FokusIn untuk menjaga konsistensi, keterbacaan, dan kualitas kode.

---

## 1. Naming Convention

### 1.1 Backend (PHP / Laravel)

| Konteks | Style | Contoh |
|---|---|---|
| **Class / Model** | PascalCase | `ExamUpload`, `MentoringSession`, `AIPatternService` |
| **Controller** | PascalCase + `Controller` | `ExamUploadController`, `AdminDashboardController` |
| **Method / Function** | camelCase | `getSummary()`, `updateExtractedText()`, `forceUpdateStatus()` |
| **Variable** | camelCase | `$examUpload`, `$groqApiKey`, `$extractedText` |
| **Route name** | kebab-case dengan titik | `admin.users.store`, `mentoring.sessions.update` |
| **Table name** | snake_case plural | `exam_uploads`, `mentoring_sessions`, `quiz_attempts` |
| **Column name** | snake_case | `user_id`, `category_id`, `is_verified`, `extracted_text` |
| **Enum value** | lowercase | `pending`, `confirmed`, `completed` |
| **File name** | PascalCase | `ExamUploadController.php`, `AIPatternService.php` |

### 1.2 Frontend (Vue 3 / JavaScript)

| Konteks | Style | Contoh |
|---|---|---|
| **Component file** | PascalCase | `DashboardPelajarView.vue`, `AdminModerationView.vue` |
| **Component name** | PascalCase | `<MentoringCard>`, `<ToastNotification>` |
| **Variable / function** | camelCase | `authStore`, `submitAttempt`, `isLoading` |
| **Pinia store** | camelCase + `use` prefix | `useAuthStore`, `useToastStore` |
| **Service file** | kebab-case + `.service.js` | `mentoring.service.js`, `exam-upload.service.js` |
| **CSS class** | kebab-case | `dashboard-card`, `btn-primary`, `quiz-result` |
| **Route name** | kebab-case | `pelajar-dashboard`, `tutor-mentoring-detail` |
| **Environment var** | UPPER_SNAKE_CASE + `VITE_` prefix | `VITE_API_URL`, `VITE_API_BASE_URL` |

---

## 2. Struktur File & Organisasi Kode

### 2.1 Controller PHP — Urutan Method Standar

```php
class ExamUploadController extends Controller
{
    // 1. Constructor (jika ada dependency injection)
    public function __construct(SomeService $service) { ... }

    // 2. index()   - List resource (GET /resource)
    public function index() { ... }

    // 3. show()    - Detail resource (GET /resource/{id})
    public function show($id) { ... }

    // 4. store()   - Buat resource baru (POST /resource)
    public function store(Request $request) { ... }

    // 5. update()  - Update resource (PUT/PATCH /resource/{id})
    public function update(Request $request, $id) { ... }

    // 6. destroy() - Hapus resource (DELETE /resource/{id})
    public function destroy($id) { ... }

    // 7. Method custom (diberi nama deskriptif)
    public function updateExtractedText(Request $request, $id) { ... }
}
```

### 2.2 Vue Component — Urutan Options/Composables Standar

```vue
<script setup>
// 1. Imports
import { ref, computed, onMounted } from 'vue'
import { useRouter } from 'vue-router'
import { useAuthStore } from '@/stores/auth'
import { mentoringService } from '@/services/mentoring.service'

// 2. Store & Router
const router = useRouter()
const authStore = useAuthStore()

// 3. Reactive state
const sessions = ref([])
const isLoading = ref(false)
const error = ref(null)

// 4. Computed
const activeSessions = computed(() => sessions.value.filter(s => s.status === 'confirmed'))

// 5. Methods
async function fetchSessions() { ... }
async function handleSubmit() { ... }

// 6. Lifecycle
onMounted(() => {
  fetchSessions()
})
</script>

<template>
  <!-- Template -->
</template>
```

### 2.3 Service File Frontend — Template Standar

```javascript
// mentoring.service.js
import api from './api'

export const mentoringService = {
  async listTutors() {
    const response = await api.get('/tutors')
    return response.data
  },

  async bookSession(data) {
    const response = await api.post('/mentoring/requests', data)
    return response.data
  },

  async updateStatus(id, status) {
    const response = await api.patch(`/mentoring/sessions/${id}/status`, { status })
    return response.data
  }
}
```

---

## 3. Aturan Penulisan Kode

### 3.1 PHP / Laravel

**✅ Selalu validasi input di controller:**
```php
// BENAR
$validated = $request->validate([
    'category_id' => 'required|exists:categories,id',
    'file'        => 'required|file|mimes:pdf|max:10240',
]);

// SALAH — Langsung menggunakan $request->category_id tanpa validasi
```

**✅ Gunakan `$guarded = ['id']` pada semua model:**
```php
// BENAR
class ExamUpload extends Model
{
    protected $guarded = ['id'];
}

// SALAH — Tidak ada $fillable dan tidak ada $guarded
```

**✅ Gunakan Eloquent relationships, hindari raw query:**
```php
// BENAR
$uploads = ExamUpload::with(['user', 'category'])->latest()->paginate(10);

// HINDARI (kecuali benar-benar perlu)
DB::select("SELECT * FROM exam_uploads JOIN users ...");
```

**✅ Return response JSON yang konsisten:**
```php
// Sukses
return response()->json($data, 200);
return response()->json($newResource, 201);

// Error
return response()->json(['message' => 'Tidak ditemukan.'], 404);
return response()->json(['message' => 'Unauthorized'], 403);
```

**✅ Cek role dengan benar:**
```php
// Untuk tutor/admin
if (!in_array(auth()->user()->role, ['admin', 'tutor'])) {
    return response()->json(['message' => 'Unauthorized'], 403);
}

// Hanya admin
if (auth()->user()->role !== 'admin') {
    return response()->json(['message' => 'Hanya administrator...'], 403);
}
```

### 3.2 Vue / JavaScript

**✅ Gunakan `try/catch` saat memanggil API:**
```javascript
// BENAR
async function fetchData() {
  isLoading.value = true
  try {
    const data = await mentoringService.listTutors()
    tutors.value = data
  } catch (err) {
    error.value = err.response?.data?.message || 'Terjadi kesalahan'
  } finally {
    isLoading.value = false
  }
}

// SALAH
async function fetchData() {
  const data = await mentoringService.listTutors()  // Tidak ada error handling
  tutors.value = data
}
```

**✅ Gunakan path alias `@/` untuk import:**
```javascript
// BENAR
import { useAuthStore } from '@/stores/auth'
import { mentoringService } from '@/services/mentoring.service'

// SALAH
import { useAuthStore } from '../../stores/auth'
```

**✅ Destruktur prop dengan default value:**
```javascript
// BENAR
const props = defineProps({
  session: { type: Object, required: true },
  isReadOnly: { type: Boolean, default: false }
})
```

---

## 4. Commit Message Convention

Format commit mengikuti **Conventional Commits**:

```
<type>(<scope>): <deskripsi singkat dalam bahasa Indonesia>

[body opsional]
[footer opsional]
```

### Tipe Commit

| Tipe | Kapan Digunakan |
|---|---|
| `feat` | Menambahkan fitur baru |
| `fix` | Memperbaiki bug |
| `docs` | Perubahan dokumentasi saja |
| `style` | Perubahan format/style kode (tidak mengubah logika) |
| `refactor` | Refactor kode (bukan feat, bukan fix) |
| `test` | Menambah atau mengubah test |
| `chore` | Pembaruan dependency, konfigurasi build |
| `perf` | Peningkatan performa |

### Scope (Opsional)

| Scope | Keterangan |
|---|---|
| `auth` | Fitur autentikasi |
| `forum` | Fitur forum/post |
| `mentoring` | Fitur mentoring |
| `quiz` | Fitur kuis |
| `ai` | Fitur AI analyzer |
| `exam` | Fitur arsip ujian |
| `admin` | Fitur admin panel |
| `ui` | Perubahan tampilan/UI |
| `db` | Migrasi atau perubahan database |

### Contoh Commit yang Baik

```
feat(exam): tambah fitur validasi status arsip ujian oleh tutor

fix(auth): perbaiki bug redirect setelah login untuk role tutor

docs: tambah dokumentasi endpoint API exam-uploads

refactor(ai): pindahkan logika ekstraksi teks ke AIPatternService

chore: update dependency laravel/sanctum ke versi 4.3
```

---

## 5. Aturan Branch

```
main          → Branch produksi, selalu stabil
develop       → Branch pengembangan utama
feat/{nama}   → Fitur baru (misal: feat/ai-analyzer)
fix/{nama}    → Perbaikan bug (misal: fix/login-redirect)
docs/{nama}   → Dokumentasi (misal: docs/api-reference)
```

**Pull Request (PR) wajib:**
- Review minimal 1 developer lain
- Pastikan tidak ada konflik merge
- Semua test lulus sebelum merge ke `main`

---

## 6. Standar Komentar Kode

### PHP — PHPDoc untuk method kompleks

```php
/**
 * Mengirim teks soal ke Groq API untuk dianalisis pola soalnya.
 * Hasil analisis disimpan ke tabel ai_summaries sebagai cache.
 *
 * @param  int  $categoryId  ID kategori soal yang akan dianalisis
 * @return array             Array berisi frekuensi_topik, tingkat_kesulitan, dll.
 * @throws \Exception        Jika Groq API tidak merespons
 */
public function getSummary(int $categoryId): array
{
    // ...
}
```

### JavaScript — Komentar singkat untuk logika non-obvious

```javascript
// Hapus Content-Type agar browser generate multipart boundary otomatis
if (config.data instanceof FormData) {
  delete config.headers['Content-Type']
}

// Init session dari localStorage sebelum router aktif
authStore.initSession()
```

**Jangan** menulis komentar untuk hal yang sudah jelas dari kode:
```javascript
// BURUK — komentar tidak menambah informasi
let count = 0  // Set count ke 0

// BAIK — hanya komentari hal yang tidak jelas
let retryCount = 0  // Maks 3 percobaan sebelum fallback ke mode offline
```

---

## 7. Aturan Error Handling

### Backend

```php
// Gunakan try/catch untuk operasi eksternal (API, file)
try {
    $response = Http::withHeaders([...])->post('https://api.groq.com/...');
    
    if ($response->successful()) {
        // proses response
    }
    
    return response()->json(['message' => 'Gagal terhubung ke layanan AI.'], 500);
    
} catch (\Exception $e) {
    \Log::error('AI Analysis Error', [
        'exception' => $e->getMessage(),
        'user_id'   => auth()->id()
    ]);
    return response()->json(['message' => 'Terjadi kesalahan internal.'], 500);
}
```

### Frontend

```javascript
// Selalu tampilkan pesan error yang user-friendly
} catch (err) {
  // Ambil pesan dari API jika ada, fallback ke pesan generik
  const msg = err.response?.data?.message || 'Terjadi kesalahan. Silakan coba lagi.'
  toastStore.show(msg, 'error')
}
```

---

## 8. Larangan (Don'ts)

- ❌ **Jangan** menyimpan `APP_KEY`, API key, atau password di dalam kode
- ❌ **Jangan** commit file `.env` ke repository
- ❌ **Jangan** menggunakan `dd()` atau `var_dump()` di kode produksi
- ❌ **Jangan** mengabaikan hasil validasi — selalu gunakan `$validated`, bukan `$request->all()`
- ❌ **Jangan** membuat route yang tidak menggunakan autentikasi untuk data sensitif
- ❌ **Jangan** melakukan query N+1 — selalu gunakan eager loading (`with()`)
- ❌ **Jangan** menulis logika bisnis di dalam Vue component — pisahkan ke service file
