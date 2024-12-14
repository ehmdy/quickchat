<div>
    {{-- To attain knowledge, add things every day; To attain wisdom, subtract things every day. --}}
    <table class="border-separate border-spacing-2 border border-slate-400 p-5">

        <thead>
            <tr class="p-4">
                <th>Id</th>
                <th>Username</th>
                <th>Name</th>
                <th>Email</th>
                <th>Created at</th>
                <th>Updated at</th>
            </tr>
        </thead>
        @if($user)
            <tbody>
                <tr class="p-4">
                    <td class="border border-spacing-2 p-2">  {{ $user->id }}</td>
                    <td class="border border-spacing-2 p-2">  {{ $user->username }}</td>
                    <td class="border border-spacing-2 p-2">  {{ $user->name }}</td>
                    <td class="border border-spacing-2 p-2">  {{ $user->email }}</td>
                    <td class="border border-spacing-2 p-2">  {{ $user->created_at }}</td>
                    <td class="border border-spacing-2 p-2">  {{ $user->updated_at }}</td>
                    
                    <td class="border border-spacing-2 p-2">
                        <span class="inline-block bg-gray-100 rounded-full px-3 py-1 text-sm font-semibold text-gray-700">
                            <a href="{{route('user.index')}}" class="px-3 py-1 text-sm font-semibold text-gray-700">
                                {{__('back')}}
                            </a>
                        </span>
                    </td>
                    
                </tr>
            </tbody>
        @endif
    </table>

 
</div>
