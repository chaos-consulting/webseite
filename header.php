<?php
	require_once('markdown-extended-0.1.0-delta/src/bootstrap.php');
	use \MarkdownExtended\MarkdownExtended;
?>
<head>
	<title>Chaos Consulting e.V.</title>
	<link rel="icon" href="favicon.ico" type="image/x-icon">
	<link href="css/main.css" type="text/css" rel="stylesheet">
	<link rel="stylesheet" href="/css/font-awesome-4.6.3/css/font-awesome.min.css">
</head>
<body>
	<div id="navibar">
		<div id="navcenter">
		<?php
			$mydirname = 'pages/';
			$dir = new DirectoryIterator($mydirname);
			foreach ($dir as $fileinfo) {
				if ($fileinfo->isDir() and ! $fileinfo->isDot() ) {
					$options = array();
					try {
						$content = MarkdownExtended::parseSource('pages/' . $fileinfo . '/content.md', $options);
						echo '<div class="navibarbutton"><a href="index.php?p='.$fileinfo.'">'. $content->getMetadata()['name'] .'</a></div>';
					} catch (Exception $e) {}
				}
			}
			//Navibar Ende
		?>
		</div>
	</div>
<div class="pagebox">
