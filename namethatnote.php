<?php
if (!isset($_SESSION)) {
  session_start();
}
/*$MM_authorizedUsers = "0,1,2";
$MM_donotCheckaccess = "true"; // *** Allow users that are not logged in

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

$MM_restrictGoTo = "login.php"; // *** If user is not logged in, make them log in 
if (!((isset($_SESSION['MM_Username'])) && (isAuthorized("",$MM_authorizedUsers, $_SESSION['MM_Username'], $_SESSION['MM_UserGroup'])))) {   
  $MM_qsChar = "?";
  $MM_referrer = $_SERVER['PHP_SELF'];
  if (strpos($MM_restrictGoTo, "?")) $MM_qsChar = "&";
  if (isset($_SERVER['QUERY_STRING']) && strlen($_SERVER['QUERY_STRING']) > 0) 
  $MM_referrer .= "?" . $_SERVER['QUERY_STRING'];
  $MM_restrictGoTo = $MM_restrictGoTo. $MM_qsChar . "accesscheck=" . urlencode($MM_referrer);
  header("Location: ". $MM_restrictGoTo); 
  exit;
}*/
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>Name That Note</title>
<link rel="stylesheet" type="text/css" href="musictechwebapps.css" />
<style>
#namethatnameThatNotemain {
	position:relative;
	width:1000px;
	margin:30px auto 30px auto;
	padding:0 10px 20px 10px;
	background:#FFF;
	/*border:3px solid black;*/
	-webkit-border-radius:10px;
	-moz-border-radius:10px;
	/*-webkit-box-shadow:0 0 8px rgba(67,71,60,0.9);
	-moz-box-shadow:0 0 8px rgba(67,71,60,0.9);*/
	height:450px;
}
.nameThatNote{
	position:relative;
	float:left;
	width:100%;
	height:330px;
	margin:0 0 10px 0;
}
.nameThatNoteButton {
	display:block;
	position:relative;
	float:left;
	width: 100px;
	height: 100px;
	background:rgb(204,204,204);
	-moz-border-radius: 50px;
	-webkit-border-radius: 50px;
	border-radius: 50px;
	text-align:center;
	font-size:70px;
	margin:0 10px 0 0;
}

.nameThatNoteOverlay{
	display:block;
	position:relative;
	float:left;
	height:100px;
	width:100%;
	margin:0;
	-moz-border-radius: 50px;
	-webkit-border-radius: 50px;
	border-radius: 50px;
}

.nameThatNoteOverlay:hover{
	background:rgba(0,0,255,0.3);
}

.nameThatNoteOverlay:active{
	background:rgba(72,61,139,0.7);
}
</style>
</head>
<body onload="preloader('win1')" />
<?php include("_includes/header.php"); ?>
	<div id="namethatnameThatNotemain">
    	<div id="timer" style="width:100%;">Timer: 30</div>
    	<div id="nameThatNote1" class="nameThatNote hideMe"><img src="img/notes/1.png"></div>
        <div id="nameThatNote2" class="nameThatNote hideMe"><img src="img/notes/2.png"></div>
        <div id="nameThatNote3" class="nameThatNote hideMe"><img src="img/notes/3.png"></div>
        <div id="nameThatNote4" class="nameThatNote hideMe"><img src="img/notes/4.png"></div>
        <div id="nameThatNote5" class="nameThatNote hideMe"><img src="img/notes/5.png"></div>
        <div id="nameThatNote6" class="nameThatNote hideMe"><img src="img/notes/6.png"></div>
        <div id="nameThatNote7" class="nameThatNote hideMe"><img src="img/notes/7.png"></div>
        <div id="nameThatNote8" class="nameThatNote hideMe"><img src="img/notes/8.png"></div>
        <div id="nameThatNote9" class="nameThatNote hideMe"><img src="img/notes/9.png"></div>
        <div id="nameThatNote10" class="nameThatNote hideMe"><img src="img/notes/10.png"></div>
        <div id="nameThatNote11" class="nameThatNote hideMe"><img src="img/notes/11.png"></div>
        <div id="nameThatNote12" class="nameThatNote hideMe"><img src="img/notes/12.png"></div>
        <div id="nameThatNote13" class="nameThatNote hideMe"><img src="img/notes/13.png"></div>
        <div id="nameThatNote14" class="nameThatNote hideMe"><img src="img/notes/14.png"></div>
        <div id="nameThatNote15" class="nameThatNote hideMe"><img src="img/notes/15.png"></div>
        <div id="nameThatNote16" class="nameThatNote hideMe"><img src="img/notes/16.png"></div>
        <div id="nameThatNote17" class="nameThatNote hideMe"><img src="img/notes/17.png"></div>
        <br />
        <div class="nameThatNoteButton">
        	<div class="nameThatNoteOverlay" onMouseDown="checkAnswer(1);">A
            </div>
		</div>
        <div class="nameThatNoteButton">
        	<div class="nameThatNoteOverlay" onMouseDown="checkAnswer(2);">B
            </div>
		</div>
        <div class="nameThatNoteButton">
        	<div class="nameThatNoteOverlay" onMouseDown="checkAnswer(3);">C
            </div>
		</div>
        <div class="nameThatNoteButton">
        	<div class="nameThatNoteOverlay" onMouseDown="checkAnswer(4);">D
            </div>
		</div>
        <div class="nameThatNoteButton">
        	<div class="nameThatNoteOverlay" onMouseDown="checkAnswer(5);">E
            </div>
		</div>
        <div class="nameThatNoteButton">
        	<div class="nameThatNoteOverlay" onMouseDown="checkAnswer(6);">F
            </div>
		</div>
        <div class="nameThatNoteButton">
        	<div class="nameThatNoteOverlay" onMouseDown="checkAnswer(0);">G
            </div>
		</div>
        <div id="results" class="popup">
            	<h2>Time is up!
                <div id="yourCorrect"></div>
                <div id="yourIncorrect"></div>
                <br />
                <div class="button popupbutton" onMouseDown="saveGame();">SAVE</div>
                </h2>
		</div>
        <div id="areYouReady" class="popup popupActive">
            	<h2>
                &nbsp;<br />
                &nbsp;<br />
                &nbsp;<br />
                Ready?<br />
                &nbsp;<br />
                &nbsp;<br />
                &nbsp;<br />
                <div class="button popupbutton" onMouseDown="startTimer();">YES</div>
                </h2>
		</div>
        <span id="blank"></span>
	</div>
<?php include("_includes/footer.php"); ?>
</body>
<script>
var questionNumber=0;
var tries=0;
var question = 1;
var oneChance = 0;
var myArray = 0;
var wrongAnswer=0;
var recordOfQuestions = new Array();
var recordOfAnswers = new Array();
function newGame() {
	var myFirstArray=[3,4,5,6,7,8,9,10,11,12,13];
	myFirstArray=shuffle(myFirstArray);
	var myThirdArray=[3,4,5,6,7,8,9,10,11,12,13];
	myThirdArray=shuffle(myThirdArray);
	myArray = myFirstArray.concat(myThirdArray);
	myArray = myArray.concat(myArray);
	question=myArray[questionNumber];
	questionNumber++;
	document.getElementById("nameThatNote"+question).className = "nameThatNote showMe";
}
function newQuestion() {
	question=myArray[questionNumber];
	questionNumber++;
	document.getElementById("nameThatNote"+question).className = "nameThatNote showMe";
};
function shuffle(array) {
    var counter = array.length, temp, index;
    // While there are elements in the array
    while (counter--) {
        // Pick a random index
        index = (Math.random() * counter) | 0;
        // And swap the last element with it
        temp = array[counter];
        array[counter] = array[index];
        array[index] = temp;
    }
    return array;
};
function checkAnswer(yourAnswer) {
	if (oneChance == 0) {
		if (question % 7 == yourAnswer) {
			recordOfQuestions[tries]=question;
			recordOfAnswers[tries]=yourAnswer;
			document.getElementById("blank").innerHTML="<embed src=\"win10.mp3\" hidden=\"true\" autostart=\"true\" loop=\"false\" />";
			document.getElementById("nameThatNote"+question).className = "nameThatNote hideMe";
			document.body.style.backgroundColor="#006600";
			setTimeout(function(){document.body.style.backgroundColor="#F0F0F0"},300);
			tries++;
			newQuestion();
		}
		else {
			recordOfQuestions[tries]=question;
			recordOfAnswers[tries]=yourAnswer;
			document.getElementById("blank").innerHTML="<embed src=\"fail10.mp3\" hidden=\"true\" autostart=\"true\" loop=\"false\" />";
			document.body.style.backgroundColor="#FF3300";
			setTimeout(function(){document.body.style.backgroundColor="#F0F0F0"},300);
			wrongAnswer++;
			tries++;
		}
	}
};
function preloader(soundfile) {
 	document.getElementById("blank").innerHTML= "<embed src=\""+soundfile+".mp3\" hidden=\"true\" autostart=\"true\" loop=\"false\" volume=\"0\" />";
};
function timer(time,update,complete) {
    var start = new Date().getTime();
    var interval = setInterval(function() {
        var now = time-(new Date().getTime()-start);
        if( now <= 0) {
            clearInterval(interval);
            complete();
        }
        else update(Math.floor(now/1000));
    },100); // the smaller this number, the more accurate the timer will be
};
function startTimer() {
	document.getElementById("areYouReady").className = "hidden";
	timer(
		31000, // milliseconds
		function(timeleft) { // called every step to update the visible countdown
			document.getElementById('timer').innerHTML ="Timer: "+timeleft;
		},
		function() { // what to do after
			oneChance++;
			questionNumber=questionNumber-1;
			document.getElementById("results").className = "popup popupActive";
			document.getElementById("yourCorrect").innerHTML ="You had "+questionNumber+" correct";
			document.getElementById("yourIncorrect").innerHTML ="and "+wrongAnswer+" incorrect.";
		}
	);
};
newGame();

function saveGame() {
	var url ="namethatnote_savegame.php?";
	var url2= new String();
	url2=url2.concat("q=" + recordOfQuestions.join());
	var url3 = new String();
 	url3=url3.concat("&p=" + questionNumber + "&a=" + recordOfAnswers.join());
	url = url.concat(url2,url3);
	window.location.assign(url);
};
</script>
</html>