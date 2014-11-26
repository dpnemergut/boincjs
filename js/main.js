$(document).ready(function() {
    function compute(dataToCompute) {
        // Needs to be implemented by project
        var computedData = dataToCompute;
        return computedData;
    }

    function stageData(dataToStage) {
        var boinc = "http://boincjs.dev?jsoncallback=?";
        $.getJSON(boinc, {
            jsData: dataToStage,
            method: "staging",
            format: "json"
        }).done(function(data) {
                console.log(data);
                compute(data);
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
                compute(data);
                stageData(data);
            });
    })();
});
