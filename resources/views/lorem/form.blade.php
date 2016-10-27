@extends ('layout.master')

@section('content')

  <form method='POST' action='/lorem' class = 'form'>
    <input type='hidden' name='_token' value='{{ csrf_token() }}'>
    <input type='text' name='parameter' placeholder='# of paragraphs'><br><br>
    Case format for your ipsum text: <br>
    @if ($errors->get('parameter'))
      <ul>
        @foreach ($errors->get('parameter') as $error)
          <li> {{$error}} </li>
        @endforeach
      </ul>
    @endif
    <input type='radio' name='case' value='sentence' checked> <u>S</u>entence case<br>
    <input type='radio' name='case' value='uppercase'> UPPERCASE <br>
    <input type='radio' name='case' value='lowercase'> lowercase <br><br>
    <input type='submit' value='submit'>
    <input type='reset' value='reset'>
  </form>

@stop
