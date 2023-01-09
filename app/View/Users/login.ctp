<!-- File: /app/View/Users/login.ctp -->

<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="utf-8" />
        <title>Login</title>
    </head>

    <body>
        <!-- Page header with logo and tagline-->
        <div class="py-5 bg-light border-bottom mb-4">
            <div class="container">
                <div class="text-center my-5">
                    <h1 class="fw-bolder">Login</h1>
                </div>
            </div>
        </div>
        <!-- Page content-->
        <div class="container">
            <div class="container">
                <?php echo $this->Flash->render('auth'); ?>
                <?php echo $this->Form->create('User'); ?>
                    <fieldset>
                        <legend>
                            <?php echo __('Please enter your username and password'); ?>
                        </legend>
                        <?php echo $this->Form->input('username');
                        echo $this->Form->input('password');
                    ?>
                    </fieldset>
                <?php echo $this->Form->end(__('Login')); ?>
            </div>   
        </div>
    </body>
</html>
