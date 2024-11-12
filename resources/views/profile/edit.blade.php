<x-app-layout>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Profile UI</title>
        <script src="https://cdn.tailwindcss.com"></script>
    </head>

    <style>
        .certificate {
            background: linear-gradient(135deg, #f8fafc, #ffffff);
            border: 2px solid #d1d5db;
            border-radius: 12px;
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.15);
        }

        .certificate-title {
            font-family: 'Times New Roman', serif;
            font-size: 1.75rem;
            font-weight: bold;
            color: #374151;
        }

        .certificate-subtitle {
            font-family: 'Courier New', monospace;
            font-style: italic;
            color: #1f2937;
        }

        .certificate-date {
            font-size: 0.875rem;
            color: #4b5563;
        }

        .certificate-border {
            border: 2px dashed #9ca3af;
            padding: 1rem;
        }

        .ribbon {
            position: absolute;
            top: -10px;
            right: -10px;
            background: linear-gradient(45deg, #06b6d4, #3b82f6);
            color: white;
            padding: 0.25rem 1rem;
            font-size: 0.875rem;
            font-weight: bold;
            border-radius: 4px;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.25);
            transform: rotate(15deg);
        }
    </style>

    <body class="bg-gray-100">

    <!-- Profile Section -->
    <section class="w-4/5 mx-auto bg-white shadow-md rounded-lg overflow-hidden mt-10">
        <div class="bg-gradient-to-r from-cyan-500 to-blue-500 h-32"></div>

        <div class="px-6 -mt-12">
            <div class="flex items-center">
                <div class="w-24 h-24 rounded-full border-4 border-white overflow-hidden">
                    <img src="{{ $user->profile_picture ? asset('storage/' . $user->profile_picture) : 'https://cdn.pixabay.com/photo/2018/11/13/21/43/avatar-3814049_1280.png' }}" alt="Profile Picture" class="w-full h-full object-cover">
                </div>
                <div class="ml-6">
                    <h1 class="text-2xl font-bold text-slate-900">{{ $user->name }}</h1>
                    <p class="text-gray-500">{{ $user->role->name }}</p>
                </div>
            </div>

            <!-- Tags -->
            <div id="skills-list" class="flex space-x-2 mt-4">
                @foreach ($user->skills as $skill)
                    @php
                        $colors = ['bg-blue-100 text-blue-900', 'bg-green-100 text-green-900', 'bg-red-100 text-red-900', 'bg-purple-100 text-purple-900', 'bg-pink-100 text-pink-900', 'bg-gray-100 text-gray-900', 'bg-orange-100 text-orange-900', 'bg-teal-100 text-teal-900', 'bg-yellow-100 text-yellow-900', 'bg-indigo-100 text-indigo-900', 'bg-lime-100 text-lime-900', 'bg-fuchsia-100 text-fuchsia-900', 'bg-teal-100 text-teal-900', 'bg-violet-100 text-violet-900', 'bg-cyan-100 text-cyan-900', 'bg-rose-100 text-rose-900', 'bg-amber-100 text-amber-900', 'bg-emerald-100 text-emerald-900', 'bg-indigo-100 text-indigo-900'];
                        $randomColor = $colors[array_rand($colors)];
                    @endphp
                    <span id="skill-{{ $skill->id }}" class="{{ $randomColor }} px-3 py-1 rounded-full text-sm font-semibold">
                            {{ $skill->name }}
                            <form action="{{ route('profile.skill.delete', $skill->id) }}" method="POST" class="inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="ml-2 text-red-500">&times;</button>
                            </form>
                        </span>
                @endforeach
            </div>

            <!-- Add Skill -->
            <div class="mt-4">
                <form action="{{ route('profile.skill.add') }}" method="POST">
                    @csrf
                    <input id="new-skill" name="skill" type="text" placeholder="Add a new skill" class="border rounded-md px-3 py-2" />
                    <button type="submit" class="bg-blue-600 text-white px-3 py-2 rounded-md ml-2">Add Skill</button>
                </form>
            </div>

            <!-- Buttons -->
            <div class="flex space-x-2 mt-4">
                <button id="edit-profile-btn" onclick="showSection('edit-profile-section')" class="bg-white border border-gray-300 text-gray-700 px-4 py-2 rounded-md transition-all duration-300 ease-in-out hover:bg-gradient-to-r hover:from-blue-500 hover:to-cyan-500 hover:text-white hover:shadow-lg">
                    Edit Profile
                </button>
                <button id="add-to-projects-btn" onclick="showSection('add-to-projects')" class="bg-blue-600 text-white px-4 py-2 rounded-md transition-all duration-300 ease-in-out hover:bg-gradient-to-r hover:from-cyan-500 hover:to-blue-600 hover:shadow-lg">
                    Add to Projects
                </button>
            </div>
        </div>

        <!-- About and Experiences Sections -->
        <div id="about-section" class="px-6 py-4">
            <h2 class="text-xl font-semibold text-slate-900">About</h2>
            <p class="text-gray-600 mt-2">Lorem ipsum dolor sit amet consectetur adipisicing elit. Facere dolores aliquid sequi sunt iusto ipsum earum natus omnis asperiores architecto praesentium dignissimos pariatur, ipsa cum? Voluptate vero eius at voluptas?</p>
        </div>

        <div id="experiences-section" class="px-6 py-4">
            <h2 class="text-xl font-semibold text-slate-900">Experiences</h2>

            <!-- Experience Items -->
            <div id="experiences-list" class="mt-4 space-y-4">
                @foreach ($user->experiences as $experience)
                    @php
                        $colors = ['#007bff', '#6610f2', '#6f42c1', '#e83e8c', '#dc3545', '#fd7e14', '#ffc107', '#28a745', '#17a2b8', '#007bff', '#6c757d', '#adb5bd'];
                        $randomColor = $colors[array_rand($colors)];
                    @endphp
                    <div id="experience-{{ $experience->id }}" class="flex items-center justify-between bg-gray-100 p-4 rounded-lg shadow-sm">
                        <div class="flex items-center">
                            <div class="bg-{{ $randomColor }} text-white p-2 rounded-full">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="{{ $randomColor }}" class="size-6">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M20.25 14.15v4.25c0 1.094-.787 2.036-1.872 2.18-2.087.277-4.216.42-6.378.42s-4.291-.143-6.378-.42c-1.085-.144-1.872-1.086-1.872-2.18v-4.25m16.5 0a2.18 2.18 0 0 0 .75-1.661V8.706c0-1.081-.768-2.015-1.837-2.175a48.114 48.114 0 0 0-3.413-.387m4.5 8.006c-.194.165-.42.295-.673.38A23.978 23.978 0 0 1 12 15.75c-2.648 0-5.195-.429-7.577-1.22a2.016 2.016 0 0 1-.673-.38m0 0A2.18 2.18 0 0 1 3 12.489V8.706c0-1.081.768-2.015 1.837-2.175a48.111 48.111 0 0 1 3.413-.387m7.5 0V5.25A2.25 2.25 0 0 0 13.5 3h-3a2.25 2.25 0 0 0-2.25 2.25v.894m7.5 0a48.667 48.667 0 0 0-7.5 0M12 12.75h.008v.008H12v-.008Z" />
                                </svg>
                            </div>
                            <div class="ml-4">
                                <h3 class="text-gray-800 font-semibold">{{ $experience->title }}</h3>
                                <p class="text-gray-500 text-sm">{{ $experience->years }} years</p>
                            </div>
                        </div>
                        <p class="text-gray-500 text-sm">{{ $experience->description }}</p>
                        <form action="{{ route('profile.experience.delete', $experience->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="ml-4 text-red-500">&times;</button>
                        </form>
                    </div>
                @endforeach
            </div>

            <!-- Add Experience -->
            <div class="mt-4">
                <form action="{{ route('profile.experience.add') }}" method="POST">
                    @csrf
                    <input id="new-experience-title" name="title" type="text" placeholder="Experience Title" class="border rounded-md px-3 py-2 mb-2" />
                    <input id="new-experience-years" name="years" type="text" placeholder="Years of Experience" class="border rounded-md px-3 py-2 mb-2" />
                    <input id="new-experience-description" name="description" type="text" placeholder="Description" class="border rounded-md px-3 py-2 mb-2" />
                    <button type="submit" class="bg-blue-600 text-white px-3 py-2 rounded-md">Add Experience</button>
                </form>
            </div>
        </div>

        <!-- Edit Profile Section (Initially Hidden) -->


        <div id="edit-profile-section" class="hidden py-12">

            <div class="bg-gradient-to-r from-cyan-500 to-blue-500 h-32 mt-[-60px]"></div>

            <div class="ml-8 mt-[-55px]">
                <div class="flex items-center space-x-4 mb-4">
                    <div class="w-24 h-24 rounded-full border-4 border-gray-200 overflow-hidden">
                        <img src="{{ $user->profile_picture ? asset('storage/' . $user->profile_picture) : 'https://cdn.pixabay.com/photo/2018/11/13/21/43/avatar-3814049_1280.png' }}" alt="Profile Picture" class="w-full h-full object-cover">
                    </div>
                    <div>
                        <h1 class="text-2xl font-bold text-gray-800">{{ $user->name }}</h1>
                        <p class="text-gray-500">{{ $user->role->name }}</p>
                    </div>
                </div>

                <div class="flex space-x-4">
                    <button id="edit-profile-btn" onclick="showSection('edit-profile-section')" class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded-md transition ease-in-out duration-300 font-semibold shadow-md focus:outline-none focus:ring-2 focus:ring-blue-700 focus:ring-opacity-75">
                        Edit Profile
                    </button>
                    <button id="add-to-projects-btn" onclick="location.reload()" class="bg-white border border-gray-300 text-gray-700 px-4 py-2 rounded-md transition-all duration-300 ease-in-out hover:bg-gradient-to-r hover:from-blue-500 hover:to-cyan-500 hover:text-white hover:shadow-lg">
                        Add to Projects
                    </button>
                </div>
            </div>

            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg w-full">
                    <div class="max-w-5xl mx-auto">
                        @include('profile.partials.update-profile-information-form')
                    </div>
                </div>

                <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg w-full">
                    <div class="max-w-5xl mx-auto">
                        @include('profile.partials.update-password-form')
                    </div>
                </div>

                <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg w-full">
                    <div class="max-w-5xl mx-auto">
                        @include('profile.partials.delete-user-form')
                    </div>
                </div>
            </div>
        </div>


    <!-- Completed Courses Section -->
    <div id="completed-courses-section" class="px-6 py-8 mt-8">
        <h2 class="text-2xl font-semibold text-slate-900 mb-6">Completed Courses</h2>

        @php
            // Fetch completed courses for the current user
            $completedCourses = \App\Models\CourseCompletion::where('user_id', $user->id)
                ->with('course')
                ->get();
        @endphp

        <!-- Display Completed Courses (as certificates) -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8 mt-4">
            @foreach ($completedCourses as $completion)
                <div class="relative certificate p-6 certificate-border">
                    <div class="ribbon">Completed</div>

                    <!-- Course Image -->
                    <img src="{{ $completion->course->image ? asset('storage/' . $completion->course->image) : 'https://via.placeholder.com/400x200.png?text=No+Image' }}"
                         alt="Course Image"
                         class="w-full h-40 object-cover mb-4 rounded-md">

                    <!-- Course Title -->
                    <h3 class="certificate-title text-center">{{ $completion->course->title }}</h3>

                    <!-- Description -->
                    <p class="certificate-subtitle text-center mb-4">{{ $completion->course->description }}</p>

                    <!-- Completion Date -->
                    <p class="certificate-date text-center">
                        <strong>Completed on:</strong> {{ $completion->created_at->format('F d, Y') }}
                    </p>


                </div>
            @endforeach
        </div>

        @if ($completedCourses->isEmpty())
            <p class="text-gray-600 mt-4 text-center">No completed courses yet.</p>
        @endif
    </div>
    </section>

    <script>
        function showSection(sectionId) {
            // Hide all sections
            document.querySelectorAll('section > div').forEach(div => {
                div.classList.add('hidden');
            });
            // Show the selected section
            document.getElementById(sectionId).classList.remove('hidden');
        }
    </script>
    </body>
</x-app-layout>
