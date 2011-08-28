<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">

	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">

	<title>The Mootorial</title>

	<link href="<?php echo BASE_PATH; ?>/assets/css/main.css" rel="stylesheet">
	<link href="<?php echo BASE_PATH; ?>/assets/codemirror/lib/codemirror.css" rel="stylesheet">
	<link href="<?php echo BASE_PATH; ?>/assets/codemirror/theme/default.css" rel="stylesheet">

	<script src="<?php echo BASE_PATH; ?>/assets/script/mootools.core.js"></script>

	<script src="<?php echo BASE_PATH; ?>/assets/script/mootorial.element.js"></script>
	<script src="<?php echo BASE_PATH; ?>/assets/script/mootorial.formatting.js"></script>

	<script src="<?php echo BASE_PATH; ?>/assets/codemirror/lib/codemirror.js"></script>
	<script src="<?php echo BASE_PATH; ?>/assets/codemirror/mode/javascript/javascript.js"></script>
	<script src="<?php echo BASE_PATH; ?>/assets/codemirror/mode/css/css.js"></script>
	<script src="<?php echo BASE_PATH; ?>/assets/codemirror/mode/xml/xml.js"></script>
	<script src="<?php echo BASE_PATH; ?>/assets/codemirror/mode/htmlmixed/htmlmixed.js"></script>

	<script src="<?php echo BASE_PATH; ?>/assets/script/mootorial.codemirror.js"></script>
	<script src="<?php echo BASE_PATH; ?>/assets/script/mootorial.tabs.js"></script>

</head>

<body>
	<div class="container">
		<nav role="menu">
			<?php echo $this->partial('menu.php'); ?>
		</nav>
		<div class="main">
			<?php
			$page = $chapter ? $Content->chapter($chapter) : ($section ? $Content->section($section) : false);
			if ($page !== false):
				if ($chapter):
					echo '<h1>' . $page['name'] . '</h1>';
				endif;
				echo $page['content'];
			else: echo $this->partial('error.php');
			endif;
			?>
		</div>
	</div>
</body>
</html>
