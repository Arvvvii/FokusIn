import { createRouter, createWebHistory } from 'vue-router'
import AuthLayout from '@/layouts/AuthLayout.vue'
import DashboardLayout from '@/layouts/DashboardLayout.vue'

const router = createRouter({
  history: createWebHistory(import.meta.env.BASE_URL),
  routes: [
    {
      path: '/',
      name: 'landing',
      component: () => import('@/pages/public/HomeLandingView.vue')
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
      ]
    },
    // Tutor Routes
    {
      path: '/tutor',
      component: DashboardLayout,
      children: [
        { path: 'dashboard', name: 'tutor-dashboard', component: () => import('@/pages/tutor/DashboardTutorView.vue') },
        { path: 'verify-answer', name: 'tutor-verify-answer', component: () => import('@/pages/tutor/VerifyAnswerView.vue') },
        { path: 'mentoring', name: 'tutor-mentoring', component: () => import('@/pages/tutor/MentoringManagementView.vue') },
        { path: 'profile', name: 'tutor-profile', component: () => import('@/pages/tutor/TutorProfileView.vue') },
      ]
    },
    // Admin Routes
    {
      path: '/admin',
      component: DashboardLayout,
      children: [
        { path: 'dashboard', name: 'admin-dashboard', component: () => import('@/pages/admin/DashboardAdminView.vue') },
        { path: 'users', name: 'admin-users', component: () => import('@/pages/admin/ManageUsersView.vue') },
        { path: 'categories', name: 'admin-categories', component: () => import('@/pages/admin/ManageCategoriesView.vue') },
        { path: 'reports', name: 'admin-reports', component: () => import('@/pages/admin/ManageReportsView.vue') },
        { path: 'analytics', name: 'admin-analytics', component: () => import('@/pages/admin/AnalyticsView.vue') },
      ]
    },
  ],
})

router.beforeEach((to, from, next) => {
  const token = localStorage.getItem('token')
  const role = localStorage.getItem('role')

  // 1. Jika mengakses landing page ('/') tetapi sudah login, arahkan ke dashboard masing-masing
  if (to.path === '/') {
    if (token && role) {
      if (role === 'admin') {
        return next('/admin/dashboard')
      } else if (role === 'tutor') {
        return next('/tutor/dashboard')
      } else {
        return next('/pelajar/dashboard')
      }
    }
  }

  // 2. Jika mengakses halaman auth tetapi sudah login, arahkan ke dashboard masing-masing
  if (to.path.startsWith('/auth')) {
    if (token && role) {
      if (role === 'admin') {
        return next('/admin/dashboard')
      } else if (role === 'tutor') {
        return next('/tutor/dashboard')
      } else {
        return next('/pelajar/dashboard')
      }
    }
    return next()
  }

  // 3. Proteksi rute berdasarkan autentikasi dan role
  if (to.path !== '/' && !to.path.startsWith('/auth')) {
    // Jika belum login, paksa ke halaman login
    if (!token) {
      return next('/auth/login')
    }

    // Hanya admin yang boleh masuk ke rute /admin/*
    if (to.path.startsWith('/admin') && role !== 'admin') {
      if (role === 'tutor') {
        return next('/tutor/dashboard')
      } else {
        return next('/pelajar/dashboard')
      }
    }

    // Hanya tutor yang boleh masuk ke rute /tutor/*
    if (to.path.startsWith('/tutor') && role !== 'tutor') {
      if (role === 'admin') {
        return next('/admin/dashboard')
      } else {
        return next('/pelajar/dashboard')
      }
    }

    // Hanya pelajar yang boleh masuk ke rute /pelajar/*
    if (to.path.startsWith('/pelajar') && role !== 'pelajar') {
      if (role === 'admin') {
        return next('/admin/dashboard')
      } else if (role === 'tutor') {
        return next('/tutor/dashboard')
      }
    }
  }

  next()
})

export default router
