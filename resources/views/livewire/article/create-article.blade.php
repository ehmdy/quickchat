<div>
    {{-- To attain knowledge, add things every day; To attain wisdom, subtract things every day. --}}
    @if (session('status'))
    <div class="alert alert-success border-2 bg-green-500 p-5 mb-3">
        {{ session('status') }}
    </div>
    @endif
    <form method="POST" wire:submit="save">
        @csrf

        <!-- Title -->
        <div class="mt-4">
            <x-input-label for="title" :value="__('Title')" />
            <x-text-input id="title" 
                class="block mt-1 w-full" type="text" 
                name="title" 
                wire:model="title"
                 />
            <x-input-error :messages="$errors->get('title')" class="mt-2" />
        </div>

        <!-- Description -->
        <div class="mt-4">
            <x-input-label for="body" :value="__('body')" />
            <div wire:ignore>
                <div x-data
                     x-ref="editor"
                     x-init="
                        const quill = new Quill($refs.editor, {
                            theme: 'snow'
                        });
                        quill.on('text-change', () => {
                            $wire.set('description', quill.root.innerHTML)
                        })
                     ">{!! $description ?? '' !!}
                </div>
            </div>
            <x-input-error :messages="$errors->get('description')" class="mt-2" />
        </div>
      
        <div class="flex items-center justify-start mt-4">
           
            <x-primary-button>
                {{ __('post') }}
            </x-primary-button>
        </div>
    </form>
</div>
