function Application(config)
{
    $.extend(true, this.config, config);

    this.initConsole()
        .initCanvasLoader()
        .initGoogleAnalytics();
}

Application.prototype = {

    config : {
        homeUrl: '',
        canvasLoader: {
            color: '#000000',
            shape: 'spiral',
            diameter: 100,
            density: 80,
            range: 0.8,
            speed: 3,
            fps: 30
        },
        googleAnalytics: []
    },

    // Avoid `console` errors in browsers that lack a console.
    initConsole : function()
    {
        var method;
        var noop = function () {};
        var methods = [
            'assert', 'clear', 'count', 'debug', 'dir', 'dirxml', 'error',
            'exception', 'group', 'groupCollapsed', 'groupEnd', 'info', 'log',
            'markTimeline', 'profile', 'profileEnd', 'table', 'time', 'timeEnd',
            'timeStamp', 'trace', 'warn'
        ];
        var length = methods.length;
        var console = (window.console = window.console || {});

        while (length--) {
            method = methods[length];

            // Only stub undefined methods.
            if (!console[method]) {
                console[method] = noop;
            }
        }

        return this;
    },

    initCanvasLoader : function()
    {
        var app = this;
        yepnope([{
            load: 'http://cdn.add-design.it/js/canvasloader/0.9.1/js/heartcode-canvasloader-min.js',
            complete: function() {
                var $body = $('body');

                if (!$body.attr('id')) {
                    $body.attr('id', 'body');
                }

                var cl = new CanvasLoader($body.attr('id'));
                cl.setShape(app.config.canvasLoader.shape);
                cl.setColor(app.config.canvasLoader.color);
                cl.setDiameter(app.config.canvasLoader.diameter);
                cl.setDensity(app.config.canvasLoader.density);
                cl.setRange(app.config.canvasLoader.range);
                cl.setSpeed(app.config.canvasLoader.speed);
                cl.setFPS(app.config.canvasLoader.fps);

                app.cl = cl;

                var $cl = $("#canvasLoader");

                $cl.css({
                    'position': 'fixed',
                    'top': '50%',
                    'left': '50%',
                    'margin-top': cl.getDiameter() * -0.5 + "px",
                    'margin-left': cl.getDiameter() * -0.5 + "px",
                    'opacity': 0,
                    'z-index': 999999,
                    'display': 'none'
                });
            }
        }]);

        return this;
    },

    initGoogleAnalytics: function()
    {
        var app = this;

        yepnope([{
            test: app.config.googleAnalytics,
            yep: (document.location.protocol === 'https:' ? '//ssl' : 'http://www') + '.google-analytics.com/ga.js',
            complete: function() {
                $.each(app.config.googleAnalytics, function(index, command){
                    _gaq.push(command);
                });
            }
        }]);

        return this;
    },

    initFacebook: function()
    {
        var app = this;
        $("body").prepend($('<div/>', {id: 'fb-root'}));

        yepnope({
            test: app.config.facebook.appId && app.config.facebook.channelUrl,
            yep: '//connect.facebook.net/' + $("html").attr('lang') + '/all.js',
            callback: function() {
                FB.init({
                    appId      : app.config.facebook.appId,
                    channelUrl : app.config.facebook.channelUrl,
                    status     : true,
                    xfbml      : true
                });
            }
        });

        return app;
    },

    showLoader : function(callback)
    {
        var $overlay = $("#overlay");
        if (!$overlay.length) {
            $overlay = $("<div/>", {'id' : 'overlay'});
            $("body").append($overlay);
        }

        if ($overlay.css('display') == 'block') {
            return this;
        }

        this.cl.show();
        $("#canvasLoader").hide().css({'opacity': 1});
        $("#canvasLoader").stop(true).fadeIn('fast');

        $overlay.stop(true).fadeIn('fast',callback);

        return this;
    },

    hideLoader : function(callback)
    {
        var $overlay = $("#overlay");

        if ($overlay.css('display') == 'none') {
            return this;
        }

        $("#canvasLoader").stop(true).fadeOut('fast', $.proxy(function() {
            this.cl.hide();
            $("#canvasLoader").css({'opacity': 0});
        }, this));

        $overlay.stop(true).fadeOut('fast',callback);

        return this;
    },

    fail : function(text)
    {
        this.hideLoader(function(){
            window.alert(text);
        });

        return this;
    }

};
