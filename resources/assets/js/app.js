
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

Vue.component('example', require('./components/Example.vue'));

const app = new Vue({
    el: '#app'
});

$("#toggleMenu").on('click', function(){
  $("#menu-container").slideToggle();
});

$(document).ready(function(){
  $('.venobox').venobox();

	$('[data-toggle="tabajax"]').click(function(e) {
		$(".tab-pane").hide();
		$("#tabs-container li").removeClass('active');
		$(this).parent().addClass('active');
		$($(this).data('target')).show();
	});

  if($(".tweetText").length) {
    $(".tweetText").each(function(){
      var tweetText = $(this).text();
      var linkable_content = tweetText.replace(/(https?:\/\/[^ ;|\\*'"!,()<>]+\/?)/g,'<a href="$1">$1</a>');
      $(this).html(twemoji.parse(linkable_content));
    });
  }
});


const regex = /http(?:s)?:\/\/(?:www.)?twitter\.com\/([a-zA-Z0-9_]+)(\/status)\/([0-9]+)/g;
$(document).on('click', '#tweetSubmit', function () {
  var enteredUrl = $("#tweet_url").val();
  if(enteredUrl.match(regex) && enteredUrl != '') {
    $("#errorMessageContainer").addClass('hidden');
    return true;
  }
  $("#errorMessageContainer").removeClass('hidden');
  return false;
});


let pattern = /^(?:https?:\/\/)?(?:www\.)?(?:youtu\.be\/|youtube\.com\/(?:embed\/|v\/|watch\?v=|watch\?.+&v=))((\w|-){11})(?:\S+)?$/;
$(document).on('click', '#youTubeSubmit', function () {
  var url = $("#youtube_url").val();
  let matches = url.match(pattern);
  if(matches){
    $("#youTubeErrorMessageContainer").addClass('hidden');
    return true;
  }
  $("#youTubeErrorMessageContainer").removeClass('hidden');
  return false;
});
