<head>
	<title>Chaos Consulting e.V.</title>
	<link rel="icon" href="favicon.ico" type="image/x-icon">
	<link href="css/main.css" type="text/css" rel="stylesheet">
	<link rel="stylesheet" href="/font-awesome/css/font-awesome.min.css">
</head>
<body>
	<div id="navibar">
		<div id="navcenter">
		<?php
			$mydirname = 'pages/';
			$dir = new DirectoryIterator($mydirname);
			foreach ($dir as $fileinfo) {
				if ($fileinfo->isDir() and ! $fileinfo->isDot() ) {
					echo '<div class="navibarbutton"><a href="page.php?p='.$fileinfo.'">'.strtoupper($fileinfo).'</a></div>';
				}
			}
			//Navibar Ende
		?>
		</div>
	</div>
<div class="pagebox">
