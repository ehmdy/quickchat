<div>
    {{-- Care about people's approval and you will be their prisoner. --}}

    @if (session('status'))
    <div class="alert alert-success border-2 bg-green-500 p-5 mb-3">
        {{ session('status') }}
    </div>
    @endif
    <form method="POST" wire:submit="save">
        @csrf

        <!-- Name -->
        <div class="mt-4">
            <x-input-label for="name" :value="__('Name')" />
            <x-text-input id="name" 
                class="block mt-1 w-full" type="text" 
                name="name" 
                wire:model="name"
                 />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

  
        <div class="flex items-center justify-start mt-4">
           
            <x-primary-button>
                {{ __('Create group') }}
            </x-primary-button>
        </div>
    </form>
</div>
