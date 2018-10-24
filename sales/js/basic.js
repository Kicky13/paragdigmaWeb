// var window_width=$(window).width();
// var window_height=$(window).height();
 
$(document).ready(function(){
	create_fix();
	$('.btn_menu').click(function(e){
		if($('body').hasClass('open_menu')){
			$('body').removeClass('open_menu');
		}else{
			$('.search').parents().removeClass('opens');
			$('body').addClass('open_menu');
		}
	});
	// setTimeout(function(){
	// 	wrapFadeIn();
	// 	setInterval(function(){
	// 		if(!pauseInt){
	// 			secInt+=1;
	// 			var persentInt = parseInt(((secInt/second)*100));
	// 			$('.progress-bar').css('width',persentInt+'%');
	// 			if(persentInt>=100){
	// 				wrapFadeOut();
	// 			}
	// 		}
	// 	},1000);
	// },500);
	// $('.pause').click(function(){
	// 	if(!pauseInt){
	// 		$(this).html('<i class="fa fa-play"></i>');
	// 		pauseInt=true;
	// 	}else{
	// 		$(this).html('<i class="fa fa-pause"></i>');
	// 		pauseInt=false;
	// 	}
	// });
}) 

//TUNGGU PERUBAHAN PADA UKURAN WINDOW
// var view_updater;
// $(window).resize(function(){
	// clearTimeout(view_updater);
	// view_updater=setTimeout("view_changed()",150)
// })

//TRIGGER EVENT KETIKA UKURAN WINDOW BERUBAH
function view_changed(){
	
}
//CREATE FIX UNTUK BROWSER YANG TIDAK SUPPORT CSS GENERATED CONTENT
function create_fix(){
	if(!Modernizr.generatedcontent){
		$(".add_fix").append('<span class="clearfix">&nbsp;</span>')
	}
}
// var url_redirect = [
		// "plant_gresik/overview",
		// "plant_padang/overview",
		// "plant_rembang/overview",
	// ]; 
// function wrapFadeIn(){
	// $("#content").addClass("opacity-on");
// }
// function wrapFadeOut(){
	// $("#content").removeClass("opacity-on");
	// $("#content").addClass("opacity-off");
	// var indexUrl = url_redirect.indexOf(current_url);
	// setTimeout(function(){
	// 	if(indexUrl<url_redirect.length-1){
	// 		document.location.href = base_url+url_redirect[indexUrl+1];
	// 	}else{
	// 		document.location.href = base_url+url_redirect[0];
	// 	}
	// },1000);
// }
$('.control').on('mousedown', function() {
  $(this).toggleClass('pause play');
});

$(document).on('keyup', function(e) {
  if (e.which == 32) {
    $('.control').toggleClass('pause play');
  }
});
/*---------------------------------- end of file ----------------------------------*/