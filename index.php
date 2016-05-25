<?php
	$page = $_GET["p"];
	if ($page == "") {
		$page = '0000_index';
	}
	include("header.php");
	echo '<div class="mainbox">';
	echo '<div class="contentbox">';
	$options = array();
	use \MarkdownExtended\MarkdownExtended;
	try {
		$content = MarkdownExtended::parseSource('pages/' . $page . '/content.md', $options);
	} catch(Exception $e) {
		echo '<a href="/">Oops! Das hätte nicht passieren dürfen!</a>';
		exit();
	}

	echo '<h2 style="background-image:url(pages/'.$page .'/' . $content->getMetadata()['image'].')">' . strtoupper($content->getMetadata()['headline']) . '</h2>';
	echo $content->getBody();
	echo '</div>';
	echo '</div>';
	echo '<div class="rightbar">';
	include('sidebar.php');
	echo '</div>';
	include('footer.php');
?>
