<script setup>
/**
 * QuizPlayView.vue — Halaman Uji Coba Kuis (QA / Mentahan)
 *
 * Tujuan   : Menguji integrasi composable useTimer + Axios API quiz attempt.
 * Author   : Core Logic & QA Developer
 * Catatan  : Layout sengaja MINIMAL agar tidak bentrok dengan pekerjaan UI Marsha.
 *            Jangan tambahkan Tailwind class kompleks di sini.
 *
 * ⚠️  PERBEDAAN ENDPOINT vs SPESIFIKASI:
 *     Spesifikasi minta  : POST /api/quiz/submit
 *     Backend aktual     : POST /api/quizzes/{id}/attempt
 *     Format answers aktual: { "questionId": "pilihan" }  (object, bukan array)
 *     Kedua format ditampilkan di section DEBUG di bawah untuk keperluan QA.
 */

import { ref, computed, watch } from 'vue'
import axios from 'axios'
import { useTimer } from '../Composables/useTimer.js'

// ══════════════════════════════════════════════
// ── KONFIGURASI KUIS (ubah sesuai kebutuhan uji)
// ══════════════════════════════════════════════

// ID kuis yang akan di-attempt (sesuaikan dengan data di DB)
const QUIZ_ID = 1

// Durasi simulasi cepat: 90 detik agar mudah diuji timer warning & time-up
const TIMER_SECONDS = 90

// ══════════════════════════════════════════════
// ── DATA SOAL DUMMY LOKAL
// ══════════════════════════════════════════════
// Format question_id disesuaikan dengan struktur quiz_questions di backend.
// Ganti dengan data real dari GET /api/quizzes/{id} saat integrasi penuh.

const questions = ref([
  {
    id: 101,
    question_text: '[DUMMY] Apa kepanjangan dari HTTP?',
    options: {
      A: 'HyperText Transfer Protocol',
      B: 'High Transfer Text Protocol',
      C: 'HyperText Transmission Protocol',
      D: 'Hyper Transfer Text Process',
    },
  },
  {
    id: 102,
    question_text: '[DUMMY] Manakah tag HTML yang benar untuk membuat hyperlink?',
    options: {
      A: '<link href="url">',
      B: '<a href="url">',
      C: '<url href="link">',
      D: '<hyperlink href="url">',
    },
  },
  {
    id: 103,
    question_text: '[DUMMY] Framework PHP mana yang digunakan di proyek FokusIn?',
    options: {
      A: 'Symfony',
      B: 'CodeIgniter',
      C: 'Laravel',
      D: 'Lumen',
    },
  },
])

// ══════════════════════════════════════════════
// ── STATE NAVIGASI SOAL
// ══════════════════════════════════════════════

// Index soal yang sedang ditampilkan
const currentIndex = ref(0)

// Object reaktif: { questionId: 'pilihan' } — disimpan saat user memilih jawaban
const userAnswers = ref({})

// Soal yang sedang aktif (computed dari currentIndex)
const currentQuestion = computed(() => questions.value[currentIndex.value])

// Navigasi
const hasPrev = computed(() => currentIndex.value > 0)
const hasNext = computed(() => currentIndex.value < questions.value.length - 1)
const isLastQuestion = computed(() => currentIndex.value === questions.value.length - 1)

function goNext() { if (hasNext.value) currentIndex.value++ }
function goPrev() { if (hasPrev.value) currentIndex.value-- }

// ══════════════════════════════════════════════
// ── HANDLER PILIHAN JAWABAN
// ══════════════════════════════════════════════

function selectAnswer(questionId, option) {
  userAnswers.value[questionId] = option

  // Log setiap interaksi untuk keperluan QA debug
  console.log(`[QuizPlayView] Jawaban dipilih:`, {
    question_id: questionId,
    selected_option: option,
    current_answers_snapshot: { ...userAnswers.value },
  })
}

// ══════════════════════════════════════════════
// ── STATE UI & API
// ══════════════════════════════════════════════

const isSubmitting = ref(false)
const apiResponse = ref(null)   // Respons sukses dari backend
const apiError = ref(null)      // Pesan error dari backend atau network

// ══════════════════════════════════════════════
// ── LOGIKA SUBMIT (dipakai manual & auto)
// ══════════════════════════════════════════════

async function submitQuiz(isAutoSubmit = false) {
  // Cegah double-submit
  if (isSubmitting.value) return
  isSubmitting.value = true
  apiResponse.value = null
  apiError.value = null

  // Hentikan timer
  stopTimer()

  const token = localStorage.getItem('token')

  // ── Format jawaban (aktual backend) ──
  // Backend QuizController.attempt() membaca: answers["questionId"] = "pilihan"
  const answersForBackend = { ...userAnswers.value }

  // ── Format payload SESUAI SPESIFIKASI (untuk dokumentasi & debug) ──
  const specPayload = {
    quiz_id: QUIZ_ID,
    is_auto_submitted: isAutoSubmit,
    answers: Object.entries(userAnswers.value).map(([qId, option]) => ({
      question_id: parseInt(qId),
      selected_option: option,
    })),
  }

  console.log('[QuizPlayView] Mengirim submit kuis...', {
    is_auto_submitted: isAutoSubmit,
    endpoint_aktual: `/api/quizzes/${QUIZ_ID}/attempt`,
    payload_aktual: { answers: answersForBackend },
    payload_spesifikasi: specPayload,
  })

  try {
    // ── Hit endpoint backend aktual: POST /api/quizzes/{id}/attempt ──
    const { data } = await axios.post(
      `/api/quizzes/${QUIZ_ID}/attempt`,
      { answers: answersForBackend },
      {
        headers: {
          Authorization: `Bearer ${token}`,
          'Content-Type': 'application/json',
        },
      }
    )

    apiResponse.value = data
    console.log('[QuizPlayView] Submit sukses:', data)
  } catch (err) {
    // Tangkap error 401, 422, 500, atau network error
    if (err.response?.status === 401) {
      apiError.value = {
        status: 401,
        message: 'Token tidak valid atau sudah expired. Silakan login ulang.',
        raw: err.response?.data,
      }
    } else {
      apiError.value = {
        status: err.response?.status ?? 'NETWORK_ERROR',
        message: err.response?.data?.message ?? err.message,
        raw: err.response?.data ?? null,
      }
    }
    console.error('[QuizPlayView] Submit gagal:', apiError.value)
  } finally {
    isSubmitting.value = false
  }
}

// ══════════════════════════════════════════════
// ── INTEGRASI COMPOSABLE useTimer
// ══════════════════════════════════════════════

// Callback ini dipanggil otomatis oleh useTimer saat timeRemaining <= 0
function handleTimeUp() {
  console.log('[QuizPlayView] ⏰ Waktu habis! Memicu auto-submit...')
  submitQuiz(true) // isAutoSubmit = true
}

// Inisialisasi timer dengan 90 detik + callback auto-submit
const {
  timeRemaining,
  formattedTime,
  isActive,
  isWarning,
  isTimeUp,
  startTimer,
  pauseTimer,
  stopTimer,
  resetTimer,
} = useTimer(TIMER_SECONDS, handleTimeUp)

// ── Watcher: log setiap kali status warning berubah ──
watch(isWarning, (val) => {
  if (val) console.warn('[QuizPlayView] ⚠️ Waktu kurang dari 60 detik!')
})

// ── Watcher: log saat timer aktif/nonaktif ──
watch(isActive, (val) => {
  console.log(`[QuizPlayView] Timer status: ${val ? 'BERJALAN' : 'BERHENTI'}`)
})
</script>

<template>
  <!-- ═══════════════════════════════════════════
       QuizPlayView — UI Mentahan untuk QA
       Tidak menggunakan Tailwind kompleks.
       ═══════════════════════════════════════════ -->
  <div style="max-width: 720px; margin: 0 auto; padding: 24px; font-family: monospace;">

    <h1 style="text-align: center; border-bottom: 2px solid #333; padding-bottom: 8px;">
      🧪 [QA] Quiz Play — Uji Coba Integrasi
    </h1>

    <!-- ══ SECTION 1: TIMER ══ -->
    <section style="border: 2px solid #aaa; padding: 16px; margin-bottom: 20px; text-align: center;">
      <h2>⏱ Timer Kuis</h2>

      <!-- Tampilan waktu — merah & berkedip jika isWarning aktif -->
      <div
        :style="{
          fontSize: '48px',
          fontWeight: 'bold',
          color: isWarning ? 'red' : (isTimeUp ? '#999' : '#000'),
          animation: isWarning ? 'blink 1s step-start infinite' : 'none',
        }"
      >
        {{ formattedTime }}
      </div>

      <div style="font-size: 12px; color: #666; margin-top: 4px;">
        {{ isTimeUp ? '⛔ WAKTU HABIS' : isWarning ? '⚠️ PERINGATAN: Sisa &lt; 60 detik!' : `Sisa: ${timeRemaining} detik` }}
      </div>

      <!-- Kontrol Timer -->
      <div style="margin-top: 12px; display: flex; gap: 8px; justify-content: center; flex-wrap: wrap;">
        <button @click="startTimer" :disabled="isActive || isTimeUp">▶ Start</button>
        <button @click="pauseTimer" :disabled="!isActive">⏸ Pause</button>
        <button @click="stopTimer">⏹ Stop</button>
        <button @click="resetTimer(TIMER_SECONDS)" style="background: #eee;">🔄 Reset ({{ TIMER_SECONDS }}s)</button>
      </div>

      <div style="margin-top: 8px; font-size: 12px;">
        Status: <strong>{{ isActive ? 'BERJALAN' : isTimeUp ? 'HABIS' : 'DIAM' }}</strong>
      </div>
    </section>

    <!-- ══ SECTION 2: SOAL ══ -->
    <section style="border: 2px solid #aaa; padding: 16px; margin-bottom: 20px;">
      <h2>📋 Soal {{ currentIndex + 1 }} dari {{ questions.length }}</h2>

      <!-- Teks Soal -->
      <p style="font-size: 16px; font-weight: bold; line-height: 1.6;">
        {{ currentQuestion.question_text }}
      </p>

      <!-- Pilihan Jawaban (Radio) -->
      <div style="margin-top: 12px; display: flex; flex-direction: column; gap: 10px;">
        <label
          v-for="(text, key) in currentQuestion.options"
          :key="key"
          :style="{
            cursor: 'pointer',
            padding: '8px 12px',
            border: userAnswers[currentQuestion.id] === key ? '2px solid blue' : '1px solid #ccc',
            borderRadius: '4px',
            background: userAnswers[currentQuestion.id] === key ? '#e8f0fe' : 'transparent',
          }"
        >
          <input
            type="radio"
            :name="`question_${currentQuestion.id}`"
            :value="key"
            :checked="userAnswers[currentQuestion.id] === key"
            @change="selectAnswer(currentQuestion.id, key)"
            style="margin-right: 8px;"
          />
          <strong>{{ key }}.</strong> {{ text }}
        </label>
      </div>

      <!-- Navigasi Soal -->
      <div style="margin-top: 16px; display: flex; gap: 8px; justify-content: space-between; align-items: center;">
        <button @click="goPrev" :disabled="!hasPrev">← Sebelumnya</button>

        <span style="font-size: 12px; color: #666;">
          Terjawab: {{ Object.keys(userAnswers).length }} / {{ questions.length }}
        </span>

        <button @click="goNext" :disabled="!hasNext" v-if="!isLastQuestion">Selanjutnya →</button>

        <!-- Tombol Selesai hanya muncul di soal terakhir -->
        <button
          v-if="isLastQuestion"
          @click="submitQuiz(false)"
          :disabled="isSubmitting"
          style="background: #2563eb; color: white; padding: 8px 16px; border: none; border-radius: 4px; cursor: pointer; font-weight: bold;"
        >
          {{ isSubmitting ? '⏳ Mengirim...' : '✅ Selesaikan Kuis' }}
        </button>
      </div>
    </section>

    <!-- ══ SECTION 3: STATUS JAWABAN (Live Preview) ══ -->
    <section style="border: 2px dashed #aaa; padding: 16px; margin-bottom: 20px; background: #fafafa;">
      <h2>📊 Status Jawaban (Live)</h2>
      <table style="width: 100%; border-collapse: collapse; font-size: 13px;">
        <thead>
          <tr style="background: #eee;">
            <th style="border: 1px solid #ccc; padding: 6px;">No.</th>
            <th style="border: 1px solid #ccc; padding: 6px;">Question ID</th>
            <th style="border: 1px solid #ccc; padding: 6px;">Jawaban Dipilih</th>
          </tr>
        </thead>
        <tbody>
          <tr v-for="(q, i) in questions" :key="q.id">
            <td style="border: 1px solid #ccc; padding: 6px; text-align: center;">{{ i + 1 }}</td>
            <td style="border: 1px solid #ccc; padding: 6px; text-align: center;">{{ q.id }}</td>
            <td
              :style="{
                border: '1px solid #ccc',
                padding: '6px',
                textAlign: 'center',
                color: userAnswers[q.id] ? 'green' : '#999',
                fontWeight: userAnswers[q.id] ? 'bold' : 'normal',
              }"
            >
              {{ userAnswers[q.id] ?? '—' }}
            </td>
          </tr>
        </tbody>
      </table>
    </section>

    <!-- ══ SECTION 4: DEBUG API RESPONSE ══ -->
    <section style="border: 2px solid #333; padding: 16px; margin-bottom: 20px; background: #1e1e1e; color: #d4d4d4;">
      <h2 style="color: #fff;">🔍 Debug — API Response</h2>

      <!-- Informasi endpoint -->
      <p style="color: #9cdcfe; font-size: 12px; margin-bottom: 8px;">
        Endpoint aktual: <code>POST /api/quizzes/{{ QUIZ_ID }}/attempt</code><br>
        (Spesifikasi awal: <code>POST /api/quiz/submit</code> — format berbeda, lihat console.log)
      </p>

      <!-- Belum submit -->
      <pre v-if="!apiResponse && !apiError && !isSubmitting" style="color: #888; font-size: 12px;">
// Belum ada response. Submit kuis untuk melihat hasil.
      </pre>

      <!-- Loading -->
      <pre v-else-if="isSubmitting" style="color: #ffd700; font-size: 12px;">
⏳ Mengirim jawaban ke backend...
      </pre>

      <!-- Sukses -->
      <div v-else-if="apiResponse">
        <p style="color: #4ec9b0; font-weight: bold;">✅ SUKSES (HTTP 201)</p>
        <pre style="font-size: 12px; color: #d4d4d4; white-space: pre-wrap; word-break: break-all;">{{ JSON.stringify(apiResponse, null, 2) }}</pre>
      </div>

      <!-- Error -->
      <div v-else-if="apiError">
        <p style="color: #f48771; font-weight: bold;">❌ ERROR (HTTP {{ apiError.status }})</p>
        <pre style="font-size: 12px; color: #f48771; white-space: pre-wrap; word-break: break-all;">{{ JSON.stringify(apiError, null, 2) }}</pre>
      </div>
    </section>

  </div>

  <!-- CSS untuk animasi blink timer warning -->
  <style>
    @keyframes blink {
      0%, 100% { opacity: 1; }
      50%       { opacity: 0; }
    }
    button {
      padding: 6px 14px;
      cursor: pointer;
      border: 1px solid #666;
      border-radius: 4px;
      background: #f5f5f5;
    }
    button:disabled {
      opacity: 0.4;
      cursor: not-allowed;
    }
  </style>
</template>
