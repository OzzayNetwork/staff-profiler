// JavaScript Document
$(document).ready(function(jQuery){
	/* History Slider Start*/
        if (jQuery(".cs-history-slider").length != '') {
            jQuery(".cs-history-slider").slick({
                dots: false,
                arrows: false,
                infinite: true,
                swipeToSlide: true,
                autoplay: true,
                autoplaySpeed: 2000,
                speed: 300,
                slidesToShow: 5,
                slidesToScroll: 1,
                responsive: [{
                    breakpoint: 1370,
                    settings: {
                        slidesToShow: 3,
                        slidesToScroll: 1
                    }
                }, {
                    breakpoint: 1170,
                    settings: {
                        slidesToShow: 3,
                        slidesToScroll: 1
                    }
                }, {
                    breakpoint: 990,
                    settings: {
                        slidesToShow: 2,
                        slidesToScroll: 1
                    }
                }, {
                    breakpoint: 767,
                    settings: {
                        slidesToShow: 1,
                        slidesToScroll: 1
                    }
                }]
            });

        }
        /* History Slider End*/
});