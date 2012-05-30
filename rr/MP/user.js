/*
var locate="http://storage.conduit.com/48/278/CT2785248/Images/Market/";
var linkCont= new Array;
linkCont[0]=[locate+'dating.png',
        'Dating',
        'http://www.eharmony.com/tw/registration?cid=23602'];
linkCont[1]=[locate+'horoscope.png',
        'Horoscope',
        'http://www.rr.com/astrology/&amp;cmpid=RRTBA'];
linkCont[2]=[locate+'security.png',
        'Security',
        'http://www.rr.com/security/?cmpid=RRTBS'];
linkCont[3]=[locate+'flightstatus.png',
        'Travel',
        'http://roadrunner.kayak.com/flights/'];
linkCont[4]=[locate+'jobs.png',
        'Jobs',
        'http://roadrunner.simplyhired.com/a/all-jobs/list'];
linkCont[5]=[locate+'movies.png',
        'Check out the latest videos on the internet',
        'http://video.rr.com/'];
linkCont[6]=[locate+'tv.png',
        'TV Listings',
        'http://tvlistings.rr.com/findTvListings/'];

function createLink(){
    var str="<center>";
    var i=0;
    for(i=0;i<linkCont.length;i++){
    str+='<a href="'+linkCont[i][2]+'#_tab"><img src="'+linkCont[i][0]+'" border="0" title="'+linkCont[i][1]+'"/></a><br /><br />';
    }

    document.write(str + "</center>");
}
function AddLinkToToolbar(obj,id) {

    
    var oToolbar = new TPI.Toolbar("CT2187784");
    var str = "";
    var oResult = oToolbar.AddLinkButton('',
        linkCont[id][0],
        linkCont[id][1],
        linkCont[id][2],
        'self',
        '',
        linkCont[id][0]);
    // Check the results
    if (oResult.returnValue) {
        str = linkCont[id][1] + " App was added to your toolbar";
        changeImage(obj);
    }
    else {
        if (oResult.errorCode == 5) {
            str = linkCont[id][1] + " App already exist on your toolbar";
            changeImage(obj);
        }
        else if (oResult.errorCode == 0) {
            str = "Sory but RoadRunner toolbar has not been found at your browser";
        }
        else if (oResult.errorCode == 17) {
            return;
        }
        else {
            str = "Failed to add " + linkCont[id][1] + " App to your toolbar, Error Code: " + oResult.errorCode;
        }
    }
    alert(str);
}
*/
function changeImage(obj){
        obj.src="images/added_btn.jpg";
        obj.onclick="";
        obj.style.cursor="default";
}
function checkVis(){
		
        var oToolbar = new TPI.Toolbar("CT2187784");
        var oReturn = oToolbar.IsVisible();
            if(!oReturn.returnValue){
			
				var bToolbar = new TPI.Toolbar("CT3213089");
				var bReturn = bToolbar.IsVisible();
				if(!bReturn.returnValue){
					
					alert( "The RR Toolbar is not installed or not visible you will transferd to the toolbar landing page "+  oReturn.errorCode );
					window.location="http://CT2187784.ourtoolbar.com";
					return false;
				}
				
            }
			
            return true;
}
var cont=new Array();
cont[0]= ['d9c0c856-06ab-4050-9bbd-7378972b14e9','Stocks','Gadget'];
cont[1]= ['cc9c551b-c1c6-44e9-8edd-6604b381b3a1','Radio','Gadget'];
cont[2]= ['4d37b832-c900-4008-8144-fe5a22c0c893','TV Listing','Embedded App'];
cont[3]= ['95503625-0ce3-4516-8dfb-01b9acff2a55','Video','Embedded App'];
cont[4]= ['1459f421-8489-47c8-9a77-26e624018145','Jobs','Embedded App'];
cont[5]= ['c97d57c8-d590-4948-a74d-f4a3fb8bd0c6','Travel','Embedded App'];
cont[6]= ['c90ea9f7-39a2-4f3a-bf91-a4812de1a563','Security','Embedded App'];
cont[7]= ['6297186f-96c5-4782-b348-58b3bcc8f6a2','Horscope','Embedded App'];
cont[8]= ['77899b5c-2e18-44e9-a8da-2adbc26803b7','Dating','Embedded App'];
cont[9]= ['90c02e65-64a5-4531-8808-6674da8ee47a','Road Runner Team Tweet ','Gadget'];
cont[10]= ['332b42ce-ce09-420c-9189-3788ab47feb5','Weather','Embedded App'];
cont[11]= ['a5dbd9a8-da89-4f87-ae68-7cee163af84c','Road Runner channels','Embedded App'];
cont[12]= ['d3bb3a60-9f51-4588-95c5-32894d721fbd','Personalization','Embedded App'];
cont[13]= ['c0f36cf4-06ce-4b0f-be65-f06c20adbb67','News','Embedded App'];
cont[14]= ['2f8172ae-b337-4fdb-b74d-6c1d38a38528','Finance','Embedded App'];
cont[15]= ['8e13c411-0065-4362-ac92-7c3fd9609895','Sports','Embedded App'];
cont[16]= ['99cc5542-e891-45e5-a21e-bc3567a9c941','Shopping','Embedded App'];
cont[17]= ['033c042c-25c5-44bb-a659-a127821bf7ba','Games','Embedded App'];
cont[18]= ['d55f42cd-a8e2-48e4-a777-504d285b64e2','Entertament','Embedded App'];
cont[19]= ['3d4ef224-17d1-4082-be59-b90058d49058','Tickets','Embedded App'];
function addIt(id,obj){
    if(checkVis())
    {
		var brsr = navigator.userAgent;
		if(brsr.search("Windows NT") != -1)
		{
			location.href = "http://appdownload.conduit.com/?appid=" + cont[id][0];
		}
		else
		{
			SharedItems.Manager.addComponentById(cont[id][0],'',cont[id][1] ,'Road Runner Apps', cont[id][2]);
		}
	
    changeImage(obj);
    }
    
}