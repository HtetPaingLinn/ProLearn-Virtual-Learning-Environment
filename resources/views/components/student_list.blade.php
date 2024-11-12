<div class="flex flex-col m-auto my-5 mr-5">
    <div class="-m-1.5 overflow-x-auto">
        <div class="p-1.5 min-w-full inline-block align-middle">
            <div class="bg-white border border-gray-200 rounded-xl shadow-sm overflow-hidden">
                <!-- Header -->
                <div class="px-6 py-4 grid gap-3 md:flex md:justify-between md:items-center border-b border-gray-200">
                    <div>
                        <h2 class="text-xl font-semibold text-gray-800"> All Students </h2>
                    </div>
                </div>

                <!-- Table -->
                <table id="all-doctor" class="min-w-full divide-y divide-gray-200 table-fixed">
                    <thead class="bg-gray-50">
                    <tr>
                        <th scope="col" class="w-[30%] px-6 py-3 text-start">
                            <div class="flex items-center gap-x-2">
                                <span class="text-xs font-semibold uppercase tracking-wide text-gray-800"> Name </span>
                            </div>
                        </th>
                        <th scope="col" class="w-[20%] px-3 py-3 text-start">
                            <div class="flex items-center gap-x-2">
                                <span class="text-xs font-semibold uppercase tracking-wide text-gray-800"> Major </span>
                            </div>
                        </th>
                        <th scope="col" class="w-[25%] px-3 py-3 text-start">
                            <div class="flex items-center gap-x-2">
                                <span class="text-xs font-semibold uppercase tracking-wide text-gray-800"> Status </span>
                            </div>
                        </th>
                        <th scope="col" class="w-[15%] px-3 py-3 text-start">
                            <div class="flex items-center gap-x-2">
                                <span class="text-xs font-semibold uppercase tracking-wide text-gray-800 "> Joined at </span>
                            </div>
                        </th>
                        <th scope="col" class="w-[15%] px-3 py-3 text-start">
                            <div class="flex items-center gap-x-2">
                                <span class="text-xs font-semibold uppercase tracking-wide text-gray-800 "> buttons </span>
                            </div>
                        </th>
                    </tr>
                    </thead>

                    <tbody class="divide-y divide-gray-200">
                    @if(request('major')=='all')
                        @foreach(\App\Models\Student::all() as $student)
                            <tr>
                                <td class="w-[30%] whitespace-nowrap">
                                    <div class="px-6 py-3">
                                        <div class="flex items-center gap-x-3">
                                            <div class="grow">
                                                <span class="block text-sm font-semibold text-gray-800"> {{ $student -> user -> name }} </span>
                                                <span class="block text-sm text-gray-500"> {{ $student -> user -> email }} </span>
                                            </div>
                                        </div>
                                    </div>
                                </td>
                                <td class="w-[20%] whitespace-nowrap">
                                    <div class="px-3 py-3">
                                        <span class="block text-sm font-semibold text-gray-800"> {{ $student -> major -> name }} </span>
                                    </div>
                                </td>
                                <td class="w-[25%] whitespace-nowrap">
                                    <div class="px-3 py-3">
                                        <span class="block text-sm font-semibold text-gray-800"> {{ $student -> status }} </span>
                                    </div>
                                </td>
                                <td class="w-[15%] whitespace-nowrap">
                                    <div class="px-3 py-3">
                                        <span class="text-sm text-gray-500"> {{ $student -> created_at->format('d M Y') }} </span>
                                    </div>
                                </td>
                                <td class="w-[15%] whitespace-nowrap">
                                    <div class="px-3 py-3 flex items-center space-x-4">
                                        @if($student->status === 'Complete')
                                            <a href="/upgrade_major/{{ $student->id }}"><i class="fas fa-arrow-up text-blue-500 cursor-pointer" title="Upgrade Role"></i></a>
                                        @else
                                            <i class="fas fa-arrow-up text-gray-400 cursor-not-allowed" title="Upgrade Role (Not Allowed)"></i>
                                        @endif
                                            <a href="/delete_user/{{ $student->id }}"><i class="fas fa-trash-alt text-red-500 cursor-pointer" title="Delete"></i></a>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    @elseif(request('major')>=1 && request('major')<=3)
                        @php
                            $students = \App\Models\Student::where('major_id', 1)
                                        ->orWhere('major_id',2)
                                        ->orWhere('major_id',3)
                                        ->get();
                        @endphp
                        @foreach($students as $student)
                            <tr>
                                <td class="w-[30%] whitespace-nowrap">
                                    <div class="px-6 py-3">
                                        <div class="flex items-center gap-x-3">
                                            <div class="grow">
                                                <span class="block text-sm font-semibold text-gray-800"> {{ $student -> user -> name }} </span>
                                                <span class="block text-sm text-gray-500"> {{ $student -> user -> email }} </span>
                                            </div>
                                        </div>
                                    </div>
                                </td>
                                <td class="w-[20%] whitespace-nowrap">
                                    <div class="px-3 py-3">
                                        <span class="block text-sm font-semibold text-gray-800"> {{ $student -> major -> name }} </span>
                                    </div>
                                </td>
                                <td class="w-[25%] whitespace-nowrap">
                                    <div class="px-3 py-3">
                                        <span class="block text-sm font-semibold text-gray-800"> {{ $student -> status }} </span>
                                    </div>
                                </td>
                                <td class="w-[15%] whitespace-nowrap">
                                    <div class="px-3 py-3">
                                        <span class="text-sm text-gray-500"> {{ $student -> created_at->format('d M Y') }} </span>
                                    </div>
                                </td>
                                <td class="w-[15%] whitespace-nowrap">
                                    <div class="px-3 py-3 flex items-center space-x-4">
                                        @if($student->status === 'Complete')
                                            <a href="/upgrade_major/{{ $student->id }}"><i class="fas fa-arrow-up text-blue-500 cursor-pointer" title="Upgrade Role"></i></a>
                                        @else
                                            <i class="fas fa-arrow-up text-gray-400 cursor-not-allowed" title="Upgrade Role (Not Allowed)"></i>
                                        @endif
                                            <a href="/delete_user/{{ $student->id }}"><i class="fas fa-trash-alt text-red-500 cursor-pointer" title="Delete"></i></a>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    @else
                        @php
                            $major_id_no = request('major');
                            $students = \App\Models\Student::where('major_id', $major_id_no)->get();
                        @endphp
                        @foreach($students as $student)
                            <tr>
                                <td class="w-[30%] whitespace-nowrap">
                                    <div class="px-6 py-3">
                                        <div class="flex items-center gap-x-3">
                                            <div class="grow">
                                                <span class="block text-sm font-semibold text-gray-800"> {{ $student -> user -> name }} </span>
                                                <span class="block text-sm text-gray-500"> {{ $student -> user -> email }} </span>
                                            </div>
                                        </div>
                                    </div>
                                </td>
                                <td class="w-[20%] whitespace-nowrap">
                                    <div class="px-3 py-3">
                                        <span class="block text-sm font-semibold text-gray-800"> {{ $student -> major -> name }} </span>
                                    </div>
                                </td>
                                <td class="w-[25%] whitespace-nowrap">
                                    <div class="px-3 py-3">
                                        <span class="block text-sm font-semibold text-gray-800"> {{ $student -> status }} </span>
                                    </div>
                                </td>
                                <td class="w-[15%] whitespace-nowrap">
                                    <div class="px-3 py-3">
                                        <span class="text-sm text-gray-500"> {{ $student -> created_at->format('d M Y') }} </span>
                                    </div>
                                </td>
                                <td class="w-[15%] whitespace-nowrap">
                                    <div class="px-3 py-3 flex items-center space-x-4">
                                        @if($student->status === 'Complete')
                                            <a href="/upgrade_major/{{ $student->id }}"><i class="fas fa-arrow-up text-blue-500 cursor-pointer" title="Upgrade Role"></i></a>
                                        @else
                                            <i class="fas fa-arrow-up text-gray-400 cursor-not-allowed" title="Upgrade Role (Not Allowed)"></i>
                                        @endif
                                            <a href="/delete_user/{{ $student->id }}"><i class="fas fa-trash-alt text-red-500 cursor-pointer" title="Delete"></i></a>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
