import { createRouter, createWebHistory } from 'vue-router'
import AuthLayout from '@/layouts/AuthLayout.vue'
import DashboardLayout from '@/layouts/DashboardLayout.vue'
import TutorLayout from '@/layouts/TutorLayout.vue'
import AdminLayout from '@/layouts/AdminLayout.vue'

const router = createRouter({
  history: createWebHistory(import.meta.env.BASE_URL),
  routes: [
    {
      path: '/',
      name: 'home',
      component: () => import('@/pages/public/HomeLandingView.vue')
    },
    {
      path: '/about',
      name: 'about',
      component: () => import('@/pages/public/AboutView.vue')
    },
    {
      path: '/contact',
      name: 'contact',
      component: () => import('@/pages/public/ContactView.vue')
    },
    {
      path: '/faq',
      name: 'faq',
      component: () => import('@/pages/public/FAQView.vue')
    },
    {
      path: '/coming-soon',
      name: 'coming-soon',
      component: () => import('@/pages/shared/ComingSoonView.vue')
    },
    // Auth Routes
    {
      path: '/auth',
      component: AuthLayout,
      children: [
        { path: 'login', name: 'login', component: () => import('@/pages/auth/LoginView.vue') },
        { path: 'register', name: 'register', component: () => import('@/pages/auth/RegisterView.vue') },
        { path: 'forgot-password', name: 'forgot-password', component: () => import('@/pages/auth/ForgotPasswordView.vue') },
      ]
    },
    // Pelajar Routes
    {
      path: '/pelajar',
      component: DashboardLayout,
      meta: { requiresAuth: true, role: 'pelajar' },
      children: [
        { path: 'dashboard', name: 'pelajar-dashboard', component: () => import('@/pages/pelajar/DashboardPelajarView.vue') },
        { path: 'forum', name: 'pelajar-forum', component: () => import('@/pages/pelajar/ForumView.vue') },
        { path: 'forum/:id', name: 'pelajar-forum-detail', component: () => import('@/pages/pelajar/PostDetailView.vue') },
        { path: 'forum/create', name: 'pelajar-forum-create', component: () => import('@/pages/pelajar/CreatePostView.vue') },
        { path: 'ai-analyzer', name: 'pelajar-ai-analyzer', component: () => import('@/pages/pelajar/AIAnalyzerView.vue') },
        { path: 'ai-analyzer/create', name: 'pelajar-ai-analyzer-create', component: () => import('@/pages/pelajar/CreateAIAnalysisView.vue') },
        { path: 'mentoring', name: 'pelajar-mentoring', component: () => import('@/pages/pelajar/MentoringView.vue') },
        { path: 'materials', name: 'pelajar-materials', component: () => import('@/pages/pelajar/MaterialsView.vue') },
        { path: 'materials/create', name: 'pelajar-materials-create', component: () => import('@/pages/pelajar/CreateMaterialView.vue') },
        { path: 'materials/:id', name: 'pelajar-materials-detail', component: () => import('@/pages/pelajar/MaterialDetailView.vue') },
        { path: 'quiz', name: 'pelajar-quiz', component: () => import('@/pages/pelajar/QuizView.vue') },
        { path: 'quiz/:id', name: 'pelajar-quiz-play', component: () => import('@/pages/pelajar/QuizPlayView.vue') },
        { path: 'quiz/:id/result', name: 'pelajar-quiz-result', component: () => import('@/pages/pelajar/QuizResultView.vue') },
        { path: 'profile', name: 'pelajar-profile', component: () => import('@/pages/pelajar/ProfileView.vue') },
        { path: 'profile/edit', name: 'pelajar-profile-edit', component: () => import('@/pages/pelajar/EditProfileView.vue') },
        { path: 'mentor/:id', name: 'pelajar-mentor-profile', component: () => import('@/pages/pelajar/MentorProfileView.vue') },
        { path: 'notifications', name: 'pelajar-notifications', component: () => import('@/pages/pelajar/PelajarNotificationsView.vue') },
        { path: 'help', name: 'pelajar-help', component: () => import('@/pages/shared/HelpSupportView.vue') },
      ]
    },
    // Tutor Routes
    {
      path: '/tutor',
      component: TutorLayout,
      meta: { requiresAuth: true, role: 'tutor' },
      children: [
        { path: 'dashboard', name: 'tutor-dashboard', component: () => import('@/pages/tutor/DashboardTutorView.vue') },
        { path: 'verify-answer', name: 'tutor-verify-answer', component: () => import('@/pages/tutor/VerifyAnswerView.vue') },
        { path: 'mentoring', name: 'tutor-mentoring', component: () => import('@/pages/tutor/MentoringManagementView.vue') },
        { path: 'mentoring/:id', name: 'tutor-mentoring-detail', component: () => import('@/pages/tutor/TutorMentoringDetailView.vue') },
        { path: 'mentoring/feedback/:id', name: 'tutor-mentoring-feedback', component: () => import('@/pages/tutor/TutorMentoringFeedbackView.vue') },
        { path: 'schedule', name: 'tutor-schedule', component: () => import('@/pages/tutor/TutorScheduleView.vue') },
        { path: 'student-requests', name: 'tutor-student-requests', component: () => import('@/pages/tutor/TutorStudentRequestsView.vue') },
        { path: 'profile', name: 'tutor-profile', component: () => import('@/pages/tutor/TutorProfileView.vue') },
        { path: 'settings', name: 'tutor-settings', component: () => import('@/pages/tutor/TutorSettingsView.vue') },
        { path: 'analytics', name: 'tutor-analytics', component: () => import('@/pages/tutor/TutorAnalyticsView.vue') },
        { path: 'archive-history', name: 'tutor-archive-history', component: () => import('@/pages/tutor/TutorArchiveHistoryView.vue') },
        { path: 'review-history', name: 'tutor-review-history', component: () => import('@/pages/tutor/TutorReviewHistoryView.vue') },
        { path: 'forum', name: 'tutor-forum', component: () => import('@/pages/pelajar/ForumView.vue') },
        { path: 'forum/:id', name: 'tutor-forum-detail', component: () => import('@/pages/pelajar/PostDetailView.vue') },
        { path: 'forum/create', name: 'tutor-forum-create', component: () => import('@/pages/pelajar/CreatePostView.vue') },
        { path: 'materials', name: 'tutor-materials', component: () => import('@/pages/pelajar/MaterialsView.vue') },
        { path: 'materials/create', name: 'tutor-materials-create', component: () => import('@/pages/pelajar/CreateMaterialView.vue') },
        { path: 'materials/:id', name: 'tutor-materials-detail', component: () => import('@/pages/pelajar/MaterialDetailView.vue') },
        { path: 'upload-exam', name: 'tutor-upload-exam', component: () => import('@/pages/tutor/UploadExamView.vue') },
        { path: 'ai-validation', name: 'tutor-ai-validation', component: () => import('@/pages/tutor/AIValidationView.vue') },
        { path: 'validation/:id', name: 'tutor-validation-detail', component: () => import('@/pages/tutor/TutorValidationDetailView.vue') },
        { path: 'notifications', name: 'tutor-notifications', component: () => import('@/pages/tutor/TutorNotificationsView.vue') },
      ]
    },
    // Admin Routes
    {
      path: '/admin',
      component: AdminLayout,
      meta: { requiresAuth: true, role: 'admin' },
      children: [
        { path: 'dashboard', name: 'admin-dashboard', component: () => import('@/pages/admin/DashboardAdminView.vue') },
        { path: 'users', name: 'admin-users', component: () => import('@/pages/admin/ManageUsersView.vue') },
        { path: 'users/create', name: 'admin-users-create', component: () => import('@/pages/admin/AdminCreateUserView.vue') },
        { path: 'tutors', name: 'admin-tutors', component: () => import('@/pages/admin/ManageTutorsView.vue') },
        { path: 'tutors/create', name: 'admin-tutors-create', component: () => import('@/pages/admin/AdminCreateTutorView.vue') },
        { path: 'reports', name: 'admin-reports', component: () => import('@/pages/admin/ManageReportsView.vue') },
        { path: 'moderation', name: 'admin-moderation', component: () => import('@/pages/admin/AdminModerationView.vue') },
        { path: 'moderation/:id', name: 'admin-moderation-detail', component: () => import('@/pages/admin/AdminModerationDetailView.vue') },
        { path: 'materials', name: 'admin-materials', component: () => import('@/pages/admin/AdminMaterialsView.vue') },
        { path: 'materials/create', name: 'admin-materials-create', component: () => import('@/pages/admin/AdminCreateCategoryView.vue') },
        { path: 'mentoring', name: 'admin-mentoring', component: () => import('@/pages/admin/AdminMentoringView.vue') },
        { path: 'mentoring/:id', name: 'admin-mentoring-detail', component: () => import('@/pages/admin/AdminMentoringDetailView.vue') },
        { path: 'quiz-monitoring', name: 'admin-quiz-monitoring', component: () => import('@/pages/admin/AdminQuizMonitoringView.vue') },
        { path: 'quiz-monitoring/create', name: 'admin-quiz-monitoring-create', component: () => import('@/pages/admin/AdminCreateQuizView.vue') },
        { path: 'quiz-monitoring/:id', name: 'admin-quiz-monitoring-detail', component: () => import('@/pages/admin/AdminQuizMonitoringDetailView.vue') },
        { path: 'analytics', name: 'admin-analytics', component: () => import('@/pages/admin/AnalyticsView.vue') },
        { path: 'ai-monitoring', name: 'admin-ai-monitoring', component: () => import('@/pages/admin/AIMonitoringView.vue') },
        { path: 'profile', name: 'admin-profile', component: () => import('@/pages/admin/AdminProfileView.vue') },
        { path: 'settings', name: 'admin-settings', component: () => import('@/pages/admin/AdminSettingsView.vue') },
      ]
    },
  ],
})

import { useAuthStore } from '@/stores/auth'

router.beforeEach((to, from) => {
  const authStore = useAuthStore()
  
  // Guard for protected routes
  if (to.meta.requiresAuth && !authStore.isAuthenticated) {
    return '/auth/login'
  }

  // Guard for roles
  if (to.meta.requiresAuth && to.meta.role) {
    if (authStore.role !== to.meta.role) {
      // Mismatch role, redirect to their proper dashboard
      if (authStore.role) {
        return `/${authStore.role}/dashboard`
      }
      return '/auth/login'
    }
  }

  // Prevent logged-in users from seeing auth pages
  if (to.path.startsWith('/auth') && authStore.isAuthenticated) {
    if (authStore.role) {
      return `/${authStore.role}/dashboard`
    }
  }
})

export default router
