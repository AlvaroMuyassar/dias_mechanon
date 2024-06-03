<?php
if (session()->getFlashdata('message') !== null) :
?>
    <script>
        alert("<?= session()->getFlashdata('message'); ?>")
    </script>
<?php endif; ?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Dias Mechanon</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" rel="stylesheet">
    <style>
        * {
            font-family: "montserrat", sans-serif;
        }

        .navbar-nav a {
            color: black;
        }

        .nav-link {
            border-top: 4px solid transparent;
            border-bottom: 4px solid transparent;
            transition: ease-in-out 0.3s;
        }

        .nav-link:hover,
        .nav-link:active,
        .nav-link:focus {
            color: black;
            border-bottom: 4px solid lightblue;
            transition: ease-in-out 0.3s;
        }

        .clamp {
            display: -webkit-box;
            -webkit-line-clamp: 1;
            -webkit-box-orient: vertical;
        }

        .hover h1 {
            transition: transform 0.2s ease-in-out;
        }

        .hover:hover h1 {
            transform: scale(1.1);
            transition: transform 0.2s ease-in-out;
        }

        .hover,
        .bg-white {
            text-decoration: none !important;
            transition: transform 0.2s ease-in-out;
        }

        .hover:hover .bg-white {
            transform: scale(1.05);
            transition: transform 0.2s ease-in-out;
        }
    </style>
</head>

<body>
    <nav class="navbar navbar-expand-lg bg-body-tertiary fixed-top shadow-lg py-3">
        <div class="container-fluid d-flex align-items-center">
            <?php if ($url !== "viewblog") : ?>
                <a class="navbar-brand" href="#"><img class="img-fluid" width="30px" src="<?= base_url('/img/logo dm.png'); ?>" alt=""></a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse d-xl-flex justify-content-between" id="navbarNavAltMarkup">
                    <div class="navbar-nav fw-bold gap-3">
                        <a class="nav-link" style="border-bottom: <?= ($url == "") ? '4px solid lightblue' : '' ?>;" href="<?= base_url('/'); ?>">Home</a>
                        <a class="nav-link" style="border-bottom: <?= ($url == "blog") ? '4px solid lightblue' : '' ?>;" href="<?= base_url('/blog'); ?>">Blog</a>
                        <a class="nav-link" style="border-bottom: <?= ($url == "forum") ? '4px solid lightblue' : '' ?>;" href="<?= base_url('/forum'); ?>">Forums</a>
                        <a class="nav-link" style="border-bottom: <?= ($url == "about") ? '4px solid lightblue' : '' ?>;" href="<?= base_url('/about'); ?>">About Us</a>
                    </div>
                    <div class="d-flex align-items-center gap-2">
                        <?php if (!session()->get('login')) : ?>
                            <a href="#" data-bs-toggle="modal" data-bs-target="#modallogin" class="btn btn-primary fw-bold">Log In</a>
                            <a href="" class="text-decoration-none text-dark fw-bold" data-bs-toggle="modal" data-bs-target="#modalregister">Register</a>
                        <?php elseif (session()->get('login')) : ?>
                            <a href="<?= base_url('/logout'); ?>" class="btn btn-danger fw-bold">Log Out</a>
                        <?php endif; ?>
                    </div>
                </div>
            <?php else : ?>
                <a href="<?= base_url('/blog'); ?>" class="btn btn-outline-dark rounded-circle py-2"><i class="bi bi-arrow-left"></i></a>
            <?php endif; ?>
        </div>
    </nav>

    <div class="modal fade" id="modallogin" tabindex="-1" aria-labelledby="modalloginlabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="modalloginlabel">Login</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="<?= base_url('/login'); ?>" method="post">
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="email" class="form-label">Username or Email</label>
                            <input type="text" class="form-control shadow-sm" id="email" name="username">
                        </div>
                        <div class="mb-3">
                            <label for="Password" class="form-label">Password</label>
                            <input type="password" class="form-control shadow-sm" id="Password" name="password">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Login</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="modal fade" id="modalregister" tabindex="-1" aria-labelledby="regislabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="regislabel">Register</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="<?= base_url('/register'); ?>" method="post">
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="email" class="form-label">Username</label>
                            <input type="text" class="form-control shadow-sm" id="email" name="username">
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="text" class="form-control shadow-sm" id="email" name="email">
                        </div>
                        <div class="mb-3">
                            <label for="Password" class="form-label">Password</label>
                            <input type="password" class="form-control shadow-sm" id="Password" name="password">
                        </div>
                        <div class="mb-3">
                            <label for="c_Password" class="form-label">Confirmation Password</label>
                            <input type="password" class="form-control shadow-sm" name="c_password" id="c_Password">
                        </div>
                        <div class="mb-3">
                            <label for="birth_date" class="form-label">Birth Date</label>
                            <input type="date" class="form-control shadow-sm" name="birth_date" id="birth_date">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Register</button>
                    </div>
                </form>
            </div>
        </div>
    </div>