<?php

require("functions/config.php");//new
if(isset($_SESSION['name'])){
	$text = $_POST['text'];
	
	$fp = fopen("log.html", 'a');
	fwrite($fp, "<div class='msgln'>(".date("g:i A").") <span class='".$_SESSION['color']."'><b>".$_SESSION['name']."</b>:</span> ".stripslashes(htmlspecialchars($text))."<br></div>");
	fclose($fp);
}
