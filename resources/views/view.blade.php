
@extends('layout.app')

@section('content')
<h1>List of User</h1>
<table border="2">
    <thead>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>City</th>
            <th>Email</th>  
            <th>Show</th>
            <th>Edit</th>
            <th>Delete</th>
        </tr>
    </thead>
    @forelse ($student as $data)
    <tr>
        <td>
            {{ $data->id }}
        </td>
        <td>
            {{ $data->name }}
        </td>
        <td>
            {{ $data->city }}
        </td>
        <td>
            {{ $data->email }}
        </td>
   
        <td>
            <button> <a href="{{route('students.show', ['id' => $data->id])}}">Show</a> </button>
        </td>
        <td>
            <button> <a href="{{route('students.edit', ['id' => $data->id])}}">Edit</a> </button>
        </td>
        <td>
            <button> <a href="{{route('students.delete', ['id' => $data->id])}}">Delete</a> </button>
        </td>
    </tr>
    <tr>
        @empty
        <div>There are no tasks!</div>
    </tr>
    @endforelse
</table>

@endsection
