<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('User Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <h2>{{__('Please agree to our updated Terms of Service.')}}</h2>
                </div>

                <div id="terms" class="p-6 text-gray-900 dark:text-gray-100">
                    {!! $terms->terms !!}
                </div>
              
            </div>
            
            <div>
                <form action="{{ route('terms.store') }}" method="post">
                    @csrf
    
                    <div class="mt-2">
                       
                        <x-text-input id="terms_and_conditions" class="block mt-1" type="checkbox" name="terms"  autocomplete="off" />
                
                        <x-input-error :messages="$errors->get('terms')" class="mt-2" />
                    </div>
    
                    <div class="mt-2">
                        <x-primary-button>
                            {{ __('Accept') }}
                        </x-primary-button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>

 