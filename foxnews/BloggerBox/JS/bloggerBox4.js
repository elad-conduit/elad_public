   var serverPrefix = "http://cap1stg.conduit-apps.com/BloggerBox/";
   var twitterPrefix = "http://cap1stg.conduit-apps.com/TwitAnywhere/";
   var tinyURLPrefix = "http://cap1stg.conduit-apps.com/tinyURL/";
$(document).ready(function(){
   var jScrollPaneHeight = '287px';

    // Hide the proggress image
    $('#progress').css('display', 'none');


    $('#close').click(function(event) {
        CloseFloatingWindow();
    });
    
    function TabsClick(event) {
        var selectedTab = event.target.id;
        SelectTab(selectedTab);
    }
    
    function SetProgressImage(show) {
        if (show) {
            var left = $('.contentWrapper').width() / 2 - 24;
            var top = $('.contentWrapper').height() / 2 - 36;
            $('.progress').css('display', 'block');
            $('.progress').css('left', left);
            $('.progress').css('top', top);
        }
        else {
            $('.progress').css('display', 'none');
        }
    }
    
    $.ajaxSetup({
        //type: "GET",
         async:true,
        contentType: "application/json; charset=utf-8",
       // dataType: "html",
        beforeSend: function(xhr) {
            SetProgressImage(true);
        },
        complete: function(xhr, code) {
            SetProgressImage(false);
        $("a").click(function(){
            if (this.className != "share")
               setTimeout(CloseFloatingWindow, 1000);
	    NavigateInMainFrame($(this).attr('href'));
        });
        $(".contentText").jScrollPane({ scrollbarWidth: 8 });
        if (ConduitGadgetWindow.scrollColor)
        {
         $(".jScrollPaneDrag").css('background', ConduitGadgetWindow.scrollColor.DragColor);
         $(".jScrollPaneTrack").css('background', ConduitGadgetWindow.scrollColor.TrackColor);
        }
        if (ConduitGadgetWindow.headerColor)
        {
         $(".contentHeader").css('background-color', ConduitGadgetWindow.headerColor);
        }
         $('.contentText').fadeIn(1500);
        },
        error: function(xhr, errtype) {
            $(".contentText").append("<a href='" + ConduitGadgetWindow.webURL + "#_tab'> <div class='text'>Service is unavailable at this time. Please try again later.</div></a>");
	    $("a").click(function(){
                setTimeout(CloseFloatingWindow, 1000);
            });
            $('.tabs').bind('click', TabsClick);
            $(".contentText").jScrollPane({ scrollbarWidth: 8 });
        }
    });
    
    $('.twitterAuthorFollowMe img').hover(function(event) {
        this.src = serverPrefix + "Images/but_over_mash.png";
    }, function(event) {
        this.src = serverPrefix + "Images/but.png";
    });
    
    SelectTab(ConduitGadgetWindow.tabsData[0].tabID);
    
    function ClearTabSelection()
    {
        // Unclick all tabs
        for (i=0; i<ConduitGadgetWindow.tabCount; i++)
        {
            $("#" + ConduitGadgetWindow.tabsData[i].tabID)[0].src = ConduitGadgetWindow.tabsData[i].tabIcons.tabRegular;
        }
        // Clean old results
        $(".contentText").empty();
        // Disable all tabs
        $(".tabs").unbind("click");
    }
    
    function SelectTab(tabName)
    {
        for (i=0; i<ConduitGadgetWindow.tabCount; i++)
        {
            if (tabName == ConduitGadgetWindow.tabsData[i].tabID)
            {
                switch (ConduitGadgetWindow.tabsData[i].tabType)
                {
                    case 'RSS':
                        {
                           $('.contentText').css('display', 'none');
                            handleRSS(i);
                            break;
                        }
                    case 'Twitter':
                        {
                           $('.contentText').css('display', 'none');
                            handleTwitter(i);
                            break;
                        }
                    case 'Facebook':
                        {
                           $('.contentText').css('display', 'none');
                            handleFacebook(i);
                            $('.contentText').fadeIn(1500);
                            break;
                        }
                    case 'Embed':
                        {
                            handleEmbed(i);
                            break;
                        }
                    case 'Custom':
                        {
                            eval(ConduitGadgetWindow.tabsData[i].customCode);
                        }
                }
                return;
            }
        }
    }
    
function setFeatures()
{
   if (ConduitGadgetWindow.scrollColor)
   {
    $(".jScrollPaneDrag").css('background', ConduitGadgetWindow.scrollColor.DragColor);
    $(".jScrollPaneTrack").css('background', ConduitGadgetWindow.scrollColor.TrackColor);
   }
   if (ConduitGadgetWindow.headerColor)
   {
    $(".contentHeader").css('background-color', ConduitGadgetWindow.headerColor);
   }
}
    
function handleRSS(tabIndex)
{    
    ClearTabSelection();
    $('#' + ConduitGadgetWindow.tabsData[tabIndex].tabID).attr('src', ConduitGadgetWindow.tabsData[tabIndex].tabIcons.tabClicked);
    $('#contentHeaderText').text(ConduitGadgetWindow.tabsData[tabIndex].tabName);
    $('.contentText').height(287);
    $('.content').height(287);
    $('.twitterAvatar').css('display','none');
    $.ajax({
       url: serverPrefix + "PHP/readFeed.php",
       data: "url=" + ConduitGadgetWindow.tabsData[tabIndex].tabSource + "&type=" + ConduitGadgetWindow.tabsData[tabIndex].feedType,
       success: function(result)
       {
        $('.contentText').css('width', '378px');
		// New Dimensions Logic
		if (ConduitGadgetWindow.feedArea.width)
		{
			$('.content').width(parseInt(ConduitGadgetWindow.feedArea.width));
			$('.contentText').width(parseInt(ConduitGadgetWindow.feedArea.width));
		}
		if (ConduitGadgetWindow.feedArea.height)
		{
			$('.content').height(parseInt(ConduitGadgetWindow.feedArea.width));
			$('.contentText').height(parseInt(ConduitGadgetWindow.feedArea.width));
		}
        $('.contentText').append(result);
        SetProgressImage(false);
        if(ConduitGadgetWindow.sharelinks)
        {
         $.each($('.text'), function(index, value){
          addShareLinks(index, value);
         });
        }
		
         $('.contentText').jScrollPane({ scrollbarWidth:8 });
        
        var imagesNumber = $(".contentText").find("img").size();
        $(".contentText").find("img").bind('load', function(event) {
            var width = $(this).width();
            if (width > 150) {
                var proportion = (150 / width) * 100;
                $(this).width(150);
                $(this).height(proportion + "%");
            }
            $(this).css('display', 'block');
            if (--imagesNumber == 0) {
                $(".contentText").jScrollPane({ scrollbarWidth: 8 });
            }
        });
        $('.tabs').bind('click', TabsClick);
        $('.jScrollPaneContainer')[0].style.height=jScrollPaneHeight;
		
       }
    });    
}

function handleTwitter(tabIndex)
{
    ClearTabSelection();
    $('.contentText').height(233);
    $('.content').height(233);
    $('.twitterAvatar').css('display', 'block');
    $('#' + ConduitGadgetWindow.tabsData[tabIndex].tabID)[0].src = ConduitGadgetWindow.tabsData[tabIndex].tabIcons.tabClicked;
    $('#contentHeaderText').text(ConduitGadgetWindow.tabsData[tabIndex].tabName);
    $.ajax({
       url: serverPrefix + "PHP/readFeed.php",
       data: "url=" + ConduitGadgetWindow.tabsData[tabIndex].tabSource + "&type=twitter",
       success: function(result)
       {
        $('.contentText').css('width', '378px');
        $('.contentText').append(result);
        $('.contentText').jScrollPane({ scrollbarWidth:8 });
        $('.tabs').bind('click', TabsClick);
        $('.twitterAuthorName').text(ConduitGadgetWindow.tabsData[tabIndex].publisherName);
        $('#twitterAuthorScreenName').text(ConduitGadgetWindow.tabsData[tabIndex].screenName);
        $('.twitterAuthorImage img')[0].src = ConduitGadgetWindow.tabsData[tabIndex].twitIcon;
        $('#twitterAuthorLink')[0].href = "http://www.twitter.com/" + ConduitGadgetWindow.tabsData[tabIndex].screenName + "#_tab";
        $('.twitterAuthorFollowMe')[0].href = "http://www.twitter.com/" + ConduitGadgetWindow.tabsData[tabIndex].screenName + "#_tab";
		
	if (ConduitGadgetWindow.feedArea.width)
	{
		alert('new width found');
		$('.contentText').css('width', parseInt(ConduitGadgetWindow.feedArea.width));
	}
	if (ConduitGadgetWindow.feedArea.height)
	{
		$('.contentText').css('height', parseInt(ConduitGadgetWindow.feedArea.width));
	}
		
       }
    });
    $('.jScrollPaneContainer')[0].style.height='233px';
}

function handleFacebook(tabIndex)
{
    ClearTabSelection();
    $('.progress').css('display', 'none');
    $('.contentText').height(300);
    $('.content').height(300);
    $('.twitterAvatar').css('display', 'none');
    $('#' + ConduitGadgetWindow.tabsData[tabIndex].tabID)[0].src = ConduitGadgetWindow.tabsData[tabIndex].tabIcons.tabClicked;
    $('#contentHeaderText').text(ConduitGadgetWindow.tabsData[tabIndex].tabName);
    $(".contentText").css('width', '378px');
    $(".contentText").css('height', '280px');
    $(".contentText").append("<iframe id='facebookFeed' width='368px' height='390px' frameborder='0' marginheight='0' marginwidth='0' scrolling='no' src='http://www.connect.facebook.com/widgets/fan.php?api_key=b2b9bf8f7ac4b1589e4fb83f4c8ecc97&amp;channel_url=file%3A%2F%2F%2FC%3A%2FDocuments%2520and%2520Settings%2FOfer%2FLocal%2520Settings%2FTemp%2Fnon106.htm%3Ffbc_channel%3D1&amp;id=" + ConduitGadgetWindow.tabsData[tabIndex].tabSource + "&amp;name=&amp;height=280&amp;width=400&amp;connections=0&amp;stream=1&amp;logobar=0&amp;css='></iframe>");
    $(".contentText").jScrollPane({ scrollbarWidth: 0});
    $("#facebookFeed").load(function() {
        $("#stream_content").css('height', '150px');
    });
    $('.tabs').bind('click', TabsClick);
    $('.jScrollPaneContainer')[0].style.height=jScrollPaneHeight;
    setFeatures();
}

function handleEmbed(tabIndex)
{
    ClearTabSelection();
    $('.contentText').height(287);
    $('.content').height(287);
    $('.twitterAvatar').css('display', 'none');
    $('#' + ConduitGadgetWindow.tabsData[tabIndex].tabID)[0].src = ConduitGadgetWindow.tabsData[tabIndex].tabIcons.tabClicked;
    $('#contentHeaderText').text(ConduitGadgetWindow.tabsData[tabIndex].tabName);
    $(".contentText").css('width', '378px');
    $(".contentText").css('height', '430px');
    $(".contentText").append(ConduitGadgetWindow.tabsData[tabIndex].tabSource);
    $("#" + ConduitGadgetWindow.tabsData[tabIndex].embedID).css('padding-left', 25);
    //$(".contentText").jScrollPane({ scrollbarWidth: 0});
    $('.tabs').bind('click', TabsClick);
    //$('.jScrollPaneContainer')[0].style.height=jScrollPaneHeight;
    setFeatures();
}

function addShareLinks(index, elm)
{
   // Extract data for sharelinks -- Kinda dodgy, better off manipulating the PHP
   var entryLink = String($('.feedlink')[index].href).split("#_tab")[0];
   var entryTitle = String($('.feedlink')[index].innerHTML);
   var entryDescription = String($('.text')[index].innerHTML);
   var tinyURLLink = entryLink;
   $.ajax({
      url: tinyURLPrefix + "tinyURL.php",
      data: "url=" + entryLink,
      success: function(result)
      {
         if (result)
            tinyURLLink = result;
         var twitdefaultmsg = entryTitle + encodeURIComponent('\n') + "Read all about it at " + tinyURLLink + encodeURIComponent('\n');
         elm.innerHTML = elm.innerHTML + '<br/><br/><div class="sharediv"><a class="share" href="' + twitterPrefix + 'twit-blogapp.html?defaultMsg=' + twitdefaultmsg + '" target="_blank"> <img alt="Share on Twitter" src="' + serverPrefix + 'Images/twitter.png"/> </a><a class="share" href="http://www.facebook.com/share.php?u=' + entryLink + '" target="_blank"><img alt="Share on Facebook" src="' + serverPrefix + 'Images/facebook.png"/></a><a class="share" href="mailto:?subject=' + entryTitle + '&body=Check this out:' + encodeURIComponent("\n") + entryLink + encodeURIComponent("\n") + entryDescription + '"><img alt="Mail to a friend" src="' + serverPrefix + 'Images/email.png"/></a></div><div class="text">' + '</div>';
         elm.className = "text";
         elm.style.float = "left";
         //elm.style.width = String(parseInt(elm.style.width) - 5) + "px";
      }
   });

}
    
});

function twitterHandler(defaultMsg)
{
   twttr.anywhere(function(T){
      if (T.isConnected())
      {
         window.open(twitterPrefix + 'twit-blogapp.html?defaultMsg=' + defaultMsg, 'Tweet your thoughts...', "height=100, width=400");
      }
      else
      {
         T.signIn();
      }
   });
}