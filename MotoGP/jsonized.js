var ConduitHTMLComponent = {
    "BTNCaption" : "Maccabi TLV",
    "BTNURL" : "http://ec2-67-202-51-198.compute-1.amazonaws.com/BlogApps/MotoGP/images/icon.png",
    "GadgetWindow" : {
		"GWURL" : "http://ec2-67-202-51-198.compute-1.amazonaws.com/BlogApps/MotoGP/CIBB.html", 
        "GWWidth" : 463,
        "GWHeight" : 550
	} 
};
var ConduitGadgetWindow = {
    "tabCount" : 4, 
    "tabsData" : [
	{
            "tabName" : "News",
            "tabID" : "news",
            "tabType" : "RSS",
            "feedType" : "rss",
            "tabSource" : "http://www.motogp.com/en/news/rss",
            "tabIcons" : { "tabRegular" : "http://ec2-67-202-51-198.compute-1.amazonaws.com/BlogApps/MotoGP/images/news.png", "tabClicked" : "http://ec2-67-202-51-198.compute-1.amazonaws.com/BlogApps/MotoGP/images/news_over.png" }
        },
	        {
            "tabName" : "youTube",
            "tabID" : "youtube",
            "tabType" : "Embed",
            "tabSource" : '<img style="visibility:hidden;width:0px;height:0px;" border=0 width=0 height=0 src="http://counters.gigya.com/wildfire/IMP/CXNID=2000002.11NXC/bT*xJmx*PTEyNzQ4NjM5MzMwMTAmcHQ9MTI3NDg2Mzk4NTI4MyZwPTkwMjA1MSZkPSZnPTEmb2Y9MA==.gif" /><object id="ci_95634_o" classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" width="320" height="248"><param name="movie" value="http://apps.cooliris.com/embed/cooliris.swf"/><param name="allowFullScreen" value="true"/><param name="allowScriptAccess" value="always"/><param name="bgColor" value="#121212" /><param name="flashvars" value="numrows=2&feed=api%3A%2F%2Fwww.youtube.com%2F%3Fuser%3Dmotogp%26type%3Duploads" /><param name="wmode" value="opaque" /><embed id="ci_95634_e" type="application/x-shockwave-flash" src="http://apps.cooliris.com/embed/cooliris.swf" width="320" height="248" allowFullScreen="true" allowScriptAccess="always" bgColor="#121212" flashvars="numrows=2&feed=api%3A%2F%2Fwww.youtube.com%2F%3Fuser%3Dmotogp%26type%3Duploads" wmode="opaque"></embed></object>',
            "embedID" : "ci_95634_o",
            "tabIcons" : { "tabRegular" : "http://ec2-67-202-51-198.compute-1.amazonaws.com/BlogApps/MotoGP/images/youtube.png", "tabClicked" : "http://ec2-67-202-51-198.compute-1.amazonaws.com/BlogApps/MotoGP/images/youtube_over.png"}
        },

        {
            "tabName" : "Twitter",
            "tabID" : "twitter",
            "tabType" : "Twitter",
            "tabSource" : "http://feeds.feedburner.com/Twitter/Officialmotogp",
            "publisherName" : "MotoGP",
            "screenName" : "OfficialMotoGP",
            "twitIcon" : "http://a3.twimg.com/profile_images/366207999/logo_bigger.jpg",
            "tabIcons" : { "tabRegular" : "http://ec2-67-202-51-198.compute-1.amazonaws.com/BlogApps/MotoGP/images/twitter.png", "tabClicked" : "http://ec2-67-202-51-198.compute-1.amazonaws.com/BlogApps/MotoGP/images/twitter_over.png" }
        },	
	{
            "tabName" : "Facebook",
            "tabID" : "facebook",
            "tabType" : "Facebook",
            "tabSource" : "58201805768",
            "tabIcons" : { "tabRegular" : "http://ec2-67-202-51-198.compute-1.amazonaws.com/BlogApps/MotoGP/images/facebook.png", "tabClicked" : "http://ec2-67-202-51-198.compute-1.amazonaws.com/BlogApps/MotoGP/images/facebook_over.png" }
        }

	
],
    "Background" : "url('http://ec2-67-202-51-198.compute-1.amazonaws.com/BlogApps/MotoGP/images/bg.png')", 
    "Logo" : "http://ec2-67-202-51-198.compute-1.amazonaws.com/BlogApps/MotoGP/images/logo.png",
    "webURL" : "http://www.motogp.com/",
    "closeBTN" : "http://ec2-67-202-51-198.compute-1.amazonaws.com/BlogApps/MotoGP/images/close.png"
};