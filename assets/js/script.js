/* jQuery.noConflict(); */
jQuery(document).ready(function($){
	/*---------------------------------------------------
	Tooltip
	----------------------------------------------------*/	
	$('[rel="tooltip"]').tooltip();

	/*---------------------------------------------------
	Remove li scpace(display: inline)
	----------------------------------------------------*/	
	$('ul').contents().filter(function() { return this.nodeType === 3; }).remove();
	
	/*---------------------------------------------------
	To top 
	----------------------------------------------------*/
	if ($(window).scrollTop() > $(window).height()) {$('.back-to-top').fadeIn();}else{$('.back-to-top').fadeOut();}				
	$(window).scroll(function(){if ($(this).scrollTop() > $(this).height()) {$('.back-to-top').fadeIn();}else{$('.back-to-top').fadeOut();}});				
	$( window ).resize(function(){if ($(this).scrollTop() > $(this).height()) {$('.back-to-top').fadeIn();}else{$('.back-to-top').fadeOut(); 				}				});				
	$('.back-to-top').click(function() {$('body,html').animate({scrollTop:0},300);return false;});
	

	
	
	// Initiate the wowjs animation library
	new WOW().init();
	
	
	/*------------------
		Background Set
	--------------------*/
	$('.set-bg').each(function() {
		var bg = $(this).data('setbg');
		/* alert(bg); */
		$(this).css('background-image', 'url(' + bg + ')');
	});

	/*------------------
		Hero Slider
	--------------------*/
	$('.hero-slider').owlCarousel({
		nav: true,
		dots: false,
		loop: true,
		navText: ['<i class="fa fa-angle-left"></i>','<i class="fa fa-angle-right"></i>'],
		autoplay: true,
		items: 1,
		animateOut: 'fadeOut',
    	animateIn: 'fadeIn',
	});
	//console.log('aaaaaaaaaaaa');
	
	  // Clients carousel (uses the Owl Carousel library)
	  $(".clients-carousel").owlCarousel({
		autoplay: true,
		dots: true,
		loop: true,
		responsive: {
			0:{
				items: 1 
			},
			768:{
				items: 4 
			},
			900:{
				items: 6 
			}
		}
	  });
		
	$(window).on('load', function() {
		/*------------------
			Preloder
		--------------------*/
		$(".loader").fadeOut();
		$("#preloder").delay(400).fadeOut("slow");

	});	
	/*---------------------------------------------------
	Fixed Navbar
	----------------------------------------------------*/
 	var navHeight = $('header').height()+20;
	
		if($(window).scrollTop() > navHeight){
			$('body').css('margin-top',navHeight);
			$('.navbar').addClass('fixed');
		}
		else{
			$('body').css('margin-top',0);
			$('.navbar').removeClass('fixed');
		}
		
	$(window).scroll(function(){
		
		if($(window).scrollTop() > navHeight){
			$('body').css('margin-top',navHeight);
			$('.navbar').addClass('fixed');
		}
		else{
			$('body').css('margin-top',0);
			$('.navbar').removeClass('fixed');
		}
	});
	 
	
});