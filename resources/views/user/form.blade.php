@extends ('layout.master')

@section('content')

<form method='POST' action='/usergenerator' class='form'>
  <input type='hidden' name='_token' value='{{ csrf_token() }}'>
  <input type='text' name='parameter' class='textbox' placeholder='# of users'><br><br>
    @if ($errors->get('parameter'))
      <ul>
        @foreach ($errors->get('parameter') as $error)
          <li> {{$error}} </li>
        @endforeach
      </ul>
    @endif
  <b>Include</b><br>
  <input type='checkbox' name='attributes[]' value='number'> Phone Number<br>
  <input type='checkbox' name='attributes[]' value='location'> Location<br>
  <input type='checkbox' name='attributes[]' value='job'> Career<br>
  <input type='checkbox' name='attributes[]' value='profile'> Favorite Quote<br><br>
  <b>Gender</b><br>
  <input type='radio' name='gender' value='female'> Female Only <br>
  <input type='radio' name='gender' value='male'> Male Only <br>
  <input type='radio' name='gender' value='none' checked> No Preference <br><br>
  <input type='submit' value='Submit'>
  <input type='reset' value='Clear form'>

@stop
