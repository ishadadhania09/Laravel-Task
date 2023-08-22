@extends('layout.app')

@section('content')

<h1>List of All Chapters</h1>
<form action="{{ route('chapter.store') }}" method="POST">
    @csrf
    <label for="chapter">Add New Chapter : </label><br><br>
    <input type="text" name="chapter">
    <input type="submit" name="add_chap" value="Add Chapter"><br><br>
</form>
<table border="2">
    <thead>
        <tr>
            <th>ID</th>
            <th>Chapter</th>
            @if(session('accesstype') == "admin" || session('acces_type') == "teacher")
            <th>Status</th>
            <th>Change Status</th>
            <th>Edit</th>
            <th>Delete</th>
            @endif
        </tr>
    </thead>
    
    @forelse ($chapter as $chap)
    <tr>
        <td>
            {{ $chap->id }}
        </td>
        <td>
            {{ $chap->chapter }}
        </td>
        @if(session('accesstype') == "admin" || session('accesstype') == "teacher")
        <td>
            {{ $chap->active ? 'Active' : 'Deactive' }}
        </td>
        
        <td>
            <form method="post" action="{{ route('chapter.status', ['id' => $chap->id]) }}">
                @csrf
                <button type="submit" class="btn">
                    @if ($chap->active)
                        Deactivate
                    @else
                        Activate
                    @endif
                </button>
            </form>
        </td>
        
        <td>
            <button> <a href="{{ route('chapter.edit', $chap->id) }}"> Edit </a> </button>
        </td>
        <td>
            <form action="{{ route('chapter.delete', $chap->id) }}" method="POST">
                @csrf
                @method('DELETE')
                <input type="submit" value="Delete">
            </form>
        </td>
@endif

    </tr>
    <tr>
        @empty
        <div>There are no chapters!</div>
    </tr>
    @endforelse
</table>

@endsection