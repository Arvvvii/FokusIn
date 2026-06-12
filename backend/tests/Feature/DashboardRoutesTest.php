<?php

namespace Tests\Feature;

use App\Models\User;
use App\Models\MentoringSession;
use App\Models\Post;
use App\Models\QuizAttempt;
use App\Models\TutorReview;
use App\Models\Category;
use App\Models\QuizSet;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Laravel\Sanctum\Sanctum;
use Tests\TestCase;

class DashboardRoutesTest extends TestCase
{
    use RefreshDatabase;

    public function test_student_dashboard_requires_authentication()
    {
        $response = $this->getJson('/api/student/dashboard');
        $response->assertStatus(401);
    }

    public function test_student_dashboard_denies_non_students()
    {
        $tutor = User::factory()->create(['role' => 'tutor']);
        Sanctum::actingAs($tutor);

        $response = $this->getJson('/api/student/dashboard');
        $response->assertStatus(403);
    }

    public function test_student_dashboard_returns_correct_statistics()
    {
        $student = User::factory()->create(['role' => 'pelajar']);
        $tutor = User::factory()->create(['role' => 'tutor']);
        Sanctum::actingAs($student);

        // Seed mentoring session
        MentoringSession::create([
            'student_id' => $student->id,
            'tutor_id' => $tutor->id,
            'status' => 'confirmed',
            'title' => 'Intro to Programming',
            'description' => 'Basics of logic',
            'duration_minutes' => 60,
        ]);

        // Seed post
        Post::create([
            'user_id' => $student->id,
            'title' => 'Test Title',
            'content' => 'Test Content',
            'type' => 'question',
        ]);

        // Seed category and quiz set
        $category = Category::create([
            'name' => 'Programming',
            'slug' => 'programming',
        ]);

        $quizSet = QuizSet::create([
            'category_id' => $category->id,
            'title' => 'PHP Basics',
        ]);

        // Seed quiz attempt
        QuizAttempt::create([
            'user_id' => $student->id,
            'quiz_set_id' => $quizSet->id,
            'score' => 85,
            'completed_at' => now(),
        ]);

        $response = $this->getJson('/api/student/dashboard');

        $response->assertStatus(200)
            ->assertJson([
                'total_mentoring_sessions' => 1,
                'total_forum_posts' => 1,
                'total_quiz_attempts' => 1,
            ]);
    }

    public function test_tutor_dashboard_requires_authentication()
    {
        $response = $this->getJson('/api/tutor/dashboard');
        $response->assertStatus(401);
    }

    public function test_tutor_dashboard_denies_non_tutors()
    {
        $student = User::factory()->create(['role' => 'pelajar']);
        Sanctum::actingAs($student);

        $response = $this->getJson('/api/tutor/dashboard');
        $response->assertStatus(403);
    }

    public function test_tutor_dashboard_returns_correct_statistics()
    {
        $tutor = User::factory()->create(['role' => 'tutor']);
        $student = User::factory()->create(['role' => 'pelajar']);
        Sanctum::actingAs($tutor);

        // Seed mentoring sessions
        $sessionPending = MentoringSession::create([
            'tutor_id' => $tutor->id,
            'student_id' => $student->id,
            'status' => 'pending',
            'title' => 'Algorithms',
            'description' => 'Sorting and searching',
            'duration_minutes' => 90,
        ]);
        $sessionCompleted = MentoringSession::create([
            'tutor_id' => $tutor->id,
            'student_id' => $student->id,
            'status' => 'completed',
            'title' => 'Algorithms II',
            'description' => 'Trees and graphs',
            'duration_minutes' => 90,
        ]);
        
        // Seed review
        TutorReview::create([
            'tutor_id' => $tutor->id,
            'student_id' => $student->id,
            'mentoring_session_id' => $sessionCompleted->id,
            'rating' => 5,
            'review' => 'Great tutor!',
        ]);

        $response = $this->getJson('/api/tutor/dashboard');

        $response->assertStatus(200)
            ->assertJson([
                'pending_requests' => 1,
                'completed_sessions' => 1,
                'average_rating' => 5.0,
            ]);
    }

    public function test_tutor_analytics_returns_correct_data()
    {
        $tutor = User::factory()->create(['role' => 'tutor']);
        Sanctum::actingAs($tutor);

        $response = $this->getJson('/api/tutor/analytics');

        $response->assertStatus(200)
            ->assertJsonStructure([
                'sessions' => ['total', 'pending', 'confirmed', 'completed'],
                'students' => ['total_unique'],
                'reviews' => ['average_rating', 'total_reviews', 'recent'],
            ]);
    }
}
