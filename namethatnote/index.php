<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>Name That Note</title>
<link rel="stylesheet" type="text/css" href="../musictechwebapps.css" />
<style>
#main {
	height:400px;
}
</style>
</head>

<body>
<?php include("../_includes/header.php"); ?>
	<div id="main">
    	<h2>Name That Note!</h2>
    	<!---<p>Choose one of the following sections.
		</p>-->
        
        <a href="../namethatnote.php"><div class="button"><h3><img src="../img/treblecleficon.png" class="buttonicon"><br /><p style="font-size:18px">Treble Clef</p></h3>
        </div></a>
        <a href="../namethatnotebass.php"><div class="button"><h3><img src="../img/basscleficon.png" class="buttonicon"><br /><p style="font-size:18px">Bass Clef</p></h3>
        </div></a>
        <a href="../namethatnoteboth.php"><div class="button"><h3><img src="../img/trebleandbasscleficon.png" class="buttonicon"><br /><p style="font-size:18px">Treble &amp; Bass Clef</p></h3>
        </div></a>
        <br />
	</div>
<?php include("../_includes/footer.php"); ?>
</body>
</html>