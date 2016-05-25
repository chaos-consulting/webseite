<?php
	$page = $_GET["p"];
	include("header.php");
?>
	<div class="contentbox">
		<?php
		use \MarkdownExtended\MarkdownExtended;
		$options = array();
		$content = MarkdownExtended::parseSource('pages/' . $page . '/content.md', $options);
		echo '<h2 style="background-image:url(pages/'.$page .'/' . $content->getMetadata()['image'].')">' . strtoupper($content->getMetadata()['headline']) . '</h2>';
		echo $content->getBody();
		?>
	</div>
