<div class="h-full flex flex-col lg:grid lg:grid-cols-12 lg:gap-6">
    
    <!-- Left Column - Users/Group Members List -->
    <div class="lg:col-span-3 bg-white dark:bg-gray-800 rounded-xl shadow-sm border border-gray-200 dark:border-gray-700 overflow-hidden">
        <div class="h-full flex flex-col">
            <!-- Dynamic Header -->
            <div class="p-4 border-b border-gray-200 dark:border-gray-700 bg-gray-50 dark:bg-gray-900">
                <div class="flex items-center justify-between">
                    <div class="flex items-center space-x-3">
                        @if($selectedGroup)
                            <button wire:click="clearSelection" 
                                    class="flex items-center text-gray-500 hover:text-gray-700 dark:hover:text-gray-300 transition-colors"
                                    title="Back to All Users">
                                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/>
                                </svg>
                            </button>
                        @endif
                        <h3 class="text-lg font-semibold text-gray-900 dark:text-gray-100">
                            @if($selectedGroup)
                                Group Members
                            @else
                                All Users
                            @endif
                        </h3>
                    </div>
                    <div class="flex items-center space-x-2">
                        <div class="w-2 h-2 bg-green-500 rounded-full animate-pulse"></div>
                        <span class="text-xs text-green-700 dark:text-green-300 font-medium">Online</span>
                    </div>
                </div>
                
                <!-- Search Bar -->
                <div class="mt-3 relative">
                    <input type="text" 
                           wire:model.live="searchUsers"
                           placeholder="@if($selectedGroup)Search group members...@elseSearch users...@endif" 
                           class="w-full pl-10 pr-4 py-2 border border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-800 text-gray-900 dark:text-gray-100 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent text-sm placeholder-gray-500 dark:placeholder-gray-400 transition-all duration-200">
                    <svg class="absolute left-3 top-2.5 w-4 h-4 text-gray-400 dark:text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
                    </svg>
                    @if($searchUsers)
                        <button wire:click="$set('searchUsers', '')" 
                                class="absolute right-3 top-2.5 w-4 h-4 text-gray-400 hover:text-gray-600 dark:hover:text-gray-300 transition-colors">
                            <svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                            </svg>
                        </button>
                    @endif
                </div>
            </div>

            <!-- Users List -->
            <div class="flex-1 overflow-y-auto scrollbar-thin">
                @if($searchUsers)
                    <div class="px-4 py-2 bg-blue-50 dark:bg-blue-900 border-b border-blue-200 dark:border-blue-700">
                        <p class="text-xs text-blue-700 dark:text-blue-300 font-medium">
                            {{ $users->count() }} {{ $users->count() === 1 ? 'result' : 'results' }} for "{{ $searchUsers }}"
                        </p>
                    </div>
                @endif
                <div class="p-4 space-y-2">
                    @forelse ($users as $user)
                    <div class="group cursor-pointer p-3 rounded-lg hover:bg-gray-50 dark:hover:bg-gray-700 transition-colors duration-200 border border-transparent hover:border-gray-200 dark:hover:border-gray-600 {{ $selectedUser && $selectedUser->id === $user->id ? 'bg-blue-50 dark:bg-blue-900 border-blue-200 dark:border-blue-700' : '' }}"
                         wire:click="selectUser({{ $user->id }})">
                        <div class="flex items-center space-x-3">
                            <!-- User Avatar -->
                            <div class="relative">
                                <div class="w-10 h-10 bg-gradient-to-br from-blue-400 to-purple-500 rounded-full flex items-center justify-center">
                                    <span class="text-sm font-medium text-white">{{ substr($user->name, 0, 1) }}</span>
                                </div>
                                <div class="absolute -bottom-1 -right-1 w-4 h-4 bg-green-500 border-2 border-white dark:border-gray-800 rounded-full">
                                    <div class="w-full h-full bg-green-500 rounded-full animate-pulse"></div>
                                </div>
                            </div>
                            
                            <!-- User Info -->
                            <div class="flex-1 min-w-0">
                                <h4 class="text-sm font-semibold text-gray-900 dark:text-gray-100 truncate group-hover:text-blue-600 dark:group-hover:text-blue-400 transition-colors">
                                    {{ $user->name }}
                                </h4>
                                <p class="text-xs text-gray-500 dark:text-gray-400 truncate">
                                    {{ $user->email }}
                                </p>
                            </div>

                            <!-- Action Button -->
                            <div class="flex-shrink-0">
                                <button class="opacity-0 group-hover:opacity-100 transition-opacity duration-200 p-2 text-gray-400 hover:text-blue-600 hover:bg-blue-50 dark:hover:bg-blue-900 rounded-lg">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"/>
                                    </svg>
                                </button>
                            </div>
                        </div>
                    </div>
                    @empty
                    <div class="text-center py-8">
                        <div class="w-16 h-16 bg-gray-100 dark:bg-gray-700 rounded-full flex items-center justify-center mx-auto mb-4">
                            <svg class="w-8 h-8 text-gray-400 dark:text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197m13.5-9a2.5 2.5 0 11-5 0 2.5 2.5 0 015 0z"/>
                            </svg>
                        </div>
                        <h3 class="text-sm font-medium text-gray-900 dark:text-gray-100 mb-1">
                            @if($selectedGroup)
                                No group members found
                            @else
                                No users found
                            @endif
                        </h3>
                        <p class="text-xs text-gray-500 dark:text-gray-400">
                            @if($searchUsers)
                                Try adjusting your search terms
                            @elseif($selectedGroup)
                                This group has no other members
                            @else
                                No other users available
                            @endif
                        </p>
                    </div>
                    @endforelse
                </div>
            </div>
        </div>
    </div>

    <!-- Middle Column - Main Chat Area -->
    <div class="lg:col-span-6 bg-white dark:bg-gray-800 rounded-xl shadow-sm border border-gray-200 dark:border-gray-700 overflow-hidden">
        <div class="h-full flex flex-col">
            <!-- Chat Header -->
            <div class="p-4 border-b border-gray-200 dark:border-gray-700 bg-gray-50 dark:bg-gray-900">
                <div class="flex items-center justify-between">
                    <div class="flex items-center space-x-3">
                        <div class="relative">
                            <div class="w-10 h-10 bg-gradient-to-br from-blue-500 to-purple-600 rounded-full flex items-center justify-center">
                                <svg class="w-5 h-5 text-white" fill="currentColor" viewBox="0 0 20 20">
                                    <path d="M2 5a2 2 0 012-2h7a2 2 0 012 2v4a2 2 0 01-2 2H9l-3 3v-3H4a2 2 0 01-2-2V5z"/>
                                </svg>
                            </div>
                            <div class="absolute -bottom-1 -right-1 w-4 h-4 bg-green-500 border-2 border-white dark:border-gray-800 rounded-full">
                                <div class="w-full h-full bg-green-500 rounded-full animate-pulse"></div>
                            </div>
                        </div>
                        <div>
                            <div class="flex items-center space-x-2 mb-1">
                                @if($selectedGroup)
                                    <span class="text-xs text-gray-500 dark:text-gray-400">Group Members View</span>
                                    <svg class="w-3 h-3 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                                    </svg>
                                @endif
                            </div>
                            <h3 class="font-semibold text-gray-900 dark:text-gray-100">
                                @if($selectedUser)
                                    {{ $selectedUser->name }}
                                @elseif($selectedGroup)
                                    {{ $selectedGroup->name }}
                                @else
                                    General Chat
                                @endif
                            </h3>
                            <div class="flex items-center space-x-2">
                                <div class="w-2 h-2 bg-green-500 rounded-full animate-pulse"></div>
                                <p class="text-sm text-gray-500 dark:text-gray-400">
                                    @if($selectedUser)
                                        Direct message
                                    @elseif($selectedGroup)
                                        Group chat • {{ $selectedGroup->users_count }} members
                                    @else
                                        Live • Everyone can participate
                                    @endif
                                </p>
                            </div>
                        </div>
                    </div>
                    
                    <div class="flex items-center space-x-2" x-data="{ 
                        isFullscreen: false,
                        showSettings: false,
                        toggleFullscreen() {
                            this.isFullscreen = !this.isFullscreen;
                            if (this.isFullscreen) {
                                document.documentElement.requestFullscreen();
                            } else {
                                document.exitFullscreen();
                            }
                        },
                        toggleSettings() {
                            this.showSettings = !this.showSettings;
                        }
                    }">
                        <!-- Fullscreen Button -->
                        <button @click="toggleFullscreen()" 
                                class="p-2 text-gray-500 dark:text-gray-400 hover:text-gray-700 dark:hover:text-gray-300 hover:bg-gray-200 dark:hover:bg-gray-700 rounded-lg transition-colors"
                                :title="isFullscreen ? 'Exit Fullscreen' : 'Enter Fullscreen'">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-5 5v-5zM4.5 19.5L9 15H4.5v4.5z"/>
                            </svg>
                        </button>
                        
                        <!-- Settings Button -->
                        <div class="relative">
                            <button @click="toggleSettings()" 
                                    class="p-2 text-gray-500 dark:text-gray-400 hover:text-gray-700 dark:hover:text-gray-300 hover:bg-gray-200 dark:hover:bg-gray-700 rounded-lg transition-colors"
                                    title="Chat Settings">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"/>
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                                </svg>
                            </button>
                            
                            <!-- Settings Dropdown -->
                            <div x-show="showSettings" 
                                 x-transition
                                 @click.away="showSettings = false"
                                 class="absolute right-0 mt-2 w-48 bg-white dark:bg-gray-800 rounded-lg shadow-lg border border-gray-200 dark:border-gray-700 z-50">
                                <div class="py-1">
                                    @if($selectedUser)
                                        <!-- Direct Message Settings -->
                                        <button class="w-full px-4 py-2 text-left text-sm text-gray-700 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-700 flex items-center">
                                            <svg class="w-4 h-4 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-5 5v-5zM4.5 19.5L9 15H4.5v4.5z"/>
                                            </svg>
                                            View Profile
                                        </button>
                                        <button class="w-full px-4 py-2 text-left text-sm text-gray-700 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-700 flex items-center">
                                            <svg class="w-4 h-4 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                                            </svg>
                                            Mute Notifications
                                        </button>
                                        <button class="w-full px-4 py-2 text-left text-sm text-red-600 dark:text-red-400 hover:bg-gray-100 dark:hover:bg-gray-700 flex items-center">
                                            <svg class="w-4 h-4 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18.364 18.364A9 9 0 005.636 5.636m12.728 12.728L5.636 5.636m12.728 12.728L18.364 5.636M5.636 18.364l12.728-12.728"/>
                                            </svg>
                                            Block User
                                        </button>
                                    @elseif($selectedGroup)
                                        <!-- Group Chat Settings -->
                                        <button class="w-full px-4 py-2 text-left text-sm text-gray-700 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-700 flex items-center">
                                            <svg class="w-4 h-4 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"/>
                                            </svg>
                                            Group Members
                                        </button>
                                        <button class="w-full px-4 py-2 text-left text-sm text-gray-700 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-700 flex items-center">
                                            <svg class="w-4 h-4 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                                            </svg>
                                            Mute Notifications
                                        </button>
                                        <button class="w-full px-4 py-2 text-left text-sm text-gray-700 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-700 flex items-center">
                                            <svg class="w-4 h-4 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-8l-4-4m0 0L8 8m4-4v12"/>
                                            </svg>
                                            Export Chat
                                        </button>
                                        <button class="w-full px-4 py-2 text-left text-sm text-red-600 dark:text-red-400 hover:bg-gray-100 dark:hover:bg-gray-700 flex items-center">
                                            <svg class="w-4 h-4 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"/>
                                            </svg>
                                            Leave Group
                                        </button>
                                    @else
                                        <!-- General Chat Settings -->
                                        <button class="w-full px-4 py-2 text-left text-sm text-gray-700 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-700 flex items-center">
                                            <svg class="w-4 h-4 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                                            </svg>
                                            Mute Notifications
                                        </button>
                                        <button class="w-full px-4 py-2 text-left text-sm text-gray-700 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-700 flex items-center">
                                            <svg class="w-4 h-4 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-8l-4-4m0 0L8 8m4-4v12"/>
                                            </svg>
                                            Export Chat History
                                        </button>
                                        <button class="w-full px-4 py-2 text-left text-sm text-gray-700 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-700 flex items-center">
                                            <svg class="w-4 h-4 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"/>
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                                            </svg>
                                            Chat Settings
                                        </button>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Chat Messages -->
            <div class="flex-1 overflow-hidden">
                <livewire:chat :userId="auth()->id()" :selectedUser="$selectedUser" :selectedGroup="$selectedGroup" />
            </div>
        </div>
    </div>

    <!-- Right Column - Groups List -->
    <div class="lg:col-span-3 bg-white dark:bg-gray-800 rounded-xl shadow-sm border border-gray-200 dark:border-gray-700 overflow-hidden">
        <div class="h-full flex flex-col">
            <!-- Groups Header -->
            <div class="p-4 border-b border-gray-200 dark:border-gray-700 bg-gray-50 dark:bg-gray-900">
                <div class="flex items-center justify-between">
                    <h3 class="text-lg font-semibold text-gray-900 dark:text-gray-100">All Groups</h3>
                    <a href="{{ route('create-group') }}" 
                       class="inline-flex items-center px-3 py-1.5 bg-blue-600 hover:bg-blue-700 text-white text-xs font-medium rounded-lg transition-colors">
                        <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"/>
                        </svg>
                        Create Group
                    </a>
                </div>

                <!-- Search Bar -->
                <div class="mt-3 relative">
                    <input type="text" 
                           wire:model.live="searchGroups"
                           placeholder="Search groups..." 
                           class="w-full pl-10 pr-4 py-2 border border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-800 text-gray-900 dark:text-gray-100 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent text-sm placeholder-gray-500 dark:placeholder-gray-400 transition-all duration-200">
                    <svg class="absolute left-3 top-2.5 w-4 h-4 text-gray-400 dark:text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
                    </svg>
                    @if($searchGroups)
                        <button wire:click="$set('searchGroups', '')" 
                                class="absolute right-3 top-2.5 w-4 h-4 text-gray-400 hover:text-gray-600 dark:hover:text-gray-300 transition-colors">
                            <svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                            </svg>
                        </button>
                    @endif
                </div>
            </div>

            <!-- Groups List -->
            <div class="flex-1 overflow-y-auto scrollbar-thin">
                @if($searchGroups)
                    <div class="px-4 py-2 bg-blue-50 dark:bg-blue-900 border-b border-blue-200 dark:border-blue-700">
                        <p class="text-xs text-blue-700 dark:text-blue-300 font-medium">
                            {{ $groups->count() }} {{ $groups->count() === 1 ? 'result' : 'results' }} for "{{ $searchGroups }}"
                        </p>
                    </div>
                @endif
                <div class="p-4">
                    @forelse ($groups as $group)
                        <div class="group cursor-pointer p-3 rounded-lg hover:bg-gray-50 dark:hover:bg-gray-700 transition-colors duration-200 border border-transparent hover:border-gray-200 dark:hover:border-gray-600 {{ $selectedGroup && $selectedGroup->id === $group->id ? 'bg-blue-50 dark:bg-blue-900 border-blue-200 dark:border-blue-700' : '' }}"
                             wire:click="selectGroup({{ $group->id }})">
                            <div class="flex items-center space-x-3">
                                <!-- Group Avatar -->
                                <div class="w-12 h-12 bg-gradient-to-br from-blue-500 to-purple-600 rounded-xl flex items-center justify-center flex-shrink-0">
                                    <svg class="w-6 h-6 text-white" fill="currentColor" viewBox="0 0 20 20">
                                        <path d="M13 6a3 3 0 11-6 0 3 3 0 016 0zM18 8a2 2 0 11-4 0 2 2 0 014 0zM14 15a4 4 0 00-8 0v3h8v-3zM6 8a2 2 0 11-4 0 2 2 0 014 0zM16 18v-3a5.972 5.972 0 00-.75-2.906A3.005 3.005 0 0119 15v3h-3zM4.75 12.094A5.973 5.973 0 004 15v3H1v-3a3 3 0 013.75-2.906z"/>
                                    </svg>
                                </div>
                                
                                <!-- Group Info -->
                                <div class="flex-1 min-w-0">
                                    <div class="flex items-center justify-between">
                                        <h4 class="text-sm font-semibold text-gray-900 dark:text-gray-100 truncate group-hover:text-blue-600 dark:group-hover:text-blue-400 transition-colors">
                                            {{ $group->name }}
                                        </h4>
                                        @if($group->created_by === auth()->id())
                                            <span class="inline-flex items-center px-2 py-0.5 rounded-full text-xs font-medium bg-green-100 dark:bg-green-900 text-green-800 dark:text-green-200">
                                                Admin
                                            </span>
                                        @endif
                                    </div>
                                    
                                    <div class="flex items-center justify-between mt-1">
                                        <p class="text-xs text-gray-500 dark:text-gray-400">
                                            {{ $group->users_count }} member{{ $group->users_count !== 1 ? 's' : '' }}
                                        </p>
                                        <span class="text-xs text-gray-400 dark:text-gray-500">
                                            {{ $group->created_at->diffForHumans() }}
                                        </span>
                                    </div>
                                    
                                    <!-- Last Message Preview (if available) -->
                                    <div class="mt-1">
                                        <p class="text-xs text-gray-600 dark:text-gray-300 truncate">
                                            @if($group->latestMessage)
                                                <span class="font-medium">{{ $group->latestMessage->user->name }}:</span> 
                                                {{ Str::limit($group->latestMessage->body, 30) }}
                                            @else
                                                <span class="text-gray-400 dark:text-gray-500 italic">No messages yet</span>
                                            @endif
                                        </p>
                                    </div>
                                </div>
                                
                                <!-- Action Button -->
                                <div class="flex-shrink-0">
                                    <a href="{{ route('view-group-info', $group) }}" 
                                       class="opacity-0 group-hover:opacity-100 transition-opacity duration-200 p-2 text-gray-400 hover:text-blue-600 hover:bg-blue-50 dark:hover:bg-blue-900 rounded-lg">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                                        </svg>
                                    </a>
                                </div>
                            </div>
                        </div>
                    @empty
                        <!-- Empty State -->
                        <div class="text-center py-8">
                            <div class="w-16 h-16 bg-gray-100 dark:bg-gray-700 rounded-full flex items-center justify-center mx-auto mb-4">
                                <svg class="w-8 h-8 text-gray-400 dark:text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"/>
                                </svg>
                            </div>
                            <h3 class="text-sm font-medium text-gray-900 dark:text-gray-100 mb-1">
                                @if($searchGroups)
                                    No groups found
                                @else
                                    No groups yet
                                @endif
                            </h3>
                            <p class="text-xs text-gray-500 dark:text-gray-400 mb-4">
                                @if($searchGroups)
                                    Try adjusting your search terms
                                @else
                                    You haven't joined any groups yet.
                                @endif
                            </p>
                            <a href="{{ route('create-group') }}" 
                               class="inline-flex items-center px-3 py-2 border border-transparent text-xs font-medium rounded-md text-blue-700 bg-blue-100 hover:bg-blue-200 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 transition-colors">
                                <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"/>
                                </svg>
                                Create your first group
                            </a>
                        </div>
                    @endforelse
                </div>
            </div>
        </div>
    </div>
</div>
