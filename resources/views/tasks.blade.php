
@extends('layouts.app')


@section('content')
  @include('common.errors')
  <form class="task" action="{{ url('tasks') }}" method="POST">
    {!! csrf_field() !!}

    <label for="task-name">Task</label>
    <input type="text" name="name" id="task-name">

    <button type="submit" id="add">Add Task</button>
  </form>

  @if (count($tasks) > 0)
    Current Tasks
    <table>
      <thead>
          <th>Task</th>
          <th>&nbsp;</th>
      </thead>
      <tbody>
        @foreach ($tasks as $task)
          <tr>
            <td class="table-text">
                <div>{{ $task->name }}</div>
            </td>

            <td>
              <form action="{{ url('tasks/'.$task->id) }}" method="POST">
                  {!! csrf_field() !!}
                  {!! method_field('DELETE') !!}
                  <button type="submit">Delete</button>
              </form>
            </td>
          </tr>
        @endforeach
      </tbody>
    </table>
  @endif

  <script type="text/javascript">
    $.ajaxSetup({
      headers: { 'X-CSRF-TOKEN': $('input[name="_token"]').val() }
    });
    $('form.task').submit(function(event) {
      event.preventDefault();
      $.ajax({
        url: '/tasks',
        method: 'post',
        data: $(event.target).serialize()
      }).done(function(response) {
        socket.emit('new form');
      });
    });
  </script>
@endsection
