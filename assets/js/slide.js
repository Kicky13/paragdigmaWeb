var secondxx = 999999999;
var secInt	= 0;
var pauseInt = false;
function wrapFadeIn(){
	$(".loading_overlay").addClass("opacity-on");
}
function wrapFadeOut(){
	$(".loading_overlay").removeClass("opacity-on");
	$(".loading_overlay").addClass("opacity-off");
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
	$(".loading_overlay").removeClass("opacity-on");
	$(".loading_overlay").addClass("opacity-off");
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
	$('#page_title').html("<span style='float:left;'>"+title_page[indexUrl]+"</span>");
	setTimeout(function(){
		wrapFadeIn();
		setInterval(function(){
			if(!pauseInt){
				secInt+=1;
				var persentInt = parseInt(((secInt/secondxx)*100));
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

	var sidenav = new Sidenav({
		content: document.getElementById("content_wrap"),
		sidenav: document.getElementById("sidenav"),
		backdrop: document.getElementById("backdrop")
	});
	$('#menu-toggle').click(function(){
		if($(this).hasClass("menu-open")){
			$(this).removeClass("menu-open");
			$('#backdrop').click();
		}else{
			$(this).addClass("menu-open");
				sidenav.open();
		}
	});
	$('#backdrop').click(function(){
		$('#menu-toggle').removeClass("menu-open");
	});

	if (performance.navigation.type == 1) {
	    sessionStorage.removeItem("saveParam");
	}
	var getSaveParam = sessionStorage.getItem("saveParam");
	if(getSaveParam){
		var saveData = JSON.parse(getSaveParam);
		$("#month").val(saveData.bulan);
		$("#year").val(saveData.tahun);
		$("#opco").val(saveData.opco);
	}else{
		$("#month").val((new Date()).getMonth()+1);
		$("#year").val((new Date()).getFullYear());
		$("#opco").val("7000");
	}

	var cmpny = window.location.href,
	parts = cmpny.split("/"),
    last_part = parts[parts.length-1];
    if(last_part==2000){
    	last_part="";
    }
	$(".findchart").click(function(){
		document.location.href = base_url+"sales_dashboard/trend/revenue/"+last_part;
	});

});

function changepage(url_redirect, elm){
	$(".loading_overlay").removeClass("opacity-on");
	$(".loading_overlay").addClass("opacity-off");
	document.location.href = base_url+url_redirect;
}

function openInNewTab(url_redirect, elm) {
  if(elm.parentElement.className !="active"){
	  var win = window.open(url_redirect, '_blank');
	  win.focus();
  }
}

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