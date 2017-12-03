@extends('layouts.app')
@section('title', 'Tweet Snippets | Learn PHP Today')
@section('content')
<div class="flex flex-wrap">
    <div class="flex flex-wrap border-t-2 border-solid border-red w-full">
        @if(session('message'))
            <div class="bg-teal-lightest border-t-4 border-teal rounded-b text-teal-darkest px-4 py-3 shadow-md m-4" role="alert">
              <div class="flex">
                <div>
                  <p class="text-sm">{{ session('message') }}</p>
                </div>
              </div>
            </div>
        @endif
        <table class="table mx-4 my-4" style="border-collapse: collapse;">
            <tr>
                <th class="px-4 py-4 border border-grey border-solid">Id</th>
                <th class="px-4 py-4 border border-grey border-solid">URL</th>
                <th class="px-4 py-4 border border-grey border-solid">Status</th>
                <th class="px-4 py-4 border border-grey border-solid">Action</th>
            </tr>
            @if($tweetData->count() > 0)
                @foreach($tweetData as $tweet)
                    <tr>
                        <td class="px-1 py-1 border border-grey border-solid">{{ $tweet->id }}</td>
                        <td class="px-1 py-1 border border-grey border-solid">{{ $tweet->url }}</td>
                        <td class="px-1 py-1 border border-grey border-solid">{{ $tweet->status }}</td>
                        <td class="px-1 py-1 border border-grey border-solid"><a href="{{ URL::to('admin/tweets/delete/' . $tweet->id) }}">Delete</a></td>
                    </tr>
                @endforeach
            @endif
        </table>
        <div class="py-4 flex items-center justify-center custom-pagination"> {{ $tweetData->links() }} </div>
    </div>
</div>
@endsection
