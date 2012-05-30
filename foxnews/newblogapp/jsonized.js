var ConduitHTMLComponent = {
    "BTNCaption" : "Foxnews Radio",
    "BTNURL" : "Images/19x19.png",
    "GadgetWindow" : {
        "GWURL" : "http://cap1.conduit-apps.com/Apps/BlogApps/Foxnews/CIBB.html",
        "GWWidth" : 456,
        "GWHeight" : 500
    }
};
var ConduitGadgetWindow = {
    "tabCount" : 5,
    "tabsData" : [
        {
            "tabName" : "News",
            "tabID" : "news",
            "tabType" : "RSS",
            "feedType" : "burner",
            "tabSource" : "http://feeds.foxnewsradio.com/foxnewsradiocom",
            "tabIcons" : {
                "tabRegular" : "Images/news.png",
                "tabClicked" : "Images/news_over.png" 
            } 
        },
        {

            "tabName" : "Twitter",
            "tabID" : "twitter",
            "tabType" : "Twitter",
            "tabSource" : "http://twitter.com/statuses/user_timeline/11611052.rss",
            "publisherName" : "Fox News",
            "screenName" : "foxnews",
            "twitIcon" : "Images/twiticon.gif",
            "tabIcons" : { "tabRegular" : "Images/twitter.png", "tabClicked" : "Images/twitter_over.png" }
        },
        {
            "tabName" : "Facebook",
            "tabID" : "facebook",
            "tabType" : "Facebook",
            "tabSource" : "187432262698",
            "tabIcons" : { "tabRegular" : "Images/facebook.png", "tabClicked" : "Images/facebook_over.png" } 
        },
        {
            "tabName" : "Podcasts",
            "tabID" : "podcasts",
            "tabType" : "Custom",
            "tabIcons" : {
                "tabRegular" : "Images/podcasts.png",
                "tabClicked" : "Images/podcasts_over.png"
            },
			"customCode" : 'ClearTabSelection();var t = $(".contentText").clone(); $(".content").empty().append(t); $(".contentText")["height"](287);$(".content")["height"](287);$(".twitterAvatar")["css"]("display","none");$("#podcasts")[0]["src"]=ConduitGadgetWindow.tabsData[3].tabIcons.tabClicked;$("#contentHeaderText")["text"]("Podcasts");$(".contentText")["css"]("width","378px");$(".contentText")["append"]("<iframe style=\'position:absolute;top:-45px;left:-23px;height:333px;\' width=\'408px;\' src=\'http://cap1.conduit-apps.com/Apps/foxPodcast/Player.html\'></iframe>");$(".tabs")["bind"]("click",TabsClick);$(".contentText").css("overflow","");'
        },
	{
            "tabName" : "Listen",
            "tabID" : "listenup",
            "tabType" : "Embed",
            "tabSource" : '<object id=MMPlayer1 codebase=http://activex.microsoft.com/activex/controls/mplayer/en/nsmp2inf.cab#Version=5,1,52,701 type=application/x-oleobject height=175 width=320 align=absmiddle classid=CLSID:22d6f312-b0f6-11d0-94ab-0080c74c7e95> <param name="FileName" value="http://mfile.akamai.com/13873/live/reflector:24137.asx?bkup=45931"> <param name="ShowControls" value="1"> <param name="ShowStatusBar" value="1"> <param name="ShowDisplay" value="1"> <param name="DefaultFrame" value="Slide"> <param name=”PlayCount” value="1"> <param name="Autostart" value="1"> <embed src="http://mfile.akamai.com/13873/live/reflector:24137.asx?bkup=45931" width=320 height=175 autostart=1 loop=0 align="absmiddle" type="application/x-mplayer2" pluginspage="http://www.microsoft.com/Windows/MediaPlayer/download/default.asp" showcontrols=1 showdisplay=1 showstatusbar=1 > </embed></object>',
            "embedID" : "MMPlayer1",
            "tabIcons" : { "tabRegular" : "Images/listen.png", "tabClicked" : "Images/listen_over.png"}
        }
    ],
    "Background" : "url('Images/background2.png')",
    "Logo" : "Images/newlogo.png",
    "webURL" : "http://www.foxnewsradio.com/",
    "closeBTN" : "Images/close-button.png",
    "likeURL" : "http://www.foxnews.com",
    "scrollColor" : {"DragColor":"#7B131A", "TrackColor" : "#BABFC3"},
    "noTabSpacing" : "true"
};