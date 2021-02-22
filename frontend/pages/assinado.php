<?php
session_start();
require '../../backend/Connection.php';
require '../../backend/avancos.php';
require '../../backend/contadorAssinaturas.php';

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
    <link rel="icon" href="../image/logo.png">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100;200;300;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="style.css">

    <title>Cadê Minha Casa?</title>
    <script src="http://connect.facebook.net/pt_BR/all.js#xfbml=1"></script>
</head>

<body>

    <?php
    if (isset($_SESSION['id'])) {
        include('../components/navBar2.html');
    } else {
        include('../components/navBar.html');
    }

    ?>

    <div class="container-fluid mt-lg-5 ">
        <div class="row d-flex justify-content-center">
            <div class="col-lg-9 col-sm-12 align-self-start text-center">
                <p class="display-6 fw-bolder text-body">Ajude esses lugares a se tornarem moradias!</p>
            </div>
        </div>


        <div class="row d-flex justify-content-center mt-lg-5 mt-sm-3">
            <div class="col-lg-4 col-sm-10 text-center">
                <a href="./cadastro_sinalizacao.php">
                    <button class="btn border-warning rounded-pill fs-2 text-body" style=" height: 15vh; width: 100%">
                        Sinalizar
                    </button>
                </a>
            </div>
        </div>

        <?php
        while ($linha = $consulta->fetch(PDO::FETCH_ASSOC)) {
        ?>
            <div class="container mt-0 ">
                <div class="row mt-lg-5 mt-md-3 mt-sm-3 d-flex justify-content-center">
                    <div class="col-lg-5 border py-3 border-warning rounded m-2 justify-content-center">
                        <ul class="list-group list-group-flush">

                            <li class="list-group">Rua: <?= $linha['LOGRADOURO']; ?></li>
                            <li class="list-group">Bairro: <?= $linha['BAIRRO']; ?></li>
                            <li class="list-group">Nº: <?= $linha['NUMERO']; ?></li>



                        </ul>

                        <hr>

                        <div class="row d-flex justify-content-center">
                            <div class="col-lg-11 col-sm-12 align-self-start text-center">
                                <p>Com essa ação você ajuda essa sinalização a ganhar força. Com isso podemos fazer mais pressão no Ministério Público para que algo seja feito nesse imóvel</p>
                                <p class="my-2"><b class="fs-5"><?= CONTADOR($linha['ID_IMOVEL']); ?> pessoas </b> assinaram esse abaixo-assinado.</p>
                            </div>
                        </div>
                        <br>

                        <div class="container-fluid">
                            <div class="row d-flex justify-content-center">
                                <div class="col-lg-8 col-md-10 col-sm-12">
                                    <a href="./form.php?id=<?= $linha['ID_IMOVEL']; ?>"> <button type="button" class="me-3  btn py-3 w-100 btn-warning rounded-pill" data-toggle="modal" data-target="#popUpdate">Ajude a transformar!</button> <a>
                                </div>
                            </div>

                        </div>

                    </div>

                <?php
            }

                ?>

                <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js" integrity="sha384-q2kxQ16AaE6UbzuKqyBE9/u/KzioAlnx2maXQHiDX9d4/zp8Ok3f+M7DPm+Ib6IU" crossorigin="anonymous"></script>
                <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.min.js" integrity="sha384-pQQkAEnwaBkjpqZ8RU1fF1AKtTcHJwFl3pblpTlHXybJjHpMYo79HY3hIi4NKxyj" crossorigin="anonymous"></script>
</body>

</html>