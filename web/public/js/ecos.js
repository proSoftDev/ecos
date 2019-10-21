$(document).ready(function() {
    if(window.innerWidth <= 740 && window.innerWidth >= 561) {
        $('.menu').parent().css('padding', '0');
        $('.menu').parent().parent().parent().css({'padding': '0', 'margin': '0', 'max-width':  '100%'});
    }
});
$(document).ready(function($) {
    let Nav = $('#main-nav').hcOffcanvasNav({
        maxWidth: 561,
        disableBody: true
    });
});

$(document).ready(function() {
    window.addEventListener('scroll', function() {
        let scrollPosNav = $('.nav').innerHTML = pageYOffset;
        if(scrollPosNav >= 524) {
            $('.nav').css({'-webkit-animation': 'fadeIn forwards 2s', 'animation': 'fadeIn forwards 2s'});
        }
        let scrollPosAboutContent = $('.about-content').innerHTML = pageYOffset;
        if (scrollPosAboutContent >= 300) {
            $('.about-content').css({'-webkit-animation': 'fadeIn forwards 2s', 'animation': 'fadeIn forwards 2s'});
        }


    });
});
$(document).ready(function() {
    var navLink = $('.sw-pages-menu li').on('click', function(e) {
        e.preventDefault();
        navLink.not(this).removeClass('acting-sw-link');
        $(this).addClass('acting-sw-link');
    });
});

$(document).ready(function() {

});
$('.mini-imgs img').click(function(e){
    e.preventDefault();

    var attrSrc = $(this).attr('src');

    $('#expandedImg').attr('src',attrSrc);
});
