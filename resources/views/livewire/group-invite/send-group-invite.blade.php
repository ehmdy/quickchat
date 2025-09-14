<div>
    {{-- The whole world belongs to you. --}}
    @foreach (auth()->user()->unreadNotifications as $notification)
        <li>
            {{ $notification->data['message'] }}
            <a href="{{ url('/groups/'.$notification->data['group_id']) }}">
                Join Group
            </a>
        </li>
    @endforeach
</div>
