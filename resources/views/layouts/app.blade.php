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
<body class="header font-sans font-normal">
    <div id="app">
        <nav class="flex items-center justify-between flex-wrap p-6 bg-white border-t-8 border-solid border-purple-lighter border-b-2">
          <div class="flex items-center flex-no-shrink text-white mr-6">
            <a class="text-purple-darkest no-underline" href='/'><span class="font-semibold text-xl">Learn PHP Today</span>
            <div class="flex justify-center items-center mt-2 -mb-2">
              { <img src="/images/watch.png" class="h-8 w-8 align-middle" alt="YouTube"> + <img src="/images/twitter.png" class="h-8 w-8 align-middle" alt="Twitter"> }
            </div>
            </a>
          </div>
          <div class="block lg:hidden">
            <button class="flex items-center px-3 py-2 border rounded text-red-dark border-red-dark hover:text-white hover:border-black" id="toggleMenu">
              <svg class="h-3 w-3" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><title>Menu</title><path d="M0 3h20v2H0V3zm0 6h20v2H0V9zm0 6h20v2H0v-2z"/></svg>
            </button>
          </div>
          <div class="w-full block flex-grow lg:flex lg:items-center lg:w-auto" id="menu-container">
            <div class="text-lg lg:flex-grow">
              <a href="/video-tutorials" class="block font-semibold no-underline cursor-pointer mt-4 lg:inline-block lg:mt-0 hover:text-blue mr-4 {{ Request::is('video-tutorials') ? 'text-blue' : 'text-purple-dark' }}">
                Video Tutorials
              </a>
              <a href="/tweet-snippets" class="block font-semibold no-underline cursor-pointer mt-4 lg:inline-block lg:mt-0 hover:text-blue mr-4 {{ Request::is('tweet-snippets') ? 'text-blue' : 'text-purple-dark' }}">
                Tweet Snippets
              </a>
              @if(Auth::user() && Auth::user()->hasRole('admin'))
                <a href="/admin/dashboard" class="block font-semibold no-underline cursor-pointer mt-4 lg:inline-block lg:mt-0 hover:text-blue mr-4 {{ Request::is('tweet-snippets') ? 'text-blue' : 'text-purple-dark' }}">Dashboard</a>
                <a href="/admin/tweets" class="block font-semibold no-underline cursor-pointer mt-4 lg:inline-block lg:mt-0 hover:text-blue mr-4 {{ Request::is('tweet-snippets') ? 'text-blue' : 'text-purple-dark' }}">Tweet snippets list</a>
                <a href="/admin/videos" class="block font-semibold no-underline cursor-pointer mt-4 lg:inline-block lg:mt-0 hover:text-blue mr-4 {{ Request::is('tweet-snippets') ? 'text-blue' : 'text-purple-dark' }}">Video Tutorials list</a>
                <a href="{{ route('logout') }}" class="block font-semibold no-underline cursor-pointer mt-4 lg:inline-block lg:mt-0 hover:text-blue mr-4 {{ Request::is('tweet-snippets') ? 'text-blue' : 'text-purple-dark' }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    {{ csrf_field() }}
                </form>
              @endif
            </div>
          </div>
        </nav>
        @if(Request::is('/'))
        <div class="py-4 px-4 h-48 flex flex-wrap content-center justify-center items-center text-teal-darker header">
          <p class="mx-8 w-full text-xl lg:text-4xl leading-normal content-center justify-center items-center text-center tracking-tight">A curated list of top-rated video tutorials <br />from <a href="{{ route('video-tutorials') }}"><img src="/images/watch.png" class="lg:h-16 lg:w-16 h-12 w-12 align-middle" alt="YouTube"></a> & code snippets from <a href="{{ route('tweet-snippets') }}"><img src="/images/twitter.png" class="lg:h-16 lg:w-16 h-12 w-12 align-middle" alt="Twitter"></a>
          </p>
        </div>
        @endif
        @yield('content')
    </div>


    <div class="bg-white text-center py-4 px-4 border-t-4 border-solid border-purple-lighter">
      Made with <span class="text-red-dark pl-1 pr-1 text-lg">❤</span> by <a class="inline-block text-purple-dark font-semibold no-underline" href='https://twitter.com/milanchheda' target="_BLANK">@milanchheda</a>
    </div>
    <!-- Scripts -->
    <script src="//twemoji.maxcdn.com/2/twemoji.min.js?2.3.0"></script>
    <script src="{{ asset('js/app.js') }}"></script>
    <?php
    if(env('APP_ENV') != 'local' && !Request::is('admin/*')) {
    ?>
    <script>
      window.addEventListener('load',function(){
        ga('send','event','Learn PHP Today','referrer',document.referrer)
      });
    </script>
    <?php
    }
    ?>
</body>
</html>
