<div>
    {{-- A good traveler has no fixed plans and is not intent upon arriving. --}}
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
                wire:model.live="title"
                value="{{ $title }}"
                />
            <x-input-error :messages="$errors->get('title')" class="mt-2" />
        </div>


        <!-- Description -->
        <div class="mt-4">
            <x-input-label for="body" :value="__('body')" />
             
            <textarea
                class="form-textarea block mt-1 w-full" 
                name="body" 
                wire:model.live="body"/>
                {{ $body }}
            </textarea>
            <x-input-error :messages="$errors->get('body')" class="mt-2" />
        </div>

      
        <div class="flex items-center justify-start mt-4">
           
            <x-primary-button>
                {{ __('update post') }}
            </x-primary-button>
        </div>
    </form>
</div>
