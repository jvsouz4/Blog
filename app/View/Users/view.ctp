<!-- File: /app/View/Users/view.ctp -->

<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="utf-8" />
        <?php $this->set('title_for_layout', 'Visualização do usuário');?>
    </head>

    <body>
        <!-- Page content-->
        <div class="container">
            <div class="row">
                <div class="col-lg-10 col-xl-9 mx-auto">
                    <div class="card row my-5 border-0 shadow rounded-3">
                        <div class="card-body p-sm-3">
                            <div class="py-5 bg-light border-bottom mb-4">
                                <div class="container">
                                    <div class="text-center my-5">
                                        <h1 class="fw-bolder text-secondary fontexto">Visualização do usuário</h1>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="row container justify-content-center">
                                <div class="col-md-5 align-self-center">
                                    <a>
                                        <img style="height: 50px, width:200px" class="img rounded mb-3 mb-md-0" src="https://startbootstrap.github.io/startbootstrap-freelancer/assets/img/avataaars.svg" alt="">
                                    </a>
                                </div>
                                <div class="col-md-5 align-self-center">
                                    <?php foreach ($user as $user): ?>
                                        <h2><?php echo h($user[0]['name']); ?></h3>
                                        <hr>
                                        <h5>Criado em: <?php echo $user[0]['user_date']; ?></h5>
                                        <hr>
                                        <p><?php echo h($user[0]['role']); ?></p>
                                    <?php endforeach; ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>