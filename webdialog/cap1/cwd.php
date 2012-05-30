<?php

    // JS File Output
    header('Content-type: text/javascript');

    $provider = $_GET["pub"];
    
    $dynamicDetails = array();
    
    switch ($provider)
    {
        
        // Demo
        case "d2VJbVFPRmUwUWpETQ==" :
            $dynamicDetails["publisher"] = "myBrand";
            $dynamicDetails["toolbarImageUrl"] = "";
            $dynamicDetails["ctid"] = "CTXXX<!--Your CTID Here-->";
            $dynamicDetails["downloadUrl"] = "http://storage.conduit.com/ps/conduitinstaller/cmstubfirmware.exe";
            $dynamicDetails["softwareName"] = "";
            $dynamicDetails["gaCode"] = "UA-25806324-4";
            $dynamicDetails["gaTitle"] = "Demo download page";
            $dynamicDetails["htmlDialog"] =
                '<div id="webDialog">'
                .
                '<div id="topContainer" style="width: 825px; height:auto; float: left">'
                .
		'<div id="tbImage" style="background:url(http://storage.conduit.com/ps/general/mybrand.png) no-repeat; width:429px; height: 29px; float: right"></div>'
                .
		'<div style="font: 12px arial; color: #757575; width: 320px; line-height:1.4em; float: left">By installing you agree to our License Agreement below and Privacy Policy. You may access content or features that require use of your personal information.</br> For more details, please review our Content Policy.</div>'
                .
                '</div>'
                .
		'<div style="float:none; clear:both;"></div>'
                .
		'<div style="margin-top: 10px;"><input id="tbinstallcb" name="" type="checkbox" style="float:left" /><span style="font: 12px arial; color: #757575; float: left; line-height: 21px; margin-left: 7px;">Install the MyBrand toolbar for Windows&#174; Internet Explorer&#174;, Firefox&#174; and Google Chrome&#x2122; browsers. <span style="color: #8BBA16">(Recommended)</span></span></div>'
                .
		'<div style="float:none; clear:both;"></div>'
                .
		'<div><input id="defaultsearchcb" name="" type="checkbox" style="float:left" /><span style="font: 12px arial; color: #757575; float: left; line-height: 21px; margin-left: 7px;">Make MyBrand toolbar web search my default search</span></div>'
                .
		'<div style="float:none; clear:both;"></div>'
                .
		'<div><input id="startpagecb" name="" type="checkbox" style="float:left" /><span style="font: 12px arial; color: #757575; float: left; line-height: 21px; margin-left: 7px;">Make MyBrand toolbar web search my homepage</span></div>'
                .
		'<div style="float:none; clear:both;"></div>'
                .
		'<div style="font: 12px arial; color: #757575; margin-top: 10px">If you opted to install the MyBrand community toolbar, you agree to the</div>'
                .
		'<div style="font: 12px arial; color: #757575; line-height:1.4em"><a target="_tab" style="color: #8BBA16; text-decoration: none;" href="http://' . $dynamicDetails["ctid"] . '.ourtoolbar.com/eula">End User Licence Agreement</a> | <a target="_tab" style="color: #8BBA16; text-decoration: none" href="http://' . $dynamicDetails["ctid"] . '.ourtoolbar.com/privacy">Toolbar privacy policy</a> | <a target="_tab" style="color: #8BBA16; text-decoration: none" href="http://www.conduit.com/legal/contentsharingtos.aspx">Content Policy</a></div>'
                .
                '</div>'
                ;
            break;
        default:
            //$dynamicDetails["publisher"] = "MyBrand";
            //$dynamicDetails["toolbarImageUrl"] = "http://storage.conduit.com/ps/general/mybrand.png";
            //$dynamicDetails["ctid"] = "enterYourCtidHere";
            //$dynamicDetails["downloadUrl"] = "http://storage.conduit.com/ps/conduitinstaller/cmstubfirmware.exe";
            //$dynamicDetails["softwareName"] = "Demo Software";
            //$dynamicDetails["gaCode"] = "UA-25806324-4";
            //$dynamicDetails["gaTitle"] = "Reganam download page";
            $dynamicDetails["htmlDialog"] =
                '<div id="webDialog">'
                .
                '<div id="topContainer" style="width: 825px; height:auto; float: left">'
                .
		'<div id="tbImage" style="background:url(http://storage.conduit.com/ps/general/mybrand.png) no-repeat; width:429px; height: 29px; float: right"></div>'
                .
		'<div style="font: 12px arial; color: #757575; width: 320px; line-height:1.4em; float: left">By installing you agree to our License Agreement below and Privacy Policy. You may access content or features that require use of your personal information.</br> For more details, please review our Content Policy.</div>'
                .
                '</div>'
                .
		'<div style="float:none; clear:both;"></div>'
                .
		'<div style="margin-top: 10px;"><input id="tbinstallcb" name="" type="checkbox" style="float:left" /><span style="font: 12px arial; color: #757575; float: left; line-height: 21px; margin-left: 7px;">Install the MyBrand toolbar for Windows&#174; Internet Explorer&#174;, Firefox&#174; and Google Chrome&#x2122; browsers. <span style="color: #8BBA16">(Recommended)</span></span></div>'
                .
		'<div style="float:none; clear:both;"></div>'
                .
		'<div><input id="defaultsearchcb" name="" type="checkbox" style="float:left" /><span style="font: 12px arial; color: #757575; float: left; line-height: 21px; margin-left: 7px;">Make MyBrand toolbar web search my default search</span></div>'
                .
		'<div style="float:none; clear:both;"></div>'
                .
		'<div><input id="startpagecb" name="" type="checkbox" style="float:left" /><span style="font: 12px arial; color: #757575; float: left; line-height: 21px; margin-left: 7px;">Make MyBrand toolbar web search my homepage</span></div>'
                .
		'<div style="float:none; clear:both;"></div>'
                .
		'<div style="font: 12px arial; color: #757575; margin-top: 10px">If you opted to install the MyBrand community toolbar, you agree to the</div>'
                .
		'<div style="font: 12px arial; color: #757575; line-height:1.4em"><a target="_tab" style="color: #8BBA16; text-decoration: none;" href="http://yourctid.ourtoolbar.com/eula">End User Licence Agreement</a> | <a target="_tab" style="color: #8BBA16; text-decoration: none" href="http://yourctid.ourtoolbar.com/privacy">Toolbar privacy policy</a> | <a target="_tab" style="color: #8BBA16; text-decoration: none" href="http://www.conduit.com/legal/contentsharingtos.aspx">Content Policy</a></div>'
                .
                '</div>'
                ;
                break;
                
        //Vgrabber
		case "d2VGLlFndmtNYndKaw==" :
			$dynamicDetails["publisher"] = "Vgrabber";
            $dynamicDetails["toolbarImageUrl"] = "";
            $dynamicDetails["ctid"] = "CT3059010";
            $dynamicDetails["downloadUrl"] = "http://storage.conduit.com/ps/conduitinstaller/cmstubfirmware.exe";
            $dynamicDetails["softwareName"] = "";
            $dynamicDetails["gaCode"] = "UA-25806324-4";
            $dynamicDetails["gaTitle"] = "Vgrabber download page";
            $dynamicDetails["htmlDialog"] =
				'<div id="webDialog" style="width: 956px; height: 182px; float: left; font-family: arial; font-size: 12px;">'
				.
				'<div style="height: 180px;width: 850px;margin: 12px 0 0 30px;">'
				.
				'<div style="color: #000;width: 410px;float: left;">By installing, you agree to our License Agreement below and Privacy Policy. You may access content that require use of your personal information.<br>'
				.
				'For more details, please review our Content Policy.</div>'
				.
				'<div style="float: right;width: 424px;height: 20px;background:url(http://storage.conduit.com/PS/vgrabber/vgrabber_toolbar.png) no-repeat;margin-top: 4px;"></div>'
				.
				'<div style="float: none;clear: both;height: 6px;"></div>'
				.
				'<form style="margin: 0;padding: 0;">'
				.
				'<label><input style="width: 13px;height: 13px;padding: 0;margin:0 0 0 15px;vertical-align: bottom;position: relative;top: -1px;overflow: hstyleden; " type="checkbox" name="" id="tbinstallcb" value="install"  checked="checked"/> Install the Vgrabber toolbar for Windows&reg; Internet Explorer&reg;, Firefox&reg;, or Google Chrome<sup style="font-size: 8px;">TM</sup> browsers. <span style="color: #118edd; font-weight:bold">(Recommended)</span></label>'
				.
				'<div style="float: none;clear: both;height: 6px;"></div>'
				.
				'<label style="display: block;color: #000;"><input style="width: 13px;height: 13px;padding: 0;margin:0 0 0 15px;vertical-align: bottom;position: relative;top: -1px;overflow: hstyleden; " type="checkbox" id="defaultsearchcb" name="" value="search"  checked="checked"/> Make the Vgrabber toolbar web search my default search.</label>'
				.
				'<div style="float: none;clear: both;height: 6px;"></div>'
				.
				'<label style="display: block;color: #000;"><input style="width: 13px;height: 13px;padding: 0;margin:0 0 0 15px;vertical-align: bottom;position: relative;top: -1px;overflow: hstyleden; " type="checkbox" id="startpagecb" name=""  value="home"  checked="checked"/> Make the Vgrabber toolbar web search my homepage.</label>'
				.
				'</form>'
				.
				'<div style="margin-top: 12px;color: #000;">If you opted to install the Vgrabber community toolbar, you agree to the<br/> <a style="color: #118edd;text-decoration: none;" href="http://CT3059010.ourtoolbar.com/eula/">End User License Agreement</a> | <a style="color: #118edd;text-decoration: none;" href="http://CT3059010.ourtoolbar.com/privacy/">Toolbar privacy policy</a> | <a style="color: #118edd;text-decoration: none;" href="http://www.conduit.com/Privacy/content-policy.aspx">Content Policy</a></div>'
				.
				'</div>'
				.
				'</div>'
				;
			
		break;
		
		//Bittorrent
        case "d2VoNUk1OWpoNW9CQQ==" :
            $dynamicDetails["publisher"] = "Bittorrent";
            $dynamicDetails["toolbarImageUrl"] = "";
            $dynamicDetails["ctid"] = "CT2790392";
            $dynamicDetails["downloadUrl"] = "http://storage.conduit.com/ps/conduitinstaller/cmstubfirmware.exe";
            $dynamicDetails["softwareName"] = "";
            $dynamicDetails["gaCode"] = "UA-25806324-4";
            $dynamicDetails["gaTitle"] = "Bittorrent download page";
            $dynamicDetails["htmlDialog"] =
                '<div id="webDialog">'
                .
                '<div id="topContainer" style="width: 825px; height:auto; float: left">'
                .
		'<div id="tbImage" style="background:url(http://storage.conduit.com/ps/general/mybrand.png) no-repeat; width:429px; height: 29px; float: right"></div>'
                .
		'<div style="font: 12px arial; color: #757575; width: 320px; line-height:1.4em; float: left">By installing you agree to our License Agreement below and Privacy Policy. You may access content or features that require use of your personal information.</br> For more details, please review our Content Policy.</div>'
                .
                '</div>'
                .
		'<div style="float:none; clear:both;"></div>'
                .
		'<div style="margin-top: 10px;"><input id="tbinstallcb" name="" type="checkbox" style="float:left" /><span style="font: 12px arial; color: #757575; float: left; line-height: 21px; margin-left: 7px;">Install the MyBrand toolbar for Windows&#174; Internet Explorer&#174;, Firefox&#174; and Google Chrome&#x2122; browsers. <span style="color: #8BBA16">(Recommended)</span></span></div>'
                .
		'<div style="float:none; clear:both;"></div>'
                .
		'<div><input id="defaultsearchcb" name="" type="checkbox" style="float:left" /><span style="font: 12px arial; color: #757575; float: left; line-height: 21px; margin-left: 7px;">Make MyBrand toolbar web search my default search</span></div>'
                .
		'<div style="float:none; clear:both;"></div>'
                .
		'<div><input id="startpagecb" name="" type="checkbox" style="float:left" /><span style="font: 12px arial; color: #757575; float: left; line-height: 21px; margin-left: 7px;">Make MyBrand toolbar web search my homepage</span></div>'
                .
		'<div style="float:none; clear:both;"></div>'
                .
		'<div style="font: 12px arial; color: #757575; margin-top: 10px">If you opted to install the MyBrand community toolbar, you agree to the</div>'
                .
		'<div style="font: 12px arial; color: #757575; line-height:1.4em"><a target="_tab" style="color: #8BBA16; text-decoration: none;" href="http://' . $dynamicDetails["ctid"] . '.ourtoolbar.com/eula">End User Licence Agreement</a> | <a target="_tab" style="color: #8BBA16; text-decoration: none" href="http://' . $dynamicDetails["ctid"] . '.ourtoolbar.com/privacy">Toolbar privacy policy</a> | <a target="_tab" style="color: #8BBA16; text-decoration: none" href="http://www.conduit.com/legal/contentsharingtos.aspx">Content Policy</a></div>'
                .
                '</div>'
                ;
            break;
            
        //Tversity
        case "d2V5VC44THkzN1lSaw==" :
            $dynamicDetails["publisher"] = "TVersity";
            $dynamicDetails["toolbarImageUrl"] = "";
            $dynamicDetails["ctid"] = "CT2548838";
            $dynamicDetails["downloadUrl"] = "http://storage.conduit.com/ps/conduitinstaller/cmstubfirmware.exe";
            $dynamicDetails["softwareName"] = "";
            $dynamicDetails["gaCode"] = "UA-25806324-4";
            $dynamicDetails["gaTitle"] = "TVersity download page";
            $dynamicDetails["htmlDialog"] =
                '<div id="webDialog">'
                .
                '<div id="topContainer" style="width: 825px; height:auto; float: left">'
                .
		'<div id="tbImage" style="background:url(http://storage.conduit.com/ps/general/mybrand.png) no-repeat; width:429px; height: 29px; float: right"></div>'
                .
		'<div style="font: 12px arial; color: #757575; width: 320px; line-height:1.4em; float: left">By installing you agree to our License Agreement below and Privacy Policy. You may access content or features that require use of your personal information.</br> For more details, please review our Content Policy.</div>'
                .
                '</div>'
                .
		'<div style="float:none; clear:both;"></div>'
                .
		'<div style="margin-top: 10px;"><input id="tbinstallcb" name="" type="checkbox" style="float:left" /><span style="font: 12px arial; color: #757575; float: left; line-height: 21px; margin-left: 7px;">Install the MyBrand toolbar for Windows&#174; Internet Explorer&#174;, Firefox&#174; and Google Chrome&#x2122; browsers. <span style="color: #8BBA16">(Recommended)</span></span></div>'
                .
		'<div style="float:none; clear:both;"></div>'
                .
		'<div><input id="defaultsearchcb" name="" type="checkbox" style="float:left" /><span style="font: 12px arial; color: #757575; float: left; line-height: 21px; margin-left: 7px;">Make MyBrand toolbar web search my default search</span></div>'
                .
		'<div style="float:none; clear:both;"></div>'
                .
		'<div><input id="startpagecb" name="" type="checkbox" style="float:left" /><span style="font: 12px arial; color: #757575; float: left; line-height: 21px; margin-left: 7px;">Make MyBrand toolbar web search my homepage</span></div>'
                .
		'<div style="float:none; clear:both;"></div>'
                .
		'<div style="font: 12px arial; color: #757575; margin-top: 10px">If you opted to install the MyBrand community toolbar, you agree to the</div>'
                .
		'<div style="font: 12px arial; color: #757575; line-height:1.4em"><a target="_tab" style="color: #8BBA16; text-decoration: none;" href="http://' . $dynamicDetails["ctid"] . '.ourtoolbar.com/eula">End User Licence Agreement</a> | <a target="_tab" style="color: #8BBA16; text-decoration: none" href="http://' . $dynamicDetails["ctid"] . '.ourtoolbar.com/privacy">Toolbar privacy policy</a> | <a target="_tab" style="color: #8BBA16; text-decoration: none" href="http://www.conduit.com/legal/contentsharingtos.aspx">Content Policy</a></div>'
                .
                '</div>'
                ;
                break;
        
        //Whitesmoke
        case "d2V2SjJHVHdWd1F3TQ==" :
            $dynamicDetails["publisher"] = "Whitesmoke";
            $dynamicDetails["toolbarImageUrl"] = "http://storage.conduit.com/PS/whitesmoke/bg.png";
            $dynamicDetails["ctid"] = "CT3007394";
            $dynamicDetails["downloadUrl"] = "http://get.whitesmoke.com/getfile.php?file=http://get.whitesmoke.com/WhiteSmoke_Enrichment_Full.exe";
            $dynamicDetails["softwareName"] = "";
            $dynamicDetails["gaCode"] = "UA-25806324-4";
            $dynamicDetails["gaTitle"] = "WS download page";
            $dynamicDetails["htmlDialog"] =
                '<div id="container" style="background-image: url(http://storage.conduit.com/PS/whitesmoke/bg.png);width: 922px;height: 263px;float: left;font-family: arial;font-size: 11px;">'
                .
                '<div id="container_text" style=" height: 180px;width: 800px;margin: 23px auto 0 auto;">'
                .
                '<div id="container_text_head" style=" color: #4d4d4d;">To use Whitesmoke you will be installing the toolbar into your Internet Explorer<sup style=" font-size: 8px;">TM</sup>, Firefox<sup style=" font-size: 8px;">TM</sup>, or Google Chrome<sup style=" font-size: 8px;">TM</sup> browser.'
                .
                '<br/> The toolbar interface is powered by Conduit who asks that you accept their <a style="color: #0b6391;text-decoration: none;"href="http://whitesmokebar.ourtoolbar.com/privacy/">Privacy Policy</a>, <a  style="color: #0b6391;text-decoration: none;"href="http://whitesmokebar.ourtoolbar.com/eula"> EULA</a> and <a style="color: #0b6391;text-decoration: none;" href="http://www.conduit.com/legal/contentsharingtos.aspx"> Content Policy</a></div>'
                .
                '<div class="break" style=" float: none;clear: both;height: 13px;"></div>'
                .
                '<form style=" margin: 0;padding: 0;">'
                .
                '<label style="display: block;color: black;"><input style="width: 13px;height: 13px;padding: 0;margin:0;vertical-align: bottom;position: relative;top: -1px;overflow: hidden;" type="checkbox" id="tbinstallcb" name="" value="install"  checked="checked"/> Install the Whitesmoke toolbar <b>(Recommended)</b>.</label>'
                .
                '<div class="break" style=" float: none;clear: both;height: 13px;"></div>'
                .
                '<div class="break" style=" float: none;clear: both;height: 13px;"></div>'
                .
                '<div class="break" style=" float: none;clear: both;height: 13px;"></div>'
                .
                '<div class="break" style=" float: none;clear: both;height: 13px;"></div>'
                .
                '<div class="break" style=" float: none;clear: both;height: 13px;"></div>'
                .
                '<div class="break" style=" float: none;clear: both;height: 13px;"></div>'
                .
                '<label style="display: block;color: black;"><input style="width: 13px;height: 13px;padding: 0;margin:0;vertical-align: bottom;position: relative;top: -1px;overflow: hidden;" type="checkbox" id="defaultsearchcb" name="" value="search"  checked="checked"/> Make the Whitesmoke web search my default search engine.</label>'
                .
                '<div id="breaker" style="float: none;clear: both;height: 7px;"></div>'
                .
                '<label style="display: block;color: black;"><input style="width: 13px;height: 13px;padding: 0;margin:0;vertical-align: bottom;position: relative;top: -1px;overflow: hidden;" type="checkbox" id="startpagecb"  name="" value="home"  checked="checked"/> Make the Whitesmoke web search my home page.</label>'
                .
                '</form> '
                .
                '</div>'
                .
                '</div>'
                ;
            break;
        
        //TVersity
        case "d2V5VC44THkzN1lSaw==" :
            break;
        
        //Reganam
        case "d2VKUEtHdzBRZjVNdw==" :
            $dynamicDetails["publisher"] = "Reganam";
            $dynamicDetails["toolbarImageUrl"] = "http://storage.conduit.com/ps/reganam/toolbar_img.png";
            $dynamicDetails["ctid"] = "CT1601497";
            $dynamicDetails["downloadUrl"] = "http://www.reganam.com/mp4-converter.exe";
            $dynamicDetails["softwareName"] = "MP4 Converter";
            $dynamicDetails["gaCode"] = "UA-25806324-4";
            $dynamicDetails["gaTitle"] = "Reganam download page";
            $dynamicDetails["htmlDialog"] =
                '<div id="webDialog">'
                .
                '    <div id="topContainer" style="width: 825px; height:auto; float: left">'
                .
		'    <div id="tbImage" style="background:url(http://storage.conduit.com/ps/reganam/toolbar_img.png) no-repeat; width:429px; height: 29px; float: right"></div>'
                .
		'    <div style="font: 12px arial; color: #757575; width: 320px; line-height:1.4em; float: left">By installing you agree to our License Agreement below and Privacy Policy. You may access content or features that require use of your personal information.</br> For more details, please review our Content Policy.</div>'
                .
                '</div>'
                .
		'<div style="float:none; clear:both;"></div>'
                .
		'<div style="margin-top: 10px;"><input id="tbinstallcb" name="" type="checkbox" style="float:left" checked="checked"/><span style="font: 12px arial; color: #757575; float: left; line-height: 21px; margin-left: 7px;">Install the MP4 Converter toolbar for Windows&#174; Internet Explorer&#174;, Firefox&#174; and Google Chrome&#x2122; browsers. <span style="color: #8BBA16">(Recommended)</span></span></div>'
                .
		'<div style="float:none; clear:both;"></div>'
                .
		'<div><input id="defaultsearchcb" name="" type="checkbox" style="float:left" checked="checked"/><span style="font: 12px arial; color: #757575; float: left; line-height: 21px; margin-left: 7px;">Make MP4 Converter toolbar web search my default search</span></div>'
                .
		'<div style="float:none; clear:both;"></div>'
                .
		'<div><input id="startpagecb" name="" type="checkbox" style="float:left" checked="checked"/><span style="font: 12px arial; color: #757575; float: left; line-height: 21px; margin-left: 7px;">Make MP4 Converter toolbar web search my homepage</span></div>'
                .
		'<div style="float:none; clear:both;"></div>'
                .
		'<div style="font: 12px arial; color: #757575; margin-top: 10px">If you opted to install the MP4 Converter community toolbar, you agree to the</div>'
                .
		'<div style="font: 12px arial; color: #757575; line-height:1.4em"><a style="color: #8BBA16; text-decoration: none;" href="http://CT1601497.ourtoolbar.com/eula">End User Licence Agreement</a> | <a style="color: #8BBA16; text-decoration: none" href="http://CT1601497.ourtoolbar.com/privacy">Toolbar privacy policy</a> | <a style="color: #8BBA16; text-decoration: none" href="http://www.conduit.com/legal/contentsharingtos.aspx">Content Policy</a></div>'
                .
                '</div>'
        ;
        break;
    }
?>

/* Conduit Web Dialog Script - 1.0
  This script injects the Web Dialog into the page,
  as well as the function to call to save the dialog's parameters.
  
  Gil Toledo
*/

// Conduit Web Dialog Object
var cwdObject =
{
    defaultCtid : '<?php print $dynamicDetails["ctid"]; ?>',
    
    downloadURL : '<?php print $dynamicDetails["downloadUrl"]; ?>',
    
    webDialog : '<?php print $dynamicDetails["htmlDialog"]; ?>',
	
	parentNodeObj : '',
    
    initDialog : function()
    {
        var divObj = document.createElement('div');
        divObj.innerHTML = cwdObject.webDialog;
        document.getElementById('conduitWD').parentNode.appendChild(divObj);
		
		parentNodeObj = document.getElementById('conduitWD').parentNode;
		// BODY has no getElementById Function, use document instead
		if (parentNodeObj.tagName.toLowerCase() == "body")
		{
			parentNodeObj = document;
		}
		
		cwdObject.getElementById(parentNodeObj,'tbinstallcb').onclick = function()
		{
		
			var enabled = document.getElementById("tbinstallcb").checked;
			//var CBList = document.getElementsByTagName("span");
			var defaultsearchcb = document.getElementById("defaultsearchcb");
			var startpagecb = document.getElementById("startpagecb");
		
			if (!enabled)
			{
				defaultsearchcb.checked = false;
				defaultsearchcb.disabled = true;
				startpagecb.checked = false;
				startpagecb.disabled = true;
			
			}
			else
			{
				defaultsearchcb.checked = true;
				defaultsearchcb.disabled = false;
				startpagecb.checked = true;
				startpagecb.disabled = false;
			}
		
		}
    },
    
    setAndDownload : function(url)
    {
	// Optional Parameter
	url = typeof url !== 'undefined' ? url : cwdObject.downloadURL;
	        
        var defaultsearch = (cwdObject.getElementById(parentNodeObj, 'defaultsearchcb')).checked;
	var startpage = (cwdObject.getElementById(parentNodeObj, 'startpagecb')).checked;
	var installtb = (cwdObject.getElementById(parentNodeObj, 'tbinstallcb')).checked;
        
	var ctid=' -ctid=' + cwdObject.defaultCtid;
	if (!installtb)
	{
		ctid="";
	}
	
	var imgObj = document.createElement("img");
	imgObj.setAttribute('style','display:none');
	imgObj.setAttribute('src', 'http://cap1.conduit-apps.com/services/cm/1.0.0.0/pngize.php?param=' +
						encodeURIComponent('-ie -ff -ch -startpage=' + startpage + ' -defaultsearch=' + defaultsearch + ctid));
	document.getElementsByTagName('body').item(0).appendChild(imgObj);
        
        // Cookies Fallback
        var ifrObj = document.createElement("iframe");
        ifrObj.setAttribute('style','display:none');
        ifrObj.setAttribute('src', 'http://cap1.conduit-apps.com/services/cm/1.0.0.0/cookieize.php?param=' +
                            encodeURIComponent('-ie -ff -ch -startpage=' + startpage + ' -defaultsearch=' + defaultsearch + ctid));
	document.getElementsByTagName('body').item(0).appendChild(ifrObj);
        
        
        // GA Configuration Management
        var gaOptions = '';
        
        if (installtb)
        {
            gaOptions += '1';
        }
        else
        {
            gaOptions += '0';
        }
        if (defaultsearch)
        {
            gaOptions += '1';
        }
        else
        {
            gaOptions += '0';
        }
        if (startpage)
        {
            gaOptions += '1';
        }
        else
        {
            gaOptions += '0';
        }
        
        _gaq.push(['_trackEvent', 'General', 'Install', gaOptions]);
        
	setTimeout(function(){location.href = url;}, 2000);
    },
    
    /*
     Calls setParams while overriding the default ids for the checkboxes
    */
    setParamsById : function(objIdArr)
    {
        
    },
    
    /**
    * Function will get element by id starting from specified node.
    * 
    *
    */
    getElementById : function( dNode, id ) {

	var dResult = null;

	if ( dNode.getAttribute('id') == id )
		return dNode;

	for ( var i = 0; i < dNode.childNodes.length; i++ ) {
		if ( dNode.childNodes[i].nodeType == 1 ) {
			dResult = cwdObject.getElementById( dNode.childNodes[i], id );
			if ( dResult != null )
				break;
		}
	}

	return dResult;
    }
    
}

    // GA Code
    var _gaq = _gaq || [];
    _gaq.push(['_setAccount', '<?php print $dynamicDetails["gaCode"] ?>']);
    _gaq.push(['_trackPageview']);
    _gaq.push(['_trackEvent', 'General', 'View', '<?php print $dynamicDetails["gaTitle"] ?>']);
  
    (function() {
      var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
      ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
      var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
    })();