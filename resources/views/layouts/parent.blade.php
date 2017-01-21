<html>
    <head>
        <title>App Name - @yield('title')</title>
    </head>
    <body>
        @section('header')
            <ul>
                <li> Menu</li> 
                <li> Menu1</li> 
                <li> Menu2</li> 
            </ul>
        @show

        @section('sidebar')
            This is the master Page sidebar.
        @show

        <div class="container">
            @yield('content')
        </div>

        @section('footer')
            This is the master Page Footer.
        @show

    </body>
</html>