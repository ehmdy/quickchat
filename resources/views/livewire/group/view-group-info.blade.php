<div>
    {{-- Close your eyes. Count to one. That is how long forever feels. --}}
    <div class="max-w-2xl border-2 mx-auto	rounded-md border-b-2 mb-5 mt-5">
        
        <div class="px-6 py-4">
            <div class="font-bold text-xl mb-2"> {{ $group->name }}</div>
             
        </div>
        <div class="px-6 py-4">
            <span class="inline-block bg-grey-300 rounded-full px-3 py-1 text-sm font-semibold text-grey-700 mr-2">
                
                <a href="{{ url('/invite/' . $group->link) }}" target="_blank">
                    {{ url('/invite/' . $group->link) }}
                </a>
            </span>

            <span class="inline-block bg-grey-300 rounded-full px-3 py-1 text-sm font-semibold text-grey-700 mr-2">
                {{ $group->created_at }}
            </span>
        </div>
    </div>
</div>
