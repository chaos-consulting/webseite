<?php
error_reporting(E_ERROR | E_WARNING | E_PARSE);
//Json
$tmp=file_get_contents('content/website.json');
$j=json_decode($tmp, true) or die('damn it');
//Header
echo '<head><title>'.$j['settings']['title'].'</title><link rel="icon" href="../favicon.ico" type="image/x-icon"><link href="css/mainstyle.css" type="text/css" rel="stylesheet"><link rel="stylesheet" href="/font-awesome/css/font-awesome.min.css"></head>';
//Body
echo '<body>';
//Navibar
echo '<div id="navibar"><div id="navcenter">';
$c=0;
while($j['navibar'][$c]['name']!=''){
	echo '<div class="navibarbutton"><a href="'.$j['navibar'][$c]['url'].'">'.$j['navibar'][$c]['name'].'</a></div>';
	$c++;
}
//Navibar Ende
echo '</div></div>';
//Pagebox
echo '<div class="pagebox">';
?>
