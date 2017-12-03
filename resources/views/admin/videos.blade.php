@extends('layouts.app')
@section('title', 'Video Tutorials Admin | Learn PHP Today')
@section('content')
<div class="flex flex-wrap">
    @if(session('message'))
        <div class="bg-teal-lightest border-t-4 border-teal rounded-b text-teal-darkest px-4 py-3 shadow-md m-4" role="alert">
          <div class="flex">
            <div>
              <p class="text-sm">{{ session('message') }}</p>
            </div>
          </div>
        </div>
    @endif
	<div class="flex flex-wrap border-t-2 border-solid border-red">
        <table class="table mx-4 my-4" style="border-collapse: collapse;">
            <tr>
                <th class="px-4 py-4 border border-grey border-solid">Id</th>
                <th class="px-4 py-4 border border-grey border-solid">URL</th>
                <th class="px-4 py-4 border border-grey border-solid">Status</th>
                <th class="px-4 py-4 border border-grey border-solid">Action</th>
            </tr>
            @if($videoData->count() > 0)
                @foreach($videoData as $video)
                    <tr>
                        <td class="px-1 py-1 border border-grey border-solid">{{ $video->id }}</td>
                        <td class="px-1 py-1 border border-grey border-solid">{{ $video->url }}</td>
                        <td class="px-1 py-1 border border-grey border-solid">{{ $video->status }}</td>
                        <td class="px-1 py-1 border border-grey border-solid"><a href="{{ URL::to('admin/videos/delete/' . $video->id) }}">Delete</a></td>
                    </tr>
                @endforeach
            @endif
        </table>
        <div class="py-4 flex items-center justify-center custom-pagination"> {{ $videoData->links() }} </div>
    </div>
</div>
@endsection
