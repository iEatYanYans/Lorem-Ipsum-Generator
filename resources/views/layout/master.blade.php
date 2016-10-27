<!DOCTYPE html>
<html>
<head>
    <title>
        @yield('title','A Developer\'s Best Friend')
    </title>

    <meta charset='utf-8'>
    <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
    <link href="/css/welcome.css" type='text/css' rel='stylesheet'>

    @yield('head')

</head>
<body>

    <header>
      <div class= 'header-main'>
      <a href="/"> A Developer's Best Friend </a><br>
    </div>
    <div class= 'header-sub'>
      <a href ='lorem'> Lorem Ipsum Generator</a> &nbsp
      <a href = 'usergenerator'> User Generator</a>  &nbsp
      <a href = 'passwordgenerator'> Password Generator</a><br />
    </div>
      <br>
    </header>

    <section>
        {{-- Main page content will be yielded here --}}
        @yield('content')
    </section>

    <footer>
        <br><br><br><div class= 'footer'> <br>&copy; {{ date('Y') }} Yan Chen</div>
    </footer>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>

    {{-- Yield any page specific JS files or anything else you might want at the end of the body --}}
    @yield('body')

</body>
</html>
