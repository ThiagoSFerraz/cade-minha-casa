<?php
session_start();
require '../../backend/Connection.php';
require '../../backend/formExibidados.php'
?>
<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Abaixo-Assinado</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>
    <link rel="icon" href="./image/logo.png">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100;200;300;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../styles/style.css">

</head>

<body>
<?php
    if (isset($_SESSION['id'])) {
        include('../components/navBar2.html');
        
    } else {
        include('../components/navBar.html');
        
    }
?>



    <div class="container-fluid" style="background-image: url(../images/fundo.png); background-repeat: no-repeat; height: 100vh;">


        <div class="row d-flex justify-content-center">
            <div class="col-lg-5 col-sm-12 card rounded mt-lg-5 mt-md-3 mt-sm-4 mb-5">
                <div class="card-body">

                    <!-- Inicio do formulário -->
                    
                      <?php
                        while ($dadosImovel = $consulta->fetch(PDO::FETCH_ASSOC)) {
                     ?>
                        <h5 class="card-title  mb-md-5 mt-md-5 mb-sm-3 mt-sm-4">
                            bairro: <?= $dadosImovel['BAIRRO'] ?><br>
                            logradouro: <?= $dadosImovel['LOGRADOURO'] ?><br>
                            Número: <?= $dadosImovel['NUMERO'] ?>
                        </h5>
                        <?php
                          }
                        ?>
                        <div class="row d-flex justify-content-center">


                            <!-- Nome -->
                            <div class="col-10 mb-3">
                                <form action="../../backend/cadastrar_abaixoassin.php" method="POST">
                                    <label for="Nome" class="form-label">Digite seu nome:</label>
                                    <input type="nome" name="nome" class="form-control rounded-pill text-muted" id="Nome" aria-describedby="nome" placeholder="Nome">

                            </div>

                            <!-- email -->
                            <div class="col-10 mb-3">

                                <label for="Email" class="form-label">Digite seu Email:</label>
                                <input type="email" name="email" class="form-control rounded-pill bg-white" id="Email" placeholder="Seu email">

                            </div>

                            <!-- CPF -->
                            <div class="col-10 mb-3">

                                <label for="CPF" class="form-label">CPF</label>
                                <input type="number" name="CPF" class="form-control rounded-pill bg-white" id="CPF" placeholder="CPF">
                                <input type="hidden" name="idImovel" value="<?= $idImovel; ?>">

                            </div>


                            <!-- Botão -->
                            <div class="col-md-10 col-sm-12 mt-3">
                                <button type="submit" class="btn btn-warning btn-lg rounded-pill w-100" style="height: 5rem;">
                                    Enviar
                                </button>
                            </div>
                        </div>
                    </form>
                    <!-- Fim do formulário  -->
                </div>


            </div>
        </div>



    </div>
</body>

<footer>
    <?php
    include('../components/footer.html')
    ?>
</footer>

</body>



<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js" integrity="sha384-q2kxQ16AaE6UbzuKqyBE9/u/KzioAlnx2maXQHiDX9d4/zp8Ok3f+M7DPm+Ib6IU" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.min.js" integrity="sha384-pQQkAEnwaBkjpqZ8RU1fF1AKtTcHJwFl3pblpTlHXybJjHpMYo79HY3hIi4NKxyj" crossorigin="anonymous"></script>

</html>

</html>