@extends('layouts.app')
@section('title', 'Homepage')
@section('content')
    <div class="bg-pink-lightest border-t-2 border-solid border-red">
    <div class="text-red-dark py-4 ml-4 mr-4 clearfix">
        <h3 class="float-left">Tweet Snippets</h3>
        <div class="float-right mr-2"><a href='tweet-snippets' class="text-red-dark text-base">View all</a></div>
    </div>
    <div class="flex flex-wrap pb-8">
        @foreach($tweetData as $tweet)
        <?php
            $tweetObj = json_decode($tweet['data']);
            $urlToOpen = (isset($tweetObj->video_url) && $tweetObj->video_url != '') ? $tweetObj->video_url : $tweetObj->image_url;
            $data_vbtype = (isset($tweetObj->video_url) && $tweetObj->video_url != '') ? "data-vbtype=iframe" : '';
        ?>
        <div class="w-full sm:w-1/3 md:w-1/4 pl-4 pr-4 pt-4">
            <div class="bg-white shadow-lg">
                <div class="max-w-sm overflow-hidden shadow-lg" style="min-height: 350px;">

                <div class="w-full h-48 flex overflow-hidden">

                <a class="venobox h-64 w-full" {{ $data_vbtype }} href="{{ $urlToOpen }}" style="background-image: url({{$tweetObj->image_url}}); background-size: cover;"></a>
                </div>

                <div class="px-3 py-4 flex">
                    <div class="w-16 h-16 overflow-hidden mr-2">
                        <img class="block h-12 w-90" src="{{ $tweetObj->profile_image }}" alt="{{ $tweetObj->screen_name }}">
                    </div>
                <div class="w-full">
                    <div class="text-black font-bold text-base mb-1">

                    <a class="text-red no-underline" target="_BLANK" href="https://twitter.com/{{ $tweetObj->screen_name }}">{{ $tweetObj->name }}</a>
                    </div>
                    <p class="text-sm leading-normal tweetText">
                    {{ $tweetObj->text }}
                    </p>
                </div>
                </div>
            </div>
            </div>
        </div>
        @endforeach
    </div>
    </div>
    <div class="bg-red-lightest border-t-2 border-solid border-red pb-8">
        <div class="text-red-dark py-4 ml-4 mr-4 clearfix">
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
            <div class="w-full sm:w-1/3 md:w-1/4 pl-4 pr-4 pt-4">
                <div class="bg-white shadow-lg mt-4">
                    <div class="max-w-sm overflow-hidden shadow-lg" style="min-height: 300px;">

                    <a class="venobox" data-autoplay="true" data-vbtype="video" href="{{ $video_url }}"><img class="w-full h-48" src="{{ $videoObj->thumbnail_url }}"></a>

                    <div class="px-3 py-4 flex">
                    <div>
                        <div class="text-black font-bold text-base mb-2">
                            <a class="text-red no-underline" target="_BLANK" href="{{ $videoObj->author_url }}">{{ $videoObj->author_name }}</a>
                        </div>
                        <p class="text-sm">{{ $videoObj->title }}</p>
                    </div>
                    </div>
                </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
@endsection
