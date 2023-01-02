<!DOCTYPE html>
<html>
	<head>
		<?php echo $this->Html->charset(); ?>
		<title>
		<?php echo $this->fetch('title'); ?>
		</title>
		<?php
		echo $this->Html->meta('icon');

		echo $this->Html->css('styles.css');
		echo $this->Html->script('scripts.js');

		echo $this->fetch('meta');
		echo $this->fetch('css');
		echo $this->fetch('script');
		?>

		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
		<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
		<script src="https://code.jquery.com/jquery-3.6.2.js" integrity="sha256-pkn2CUZmheSeyssYw3vMp1+xyub4m+e+QK4sQskvuo4=" crossorigin="anonymous"></script>
	</head>
	<body>
		
		<header>
		     <!-- Responsive navbar-->
				<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
				<div class="container">
					<a class="navbar-brand">Blog do Jão</a>
					<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
					<div class="collapse navbar-collapse" id="navbarSupportedContent">
						<ul class="navbar-nav ms-auto mb-2 mb-lg-0">
							<li class="nav-item"><a class="nav-link" href="http://localhost:8000">Posts</a></li>
							<li class="nav-item"><a class="nav-link" href="http://localhost:8000/users">Usuários</a></li>
							<li class="nav-item"><a class="nav-link" href="#!">Sobre mim</a></li>
						</ul>
					</div>
				</div>
			</nav>
		</header>

		<content>
			<?php echo $this->Flash->render(); ?>

			<?php echo $this->fetch('content'); ?>
		</content>
			
		<!-- Footer-->
		
        <footer class="footer py-5 bg-dark">
            <div class="container"><p class="m-0 text-center text-white">Copyright &copy; Blog do Jão - 2022</p></div>
        </footer>
        <!-- Bootstrap core JS-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Core theme JS-->
        <script src="../js/scripts.js"></script>

	</body>
</html>