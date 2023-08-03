@extends('layout.app')

@section('content')

<h1>List of All Subjects</h1>
<form action="{{ route('subject.store') }}" method="POST">
    @csrf
    <label for="subject">Add New Subject : </label><br><br>
    <input type="text" name="subject">
    <input type="submit" name="add_sub" value="Add Subject"><br><br>
</form>
<table border="2">
    <thead>
        <tr>
            <th>ID</th>
            <th>Subject</th>
            <th>Edit</th>
            <th>Delete</th>
        </tr>
    </thead>
    @forelse ($subject as $sub)
    <tr>
        <td>
            {{ $sub->id }}
        </td>
        <td>
            {{ $sub->subject }}
        </td>
        <td>
            <button> <a href="{{ route('subject.edit', $sub->id) }}"> Edit </a> </button>
        </td>
        <td>
            <form action="{{ route('subject.delete', $sub->id) }}" method="POST">
                @csrf
                @method('DELETE')
                <input type="submit" value="Delete">
            </form>
        </td>
    </tr>
    <tr>
        @empty
        <div>There are no chapters!</div>
    </tr>
    @endforelse
</table>

@endsection