$(document).ready(function() {
    (function() {
        var flickerAPI = "http://boincjs.dev?jsoncallback=?";
        $.getJSON( flickerAPI, {
            tags: "mount rainier",
            tagmode: "any",
            format: "json"
        }).done(function( data ) {
                console.log(data);
            });
    })();
});
