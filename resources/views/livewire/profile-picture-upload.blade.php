<div class="space-y-6">
    <div>
        <h3 class="text-lg font-medium text-gray-900 dark:text-gray-100">
            {{ __('Profile Picture') }}
        </h3>
        <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
            {{ __('Update your profile picture. Maximum file size: 2MB.') }}
        </p>
    </div>

    <!-- Current Profile Picture -->
    <div class="flex items-center space-x-6">
        <div class="relative">
            @if($user->profile_picture)
                <img src="{{ Storage::url($user->profile_picture) }}" 
                     alt="Profile Picture" 
                     class="w-24 h-24 rounded-full object-cover border-4 border-gray-200 dark:border-gray-700">
            @else
                <div class="w-24 h-24 bg-gradient-to-br from-blue-400 to-purple-500 rounded-full flex items-center justify-center border-4 border-gray-200 dark:border-gray-700">
                    <span class="text-2xl font-bold text-white">{{ substr($user->name, 0, 1) }}</span>
                </div>
            @endif
            
            <!-- Online Status Indicator -->
            <div class="absolute -bottom-1 -right-1 w-6 h-6 bg-green-500 border-4 border-white dark:border-gray-800 rounded-full">
                <div class="w-full h-full bg-green-500 rounded-full animate-pulse"></div>
            </div>
        </div>

        <div class="flex-1">
            <h4 class="text-lg font-semibold text-gray-900 dark:text-gray-100">{{ $user->name }}</h4>
            <p class="text-sm text-gray-500 dark:text-gray-400">{{ $user->email }}</p>
            <div class="flex items-center mt-2 space-x-2">
                <div class="w-2 h-2 bg-green-500 rounded-full animate-pulse"></div>
                <span class="text-xs text-green-700 dark:text-green-300 font-medium">Online</span>
            </div>
        </div>
    </div>

    <!-- Upload Form -->
    <form wire:submit="save" class="space-y-4">
        <div>
            <label for="photo" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                {{ __('Choose New Profile Picture') }}
            </label>
            <input type="file" 
                   wire:model="photo" 
                   id="photo"
                   accept="image/*"
                   class="block w-full text-sm text-gray-500 dark:text-gray-400 file:mr-4 file:py-2 file:px-4 file:rounded-lg file:border-0 file:text-sm file:font-semibold file:bg-blue-50 file:text-blue-700 hover:file:bg-blue-100 dark:file:bg-blue-900 dark:file:text-blue-300 border border-gray-300 dark:border-gray-600 rounded-lg cursor-pointer bg-white dark:bg-gray-700">
            @error('photo') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
        </div>

        @if ($photo)
            <!-- Preview -->
            <div class="mt-4">
                <p class="text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">{{ __('Preview:') }}</p>
                <img src="{{ $photo->temporaryUrl() }}" 
                     alt="Preview" 
                     class="w-32 h-32 rounded-lg object-cover border border-gray-300 dark:border-gray-600">
            </div>
        @endif

        <div class="flex items-center space-x-4">
            <button type="submit" 
                    class="inline-flex items-center px-4 py-2 bg-blue-600 hover:bg-blue-700 text-white text-sm font-medium rounded-lg transition-colors duration-200 disabled:opacity-50 disabled:cursor-not-allowed"
                    @if(!$photo) disabled @endif>
                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                </svg>
                {{ __('Upload Picture') }}
            </button>

            @if($user->profile_picture)
                <button type="button" 
                        wire:click="remove"
                        wire:confirm="Are you sure you want to remove your profile picture?"
                        class="inline-flex items-center px-4 py-2 bg-red-600 hover:bg-red-700 text-white text-sm font-medium rounded-lg transition-colors duration-200">
                    <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
                    </svg>
                    {{ __('Remove Picture') }}
                </button>
            @endif
        </div>
    </form>

    <!-- Success Message -->
    @if (session()->has('message'))
        <div x-data="{ show: true }" 
             x-show="show" 
             x-transition
             x-init="setTimeout(() => show = false, 3000)"
             class="bg-green-50 dark:bg-green-900 border border-green-200 dark:border-green-700 text-green-800 dark:text-green-200 px-4 py-3 rounded-lg">
            {{ session('message') }}
        </div>
    @endif

    <!-- Loading Indicator -->
    <div wire:loading class="flex items-center space-x-2 text-sm text-gray-500 dark:text-gray-400">
        <div class="flex space-x-1">
            <div class="w-2 h-2 bg-gray-400 dark:bg-gray-500 rounded-full animate-bounce"></div>
            <div class="w-2 h-2 bg-gray-400 dark:bg-gray-500 rounded-full animate-bounce" style="animation-delay: 0.1s"></div>
            <div class="w-2 h-2 bg-gray-400 dark:bg-gray-500 rounded-full animate-bounce" style="animation-delay: 0.2s"></div>
        </div>
        <span>Uploading...</span>
    </div>
</div>