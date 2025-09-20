<x-app-layout>
    <x-slot name="header">
        <div class="text-center">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                {{ __('Welcome to QuickChat') }}
            </h2>
        </div>
    </x-slot>

    <div class="min-h-screen bg-gradient-to-br from-gray-50 via-white to-blue-50 dark:from-gray-900 dark:via-gray-800 dark:to-gray-900">
        <!-- Hero Section -->
        <div class="relative overflow-hidden">
            <!-- Background Elements -->
            <div class="absolute inset-0 bg-gradient-to-r from-blue-600/10 to-purple-600/10 dark:from-blue-400/5 dark:to-purple-400/5"></div>
            <div class="absolute top-0 left-0 w-full h-full">
                <div class="absolute top-20 left-10 w-72 h-72 bg-blue-300/20 dark:bg-blue-400/10 rounded-full blur-3xl animate-pulse"></div>
                <div class="absolute bottom-20 right-10 w-96 h-96 bg-purple-300/20 dark:bg-purple-400/10 rounded-full blur-3xl animate-pulse" style="animation-delay: 2s;"></div>
            </div>

            <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-20">
                <div class="text-center">
                    <!-- Logo & Brand -->
                    <div class="mx-auto w-20 h-20 bg-gradient-to-br from-blue-500 to-purple-600 rounded-2xl flex items-center justify-center mb-8 shadow-lg animate-bounce-in">
                        <svg class="w-10 h-10 text-white" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M2 5a2 2 0 012-2h7a2 2 0 012 2v4a2 2 0 01-2 2H9l-3 3v-3H4a2 2 0 01-2-2V5z"/>
                        </svg>
                    </div>

                    <!-- Main Headline -->
                    <h1 class="text-5xl md:text-6xl font-bold text-gray-900 dark:text-gray-100 mb-6 animate-fade-in">
                    Make World
                        <span class="bg-gradient-to-r from-blue-600 to-purple-600 bg-clip-text text-transparent">
                        Closer.
                        </span>
                    </h1>

                    <!-- Subtitle -->
                    <p class="text-xl md:text-2xl text-gray-600 dark:text-gray-300 max-w-3xl mx-auto mb-8 leading-relaxed animate-slide-up">
                        The best communication platform that brings people together with 
                        <span class="font-semibold text-blue-600 dark:text-blue-400">real-time chat</span>, 
                        <span class="font-semibold text-green-600 dark:text-green-400">group collaboration</span>, and 
                        <span class="font-semibold text-purple-600 dark:text-purple-400">knowledge sharing</span>.
                    </p>

                    <!-- CTA Buttons -->
                    <div class="flex flex-col sm:flex-row gap-4 justify-center mb-12 animate-slide-up" style="animation-delay: 0.2s;">
                        @auth
                            <a href="{{ route('user.dashboard') }}" 
                               class="group inline-flex items-center px-8 py-4 border border-transparent text-lg font-semibold rounded-xl text-white bg-gradient-to-r from-blue-600 to-purple-600 hover:from-blue-700 hover:to-purple-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 transition-all duration-300 transform hover:scale-105 shadow-lg hover:shadow-xl">
                                <svg class="w-6 h-6 mr-3 group-hover:animate-pulse" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"/>
                                </svg>
                                Go to Chat
                                <svg class="ml-3 w-5 h-5 group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                                </svg>
                            </a>
                        @else
                            <a href="{{ route('register') }}" 
                               class="group inline-flex items-center px-8 py-4 border border-transparent text-lg font-semibold rounded-xl text-white bg-gradient-to-r from-blue-600 to-purple-600 hover:from-blue-700 hover:to-purple-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 transition-all duration-300 transform hover:scale-105 shadow-lg hover:shadow-xl">
                                <svg class="w-6 h-6 mr-3 group-hover:animate-pulse" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"/>
                                </svg>
                                Get Started Free
                                <svg class="ml-3 w-5 h-5 group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                                </svg>
                            </a>
                            <a href="{{ route('login') }}" 
                               class="group inline-flex items-center px-8 py-4 border-2 border-gray-300 dark:border-gray-600 text-lg font-semibold rounded-xl text-gray-700 dark:text-gray-300 bg-white dark:bg-gray-800 hover:bg-gray-50 dark:hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 transition-all duration-300 transform hover:scale-105">
                                <svg class="w-6 h-6 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 16l-4-4m0 0l4-4m-4 4h14m-5 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h7a3 3 0 013 3v1"/>
                                </svg>
                                Sign In
                            </a>
                        @endauth
                    </div>

                    <!-- Trust Indicators -->
                    <div class="flex flex-col sm:flex-row items-center justify-center space-y-4 sm:space-y-0 sm:space-x-8 text-sm text-gray-500 dark:text-gray-400 animate-fade-in" style="animation-delay: 0.4s;">
                        <div class="flex items-center">
                            <svg class="w-5 h-5 text-green-500 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                            </svg>
                            <span>Free to get started</span>
                        </div>
                        <div class="flex items-center">
                            <svg class="w-5 h-5 text-green-500 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"/>
                            </svg>
                            <span>Secure & Private</span>
                        </div>
                        <div class="flex items-center">
                            <svg class="w-5 h-5 text-green-500 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"/>
                            </svg>
                            <span>Real-time messaging</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Features Section -->
        <div class="py-20 bg-white dark:bg-gray-800">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <!-- Section Header -->
                <div class="text-center mb-16">
                    <h2 class="text-4xl font-bold text-gray-900 dark:text-gray-100 mb-4">
                        Everything you need to
                        <span class="bg-gradient-to-r from-blue-600 to-purple-600 bg-clip-text text-transparent">
                            communicate better
                        </span>
                    </h2>
                    <p class="text-xl text-gray-600 dark:text-gray-300 max-w-3xl mx-auto">
                        Powerful features designed to enhance team collaboration and streamline communication workflows.
                    </p>
                </div>

                <!-- Features Grid -->
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                    <!-- Real-time Chat -->
                    <div class="group text-center p-8 bg-white dark:bg-gray-700 rounded-2xl shadow-sm border border-gray-200 dark:border-gray-600 hover:shadow-xl hover:border-blue-300 dark:hover:border-blue-500 transition-all duration-300 transform hover:-translate-y-2">
                        <div class="w-20 h-20 bg-gradient-to-br from-blue-500 to-blue-600 rounded-2xl flex items-center justify-center mx-auto mb-6 group-hover:scale-110 transition-transform duration-300">
                            <svg class="w-10 h-10 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"/>
                            </svg>
                        </div>
                        <h3 class="text-xl font-bold text-gray-900 dark:text-gray-100 mb-3">Real-time Chat</h3>
                        <p class="text-gray-600 dark:text-gray-300 leading-relaxed">
                            Instant messaging with modern message bubbles, typing indicators, and smooth animations that make conversations feel natural.
                        </p>
                        <div class="mt-4 flex justify-center">
                            <div class="flex space-x-1">
                                <div class="w-2 h-2 bg-blue-500 rounded-full animate-bounce"></div>
                                <div class="w-2 h-2 bg-blue-500 rounded-full animate-bounce" style="animation-delay: 0.1s"></div>
                                <div class="w-2 h-2 bg-blue-500 rounded-full animate-bounce" style="animation-delay: 0.2s"></div>
                            </div>
                        </div>
                    </div>

                    <!-- Group Management -->
                    <div class="group text-center p-8 bg-white dark:bg-gray-700 rounded-2xl shadow-sm border border-gray-200 dark:border-gray-600 hover:shadow-xl hover:border-green-300 dark:hover:border-green-500 transition-all duration-300 transform hover:-translate-y-2">
                        <div class="w-20 h-20 bg-gradient-to-br from-green-500 to-green-600 rounded-2xl flex items-center justify-center mx-auto mb-6 group-hover:scale-110 transition-transform duration-300">
                            <svg class="w-10 h-10 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"/>
                            </svg>
                        </div>
                        <h3 class="text-xl font-bold text-gray-900 dark:text-gray-100 mb-3">Group Management</h3>
                        <p class="text-gray-600 dark:text-gray-300 leading-relaxed">
                            Create groups, invite members, and manage conversations with ease. Perfect for team collaboration and project discussions.
                        </p>
                        <div class="mt-4 flex justify-center">
                            <div class="flex -space-x-2">
                                <div class="w-8 h-8 bg-gradient-to-br from-blue-400 to-purple-500 rounded-full border-2 border-white dark:border-gray-700 flex items-center justify-center">
                                    <span class="text-xs font-medium text-white">A</span>
                                </div>
                                <div class="w-8 h-8 bg-gradient-to-br from-green-400 to-blue-500 rounded-full border-2 border-white dark:border-gray-700 flex items-center justify-center">
                                    <span class="text-xs font-medium text-white">B</span>
                                </div>
                                <div class="w-8 h-8 bg-gradient-to-br from-purple-400 to-pink-500 rounded-full border-2 border-white dark:border-gray-700 flex items-center justify-center">
                                    <span class="text-xs font-medium text-white">C</span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Article Sharing -->
                    <div class="group text-center p-8 bg-white dark:bg-gray-700 rounded-2xl shadow-sm border border-gray-200 dark:border-gray-600 hover:shadow-xl hover:border-purple-300 dark:hover:border-purple-500 transition-all duration-300 transform hover:-translate-y-2">
                        <div class="w-20 h-20 bg-gradient-to-br from-purple-500 to-purple-600 rounded-2xl flex items-center justify-center mx-auto mb-6 group-hover:scale-110 transition-transform duration-300">
                            <svg class="w-10 h-10 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                            </svg>
                        </div>
                        <h3 class="text-xl font-bold text-gray-900 dark:text-gray-100 mb-3">Article Sharing</h3>
                        <p class="text-gray-600 dark:text-gray-300 leading-relaxed">
                            Share knowledge and insights through rich article creation and management. Build a knowledge base for your team.
                        </p>
                        <div class="mt-4 flex justify-center">
                            <div class="flex items-center space-x-2 text-sm text-purple-600 dark:text-purple-400">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                                </svg>
                                <span>Rich Content</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

            <!-- Stats Section -->
            @auth
                <div class="bg-gradient-to-r from-blue-500 to-purple-600 rounded-2xl p-8 text-white">
                    <div class="text-center">
                        <h2 class="text-2xl font-bold mb-4">Ready to get started?</h2>
                        <p class="text-blue-100 mb-6">Join conversations, create groups, and share your knowledge with the community.</p>
                        <a href="{{ route('user.dashboard') }}" 
                           class="inline-flex items-center px-6 py-3 bg-white text-blue-600 font-medium rounded-lg hover:bg-gray-100 transition-colors">
                            Open Chat
                            <svg class="ml-2 w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                            </svg>
                        </a>
                    </div>
                </div>
            @endauth
        </div>
    </div>
</x-app-layout>
 