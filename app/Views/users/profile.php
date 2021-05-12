<?php $this->extend("layouts/layout"); ?>

<?php $this->section("title"); ?>
Profile - <?php echo $user->name; ?>
<?php $this->endsection(); ?>


<?php $this->section("content"); ?>
<div class="row my-4">
    <div class="col-md-8 mx-auto">
        <div class="card p-3 d-flex flex-row justify-content-around">
            <img src="https://picsum.photos/id/237/200/300" class="rounded-circle shadow-sm" width="200" height="200" alt="photo de profile">
            <div class="p-2">
                <p>
                    Nom & Prénom :
                    <span class="text-primary">
                        <?php echo $user->name; ?>
                    </span>
                </p>
                <p>
                    E-mail :
                    <span class="text-danger">
                        <?php echo $user->email; ?>
                    </span>
                </p>
                <a href="<?php echo site_url("profile/editProfileForm"); ?>" class="btn btn-sm btn-warning">
                    <i class="fas fa-edit"></i>
                </a>
            </div>
        </div>
    </div>
</div>
<?php $this->endsection(); ?>