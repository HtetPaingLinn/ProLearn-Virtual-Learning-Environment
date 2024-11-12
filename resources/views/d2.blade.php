@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4 py-8">
    <div class="flex flex-wrap items-center justify-between mb-8">
        <h2 class="text-2xl font-bold">Browse Courses</h2>
        <div>
            <input type="text" placeholder="Search for a course" class="p-2 border rounded-md">
        </div>
    </div>

    <div class="mb-4">
        <button class="px-4 py-2 bg-blue-500 text-white rounded-lg">All</button>
        @foreach($majors as $major)
            <button class="px-4 py-2 border rounded-lg hover:bg-blue-500 hover:text-white">{{ $major->name }}</button>
        @endforeach
    </div>

    <div class="grid grid-cols-4 gap-4">
        @foreach($majors as $major)
            @foreach($major->courses as $course)
                <div class="bg-white shadow-md rounded-lg p-4">
                    <img src="{{ $course->thumbnail }}" alt="{{ $course->title }}" class="rounded-md mb-2">
                    <h3 class="text-lg font-semibold">{{ $course->title }}</h3>
                    <p>{{ $course->chapters }} Chapters</p>
                </div>
            @endforeach
        @endforeach
    </div>
</div>
@endsection
