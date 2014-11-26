$(document).ready(function() {
    function stageData(dataToStage) {
        var boinc = "http://boincjs.dev?jsoncallback=?";
        $.getJSON(boinc, {
            jsData: dataToStage,
            method: "staging",
            format: "json"
        }).done(function(data) {
                console.log(data);
                stageData(data);
            });
    }

    (function() {
        var boinc = "http://boincjs.dev?jsoncallback=?";
        $.getJSON(boinc, {
            method: "init",
            format: "json"
        }).done(function(data) {
                console.log(data);
                // Compute
                stageData(data);
            });
    })();
});
