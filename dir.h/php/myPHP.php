<?php
function dater($D_TYPE)
{
date_default_timezone_set("Asia/Calcutta"); 
$D="";
if($D_TYPE==="D"||$D_TYPE==="d")
 {
$D=date('d');
 }
if($D_TYPE==="M"||$D_TYPE==="m")
 {
$D=date('m');
 }
if($D_TYPE==="Y"||$D_TYPE==="y")
 {
$D=date('Y');
 }
if($D_TYPE==="H"||$D_TYPE==="h")
 {
$D=date('H');
 }
if($D_TYPE==="I"||$D_TYPE==="i")
 {
$D=date('i');
 }
if($D_TYPE==="S"||$D_TYPE==="s")
 {
$D=date('s');
 }
if($D_TYPE==="F"||$D_TYPE==="f")
 {
$D=date('d-m-Y H:i:s');
 }
if($D_TYPE==="FD"||$D_TYPE==="fd")
 {
$D=date('d-m-Y');
 }
if($D_TYPE==="FT"||$D_TYPE==="ft")
 {
$D=date('H:i:s');
 }
return $D;
}


function slab_to_rs($Slab_to_calculate,$Cal_Price_To_Calculate)
{
  list($Slab_sign,$Slab_type,$Slab_value)=explode(",",$Slab_to_calculate);
  if(strcmp($Slab_sign,"-")==0)
  {
    // Minus slab
        if(strcmp($Slab_type,"%")==0)
      {
        //$Price = ((int) $Cal_Price_To_Calculate * (int) $Slab_value);
        $Price=round($Cal_Price_To_Calculate - ($Cal_Price_To_Calculate*$Slab_value/100));
      }
      if(strcmp($Slab_type,"n")==0)
      {
        $Price=round($Cal_Price_To_Calculate - $Slab_value);
      }
  }
  if(strcmp($Slab_sign,"+")==0)
  {
    // Plus slab
        if(strcmp($Slab_type,"%")==0)
      {
        //$Price = ((int) $Cal_Price_To_Calculate * (int) $Slab_value);
        $Price=round($Cal_Price_To_Calculate + ($Cal_Price_To_Calculate*$Slab_value/100));
      }
      if(strcmp($Slab_type,"n")==0)
      {
        $Price=round($Cal_Price_To_Calculate + $Slab_value);
      }
  }
  return $Price;
}


function sms ($Sms_to_number,$Sms_to_send)
{
  include ("dbcon.php");
  $Sms_to_send=rawurlencode($Sms_to_send);
  $Sms_api_key="z0xQ7Y69sZHNSdTut1iWbEBgaykm28XJKMeDroI3Glq5Vp4CPUksW65AQTe1nzclvCOfMGRHYa9b0oyV";
  $Status=false;
  $Sms_api_url="https://www.fast2sms.com/dev/bulkV2?authorization=$Sms_api_key&route=v3&sender_id=Cghpet&message=$Sms_to_send&language=english&flash=0&numbers=$Sms_to_number";
  $obj = json_decode(file_get_contents($Sms_api_url), true);
  if($obj['message'][0]=="SMS sent successfully.")
  {
    $Sms_id=$obj['request_id'];
    $sql = "INSERT INTO table_sms (id,phone,sms,date,time)
          VALUES ('$Sms_id','$Sms_to_number','".rawurldecode($Sms_to_send)."','".dater("y")."-".dater("m")."-".dater("d")."','".dater("ft")."')";
    if (mysqli_query($conn, $sql))
    {;} else{;}
    $Status=true;
  }
  return $Status;
}


function moneyFormat($num) 
{
    $explrestunits = "" ;
    if(strlen($num)>3) 
    {
        $lastthree = substr($num, strlen($num)-3, strlen($num));
        $restunits = substr($num, 0, strlen($num)-3); // extracts the last three digits
        $restunits = (strlen($restunits)%2 == 1)?"0".$restunits:$restunits; // explodes the remaining digits in 2's formats, adds a zero in the beginning to maintain the 2's grouping.
        $expunit = str_split($restunits, 2);
        for($i=0; $i<sizeof($expunit); $i++) {
            // creates each of the 2's group and adds a comma to the end
            if($i==0) 
            {
                $explrestunits .= (int)$expunit[$i].","; // if is first value , convert into integer
            } else
            {
                $explrestunits .= $expunit[$i].",";
            }
        }
        $thecash = $explrestunits.$lastthree;
    } 
    else 
    {
        $thecash = $num;
    }
    return $thecash; // writes the final format where $currency is the currency symbol.
}





function extract_number ($String_with_number)
{
$number = (int) filter_var($String_with_number, FILTER_SANITIZE_NUMBER_INT);
return $number;
}


function get_url()
{
  $actual_link = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
  return $actual_link;
}


function getIP() {

    // Check for shared Internet/ISP IP
    if (!empty($_SERVER['HTTP_CLIENT_IP']) && validate_ip($_SERVER['HTTP_CLIENT_IP'])) {
        return $_SERVER['HTTP_CLIENT_IP'];
    }

    // Check for IP addresses passing through proxies
    if (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {

        // Check if multiple IP addresses exist in var
        if (strpos($_SERVER['HTTP_X_FORWARDED_FOR'], ',') !== false) {
            $iplist = explode(',', $_SERVER['HTTP_X_FORWARDED_FOR']);
            foreach ($iplist as $ip) {
                if (validate_ip($ip))
                    return $ip;
            }
        }
        else {
            if (validate_ip($_SERVER['HTTP_X_FORWARDED_FOR']))
                return $_SERVER['HTTP_X_FORWARDED_FOR'];
        }
    }
    if (!empty($_SERVER['HTTP_X_FORWARDED']) && validate_ip($_SERVER['HTTP_X_FORWARDED']))
        return $_SERVER['HTTP_X_FORWARDED'];
    if (!empty($_SERVER['HTTP_X_CLUSTER_CLIENT_IP']) && validate_ip($_SERVER['HTTP_X_CLUSTER_CLIENT_IP']))
        return $_SERVER['HTTP_X_CLUSTER_CLIENT_IP'];
    if (!empty($_SERVER['HTTP_FORWARDED_FOR']) && validate_ip($_SERVER['HTTP_FORWARDED_FOR']))
        return $_SERVER['HTTP_FORWARDED_FOR'];
    if (!empty($_SERVER['HTTP_FORWARDED']) && validate_ip($_SERVER['HTTP_FORWARDED']))
        return $_SERVER['HTTP_FORWARDED'];

    // Return unreliable IP address since all else failed
    return $_SERVER['REMOTE_ADDR'];
}

/**
 * Ensures an IP address is both a valid IP address and does not fall within
 * a private network range.
 */
function validate_ip($ip) {

    if (strtolower($ip) === 'unknown')
        return false;

    // Generate IPv4 network address
    $ip = ip2long($ip);

    // If the IP address is set and not equivalent to 255.255.255.255
    if ($ip !== false && $ip !== -1) {
        // Make sure to get unsigned long representation of IP address
        // due to discrepancies between 32 and 64 bit OSes and
        // signed numbers (ints default to signed in PHP)
        $ip = sprintf('%u', $ip);

        // Do private network range checking
        if ($ip >= 0 && $ip <= 50331647)
            return false;
        if ($ip >= 167772160 && $ip <= 184549375)
            return false;
        if ($ip >= 2130706432 && $ip <= 2147483647)
            return false;
        if ($ip >= 2851995648 && $ip <= 2852061183)
            return false;
        if ($ip >= 2886729728 && $ip <= 2887778303)
            return false;
        if ($ip >= 3221225984 && $ip <= 3221226239)
            return false;
        if ($ip >= 3232235520 && $ip <= 3232301055)
            return false;
        if ($ip >= 4294967040)
            return false;
    }
    return true;
}




function logger($PAGE,$GRADE,$EVENT)
{
$D='<h4 class="text text-'.$GRADE.'">'.
$EVENT.'</h4>'.
'<p class="text text-muted">'.
'<br>Page: '.$PAGE.
'<br>Time: '.dater("f").
'<br>Tag: '.getC('ut').
'<br>Name: '.getC('un').
'<br>Phone: '.getC('up').
'<br>IP: '.getIP().
'</p><hr>';
$fp=fopen('files/log','a+');
fwrite($fp,$D);
fclose($fp);
}




function getC($cookie_name)
{
$c="";
if(isset($_COOKIE[$cookie_name]))
{
$c=$_COOKIE[$cookie_name];
}
return $c;
}




function delC($cookie_name)
{
  setcookie($cookie_name, "", time() - 3600);
}




function setC($cookie_name,$cookie_data)
{
setcookie($cookie_name,$cookie_data,time()+31556926 ,'/','.sidhauli.cf');
}




function tagger()
{
if(getC('ut')==="")
 {
$t=((int)dater("D")+(int)dater("M")+(int)dater("Y")+(int)dater("H")+(int)dater("I")+(int)dater("S"))*rand(1,10);
setcookie("ut",''.$t,time()+31556926 ,'/');
 }
 else
 {
   //echo "tag: ".getC("ut");
 }
}




function reader($filename)
{
$fileContent = file_get_contents($filename);
return $fileContent;
}




function appender($filename,$D)
{
$fp=fopen($filename,'a+');
fwrite($fp,$D);
fclose($fp);
}




function hwriter($filename,$D)
{
$fp=fopen($filename,'w+');
fwrite($fp,$D);
fclose($fp);
}




function hit($PAGE_CODE)
{
if(getC("cphone")=="8737025071")
{;}
else
  {
  // if visitor is not admin
  include 'dbcon.php';
  $Ip= "'".getIP()."'";
  $Date= "'".dater("y")."-".dater("m")."-".dater("d")."'";
  $Time = "'".dater("ft")."'";
  $Name = "'".getC("cname")."'";
  $Phone = "'".getC("cphone")."'";
  $Tag="'".getC('ut')."'";
  $Page= "'".$PAGE_CODE."'";
  
    $sql= "INSERT INTO table_hit(page_code,ip,date,time,cname,cphone,tag) VALUES (".
    $Page.",".
    $Ip.",".
    $Date.",".
    $Time.",".
    $Name.",".
    $Phone.",".
    $Tag.
    ")";
    if(mysqli_query ($conn,$sql))
    {
    //echo "done";
    }
    else
    {
    echo "error".$sql."<br>".mysqli_error($con);
    //logger("myPHP.php hit function","danger","Database error: ".mysqli_error($con));
    }
  mysqli_close($conn);
  }
}




function random($length_of_string) 
{ 
    // String of all alphanumeric character 
    $str_result = '123456789ABCDEFGHJKLMNPQRSTUVWXYZ'; 
    // Shufle the $str_result and returns substring 
    // of specified length 
    return substr(str_shuffle($str_result),0, $length_of_string); 
} 




use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer-master/src/Exception.php';
require 'PHPMailer-master/src/PHPMailer.php';
require 'PHPMailer-master/src/SMTP.php';
function mailer($Subject, $ToEmail, $ToName, $EmailToSend)
{
$Status;
$smtpUsername="admin@sidhauli.co.in";
$smtpPassword="raK8!IpF*Y86q0";
$emailFrom=$smtpUsername;
$emailFromName="Sidhauli Online";
$emailTo=$ToEmail;
$emailToName=$ToName;

$mail = new PHPMailer;
$mail->isSMTP(); 
$mail->SMTPDebug = 0; // 0 = off (for production use) - 1 = client messages - 2 = client and server messages
$mail->Host = "mail.sidhauli.co.in"; // use $mail->Host = gethostbyname('smtp.gmail.com'); // if your network does not support SMTP over IPv6
$mail->Port = 587; // TLS only
$mail->SMTPSecure = 'tls'; // ssl is depracated
$mail->SMTPAuth = true;
$mail->Username = $smtpUsername;
$mail->Password = $smtpPassword;
$mail->setFrom($emailFrom, $emailFromName);
$mail->addAddress($emailTo, $emailToName);
$mail->Subject = $Subject;
$mail->msgHTML($EmailToSend); //$mail->msgHTML(file_get_contents('contents.html'), __DIR__); //Read an HTML message body from an external file, convert referenced images to embedded,
$mail->AltBody = $EmailToSend;
	$mail->SMTPOptions = [
    'ssl' => [
        'verify_peer' => false,
        'verify_peer_name' => false,
        'allow_self_signed' => true,
    ]
];
// $mail->addAttachment('images/phpmailer_mini.png'); //Attach an image file

if(!$mail->send()){
  $Status=false;
   // echo "Mailer Error: " . $mail->ErrorInfo;
}else{
  $Status=true;
  // echo "Message sent!";
}
return $Status;
}





function admail($Order_n)
{
include('db_acts.php');
$Email_html=get_fetch ("table_snippets",
                       "code",
                       "id",
                       "SN23");
$Name=get_fetch ("table_orders",
                       "name",
                       "o_n",
                       $Order_n);
$Phone=get_fetch ("table_orders",
                       "phone",
                       "o_n",
                       $Order_n);
$Department_code=get_fetch ("table_orders",
                       "department",
                       "o_n",
                       $Order_n);    
$Department=get_fetch ("table_pages",
                       "p_name_e",
                       "p_id",
                       $Department_code);                       
$Email_html= str_replace("#name",$Name,$Email_html); 
$Email_html= str_replace("#phone",$Phone,$Email_html);
$Email_html= str_replace("#department",$Department,$Email_html);
$Email_html= str_replace("#url","https://sidhauli.cf/php/show_full_order.php?on=".$Order_n,$Email_html);

 mailer("Order Booking Notification",
        "admin@sidhauli.co.in",
        "Admin",
        $Email_html);
}


function redirect($url, $permanent = false)
{
    if (headers_sent() === false)
    {
        header('Location: ' . $url, true, ($permanent === true) ? 301 : 302);
    }

    exit();
}


?>
