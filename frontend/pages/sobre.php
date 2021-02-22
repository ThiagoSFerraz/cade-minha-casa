<?php
session_start();
require '../../backend/Connection.php'
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

</head>

<body>
    <?php
    if (isset($_SESSION['id'])) {
        include('../components/navBar2.html');
    } else {
        include('../components/navBar.html');
    }
    ?>

    <div class="container-fluid mt-lg-5">
        <div class="row d-flex justify-content-center">
            <div class="col-lg-9 col-sm-12 align-self-start text-center">
                <h1 class="display-3 fw-bolder text-body">Cadê Minha Casa?</h1>
            </div>
        </div>

        <div class="row d-flex justify-content-center mt-lg-5 mt-sm-3">

            <div class="container">
                <div class="row mx-5">

                    <div class="col-md-4 px-4 ">
                        <div class="mb-4 shadow-sm text-center">
                            <p>O que fazemos?</p>
                            <p>
                                Nossa missão é mapear o maior número de imóveis
                                abandonados com a ajuda da população e, com base nesses dados,
                                cobrar as prefeituras locais para que cumpram sua fubção social da propriedade.
                            </p>
                        </div>
                    </div>

                    <div class="col-md-4 px-4">
                        <div class="mb-4 shadow-sm text-center">
                            <p>Como?</p>
                            <p>
                                Queremos ser o principal aliado dos movimentos
                                sociais para expor o problema de defit de moradia,
                                cobrando políticas publicas para que todas as pessoas
                                tenham acesso ao seu Direto à Moradia.
                            </p>
                        </div>
                    </div>

                    <div class="col-md-4  px-4">
                        <div class="mb-4 shadow-sm text-center">
                            <p>O que queremos?</p>
                            <p>
                                Com empatia pelo próximo,queremos usar a tecnologia
                                para trazer informações,levantamento de dados e pressão para que causas
                                sociais sejam atendidas, assim diminuindo os níveis de Défit de Moradia e
                                trabalhando sempre para dar voz ás pessoas em vunerabilidade social(habitacional).
                            </p>
                        </div>
                    </div>
                </div>

            </div>

        </div>
        <div class="row mt-5 d-flex justify-content-center">
            <div class="col-9">
                <hr>
            </div>
        </div>
        <div class="row d-flex justify-content-center mt-5">
            <div class="col-lg-10 col-sm-12 text-center">
                <h1 class="display-2 text-body fw-bolder">Quem somos?</h1>
            </div>
        </div>
    </div>
    <div class="container-fluid mt-5">
        <div class="row justify-content-center">
            <div class="text-center col-lg-2 col-md-4 col-4 mb-3">
                <img class="w-100 " src="../images/time/marcus.png" alt="Marcus" />
                <h4 class="mt-3">Marcus<h4>
            </div>
            <div class="text-center col-lg-2 col-md-4 col-4 mb-3">
                <img class="w-100 " src="../images/time/thiago.png" alt="Thiago" />
                <h4 class="mt-3">Thiago<h4>
            </div>
            <div class="text-center col-lg-2 col-md-4 col-4 mb-3">
                <img class="w-100 " src="../images/time/priscila.png" alt="Priscila" />
                <h4 class="mt-3">Priscila<h4>
            </div>
            <div class="text-center col-lg-2 col-md-4 col-4 mb-3">
                <img class="w-100 " src="../images/time/Gilvan.png" alt="Gilvan" />
                <h4 class="mt-3">Gilvan<h4>
            </div>
            <div class="text-center col-lg-2 col-md-4 col-4 mb-3">
                <img class="w-100 " src="../images/time/thays.png" alt="Thays" />
                <h4 class="mt-3">Thays<h4>
            </div>

        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js" integrity="sha384-q2kxQ16AaE6UbzuKqyBE9/u/KzioAlnx2maXQHiDX9d4/zp8Ok3f+M7DPm+Ib6IU" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.min.js" integrity="sha384-pQQkAEnwaBkjpqZ8RU1fF1AKtTcHJwFl3pblpTlHXybJjHpMYo79HY3hIi4NKxyj" crossorigin="anonymous"></script>
</body>

</html>