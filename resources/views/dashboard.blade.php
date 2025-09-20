<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Chat') }}
        </h2>
    </x-slot>

    <div class="h-[calc(100vh-8rem)]">
        <div class="max-w-7xl mx-auto h-full">
            <!-- Chat Dashboard Layout -->
            <livewire:chat-dashboard />
        </div>
    </div>
    
    <!-- Spacer div to create distance between chat and footer -->
    <div class="h-8"></div>
</x-app-layout>
