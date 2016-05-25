<?php
$c=0;
while($j['mehr'][$c]['headline']!='' or $j['mehr'][$c]['icon']!=''){
	//Box auf
	echo '<div class="contentbox"><h2 style="background-image:url(http://chaos-consulting.de/gfx/header/'.$j['mehr'][$c]['image'].');"><a class="highlighter" href="'.$j['mehr'][$c]['url'].'">';
	if($j['mehr'][$c]['icon']){
		echo '<i class="fa fa-'.$j['mehr'][$c]['icon'].'"></i> ';
	}
	echo $j['mehr'][$c]['headline'].'</a></h2>';
	//Abfrage von Funktionen
	if($j['mehr'][$c]['content']!=str_replace('!!','',$j['mehr'][$c]['content'])){
		//Funktion Contacts
		if($j['mehr'][$c]['content']!=str_replace('!!contacts','',$j['mehr'][$c]['content'])){
			//schleife
			$cc=0;
			while($j['contacts'][$cc]['name']!=''){
				$rp.='<a href="'.$j['contacts'][$cc]['url'].'"><i class="fa fa-'.$j['contacts'][$cc]['icon'].'"></i> '.$j['contacts'][$cc]['name'].'</a><br><br>';
				$cc++;
			}
			$j['mehr'][$c]['content']=str_replace('!!contacts',$rp, $j['mehr'][$c]['content']);
		}
		//Funktion Raumstatus
		if($j['mehr'][$c]['content']!=str_replace('!!raumstatus','',$j['mehr'][$c]['content'])){
			$ff=file_get_contents('http://mk-piraten.de/status.php?type=text');
			if($ff=='open'){
				$rp='<i class="fa fa-unclock"></i> Ge&oumlffnet';
			}
			else{
				$rp='<i class="fa fa-lock"></i> Geschlossen';
			}
			$j['mehr'][$c]['content']=str_replace('!!raumstatus',$rp, $j['mehr'][$c]['content']);
		}
		//Funktion Freifunk
		if($j['mehr'][$c]['content']!=str_replace('!!freifunk','',$j['mehr'][$c]['content'])){
			//$ff=file_get_contents('http://freifunk-mk.de/api/?node=647002986de8');
			//$ff=$ff+$ff=file_get_contents('http://freifunk-mk.de/api/?node=90f652921b2c');
			$ff=$ff+$ff=file_get_contents('http://freifunk-mk.de/api/?node=6466b3afb31c');
			$rp='<i class="fa fa-wifi"></i> '.$ff.' Nutzer';
			$j['mehr'][$c]['content']=str_replace('!!freifunk',$rp, $j['mehr'][$c]['content']);
		}
	}
	//Ausgabe
	echo $j['mehr'][$c]['content'];
	//Box zu
	echo '</div>';
	$c++;
}
?>
