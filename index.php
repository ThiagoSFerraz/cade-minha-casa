<?php
session_start();
require './backend/Connection.php'
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous">
    </script>
    <link rel="icon" href="./image/logo.png">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100;200;300;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="style.css">

    <title>Cadê Minha Casa?</title>

</head>

<body>
    <?php
    if (isset($_SESSION['id'])) {
        include('./frontend/components/navBar2.html');
        $caminho = './frontend/pages/cadastro_sinalizacao.php';
    } else {
        include('./frontend/components/navBar.html');
        $caminho = './frontend/pages/cadastro.php';
    }

    ?>

    <div class="container-fluid mt-lg-5">
        <div class="row d-flex justify-content-center">
            <div class="col-lg-9 col-sm-12 align-self-start text-center">
                <h1 class="display-3 fw-bolder text-body">Ajude mais de 6 milhões de famílias mapeando locais
                    abandonados</h1>
            </div>
        </div>
        <div class="row d-flex justify-content-center mt-lg-5 mt-sm-3">
            <div class="col-lg-4 col-sm-10 text-center">
                <a href="<?= $caminho ?>">
                    <button class="btn btn-warning border rounded-pill fs-2 text-body" style=" height: 15vh; width: 100%">
                        Faça sua parte!
                    </button>
                </a>
            </div>
        </div>
        <div class="row mt-5 d-flex justify-content-center">
            <div class="col-9">
                <hr>
            </div>
        </div>
        <div class="row d-flex justify-content-center mt-5">
            <div class="col-lg-10 col-sm-12 text-center">
                <h1 class="display-3 text-body fw-bolder">Veja nossos avanços:</h1>
            </div>
        </div>
        <div class="row d-flex justify-content-center">
            <div class="col-lg-9 col-sm-12">
                <div id="carouselExampleInterval" class="carousel slide" data-bs-ride="carousel">
                    <div class="carousel-inner">
                        <div class="carousel-item active" data-bs-interval="20000">

                            <img src="./frontend/images/imgslide-1.png" class="d-block w-100" alt="...">
                        </div>
                        <div class="carousel-item" data-bs-interval="20000">
                            <img src="./frontend/images/imgslide-2.png" class="d-block w-100" alt="...">
                        </div>

                    </div>
                    <a class="carousel-control-prev" href="#carouselExampleInterval" role="button" data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </a>
                    <a class="carousel-control-next" href="#carouselExampleInterval" role="button" data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </a>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js" integrity="sha384-q2kxQ16AaE6UbzuKqyBE9/u/KzioAlnx2maXQHiDX9d4/zp8Ok3f+M7DPm+Ib6IU" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.min.js" integrity="sha384-pQQkAEnwaBkjpqZ8RU1fF1AKtTcHJwFl3pblpTlHXybJjHpMYo79HY3hIi4NKxyj" crossorigin="anonymous">
    </script>

</body>

</html>