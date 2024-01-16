<x-layout>
    <a href="{{route('users_create')}}" class="btn btn-primary">Create new</a>
    <table class="table table-striped">
        <tr>
            <th>Name</th>
            <th>Email</th>
            <th>Edit</th>
            <th>Delete</th>
        </tr>
        @foreach ($users as $user)
            <tr>
                <td><a href="{{route('users_details', ['id'=>$user->id])}}">{{$user->name}}</a></td>
                <td>{{$user->email}}</td>
                <td><a href="{{route('users_edit', ['id'=>$user->id])}}"><i class="bi bi-pencil-square"></i></a></td>
                <td><a href="{{route('users_delete', ['id'=>$user->id])}}"><i class="bi bi-trash3"></i></a></td>
            </tr>
        @endforeach
    </table>
</x-layout>
