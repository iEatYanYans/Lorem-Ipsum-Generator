@extends ('layout.master')

@yield('head')
<title>Lorem Ipsum Results</title>

@section('content')
<div class='result-lorem'>
  {!! $result !!}
</div>
@endsection
