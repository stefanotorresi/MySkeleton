function Application(config)
{
    $.extend(this.config, config);

    this.initConsole()
        .initCanvasLoader()
        .initGoogleAnalytics();
}

Application.prototype = {

    config : {
        homeUrl: '',
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
        Modernizr.load([{
            load: '//heartcode-canvasloader.googlecode.com/files/heartcode-canvasloader-min-0.9.1.js',
            complete: function() {
                $body = $('body');

                if (!$body.attr('id')) {
                    $body.attr('id', 'body');
                }

                var cl = new CanvasLoader($body.attr('id'));
                cl.setShape('spiral'); // default is 'oval'
                cl.setColor('#000000'); // default is '#000000'
                cl.setDiameter(100); // default is 40
                cl.setDensity(80); // default is 40
                cl.setRange(0.8); // default is 1.3
                cl.setSpeed(3); // default is 2
                cl.setFPS(30); // default is 24

                $cl = $("#canvasLoader");

                $cl.css({
                    'position': 'fixed',
                    'top': '50%',
                    'left': '50%',
                    'margin-top': cl.getDiameter() * -0.5 + "px",
                    'margin-left': cl.getDiameter() * -0.5 + "px",
                    'opacity': 0,
                    'z-index': 999999
                });

                cl.show();

                $cl.hide().css('opacity', 1);
            }
        }]);

        return this;
    },

    initGoogleAnalytics: function()
    {
        app = this;

        Modernizr.load([{
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

        $("#canvasLoader").stop(true).fadeOut('fast');
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

