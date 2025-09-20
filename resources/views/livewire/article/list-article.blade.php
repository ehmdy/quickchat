<div class="space-y-6">
    @if($articles->count() > 0)
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4 sm:gap-6">
            @foreach($articles as $article)
                <div class="group bg-white rounded-lg sm:rounded-xl shadow-sm border border-gray-200 hover:shadow-lg hover:border-blue-300 transition-all duration-300 overflow-hidden touch-manipulation">
                    <!-- Article Header -->
                    <div class="p-4 sm:p-6 pb-3 sm:pb-4">
                        <div class="flex items-start justify-between mb-3">
                            <div class="flex-1 min-w-0">
                                <h3 class="text-base sm:text-lg font-semibold text-gray-900 group-hover:text-blue-600 transition-colors line-clamp-2">
                                    {{ $article->title }}
                                </h3>
                            </div>
                            <div class="flex-shrink-0 ml-2 sm:ml-3">
                                <span class="inline-flex items-center px-2 sm:px-2.5 py-0.5 rounded-full text-xs font-medium bg-blue-100 text-blue-800">
                                    Article
                                </span>
                            </div>
                        </div>
                        
                        <!-- Article Content Preview -->
                        <p class="text-gray-600 text-sm line-clamp-3 mb-4">
                            {{ Str::limit(strip_tags($article->body), 120) }}
                        </p>
                        
                        <!-- Article Meta -->
                        <div class="flex items-center justify-between text-xs text-gray-500">
                            <div class="flex items-center space-x-2">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                </svg>
                                <span>{{ $article->created_at->diffForHumans() }}</span>
                            </div>
                            <div class="flex items-center space-x-1">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15"/>
                                </svg>
                                <span>{{ $article->updated_at->diffForHumans() }}</span>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Article Actions -->
                    <div class="px-4 sm:px-6 py-3 sm:py-4 bg-gray-50 border-t border-gray-100 flex flex-col sm:flex-row sm:items-center sm:justify-between space-y-2 sm:space-y-0">
                        <div class="flex items-center space-x-2">
                            <a href="{{ route('article.show', $article->id) }}" 
                               class="inline-flex items-center px-3 py-2 border border-transparent text-xs font-medium rounded-lg text-blue-700 bg-blue-100 hover:bg-blue-200 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 transition-colors touch-manipulation btn-mobile">
                                <svg class="w-3 h-3 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/>
                                </svg>
                                Read
                            </a>
                            <a href="{{ route('edit-article', $article->id) }}" 
                               class="inline-flex items-center px-3 py-2 border border-gray-300 text-xs font-medium rounded-lg text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 transition-colors touch-manipulation btn-mobile">
                                <svg class="w-3 h-3 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/>
                                </svg>
                                Edit
                            </a>
                        </div>
                        
                        <div class="text-xs text-gray-400 hidden sm:block">
                            ID: {{ $article->id }}
                        </div>
                    </div>
                </div>
        @endforeach
        </div>
        
        <!-- Pagination would go here -->
        @if($articles->hasPages())
            <div class="mt-8">
                {{ $articles->links() }}
            </div>
        @endif
    @else
        <!-- Empty State -->
        <div class="text-center py-12">
            <div class="w-16 h-16 bg-gray-100 rounded-full flex items-center justify-center mx-auto mb-4">
                <svg class="w-8 h-8 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                </svg>
            </div>
            <h3 class="text-lg font-medium text-gray-900 mb-2">No articles yet</h3>
            <p class="text-gray-500 max-w-sm mx-auto mb-6">
                Start creating content by writing your first article. Share knowledge, updates, or insights with your community.
            </p>
            <a href="{{ route('create-article') }}" 
               class="inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 transition-colors">
                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"/>
                </svg>
                Create your first article
            </a>
        </div>
    @endif
</div>

<style>
.line-clamp-2 {
    display: -webkit-box;
    -webkit-line-clamp: 2;
    -webkit-box-orient: vertical;
    overflow: hidden;
}

.line-clamp-3 {
    display: -webkit-box;
    -webkit-line-clamp: 3;
    -webkit-box-orient: vertical;
    overflow: hidden;
}
</style>
