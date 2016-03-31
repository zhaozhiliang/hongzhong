$(document).ready(function(e) {
	if($("#loopIndex").length>0){
		 var loopIndex = new Swiper('#loopIndex',{
			loop:true,
			paginationClickable: true, autoplay: 5000,
			speed: 800,
			calculateHeight: true,
			pagination:"#loopIndexDot"
  		 });
		 $("#loopIndex")[0].ontouchstart=function(e){
			e.stopPropagation();	 
		}	
	}
	if($.browser.msie&&($.browser.version == "6.0")&&!$.support.style){
	}else{
		if($(window).width()>850){
		 $(window).scroll(function(){
			if($(window).scrollTop()>=100){
				$(".header").addClass("on");	
			}else{
				$(".header").removeClass("on");	
			}
		});
		}
	   $(window).resize(function(){
		  if($(window).width()>850){
				$(window).scroll(function(){
					if($(window).scrollTop()>=100){
						$(".header").addClass("on");	
					}else{
						$(".header").removeClass("on");	
					}
				});
			} 
		});	
	}
	
	$("#showNav").click(function(){
		$("body").addClass("open");	
	});
	$("#showNav")[0].ontouchstart=function(){
		 $("body").addClass("open");	
	}
	$(document)[0].ontouchstart=function(event){
		var startX=event.touches[0].pageX;
		var startY=event.touches[0].pageY;
		$(document)[0].ontouchmove=function(event){
			var endX=event.touches[0].pageX;
			var endY=event.touches[0].pageY;
			var mY=endY-startY;
			mY=Math.abs(mY);
			if(endX > startX + 100 && mY<50){
				$("body").addClass("open");	
				return false;
			}else if(endX < startX - 100 && mY<50){
				$("body").removeClass("open");	
				return false;
			}
		}		
	}
	
	$("#cMessage").focus(function(){
		if($(this).html()=="请在此输入您的留言内容，我们收到留言后会尽快联系您"){
			$(this).html("");	
		}	
	});
	$("#cMessage").blur(function(){
		if($(this).html()==""){
	    $(this).html("请在此输入您的留言内容，我们收到留言后会尽快联系您");	
		}	
	});
	$("#cPerson").focus(function(){
		if($(this).val()=="联系人"){
			$(this).val("");	
		}	
	});
	$("#cPerson").blur(function(){
		if($(this).val()==""){
			$(this).val("联系人");	
		}	
	});
	$("#cTel").focus(function(){
		if($(this).val()=="联系电话"){
			$(this).val("");	
		}	
	});
	$("#cTel").blur(function(){
		if($(this).val()==""){
			$(this).val("联系电话");	
		}	
	});
	
});