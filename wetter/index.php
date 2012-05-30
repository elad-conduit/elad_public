<?php
// include path
set_include_path(get_include_path() . ';' . '.;C:\\xampp\\php\\PEAR\\Net' );
//include_path('.;C:\\xampp\\php\\PEAR');
// include class
include("GeoIP.php");

if (getenv(HTTP_X_FORWARDED_FOR)) {
        $pipaddress = getenv(HTTP_X_FORWARDED_FOR);
        $ipaddress = getenv(REMOTE_ADDR);
echo "Your Proxy IPaddress is : ".$pipaddress. "(via $ipaddress)" ;
    } else {
        $ipaddress = getenv(REMOTE_ADDR);
        echo "Your IP address is : $ipaddress";
    }
?>
<br><br>

<?php
$cs = md5('wcom_toolbar' . 'hsu7!XkW' . 'DE0009918');

echo('checksum:' . $cs . '<br>');

// initialize object
// open database
$geo = Net_GeoIP::getInstance("GeoIP.dat");

// look up IP address
$country = $geo->lookupCountryName("216.239.115.148");
echo "IP mapped to: " . $country;

// close database
$geo->close();

?>