<x-layout>
    <a href="{{route('events_create')}}" class="btn btn-primary">Create new</a>
    <table class="table table-striped">
        <tr>
            <th>Title</th>
            <th>Notes</th>
            <th>Start date</th>
            <th>End date</th>
            <th>Edit</th>
            <th>Delete</th>
        </tr>
        @foreach ($events as $event)
            <tr>
                <td><a href="{{route('events_details', ['id'=>$event->id])}}">{{$event->title}}</a></td>
                <td>{{$event->notes}}</td>
                <td>{{$event->dt_start}}</td>
                <td>{{$event->dt_end}}</td>
                <td><a href="{{route('events_edit', ['id'=>$event->id])}}"><i class="bi bi-pencil-square"></i></a></td>
                <td><a href="{{route('events_delete', ['id'=>$event->id])}}"><i class="bi bi-trash3"></i></a></td>
            </tr>
        @endforeach
    </table>
</x-layout>
