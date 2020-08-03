<?php ini_set('display_errors', '1'); // *** Display errors on ?>
<?php require_once('Connections/ohiofi.php'); // *** Connect to OhioFi ?>
<?php
if (!isset($_SESSION)) {
  session_start();
}
$MM_authorizedUsers = "0,1,2";
$MM_donotCheckaccess = "true"; // *** Check to make sure that user is logged in

// *** Restrict Access To Page: Grant or deny access to this page
function isAuthorized($strUsers, $strGroups, $UserName, $UserGroup) { 
  // For security, start by assuming the visitor is NOT authorized. 
  $isValid = False; 

  // When a visitor has logged into this site, the Session variable MM_Username set equal to their username. 
  // Therefore, we know that a user is NOT logged in if that Session variable is blank. 
  if (!empty($UserName)) { 
    // Besides being logged in, you may restrict access to only certain users based on an ID established when they login. 
    // Parse the strings into arrays. 
    $arrUsers = Explode(",", $strUsers); 
    $arrGroups = Explode(",", $strGroups); 
    if (in_array($UserName, $arrUsers)) { 
      $isValid = true; 
    } 
    // Or, you may restrict access to only certain users based on their username. 
    if (in_array($UserGroup, $arrGroups)) { 
      $isValid = true; 
    } 
    if (($strUsers == "") && false) { 
      $isValid = true; 
    } 
  } 
  return $isValid; 
}

$MM_restrictGoTo = "logintosavegame.php"; // *** If user is not logged in, make them log in 
if (!((isset($_SESSION['MM_Username'])) && (isAuthorized("",$MM_authorizedUsers, $_SESSION['MM_Username'], $_SESSION['MM_UserGroup'])))) {   
  $MM_qsChar = "?";
  $MM_referrer = $_SERVER['PHP_SELF'];
  if (strpos($MM_restrictGoTo, "?")) $MM_qsChar = "&";
  if (isset($_SERVER['QUERY_STRING']) && strlen($_SERVER['QUERY_STRING']) > 0) 
  $MM_referrer .= "?" . $_SERVER['QUERY_STRING'];
  $MM_restrictGoTo = $MM_restrictGoTo. $MM_qsChar . "accesscheck=" . urlencode($MM_referrer);
  header("Location: ". $MM_restrictGoTo); 
  exit;
}
?>
<?php
if (!function_exists("GetSQLValueString")) {// *** Convert something to a string for SQL
function GetSQLValueString($theValue, $theType, $theDefinedValue = "", $theNotDefinedValue = "") 
{
  if (PHP_VERSION < 6) {
    $theValue = get_magic_quotes_gpc() ? stripslashes($theValue) : $theValue;
  }

  $theValue = function_exists("mysql_real_escape_string") ? mysql_real_escape_string($theValue) : mysql_escape_string($theValue);

  switch ($theType) {
    case "text":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;    
    case "long":
    case "int":
      $theValue = ($theValue != "") ? intval($theValue) : "NULL";
      break;
    case "double":
      $theValue = ($theValue != "") ? doubleval($theValue) : "NULL";
      break;
    case "date":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;
    case "defined":
      $theValue = ($theValue != "") ? $theDefinedValue : $theNotDefinedValue;
      break;
  }
  return $theValue;
}
}



$colname_rsGame12 = "-1";
if (isset($_SESSION['MM_Username'])) {
  $colname_rsGame12 = $_SESSION['MM_Username'];
}
mysql_select_db($database_ohiofi, $ohiofi);// *** Get the number of correct answers
$query_rsGame12=sprintf("SELECT game12responses.entryNumber, game12responses.questionNumber FROM game12responses WHERE userName=%s AND game12responses.tally=1 ORDER BY game12responses.questionNumber DESC",
  GetSQLValueString($colname_rsGame12, "text")); 
$rsGame12 = mysql_query($query_rsGame12, $ohiofi) or die(mysql_error());
$row_rsGame12 = mysql_fetch_assoc($rsGame12);
$totalRows_rsGame12 = mysql_num_rows($rsGame12);// *** totalRows_rsGame12 is the number of correct answers

mysql_select_db($database_ohiofi, $ohiofi);// *** Get the total number of answers
$query_rsScore3=sprintf("SELECT game12responses.entryNumber, game12responses.questionNumber FROM game12responses WHERE userName=%s",
  GetSQLValueString($colname_rsGame12, "text")); 
$rsScore3 = mysql_query($query_rsScore3, $ohiofi) or die(mysql_error());
$row_rsScore3 = mysql_fetch_assoc($rsScore3);
$totalRows_rsScore3 = mysql_num_rows($rsScore3);// *** totalRows_rsScore3 is the total number of answers

mysql_select_db($database_ohiofi, $ohiofi);// *** Get score from the "users" table
$query_rsUser=sprintf("SELECT users.userID, users.game12 FROM users WHERE userName=%s ",
  GetSQLValueString($colname_rsGame12, "text")); 
$rsUser = mysql_query($query_rsUser, $ohiofi) or die(mysql_error());
$row_rsUser = mysql_fetch_assoc($rsUser);
$totalRows_rsUser = mysql_num_rows($rsUser);

$points = $_GET["p"] + $totalRows_rsGame12;
$questions = explode(",", $_GET["q"]);
$answers = explode(",", $_GET["a"]);
$userNumber = $row_rsUser["userID"];
$entryNumber = "";
$questionNumber =$totalRows_rsScore3+1;
$tally=0;
$game12total=$totalRows_rsScore3+count($questions);
$userName=$_SESSION['MM_Username'];

for ($i = 0; $i < count($questions); $i++){
	 if($questions[$i]%7==$answers[$i]){
		 $tally=1;
	 }
	 else{
		 $tally=0;
	 }
	 $tempQuestionNumber=$questionNumber+$i;
	 $tempQuestion=$questions[$i];
	 $tempAnswer=$answers[$i];
	 $insertSQL = sprintf("INSERT INTO game12responses (entryNumber, userName, questionNumber, question, answer, tally) VALUES ('$entryNumber','$userName','$tempQuestionNumber', '$tempQuestion', '$tempAnswer', '$tally')");
					   
	  		mysql_select_db($database_ohiofi, $ohiofi);
	 		$Result1 = mysql_query($insertSQL, $ohiofi) or die(mysql_error());
}

$updateSQL = sprintf("UPDATE users SET game12=%s, game12total=%s WHERE userID=%s",// *** Update the "users" table
				   GetSQLValueString($points, "int"),
				   GetSQLValueString($game12total, "int"),
				   GetSQLValueString($userNumber, "int"));

mysql_select_db($database_ohiofi, $ohiofi);
$Result1 = mysql_query($updateSQL, $ohiofi) or die(mysql_error());
$goHere="namethatnoteboth.php";
header('Location: ' . $goHere);

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>Saving...</title>
</head>

<body>
<div id="saveText"></div>
</body>
<script>
function animation(){
	document.getElementById("saveText").innerHTML ="Saving...";
	var url ="namethatnoteboth.php";
	window.location.assign(url);
}
</script>
</html>