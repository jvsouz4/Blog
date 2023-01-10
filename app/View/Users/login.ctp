<!-- File: /app/View/Users/login.ctp -->

<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="utf-8" />
        <title>Login</title>
    </head>

    <body class="bd-content">
        <!-- Page header with logo and tagline-->
        <div class="py-5 bg-light border-bottom mb-4">
            <div class="container">
                <div class="text-center my-5">
                    <h1 class="fw-bolder">MVJÃO</h1>
                </div>
            </div>
        </div>
        <!-- Page content-->
        <div class="container">
            <div class="container w-50">
                <div class="card border-secundary text-center">
                    <div class="card-header bg-dark text-white">
                        <?php echo __('Por favor, informe suas credenciais'); ?>
                    </div>
                    <div class="card-body">
                        <?php echo $this->Flash->render('auth'); ?>
                        <?php echo $this->Form->create('User', array('class' => 'form')); ?>
                        <fieldset>
                            <?php echo $this->Form->input('username', array('class' => 'form-control position-relative top-50 start-50 translate-middle', 'label' => '', 'placeholder' => 'Usuário'));?>
                            <?php echo $this->Form->input('password', array('class' => 'form-control position-relative top-50 start-50 translate-middle', 'label' => '', 'placeholder' => 'Senha'));?>
                        </fieldset>
                    </div>
                    <div class="card-footer text-muted">
                        <button type="submit" class="btn btn-primary w-100">Login <?php $this->Form->end(__('Login')) ?></button>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>
