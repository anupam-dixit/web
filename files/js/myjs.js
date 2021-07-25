function setCookie(key, value, expiry) 
{
var expires = new Date();
expires.setTime(expires.getTime() + (expiry * 24 * 60 * 60 * 1000));
document.cookie = key + '=' + value + ';expires=' + expires.toUTCString();
}

function getCookie(key)
{
var keyValue = document.cookie.match('(^|;) ?' + key + '=([^;]*)(;|$)');
return keyValue ? keyValue[2] : null;
}

function eraseCookie(key)
{
var keyValue = getCookie(key);
setCookie(key, keyValue, '-1');
}

function taggerjs()
    {
      if ( getCookie ('ut') == "" || getCookie ('ut') == null )
      {
      // alert("setting");
      setCookie ('ut', '' + Math.floor (Math.random () * 100000000) + 1, 365);
      }
      else
      {
      // alert("cookie already set");
      }
    }

function random()
{
return Math.floor(100000000 + Math.random() * 900000000);
}

function demo()
{
	alert("demo");
}

var x = document.getElementById ("field_loc");

function getLocation( )
{
  
	if ( navigator.geolocation )
	{
		navigator.geolocation.getCurrentPosition (showPosition, showError);
	}
	else
	{ 
		x.value = "Geolocation is not supported by this browser.";
	}
}
function showPosition( position )
{
	x.value = "" + position.coords.latitude + 
		"," + position.coords.longitude;
}
function showError( error )
{
	switch ( error.code )
	{
		case error.PERMISSION_DENIED:
	x.value = "0"
	alert("लोकेशन नहीं मिली। बेहतर सुविधाओं के लिए लोकेशन ऑन कर के पुनः विज़िट करें।")
	break;
case error.POSITION_UNAVAILABLE:
	x.value = "लोकेशन उपलब्ध नहीं है।"
	break;
case error.TIMEOUT:
	x.value = "2"
	break;
case error.UNKNOWN_ERROR:
	x.value = "3"
	break;
	}
}
