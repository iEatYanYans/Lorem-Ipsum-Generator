@extends('layout.master')

@yield('head')
<title>Password Generator Results</title>

@section('content')
<div class= "result-password">
  {!! $newPassword!!}
</div>
@endsection
