// holds the services API calls //

var baseServer = "http://dev.ibid2save.com/",
    Services = {
    login : baseServer + "toolbar/login",
    getUserInfo : baseServer + "api/toolbar.php?xml=",
    logout : baseServer + "toolbar/logout",
    myAccount : "http://www.ibid2save.com/account/",
    featured : "http://dev.ibid2save.com/toolbar/featured-status"
    }

var Ibid2save = (function(){
    // Customer obg
    var Customer = {},
        CustomerKey = ""

    // return username and bids
    function getUserInfo(key){
        try{
            debugger;
            CustomerKey = key;
            Customer = $.parseJSON(RetrieveGlobalKey(CustomerKey));
            //alert(Customer.cid);

            var xml = encodeURIComponent("<xml><trantype>getuserinfo</trantype><tranparms><customerid>" + Customer.cid +"</customerid><securityKey>" + Customer.cmd5 + "</securityKey></tranparms></xml>");
            //alert('API call: ' + Services.getUserInfo + xml);

            //CrossDomainHttpRequest(handleUserInfoResponse, 'GET', Services.getUserInfo + xml, null, null, null, null);
            CrossDomainHttpRequest(handleUserInfoResponse, 'GET', Services.getUserInfo + xml, null, null, null, null);

        }
        catch(e){
            alert("Services:getUserID - catch: " +e);
        }
    }
    // PRIVATE function
    function handleUserInfoResponse(resp)
    {
        //alert("2" + resp);
        var $respXML = $($.parseXML(resp.toLowerCase()).childNodes[0]);
        //alert($respXML.text());
        Customer.username = $respXML.find('username').text();
        Customer.bids = $respXML.find('bidsnumber').text();
        Customer.avatar = baseServer + $respXML.find('avatar').text();

        StoreGlobalKey(CustomerKey, JSON.stringify(Customer));
        showLoggedDetails();
        //alert("Welcome: " + $respXML.find('username').text() + " bids: " + $respXML.find('bidsnumber'));
    }
    function getCustomer(){
        return Customer;
    }

    return {
        getUserInfo:getUserInfo,
        getCustomer:getCustomer
    }
})();

function preloadImages(){
    var imgNames = ['images/sprite_icons.png', 'images/green_left_btn.png','images/green_center_btn.png', 'images/green_right_btn.png', 'images/blue_left_btn.png', 'images/blue_center_btn.png', 'images/blue_right_btn.png'];
    var imgs = [];
    for (var i=0; i<imgNames.length; i++) {
        var img = new Image();
        img.src = imgNames[i];
        imgs.push(img);
    }
}