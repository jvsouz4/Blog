<!-- File: /app/View/Posts/index.ctp -->

<h1>Posts</h1>
<p><?php echo $this->Html->link('Add Post', array('action' => 'add')); ?></p>
<table>
    <tr>
        <th>Id</th>
        <th>Created by:</th>
        <th>Title</th>
        <th>Body</th>
        <th>Created</th>
        <th>Actions</th>
    </tr>

    <?php foreach ($posts as $post): ?>
    <tr>
        <td><?php echo $post[0]['id'];?></td>
        <td><?php echo $post[0]['username']; ?></td>
        <td>
            <?php echo $this->Html->link($post[0]['title'],array('controller' => 'posts', 'action' => 'view', $post[0]['id'])); ?>
        </td>
        <td><?php echo $post[0]['body']; ?></td>
        <td><?php echo $post[0]['created']; ?></td>
        <td>
            <?php
                echo $this->Form->postLink(
                    'Delete',
                    array('action' => 'delete', $post[0]['id']),
                    array('confirm' => 'Are you sure?')
                );
            ?>
            <?php
                echo $this->Html->link(
                    'Edit', array('action' => 'edit', $post[0]['id'])
                );
            ?>
        </td>
    </tr>
    <?php endforeach; ?>
    <?php unset($post); ?>
</table>