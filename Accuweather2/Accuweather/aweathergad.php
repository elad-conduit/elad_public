<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
	<META HTTP-EQUIV="Pragma" CONTENT="no-cache" />
	<META HTTP-EQUIV="Expires" CONTENT="-1" />
	<meta http-equiv="Cache-Control" content="no-store" />

	<title>
      Accuweather.com
    </title>
    <script type="text/javascript" language="javascript" src="js/jquery.js"></script>
	<script type="text/javascript" language="javascript" src="http://api.conduit.com/BrowserCompApi.js"></script>
	<script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.9/jquery-ui.js" type="text/javascript"></script>
	 <script type="text/javascript" language="javascript" src="js/json.as"></script>
	 <script type="text/javascript" src="js/util-functions.js"></script>
<script type="text/javascript" src="js/clear-default-text.js"></script> 
	<script type="text/javascript" name="WetterQueries">
	
	
	  $(document).ready(function()
		  {
				
				farencelc = "0";
				
				
				loadStoredLocations()
				displayStoredLocations()
				//$("#logo").click('www.accuweather.com'); 
				$("#searchClose").click(CloseFloatingWindow);
			    $('#searchInput').keyup(function() {
			
					var robert = $(this).val();
				
					if (robert.length >= 3) {
						
					getLocInfo(robert);
					}
			});
			
			$('#searchInput').keypress(function(event) {
				
						
							var robert = $('#searchInput').val();
							if (robert.length >= 3) {
									
						    getLocInfo(robert);
							
			
				}
			});
		 });
     
		 function getLocInfo(locI)
          {
			locI = encodeURIComponent(locI);
			
            $.ajax({ type:"GET", url: "proxysearch.php?loc=" + locI, dataType: "xml", success: parseXML });
              
            function parseXML(xml)
            {
				
				
				$("#searchResults").html("");
				$(xml).find("location").each(function()
				{
					var city = $(this).attr("city").toString();
					var country = $(this).attr("country").toString();
					var state = $(this).attr("adminArea").toString();
					var loc =  $(this).attr("location").toString();
					var newlitext = "";
					newlitext = city + ", " + state + ", " + country;
					var newli = "";
					var i="1";
					newli = newli + "<div class='addbutton' onclick='setCurrentCity(\"" + city + "\",\"" + state + "\",\"" + country + "\",\"" + loc + "\");'><div class='addtext'>" + newlitext + "</div></div>";
					$("#searchResults").append(newli);
					
				});
				$("#searchResults").show();
				$("#strlocationResults").hide();
				
			}
		  }
		function loadStoredLocations() {
		
			 var s = RetrieveGlobalKey('storedLocations');
			
			if (s == null || s == '')
				storedLocations = [];
			else 
				storedLocations = eval(s);
			
			/*storedLocations = [
				{'name': 'test1', 'region': 'test', 'country': 'test', 'locID': 1},
				{'name': 'test2', 'region': 'test', 'country': 'test', 'locID': 2},
				{'name': 'test3', 'region': 'test', 'country': 'test', 'locID': 3},
				{'name': 'test4', 'region': 'test', 'country': 'test', 'locID': 4}
			]; */
		}
	  	var storedLocations;
		var currentLocation = '3'; // TEST
	
	
	
	function displayStoredLocations() {
		$("#searchResults").css('display', "none");
		$("#strlocationResults").html("");
		var city;
		var country;
		var state;
		var loc;
		var loctext = "";
		
		var newline = "";
	
		
		for (var i=0; i<storedLocations.length; i++)
		{	
			var curLoc = storedLocations[i];
			city = curLoc.name;
			state = curLoc.region;
			country = curLoc.country;
			loctext = city + ", " + state + ", " + country;
			newline = "<div class='removebutton' onclick='removeLocation(" + i + ");'><div class='addtext'";
			newline += "onclick='setSelectedLocation(\"" + curLoc.locID + "\"); if (typeof event.stopPropagation != \"undefined\") {"
			newline += "event.stopPropagation(); } if (typeof event.cancelBubble != \"undefined\") { event.cancelBubble = true;}'>" + loctext + "</div></div>";
			$("#strlocationResults").append(newline);
			 $("#searchClose").click(CloseFloatingWindow);
			
		}
	
	}
	function saveStoredLocations() {
		var s = JSON.stringify(storedLocations);
		StoreGlobalKey('storedLocations', s);
	}
	
	function addLocation(name, region, country, locID) {
		var newLoc = {'name': name, 'region': region, 'country': country, 'locID': locID.toString()};
		var locationIdx = isLocationExists(newLoc['locID']);
		if (locationIdx == -1) {
			storedLocations.push(newLoc);
			saveStoredLocations();
			
		}
		
		setSelectedLocation(newLoc.locID);
	}
	function removeLocation(idx) {
		
		if (idx >= storedLocations.length) return;
		
		delete storedLocations[idx];
		var s = JSON.stringify(storedLocations);
		s = s.replace(/null,/g, '');
		s = s.replace(/,null/g, '');
		s = s.replace(/null/g, '');
		storedLocations = eval(s);
		saveStoredLocations();
		
		if (storedLocations.length == 0) { // all locations deleted, change toolbar to "Search for location"
			StoreGlobalKey('selectedLocation', '');
		} else {
			var selectedLocation = RetrieveGlobalKey('selectedLocation');
			var selectedLocation = currentLocation; //test
			if (selectedLocation != null && selectedLocation != '') {
				if (isLocationExists(selectedLocation) == -1) { // current location deleted, change to next location in line
					StoreGlobalKey('selectedLocation', storedLocations[0].locID);
					currentLocation = '1';
				}
			}
		}
		displayStoredLocations();
	}
	function saveStoredLocations() {
		var s = JSON.stringify(storedLocations);
		StoreGlobalKey('storedLocations', s);
	}
	
	function addLocation(name, region, country, locID) {
		var newLoc = {'name': name, 'region': region, 'country': country, 'locID': locID.toString()};
		var locationIdx = isLocationExists(newLoc['locID']);
		if (locationIdx == -1) {
			storedLocations.push(newLoc);
			saveStoredLocations();
			
		}
		
		setSelectedLocation(newLoc.locID);
	}
	 function setCurrentCity(city, state, country, loc)
          {
			 
			addLocation(city, state, country, loc)
	  }
	function setSelectedLocation(locID) {
		
		
		StoreGlobalKey('selectedLocation', locID);
		RefreshToolbar();
		setTimeout(CloseFloatingWindow, 200);
		
	}
	
	function isLocationExists(locID) {
		for (var i=0; i<storedLocations.length; i++) {
			if (storedLocations[i].locID == locID)
				return i;
		}
		return -1;
	}
	</script>
	
	


	
	<link rel="stylesheet" href="css/style2.css" />
  </head>
  <body>
    <div id="container">
		<div id="searchClose">
		</div>
		<div id="search">
			<div id="searchContainer">
				<div id="logo">
				</div>
				<div id="searchWrapper">
					<input id="searchInput" type="text" value="Enter Zipcode or City, State" class="cleardefault"></input>
					<div id="searchBtn" title="Click">
					</div>
				</div>
			</div>
			<div id="searchResults">
				<ul id="ResultsList">
					<!-- <li class='result' onclick='setCurrentCity(" + i + ");'>
						<div class='addbutton'>
							<div class='addtext'>test</div>
						</div>
					</li>
					-->
				</ul>
			</div>
			<div id="strlocationResults">
			</div>
		</div>
	</div>
  </body>
</html>