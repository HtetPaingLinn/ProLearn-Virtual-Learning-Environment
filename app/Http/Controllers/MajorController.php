<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MajorController extends Controller
{
    public function show($id)
{
    $major = \App\Models\Major::findOrFail($id);
    return view('majorshow', compact('major'));
}

}
