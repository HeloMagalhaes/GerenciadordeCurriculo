<?php

if (!isset($_SESSION)) {
    session_start();
}


include_once '../model/Usuario.php';
include_once '../controller/formacaoAcadController.php';
include_once '../controller/OutrasFormacoesController.php';
include_once '../controller/ExperienciaProfissionalController.php';

?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial- scale=1.0">
    <meta httpequiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>EnlatadosJuarez</title>
    <style>
        /* Definimos que a sidebar terá uma largura de 120px e cor a cord de fundo #222 */
        .w3-sidebar {
            width: 120px;
        }

        /*Define Fonte para todas as tags listadas abaixo*/
        body,
        h1,
        h2,
        h3,
        h4,
        h5,
        h6 {
            font-family: "Montserrat", sans-serif
        }
    </style>
</head>

<body class="w3-light-grey">

    <div class="w3-padding-large" id="main">
    </div>

    <div class="w3-padding-128 w3-content w3-text-grey" id="dPessoais">
        <h2 class="w3-cyan w3-text-white w3-center w3-padding w3-border w3-round-large"><?php echo $verUsuario->getNome(); ?> Currículo</h2>
        <form action="" method="post" class=" w3-row w3-light-grey w3-text-blue " style="width:100%;">
            <input class="w3-input w3-border w3-round-large" name="txtID" type="hidden" value="<?php echo $verUsuario->getNome(); ?>">
            <div class="w3-row w3-section ">
                <div class="w3-col w3-cyan w3-text-white w3-padding w3-border w3-round-large " style="width:100%; display:flex;">
                    <h3>Nome: </h3>
                    <h3> <?php echo $verUsuario->getNome(); ?></h3>
                </div>

            </div>
            <div class="w3-row w3-section">
                <div class="w3-col w3-cyan w3-text-white  w3-padding w3-border w3-round-large" style="width:100%; display:flex;">
                    <h3>CPF: </h3>
                    <h3><?php echo $verUsuario->getCPF(); ?></h3>
                </div>

            </div>

            <div class="w3-row w3-section">
                <div class="w3-col w3-cyan w3-text-white w3-padding w3-border w3-round-large" style="width:100%; display:flex;">
                    <h3>EMAIL: </h3>
                    <h3><?php echo $verUsuario->getEmail(); ?></h3>
                </div>
            </div>



            <div class="w3-row w3-section">
                <div class="w3-col w3-cyan w3-text-white w3-padding w3-border w3-round-large" style="width:100%; display:flex;">
                    <h3>DATA DE NASCIMENTO: </h3>
                    <h3><?php echo $verUsuario->getCPF(); ?></h3p>
                </div>

            </div>


    </div>
    </form>
    </div>


    <div class="w3-padding-128 w3-content w3-text-grey" id="formacao">
        <h2 class="w3-text-cyan w3-center">Formação Acadêmica</h2>
        <div class="w3-container">
            <table class="w3-table-all w3-centered" style="width:100%;">
                <thead>
                    <tr class="w3-center w3-blue">
                        <th>Início</th>
                        <th>Fim</th>
                        <th>Descrição</th>
                    </tr>
                </thead>
                <?php
                $verUsuario = new FormacaoAcadController();
                $results = $verUsuario->gerarLista(($_POST["userID"]));
                if ($results != null)
                    while ($row = $results->fetch_object()) {
                        echo '<tr>';
                        echo '<td style="width: 20%;">' . $row->inicio . '</td>';
                        echo '<td style="width: 20%;">' . $row->fim . '</td>';
                        echo '<td style="width: 65%;">' . $row->descricao . '</td>';
                        echo '</tr>';
                    }
                ?>
            </table>
        </div>
    </div>


    <div class="w3-padding-128 w3-content w3-text-grey" id="eProfissional" style="margin-top:60px;">

        <h2 class="w3-text-cyan w3-center">Experiência Profissional</h2>

        <div class="w3-container">
            <table class="w3-table-all w3-centered" style="width:100%;">
                <thead>
                    <tr class="w3-center w3-blue">
                        <th>Início</th>
                        <th>Fim</th>
                        <th>Empresa</th>
                        <th>Descrição</th>

                    </tr>
                </thead>
                <?php
                $verUsuario = new ExperienciaProfissionalController();
                $results = $verUsuario->gerarLista(($_POST["userID"]));
                if ($results != null)
                    while ($row = $results->fetch_object()) {
                        echo '<tr>';
                        echo '<td style="width: 20%;">' . $row->inicio . '</td>';
                        echo '<td style="width: 20%;">' . $row->fim . '</td>';
                        echo '<td style="width: 65%;">' . $row->empresa . '</td>';
                        echo '<td style="width: 65%;">' . $row->descricao . '</td>';
                        echo '</tr>';
                    }
                ?>
            </table>
        </div>
    </div>




    <div class="w3-padding-128 w3-content w3-text-grey" id="outras-formacoes" style="margin-top:60px;">
        <h2 class="w3-text-cyan w3-center">Outras Formações</h2>
        <div class="w3-container">
            <table class="w3-table-all w3-centered" style="width:100%;">
                <thead>
                    <tr class="w3-center w3-blue">
                        <th>Início</th>
                        <th>Fim</th>
                        <th>Descrição</th>
                    </tr>
                </thead>

                <?php
                $verUsuario = new OutrasFormacoesController();
                $results = $verUsuario->gerarLista(($_POST["userID"]));
                if ($results != null)
                    while ($row = $results->fetch_object()) {
                        echo '<tr>';
                        echo '<td style="width: 20%;">' . $row->inicio . '</td>';
                        echo '<td style="width: 20%;">' . $row->fim . '</td>';
                        echo '<td style="width: 60%;">' . $row->descricao . '</td>';
                        echo '</tr>';
                    }
                ?>
            </table>
        </div>
    </div>

    <div class="w3-padding-128 w3-content w3-text-grey">
        <form action="../controller/navegacao.php" method="post" class="w3-container w3-light-grey w3-text-blue w3-margin w3-center" style="width: 30%;">
            <div class="w3-row w3-section">
                <div>
                    <button name="btnVoltarListados" class="w3-button w3-block w3-margin w3-blue w3-cell w3-roundlarge" style="width: 90%;"> Voltar </button>
                </div>
            </div>
        </form>
    </div>


</body>

</html>