<!-- File: /app/View/Posts/index.ctp -->

<h1>Blog posts</h1>

<p><?php echo $this->Html->link('Add Post', array('action' => 'add')); ?></p>

<!-- Here's where we loop through our $posts array, printing out post info -->

    <?php foreach ($posts as $post): ?>
    <div class="card w-50">
        <div class="card-body">
            <h5 class="card-title">
                <?php
                echo $this->Html->link(
                    $post['Post']['title'],
                    array('action' => 'view', $post['Post']['id'])
                );
            ?></h5>
            <p class="card-text"><?php echo $post['Post']['body']; ?></p>
            <ul class="nav">
                <li class="nav-item">
                    <a class="nav-link" href="#">
                        <?php echo $this->Html->link('Edit', array('action' => 'edit')); ?>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">
                        <?php echo $this->Html->link('Delete', array('action' => 'delete')); ?>
                    </a>
                </li>
            </ul>
        </div>
    </div>
    <?php endforeach; ?>

</table>