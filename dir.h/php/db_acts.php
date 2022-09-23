<?php
//Get number of rows where Data=this
function get_rows ($Table_Name, $Where, $Data)
{
    include("db_con.php");
    $answer;
    $sql = "SELECT * FROM $Table_Name WHERE $Where='$Data'";
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) > 0)
    {
      $answer= mysqli_num_rows($result);
    } else 
    {
      $answer= "0";
    }
    return $answer;
    mysqli_close($conn);
}

function get_count ($Table_Name,$Column_name,$Where,$Data_to_match)
{
    include("db_con.php");
    $sql = "SELECT $Column_name FROM $Table_Name WHERE $Where='$Data_to_match'";
    $result = mysqli_query($conn, $sql);
    $answer= mysqli_num_rows($result);
    return $answer;
    mysqli_close($conn);
}


function get_max ($Table_Name,
                    $Column_name, 
                    $Where, 
                    $Data_to_match)
{
    include("db_con.php");
    $answer;
    $sql = "SELECT MAX(`$Column_name`) AS 'maximum' FROM `$Table_Name` WHERE `$Where`='$Data_to_match'";
    //echo $sql;
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) > 0)
    {
      while($row = mysqli_fetch_assoc($result)) 
      {
        $answer=$row["maximum"];
      }
    } 
    else 
    {
      $answer= "0";
    }
    return $answer;
    mysqli_close($conn);
}


function get_min ($Table_Name,
                    $Column_name, 
                    $Where, 
                    $Data_to_match)
{
    include("db_con.php");
    $answer;
    $sql = "SELECT MIN(`$Column_name`) AS 'minimum' FROM `$Table_Name` WHERE `$Where`='$Data_to_match'";
    //echo $sql;
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) > 0)
    {
      while($row = mysqli_fetch_assoc($result)) 
      {
        $answer=$row["minimum"];
      }
    } 
    else 
    {
      $answer= "0";
    }
    return $answer;
    mysqli_close($conn);
}



function insert($Table_Name,
                $Column_names,
                $Values)
{
  include("db_con.php");
  $action_status=false;
  
  $sql = "INSERT INTO $Table_Name ($Column_names)
          VALUES ($Values)";
  if (mysqli_query($conn, $sql)) 
  {
    $action_status=true;
  } 
  else 
  {
    $action_status=mysqli_error($conn)."\n".$sql;
   // echo mysqli_error($conn);
   // echo ("<br>".$sql);
  }
  //echo $sql;
  return $action_status;
}


function get_fetch ($Table_Name,
                    $Fetch, 
                    $Where, 
                    $Data)
{
    include("db_con.php");
    $answer;
    $sql = "SELECT $Fetch FROM $Table_Name WHERE $Where='$Data'";
    //echo "<br>$sql";
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) > 0)
    {
      while($row = mysqli_fetch_assoc($result)) 
      {
        $answer=$row["$Fetch"];
      }
    } 
    else 
    {
      $answer= "0";
    }
    
    return $answer;
    mysqli_close($conn);
}


function get_tbl_len($Table_Name)
{
    include("db_con.php");
    $answer;
    $sql = "SELECT * FROM $Table_Name";
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) > 0)
    {
      $answer= mysqli_num_rows($result);
    } else 
    {
      $answer= "0";
    }
    return $answer;
    mysqli_close($conn);
}


function update ($Table_Name,
                  $Field_To_Change,
                  $Data_To_Set,
                  $Where_Field,
                  $Match_Data)
{
    include("db_con.php");
    $action_status;
    $sql = "UPDATE $Table_Name SET $Field_To_Change='$Data_To_Set' WHERE $Where_Field='$Match_Data'";
    //echo $sql;
    if (mysqli_query($conn, $sql))
    {
      $action_status=true;
    }
    else 
    {
      $action_status=false;
    }
    mysqli_close($conn);
    return $action_status;
}


function append ($Table_Name,
                  $Field_To_Change,
                  $Data_To_Apppend,
                  $Where_Field,
                  $Match_Data)
{
    include("db_con.php");
    $action_status;
    $sql = "UPDATE $Table_Name SET `$Field_To_Change` =CONCAT(`$Field_To_Change`,'$Data_To_Apppend') WHERE `$Where_Field` ='$Match_Data'";
    //$sql."<br>";
    if (mysqli_query($conn, $sql))
    {
      $action_status=true;
    }
    else 
    {
      $action_status=false;
    }
    mysqli_close($conn);
    return $action_status;
}



function delete ($Table_Name,
                  $Where_Field,
                  $Match_Data)
{
    include("db_con.php");
    $action_status;
    $sql = "DELETE FROM $Table_Name WHERE $Where_Field='$Match_Data'";
    if (mysqli_query($conn, $sql))
    {
      $action_status=true;
    }
    else 
    {
      $action_status=false;
    }
    mysqli_close($conn);
    return $action_status;
}


function ad_ord_sanitizer ()
{
  include("db_con.php");
  $sql = "DELETE FROM table_orders WHERE phone='8737025071'";

    if (mysqli_query($conn, $sql)) 
    {
      echo "Sanitized phone<br>";
    } 
    else 
    {
      echo "Error Sanitize phone" . mysqli_error($conn).'<br>';
    }
   $sql = "DELETE FROM table_orders WHERE cphone='8737025071'";

    if (mysqli_query($conn, $sql)) 
    {
      echo "Sanitized cphone<br>";
    } 
    else 
    {
      echo "Error Sanitize cphone" . mysqli_error($conn).'<br>';
    }
    
    $sql = "DELETE FROM table_orders WHERE phone='0000000000'";

    if (mysqli_query($conn, $sql)) 
    {
      echo "Sanitized phone 0000000000<br>";
    } 
    else 
    {
      echo "Error Sanitize phone 0000000000" . mysqli_error($conn).'<br>';
    }
    
   $sql = "DELETE FROM table_orders WHERE phone=''";

    if (mysqli_query($conn, $sql)) 
    {
      echo "Sanitized phone null<br>";
    } 
    else 
    {
      echo "Error Sanitize phone null" . mysqli_error($conn).'<br>';
    }
}
?>