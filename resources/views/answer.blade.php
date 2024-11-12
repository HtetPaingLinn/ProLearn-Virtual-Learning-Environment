<!-- resources/views/quiz/answer.blade.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quiz</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 p-10">
    <div class="bg-white p-6 rounded-lg shadow-md max-w-3xl mx-auto">
        <h1 class="text-2xl font-bold mb-4">{{ $quiz->title }}</h1>

        @if(isset($result))
            <!-- Result Section -->
            <h2 class="text-xl font-semibold mb-4">Your Result: {{ $result->score }}%</h2>
            <div class="mt-4">
                @foreach($quiz->questions as $question)
                    <div class="mb-6">
                        <h3 class="text-lg font-semibold">Q{{ $loop->index + 1 }}: {{ $question->question }}</h3>
                        <ul class="list-disc pl-6">
                            <li class="{{ $userAnswers->where('question_id', $question->id)->first()->selected_answer == 'option1' ? ($question->correct_answer == 'option1' ? 'text-green-500' : 'text-red-500') : '' }}">
                                <strong>Answer 1:</strong> {{ $question->option1 }}
                            </li>
                            <li class="{{ $userAnswers->where('question_id', $question->id)->first()->selected_answer == 'option2' ? ($question->correct_answer == 'option2' ? 'text-green-500' : 'text-red-500') : '' }}">
                                <strong>Answer 2:</strong> {{ $question->option2 }}
                            </li>
                            <li class="{{ $userAnswers->where('question_id', $question->id)->first()->selected_answer == 'option3' ? ($question->correct_answer == 'option3' ? 'text-green-500' : 'text-red-500') : '' }}">
                                <strong>Answer 3:</strong> {{ $question->option3 }}
                            </li>
                            <li class="{{ $userAnswers->where('question_id', $question->id)->first()->selected_answer == 'option4' ? ($question->correct_answer == 'option4' ? 'text-green-500' : 'text-red-500') : '' }}">
                                <strong>Answer 4:</strong> {{ $question->option4 }}
                            </li>
                        </ul>
                        <p class="mt-2"><strong>Correct Answer:</strong> {{ $question->{$question->correct_answer} }}</p>
                    </div>
                @endforeach
            </div>
        @else
            <!-- Answer Section -->
            <form action="{{ route('quiz.submit', $quiz->id) }}" method="POST">
                @csrf
                @foreach($quiz->questions as $question)
                    <div class="mb-6">
                        <h3 class="text-lg font-semibold">Q{{ $loop->index + 1 }}: {{ $question->question }}</h3>
                        <div class="mt-2">
                            <label>
                                <input type="radio" name="question_{{ $question->id }}" value="option1" required> {{ $question->option1 }}
                            </label>
                        </div>
                        <div class="mt-2">
                            <label>
                                <input type="radio" name="question_{{ $question->id }}" value="option2" required> {{ $question->option2 }}
                            </label>
                        </div>
                        <div class="mt-2">
                            <label>
                                <input type="radio" name="question_{{ $question->id }}" value="option3" required> {{ $question->option3 }}
                            </label>
                        </div>
                        <div class="mt-2">
                            <label>
                                <input type="radio" name="question_{{ $question->id }}" value="option4" required> {{ $question->option4 }}
                            </label>
                        </div>
                    </div>
                @endforeach
                <div class="flex justify-end">
                    <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-lg">Submit Quiz</button>
                </div>
            </form>
        @endif
    </div>
</body>
</html>
