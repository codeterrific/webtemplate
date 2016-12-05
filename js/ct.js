/* Main JS file for Code Terrific*/
$(document).ready(function () {
	// Add mobile menu trigger
	var open = false;
	$("#mobile-menu-icon").click(function() {
		if(!open){
			$("#mobile-menu-icon").addClass('open');
			$('#main-menu').stop().fadeIn(100);
			open = true;
		}else{
			$("#mobile-menu-icon").removeClass('open');
			$('#main-menu').stop().fadeOut(100, function(){
				$('this').hide()
			});
			open = false;	
		}
	});
	
	// Add fancybox to all figures except marked for non-inclusion
	$('figure').each(function(){
		if(!$(this).hasClass('no-fancybox') && $(this).find('img')){
			$(this).css('cursor', 'pointer');
			$(this).on('click', function(){
				$.fancybox({
					href : $(this).find('img').attr('src'),
					title : $(this).find('figcaption').html()
				});
			});
		}
	});

	// Add scaling videos on resize. Courtesy of
	// https://css-tricks.com/NetMag/FluidWidthVideo/Article-FluidWidthVideo.php
    var $allVideos = $("iframe[src*='player.vimeo.com'], iframe[src*='www.youtube.com'], iframe[src^='//player.vimeo.com'], iframe[src^='http://player.vimeo.com'], iframe[src^='https://player.vimeo.com'], iframe[src^='//www.youtube.com'], iframe[src^='http://www.youtube.com'], iframe[src^='https://www.youtube.com'], object, embed"),
    $fluidEl = $("figure");

	$allVideos.each(function() {
	  $(this)
	    // jQuery .data does not work on object/embed elements
	    .attr('data-aspectRatio', this.height / this.width)
	    .removeAttr('height')
	    .removeAttr('width');
	});
	// Add onResize-listener
	$(window).resize(function() {
	  var newWidth = $fluidEl.width();
	  $allVideos.each(function() {
	    var $el = $(this);
	    $el
	        .width(newWidth)
	        .height(newWidth * $el.attr('data-aspectRatio'));
	  });
	}).resize();
});