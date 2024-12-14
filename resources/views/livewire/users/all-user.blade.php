<div>
    {{-- A good traveler has no fixed plans and is not intent upon arriving. --}}
 
        <table class="border-separate border-spacing-2 border border-slate-400 p-5">

            <thead>
                <tr class="p-4">
                    <th>Id</th>
                    <th>Username</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Created at</th>
                    <th>Updated at</th>
                    <th>Show</th>
                    <th>Active</th>
                </tr>
            </thead>
            @forelse ($users as $item)
                <tbody>
                    <tr class="p-4">
                        <td class="border border-spacing-2 p-2">  {{ $item->id }}</td>
                        <td class="border border-spacing-2 p-2">  {{ $item->username }}</td>
                        <td class="border border-spacing-2 p-2">  {{ $item->name }}</td>
                        <td class="border border-spacing-2 p-2">  {{ $item->email }}</td>
                        <td class="border border-spacing-2 p-2">  {{ $item->created_at }}</td>
                        <td class="border border-spacing-2 p-2">  {{ $item->updated_at }}</td>
                        
                        <td class="border border-spacing-2 p-2">
                            <a href="{{ route('user.show', ['id' => $item->id]) }}">View</a>
                        </td>
                        <td class="border border-spacing-2 p-2">  {{ $item->active }}</td>
                    </tr>
                </tbody>

             
            @endforeach
         
        </table>
                   
   
</div>
 
