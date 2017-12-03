@extends('layouts.app')
@section('title', 'Video Tutorials | Learn PHP Today')
@section('content')
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
	            <!-- <img class="w-full h-48" src="{{ $videoObj->thumbnail_url }}" alt="Sunset in the mountains"> -->
              <a class="venobox" data-autoplay="true" data-vbtype="video" href="{{ $video_url }}"><img class="w-full h-48" src="{{ $videoObj->thumbnail_url }}" alt="Sunset in the mountains"></a>
	            <div class="px-3 py-4 flex">
	            <div>
	                <div class="text-black font-bold text-base mb-2">
                    <a class="text-purple no-underline" target="_BLANK" href="{{ $videoObj->author_url }}">{{ $videoObj->author_name }}</a>
                  </div>
	                <p class="text-grey-darkest text-sm">{{ $videoObj->title }}</p>
	            </div>
	            </div>
	        </div>
	        </div>
	    </div>
	    @endforeach
	</div>
	<div class="py-4 flex items-center justify-center custom-pagination"> {{ $videoData->links() }} </div>
@endsection
