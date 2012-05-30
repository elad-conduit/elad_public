$(document).ready(function(){
   var serverPrefix = "http://ec2-75-101-207-56.compute-1.amazonaws.com/BloggerBox/";
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

        //contentType: "charset=windows-1255",
       // dataType: "html",
        beforeSend: function(xhr) {
            SetProgressImage(true);
        },
        complete: function(xhr, code) {
            SetProgressImage(false);
        $("a").click(function(){
            setTimeout(CloseFloatingWindow, 1000);
        });
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
                            handleRSS(i);
                            break;
                        }
                    case 'Twitter':
                        {
                            handleTwitter(i);
                            break;
                        }
                    case 'Facebook':
                        {
                            handleFacebook(i);
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
        $('.contentText').append(result);
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
    $(".contentText").append("<iframe id='facebookFeed' width='368px' height='380px' frameborder='0' marginheight='0' marginwidth='0' scrolling='no' src='http://www.connect.facebook.com/widgets/fan.php?api_key=b2b9bf8f7ac4b1589e4fb83f4c8ecc97&amp;channel_url=file%3A%2F%2F%2FC%3A%2FDocuments%2520and%2520Settings%2FOfer%2FLocal%2520Settings%2FTemp%2Fnon106.htm%3Ffbc_channel%3D1&amp;id=" + ConduitGadgetWindow.tabsData[tabIndex].tabSource + "&amp;name=&amp;width=400&amp;connections=0&amp;stream=1&amp;logobar=0&amp;css='></iframe>");
    $(".contentText").jScrollPane({ scrollbarWidth: 0});
    $("#facebookFeed").load(function() {
        $("#stream_content").css('height', '150px');
    });
    $('.tabs').bind('click', TabsClick);
    $('.jScrollPaneContainer')[0].style.height=jScrollPaneHeight;
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
    $(".contentText").jScrollPane({ scrollbarWidth: 0});
    $('.tabs').bind('click', TabsClick);
    $('.jScrollPaneContainer')[0].style.height=jScrollPaneHeight;
}
    
});