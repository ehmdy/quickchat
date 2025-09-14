<div>
    {{-- Success is as dangerous as failure. --}}
    <table class="border-separate border-spacing-2 border border-slate-400 p-5">

        <thead>
            <tr class="p-4">
                <th>Id</th>
                <th>Title</th>
                <th>Body</th>
                <th>Created at</th>
                <th>Updated at</th>
                <th>Show</th>
            </tr>
        </thead>
        @forelse ($articles as $item)
            <tbody>
                <tr class="p-4">
                    <td class="border border-spacing-2 p-2">  {{ $item->id }}</td>
                    <td class="border border-spacing-2 p-2">  {{ $item->title }}</td>
                    <td class="border border-spacing-2 p-2">  {{ $item->body }}</td>
                    <td class="border border-spacing-2 p-2">  {{ $item->created_at }}</td>
                    <td class="border border-spacing-2 p-2">  {{ $item->updated_at }}</td>
                    
                    <td class="border border-spacing-2 p-2">
                        <x-nav-link :href="route('article.show', $item->id)">
                        {{ __('Show') }}
                        </x-nav-link>
                    </td>
                    <td class="border border-spacing-2 p-2">
                        <x-nav-link :href="route('edit-article', $item->id)">
                        {{ __('Edit') }}
                        </x-nav-link>
                    </td>
                </tr>
            </tbody>
        @endforeach

    </table>
       
</div>
