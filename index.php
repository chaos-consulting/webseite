<?php
	$page = $_GET["p"];
	if ($page == "") {
		$page = 'index';
	}
	include("header.php");
	echo '<div class="mainbox">';
	$options = array();
	use \MarkdownExtended\MarkdownExtended;
    $project_page = strcasecmp($page, "projekte") == 0;

    if(!$project_page) {
	    echo '<div class="contentbox">';
        try {
            $folders = glob("pages/*_".$page, GLOB_ONLYDIR);
            if(count($folders) != 1) {
                throw new Exception('Not a distinct folder');
            }

            $content = MarkdownExtended::parseSource($folders[0] . '/content.md', $options);
        } catch(Exception $e) {
            echo '<a href="/">Oops! Das hätte nicht passieren dürfen!</a>';
            exit();
        }

        echo '<h2 style="background-image:url(pages/'.$page .'/' . $content->getMetadata()['image'].')">' . strtoupper($content->getMetadata()['headline']) . '</h2>';

        echo $content->getBody();
	    echo '</div>';
    } else {
        include("projects.php");
    }

	echo '</div>';
	echo '<div class="rightbar">';
	include('sidebar.php');
	echo '</div>';
	include('footer.php');
?>
