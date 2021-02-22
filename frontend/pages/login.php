<!DOCTYPE html>
<html lang="pt-BR">

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
    <title>Login > Cadê Minha Casa?</title>
</head>

<body>
    <header>
        <!-- topo do site -->
        <nav class="navbar navbar-expand-lg navbar-light bg-white border-bottom">
            <div class="container-fluid">
                <a href="../../index.php" style="margin-left: 16rem; position: relative; right: 2rem; " class="navbar-brand">
                    <img src="../images/logo.png" alt="Página principal" style="width: 2.5rem; position: relative;">
                </a>
                <button class="navbar-toggler" data-toggle="collapse" data-target="#navbarmenu">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse justify-content-start" style="width: 70%;" id="navbarmenu">
                    <ul class="navbar-nav">

                        <li class="navbar-item ms-5">
                            <a href="../../index.php" class="nav-link">Início</a>
                        </li>
                        <li class="navbar-item ms-5">
                            <a href="./sobre.php" class="nav-link">Sobre</a>
                        </li>
                        <li class="navbar-item ms-5">
                            <a href="./assinado.php" class="nav-link">Abaixo-assinado</a>
                        </li>
                    </ul>



                </div>
                <div class="collapse navbar-collapse" id="navbarmenu" style="width:25%;">
                    <div class="mb-1 me-3">
                        <a href="#"><button type="button" class="btn border border-warning rounded-pill" style="width:100%;">Login</button></a>
                    </div>
                    <div class="mb-1 me-3">
                        <a href=" ./cadastro.php"><button type="button" class="btn btn-warning rounded-pill" style="width: 100%;">Cadastre-se</button></a>
                    </div>
                </div>
                <!-- <div class="collapse navbar-collapse" id="navbarmenu" style="border: solid 1px #000;">
                            <button type="button" class="ms-5 me-3 btn border border-warning rounded-pill" >Login</button>
                            <button type="button" class="btn btn-warning rounded-pill">Cadastre-se</button>
                        </div> -->
            </div>
        </nav>
    </header>
    <div class="container-fluid py-5" style="background-image: url(../images/fundo.png); background-repeat: repeat;height: 100vh">
        <div class="row d-flex justify-content-center text-center">
            <div class="col-lg-8 col-sm-12 ">
                <h1 class="display-3 text-white fw-bolder">Login</h1>
            </div>
        </div>

        <div class="row d-flex justify-content-center">
            <div class="col-lg-5 col-sm-12 card rounded ">
                <div class="card-body">

                    <!-- Inicio do formulário -->

                    <h5 class="card-title text-center mb-md-5 mt-md-5 mb-sm-3 mt-sm-4">Entre na sua conta!</h5>
                    <form action="../../backend/login.php" method="POST">
                        <div class="row d-flex justify-content-center">

                            <!-- email -->

                            <div class="col-10 mb-3">

                                <label for="inputEmail" class="form-label">Digite seu Email:</label>
                                <input type="email" name="email" class="form-control rounded-pill bg-white" id="InputEmail" placeholder="Seu email" required>

                            </div>

                            <!-- Senha -->
                            <div class="col-10 mb-3">

                                <label for="inputSenha" class="form-label">Digite sua senha:</label>
                                <input type="password" name="senha" class="form-control rounded-pill bg-white" id="InputPassword" placeholder="Senha" required>

                            </div>
                            <div class="col-10 mb-3">

                                <small id="emailHelp" class="form-text text-muted text-center">Ainda não tem cadastro? <a href="cadastro.php"> Clique aqui! </a></small>

                            </div>

                            <!-- Botão -->
                            <div class="col-md-10 col-sm-12 mt-3">
                                <button type="submit" class="btn btn-warning btn-lg rounded-pill w-100" style="height: 5rem;">
                                    Entrar na conta!
                                </button>
                            </div>

                        </div>
                    </form>
                    <!-- Fim do formulário  -->
                </div>
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

<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js" integrity="sha384-q2kxQ16AaE6UbzuKqyBE9/u/KzioAlnx2maXQHiDX9d4/zp8Ok3f+M7DPm+Ib6IU" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.min.js" integrity="sha384-pQQkAEnwaBkjpqZ8RU1fF1AKtTcHJwFl3pblpTlHXybJjHpMYo79HY3hIi4NKxyj" crossorigin="anonymous"></script>


</html>