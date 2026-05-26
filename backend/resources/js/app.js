import './bootstrap';
import { createApp } from 'vue';

// ── Mount AIAnalyzerView (Commented out because AIAnalyzerView.vue is not in this workspace) ──
// import AIAnalyzerView from './Views/AIAnalyzerView.vue';
// const aiAnalyzerEl = document.getElementById('ai-analyzer');
// if (aiAnalyzerEl) {
//     createApp(AIAnalyzerView).mount('#ai-analyzer');
// }

// ── Mount QuizPlayView ──
// Dipasang di Blade view: resources/views/quiz-play.blade.php
import QuizPlayView from './Views/QuizPlayView.vue';
const quizPlayEl = document.getElementById('quiz-play');
if (quizPlayEl) {
    createApp(QuizPlayView).mount('#quiz-play');
}
