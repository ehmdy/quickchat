<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('User Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <!-- Main Content -->
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
                <!-- Left Sidebar -->
                <div class="lg:col-span-2 space-y-6">
                    <!-- Chat Section -->
                    <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                        <div class="p-6">
                            <h3 class="text-lg font-medium text-gray-900 dark:text-white mb-4">Chat</h3>
                            <livewire:chat :userId="auth()->id()" />
                        </div>
                    </div>

                    <!-- My Groups Section -->
                    <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                        <div class="p-6">
                            <div class="flex justify-between items-center mb-4">
                                <h3 class="text-lg font-medium text-gray-900 dark:text-white">My Groups</h3>
                                <a href="{{ route('create-group') }}" class="text-sm font-medium text-indigo-600 hover:text-indigo-500 dark:text-indigo-400 dark:hover:text-indigo-300">
                                    + Create New Group
                                </a>
                            </div>
                            <livewire:user-groups />
                        </div>
                    </div>
                </div>

                <!-- Right Sidebar -->
                <div class="space-y-6">
                    <!-- Group Invitations -->
                    <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                        <div class="p-6">
                            <h3 class="text-lg font-medium text-gray-900 dark:text-white mb-4">Group Invitations</h3>
                            <livewire:group-invite.send-group-invite />
                        </div>
                    </div>

                    <!-- Group List -->
                    <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                        <div class="p-6">
                            <h3 class="text-lg font-medium text-gray-900 dark:text-white mb-4">All Groups</h3>
                            <livewire:group.list-group />
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
