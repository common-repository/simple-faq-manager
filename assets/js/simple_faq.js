(function( $, root ){

    $.fn.toggleAccordion = function () {
        if ( !this.hasClass('simple_faq_single') ) { return; }
        if ( this.hasClass('accordion_open') ) {
            this.removeClass('accordion_open');
            $('.simple_faq_accordion_content', this).slideUp();
        } else {
            $('.simple_faq_accordion_content', '.accordion_open').slideUp();
            $('.accordion_open').removeClass( 'accordion_open' );
            this.addClass('accordion_open');
            $('.simple_faq_accordion_content', this).slideDown();
        }
    }

    $(document).on('click', '.simple_faq_accordion_heading', function () {
        $(this).closest('.simple_faq_single').toggleAccordion();
    });

    $(function () {
        $('.accordion_open .simple_faq_accordion_content').show();
    });

})(jQuery, this);