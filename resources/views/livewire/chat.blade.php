<div class="h-full flex flex-col" x-data="chatInterface()">
    {{-- Chat Messages Area --}}
    <div class="flex-1 overflow-y-auto scrollbar-thin p-3 sm:p-4 space-y-3 sm:space-y-4 pb-20" id="messagesContainer">
        @forelse ($messages as $message)
            <div class="flex {{ $message->user_id === auth()->id() ? 'justify-end' : 'justify-start' }} animate-fade-in mb-4">
                @if($message->user_id !== auth()->id())
                    {{-- Avatar for received messages --}}
                    <div class="flex-shrink-0 mr-3">
                        <div class="w-8 h-8 sm:w-10 sm:h-10 bg-gradient-to-br from-green-400 to-blue-500 rounded-full flex items-center justify-center">
                            <span class="text-sm font-medium text-white">
                                {{ substr($message->user->name, 0, 1) }}
                            </span>
                        </div>
                    </div>
                @endif
                
                {{-- Message Content --}}
                <div class="flex flex-col max-w-[85%] sm:max-w-sm lg:max-w-md xl:max-w-lg">
                    {{-- Message Bubble --}}
                    <div class="px-3 sm:px-4 py-2 sm:py-3 rounded-xl sm:rounded-2xl {{ $message->user_id === auth()->id() 
                        ? 'bg-gradient-to-r from-blue-500 to-blue-600 text-white rounded-br-md' 
                        : 'bg-white dark:bg-gray-700 border border-gray-200 dark:border-gray-600 text-gray-900 dark:text-gray-100 rounded-bl-md shadow-sm' }}">
                        
                        {{-- Message Content --}}
                        <div class="break-words text-sm sm:text-base leading-relaxed">
                            {!! nl2br(e($message->body)) !!}
                        </div>
                        
                        {{-- Message Status & Time --}}
                        <div class="flex items-center justify-between mt-1 sm:mt-2">
                            <div class="flex items-center space-x-1">
                                @if($message->user_id === auth()->id())
                                    {{-- Sent message status --}}
                                    <svg class="w-3 h-3 text-blue-200" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/>
                                    </svg>
                                    <svg class="w-3 h-3 text-blue-200" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/>
                                    </svg>
                                @endif
                            </div>
                            <span class="text-xs {{ $message->user_id === auth()->id() ? 'text-blue-200' : 'text-gray-500 dark:text-gray-400' }}">
                                {{ $message->created_at->format('H:i') }}
                            </span>
                        </div>
                    </div>
                    
                    {{-- User Name (for received messages) --}}
                    @if($message->user_id !== auth()->id())
                        <div class="mt-1 ml-1">
                            <span class="text-xs text-gray-500 dark:text-gray-400 font-medium">{{ $message->user->name }}</span>
                        </div>
                    @endif
                </div>
            </div>
        @empty
            {{-- Empty State --}}
            <div class="flex flex-col items-center justify-center h-full text-center py-12">
                <div class="w-16 h-16 bg-gray-100 dark:bg-gray-700 rounded-full flex items-center justify-center mb-4">
                    <svg class="w-8 h-8 text-gray-400 dark:text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"/>
                    </svg>
                </div>
                <h3 class="text-lg font-medium text-gray-900 dark:text-gray-100 mb-2">Start the conversation</h3>
                <p class="text-gray-500 dark:text-gray-400 max-w-sm">Send your first message below to begin chatting!</p>
            </div>
        @endforelse

        {{-- Typing Indicator --}}
        <div x-show="typingUsers.length > 0" x-transition class="flex justify-start">
            <div class="max-w-xs lg:max-w-md xl:max-w-lg">
                <div class="px-4 py-3 bg-gray-100 dark:bg-gray-700 rounded-2xl rounded-bl-md">
                    <div class="flex items-center space-x-2">
                        <div class="flex space-x-1">
                            <div class="w-2 h-2 bg-gray-400 dark:bg-gray-500 rounded-full animate-bounce"></div>
                            <div class="w-2 h-2 bg-gray-400 dark:bg-gray-500 rounded-full animate-bounce" style="animation-delay: 0.1s"></div>
                            <div class="w-2 h-2 bg-gray-400 dark:bg-gray-500 rounded-full animate-bounce" style="animation-delay: 0.2s"></div>
                        </div>
                        <span class="text-xs text-gray-600 dark:text-gray-300" x-text="typingText"></span>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- Message Input Area --}}
    <div class="border-t border-gray-200 dark:border-gray-700 bg-white dark:bg-gray-800 p-3 sm:p-4 flex-shrink-0 sticky bottom-0">
        <form wire:submit="sendMessage" class="flex items-center space-x-2 sm:space-x-3" x-data="chatInput()">
                {{-- Attachment Button --}}
                <div class="relative">
                    <button type="button" 
                            @click="toggleFileUpload()"
                            class="flex-shrink-0 p-2 sm:p-2 text-gray-400 dark:text-gray-500 hover:text-gray-600 dark:hover:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-700 rounded-lg transition-colors touch-manipulation"
                            title="Attach File">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.172 7l-6.586 6.586a2 2 0 102.828 2.828l6.414-6.586a4 4 0 00-5.656-5.656l-6.415 6.585a6 6 0 108.486 8.486L20.5 13"/>
                        </svg>
                    </button>
                    
                    {{-- File Upload Modal - WhatsApp Style --}}
                    <div x-show="showFileUpload" 
                         x-transition:enter="transition ease-out duration-150"
                         x-transition:enter-start="opacity-0 scale-95"
                         x-transition:enter-end="opacity-100 scale-100"
                         x-transition:leave="transition ease-in duration-100"
                         x-transition:leave-start="opacity-100 scale-100"
                         x-transition:leave-end="opacity-0 scale-95"
                         @click.away="showFileUpload = false"
                         class="absolute bottom-full left-0 mb-4 bg-white dark:bg-gray-800 rounded-lg shadow-lg z-50 w-48">
                        <div class="py-2">
                            <button class="w-full flex items-center px-4 py-3 text-gray-700 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-700 transition-colors">
                                <div class="w-8 h-8 bg-purple-500 rounded-lg flex items-center justify-center mr-3">
                                    <svg class="w-4 h-4 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                                    </svg>
                                </div>
                                <span class="text-sm">Photos & Videos</span>
                            </button>
                            <button class="w-full flex items-center px-4 py-3 text-gray-700 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-700 transition-colors">
                                <div class="w-8 h-8 bg-blue-500 rounded-lg flex items-center justify-center mr-3">
                                    <svg class="w-4 h-4 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                                    </svg>
                                </div>
                                <span class="text-sm">Document</span>
                            </button>
                            <button class="w-full flex items-center px-4 py-3 text-gray-700 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-700 transition-colors">
                                <div class="w-8 h-8 bg-red-500 rounded-lg flex items-center justify-center mr-3">
                                    <svg class="w-4 h-4 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 9a2 2 0 012-2h.93a2 2 0 001.664-.89l.812-1.22A2 2 0 0110.07 4h3.86a2 2 0 011.664.89l.812 1.22A2 2 0 0018.07 7H19a2 2 0 012 2v9a2 2 0 01-2 2H5a2 2 0 01-2-2V9z"/>
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 13a3 3 0 11-6 0 3 3 0 016 0z"/>
                                    </svg>
                                </div>
                                <span class="text-sm">Camera</span>
                            </button>
                            <button class="w-full flex items-center px-4 py-3 text-gray-700 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-700 transition-colors">
                                <div class="w-8 h-8 bg-green-500 rounded-lg flex items-center justify-center mr-3">
                                    <svg class="w-4 h-4 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
                                    </svg>
                                </div>
                                <span class="text-sm">Contact</span>
                            </button>
                        </div>
                    </div>
                </div>

            {{-- Emoji Button --}}
            <div class="relative">
                <button type="button" 
                        @click="toggleEmojiPicker()"
                        class="flex-shrink-0 p-2 sm:p-2 text-gray-400 dark:text-gray-500 hover:text-gray-600 dark:hover:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-700 rounded-lg transition-colors touch-manipulation"
                        title="Add Emoji">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14.828 14.828a4 4 0 01-5.656 0M9 10h.01M15 10h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                    </svg>
                </button>
                
                {{-- Emoji Picker - WhatsApp Style --}}
                <div x-show="showEmojiPicker" 
                     x-transition:enter="transition ease-out duration-150"
                     x-transition:enter-start="opacity-0 scale-95"
                     x-transition:enter-end="opacity-100 scale-100"
                     x-transition:leave="transition ease-in duration-100"
                     x-transition:leave-start="opacity-100 scale-100"
                     x-transition:leave-end="opacity-0 scale-95"
                     @click.away="showEmojiPicker = false"
                     class="absolute bottom-full left-0 mb-4 bg-white dark:bg-gray-800 rounded-lg shadow-lg z-50 w-72">
                    <div class="p-3">
                        <div class="flex items-center justify-between mb-2">
                            <h3 class="text-sm font-medium text-gray-900 dark:text-gray-100">Choose Emoji</h3>
                            <button @click="showEmojiPicker = false" class="text-gray-400 hover:text-gray-600 dark:hover:text-gray-300">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                                </svg>
                        </button>
                        </div>
                        <div class="grid grid-cols-8 gap-1 max-h-40 overflow-y-auto">
                            <button @click="insertEmoji('😀')" class="p-2 hover:bg-gray-100 dark:hover:bg-gray-700 rounded text-lg transition-colors">😀</button>
                            <button @click="insertEmoji('😂')" class="p-2 hover:bg-gray-100 dark:hover:bg-gray-700 rounded text-lg transition-colors">😂</button>
                            <button @click="insertEmoji('😍')" class="p-2 hover:bg-gray-100 dark:hover:bg-gray-700 rounded text-lg transition-colors">😍</button>
                            <button @click="insertEmoji('🤔')" class="p-2 hover:bg-gray-100 dark:hover:bg-gray-700 rounded text-lg transition-colors">🤔</button>
                            <button @click="insertEmoji('👍')" class="p-2 hover:bg-gray-100 dark:hover:bg-gray-700 rounded text-lg transition-colors">👍</button>
                            <button @click="insertEmoji('👎')" class="p-2 hover:bg-gray-100 dark:hover:bg-gray-700 rounded text-lg transition-colors">👎</button>
                            <button @click="insertEmoji('❤️')" class="p-2 hover:bg-gray-100 dark:hover:bg-gray-700 rounded text-lg transition-colors">❤️</button>
                            <button @click="insertEmoji('🎉')" class="p-2 hover:bg-gray-100 dark:hover:bg-gray-700 rounded text-lg transition-colors">🎉</button>
                            <button @click="insertEmoji('😢')" class="p-2 hover:bg-gray-100 dark:hover:bg-gray-700 rounded text-lg transition-colors">😢</button>
                            <button @click="insertEmoji('😡')" class="p-2 hover:bg-gray-100 dark:hover:bg-gray-700 rounded text-lg transition-colors">😡</button>
                            <button @click="insertEmoji('😴')" class="p-2 hover:bg-gray-100 dark:hover:bg-gray-700 rounded text-lg transition-colors">😴</button>
                            <button @click="insertEmoji('🤗')" class="p-2 hover:bg-gray-100 dark:hover:bg-gray-700 rounded text-lg transition-colors">🤗</button>
                            <button @click="insertEmoji('🙏')" class="p-2 hover:bg-gray-100 dark:hover:bg-gray-700 rounded text-lg transition-colors">🙏</button>
                            <button @click="insertEmoji('💪')" class="p-2 hover:bg-gray-100 dark:hover:bg-gray-700 rounded text-lg transition-colors">💪</button>
                            <button @click="insertEmoji('🔥')" class="p-2 hover:bg-gray-100 dark:hover:bg-gray-700 rounded text-lg transition-colors">🔥</button>
                            <button @click="insertEmoji('✨')" class="p-2 hover:bg-gray-100 dark:hover:bg-gray-700 rounded text-lg transition-colors">✨</button>
                            <button @click="insertEmoji('😊')" class="p-2 hover:bg-gray-100 dark:hover:bg-gray-700 rounded text-lg transition-colors">😊</button>
                            <button @click="insertEmoji('😎')" class="p-2 hover:bg-gray-100 dark:hover:bg-gray-700 rounded text-lg transition-colors">😎</button>
                            <button @click="insertEmoji('🤩')" class="p-2 hover:bg-gray-100 dark:hover:bg-gray-700 rounded text-lg transition-colors">🤩</button>
                            <button @click="insertEmoji('😭')" class="p-2 hover:bg-gray-100 dark:hover:bg-gray-700 rounded text-lg transition-colors">😭</button>
                            <button @click="insertEmoji('🤯')" class="p-2 hover:bg-gray-100 dark:hover:bg-gray-700 rounded text-lg transition-colors">🤯</button>
                            <button @click="insertEmoji('🥳')" class="p-2 hover:bg-gray-100 dark:hover:bg-gray-700 rounded text-lg transition-colors">🥳</button>
                            <button @click="insertEmoji('😇')" class="p-2 hover:bg-gray-100 dark:hover:bg-gray-700 rounded text-lg transition-colors">😇</button>
                            <button @click="insertEmoji('🤪')" class="p-2 hover:bg-gray-100 dark:hover:bg-gray-700 rounded text-lg transition-colors">🤪</button>
                            <button @click="insertEmoji('😏')" class="p-2 hover:bg-gray-100 dark:hover:bg-gray-700 rounded text-lg transition-colors">😏</button>
                            <button @click="insertEmoji('😌')" class="p-2 hover:bg-gray-100 dark:hover:bg-gray-700 rounded text-lg transition-colors">😌</button>
                            <button @click="insertEmoji('🤤')" class="p-2 hover:bg-gray-100 dark:hover:bg-gray-700 rounded text-lg transition-colors">🤤</button>
                            <button @click="insertEmoji('😋')" class="p-2 hover:bg-gray-100 dark:hover:bg-gray-700 rounded text-lg transition-colors">😋</button>
                            <button @click="insertEmoji('🤓')" class="p-2 hover:bg-gray-100 dark:hover:bg-gray-700 rounded text-lg transition-colors">🤓</button>
                            <button @click="insertEmoji('🧐')" class="p-2 hover:bg-gray-100 dark:hover:bg-gray-700 rounded text-lg transition-colors">🧐</button>
                            <button @click="insertEmoji('🤨')" class="p-2 hover:bg-gray-100 dark:hover:bg-gray-700 rounded text-lg transition-colors">🤨</button>
                            <button @click="insertEmoji('😐')" class="p-2 hover:bg-gray-100 dark:hover:bg-gray-700 rounded text-lg transition-colors">😐</button>
                            <button @click="insertEmoji('😑')" class="p-2 hover:bg-gray-100 dark:hover:bg-gray-700 rounded text-lg transition-colors">😑</button>
                            <button @click="insertEmoji('🙄')" class="p-2 hover:bg-gray-100 dark:hover:bg-gray-700 rounded text-lg transition-colors">🙄</button>
                            <button @click="insertEmoji('😒')" class="p-2 hover:bg-gray-100 dark:hover:bg-gray-700 rounded text-lg transition-colors">😒</button>
                            <button @click="insertEmoji('🤢')" class="p-2 hover:bg-gray-100 dark:hover:bg-gray-700 rounded text-lg transition-colors">🤢</button>
                            <button @click="insertEmoji('🤮')" class="p-2 hover:bg-gray-100 dark:hover:bg-gray-700 rounded text-lg transition-colors">🤮</button>
                            <button @click="insertEmoji('🤧')" class="p-2 hover:bg-gray-100 dark:hover:bg-gray-700 rounded text-lg transition-colors">🤧</button>
                            <button @click="insertEmoji('🥴')" class="p-2 hover:bg-gray-100 dark:hover:bg-gray-700 rounded text-lg transition-colors">🥴</button>
                            <button @click="insertEmoji('😵')" class="p-2 hover:bg-gray-100 dark:hover:bg-gray-700 rounded text-lg transition-colors">😵</button>
                            <button @click="insertEmoji('🤠')" class="p-2 hover:bg-gray-100 dark:hover:bg-gray-700 rounded text-lg transition-colors">🤠</button>
                            <button @click="insertEmoji('🥸')" class="p-2 hover:bg-gray-100 dark:hover:bg-gray-700 rounded text-lg transition-colors">🥸</button>
                            <button @click="insertEmoji('😘')" class="p-2 hover:bg-gray-100 dark:hover:bg-gray-700 rounded text-lg transition-colors">😘</button>
                            <button @click="insertEmoji('😚')" class="p-2 hover:bg-gray-100 dark:hover:bg-gray-700 rounded text-lg transition-colors">😚</button>
                            <button @click="insertEmoji('😙')" class="p-2 hover:bg-gray-100 dark:hover:bg-gray-700 rounded text-lg transition-colors">😙</button>
                            <button @click="insertEmoji('🥰')" class="p-2 hover:bg-gray-100 dark:hover:bg-gray-700 rounded text-lg transition-colors">🥰</button>
                            <button @click="insertEmoji('😗')" class="p-2 hover:bg-gray-100 dark:hover:bg-gray-700 rounded text-lg transition-colors">😗</button>
                            <button @click="insertEmoji('🤭')" class="p-2 hover:bg-gray-100 dark:hover:bg-gray-700 rounded text-lg transition-colors">🤭</button>
                            <button @click="insertEmoji('🤫')" class="p-2 hover:bg-gray-100 dark:hover:bg-gray-700 rounded text-lg transition-colors">🤫</button>
                            <button @click="insertEmoji('🤐')" class="p-2 hover:bg-gray-100 dark:hover:bg-gray-700 rounded text-lg transition-colors">🤐</button>
                            <button @click="insertEmoji('😶')" class="p-2 hover:bg-gray-100 dark:hover:bg-gray-700 rounded text-lg transition-colors">😶</button>
                            <button @click="insertEmoji('🤥')" class="p-2 hover:bg-gray-100 dark:hover:bg-gray-700 rounded text-lg transition-colors">🤥</button>
                            <button @click="insertEmoji('😔')" class="p-2 hover:bg-gray-100 dark:hover:bg-gray-700 rounded text-lg transition-colors">😔</button>
                            <button @click="insertEmoji('😕')" class="p-2 hover:bg-gray-100 dark:hover:bg-gray-700 rounded text-lg transition-colors">😕</button>
                            <button @click="insertEmoji('🙁')" class="p-2 hover:bg-gray-100 dark:hover:bg-gray-700 rounded text-lg transition-colors">🙁</button>
                            <button @click="insertEmoji('☹️')" class="p-2 hover:bg-gray-100 dark:hover:bg-gray-700 rounded text-lg transition-colors">☹️</button>
                            <button @click="insertEmoji('😣')" class="p-2 hover:bg-gray-100 dark:hover:bg-gray-700 rounded text-lg transition-colors">😣</button>
                            <button @click="insertEmoji('😖')" class="p-2 hover:bg-gray-100 dark:hover:bg-gray-700 rounded text-lg transition-colors">😖</button>
                            <button @click="insertEmoji('😫')" class="p-2 hover:bg-gray-100 dark:hover:bg-gray-700 rounded text-lg transition-colors">😫</button>
                            <button @click="insertEmoji('😩')" class="p-2 hover:bg-gray-100 dark:hover:bg-gray-700 rounded text-lg transition-colors">😩</button>
                            <button @click="insertEmoji('🥺')" class="p-2 hover:bg-gray-100 dark:hover:bg-gray-700 rounded text-lg transition-colors">🥺</button>
                            <button @click="insertEmoji('😤')" class="p-2 hover:bg-gray-100 dark:hover:bg-gray-700 rounded text-lg transition-colors">😤</button>
                            <button @click="insertEmoji('😠')" class="p-2 hover:bg-gray-100 dark:hover:bg-gray-700 rounded text-lg transition-colors">😠</button>
                            <button @click="insertEmoji('🤬')" class="p-2 hover:bg-gray-100 dark:hover:bg-gray-700 rounded text-lg transition-colors">🤬</button>
                            <button @click="insertEmoji('😳')" class="p-2 hover:bg-gray-100 dark:hover:bg-gray-700 rounded text-lg transition-colors">😳</button>
                            <button @click="insertEmoji('🥵')" class="p-2 hover:bg-gray-100 dark:hover:bg-gray-700 rounded text-lg transition-colors">🥵</button>
                            <button @click="insertEmoji('🥶')" class="p-2 hover:bg-gray-100 dark:hover:bg-gray-700 rounded text-lg transition-colors">🥶</button>
                            <button @click="insertEmoji('😱')" class="p-2 hover:bg-gray-100 dark:hover:bg-gray-700 rounded text-lg transition-colors">😱</button>
                            <button @click="insertEmoji('😨')" class="p-2 hover:bg-gray-100 dark:hover:bg-gray-700 rounded text-lg transition-colors">😨</button>
                            <button @click="insertEmoji('😰')" class="p-2 hover:bg-gray-100 dark:hover:bg-gray-700 rounded text-lg transition-colors">😰</button>
                            <button @click="insertEmoji('😥')" class="p-2 hover:bg-gray-100 dark:hover:bg-gray-700 rounded text-lg transition-colors">😥</button>
                            <button @click="insertEmoji('😓')" class="p-2 hover:bg-gray-100 dark:hover:bg-gray-700 rounded text-lg transition-colors">😓</button>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Message Input --}}
            <div class="flex-1 relative">
                <textarea 
                    wire:model="body" 
                    wire:keydown.enter.prevent="sendMessage"
                    x-model="messageBody"
                    @input="handleTyping"
                    @keydown="handleTyping"
                    @touchstart="handleTouchStart"
                    @touchend="handleTouchEnd"
                    placeholder="Type your message..."
                    rows="1"
                    class="w-full px-3 sm:px-4 py-2 sm:py-3 border border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-700 text-gray-900 dark:text-gray-100 rounded-xl sm:rounded-2xl resize-none focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent placeholder-gray-500 dark:placeholder-gray-400 text-base sm:text-sm overflow-hidden"
                    style="min-height: 40px; max-height: 120px; scrollbar-width: none; -ms-overflow-style: none;"
                    oninput="this.style.height = 'auto'; this.style.height = Math.min(this.scrollHeight, 120) + 'px';"
                ></textarea>
            </div>

            {{-- Send Button --}}
            <button 
                type="submit" 
                class="flex-shrink-0 bg-gradient-to-r from-blue-500 to-blue-600 hover:from-blue-600 hover:to-blue-700 text-white p-2 sm:p-3 rounded-xl sm:rounded-2xl transition-all duration-200 transform hover:scale-105 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 disabled:opacity-50 disabled:cursor-not-allowed disabled:transform-none touch-manipulation active:scale-95 rotate-90"
                :disabled="!messageBody.trim()"
                title="Send Message"
            >
                <svg class="w-4 h-4 sm:w-5 sm:h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 19l9 2-9-18-9 18 9-2zm0 0v-8"/>
                </svg>
            </button>
            </form>


        {{-- Error Display --}}
        <x-input-error :messages="$errors->get('body')" class="mt-2" />
        
        {{-- Sending Indicator --}}
        <div wire:loading class="flex items-center space-x-2 mt-2 text-sm text-gray-500 dark:text-gray-400">
            <div class="flex space-x-1">
                <div class="w-2 h-2 bg-gray-400 dark:bg-gray-500 rounded-full animate-bounce"></div>
                <div class="w-2 h-2 bg-gray-400 dark:bg-gray-500 rounded-full animate-bounce" style="animation-delay: 0.1s"></div>
                <div class="w-2 h-2 bg-gray-400 dark:bg-gray-500 rounded-full animate-bounce" style="animation-delay: 0.2s"></div>
            </div>
            <span>Sending message...</span>
        </div>
    </div>
</div>

<script>
function chatInterface() {
    return {
        messageBody: '',
        typingUsers: [],
        typingTimeout: null,
        
        init() {
            // Listen for real-time messages
            window.addEventListener('message-received', (e) => {
                this.scrollToBottom();
            });
            
            // Listen for typing events
            if (window.Echo) {
                window.Echo.channel('chat')
                    .listen('.user.typing', (e) => {
                        this.handleTypingEvent(e);
                    });
            }
        },
        
        handleTyping() {
            // Clear existing timeout
            if (this.typingTimeout) {
                clearTimeout(this.typingTimeout);
            }
            
            // Broadcast typing status
            if (window.Echo && this.messageBody.trim()) {
                // You would typically send this to the server
                // For now, we'll just handle the UI
            }
            
            // Set timeout to stop typing indicator
            this.typingTimeout = setTimeout(() => {
                // Stop typing indicator
            }, 1000);
        },
        
        handleTouchStart(e) {
            // Add touch feedback
            e.target.classList.add('touch-active');
        },
        
        handleTouchEnd(e) {
            // Remove touch feedback
            setTimeout(() => {
                e.target.classList.remove('touch-active');
            }, 150);
        },
        
        handleTypingEvent(e) {
            if (e.user.id === {{ auth()->id() }}) return; // Don't show own typing
            
            const userIndex = this.typingUsers.findIndex(u => u.id === e.user.id);
            
            if (e.isTyping) {
                if (userIndex === -1) {
                    this.typingUsers.push(e.user);
                }
            } else {
                if (userIndex !== -1) {
                    this.typingUsers.splice(userIndex, 1);
                }
            }
        },
        
        get typingText() {
            if (this.typingUsers.length === 0) return '';
            if (this.typingUsers.length === 1) {
                return `${this.typingUsers[0].name} is typing...`;
            }
            return `${this.typingUsers.length} people are typing...`;
        },
        
        scrollToBottom() {
            setTimeout(() => {
                const container = document.getElementById('messagesContainer');
                if (container) {
                    container.scrollTop = container.scrollHeight;
                }
            }, 100);
        }
    }
}

function chatInput() {
    return {
        messageBody: '',
        showFileUpload: false,
        showEmojiPicker: false,
        
        toggleFileUpload() {
            this.showFileUpload = !this.showFileUpload;
            this.showEmojiPicker = false;
        },
        
        toggleEmojiPicker() {
            this.showEmojiPicker = !this.showEmojiPicker;
            this.showFileUpload = false;
        },
        
        insertEmoji(emoji) {
            this.messageBody += emoji;
            this.showEmojiPicker = false;
            
            // Update the textarea
            const textarea = document.querySelector('textarea[wire\\:model="body"]');
            if (textarea) {
                textarea.value = this.messageBody;
                textarea.dispatchEvent(new Event('input', { bubbles: true }));
            }
        }
    }
}

document.addEventListener('livewire:init', function () {
    // Auto-scroll to bottom when new messages arrive
    Livewire.on('scroll-to-bottom', () => {
        const container = document.getElementById('messagesContainer');
        if (container) {
            container.scrollTop = container.scrollHeight;
        }
    });
    
    // Auto-scroll on component updates
    Livewire.on('messageSent', () => {
        setTimeout(() => {
            const container = document.getElementById('messagesContainer');
            if (container) {
                container.scrollTop = container.scrollHeight;
            }
        }, 100);
    });
});
</script>
