<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN"
    "http://www.w3.org/TR/html4/strict.dtd"
    >
<html lang="en">
<head>
    <title><!-- Insert your title here --></title>
    
    <script type="text/javascript">
        function queryString(parameter) { 
            var loc = location.search.substring(1, location.search.length);
            var param_value = false;
            var params = loc.split("&");
            for (i=0; i<params.length;i++) {
                param_name = params[i].substring(0,params[i].indexOf('='));
                if (param_name == parameter) {
                    param_value = params[i].substring(params[i].indexOf('=')+1)
                }
            }
            if (param_value) {
                return param_value;
            }
            else {
                return false; //Here determine return if no parameter is found
            }
          }
    </script>
    
    <script type="text/javascript">
        function setCookie( name, value, expires, path, domain, secure )
        {
            // set time, it's in milliseconds
            var today = new Date();
            today.setTime( today.getTime() );
            
            /*
            if the expires variable is set, make the correct
            expires time, the current script below will set
            it for x number of days, to make it for hours,
            delete * 24, for minutes, delete * 60 * 24
            */
            if ( expires )
            {
            expires = expires * 1000 * 60 * 60 * 24;
            }
            var expires_date = new Date( today.getTime() + (expires) );
            
            document.cookie = name + "=" +escape( value ) +
            ( ( expires ) ? ";expires=" + expires_date.toGMTString() : "" ) +
            ( ( path ) ? ";path=" + path : "" ) +
            ( ( domain ) ? ";domain=" + domain : "" ) +
            ( ( secure ) ? ";secure" : "" );
        }
    </script>
</head>
<body>

    <script type="text/javascript">
        var params = queryString("param");
        setCookie("cookieMonsterparameters", '<?php print($_GET['param']); ?>' + '|' + '<?php print(time()); ?>', 1, '/', '', '');
    </script>

</body>
</html>
