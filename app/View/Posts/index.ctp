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
            <div class="container">
                <!-- Filtro-->
                <p><?php echo $this->Html->link('Adicionar novo post', array('action' => 'add')); ?></p>
                <div>
                    <div class='mb-3'>
                        <?php echo $this->Form->create('Post')?>
                        <input placeholder="Título ou conteúdo" style="width: 150px;" type="text" name="nome" value="<?php if(isset($_POST['$nome'])){ echo $_POST['$nome'];}?>">
                        <input placeholder="Data inicial (AAAA-MM-DD)" style="width: 210px;" type="text" name="dtinicial" value="<?php if(isset($_POST['$dtinicial'])){ echo $_POST['$dtinicial'];}?>">
                        <input placeholder="Data final (AAAA-MM-DD)" style="width: 200px;" type="text" name="dtfinal" value="<?php if(isset($_POST['$dtfinal'])){ echo $_POST['$dtfinal'];}?>">
                    </div>
                                     
                    <div class='mb-3'> <button type="submit" class="btn btn-primary">Filtrar</button>
                        <?php echo $this->Form->end(__('')) ?>
                    </div>    
                </div>
            
                <!-- Featured blog post-->
                <div class="">
                    <div class="row row-cols-1 row-cols-md-3 g-4 mb-3">
                        <?php foreach ($posts as $post): ?>
                            <div class="col">
                                <div class="card">
                                    <a href="http://localhost:8000/posts/view/<?php echo $post[0]['post_id'] ?>"><img class="card-img-top" src="https://dummyimage.com/850x350/dee2e6/6c757d.jpg" alt="..." /></a>
                                    <div class="card-body">
                                        <div class="small text-muted"><?php echo 'Criado em: ' . $post[0]['post_date'] ?></div>
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
        </div>
        <div class="PHP_EOL"></div>
    </body>
</html>