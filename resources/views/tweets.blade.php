@extends('layouts.app')

@section('content')
	<div class="flex flex-wrap">
	    @foreach($tweetData as $tweet)
        <?php
            $tweetObj = json_decode($tweet['data']);
        ?>
        <div class="w-full sm:w-1/3 md:w-1/4 pl-4 pr-4">
            <div class="bg-white shadow-lg mt-4">
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
                      <a class="text-red no-underline" target="_BLANK" href="https://twitter.com/{{ $tweetObj->screen_name }}"> {{ $tweetObj->name }}</a>
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
	<div class="flex items-center justify-center custom-pagination"> {{ $tweetData->links() }} </div>
@endsection
