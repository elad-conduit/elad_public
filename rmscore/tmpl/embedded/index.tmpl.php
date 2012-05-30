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
			
			if (gameMinute < 10)
				return 1;
			if (gameMinute > 10 && gameMinute < 20)
				
				return 2;
			if (gameMinute > 20 && gameMinute < 30)
				return 3;
			if (gameMinute > 30)
				return 4;
		
		}
		
		// return team ID from a givven tean name
		function getIDbyTeamName(teamName){
			
			// name convention
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
			
				
				$.ajaxSetup({ cache: true });
				$.getJSON('../../php/xml2json.php', function(json) {
										
					
					// case the feed is empty
					if(typeof(json['RES']) == 'undefined'){
					
						$('.timeRemaining').html('yet...');
						$('.team1').html('No');
						$('.score1').html('');
						$('.team2').html('matches');
						$('.score2').html('');
						$('.period').html('');
					}
					// case the feed has many games
					else{
						
						if (typeof(json['RES']['RE']) != 'undefined'){
							
							$('.timeRemaining').html(getValueByPath(json,getPathbyDivName("time")));
							$('.team1').html(getValueByPath(json,getPathbyDivName("team1name")));
							$('.score1').html(getValueByPath(json,getPathbyDivName("team1score")));
							$('.team2').html(getValueByPath(json,getPathbyDivName("team2name")));
							$('.score2').html(getValueByPath(json,getPathbyDivName("team2score")));
							$('.period').html(getValueByPath(json,getPathbyDivName("period")));
					
							if (json.RES.RE[i+1])
							{
								
								i++;	
							}
							else
							{
								
								i=0;
							}
						}
						// case the feed has one game
						if (typeof(json['RES']['RE'][i]) == 'undefined'){
						
							$('.timeRemaining').html(getValueByPath(json,'RES.RE[\"@attributes\"].MIN'));
							$('.team1').html(getValueByPath(json,'gRES.RE[\"@attributes\"].EL'));
							$('.score1').html(getValueByPath(json,'RES.RE[\"@attributes\"].GL'));
							$('.team2').html(getValueByPath(json,'RES.RE[\"@attributes\"].EV'));
							$('.score2').html(getValueByPath(json,'RES.RE[\"@attributes\"].GV'));
							//$('.period').html(getValueByPath(json,'RES.RE[\"@attributes\"].ES'));
					
						}
						
					}
					
				});

				var host = getBaseURL();

				/*var width1 = document.getElementById("team1").offsetWidth;
				var width2 = document.getElementById("team2").offsetWidth;
				var toolbarWidth = width1 + width2 + 50; 

				ChangeWidth(toolbarWidth); */

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
			<div class="timeRemaining"></div>
			<div class="team">
				<div class="teamScore score2"></div>
				<div class="teamName team2"></div>		
			</div>
			
			
			<div class="periodContainer">
				
				<!--div class="period"></div-->
				
			</div>
			
		</div>
		
		
	</body>
</html>
