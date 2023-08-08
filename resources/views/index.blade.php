<h1>
    The list of tasks
  </h1>
  
  <div>
    
    {{-- @if (count($tasks)) --}}
    @forelse ($student as $stud)
      <div>
        <a href="{{ route('students.show', ['id' => $stud->id]) }}">{{$stud->id ." ". $stud->name }}</a>
      </div>
    @empty
      <div>There are no students!</div>
    @endforelse
  
    {{-- @if ($student->count())
    <nav class="mt-4">
      {{ $student->links() }}
    </nav>
  @endif --}}