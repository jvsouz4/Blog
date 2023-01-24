<!-- File: /app/View/Users/login.ctp -->

<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="utf-8" />
        <?php $this->set('title_for_layout', 'Login');?>
    </head>

    <body>
        <div class="container">
            <div class="row">
                <div class="col-lg-10 col-xl-9 mx-auto">
                    <div class="card flex-row my-5 border-0 shadow rounded-3 overflow-hidden">

                        <div class="card-body p-sm-3">
                            <div class="py-5 bg-light border-bottom mb-4">
                                <div class="container">
                                    <div class="text-center my-5">
                                        <h1 class="fw-bolder text-secondary fontexto">Login</h1>
                                    </div>
                                </div>
                            </div>
                            <div><?php echo __('Por favor, informe suas credenciais!'); ?></div>
                            
                            <?php echo $this->Flash->render('flash'); ?>

                            <?php echo $this->Form->create('User');?>
                                <div class="form-floating">
                                    <?php echo $this->Form->input('username', array('class' => 'form-control', 'label' => '', 'placeholder' => 'Usuário'));?>
                                </div>

                                <div class="form-floating">
                                    <?php echo $this->Form->input('password', array('class' => 'form-control', 'label' => '', 'placeholder' => 'Senha'));?>      
                                </div>

                                <hr class="my-4">

                                <button type="submit" class="btn btn-primary w-100 d-grid my-4">Login </button>

                                <a class="d-block text-center small my-4 text-decoration-none" href="http://localhost:8000/users/add">Não tem uma conta? Criar novo usuário!</a>

                            <?php $this->Form->end(__('Login')) ?>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>