<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $course->title }}</title>
    <!-- Tailwind CSS -->
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <!-- Preline UI CSS -->
    <link href="https://cdn.jsdelivr.net/npm/@preline/plugin@1.7.8/dist/preline.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
</head>

<body class="bg-gray-100 font-sans">

    <!-- Display flash messages -->
    <div class="space-y-5">
        @if (session('success'))
            <div class="bg-teal-50 border-t-2 border-teal-500 rounded-lg p-4" role="alert" tabindex="-1"
                aria-labelledby="success-alert">
                <div class="flex">
                    <div class="shrink-0">
                        <!-- Icon -->
                        <span
                            class="inline-flex justify-center items-center size-8 rounded-full border-4 border-teal-100 bg-teal-200 text-teal-800">
                            <svg class="shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24"
                                height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                stroke-linecap="round" stroke-linejoin="round">
                                <path d="M12 22c5.523 0 10-4.477 10-10S17.523 2 12 2 2 6.477 2 12s4.477 10 10 10z">
                                </path>
                                <path d="m9 12 2 2 4-4"></path>
                            </svg>
                        </span>
                        <!-- End Icon -->
                    </div>
                    <div class="ms-3">
                        <h3 id="success-alert" class="text-gray-800 font-semibold">
                            Success!
                        </h3>
                        <p class="text-sm text-gray-700">
                            {{ session('success') }}
                        </p>
                    </div>
                </div>
            </div>
        @endif

        @if (session('error'))
            <div class="bg-red-50 border-s-4 border-red-500 p-4" role="alert" tabindex="-1"
                aria-labelledby="error-alert">
                <div class="flex">
                    <div class="shrink-0">
                        <!-- Icon -->
                        <span
                            class="inline-flex justify-center items-center size-8 rounded-full border-4 border-red-100 bg-red-200 text-red-800">
                            <svg class="shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24"
                                height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                stroke-linecap="round" stroke-linejoin="round">
                                <path d="M18 6 6 18"></path>
                                <path d="m6 6 12 12"></path>
                            </svg>
                        </span>
                        <!-- End Icon -->
                    </div>
                    <div class="ms-3">
                        <h3 id="error-alert" class="text-gray-800 font-semibold">
                            Error!
                        </h3>
                        <p class="text-sm text-gray-700">
                            {{ session('error') }}
                        </p>
                    </div>
                </div>
            </div>
        @endif
    </div>

    <!-- Main container -->
    <div class="flex h-screen">
        <!-- Sidebar -->
        <aside id="sidebar" class="w-64 bg-white shadow-md hidden sm:block">
            <a href="/course/{{ $course->id }}"
                class="block w-full px-4 py-2 text-gray-700 hover:bg-gray-100 hover:text-gray-900">
                <svg class="inline-block w-6 h-6 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                    xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M11 17l-5-5m0 0l5-5m-5 5h12">
                    </path>
                </svg>
                Back to Course
            </a>
            <div class="h-full">
                <div class="p-4 border-b">
                    <h2 class="text-xl font-bold">Course Chapters</h2>
                </div>
                <nav class="p-4">
                    <ul id="chapterList" class="space-y-2">
                        @foreach ($course->chapters as $index => $chapter)
                            <li>
                                <a href="javascript:void(0);" onclick="loadChapter({{ $index }});"
                                    class="flex items-center p-2 text-gray-700 rounded-lg hover:bg-gray-100">
                                    <i class="fas fa-book mr-2 text-blue-500"></i> {{ $chapter->title }}
                                </a>
                            </li>
                        @endforeach
                    </ul>
                </nav>
            </div>
        </aside>

        <!-- Main content -->
        <main class="flex-1 p-6 overflow-auto">
            <button id="sidebarToggle" class="sm:hidden p-2 bg-blue-500 text-white rounded-lg mb-4">
                <i class="fas fa-bars"></i> Toggle Sidebar
            </button>

            <div class="bg-white p-6 rounded-lg shadow-md">
                <div class="flex justify-between items-center mb-4">
                    <h1 id="chapterTitle" class="text-2xl font-bold">{{ $course->chapters->first()->title }}</h1>
                    <div class="flex space-x-2">
                        <!-- Check if the user is a teacher -->
                        @if (auth()->user()->role->name == 'teacher')
                            <button class="px-4 py-2 bg-blue-500 text-white rounded-lg hover:bg-blue-700"
                                onclick="document.getElementById('videoUpload').click();">
                                <i class="fas fa-upload"></i> Upload Video
                            </button>
                            <input type="file" id="videoUpload" class="hidden"
                                onchange="uploadVideo({{ $course->chapters->first()->id }})">
                        @endif

                        @if (auth()->user()->role->name == 'student')
                            <!-- New "Check Chapter Completion" button -->
                            @php
                                $checkChapterCompletion = App\Models\ChapterCompletion::where('chapter_id', $course->chapters->first()->id)->where('user_id', auth()->user()->id)->first();
                            @endphp
                            @if ($checkChapterCompletion)
                            <button id="checkCompletionButton"
                            class="px-4 py-2 bg-green-500 text-white rounded-lg disabled"
                            onclick="checkChapterCompletion({{ $course->chapters->first()->id }}, {{ $course->id }})">
                            <i class="fas fa-check-circle"></i> Chapter Completed
                        </button>
                        @else
                        <button id="checkCompletionButton"
                        class="px-4 py-2 bg-blue-500 text-white rounded-lg hover:bg-blue-700"
                        onclick="checkChapterCompletion({{ $course->chapters->first()->id }}, {{ $course->id }})">
                        Check Chapter Completion
                        @endif
                            <button class="px-4 py-2 bg-yellow-500 text-white rounded-lg hover:bg-yellow-700">
                                <i class="fas fa-download"></i> Download Materials
                            </button>
                        @endif
                    </div>
                </div>
                <div class="relative">
                    <video id="chapterVideo" class="w-full h-auto rounded-lg shadow-md" controls>
                        <source
                            src="{{ $course->chapters->first()->video_path ? asset('storage/' . $course->chapters->first()->video_path) : $course->chapters->first()->video_url }}"
                            type="video/mp4">
                        Your browser does not support the video tag.
                    </video>
                </div>

                @if (auth()->user()->role->name == 'student')
                    @php
                        $isCompleted = \App\Models\VideoComplete::where('user_id', Auth::id())
                            ->where('chapter_id', $chapter->id)
                            ->where('is_watched', true)
                            ->exists();
                    @endphp

                    <div class="flex justify-end mt-4">
                        <button id="markCompleteButton"
                            class="px-4 py-2 text-white rounded-lg
            @if ($isCompleted) bg-gray-500 @else bg-green-500 hover:bg-green-700 hidden @endif"
                            @if ($isCompleted) disabled @endif>
                            <i class="fas fa-check-circle"></i>
                            @if ($isCompleted)
                                Completed
                            @else
                                Mark as Complete
                            @endif
                        </button>
                    </div>
                @endif



            </div>

            <!-- Assignments and Quizzes section -->
            <div class="mt-6 bg-white p-6 rounded-lg shadow-md">
                <h2 class="text-xl font-bold">Assignments and Quizzes</h2>
                <div id="assignmentsQuizzes"></div>
            </div>

            <div class="mt-4 flex justify-between">
                <button id="prevChapter"
                    class="px-4 py-2 bg-gray-500 text-white rounded-lg hover:bg-gray-700 disabled:opacity-50" disabled>
                    <i class="fas fa-arrow-left"></i> Previous Chapter
                </button>
                <button id="nextChapter"
                    class="px-4 py-2 bg-gray-500 text-white rounded-lg hover:bg-gray-700 disabled:opacity-50">
                    Next Chapter <i class="fas fa-arrow-right"></i>
                </button>
            </div>
        </main>
    </div>

    <!-- Modal for Viewing Submissions -->
    <div id="submissionsModal" class="fixed inset-0 flex items-center justify-center bg-black bg-opacity-50 hidden">
        <div class="bg-white p-6 rounded-lg shadow-lg w-3/4 max-w-3xl">
            <h2 class="text-xl font-bold mb-4">Assignment Submissions</h2>
            <ul id="submissionsList" class="space-y-4">
                <!-- Submissions will be dynamically inserted here -->
            </ul>
            <button onclick="closeSubmissionsModal()"
                class="mt-4 px-4 py-2 bg-red-500 text-white rounded-lg hover:bg-red-700">Close</button>
        </div>
    </div>


    <script>
        let chapters = @json($course->chapters);
        let currentChapter = 0;

        // Load the first chapter when the page is loaded
        window.onload = function() {
            loadChapter(0);
        };

        function loadChapter(index) {
            const chapter = chapters[index];
            document.getElementById('chapterTitle').textContent = chapter.title;
            document.getElementById('chapterVideo').src = chapter.video_path ? '{{ asset('storage/') }}/' + chapter
                .video_path : chapter.video_url;


            const assignmentsQuizzes = document.getElementById('assignmentsQuizzes');
            assignmentsQuizzes.innerHTML = '';

            if (chapter.assignments.length === 0 && chapter.quizzes.length === 0) {
                assignmentsQuizzes.innerHTML =
                    '<p class="text-sm text-gray-500">No assignments or quizzes available for this chapter.</p>';
            } else {
                chapter.assignments.forEach(assignment => {
                    const assignmentDiv = document.createElement('div');
                    assignmentDiv.className = 'mt-2 flex items-center justify-between bg-gray-50 p-3 rounded-lg';

                    @if (auth()->user()->role->name == 'teacher')
                        assignmentDiv.innerHTML = `
                    <span class="flex items-center">
                        <i class="fas fa-tasks mr-2 text-yellow-500"></i> Assignment: ${assignment.name}
                    </span>
                    <button onclick="viewSubmissions(${assignment.id})" class="px-4 py-2 bg-indigo-500 text-white rounded-lg hover:bg-indigo-700">
                        View Submissions
                    </button>
                `;
                    @endif

                    @if (auth()->user()->role->name == 'student')
                        assignmentDiv.innerHTML = `
                    <span class="flex items-center">
                        <i class="fas fa-tasks mr-2 text-yellow-500"></i> Assignment: ${assignment.name}
                    </span>
                    <form id="assignment-form-${assignment.id}" class="flex flex-col space-y-2" enctype="multipart/form-data" method="POST" action="/submit-assignment/${assignment.id}">
                        @csrf
                        <div class="flex items-center space-x-2">
                            <label for="github_link_${assignment.id}" class="text-sm font-medium">GitHub Link:</label>
                            <input type="url" id="github_link_${assignment.id}" name="github_link" class="border rounded px-2 py-1 w-full">
                        </div>
                        <div class="flex items-center space-x-2">
                            <label for="file_upload_${assignment.id}" class="text-sm font-medium">Upload File:</label>
                            <input type="file" id="file_upload_${assignment.id}" name="file" class="border rounded px-2 py-1 w-full">
                        </div>
                        <button type="submit" class="mt-2 px-4 py-2 bg-green-500 text-white rounded-lg hover:bg-green-700">Submit Assignment</button>
                    </form>
                `;
                    @endif
                    assignmentsQuizzes.appendChild(assignmentDiv);
                });

                chapter.quizzes.forEach(quiz => {
                    const quizDiv = document.createElement('div');
                    quizDiv.className =
                        'mt-2 flex items-center justify-between bg-gray-50 p-3 rounded-lg shadow-sm';
                    let quizHTML = `
                <span class="flex items-center">
                    <i class="fas fa-question-circle mr-2 text-yellow-500"></i>
                    <span class="font-medium">${quiz.title}</span>
                </span>
            `;

                    if ("{{ auth()->user()->role->name }}" === 'teacher') {
                        quizHTML += `
                    <div class="flex space-x-2">
                        <a href="/quiz/${quiz.id}/questions/create">
                            <button class="px-4 py-2 bg-indigo-500 text-white rounded-lg hover:bg-indigo-700">Edit Quiz</button>
                        </a>
                    </div>
                `;
                    } else {
                        quizHTML += `
                    <a href="/quizzes/${quiz.id}/${quiz.hasTakenQuiz ? 'result' : 'answer'}" target="_blank">
                        <button class="px-4 py-2 ${quiz.hasTakenQuiz ? 'bg-green-500' : 'bg-indigo-500'} text-white rounded-lg hover:${quiz.hasTakenQuiz ? 'bg-green-700' : 'bg-indigo-700'}">
                            ${quiz.hasTakenQuiz ? 'View Result' : 'Take Quiz'}
                        </button>
                    </a>
                `;
                    }

                    quizDiv.innerHTML = quizHTML;
                    assignmentsQuizzes.appendChild(quizDiv);
                });
            }

            currentChapter = index;
            document.getElementById('prevChapter').disabled = index === 0;
            document.getElementById('nextChapter').disabled = index === chapters.length - 1;

                // Update the video upload button for teachers
    @if (auth()->user()->role->name == 'teacher')
        const videoUploadButton = document.getElementById('videoUpload');
        videoUploadButton.onchange = function() {
            uploadVideo(chapter.id);
        };
    @endif

    // Update the "Check Chapter Completion" button dynamically
    fetch(`/chapters/${chapter.id}/check-completion/{{ auth()->user()->id }}`)
        .then(response => response.json())
        .then(data => {
            const completionButton = document.getElementById('checkCompletionButton');
            if (data.completed) {
                completionButton.innerHTML = '<i class="fas fa-check-circle"></i> Chapter Completed';
                completionButton.classList.remove('bg-blue-500', 'hover:bg-blue-700');
                completionButton.classList.add('bg-green-500');
                completionButton.disabled = true;
            } else {
                completionButton.innerHTML = 'Check Chapter Completion';
                completionButton.classList.remove('bg-green-500');
                completionButton.classList.add('bg-blue-500', 'hover:bg-blue-700');
                completionButton.disabled = false;
                completionButton.onclick = function() {
                    checkChapterCompletion(chapter.id, {{ $course->id }});
                };
            }
        });



    // Update the "Mark as Complete" button based on video watch status
    const isCompleted = chapter.is_watched;
    const markCompleteButton = document.getElementById('markCompleteButton');
    if (isCompleted) {
        markCompleteButton.classList.remove('bg-green-500', 'hover:bg-green-700');
        markCompleteButton.classList.add('bg-gray-500');
        markCompleteButton.innerHTML = '<i class="fas fa-check-circle"></i> Completed';
        markCompleteButton.disabled = true;
    } else {
        markCompleteButton.classList.remove('hidden');
        markCompleteButton.classList.add('bg-green-500', 'hover:bg-green-700');
        markCompleteButton.innerHTML = '<i class="fas fa-check-circle"></i> Mark as Complete';
        markCompleteButton.disabled = false;
        markCompleteButton.onclick = function() {
            markVideoAsComplete(chapter.id);
        };
    }
        }





















        document.getElementById('prevChapter').addEventListener('click', () => {
            if (currentChapter > 0) {
                loadChapter(currentChapter - 1);
            }
        });

        document.getElementById('nextChapter').addEventListener('click', () => {
            if (currentChapter < chapters.length - 1) {
                loadChapter(currentChapter + 1);
            }
        });

        function uploadVideo(chapterId) {
            const fileInput = document.getElementById('videoUpload');
            const formData = new FormData();
            formData.append('video', fileInput.files[0]);

            fetch(`/chapters/${chapterId}/upload-video`, {
                    method: 'POST',
                    headers: {
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    },
                    body: formData
                })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        document.getElementById('chapterVideo').src = data.video_path;
                    } else {
                        alert('Video upload failed!');
                    }
                })
                .catch(error => {
                    console.error('Error:', error);
                    alert('An error occurred during the upload.');
                });
        }

        function viewSubmissions(assignmentId) {
            fetch(`/assignments/${assignmentId}/submissions`)
                .then(response => response.json())
                .then(data => {
                    const submissionsList = document.getElementById('submissionsList');
                    submissionsList.innerHTML = ''; // Clear the list before appending new submissions

                    data.submissions.forEach(submission => {
                        const submissionItem = document.createElement('li');
                        submissionItem.className =
                            'flex justify-between items-center p-2 bg-gray-50 rounded-lg';

                        // Generate the button state based on `is_completed`
                        const isCompleted = submission.is_completed;
                        const buttonClasses = isCompleted ?
                            'bg-gray-500 text-white rounded-lg' :
                            'bg-green-500 text-white rounded-lg hover:bg-green-700';
                        const buttonDisabled = isCompleted ? 'disabled' : '';
                        const buttonText = isCompleted ? 'Completed' : 'Mark as Complete';

                        submissionItem.innerHTML = `
                    <span>${submission.user_name}</span>
                    <div class="flex space-x-2">
                        ${submission.github_link ? `<a href="${submission.github_link}" target="_blank" class="px-4 py-2 bg-blue-500 text-white rounded-lg hover:bg-blue-700">GitHub Link</a>` : ''}
                        ${submission.file_path ? `<a href="{{ asset('storage/') }}/${submission.file_path}" download class="px-4 py-2 bg-yellow-500 text-white rounded-lg hover:bg-yellow-700">Download File</a>` : ''}
                        <button id="mark-complete-${submission.id}" onclick="markAsComplete(${submission.id})"
                            class="px-4 py-2 ${buttonClasses}" ${buttonDisabled}>
                            ${buttonText}
                        </button>
                    </div>
                `;
                        submissionsList.appendChild(submissionItem);
                    });

                    // Show the modal with updated submission list
                    document.getElementById('submissionsModal').classList.remove('hidden');
                })
                .catch(error => {
                    console.error('Error:', error);
                    alert('An error occurred while fetching submissions.');
                });
        }

        function markAsComplete(submissionId) {
            fetch(`/submissions/${submissionId}/complete`, {
                    method: 'PUT', // Change to PUT if your backend expects it
                    headers: {
                        'X-CSRF-TOKEN': '{{ csrf_token() }}',
                        'Content-Type': 'application/json'
                    },
                    body: JSON.stringify({
                        is_completed: true
                    })
                })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        const button = document.getElementById(`mark-complete-${submissionId}`);
                        button.innerHTML = 'Completed';
                        button.classList.remove('bg-green-500', 'hover:bg-green-700');
                        button.classList.add('bg-green-500');
                        button.disabled = true;
                        alert('Assignment marked as complete!');
                    } else {
                        alert('Failed to mark assignment as complete.');
                    }
                })
                .catch(error => {
                    console.error('Error:', error);
                    alert('An error occurred while marking the assignment as complete.');
                });
        }


        function closeSubmissionsModal() {
            document.getElementById('submissionsModal').classList.add('hidden');
        }


        // Show the "Mark as Complete" button only after the video ends
        document.getElementById('chapterVideo').addEventListener('ended', function() {
            const markCompleteButton = document.getElementById('markCompleteButton');
            if (!markCompleteButton.disabled) { // Ensure button only appears if not already completed
                markCompleteButton.classList.remove('hidden');
            }
        });

        // Handle the "Mark as Complete" button click event
        document.getElementById('markCompleteButton').addEventListener('click', function() {
            fetch('/video-complete', {
                    method: 'POST',
                    headers: {
                        'X-CSRF-TOKEN': '{{ csrf_token() }}',
                        'Content-Type': 'application/json'
                    },
                    body: JSON.stringify({
                        chapter_id: chapters[currentChapter].id,
                        is_watched: true
                    })
                })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        const button = document.getElementById('markCompleteButton');
                        button.innerHTML = '<i class="fas fa-check-circle"></i> Completed';
                        button.classList.remove('bg-green-500', 'hover:bg-green-700');
                        button.classList.add('bg-gray-500');
                        button.disabled = true;
                    } else {
                        alert('Failed to mark video as complete.');
                    }
                })
                .catch(error => {
                    console.error('Error:', error);
                    alert('An error occurred while marking the video as complete.');
                });
        });

        function checkChapterCompletion(chapterId, courseId) {
            fetch(`/chapters/${chapterId}/check-completion/{{$course->id}}`, {
                    method: 'GET',
                    headers: {
                        'X-CSRF-TOKEN': '{{ csrf_token() }}',
                        'Content-Type': 'application/json'
                    }
                })
                .then(response => response.json())
                .then(data => {
                    if (data.completed) {
                        // Update the button to indicate chapter completion
                        const button = document.getElementById('checkCompletionButton');
                        button.innerHTML = '<i class="fas fa-check-circle"></i> Chapter Completed';
                        button.classList.remove('bg-green-500', 'hover:bg-green-700');
                        button.classList.add('bg-green-500');
                        button.disabled = true;
                    } else {
                        alert('You have not completed all tasks for this chapter.');
                    }
                })
                .catch(error => {
                    console.error('Error:', error);
                    alert('An error occurred while checking chapter completion.');
                });
        }
    </script>

</body>

</html>
