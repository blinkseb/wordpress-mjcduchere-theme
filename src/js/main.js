var app = app || {};

app.boutonMenu = jQuery(".btn-mobile");
app.screenW = jQuery(window).width();

jQuery(document).ready(function() {
    app.init();
});

app.init = function() {

    app.displayImg();
    app.resizeItems();

    // app.resizeVignet();
    app.initOnglets();

    jQuery(window).resize(function() {
        // app.resizeVignet();
    });

    jQuery('#menu-principal > li').hover(function() {
        app.subMenuParent = jQuery(this);
        app.showSubMenu();
    }, function() {
        app.hideSubMenu();
    });

    jQuery('.tab').on('click', function(e) {
        app.tab = jQuery(this);
        app.toggleTabs();
        e.preventDefault();
    });

    app.boutonMenu.on('click', function(e) {
        app.mobileMenu();
        e.preventDefault();
    });

    jQuery(window).resize(function() {
        app.screenW = jQuery(window).width();
        app.resizeItems();
    });


};


app.showSubMenu = function() {

    app.subMenuParent.find('.sub-menu').fadeIn(150);
    app.subMenuParent.addClass('current-menu-item');
};

app.hideSubMenu = function() {

    app.subMenuParent.find('.sub-menu').fadeOut(150);
    app.subMenuParent.removeClass('current-menu-item');
};

app.mobileMenu = function() {
    var status = app.boutonMenu.attr("class");
    app.boutonMenu.toggleClass('on off');
    if (status === "btn-mobile off") {
        jQuery('.menu-principal-container').slideDown(200);
    } else {
        jQuery('.menu-principal-container').slideUp(200);
    }
};

app.initOnglets = function() {

    jQuery('.tab').eq(0).addClass('on');
    jQuery('.onglet').eq(0).addClass('on');
};

app.toggleTabs = function() {

    jQuery('.tab, .onglet').removeClass('on');
    jQuery(app.tab).toggleClass('on');
    app.onglet = jQuery(app.tab).attr('data-typ');
    jQuery('#' + app.onglet).toggleClass('on');

    if (jQuery('#filtres').length > 0) {
        app.resizeSidebar();
    }
};

app.displayImg = function() {

    setTimeout(function() {
        jQuery('#slider').css('opacity', '1');
    }, 200);
    setTimeout(function() {
        jQuery('header').css('opacity', '1');
    }, 200);

};

app.resizeItems = function() {

    var w = jQuery("#sommaire .item").width();
    var h = w;

    jQuery(".item").css('height', h + 'px');

};

app.isDesktop = function() {
    // Returns true if the media-query for desktop matches, false otherwise
    return Modernizr.mq('(min-width: 980px)');
};

app.isTablet = function() {
    // Returns true if the media-query for tablet matches, false otherwise
    return Modernizr.mq('(min-width: 768px) and (max-width: 980px)');
};

app.isPhone = function() {
    // Returns true if the media-query for phone matches, false otherwise
    return Modernizr.mq('(max-width: 768px)');
};
