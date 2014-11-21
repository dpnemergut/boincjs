var script = document.createElement('script');
script.src = 'http://code.jquery.com/jquery-1.11.0.min.js';
script.type = 'text/javascript';
document.getElementsByTagName('head')[0].appendChild(script);

window.onload = function() {
    var myObj = {"bindings": [
        {"ircEvent": "PRIVMSG", "method": "newURI", "regex": "^http://.*"},
        {"ircEvent": "PRIVMSG", "method": "deleteURI", "regex": "^delete.*"},
        {"ircEvent": "PRIVMSG", "method": "randomURI", "regex": "^random.*"}
    ]};

    var getObj = function() {
        var temp = $.getElementsByTagName('body')[0];
        var temp = $.getJSON("http://boincjs.dev&callback=?", function(data) {
            alert("Done!");
        });

        temp.done(function() {
            alert("Doneroo!");
        });
    }

    setTimeout("getObj()", 3000);
});
