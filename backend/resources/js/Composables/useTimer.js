import { ref, computed, onUnmounted } from 'vue'

/**
 * useTimer — Composable untuk hitung mundur kuis.
 *
 * @param {number} initialSeconds - Durasi awal dalam detik (default: 1800 = 30 menit).
 * @param {Function|null} onTimeUpCallback - Callback opsional yang dipanggil otomatis saat waktu habis.
 * @returns {Object} State reaktif dan metode kontrol timer.
 *
 * Contoh penggunaan:
 *   const { formattedTime, isWarning, startTimer, stopTimer } = useTimer(90, () => {
 *     console.log('Waktu habis! Auto-submit...')
 *   })
 */
export function useTimer(initialSeconds = 1800, onTimeUpCallback = null) {
  // ── State Reaktif ──
  const timeRemaining = ref(initialSeconds)
  const isActive = ref(false)

  // ID interval disimpan agar bisa di-clear (mencegah memory leak)
  let intervalId = null

  // ── Computed Properties ──

  // Format MM:SS dengan zero-padding (misal "09:05")
  const formattedTime = computed(() => {
    const totalSec = Math.max(0, timeRemaining.value)
    const minutes = Math.floor(totalSec / 60)
    const seconds = totalSec % 60
    return `${String(minutes).padStart(2, '0')}:${String(seconds).padStart(2, '0')}`
  })

  // Bernilai true jika sisa waktu <= 60 detik (zona peringatan)
  const isWarning = computed(() => timeRemaining.value <= 60 && timeRemaining.value > 0)

  // Bernilai true jika waktu sudah habis (<= 0)
  const isTimeUp = computed(() => timeRemaining.value <= 0)

  // ── Internal: Logika tick setiap 1 detik ──
  function tick() {
    if (timeRemaining.value > 0) {
      timeRemaining.value--
    }

    // Cek apakah waktu baru saja habis
    if (timeRemaining.value <= 0) {
      clearIntervalSafe()
      isActive.value = false

      // Panggil callback auto-submit jika disediakan
      if (typeof onTimeUpCallback === 'function') {
        onTimeUpCallback()
      }
    }
  }

  // ── Helper: Bersihkan interval dengan aman ──
  function clearIntervalSafe() {
    if (intervalId !== null) {
      clearInterval(intervalId)
      intervalId = null
    }
  }

  // ── Metode Kontrol ──

  /** Mulai hitung mundur. Tidak melakukan apa-apa jika sudah aktif. */
  function startTimer() {
    if (isActive.value) return // Cegah duplikasi interval
    if (timeRemaining.value <= 0) return // Tidak bisa start jika waktu sudah habis

    isActive.value = true
    intervalId = setInterval(tick, 1000)
  }

  /** Jeda hitung mundur. Timer bisa dilanjutkan dengan startTimer(). */
  function pauseTimer() {
    clearIntervalSafe()
    isActive.value = false
  }

  /** Hentikan total dan reset waktu ke 0. */
  function stopTimer() {
    clearIntervalSafe()
    isActive.value = false
    timeRemaining.value = 0
  }

  /**
   * Reset timer ke durasi baru (atau durasi awal).
   * Timer akan berhenti — panggil startTimer() untuk memulai kembali.
   * @param {number|null} newSeconds - Durasi baru dalam detik.
   */
  function resetTimer(newSeconds = null) {
    clearIntervalSafe()
    isActive.value = false
    timeRemaining.value = newSeconds !== null ? newSeconds : initialSeconds
  }

  // ── Memory Management ──
  // Bersihkan interval saat komponen yang memakai composable ini di-unmount,
  // mencegah kebocoran memori jika user berpindah rute.
  onUnmounted(() => {
    clearIntervalSafe()
  })

  // ── Return Public API ──
  return {
    // State (readonly via computed kecuali timeRemaining)
    timeRemaining,
    formattedTime,
    isActive,
    isWarning,
    isTimeUp,

    // Methods
    startTimer,
    pauseTimer,
    stopTimer,
    resetTimer,
  }
}
