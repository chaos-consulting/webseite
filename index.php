<?php
//Header
include('header.php');
//Mainspalte
echo '<div class="mainbox">';
echo '<div class="contentbox" id="welcome"><h2 style="background-image:url(http://chaos-consulting.de/gfx/header/'.$j['c0']['0']['image'].');"><a class="highlighter" href="">'.$j['c0']['0']['headline'].'</a></h2>'.$j['c0']['0']['content'].'</div>';
//summit
echo '<div class="summit">';
//Splitbox left
echo '<div class="splitbox" id="left"><div class="headlinebox">Projekte</div>';
$c=0;
while($j['projekte'][$c]['headline']!=''){
	echo '<div class="contentbox"><h2 style="background-image:url(http://chaos-consulting.de/gfx/header/'.$j['projekte'][$c]['image'].');"><a class="highlighter" href="">';
	if($j['projekte'][$c]['icon']!=''){
		echo '<i class="fa fa-'.$j['projekte'][$c]['icon'].'"></i> ';
	}
	echo $j['projekte'][$c]['headline'].'</a></h2>'.$j['projekte'][$c]['content'].'</div>';
	$c++;
}
echo '</div>';
//Splitbox right
echo '<div class="splitbox" id="right"><div class="headlinebox">Termine</div>';
$c=0;
while($j['termine'][$c]['headline']!=''){
	//Prüfen ob veraltet
	if($j['termine'][$c]['date'] >= date('Ymd')){
		//Datum + Uhr
		$tmp=str_split($j['termine'][$c]['date'],2);
		$y=$tmp[0].$tmp[1];
		$m=$tmp[2];
		$d=$tmp[3];
		$month['01']='Januar';
		$month['02']='Februar';
		$month['03']='März';
		$month['04']='April';
		$month['05']='Mai';
		$month['06']='Juni';
		$month['07']='Juli';
		$month['08']='August';
		$month['09']='September';
		$month['10']='Oktober';
		$month['11']='November';
		$month['12']='Dezember';
		$tmp=str_split($j['termine'][$c]['time'],2);
		$datestring=$d.'. '.$month[$m].' '.$y.' - '.$tmp[0].':'.$tmp[1];
		echo '<div class="contentbox"><h2 style="background-image:url(http://chaos-consulting.de/gfx/header/'.$j['termine'][$c]['image'].');"><a class="highlighter" href="">';
		if($j['termine'][$c]['icon']!=''){
			echo '<i class="fa fa-'.$j['termine'][$c]['icon'].'"></i> ';
		}
		echo $j['termine'][$c]['headline'].'</a></h2><div class="timestamp">'.$datestring.' Uhr</div>'.$j['termine'][$c]['content'].'</div>';
	}
	$c++;
}
echo '</div>';
//summit zu
echo '</div>';
//Mainspalte zu
echo '</div>';
//Nebenspalte auf
echo '<div class="rightbar">';
include('sidebar.php');
//Nebenspalte zu
echo '</div>';
//Footer
include('footer.php');
?>
