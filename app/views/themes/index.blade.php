<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <title>{{ $data[0]->title }}</title>
        <meta name="description" content="{{ Str::words(strip_tags($data[0]->content),50,'...'); }}">
        <meta name="viewport" content="width=device-width">
        <meta name="keywords" content="{{ $data[0]->keywords }}">

        {{ HTML::style('css/themes/normalize.min.css') }}
        {{ HTML::style('css/themes/main.css') }}

        {{ HTML::script('js/themes/vendor/modernizr.min.js') }}

        <link rel="shortcut icon" href="{{ URL::to('img/favicon.ico') }}">
    </head>
    <body>
        <!--[if lt IE 7]>
            <p class="chromeframe">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> or <a href="http://www.google.com/chromeframe/?redirect=true">activate Google Chrome Frame</a> to improve your experience.</p>
        <![endif]-->

        <div class="header-container">
            <header class="wrapper clearfix">
                <h1 class="title">{{ $data[0]->title }}</h1>
                <nav>
                    <ul>
                        <li>{{ HTML::link('/', $data[0]->name) }}</li>
                @if($links)
                    @foreach($links as $link)
                    @if(($link->status) == true)
                        <li>{{ HTML::link('p/' . Str::slug($link->name), $link->name) }}</li>
                    @endif
                    @endforeach      
                @endif
                    </ul>
                </nav>
            </header>
        </div>

        <div class="main-container">
            <div class="main wrapper clearfix">

                <article>
                    
                    <section>
                        {{ $data[0]->content }}
                    </section>
                   
                </article>

                <aside>
                    <h3>aside</h3>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam sodales urna non odio egestas tempor. Nunc vel vehicula ante. Etiam bibendum iaculis libero, eget molestie nisl pharetra in. In semper consequat est, eu porta velit mollis nec. Curabitur posuere enim eget turpis feugiat tempor. Etiam ullamcorper lorem dapibus velit suscipit ultrices.</p>
                </aside>

            </div> <!-- #main -->
        </div> <!-- #main-container -->

        <div class="footer-container">
            <footer class="wrapper">
                <h3>footer</h3>
            </footer>
        </div>

        <script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.1/jquery.min.js"></script>

        {{ HTML::script('js/themes/main.js') }}

        <script>
            var _gaq=[['_setAccount','UA-XXXXX-X'],['_trackPageview']];
            (function(d,t){var g=d.createElement(t),s=d.getElementsByTagName(t)[0];
            g.src='//www.google-analytics.com/ga.js';
            s.parentNode.insertBefore(g,s)}(document,'script'));
        </script>
    </body>
</html>
