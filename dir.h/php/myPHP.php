<?php
function fun_pricer($Mrp, $Dis_type, $Dis) {
  include("db_con.php");
  $answer = "";
  $sql2 = "select pricer('$Mrp','$Dis_type','$Dis') as price";
  $result2 = mysqli_query($conn, $sql2);
  if (mysqli_num_rows($result2) > 0) {
    // output data of each row
    while ($row2 = mysqli_fetch_assoc($result2)) {
      $answer = $row2["price"];
    }
  }
  return $answer;
}

function cart_sum($UserInternalId) {
  include("db_con.php");
  $answer = "";

  //Get every cart
  $sql = "select * from table_orders where stts_code='cart' and uinid='$UserInternalId' order by concat(dt,tm) desc";
  $result = mysqli_query($conn, $sql);
  if (mysqli_num_rows($result) > 0) {
    // output data of each row
    while ($row = mysqli_fetch_assoc($result)) {

      if ($row["size"] != "") {
        //Sizing case
        //Base price sized
        $ArrBasePrices = array();
        $ArrCrustPrices = array();
        $ArrAddonPrices = array();
        $sql2 = "select pricer(
                                (select mrp_".$row['size']." from table_products where prodinid='".$row['prodinid']."'),
                                (select dis_type_".$row['size']." from table_products where prodinid='".$row['prodinid']."'),
                                (select dis_".$row['size']." from table_products where prodinid='".$row['prodinid']."')
                              ) as base_price";
        $result2 = mysqli_query($conn, $sql2);
        if (mysqli_num_rows($result2) > 0) {
          // output data of each row
          while ($row2 = mysqli_fetch_assoc($result2)) {
            array_push($ArrBasePrices, $row2["base_price"]);
          }
        }

        //Crust price
        $sql2 = "select price_".$row["size"]." as crust_price from table_customs where custinid='".$row["crust"]."'";
        //echo $sql2;
        $result2 = mysqli_query($conn, $sql2);
        if (mysqli_num_rows($result2) > 0) {
          // output data of each row
          while ($row2 = mysqli_fetch_assoc($result2)) {
            array_push($ArrCrustPrices, $row2["crust_price"]);
          }
        }

        // Addon prices
        $ArrAddons = explode(",", $row["addons"]);
        for ($i = 0; $i < count($ArrAddons)-1; $i++) {
          $sql2 = "select price_".$row["size"]." as addon_price from table_customs where custinid='".$ArrAddons[$i]."'";
          $result2 = mysqli_query($conn, $sql2);
          if (mysqli_num_rows($result2) > 0) {
            // output data of each row
            while ($row2 = mysqli_fetch_assoc($result2)) {
              array_push($ArrAddonPrices, $row2["addon_price"]);
            }
          }
        }

        $CurTtl = (array_sum($ArrBasePrices)+array_sum($ArrCrustPrices)+array_sum($ArrAddonPrices))*$row["quantity"];
        $answer .= $CurTtl."÷";
        $ArrAddons = array();
        $ArrAddonPrices = array();
        $ArrBasePrices = array();
        $ArrCrustPrices = array();


      } else {
        $Quantity = $row["quantity"];
        $Mrp = $row["mrp"];
        $Dis_type = $row["dis_type"];
        $Dis = $row["dis"];
        $UnitPrice = "";
        $sql2 = "select pricer(
                                (select mrp from table_products where prodinid='".$row['prodinid']."'),
                                (select dis_type from table_products where prodinid='".$row['prodinid']."'),
                                (select dis from table_products where prodinid='".$row['prodinid']."')
                              ) as unit_price";
        $result2 = mysqli_query($conn, $sql2);
        if (mysqli_num_rows($result2) > 0) {
          // output data of each row
          while ($row2 = mysqli_fetch_assoc($result2)) {
            $UnitPrice = $row2["unit_price"];
          }
        }
        $CurTtl = $Quantity*$UnitPrice;

        $answer .= $CurTtl."÷";
      }

    }
  }
  return $answer;
}


function random($length_of_string) {
  // String of all alphanumeric character
  $str_result = '123456789ABCDEFGHJKLMNPQRSTUVWXYZ';
  // Shufle the $str_result and returns substring
  // of specified length
  return substr(str_shuffle($str_result), 0, $length_of_string);
}

function dater($D_TYPE) {
  date_default_timezone_set("Asia/Calcutta");
  $D = "";
  if ($D_TYPE === "D" || $D_TYPE === "d") {
    $D = date('d');
  }
  if ($D_TYPE === "M" || $D_TYPE === "m") {
    $D = date('m');
  }
  if ($D_TYPE === "Y" || $D_TYPE === "y") {
    $D = date('Y');
  }
  if ($D_TYPE === "H" || $D_TYPE === "h") {
    $D = date('H');
  }
  if ($D_TYPE === "I" || $D_TYPE === "i") {
    $D = date('i');
  }
  if ($D_TYPE === "S" || $D_TYPE === "s") {
    $D = date('s');
  }
  if ($D_TYPE === "F" || $D_TYPE === "f") {
    $D = date('d-m-Y H:i:s');
  }
  if ($D_TYPE === "FD" || $D_TYPE === "fd") {
    $D = date('d-m-Y');
  }
  if ($D_TYPE === "FT" || $D_TYPE === "ft") {
    $D = date('H:i:s');
  }
  return $D;
}

function sms($Sms_to_number,$Sms_to_send,$TemplateId) {
  include ("db_con.php");
  $curl = curl_init();
  $Status = false;
  $numberList = json_encode(array($Sms_to_number));
  $message = json_encode($Sms_to_send);
  $senderId = json_encode("AMPIZA");
  $apikey = json_encode("cjl3n6emb000ggdqueyik3abz");
  $TemplateId = json_encode($TemplateId);
  curl_setopt_array($curl, array(
    CURLOPT_URL => "https://smsapi.edumarcsms.com/api/v1/sendsms",
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_ENCODING => "",
    CURLOPT_MAXREDIRS => 10,
    CURLOPT_TIMEOUT => 30,
    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
    CURLOPT_CUSTOMREQUEST => "POST",
    CURLOPT_POSTFIELDS => "{\n\"apikey\":$apikey ,
                            \n\"number\":$numberList,
                            \n\"message\":$message,
                            \n\"senderId\": $senderId,
                            \n\"templateId\": $TemplateId}",
    CURLOPT_HTTPHEADER => array(
      "content-type: application/json",
    ),
  ));
  $response = curl_exec($curl);
  $err = curl_error($curl);
  curl_close($curl);
  if ($err) {
    //echo "CURL Error #:" . $err;
  } else {
    echo $response;
  }
 $obj = json_decode($response,true);

  $sql = "INSERT INTO table_sms (id,phone,sms,sent,stts_text,date,time)
          VALUES ('".$obj["data"]["transactionId"]."',
                  '$Sms_to_number',
                  '".rawurldecode($Sms_to_send)."',
                  '".$obj['success']."',
                  '".$Stts_text."',
                  CURDATE(),
                  CURTIME())";
  if (mysqli_query($conn, $sql)) {;
  } else {;
  }
  return $obj['success'];
}

/*function sms ($Sms_to_number, $Sms_to_send, $TemplateId) {
  error_reporting(E_ERROR | E_PARSE);
  ini_set("allow_url_fopen", 1);
  include ("db_con.php");
  $Sms_to_send = rawurlencode($Sms_to_send);
  $Sms_api_key = "cjl3n6emb000ggdqueyik3abz";
  $Status = false;
  $Sms_api_url = "https://smsapi.edumarcsms.com/api/v1/sendsms?apikey=".$Sms_api_key."&senderId=AMPIZA&message=".$Sms_to_send."&number=".$Sms_to_number."&templateId=".$TemplateId;
  $obj = json_decode(file_get_contents($Sms_api_url), true);
  if ($obj["success"] == "1" || $obj["success"] == "true") {
    $Status = true;
    $Stts_text = $obj['data']["msg"];
  } else {
    $Stts_text = $obj['err']["msg"];
  }
  //var_dump($obj);
  $sql = "INSERT INTO table_sms (id,phone,sms,sent,stts_text,date,time)
          VALUES ('".$obj["data"]["transactionId"]."',
                  '$Sms_to_number',
                  '".rawurldecode($Sms_to_send)."',
                  '".$obj['success']."',
                  '".$Stts_text."',
                  CURDATE(),
                  CURTIME())";
  if (mysqli_query($conn, $sql)) {;
  } else {;
  }
  return $Status;
}*/
//sms("8737025071","1234 is your OTP from Amazing Pizza.","1707166090435370465");

function moneyFormat($num) {
  $explrestunits = "";
  if (strlen($num) > 3) {
    $lastthree = substr($num, strlen($num)-3, strlen($num));
    $restunits = substr($num, 0, strlen($num)-3); // extracts the last three digits
    $restunits = (strlen($restunits)%2 == 1)?"0".$restunits:$restunits; // explodes the remaining digits in 2's formats, adds a zero in the beginning to maintain the 2's grouping.
    $expunit = str_split($restunits, 2);
    for ($i = 0; $i < sizeof($expunit); $i++) {
      // creates each of the 2's group and adds a comma to the end
      if ($i == 0) {
        $explrestunits .= (int)$expunit[$i].","; // if is first value , convert into integer
      } else
      {
        $explrestunits .= $expunit[$i].",";
      }
    }
    $thecash = $explrestunits.$lastthree;
  } else
  {
    $thecash = $num;
  }
  return $thecash; // writes the final format where $currency is the currency symbol.
}


function extract_number ($String_with_number) {
  $number = (int) filter_var($String_with_number, FILTER_SANITIZE_NUMBER_INT);
  return $number;
}


function get_url() {
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
    } else {
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



function getC($cookie_name) {
  $c = "";
  if (isset($_COOKIE[$cookie_name])) {
    $c = $_COOKIE[$cookie_name];
  }
  return $c;
}




function delC($cookie_name) {
  setcookie($cookie_name, "", time() - 3600);
}




function setC($cookie_name, $cookie_data) {
  setcookie($cookie_name, $cookie_data, time()+31556926, '/', '.sidhauli.cf');
}







function reader($filename) {
  $fileContent = file_get_contents($filename);
  return $fileContent;
}




function appender($filename, $D) {
  $fp = fopen($filename, 'a+');
  fwrite($fp, $D);
  fclose($fp);
}




function hwriter($filename, $D) {
  $fp = fopen($filename, 'w+');
  fwrite($fp, $D);
  fclose($fp);
}




function hit($PAGE_CODE) {
  include 'db_con.php';
  $Ip = "'".getIP()."'";
  $Cemail = "'".getC("cemail")."'";
  $Cphone = "'".getC("cphone")."'";
  $Id = uniqid();
  $sql = "INSERT INTO table_logs(id,page_id,cphone,cemail,ip,act_code,description,date,time) VALUES
    ('$Id','$PAGE_CODE',$Cphone,$Cemail,$Ip,'visit','',CURDATE(),CURTIME())";
  if (mysqli_query ($conn, $sql)) {
    //echo "done";
  } else
  {
    echo "error".$sql."<br>".mysqli_error($con);
    //logger("myPHP.php hit function","danger","Database error: ".mysqli_error($con));
  }
  mysqli_close($conn);
}



/*use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer-master/src/Exception.php';
require 'PHPMailer-master/src/PHPMailer.php';
require 'PHPMailer-master/src/SMTP.php';
function mailer($Subject, $ToEmail, $ToName, $EmailToSend)
{
$Status;
$smtpUsername="admin@townindia.in";
$smtpPassword="Vaibhav55";
$emailFrom=$smtpUsername;
$emailFromName="Town India Music";
$emailTo=$ToEmail;
$emailToName=$ToName;

$mail = new PHPMailer;
$mail->isSMTP();
$mail->SMTPDebug = 0; // 0 = off (for production use) - 1 = client messages - 2 = client and server messages
$mail->Host = "townindia.in"; // use $mail->Host = gethostbyname('smtp.gmail.com'); // if your network does not support SMTP over IPv6
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
*/
?>