<?php

namespace App\Http\Controllers;

use App\Models\Question;
use App\Models\Quiz;
use Illuminate\Http\Request;

class QuizQuestionController extends Controller
{
    public function create(Quiz $quiz)
    {
        return view('questioncreate', ['quiz' => $quiz]);
    }

    // Store new question
    public function store(Request $request, Quiz $quiz)
    {
        $validatedData = $request->validate([
            'question' => 'required|string',
            'option1' => 'required|string',
            'option2' => 'required|string',
            'option3' => 'required|string',
            'option4' => 'required|string',
            'correct_answer' => 'required|string',
        ]);

        $quiz->questions()->create($validatedData);

        return redirect()->back()->with('success', 'Question added successfully.');
    }

    // Fetch question for editing
    public function edit(Quiz $quiz, Question $question)
    {
        return response()->json($question);
    }

    // Update existing question
    public function update(Request $request, Quiz $quiz, Question $question)
    {
        $validatedData = $request->validate([
            'question' => 'required|string',
            'option1' => 'required|string',
            'option2' => 'required|string',
            'option3' => 'required|string',
            'option4' => 'required|string',
            'correct_answer' => 'required|string',
        ]);

        $question->update($validatedData);

        return response()->json(['message' => 'Question updated successfully']);
    }

    // Delete question
    public function destroy(Quiz $quiz, Question $question)
    {
        $question->delete();

        return response()->json(['message' => 'Question deleted successfully']);
    }
}

