<?php
// app/Http/Controllers/AnswerController.php
namespace App\Http\Controllers;

use App\Models\Quiz;
use App\Models\UserAnswer;
use App\Models\QuizResult;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AnswerController extends Controller
{
    // Show the quiz or the result if already submitted
    public function show(Quiz $quiz)
    {
        $user = Auth::user();

        // Check if the user already submitted the quiz
        $result = QuizResult::where('user_id', $user->id)
                            ->where('quiz_id', $quiz->id)
                            ->first();

        // If the user has already submitted the quiz, redirect to the result page
        if ($result) {
            return redirect()->route('quiz.result', $quiz->id);
        }

        // Otherwise, show the quiz
        return view('answer', compact('quiz'));
    }


    // Handle quiz submission
    public function submit(Request $request, Quiz $quiz)
    {
        $user = Auth::user();
        $score = 0;
        $totalQuestions = count($quiz->questions);

        // Delete any previous answers for this user/quiz (if retrying)
        UserAnswer::where('user_id', $user->id)->where('quiz_id', $quiz->id)->delete();

        foreach ($quiz->questions as $question) {
            $selectedAnswer = $request->input('question_' . $question->id);
            $isCorrect = $selectedAnswer === $question->correct_answer;

            // Save user answer
            UserAnswer::create([
                'user_id' => $user->id,
                'quiz_id' => $quiz->id,
                'question_id' => $question->id,
                'selected_answer' => $selectedAnswer
            ]);

            // Update score
            if ($isCorrect) {
                $score++;
            }
        }

        // Calculate percentage score
        $finalScore = round(($score / $totalQuestions) * 100);

        // Save result
        QuizResult::updateOrCreate(
            ['user_id' => $user->id, 'quiz_id' => $quiz->id],
            ['score' => $finalScore]
        );
        // Check if chapter is completed
        app(ChapterCompletionController::class)->checkCompletion($quiz->chapter_id, $quiz->course_id);
        
        return redirect()->route('quiz.result', $quiz->id);
    }

    // Display quiz result
    public function result(Quiz $quiz)
    {
        $user = Auth::user();
        $userAnswers = UserAnswer::where('user_id', $user->id)->where('quiz_id', $quiz->id)->get();
        $result = QuizResult::where('user_id', $user->id)->where('quiz_id', $quiz->id)->first();


        // Pass user answers and result to the view
        return view('answer', compact('quiz', 'userAnswers', 'result'));
    }


}
