<x-layout>
    <a href="{{route('events_list')}}" class="btn btn-secondary">Back</a>
    <a href="{{route('events_edit', ['id'=>$event->id])}}" class="btn btn-info">Edit</a>
    <a href="{{route('events_delete', ['id'=>$event->id])}}" class="btn btn-danger">Delete</a>
    <div class="container" style="padding-top: 20px">
        <h2>Title: {{$event->title}}</h2>
        <h2>Notes: {{$event->notes}}</h2>
        <h2>Responsible user: <a href="{{route('users_details', ['id'=>$user->id])}}">{{$user->name}}</a></h2>
        <h2>Dates: From {{$event->dt_start}} till {{$event->dt_end}}</h2>
    </div>
</x-layout>
