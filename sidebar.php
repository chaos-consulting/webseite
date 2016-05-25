<?php
use \MarkdownExtended\MarkdownExtended;
$mydirname = 'sidebar/';
$dir = new DirectoryIterator($mydirname);
foreach ($dir as $fileinfo) {
	if ($fileinfo->isDir() and ! $fileinfo->isDot() ) {
		$options = array();
		try {
			$content = MarkdownExtended::parseSource('sidebar/' . $fileinfo . '/content.md', $options);
			echo '<div class="contentbox">';
			echo '<h2 style="background-image:url(sidebar/'.$fileinfo.'/'.$content->getMetadata()['image'].');">';
			echo '<i class="fa fa-'.$content->getMetadata()['icon'].'"></i> ';
			echo $content->getMetadata()['headline'].'</h2>';

			//Ausgabe
			echo $content->getBody();
			//Box zu
			echo '</div>';
		} catch (Exception $e) {}

	}
}
?>
