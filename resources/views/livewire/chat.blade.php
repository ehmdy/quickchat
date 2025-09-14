<div>
    {{-- Knowing others is intelligence; knowing yourself is true wisdom. --}}

    <div wire:poll class="mb-4">
        @forelse ($messages as $message)
            [{{ $message->created_at->format('H:i:s') }}] {{ $message->user->name }}: {{ $message->body }}
            <br/>
        @empty
            No messages yet. Type one below!
        @endforelse
        <div class="mt-6 border-top">
            <form wire:submit="sendMessage">
                <div class="md:inline-flex w-full">
                    <div class="md:w-9/12 w-full max-w-sm mx-auto space-y-5">
                        <textarea wire:model="body" placeholder="New message"
                            class="mt-2 text-sm sm:text-base pl-2 pr-4 rounded-lg border border-gray-400 w-full py-2 focus:outline-none focus:border-blue-400"></textarea>
                    
                            <x-input-error :messages="$errors->get('body')" class="mt-2" />        

                        </div>

                  
    
                    <div class="md:w-3/12 md:pl-6 space-y-5">
                        <button type="submit"
                                class="mt-2 inline-flex items-center px-4 py-3 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:shadow-outline-gray disabled:opacity-25 transition ease-in-out duration-150">
                            Send
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
