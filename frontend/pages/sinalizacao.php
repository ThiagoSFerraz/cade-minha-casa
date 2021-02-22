<?php
session_start();
require '../../backend/contadorRegistros.php';
require '../../backend/analiseSeguranca.php';

if (!isset($_SESSION['id'])) {
    header('Location: http://localhost/cade-minha-casa/frontend/pages/login.php');
} else {
    require '../../backend/sinalizacao.php';
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

    <title>Suas sinalizações :: Cadê minha casa?</title>
</head>

<body>
    <?php
    include('../components/navBar2.html');
    ?>

    <!-- inicio do container -->

    <div class="container-fluid">
        <div class="row d-flex justify-content-center text-center mt-lg-5">
            <div class="col-lg-9 col-sm-12">
                <h1 class="display-2 fw-bolder">Olá, <?= $_SESSION['nome']; ?>!</h1>
            </div>
        </div>
        <div class="row d-flex justify-content-center text-center mt-lg-5 mt-sm-2">
            <?php

            while ($linhaRegistros = $consultaRegistros->fetch(PDO::FETCH_ASSOC)) {

            ?>
                <div class="col-lg-9 col-sm-12 ">
                    <h2 class="display-4">Aqui você pode ver o progresso de suas sinalizações</h2>
                    <h2 class="display-6">Você possui <?= $linhaRegistros['Registros'] ?> sinalizações em análise</h2>
                </div>
            <?php
            }
            ?>
        </div>
    </div>
    <div class="container mt-5">
        <div class="row mt-lg-5 mt-md-3 mt-sm-3 d-flex justify-content-between">
            <!-- Padrão a partir daqui! -->
            <?php
            while ($linha = $consulta->fetch(PDO::FETCH_ASSOC)) {
            ?>
                <div class="col-lg-5 border py-3 border-warning rounded m-2">
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item">Registro Nº <?= $linha['ID_IMOVEL'] ?></li>
                        <li class="list-group-item"><?= $linha['LOGRADOURO'] ?></li>
                        <li class="list-group-item">Nº <?= $linha['NUMERO'] ?></li>
                        <li class="list-group-item">Bairro <?= $linha['BAIRRO'] ?></li>
                        <li class="list-group-item">CEP <?= $linha['CEP'] ?></li>
                    </ul>
                    <div class="container-fluid border-top">
                        <div class="row d-flex justify-content-center py-3 text-center">
                            <div class="col-12">
                                <p>A segurança da região é considerada: <?= SEGURANCA($linha['ID_IMOVEL']); ?></p>
                            </div>
                        </div>
                    </div>
                    <div class="container-fluid">
                        <div class="row d-flex justify-content-end">
                            <div class="col-6">
                                <button type="button" class="ms- me-3 btn border btn-warning rounded-pill" data-toggle="modal" data-target="#popUpdate<?php echo $linha['ID_IMOVEL'] ?>" style="width:100%;">Faça uma alteração</button>
                            </div>
                            <div class="col-3">
                                <button type="button" class="btn border-danger rounded-pill" data-toggle="modal" data-target="#popDelete<?php echo $linha['ID_IMOVEL'] ?>" style="width: 100%;">Deletar</button>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Fim do padrão -->



                <!-- popUps -->

                <div class="modal fade" id="popUpdate<?php echo $linha['ID_IMOVEL'] ?>">
                    <div class="modal-dialog">
                        <div class="modal-content text-center">
                            <form action="../../backend/sinalizacaoUpdate.php" method="POST">
                                <div class="modal-header">
                                    <h5 class="modal-title ">Faça suas alterações:</h5>
                                    <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <div class="row d-flex justify-content-center">
                                        <div class="col-10 mb-3">
                                            <input type="hidden" name="imovel_id" value="<?php echo $linha['ID_IMOVEL'] ?>" />
                                            <input type="text" name="endereco" class="form-control rounded-pill" id="updateEndereco" aria-describedby="endereco" placeholder="Endereço" value="<?php echo $linha['LOGRADOURO'] ?>" />
                                        </div>
                                        <div class="col-10 mb-3">
                                            <input type="text" name="numero" class="form-control rounded-pill" id="updateNumero" aria-describedby="Numero" placeholder="Número" value="<?php echo $linha['NUMERO'] ?>" />
                                        </div>
                                        <div class="col-10 mb-3">
                                            <input type="text" name="bairro" class="form-control rounded-pill" id="updateBairro" aria-describedby="bairro" placeholder="Bairro" value="<?php echo $linha['BAIRRO'] ?>" />
                                        </div>
                                        <div class="col-10 mb-3">
                                            <input type="text" name="cep" class="form-control rounded-pill" id="updateCEP" aria-describedby="cep" value="<?php echo $linha['CEP'] ?>" />
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="submit" class="btn rounded-pill btn-warning">Confirmar!</button>
                                    <button type="button" class="btn rounded-pill border border-danger" data-dismiss="modal">Cancelar</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>


                <div class="modal fade" id="popDelete<?php echo $linha['ID_IMOVEL'] ?>">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <div class="row d-flex justify-content-center">
                                    <div class="col-10 mb-3">
                                        <h5>Você tem certeza que deseja excluir as informações sobre o imóvel:</h5>
                                    </div>
                                    <ul class="list-group list-group-flush">
                                        <li class="list-group-item"><?php echo $linha['LOGRADOURO'] ?></li>
                                        <li class="list-group-item">Nº <?php echo $linha['NUMERO'] ?></li>
                                        <li class="list-group-item">Bairro <?php echo $linha['BAIRRO'] ?></li>
                                        <li class="list-group-item">CEP <?php echo $linha['CEP'] ?></li>
                                    </ul>
                                </div>

                            </div>
                            <div class="modal-footer">
                                <form action="../../backend/sinalizacaoDelete.php" method="POST">
                                    <input type="hidden" name="idImovel" value="<?php echo $linha['ID_IMOVEL'] ?>">
                                    <button type="submit" class="btn rounded-pill btn-warning">Sim, eu quero!</button>
                                    <button type="button" class="btn rounded-pill border border-danger" data-dismiss="modal">Não, obrigado.</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>


            <?php
            }
            ?>
        </div>
    </div>


    <!-- Fim dos popUps -->
    <?php
    include('../components/footer.html')
    ?>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js" integrity="sha384-q2kxQ16AaE6UbzuKqyBE9/u/KzioAlnx2maXQHiDX9d4/zp8Ok3f+M7DPm+Ib6IU" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.min.js" integrity="sha384-pQQkAEnwaBkjpqZ8RU1fF1AKtTcHJwFl3pblpTlHXybJjHpMYo79HY3hIi4NKxyj" crossorigin="anonymous"></script>
</body>

</html>