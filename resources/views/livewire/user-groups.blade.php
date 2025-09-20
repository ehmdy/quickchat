<div class="space-y-3">
    @if($groups->count() > 0)
        @foreach($groups as $group)
            <div class="group cursor-pointer p-3 rounded-lg hover:bg-gray-50 transition-colors duration-200 border border-transparent hover:border-gray-200">
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
                            <h4 class="text-sm font-semibold text-gray-900 truncate group-hover:text-blue-600 transition-colors">
                                {{ $group->name }}
                            </h4>
                            @if($group->created_by === auth()->id())
                                <span class="inline-flex items-center px-2 py-0.5 rounded-full text-xs font-medium bg-green-100 text-green-800">
                                    Admin
                                </span>
                            @endif
                        </div>
                        
                        <div class="flex items-center justify-between mt-1">
                            <p class="text-xs text-gray-500">
                                {{ $group->users_count }} member{{ $group->users_count !== 1 ? 's' : '' }}
                            </p>
                            <span class="text-xs text-gray-400">
                                {{ $group->created_at->diffForHumans() }}
                            </span>
                        </div>
                        
                        <!-- Last Message Preview (if available) -->
                        <div class="mt-1">
                            <p class="text-xs text-gray-600 truncate">
                                @if($group->latestMessage)
                                    <span class="font-medium">{{ $group->latestMessage->user->name }}:</span> 
                                    {{ Str::limit($group->latestMessage->body, 30) }}
                                @else
                                    <span class="text-gray-400 italic">No messages yet</span>
                                @endif
                            </p>
                        </div>
                    </div>
                    
                    <!-- Action Button -->
                    <div class="flex-shrink-0">
                        <a href="{{ route('view-group-info', $group) }}" 
                           class="opacity-0 group-hover:opacity-100 transition-opacity duration-200 p-2 text-gray-400 hover:text-blue-600 hover:bg-blue-50 rounded-lg">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                            </svg>
                        </a>
                    </div>
                </div>
            </div>
        @endforeach
    @else
        <!-- Empty State -->
        <div class="text-center py-8">
            <div class="w-16 h-16 bg-gray-100 rounded-full flex items-center justify-center mx-auto mb-4">
                <svg class="w-8 h-8 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"/>
                </svg>
            </div>
            <h3 class="text-sm font-medium text-gray-900 mb-1">No groups yet</h3>
            <p class="text-xs text-gray-500 mb-4">
                You haven't joined any groups yet.
            </p>
            <a href="{{ route('create-group') }}" 
               class="inline-flex items-center px-3 py-2 border border-transparent text-xs font-medium rounded-md text-blue-700 bg-blue-100 hover:bg-blue-200 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 transition-colors">
                <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"/>
                </svg>
                Create your first group
            </a>
        </div>
    @endif
</div>
