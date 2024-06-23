/*******************************************************
    Template Name    : Sarah - Personal Portfolio Landing Page Template
    Author           : Cute Themes
    Version          : 1.0
    Created          : 2021
    File Description : Main Js file of the template
*******************************************************/
(function($) {
    "use strict";


    // Porfolio isotope and filter
    $(window).on('load', function() {
        var portfolioIsotope = $('.portfolio-container').isotope({
            itemSelector: '.portfolio-grid-item'
        });
        $('#portfolio-flters li').on('click', function() {
            $("#portfolio-flters li").removeClass('filter-active');
            $(this).addClass('filter-active');
            portfolioIsotope.isotope({
                filter: $(this).data('filter')
            });
        });
    });

   

})(jQuery);