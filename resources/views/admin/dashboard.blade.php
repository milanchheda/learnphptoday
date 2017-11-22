@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="text-red-dark ml-4 mr-4 my-4 clearfix">
                    <h3 class="float-left">Dashboard</h3>
                </div>
                @if(session('message'))
                    <div class="form-group">
                        <div class="alert alert-success message-container">{{ session('message') }}</div>
                    </div>
                @endif
                <div class="panel-body">
                    <ul class="list-reset flex border-b" id="tabs-container">
                        <li class="-mb-px mr-1">
                            <a href="#" data-target="#tweets" class="bg-white inline-block border-l border-t border-r rounded rounded-t py-2 px-4 text-blue-dark" id="contacts_tab" data-toggle="tabajax" rel="tooltip"> Add Tweets </a>
                        </li>
                        <li class="mr-1">
                            <a href="#" data-target="#youtube" class="bg-white inline-block py-2 px-4 text-blue hover:text-blue-darker" id="friends_list_tab" data-toggle="tabajax" rel="tooltip"> Add YouTube Videos</a>
                        </li>
                    </ul>
                    <div class="tab-content">
                        <div class="tab-pane" id="tweets">
                            <form class="px-8 pt-6 pb-8 mb-4" method="post" action="/admin/post-url">
                                {!! csrf_field() !!}
                                <input type="hidden" name="url_type" value="twitter" />
                                <div class="mb-4">
                                    <label for="url" class="block text-grey-darker text-sm font-bold mb-2">Tweet URL:</label>
                                    <input type="url" class="shadow appearance-none border rounded w-full py-2 px-3 text-grey-darker" id="tweet_url" name="url">
                                </div>
                                <div class="mb-6">
                                    <button type="submit" class="bg-blue hover:bg-blue-dark text-white font-bold py-2 px-4 rounded" id="tweetSubmit" data-loading-text="<i class='fa fa-spinner fa-spin '></i> Submitting...">Submit</button>
                                </div>
                                <div id="errorMessageContainer" class="hidden" role="alert">
                                  <div class="bg-red text-white font-bold rounded-t px-4 py-2">
                                    Error
                                  </div>
                                  <div class="border border-t-0 border-red-light rounded-b bg-red-lightest px-4 py-3 text-red-dark">
                                    <p>Invalid URL. Please check and try again.</p>
                                  </div>
                                </div>
                            </form>
                        </div>
                        <div class="tab-pane" id="youtube">
                            <form class="px-8 pt-6 pb-8 mb-4" method="post" action="/admin/post-url">
                                {!! csrf_field() !!}
                                <input type="hidden" name="url_type" value="youtube" />
                                <div class="mb-4">
                                    <label for="url" class="block text-grey-darker text-sm font-bold mb-2">YouTube ID:</label>
                                    <input type="url" class="shadow appearance-none border rounded w-full py-2 px-3 text-grey-darker" id="youtube_url" name="url">
                                </div>
                                <div class="mb-6">
                                    <button type="submit" class="bg-blue hover:bg-blue-dark text-white font-bold py-2 px-4 rounded" id="youTubeSubmit" data-loading-text="<i class='fa fa-spinner fa-spin '></i> Submitting...">Submit</button>
                                </div>
                                <div id="youTubeErrorMessageContainer" class="hidden" role="alert">
                                  <div class="bg-red text-white font-bold rounded-t px-4 py-2">
                                    Error
                                  </div>
                                  <div class="border border-t-0 border-red-light rounded-b bg-red-lightest px-4 py-3 text-red-dark">
                                    <p>Invalid URL. Please check and try again.</p>
                                  </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
