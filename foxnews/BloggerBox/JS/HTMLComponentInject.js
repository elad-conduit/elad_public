// Append required stuff to document

    // Conduit WebComp Api
    var conduitApiScript = document.createElement("script");
    conduitApiScript.setAttribute("type", "text/javascript");
    conduitApiScript.setAttribute("src", "http://api.conduit.com/BrowserCompApi.js");
    
    document.getElementsByTagName("head").item(0).appendChild(conduitApiScript);
    
    // BloggerBox CSS
    var bloggerBoxBtnCSS = document.createElement("link");
    bloggerBoxBtnCSS.setAttribute("rel", "stylesheet");
    bloggerBoxBtnCSS.setAttribute("type", "text/css");
    bloggerBoxBtnCSS.setAttribute("href", "http://cap1stg.conduit-apps.com/BloggerBox/CSS/bloggerBoxBtn.css");
    
    document.getElementsByTagName("head").item(0).appendChild(bloggerBoxBtnCSS);
    
    $('body').append('<div alt="' + ConduitHTMLComponent.BTNCaption + '" title="' + ConduitHTMLComponent.BTNCaption + '" id="blogAppBtn"><img src="' + ConduitHTMLComponent.BTNURL + '" /></div>');
    
    $('#blogAppBtn').hover(function(){
       $('#blogAppBtn').fadeTo('fast', 0.5);
    },
    function(){
        $('#blogAppBtn').fadeTo('fast', 1.0);
    });
    
    var realHeight = parseInt(ConduitHTMLComponent.GadgetWindow.GWHeight);
    /*if (navigator.appName == 'Netscape')
    {
        realHeight = parseInt(realHeight - 40);
    }*/
    
    $(document).click(function(){
       OpenGadget(ConduitHTMLComponent.GadgetWindow.GWURL, parseInt(ConduitHTMLComponent.GadgetWindow.GWWidth), realHeight, 'resizable=no,hscroll=no,vscroll=no,titlebar=yes,closeonexternalclick=no,closebutton=no,savelocation=no,saveresizedsize=no,openposition=alignment:(B;L)'); 
    });
    