(function(){
	
	
	$(window).scroll(function(){
		if($(window).width() >= 922){
    var aTop = $('.topHeader').height();
    if($(this).scrollTop()>=aTop){
        $('.nav-fix').fadeIn();
    }else{$('.nav-fix').fadeOut();}
		}
  });
	 
	
	
   $('#clbtn').on('click',function(e){
	e.preventDefault();
	$('#overl').fadeToggle();
	})
	
	
	$('.ct').on('click',function(e){
	e.preventDefault();
	$('#overl').fadeToggle();
	$('#vid').get(0).play();
	})
	
	
	
	
	 $('#clbtn2').on('click',function(e){
	e.preventDefault();
	$('#over2').fadeToggle();
	})
	
	
	$('.reserv').on('click',function(e){
	e.preventDefault();
	$('#over2').fadeToggle();
	})
	
	
	  
	  
	$( "#nav-toggle" ).click(function(e) {
	e.preventDefault();
  $( this ).toggleClass( "active" );
  $('.nav-fix').slideToggle();
	
	});
	
	
	
	$('.subm').on('click',function(){
		$('.submenu').slideToggle();
		})
	

  
$(".sl").owlCarousel({
      //items : 3, //10 items above 1000px browser width
     // Show next and prev buttons
	 autoPlay: true,
      slideSpeed : 500,
      paginationSpeed : 2000,
      singleItem:true,
	  navigation:false,
	  pagination:true,
	  //transitionStyle:"fade",
	   mouseDrag : false,
	  //navigationText: ["<img src='images/sarrow-left.png'>","<img src='images/sarrow-right.png'>"]
	 
  }); 
  
  
  $(".sl2").owlCarousel({
      //items : 3, //10 items above 1000px browser width
     // Show next and prev buttons
	 autoPlay: true,
      slideSpeed : 500,
      paginationSpeed : 2000,
      singleItem:true,
	  navigation:true,
	  pagination:true,
	  transitionStyle:"fade",
	   mouseDrag : false,
	  //navigationText: ["<img src='images/sarrow-left.png'>","<img src='images/sarrow-right.png'>"]
	 
  }); 
  
  
  
  
  
 $('.navigation .fa-sort-down').on('click',function(){
	    $(this).parent().find('.sub-cat').slideToggle();
	 })
	  
	  
	 //$('.tourdes').height($('.tourImg').outerHeight());
	 //$('.tourdes2').height($('.tourImg').outerHeight());
	 
	 
	 
	 
	 $('.top').on('click',function(){
		    $('body,html').animate({scrollTop: 0});
		 })
		 
		 
		 // villas page image pop 
$('.popup-link').magnificPopup({
  type: 'image',
  zoom: {
    enabled: true, // By default it's false, so don't forget to enable it

    duration: 500, // duration of the effect, in milliseconds
    easing: 'ease-in-out', // CSS transition easing function
 },
 gallery: {
			enabled: true,
			navigateByImgClick: true,
			preload: [0,1] // Will preload 0 - before current, and 1 after the current image
		},

  // other options
});
  
  
new WOW().init();

	$(".gallery-slide").owlCarousel({
      //items : 3, //10 items above 1000px browser width
     // Show next and prev buttons
			//autoPlay:2000,
			navigation:true,
	        pagination:false,
			 items : 4, //10 items above 1000px browser width
      itemsDesktop : [1276,3], //5 items between 1000px and 901px
      itemsDesktopSmall : [700,3], // 3 items betweem 900px and 601px
	  itemsMobile : [582,1],
	  navigationText: ["<img src='images/nav-left.jpg'>","<img src='images/nav-right.jpg'>"]
	  
	
	 
  });
	
		
		
	
	 	
})();