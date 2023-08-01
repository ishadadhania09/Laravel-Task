<h1>
    The list of tasks
  </h1>
  
  <div>
    
    {{-- @if (count($tasks)) --}}
    @forelse ($tasks as $task)
      <div>
        <a href="{{ route('students.show', ['id' => $student->id]) }}">{{$student->id ." ". $student->name }}</a>
      </div>
    @empty
      <div>There are no students!</div>
    @endforelse
  
    @if ($tasks->count())
    <nav class="mt-4">
      {{ $student->links() }}
    </nav>
  @endif