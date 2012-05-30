<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>		
		<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
		<title>Accuweather Toolbar</title>
	

	    <script type="text/javascript" language="javascript" src="js/jquery.js"></script>
		<script type="text/javascript" language="javascript" src="http://api.conduit.com/BrowserCompApi.js"></script>
		<script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.9/jquery-ui.js" type="text/javascript"></script>

        <link href="css/global.css" type="text/css" rel="stylesheet" />
		<link href="css/index.css" type="text/css" rel="stylesheet" />
        <script type="text/javascript">
                            var currentLoc = "";
							var farencelc;
							
							
							var TARGET = "#_tab";
                           
                            $(document).ready(function() {
								
								$(".comp-1 .drop").click(openSearchGadget);
								$(".comp-8 .settingsicon").click(openCelciusGadget);
								$(".comp-1 .comp-wrapper .title").click(openSearchGadget);
								farencelc = "0";
							   currentLoc = RetrieveGlobalKey('selectedLocation');
								
								if (currentLoc == null || currentLoc == '') {
									currentLoc = 'Select location...';
									FirstTime();	
								}
								else{
									getLocInfo();
									setInterval('getLocInfo()', 10*60*1000);
								}
																
							});
							function EBGlobalKeyChanged (key, value) 
								{	
									 currentLoc = RetrieveGlobalKey('selectedLocation');
								if (currentLoc == null || currentLoc == '') {
									currentLoc = 'Select location...';
									FirstTime();
									
								}
								else{
									getLocInfo();
									setInterval('getLocInfo()', 10*60*1000);
								}
								}
                           	function FirstTime()
								{
										
										$(".comp-1 .comp-wrapper .title").html(currentLoc);
									
										$("#comp-2").hide();
										$("#comp-3").hide();
										$("#comp-4").hide();
										$("#comp-5").hide();
										$("#comp-6").hide();
										$("#comp-8").hide();

										var containerWidth = "";
											containerWidth = $("#comp-1").width();
											containerWidth = containerWidth + $("#comp-2").width();
											containerWidth = containerWidth + $("#comp-3").width();
											containerWidth = containerWidth + $("#comp-4").width();
											containerWidth = containerWidth + $("#comp-5").width();
											containerWidth = containerWidth + $("#comp-6").width();
											containerWidth = containerWidth + $("#comp-8").width();
											
											setTimeout(function() {
											ChangeWidth(containerWidth);
											}, 200);	

								}
							function openSearchGadget() {
								<?php define("HOST", 'http://' . $_SERVER['HTTP_HOST'] . dirname($_SERVER['PHP_SELF']) . '/'); ?>
								var APP_PATH = "<?php print HOST; ?>";
								var h = 314;
								var w = 314;
								var features = "savelocation=0,openposition=offset:(0;28),closeonexternalclick=yes,saveresizedsize=no,titlebar=no,closebutton=no,resizable=no,hscroll=no,vscroll=no";
								if ($.browser.msie) {
									h += 40;
								} else if (!$.browser.mozilla) {
									h += 17;
								}
								OpenGadget(APP_PATH + 'aweathergad.php', w, h, features);
							} 
							 function openCelciusGadget() {
								<?php define("HOST", 'http://' . $_SERVER['HTTP_HOST'] . dirname($_SERVER['PHP_SELF']) . '/'); ?>
								var APP_PATH = "<?php print HOST; ?>";
								var h = 26;
								var w = 64;
								var features = "savelocation=0,openposition=alignment:(B;R),closeonexternalclick=yes,saveresizedsize=no,titlebar=no,closebutton=yes,resizable=no,hscroll=no,vscroll=no";
								if ($.browser.msie) {
									h += 26;
								} else if (!$.browser.mozilla) {
									h += 26;
								}
								OpenGadget(APP_PATH + 'metricgad.html', w, h, features);
							} 
							function redirect(url)
							{
									NavigateInMainFrame(url);
							}
                            function getLocInfo()
                            {	
							

								farencelc = RetrieveGlobalKey('farencelc');	
								if (farencelc == null || farencelc == '') {
									farencelc = '0';
								}
								currentLoc = RetrieveGlobalKey('selectedLocation');
									
									$.ajax({ type:"GET", url: "proxy.php?loc=" + currentLoc + "&metric=" + farencelc, dataType: "xml", success: parseXML });
								
							
                                function parseXML(xml)
                                {
									var metric = "&#176;" + $(xml).find("units").find("temp").text();
									var daylight;
									var toolTip;
									var redirectUrl;
                                   	$(xml).find("local").each(function()
										{
											var text = "";
											var Country = "";
											var ht = "";
											var state = "";
											 text = $(xml).find("city").text();
											 Country = $(xml).find("country").text();
											 state = $(xml).find("adminArea").text();
											$(".comp-1 .comp-wrapper .title").html(text + ", " + state + ", " + Country);

										
										
							
										});
									$(xml).find("currentconditions").each(function()
										{
											daylight = $(this).attr("daylight").toString();
											var icon = $(this).find("weathericon").text();
							
											var temp = $(this).find("temperature").text();
											tooltip = $(this).find('weathertext').text();
											redirectUrl = $(this).find("url").text();
											$(".wconditions", "#comp-2").css('background-image', 'url(images/weather/icon' + icon + '.png)');
											$("#comp-2").unbind('click');
											$("#comp-2").click( function() { redirect(redirectUrl); } );
											
											
											$("#comp-2").attr('title', tooltip);
											$(".temp", "#comp-2").html(temp + metric);
											
										});
										$(xml).find("watchwarnareas").each(function()
										{
											
											var warning = "";
											var isActive = "0";
											isActive = $(this).attr("isactive").toString();
											warning = $(this).find("url").text();
											
											if (isActive == "1")
											{
												$(".nalert").show();
												$(".nalert").click( function() { redirect(warning); } );
											}
											
												
												
											
										});
									$(xml).find("day[number='1']").each(function()
										{
											var icon2;
											var s;
											var hightemp;
											var lowtemp;
											var hovtitle;
											if(daylight == "True")
											{	
												s = "daytime";
											}
											else
											{
												s = "nighttime";
												$(".title", "#comp-3").html('Tonight');
											}
											var redirectUrl2 = "";
											redirectUrl2 = $(this).find("url").text();
											icon2 = $(this).find(s).find('weathericon').text();
											hovtitle = $(this).find(s).find('txtshort').text();
											$("#comp-3").unbind('click');
											$("#comp-3").click( function() { redirect(redirectUrl2); } );
											$(".ticon", "#comp-3").css('background-image', 'url(images/weather/icon' + icon2 + '.png)');
											$("#comp-3").attr('title', hovtitle);
											hightemp = $(this).find(s).find("hightemperature").text();
											lowtemp = $(this).find(s).find("lowtemperature").text();
											
										
											$(".temp", "#comp-3").html("H: " + hightemp + metric + " / L: " + lowtemp + metric);
										  
										});
									$(xml).find("day[number='2']").each(function()
										{
											var icon3;
											var k;
											var htemp;
											var ltemp;
											if(daylight == "True")
											{	
												k = "daytime";
											}
											else
											{
												k = "nighttime";
											}
											var redirectUrl3 = "";
											 var htitle = "";
											redirectUrl3 = $(this).find("url").text();
											icon3 = $(this).find(k).find('weathericon').text();
											htitle = $(this).find(k).find('txtshort').text();
										
											htemp = $(this).find(k).find("hightemperature").text();
											ltemp = $(this).find(k).find("lowtemperature").text();
											$(".tomicon", "#comp-4").css('background-image', 'url(images/weather/icon' + icon3 + '.png)');
											$("#comp-4").unbind('click');
											$("#comp-4").click( function() { redirect(redirectUrl3); } );
											
											$("#comp-4").attr('title', htitle);
											$(".temp", "#comp-4").html("H: " + htemp + metric + " / L: " + ltemp + metric);
										
										});
										$(xml).find("hourly").each(function()
										{
											
											var redirectUrl4 = "";
											var toolt = "";
											redirectUrl4 = $(this).find("traditionalLink").text();
											
											toolt = "hourly";
											
											$("#comp-5").unbind('click');
											$("#comp-5").click( function() { redirect(redirectUrl4); } );
											$("#comp-5").attr('title', toolt);
										
										
										});
										$(xml).find("day[number='3']").each(function()
										{
											
											var t="";
										
											if(daylight == "True")
											{	
												t = "daytime";
											}
											else
											{
												t = "nighttime";
											}
											var redirectUrl5 = "";
											var tooltip2 = "";
											redirectUrl5 = $(this).find("url").text();
											
											tooltip2 = "15 days";
						
											$("#comp-6").unbind('click');
											$("#comp-6").click( function() { redirect(redirectUrl5); } );
											$("#comp-6").attr('title', tooltip2);
											
										});
										/*	var containerWidth = "";
											containerWidth = $("#comp-1").width();
											containerWidth = containerWidth + $("#comp-2").width();
											containerWidth = containerWidth + $("#comp-3").width();
											containerWidth = containerWidth + $("#comp-4").width();
											containerWidth = containerWidth + $("#comp-5").width();
											containerWidth = containerWidth + $("#comp-6").width();
											containerWidth = containerWidth + $("#comp-8").width();
											
											setTimeout(function() {
											ChangeWidth(containerWidth);
											}, 200);*/
											
									
									}
									
                            }
                           
    </script>
	</head>
	<body>
		<div class="toolbar">
				<div class="toolbar-wrapper">
				<div class="comp comp-1" id="comp-1">
				<div class="comp-wrapper">
					<div class="title"></div>
					<div class="drop"></div>
				</div>
				</div>
				<div class="comp comp-2" id="comp-2">
					<div class="comp-wrapper">
					<div class="title">Now:</div>
					<div class="wconditions">
						<div class="nalert"></div>
					</div>
					<div class="temp">N\A</div>
					<div class="spacer"></div>
					</div>
				</div>
				<div class="comp comp-3" id="comp-3">
					<div class="comp-wrapper" >
						<div class="title">Today:</div>
					<div class="ticon">
						<div class="talert"></div>
					</div>
					<div class="temp">N\A</div>
					<div class="spacer"></div>
					</div>
				</div>
				<div class="comp comp-4" id="comp-4">
					<div class="comp-wrapper">
					<div class="title">Tom:</div>
					<div class="tomicon">
						<div class="tomalert"></div>
					</div>
					<div class="temp">N\A</div>
					<div class="spacer"></div>
					</div>
				</div>
				<div class="comp comp-5" id="comp-5">
					<div class="comp-wrapper">
						<div class="hicon"></div>
					</div>
				</div>
				<div class="comp comp-6" id="comp-6">
					<div class="comp-wrapper">
						<div class="fdicon"></div>
					</div>
					<div class="spacer"></div>
				</div>
				<div class="comp comp-8" id="comp-8">
					<div class="comp-wrapper">
						<div class="settingsicon"></div>
					</div>
				</div>
			</div>
			</div>
		</div>
	</body>
</html>
