var app = app || {};

app.pageW;
app.welcomeH;
app.actuHover;
app.base = 0;
app.eventsLen = jQuery("#next-events li li").size();


jQuery(document).ready(function() {

    app.resizeBox();

    app.initHome();
    app.initNextEvents();
    app.heightEqualizer();


});



app.initHome = function() {

    jQuery('.actualite').hover(function() {
        app.actuHover = jQuery(this);
        app.showActu();
    }, function() {
        app.hideActu();
    });

    jQuery("#next-events").on('click', '.nextevent', function(e) {
        app.nextEvents();
        e.preventDefault();
    });

    jQuery("#next-events").on('click', '.prevevent', function(e) {
        app.prevEvents();
        e.preventDefault();
    });

    jQuery(window).resize(function() {
        app.heightEqualizer();
        app.resizeBox();
    });
}


app.heightEqualizer = function() {

    if (app.isPhone()) {
        jQuery("#next-events").css('min-height', '');
    } else {
        app.welcomeH = jQuery("#welcome").outerHeight();
        if (app.welcomeH > 768) {
            jQuery("#next-events").css('min-height', app.welcomeH);
        } else {
            jQuery("#next-events").css('min-height', '768px');
        }
    }
}


app.initNextEvents = function() {

    jQuery('#next-events li li').eq(app.base).show();
    jQuery('#next-events li li').eq(app.base + 1).show();
    jQuery('#next-events li li').eq(app.base + 2).show();
    app.base = app.base + 3;
}

app.nextEvents = function() {

    if (app.base < app.eventsLen) {
        jQuery('#next-events li li').hide();
        for (var i = app.base; i < app.base + 3; i++) {
            jQuery('#next-events li li').eq(i).show();
        }
        app.base = app.base + 3;
    }
}

app.prevEvents = function() {

    if (app.base !== 3) {
        jQuery('#next-events li li').hide();
        app.base = app.base - 6;
        for (var i = app.base; i < app.base + 3; i++) {
            jQuery('#next-events li li').eq(i).show();
        }
        app.base = app.base + 3;
    }
}

app.showActu = function() {

    if (!app.isPhone()) {

        var actu_h = jQuery('.hover-content').height();
        app.actuHover.find('.perm-content').css('bottom', actu_h);
        app.actuHover.find('.hover-content').toggleClass("show");
        app.actuHover.find('span').fadeOut(200);
    }
}

app.hideActu = function() {

    if (!app.isPhone()) {
        app.actuHover.find('.perm-content').css('bottom', '0');
        app.actuHover.find('.hover-content').toggleClass("show");
        app.actuHover.find('span').show();
    }
}

app.resizeBox = function() {

    app.pageW = jQuery("#page_wrap").width();
    var h;

    if (app.isDesktop()) {
        h = app.pageW / 3;
        jQuery(".bloc").css('height', h + 'px');
    } else if (app.isTablet()) {
        h = app.pageW / 2;
        jQuery(".bloc").css('height', h + 'px');
    } else {
        h = app.pageW / 1;
        jQuery(".bloc").css('height', h + 'px');
        jQuery('.social').css('height', 'auto');
    }
}
