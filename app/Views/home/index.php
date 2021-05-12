<?php $this->extend("layouts/layout"); ?>

<?php $this->section("title"); ?>
Home
<?php $this->endsection(); ?>


<?php $this->section("content"); ?>
<div class="row my-5">
    <?php foreach ($posts as $post) : ?>
        <div class="col-4">
            <div class="card" style="width: 18rem;">
                <?php if ($post->post_image) : ?>
                    <img src="<?php echo site_url('posts_images/' . $post->post_image); ?>" width="150" height="150" class="card-img-top" alt="...">
                <?php else : ?>
                    <img src="<?php echo site_url('posts_images/default.png'); ?>" width="150" height="150" class="card-img-top" alt="...">
                <?php endif; ?>
                <div class="card-body">
                    <span class="badge bg-primary">
                        <?php
                        echo $controller->getUserById($post->user_id); ?>
                    </span>
                    <span class="badge bg-danger">
                        <?php
                        echo $post->created_at->humanize(); ?>
                    </span>
                    <h5 class="card-title"><?php echo $post->title; ?></h5>
                    <p class="card-text"><?php echo $post->description; ?></p>
                    <a href="<?= site_url('/posts/show/' . $post->id); ?>" class="btn btn-primary">Read more</a>
                </div>
            </div>
        </div>
    <?php endforeach; ?>
    <div class="d-flex justify-content-center my-3">
        <?php echo $pager->links(); ?>
    </div>
</div>
<?php $this->endsection(); ?>