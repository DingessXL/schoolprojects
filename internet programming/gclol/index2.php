<?php require_once 'header.php';
require_once 'dbops.php';
$conn = connect();
function getNames($conn){
    $query = "SELECT `sumName` FROM `summoners`;";
    $result = mysqli_query($conn,$query);
    return $result;
}
$names = getNames($conn);
$array = [];
while ($row = $names->fetch_array()) {
    array_push($array,$row['sumName']);
}
?>
<html lang="en">
<link href="main2.css" type="text/css" rel="stylesheet">
<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
</head>
<header>
    <span>Georgia College Ladder</span>
    <a href="index.php">Home</a>
    <a href="ladder.php">Ladder</a>
    <a href="account.php">Your Account</a>
    <a href="logout.php">Logout</a>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.0/jquery.min.js"></script>
    <script src="sorttable.js"></script>
    <script>
        $( document ).ready(function(){
            var summoner_array = <?php echo json_encode($array); ?>;
            //document.getElementById('ladder').innerHTML = document.getElementById('ladder').innerHTML + "<br> array test: " + summoner_array + summoner_array.length;
            var sumID = summonerIDLookUp(summoner_array);

            for(var i = 0; i < summoner_array.length;i++){
                summonerIDLookUp(summoner_array[i]);
            }
        });



        function summonerIDLookUp(sumName) {
            var API_KEY = "0baa0ce0-f0e7-46b0-825b-d28c7452fd9f";

            var SUMMONER_NAME = sumName;

            //document.getElementById('ladder').innerHTML = document.getElementById('ladder').innerHTML + "<br>" + SUMMONER_NAME;

            if (SUMMONER_NAME !== "") {
                $.ajax({
                    url: 'https://na.api.pvp.net/api/lol/na/v1.4/summoner/by-name/' + SUMMONER_NAME + '?api_key=' + API_KEY,
                    type: 'GET',
                    dataType: 'json',
                    async: true,
                    data: {},
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
            }else{}
        }

        function summonerLookUp(sumID,sumName) {
            var SUMMONER_ID = sumID;
            var SUMMONER_NAME = sumName;
            var API_KEY = "0baa0ce0-f0e7-46b0-825b-d28c7452fd9f";
            var div = document.getElementById('ladder');
            var combine = "";
            //document.getElementById('ladder').innerHTML = document.getElementById('ladder').innerHTML + "<br>" + SUMMONER_NAME;
            getStuff(SUMMONER_ID, SUMMONER_NAME, combine, API_KEY, div);
        }

        function getStuff(SUMMONER_ID, SUMMONER_NAME, combine, API_KEY, div){
            var Topuser = SUMMONER_ID;
            $.ajax({
                url: 'https://na.api.pvp.net/api/lol/na/v2.5/league/by-summoner/' + SUMMONER_ID + '/entry?api_key=' + API_KEY,
                type: 'GET',
                dataType: 'json',
                async: true,
                data: {},
                success: function (json) {
                    var user = Topuser;
                    if (typeof json[user][0].queue != "undefined") {
                        if (json[user][0].queue == "RANKED_SOLO_5x5") {
                            combine = "<tr><td>"+SUMMONER_NAME + "</td><td>" + json[user][0].tier + " </td><td> " + json[user][0].entries[0].division + "</td><td>" + json[user][0].entries[0].leaguePoints + " LP</td></tr>";
                            div.innerHTML = div.innerHTML + combine;
                        }
                    } else if (typeof json[user][1].queue != "undefined") {
                        if (json[user][1].queue == "RANKED_SOLO_5x5") {
                            combine = "<tr><td>"+SUMMONER_NAME + "</td><td>" +json[user][1].tier + " </td><td> " + json[user][1].entries[0].division + "</td><td>" + json[user][0].entries[0].leaguePoints + " LP</td></tr>";
                            div.innerHTML = div.innerHTML +  combine;
                        }
                    } else if (typeof json[user][2].queue != "undefined") {
                        if (json[user][2].queue == "RANKED_SOLO_5x5") {
                            combine = "<tr><td>"+SUMMONER_NAME + "</td><td>" + json[user][2].tier + " </td><td> " + json[user][2].entries[0].division + "</td><td> " + json[user][0].entries[0].leaguePoints + " LP</td></tr>";
                            div.innerHTML = div.innerHTML +  combine;
                        }
                    }
                },
                error: function (XMLHttpRequest, textStatus, errorThrown) {
                    var user = Topuser;
                    console.log(errorThrown);
                    if (errorThrown === "Not Found")
                    {
                        div.innerHTML = div.innerHTML + "<br />: " + user + " " + "UNRANKED";
                    }
                }
            });
        }


    </script>
</header>
<body>
<h6>The Ladder</h6>
<div id="ladder-holder">
    <table class="sortable">
        <thead>
        <th>Name</th>
        <th>Tier</th>
        <th>Division</th>
        <th>League Points</th>
        </thead>
        <tbody id="ladder">
        </tbody>
    </table>
</div>
</body>
</html>