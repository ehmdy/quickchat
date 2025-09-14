<div>
    {{-- The best athlete wants his opponent at his best. --}}

    <table class="border-separate border-spacing-2 border border-slate-400 p-5">

        <thead>
            <tr class="p-4">
                <th>Id</th>
                <th>Name</th>
               
                <th>Created at</th>
          
                <th>Show</th>
            </tr>
        </thead>
        @forelse ($groups as $item)
            <tbody>
                <tr class="p-4">
                    <td class="border border-spacing-2 p-2">  {{ $item->id }}</td>
                    <td class="border border-spacing-2 p-2">  {{ $item->name }}</td>
                
                    <td class="border border-spacing-2 p-2">  {{ $item->created_at }}</td>
                  
                    <td class="border border-spacing-2 p-2">
                        <x-nav-link :href="route('view-group-info', $item->id)">
                        {{ __('View group info') }}
                        </x-nav-link>
                    </td>
                   
                </tr>
            </tbody>
        @empty
        <p>{{ __('No groups found.') }}</p>
    @endforelse

    </table>
       
</div>
