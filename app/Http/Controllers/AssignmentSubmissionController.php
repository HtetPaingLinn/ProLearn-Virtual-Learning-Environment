<?php

namespace App\Http\Controllers;

use App\Models\AssignmentSubmission;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AssignmentSubmissionController extends Controller
{
    public function submitAssignment(Request $request, $assignmentId)
    {
        $request->validate([
            'github_link' => 'nullable|url',
            'file' => 'nullable|file|max:10240', // Max size 10MB
        ]);

        // Check if the student has already submitted this assignment
        $existingSubmission = AssignmentSubmission::where('assignment_id', $assignmentId)
                                                  ->where('user_id', Auth::user()->id)
                                                  ->first();

        if ($existingSubmission) {
            return back()->with('error', 'You have already submitted this assignment.');
        }

        // Create a new assignment submission
        $assignmentSubmission = new AssignmentSubmission();
        $assignmentSubmission->assignment_id = $assignmentId;
        $assignmentSubmission->user_id = Auth::user()->id;

        // Handle GitHub link
        if ($request->has('github_link')) {
            $assignmentSubmission->github_link = $request->input('github_link');
        }

        // Handle file upload
        if ($request->hasFile('file')) {
            $filePath = $request->file('file')->store('assignments', 'public');
            $assignmentSubmission->file_path = $filePath;
        }

        // Save the submission
        $assignmentSubmission->save();

        app(ChapterCompletionController::class)->checkCompletion($assignmentId, $request->course_id);

        return back()->with('success', 'Assignment submitted successfully.');
    }

    public function getSubmissions($assignmentId)
    {
        $submissions = AssignmentSubmission::where('assignment_id', $assignmentId)
                                            ->with('user') // Assuming you have a user relation
                                            ->get();

        return response()->json([
            'submissions' => $submissions->map(function ($submission) {
                return [
                    'id' => $submission->id,
                    'user_name' => $submission->user->name,
                    'github_link' => $submission->github_link,
                    'file_path' => $submission->file_path,
                    'is_completed' => $submission->is_completed, // Ensure this field is returned
                ];
            })
        ]);
    }

public function markAsComplete($submissionId)
{
    $submission = AssignmentSubmission::findOrFail($submissionId);
    $submission->is_completed = true;
    $submission->save();

    return response()->json(['success' => true, 'is_completed' => $submission->is_completed]);
}


}
