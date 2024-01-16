<x-layout>
    <a href="{{route('users_list')}}" class="btn btn-secondary">Back</a>
    <a href="{{route('users_edit', ['id' => $user->id])}}" class="btn btn-info">Edit User</a>
    <a href="{{route('users_delete', ['id' => $user->id])}}" class="btn btn-danger">Delete User</a>
    <div class="container" style="padding-top: 20px">
        <h2>Name: {{$user->name}}</h2>
        <h2>Email: {{$user->email}}</h2>
        <h2>Events:<br> @foreach($events as $event)
                <a href="{{route('events_details', ['id' => $event->id])}}">{{$event->title}}</a><br>
            @endforeach</h2>
    </div>
</x-layout>
