<!-- File: /app/View/Users/index.ctp -->

<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="utf-8" />
        <title>Blog Users</title>
        <!-- Favicon-->
        <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="css/styles.css" rel="stylesheet" />
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
                    <?php
                        $filtro = $this->Form->create('User');
                        $filtro .= $this->Form->input('User.username', array('required' => false, 'label' => ''));
                        $filtro .= $this->Form->end('Filtrar');
                    ?>
                    <?php echo $filtro ?>
                </div>

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
                            <td scope="row"><?php echo $user['User']['id'];?></td>
                            <td>
                                <?php
                                    echo $this->Html->link(
                                        $user['User']['username'],
                                        array('action' => 'view', $user['User']['id'])
                                    );
                                ?>
                            </td>
                            <td><?php echo $user['User']['role']; ?></td>
                            <td>
                                <?php
                                    echo $this->Form->postLink(
                                        'Delete',
                                        array('action' => 'delete', $user['User']['id']),
                                        array('confirm' => 'Are you sure?')
                                    );
                                ?>
                                <?php
                                    echo $this->Html->link(
                                        'Edit', array('action' => 'edit', $user['User']['id'])
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