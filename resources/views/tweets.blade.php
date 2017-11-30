@extends('layouts.app')
@section('title', 'Tweet Snippets Page')
@section('content')
	<div class="flex flex-wrap border-t-2 border-solid border-red">
	    @foreach($tweetData as $tweet)
        <?php
            $tweetObj = json_decode($tweet['data']);
            $urlToOpen = (isset($tweetObj->video_url) && $tweetObj->video_url != '') ? $tweetObj->video_url : $tweetObj->image_url;
            $data_vbtype = (isset($tweetObj->video_url) && $tweetObj->video_url != '') ? "data-vbtype=iframe" : '';
        ?>
        <div class="w-full sm:w-1/3 md:w-1/4 pl-4 pr-4 pt-4">
            <div class="bg-white shadow-lg mt-4">
                <div class="max-w-sm overflow-hidden shadow-lg" style="min-height: 335px;">

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
	<div class="py-4 flex items-center justify-center custom-pagination"> {{ $tweetData->links() }} </div>
@endsection
