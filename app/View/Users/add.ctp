<!-- app/View/Users/add.ctp -->

<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="utf-8" />
        <?php $this->set('title_for_layout', 'Adicionar usuário');?>
    </head>

    <body>
        <div class="container">
            <div class="row">
                <div class="col-lg-10 col-xl-9 mx-auto">
                    <div class="card flex-row my-5 border-0 shadow rounded-3">

                        <div class="card-body p-sm-3">
                            <div class="py-5 bg-light border-bottom mb-4">
                                <div class="container">
                                    <div class="text-center my-5">
                                        <h1 class="fw-bolder text-secondary fontexto">Adicionar novo usuário</h1>
                                    </div>
                                </div>
                            </div>
                            
                            <?php echo $this->Form->create('User'); ?>
                                <div class="form-floating">
                                    <?php echo $this->Form->input('name', array('class' => 'form-control', 'label' => '', 'placeholder' => 'Nome e sobrenome'));?>
                                </div>

                                <div class="form-floating">
                                    <?php echo $this->Form->input('username', array('class' => 'form-control', 'label' => '', 'placeholder' => 'Usuário'));?>
                                </div>

                                <div class="form-floating">
                                    <?php echo $this->Form->input('password', array('class' => 'form-control', 'label' => '', 'placeholder' => 'Senha'));?>      
                                </div>

                                <div class="form-floating">
                                    <?php echo $this->Form->input('role', array('style' => 'width:100px', 'class' => 'form-select form-select-sm', 'label' => '', 'options' => array('admin' => 'Admin', 'author' => 'Author')));?>     
                                </div>

                                <hr class="my-4">

                                <button type="submit" class="btn btn-primary w-100 d-grid my-4">Registrar </button>

                                <a class="d-block text-center small my-4 text-decoration-none" href="http://localhost:8000/users/login">Já tem uma conta? Login!</a>

                            <?php $this->Form->end(__('add')) ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>