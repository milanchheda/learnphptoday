<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title')</title>
    {!! SEO::generate(true) !!}
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- Styles -->
    <link href="{{ asset('css/main.css') }}" rel="stylesheet">
    <?php
    if(env('APP_ENV') != 'local') {
    ?>
        {!! Analytics::render() !!}
          <!-- Global site tag (gtag.js) - Google Analytics -->
          <script async src="https://www.googletagmanager.com/gtag/js?id=UA-100841850-1"></script>
          <script>
              window.dataLayer = window.dataLayer || [];

              function gtag() {
                  dataLayer.push(arguments);
              }

              gtag('js', new Date());

              gtag('config', 'UA-100841850-1');
          </script>
    <?php
    }
    ?>
</head>
<body class="bg-grey-lightest font-sans font-normal">
    <div id="app">
        <nav class="flex items-center justify-between flex-wrap bg-red-lighter p-6">
          <div class="flex items-center flex-no-shrink text-white mr-6">
            <a class="text-white no-underline" href='/'><span class="font-semibold text-xl tracking-tight">Learn PHP Today</span></a>
          </div>
          <div class="block lg:hidden">
            <button class="flex items-center px-3 py-2 border rounded text-red-dark border-red-dark hover:text-white hover:border-black">
              <svg class="h-3 w-3" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><title>Menu</title><path d="M0 3h20v2H0V3zm0 6h20v2H0V9zm0 6h20v2H0v-2z"/></svg>
            </button>
          </div>
          <div class="w-full block flex-grow lg:flex lg:items-center lg:w-auto">
            <div class="text-base lg:flex-grow">
              <a href="/video-tutorials" class="block cursor-pointer mt-4 lg:inline-block lg:mt-0 hover:text-white mr-4 {{ Request::is('video-tutorials') ? 'text-white' : 'text-red-dark' }}">
                Videos
              </a>
              <a href="/tweet-snippets" class="block cursor-pointer mt-4 lg:inline-block lg:mt-0 hover:text-white mr-4 {{ Request::is('tweet-snippets') ? 'text-white' : 'text-red-dark' }}">
                Tweet Snippets
              </a>
            </div>
          </div>
        </nav>
        @yield('content')
    </div>
    <div class="bg-grey-lighter text-center py-4 px-4 border-t-2 border-solid border-grey">
      Made with <span class="text-red-dark pl-1 pr-1 text-lg">❤</span> by <a class="inline-block text-red-dark no-underline" href='https://twitter.com/milanchheda' target="_BLANK">@milanchheda</a>
    </div>
    <!-- Scripts -->
    <script src="//twemoji.maxcdn.com/2/twemoji.min.js?2.3.0"></script>
    <script src="{{ asset('js/app.js') }}"></script>
    <script>
      window.addEventListener('load',function(){
        ga('send','event','Learn PHP Today','referrer',document.referrer)
      });
    </script>
</body>
</html>
