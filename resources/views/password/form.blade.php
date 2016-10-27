@extends ('layout.master')

@section('content')
<!DOCTYPE>

<form method = "POST" action='/passwordgenerator' class = "form">

  <input type='hidden' name='_token' value='{{ csrf_token() }}'>
  <input type='number' name='wordcount' class='textbox' placeholder="# of words (Max.10)">
  <br><br>
  @if ($errors->get('wordcount'))
    <ul>
      @foreach ($errors->get('wordcount') as $error)
        <li> {{$error}} </li>
      @endforeach
    </ul>
  @endif

  <input type='number' name='symbol' class='textbox' placeholder="# of symbols(Max.10)"><br><br>
  @if ($errors->get('number'))
    <ul>
      @foreach ($errors->get('number') as $error)
        <li> {{$error}} </li>
      @endforeach
    </ul>
  @endif
  <input type='checkbox' name='number'> Include a number<br><br>
  <input type = 'submit' value ='Generate'>
  <input type = 'reset' value = 'Clear all'><br>
</form>


@endsection
