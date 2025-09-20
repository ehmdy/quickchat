<x-guest-layout>
    <div class="text-center mb-8">
        <h1 class="text-3xl font-bold text-gray-900 dark:text-gray-100 mb-2">Reset Password</h1>
        <p class="text-gray-600 dark:text-gray-400">Enter your email to receive a reset link</p>
    </div>

    <div class="mb-6 p-4 bg-blue-50 dark:bg-blue-900/20 border border-blue-200 dark:border-blue-800 rounded-lg">
        <p class="text-sm text-blue-800 dark:text-blue-200">
            {{ __('Forgot your password? No problem. Just let us know your email address and we will email you a password reset link that will allow you to choose a new one.') }}
        </p>
    </div>

    <!-- Session Status -->
    <x-auth-session-status class="mb-6" :status="session('status')" />

    <form method="POST" action="{{ route('password.email') }}" class="space-y-6">
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
                          placeholder="Enter your email address" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Submit Button -->
        <div>
            <x-primary-button class="w-full justify-center py-3 text-base font-semibold">
                {{ __('Send Reset Link') }}
            </x-primary-button>
        </div>

        <!-- Back to Login -->
        <div class="text-center">
            <p class="text-sm text-gray-600 dark:text-gray-400">
                Remember your password? 
                <a href="{{ route('login') }}" class="text-blue-600 dark:text-blue-400 hover:text-blue-700 dark:hover:text-blue-300 font-medium transition-colors">
                    {{ __('Back to login') }}
                </a>
            </p>
        </div>
    </form>
</x-guest-layout>
