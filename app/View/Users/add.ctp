<!-- app/View/Users/add.ctp -->
<?php $this->start('teste'); ?>
    <!-- Button trigger modal -->
    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
        Adicionar usuário
    </button>

    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Adicionar novo usuário</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <?php echo $this->Form->create('User'); ?>
                        <fieldset>
                            <?php echo $this->Form->input('username');
                                echo $this->Form->input('password');
                                echo $this->Form->input('role', array(
                                    'options' => array('admin' => 'Admin', 'author' => 'Author')
                                ));
                            ?>
                        </fieldset>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <div> <button type="submit" class="btn btn-primary"> Submit</button>
                            <?php $this->Form->end(__('submit')); ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $this->end(); ?>
<?php echo $this->fetch('teste'); ?>