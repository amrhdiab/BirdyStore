/*!
 * jQuery Loupe
 * http://www.userdot.net/#!/jquery
 *
 * Copyright 2011, UserDot www.userdot.net
 * Licensed under the GPL Version 3 license.
 * Version 1.0.0
 *
 */
(function ($) {
    var id = 0;
    jQuery.fn.loupe = function (a) {
        id++;
        if (this.length > 1) {
            return this.each(function () {
                $(this).loupe(a)
            });
        }
        var a = $.extend({
                trigger: "mouseenter",
                shape: "circle",
                rounded_corners: 10,
                loupe_toggle_time: "medium",
                loupe_toggle_easing: "linear",
                default_size: 200,
                min_size: 150,
                max_size: 250,
                glossy: !0,
                drop_shadow: !0,
                allow_resize: !0,
                size_snap: 10,
                resize_animation_time: "medium",
                resize_animation_easing: "easeOutBack",
                allow_zoom: !0,
                zoom_key: 90,
                default_zoom: 100,
                min_zoom: 50,
                max_zoom: 200,
                zoom_snap: 5,
                zoom_animation_time: "medium",
                zoom_animation_easing: "easeOutBack",
                apply_overlay: !0,
                overlay_opacity: 0.5,
                overlay_effect_time: "slow",
                overlay_effect_easing: "easeOutBack",
                overlay_class_name: ""
            }, a || {}),
            j = jQuery(this),
            c = "loupe-" + id,
            t = "loupe_overlay-" + id,
            h = a.default_size,
            i, q = null,
            u = 0,
            v = 0,
            x = 0,
            y = 0,
            r = 0,
            s = 0,
            w = !1,
            p = !1,
            k = a.default_zoom,
            n = 0,
            o = 0,
            e, z = !1;
        return this.each(function () {
            function A() {
                var d = h - 2 * $("#" + c + " .glossy").css("marginTop"),
                    e = h / 2,
                    g = 0,
                    f = 0;
                a.shape == "circle" ? f = g = e : a.shape == "rounded" && (g = parseInt($("#" + c).css("border-top-width")), f = g = a.rounded_corners - g);
                $("#" + c + " .glossy").stop();
                $("#" + c + " .glossy").animate({
                    width: d + "px",
                    height: e + "px",
                    "-webkit-border-top-left-radius": g + "px",
                    "-webkit-border-top-right-radius": f + "px",
                    "-moz-border-radius-topleft": g + "px",
                    "-moz-border-radius-topright": f + "px",
                    "border-top-left-radius": g + "px",
                    "border-top-right-radius": f + "px"
                }, {
                    queue: !1,
                    easing: a.resize_animation_easing,
                    duration: a.resize_animation_time
                })
            }
            function B(d, e) {
                if (w && a.allow_zoom) {
                    if (!(k + a.zoom_snap * d > a.max_zoom || k + a.zoom_snap * d < a.min_zoom)) {
                        k += a.zoom_snap * d;
                        $("#log").text("zoom: " + k);
                        r += Math.round(x * a.zoom_snap / 100) * d;
                        s += Math.round(y * a.zoom_snap / 100) * d;
                        var g = e.pageY - this.offsetTop;
                        n = Math.round(r / u * (e.pageX - this.offsetLeft)) * -1 + h / 2;
                        o = Math.round(s / v * g) * -1 + h / 2;
                        $("#" + c).animate({
                            "background-position": n + "px " + o + "px",
                            "background-size": r + "px " + s + "px"
                        }, {
                            queue: !1,
                            easing: a.zoom_animation_easing,
                            duration: a.zoom_animation_time,
                            complete: function () {
                                i = $("#" + c).outerWidth();
                                var a = new jQuery.Event("mousemove", {
                                    pageX: m + i / 2,
                                    pageY: l + i / 2
                                });
                                j.trigger(a)
                            }
                        })
                    }
                } else if (a.allow_resize && !w && (g = d * a.size_snap, !(h + g > a.max_size || h + g < a.min_size))) {
                    h += g;
                    var f = 0,
                        m = Math.round($("#" + c).offset().left - g),
                        l = Math.round($("#" + c).offset().top - g);
                    n += g;
                    o += g;
                    $("#" + c).stop();
                    a.shape == "circle" ? (f = h / 2, $("#" + c).animate({
                        width: h + "px",
                        height: h + "px",
                        "-webkit-border-top-left-radius": f + "px",
                        "-webkit-border-top-right-radius": f + "px",
                        "-webkit-border-bottom-left-radius": f + "px",
                        "-webkit-border-bottom-right-radius": f + "px",
                        "-moz-border-radius-topleft": f + "px",
                        "-moz-border-radius-topright": f + "px",
                        "-moz-border-radius-bottomleft": f + "px",
                        "-moz-border-radius-bottomright": f + "px",
                        "border-top-left-radius": f + "px",
                        "border-top-right-radius": f + "px",
                        "border-bottom-left-radius": f + "px",
                        "border-bottom-right-radius": f + "px",
                        "background-position": n + "px " + o + "px",
                        left: m + "px",
                        top: l + "px"
                    }, {
                        queue: !1,
                        easing: a.resize_animation_easing,
                        duration: a.resize_animation_time,
                        complete: function () {
                            i = $("#" + c).outerWidth();
                            var a = new jQuery.Event("mousemove", {
                                pageX: m + i / 2,
                                pageY: l + i / 2
                            });
                            j.trigger(a)
                        }
                    })) : a.shape == "rounded" ? $("#" + c).animate({
                        width: h + "px",
                        height: h + "px",
                        "-webkit-border-radius": a.rounded_corners,
                        "-moz-border-radius": a.rounded_corners,
                        "border-radius": a.rounded_corners,
                        "background-position": n + "px " + o + "px",
                        left: m + "px",
                        top: l + "px"
                    }, {
                        queue: !1,
                        easing: a.resize_animation_easing,
                        duration: a.resize_animation_time,
                        complete: function () {
                            i = $("#" + c).outerWidth();
                            var a = new jQuery.Event("mousemove", {
                                pageX: m + i / 2,
                                pageY: l + i / 2
                            });
                            j.trigger(a)
                        }
                    }) : a.shape == "square" && $("#" + c).animate({
                        width: h + "px",
                        height: h + "px",
                        "background-position": n + "px " + o + "px",
                        left: m + "px",
                        top: l + "px"
                    }, {
                        queue: !1,
                        easing: a.resize_animation_easing,
                        duration: a.resize_animation_time,
                        complete: function () {
                            i = $("#" + c).outerWidth();
                            var a = new jQuery.Event("mousemove", {
                                pageX: m + i / 2,
                                pageY: l + i / 2
                            });
                            j.trigger(a)
                        }
                    });
                    a.glossy && A()
                }
            }
            jQuery.browser.webkit && document.readyState != "complete" ? setTimeout(arguments.callee, 100) : (function () {
                j.is("a") ? (q = j.attr("href"), e = j.find("img")) : j.is("img") && (q = j.attr("src"), e = j);
                jQuery.browser.msie && parseInt(jQuery.browser.version, 10) < 9 && (z = !0, k = 100);
                u = e.width();
                v = e.height();
                $("body").append("<div class='sc__loupe' id='" + c + "'></div>");
                var d = new Image;
                d.onload = function () {
                    x = this.width;
                    y = this.height;
                    r = Math.round(x * k / 100);
                    s = Math.round(y * k / 100);
                    var d = h / 2;
                    $("#" + c).css({
                        width: h + "px",
                        height: h + "px",
                        "background-image": "url(" + q + ")",
                        "background-size": r + "px " + s + "px"
                    });
                    a.shape == "circle" ? $("#" + c).css({
                        "-webkit-border-radius": d + "px",
                        "-moz-border-radius": d + "px",
                        "border-radius": d + "px"
                    }) : a.shape == "rounded" && $("#" + c).css({
                        "-webkit-border-radius": a.rounded_corners,
                        "-moz-border-radius": a.rounded_corners,
                        "border-radius": a.rounded_corners + "px"
                    });
                    i = $("#" + c).outerWidth();
                    a.glossy && $("#" + c).append("<div class='glossy'></div>");
                    a.apply_overlay && ($("body").append("<div class='overlay " + a.overlay_class_name + "' id='" + t + "'></div>"), $("#" + t).css({
                        top: e.offset().top + "px",
                        left: e.offset().left + "px",
                        width: e.outerWidth() + "px",
                        height: e.outerHeight() + "px"
                    }));
                    a.drop_shadow && $("#" + c).addClass("shadow")
                };
                d.src = q
            }(), (a.allow_resize || a.allow_zoom) && !z && $.event.special.mousewheel && $("#" + c).bind("mousewheel", function (a, b) {
                B(b, a);
                return !1
            }), e.bind(a.trigger, function (d) {
                p ? ($("#" + c).fadeOut(a.loupe_toggle_time, a.loupe_toggle_easing), p = !1, a.apply_overlay && $("#" + t).fadeOut(a.overlay_effect_time, a.overlay_effect_easing)) : ($("#" + c).fadeIn(a.loupe_toggle_time, a.loupe_toggle_easing), p = !0, a.apply_overlay && $("#" + t).fadeTo(a.overlay_effect_time, a.overlay_opacity, a.overlay_effect_easing), A());
                if (d.type == "click") return d.preventDefault ? d.preventDefault() : d.returnValue = !1, !1
            }), $("#" + c).bind("click", function () {
                e.trigger("click")
            }), $(document).bind("mousemove", function (d) {
                if (!p) return !0;
                var j = parseInt(e.css("border-left-width")) + parseInt(e.css("padding-left")),
                    g = parseInt(e.css("border-top-width")) + parseInt(e.css("padding-top")),
                    f = parseInt(e.css("border-right-width")) + parseInt(e.css("padding-right")),
                    m = parseInt(e.css("border-bottom-width")) + parseInt(e.css("padding-bottom")),
                    l = d.pageX - e.offset().left - j,
                    k = d.pageY - e.offset().top - g,
                    q = Math.round(d.pageX - i / 2),
                    d = Math.round(d.pageY - i / 2);
                n = Math.round(r / u * l) * -1 + h / 2;
                o = Math.round(s / v * k) * -1 + h / 2;
                $("#" + c).css({
                    "background-position": n + "px " + o + "px"
                });
                $("#" + c).css({
                    left: q + "px",
                    top: d + "px"
                });
                if (l < -j || k < -g || l > u + f || k > v + m) $("#" + c).fadeOut(a.loupe_toggle_time), p = !1, a.apply_overlay && $("#" + t).fadeOut(a.overlay_effect_time)
            }), $(document).keyup(function (b) {
                if (b.which == a.zoom_key && p) return w = !1, b.preventDefault ? b.preventDefault() : b.returnValue = !1, !1
            }).keydown(function (b) {
                if (b.which == a.zoom_key && p) return w = !0, b.preventDefault ? b.preventDefault() : b.returnValue = !1, !1
            }))
        })
    }
})(jQuery);
