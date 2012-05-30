// Append required stuff to document

    // Conduit WebComp Api
    var conduitApiScript = document.createElement("script");
    conduitApiScript.setAttribute("type", "text/javascript");
    conduitApiScript.setAttribute("src", "http://api.conduit.com/BrowserCompApi.js");
    
    document.getElementsByTagName("head").item(0).appendChild(conduitApiScript);
    
    // BloggerBox CSS
    var bloggerBoxCSS = document.createElement("link");
    bloggerBoxCSS.setAttribute("rel", "stylesheet");
    bloggerBoxCSS.setAttribute("type", "text/css");
    bloggerBoxCSS.setAttribute("href", "http://ec2-174-129-162-152.compute-1.amazonaws.com/BloggerBox/CSS/bloggerBox.css");
    
    document.getElementsByTagName("head").item(0).appendChild(bloggerBoxCSS);
    
    // jScroll CSS
    var jScrollCSS = document.createElement("link");
    jScrollCSS.setAttribute("rel", "stylesheet");
    jScrollCSS.setAttribute("type", "text/css");
    jScrollCSS.setAttribute("href", "http://ec2-174-129-162-152.compute-1.amazonaws.com/BloggerBox/CSS/jScrollPane.css");
    
    document.getElementsByTagName("head").item(0).appendChild(jScrollCSS);
    
    // Mousewheel script
    var mWheelScript = document.createElement("script");
    mWheelScript.setAttribute("type", "text/javascript");
    mWheelScript.setAttribute("src", "http://ec2-174-129-162-152.compute-1.amazonaws.com/BloggerBox/JS/jMouseWheel.js");
    
    document.getElementsByTagName("head").item(0).appendChild(mWheelScript);
    
    // jScroll script
    var jScrollScript = document.createElement("script");
    jScrollScript.setAttribute("type", "text/javascript");
    jScrollScript.setAttribute("src", "http://ec2-174-129-162-152.compute-1.amazonaws.com/BloggerBox/JS/jScrollPane-1.2.3.js");
    
    document.getElementsByTagName("head").item(0).appendChild(jScrollScript);
    
    // BloggerBox Script
    var bloggerBoxScript = document.createElement("script");
    bloggerBoxScript.setAttribute("type", "text/javascript");
    bloggerBoxScript.setAttribute("src", "http://ec2-174-129-162-152.compute-1.amazonaws.com/BloggerBox/JS/bloggerBox.js");
    
    document.getElementsByTagName("head").item(0).appendChild(bloggerBoxScript);
    
    // Start Injecting HTML Elements
    var currentInjectElement = document.createElement("div");
    currentInjectElement.setAttribute('id', 'wrapper');
    document.getElementsByTagName("body").item(0).appendChild(currentInjectElement);
    var previousInject = currentInjectElement;
    
    $("#wrapper").append("<div class='contentBox'></div>");
    
    $(".contentBox").append('<p style="margin-bottom: 3px"> <a href="' + ConduitGadgetWindow.webURL + '#_tab"> <img class="logo" src="' + ConduitGadgetWindow.Logo + '"/> </a> <img id="close" class="closeCI" src="' + ConduitGadgetWindow.closeBTN + '" /> </p>');
    
    $('.contentBox').append('<div class="tabs"></div>');
    
    for (i=0; i<ConduitGadgetWindow.tabCount; i++)
    {
        $('.tabs').append("<img id='" + ConduitGadgetWindow.tabsData[i].tabID + "' "
                          + "src='" + ConduitGadgetWindow.tabsData[i].tabIcons.tabRegular + "' "
                          + "alt='" + ConduitGadgetWindow.tabsData[i].tabName + "'/>");
    }
    

    $('.contentBox').append('<div class="contentWrapper"></div>');

    $('.contentWrapper').append('<div class="contentHeader"> <p id="contentHeaderText"></p></div>');
    $('.contentWrapper').append('<div class="content"></div>')
    $('.content').append('<div class="contentText"></div>');
    $('.content').append('<div class="progress"> <img src="http://ec2-174-129-162-152.compute-1.amazonaws.com/BloggerBox/Images/ajax-loader.gif" /> </div>');
    
    $('.contentWrapper').append("<div class='twitterAvatar'></div>");
  
    $('.twitterAvatar').append('<div class="twitterAuthorImage"><a id="twitterAuthorLink"><img src="" /></a></div><div class="twitterText"><span class="twitterAuthorName"></span><br /><span id="twitterAuthorScreenName"></span><br /><span><a class="twitterAuthorFollowMe"><img src="http://ec2-174-129-162-152.compute-1.amazonaws.com/BloggerBox/Images/but.png" /></a></span></div>');
    if (ConduitGadgetWindow.likeURL)
    {
        $(".contentBox").append('<div class="footer"><iframe id="likeframe" src="http://www.facebook.com/plugins/like.php?href=' + encodeURIComponent(ConduitGadgetWindow.likeURL) + '&layout=standard&show_faces=false&width=200&action=like&colorscheme=light&locale=en_US"' + 'scrolling="no" frameborder="0" allowTransparency="true" style="border:none;overflow:hidden; width:200px; height:26px"></iframe><a href="http://www.conduit.com#_tab"><span class="AppPowered">App powered by</span><img id="conduitLogo" src="http://ec2-174-129-162-152.compute-1.amazonaws.com/BloggerBox/Images/conduit.png" /></a></div>');
    }
    else
    {
        $('.contentBox').append('<div class="footer"><a href="http://www.conduit.com#_tab"><span class="AppPowered">App powered by</span><img id="conduitLogo" src="http://ec2-174-129-162-152.compute-1.amazonaws.com/BloggerBox/Images/conduit.png" /></a></div>');
    }
    
    // Background:
   $('.contentBox').css('backgroundImage', ConduitGadgetWindow.Background);
   
   if (ConduitGadgetWindow.footerColor != null)
   {
	$('.AppPowered').css('color', ConduitGadgetWindow.footerColor);
   } 
   if (ConduitGadgetWindow.footerImage != null)
   {
	$('#conduitLogo')[0].src = ConduitGadgetWindow.footerImage;
   }