<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Admin Dashboard') }}
        </h2>
    </x-slot>

    <div class="h-[calc(100vh-8rem)]" x-data="adminDashboard()">
        <div class="max-w-7xl mx-auto h-full">
            <!-- Admin Dashboard Layout -->
            <div class="h-full flex flex-col lg:flex-row gap-6">
                
                <!-- Admin Sidebar -->
                <div class="w-full lg:w-80 bg-white dark:bg-gray-800 rounded-xl shadow-sm border border-gray-200 dark:border-gray-700 overflow-hidden">
                    <div class="h-full flex flex-col">
                        <!-- Sidebar Header -->
                        <div class="p-6 border-b border-gray-200 dark:border-gray-700 bg-gray-50 dark:bg-gray-900">
                            <h3 class="text-lg font-semibold text-gray-900 dark:text-gray-100">Admin Panel</h3>
                            <p class="text-sm text-gray-500 dark:text-gray-400 mt-1">Manage your application</p>
                        </div>

                        <!-- Navigation Menu -->
                        <div class="flex-1 p-4 space-y-2">
                            <!-- View All Users -->
                            <button @click="activeTab = 'users'" 
                                    :class="activeTab === 'users' ? 'bg-blue-100 dark:bg-blue-900 text-blue-700 dark:text-blue-300' : 'text-gray-700 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-700'"
                                    class="w-full flex items-center px-4 py-3 rounded-lg transition-colors duration-200">
                                <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197m13.5-9a2.5 2.5 0 11-5 0 2.5 2.5 0 015 0z"/>
                                </svg>
                                <span class="font-medium">View All Users</span>
                            </button>

                            <!-- Developer Earning -->
                            <button @click="activeTab = 'earnings'" 
                                    :class="activeTab === 'earnings' ? 'bg-blue-100 dark:bg-blue-900 text-blue-700 dark:text-blue-300' : 'text-gray-700 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-700'"
                                    class="w-full flex items-center px-4 py-3 rounded-lg transition-colors duration-200">
                                <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1"/>
                                </svg>
                                <span class="font-medium">Developer Earning</span>
                            </button>

                            <!-- Article Management -->
                            <button @click="activeTab = 'articles'" 
                                    :class="activeTab === 'articles' ? 'bg-blue-100 dark:bg-blue-900 text-blue-700 dark:text-blue-300' : 'text-gray-700 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-700'"
                                    class="w-full flex items-center px-4 py-3 rounded-lg transition-colors duration-200">
                                <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                                </svg>
                                <span class="font-medium">Article Management</span>
                            </button>

                            <!-- Settings -->
                            <button @click="activeTab = 'settings'" 
                                    :class="activeTab === 'settings' ? 'bg-blue-100 dark:bg-blue-900 text-blue-700 dark:text-blue-300' : 'text-gray-700 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-700'"
                                    class="w-full flex items-center px-4 py-3 rounded-lg transition-colors duration-200">
                                <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"/>
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                                </svg>
                                <span class="font-medium">Settings</span>
                            </button>
                                  </div>
                                
                        <!-- Sidebar Footer -->
                        <div class="p-4 border-t border-gray-200 dark:border-gray-700 bg-gray-50 dark:bg-gray-900">
                            <div class="flex items-center space-x-3">
                                <div class="w-8 h-8 bg-gradient-to-br from-green-400 to-blue-500 rounded-full flex items-center justify-center">
                                    <span class="text-sm font-medium text-white">{{ substr(auth()->user()->name, 0, 1) }}</span>
                                </div>
                                <div>
                                    <p class="text-sm font-medium text-gray-900 dark:text-gray-100">{{ auth()->user()->name }}</p>
                                    <p class="text-xs text-gray-500 dark:text-gray-400">Administrator</p>
                                </div>
                            </div>
                          </div>
                    </div>
                                  </div>
                                
                <!-- Main Content Area -->
                <div class="flex-1 bg-white dark:bg-gray-800 rounded-xl shadow-sm border border-gray-200 dark:border-gray-700 overflow-hidden">
                    <div class="h-full flex flex-col">
                        <!-- Content Header -->
                        <div class="p-6 border-b border-gray-200 dark:border-gray-700 bg-gray-50 dark:bg-gray-900">
                            <div class="flex items-center justify-between">
                                <div>
                                    <h3 class="text-xl font-semibold text-gray-900 dark:text-gray-100" x-text="getTabTitle()">Dashboard</h3>
                                    <p class="text-sm text-gray-500 dark:text-gray-400 mt-1" x-text="getTabDescription()">Manage your application</p>
                                </div>
                                <div class="flex items-center space-x-2">
                                    <div class="flex items-center space-x-2 px-3 py-1 bg-green-50 dark:bg-green-900 rounded-full">
                                        <div class="w-2 h-2 bg-green-500 rounded-full animate-pulse"></div>
                                        <span class="text-xs text-green-700 dark:text-green-300 font-medium">Online</span>
                                    </div>
                                </div>
                            </div>
                          </div>

                        <!-- Dynamic Content -->
                        <div class="flex-1 overflow-y-auto scrollbar-thin">
                            <!-- Users Tab -->
                            <div x-show="activeTab === 'users'" class="p-6">
                                <div class="mb-6">
                                    <h4 class="text-lg font-semibold text-gray-900 dark:text-gray-100 mb-2">All Users</h4>
                                    <p class="text-gray-600 dark:text-gray-400">Manage user accounts and permissions</p>
                                  </div>
                                
                                <!-- Users Table -->
                                <div class="bg-white dark:bg-gray-700 rounded-lg border border-gray-200 dark:border-gray-600 overflow-hidden">
                                    <div class="overflow-x-auto">
                                        <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-600">
                                            <thead class="bg-gray-50 dark:bg-gray-800">
                                                <tr>
                                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wider">User</th>
                                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wider">Email</th>
                                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wider">Role</th>
                                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wider">Joined</th>
                                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wider">Actions</th>
                                                </tr>
                                            </thead>
                                            <tbody class="bg-white dark:bg-gray-700 divide-y divide-gray-200 dark:divide-gray-600">
                                                @foreach(\App\Models\User::all() as $user)
                                                <tr class="hover:bg-gray-50 dark:hover:bg-gray-600 transition-colors">
                                                    <td class="px-6 py-4 whitespace-nowrap">
                                                        <div class="flex items-center">
                                                            <div class="w-8 h-8 bg-gradient-to-br from-blue-400 to-purple-500 rounded-full flex items-center justify-center">
                                                                <span class="text-sm font-medium text-white">{{ substr($user->name, 0, 1) }}</span>
                                                            </div>
                                                            <div class="ml-3">
                                                                <div class="text-sm font-medium text-gray-900 dark:text-gray-100">{{ $user->name }}</div>
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500 dark:text-gray-400">{{ $user->email }}</td>
                                                    <td class="px-6 py-4 whitespace-nowrap">
                                                        <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-blue-100 dark:bg-blue-900 text-blue-800 dark:text-blue-300">
                                                            {{ $user->hasRole('admin') ? 'Admin' : 'User' }}
                                                        </span>
                                                    </td>
                                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500 dark:text-gray-400">{{ $user->created_at->format('M d, Y') }}</td>
                                                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                                        <button class="text-blue-600 dark:text-blue-400 hover:text-blue-900 dark:hover:text-blue-300">Edit</button>
                                                    </td>
                                                </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>

                            <!-- Earnings Tab -->
                            <div x-show="activeTab === 'earnings'" class="p-6">
                                <div class="mb-6">
                                    <h4 class="text-lg font-semibold text-gray-900 dark:text-gray-100 mb-2">Developer Earnings</h4>
                                    <p class="text-gray-600 dark:text-gray-400">Track revenue and earnings</p>
                                </div>
                                
                                <!-- Earnings Cards -->
                                <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-6">
                                    <div class="bg-gradient-to-r from-green-500 to-green-600 rounded-lg p-6 text-white">
                                        <div class="flex items-center justify-between">
                                            <div>
                                                <p class="text-green-100 text-sm font-medium">Total Revenue</p>
                                                <p class="text-2xl font-bold">$12,345</p>
                                            </div>
                                            <svg class="w-8 h-8 text-green-200" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1"/>
                                            </svg>
                                        </div>
                                    </div>
                                    
                                    <div class="bg-gradient-to-r from-blue-500 to-blue-600 rounded-lg p-6 text-white">
                                        <div class="flex items-center justify-between">
                                            <div>
                                                <p class="text-blue-100 text-sm font-medium">This Month</p>
                                                <p class="text-2xl font-bold">$3,456</p>
                                            </div>
                                            <svg class="w-8 h-8 text-blue-200" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6"/>
                                            </svg>
                                        </div>
                                    </div>
                                    
                                    <div class="bg-gradient-to-r from-purple-500 to-purple-600 rounded-lg p-6 text-white">
                                        <div class="flex items-center justify-between">
                                            <div>
                                                <p class="text-purple-100 text-sm font-medium">Active Users</p>
                                                <p class="text-2xl font-bold">{{ \App\Models\User::count() }}</p>
                                            </div>
                                            <svg class="w-8 h-8 text-purple-200" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197m13.5-9a2.5 2.5 0 11-5 0 2.5 2.5 0 015 0z"/>
                                            </svg>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Articles Tab -->
                            <div x-show="activeTab === 'articles'" class="p-6">
                                <div class="mb-6">
                                    <h4 class="text-lg font-semibold text-gray-900 dark:text-gray-100 mb-2">Article Management</h4>
                                    <p class="text-gray-600 dark:text-gray-400">Manage and moderate articles</p>
                                </div>
                                
                                <!-- Articles List -->
                                <livewire:article.list-article />
                            </div>

                            <!-- Settings Tab -->
                            <div x-show="activeTab === 'settings'" class="p-6">
                                <div class="mb-6">
                                    <h4 class="text-lg font-semibold text-gray-900 dark:text-gray-100 mb-2">System Settings</h4>
                                    <p class="text-gray-600 dark:text-gray-400">Configure application settings</p>
                                </div>
                                
                                <!-- Settings Form -->
                                <div class="bg-white dark:bg-gray-700 rounded-lg border border-gray-200 dark:border-gray-600 p-6">
                                    <div class="space-y-6">
                                        <div>
                                            <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Application Name</label>
                                            <input type="text" value="QuickChat" class="w-full px-3 py-2 border border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-800 text-gray-900 dark:text-gray-100 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                                        </div>
                                        
                                        <div>
                                            <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Default Theme</label>
                                            <select class="w-full px-3 py-2 border border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-800 text-gray-900 dark:text-gray-100 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                                                <option>Light</option>
                                                <option>Dark</option>
                                                <option>Auto</option>
                                            </select>
                                        </div>
                                        
                                        <div class="flex items-center justify-between">
                                            <div>
                                                <label class="text-sm font-medium text-gray-700 dark:text-gray-300">Enable Notifications</label>
                                                <p class="text-xs text-gray-500 dark:text-gray-400">Allow push notifications</p>
                                            </div>
                                            <button class="relative inline-flex h-6 w-11 items-center rounded-full bg-blue-600 transition-colors">
                                                <span class="inline-block h-4 w-4 transform rounded-full bg-white transition-transform translate-x-6"></span>
                                            </button>
                                        </div>
                                        
                                        <div class="pt-4">
                                            <button class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-lg transition-colors">
                                                Save Settings
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                          </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
 
    <script>
    function adminDashboard() {
        return {
            activeTab: 'users',
            
            getTabTitle() {
                const titles = {
                    'users': 'User Management',
                    'earnings': 'Developer Earnings',
                    'articles': 'Article Management',
                    'settings': 'System Settings'
                };
                return titles[this.activeTab] || 'Dashboard';
            },
            
            getTabDescription() {
                const descriptions = {
                    'users': 'Manage user accounts and permissions',
                    'earnings': 'Track revenue and earnings',
                    'articles': 'Manage and moderate articles',
                    'settings': 'Configure application settings'
                };
                return descriptions[this.activeTab] || 'Manage your application';
            }
        }
    }
    </script>
</x-app-layout>