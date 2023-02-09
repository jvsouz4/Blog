<!-- File: /app/View/Posts/view.ctp -->

<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="utf-8" />
        <?php $this->set('title_for_layout', 'Visualização do post');?>
    </head>

    <body>
        <!-- Page content-->
        <div class="container">
            <div class="row">
                <div class="col-lg-10 col-xl-9 mx-auto">
                    <div class="card row my-5 border-0 shadow rounded-3">
                        <?php foreach ($posts as $post): ?>
                            <div class="card-body p-sm-3">
                                <div class="py-5 bg-light border-bottom mb-4">
                                    <div class="container">
                                        <div class="text-center my-5">
                                            <h1 class="fw-bolder text-secondary fontexto">Visualização do post</h1>
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="row">
                                    <div class="col-md-7">
                                        <a>
                                        <img class="img-fluid rounded mb-3 mb-md-0" src="https://dummyimage.com/850x350/dee2e6/6c757d.jpg" alt="">
                                        </a>
                                    </div>
                                    <div class="col-md-5">
                                        <h2><?php echo h($post[0]['title']);?></h3>
                                        <hr>
                                        <h5><?php echo $post[0]['body'];?></h5>
                                        <hr>
                                        <p>Criado em: <?php echo $post[0]['post_date']; ?></p>
                                        <p>Criado por: <?php echo $post[0]['name']; ?></p>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>