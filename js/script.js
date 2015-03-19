var isSplash = true;

$(document).ready(function(){
	var MSIE8 = ($.browser.msie) && ($.browser.version == 8);
	$.fn.ajaxJSSwitch({
		topMargin:280,//mandatory property for decktop
		bottomMargin:270,//mandatory property for decktop
		topMarginMobileDevices:0,//mandatory property for mobile devices
		bottomMarginMobileDevices:0,//mandatory property for mobile devices
		bodyMinHeight:850,
		delaySubMenuHide:350,
		menuInit:function (classMenu, classSubMenu){
			classMenu.find(">li").each(function(){
				$(">a", this).append("<div class='openPart'></div>");
			})
		},
		buttonOver:function (item){
			if(MSIE8){
				item.css({"color":"#fff","background-position":"0px -26px"});
				$(".openPart", item).css({"visibility":"visible"});
			}else{
				item.stop(true).animate({"color":"#fff","background-position":"0px -26px"}, 200, "easeOutCubic");
				$(".openPart", item).stop(true).animate({"opacity":"1","top":"0px","height":"100%"}, 400, "easeOutCubic");
			}
		},
		buttonOut:function (item){
			if(MSIE8){
				item.css({"color":"#52696e","background-position":"0px -1px"});
				$(".openPart", item).css({"visibility":"hidden"});
			}else{
				item.stop(true).animate({"color":"#52696e","background-position":"0px -1px"}, 200, "easeOutCubic");
				$(".openPart", item).stop(true).animate({"opacity":"0","top":"-35px","height":"0"}, 400, "easeOutCubic");
			}
		},
		subMenuButtonOver:function (item){ 
		      item.stop().animate({"color":"#fff"}, 300, "easeOutCubic");
        },
		subMenuButtonOut:function (item){
		      item.stop().animate({"color":"#000"}, 300, "easeOutCubic");
        },
		subMenuShow:function(subMenu){
            if(MSIE8){
				subMenu.css({"display":"block"});
			}else{
				subMenu.stop(true).css({"display":"block"}).animate({"opacity":"1"}, 400, "easeOutCubic");
			}
        },
		subMenuHide:function(subMenu){
            if(MSIE8){
				subMenu.css({"display":"none"});
			}else{
				subMenu.stop(true).delay(200).animate({"opacity":"0"}, 200, "easeOutCubic", function(){
					$(this).css({"display":"none"})
				});
			}
        },
		pageInit:function (pages){
		},
		currPageAnimate:function (page){
              page.css({left:$(window).width()*-1-100}).stop(true).css({"top":"0"}).delay(100).animate({left:0}, 500, "easeInOutExpo");
              isSplash = false;
              $(window).trigger('resize');   
        },
		prevPageAnimate:function (page){
              page.stop(true).animate({"left":$(window).width()+20}, 700, "easeInSine");
              $("#wrapper>section>#content_part").css({"visibility":"visible"}).stop(true).animate({"top":0}, 800, "easeInOutCubic");
              $("#splash").stop(true).delay(0).animate({opacity:0, marginTop:"-1200px"}, 1100, "easeInOutCubic");
              $("#bgStretch").stop(true).delay(0).animate({marginTop:-50}, 1500, "easeInOutCubic");
              $(".dynamicContent > .content").stop(true).delay(0).animate({minHeight:400}, 600, "easeInOutCubic");
      
        },
		backToSplash:function (){
		      isSplash = true;
              $("#wrapper>section>#content_part").stop(true).delay(500).animate({"top":$(window).height()+20}, 700, "easeInOutCubic", function(){$(this).css({"visibility":"hidden"})});
              $("#splash").stop(true).delay(800).animate({opacity:1, marginTop:0}, 1100, "easeInOutCubic");
              $("#bgStretch").stop(true).delay(0).animate({marginTop:0}, 1500, "easeInOutCubic");
              $(".dynamicContent > .content").stop(true).delay(0).animate({minHeight:488}, 600, "easeInOutCubic");
              $(window).trigger('resize');        
        },
		pageLoadComplete:function (){
		},
	});
})
$(window).load(function(){	
	$("#webSiteLoader").delay(400).animate({opacity:0}, 600, "easeInCubic", function(){$("#webSiteLoader").remove()});


	$('#prev_arr, #next_arr, .btn_icon1')
	.sprites({
		method:'simple',
		duration:400,
		easing:'easeOutQuint',
		hover:true
	})


	var ind = 0;
	var len = $('.nav_item').length;
	 //start slider2
	    if ($(".slider2").length) {
	        $('.slider2').cycle({
	            fx: 'scrollHorz',
	            speed: 600,
	            timeout: 7000,
	            next: '.next',
	            prev: '.prev',                
	            easing: 'easeInOutExpo',
	            cleartypeNoBg: true ,
	            rev:0,
	            startingSlide: 0,
	            wrap: true,
	            before: function(currSlideElement, nextSlideElement) {
	            	$('.nav_item').each(function(index,elem){
	            		if (index!=(ind)){$(this).removeClass('active');} else {$(this).addClass('active');}
	            	});
	            	ind++;
	            	if(ind>(len-1)) {ind=0;}
		        }
	        })
	    };

	
	$('.social_icons > li').hoverSprite({onLoadWebSite:true}); 


//-----Window resize------------------------------------------------------------------------------------------
	$(window).resize(
        function(){
            resize_function();
        }
    ).trigger('resize');

	function resize_function(){
	    var h_cont = $('header').height();
	    var wh = $(window).height();
		m_top = ~~(wh-h_cont)/2-100;
            if(isSplash){
                /*$("header").stop(true).delay(300).animate({"top":m_top}, 350, "easeOutSine");*/
                /*$("footer").stop(true).animate({"height":88}, 350, "easeOutSine");*/
            }else{
                /*$("header").stop(true).animate({"top":0}, 500, "easeOutCubic");*/
            }          
    }
    $(document).resize(
        function(){}
    ).trigger('resize');


    $('#description li').each(function(){
        if($(this).index() != 0)
            $(this).fadeOut();
    })  

	//bgStretch ---------------------------------------------------------------------------------------------
            $('#bgStretch')
		.bgStretch({
			align:'rightTop',
			navigs:$('#bgNav').navigs({autoPlay:12000, prevBtn:$('#prev_arr'), nextBtn:$('#next_arr')})
		})


	


});