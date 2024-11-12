<?php

namespace App\Http\Controllers;

use App\Models\ChapterCompletion;
use App\Models\AssignmentSubmission;
use App\Models\QuizResult;
use App\Models\VideoComplete;
use Illuminate\Support\Facades\Auth;

class ChapterCompletionController extends Controller
{
    public function checkCompletion($chapterId, $courseId)
    {
        $userId = Auth::user()->id;

        // Check video completion
        $videoComplete = VideoComplete::where('user_id', $userId)
                                      ->where('chapter_id', $chapterId)
                                      ->where('is_watched', true)
                                      ->exists();

        // Check assignment submission completion (ensure assignments are linked to chapters)
        $assignmentComplete = AssignmentSubmission::where('user_id', $userId)
                                                  ->whereHas('assignment', function($query) use ($chapterId) {
                                                      $query->where('chapter_id', $chapterId);
                                                  })
                                                  ->where('is_completed', true)
                                                  ->exists();

        // Check quiz result (ensure quizzes are linked to chapters)
        $quizComplete = QuizResult::where('user_id', $userId)
                                  ->whereHas('quiz', function($query) use ($chapterId) {
                                      $query->where('chapter_id', $chapterId);
                                  })
                                  ->where('score', '>=', 50)
                                  ->exists();

        // Log debug information
        // \Log::info([
        //     'videoComplete' => $videoComplete,
        //     'assignmentComplete' => $assignmentComplete,
        //     'quizComplete' => $quizComplete,
        // ]);

        if ($videoComplete && $assignmentComplete && $quizComplete) {
            // Insert into chapter completion if not already completed
            ChapterCompletion::updateOrCreate([
                'user_id' => $userId,
                'chapter_id' => $chapterId,
                'course_id' => $courseId,
            ]);

            return response()->json(['completed' => true]);
        }

        return response()->json(['completed' => false]);
    }

    public function checkCompletionStatus($chapterId, $courseId)
    {
        $userId = Auth::user()->id;

        // Check if chapter is already marked as completed
        $isCompleted = ChapterCompletion::where('user_id', $userId)
                                        ->where('chapter_id', $chapterId)
                                        ->where('course_id', $courseId)
                                        ->exists();

        return response()->json(['completed' => $isCompleted]);
    }
}
