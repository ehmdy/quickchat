<div>
    {{-- A good traveler has no fixed plans and is not intent upon arriving. --}}
        <div class="max-w-2xl border-2 mx-auto	rounded-md border-b-2 mb-5 mt-5">
        
            <div class="px-6 py-4">
                <div class="font-bold text-xl mb-2"> {{ $article->title }}</div>
                <p class="text-grey-700 text-base">
                    {{ $article->description }}
                </p>
            </div>
            <div class="px-6 py-4">
                <span class="inline-block bg-grey-300 rounded-full px-3 py-1 text-sm font-semibold text-grey-700 mr-2">
                    {{ $article->created_at }}
                </span>
            </div>
        </div>
</div>
