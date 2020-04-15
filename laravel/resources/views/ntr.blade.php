<!-- Stored in resources/views/layouts/app.blade.php -->

<html>
    <head>
        <meta charset='utf-8'>
        <title> Laravel NTR Site </title>
        <link href="{{ asset('css/app.css')}}" rel="stylesheet" type="text/css">
    </head>
    <body> 
    　  <div id="header"><h1> Laravel NTR Site </h1></div>
    　  <div id="name" class='bar'>
            <h3>Name</h3>
            @yield('nameHead')
            @foreach ($vars['name'] as $var)
                <li>{{ $var['id'] }}, {{ $var['name'] }}</li>
            @endforeach
        </div>
    　  <div id="tag" class='bar'>
            <h3>Tag</h3>
            @yield('tagHead')
            @foreach ($vars['tag'] as $var)
                <li>{{ $var['id'] }}, {{ $var['tag'] }}</li>
            @endforeach
        </div>
    　  <div id="resume" class='bar'>
            <h3>Resume</h3>
            @yield('resumeHead')
            @foreach ($vars['resume'] as $var)
                <li>{{ $var['id'] }}, {{ $var['resume'] }}</li>
            @endforeach
        </div>
    　  <div id="tagresume" class='bar'>
            <h3>NTR</h3>
            @yield('ntrHead')
            <table border="1">
            <tr><td>Name</td><td>Resume</td><td>Tag</td></tr>
            @foreach ($vars['ntr'] as $var)
                <tr>
                    <td>{{ $var['name'] }}</td>
                    <td>{{ $var['resume'] }}</td>
                    <td>{{ $var['tag'] }}</td>
                </tr>
            @endforeach
            </table>
        </div>
    </body>
</html>