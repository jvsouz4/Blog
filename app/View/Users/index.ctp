<!-- File: /app/View/Users/index.ctp -->

<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="utf-8" />
        <title>Blog Users</title>
    </head>

    <body>
        <!-- Page header with logo and tagline-->
        <div class="py-5 bg-light border-bottom mb-4">
            <div class="container">
                <div class="text-center my-5">
                    <h1 class="fw-bolder">Usuários do sistema</h1>
                </div>
            </div>
        </div>
        <!-- Page content-->
        <div class="container">
            <div class="container">
                <!-- Filtro-->
                <p><?php echo $this->Html->link('Adicionar novo usuário', array('action' => 'add')); ?></p>
                <div>
                    <div class='mb-3'>
                        <?php echo $this->Form->create('User')?>
                        <input placeholder="Nome" type="text" name="title" value="<?php if(isset($_POST['$title'])){ echo $_POST['$title'];}?>">
                    </div>
                                     
                    <div class='mb-3'> <button type="submit" class="btn btn-primary">Filtrar</button>
                        <?php echo $this->Form->end(__('')) ?>
                    </div>
                    
                </div>
                <?php echo $this->Flash->render('flash'); ?>
                <!-- Featured blog users-->
                <table class="table table-striped table-hover">
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Nome</th>
                        <th scope="col">Role</th>
                        <th scope="col">Ações</th>
                    </tr>
                    
                    <?php foreach ($users as $user): ?>
                        <tr>
                            <td scope="row"><?php echo $user[0]['user_id'];?></td>
                            <td>
                                <?php
                                    echo $this->Html->link(
                                        $user[0]['user_username'],
                                        array('action' => 'view', $user[0]['user_id'])
                                    );
                                ?>
                            </td>
                            <td><?php echo $user[0]['user_role']; ?></td>
                            <td>
                                <?php
                                    echo $this->Form->postLink(
                                        'Deletar',
                                        array('action' => 'delete', $user[0]['user_id']),
                                        array('confirm' => 'Are you sure?')
                                    );
                                ?>
                                <?php
                                    echo $this->Html->link(
                                        'Editar', array('action' => 'edit', $user[0]['user_id'])
                                    );
                                ?>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </table>
            </div>   
        </div>
    </body>
</html>