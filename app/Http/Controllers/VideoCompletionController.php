<?php

namespace App\Http\Controllers;

use App\Models\VideoComplete;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class VideoCompletionController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'chapter_id' => 'required|exists:chapters,id',
            'is_watched' => 'required|boolean',
        ]);

        $videoComplete = VideoComplete::updateOrCreate(
            [
                'user_id' => Auth::user()->id,
                'chapter_id' => $request->chapter_id
            ],
            ['is_watched' => $request->is_watched]
        );


        app(ChapterCompletionController::class)->checkCompletion($request->chapter_id, $request->course_id);

                return response()->json(['success' => true]);
    }


}
