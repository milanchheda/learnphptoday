@extends('layouts.app')

@section('content')
<div class="flex flex-wrap pt-4">
                @if(session('message'))
                    <div class="bg-teal-lightest border-t-4 border-teal rounded-b text-teal-darkest px-4 py-3 shadow-md mx-4" role="alert">
                      <div class="flex">
                        <div>
                          <p class="font-bold">Success!</p>
                          <p class="text-sm">{{ session('message') }}</p>
                        </div>
                      </div>
                    </div>
                @endif
                @if(session('error'))
                    <div id="errorMessageContainer" role="alert" class="mx-4">
                      <div class="bg-red text-white font-bold rounded-t px-4 py-2">
                        Error
                      </div>
                      <div class="border border-t-0 border-red-light rounded-b bg-red-lightest px-4 py-3 text-red-dark">
                        <p>{{ session('error') }}</p>
                      </div>
                    </div>
                @endif

                <div class="w-full">
                    <h3 class="text-red-dark ml-4 mr-4 my-4 clearfix">Dashboard</h3>
                    <ul class="list-reset flex border-b pl-4" id="tabs-container">
                        <li class="-mb-px mr-1 active">
                            <a href="#" data-target="#tweets" class="bg-white inline-block border-l border-t border-r rounded rounded-t py-2 px-4 text-blue-dark" id="contacts_tab" data-toggle="tabajax" rel="tooltip"> Add Tweets </a>
                        </li>
                        <li class="mr-1">
                            <a href="#" data-target="#youtube" class="bg-white inline-block py-2 px-4 text-blue hover:text-blue-darker" id="friends_list_tab" data-toggle="tabajax" rel="tooltip"> Add YouTube Videos</a>
                        </li>
                        <li class="mr-1">
                            <a href="#" data-target="#fetchTweetsAndVideos" class="bg-white inline-block py-2 px-4 text-blue hover:text-blue-darker" id="friends_list_tab" data-toggle="tabajax" rel="tooltip">Fetch Tweets And Videos</a>
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
                        <div class="tab-pane hidden" id="youtube">
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
                        <div class="tab-pane hidden" id="fetchTweetsAndVideos">
                            <form class="px-8 pt-6 pb-8 mb-4" method="post" action="/admin/post-url">
                                {!! csrf_field() !!}
                                <input type="hidden" name="url_type" value="fetchTweetsAndVideos" />
                                <div class="mb-4">
                                    <button class="bg-blue hover:bg-blue-dark text-white font-bold py-2 px-4 rounded" name="fetchTweets" value="fetchTweets">Fetch Tweets</button>
                                    <button class="bg-blue hover:bg-blue-dark text-white font-bold py-2 px-4 rounded" name="fetchVideos" value="fetchVideos">Fetch Videos</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
@endsection
