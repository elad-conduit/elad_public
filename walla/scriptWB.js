
$(document).ready(function() {

    var jScrollPaneHeight = '287px';

    // Constants
    var NEWS_TAB_IMAGE_URL = 'Images/news_reg.gif';
    var NEWS_TAB_CLICKED_IMAGE_URL = 'Images/news_clicked.gif';
    var TWITTER_TAB_IMAGE_URL = 'Images/twitter_reg.gif';
    var TWITTER_TAB_CLICKED_IMAGE_URL = 'Images/twitter_clicked.gif';
    var FACEBOOK_TAB_IMAGE_URL = 'Images/facebook_reg.gif';
    var FACEBOOK_TAB_CLICKED_IMAGE_URL = 'Images/facebook_clicked.gif';
    var PHOTOS_TAB_IMAGE_URL = 'Images/photos_reg.gif';
    var PHOTOS_TAB_CLICKED_IMAGE_URL = 'Images/photos_clicked.gif';
    var TWITTER_BASE_URL = "http://www.twitter.com/";

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

       // contentType: "application/json; charset=utf-8",
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
            $(".contentText").append("<div class='text'>Service is unavailable at this time. Please try again later."+ xhr + "</div>");
            $('.tabs').bind('click', TabsClick);
            $(".contentText").jScrollPane({ scrollbarWidth: 8 });
        }
    });

    $('.twitterAuthorFollowMe img').hover(function(event) {
        this.src = "Images/but_over_mash.png";
    }, function(event) {
        this.src = "Images/but.png";
    })

    SelectTab('newsTab');
    //tabs selector
    function ClearTabSelection() {
        $('#newsTab')[0].src = NEWS_TAB_IMAGE_URL;
        $('#twitterTab')[0].src = TWITTER_TAB_IMAGE_URL;
        $('#facebookTab')[0].src = FACEBOOK_TAB_IMAGE_URL;
        $('#photosTab')[0].src = PHOTOS_TAB_IMAGE_URL;
        // Clean old results
        $(".contentText").empty();
        // Disable all tabs
        $(".tabs").unbind('click');
        // Reset Scroll Height
    }
    
    function SelectTab(tabName) {
        switch (tabName) {
            case 'newsTab':
                {
                    ClearTabSelection();
                    $('#newsTab')[0].src = NEWS_TAB_CLICKED_IMAGE_URL;
                    $('#contentHeaderText').text('News');
                    $('.contentText').height(287);
                    $('.content').height(287);
                    $('.twitterAvatar').css('display', 'none');
                    $.ajax({
                        url: "readRSS.php",
                        //RSS News
                        data: "url=http://rss.walla.co.il/?w=/1/22/0/@rss",
                        success: function(result) {
                            /*alert(result);*/
                            $(".contentText").css('width', '378px');
                            $(".contentText").append(result);

                            $(".contentText").jScrollPane({ scrollbarWidth: 8 });
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
                            autoScroll();
                            $('.tabs').bind('click', TabsClick);
                            $('.jScrollPaneContainer')[0].style.height=jScrollPaneHeight;
                        }
                    });
                    break;
                }
            case 'twitterTab':
                {
                    ClearTabSelection();
                    $('.contentText').height(233);
                    $('.content').height(233);
                    $('.twitterAvatar').css('display', 'block');
                    $('#twitterTab')[0].src = TWITTER_TAB_CLICKED_IMAGE_URL;
                    $('#contentHeaderText').text('Twitter');
                    $.ajax({
                        url: "readTWIT.php",
                        //Twitter RSS Feed
                        data: "url=http://twitter.com/statuses/user_timeline/98387838.rss",
                        success: function(result) {
                            $(".contentText").css('width', '378px');
                            $(".contentText").append(result);
                           /* for (index = 0; index < result.d.length; index++) {
                                $(".contentText").append("<div class='text'>" + result.d[index].Description + "</div>" + "<div class='date'>" + "<br/><a href='" + result.d[index].Link + "'>" + result.d[index].PublicationDate + "</a></div><hr />");
                            }*/
                            $(".contentText").jScrollPane({ scrollbarWidth: 8 });
                            $('.tabs').bind('click', TabsClick);
                        }
                    });

                    $.ajax({
                        //Twitter User Details Feed
                        url: "readTPUB.php",
                        data: "url=http://twitter.com/users/show/98387838.xml",
                        success: function(result) {
                            eval(result);
                            $('.twitterAuthorName').text(tpubname);
                            $('#twitterAuthorScreenName').text(tpubscreen);
                            $('.twitterAuthorImage img')[0].src = tpubprofileimg;
                            $('#twitterAuthorLink')[0].href = TWITTER_BASE_URL + tpubscreen + "#_tab";
                            $('.twitterAuthorFollowMe')[0].href = TWITTER_BASE_URL + tpubscreen + "#_tab";
                        }   
                    });
                    // Modify scroll height to take footer into account
                    $('.jScrollPaneContainer')[0].style.height='233px';
                    break;
                }
            case 'facebookTab':
                {
                    ClearTabSelection();
                    $('.contentText').height(287);
                    $('.content').height(287);
                    $('.twitterAvatar').css('display', 'none');
                    $('#facebookTab')[0].src = FACEBOOK_TAB_CLICKED_IMAGE_URL;
                    $('#contentHeaderText').text('Facebook');
                    $(".contentText").css('width', '378px');
                    $(".contentText").append("<iframe width='368px' height='287px' frameborder='0' marginheight='0' marginwidth='0' scrolling='no' src='http://www.facebook.com/connect/connect.php?id=329508405871&connections=10&stream=0'></iframe>");
                    $(".contentText").jScrollPane({ scrollbarWidth: 0 });
                    $('.tabs').bind('click', TabsClick);
                    $('.jScrollPaneContainer')[0].style.height=jScrollPaneHeight;
                    break;
                }
                
               case 'photosTab':
                {
                      ClearTabSelection();
                    $('.contentText').height(287);
                    $('.content').height(287);
                    $('.twitterAvatar').css('display', 'none');
                    $('#photosTab')[0].src = PHOTOS_TAB_CLICKED_IMAGE_URL;
                    $('#contentHeaderText').text('Yes וואלה');
                    $(".contentText").css('width', '378px');
                    $(".contentText").append('<embed height="301" width="300" pluginspage="http://www.macromedia.com/shockwave/download/index.cgi?P1_Prod_Version=ShockwaveFlash" type="application/x-shockwave-flash" allowscriptaccess="always" bgcolor="" wmode="transparent" quality="high" src="http://isc.walla.co.il/w6/v/yes/sdarot_pics_only3.swf?id=90&amp;tuid=14924706644519&amp;showMovie=0&amp;host=player.walla.co.il&amp;application=walla.yes&amp;content=&amp;provider=yes&amp;geo=IL&amp;net=yes&amp;page=&amp;rot=">');
                    $(".contentText").jScrollPane({ scrollbarWidth: 0 });
                    $('.tabs').bind('click', TabsClick);
                    $('.jScrollPaneContainer')[0].style.height=jScrollPaneHeight;
                    break;
     
                }
                
        }
    };
});