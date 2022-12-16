<!-- File: /app/View/Posts/index.ctp -->

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Blog Home</title>
        <!-- Favicon-->
        <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="css/styles.css" rel="stylesheet" />
    </head>
    <body>
        <!-- Responsive navbar-->
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <div class="container">
                <a class="navbar-brand" href="#!">Blog do Jão</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                        <li class="nav-item"><a class="nav-link" href="http://localhost:8000/posts">Posts</a></li>
                        <li class="nav-item"><a class="nav-link" href="http://localhost:8000/users">Users</a></li>
                        <li class="nav-item"><a class="nav-link" href="#!">About Dev</a></li>
                    </ul>
                </div>
            </div>
        </nav>
        <!-- Page header with logo and tagline-->
        <header class="py-5 bg-light border-bottom mb-4">
            <div class="container">
                <div class="text-center my-5">
                    <h1 class="fw-bolder">Bem vindo ao meu blog!</h1>
                </div>
            </div>
        </header>
        <!-- Page content-->
        <div class="container">
            <div class="row">
                <!-- Blog entries-->
                <div class="col-lg-4">
                    <!-- Featured blog post-->
                    <p><?php echo $this->Html->link('Add Post', array('action' => 'add')); ?></p>

                <?php foreach ($posts as $post): ?>
                    <div class="card mb-4">
                        <a href="#!"><img class="card-img-top" src="https://dummyimage.com/850x350/dee2e6/6c757d.jpg" alt="..." /></a>
                        <div class="card-body">
                            <div class="small text-muted"><?php echo $post[0]['post_created']; ?></div>
                            <h2 class="card-title"><?php echo $this->Html->link($post[0]['title'],array('controller' => 'posts', 'action' => 'view', $post[0]['post_id'])); ?></h2>
                            <p class="card-text"><?php echo $post[0]['body']; ?></p>
                            <?php
                            echo $this->Form->postLink(
                                'Delete',
                                array('action' => 'delete', $post[0]['post_id']),
                                array('confirm' => 'Are you sure?')
                            );
                            ?>
                            <?php
                                echo $this->Html->link(
                                    'Edit', array('action' => 'edit', $post[0]['post_id'])
                                );
                            ?>
                        </div>
                    </div>
                <?php endforeach; ?>
                <?php unset($post); ?>
            </div>
        </div>
        <!-- Footer-->
        <footer class="py-5 bg-dark">
            <div class="container"><p class="m-0 text-center text-white">Copyright &copy; Blog do Jão - 2022</p></div>
        </footer>
        <!-- Bootstrap core JS-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Core theme JS-->
        <script src="js/scripts.js"></script>
    </body>
</html>