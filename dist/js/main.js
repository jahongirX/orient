$(document).ready(function(){
   	
   
        
    /**CALC**/


    $('#calculating-form input[type=radio]').each(function(e){

        $(this).on('change',function(e){
            e.preventDefault();
            var stepId = $(this).data('step');
            var value = $(this).val();
            $('.calculating-results .step-result[data-step=' + stepId + ']').text(value);
            if(stepId < 5)
                $('.step[data-step=' + stepId + '] .action-block .next-question').removeClass('disabled').removeAttr('disabled');
        })
        

    })

    $('.action-block .more').on('click',function(e){
        e.preventDefault();
        var stepId = $(this).data('link');
        $('.status-counter .counter-number .current-step').text(stepId);
        $('.calculating-process .status-bar .status-' + stepId).addClass('active')
        $('#calculating-form .step').removeClass('current');
        $('#calculating-form .step[data-step=' + stepId + ']').addClass('current');
    });




    /**CALC END**/

    /*** MAP Interaktive Logistic ***/

        $("#logistic-search").on("keyup", function() {
            var value = $(this).val().toLowerCase();
            $(".search-list li").filter(function() {
              $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
            });
        });


        $('.logistic-map .town-item').on('click',function(e){
            
            e.preventDefault();

            var townId = $(this).data('id');
            
            $('.logic .towns-map .search-list ul li').removeClass('active');
            $('.logic .towns-map .search-list ul .list-item[data-town=' + townId +']').addClass('active');

            $('.logistic-map .town-item').not(this).removeClass('active');

            if($(this).hasClass('active')){
                $('.logic .towns-map .search-list ul li').removeClass('active');
                $(this).removeClass('active');
            }else{
                $(this).addClass('active');
            }
   
        });

        $('.logic .towns-map .search-list ul li').on('click',function(e){
            e.preventDefault();

            var townId = $(this).data('town');

            $('.logistic-map .town-item').removeClass('active');
            
            $('.logistic-map .town-item[data-id=' + townId + ']').addClass('active');

            $('.logic .towns-map .search-list ul li').not(this).removeClass('active');

            if($(this).hasClass('active')){
                $('.logistic-map .town-item').removeClass('active');
                $(this).removeClass('active');
            }else{
                $(this).addClass('active');
            }
        });
    
    /*** MAP logistic end***/


   	var products = $('.product-carousel');
	products.isotope({
	  // options
	  itemSelector: '.product-item',
	  layoutMode: 'fitRows'
	});

    $('.product .production-item').on('click',function(e){
    	
    	e.preventDefault();
    	
    	var flag = true;
    	
    	var filterId = $(this).data('filter');
    	
    	$('.product .production-item').not(this).removeClass('active');
    	
    	if($(this).hasClass('active')){
    	
    		$(this).removeClass('active');
    		products.isotope({ filter: '*' });
    		flag = false;
    	
    	}else{
    		flag = true;
    		$(this).addClass('active');
    	
    	}
    	if(flag == true)
    		products.isotope({ filter: '.' + filterId });
    	// console.log(filterId)
    });


 	var circles = $('.inner-stat');
 	circles.each(function(){
 		var value = $(this).attr('value');
 		$(this).circleProgress({
 			startAngle: -Math.PI / 4 * 2,
		    value: value,
		    fill: {gradient: ['#3cbade','#60aad9', '#49309d']},
		    size: 170,
		    thickness: 5,
		    emptyFill: 'transparent'
		  });
 	})
	  // Number from 0.0 to 1.0

    var typed = new Typed('#typing', {
	  strings: ["Ассенизаторских цистерн", "Противопожарных дверей", "Металлических дверей", "Строительных контейнеров", "Бункерного оборудования"],
      smartBackspace: true, // Default value
      typeSpeed: 70,
      backDelay: 1500,
      startDelay: 2500,
      loop: true,
	});

	// Odometer JS
    // $('.odometer').appear(function(e) {
		
    // });

    var odo = $(".odometer");
	odo.each(function() {
		var countNumber = $(this).attr("data-count");
		$(this).html(countNumber);
	});

	
	

    
	

		
	$('.questions .tab-content .quest .btn').on('click',function () {
		$('.collapse.show').collapse('hide');
        $(this).children('img').removeClass('rotate');

		$(this).addClass('clicked');
		$(this).focusout(function(event) {
			$('.collapse.show').collapse('hide');
			$(this).removeClass('clicked').removeClass('collapsed');
			$(this).children('img').removeClass('rotate');
		});

		$(this).children('img').addClass('rotate');
		
	});

	$('.arrow a').on('click', function(e){
    	// e.preventDefault();
    	var anchor = $(this).attr('href');
    	$('html, body').stop().animate({
            scrollTop: $(anchor).offset().top
        }, 777);
    });

    $('.questions-opener').on('click', function(e){
    	$(this).toggleClass('open');
    	$('.hidden-questions').toggleClass('opened');
    	e.preventDefault();
    	$('html, body').stop().animate({
            scrollTop: $('.answer').offset().top
        }, 777);
    });



    $(window).on('scroll',function() {
        if ($(this).scrollTop() > 100){  
            $('.sticky-header').addClass("show");
        }
        else{
            $('.sticky-header').removeClass("show");
        }
    });



    $('.statya-carousel').owlCarousel({
        loop:true,
        nav: true,
        navText: ["<img src='images/left-arrow.png'>","<img src='images/right-arrow.png'>"],
        dots: true,
        margin:20,
        responsive : {
            0 : {
                    items: 1
            },
            480 : {
                    items: 2
               
            },
            768 : {
                    items: 3
            }
        }
    });

    $('.news-item-share .share').hover(function(){
        $(this).attr("src","images/news-c-share.png");
    },function(){
        $(this).attr("src","images/news-share.png");
    });

    $('.news-item-share .heart').hover(function(){
        $(this).attr("src","images/news-c-heart.png");
    },function(){
        $(this).attr("src","images/news-heart.png");
    });





    
	

});