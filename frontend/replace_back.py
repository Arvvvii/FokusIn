import os
import re

files_config = [
    # (filepath, route, label)
    ("src/pages/pelajar/PostDetailView.vue", ":to=\"baseForumRoute\"", "Kembali ke Forum"),
    ("src/pages/pelajar/MaterialDetailView.vue", ":to=\"baseMaterialsRoute\"", "Kembali ke Materi"),
    ("src/pages/pelajar/QuizResultView.vue", "to=\"/pelajar/quiz\"", "Kembali ke Kuis"),
    ("src/pages/pelajar/QuizPlayView.vue", "to=\"/pelajar/quiz\"", "Kembali ke Kuis"),
    ("src/pages/pelajar/AIAnalyzerView.vue", "to=\"/pelajar/ai-analyzer\"", "Kembali ke Analisis AI"),
    ("src/pages/pelajar/CreateAIAnalysisView.vue", "to=\"/pelajar/ai-analyzer\"", "Kembali ke Analisis AI"),
    ("src/pages/pelajar/MentorProfileView.vue", "to=\"/pelajar/mentoring\"", "Kembali ke Mentoring"),
    ("src/pages/pelajar/SessionRoomView.vue", "to=\"/pelajar/mentoring\"", "Kembali ke Mentoring"),
    ("src/pages/pelajar/EditProfileView.vue", "to=\"/pelajar/profile\"", "Kembali ke Profil"),
    ("src/pages/pelajar/CreatePostView.vue", ":to=\"baseForumRoute\"", "Kembali ke Forum"),
    ("src/pages/pelajar/CreateMaterialView.vue", ":to=\"baseMaterialsRoute\"", "Kembali ke Materi"),
    
    ("src/pages/tutor/VerifyAnswerView.vue", "to=\"/tutor/dashboard\"", "Kembali ke Dashboard"),
    ("src/pages/tutor/UploadExamView.vue", "to=\"/tutor/materials\"", "Kembali ke Materi"),
    ("src/pages/tutor/AIValidationView.vue", "to=\"/tutor/dashboard\"", "Kembali ke Dashboard"),
    ("src/pages/tutor/TutorMentoringDetailView.vue", "to=\"/tutor/mentoring\"", "Kembali ke Mentoring"),
    ("src/pages/tutor/TutorAnalyticsView.vue", "to=\"/tutor/dashboard\"", "Kembali ke Dashboard"),
    ("src/pages/tutor/TutorSettingsView.vue", "to=\"/tutor/profile\"", "Kembali ke Profil"),
    ("src/pages/tutor/TutorValidationDetailView.vue", "to=\"/tutor/ai-validation\"", "Kembali ke Validasi AI"),
    
    ("src/pages/admin/ManageReportsView.vue", "to=\"/admin/reports\"", "Kembali ke Daftar Laporan"),
    ("src/pages/admin/ModerationDetailView.vue", "to=\"/admin/moderation\"", "Kembali ke Antrean"),
    ("src/pages/admin/AdminModerationDetailView.vue", "to=\"/admin/moderation\"", "Kembali ke Antrean"),
    ("src/pages/admin/UserDetailView.vue", "to=\"/admin/users\"", "Kembali ke Pengguna"),
    ("src/pages/admin/TutorDetailView.vue", "to=\"/admin/tutors\"", "Kembali ke Tutor"),
    ("src/pages/admin/AdminCreateUserView.vue", "to=\"/admin/users\"", "Kembali ke Pengguna"),
    ("src/pages/admin/AdminCreateTutorView.vue", "to=\"/admin/tutors\"", "Kembali ke Tutor"),
    ("src/pages/admin/MentoringDetailView.vue", "to=\"/admin/mentoring\"", "Kembali ke Mentoring"),
    ("src/pages/admin/AdminMentoringDetailView.vue", "to=\"/admin/mentoring\"", "Kembali ke Mentoring"),
    ("src/pages/admin/AdminSettingsView.vue", "to=\"/admin/dashboard\"", "Kembali ke Dashboard"),
    ("src/pages/admin/QuizMonitoringDetailView.vue", "to=\"/admin/quiz-monitoring\"", "Kembali ke Daftar Kuis"),
    ("src/pages/admin/AdminQuizMonitoringDetailView.vue", "to=\"/admin/quiz-monitoring\"", "Kembali ke Pemantauan Kuis"),
]

template = """<div class="mb-6 flex items-center gap-2">
  <RouterLink
    {to_attr}
    class="text-sm font-bold text-slate-400 hover:text-[#334EAC] transition-colors flex items-center gap-1 w-fit bg-white/50 px-3 py-1.5 rounded-lg border border-slate-200/50"
  >
    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="m15 18-6-6 6-6"></path></svg>
    {label}
  </RouterLink>
</div>"""

def process_file(filepath, to_attr, label):
    if not os.path.exists(filepath):
        print(f"File not found: {filepath}")
        return

    with open(filepath, 'r', encoding='utf-8') as f:
        content = f.read()

    replacement = template.format(to_attr=to_attr, label=label)
    
    # Very heuristic regex: match from first <RouterLink near the top that contains 'Kembali' or is a back button, up to its closing tag or enclosing div.
    # A safer approach: find the block <div class="mb-6 flex items-center gap-2">...</div> if it exists.
    # Otherwise, find the first <RouterLink> containing 'Kembali'.
    
    # Try to find existing div with mb-6 and RouterLink inside it:
    pattern_div = re.compile(r'<div[^>]*mb-6[^>]*>.*?<RouterLink[^>]*Kembali.*?</RouterLink>\s*</div>', re.DOTALL | re.IGNORECASE)
    match = pattern_div.search(content)
    if match:
        new_content = content[:match.start()] + replacement + content[match.end():]
        with open(filepath, 'w', encoding='utf-8') as f:
            f.write(new_content)
        print(f"Updated {filepath} via pattern_div")
        return
        
    # Try finding the first RouterLink with Kembali
    pattern_routerlink = re.compile(r'<RouterLink[^>]*>.*?Kembali.*?</RouterLink>', re.DOTALL | re.IGNORECASE)
    match = pattern_routerlink.search(content)
    if match:
        new_content = content[:match.start()] + replacement + content[match.end():]
        with open(filepath, 'w', encoding='utf-8') as f:
            f.write(new_content)
        print(f"Updated {filepath} via pattern_routerlink")
        return

    print(f"Could not find back button in {filepath}")

for f_config in files_config:
    process_file(*f_config)
