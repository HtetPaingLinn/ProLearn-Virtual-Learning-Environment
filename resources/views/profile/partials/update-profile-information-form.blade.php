<section class="bg-white shadow-md rounded-lg p-6">
    <header class="border-b border-gray-200 pb-4 mb-6">
        <h2 class="text-2xl font-semibold text-[#512da8]">
            {{ __('Profile Information') }}
        </h2>
        <p class="mt-1 text-sm text-gray-500">
            {{ __("Update your account's profile information, email address, and profile picture.") }}
        </p>
    </header>

    <form id="send-verification" method="post" action="{{ route('verification.send') }}">
        @csrf
    </form>

    <form method="post" action="{{ route('profile.update') }}" enctype="multipart/form-data" class="space-y-6">
        @csrf
        @method('patch')

        <!-- Profile Picture -->
        <div class="flex items-center space-x-4">
            <div class="relative">
                @if ($user->profile_picture)
                    <img src="{{ asset('storage/' . $user->profile_picture) }}" alt="Profile Picture" class="w-20 h-20 rounded-full object-cover border-2 border-[#512da8]">
                @else
                    <img src="https://cdn.pixabay.com/photo/2018/11/13/21/43/avatar-3814049_1280.png" alt="Default Profile Picture" class="w-20 h-20 rounded-full object-cover border-2 border-[#512da8]">
                @endif
                <button type="button" class="absolute bottom-0 right-0 bg-[#512da8] hover:bg-purple-700 text-white rounded-full p-2 focus:outline-none focus:ring-2 focus:ring-white focus:ring-opacity-75" onclick="document.getElementById('profile_picture_input').click();">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 12l5 5L20 7"></path></svg>
                </button>
            </div>
            <div>
                <button type="button" class="bg-white border-2 border-[#512da8] text-[#512da8] hover:bg-[#512da8] hover:text-white font-semibold py-2 px-4 rounded-full focus:outline-none focus:ring-2 focus:ring-purple-600 focus:ring-offset-2 focus:ring-offset-white" onclick="document.getElementById('profile_picture_input').click();">
                    {{ __('Change Picture') }}
                </button>
            </div>
            <!-- Hidden file input -->
            <input type="file" name="profile_picture" id="profile_picture_input" class="hidden" onchange="this.form.submit();">
            <x-input-error class="mt-2" :messages="$errors->get('profile_picture')" />
        </div>

        <!-- Name -->
        <div>
            <x-input-label for="name" :value="__('Name')" class="text-[#512da8] font-semibold" />
            <x-text-input id="name" name="name" type="text" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-[#512da8] focus:ring-[#512da8]" :value="old('name', $user->name)" required autofocus autocomplete="name" />
            <x-input-error class="mt-2" :messages="$errors->get('name')" />
        </div>

        <!-- Email -->
        <div>
            <x-input-label for="email" :value="__('Email')" class="text-[#512da8] font-semibold" />
            <x-text-input id="email" name="email" type="email" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-[#512da8] focus:ring-[#512da8]" :value="old('email', $user->email)" required autocomplete="username" />
            <x-input-error class="mt-2" :messages="$errors->get('email')" />

            @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && ! $user->hasVerifiedEmail())
                <div class="mt-4 text-sm text-gray-500">
                    {{ __('Your email address is unverified.') }}
                    <button form="send-verification" class="underline text-[#512da8] hover:text-purple-600">
                        {{ __('Click here to re-send the verification email.') }}
                    </button>
                </div>

                @if (session('status') === 'verification-link-sent')
                    <p class="mt-2 font-medium text-sm text-green-600">
                        {{ __('A new verification link has been sent to your email address.') }}
                    </p>
                @endif
            @endif
        </div>

        <!-- Save Button -->
        <div class="flex items-center justify-end">
            <x-primary-button class="bg-[#512da8] hover:bg-purple-700 focus:ring-purple-600">
                {{ __('Save') }}
            </x-primary-button>

            @if (session('status') === 'profile-updated')
                <p
                    x-data="{ show: true }"
                    x-show="show"
                    x-transition
                    x-init="setTimeout(() => show = false, 2000)"
                    class="text-sm text-gray-500 ml-4"
                >{{ __('Saved.') }}</p>
            @endif
        </div>
    </form>
</section>
