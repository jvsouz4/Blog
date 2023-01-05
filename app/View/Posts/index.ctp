<!-- File: /app/View/Posts/index.ctp -->

<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="utf-8" />
        <title>Blog Home</title>
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
                    </div>
                    <div class="row row-cols-lg-auto g-1 align-items-center mb-3">
                        <div class="col-12">
                            <div class="input-group">
                                <input placeholder="Título ou conteúdo" class="form-control" style="width: 165px; margin: 3px;" type="text" name="nome" value="<?php if(isset($_POST['$nome'])){ echo $_POST['$nome'];}?>">
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="input-group">
                                <input placeholder="Data inicial" class="form-control" style="width: 225px; margin: 3px;" type="date" name="dtinicial" value="<?php if(isset($_POST['$dtinicial'])){ echo $_POST['$dtinicial'];}?>">
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="input-group">
                                <input placeholder="Data final" class="form-control" style="width: 220px; margin: 3px;" type="date" name="dtfinal" value="<?php if(isset($_POST['$dtfinal'])){ echo $_POST['$dtfinal'];}?>">
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="input-group">
                                <button type="submit" class="btn btn-primary">Filtrar <?php echo $this->Form->end(__('')) ?></button>
                            </div>
                        </div>
                    </div>
                </div>
                <?php echo $this->Flash->render('flash'); ?>
                <!-- Featured blog post-->
                <div class="">
                    <div class="row row-cols-1 row-cols-md-3 g-4 mb-3">
                        <?php foreach ($posts as $post): ?>
                            <div class="col">
                                <div class="card">
                                    <a href="http://localhost:8000/posts/view/<?php echo $post[0]['post_id'] ?>"><img class="card-img-top" src="https://dummyimage.com/850x350/dee2e6/6c757d.jpg" alt="..." /></a>
                                    <div class="card-body">
                                        <div class="small text-muted"><?php echo 'Criado em: ' . $post[0]['post_date'] ?></div>
                                        <div class="small text-muted"><?php echo 'Criado por: ' . $post[0]['username'] ?></div>
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
    </body>
</html>