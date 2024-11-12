<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create or Edit Quiz Questions</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>
<body class="bg-gray-100 p-10">

    <!-- Quiz Title -->
    <div class="bg-white p-6 rounded-lg shadow-md max-w-3xl mx-auto">
        <h1 class="text-2xl font-bold mb-4">{{ $quiz->title }}</h1>

        <!-- Questions Container -->
        <div id="questions-container">
            @foreach($quiz->questions as $question)
                <div class="bg-white p-6 rounded-lg shadow-md mt-6" id="question-{{ $question->id }}">
                    <h2 class="text-xl font-semibold mb-4">Question {{ $loop->index + 1 }}: {{ $question->question }}</h2>
                    <ul class="list-disc pl-6">
                        <li><strong>Answer 1:</strong> {{ $question->option1 }}</li>
                        <li><strong>Answer 2:</strong> {{ $question->option2 }}</li>
                        <li><strong>Answer 3:</strong> {{ $question->option3 }}</li>
                        <li><strong>Answer 4:</strong> {{ $question->option4 }}</li>
                    </ul>
                    <p class="mt-2"><strong>Correct Answer:</strong> {{ $question->correct_answer }}</p>
                    <hr class="my-4">
                    <a href="javascript:void(0);" onclick="editQuestion({{ $question->id }})" class="bg-indigo-500 text-white px-4 py-2 rounded-lg hover:bg-indigo-700">Edit</a>
                    <a href="javascript:void(0);" onclick="deleteQuestion({{ $question->id }})" class="bg-red-500 text-white px-4 py-2 rounded-lg hover:bg-red-700 ml-4">Delete</a>
                </div>
            @endforeach
        </div>

        <!-- New Question Form -->
        <div class="bg-white p-6 rounded-lg shadow-md mt-6">
            <h2 class="text-xl font-semibold mb-4">New Question</h2>
            <form id="new-question-form" action="{{ route('questions.store', ['quiz' => $quiz->id]) }}" method="POST">
                @csrf
                <div class="mb-4">
                    <label for="question" class="block text-gray-700">Question</label>
                    <input type="text" name="question" id="question" class="w-full mt-2 p-2 border rounded-lg" placeholder="Enter the question" required>
                </div>
                <div class="grid grid-cols-2 gap-4">
                    <div class="mb-4">
                        <label for="answer1" class="block text-gray-700">Answer 1</label>
                        <input type="text" name="option1" id="answer1" class="w-full mt-2 p-2 border rounded-lg" placeholder="Answer 1" required>
                    </div>
                    <div class="mb-4">
                        <label for="answer2" class="block text-gray-700">Answer 2</label>
                        <input type="text" name="option2" id="answer2" class="w-full mt-2 p-2 border rounded-lg" placeholder="Answer 2" required>
                    </div>
                    <div class="mb-4">
                        <label for="answer3" class="block text-gray-700">Answer 3</label>
                        <input type="text" name="option3" id="answer3" class="w-full mt-2 p-2 border rounded-lg" placeholder="Answer 3" required>
                    </div>
                    <div class="mb-4">
                        <label for="answer4" class="block text-gray-700">Answer 4</label>
                        <input type="text" name="option4" id="answer4" class="w-full mt-2 p-2 border rounded-lg" placeholder="Answer 4" required>
                    </div>
                </div>
                <div class="mb-4">
                    <label for="correct-answer" class="block text-gray-700">Correct Answer</label>
                    <select name="correct_answer" id="correct-answer" class="w-full mt-2 p-2 border rounded-lg" required>
                        <option value="option1">Answer 1</option>
                        <option value="option2">Answer 2</option>
                        <option value="option3">Answer 3</option>
                        <option value="option4">Answer 4</option>
                    </select>
                </div>
                <div class="flex justify-end">
                    <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-lg">Add Question</button>
                </div>
            </form>
        </div>

    </div>

    <!-- Edit Question Modal -->
    <div id="editModal" class="fixed z-10 inset-0 hidden overflow-y-auto">
        <div class="flex items-center justify-center min-h-screen">
            <div class="bg-white p-6 rounded-lg shadow-md max-w-lg w-full">
                <h2 class="text-xl font-semibold mb-4">Edit Question</h2>
                <form id="edit-question-form" method="POST">
                    @csrf
                    @method('PUT')
                    <input type="hidden" id="edit-question-id">
                    <div class="mb-4">
                        <label for="edit-question" class="block text-gray-700">Question</label>
                        <input type="text" name="question" id="edit-question" class="w-full mt-2 p-2 border rounded-lg" required>
                    </div>
                    <div class="grid grid-cols-2 gap-4">
                        <div class="mb-4">
                            <label for="edit-answer1" class="block text-gray-700">Answer 1</label>
                            <input type="text" name="option1" id="edit-answer1" class="w-full mt-2 p-2 border rounded-lg" required>
                        </div>
                        <div class="mb-4">
                            <label for="edit-answer2" class="block text-gray-700">Answer 2</label>
                            <input type="text" name="option2" id="edit-answer2" class="w-full mt-2 p-2 border rounded-lg" required>
                        </div>
                        <div class="mb-4">
                            <label for="edit-answer3" class="block text-gray-700">Answer 3</label>
                            <input type="text" name="option3" id="edit-answer3" class="w-full mt-2 p-2 border rounded-lg" required>
                        </div>
                        <div class="mb-4">
                            <label for="edit-answer4" class="block text-gray-700">Answer 4</label>
                            <input type="text" name="option4" id="edit-answer4" class="w-full mt-2 p-2 border rounded-lg" required>
                        </div>
                    </div>
                    <div class="mb-4">
                        <label for="edit-correct-answer" class="block text-gray-700">Correct Answer</label>
                        <select name="correct_answer" id="edit-correct-answer" class="w-full mt-2 p-2 border rounded-lg" required>
                            <option value="option1">Answer 1</option>
                            <option value="option2">Answer 2</option>
                            <option value="option3">Answer 3</option>
                            <option value="option4">Answer 4</option>
                        </select>
                    </div>
                    <div class="flex justify-end">
                        <button type="button" onclick="closeModal()" class="bg-gray-500 text-white px-4 py-2 rounded-lg mr-2">Cancel</button>
                        <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-lg">Update Question</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script>
        // Open edit modal with the question data
        function editQuestion(questionId) {
            axios.get(`/quizzes/{{ $quiz->id }}/questions/${questionId}/edit`)
                .then(response => {
                    const question = response.data;
                    document.getElementById('edit-question-id').value = question.id;
                    document.getElementById('edit-question').value = question.question;
                    document.getElementById('edit-answer1').value = question.option1;
                    document.getElementById('edit-answer2').value = question.option2;
                    document.getElementById('edit-answer3').value = question.option3;
                    document.getElementById('edit-answer4').value = question.option4;
                    document.getElementById('edit-correct-answer').value = question.correct_answer;
                    document.getElementById('editModal').classList.remove('hidden');
                });
        }

        // Close modal
        function closeModal() {
            document.getElementById('editModal').classList.add('hidden');
        }

        // Handle the form submission for updating the question
        document.getElementById('edit-question-form').addEventListener('submit', function(e) {
            e.preventDefault();
            const questionId = document.getElementById('edit-question-id').value;
            const formData = new FormData(this);

            axios.post(`/quizzes/{{ $quiz->id }}/questions/${questionId}`, formData)
                .then(response => {
                    closeModal();
                    location.reload();  // Reload the page to reflect changes
                });
        });

        // Delete a question
        function deleteQuestion(questionId) {
            Swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    axios.delete(`/quizzes/{{ $quiz->id }}/questions/${questionId}`)
                        .then(response => {
                            document.getElementById(`question-${questionId}`).remove();
                            Swal.fire('Deleted!', 'Your question has been deleted.', 'success');
                        });
                }
            });
        }
    </script>

</body>
</html>
