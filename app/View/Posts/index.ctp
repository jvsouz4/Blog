<!-- File: /app/View/Posts/index.ctp -->

<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="utf-8" />
        <title>Blog Home</title>
        <!-- Favicon-->
        <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="css/styles.css" rel="stylesheet" />
    </head>

    <body>
        <div class="py-5 bg-light border-bottom mb-4">
            <div class="container">
                <div class="text-center my-5">
                    <h1 class="fw-bolder">Posts do blog</h1>
                </div>
            </div>
        </div>
        <!-- Page content-->
        <div class="container">
            <!-- Blog entries-->
            <!-- Featured blog post-->
            <p><?php echo $this->Html->link('Adicionar novo post', array('action' => 'add')); ?></p>
            <div class="">
                <div class="row row-cols-1 row-cols-md-3 g-4">
                    <?php foreach ($posts as $post): ?>
                        <div class="col">
                            <div class="card">
                                <a href="http://localhost:8000/posts/view/<?php echo $post[0]['post_id'] ?>"><img class="card-img-top" src="https://dummyimage.com/850x350/dee2e6/6c757d.jpg" alt="..." /></a>
                                <div class="card-body">
                                    <div class="small text-muted"><?php echo $post[0]['post_created']; ?></div>
                                    <h2 class="card-title"><?php echo $this->Html->link($post[0]['title'],array('controller' => 'posts', 'action' => 'view', $post[0]['post_id'])); ?></h2>
                                    <p class="card-text"><?php echo $post[0]['body']; ?></p>
                                    <?php
                                    echo $this->Form->postLink(
                                        'Deletar',
                                        array('action' => 'delete', $post[0]['post_id']),
                                        array('confirm' => 'Are you sure?')
                                    );
                                    ?>
                                    
                                    <div class="PHP_EOL"></div>

                                    <?php
                                        echo $this->Html->link(
                                            'Editar', array('action' => 'edit', $post[0]['post_id'])
                                        );
                                    ?>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                    <?php unset($post); ?>
                </div>
            </div>
        </div>
        <div class="PHP_EOL"></div>
    </body>
</html>