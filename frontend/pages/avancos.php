<?php
session_start();

if (!isset($_SESSION['id'])) {
    header('Location: http://localhost/cade-minha-casa/frontend/pages/login.php');
    exit;
} else {
    require '../../backend/avancos.php';
}
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>
    <link rel="icon" href="./image/logo.png">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100;200;300;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../styles/style.css">

    <title>Nossos avanços :: Cadê minha casa?</title>
</head>

<body>
    <?php
    include('../components/navBar2.html')
    ?>

    <div class="container-fluid">
        <div class="row d-flex justify-content-center text-center mt-lg-5 ">
            <div class="col-lg-10 col-sm-12">
                <h1 class="display-2 fw-bolder">Seja bem vindo!<h1>
            </div>
        </div>

        <div class="row d-flex justify-content-center text-center mt-lg-5 mt-sm-2 ">
            <div class="col-lg-9 col-sm-12">
                <h2 class="display-5">Quer ver suas sinalizações ou sinalizar um novo local?</h2>
            </div>
        </div>
        <div class="row d-flex justify-content-center text-center mt-lg-4 mt-sm-1 ">
            <div class="col-lg-6 col-sm-12">
                <a href="./cadastro_sinalizacao.php"><button type="button" class="btn btn-warning rounded-pill mb-sm-5 btn-lg" style="height: 7rem; width: 25rem;">Sinalizar novo local!</button></a>
                <a href="./sinalizacao.php"><button type="button" class="btn border border-warning mb-sm-5 rounded-pill btn-lg" style="height: 7rem; width: 25rem;">Ver minhas sinalizações!</button></a>
            </div>

        </div>
        <div class="row d-flex justify-content-center text-center mt-lg-5 mt-sm-2 ">
            <div class="col-9">
                <hr>
            </div>
            <div class="col-lg-9 col-sm-12">
                <h1 class="display-2 fw-bolder mt-lg-5 mt-sm-3">Veja os locais que já mapeamos!<h1>
            </div>
        </div>

        <div class="row row-cols-8 d-flex justify-content-center w-10  mt-lg-5 mt-sm-2 ">
            <?php
            while ($linha = $consulta->fetch(PDO::FETCH_ASSOC)) {
            ?>
                <!-- Grid de imagens -->
                <div class="col-lg-3 col-sm-8 mt-5 mx-lg-5 border">
                    <img src="../images/imov-aban/<?= $linha['IMAGEM']; ?>" class="card-img-top" alt="">
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item"><?= $linha['LOGRADOURO']; ?></li>
                        <li class="list-group-item">Nº <?= $linha['NUMERO']; ?></li>
                        <li class="list-group-item">Bairro <?= $linha['BAIRRO']; ?></li>
                        <li class="list-group-item">CEP <?= $linha['CEP']; ?></li>
                    </ul>
                </div>
            <?php
            }

            ?>
        </div>
    </div>

    <?php
    include('../components/footer.html')
    ?>


    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js" integrity="sha384-q2kxQ16AaE6UbzuKqyBE9/u/KzioAlnx2maXQHiDX9d4/zp8Ok3f+M7DPm+Ib6IU" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.min.js" integrity="sha384-pQQkAEnwaBkjpqZ8RU1fF1AKtTcHJwFl3pblpTlHXybJjHpMYo79HY3hIi4NKxyj" crossorigin="anonymous"></script>
</body>

</html>