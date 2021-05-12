<?php $this->extend("layouts/layout"); ?>

<?php $this->section("title"); ?>
Ajouter un article
<?php $this->endsection(); ?>


<?php $this->section("content"); ?>
<div class="row my-5">
    <div class="col-md-8 mx-auto">
        <div class="card">
            <div class="card-header bg-white text-center">
                <h3 class="card-title">
                    Ajouter un article
                </h3>
                <hr />
                <?php if (session()->has("errors")) : ?>
                    <?php foreach (session("errors") as $error) : ?>
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <strong>Erreur!</strong> <?php echo $error; ?>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    <?php endforeach; ?>
                <?php endif; ?>
                <?php echo form_open_multipart('posts/store'); ?>
                <div class="form-group">
                    <?php
                    $data = [
                        'type'  => 'text',
                        'name'  => 'title',
                        'id'    => 'title',
                        'placeholder' => 'Titre',
                        'class' => 'form-control',
                        'value' => old('title')
                    ];
                    echo form_input($data);
                    ?>
                </div>
                <div class="form-group my-2">
                    <textarea class="form-control" name="description" id="description" rows="3" placeholder="Description"><?php echo old('description'); ?></textarea>
                </div>
                <div class="form-group">
                    <?php
                    $data = [
                        'type'  => 'file',
                        'name'  => 'image',
                        'id'    => 'image',
                        'class' => 'form-control'
                    ];
                    echo form_input($data);
                    ?>
                </div>
                <div class="form-group">
                    <?php
                    echo form_submit('submit', 'Valider', [
                        'class' => 'btn btn-primary my-2'
                    ]);
                    ?>
                </div>
                <?php echo form_close(); ?>
            </div>
        </div>
    </div>
</div>
<?php $this->endsection(); ?>