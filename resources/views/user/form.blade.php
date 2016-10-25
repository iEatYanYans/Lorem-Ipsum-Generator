@extends ('layout.master')

@section('content')
@if(count($errors) > 0)
  <ul>
    @foreach ($errors->all() as $error)
      <li> {{$error}} </li>
    @endforeach
  </ul>
@endif

<form method='POST' action='/usergenerator' class='form'>
  <input type='hidden' name='_token' value='{{ csrf_token() }}'>
  <input type='text' name='parameter' placeholder='# of users'><br>
  <input type='checkbox' name='attributes' value='birthdate'> Birthdate<br>
  <input type='checkbox' name='attriutes' value='location'> Location<br>
  <input type='checkbox' name='attributes' value='job'> Job<br>
  <input type='checkbox' name='attributes' value='profile'> Profile<br><br>
  <input type='radio' name='gender' value='female'> Female Only &nbsp
  <input type='radio' name='gender' value='male'> Male Only &nbsp
  <input type='radio' name='gender' value='none' checked> No Preference <br>
  <input type='submit' value='Submit'>
  <input type='reset' value='Clear form'>


@stop
