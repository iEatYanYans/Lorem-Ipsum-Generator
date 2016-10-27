@extends ('layout.master')

@yield('head')
<title>A Developer's Best Friend</title>
<!-- Font -->
<link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
<link href="/css/welcome.css" type='text/css' rel='stylesheet'>


@section('content')

<div class='result-lorem'>
  {!! $result !!}
</div>
@endsection
