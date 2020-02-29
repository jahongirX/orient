$(document).ready(function(){


                   const overlay=document.getElementById('overlay');
                    const closeMenu=document.getElementById('close-menu');
                    document.getElementById('open-menu').addEventListener('click',function(){overlay.classList.add('show-menu');});
                    document.getElementById('close-menu').addEventListener('click',function(){overlay.classList.remove('show-menu')});





    $('.strength-carousel.owl-carousel').owlCarousel({
        loop:true,
        nav: true,
        navText: ["<img src='images/left-arrow.png'>","<img src='images/right-arrow.png'>"],
        dots: true,
        items: 1
    });


    $('.product-mobile-carousel').owlCarousel({
        loop:true,
        nav: true,
        navText: ["<img src='images/left-arrow.png'>","<img src='images/right-arrow.png'>"],
        dots: false,
        items: 1
    });


   $('.quest-main-btn-a').on('click',  function(event) {
        
        var pli = $(this).data("pli");
    
        $("#question-body-1, #question-body-2, #question-body-3, #question-body-4, #question-body-5").collapse('hide');

        $("#question-body-"+pli).collapse('show');

    });


    $('.quest .btn').on('click',  function(event) {
        

        $('.answer.collapse.show').collapse('hide');

        $(this).toggleClass('clicked');
        $(this).focusout(function(event) {
            $('.answer.collapse.show').collapse('hide');
            $(this).removeClass('clicked').removeClass('collapsed');
            $(this).children('img').removeClass('rotate');;
        });

        $(this).children('img').toggleClass('rotate');

        var url = $(this).data("url");

        $('.answer.collapse#Answer'+url).collapse('show');

    });

    


 
  $('.questions.hidden-block-for-mobile .questions-container .quest-main-btn .question-item').on('click',  function(event) {
       var target = $(this).data("target");
       $(target).toggleClass('show');
  });

  $('.hidden-block-for-mobile.product-item-carousel.mobile .carousel .owl-carousel').owlCarousel({
        thumbs: true,
        thumbImage: false,
        thumbsPrerendered: true,
        loop:true,
        nav: true,
        navText: ["<img src='images/card-carousel-prev.png'>","<img src='images/card-carousel-next.png'>"],
        dots: false,
        margin: 15,
        items: 1
        // responsive : {
        //     0 : {
        //             items: 1
        //     },
        //     480 : {
        //             items: 2
               
        //     },
        //     768 : {
        //             items: 3
        //     }
        // }
    });


  var windowWidth = $(window).width();

  if(windowWidth < '450') {
    $('.calc-text .img img').attr("src","images/responsive/calc-linear.png");
    $('#calculating-form .col-md-4.ml-auto').attr('style', 'margin-top: 20px;');

    $('.about-info-tabs .tab-content .pane-item img').attr("src","images/responsive/about-linear1.png");
    $('.chosen-filial-about .about-text .img img').attr("src","images/responsive/chosen-text-linear1.png");

    $('.catalog .item .product-price').html('<span class="price-count">58 650</span> <span class="rubl-icon">₽</span> ');
    $('.price-action-block .price-block').html('<p class="price">58 650 <span class="rubl">₽</span></p>');


  }


});