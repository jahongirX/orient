$(document).ready(function(){
   


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


});