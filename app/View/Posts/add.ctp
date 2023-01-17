<!-- File: /app/View/Posts/add.ctp -->

<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="utf-8" />
        <title>Adicionar post</title>
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
                                        <h1 class="fw-bolder fontexto">Adicionar novo post</h1>
                                    </div>
                                </div>
                            </div>
                            
                            <?php echo $this->Form->create('Post'); ?>
                                <div class="form-floating">
                                    <?php echo $this->Form->input('title', array('class' => 'form-control', 'label' => '', 'placeholder' => 'Título'));?>
                                </div>

                                <div class="form-floating">
                                    <?php echo $this->Form->input('body', array('class' => 'form-control', 'label' => '', 'placeholder' => 'Conteúdo', 'rows' => '3'));?>      
                                </div>

                                <hr class="my-4">

                                <button type="submit" class="btn btn-primary w-100 d-grid my-4">Adicionar post </button>

                                <hr class="my-4">

                                <div class="d-grid text-center p-sm-3">
                                    JãoGest
                                </div>
                            <?php $this->Form->end(__('Save post')) ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>