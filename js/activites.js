var app = app || {};

app.listH;
app.currentSectionH;
app.category;
app.containerH;


jQuery(document).ready(function() {
    app.initActivites();
});



app.initActivites = function() {

    jQuery(".fancybox").fancybox();

    jQuery('.fancybox-media')
        .attr('rel', 'media-gallery')
        .fancybox({
            openEffect: 'none',
            closeEffect: 'none',
            prevEffect: 'none',
            nextEffect: 'none',

            arrows: false,
            helpers: {
                media: {},
                buttons: {}
            }
        });


    app.resizeSidebar();

    jQuery(window).resize(function() {
        app.resizeSidebar();
    });

    jQuery('.cat').on('click', function(e) {
        app.category = jQuery(this);
        app.handleActivitesMenu();
        e.preventDefault();
    });

}

app.resizeSidebar = function() {

    app.getSizes();

    if (app.isDesktop() && !app.listH) {
        app.containerH = jQuery('.sous-nav').outerHeight() + jQuery("#desc").outerHeight() + jQuery("#cplt").outerHeight();
    } else if (app.isTablet() && !app.listH) {
        app.containerH = jQuery('.sous-nav').outerHeight() + jQuery("#desc").outerHeight() + jQuery("#cplt").outerHeight();
    } else if (app.isTablet() && app.listH) {
        app.containerH = jQuery('#list-activites').outerHeight();
    } else {
        app.containerH = 0;
    }
    jQuery("#filtres").css('min-height', app.containerH);
}

app.handleActivitesMenu = function() {

    var status = jQuery('.cat').attr("class");
    jQuery('.cat').toggleClass('on off');
    if (status == "cat off") {
        app.category.next('ul').slideDown(200);
    } else {
        app.category.next('ul').slideUp(200);
    }
}

app.getSizes = function() {
    app.listH = jQuery('#list-activites').height();
    app.currentSectionH = jQuery('section.on').outerHeight();
}
