<!DOCTYPE html>
<html lang="en">
  <head>
<!-- Lottie Files-->
  <script src="https://unpkg.com/@lottiefiles/lottie-player@latest/dist/lottie-player.js"></script>

	<meta name="theme-color" content="#000000" />
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta http-equiv="x-ua-compatible" content="ie=edge">

	<meta name="description" content="बेकरी स्टोर :: सिधौली ऑनलाइन ।। केक आर्डर करें कहीं से भी सबसे तेज होम डिलीवरी के साथ।"/>
	<meta name="keywords" content="cake,bakery,sidhauli online bakery,birthday cake"/>

	<title>बेकरी स्टोर सिधौली ऑनलाइन ::Bakery Store Sidhauli Online </title>
<?php
  include('../page_parts/inc_top.php');
?>
<style>
	  .vanilla-color{
	  color: #ffcc99;
	  }
	  
	  .chocolate-color{
	  color: #3f000f;
	  }
	  
	  .black-forest-color{
	  color: #2C2732;
	  }
	  
	  .strawberry-color{
	  color: #fc5a8d;
	  }
	  
	  .pine-apple-color{
	  color: #e6ae25;
	  }
	  
	  .hi{
	    font-family: 'Baloo 2', cursive;
	  }
	  
	  input{
	    text-decoration: bold;
	  }
</style>
<link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Baloo+2:wght@600&display=swap" rel="stylesheet" >
</head>
  <body onload="taggerjs ();getLocation ();">
<?php
  include('../page_parts/inc_menu.php');
?>
	<center>
	  <div class="container">
		<div class="row">
		  <div class="hidden-xs col-sm-1 col-md-1 col-lg-3 col-xl-3">
			<!--Left Gap-->
		  </div>
		  <div class="col">
			<!--Mid main Start-->
<?php 
include('../page_parts/inc_logo.php');
?> 
			<h2 class="black-text">बेकरी स्टोर</h2>
			
			<hr>
			<!--Content-->
			<!--Table-->
			<h4 class="h4 mt-3 wow fadeInUpBig">डिलीवरी रेट</h4>
			<table id="tablePreview" class="table text-white striped special-color rounded table-hover">
			  <thead class="wow fadeInUp">
				<tr class="wow fadeInUp">
				  <th>क्रमांक</th>
				  <th>खरीदारी</th>
				  <th>होम डिलीवरी चार्ज</th>
				</tr>
			  </thead>
			  <tbody class="wow fadeInUp">
				<tr class="wow fadeInUp">
				  <th scope="row">1</th>
				  <td>100-199 ₹</td>
				  <td>30 ₹</td>
				</tr>
				<tr class="wow fadeInUp">
				  <th scope="row">2</th>
				  <td>200-249 ₹</td>
				  <td>20 ₹</td>
				</tr>
				<tr class="wow fadeInUp text-warning">
				  <th scope="row">3</th>
				  <td>250-500 ₹</td>
				  <td>10 ₹</td>
				</tr>
				<tr class="wow fadeInUp text-success">
				  <th scope="row">4</th>
				  <td>500 ₹ या अधिक</td>
				  <td>फ्री डिलीवरी</td>
				</tr>
			  </tbody>
			</table>
			<h4 class="h4 mt-3 wow fadeInUpBig">बुकिंग</h4>

			<div class="hi alert alert-primary mt-3" role="alert">
			  पहले बुकिंग करें<br>
			  फिर आपको फोन पर सामान की कीमत बताई जाएगी<br>
			  जब आप हाँ करेंगे तब डिलीवरी की जाएगी।
			  <br>
			  <br>
			  <p class="mdb-color-text h5-responsive"><strong>निःसंकोच बुकिंग करें क्योंकि हम बिना पूछे डिलीवरी नही करेंगे।</strong></p>
			</div>
<!--Cream-->
			<div class="hi card p-3 m-3 text-justify" id="div_type_selection">
			  <h3 class="text-info text-center">कैसा केक चाहिए ?:</h3>
			  <div id="div_fresh_cream" class="mt-2 h3-responsive form-check indigo-text">
				<input type="radio" value="फ्रेश क्रीम" class="mt-2 form-check-input" id="sel_fresh_cream" name="cream">
				<label class="form-check-label" for="sel_fresh_cream">फ्रेश क्रीम [500 ₹/किलोग्राम]<i class="fa-duotone fa-crown fa-lg ml-2 animated infinite wave tada fast amber-text"></i></label>
			  </div>
			  <div id="div_plain_cream" class="h3-responsive form-check indigo-text">
				<input type="radio" value="प्लेन क्रीम" class="form-check-input" id="sel_plain_cream" name="cream">
				<label class="form-check-label" for="sel_plain_cream">प्लेन क्रीम [300₹/किलोग्राम]</label>
			  </div>
			  <center>
				<button type="button" id="btn_launch_div_food_strain" class="mt-4 btn w-30 btn-indigo rounded btn-md">ठीक<i class="fa-duotone fa-chevrons-right ml-2"></i></button>
			  </center>
			</div>
<!--Food strain-->
			<div class="hi card hidden p-3 m-3 text-justify" id="div_food_strain">
			  <h3 class="text-info text-center">अंडा वाला या बिना अंडा:</h3>
			  <div id="div_eggless" class="mt-2 h3-responsive form-check indigo-text">
				<input type="radio" value="बिना अंडा वाला" class="mt-2 form-check-input" id="sel_eggless" name="food_strain">
				<label class="form-check-label" for="sel_eggless">अंडा रहित (शाकाहारी)
				<i class="fa-duotone fa-circle-small text-success ml-2"></i>
				 </label>
			  </div>
			  <div id="div_eggok" class="h3-responsive form-check indigo-text">
				<input type="radio" value="अंडा वाला" class="form-check-input" id="sel_eggok" name="food_strain">
				<label class="form-check-label" for="sel_eggok">अंडा युक्त (अंडे वाला)
				 <i class="fa-duotone fa-circle-small text-danger ml-2"></i>
				 </label>
			  </div>
			  <center>
				<button type="button" id="btn_launch_div_flavour" class="mt-4 btn w-30 btn-indigo rounded btn-md">ठीक <i class="fa-duotone fa-chevrons-right ml-2"></i></button>
			  </center>
			</div>
			
<!--Flavour-->
			<div class="hi card p-3 m-3 text-justify hidden" id="div_flavour_selection">
			  <h3 class="text-info text-center">फ्लेवर:</h3>

			  <div id="div_flav_vanilla" class="mt-3 h3-responsive form-check vanilla-color">
				<input type="radio" value="वैनीला" class="mt-2 form-check-input" id="sel_flav_vanilla" name="flavour">
				<label class="form-check-label vanilla-color" for="sel_flav_vanilla">वनीला <i class="fa-duotone fa-cake-candles ml-2"></i></label>
			  </div>

			  <div id="div_flav_chocolate" class="mt-2 h3-responsive form-check chocolate-color">
				<input type="radio" value="चॉकलेट" class="mt-2 form-check-input" id="sel_flav_chocolate" name="flavour">
				<label class="form-check-label" for="sel_flav_chocolate">चॉकलेट <i class="fa-duotone fa-cake-candles ml-2"></i></label>
			  </div>

			  <div id="div_flav_black_forest" class="mt-2 h3-responsive form-check black-forest-color">
				<input type="radio" value="ब्लैक फॉरेस्ट" class="mt-2 form-check-input" id="sel_flav_black_forest" name="flavour">
				<label class="form-check-label" for="sel_flav_black_forest">ब्लैक फॉरेस्ट <i class="fa-duotone fa-cake-candles ml-2"></i></label>
			  </div>

			  <div id="div_flav_strawberry" class="mt-2 h3-responsive form-check strawberry-color">
				<input type="radio" value="स्ट्रॉबेरी" class="mt-2 form-check-input" id="sel_flav_strawberry" name="flavour">
				<label class="form-check-label" for="sel_flav_strawberry">स्ट्राबेरी <i class="fa-duotone fa-cake-candles ml-2"></i></label>
			  </div>

			  <div id="div_flav_pineapple" class="mt-2 h3-responsive form-check pine-apple-color">
				<input type="radio" value="पाइनएप्पल" class="mt-2 form-check-input" id="sel_flav_pineapple" name="flavour">
				<label class="form-check-label" for="sel_flav_pineapple">पाइनएप्पल <i class="fa-duotone fa-cake-candles ml-2"></i></label>
			  </div>

			  <center>
				<button type="button" id="btn_launch_div_quantity" class="btn mt-4 w-30 btn-indigo rounded btn-md">ठीक <i class="fa-duotone fa-chevrons-right ml-2"></i></button>
			  </center>
			</div>
			
<!--Weight-->
			<div class="hi card p-3 h3-responsive m-3 text-justify hidden" id="div_quantity_selection">
			  <h3 class="text-info text-center">केक का वज़न:</h3>
			  <div class="form-row">
				<div class="col">
				  <div class="md-form md-outline mt-1">
					<input id="input_kg" class="form-control blue-text" type="number" maxlength=2>
					<label for="input_kg"><i class="fa-duotone fa-scale-unbalanced mr-3"></i>किलो</label>
				  </div>
				</div>
				<div class="col">
				  <div class="md-form md-outline mt-1">
					<input id="input_gr" class="form-control blue-text" type="number" maxlength=3>
					<label for="input_gr"><i class="fa-duotone fa-scale-unbalanced mr-3"></i>ग्राम</label>
				  </div>
				</div>
			  </div>
			  <center>
				<button type="button" id="btn_launch_div_date" class="btn mt-2 w-30 btn-indigo rounded btn-md">ठीक <i class="fa-duotone fa-chevrons-right ml-2"></i></button>
			  </center>
			</div>
			
<!--Date-->
			<div class="hi card h3-responsive p-3 m-3 text-justify hidden" id="div_date_selection">
			  <h3 class="text-info text-center">कब चाहिए:</h3>
			  <div class="form-row">
				<div class="col">
				  <div class="md-form md-outline">
					<input id="field_date" maxlength="2" name="field_date" class="form-control blue-text" type="tel">
					<label for="field_date"><i class="fa-duotone fa-calendar-pen mr-3"></i>तारीख़</label>
				  </div>
				</div>
				<div class="col">
				  <div class="md-form md-outline">
					<input id="field_month" maxlength="2" name="field_month" class="form-control blue-text" type="tel">
					<label for="field_month"><i class="fa-duotone fa-calendar-pen mr-3"></i>महीना</label>
				  </div>
				</div>
				
			  </div>
			  <center>
				<button type="button" id="btn_launch_div_delivery" class="btn mt-4 w-30 btn-indigo rounded btn-md">ठीक <i class="fa-duotone fa-chevrons-right ml-2"></i></button>
			  </center>
			</div>
			
<!--Delivery-->
			<div class="hi card h3-responsive p-3 m-3 text-justify hidden" id="div_delivery_selection">
			  <h3 class="text-info text-center">डिलीवरी:</h3>
			  <div id="div_home_del" class="form-check indigo-text">
				<input type="radio" value="होम डिलिवरी" class="form-check-input" id="sel_home_del" name="delivery">
				<label class="form-check-label" for="sel_home_del">घर पर डिलीवरी <i class="fa-duotone fa-house ml-2"></i></label>
			  </div>
			  <div id="div_shop_del" class="form-check indigo-text">
				<input type="radio" value="दुकान से पिकअप" class="form-check-input" id="sel_shop_del" name="delivery">
				<label class="form-check-label" for="sel_shop_del">दुकान पर डिलीवरी <i class="fa-duotone fa-store ml-2"></i></label>
			  </div>
			  <center>
				<button type="button" id="btn_launch_div_u_info" class="btn mt-4 w-30 btn-indigo rounded btn-md">ठीक <i class="fa-duotone fa-chevrons-right ml-2"></i></button>
			  </center>
			</div>
			
<!-- User details-->
			<div id="div_u_info" class="hi view card pl-4 pr-4 pt-2 pb-2 mt-3 wow fadeInUp hidden">
			  <h4 class="text-black-50 font-weight-bolder wow fadeInUp">संपर्क</h4>
			  <form method="post" name="form_u_info" onsubmit="return validate()" action="/php/rec_ord.php">
			  <div class="md-form md-outline mt-1">
				<input id="field_name" name="name" class="form-control blue-text" type="text" maxlength=10>
				<label for="field_name"><i class="fa-duotone fa-user mr-3"></i>नाम</label>
			  </div>

			  <div class="md-form md-outline mt-0">
				<input id="field_phone" name="phone" class="form-control blue-text" type="tel" required maxlength=10>
				<label for="field_phone"><i class="fa-duotone fa-mobile-button mr-3"></i>फोन</label>
			  </div>

				<input type="hidden" id="field_loc" name="location">
				<input type="hidden" id="dep" value="77653" name="dep"/>
				<input type="hidden" id="order" value="" name="order"/>
			  
			  <div class="row">
    				<div class="col text-right">
    				  <button type="button" id="btn_cancel" class="btn btn-deep-orange btn-md w-70"><i class="fa-duotone fa-chevrons-left mr-2"></i> बैक</button>
    				</div>
    				<div class="col text-left">
    				  <button type="submit" id="btn_launch_form_submit" class="btn btn-indigo btn-md w-70">ठीक <i class="fa-duotone fa-check ml-2"></i></button>
    				</div>
			  </div>
			  </form>
<?php
 include("../php/db_acts.php");
 echo get_fetch ("table_snippets",
                 "code",
                 "id",
                 "SN2");
?>
       
			 </div>
<!-- end of div user info-->

		   </div>
		  <!--Mid main End-->
		  <div class="hidden-xs col-sm-1 col-md-1 col-lg-3 col-xl-3">
			<!--Right Gap-->
		  </div>
	  	</div>
	  </div>
<?php
include("../page_parts/inc_footer_img.php");
?>
</center>
	<!-- End your project here-->
<?php 
  include('../page_parts/inc_bottom.php');
?>
<script>
function fill_order( )
{
var order="";
order+="क्रीम: "+ document.querySelector('input[name="cream"]:checked').value;
order+="\n<br> वेज/नॉन-वेज: "+ document.querySelector('input[name="food_strain"]:checked').value;
order+="\n<br> फ्लेवर: "+ document.querySelector('input[name="flavour"]:checked').value;
order+="\n<br> किलोग्राम: "+document.getElementById("input_kg").value + " ग्राम: "+document.getElementById("input_gr").value;
order+="\n<br> तारीख़: "+document.getElementById("field_date").value + "/"+document.getElementById("field_month").value;
order+="\n<br> डिलीवरी: "+ document.querySelector('input[name="delivery"]:checked').value;
document.getElementById("order").value=order;
return true;
}

  
</script>
<script type="text/javascript">
$ (document).ready (function( )
					{
					var size = $("#div_fresh_cream").css('font-size');
					
					$ ("#field_name").val (Cookies.get ('cname')).change ();
					$ ("#field_phone").val (Cookies.get ('cphone')).change ();

					$ ("#btn_launch_div_flavour").click (function( )
														 {
														 var div1=$ ('#div_food_strain');
														 var div2=$ ('#div_flavour_selection');
														 div1.animate ({height:'hide'}, "slow");
														 div2.animate ({height:'show'}, "slow");
														 });
														 
					$ ("#btn_launch_div_food_strain").click (function( )
														 {
														 var div1=$ ('#div_type_selection');
														 var div2=$ ('#div_food_strain');
														 div1.animate ({height:'hide'}, "slow");
														 div2.animate ({height:'show'}, "slow");
														 });
												
					$ ("#btn_launch_div_quantity").click (function( )
														{
														var div1=$ ('#div_flavour_selection');
														var div2=$ ('#div_quantity_selection');
														div1.animate ({height:'hide'}, "slow");
														div2.animate ({height:'show'}, "slow");
														}); 
												
					$ ("#btn_launch_div_date").click (function( )
														 {
														 var div1=$ ('#div_quantity_selection');
														 var div2=$ ('#div_date_selection');
														 div1.animate ({height:'hide'}, "slow");
														 div2.animate ({height:'show'}, "slow");
														 });
														 
					$ ("#btn_launch_div_delivery").click (function( )
														  {
														  var div1=$ ('#div_date_selection');
														  var div2=$ ('#div_delivery_selection');
														  div1.animate ({height:'hide'}, "slow");
														  div2.animate ({height:'show'}, "slow");
														  });

					$ ("#btn_launch_div_u_info").click (function( )
														{
														var div1=$ ('#div_delivery_selection');
														var div2=$ ('#div_u_info');
														div1.animate ({height:'hide'}, "slow");
														div2.animate ({height:'show'}, "slow");
														});				
				  
					$ ("#btn_cancel").click (function( )
														 {
														 var div1=$ ('#div_type_selection');
														 var div2=$ ('#div_flavour_selection');
														 var div3=$ ('#div_quantity_selection');
														 var div4=$ ('#div_delivery_selection');
														 var div5=$ ('#div_u_info');
														 var field_ord= $ ('#order');
														 
														 div1.animate ({height:'show'}, "slow");
														 div2.animate ({height:'hide'}, "slow");
														 div3.animate ({height:'hide'}, "slow");
														 div4.animate ({height:'hide'}, "slow");
														 div5.animate ({height:'hide'}, "slow");
														 field_ord.val("");
														 
														 });
														 
					$("#sel_fresh_cream").on("change", function ()
											 {
											 //alert(this.value);
											 $("#div_fresh_cream").animate({fontSize: '+30px'},"fast");
											 $("#div_plain_cream").animate({fontSize: size},"fast");
											 });

					$("#sel_plain_cream").on("change", function ()
											 {
											 //alert(this.value);
											 $("#div_plain_cream").animate({fontSize: '+30px'},"fast");
											 $("#div_fresh_cream").animate({fontSize: size},"fast");
											 });

					$("#sel_eggless").on("change", function ()
											 {
											 //alert(this.value);
											 $("#div_eggless").animate({fontSize: '+30px'},"fast");
											 $("#div_eggok").animate({fontSize: size},"fast");
											 });
				    $("#sel_eggok").on("change", function ()
											 {
											 //alert(this.value);
											 $("#div_eggok").animate({fontSize: '+30px'},"fast");
											 $("#div_eggless").animate({fontSize: size},"fast");
											 });
											 
					$("#sel_flav_vanilla").on("change", function ()
											  {
											  //alert(this.value);
											  $("#div_flav_vanilla").animate({fontSize: '+30px'},"fast");
											  $("#div_flav_chocolate").animate({fontSize: size},"fast");
											  $("#div_flav_black_forest").animate({fontSize: size},"fast");
											  $("#div_flav_strawberry").animate({fontSize: size},"fast");
											  $("#div_flav_pineapple").animate({fontSize: size},"fast");
											  }); 

					$("#sel_flav_chocolate").on("change", function ()
												{
												//alert(this.value);
												$("#div_flav_vanilla").animate({fontSize: size},"fast");
												$("#div_flav_chocolate").animate({fontSize: '+30px'},"fast");
												$("#div_flav_black_forest").animate({fontSize: size},"fast");
												$("#div_flav_strawberry").animate({fontSize: size},"fast");
												$("#div_flav_pineapple").animate({fontSize: size},"fast");
												});

					$("#sel_flav_black_forest").on("change", function ()
												   {
												   //alert(this.value);
												   $("#div_flav_vanilla").animate({fontSize: size},"fast");
												   $("#div_flav_chocolate").animate({fontSize: size},"fast");
												   $("#div_flav_black_forest").animate({fontSize: '+30px'},"fast");
												   $("#div_flav_strawberry").animate({fontSize: size},"fast");
												   $("#div_flav_pineapple").animate({fontSize: size},"fast");
												   });

					$("#sel_flav_strawberry").on("change", function ()
												 {
												 //alert(this.value);
												 $("#div_flav_vanilla").animate({fontSize: size},"fast");
												 $("#div_flav_chocolate").animate({fontSize: size},"fast");
												 $("#div_flav_black_forest").animate({fontSize: size},"fast");
												 $("#div_flav_strawberry").animate({fontSize: '+30px'},"fast");
												 $("#div_flav_pineapple").animate({fontSize: size},"fast");
												 });

					$("#sel_flav_pineapple").on("change", function ()
												{
												//alert(this.value);
												$("#div_flav_vanilla").animate({fontSize: size},"fast");
												$("#div_flav_chocolate").animate({fontSize: size},"fast");
												$("#div_flav_black_forest").animate({fontSize: size},"fast");
												$("#div_flav_strawberry").animate({fontSize: size},"fast");
												$("#div_flav_pineapple").animate({fontSize: '+30px'},"fast");
												});


					$("#sel_home_del").on("change", function ()
										  {
										  //alert(this.value);
										  $("#div_home_del").animate({fontSize: '+30px'},"fast");
										  $("#div_shop_del").animate({fontSize: size},"fast");
										  });

					$("#sel_shop_del").on("change", function ()
										  {
										  //alert(this.value);
										  $("#div_shop_del").animate({fontSize: '+30px'},"fast");
										  $("#div_home_del").animate({fontSize: size},"fast");
										  });
					});
					
					
					$ (":submit").click (function( )
														{
														var div1=$ ('#loading_div');
														
														if($ ('#field_phone').val().length==10)
														{
														  div1.removeClass("hidden");
														  setTimeout(function() {   //calls click event after a certain time
                              div1.addClass("hidden");
                            }, 10000);
														}
														else
														{
														  //var div_err_pn=$ ('#err_pn');
														  //div_err_pn.removeClass("hidden");
														  alert("कृपया सही जानकारी दर्ज करें!");
														}
														
														});				
</script>
  </body>
  <?php
  include('../php/myPHP.php');
  hit("77653");
  ?>
<script type="text/javascript">

function setCookie( key, value, expiry )
{
var expires = new Date ();
expires.setTime (expires.getTime () + ( expiry * 24 * 60 * 60 * 1000 ));
document.cookie = key + '=' + value + ';expires=' + expires.toUTCString ();
}

function getCookie( key )
{
var keyValue = document.cookie.match ('(^|;) ?' + key + '=([^;]*)(;|$)');
return keyValue ? keyValue [2] : null;
}

function eraseCookie( key )
{
var keyValue = getCookie (key);
setCookie (key, keyValue, '-1');
}
function taggerjs( )
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

</script>
<script>
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

function validate ()
    {
      var x = document.forms["form_u_info"]["phone"].value;
      var result,ans1,ans2;
      if(x.length==10)
      {
        ans1=true;
      }
      else
      {
        alert ("फोन नंबर गलत है।")
        ans1=false;
      }
      if(fill_order()==true)
      {
        ans2=true;
      }
      else
      {
        ans2=false;
      }
      if(ans1==true&&ans2==true)
      {
        result=true;
      }
      else
      {
        result=false;
      }
      return result;
    }
</script>
</html>
