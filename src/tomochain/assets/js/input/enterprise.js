(function( $ ) {
    tomochain.enterCarousel = function() {
        if($('.shortcode_enterprise_wrap .slide').length > 0){
            $( '.shortcode_enterprise_wrap .slide' ).each( function() {
                var $this = $( this ),
                    atts  = JSON.parse( $this.attr( 'data-atts' ) );

                if ( atts == null ) {
                    return;
                }

                if ( typeof atts.duration === 'undefined' || isNaN( atts.duration ) ) {
                    atts.duration = 5;
                }

                var configs = {
                    accessibility : false,
                    slidesToShow  : parseInt( atts.slide_item ),
                    slidesToScroll: 1,
                    infinite      : atts.loop == 'yes',
                    autoplay      : atts.auto_play == 'yes',
                    autoplaySpeed : parseInt( atts.duration ) * 1000,
                    responsive    : [
                        {
                        breakpoint: 1200,
                        settings  : {
                                slidesToShow  : 4
                        },
                        },
                        {
                            breakpoint: 769,
                            settings  : {
                                slidesToShow  : 3
                            },
                        },
                        {
                            breakpoint: 544,
                            settings  : {
                                slidesToShow  : 2
                            },
                        }
                    ],
                };

                if ( parseInt( atts.slide_item ) == 1 ) {
                    configs['responsive'] = [{
                        breakpoint: 1200,
                        settings  : {
                            adaptiveHeight: true,
                            slidesToShow  : 2
                        },
                    },
                    {
                        breakpoint: 544,
                        settings  : {
                            adaptiveHeight: true,
                            slidesToShow  : 2
                        },
                    }];
                }

                $this.slick( configs );
            });
        }
    }
})(jQuery);