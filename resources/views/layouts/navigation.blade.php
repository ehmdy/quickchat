<nav x-data="{ 
    open: false,
    isDark: false,
    init() {
        // Initialize dark mode from localStorage or system preference
        const savedMode = localStorage.getItem('darkMode');
        if (savedMode !== null) {
            this.isDark = savedMode === 'true';
        } else {
            this.isDark = window.matchMedia('(prefers-color-scheme: dark)').matches;
            localStorage.setItem('darkMode', this.isDark);
        }
        this.applyDarkMode();
        console.log('Navigation initialized, isDark:', this.isDark);
    },
    toggleDarkMode() {
        this.isDark = !this.isDark;
        localStorage.setItem('darkMode', this.isDark);
        this.applyDarkMode();
        console.log('Dark mode toggled, isDark:', this.isDark);
    },
    applyDarkMode() {
        if (this.isDark) {
            document.documentElement.classList.add('dark');
        } else {
            document.documentElement.classList.remove('dark');
        }
    }
}" class="bg-white dark:bg-gray-800 border-b border-gray-100 dark:border-gray-700">
    <!-- Primary Navigation Menu -->
    <div class="max-w-7xl mx-auto px-4 p-3 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            <div class="flex">
                <!-- Logo -->
                <div class="shrink-0 flex items-center space-x-3">
                    <div class="flex items-center space-x-3">
                        <!-- QuickChat Icon -->
                        <div class="w-8 h-8 bg-gradient-to-br from-blue-500 to-purple-600 rounded-lg flex items-center justify-center">
                            <svg class="w-5 h-5 text-white" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M2 5a2 2 0 012-2h7a2 2 0 012 2v4a2 2 0 01-2 2H9l-3 3v-3H4a2 2 0 01-2-2V5z"/>
                            </svg>
                        </div>
                        <!-- Home Link -->
                        <x-nav-link href="/" :active="request()->is('/')" class="text-xl font-bold">
                            {{__('Home')}}
                        </x-nav-link>
                    </div>
                </div>

                <!-- Navigation Links -->
                <div class="hidden space-x-8 sm:-my-px sm:ms-10 sm:flex">
                    @if (Route::has('login'))
                        @auth
                            @role('admin')
                                <x-nav-link :href="route('admin.dashboard')" :active="request()->routeIs('admin.dashboard')">
                                    {{ __('Admin Dashboard') }}
                                </x-nav-link>
                                @else
                                <x-nav-link :href="route('user.dashboard')" :active="request()->is('chat')">
                                    {{ __('Chat') }}
                                </x-nav-link>
                                <x-nav-link :href="route('create-group')" :active="request()->routeIs('create-group')">
                                    {{ __('Create Group') }}
                                </x-nav-link>
 
                            @endrole
                            @else
                            <x-nav-link :href="route('login')" :active="request()->routeIs('login')">
                                {{ __('Login') }}
                            </x-nav-link>

                            @if (Route::has('register'))
                                <x-nav-link :href="route('register')" :active="request()->routeIs('register')">
                                    {{ __('Register') }}
                                </x-nav-link>
                            @endif
                        @endauth
                         
                        <x-nav-link :href="route('display-article')" :active="request()->routeIs('display-article') || request()->routeIs('article.*')">
                            {{ __('Articles') }}
                        </x-nav-link>
 
                    @endif
                </div>
            </div>

            <!-- Settings Dropdown -->
           
            <div class="hidden sm:flex sm:items-center sm:ms-6 space-x-4">
                <!-- Dark Mode Toggle -->
                <button id="darkModeToggle" 
                        class="p-2 rounded-lg text-gray-500 dark:text-gray-400 hover:text-gray-700 dark:hover:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-700 transition-colors duration-200"
                        title="Switch to Dark Mode">
                    <!-- Sun icon (shown in dark mode) -->
                    <svg id="sunIcon" class="w-5 h-5 hidden" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 3v1m0 16v1m9-9h-1M4 12H3m15.364 6.364l-.707-.707M6.343 6.343l-.707-.707m12.728 0l-.707.707M6.343 17.657l-.707.707M16 12a4 4 0 11-8 0 4 4 0 018 0z"/>
                    </svg>
                    <!-- Moon icon (shown in light mode) -->
                    <svg id="moonIcon" class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20.354 15.354A9 9 0 018.646 3.646 9.003 9.003 0 0012 21a9.003 9.003 0 008.354-5.646z"/>
                    </svg>
                </button>

                @auth
                    <x-dropdown align="right" width="48">
                        <x-slot name="trigger">
                            <button class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 dark:text-gray-400 bg-white dark:bg-gray-800 hover:text-gray-700 dark:hover:text-gray-300 focus:outline-hidden transition ease-in-out duration-150">
                                <div>{{ Auth::user()->name }}</div>

                                <div class="ms-1">
                                    <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                    </svg>
                                </div>
                            </button>
                        </x-slot>

                        <x-slot name="content">
                            <x-dropdown-link :href="route('profile.edit')">
                                {{ __('Profile') }}
                            </x-dropdown-link>

                            <!-- Authentication -->
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf

                                <x-dropdown-link :href="route('logout')"
                                        onclick="event.preventDefault();
                                                    this.closest('form').submit();">
                                    {{ __('Log Out') }}
                                </x-dropdown-link>
                            </form>
                        </x-slot>
                    </x-dropdown>
                @endauth
            </div>
           

            <!-- Hamburger -->
            <div class="-me-2 flex items-center sm:hidden">
                <button @click="open = ! open" class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 dark:text-gray-500 hover:text-gray-500 dark:hover:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-900 focus:outline-hidden focus:bg-gray-100 dark:focus:bg-gray-900 focus:text-gray-500 dark:focus:text-gray-400 transition duration-150 ease-in-out">
                    <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path :class="{'hidden': open, 'inline-flex': ! open }" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                        <path :class="{'hidden': ! open, 'inline-flex': open }" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

 
    <!-- Responsive Navigation Menu -->
    <div :class="{'block': open, 'hidden': ! open}" class="hidden sm:hidden">
        <div class="pt-2 pb-3 space-y-1">
            

            @if (Route::has('login'))
                @auth
                    @role('admin')
                        
                        <x-responsive-nav-link :href="route('admin.dashboard')" :active="request()->routeIs('admin.dashboard')">
                            {{ __('Admin Dashboard') }}
                        </x-responsive-nav-link>
                        @else
                      
                        <x-responsive-nav-link :href="route('user.dashboard')" :active="request()->is('chat')">
                            {{ __('Chat') }}
                        </x-responsive-nav-link>
                    @endrole
                    @else
                   
                    <x-responsive-nav-link :href="route('login')" :active="request()->routeIs('login')">
                        {{ __('Login') }}
                    </x-responsive-nav-link>

                    @if (Route::has('register'))
                        
                        <x-responsive-nav-link :href="route('register')" :active="request()->routeIs('register')">
                            {{ __('Register') }}
                        </x-responsive-nav-link>
                    @endif
                @endauth
            @endif
        </div>

        
        <!-- Responsive Settings Options -->
        <div class="pt-4 pb-1 border-t border-gray-200 dark:border-gray-600">
            <!-- Dark Mode Toggle for Mobile -->
            <div class="px-4 py-2">
                <button id="darkModeToggleMobile" 
                        class="flex items-center w-full px-3 py-2 text-sm text-gray-700 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-700 rounded-md transition-colors duration-200">
                    <!-- Sun icon (shown in dark mode) -->
                    <svg id="sunIconMobile" class="w-5 h-5 mr-3 hidden" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 3v1m0 16v1m9-9h-1M4 12H3m15.364 6.364l-.707-.707M6.343 6.343l-.707-.707m12.728 0l-.707.707M6.343 17.657l-.707.707M16 12a4 4 0 11-8 0 4 4 0 018 0z"/>
                    </svg>
                    <!-- Moon icon (shown in light mode) -->
                    <svg id="moonIconMobile" class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20.354 15.354A9 9 0 018.646 3.646 9.003 9.003 0 0012 21a9.003 9.003 0 008.354-5.646z"/>
                    </svg>
                    <span id="darkModeText">Switch to Dark Mode</span>
                </button>
            </div>

            @auth
            <div class="px-4">
                <div class="font-medium text-base text-gray-800 dark:text-gray-200">{{ Auth::user()->name }}</div>
                <div class="font-medium text-sm text-gray-500 dark:text-gray-400">{{ Auth::user()->email }}</div>
            </div>

            <div class="mt-3 space-y-1">
                <x-responsive-nav-link :href="route('profile.edit')">
                    {{ __('Profile') }}
                </x-responsive-nav-link>

                <!-- Authentication -->
                <form method="POST" action="{{ route('logout') }}">
                    @csrf

                    <x-responsive-nav-link :href="route('logout')"
                            onclick="event.preventDefault();
                                        this.closest('form').submit();">
                        {{ __('Log Out') }}
                    </x-responsive-nav-link>
                </form>
            </div>
            @endauth
        </div>
    </div>
    
</nav>

<script>
document.addEventListener('DOMContentLoaded', function() {
    // Dark mode functionality
    let isDark = false;
    
    // Initialize dark mode
    function initDarkMode() {
        const savedMode = localStorage.getItem('darkMode');
        if (savedMode !== null) {
            isDark = savedMode === 'true';
        } else {
            isDark = window.matchMedia('(prefers-color-scheme: dark)').matches;
            localStorage.setItem('darkMode', isDark);
        }
        applyDarkMode();
    }
    
    // Apply dark mode
    function applyDarkMode() {
        if (isDark) {
            document.documentElement.classList.add('dark');
            // Show sun icon, hide moon icon
            document.getElementById('sunIcon')?.classList.remove('hidden');
            document.getElementById('moonIcon')?.classList.add('hidden');
            document.getElementById('sunIconMobile')?.classList.remove('hidden');
            document.getElementById('moonIconMobile')?.classList.add('hidden');
            // Update tooltips and text
            document.getElementById('darkModeToggle')?.setAttribute('title', 'Switch to Light Mode');
            document.getElementById('darkModeText').textContent = 'Switch to Light Mode';
        } else {
            document.documentElement.classList.remove('dark');
            // Show moon icon, hide sun icon
            document.getElementById('sunIcon')?.classList.add('hidden');
            document.getElementById('moonIcon')?.classList.remove('hidden');
            document.getElementById('sunIconMobile')?.classList.add('hidden');
            document.getElementById('moonIconMobile')?.classList.remove('hidden');
            // Update tooltips and text
            document.getElementById('darkModeToggle')?.setAttribute('title', 'Switch to Dark Mode');
            document.getElementById('darkModeText').textContent = 'Switch to Dark Mode';
        }
    }
    
    // Toggle dark mode
    function toggleDarkMode() {
        isDark = !isDark;
        localStorage.setItem('darkMode', isDark);
        applyDarkMode();
    }
    
    // Initialize
    initDarkMode();
    
    // Add event listeners
    document.getElementById('darkModeToggle')?.addEventListener('click', toggleDarkMode);
    document.getElementById('darkModeToggleMobile')?.addEventListener('click', toggleDarkMode);
    
    // Watch for system theme changes
    window.matchMedia('(prefers-color-scheme: dark)').addEventListener('change', e => {
        if (localStorage.getItem('darkMode') === null) {
            isDark = e.matches;
            localStorage.setItem('darkMode', isDark);
            applyDarkMode();
        }
    });
});
</script>
