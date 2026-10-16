(function($) {
 $.fn.lightbox = function(options) {
    var pluginname = "show-lightbox";

    if($(this).length > 0){
        createLightbox()
        $(this).click(showLightbox);
    }

    function showLightbox(e){
        e.preventDefault();
        $('.lightbox__media').append('<img src="' + $(this).attr('data-img') + '">');
        $('.show-lightbox').show();
    }

    $('.lightbox__close').click(function(){
        $('.lightbox__media img').remove();
        $('.show-lightbox').hide();

    });

    function createLightbox(){
        if($('.' + pluginname).length == 0){
            $('body').prepend('<div class="'+ pluginname +'"></div>');
            $('.' + pluginname).append(' <a class="lightbox__close" href="#" ><i class="fas fa-times"></i></a>');
            $('.' + pluginname).append(' <div class="lightbox__media"></div>');
        }
    }
 }
})(jQuery);