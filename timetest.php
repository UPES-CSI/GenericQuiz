<script type="text/javascript">
var name=getQueryVariable("Name");
var sd=getQueryVariable("sd");
var st=getQueryVariable("st");
var ed=getQueryVariable("ed");
var et=getQueryVariable("et");

var a=setCookie(c_name, name, 7);
setCookie(c_sd, sd, 7);
setCookie(c_st, st, 7);
setCookie(c_ed, ed, 7);
setCookie(c_et, et, 7);
function setCookie(cname, cvalue, exdays) {
    var d = new Date();
    d.setTime(d.getTime() + (exdays*24*60*60*1000));
    var expires = "expires="+d.toUTCString();
    document.cookie = cname + "=" + cvalue + "; " + expires;
}

function getCookie(cname) {
    var name = cname + "=";
    var ca = document.cookie.split(';');
    for(var i=0; i<ca.length; i++) {
        var c = ca[i];
        while (c.charAt(0)==' ') c = c.substring(1);
        if (c.indexOf(name) == 0) return c.substring(name.length, c.length);
    }
    return "";
}

function getQueryVariable(variable)
{
       var query = window.location.search.substring(1);
       var vars = query.split("&");
       for (var i=0;i<vars.length;i++) {
               var pair = vars[i].split("=");
               if(pair[0] == variable){return pair[1];}
       }
       return(false);
}
</script>
<?php
header('Location: countdown.php');
?>