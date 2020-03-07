$(document).ready(function(){
   
    
    $('.product-item-carousel .carousel .owl-carousel').owlCarousel({
        thumbs: true,
        thumbImage: false,
        thumbsPrerendered: true,
        loop:true,
        nav: true,
        navText: ["<img src='/images/card-carousel-prev.png'>","<img src='/images/card-carousel-next.png'>"],
        dots: false,
        margin: 25,
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


    $('.image-popup-no-margins').magnificPopup({
        type: 'image',
        closeOnContentClick: true,
        closeBtnInside: false,
        fixedContentPos: true,
        mainClass: 'mfp-no-margins mfp-with-zoom', // class to remove default margin from left and right side
        image: {
            verticalFit: true
        },
        zoom: {
            enabled: true,
            duration: 500 // don't foget to change the duration also in CSS
        }
    });


});