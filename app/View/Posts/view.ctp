<!-- File: /app/View/Posts/view.ctp -->

<div class="card" style="width: 18rem;">
    <img src="..." class="card-img-top" alt="...">
    <div class="card-body">
        <h1><?php echo h($post['Post']['title']); ?></h1>
        <p><small>Created: <?php echo $post['Post']['created']; ?></small></p>
        <p><?php echo h($post['Post']['body']); ?></p>
    </div>
</div>

