@extends('layouts.app')

@section('content')
    <div class="text-red-dark ml-4 mr-4 mt-8 clearfix">
        <h3 class="float-left">Video Tutorials</h3>
        <div class="float-right mr-2"><a href='video-tutorials' class="text-red-dark text-base">View all</a></div>
    </div>
    <div class="flex flex-wrap">
        @foreach($videoData as $video)
        <?php
            $videoObj = json_decode($video['data']);
            preg_match('/src="([^"]+)"/', $videoObj->html, $match);
            $video_url = $match[1];
        ?>
        <div class="w-full sm:w-1/3 md:w-1/4 pl-4 pr-4">
            <div class="bg-white shadow-lg mt-4">
                <div class="max-w-sm overflow-hidden shadow-lg" style="min-height: 300px;">

                <a class="venobox" data-autoplay="true" data-vbtype="video" href="{{ $video_url }}"><img class="w-full h-48" src="{{ $videoObj->thumbnail_url }}" alt="Sunset in the mountains"></a>

                <div class="px-3 py-4 flex">
                <div>
                    <div class="text-black font-bold text-base mb-2">
                        <a class="text-red no-underline" target="_BLANK" href="{{ $videoObj->author_url }}">{{ $videoObj->author_name }}</a>
                    </div>
                    <p class="text-grey-darkest text-sm">{{ $videoObj->title }}</p>
                </div>
                </div>
            </div>
            </div>
        </div>
        @endforeach
    </div>

    <div class="text-red-dark py-4 ml-4 mr-4 mt-8 clearfix">
        <h3 class="float-left">Tweet Snippets</h3>
        <div class="float-right mr-2"><a href='tweet-snippets' class="text-red-dark text-base">View all</a></div>
    </div>
    <div class="flex flex-wrap pb-8">
        @foreach($tweetData as $tweet)
        <?php
            $tweetObj = json_decode($tweet['data']);
        ?>
        <div class="w-full sm:w-1/3 md:w-1/4 pl-4 pr-4">
            <div class="bg-white shadow-lg">
                <div class="max-w-sm overflow-hidden shadow-lg" style="min-height: 335px;">

                <div class="w-full h-48 flex overflow-hidden">

                <a class="venobox h-64 w-full" href="{{ $tweetObj->image_url }}" style="background-image: url({{$tweetObj->image_url}}); background-size: cover;"></a>


                    <!-- <a href="{{$tweetObj->image_url}}" class="h-64 w-full" style="background-image: url({{$tweetObj->image_url}}); background-size: cover;"></a> -->
                </div>
                <!-- <img class="w-full h-48" src="{{$tweetObj->image_url}}"> -->


                <div class="px-3 py-4 flex">
                    <div class="w-32 overflow-hidden mr-4">
                        <img class="block h-12 w-90" src="{{ $tweetObj->profile_image }}" alt="{{ $tweetObj->screen_name }}">
                    </div>
                <div>
                    <div class="text-black font-bold text-base mb-1">

                    <a class="text-red no-underline" target="_BLANK" href="https://twitter.com/{{ $tweetObj->screen_name }}">{{ $tweetObj->name }}</a>
                    </div>
                    <p class="text-grey-darkest text-sm leading-normal tweetText">
                    {{ $tweetObj->text }}
                    </p>
                </div>
                </div>
            </div>
            </div>
        </div>
        @endforeach
    </div>
@endsection
