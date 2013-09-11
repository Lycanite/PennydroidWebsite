(function($) { $.fn.gallery = function(settings) {
	
	// Default Settings:
	var defaultSettings = {			
		controlPrevStyle: 		'controlPrev',
		controlPrevText: 		'Previous',
		controlNextStyle: 		'controlNext',
		controlNextText: 		'Next',
		controlEnabled:			true,
		controlStart:			'',
		controlFinish:			'',	
		controlFading:			true,	
		scrollVertical:			false,
		scrollTime: 			600,
		scrollDelay:			6000,
		scrollAuto:				true,
		scrollAutoLoop:			true,
		jumperEnabled: 			true,
		jumperStyle: 			'jumper',
		jumperNumbers:			true,
		jumperFirstEnabled:		false,
		jumperFirstStyle: 		'firstBtn',
		jumperFirstText: 		'First',
		jumperLastEnabled:		false,
		jumperLastStyle: 		'lastBtn',	
		jumperLastText: 		'Last'
	};
	
	// Apply Settings:
	var settings = $.extend(defaultSettings, settings);  
			
	this.each(function() {
		var gallery = $(this);
		var s = $("li", gallery).length;
		var w = $("li", gallery).width();
		var h = $("li", gallery).height();
		var clickable = true;
		var ts = s-1;
		var t = 0;
		$("ul", gallery).css('width',s*w);
		
		// Scrolling Orientation:
		if(!settings.scrollVertical) $("li", gallery).css('float','left');
		
		// Auto Scrolling - Loop:
		if(settings.scrollAutoLoop){
			$("ul", gallery).prepend($("ul li:last-child", gallery).clone().css("margin-left","-"+ w +"px"));
			$("ul", gallery).append($("ul li:nth-child(2)", gallery).clone());
			$("ul", gallery).css('width', (s + 1) * w);
		};
		
		// Basic Controls:
		if(settings.controlEnabled){
			var html = settings.controlStart;				
			
			// Jumpers:
			if(settings.jumperEnabled) {
				html += '<ol id="'+ settings.jumperStyle +'"></ol>';
			}
			
			// Basic:
			else {
				if(settings.jumperFirstEnabled) html += '<span id="'+ settings.jumperFirstStyle +'"><a href=\"javascript:void(0);\">'+ settings.jumperFirstText +'</a></span>';
				html += ' <span id="'+ settings.controlPrevStyle +'"><a href=\"javascript:void(0);\">'+ settings.controlPrevText +'</a></span>';
				html += ' <span id="'+ settings.controlNextStyle +'"><a href=\"javascript:void(0);\">'+ settings.controlNextText +'</a></span>';
				if(settings.jumperLastEnabled) html += ' <span id="'+ settings.jumperLastStyle +'"><a href=\"javascript:void(0);\">'+ settings.jumperLastText +'</a></span>';				
			};
			
			html += settings.controlFinish;						
			$(gallery).after(html);										
		};
		
		// Jumper Controls:
		if(settings.jumperEnabled){
			var jumperNumber = "";
			for(var i = 0; i < s; i++){
				if(settings.jumperNumbers) {
					jumperNumber = i + 1;
				}
				$(document.createElement("li"))
					.attr('id', settings.jumperStyle + (i+1))
					.html('<a rel='+ i +' href=\"javascript:void(0);\">'+ jumperNumber +'</a>')
					.appendTo($("#"+ settings.jumperStyle))
					.click(function() {							
						animate($("a", $(this)).attr('rel'), true);
					}
				);
			};
		}
		
		// Basic Next/Previous Controls:
		else {
			$("a","#"+settings.controlNextStyle).click(function(){		
				animate("next",true);
			});
			$("a","#"+settings.controlPrevStyle).click(function(){		
				animate("prev",true);				
			});	
			$("a","#"+settings.jumperFirstStyle).click(function(){		
				animate("first",true);
			});				
			$("a","#"+settings.jumperLastStyle).click(function(){		
				animate("last",true);				
			});				
		};
		
		// Set Current Image:
		function setCurrent(i){
			i = parseInt(i)+1;
			$("li", "#" + settings.jumperStyle).removeClass("current");
			$("li#" + settings.jumperStyle + i).addClass("current");
		};
		
		// Adjust Layout:
		function adjust(){
			if(t>ts) t=0;		
			if(t<0) t=ts;	
			if(!settings.scrollVertical) {
				$("ul", gallery).css("margin-left", (t*w*-1));
			}
			else {
				$("ul", gallery).css("margin-left", (t*h*-1));
			}
			clickable = true;
			if(settings.jumperEnabled) setCurrent(t);
		};
		
		// Animations:
		function animate(dir, clicked){
			if (clickable){
				clickable = false;
				var ot = t;				
				switch(dir){
					case "next":
						t = (ot>=ts) ? (settings.scrollAutoLoop ? t+1 : ts) : t+1;						
						break; 
					case "prev":
						t = (t<=0) ? (settings.scrollAutoLoop ? t-1 : 0) : t-1;
						break; 
					case "first":
						t = 0;
						break; 
					case "last":
						t = ts;
						break; 
					default:
						t = dir;
						break; 
				};	
				var diff = Math.abs(ot-t);
				var scrollTime = diff*settings.scrollTime;						
				if(!settings.scrollVertical) {
					p = (t*w*-1);
					$("ul",gallery).animate(
						{ marginLeft: p }, 
						{ queue:false, duration:scrollTime, complete:adjust }
					);				
				} else {
					p = (t*h*-1);
					$("ul",gallery).animate(
						{ marginTop: p }, 
						{ queue:false, duration:scrollTime, complete:adjust }
					);					
				};
				
				if(!settings.scrollAutoLoop && settings.controlFading){					
					if(t==ts){
						$("a","#"+settings.controlNextStyle).hide();
						$("a","#"+settings.jumperLastStyle).hide();
					} else {
						$("a","#"+settings.controlNextStyle).show();
						$("a","#"+settings.jumperLastStyle).show();					
					};
					if(t==0){
						$("a","#"+settings.controlPrevStyle).hide();
						$("a","#"+settings.jumperFirstStyle).hide();
					} else {
						$("a","#"+settings.controlPrevStyle).show();
						$("a","#"+settings.jumperFirstStyle).show();
					};					
				};				
				
				if(clicked) clearTimeout(timeout);
				if(settings.scrollAuto && dir=="next" && !clicked){;
					timeout = setTimeout(function(){
						animate("next",false);
					},diff*settings.scrollTime+settings.scrollDelay);
				};
		
			};
			
		};
		
		// Auto Scrolling:
		var timeout;
		if(settings.scrollAuto){;
			timeout = setTimeout(function(){
				animate("next", false);
			}, settings.scrollDelay);
		};
		
		// Jumper Control Init:
		if(settings.jumperEnabled) setCurrent(0);
		
		// Basic Next/Prev Controls Fading:
		if(!settings.scrollAutoLoop && settings.controlFading){					
			$("a", "#"+settings.controlPrevStyle).hide();
			$("a", "#"+settings.jumperFirstStyle).hide();				
		};
	});
}; })(jQuery);