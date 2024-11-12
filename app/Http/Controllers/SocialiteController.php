<?php

namespace App\Http\Controllers;

use Socialite;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;
use Laravel\Socialite\Facades\Socialite as Social;

class SocialiteController extends Controller
{
    // Redirect to Google
    public function redirectToGoogle()
    {
        return Social::driver('google')->redirect();
    }

    // Handle callback from Google
    public function handleGoogleCallback()
    {
        try {
            $user = Social::driver('google')->user();
            $this->loginOrCreateUser($user, 'google');
            return redirect()->route('dashboard');
        } catch (\Exception $e) {
            Log::error('Google login failed: ' . $e->getMessage());
            return redirect()->route('dashboard')->withErrors(['error' => 'Google login failed.']);
        }
    }

    // Redirect to GitHub
    public function redirectToGithub()
    {
        return Social::driver('github')->redirect();
    }

    // Handle callback from GitHub
    public function handleGithubCallback()
    {
        try {
            $user = Social::driver('github')->user();
            $this->loginOrCreateUser($user, 'github');
            return redirect()->route('dashboard');
        } catch (\Exception $e) {
            Log::error('GitHub login failed: ' . $e->getMessage());
            return redirect()->route('dashboard')->withErrors(['error' => 'GitHub login failed.']);
        }
    }

    // Login or create user
    private function loginOrCreateUser($providerUser, $provider)
    {
        Log::info('Provider User:', [
            'name' => $providerUser->getName(),
            'nickname' => $providerUser->getNickname(),
            'email' => $providerUser->getEmail()
        ]);

        try {
            $user = User::where('email', $providerUser->getEmail())->first();

            if (!$user) {
                Log::info('Creating new user for email: ' . $providerUser->getEmail());
                $user = User::create([
                    'name' => $providerUser->getName(),
                    'email' => $providerUser->getEmail(),
                    'password' => Hash::make(Str::random(24)),
                    'role_id' => 4, // Adjust the role ID as needed
                ]);
            }

            Log::info('Logging in user with email: ' . $user->email);
            // Auth::login($user, true);
        } catch (\Exception $e) {
            Log::error('Error during user login or creation: ' . $e->getMessage());
            return redirect()->route('dashboard')->withErrors(['error' => 'An error occurred during login.']);
        }
    }
}
