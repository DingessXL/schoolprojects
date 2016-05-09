$( document ).ready(function(){
        var sumName = "dingess";
        var sumID = summonerIDLookUp(sumName);
        //summonerLookUp(sumID);
        //var div2 = document.getElementById('test');
        //div2.innerHTML = div2.innerHTML + sumID;
    });



function summonerIDLookUp(sumName) {
    var SUMMONER_NAME = sumName;
    var API_KEY = "0baa0ce0-f0e7-46b0-825b-d28c7452fd9f";

    if (SUMMONER_NAME !== "") {
        $.ajax({
            url: 'https://na.api.pvp.net/api/lol/na/v1.4/summoner/by-name/' + SUMMONER_NAME + '?api_key=' + API_KEY,
            type: 'GET',
            dataType: 'json',
            data: {
            },
            success: function (json) {
                var SUMMONER_NAME_NOSPACES = SUMMONER_NAME.replace(" ", "");
                SUMMONER_NAME_NOSPACES = SUMMONER_NAME_NOSPACES.toLowerCase().trim();
                summonerID = json[SUMMONER_NAME_NOSPACES].id;
                summonerLookUp(summonerID, SUMMONER_NAME);
            },
            error: function (XMLHttpRequest, textStatus, errorThrown) {
                alert("error getting Summoner data!");
            }
        });
    } else {}
}

function Name() {
    alert(sumName);
}
function summonerLookUp(sumID,sumName) {
    var SUMMONER_ID = "";
    var SUMMONER_NAME = sumName;
    var API_KEY = "0baa0ce0-f0e7-46b0-825b-d28c7452fd9f";
    var div = document.getElementById('ladder');
    var combine = "";

    var array = [sumID,sumID,sumID];

    div.innerHTML = div.innerHTML + "<br />Total Summoners: " + array.length + "<br />";
    for (var i = 0; i < array.length; i++) {
        combine = "";
        SUMMONER_ID = array[i];
        getStuff(SUMMONER_ID, SUMMONER_NAME, combine, API_KEY, div, i);
    }
}

function getStuff(SUMMONER_ID, SUMMONER_NAME, combine, API_KEY, div, count) {
    var Topuser = SUMMONER_ID;
    $.ajax({
        url: 'https://na.api.pvp.net/api/lol/na/v2.5/league/by-summoner/' + SUMMONER_ID + '/entry?api_key=' + API_KEY,
        type: 'GET',
        dataType: 'json',
        async: false,
        data: {},
        success: function (json) {
            var user = Topuser;
            if (typeof json[user][0].queue != "undefined") {
                if (json[user][0].queue == "RANKED_SOLO_5x5") {
                    combine = SUMMONER_NAME+ json[user][0].tier + " - " + json[user][0].entries[0].division + " at " + json[user][0].entries[0].leaguePoints + " LP";
                    div.innerHTML = div.innerHTML + "<br />" + user + " " + combine;
                }
            } else if (typeof json[user][1].queue != "undefined") {
                if (json[user][1].queue == "RANKED_SOLO_5x5") {
                    combine = SUMMONER_NAME +json[user][1].tier + " - " + json[user][1].entries[0].division + " at " + json[user][0].entries[0].leaguePoints + " LP";
                    div.innerHTML = div.innerHTML + "<br />" + user + " " + combine;
                }
            } else if (typeof json[user][2].queue != "undefined") {
                if (json[user][2].queue == "RANKED_SOLO_5x5") {
                    combine = SUMMONER_NAME + json[user][2].tier + " - " + json[user][2].entries[0].division + " at " + json[user][0].entries[0].leaguePoints + " LP";
                    div.innerHTML = div.innerHTML + "<br />" + user + " " + combine;
                }
            }
        },
        error: function (XMLHttpRequest, textStatus, errorThrown) {
            var user = Topuser;
            console.log(errorThrown);
            if (errorThrown === "Not Found")
            {
                div.innerHTML = div.innerHTML + "<br />" + count + ": " + user + " " + "UNRANKED";
            }
        }
    });
}