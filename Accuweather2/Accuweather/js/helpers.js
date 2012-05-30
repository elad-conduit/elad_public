function CloseGadget() { window.close() }

Date.prototype.getGMTOffset = function() { return -(this.getTimezoneOffset()/60); }

function createCookie(name,value,days)
{
	if (days) 
	{
		var date = new Date();
		date.setTime(date.getTime()+(days*24*60*60*1000));
		var expires = "; expires="+date.toGMTString();
	}
	else var expires = "";
	document.cookie = name+"="+value+expires+"; path=/";
}

function readCookie(name) 
{
	var nameEQ = name + "=";
	var ca = document.cookie.split(';');
	for(var i=0;i < ca.length;i++) 
	{
		var c = ca[i];
		while (c.charAt(0)==' ') c = c.substring(1,c.length);
		if (c.indexOf(nameEQ) == 0) return c.substring(nameEQ.length,c.length);
	}
	return null;
}

function eraseCookie(name) 
{
	createCookie(name,"",-1);
}

function getCookieItemCount(cname)
{
	var cookie = readCookie(cname);
	if (cookie != null && cookie != "")
	{
		if (cookie.split(",").length != 0)
		{
			return cookie.split(",").length;
		}
	}
	return 0;
}

function eraseCookieItem(cname, value)
{
	var cookie = readCookie(cname);
	if (cookie != null)
	{
		var valueList = readCookie(cname).split(",");
		var newValueList = "";
		if (valueList.length == 1)
		{
			eraseCookie(cname);
		}
		for (i=0; i<valueList.length; i++)
		{
		    if (valueList[i] != value)
		    {
			newValueList += valueList[i];
			if (i != valueList.length - 1)
			{
				newValueList += ",";
			}
		    }
		}
	}
	createCookie(cname, newValueList, 60*60*23*30);
}

function eraseCookieIndex(cname, count)
{
	var cookie = readCookie(cname);
	if (cookie != null)
	{
		var valueList = readCookie(cname).split(",");
		var newValueList = "";
		for (i=0; i<valueList.length; i++)
		{
		    if (i != count)
		    {
			newValueList += valueList[i] + ",";
		    }
		}
	}
}

function addCookieItem(cname, value)
{
	var cookie = readCookie(cname);
	if (cookie == null || cookie == "")
	{
		createCookie(cname, value, 60*60*24*30);
	}
	else
	{
		createCookie(cname, value + "," + cookie , 60*60*24*30);
	}
}

function getCookieIndex(cname, count)
{
	var cookie = readCookie(cname);
	if (cookie !=null)
	{
		var valueList = cookie.split(",");
		for (i=0; i<valueList.length; i++)
		{
			if (i == count)
			{
				return valueList[i];
			}
		}
	}
	else
	{
		return null;
	}
}

function isCookieItem(cname, value)
{
	var cookie = readCookie(cname);
	if (cookie !=null)
	{
		var valueList = cookie.split(",");
		for (i=0; i<valueList.length; i++)
		{
			if (valueList[i] == value)
			{
				return true;
			}
		}
	}
	else
	{
		return false;
	}
}