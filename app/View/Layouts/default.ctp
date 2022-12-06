<?php

$cakeVersion = __d('cake_dev', 'CakePHP %s', Configure::version())
?>
<!DOCTYPE html>
<html>

	<head>
		<?php echo $this->Html->charset(); ?>
		<title>
		<?php echo $this->fetch('title'); ?>
		</title>
		<?php
		echo $this->Html->meta('icon');

		echo $this->Html->css('cake.generic');

		echo $this->fetch('meta');
		echo $this->fetch('css');
		echo $this->fetch('script');
		?>
	</head>
	<body>
		<div id="container">
			<div id="header">
			<!-- <h1>--><?php //echo $this->Html->link($cakeDescription, 'https://cakephp.org'); ?><!--</h1>-->
			</div>
		<div id="content">
			<?php echo $this->Flash->render(); ?>

			<?php echo $this->fetch('content'); ?>
			</div>
		<div id="footer">
		<p>
		<!-- --><?php //echo $cakeVersion; ?>
		</p>
		</div>
		</div>

	</body>
</html>