<?php
session_start();

if (!isset($_SESSION['id'])) {
    header("Location: http://localhost/cade-minha-casa/frontend/pages/login.php");
} else {
    require '../../backend/Connection.php';
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

    <!-- Adicionando JQuery -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>

    <!-- Adicionando Javascript -->
    <script>
        $(document).ready(function() {

            function limpa_formulário_cep() {
                // Limpa valores do formulário de cep.
                $("#rua").val("");
                $("#bairro").val("");
                $("#cidade").val("");
                $("#uf").val("");
                $("#ibge").val("");
            }

            //Quando o campo cep perde o foco.
            $("#cep").blur(function() {

                //Nova variável "cep" somente com dígitos.
                var cep = $(this).val().replace(/\D/g, '');

                //Verifica se campo cep possui valor informado.
                if (cep != "") {

                    //Expressão regular para validar o CEP.
                    var validacep = /^[0-9]{8}$/;

                    //Valida o formato do CEP.
                    if (validacep.test(cep)) {

                        //Preenche os campos com "..." enquanto consulta webservice.
                        $("#rua").val("...");
                        $("#bairro").val("...");
                        $("#cidade").val("...");
                        $("#uf").val("...");
                        $("#ibge").val("...");

                        //Consulta o webservice viacep.com.br/
                        $.getJSON("https://viacep.com.br/ws/" + cep + "/json/?callback=?", function(dados) {

                            if (!("erro" in dados)) {
                                //Atualiza os campos com os valores da consulta.
                                $("#rua").val(dados.logradouro);
                                $("#bairro").val(dados.bairro);
                                $("#cidade").val(dados.localidade);
                                $("#uf").val(dados.uf);
                                $("#ibge").val(dados.ibge);
                            } //end if.
                            else {
                                //CEP pesquisado não foi encontrado.
                                limpa_formulário_cep();
                                alert("CEP não encontrado.");
                            }
                        });
                    } //end if.
                    else {
                        //cep é inválido.
                        limpa_formulário_cep();
                        alert("Formato de CEP inválido.");
                    }
                } //end if.
                else {
                    //cep sem valor, limpa formulário.
                    limpa_formulário_cep();
                }
            });
        });
    </script>

    <title>Sinalize um imóvel:: Cadê minha casa?</title>
</head>

<body>

    <header>
        <!-- topo do site -->
        <?php
        include('../components/navBar2.html')
        ?>
    </header>
    <!--texto saudação-->
    <div class="container-fluid" style="background-image: url(../images/fundo.png); background-repeat: no-repeat; background-color: #000">
        <div class="row d-flex justify-content-center text-center">
            <div class="col-lg-8 col-sm-12 mb-md-5 mb-sm-3 mt-lg-5 mt-md-3 mt-sm-2">
                <h1 class="display-3 text-white fw-bolder">COM ESSA AÇÃO VOCÊ PODE AJUDAR MUITA GENTE!</h1>
            </div>
        </div>


        <div class="row d-flex justify-content-center">
            <div class="col-lg-5 col-sm-12 card rounded mt-lg-5 mt-md-3 mt-sm-4 mb-5">
                <div class="card-body">

                    <!-- Inicio do formulário -->

                    <h5 class="card-title text-center mb-md-5 mt-md-5 mb-sm-3 mt-sm-4">Coloque os dados que você quer sinalizar!</h5>
                    <form action="../../backend/cadastrarImovel.php" method="POST">
                        <div class="row d-flex justify-content-center">


                            <!-- CEP -->
                            <div class="col-10 mb-3">

                                <label for="inputCep" class="form-label">Coloque o CEP do local:</label>
                                <input type="text" name="cep" class="form-control rounded-pill text-muted" id="cep" value="" aria-describedby="cep" placeholder="CEP">
                                <a style="color: #FFC107;" href="https://buscacepinter.correios.com.br/app/endereco/index.php?t" target="_blank" rel="noopener noreferrer">Não sabe seu CEP?</a>
                            </div>

                            <!-- Estado -->
                            <div class="col-5 mb-3">

                                <label for="inputEstado" class="form-label">Coloque a estado:</label>
                                <input type="text" name="estado" class="form-control rounded-pill text-center bg-white" id="estado" placeholder="SP" readonly>

                            </div>

                            <!-- Cidade -->
                            <div class="col-5 mb-3">

                                <label for="inputCidade" class="form-label">Coloque a cidade</label>
                                <input type="text" name="cidade" class="form-control rounded-pill text-center bg-white" id="cidade" placeholder="São Paulo" readonly>

                            </div>

                            <!-- Rua -->
                            <div class="col-10 mb-3">

                                <label for="inputRua" class="form-label">Coloque o nome da rua do local:</label>
                                <input type="text" name="rua" class="form-control rounded-pill" id="rua" aria-describedby="rua" placeholder="Rua">

                            </div>

                            <!-- Bairro -->
                            <div class="col-10 mb-3">

                                <label for="inputBairro" class="form-label">Coloque o bairro do local:</label>
                                <input type="text" name="bairro" class="form-control rounded-pill" id="bairro" aria-describedby="bairro" placeholder="Bairro">

                            </div>

                            <!-- Número -->
                            <div class="col-10 mb-3">

                                <label for="inputNumero" class="form-label">Coloque o número do local:</label>
                                <input type="text" name="numero" class="form-control rounded-pill" id="inputNumero" aria-describedby="numero" placeholder="Número">

                            </div>
                            <div class="col-10 mb-3">
                                <p> O Local é iluminado?</p>

                                <input class="form-check-input" type="radio" name="iluminacao" id="iluminacao" value="1"> Sim </input>
                                <label class="form-check-label" for="iluminacao">

                                    <input class="form-check-input" type="radio" name="iluminacao" id="iluminacao" value="0"> Não </input>
                                    <label class="form-check-label" for="iluminacao">

                            </div>
                            <div class="col-10 mb-3">
                                <p> A calçada está em boas condições?</p>

                                <input class="form-check-input" type="radio" name="calcada" id="calcada" value="1"> Sim </input>
                                <label class="form-check-label" for="calcada">

                                    <input class="form-check-input" type="radio" name="calcada" id="calcada" value="0"> Não </input>
                                    <label class="form-check-label" for="calcada">

                            </div>
                            <div class="col-10 mb-3">
                                <p> O Local é seguro?</p>

                                <input class="form-check-input" type="radio" name="seguranca" id="seguranca" value="1"> Sim </input>
                                <label class="form-check-label" for="seguranca">

                                    <input class="form-check-input" type="radio" name="seguranca" id="seguranca" value="0"> Não </input>
                                    <label class="form-check-label" for="seguranca">

                            </div>
                            <div class="col-10 mb-3">

                                <label for="inputTexto" class="form-label">Gostaria de falar algo mais?</label>
                                <br>
                                <textarea class="w-100 px-3 py-3" style="border: 1px #d8d8d8 solid; border-radius: 5px;" placeholder="Digite aqui" name="sinTexto"></textarea>

                            </div>

                            <!-- Botão -->
                            <div class="col-md-10 col-sm-12 mb-3">
                                <button type="submit" class="btn btn-warning btn-lg rounded-pill w-100" style="height: 5rem;">
                                    Sinalizar!
                                </button>
                            </div>
                        </div>
                    </form>
                    <!-- Fim do formulário  -->
                </div>


            </div>
        </div>
    </div>

    <footer>
        <?php
        include('../components/footer.html')
        ?>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js" integrity="sha384-q2kxQ16AaE6UbzuKqyBE9/u/KzioAlnx2maXQHiDX9d4/zp8Ok3f+M7DPm+Ib6IU" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.min.js" integrity="sha384-pQQkAEnwaBkjpqZ8RU1fF1AKtTcHJwFl3pblpTlHXybJjHpMYo79HY3hIi4NKxyj" crossorigin="anonymous"></script>

</body>

</html>