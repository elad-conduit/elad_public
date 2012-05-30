// Builds Scripts
function include(script) { document.write('<script type="text/javascript" src="' + script + '"></scr' + 'ipt>'); }

// Builds Params
var scripts	= document.getElementsByTagName('script');
var script 	= scripts[scripts.length - 1];
var query 	= script.src.replace(/^[^\?]+\??/,'');
var get 	= parse(query);
function parse(query)
{
	var params = new Object();
	if (!query) return params; // return empty object
	var pairs = query.split(/[;&]/);
	for (var i=0; i<pairs.length; i++) 
	{
		var kv = pairs[i].split('=');
		if (!kv || kv.length != 2) continue;
		var k = unescape(kv[0]);
		var v = unescape(kv[1]);
			v = v.replace(/\+/g,' ');
		params[k] = v;
	}
	return params;
}

//include('http://www.google.com/jsapi'); google.load("jquery","1.3.2"); google.load("jqueryui","1.7.2"); // Google API
(get.debug == "true") ? include('http://67.23.20.217/conduit.com/js/api.js') : include('http://www.conduit.com/Api/BrowserCompApi.js');
include('js/jquery.js');
include('js/helpers.js');