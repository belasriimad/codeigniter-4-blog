<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css" integrity="sha512-HK5fgLBL+xu6dm/Ii3z4xhlSUyZgTT9tuc/hSrtw6uzJOvgRr2a9jyxxT1ely+B+xFAmJKVSTbpM/CuL7qxO8w==" crossorigin="anonymous" />
    <title>
        Codeigniter 4 BLOG |
        <?php $this->renderSection("title"); ?>
    </title>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="<?= site_url('/'); ?>">CodeIgniter 4 Blog</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="<?= site_url('/'); ?>">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="<?= site_url('/posts/create'); ?>">Add</a>
                    </li>
                    <?php if (session()->has("logged")) : ?>
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="<?= site_url('/posts/index'); ?>">My Articles</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="<?= site_url('/profile'); ?>">
                                <?php echo esc(session("name")); ?>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="<?= site_url('/login/logout'); ?>">
                                Logout
                            </a>
                        </li>
                        <?php if (session("admin")) : ?>
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    Admin
                                </a>
                                <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                    <li><a class="dropdown-item" href="<?php echo site_url("admin/posts"); ?>">Articles</a></li>
                                    <li><a class="dropdown-item" href="<?php echo site_url("admin/users"); ?>">Users</a></li>
                                </ul>
                            </li>
                        <?php endif; ?>
                    <?php else : ?>
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="<?= site_url('/register'); ?>">Register</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="<?= site_url('/login'); ?>">Login</a>
                        </li>
                    <?php endif; ?>
                </ul>
            </div>
        </div>
    </nav>
    <div class="container">
        <div class="row">
            <div class="col-md-8 mx-auto my-3">
                <?php if (session()->has("success")) : ?>
                    <div class="alert alert-success">
                        <?php echo session("success"); ?>
                    </div>
                <?php endif; ?>
                <?php if (session()->has("error")) : ?>
                    <div class="alert alert-danger">
                        <?php echo session("error"); ?>
                    </div>
                <?php endif; ?>
                <?php if (session()->has("info")) : ?>
                    <div class="alert alert-info">
                        <?php echo session("info"); ?>
                    </div>
                <?php endif; ?>
                <?php if (session()->has("warning")) : ?>
                    <div class="alert alert-warning">
                        <?php echo session("warning"); ?>
                    </div>
                <?php endif; ?>
            </div>
        </div>
        <?php $this->renderSection("content"); ?>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>
</body>

</html>