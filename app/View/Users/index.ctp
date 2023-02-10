<!-- File: /app/View/Users/index.ctp -->

<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="utf-8" />
        <?php $this->set('title_for_layout', 'Usuários do sistema');?>
    </head>

    <body>
        <!-- Page header with logo and tagline-->
        <div class="py-5 bg-light border-bottom mb-4">
            <div class="container">
                <div class="text-center my-5">
                    <h1 class="fw-bolder fontexto text-secondary">Usuários do sistema</h1>
                </div>
            </div>
        </div>
        <!-- Page content-->
        <div class="container">
            <div class="container">
                <!-- Filtro-->
                <p><?php echo $this->Html->link('Adicionar novo usuário', array('action' => 'add'), array('class' => 'text-decoration-none btn btn-primary')); ?></p>
                <div>
                    <div class='mb-3'>
                        <?php echo $this->Form->create('User')?>
                    </div>
                    <div class="row row-cols-lg-auto g-1 align-items-center mb-3">
                        <div class="col-12">
                            <div class="input-group">
                                <input placeholder="Nome ou usuário" class="form-control" type="text" name="title" value="<?php if(isset($_POST['$title'])){ echo $_POST['$title'];}?>">
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="input-group">
                                <select class="form-select" name="cargo" value="<?php if(isset($_POST['$cargo'])){ echo $_POST['$cargo'];}?>">
                                    <option selected value="">Selecione o cargo</option>
                                    <option name="admin">admin</option>
                                    <option name="author">author</option>
                                </select>
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

                <!-- Featured blog users-->
                <div style="height:286px" class=" overflow-auto">
                    <table class="table table-striped table-hover">
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Nome</th>
                            <th scope="col">Usuário</th>
                            <th scope="col">Cargo</th>
                            <th scope="col">Deletar</th>
                            <th scope="col">Editar</th>
                        </tr>
                        
                        <?php foreach ($users as $user): ?>
                            <tr>
                                <td scope="row"><?php echo $user[0]['user_id'];?></td>
                                <td style="width: 225px">
                                    <?php
                                        echo $this->Html->link(
                                            $user[0]['user_name'],
                                            array('action' => 'view', $user[0]['user_id']),
                                            array('class' => 'text-decoration-none')
                                        );
                                    ?>
                                </td>
                                <td><?php echo $user[0]['user_username']; ?></td>
                                <td><?php echo $user[0]['user_role']; ?></td>
                                <td>
                                    <?php
                                        echo $this->Form->postLink(
                                            'Deletar',
                                            array('action' => 'delete', $user[0]['user_id']),
                                            array('class' => 'text-decoration-none', 'confirm' => 'Tem certeza?')
                                        );
                                    ?>
                                </td>
                                <td>
                                    <?php
                                        echo $this->Html->link(
                                            'Editar', 
                                            array('action' => 'edit', $user[0]['user_id']),
                                            array('class' => 'text-decoration-none')
                                        );
                                    ?>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </table>
                </div>
            </div>   
        </div>
    </body>
</html>