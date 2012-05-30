<html>
	<head>
                <link rel="stylesheet" href="../../css/embedded/index.css" />
		<script language="JavaScript" type="text/javascript" src="http://api.conduit.com/BrowserCompApi.js"></script>
        	<script language="JavaScript"  src="http://code.jquery.com/jquery-latest.js"></script>
        	<script language="JavaScript"  src="http://json-sans-eval.googlecode.com/svn/trunk/src/json_sans_eval.js"></script>
		<script language="JavaScript">
		
		var i = 0;
		var CSVJson = 'test';

		$.ajax({
		
			 url:'../../php/csvToJson.php', 
			 dataType: 'json',
			 async: false,
			 success: function(json) {
					CSVJson = json;
					
					
				},
			error: function(error){
					CSVJson = error;
					
				}
				});
		 
		// return path fron CSV file by divName
		function getPathbyDivName(divName){
		    			
			var real = 'CSVJson.' + divName;
			
			return eval(real);
		}
		
		
		// return value by  path from feed
		function getValueByPath(json,path){
			
			var value = 'json' + '.' + path;
			
			return eval(value);
		}
		
				
		// return quarter by  game time
		function showQuarterByTime(gameTime){
			var gameMinute = parseInt(gameTime.substring(0,2));
			var gameSeconds = parseInt(gameTime.substring(3,5));
			//alert(gameSeconds);
			if (gameMinute <= 10 && gameSeconds == 0)
				return 1;
			if ((gameMinute >= 10 && gameMinute < 20) || (gameMinute == 20 && gameSeconds == 0))
				return 2;
			if ((gameMinute >= 20 && gameMinute < 30) || (gameMinute == 30 && gameSeconds == 0))
				return 3;
			if (gameMinute >= 30)
				return 4;
		}
		
		// return team ID from a givven tean name
		function getIDbyTeamName(teamName){
			var index = -1; // monitoring initialization
			var nameArr = new Array("ARMANI","ASSECO", "KHIMKI", "LABORAL",
									"CHOLET", "CSKA", "PILSEN", "BROSE",
									"FENERBAHCE", "CIBONA", "LIETUVOS", "LOTTOMATICA", "MACCABI",
									"MONTEPASCHI", "OLYMPIACOS", "PANATHINAIKOS", "PARTIZAN",
									"VALENCIA", "REAL", "REGAL", "SPIROU",
									"UNICAJA", "OLIMPIJA", "ZALGIRIS");
			var idArr = new Array("ARM", "PRO", "KHI", "CLA", "CHO", "CSK", "EFS", "BRO", "FBU", "CIB", "LIE", "ROM",
									"MAC", "MPS", "OLY", "PAN", "PAR", "POW", "RMD", "FCB", "CHA", "UNI", "UOL", "ZAL");
			for (p in nameArr){
				if(teamName.search(nameArr[p]) != -1){
					index = p;
					break;
				}
			}
			if(index != -1){
				return idArr[index];
			}
			else{
				return "";
			}
		
		}
		
function getBaseURL() {
    var url = location.href;  // entire url including querystring - also: window.location.href;
    var baseURL = url.substring(0, url.indexOf('/', 14));


    if (baseURL.indexOf('http://localhost') != -1) {
        // Base Url for localhost
        var url = location.href;  // window.location.href;
        var pathname = location.pathname;  // window.location.pathname;
        var index1 = url.indexOf(pathname);
        var index2 = url.indexOf("/", index1 + 1);
        var baseLocalUrl = url.substr(0, index2);

        return baseLocalUrl + "/";
    }
    else {
        // Root Url for domain name
        return baseURL + "/";
    }

}
			function EBDocumentComplete() {
			
					
				$.ajaxSetup({ cache: false });
				$.getJSON('../../php/index.php', function(json) {
										
					
					// case the feed is empty
					if(typeof(json['games']['game']) == 'undefined') {
						clearScoreboard();
					}
					else {
						// case the feed has many games
						if (typeof(json['games']['game'][0]) != 'undefined'){
							var currIndex = i;
							while (getIDbyTeamName(getValueByPath(json,getPathbyDivName("team1"))) == "" ||
									getIDbyTeamName(getValueByPath(json,getPathbyDivName("team2"))) == "")
							{
								if (json.games.game[i+1]) {
									i++;
								} else {
									i = 0;
								}
								if (currIndex == i) // completed a full cycle of games
									break;
							}
							
							if (getIDbyTeamName(getValueByPath(json,getPathbyDivName("team1"))) != "" &&
								getIDbyTeamName(getValueByPath(json,getPathbyDivName("team2"))) != "") 
							{
								$('.timeRemaining').html(getValueByPath(json,getPathbyDivName("timeRemaining")));
								$('.team1').html(getIDbyTeamName(getValueByPath(json,getPathbyDivName("team1"))));
								$('.score1').html(getValueByPath(json,getPathbyDivName("score1")));
								$('.team2').html(getIDbyTeamName(getValueByPath(json,getPathbyDivName("team2"))));
								$('.score2').html(getValueByPath(json,getPathbyDivName("score2")));
								$('.period').html(showQuarterByTime(getValueByPath(json,getPathbyDivName("timeRemaining"))));
							} else {
								clearScoreboard();
							}
							
							if (json.games.game[i+1])
							{
								i++;	
							}
							else
							{
								i=0;
							}
						} else if (typeof(json['games']['game']['minute']) != 'undefined'){ // case the feed has one game

							if (getIDbyTeamName(getValueByPath(json,'games.game.team1')) != "" &&
								getIDbyTeamName(getValueByPath(json,'games.game.team2')) != "") 
							{
								$('.timeRemaining').html(getValueByPath(json,'games.game.minute'));
								$('.team1').html(getIDbyTeamName(getValueByPath(json,'games.game.team1')));
								$('.score1').html(getValueByPath(json,'games.game.homepts'));
								$('.team2').html(getIDbyTeamName(getValueByPath(json,'games.game.team2')));
								$('.score2').html(getValueByPath(json,'games.game.awaypts'));
								$('.period').html(showQuarterByTime(getValueByPath(json,'games.game.minute')));
							} else {
								clearScoreboard();
							}
						} else {
							clearScoreboard();
						}
					}
					
				});
				
				var host = getBaseURL();

				/*var width1 = document.getElementById("team1").offsetWidth;
				var width2 = document.getElementById("team2").offsetWidth;
				var toolbarWidth = width1 + width2 + 50; 

				ChangeWidth(toolbarWidth); */

			}
			
			function clearScoreboard() {
				$('.timeRemaining').html('yet...');
				$('.team1').html('No');
				$('.score1').html('');
				$('.team2').html('Matches');
				$('.score2').html('');
				$('.period').html('');
			}
			

			$(document).ready(function() {
				interval = setInterval('EBDocumentComplete()', 4*1000);
			});
			window.onload = EBDocumentComplete; 
		</script>
		<title>ScoreBoard</title>
	</head>
	<body>
		<div class="container">
			
			<div class="team">
				<div class="teamName team1"></div>
				<div class="teamScore score1"></div>
			</div>
			<div class="vsIcon"></div>
			<div class="team">
				<div class="teamName team2"></div>		
				<div class="teamScore score2"></div>
			</div>
			<div class="period"></div>
			<div class="timeRemaining"></div>
		</div>
		
		<!--<a href="javascript://" onclick="OpenGadget('http://<? echo $_SERVER['SERVER_NAME']; ?>/Apps/scoreboard/tmpl/html/index.tmpl'); return false;">
				<table border="1" cellspacing="1" cellpadding="3">
			<tr>
				<td>
					<div class="team1">bos</div>
				</td>
				<td>
					<div class="score1">22</div>
				</td>
				<td>
					<div class="white">&ndash; Remaining time:</div>
					<div class="timeRemaining"></div>
				</td>
			</tr>
			<tr>
				<td>
					<div class="team2">bos</div>
				</td>
				<td>
					<div class="score2">24</div>
				</td>
			</tr>
		</table>
		</a>-->
	</body>
</html>
