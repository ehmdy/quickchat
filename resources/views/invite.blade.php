<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Invite') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-xs sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                   
                    <h1 class="text-2xl font-bold mb-4">
                        You are invited to join: group name {{ $group->name }}
                    </h1>
                    <h2 class="text-xl font-bold mb-4">
                        Group created by: {{ $group->user ? $group->user->name : 'Unknown' }}
                    </h2>
                    <p class="mb-4">
                        This group was created on {{ $group->created_at->format('d M Y') }}.
                    </p>
                  
                </div>
 
                <form method="POST" action="{{ route('group.join', $group->id) }}">
                    @csrf
                    <button 
                        type="submit"
                        class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700"
                    >
                        Join Group
                    </button>
                </form>
            
            </div>
        </div>
    </div>
</x-app-layout>
