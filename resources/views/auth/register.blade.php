<x-guest-layout>
    <div class="text-center mb-8">
        <h1 class="text-3xl font-bold text-gray-900 dark:text-gray-100 mb-2">Create Account</h1>
        <p class="text-gray-600 dark:text-gray-400">Join QuickChat and start connecting</p>
    </div>

    <form method="POST" action="{{ route('register') }}" class="space-y-6">
        @csrf

        <!-- Username -->
        <div>
            <x-input-label for="username" :value="__('Username')" />
            <x-text-input id="username" 
                          class="block mt-2 w-full px-4 py-3 border border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-700 text-gray-900 dark:text-gray-100 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-colors" 
                          type="text" 
                          name="username" 
                          :value="old('username')" 
                          required 
                          autofocus 
                          autocomplete="off" 
                          placeholder="Choose a username" />
            <x-input-error :messages="$errors->get('username')" class="mt-2" />
        </div>

        <!-- Name -->
        <div>
            <x-input-label for="name" :value="__('Full Name')" />
            <x-text-input id="name" 
                          class="block mt-2 w-full px-4 py-3 border border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-700 text-gray-900 dark:text-gray-100 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-colors" 
                          type="text" 
                          name="name" 
                          :value="old('name')" 
                          required 
                          autocomplete="off" 
                          placeholder="Enter your full name" />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

        <!-- Email Address -->
        <div>
            <x-input-label for="email" :value="__('Email Address')" />
            <x-text-input id="email" 
                          class="block mt-2 w-full px-4 py-3 border border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-700 text-gray-900 dark:text-gray-100 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-colors" 
                          type="email" 
                          name="email" 
                          :value="old('email')" 
                          required 
                          autocomplete="off" 
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
                          autocomplete="new-password" 
                          placeholder="Create a password" />
            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Confirm Password -->
        <div>
            <x-input-label for="password_confirmation" :value="__('Confirm Password')" />
            <x-text-input id="password_confirmation" 
                          class="block mt-2 w-full px-4 py-3 border border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-700 text-gray-900 dark:text-gray-100 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-colors"
                          type="password"
                          name="password_confirmation" 
                          required 
                          autocomplete="new-password" 
                          placeholder="Confirm your password" />
            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <!-- Submit Button -->
        <div>
            <x-primary-button class="w-full justify-center py-3 text-base font-semibold">
                {{ __('Create Account') }}
            </x-primary-button>
        </div>

        <!-- Login Link -->
        <div class="text-center">
            <p class="text-sm text-gray-600 dark:text-gray-400">
                Already have an account? 
                <a href="{{ route('login') }}" class="text-blue-600 dark:text-blue-400 hover:text-blue-700 dark:hover:text-blue-300 font-medium transition-colors">
                    {{ __('Sign in') }}
                </a>
            </p>
        </div>
    </form>
</x-guest-layout>
