
var second = 999999999999999999999999999999999;
var secInt	= 0;
var pauseInt = false;
function wrapFadeIn(){
	$("#wrapper").addClass("opacity-on");
}
function wrapFadeOut(){
	$("#wrapper").removeClass("opacity-on");
	$("#wrapper").addClass("opacity-off");
	var indexUrl = url_redirect.indexOf(current_url);
	setTimeout(function(){
		if(indexUrl<url_redirect.length-1){
			document.location.href = base_url+url_redirect[indexUrl+1];
		}else{
			document.location.href = base_url+url_redirect[0];
		}
	},1000);
}
function wrapFadePrev(){
	$("#wrapper").removeClass("opacity-on");
	$("#wrapper").addClass("opacity-off");
	var indexUrl = url_redirect.indexOf(current_url);
	setTimeout(function(){
		if(indexUrl>0){
			document.location.href = base_url+url_redirect[indexUrl-1];
		}else{
			document.location.href = base_url+url_redirect[url_redirect.length-1];
		}
	},1000);
}
$(document).ready(function(){
	var indexUrl = url_redirect.indexOf(current_url);
	$('#page_title').html("Sales <span>"+title_page[indexUrl]+"</span>");
	setTimeout(function(){
		wrapFadeIn();
		setInterval(function(){
			if(!pauseInt){
				secInt+=1;
				var persentInt = parseInt(((secInt/second)*100));                                                                                          
				$('.loading').css('width',persentInt+'%');
				if(persentInt>=100){
					wrapFadeOut();
				}
			}
		},1000);
	},500);
	$('.control').on('mousedown', function() {
		$(this).toggleClass('pause play');
		if(!pauseInt){
			pauseInt=true;
		}else{
			pauseInt=false;
		}
	});
	$('.next').on('mousedown', function() {
		wrapFadeOut()
	});
	$('.prev').on('mousedown', function() {
		wrapFadePrev()
	});
});

$(document).on('keyup', function(e) {
	e.preventDefault();
  if (e.which == 32) {
    $('.control').toggleClass('pause play');
	if(!pauseInt){
		pauseInt=true;
	}else{
		pauseInt=false;
	}
  }
});