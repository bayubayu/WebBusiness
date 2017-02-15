(function($) {
	$.fn.maximg = function() {
		this.each(function() {
			if (!$(this).attr("width")) {
				$(this).attr("width", $(this).width());
			}
		});
		jqObjects = this;
		function adjustImages(jqObjects) {
			if (jqObjects) {
				jqObjects.each(function() {
					//var parentWidth = $(this).parent().width();
					var parentWidth = $(".entry-content").width() - 120;
					var imageWidth = $(this).attr("width");
					$(this).css("width", "");
					if (imageWidth > parentWidth) {
						$(this).css("width", "100%");
					} else {
					}
				});
			}
		}
		$(window).resize(function() {
			adjustImages(jqObjects);
		});
		adjustImages(jqObjects);

		return this;
	}
	$(document).ready(function() {


		//$('#menu-main-menu').superfish();


		$('#main-menu').superfish();
		$('#main-menu').tinyNav({active: 'current-menu-item'});

		//$('.ie6 .sf-sub-indicator').css("width","auto");
		setTimeout(function() {
			aWidth = $('.ie6 .sf-with-ul').width() + 40;
			//alert(aWidth);
			$('.ie6 .sf-with-ul').parent().width(aWidth);
		}, 360);
		if ($.browser.msie && $.browser.version == "6.0") { //alert("Im the annoying IE6");
			$(".ie6 .entry-content img, .ie6 .wp-caption, .ie6 img.size-full, .ie6 #comments img, .ie6 #comments iframe").maximg();
		}
	});
}(jQuery));





















