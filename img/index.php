<html>
	<head>
		<title>All Community Images</title>
		<link rel="icon" href="../favicon.ico" type="image/x-icon">
	</head>
	<body>
		<h1>
			All Community Images
		</h1>
		<p>Huntington Post reserves the right to remove any picture for any reason without any notice.<br/>Although we probably won't, this is just so if we do, it isn't a surprise.</p>
		<?php
		$images = glob("*"); //works in Rubular
		foreach($images as $file) {
			if($file=="index.php") continue;
        //atm I don't know how to sort by date uploaded
				echo '<a href="'.$file.'" style="margin:5px;"><img src="'.rawurlencode($file).'" height="200px"></a>';
		}
		?>
	</body>
</html>
