<!-- File: /app/View/Infos/index.ctp -->

<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="utf-8" />
        <?php $this->set('title_for_layout', 'Sobre o desenvolvedor');?>
    </head>

    <body>
    <!-- Page Content-->
        <div class="container-fluid justify-content-center align-items-center h-100 align-middle">
            <div class="row">
                <div class="mx-auto">
                    <div class="card border-0 shadow rounded-3">
                        <div class="card-body p-sm-3">
                            <div class="container-fluid p-0 ">
                                <h1>
                                    <span>
                                        <i></i>
                                        404
                                    </span>
                                    - Página não encontrada.
                                </h1>
                                <h3 class="lighter smaller">O conteúdo que você procura não está disponível!</h3>
                                <p class="error">
                                    <strong><?php echo __d('cake', 'Error'); ?>: </strong>
                                    <?php printf(
                                        __d('cake', 'O endereço %s não foi encontrado nesse servidor.'),
                                        "<strong>'{$url}'</strong>"
                                    ); ?>
                                </p>
                            </div>
                        </div>    
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>
