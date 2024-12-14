<div>
    {{-- To attain knowledge, add things every day; To attain wisdom, subtract things every day. --}}
    @forelse ($articles as $item)
        <div class="max-w-2xl border-2 mx-auto	rounded-md border-b-2 mb-5">
        
            <div class="px-6 py-4">
                <div class="font-bold text-xl mb-2"> {{ $item->title }}</div>
                <p class="text-grey-700 text-base">
                    {{ $item->description }}
                </p>
            </div>
            <div class="px-6 py-4">
                <span class="inline-block bg-grey-300 rounded-full px-3 py-1 text-sm font-semibold text-grey-700 mr-2">
                    <x-nav-link :href="route('article.show', $item->id)">
                        {{ __('Read more') }}
                    </x-nav-link>
                </span>
            </div>
        </div>
        @empty
        <p>{{ __('No articles found.') }}</p>
    @endforelse

</div>
