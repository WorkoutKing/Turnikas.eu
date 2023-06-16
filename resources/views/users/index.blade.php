@extends('main')

@section('content')
@if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif
{{--  <labe>Currently down! </labe>
<a href="/users/create">Create Users</a>  --}}
<table class="table">
    <thead class="thead-dark">
        <tr>
            <th scope="col">Name (testas)</th>
            <th scope="col">Email</th>
            <th scope="col">Role</th>
            <th scope="col">Online Status</th>
            <th scope="col">IP Address</th>
            <th scope="col">Last Seen</th>
            <th scope="col">Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($users as $user)
            <tr>
                <td>{{ $user->name }}</td>
                <td>{{ $user->email }}</td>
                <td>
                    @if($user->role->name == 'superadmin')
                        Super Admin
                    @elseif($user->role->name == 'admin')
                        Admin
                    @else
                        User
                    @endif
                </td>
                <td>
                    @if ($onlineUsers->contains('name', $user->name))
                        @php
                            $lastSeen = Carbon\Carbon::parse($onlineUsers->where('name', $user->name)->first()->last_seen);
                            $offlineTime = 5; // in minutes
                        @endphp
                            @if ($lastSeen->diffInMinutes(now()) > $offlineTime)
                                Offline
                            @else
                                {{ $lastSeen->diffForHumans() }}
                            @endif
                        @else
                            N/A
                    @endif
                </td>
                <td>
                    @if ($onlineUsers->contains('name', $user->name))
                        {{ $onlineUsers->where('name', $user->name)->first()->ip_address }}
                    @else
                        N/A
                    @endif
                </td>
                <td>
                    @if ($onlineUsers->contains('name', $user->name))
                        {{ $onlineUsers->where('name', $user->name)->first()->last_seen }}
                    @else
                        N/A
                    @endif
                </td>
                <td>
                    <div class="btn-group" role="group">
                        <a href="{{ route('users.edit', $user->id) }}" class="btn btn-primary">Edit</a>
                        <form action="{{ route('users.destroy', $user->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this user?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                    </div>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>


@endsection
