$(document).ready(function() {
    var cookiename = "foxnewswhatsapp.conduit";
    
    var SERVER_PREFIX = "http://ec2-67-202-51-198.compute-1.amazonaws.com/foxnews/";
    
    var isupdate = false;
    
    var cookiedata;
    
    var newitems = 0;
    
    disableSelection($("#contentdigg")[0]);

    pollDigg();

    function pollDigg()
    {
        var cookieContents = readCookie(cookiename);
        
        if (cookieContents == null)
        {
            cookieContents="dummy feed";
        }
        
        // Read Digg Twit
        $.ajax({
            url: "checkFeed.php",
            data: "url=http://feeds.foxnewsradio.com/foxnewsradiocom&data=" + cookieContents,
            success: function(result){
                eval(result);
                // Get Cookie Info
                cookiedata = latest;
                
                newitems = parseInt(numnew);
                
                if (newitems != 0)
                {
                    updateOccured();
                    return;
                }
            }
        
        // Compare results
        });
        setTimeout(pollDigg, 600000);
    }
    
    function updateOccured()
    {
        isupdate = true;
        newStuffCount();
        $("#contentdigg").html(newitems);
    }
    
    function newStuffCount()
    {
        if (isupdate)
        {
            if (newitems >= 10){
                newitems = '9+';
                $("#contentdigg")[0].style.left = 15;
                $("#notsmall")[0].style.display = 'none';
                $("#notbig")[0].style.display = 'inline';
                return;
            }
            else
            {
                $("#contentdigg")[0].style.left = 15;
                $("#notbig")[0].style.display = 'none';
                $("#notsmall")[0].style.display = 'inline';
            }
        }
        else{
            newitems = 0;
            $("#contentdigg")[0].style.display = 'none';
            $("#notbig")[0].style.display = 'none';
            $("#notsmall")[0].style.display = 'none';
        }
    }
    
    /*$("#notifier").hover(function(){
        if (isupdate){
            $("#notifier")[0].src="http://ec2-67-202-51-198.compute-1.amazonaws.com/digg/Images/digg_icn_new_over.png";
        }else{
            $("#notifier")[0].src="http://ec2-67-202-51-198.compute-1.amazonaws.com/digg/Images/digg_icn_over.png";
        }
    },function(){
        if (isupdate){
            $("#notifier")[0].src="http://ec2-67-202-51-198.compute-1.amazonaws.com/digg/Images/digg_icn_new.png";
            }else{
            $("#notifier")[0].src="http://ec2-67-202-51-198.compute-1.amazonaws.com/digg/Images/digg_icn.png";
            }
    });*/
    
    
    $(function(){
        $(document).click(function(event){
                eraseCookie(cookiename);
                createCookie(cookiename, cookiedata, 1);
                isupdate = false;
                newStuffCount();
                $("#contentdigg")[0].style.display = 'none';
                var width = 463;
                var height = 525;
                // Fix for IE Gadget size
                if (window.ActiveXObject) {
                    height += 10;
                    width += 5;
                };
                OpenGadget(SERVER_PREFIX + 'CIBB.html', width, height, 'resizable=no,hscroll=no,vscroll=no,titlebar=yes,closeonexternalclick=yes,closebutton=no,savelocation=no,saveresizedsize=no,openposition=alignment:(B;L)');      
    });    
});
    
});