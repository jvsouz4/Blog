<!-- File: /app/View/Posts/view.ctp -->

<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="utf-8" />
        <title>Blog Post</title>
    </head>

    <body>
        <!-- Page content-->
        <div class="container mt-5">
            <div class="row">
                <div class="col-lg-8">
                    <!-- Post content-->
                    <article>
                        <!-- Post header-->
                        <header class="mb-4">
                            <!-- Post title-->
                            <h1 class="fw-bolder mb-1"><?php echo h($post['Post']['title']);?></h1>
                            <!-- Post meta content-->
                            <div class="text-muted fst-italic mb-2">Created in: <?php echo $post['Post']['created']; ?></div>
                            <!-- Post categories-->
                            <a class="badge bg-secondary text-decoration-none link-light" href="http://localhost:8000/posts">All Posts</a>
                        </header>

                        <!-- Preview image figure-->
                        <figure class="mb-4"><img class="img-fluid rounded" src="https://dummyimage.com/900x400/ced4da/6c757d.jpg" alt="..." /></figure>
                        <!-- Post content-->
                        <section class="mb-5">
                            <p class="fs-5 mb-4"><?php echo h($post['Post']['body']);?></p>
                        </section>
                    </article>
                </div>
            </div>
        </div>
    </body>
</html>