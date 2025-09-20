<!-- Mobile Footer Navigation -->
<div class="fixed bottom-0 left-0 right-0 bg-white dark:bg-gray-800 border-t border-gray-200 dark:border-gray-700 lg:hidden z-50">
    <div class="max-w-7xl mx-auto px-4">
        <div class="flex items-center justify-around py-2">
            <!-- Home -->
            @auth
                <a href="{{ route('user.dashboard') }}" 
                   class="flex flex-col items-center py-2 px-3 rounded-lg transition-colors {{ request()->routeIs('user.dashboard') ? 'text-blue-600 dark:text-blue-400 bg-blue-50 dark:bg-blue-900' : 'text-gray-500 dark:text-gray-400 hover:text-gray-700 dark:hover:text-gray-300' }}">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"/>
                    </svg>
                    <span class="text-xs mt-1 font-medium">Home</span>
                </a>
            @else
                <a href="{{ route('login') }}" 
                   class="flex flex-col items-center py-2 px-3 rounded-lg transition-colors {{ request()->routeIs('login') ? 'text-blue-600 dark:text-blue-400 bg-blue-50 dark:bg-blue-900' : 'text-gray-500 dark:text-gray-400 hover:text-gray-700 dark:hover:text-gray-300' }}">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"/>
                    </svg>
                    <span class="text-xs mt-1 font-medium">Home</span>
                </a>
            @endauth

            <!-- Chat -->
            @auth
                <a href="{{ route('user.dashboard') }}" 
                   class="flex flex-col items-center py-2 px-3 rounded-lg transition-colors {{ request()->routeIs('user.dashboard') ? 'text-blue-600 dark:text-blue-400 bg-blue-50 dark:bg-blue-900' : 'text-gray-500 dark:text-gray-400 hover:text-gray-700 dark:hover:text-gray-300' }}">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"/>
                    </svg>
                    <span class="text-xs mt-1 font-medium">Chat</span>
                </a>
            @else
                <a href="{{ route('login') }}" 
                   class="flex flex-col items-center py-2 px-3 rounded-lg transition-colors {{ request()->routeIs('login') ? 'text-blue-600 dark:text-blue-400 bg-blue-50 dark:bg-blue-900' : 'text-gray-500 dark:text-gray-400 hover:text-gray-700 dark:hover:text-gray-300' }}">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"/>
                    </svg>
                    <span class="text-xs mt-1 font-medium">Chat</span>
                </a>
            @endauth

            <!-- Groups -->
            @auth
                <a href="{{ route('create-group') }}" 
                   class="flex flex-col items-center py-2 px-3 rounded-lg transition-colors {{ request()->routeIs('create-group') ? 'text-blue-600 dark:text-blue-400 bg-blue-50 dark:bg-blue-900' : 'text-gray-500 dark:text-gray-400 hover:text-gray-700 dark:hover:text-gray-300' }}">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"/>
                    </svg>
                    <span class="text-xs mt-1 font-medium">Groups</span>
                </a>
            @else
                <a href="{{ route('login') }}" 
                   class="flex flex-col items-center py-2 px-3 rounded-lg transition-colors {{ request()->routeIs('login') ? 'text-blue-600 dark:text-blue-400 bg-blue-50 dark:bg-blue-900' : 'text-gray-500 dark:text-gray-400 hover:text-gray-700 dark:hover:text-gray-300' }}">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"/>
                    </svg>
                    <span class="text-xs mt-1 font-medium">Groups</span>
                </a>
            @endauth

            <!-- Articles -->
            <a href="{{ route('display-article') }}" 
               class="flex flex-col items-center py-2 px-3 rounded-lg transition-colors {{ request()->routeIs('display-article') ? 'text-blue-600 dark:text-blue-400 bg-blue-50 dark:bg-blue-900' : 'text-gray-500 dark:text-gray-400 hover:text-gray-700 dark:hover:text-gray-300' }}">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                </svg>
                <span class="text-xs mt-1 font-medium">Articles</span>
            </a>

            <!-- Profile -->
            @auth
                <a href="{{ route('profile.edit') }}" 
                   class="flex flex-col items-center py-2 px-3 rounded-lg transition-colors {{ request()->routeIs('profile.edit') ? 'text-blue-600 dark:text-blue-400 bg-blue-50 dark:bg-blue-900' : 'text-gray-500 dark:text-gray-400 hover:text-gray-700 dark:hover:text-gray-300' }}">
                    <div class="w-6 h-6 bg-gradient-to-br from-green-400 to-blue-500 rounded-full flex items-center justify-center">
                        <span class="text-xs font-medium text-white">{{ substr(auth()->user()->name, 0, 1) }}</span>
                    </div>
                    <span class="text-xs mt-1 font-medium">Profile</span>
                </a>
            @else
                <a href="{{ route('login') }}" 
                   class="flex flex-col items-center py-2 px-3 rounded-lg transition-colors {{ request()->routeIs('login') ? 'text-blue-600 dark:text-blue-400 bg-blue-50 dark:bg-blue-900' : 'text-gray-500 dark:text-gray-400 hover:text-gray-700 dark:hover:text-gray-300' }}">
                    <div class="w-6 h-6 bg-gradient-to-br from-green-400 to-blue-500 rounded-full flex items-center justify-center">
                        <svg class="w-4 h-4 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 16l-4-4m0 0l4-4m-4 4h14m-5 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h7a3 3 0 013 3v1"/>
                        </svg>
                    </div>
                    <span class="text-xs mt-1 font-medium">Login</span>
                </a>
            @endauth
        </div>
    </div>
</div>
