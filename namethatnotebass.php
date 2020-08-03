<?php
if (!isset($_SESSION)) {
  session_start();
}
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
    	<div id="nameThatNote24" class="nameThatNote hideMe"><img src="img/notes/24.png"></div>
        <div id="nameThatNote25" class="nameThatNote hideMe"><img src="img/notes/25.png"></div>
        <div id="nameThatNote26" class="nameThatNote hideMe"><img src="img/notes/26.png"></div>
        <div id="nameThatNote27" class="nameThatNote hideMe"><img src="img/notes/27.png"></div>
        <div id="nameThatNote28" class="nameThatNote hideMe"><img src="img/notes/28.png"></div>
        <div id="nameThatNote29" class="nameThatNote hideMe"><img src="img/notes/29.png"></div>
        <div id="nameThatNote30" class="nameThatNote hideMe"><img src="img/notes/30.png"></div>
        <div id="nameThatNote31" class="nameThatNote hideMe"><img src="img/notes/31.png"></div>
        <div id="nameThatNote32" class="nameThatNote hideMe"><img src="img/notes/32.png"></div>
        <div id="nameThatNote33" class="nameThatNote hideMe"><img src="img/notes/33.png"></div>
        <div id="nameThatNote34" class="nameThatNote hideMe"><img src="img/notes/34.png"></div>
        <div id="nameThatNote35" class="nameThatNote hideMe"><img src="img/notes/35.png"></div>
        <div id="nameThatNote36" class="nameThatNote hideMe"><img src="img/notes/36.png"></div>
        <div id="nameThatNote37" class="nameThatNote hideMe"><img src="img/notes/37.png"></div>
        <div id="nameThatNote38" class="nameThatNote hideMe"><img src="img/notes/38.png"></div>
        <div id="nameThatNote39" class="nameThatNote hideMe"><img src="img/notes/39.png"></div>
        <div id="nameThatNote40" class="nameThatNote hideMe"><img src="img/notes/40.png"></div>
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
	var myFirstArray=[24,25,26,27,28,29,30,31,32,33,34,35,36,37,38,39,40];
	myFirstArray=shuffle(myFirstArray);
	var myThirdArray=[24,25,26,27,28,29,30,31,32,33,34,35,36,37,38,39,40];
	myThirdArray=shuffle(myThirdArray);
	myArray = myFirstArray.concat(myThirdArray);
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
			setTimeout(function(){document.body.style.backgroundColor="#F0F0F0"},200);
			tries++;
			newQuestion();
		}
		else {
			recordOfQuestions[tries]=question;
			recordOfAnswers[tries]=yourAnswer;
			document.getElementById("blank").innerHTML="<embed src=\"fail10.mp3\" hidden=\"true\" autostart=\"true\" loop=\"false\" />";
			document.body.style.backgroundColor="#FF3300";
			setTimeout(function(){document.body.style.backgroundColor="#F0F0F0"},200);
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
	var url ="namethatnotebass_savegame.php?";
	var url2= new String();
	url2=url2.concat("q=" + recordOfQuestions.join());
	var url3 = new String();
 	url3=url3.concat("&p=" + questionNumber + "&a=" + recordOfAnswers.join());
	url = url.concat(url2,url3);
	window.location.assign(url);
};
</script>
</html>