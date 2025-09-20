<x-guest-layout>
    <div class="text-center mb-8">
        <h1 class="text-3xl font-bold text-gray-900 dark:text-gray-100 mb-2">Welcome Back</h1>
        <p class="text-gray-600 dark:text-gray-400">Sign in to your account to continue</p>
    </div>

    <!-- Session Status -->
    <x-auth-session-status class="mb-6" :status="session('status')" />

    <form method="POST" action="{{ route('login') }}" class="space-y-6">
        @csrf

        <!-- Email Address -->
        <div>
            <x-input-label for="email" :value="__('Email Address')" />
            <x-text-input id="email" 
                          class="block mt-2 w-full px-4 py-3 border border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-700 text-gray-900 dark:text-gray-100 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-colors" 
                          type="email" 
                          name="email" 
                          :value="old('email')" 
                          required 
                          autofocus 
                          autocomplete="username" 
                          placeholder="Enter your email" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div>
            <x-input-label for="password" :value="__('Password')" />
            <x-text-input id="password" 
                          class="block mt-2 w-full px-4 py-3 border border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-700 text-gray-900 dark:text-gray-100 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-colors"
                          type="password"
                          name="password"
                          required 
                          autocomplete="current-password" 
                          placeholder="Enter your password" />
            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Remember Me & Forgot Password -->
        <div class="flex items-center justify-between">
            <label for="remember_me" class="inline-flex items-center">
                <input id="remember_me" 
                       type="checkbox" 
                       class="rounded border-gray-300 dark:border-gray-600 text-blue-600 shadow-sm focus:ring-blue-500 dark:focus:ring-blue-600 dark:focus:ring-offset-gray-800" 
                       name="remember">
                <span class="ms-2 text-sm text-gray-600 dark:text-gray-400">{{ __('Remember me') }}</span>
            </label>

            @if (Route::has('password.request'))
                <a class="text-sm text-blue-600 dark:text-blue-400 hover:text-blue-700 dark:hover:text-blue-300 font-medium transition-colors" 
                   href="{{ route('password.request') }}">
                    {{ __('Forgot password?') }}
                </a>
            @endif
        </div>

        <!-- Submit Button -->
        <div>
            <x-primary-button class="w-full justify-center py-3 text-base font-semibold">
                {{ __('Sign In') }}
            </x-primary-button>
        </div>

        <!-- Register Link -->
        <div class="text-center">
            <p class="text-sm text-gray-600 dark:text-gray-400">
                Don't have an account? 
                <a href="{{ route('register') }}" class="text-blue-600 dark:text-blue-400 hover:text-blue-700 dark:hover:text-blue-300 font-medium transition-colors">
                    {{ __('Sign up') }}
                </a>
            </p>
        </div>
    </form>
</x-guest-layout>
