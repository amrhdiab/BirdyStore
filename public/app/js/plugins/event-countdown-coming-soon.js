! function(t) {
    t.fn.countdown = function(e, n) {
        function a() {
            var e = Date.parse(o.date) / 1e3,
                a = Math.floor(t.now() / 1e3);
            a >= e && (n.call(this), clearInterval(interval));
            var i = e - a,
                l = Math.floor(i / 86400);
            i -= 60 * l * 60 * 24;
            var f = Math.floor(i / 3600);
            i -= 60 * f * 60;
            var d = Math.floor(i / 60);
            i -= 60 * d, r.find(".timeRefDays").text(1 == l ? "Day" : "days"), r.find(".timeRefHours").text(1 == f ? "Hour" : "hours"), r.find(".timeRefMinutes").text(1 == d ? "Minute" : "min"), r.find(".timeRefSeconds").text(1 == i ? "Second" : "sec"), "on" == o.format && (l = String(l).length >= 2 ? l : "0" + l, f = String(f).length >= 2 ? f : "0" + f, d = String(d).length >= 2 ? d : "0" + d, i = String(i).length >= 2 ? i : "0" + i), isNaN(e) ? (alert("Invalid date. Here's an example: 12 Tuesday 2012 17:30:00"), clearInterval(interval)) : (r.find(".days").text(l), r.find(".hours").text(f), r.find(".minutes").text(d), r.find(".seconds").text(i))
        }
        var r = t(this),
            o = {
                date: null,
                format: null
            };
        e && t.extend(o, e), a(), interval = setInterval(a, 1e3)
    }
}(jQuery), jQuery(".sc_counter").countdown({
    date: "2 december 2017 6:19:00",
    format: "on"
}, function() {
    alert("done!")
});