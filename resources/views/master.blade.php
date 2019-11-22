<!doctype html>
<html lang="en" class="h-100">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>FTO - @yield('title')</title>

    <link rel="stylesheet" type="text/css" href="/css/app.css"/>

    <style>
        /*.bd-placeholder-img {*/
            /*font-size: 1.125rem;*/
            /*text-anchor: middle;*/
            /*-webkit-user-select: none;*/
            /*-moz-user-select: none;*/
            /*-ms-user-select: none;*/
            /*user-select: none;*/
        /*}*/

        /*@media (min-width: 768px) {*/
            /*.bd-placeholder-img-lg {*/
                /*font-size: 3.5rem;*/
            /*}*/
        /*}*/

        main > .container {
            padding: 60px 15px 0;
        }

        .footer {
            background-color: #f5f5f5;
        }

        .footer > .container {
            padding-right: 15px;
            padding-left: 15px;
        }

        code {
            font-size: 80%;
        }
    </style>
</head>
<body class="d-flex flex-column h-100">
<header>
    <!-- Fixed navbar -->
    <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
        <a class="navbar-brand" href="#">FTO Solutions</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarCollapse">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                    <a class="nav-link" href="/">Início</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/city">Cidades</a>
                </li>
            </ul>
        </div>
    </nav>
</header>

<!-- Begin page content -->
<main role="main" class="flex-shrink-0">
    <div class="container">
        @yield('contents')
        {{--<h1 class="mt-5">Sticky footer with fixed navbar</h1>--}}
        {{--<p class="lead">Pin a footer to the bottom of the viewport in desktop browsers with this custom HTML and CSS. A fixed navbar has been added with <code>padding-top: 60px;</code> on the <code>main &gt; .container</code>.</p>--}}
        {{--<p>Back to <a href="/docs/4.3/examples/sticky-footer/">the default sticky footer</a> minus the navbar.</p>--}}
    </div>
</main>

<!-- Footer -->
<footer class="footer mt-auto py-3">
    <div class="container">
        <span class="text-muted">FTO SOLUTIONS</span>
    </div>
</footer>
<script src="/js/app.js"></script>
</body>
</html>