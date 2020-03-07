$(document).ready(function(){
   
    $('.feedback-carousel').owlCarousel({
        loop:true,
        nav: true,
        navText: ["<img src='/images/feedback-left.png'>","<img src='/images/feedback-right.png'>"],
        dots: false,
        margin:25,
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
});