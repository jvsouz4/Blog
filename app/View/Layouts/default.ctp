<!DOCTYPE html>
<html>
	<head>
		<?php echo $this->Html->charset(); ?>

		<title>
			<?php echo $this->fetch('title'); ?>
		</title>

        <!-- Meu CSS-->
		<?php echo $this->Html->css('meu.css')?>
		<?php echo $this->fetch('css')?>
		<!-- Bootstrap core CSS-->
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
		<link href="https://fonts.googleapis.com/css?family=Pacifico" rel="stylesheet">
		<!-- Dev Icon-->
		<link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/devicons/devicon@v2.15.1/devicon.min.css">
	</head>
	<body>
		<!-- Header-->
		<header>
		     <!-- Responsive navbar-->
			<nav class="navbar navbar-expand-lg navbar-dark bg-primary bg-opacity-75">
				<div class="container">
					<a class="navbar-brand fontexto">Blog do Jão</a>
					<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
						<span class="navbar-toggler-icon"></span>
					</button>
					<div class="collapse navbar-collapse" id="navbarSupportedContent">
						<ul class="navbar-nav ms-auto mb-2 mb-lg-0">
							<li class="nav-item"><a class="text-white nav-link" href="http://localhost:8000">Posts</a></li>
							<li class="nav-item"><a class="text-white nav-link" href="http://localhost:8000/users">Usuários</a></li>
							<li class="nav-item"><a class="text-white nav-link" href="http://localhost:8000/infos">Sobre o desenvolvedor</a></li>
							<li class="nav-item dropdown">
								
								<a class="text-white nav-link dropdown-toggle" role="button" data-bs-toggle="dropdown" aria-expanded="false">
									Bem vindo, <?php echo $logado ?>!
								</a>
								<ul class="dropdown-menu dropdown-menu-dark">
									<li><a class="text-white dropdown-item" href="http://localhost:8000/users/login">Login</a></li>
									<li><a class="text-white dropdown-item" href="http://localhost:8000/users/logout">Sair do sistema</a></li>
								</ul>
							</li>
						</ul>
					</div>
				</div>
			</nav>
		</header>

		<!-- Content-->
		<content>
			<?php echo $this->fetch('content'); ?>
		</content>
			
		<!-- Footer-->
        <footer class="fixed-bottom py-5 bg-primary bg-opacity-75">
            <div class="container"><p class="m-0 text-center text-white">Copyright &copy; Blog do Jão - 2023</p></div>
        </footer>

        <!-- Meu JS-->
		<?php echo $this->Html->script('meu.js')?>
		<?php echo $this->fetch('script')?>

        <!-- Bootstrap core JS-->
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
		<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous"></script>
		<script src="https://code.jquery.com/jquery-3.6.2.js" integrity="sha256-pkn2CUZmheSeyssYw3vMp1+xyub4m+e+QK4sQskvuo4=" crossorigin="anonymous"></script>
	</body>
</html>