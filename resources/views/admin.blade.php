@extends('layouts.app')

@section('content')
  <h1>0</h1>

  <script type="text/javascript">
    socket.on('new form', function() {
      console.log('received');
      var count = Number($('h1').html());
      $('h1').html(++count);
    });
  </script>
@endsection
