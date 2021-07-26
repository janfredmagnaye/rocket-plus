$r = jQuery.noConflict();

$r(function(){
    $r(".rocket-mobile-button button").on('click', function () {
        $r('body').toggleClass('rocket-mm-open');
    });

    $r("div#rocket-mobile-menu .widget_nav_menu ul li.menu-item-has-children").on('click', function () {
        $r(this).toggleClass('subitem-active');
    });
});