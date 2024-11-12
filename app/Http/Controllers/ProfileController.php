<?php
namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use App\Models\Experience;
use App\Models\Skill;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;

class ProfileController extends Controller
{
/**
* Display the user's profile form.
*/
public function edit(Request $request): View
{
return view('profile.edit', [
'user' => $request->user(),
]);
}

/**
* Update the user's profile information.
*/
public function update(ProfileUpdateRequest $request): RedirectResponse
{
$user = $request->user();

$user->fill($request->validated());

if ($request->hasFile('profile_picture')) {
if ($user->profile_picture) {
Storage::disk('public')->delete($user->profile_picture);
}

$path = $request->file('profile_picture')->store('profile_pictures', 'public');
$user->profile_picture = $path;
}

if ($user->isDirty('email')) {
$user->email_verified_at = null;
}

$user->save();

return Redirect::route('profile.edit')->with('status', 'profile-updated');
}

/**
* Update the user's skills.
*/    public function addSkill(Request $request): RedirectResponse
{
    $request->validate([
        'skill' => 'required|string|max:255',
    ]);

    $user = Auth::user();
    $skill = new Skill(['name' => $request->skill]);
    $user->skills()->save($skill);

    return redirect()->back()->with('success', 'Skill added successfully!');
}

    public function deleteSkill($id): RedirectResponse
    {
        $user = Auth::user();
        $skill = $user->skills()->findOrFail($id);
        $skill->delete();

        return redirect()->back()->with('success', 'Skill deleted successfully!');
    }

    public function addExperience(Request $request): RedirectResponse
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'years' => 'required|integer',
            'description' => 'nullable|string|max:255',
        ]);

        $user = Auth::user();
        $experience = new Experience([
            'title' => $request->title,
            'years' => $request->years,
            'description' => $request->description,
        ]);
        $user->experiences()->save($experience);

        return redirect()->back()->with('success', 'Experience added successfully!');
    }

    public function deleteExperience($id): RedirectResponse
    {
        $user = Auth::user();
        $experience = $user->experiences()->findOrFail($id);
        $experience->delete();

        return redirect()->back()->with('success', 'Experience deleted successfully!');
    }

    /**
     * End-skill-and-exp
     */

/**
* Delete the user's account.
*/
public function destroy(Request $request): RedirectResponse
{
$request->validateWithBag('userDeletion', [
'password' => ['required', 'current_password'],
]);

$user = $request->user();

Auth::logout();

$user->delete();

$request->session()->invalidate();
$request->session()->regenerateToken();

return Redirect::to('/');
}
}
